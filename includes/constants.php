<?php
if ($_SERVER['HTTP_HOST'] != 'localhost') {
	DEFINE('DB_HOST','localhost');
	DEFINE('DB_DB','yourmdsx_main');
	DEFINE('DB_USER','yourmdsx_admin');
	DEFINE('DB_PASS','M0rn300SM0rn300S');
} else {
	DEFINE('DB_HOST','localhost');
	DEFINE('DB_DB','morneoosthuizen');
	DEFINE('DB_USER','root');
	DEFINE('DB_PASS','112233');
}

DEFINE('ADMIN_MOBILE','27726225454');
DEFINE('ADMIN_EMAIL','morneoos@gmail.com');

DEFINE('TWITTER_USERNAME','morneoos@gmail.com');
DEFINE('TWITTER_PASSWORD','M0rn300S');
DEFINE('TWITTER_ACCOUNT','entersolutions');
DEFINE('FACEBOOK_ACCOUNT','http://www.facebook.com/EnterSolutions/');
DEFINE('CLICKATELL_USERNAME','morne.oosthuizen');
DEFINE('CLICKATELL_API','3189981');
DEFINE('CLICKATELL_PASSWORD','M0rn300S');

DEFINE('SITE_NAME','morneoosthuizen.com');
if ($_SERVER['HTTP_HOST'] != 'localhost') {
	DEFINE('SITE_URL','http://www.mornelive.co.za/');
} else {
	DEFINE('SITE_URL','http://localhost/MorneLive/');
}

DEFINE('STYLESHEET_URL',SITE_URL.'media/stylesheets/');
DEFINE('IMAGES_URL',SITE_URL.'media/images/');
DEFINE('IMAGES_GENERAL_URL',IMAGES_URL.'general/');
DEFINE('IMAGES_BLOG_URL',IMAGES_URL.'blog/');
if ($_SERVER['HTTP_HOST'] != 'localhost') {
	DEFINE('IMAGES_BLOG_PATH','/media/images/blog/');
} else {
	DEFINE('IMAGES_BLOG_PATH','../YourMomWasHere/media/images/blog/');
}
DEFINE('IMAGES_MANU_URL',IMAGES_URL.'manufacture/');
DEFINE('IMAGES_TAB_URL',IMAGES_URL.'tab/');
DEFINE('IMAGES_STORE_URL',IMAGES_URL.'store/');
DEFINE('IMAGES_SERVER_URL',IMAGES_URL.'server/');
DEFINE('THIRD_PARTY',SITE_URL.'media/3rdParty/');

DEFINE('JS_URL',SITE_URL.'media/js/');

DEFINE('STORE_MARKUP',1.10);

DEFINE('WHM_USER','enterso1');
DEFINE('WHM_PASS','edU9dE338x');
DEFINE('WHM_HOST','184.154.115.114');

DEFINE('LATEST_BLOG_POST_COUNT',5);
