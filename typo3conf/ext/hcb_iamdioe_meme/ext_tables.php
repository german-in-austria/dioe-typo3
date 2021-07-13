<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'HcbIamDioeMeme.HcbIamdioeMeme',
            'Fememegenerator',
            'Meme Generator'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'HcbIamDioeMeme.HcbIamdioeMeme',
            'Fememelist',
            'Meme Auflistung'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('hcb_iamdioe_meme', 'Configuration/TypoScript', 'iamDioe Meme');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_hcbiamdioememe_domain_model_memeentrie', 'EXT:hcb_iamdioe_meme/Resources/Private/Language/locallang_csh_tx_hcbiamdioememe_domain_model_memeentrie.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_hcbiamdioememe_domain_model_memeentrie');

    }
);
