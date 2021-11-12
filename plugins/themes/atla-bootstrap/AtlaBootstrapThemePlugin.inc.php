<?php
/**
 * @file plugins/themes/atla-bootstrap/AtlaBootstrapThemePlugin.inc.php
 *
 * Copyright (c) 2021 Atla
 *
 * @brief Atla Booststrap3 child theme.
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
		$this->setParent('bootstrapthemeplugin');
		$this->modifyStyle('stylesheet', ['addLess' => ['styles/index.less']]);
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
