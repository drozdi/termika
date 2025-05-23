<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

class CustomTimeComponent extends CBitrixComponent {
    public function onPrepareComponentParams($arParams) {
        $arParams['TIME_FORMAT'] = $arParams['TIME_FORMAT'] ?? 'H:i:s';
        $arParams['CACHE_TIME'] = $arParams['CACHE_TIME'] ?? 0;
        return $arParams;
    }

    public function executeComponent() {
        if ($this->startResultCache()) {
            $this->arResult['CURRENT_TIME'] = date($this->arParams['TIME_FORMAT']);
            $this->includeComponentTemplate();
            $this->endResultCache();
        }
    }
}
?>