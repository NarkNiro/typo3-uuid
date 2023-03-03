<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "uuid"
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'uuid',
    'description' => '',
    'category' => 'module,backend',
    'author' => 'Mark Houben',
    'author_email' => 'markhouben91@gmail.com',
    'state' => 'stable',
    'uploadfolder' => '0',
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.00-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'NarkNiro\\Uuid\\' => 'Classes',
        ],
    ],
];
