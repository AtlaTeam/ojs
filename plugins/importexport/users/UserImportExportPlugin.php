<?php

/**
 * @file plugins/importexport/users/UserImportExportPlugin.php
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2003-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @class UserImportExportPlugin
 * @ingroup plugins_importexport_user
 *
 * @brief User XML import/export plugin
 */

namespace APP\plugins\importexport\users;

use PKP\db\DAORegistry;

class UserImportExportPlugin extends \PKP\plugins\importexport\users\PKPUserImportExportPlugin
{
    /**
     * @copydoc PKPImportExportPlugin::usage
     */
    public function usage($scriptName)
    {
        echo __('plugins.importexport.users.cliUsage', [
            'scriptName' => $scriptName,
            'pluginName' => $this->getName()
        ]) . "\n\n";
        echo __('plugins.importexport.users.cliUsage.examples', [
            'scriptName' => $scriptName,
            'pluginName' => $this->getName()
        ]) . "\n\n";
    }

    /**
     * @see PKPImportExportPlugin::executeCLI()
     */
    public function executeCLI($scriptName, &$args)
    {
        $command = array_shift($args);
        $xmlFile = array_shift($args);
        $journalPath = array_shift($args);

        $journalDao = DAORegistry::getDAO('JournalDAO'); /** @var JournalDAO $journalDao */

        $journal = $journalDao->getByPath($journalPath);

        if (!$journal) {
            if ($journalPath != '') {
                echo __('plugins.importexport.common.cliError') . "\n";
                echo __('plugins.importexport.common.error.unknownContext', ['contextPath' => $journalPath]) . "\n\n";
            }
            $this->usage($scriptName);
            return;
        }

        if ($xmlFile && $this->isRelativePath($xmlFile)) {
            $xmlFile = PWD . '/' . $xmlFile;
        }
        $outputDir = dirname($xmlFile);
        if (!is_writable($outputDir) || (file_exists($xmlFile) && !is_writable($xmlFile))) {
            echo __('plugins.importexport.common.cliError') . "\n";
            echo __('plugins.importexport.common.export.error.outputFileNotWritable', ['param' => $xmlFile]) . "\n\n";
            $this->usage($scriptName);
            return;
        }

        switch ($command) {
            case 'import':
                $this->importUsers(file_get_contents($xmlFile), $journal, null);
                return;
            case 'export':
                if ($xmlFile != '') {
                    if (empty($args)) {
                        file_put_contents($xmlFile, $this->exportAllUsers($journal, null));
                        return;
                    } else {
                        file_put_contents($xmlFile, $this->exportUsers($args, $journal, null));
                        return;
                    }
                }
                break;
        }
        $this->usage($scriptName);
    }
}
