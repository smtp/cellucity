<script type="text/template" id="tmpl-pgses-sync-error">
	<div id="elementor-template-library-templates">
		<div id="elementor-template-library-templates-container">
			<div id="elementor-template-library-templates-error">
				<div class="elementor-template-library-blank-icon">
					<img src="<?php echo esc_url( get_parent_theme_file_uri() . '/includes/ciyashop-studio/elementor/pgs-library/assets/img/no-search-results.svg' ); ?>" class="elementor-template-library-no-results">					
				</div>
				<div class="elementor-template-library-blank-title"><?php echo esc_html__( 'Something Went Wrong!', 'ciyashop' ); ?></div>
				<div class="elementor-template-library-blank-message">{{{ data.error_message }}}</div>
			</div>
		</div>
	</div>
</script>
