<?php
define( 'WP_USE_THEMES', false );
get_header();
?>
<body>
	<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">

		<!-- Navbar -->
		<nav class="uk-navbar-container uk-box-shadow-medium">
					<?php
					wp_nav_menu( array(
						    'theme_location' => 'menu-superior',
						    'container' => 'false',
								'menu_id' => 'top-menu',
								'menu_class' => 'uk-navbar-nav',
							 ) );
					?>
		</nav>
	</div>
		<!-- Content -->
		<?php
		$imgsargs = array(
			'post_type' 		 => 'post_images' ,
			'orderby'        => 'date',
			'order'          => 'ASC',
		);
		$imgsquery = new WP_query($imgsargs);
		?>

				<!-- Carousel -->
		<div id="top" class="carousel">
			<?php
			if( $imgsquery->have_posts() ) : while ( $imgsquery->have_posts() ) : $imgsquery->the_post();

				if (has_post_thumbnail( $imgsquery->ID ) ):
			 $topimgs = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
			?>
				<div><img src="<?php echo $topimgs[0]?>"></div>
			<?php endif; endwhile; endif;?>
		</div>

<?php get_sidebar(); ?>

<?php
$args = array(
	'post_type' 		 => 'post' ,
	'category_name'  => 'main',
  'posts_per_page' => '1',
	'orderby'        => 'date',
	'order'          => 'DESC',
);
$query = new WP_query($args);
if( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
?>
<main id="main" class="uk-background-muted">

			<div id="card-info" class="uk-card uk-card-large uk-card-body uk-card-hover uk-text-center">
					<h3 class="uk-card-title"><?php the_title();?></h3>
					<div style="margin-bottom: 2.5em;" >
						<?php the_content();?>
					</div>
					<div class="uk-position-bottom-center" style="padding-bottom: 15px;">
						<a href="https://twitter.com/Marcosaurios" target="_blank" class="uk-icon-button uk-margin-small-right" uk-icon="twitter"></a>
						<a href="https://www.linkedin.com/in/marcosurios/" target="_blank" class="uk-icon-button uk-margin-small-right" uk-icon="linkedin"></a>
						<a href="https://www.youtube.com/channel/UCsyjEAlaLVXZbwTToe5C0RA" target="_blank" class="uk-icon-button uk-margin-small-right" uk-icon="youtube"></a>
						<a href="https://vimeo.com/user58195150" target="_blank" class="uk-icon-button uk-margin-small-right" uk-icon="vimeo"></a>
						<a href="https://github.com/Marcosaurios" target="_blank" class="uk-icon-button uk-margin-small-right" uk-icon="github"></a>
						<a href="mailto:holamarcosaurios@gmail.com" class="uk-icon-button" uk-icon="icon: mail; ratio: 1"></a>
					</div>
			</div>
</main>

<?php endwhile; else: ?>
	<div style="margin: 25px auto; width: 60%;" class="uk-card uk-card-large uk-card-body uk-card-hover">
			<h3 class="uk-card-title">Error</h3>
			<p><?php _e('No hay ningún post con la categoría <i>main</i>'); ?></p>
	</div>
<?php endif; ?>


<section id="work" >
		<div id="grid" class="uk-child-width-1-2@s uk-child-width-1-3@m uk-text-center" uk-grid>

			<?php
			$args2 = array(
				'post_type' => 'post_event',
				'orderby' => 'date',
				'order' => 'DESC',
			);
			$gridquery = new WP_query($args2);
			if( $gridquery->have_posts() ) : while( $gridquery->have_posts() ): $gridquery->the_post();
			?>
			<!--<?php echo esc_url(get_permalink()); ?>-->
				<div>
						<div data-wow-delay="0.1s" class="hvr-grow uk-card uk-card-hover uk-card-media-top">
							<?php if (has_post_thumbnail( $gridquery->ID ) ): ?>
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<div class="uk-inline uk-transition-toggle"  uk-scrollspy="cls:uk-animation-slide-left-medium; repeat:true;">
	<a href="#modal-<?php echo $post->ID?>" class="titles" uk-toggle><img src='<?php echo $image[0]; ?>'>
		<div class="uk-overlay uk-overlay-default uk-dark uk-transition-slide-bottom-medium uk-position-bottom" >
			<p class="titles"><?php the_title();?></p>
		</div>
</a>
</div>

<div id="modal-<?php echo $post->ID?>" uk-modal>
	<div class="uk-modal-dialog">
		<div class="uk-modal-header">
			<!-- Show post title -->
        <h2 class="uk-modal-title uk-margin-remove-bottom"><?php the_title();?></h2>

		</div>

		<!-- Show thumbnail -->
			<?php if (has_post_thumbnail( $gridquery->ID ) ): ?>
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
				<img src='<?php echo $image[0]; ?>'>
		<!-- Show post -->
	<?php endif; ?>

		<div class="uk-modal-body">
			<article>
			 <?php the_content(); ?>
			</article>
		</div>
		<div class="uk-modal-footer">
				<p class="uk-float-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cerrar</button>
        </p>
				<?php $date = get_the_date(); ?>
				<p class="uk-text-meta uk-margin-remove-top"><time datetime="<?php echo $date ?>"><?php echo $date ?></time></p>

		</div>
  </div>
</div>
							<?php endif; ?>
						</div>
				</div>
				<?php endwhile; else: ?>
					<div style="margin: 25px auto; width: 60%;" class="uk-card uk-card-large uk-card-body uk-card-hover">
							<h3 class="uk-card-title">Error</h3>
							<p><?php _e('No hay ningún post con la categoría <i>main</i>'); ?></p>
					</div>
				<?php endif; ?>
		</div>
</section>

<section id="videos">
<!-- Videos loop -->
<?php
$v_args = array(
	'post_type' => 'post_video',
	'orderby' => 'date',
	'order' => 'DESC',
);
$videosquery = new WP_query($v_args);
if( $videosquery->have_posts() ) : while( $videosquery->have_posts() ): $videosquery->the_post();
 if( has_post_thumbnail($videosquery->ID) ):
	$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
?>
<div class="uk-height-large uk-inline uk-background-cover uk-light uk-flex" uk-parallax="bgy: -200" style="background-image: url(<?php echo "'".$img[0]."'" ?>);">
<!-- Always output iframe content here -->
	<div class="uk-position-center">
		<?php the_content();?>
	</div>
</div>
<?php endif;
endwhile;
endif;?>
</section>

<?php get_footer(); ?>
