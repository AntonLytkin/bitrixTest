<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetPageProperty("TITLE", "Дирекция по развитию транспортной системы Санкт-Петербурга и Ленинградской области");
$APPLICATION->SetTitle("Главная");
?><div class="b-wrapper">
    <div class="b-page">
        <div class="b-blocks b-blocks_two-first-big">
            <div class="b-blocks__item">
                <?
                $GLOBALS["arFilter"] = array(
                    ">PROPERTY_VIEW_MAIN" => "Y",
                );
                $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "spb_main_news",
                    Array(
                        "IBLOCK_TYPE" => "press_center",
                        "IBLOCK_ID" => "2",
                        "NEWS_COUNT" => "4",
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_ORDER1" => "DESC",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER2" => "ASC",
                        "FILTER_NAME" => "arFilter",
                        "FIELD_CODE" => array(0=>"",1=>"",),
                        "PROPERTY_CODE" => array(0=>"",1=>"",),
                        "CHECK_DATES" => "Y",
                        "DETAIL_URL" => "",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "AJAX_OPTION_HISTORY" => "N",
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "36000000",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "ACTIVE_DATE_FORMAT" => "j F",
                        "SET_TITLE" => "N",
                        "SET_BROWSER_TITLE" => "N",
                        "SET_META_KEYWORDS" => "N",
                        "SET_META_DESCRIPTION" => "N",
                        "SET_STATUS_404" => "N",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "INCLUDE_SUBSECTIONS" => "Y",
                        "PAGER_TEMPLATE" => ".default",
                        "DISPLAY_TOP_PAGER" => "N",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "PAGER_TITLE" => "Новости",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "DISPLAY_DATE" => "Y",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "Y",
                        "AJAX_OPTION_ADDITIONAL" => ""
                    )
                );?>
                <a name="mapAnchor"></a>
            </div>
            <div class="b-blocks__item">
                <section class="b-coordination-board">
                    <a href="/coordinating-council/" class="b-coordination-board__link">
                        <div class="b-coordination-board__title">
                            <?$APPLICATION->IncludeFile(
                                SITE_DIR . "/local/includes/coordination_title.php",
                                Array(),
                                Array("MODE" => "text")
                            );?>
                        </div>
                        <div class="b-coordination-board__description">
                            <?$APPLICATION->IncludeFile(
                                SITE_DIR . "/local/includes/coordination_description.php",
                                Array(),
                                Array("MODE" => "text")
                            );?>
                        </div>
                    </a>
                </section>
                <section class="logo-block">
                    <a href="http://формула-безопасности.рф/" class="b-coordination-board__link" target="_blank">
                        <div class="b-coordination-board__logo">
                            <img class="logo-img" src="/files/240x400_konkurs_Dnevnik_ru_300_v2.gif">
                        </div>
                    </a>
                </section>

            </div>
        </div>
    </div>
    <div class="b-projects-title margin-bottom-30">
        <div class="b-projects-title__icon">
            <div class="b-sprite b-sprite_big-arrow-bottom"></div>
        </div>
        <div class="b-projects-title__title">
            <?$APPLICATION->IncludeFile(
                SITE_DIR . "/local/includes/projects_title_title.php",
                Array(),
                Array("MODE" => "text")
            );?>
        </div>
    </div>
</div>

<?
CModule::IncludeModule('main');
CModule::IncludeModule('iblock');

$arFilter = $arData = array();
$arSelect = array(
    'NAME',
    'LOCK_STATUS',
);
$arFilter['IBLOCK_ID'] = 14;
$res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
$aTypes = [];
while ($ob = $res->GetNextElement()) {
    $aData = $ob->GetFields();
    $aTypes[] = ['name' => $aData['NAME'], 'color' => $aData['LOCK_STATUS']];
}
?>

    <div class="b-projects-map">
        <div id="b-projects-map">

        </div>
        <div class="b-wrapper">
            <div class="hideOpener"><a href="#">показать</a></div>
	    <div class="mobileGetBack"><a href="#">вернуться наверх</a></div>
            <div class="b-projects-map__settings">
                <div class="hideBox"><a href="#">скрыть</a></div>
                <div class="b-projects-map__title">
                    Тип проекта:
                </div>
                <div class="b-projects-map__field">
                    <select class="b-select" id="projectType">
                        <option>Все</option>
                        <? foreach($aTypes as $type) { ?>
                            <option><?=$type['name']?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="b-projects-map__title">
                    Бюджет:
                </div>
                <div class="b-projects-map__field">
                    <input type="checkbox" class="b-checkbox" id="budgetOwn"> <span class="b-projects-map__label" for="b1">Бюджет
                    субъекта</span>
                </div>
                <div class="b-projects-map__field">
                    <input type="checkbox" class="b-checkbox" id="budgetRF"> <span class="b-projects-map__label" for="b2">Бюджет РФ</span>
                </div>
                <div class="b-projects-map__field">
                    <input type="checkbox" class="b-checkbox" id="budgetOut"> <span class="b-projects-map__label" for="b2">Внебюджетное
                    финансирование</span>
                </div>
                <div class="b-projects-map__title">
                    Срок реализации:
                </div>
                <div class="b-projects-map__field">
                    <select class="b-select" id="projectTime">
                        <option>Все</option>
                        <option>2014 год</option>
                        <option>2015 год</option>
                        <option>2016 год</option>
                        <option>2017 год</option>
                        <option>2018 год</option>
                        <option>2019 год</option>
                        <option>2020 год</option>
                        <option>2021 год</option>
                        <option>2022 год</option>
                        <option>2023 год</option>
                        <option>2024 год</option>
                        <option>2025 год</option>
                    </select>
                </div>
                <div class="b-projects-map__title">
                    Текущий статус:
                </div>
                <div class="b-projects-map__field">
                    <select class="b-select" id="projectStatus">
                        <option>Все</option>
                        <option>Предпроектная подготовка</option>
                        <option>Стадия проектирования</option>
                        <option>Проектирование завершено</option>
                        <option>Стадия строительства</option>
                        <option>Ввод в эксплуатацию</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="b-wrapper">
        <div class="b-page">
            <ul class="b-choose">
                <li class="b-choose__item">
                    <a href="#" class="b-choose__link b-choose__link_blue">
                        Железнодорожный транспорт
                    </a>
                </li>
                <li class="b-choose__item">
                    <a href="#" class="b-choose__link b-choose__link_green">
                        Морской и внутренний водный транспорт
                    </a>
                </li>
                <li class="b-choose__item">
                    <a href="#" class="b-choose__link b-choose__link_dark-blue">
                        Транспортно-пересадочные узлы
                    </a>
                </li>
            </ul>
            <ul class="b-choose">
                <li class="b-choose__item">
                    <a href="#" class="b-choose__link b-choose__link_pink">
                        Воздушный транспорт
                    </a>
                </li>
                <li class="b-choose__item">
                    <a href="#" class="b-choose__link b-choose__link_orange">
                        Терминально-логистические центры
                    </a>
                </li>
                <li class="b-choose__item">
                    <a href="#" class="b-choose__link b-choose__link_light-green">
                        Автомобильные дороги и улично-дорожная сеть
                    </a>
                </li>
                <li class="b-choose__item">
                    <a href="#" class="b-choose__link b-choose__link_gray">
                        Территориально-транспортное планирование
                    </a>
                </li>
            </ul>
            <ul class="b-choose">
                <li class="b-choose__item">
                    <a href="#" class="b-choose__link b-choose__link_red">
                        Внеуличный пассажирский транспорт
                    </a>
                </li>
                <li class="b-choose__item">
                    <a href="#" class="b-choose__link b-choose__link_yellow">
                        Станции метрополитена
                    </a>
                </li>
                <li class="b-choose__item">
                    <a href="#" class="b-choose__link b-choose__link_raspberry">
                        Автомобильные путепроводы и транспортные развязки
                    </a>
                </li>
            </ul>
        </div>
    </div>
<?
$arFilter = $arData = array();
$arSelect = array('ID', 'IBLOCK_ID', 'NAME', 'DETAIL_PAGE_URL',
    'PROPERTY_SPB_PRICE',
    'PROPERTY_SPB_TIME_START',
    'PROPERTY_SPB_TIME_FINISH',
    'PROPERTY_SPB_PLACE',
    'PROPERTY_SPB_ZAKAZCHIK',
    'PROPERTY_SPB_PROJECT_STATUS',
    'PROPERTY_SPB_FINANCE_SOURCE',
    'PROPERTY_MAP',
    'PROPERTY_SPB_PROJECT_TYPE.NAME',
    'PROPERTY_SPB_PROJECT_TYPE.CODE',
    'PROPERTY_SHOW_ON_SITE',
    'PROPERTY_SPB_BUDGET',
    'PROPERTY_SPB_RF_VNEBUDGET',
    'PROPERTY_SPB_NOT_BUDGET',
);

$arFilter['IBLOCK_ID'] = 3;
$arFilter['ACTIVE'] = 'Y';
$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
while ($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();
    $arData[] = array(
        'TYPE' => $arFields['PROPERTY_SPB_PROJECT_TYPE_NAME'],        //1 тип проекта
        'NUM_TYPE' => $arFields['PROPERTY_SPB_PROJECT_TYPE_CODE'],        //2 цифровой тип проекта - нужен для цветов полигонов
        'NAME' => $arFields['NAME'],                                //3 название проекта
        'LINK' => $arFields['DETAIL_PAGE_URL'],                    //4 ссылка на сам проект
        'PLAN' => $arFields['PROPERTY_SPB_PLACE_VALUE'],            //5 место расположение
        'PRICE' => $arFields['PROPERTY_SPB_PRICE_VALUE'],            //6 бюджет проекта
        'SOURCE' => $arFields['PROPERTY_SPB_FINANCE_SOURCE_VALUE'],    //7 источник финансирования
        'TIME' => $arFields['PROPERTY_SPB_TIME_START_VALUE'] . ' - ' . $arFields['PROPERTY_SPB_TIME_FINISH_VALUE'],    //8 сроки реализации
        'STATUS' => $arFields['PROPERTY_SPB_PROJECT_STATUS_VALUE'],    //9 статус проекта
        'ZAK' => $arFields['PROPERTY_SPB_ZAKAZCHIK_VALUE'],        //10 заказчик
        'SHOW' => ($arFields['PROPERTY_SHOW_ON_SITE_VALUE'] == 'Да'),
        'COORD' => $arFields['~PROPERTY_MAP_VALUE']                    //11 координаты полигонов
    );
}
?>

<?

function array_pluck($toPluck, $arr)
{
    return array_map(function ($item) use ($toPluck) {
        return $item[$toPluck];
    }, $arr);
}

foreach ($arData as $k => $data) {
    $coords = explode('|', $data['COORD']);
    $arData[$k]['TIME'] = implode(' - ', array_map(function ($item) {
            return (int)$item;
        }, explode('-', $data['TIME']))) . ' гг.';
    $arData[$k]['polygons'] = array_pluck("coords", json_decode($coords[6], true));
    $arData[$k]['lines'] = array_pluck("coords", json_decode($coords[5], true));
    unset($arData[$k]['COORD']);
}

$aClean = [];
foreach ($arData as $k => $data) {
    if (!$arData[$k]['polygons'] && !$arData[$k]['lines']) {
        continue;
    }
    $aClean[] = $data;
}

$encode = json_encode($aClean);
?>

    <script>
        window.filterData = <?=$encode;?>;
    </script><?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
?>