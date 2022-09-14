<?php
/**
 * @file plugins/themes/great-baptist-bootstrap/GreatBaptistBootstrapThemePlugin.inc.php
 *
 * Copyright (c) 2021 Atla
 *
 * @brief Bootstrap3 (GCBJM) child theme.
 */

import('lib.pkp.classes.plugins.ThemePlugin');

/**
 * Defines the GreatBaptistBootstrapThemePlugin class.
 */
class GreatBaptistBootstrapThemePlugin extends ThemePlugin {

	/**
	 * Set the parent theme and merge the child styles into the parent stylesheet.
	 * @return null
	 */
	public function init() {
		// Define custom Atla subthemes.
		$atla_options = [
			'type' => 'radio',
			'label' => 'Bootstrap Theme (GCBJM)',
			'description' => 'Select either the default bootstrap subtheme (only custom templates) or the GCBJM subtheme (with both custom templates and css).',
			'options' => [
				['value' => 'bootstrap3', 'label' => 'Default Bootstrap Theme'],
				['value' => 'gcbjm', 'label' => 'GCBJM'],
			]
		];

		// Set parent theme and add custom Atla subthemes.
		$this->setParent('bootstrapthreethemeplugin');
		$this->addOption('bootstrapTheme', 'FieldOptions', $atla_options);

		// Obtain subtheme name. Set to default bootstrap if none selected.
		$subtheme = !empty($this->getOption('bootstrapTheme')) ? $this->getOption('bootstrapTheme') : 'bootstrap3';

		// Handling for Atla subthemes.
		if ($subtheme === 'gcbjm') {
			$this->addStyle('child-stylesheet', 'styles/' . $subtheme . '.less');
			$this->modifyStyle($subtheme, ['addLess' => ['styles/cookiepro.less']]);
		}

		// Handling for default bootstrap style.
		else {
			$iconFontPath = Application::get()->getRequest()->getBaseUrl() . '/' . $this->getPluginPath() . '/bootstrap/fonts/';
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
		return 'Bootstrap3 Theme (GCBJM)';
	}

	/**
	 * Get the description of this plugin.
	 * @return string
	 */
	function getDescription() {
		return 'Boostrap3 child theme customized for GCBJM. Tested with Bootstrap theme version 3.2.0.3.';
	}
}
