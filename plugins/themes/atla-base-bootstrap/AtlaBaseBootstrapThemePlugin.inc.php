<?php
/**
 * @file plugins/themes/atla-base-bootstrap/AtlaBaseBootstrapThemePlugin.inc.php
 *
 * Copyright (c) 2021 Atla
 *
 * @brief Default Bootstrap3 theme with Atla-provided fixes.
 */

import('lib.pkp.classes.plugins.ThemePlugin');

/**
 * Defines the AtlaBootstrapThemePlugin class.
 */
class AtlaBaseBootstrapThemePlugin extends ThemePlugin {

	/**
	 * Set the parent theme and merge the child styles into the parent stylesheet.
	 * @return null
	 */
	public function init() {
		$this->setParent('bootstrapthreethemeplugin');

		// Override default styles for the "default" subtheme. 
		$subtheme = $this->parent->getOption('bootstrapTheme');
	}

	/**
	 * Get the display name of this theme.
	 * @return string
	 */
	function getDisplayName() {
		return 'Atla Base Boostrap Theme';
	}

	/**
	 * Get the description of this plugin.
	 * @return string
	 */
	function getDescription() {
		return 'Default Boostrap theme with various patches and fixes. Tested with Bootstrap theme version 3.2.0.3.';
	}
}
