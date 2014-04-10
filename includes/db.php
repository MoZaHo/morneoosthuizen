<?php

/*
 * EnterSolutions
 * @Author : Morne Oosthuizen
 * 
 */

define("SHOWDEBUG","1");

class Db
{
	
	
	public function Db()
	{
	}
	
	public function ConnectToDb()
	{
		if (@$db = mysql_connect(DB_HOST,DB_USER,DB_PASS))
		{
			if (!@mysql_select_db(DB_DB,$db))
			{
				$communications = new Communications();
				$communications->SendError("Unable to find MySQL DB ".date("Y-m-d H:i:s"));
				die("Unable to connect to DB!");
			}
		} 
		else 
		{
			$communications = new Communications();
			$communications->SendError("Unable to connect to MySQL Server ".date("Y-m-d H:i:s"));
			die("Unable to connect to DB!");
		}
	}
	
	public function RunQuery($sQueryName,$aTags)
	{
		$General = new General();
		
		$this->ConnectToDb();
		
		$bHaveAlert = false;
		
		$sQuery = "SELECT * FROM queries WHERE QueryName = '".$sQueryName."'";
		$rResult = mysql_query($sQuery);
		if (!$rResult)
		{
			echo mysql_error();
			die();
		}
		
		$aRow = mysql_fetch_assoc($rResult);
		$sQueryType = $aRow["QueryType"];
		
		$sQuery = $aRow['QueryString'];
		//Loop through the aTags variable so we can replace the holders with the values
		foreach($aTags as $k => $v)
		{
			$sQuery = str_replace('['.ucwords($k).']',mysql_real_escape_string($v),$sQuery);
		}
		
		//Now that we have the query, lets pull the data we require, and return it
		
		$aResult = array();
		$iRowsFound = 0;
		L("Query : ".$sQueryName." -> ".$sQuery);
		
		if ($sQuery == "")
		{
			$aData = array();
			$aData['AlertId'] = 3;
			$aData['Query Name'] = $sQueryName;
			//$aData['Backtrace'] = debug_backtrace();
			$General->RaiseAlert($aData);
			$bHaveAlert = true;
		}
				
		$rResult = mysql_query($sQuery);

		$iRowsFound = 0;
		$iRowsFound = @mysql_num_rows($rResult);
		if ($sQueryType != "Update") 
		{
			if ($rResult)
			{
				$aResult['.Result'] = 'Success';
				$aResult['.QueryTime'] = date("Y-m-d H:i:s");
				$aResult['.NumRows'] = $iRowsFound;
				if (SHOWDEBUG)
				{
					$aResult['.Query'] = $sQuery;
				}
				if ($sQueryType == "Insert") 
				{
					$aResult['.InsertId'] = mysql_insert_id();
				}
				$aResult['.Data'] = array();
				if ($iRowsFound > 0) {
					while ($aRow = mysql_fetch_assoc($rResult))
					{
						$aResult['.Data'][] = $aRow;
					}
				}
				
			} else {
				$aResult['.Result'] = 'Fail';
				if (SHOWDEBUG == 1) {
					$aResult['.Query'] = $sQuery;
				}
				//Send Error Coms to Admin Mobile
				if (!$bHaveAlert) 
				{
					$aData = array();
					$aData['AlertId'] = 1;
					$aData['Query Name'] = $sQueryName;
					$aData['Backtrace'] = debug_backtrace();
					$General->RaiseAlert($aData);
					$bHaveAlert = true;
				}
			}
		} else {
			$aResult['.Result'] = 'Success';
			$aResult['.QueryTime'] = date("Y-m-d H:i:s");
			$aResult['.NumRows'] = mysql_affected_rows();
			$aResult['.Data'] = array();
		}		
		return $aResult;
	}
}
