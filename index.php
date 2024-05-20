<?php get_header(); ?>
<main>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2><?php the_title(); ?></h2>
            <div class="entry-content">
				<?php the_content(); ?>
            </div>
        </article>
	<?php endwhile; else : ?>
        <article>
            <h2><?php _e('Nothing Found', 'artistry-showcase'); ?></h2>
            <p><?php _e('It seems we can’t find what you’re looking for. Perhaps searching can help.', 'artistry-showcase'); ?></p>
			<?php get_search_form(); ?>
        </article>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
