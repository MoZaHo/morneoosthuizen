<?php

/*
 * EnterSolutions
 * @Author : Morne Oosthuizen
 * 
 */

class Article
{
	
	public function Article()
	{
	}
	
	public function GetFrontpageArticle($i)
	{
		$Db = new Db();
		$aPackage['count'] = $i;
		$aResult = $Db->RunQuery('GetFrontpageArticle',$aPackage);
		
		$Templates = new Templates();
		$sFrontpageArticleTemplate = $Templates->GetTemplate('Frontpage');
		
		$sFrontpageArticleTemplate = str_replace('[Headline]',$aResult['.Data'][0]['headline'],$sFrontpageArticleTemplate);
		$sFrontpageArticleTemplate = str_replace('[Body]',$aResult['.Data'][0]['body'],$sFrontpageArticleTemplate);
		
		return $sFrontpageArticleTemplate;
	}
	
	public function ArticleTest()
	{
	}
}