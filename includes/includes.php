<?php

/*
 * EnterSolutions
 * @Author : Morne Oosthuizen
 * 
 * File to manage all includes
 * 
 * 1   : General
 * 2   : DB
 * 4   : Communications
 * 8   : Person
 * 16  : Account
 * 32  : Store
 * 64  : Tickets
 * 128 : Twitter
 * 256 : Server
 * 512 : Templates
 * 1024: Article
 * 2048: Blog
 */

	$aIncludes = array(	1	=> 'general',
						2   => 'db',
						4   => 'communications',
						8   => 'blog');

	
	if (file_exists("includes/constants.php")) {
		include("includes/constants.php");
	} else {
		include("../includes/constants.php");
	}
	
	$aIncludeList = array();
	
	foreach ($aIncludes as $iIncludes => $sIncludes)
	{
		if ($iIncludes & $iIncludeBitmask)
		{
			
			if (file_exists("includes/".$sIncludes.".php")) {
				include("includes/".$sIncludes.".php");
			} else {
				include("../includes/".$sIncludes.".php");
			}
			
			$aIncludeList[] = $sIncludes;
				
			$sClassName = ucwords($sIncludes);
			$r = new ReflectionClass($sClassName);
			$$sClassName = $r->newInstanceArgs();
		}
	}
	
	function ShowIncludes()
	{
		global $aIncludeList;
		var_dump($aIncludeList);
	}
	
	
	//This needs to load on every page!
	function L($sString)
	{
		//error_log(date("H:i:s").";".$sString."[END_LOG]",3,"c:\\xampp\\htdocs\\EnterSolutions\\logs_".date("Ymd").".log");
	}
	
	function DisplayOpenAlerts()
	{
		if(@$_REQUEST['showAlerts'] || $_SERVER['HTTP_HOST'] == 'localhost')
		{
			$db = new Db();
			$aAlerts = $db->RunQuery("GetOpenAlertsForDisplay", array());
			$sHTML = "<div style='position:fixed;width:100%;top:0px;z-index:1000'><table width='100%'>";
			foreach ($aAlerts['.Data'] as $k => $v)
			{
				$sHTML .= "<tr><td  class='error'>".$v['name']."</td><td  class='error'>".date("Y-m-d H:i:s",$v['tstamp'])."</td><td  class='error'><a href='#' onClick=\"alert('".$v['detail']."')\">detail</a></td></tr>";
			}
			$sHTML .= "</table></div>";
			//echo $sHTML;
		}
	}
	
	//DisplayOpenAlerts();
