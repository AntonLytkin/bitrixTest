<?$APPLICATION->IncludeComponent('bitrix:news.calendar', 'spb_events', Array(
	'IBLOCK_TYPE' => 'press_center',
		'IBLOCK_ID' => '10',
		'MONTH_VAR_NAME' => 'month',
		'YEAR_VAR_NAME' => 'year',
		'WEEK_START' => '1',
		'SHOW_YEAR' => 'Y',
		'SHOW_TIME' => 'N',
		'TITLE_LEN' => '0',
		'SHOW_CURRENT_DATE' => 'Y',
		'SHOW_MONTH_LIST' => 'Y',
		'NEWS_COUNT' => '0',
		'DETAIL_URL' => '/press-center/events/#ELEMENT_ID#/',
		'AJAX_MODE' => 'Y',
		'AJAX_OPTION_JUMP' => 'N',
		'AJAX_OPTION_STYLE' => 'Y',
		'AJAX_OPTION_HISTORY' => 'N',
		'CACHE_TYPE' => 'N',
		'CACHE_TIME' => '36000000',
		'DATE_FIELD' => 'DATE_ACTIVE_FROM',
		'TYPE' => 'EVENTS',
		'SET_TITLE' => 'N',
		'FILTER_NAME' => 'arEvents',
		'LIST_URL' => '/press-center/events/',
		'AJAX_OPTION_ADDITIONAL' => '',
	),
	false
);?>