<?php

/*
 * EnterSolutions
 * @Author : Morne Oosthuizen
 * 
 */

class Templates
{
	
	public function __construct()
	{
				
	}
	
	public function BuildStylesheetData($args = '', $preUrl = '')
	{
		$sHTML = "<link rel='stylesheet' href='".$preUrl.STYLESHEET_URL."styles.php?argh=".$args."' type='text/css' media='all'>\n";
		if ($args == "admin")
		{
			$sHTML = "<link rel='stylesheet' href='".$preUrl.STYLESHEET_URL."admin_styles.php?argh=".$args."' type='text/css' media='all'>\n";	
		}
		return $sHTML;
	}
	
	public function BuildJsData($preUrl = '')
	{
		//$sHTML = "<script src='".JS_URL."firmin-1.0.0-min.js'></script>";
		$sHTML = "";
		$sHTML .= "<script src='".$preUrl.JS_URL."jquery-1.4.2.min.js' type='text/javascript'></script>\n";
		$sHTML .= "<script src='".$preUrl.THIRD_PARTY."BigText/bigtext.js' type='text/javascript'></script>\n";
		$sHTML .= "<script src='".$preUrl.THIRD_PARTY."Overlay/js/mosaic.1.0.1.min.js' type='text/javascript'></script>\n";
		
		return $sHTML;
	}
	
	public function BuildHeader($sSection =  null)
	{
		//$sHTML .= "<div class='header'>".$this->BuildMenu()."</div>";
		$sHTML = "<a href='http://www.iamman.co.za/blog.php' style='text-decoration:none;'><div style='width:1000px;text-align:left;padding:5px;'><span class='headerTitle1'>I-am-<span class='headerTitle2'>Man</span>.".strtoupper($sSection)."</span></div></a>";
		return $sHTML;
	}
	
	public function BuildAdminHeader()
	{
		$sHTML .= "<div class='header'></div>";
		return $sHTML;
	}
	
	public function BuildFooter()
	{
		/*$sHTML = "<div class='footer'><span class=\"image-wrap social_twitter_text\" style=\"width : 350px; height: auto;\">
											<div id=\"twitter\">
												<ul id=\"twitter_update_list\">Loading...</ul>
											</div>
										</span></div>";
*/
$sHTML = "";
		return $sHTML;
	}
	
	public function BuildLoginForm()
	{
		
	}
	
	public function BuildRegistrationForm()
	{
		
	}
	
	public function BuildMenu($UserId)
	{
		$sHTML = "<div class=\"navBar\">
					<div id=\"outer\">
						<div id=\"inner\">
							<div class=\"menu\">
								<a href=\"index.php\" class=\"navHome\">home</a>
								<a href=\"blog.php\" class=\"navHome\">blog</a>
								<a href=\"snippets.php\" class=\"navHome\">snippets</a>
								<a href=\"inner#contact\" rel=\"clearbox\" class=\"navHome\">contact</a>
								<!--<a href=\"inner#login\" rel=\"clearbox\" class=\"navHome\">login</a>-->
							</div>
						</div>
					</div>
				</div>
				";
		return $sHTML;
	}
	
	public function GetTemplate($sArticleName)
	{
		$Db = new Db();
		$aPackage['TemplateName'] = $sArticleName;
		$aResult = $Db->RunQuery('GetTemplate',$aPackage);
		return $aResult['.Data'][0]['Template'];
	}
	
	public function BuildQRBox()
	{
		$sHTML .= "<div class=\"coloums drop-shadow curved curved-vt-2\" align=center>";
		$sHTML .= "<div class='bodyclass'><img src='".IMAGES_URL."general/ContactUsQRCode.png'><br/><a id=\"various1\" href=\"#inline1\">What is this?</a></div>";
		$sHTML .= "</div>";	
		$sHTML .= "<div style=\"display: none;\">
						<div id=\"inline1\" style=\"width:400px;height:300px;\">
						<img src='".IMAGES_URL."general/androidScan.png' align='right' border='0'><strong>Q: What is this strange block-of-jibirish on my screen?</strong><br/>
						A: This is known as a QR Code. QR Codes generally contains information regarding a certain product or person.<br/><br/>
						<strong>Q: How do I use this QR Code?</strong><br/>
						A: Easy. If you have an android phone, just download the Barcode Scanner app from the Market, load up the application, and point it at the screen! Let the application do the rest!<br/><br/>
						Download the application by clicking on the download button below<br/>
							
						<div align='center'><a href='https://market.android.com/details?id=com.google.zxing.client.android' target='_BLANK'><img src='".IMAGES_URL."general/androidMarket.png' border='0'></a></div>
						</div>
					</div>
		";
		
		return $sHTML;
	}
	
	public function BuildWeNeedMoreInfo($Email)
	{
		$sHTML = $this->BuildJsData();
		$sHTML .= '
	<style>
		.registerLoginBox
		{
			font-size : 11px;
		    font-weight : normal;
		    color : #666666;
		    font-family : verdana;
		}
		
		H3
		{
			font-size : 16px;
		    font-weight : normal;
		    color : #666666;
		    font-family : verdana;
		    padding-bottom : 5px;
		    font-weight:bold;
		}
		
		.registerLoginBox td
		{
			padding : 2px;
		}
		
		.note
		{
			font-size : 10px;
		    font-weight : bold;
		    color : #666666;
		    font-family : verdana;
		    font-style : italic;
		}
		
		.forgotLink
		{
			font-size : 9px;
		    font-weight : bold;
		    color : #7fbf4d;
		    font-family : verdana;
		    font-style : italic;
		    text-decoration : none;
		}
		
		.spacer
		{
			border-right : 1px solid #666666;
		}
		
		.registerButton {
		background-color: #7fbf4d;
		background-image: -webkit-gradient(linear, left top, left bottom, from(#7fbf4d), to(#63a62f));
		/* Saf4+, Chrome */
		background-image: -webkit-linear-gradient(top, #7fbf4d, #63a62f);
		background-image: -moz-linear-gradient(top, #7fbf4d, #63a62f);
		background-image: -ms-linear-gradient(top, #7fbf4d, #63a62f);
		background-image: -o-linear-gradient(top, #7fbf4d, #63a62f);
		background-image: linear-gradient(top, #7fbf4d, #63a62f);
		border: 1px solid #63a62f;
		border-bottom: 1px solid #5b992b;
		-webkit-border-radius: 3px;
		-moz-border-radius: 3px;
		-ms-border-radius: 3px;
		-o-border-radius: 3px;
		border-radius: 3px;
		-webkit-box-shadow: inset 0 1px 0 0 #96ca6d;
		-moz-box-shadow: inset 0 1px 0 0 #96ca6d;
		-ms-box-shadow: inset 0 1px 0 0 #96ca6d;
		-o-box-shadow: inset 0 1px 0 0 #96ca6d;
		box-shadow: inset 0 1px 0 0 #96ca6d;
		color: #fff;
		font: bold 11px "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Geneva, Verdana, sans-serif;
		line-height: 1;
		padding: 7px 0 8px 0;
		text-align: center;
		text-shadow: 0 -1px 0 #4c9021;
		width: 150px;
		cursor : pointer;
		}
		
		.error
		{
			color : red;
			font-weight : bold;
		}
	</style>';
		$sHTML .= '<h3>Hoorah!!</h3>
					<br/><div class="note">Your account has been activated.<br/>
		
					You are almost ready to start working with EnterSolutions. We just need a couple more things from you..</br><br/>
					</div>
					<input type="hidden" id="userCompleteRegistrationEmail" name="userEmail" value="'.$Email.'">
					<table class="registerLoginBox" width="640px" cellpadding="0" cellspacing="0">
						<tr>
							<td id="userPasswordInfo">
								Password
							</td>
							<td>
								<input type="password" id="userPassword" name="userPassword">*
							</td>
						</tr>
						<tr>
							<td id="userPasswordInfo2">
								Confirm Password
							</td>
							<td>
								<input type="password" id="confirmUserPassword" name="confirmUserPassword">*
							</td>
						</tr>
						<tr>
							<td>
								<br/>
							</td>
						</tr>
						<tr>
							<td>
								Title
							</td>
							<td>
								<select id="userTitle" name="userTitle">
									<option>Mr
									<option>Miss
									<option>Mrs
									<option>Dr
									<option>Prof
								</select>
							</td>
						</tr>
						<tr>
							<td id="userFirstNameInfo">
								First Name
							</td>
							<td>
								<input type="text" id="userFirstName" name="userFirstName">*
							</td>
						</tr>
						<tr>
							<td>
								Last Name
							</td>
							<td>
								<input type="text" id="userLastName" name="userLastName">
							</td>
						</tr>
						<tr>
							<td valign="top" id="userMobileInfo">
								Mobile Number
							</td>
							<td>
								<input type="text" id="userMobile" name="userMobile">*
								<br/><strong>Why do we need this?</strong>
								</br>This is so that ES can contact you regarding an order you may have, or to inform you of any service changes. We will <b>NOT</b> be calling you, or sharing your number with any 3rd party companies 
							</td>
						</tr>
						<tr>
							<td>
								<br/>
							</td>
						</tr>
						<tr>
							<td>
								<br/>
							</td>
						</tr>
						<tr>
							<td>
								<input type="button" value="Submit" class="registerButton" onClick="completeRegistration()" />
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<div class="note" id="status"></div>
							</td>
						</tr>
					</table>
				';
		
		return $sHTML;
	}
	
	public function BuildContactDiv()
	{
		$sHTML = '<div id="contact">
			<div class="loginHeader">Contact Us</div>
			<div class="contactSection">
				Thank you for contacting Enter Solutions. We are in the process of setting up a ticket system which will allow you to track your request. Please feel free
				to contact us with any enquiry.<br/><br/>
				<img src="'.IMAGES_GENERAL_URL.'mail.png" align="left" style="margin-right: 5px;"> info@entersolutions.co.za<br/><br/>
			</div>
		</div>';
		return $sHTML;
	}
	
}
