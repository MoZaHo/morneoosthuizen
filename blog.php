<?php
$iIncludeBitmask = 15;
include("includes/includes.php");

$Blog = new Blog();
$aArticles = $Blog->getAllBlogArticles();

?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>morneoosthuizen.com</title>
  <meta name="description" content="Online CV and Portfolio for Morne Oosthuizen">
  <meta name="author" content="Morne Oosthuizen">

  <link rel="stylesheet" href="media/css/styles.css?v=1.0">
  
  <!--UiKit -->
  <link rel="stylesheet" href="media/3rdParty/UiKit/css/uikit.almost-flat.css" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="media/3rdParty/UiKit/js/uikit.min.js"></script>
  <script src="media/3rdParty/UiKit/js/addons/sticky.js"></script>
  <script src="media/3rdParty/UiKit/js/addons/search.js"></script>

  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body>

		<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom background-white">

            <div class="uk-grid background-white" data-uk-grid-margin data-uk-sticky>
                <div class="uk-width-medium-1-1">
                    <div class="uk-vertical-align uk-text-center">
                        <div class="uk-vertical-align-middle uk-width-1-1">
                            <h1 class="uk-heading-medium">morne oosthuizen / blog</h1>
                            <p class="uk-text-medium text-orange wordspace30">JAVA / PHP / Javascript / MySQL / JQuery / HTML</p>
                        </div>
                    </div>

                </div>
            </div>
            
            <nav class="uk-navbar" data-uk-sticky="{top:100}">
	 			<ul class="uk-navbar-nav">
        			<li class="uk"><a href="./">Home</a></li>
        			<li class="uk-active"><a href="/blog.morneoosthuizen.com">Blog</a></li>
    			</ul>	
				
				<!-- <div class="uk-navbar-flip">
                	<div class="uk-navbar-content">
                    	<form class="uk-search" data-uk-search="{flipDropdown:true, source:'../src/tests/addons/_searchautocomplete.json'}">
                        	<input class="uk-search-field" type="search" placeholder="search...">
                            <button class="uk-search-close" type="reset"></button>
                       	</form>
					</div>
				</div> -->
			</nav>
			
			<div class="uk-grid" data-uk-grid-margin></div>

            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-3-4">

                	<?php 	
                	$lastId = 0;
                	if ($aArticles['.NumRows'] > 0) {
						$aArticles = $aArticles['.Data'];
						
						foreach ($aArticles as $k => $v) {
							if ($v['article_id'] != $lastId) {
								$lastId = $v['article_id'];?>
	                		 
			                	
			                    <article class="uk-article">
			
			                        <h1 class="uk-article-title">
			                            <a href="layouts_post.html"><?php echo $v['header'];?></a>
			                        </h1>
			
			                        <p class="uk-article-meta">Written by Morne on <?php echo $v['date_added']?>. Posted in <a href="#"><?php echo $v['id']['category'];?> </a></p>
			
			                        <p>
			                            <a href="layouts_post.html"><img width="900" height="300" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iOTAwcHgiIGhlaWdodD0iMzAwcHgiIHZpZXdCb3g9IjAgMCA5MDAgMzAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA5MDAgMzAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI5MDAiIGhlaWdodD0iMzAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0zNzguMTg0LDkzLjV2MTEzaDE0My42MzN2LTExM0gzNzguMTg0eiBNNTEwLjI0NCwxOTQuMjQ3SDM5MC40Mzd2LTg4LjQ5NGgxMTkuODA4TDUxMC4yNDQsMTk0LjI0Nw0KCQlMNTEwLjI0NCwxOTQuMjQ3eiIvPg0KCTxwb2x5Z29uIGZpbGw9IiNEOEQ4RDgiIHBvaW50cz0iMzk2Ljg4MSwxODQuNzE3IDQyMS41NzIsMTU4Ljc2NCA0MzAuODI0LDE2Mi43NjggNDYwLjAxNSwxMzEuNjg4IDQ3MS41MDUsMTQ1LjQzNCANCgkJNDc2LjY4OSwxNDIuMzAzIDUwNC43NDYsMTg0LjcxNyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iNDI1LjQwNSIgY3k9IjEyOC4yNTciIHI9IjEwLjc4NyIvPg0KPC9nPg0KPC9zdmc+DQo=" alt=""></a>
			                        </p>
			
			                        <p><?php echo $v['blurb'];?></p>
			
			                        <p><?php echo $v['body'];?></p>
			
			                        <p>
			                            <a class="uk-button" href="layouts_post.html#comments">4 Comments</a>
			                        </p>
			
			                    </article>
                    
                    <?php	} 
						} 
                    }
                    ?>
                  
                    <ul class="uk-pagination">
                        <li class="uk-disabled"><span><i class="uk-icon-angle-double-left"></i></span></li>
                        <li class="uk-active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><span>...</span></li>
                        <li><a href="#">20</a></li>
                        <li><a href="#"><i class="uk-icon-angle-double-right"></i></a></li>
                    </ul>

                </div>

                <div class="uk-width-medium-1-4">
                
                
                    <div class="uk-panel uk-panel-box uk-text-center">
                        <img class="uk-border-circle" width="120" height="120" src="media/images/me.jpg" alt="">
                        <h3>Morne</h3>
                        <p>Java, PHP, JS, JQuery, and all things pretty</p>
                    </div>
                    
                    <div class="uk-panel">
                    	<form class="uk-search" data-uk-search="{source:'my-results.json'}">

						    <input class="uk-search-field" type="search" placeholder="">
						    <button class="uk-search-close" type="reset"></button>
						
						    <!-- This is the dropdown, which is injected through JavaScript -->
						    <div class="uk-dropdown uk-dropdown-search">
						        <ul class="uk-nav uk-nav-search">...</ul>
						    </div>
						
						</form>
                    </div>
                    
                    <div class="uk-panel">
                        <h3 class="uk-panel-title">Archives</h3>
                        <ul class="uk-list uk-list-line">
                            <li><a href="#">January 2014</a></li>
                            <li><a href="#">December 2013</a></li>
                            <li><a href="#">November 2013</a></li>
                            <li><a href="#">October 2013</a></li>
                            <li><a href="#">September 2013</a></li>
                        </ul>
                    </div>
                    <div class="uk-panel">
                        <h3 class="uk-panel-title">Social Links</h3>
                        <p>
                    	<a href="mailto:morne@morneoosthuizen.com" class="uk-icon-button uk-icon-envelope" data-uk-tooltip="{pos:'bottom'}" title="Email Me"></a>
                    	<a target="_BLANK" href="http://za.linkedin.com/pub/morne-oosthuizen/56/609/24b/" class="uk-icon-button uk-icon-linkedin" data-uk-tooltip="{pos:'bottom'}" title="Linkedin"></a>
						<a target="_BLANK" href="https://github.com/MoZaHo" class="uk-icon-button uk-icon-github" data-uk-tooltip="{pos:'bottom'}" title="Github"></a>
                        <a target="_BLANK" href="https://twitter.com/morneoos" class="uk-icon-button uk-icon-twitter" data-uk-tooltip="{pos:'bottom'}" title="Twitter"></a>
                        <a target="_BLANK" href="https://www.facebook.com/morneoosthuizen" class="uk-icon-button uk-icon-facebook" data-uk-tooltip="{pos:'bottom'}" title="Facebook"></a>
                  		</p>
                    </div>
                </div>

        </div>

        <div id="offcanvas" class="uk-offcanvas">
            <div class="uk-offcanvas-bar">
                <ul class="uk-nav uk-nav-offcanvas">
                    <li>
                        <a href="layouts_frontpage.html">Frontpage</a>
                    </li>
                    <li>
                        <a href="layouts_portfolio.html">Portfolio</a>
                    </li>
                    <li class="uk-active">
                        <a href="layouts_blog.html">Blog</a>
                    </li>
                    <li>
                        <a href="layouts_documentation.html">Documentation</a>
                    </li>
                    <li>
                        <a href="layouts_contact.html">Contact</a>
                    </li>
                    <li>
                        <a href="layouts_login.html">Login</a>
                    </li>
                </ul>
            </div>
        </div>

    </body>
</html>