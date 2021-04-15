<?php
// plugin signature: <extension key without underscores> '_' <plugin name in lowercase>
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['dioearticlesystem_view'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'dioearticlesystem_view',
    'FILE:EXT:dioearticlesystem/Configuration/FlexForms/View.xml'
);
