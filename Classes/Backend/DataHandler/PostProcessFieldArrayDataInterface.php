<?php declare(strict_types=1);

namespace NarkNiro\Uuid\Backend\DataHandler;

interface PostProcessFieldArrayDataInterface
{
    public function processDatamap_postProcessFieldArray(
        string $status,
        string $table,
        $id,
        array &$fieldArray,
        \TYPO3\CMS\Core\DataHandling\DataHandler &$dataHandler
    ): void;
}
