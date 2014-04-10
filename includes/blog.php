<?php

/*
 * EnterSolutions
 * @Author : Morne Oosthuizen
 * 
 */

class Blog
{
	
	public function getAllBlogArticles($limit = 10) {
		
		$Db = new Db();
		$aArticles = $Db->runQuery("GetAllBlogArticles",array("limit" => $limit));
		
		return $aArticles;
		
	}
	
	public function getBlogArticle($id = null) {
		
	}
		
}
