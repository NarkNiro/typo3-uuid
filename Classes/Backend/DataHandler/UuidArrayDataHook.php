<?php declare(strict_types = 1);

namespace NarkNiro\Uuid\Backend\DataHandler;

use Ramsey\Uuid\Uuid;

class UuidArrayDataHook implements PostProcessFieldArrayDataInterface
{
    /**
     * @param string|int $id
     * @param array<string, mixed> $fieldArray
     */
    public function processDatamap_postProcessFieldArray(
        string $status,
        string $table,
        $id,
        array &$fieldArray,
        \TYPO3\CMS\Core\DataHandling\DataHandler &$dataHandler
    ): void {
        if ($status !== 'new') {
            return;
        }

        if (!isset($GLOBALS['TCA'][$table]['columns']['uuid'])) {
            return;
        }

        if (isset($fieldArray['uuid']) && $fieldArray['uuid'] !== '') {
            return;
        }

        $fieldArray['uuid'] = Uuid::uuid4();
    }
}
