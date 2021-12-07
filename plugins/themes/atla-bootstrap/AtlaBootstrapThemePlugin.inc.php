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
		$this->setParent('bootstrapthreethemeplugin');

		// Override default styles for the "default" subtheme.
		$subtheme = $this->parent->getOption('bootstrapTheme');
		if ($subtheme == 'bootstrap3') {
			$this->addStyle('child-stylesheet', 'styles/index.less');
		}

		// Special handling for CookiePro elements on all subthemes.
		$this->modifyStyle('stylesheet', ['addLess' => ['styles/cookiepro.less']]);
	}

	/**
	 * Get the display name of this theme.
	 * @return string
	 */
	function getDisplayName() {
		return 'Atla Bootstrap3 Theme';
	}

	/**
	 * Get the description of this plugin.
	 * @return string
	 */
	function getDescription() {
		return 'Atla implementation of the Bootstrap3 theme. Tested with Bootstrap version 3.2.0.3.';
	}
}
