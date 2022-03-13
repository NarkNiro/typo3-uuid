<?php declare(strict_types = 1);

(function () {
    $columns = [
        'uuid' => [
            'exclude' => true,
            'label' => 'UUID',
            'config' => [
                'type' => 'input',
                'readOnly' => true,
            ],
        ],
    ];

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('sys_file_storage', $columns);
})();
