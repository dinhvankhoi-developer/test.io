<?php if(!defined('_lib')) die("Error");
	/**
	 * Application Main Page That Will Serve All Requests
	 * @package PRO CODE BMWEB FRAMEWORK
	 * @version 1.0.0
	 * @license https://bmweb.vn
	 * @PHP >=5.6
	 */
	error_reporting(0);
	// error_reporting(E_ALL & ~E_NOTICE & ~8192);
	date_default_timezone_set('Asia/Ho_Chi_Minh');

	@define ( 'NN_MSHD' , 'apgosu');
	@define ( 'NN_AUTHOR' , 'aphuycao.dev@gmail.com');

	$config = array(
		'arrayDomainSSL' => array(),
		'debug-style' => true,
		'website' => array(
			'url'=> $_SERVER["SERVER_NAME"].'/',
			'lang' => array(
				"vi" => "Tiếng Việt",
			),
			'salt'=>'Ng25q#UsJ(mVS',
			'secret'=>'$BMWEB@',
			'theme-color'=>'#7da312',
			'facebookId' => '',
			'zaloId' => '',
			'sitekey'=> '6LdNoMgiAAAAAE6-rBof8TEErtKx4zQt764fWEvj',
			'secretkey'=>'6LdNoMgiAAAAAC5UlJjWqvybKNE9nzQfY-1xzRcY'
		),
		'database' => array(
			'type' => 'mysql',
			'host' => 'localhost',
			'username' => 'data',
			'password' => '',
			'dbname'=> 'database',
			'port' => 3306,
			'prefix' => 'table_',
			'charset' => 'utf8'
		),
		'mail' => array(
			'email' => '',
			'password' => '',
			'ip' => '',
			'smtp' => true,
			'secure' => 'ssl',
			'port' => 465,
			'gmail' => false
		),
		'author' => array(
			'name' => 'AP Gosu',
			'nickname' => 'AP CAO',
			'email' => 'aphuycao.dev@gmail.com'
		),
		'login' => array(
			'check' => true,
			'social' => false,
			'google-client-id'=> '1078976782616-qvp73111fbcle1jch0dr6ajcshiohikl.apps.googleusercontent.com'
		),
		'login-admin' => array(
			'attempt' => 5,
			'delay' => 15
		),
		'version' => '1.0.0'
	);
	/*ABGNXATD*/
	/*Check SSL*/
	require_once _lib.'checkSSL.php';
	$check_ssl = new checkSSL();
	$http = $check_ssl->getProtocol();

	$config_url = $config['website']['url'];
	$config_base = $http.$config['website']['url'];
	
	$_SESSION['ck-folder'] = $config_base;

	require_once _lib.'contants.php';
?>