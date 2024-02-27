<?php get_header(); ?>

<section class="">
	<?php if (have_posts()) : ?>

		<h1 class="page-title">
			<?php
			/* translators: %s: search query. */
			printf(esc_html__('Search Results for: %s', 'adem'), '<span>' . get_search_query() . '</span>');
			?>
		</h1>

		<?php
		/* Start the Loop */
		while (have_posts()) :
			the_post();

			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			the_title();

		endwhile;

		the_posts_navigation();

	else :

		echo "Пусто";

	endif;
	?>
</section>

<?php get_footer(); ?>
