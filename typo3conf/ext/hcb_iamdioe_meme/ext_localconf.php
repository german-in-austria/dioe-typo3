<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'HcbIamDioeMeme.HcbIamdioeMeme',
            'Fememegenerator',
            [
                'MemeEntrie' => 'generator, generatorAjax'
            ],
            // non-cacheable actions
            [
                'MemeEntrie' => 'generator, generatorAjax'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'HcbIamDioeMeme.HcbIamdioeMeme',
            'Fememelist',
            [
                'MemeEntrie' => 'memelist, memelistAjax'
            ],
            // non-cacheable actions
            [
                'MemeEntrie' => 'memelist, memelistAjax'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    fememegenerator {
                        iconIdentifier = hcb_iamdioe_meme-plugin-fememegenerator
                        title = LLL:EXT:hcb_iamdioe_meme/Resources/Private/Language/locallang_db.xlf:tx_hcb_iamdioe_meme_fememegenerator.name
                        description = LLL:EXT:hcb_iamdioe_meme/Resources/Private/Language/locallang_db.xlf:tx_hcb_iamdioe_meme_fememegenerator.description
                        tt_content_defValues {
                            CType = list
                            list_type = hcbiamdioememe_fememegenerator
                        }
                    }
                    fememelist {
                        iconIdentifier = hcb_iamdioe_meme-plugin-fememelist
                        title = LLL:EXT:hcb_iamdioe_meme/Resources/Private/Language/locallang_db.xlf:tx_hcb_iamdioe_meme_fememelist.name
                        description = LLL:EXT:hcb_iamdioe_meme/Resources/Private/Language/locallang_db.xlf:tx_hcb_iamdioe_meme_fememelist.description
                        tt_content_defValues {
                            CType = list
                            list_type = hcbiamdioememe_fememelist
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'hcb_iamdioe_meme-plugin-fememegenerator',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:hcb_iamdioe_meme/Resources/Public/Icons/user_plugin_fememegenerator.svg']
			);
		
			$iconRegistry->registerIcon(
				'hcb_iamdioe_meme-plugin-fememelist',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:hcb_iamdioe_meme/Resources/Public/Icons/user_plugin_fememelist.svg']
			);
		
    }
);

// Cache deaktivieren (Developing):
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['extbase_reflection']['backend'] = 'TYPO3\\CMS\\Core\\Cache\\Backend\\NullBackend';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['extbase_object']['backend'] = 'TYPO3\\CMS\\Core\\Cache\\Backend\\NullBackend';
