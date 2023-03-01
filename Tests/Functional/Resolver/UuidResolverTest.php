<?php
declare(strict_types = 1);

namespace NarkNiro\Uuid\Tests\Functional\Resolver;

use NarkNiro\Uuid\Resolver\UuidResolver;
use TYPO3\CMS\Core\Authentication\BackendUserAuthentication;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

class UuidResolverTest extends FunctionalTestCase
{
    /** @var string[] */
    protected $testExtensionsToLoad = [
       'typo3conf/ext/uuid',
    ];

    public function setUp(): void
    {
        parent::setUp();

        $GLOBALS['BE_USER'] = GeneralUtility::makeInstance(BackendUserAuthentication::class);

        $this->importDataSet(__DIR__ . '/Fixtures/FindRecordsByUuid.xml');
    }

    /** @test */
    public function returnsANumberAtAUuidAndTable(): void
    {
        $uid = UuidResolver::findRecordBy('92c997e6-852d-450b-af87-b9a3440af6e4', 'pages');

        self::assertNotNull($uid);
        self::assertIsInt($uid);
    }

    /** @test */
    public function returnNullWhenUuidAndTableNotFound(): void
    {
        $uid = UuidResolver::findRecordBy('478af47b-8980-4517-9b1b-4afdcd3b05ba', 'pages');

        self::assertNull($uid);
    }

    /** @test */
    public function returnsANumberAtAUuid(): void
    {
        $uid = UuidResolver::findByUuid('92c997e6-852d-450b-af87-b9a3440af6e4');

        self::assertNotNull($uid);
        self::assertIsInt($uid);
    }

    /** @test */
    public function returnNullWhenUuidNotFound(): void
    {
        $uid = UuidResolver::findByUuid('478af47b-8980-4517-9b1b-4afdcd3b05ba');

        self::assertNull($uid);
    }
}
