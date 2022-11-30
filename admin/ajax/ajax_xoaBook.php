<?php 
	/**
	 * Application Main Page That Will Serve All Requests
	 * @package PRO CODE BMWEB FRAMEWORK
	 * @author  APCAO - aphuycao@gmail.com
	 * @version 1.0.0
	 * @license https://bmweb.vn
	 * @PHP >=5.6
	 */
	require_once 'config.php';
	if(isset($_SESSION[$login_name]) || $_SESSION[$login_name]==true){
		if(isset($_POST["id"])){
			$d->where('id', $_POST['id']);
			$d->delete('courses');
		}
	}
?>