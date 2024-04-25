<?php get_header(); ?>

<section class="single-villas no-breadcrumbs-indent" style="background-image: url('<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url( 'full' ) : wp_get_attachment_image_url( 17, 'full', false ); ?>');">
	<div class="single-villas__thumb">
		<?php
			if ( get_the_post_thumbnail_url() ) {
				the_post_thumbnail( 'full' );
			} else {
				echo wp_get_attachment_image( 17, 'full', false );
			}
		?>
	</div>

	<?php
		$gallery = get_field( 'gallery' );
		if ( $gallery ) :
			?>

			<div class="single-villas__gallery">
				<?php foreach ( $gallery as $photo ) : ?>
					<a href="<?php echo $photo['url']; ?>" class="single-villas__photo" data-fancybox="single-villas-gallery">
						<?php echo wp_get_attachment_image( $photo['id'], 'large', false ); ?>
					</a>
				<?php endforeach; ?>
			</div>

			<?php
		endif;
	?>

	<div class="container">
		<h1 class="single-villas__title">
			Вилла
			<span><?php the_title(); ?></span>
		</h1>

		<?php
			$term = get_the_terms( get_the_ID(), 'villa-category' );
			if ( $term ) :
				?>

				<div class="single-villas__cat">
					<?php echo $term[0]->name; ?>
					<span><?php echo $term[0]->description; ?></span>
				</div>

				<?php
			endif;
		?>
	</div>
</section>

<?php get_template_part('layouts/partials/blocks'); ?>

<?php get_footer(); ?>
