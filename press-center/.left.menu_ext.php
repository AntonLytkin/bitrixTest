<?
$aMenuLinks = array();
CModule::IncludeModule('iblock');
$res = CIBlock::GetList(
	array('SORT'=>'ASC'), 
	array(
		'TYPE'=>'press_center', 
		'SITE_ID'=>SITE_ID, 
		'ACTIVE'=>'Y'
	)
);
while($ar_res = $res->Fetch()){
	$aMenuLinks[] = array($ar_res['NAME'], '/press-center/'.$ar_res['CODE'].'/', array(), array(), '');
}
?>