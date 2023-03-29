<?php
return [
    'ctrl' => [
        'title' => 'Diö Artikel',
        'label' => 'prev_title',
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
        'searchFields' => 'prev_title,prev_text,a_task_cluster,a_projectpart,detail_title,detail_text,z_name,z_title,z_l_name,z_l_text,p_duration,pub_title,pub_editors_sec,pub_booktitle,pub_publisher,pub_journal,pub_volume,pub_number,pub_series,pub_school,pub_address,pub_edition,pub_pages,pub_isbn,pub_doi,pub_url,pub_note,mee_titel,mee_persons_sec,mee_organisers_sec,mee_organisation_sec,mee_participants_sec,mee_text,mee_event,mee_adress,mee_url,mee_doi,mee_note',
        'iconfile' => 'EXT:dioearticlesystem/Resources/Public/Icons/tx_dioearticlesystem_domain_model_dioearticle.gif',
				'type' => 'a_type',
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, a_type, a_home, a_date, prev_title, prev_text, a_task_cluster, a_projectpart, tags, start_pin, cat_pin, prev_pic, prev_pic_cropping_mode, detail_title, detail_text, detail_pic, detail_pic_cropping_mode, av_files, av_cols, av_aspect_ratio, f_files, z_user, z_name, z_title, z_place, z_l_name, z_share, z_com_share, z_l_text, p_file, p_duration, pub_type, pub_title, pub_editors_sec, pub_year, pub_month, pub_booktitle, pub_publisher, pub_journal, pub_volume, pub_number, pub_series, pub_school, pub_address, pub_edition, pub_pages, pub_keywords, pub_isbn, pub_doi, pub_url, pub_url_date, pub_note, mee_titel, mee_persons_sec, mee_organisers_sec,mee_organisation_sec, mee_participants_sec, mee_time, mee_end_time, mee_show_time, mee_text, mee_event, mee_adress, mee_url, mee_doi, mee_note, mee_keywords',
    ],
    'types' => [
        '0' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, a_type, a_home, a_date, prev_title, prev_text, a_task_cluster, a_projectpart, tags, start_pin, cat_pin, prev_pic, prev_pic_cropping_mode, --div--;Details, detail_title, detail_text, detail_pic, detail_pic_cropping_mode, --div--;Audio/Video, av_files, av_cols, av_aspect_ratio, --div--;Dateien, f_files, --div--;Zitation, z_user, z_name, z_title, z_place, z_l_name, z_share, z_com_share, z_l_text, --div--;Podcast, p_file, p_duration, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
				'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, a_type, a_home, a_date, prev_title, prev_text, a_task_cluster, a_projectpart, tags, start_pin, cat_pin, prev_pic, prev_pic_cropping_mode, --div--;Publikation (BibTex), pub_type, pub_title, pub_editors_sec, pub_year, pub_month, pub_booktitle, pub_publisher, pub_journal, pub_volume, pub_number, pub_series, pub_school, pub_address, pub_edition, pub_pages, pub_keywords, pub_isbn, pub_doi, pub_url, pub_url_date, pub_note, --div--;Dateien, f_files, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
				'2' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, a_type, a_home, a_date, prev_title, prev_text, a_task_cluster, a_projectpart, tags, start_pin, cat_pin, prev_pic, prev_pic_cropping_mode, --div--;Termin, mee_titel, mee_persons_sec, mee_organisers_sec,mee_organisation_sec, mee_participants_sec, mee_time, mee_end_time, mee_show_time, mee_event, mee_adress, mee_url, mee_doi, mee_note, mee_keywords, --div--;Details, detail_title, detail_text, detail_pic, detail_pic_cropping_mode, --div--;Audio/Video, av_files, av_cols, av_aspect_ratio, --div--;Dateien, f_files, --div--;Zitation, z_user, z_name, z_title, z_place, z_l_name, z_share, z_com_share, z_l_text, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
				'3' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, a_type, a_home, a_date, prev_title, prev_text, a_task_cluster, a_projectpart, tags, start_pin, cat_pin, prev_pic, prev_pic_cropping_mode, --div--;Termin, mee_titel, mee_persons_sec, mee_organisers_sec,mee_organisation_sec, mee_participants_sec, mee_time, mee_end_time, mee_show_time, mee_event, mee_adress, mee_url, mee_doi, mee_note, mee_keywords, --div--;Details, detail_title, detail_text, detail_pic, detail_pic_cropping_mode, --div--;Audio/Video, av_files, av_cols, av_aspect_ratio, --div--;Dateien, f_files, --div--;Zitation, z_user, z_name, z_title, z_place, z_l_name, z_share, z_com_share, z_l_text, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
				'4' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, a_type, a_home, a_date, prev_title, prev_text, a_task_cluster, a_projectpart, tags, start_pin, cat_pin, prev_pic, prev_pic_cropping_mode, --div--;Termin, mee_titel, mee_persons_sec, mee_organisers_sec,mee_organisation_sec, mee_participants_sec, mee_time, mee_end_time, mee_show_time, mee_text, mee_event, mee_adress, mee_url, mee_doi, mee_note, mee_keywords, --div--;Details, detail_title, detail_text, detail_pic, detail_pic_cropping_mode, --div--;Audio/Video, av_files, av_cols, av_aspect_ratio, --div--;Dateien, f_files, --div--;Zitation, z_user, z_name, z_title, z_place, z_l_name, z_share, z_com_share, z_l_text, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => false,
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
                'foreign_table' => 'tx_dioearticlesystem_domain_model_dioearticle',
                'foreign_table_where' => 'AND {#tx_dioearticlesystem_domain_model_dioearticle}.{#pid}=###CURRENT_PID### AND {#tx_dioearticlesystem_domain_model_dioearticle}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => false,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
								'default' => true,
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => false,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => false,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'a_type' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.a_type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Beiträge', 0],
										['Publikationen', 1],
										['Vorträge', 2],
										['Veranstaltungen', 3],
										['Lehren', 4],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
				'a_home' => [
            'exclude' => false,
						'onChange' => 'reload',
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.a_home',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['DiÖ', 0],
										['IamDiÖ', 1],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'a_date' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.a_date',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 10,
                'eval' => 'datetime,required',
                'default' => time()
            ],
        ],
				'tags' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.tags',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_dioearticlesystem_domain_model_artikeltags',
                'MM' => 'tx_dioearticlesystem_dioearticle_artikeltags_mm',
                'size' => 5,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],

        ],
        'prev_title' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.prev_title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'prev_text' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.prev_text',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],

        ],
        'a_task_cluster' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.a_task_cluster',
						'config' => [
								'type' => 'select',
								'renderType' => 'selectCheckBox',
								'items' => [
										['TCA', 'a'],
										['TCB', 'b'],
										['TCC', 'c'],
										['TCD', 'd'],
										['TCE', 'e'],
								],
						],
        ],
        'a_projectpart' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.a_projectpart',
						'config' => [
								'type' => 'select',
								'renderType' => 'selectCheckBox',
								'items' => [
										['PP01', 'PP01'],
                    ['PP02', 'PP02'],
                    ['PP03', 'PP03'],
                    ['PP04', 'PP04'],
                    ['PP05', 'PP05'],
                    ['PP06', 'PP06'],
                    ['PP07', 'PP07'],
                    ['PP08', 'PP08'],
                    ['PP09', 'PP09'],
                    ['PP10', 'PP10'],
                    ['PP11', 'PP11'],
								],
						],
        ],
        'start_pin' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.start_pin',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
                'default' => 0,
            ]
        ],
        'cat_pin' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.cat_pin',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
                'default' => 0,
            ]
        ],
        'prev_pic' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.prev_pic',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'prev_pic',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ]
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'prev_pic',
                        'tablenames' => 'tx_dioearticlesystem_domain_model_dioearticle',
                        'table_local' => 'sys_file',
                    ],
                    'maxitems' => 1
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),

        ],
        'prev_pic_cropping_mode' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.prev_pic_cropping_mode',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Eins zu Eins (Standard)', 1],
										['Wie Vorlage', 0],
                ],
								'default' => 1,
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'detail_title' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.detail_title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'detail_text' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.detail_text',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],

        ],
        'detail_pic' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.detail_pic',
            'config' =>
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'detail_pic',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ]
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'detail_pic',
                        'tablenames' => 'tx_dioearticlesystem_domain_model_dioearticle',
                        'table_local' => 'sys_file',
                    ],
                    'maxitems' => 99
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),

        ],
        'detail_pic_cropping_mode' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.detail_pic_cropping_mode',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
									['Eins zu Eins (Standard)', 1],
									['Wie Vorlage', 0],
                ],
								'default' => 1,
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'av_files' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.av_files',
						'config' => [
								'type' => 'flex',
								'ds' => [
									'default' => '
	<T3DataStructure>
			<sheets>
					<sSection>
							<ROOT>
									<TCEforms>
											<sheetTitle>Dateien</sheetTitle>
									</TCEforms>
									<type>array</type>
									<el>
											<dateien>
													<title>Dateien</title>
													<type>array</type>
													<section>1</section>
													<el>
															<datei>
																	<type>array</type>
																	<title>Datei</title>
																	<el>
																		<titel>
																			<TCEforms>
																				<label>Titel</label>
																				<config>
																					<type>input</type>
																					<size>30</size>
																					<eval>trim,required</eval>
																				</config>
																			</TCEforms>
																		</titel>
																		<datei>
																			<TCEforms>
																				<label>Datei (mp3, mp4 empfohlen)</label>
																				<config>
																					<type>group</type>
																					<internal_type>db</internal_type>
																					<appearance>
																						<elementBrowserType>file</elementBrowserType>
																						<elementBrowserAllowed>mp3,mp4,ogg,ogv,wav</elementBrowserAllowed>
																					</appearance>
																					<allowed>sys_file</allowed>
																					<size>1</size>
																					<minitems>0</minitems>
																					<maxitems>1</maxitems>
																					<show_thumbs>1</show_thumbs>
																				</config>
																			</TCEforms>
																		</datei>
																		<youtube>
																			<TCEforms>
																				<label>YouTube (Video-ID)</label>
																				<config>
																					<type>input</type>
																					<size>30</size>
																					<eval>trim</eval>
																				</config>
																			</TCEforms>
																		</youtube>
																		<copyright>
																			<TCEforms>
																				<label>Copyright (Für Youtube)</label>
																				<config>
																					<type>input</type>
																					<size>30</size>
																					<eval>trim</eval>
																				</config>
																			</TCEforms>
																		</copyright>
																	</el>
															</datei>
													</el>
											</dateien>
									</el>
							</ROOT>
					</sSection>
			</sheets>
	</T3DataStructure>
									'
								]
            ]
            // 'config' =>
            // \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            //     'av_files',
            //     [
            //         'appearance' => [
            //             'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference'
            //         ],
            //         'foreign_types' => [
            //             '0' => [
            //                 'showitem' => '
            //                 --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
            //                 --palette--;;filePalette'
            //             ],
            //             \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
            //                 'showitem' => '
            //                 --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
            //                 --palette--;;filePalette'
            //             ],
            //             \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
            //                 'showitem' => '
            //                 --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
            //                 --palette--;;filePalette'
            //             ],
            //             \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
            //                 'showitem' => '
            //                 --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
            //                 --palette--;;filePalette'
            //             ],
            //             \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
            //                 'showitem' => '
            //                 --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
            //                 --palette--;;filePalette'
            //             ],
            //             \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
            //                 'showitem' => '
            //                 --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
            //                 --palette--;;filePalette'
            //             ]
            //         ],
            //         'foreign_match_fields' => [
            //             'fieldname' => 'av_files',
            //             'tablenames' => 'tx_dioearticlesystem_domain_model_dioearticle',
            //             'table_local' => 'sys_file',
            //         ],
            //         'maxitems' => 99
            //     ]
            // ),

        ],
        'av_cols' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.av_cols',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['2 Spalten', 6],
										['1 Spalte', 12],
										['3 Spalten', 4],
                ],
                'size' => 1,
								'default' => 6,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'av_aspect_ratio' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.av_aspect_ratio',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
									['Wie Vorlage (Für Audio-Dateien)', 0],
									['16:9 (Für Video-Dateien/Youtube)', 1],
									['4:3 (Für Video-Dateien/Youtube)', 2],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'f_files' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.f_files',
            'config' =>
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'f_files',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference'
                    ],
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ]
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'f_files',
                        'tablenames' => 'tx_dioearticlesystem_domain_model_dioearticle',
                        'table_local' => 'sys_file',
                    ],
                    'maxitems' => 99
                ]
            ),

        ],
        'z_user' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.z_user',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Ersteller des Datensatzes verwenden', -2],
										['DiÖ', -1],
                ],
								'foreign_table' => 'be_users',
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'z_name' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.z_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'z_title' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.z_title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'z_place' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.z_place',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['DiÖ-Online', 0],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'z_l_name' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.z_l_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'z_share' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.z_share',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Keine Lizenz', 'kl'],
										['Ja', ''],
										['Nein', '-nd'],
										['Ja, solange andere unter denselben Bedingungen weitergeben', '-sa'],
                ],
                'size' => 1,
								'minitems' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'z_com_share' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.z_com_share',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Ja', ''],
										['Nein', '-nc'],
                ],
                'size' => 1,
								'minitems' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'z_l_text' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.z_l_text',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'p_file' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.p_file',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'p_file',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference'
                    ],
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ]
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'p_file',
                        'tablenames' => 'tx_dioearticlesystem_domain_model_dioearticle',
                        'table_local' => 'sys_file',
                    ],
                    'maxitems' => 1
                ],
                'mp3'
            ),

        ],
        'p_duration' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.p_duration',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'pub_type' => [
            'exclude' => false,
						'onChange' => 'reload',
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.pub_type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Bitte auswählen!', 0],
										['Artikel (article)', 1],
										['Buch (book)', 2],
										['In Buch (inbook)', 3],
										['Masterthesis (masterthesis)', 4],
										['Doktorarbeit (phdthesis)', 5],
										['Unveröffentlicht (unpublished)', 6],
										['Online (online)', 7],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'pub_title' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.pub_title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'pub_editors_sec' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.pub_editors_sec',
            'config' => [
								'type' => 'flex',
								'ds' => [
									'default' => '
	<T3DataStructure>
			<sheets>
					<sSection>
							<ROOT>
									<TCEforms>
											<sheetTitle>Autoren/Herausgeber(author/editor)</sheetTitle>
									</TCEforms>
									<type>array</type>
									<el>
											<editor>
													<title>Autoren/Herausgeber(author/editor)</title>
													<type>array</type>
													<section>1</section>
													<el>
															<editorobj>
																	<type>array</type>
																	<title>Autor/Herausgeber</title>
																	<el>
																		<authorNachname>
																			<TCEforms>
																				<label>Nachname (author/editor)</label>
																				<config>
																					<type>input</type>
																					<size>30</size>
																					<eval>trim,required</eval>
																				</config>
																			</TCEforms>
																		</authorNachname>
																		<authorVorname>
																			<TCEforms>
																				<label>Vorname (author/editor)</label>
																				<config>
																					<type>input</type>
																					<size>30</size>
																					<eval>trim,required</eval>
																				</config>
																			</TCEforms>
																		</authorVorname>
																		<authorIsEditor>
																			<TCEforms>
																				<label>Ist Editor</label>
																				<config>
																					<type>check</type>
																					<default>0</default>
																				</config>
																				<displayCond>
																					<or>
																						<val1>FIELD:parentRec.pub_type:=:2</val1>
																						<val2>FIELD:parentRec.pub_type:=:3</val2>
																					</or>
																				</displayCond>
																			</TCEforms>
																		</authorIsEditor>
																	</el>
															</editorobj>
													</el>
											</editor>
									</el>
							</ROOT>
					</sSection>
			</sheets>
	</T3DataStructure>
									'
								]
            ]
        ],
        'pub_year' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.pub_year',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'pub_month' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.pub_month',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'pub_booktitle' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.pub_booktitle',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'pub_publisher' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.pub_publisher',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'pub_journal' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.pub_journal',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'pub_volume' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.pub_volume',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'pub_number' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.pub_number',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'pub_series' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.pub_series',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'pub_school' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.pub_school',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'pub_address' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.pub_address',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'pub_edition' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.pub_edition',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'pub_pages' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.pub_pages',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'pub_keywords' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.pub_keywords',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['-- Label --', 0],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'pub_isbn' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.pub_isbn',
						'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'pub_doi' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.pub_doi',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'pub_url' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.pub_url',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'pub_url_date' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.pub_url_date',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 7,
                'eval' => 'date',
                'default' => time()
            ],
        ],
        'pub_note' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.pub_note',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'mee_titel' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.mee_titel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'mee_persons_sec' => [
            'exclude' => false,
						'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.mee_persons_sec',
						'config' => [
								'type' => 'flex',
								'ds' => [
									'default' => '
	<T3DataStructure>
			<sheets>
					<sSection>
							<ROOT>
									<TCEforms>
											<sheetTitle>Vortragende</sheetTitle>
									</TCEforms>
									<type>array</type>
									<el>
											<vortragende>
													<title>Vortragende</title>
													<type>array</type>
													<section>1</section>
													<el>
															<vortragender>
																	<type>array</type>
																	<title>Vortragender</title>
																	<el>
																		<nachname>
																			<TCEforms>
																				<label>Nachname</label>
																				<config>
																					<type>input</type>
																					<size>30</size>
																					<eval>trim,required</eval>
																				</config>
																			</TCEforms>
																		</nachname>
																		<vorname>
																			<TCEforms>
																				<label>Vorname</label>
																				<config>
																					<type>input</type>
																					<size>30</size>
																					<eval>trim,required</eval>
																				</config>
																			</TCEforms>
																		</vorname>
																	</el>
															</vortragender>
													</el>
											</vortragende>
									</el>
							</ROOT>
					</sSection>
			</sheets>
	</T3DataStructure>
									'
								]
						]
        ],
        'mee_organisers_sec' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.mee_organisers_sec',
            'config' => [
							'type' => 'flex',
							'ds' => [
								'default' => '
<T3DataStructure>
		<sheets>
				<sSection>
						<ROOT>
								<TCEforms>
										<sheetTitle>Organisatoren</sheetTitle>
								</TCEforms>
								<type>array</type>
								<el>
										<organisatoren>
												<title>Organisatoren</title>
												<type>array</type>
												<section>1</section>
												<el>
														<organisator>
																<type>array</type>
																<title>Organisator</title>
																<el>
																	<nachname>
																		<TCEforms>
																			<label>Nachname</label>
																			<config>
																				<type>input</type>
																				<size>30</size>
																				<eval>trim,required</eval>
																			</config>
																		</TCEforms>
																	</nachname>
																	<vorname>
																		<TCEforms>
																			<label>Vorname</label>
																			<config>
																				<type>input</type>
																				<size>30</size>
																				<eval>trim,required</eval>
																			</config>
																		</TCEforms>
																	</vorname>
																</el>
														</organisator>
												</el>
										</organisatoren>
								</el>
						</ROOT>
				</sSection>
		</sheets>
</T3DataStructure>
								'
							]
            ]
        ],
				'mee_organisation_sec' => [
            'exclude' => false,
            'label' => 'Organisationen',
            'config' => [
							'type' => 'flex',
							'ds' => [
								'default' => '
<T3DataStructure>
		<sheets>
				<sSection>
						<ROOT>
								<TCEforms>
										<sheetTitle>Organisationen</sheetTitle>
								</TCEforms>
								<type>array</type>
								<el>
										<organisationen>
												<title>Organisationen</title>
												<type>array</type>
												<section>1</section>
												<el>
														<organisation>
																<type>array</type>
																<title>Organisation</title>
																<el>
																	<organisation>
																		<TCEforms>
																			<label>Organisation</label>
																			<config>
																				<type>input</type>
																				<size>30</size>
																				<eval>trim,required</eval>
																			</config>
																		</TCEforms>
																	</organisation>
																	<url>
																		<TCEforms>
																			<label>URL</label>
																			<config>
																				<type>input</type>
																				<size>30</size>
																				<eval>trim</eval>
																			</config>
																		</TCEforms>
																	</url>
																</el>
														</organisation>
												</el>
										</organisationen>
								</el>
						</ROOT>
				</sSection>
		</sheets>
</T3DataStructure>
								'
							]
            ]
        ],
        'mee_participants_sec' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.mee_participants_sec',
            'config' => [
							'type' => 'flex',
							'ds' => [
								'default' => '
<T3DataStructure>
		<sheets>
				<sSection>
						<ROOT>
								<TCEforms>
										<sheetTitle>Teilnehmer</sheetTitle>
								</TCEforms>
								<type>array</type>
								<el>
										<teilnehmer>
												<title>Teilnehmer</title>
												<type>array</type>
												<section>1</section>
												<el>
														<teilnehmers>
																<type>array</type>
																<title>Teilnehmer</title>
																<el>
																	<nachname>
																		<TCEforms>
																			<label>Nachname</label>
																			<config>
																				<type>input</type>
																				<size>30</size>
																				<eval>trim,required</eval>
																			</config>
																		</TCEforms>
																	</nachname>
																	<vorname>
																		<TCEforms>
																			<label>Vorname</label>
																			<config>
																				<type>input</type>
																				<size>30</size>
																				<eval>trim,required</eval>
																			</config>
																		</TCEforms>
																	</vorname>
																	<institution>
																		<TCEforms>
																			<label>Institution</label>
																			<config>
																				<type>input</type>
																				<size>30</size>
																				<eval>trim</eval>
																			</config>
																		</TCEforms>
																	</institution>
																	<url>
																		<TCEforms>
																			<label>URL</label>
																			<config>
																				<type>input</type>
																				<size>30</size>
																				<eval>trim</eval>
																			</config>
																		</TCEforms>
																	</url>
																</el>
														</teilnehmers>
												</el>
										</teilnehmer>
								</el>
						</ROOT>
				</sSection>
		</sheets>
</T3DataStructure>
								'
							]
            ]
        ],
        'mee_time' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.mee_time',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 10,
                'eval' => 'datetime',
                'default' => time()
            ],
        ],
        'mee_end_time' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.mee_end_time',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 10,
                'eval' => 'datetime',
                'default' => time()
            ],
        ],
        'mee_show_time' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.mee_show_time',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
                'default' => 0,
            ]
        ],
        'mee_text' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.mee_text',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'mee_event' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.mee_event',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'mee_adress' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.mee_adress',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'mee_url' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.mee_url',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'mee_doi' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.mee_doi',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'mee_note' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.mee_note',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'mee_keywords' => [
            'exclude' => false,
            'label' => 'LLL:EXT:dioearticlesystem/Resources/Private/Language/locallang_db.xlf:tx_dioearticlesystem_domain_model_dioearticle.mee_keywords',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['-- Label --', 0],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],

    ],
];
