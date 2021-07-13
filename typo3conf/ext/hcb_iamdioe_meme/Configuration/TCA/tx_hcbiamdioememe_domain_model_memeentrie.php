<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:hcb_iamdioe_meme/Resources/Private/Language/locallang_db.xlf:tx_hcbiamdioememe_domain_model_memeentrie',
        'label' => 'memetexte',
        'label_alt' => 'datum,votes,freigegeben,bild,memetag,memetexte,email,alterjahre,geburtsort,wohnort,geschlecht,dialekt,dialektalltag,dialektbezeichnung,teilnahme',
        'label_alt_force' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'datum,votes,freigegeben,bild,memetag,memetexte,email,alterjahre,geburtsort,wohnort,geschlecht,dialekt,dialektalltag,dialektbezeichnung,teilnahme',
        'iconfile' => 'EXT:hcb_iamdioe_meme/Resources/Public/Icons/tx_hcbiamdioememe_domain_model_memeentrie.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, datum, votes, freigegeben, bild, memetag, memetexte, email, alterjahre, geburtsort, wohnort, geschlecht, dialekt, dialektalltag, dialektbezeichnung, teilnahme',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, datum, votes, freigegeben, bild, memetag, memetexte, email, alterjahre, geburtsort, wohnort, geschlecht, dialekt, dialektalltag, dialektbezeichnung, teilnahme, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_hcbiamdioememe_domain_model_memeentrie',
                'foreign_table_where' => 'AND tx_hcbiamdioememe_domain_model_memeentrie.pid=###CURRENT_PID### AND tx_hcbiamdioememe_domain_model_memeentrie.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/Resources/Private/Language/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
            ],
        ],

        'datum' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hcb_iamdioe_meme/Resources/Private/Language/locallang_db.xlf:tx_hcbiamdioememe_domain_model_memeentrie.datum',
            'config' => [
                'dbType' => 'datetime',
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 12,
                'eval' => 'datetime',
                'default' => null,
            ],
        ],
        'votes' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hcb_iamdioe_meme/Resources/Private/Language/locallang_db.xlf:tx_hcbiamdioememe_domain_model_memeentrie.votes',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'freigegeben' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hcb_iamdioe_meme/Resources/Private/Language/locallang_db.xlf:tx_hcbiamdioememe_domain_model_memeentrie.freigegeben',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/Resources/Private/Language/locallang_core.xlf:labels.enabled'
                    ]
                ],
                'default' => 0,
            ]
            
        ],
        'bild' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:hcb_iamdioe_meme/Resources/Private/Language/locallang_db.xlf:tx_hcbiamdioememe_domain_model_memeentrie.bild',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'bild',
                [
                    'minitems' => 0,
                    'maxitems' => 1,
                    'foreign_match_fields' => [
                        'fieldname' => 'bild',
                        'tablenames' => 'tx_hcbiamdioememe_domain_model_memeentrie',
                        'table_local' => 'sys_file',
                    ],
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ],
        'memetag' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hcb_iamdioe_meme/Resources/Private/Language/locallang_db.xlf:tx_hcbiamdioememe_domain_model_memeentrie.memetag',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'memetexte' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hcb_iamdioe_meme/Resources/Private/Language/locallang_db.xlf:tx_hcbiamdioememe_domain_model_memeentrie.memetexte',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'email' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hcb_iamdioe_meme/Resources/Private/Language/locallang_db.xlf:tx_hcbiamdioememe_domain_model_memeentrie.email',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'alterjahre' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hcb_iamdioe_meme/Resources/Private/Language/locallang_db.xlf:tx_hcbiamdioememe_domain_model_memeentrie.alterjahre',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'geburtsort' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hcb_iamdioe_meme/Resources/Private/Language/locallang_db.xlf:tx_hcbiamdioememe_domain_model_memeentrie.geburtsort',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'wohnort' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hcb_iamdioe_meme/Resources/Private/Language/locallang_db.xlf:tx_hcbiamdioememe_domain_model_memeentrie.wohnort',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'geschlecht' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hcb_iamdioe_meme/Resources/Private/Language/locallang_db.xlf:tx_hcbiamdioememe_domain_model_memeentrie.geschlecht',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'dialekt' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hcb_iamdioe_meme/Resources/Private/Language/locallang_db.xlf:tx_hcbiamdioememe_domain_model_memeentrie.dialekt',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/Resources/Private/Language/locallang_core.xlf:labels.enabled'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'dialektalltag' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hcb_iamdioe_meme/Resources/Private/Language/locallang_db.xlf:tx_hcbiamdioememe_domain_model_memeentrie.dialektalltag',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'dialektbezeichnung' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hcb_iamdioe_meme/Resources/Private/Language/locallang_db.xlf:tx_hcbiamdioememe_domain_model_memeentrie.dialektbezeichnung',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'teilnahme' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hcb_iamdioe_meme/Resources/Private/Language/locallang_db.xlf:tx_hcbiamdioememe_domain_model_memeentrie.teilnahme',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/Resources/Private/Language/locallang_core.xlf:labels.enabled'
                    ]
                ],
                'default' => 0,
            ]
            
        ],
    
    ],
];
