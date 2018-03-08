
    <div id="sidenav">
			<?php
			wp_nav_menu( array(
						'theme_location' => 'menu-superior',
						'menu' => 'menu-side',
						'container' => 'false',
						'menu_class' => 'uk-nav uk-nav-default uk-nav-center',
					 ) );
			?>
    </div>
    <a id="sidebtn" uk-icon="icon: menu; ratio: 1.5"></a>
    <a id="closebtn" uk-icon="icon: close; ratio: 1.5"></a>
