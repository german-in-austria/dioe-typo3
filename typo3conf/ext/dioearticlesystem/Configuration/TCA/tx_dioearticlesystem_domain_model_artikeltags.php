<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_artikeltags',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
        ],
        'searchFields' => 'name,beschreibung,color',
        'iconfile' => 'EXT:dioearticlesystem/Resources/Public/Icons/tx_dioearticlesystem_domain_model_artikeltags.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, name, beschreibung, color',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, name, beschreibung, color'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_dioearticlesystem_domain_model_artikeltags',
                'foreign_table_where' => 'AND {#tx_dioearticlesystem_domain_model_artikeltags}.{#pid}=###CURRENT_PID### AND {#tx_dioearticlesystem_domain_model_artikeltags}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],

        'name' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_artikeltags.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'beschreibung' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_artikeltags.beschreibung',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'color' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_artikeltags.color',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],

    ],
];
