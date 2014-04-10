<?php

/*
 * EnterSolutions
 * @Author : Morne Oosthuizen
 * 
 */

class General
{
	
	public function General()
	{
	}
	
	public function GeneralTest()
	{
	}
	
	public function Spacer($width, $height)
	{
		$sHTML = "<div style='float:left;width:".$width.";height:".$height."'></div>";
		return $sHTML;
	}
	
	/*
	 * Return True/False
	 */
	public function IsOpen($sSection)
	{
		$aResult = $this->GetSetting($sSection);
		if ($aResult == "Y") 
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}
	
	public function GetSetting($sSetting)
	{
		$db = new Db();
		$aResult = $db->RunQuery("GetSetting", array("Setting" => $sSetting));
		return $aResult['.Data'][0]['value'];
	}
	
	public function ClosedSection()
	{
		$sHTML = "<div align='center'><div class='ClosedMessage'>This section has been temporary closed, or is being worked on. Please check back later...<br/><br/>../EnterSolutions Team</div></div>";
		return $sHTML;
	}
	
    public function RaiseAlert($aData)
    {
    	$db = new Db();
    	
    	//Lets first see if this alert is active or not!
    	$aResult = $db->RunQuery("GetAlertStatus", array("AlertId" => $aData['AlertId']));
    	
    	if ($aResult['.Data'][0]['status'] != 'Closed') {
    		return;
    	}
    	
    	$db->RunQuery("UpdateAlertStatus", array("Status" => 'Open',"Id" => $aData['AlertId']));
    	$aPacket = array();
    	
    	$aPacket['AlertId'] = $aData['AlertId'];
    	$aPacket['tstamp'] = mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));
    	
    	$sDetail = "";
    	
    	foreach($aData['Backtrace'] as $k => $v)
    	{
    		foreach ($v as $k1 => $v1)
    		{
    			if (!is_object($v1))
    			{
    				if (is_array($v1)) {
    					$sDetail .= $k1." ---- ";
    					foreach ($v1 as $k2 => $v2)
    					{
    						$sDetail .= $k2 ." => ".$v2."<br/>";	
    					}
    				} else {
    					$sDetail .= $k1." - ".$v1."<br/>";
    				}
    			}	
    		}
    	}
    	
    	$aPacket['Detail'] = $sDetail;
    	$aPacket['Page'] = "See Detail";
    	
    	$db->RunQuery("AddAlertNote", $aPacket);
    	
    	//$comms = new Communications();
    	//$comms->SendError("Alert (".$aData['AlertId'].") @ ".date("Y-m-d H:i:s",$aPacket['tstamp'])." - Visit Admin Pages!");
    }
    
    public function AcknoledgeAlert($iAlertId)
    {
 		$db = new Db();
    	$db->RunQuery("UpdateAlertStatus", array("Status" => 'Acknowledged',"Id" => $iAlertId));   	
    }
    
    public function CloseAlert($iAlertId)
    {
    	$db = new Db();
    	$db->RunQuery("UpdateAlertStatus", array("Status" => 'Closed',"Id" => $iAlertId));
    }
    
    public function CheckAlert()
    {
    	$db = new Db();
    	$comms = new Communications();
    	$aResult = $db->RunQuery("GetOpenAlerts", array());


    	if ($aResult['.NumRows'] > 0)
    	{
	    	foreach($aResult['.Data'] as $k => $v)
	    	{
		    	$comms->SendError("Alert (".$v['alertId'].") @ ".date("Y-m-d H:i:s",$v['tstamp'])." - Visit Admin Pages!");
	    	}
    	} else {
    		if ((date("H:i") == "10:15") || (date("H:i") == "16:15"))
    		{
    			$aData = array();
    			$aData['to'] = ADMIN_MOBILE;
    			$aData['msg'] = "Communications Check - 0 Errors @ ".date("Y-m-d H:i:s");
    			$comms->SendSms($aData);
    		}
    	}
    }
    
    public function CountOpenAlerts()
    {
    	$Db = new Db();
    	
    	$aResult = $Db->RunQuery("GetOpenAlerts", array());
    	
    	return $aResult['.NumRows'];
    	
    }
    
    public function LoadAlert($iAlertId)
    {
    	$Db = new Db();
    	
    	$aResult = $Db->RunQuery("LoadAlert", array('AlertId' => $iAlertId));
    	
    	return $aResult;
    }
    
    
}