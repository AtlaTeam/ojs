<?php
/**
 * @file plugins/themes/atla-other-bootstrap/AtlaOtherBootstrapThemePlugin.inc.php
 *
 * Copyright (c) 2021 Atla
 *
 * @brief Atla Other Bootstrap3 child theme.
 */

import('lib.pkp.classes.plugins.ThemePlugin');

/**
 * Defines the AtlaOtherBootstrapThemePlugin class.
 */
class AtlaOtherBootstrapThemePlugin extends ThemePlugin {

	/**
	 * Set the parent theme and merge the child styles into the parent stylesheet.
	 * @return null
	 */
	public function init() {
		$this->setParent('bootstrapthreethemeplugin');

		// Override default styles for the "default" subtheme.
		$subtheme = $this->parent->getOption('bootstrapTheme');
		if ($subtheme == 'bootstrap3') {
			$this->addStyle('child-stylesheet', 'styles/atla.less');
			$this->appendStyles('bootstrap');
		}

		// Modify for all other subthemes.
		else {
			$this->appendStyles("bootstrapTheme-{$subtheme}");
		}
	}

	/**
	 * Tack on additional stylesheets for the given subtheme.
	 *
	 * @param string $subtheme
	 *  The subtheme to modify.
	 */
	private function appendStyles($subtheme) {
		// Styling for cookie banner.
		$this->modifyStyle($subtheme, ['addLess' => ['styles/cookiepro.less']]);

		// Styling for dev site banner.
		if (Application::get()->getRequest()->getBaseUrl() !== 'https://serials.atla.com') {
			$this->modifyStyle($subtheme, ['addLess' => ['styles/development.less']]);
		}
	}

	/**
	 * Get the display name of this theme.
	 * @return string
	 */
	function getDisplayName() {
		return 'Bootstrap3 Theme (Atla - Other)';
	}

	/**
	 * Get the description of this plugin.
	 * @return string
	 */
	function getDescription() {
		return 'Atla (Other) implementation of the Bootstrap3 theme. Requires the Atla Bootstrap theme to be installed. Tested with Bootstrap version 3.2.0.3.';
	}
}
