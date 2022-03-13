<?php declare(strict_types = 1);

namespace NarkNiro\Uuid\Backend\DataHandler;

use Ramsey\Uuid\Uuid;

class UuidArrayDataHook implements PostProcessFieldArrayDataInterface
{
    public function processDatamap_postProcessFieldArray(
        string $status,
        string $table,
        $id,
        array &$fieldArray,
        \TYPO3\CMS\Core\DataHandling\DataHandler &$dataHandler
    ): void {
        if ($status !== 'NEW') {
            return;
        }

        if (!isset($GLOBALS['TCA'][$table]['columns']['uuid'])) {
            return;
        }

        if ($fieldArray['uuid'] !== '') {
            return;
        }

        $fieldArray['uuid'] = Uuid::uuid4();
    }
}
