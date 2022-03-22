<?php declare(strict_types = 1);

(static function () {
    $GLOBALS ['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = \NarkNiro\Uuid\Backend\DataHandler\UuidArrayDataHook::class;
})();
