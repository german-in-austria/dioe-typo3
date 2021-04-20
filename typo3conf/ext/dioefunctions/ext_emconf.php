<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'DiÖ Funktionen',
    'description' => 'Spezielle Funktionen für DiÖ',
    'category' => 'fe',
    'author' => 'HCB',
    'author_email' => 'hcb@hcb.de',
    'state' => 'alpha',
    'author_company' => 'DiÖ',
    'version' => '0.0.1',
		'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-10.4.99',
            'vhs' => '6.0.0',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
