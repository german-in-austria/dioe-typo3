<?php
defined('TYPO3_MODE') || die();

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Dioearticlesystem',
            'View',
            [
                \DioeArticleSystem\Dioearticlesystem\Controller\DioeArticleController::class => 'list, ajax, show'
            ],
            // non-cacheable actions
            [
                \DioeArticleSystem\Dioearticlesystem\Controller\DioeArticleController::class => 'list, ajax, show'
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        view {
                            iconIdentifier = dioearticlesystem-plugin-view
                            title = LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_view.name
                            description = LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_view.description
                            tt_content_defValues {
                                CType = list
                                list_type = dioearticlesystem_view
                            }
                        }
                    }
                    show = *
                }
           }'
        );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

			$iconRegistry->registerIcon(
				'dioearticlesystem-plugin-view',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:dioearticlesystem/Resources/Public/Icons/user_plugin_view.svg']
			);

    }
);
