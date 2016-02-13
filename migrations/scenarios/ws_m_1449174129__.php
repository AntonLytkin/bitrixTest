<?php

/**
 * Class definition update migrations scenario actions
 **/
class ws_m_1449174129__ extends \WS\Migrations\ScriptScenario {

    /**
     * Name of scenario
     **/
    static public function name() {
        return "Добавление нового элемента ИБ Типы проектов";
    }

    /**
     * Description of scenario
     **/
    static public function description() {
        return "";
    }

    /**
     * @return array First element is hash, second is owner name
     */
    public function version() {
        return array("de9e52a6f06f96c5a812aba78fcae063", "h&r");
    }

    /**
     * Write action by apply scenario. Use method `setData` for save need rollback data
     **/
    public function commit() {
        CModule::IncludeModule("iblock");
        $object = new CIBlockElement;
        $arElement = Array(
            "IBLOCK_ID" => 14,
            "NAME" => "Территориально-транспортное планирование",
            "ACTIVE" => "Y",
            "CODE" => "gray"
        );

        $id = $object->Add($arElement);

        if ($id) {
            $this->setData(array("ID" => $id));
        }
    }

    /**
     * Write action by rollback scenario. Use method `getData` for getting commit saved data
     **/
    public function rollback() {
        $data = $this->getData();
        CModule::IncludeModule("iblock");
        $object = new CIBlockElement;

        if ($data["ID"]) {
            $object->Delete($data["ID"]);
        }
    }
}