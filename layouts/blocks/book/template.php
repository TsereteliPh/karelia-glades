<section id="book" class="book no-breadcrumbs-indent">
	<div class="container">
		<?php
			$title = get_sub_field( 'title' );
			if ( $title ) :
				?>
					<div class="book__title">
						<svg width="70" height="90"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-logo--frame"></use></svg>

						<?php
							echo sprintf( '<%1$s class="book__title-text">%2$s</%1$s>',
								$title['type'],
								$title['text']
							);
						?>
					</div>
				<?php
			endif;
		?>

		<div id='block-search' class="book__form">
			<div id='tl-search-form' class='tl-container'>
				<noindex><a href='https://www.travelline.ru/products/tl-hotel/' rel='nofollow' target='_blank'>TravelLine</a></noindex>
			</div>
		</div>
	</div>
</section>
