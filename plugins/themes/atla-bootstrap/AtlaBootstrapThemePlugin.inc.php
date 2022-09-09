<?php
/**
 * @file plugins/themes/atla-tl-bootstrap/AtlaBootstrapThemePlugin.inc.php
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
			'label' => 'Bootstrap Theme (Atla)',
			'description' => 'Select either the default bootstrap subtheme (only custom templates) or the Atla subtheme (with both custom templates and css).',
			'options' => [
				['value' => 'bootstrap3', 'label' => 'Default Bootstrap Theme'],
				['value' => 'atla-tl', 'label' => 'Atla'],
			]
		];

		// Set parent theme and add custom Atla subthemes.
		$this->setParent('bootstrapthreethemeplugin');
		$this->addOption('bootstrapTheme', 'FieldOptions', $atla_options);

		// Obtain subtheme name. Set to default bootstrap if none selected.
		$subtheme = !empty($this->getOption('bootstrapTheme')) ? $this->getOption('bootstrapTheme') : 'bootstrap3';

		// Determine the path to the glyphicons font in Bootstrap.
		$iconFontPath = Application::get()->getRequest()->getBaseUrl() . '/' . $this->getPluginPath() . '/bootstrap/fonts/';

		// Handling for Atla subthemes.
		if ($subtheme === 'atla-tl') {
			$this->addStyle('atla-tl', 'styles/' . $subtheme . 'less');
			$this->modifyStyle($subtheme, ['addLess' => ['styles/cookiepro.less']]);
		}

		// Handling for default bootstrap style (set for parent theme).
		else {
			$this->addStyle('bootstrap', 'styles/bootstrap.less');
			$this->modifyStyle('bootstrap', ['addLessVariables' => '@icon-font-path:"' . $iconFontPath . '";']);
			$this->modifyStyle('bootstrap', ['addLess' => ['styles/cookiepro.less']]);
		}
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
