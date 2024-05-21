<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
    <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
} ?>
<header class="bg-gray-100 p-6 shadow">
    <h1 class="text-4xl font-bold"><?php bloginfo( 'name' ); ?></h1>
    <p class="text-gray-600"><?php bloginfo( 'description' ); ?></p>
    <nav class="mt-4">
		<?php
		wp_nav_menu( [
			'theme_location' => 'main-menu',
			'menu_class'     => 'flex space-x-4',
			'container'      => false
		] );
		?>
    </nav>
</header>