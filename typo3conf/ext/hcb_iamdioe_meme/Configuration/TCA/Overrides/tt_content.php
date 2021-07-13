<?php


// include the flexform for the plugin
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['hcbiamdioememe_fememegenerator'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('hcbiamdioememe_fememegenerator', 'FILE:EXT:hcb_iamdioe_meme/Configuration/FlexForms/flexform_memegenerator.xml');

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['hcbiamdioememe_fememelist'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('hcbiamdioememe_fememelist', 'FILE:EXT:hcb_iamdioe_meme/Configuration/FlexForms/flexform_memelist.xml');
