<?php
/**
 * @file plugins/themes/atla-bootstrap/AtlaBootstrapThemePlugin.inc.php
 *
 * Copyright (c) 2021 Atla
 *
 * @brief Atla Bootstrap3 child theme.
 */

import('lib.pkp.classes.plugins.ThemePlugin');

/**
 * Defines the AtlaBootstrapThemePlugin class.
 */
class AtlaBootstrapThemePlugin extends ThemePlugin {

	/**
	 * Set the parent theme and merge the child styles into the parent stylesheet.
	 * @return null
	 */
	public function init() {
		// Define custom Atla subthemes.
		$atla_options = [
			'type' => 'radio',
			'label' => __('plugins.themes.bootstrap3.options.bootstrapTheme.label'),
			'description' => __('plugins.themes.bootstrap3.options.bootstrapTheme.description'),
			'options' => [
				['value' => 'atla-theolib', 'label' => 'Atla (Theo Lib)'],
				['value' => 'atla-other', 'label' => 'Atla (Others)']
			]
		];

		// Set parent theme and add custom Atla subthemes.
		$this->setParent('bootstrapthreethemeplugin');
		$this->parent->addOption('bootstrapTheme', 'FieldOptions', $atla_options);

//		// Override default styles for the "default" subtheme. Cookie Pro styling handled separately.
//		$subtheme = $this->parent->getOption('bootstrapTheme');
//		if ($subtheme == 'bootstrap3') {
//			$this->addStyle('child-stylesheet', 'styles/index.less');
//			$this->modifyStyle('bootstrap', ['addLess' => ['styles/cookiepro.less']]);
//		}
//
//		else {
//			$this->modifyStyle("bootstrapTheme-{$subtheme}", ['addLess' => ['styles/cookiepro.less']]);
//		}
	}

	/**
	 * Get the display name of this theme.
	 * @return string
	 */
	function getDisplayName() {
		return 'Bootstrap3 Theme (Atla)';
	}

	/**
	 * Get the description of this plugin.
	 * @return string
	 */
	function getDescription() {
		return 'Atla implementation of the Bootstrap3 theme. Tested with Bootstrap version 3.2.0.3.';
	}
}
