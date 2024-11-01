<?php 

function slfplugin_optins_menu(){
	add_options_page(
		'Social links on Footer',
		'Social links footer',
		'manage_options',
		'slfplugin-options',
		'slfplugin_options_content'
	);
}  

function slfplugin_options_content(){

	global $slfplugin_options;

	ob_start(); ?>
	<div class="wrap">
		<h2><?php _e('Social links footer', 'slfplugin-domain') ?></h2>
		<p><?php _e('Social links under the bottom of blog post.', 'slfplugin-domain') ?></p>

		<form action="options.php" method="post">
			<?php settings_fields('slfplugin_settings_group'); ?>

			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label for="slfplugin_settings[enable]"><?php _e('Enable','slfplugin_domain') ?></label></th>
						<td><input type="checkbox" name="slfplugin_settings[enable]" id="slfplugin_settings[enable]" value="1" <?php checked('1', !empty( $slfplugin_options['enable'] ) ? 1 : 0); ?> ></td>
					</tr>
					
					<tr >
						<th>Style</th>
						<td>
							<input type="radio" name="slfplugin_settings[style]" id="style1" value="1" <?php checked('1',!empty( $slfplugin_options['style'] ) ? 1 : 0); ?>>
							<label for="style1">Text</label>

							<input type="radio" name="slfplugin_settings[style]" id="style2" value="2" <?php checked('2',!empty( $slfplugin_options['style'] ) ? 1 : 0); ?>>
							<label for="style2">Image</label>
						</td>
					</tr>

					<?php //if (!empty($slfplugin_options['image'])) { ?>
						<tr id="img" style="display: <?= (!empty($slfplugin_options['image'] && $slfplugin_options['style'] == '2') ? '' : 'none') ?> ;">
							<th>Select styles</th>
							<td>
								<?php 
								if (empty($slfplugin_options['image'])) {
									$slfplugin_options['image'] ='1';
								}
								?>
								<input type="radio" name="slfplugin_settings[image]" id="img1" value="1" <?php checked('1',!empty( $slfplugin_options['image'] ) ? 1 : 0); ?>>
								<label for="img1"><img src="<?= SLFPLUGIN_URL .'img/style1.png' ?>" alt=""></label> <br>

								<input type="radio" name="slfplugin_settings[image]" id="img2" value="2" <?php checked('2',!empty( $slfplugin_options['image'] ) ? 1 : 0); ?>>
								<label for="img2"><img src="<?= SLFPLUGIN_URL .'img/style2.png' ?>" alt=""></label> <br>

								<input type="radio" name="slfplugin_settings[image]" id="img3" value="3" <?php checked('3',!empty( $slfplugin_options['image'] ) ? 1 : 0); ?>>
								<label for="img3"><img src="<?= SLFPLUGIN_URL .'img/style3.png' ?>" alt=""></label>
							</td>
						</tr>

						<?php //}else { ?>
							<tr id="color"  style="display: <?= (!empty($slfplugin_options['image'] && $slfplugin_options['style'] == '1') ? 'none' : '') ?> ;">
								<th scope="row"><label for="slfplugin_settings[link_color]"><?php _e('Link color','slfplugin_domain') ?></label></th>

								<?php if (empty($slfplugin_options['link_color'])) {
									$slfplugin_options['link_color'] = '#1e73be';
								} ?>
								<td><input type="text" value="<?= $slfplugin_options['link_color'] ?>" name="slfplugin_settings[link_color]" id="slfplugin_settings[link_color]" class="my-color-field" data-default-color="#effeff" /></td>
								<!-- 	<td><input type="text" name="slfplugin_settings[link_color]" id="slfplugin_settings[link_color]" value="<?= $slfplugin_options['link_color'] ?>" class="regular-text"> <p class="description"><?php // _e("Enter color or HEX value with #", 'slfplugin-domain') ?></p></td> -->
							</tr>
							<?php //} ?>

							<tr>
								<?php if (empty($slfplugin_options['facebook_url'])) {
									$slfplugin_options['facebook_url'] = '';
								} ?>
								<th scope="row"><label for="slfplugin_settings[facebook_url]"><?php _e('Facebook Profile','slfplugin_domain') ?></label></th>
								<td><input type="text" name="slfplugin_settings[facebook_url]" id="slfplugin_settings[facebook_url]" value="<?= $slfplugin_options['facebook_url'] ?>" class="regular-text"> <p class="description"><?php _e("Enter your facebook username or page ID", 'slfplugin-domain') ?></p></td>
							</tr>
							<tr>
								<?php if (empty($slfplugin_options['twitter_url'])) {
									$slfplugin_options['twitter_url'] = '';
								} ?>
								<th scope="row"><label for="slfplugin_settings[twitter_url]"><?php _e('Twitter Profile','slfplugin_domain') ?></label></th>
								<td><input type="text" name="slfplugin_settings[twitter_url]" id="slfplugin_settings[twitter_url]" value="<?= $slfplugin_options['twitter_url'] ?>" class="regular-text"> <p class="description"><?php _e("Enter your twitter username", 'slfplugin-domain') ?></p></td>
							</tr>
							<tr>
								<th scope="row"><label for="slfplugin_settings[show_in_feed]"><?php _e('Show In Posts Feed','slfplugin_domain') ?></label></th>
								<td><input type="checkbox" name="slfplugin_settings[show_in_feed]" id="slfplugin_settings[show_in_feed]" value="1" <?php checked('1',!empty( $slfplugin_options['show_in_feed'] ) ? 1 : 0 ); ?> ></td>
							</tr>

						</tbody>
					</table>
					<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e("Save changes", 'slfplugin-domain') ?>"></p>
				</form>
			</div>
			<?php
		}
		add_action('admin_menu', 'slfplugin_optins_menu');

		function slfplugin_register_settings(){
			register_setting('slfplugin_settings_group','slfplugin_settings');
		}
		add_action('admin_init', 'slfplugin_register_settings');