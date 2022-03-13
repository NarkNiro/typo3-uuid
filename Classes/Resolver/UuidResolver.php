<?php
declare(strict_types = 1);

namespace NarkNiro\Uuid\Resolver;

use Doctrine\DBAL\Driver\Statement;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class UuidResolver
{
    public static function findRecordBy(string $uuid, string $table): ?int
    {
        if (!isset($GLOBALS['TCA'][$table]['columns']['uuid'])) {
            throw new \RuntimeException(sprintf('The table %s or column uuid not exist', $table), 1615973066);
        }

        /** @var ConnectionPool $connectionPool */
        $connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
        $queryBuilder = $connectionPool->getQueryBuilderForTable($table);

        $result = $queryBuilder->select('uid')
            ->from($table)
            ->where(
                $queryBuilder->expr()->eq('uuid', $queryBuilder->createNamedParameter($uuid))
            )->execute();

        if (!$result instanceof Statement) {
            return null;
        }

        $row = $result->fetch();

        return (int)$row['uid'] > 0 ? (int)$row['uid'] : null;
    }

    public static function findByUuid(string $uuid): ?int
    {
        /** @var string[] $tables */
        $tables = array_keys($GLOBALS['TCA']);

        if (empty($tables)) {
            throw new \RuntimeException('No tables could be found', 1615974215);
        }

        /** @var ConnectionPool $connectionPool */
        $connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);

        $record = [];
        foreach ($tables as $table) {
            if (!isset($GLOBALS['TCA'][$table]['columns']['uuid'])) {
                continue;
            }

            $queryBuilder = $connectionPool->getQueryBuilderForTable($table);

            $result = $queryBuilder->select('uid')
                ->from($table)
                ->where(
                    $queryBuilder->expr()->eq('uuid', $queryBuilder->createNamedParameter($uuid))
                )->execute();

            if (!$result instanceof Statement) {
                continue;
            }

            if ($result->rowCount() > 0) {
                $record = $result->fetch() ?? [];
                break;
            }
        }

        return (int)$record['uid'] > 0 ? $record['uid'] : null;
    }
}
