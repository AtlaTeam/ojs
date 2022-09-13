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
		$this->setParent('bootstrapthreethemeplugin');
		$this->addStyle('child-stylesheet', 'styles/bootswatch.less');
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
