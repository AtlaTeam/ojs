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

		// Override default styles for the "default" subtheme. Cookie Pro styling handled separately.
		$subtheme = $this->parent->getOption('bootstrapTheme');
		if ($subtheme == 'bootstrap3') {
			$this->addStyle('child-stylesheet', 'styles/atla.less');
			$this->modifyStyle('bootstrap', ['addLess' => ['styles/cookiepro.less']]);
		}

		else {
			$this->modifyStyle("bootstrapTheme-{$subtheme}", ['addLess' => ['styles/cookiepro.less']]);
		}

		// Add "Dev Site" banner.
		if (Application::get()->getRequest()->getBaseUrl() !== 'https://serials.atla.com') {
			$this->modifyStyle('bootstrap', ['addLess' => ['styles/development.less']]);
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
