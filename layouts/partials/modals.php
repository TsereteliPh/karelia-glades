<div class="modal modal--success" id="success">
	<svg class="modal__logo" width="75" height="95"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-logo--frame"></use></svg>

	<div class="modal__title">Спасибо за заявку!</div>

	<div class="modal__text">Мы получили вашу заявку и успешно её обработали! Наши специалисты свяжутся с вами в ближайшее время.</div>
</div>

<div class="modal modal--callback" id="callback">
	<div class="modal__title">Оставить заявку</div>

	<form method="POST" class="modal__form" name="Звонок">
		<fieldset class="fieldset modal__fieldset modal__fieldset--fullname">
			<legend class="fieldset__legend">ФИО</legend>
			<input type="text" class="fieldset__input" name="client_name" required>
		</fieldset>

		<fieldset class="fieldset modal__fieldset modal__fieldset--email">
			<legend class="fieldset__legend">E - mail</legend>
			<input type="email" class="fieldset__input" name="client_email" required>
		</fieldset>

		<fieldset class="fieldset modal__fieldset modal__fieldset--tel">
			<legend class="fieldset__legend">Телефон</legend>
			<input type="tel" class="fieldset__input" name="client_tel" required>
		</fieldset>

		<div class="modal__policy">Нажимая кнопку “Забронировать” вы даете согласие на обработку ваших персональных данных в соответствии с <a href="<?php echo get_privacy_policy_url(); ?>">Политикой конфиденциальности</a></div>

		<button class="btn modal__submit" type="submit">Забронировать</button>

		<input type="text" class="hidden" name="page_request" value="<?php echo is_archive() ? get_the_archive_title() : get_the_title(); ?>">

		<?php wp_nonce_field( 'Звонок', 'modal-callback-nonce' ); ?>
	</form>
</div>
