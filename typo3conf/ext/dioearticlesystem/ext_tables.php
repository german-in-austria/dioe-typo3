<?php
defined('TYPO3_MODE') || die();

call_user_func(static function() {

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'Dioearticlesystem',
        'View',
        'Diö Artikel View'
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'Dioearticlesystem',
        'web', // Make module a submodule of 'web'
        'beae', // Submodule key
        '', // Position
        [
            \DioeArticleSystem\Dioearticlesystem\Controller\DioeArticleController::class => 'belist, show, new, create, edit, update, delete, export',
        ],
        [
            'access' => 'user,group',
            'icon'   => 'EXT:dioearticlesystem/Resources/Public/Icons/user_mod_beae.svg',
            'labels' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_beae.xlf',
        ]
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('dioearticlesystem', 'Configuration/TypoScript', 'Diö Artikelsystem');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_dioearticlesystem_domain_model_dioearticle', 'EXT:dioearticlesystem/Resources/Private/Language/locallang_csh_tx_dioearticlesystem_domain_model_dioearticle.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_dioearticlesystem_domain_model_dioearticle');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_dioearticlesystem_domain_model_artikeltags', 'EXT:dioearticlesystem/Resources/Private/Language/locallang_csh_tx_dioearticlesystem_domain_model_artikeltags.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_dioearticlesystem_domain_model_artikeltags');

});
