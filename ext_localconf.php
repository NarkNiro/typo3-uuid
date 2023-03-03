<?php

(static function (): void {
    $GLOBALS ['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = \NarkNiro\Uuid\Backend\DataHandler\UuidArrayDataHook::class;

    $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Core\Database\Schema\DefaultTcaSchema::class] = [
        'className' => \NarkNiro\Uuid\Xclass\Database\Schema\DefaultTcaSchema::class,
    ];
})();
