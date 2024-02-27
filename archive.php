<?php get_header(); ?>

<section class="archive-block">
	<div class="container">
		<div class="archive-block__header">
			<?php
			the_archive_title('<h1 class="title archive-block__title">', '</h1>');
			the_archive_description('<div class="archive-block__description">', '</div>');
			?>
		</div>
		<?php
		$term = get_queried_object();
		$categoryID = get_cat_ID($term->name);
		$acfPostID = 'category_' .  $categoryID
		?>
		<?php if (have_posts()) : ?>
			<div class="archive-block__body js-show-more-container">
				<?php
				while (have_posts()) {
					the_post();
					if ($categoryID == 25 || $categoryID == 26) get_template_part('layouts/partials/service-card');
					else get_template_part('layouts/partials/post-card');
				}
				?>
				<?php $additionalDescription = get_field('services-additional-description', $acfPostID); ?>
				<?php if($additionalDescription) : ?>
				  <div class="archive-block__footer"><?php echo $additionalDescription; ?></div>
				<?php endif; ?>
				<?php if ($categoryID !== 25 && $categoryID !== 26 && $wp_query->max_num_pages > 1) : ?>
					<button class="js-show-more btn archive-block__btn" type="button" data-text="Показать еще">Показать еще</button>
					<script>
						let posts = '<?php echo json_encode($wp_query->query_vars); ?>';
						let current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
						let max_pages = <?php echo $wp_query->max_num_pages; ?>;
					</script>
				<?php endif; ?>
			</div>
		<?php else : ?>
			<p>Нет записей для показа</p>
		<?php endif; ?>
	</div>
</section>

<?php get_template_part('layouts/partials/blocks', null, array(
	'id' => $acfPostID
)); ?>

<?php get_footer(); ?>
