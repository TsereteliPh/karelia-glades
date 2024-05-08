<section class="villas">
	<div class="container">
		<?php
			$title = get_sub_field( 'title' );
			if ( $title ) {
				echo sprintf(
					'<%1$s class="villas__title">
						<svg width="55" height="70"><use xlink:href="' . get_template_directory_uri() . '/assets/images/sprite.svg#icon-logo--frame"></use></svg>
						%2$s
					</%1$s>',
					$title['type'],
					$title['text']
				);
			}
		?>

		<div class="villas__content">
			<div class="villas__cats">
				<?php
					$termList = get_terms( [
						'taxonomy' => 'villa-category',
						'hierarchical' => false,
					] );

					foreach ( $termList as $key => $term ) :
						?>

						<button class="villas__cat<?php echo $key == 0 ? ' active' : ''; ?>" type="button" data-slug="<?php echo $term->slug; ?>">
							<?php echo $term->name; ?>
							<span><?php echo $term->description; ?></span>
						</button>

						<?php
					endforeach;
				?>
			</div>

			<ul class="reset-list villas__list js-show-more-container">
				<?php
					$query = new WP_Query( [
						'post_type' => 'villas',
						'villa-category' => $termList[0]->slug,
						'posts_per_page' => 6,
						'paged' => 1
					] );

					$posts = $query->posts;

					if ( $query->have_posts() ) {
						if ( is_archive() ) {
							foreach ( $posts as $post ) {
								get_template_part('/layouts/partials/cards/villa-card', null, array(
									'class' => 'villas__item',
								) );
							}
						} else {
							while ( $query->have_posts() ) {
								$query->the_post();

								get_template_part('/layouts/partials/cards/villa-card', null, array(
									'class' => 'villas__item',
								) );
							}

							wp_reset_postdata();
						}
					}
				?>
			</ul>

			<button class="btn-show-more villas__button js-show-more<?php echo ( $query->max_num_pages > 1) ? '' : ' hidden'; ?>" type="button">Показать еще</button>

			<script>
				let posts = '<?php echo json_encode($query->query_vars); ?>';
				let current_page = <?php echo ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>;
				let max_pages = <?php echo $query->max_num_pages; ?>;
			</script>
		</div>
	</div>
</section>
