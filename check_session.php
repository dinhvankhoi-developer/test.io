<?php 
	/**
	 * Application Main Page That Will Serve All Requests
	 * @package PRO CODE BMWEB FRAMEWORK
	 * @author  AP CAO <aphuycao.dev@gmail.com>
	 * @version 1.0.0
	 * @license https://bmweb.vn
	 * @PHP >=5.6
	 */

	session_start();
	$_SESSION['ONWEB'] = true;
	defined( '_root' ) ?:  define( '_root', __DIR__);
	defined( '_ds' ) ?:  define( '_ds', DIRECTORY_SEPARATOR );
    defined( '_lib' ) ?:  define( '_lib', _root._ds.'libraries'._ds );
    defined( '_sources' ) ?:  define( '_sources', _root._ds.'sources'._ds );
    defined( '_templates' ) ?:  define( '_templates', _root._ds.'templates'._ds );
    defined( '_layouts' ) ?:  define( '_layouts', _templates._ds.'layouts'._ds );

    $lang = $_SESSION['lang'] = (!isset($_SESSION['lang']) || $_SESSION['lang']=='') ? 'vi':$_SESSION['lang'];

    require_once _lib.'config.php';
	require_once _lib.'autoload.php';
	require_once _lib.'langWeb/lang_'.$lang.'.php';
	new autoload();
	$d = new PDODb($config['database']);
	$func = new functions($d);
	$breadcrumbs = new breadCrumbs($d,$func);
	$counter = new statistic($d);
	$apiCart = new cartFrontEnd($d,$config);
	$apiPlace = new place($d);
	$json_schema = new jsonSchema($d,$func);

	$status = true;
	if($_SESSION['signin']) {
		$id_user_log = (int)$_SESSION['signin']['id'];
	
		
		   $items_ss = $d->rawQueryOne("select lastsession_id from #_customers where id = ?  limit 0 ,1",array($id_user_log));
		   $ex_session_id = explode(',',$items_ss['lastsession_id']);
	 
		   if (count($ex_session_id) > 4) {
		   }else{
		   		$row_ss = $d->rawQueryOne("select id, username,lastsession_id from #_customers where id = ?  limit 0 ,1",array($id_user_log));
				$notice_admin ='';
				$id_session_ro = $_SESSION['MACC'];
				$ex_session_id_check = explode(',',$row_ss['lastsession_id']);
				if($row_ss && in_array($id_session_ro,$ex_session_id_check)) {
				}else{
					$notice_adminw = 'Tài khoản của bạn đã đăng nhập quá 4 thiết bị!';
					session_destroy();
					$status = false;
				}
		   }

		
	}

echo json_encode(["isLogin"=> $status, "message" => $notice_adminw]);