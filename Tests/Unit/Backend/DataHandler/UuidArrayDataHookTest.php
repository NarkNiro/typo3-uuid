<?php

declare(strict_types = 1);

namespace NarkNiro\Uuid\Tests\Unit\Backend\DataHandler;

use NarkNiro\Uuid\Backend\DataHandler\PostProcessFieldArrayDataInterface;
use NarkNiro\Uuid\Backend\DataHandler\UuidArrayDataHook;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;
use TYPO3\CMS\Core\DataHandling\DataHandler;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

class UuidArrayDataHookTest extends UnitTestCase
{
    use ProphecyTrait;

    protected UuidArrayDataHook $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new UuidArrayDataHook();

        if (!isset($GLOBALS['TCA'])) {
            $GLOBALS['TCA'] = [
                'tt_content' => [
                    'columns' => [
                        'uuid' => [
                            'label' => 'uuid',
                        ],
                    ],
                ],
            ];
        }
    }

    /** @test */
    public function hasInterface(): void
    {
        self::assertTrue(
            $this->subject instanceof PostProcessFieldArrayDataInterface,
            'DataHandler Hook has not the Interface'
        );
    }

    /** @test */
    public function updateFieldArrayWithUuid(): void
    {
        $fieldArray = [
            'uuid' => '',
        ];

        /** @var ObjectProphecy|DataHandler $dataHandler */
        $dataHandler = $this->prophesize(DataHandler::class);
        $dataHandlerMockObject = $dataHandler->reveal();

        $this->subject->processDatamap_postProcessFieldArray(
            'new',
            'tt_content',
            'NEW123',
            $fieldArray,
            $dataHandlerMockObject
        );

        self::assertNotEmpty($fieldArray['uuid']);
    }
}
