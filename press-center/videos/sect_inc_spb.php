<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"spb_catalog_vertical",
	Array(
		"ROOT_MENU_TYPE" => "subleft",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(""),
		"MAX_LEVEL" => "2",
		"CHILD_MENU_TYPE" => "subleft",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	)
);?>