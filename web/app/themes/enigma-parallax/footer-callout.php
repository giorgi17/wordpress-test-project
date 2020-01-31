<div class="enigma_callout_area" id="callout">
	<div class="container">
		<div class="row">
		<?php if ( ! empty ( get_theme_mod( 'fc_title', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ' ) ) ) { ?>
			<div class="col-md-9">
			<p><i class="fa fa-thumbs-up"></i><?php esc_html_e( get_theme_mod( 'fc_title', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ' ), 'enigma-parallax' );?></p>
			</div>
			<?php } if ( ! empty ( get_theme_mod( 'fc_btn_txt', 'More Features' ) ) ) { ?>
			<div class="col-md-3">
			<a href="<?php echo esc_url( get_theme_mod( 'fc_btn_link', '#' ) ); ?>" class="enigma_callout_btn"><?php esc_html_e( get_theme_mod( 'fc_btn_txt', 'More Features' ), 'enigma-parallax' ); ?></a>
			</div>
			<?php } ?>
		</div>		
	</div>
	<div class="enigma_callout_shadow"></div>
</div>