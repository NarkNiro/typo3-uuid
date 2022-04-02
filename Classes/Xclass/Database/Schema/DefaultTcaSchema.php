<?php declare(strict_types = 1);

namespace NarkNiro\Uuid\Xclass\Database\Schema;

use TYPO3\CMS\Core\Database\Schema\DefaultTcaSchema as CoreDefaultTcaSchema;

/**
 * Adds a field uuid to all TYPO3 tables
 */
class DefaultTcaSchema extends CoreDefaultTcaSchema
{
    /**
     * @param mixed[] $tables
     *
     * @return array<mixed>
     */
    protected function enrichSingleTableFields($tables)
    {
        $tables = parent::enrichSingleTableFields($tables);

        foreach ($GLOBALS['TCA'] as $tableName => $tableDefinition) {
            $isTableDefined = $this->isTableDefined($tables, $tableName);
            if (!$isTableDefined) {
                continue;
            }

            $tablePosition = $this->getTableFirstPosition($tables, $tableName);

            if (!$this->isColumnDefinedForTable($tables, $tableName, 'uuid')) {
                $tables[$tablePosition]->addColumn(
                    $this->quote('uuid'),
                    'string',
                    [
                        'default' => '',
                        'notnull' => true,
                        'length' => 255,
                    ]
                );
            }
        }

        return $tables;
    }
}
