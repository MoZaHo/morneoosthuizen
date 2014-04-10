<?php

/*
 * EnterSolutions
 * @Author : Morne Oosthuizen
 * 
 */

class Communications
{
	public function Communications()
	{
		
	} 
	
	public function SendError($sError,$sExtra = "")
	{
		$aMsgData['to'] = ADMIN_MOBILE;
		$aMsgData['msg'] = "ES.CRITICAL : ".$sError.$sExtra;
		$this->SendSms($aMsgData);
	}
	
	/*
	 * Send Sms
	 * $aMsgData = array(Number,Message);
	 */
	public function SendSms($aMsgData)
	{
	/*	if ($_SERVER['HTTP_HOST'] != 'localhost') {
			@$result = file_get_contents('http://api.clickatell.com/http/sendmsg?api_id=3189981&smsc=ENTERSOL&user=morne.oosthuizen&password=M0rn300S&to='.$aMsgData['to'].'&text='.substr(urlencode($aMsgData['msg']),0,160));
		} else {
			echo "<div class='smsAlertNotification'>Sending sms alert.</div>";
		}*/
	}
	
	public function SendEmail($aData)
	{
		$sEmail = $aData['Body'];
		$sSubject = $aData['Subject'];
		$sTo      = $aData['To'];
		$sHeaders = "From: EnterSolutions <".$aData['FromEmail'].">";
		mail($sTo, $sSubject, $sEmail, $sHeaders);
	}
	
	public function SendTwitterMessage()
	{
		
	}
}
