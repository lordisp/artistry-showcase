<footer class="bg-gray-100 p-6 text-center">
    <nav>
		<?php
		wp_nav_menu( [
			'theme_location' => 'footer-menu',
			'menu_class'     => 'flex justify-center space-x-4',
			'container'      => false
		] );
		?>
    </nav>
    <p class="text-gray-600">&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?></p>
</footer>
<?php wp_footer(); ?>
</body>
</html>