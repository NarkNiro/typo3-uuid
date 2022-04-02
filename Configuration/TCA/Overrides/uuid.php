<?php

(function () {
    // Adds a field uuid to all TCA defines
    foreach ($GLOBALS['TCA'] as $tableName => $tableDefinition) {
        if (isset($GLOBALS['TCA'][$tableName]['columns']['uuid'])) {
            continue;
        }

        $GLOBALS['TCA'][$tableName]['columns']['uuid'] = [
            'exclude' => true,
            'label' => 'UUID',
            'config' => [
                'type' => 'input',
                'readOnly' => true,
            ],
        ];
    }
})();
