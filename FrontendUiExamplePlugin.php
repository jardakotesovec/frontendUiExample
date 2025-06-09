<?php

/**
 * @file BackendUiExamplePlugin.inc.php
 *
 * Copyright (c) 2023 Simon Fraser University
 * Copyright (c) 2023 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @brief Backend Ui Example Plugin
 */

namespace APP\plugins\generic\frontendUiExample;

use APP\core\Application;
use PKP\plugins\GenericPlugin;
use APP\template\TemplateManager;
use PKP\plugins\Hook;

class FrontendUiExamplePlugin extends GenericPlugin {
    /**
     * @copydoc Plugin::register()
     *
     * @param null|mixed $mainContextId
     */
    public function register($category, $path, $mainContextId = null)
    {
        if (parent::register($category, $path, $mainContextId)) {
            if ($this->getEnabled($mainContextId)) {
                $request = Application::get()->getRequest();
                $templateMgr = TemplateManager::getManager($request);
                $templateMgr->requiresVueRuntime();
                error_log('Apply hook');
                Hook::add('Templates::Article::Details', $this->displayComponent(...));
                $this->addJavaScript($request, $templateMgr);
                $templateMgr->addStyleSheet('frontEndUiExampleStyle',"{$request->getBaseUrl()}/{$this->getPluginPath()}/public/build/frontUiExample.css", [
                    'contexts' => ['frontend']
                ] );

            }
            return true;
        }
        return false;
    }

	function displayComponent($hookName, $params) {
        error_log('displayComponent');

		$templateMgr = $params[1];
		$output =& $params[2];

        
        $templateMgr->assign('fuiData', [
            "titleLabel" => __('plugins.generic.frontendUiExample.displayName'), 
            "itemsList" => ['item one', 'item two']
        ]);
        error_log('displayComponent');
        $output .= $templateMgr->fetch($this->getTemplateResource('helloworld.tpl'));

		return false;

	}

    public function addJavaScript($request, $templateMgr)
    {
        $templateMgr->addJavaScript(
            'FrontendUiExample',
            "{$request->getBaseUrl()}/{$this->getPluginPath()}/public/build/frontUiExample.js",
            [
                'inline' => false,
                'contexts' => ['frontend'],
                'priority' => TemplateManager::STYLE_SEQUENCE_LAST
            ]
        );
    }

    /**
     * Get the display name of this plugin.
     * @return String
     */
    function getDisplayName() {
        return __('plugins.generic.frontendUiExample.displayName');
    }

    /**
     * Get a description of the plugin.
     */
    function getDescription() {
        return __('plugins.generic.frontendUiExample.description');
    }

}
