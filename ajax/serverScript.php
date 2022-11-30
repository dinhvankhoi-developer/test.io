<?php 
	/**
	 * Application Main Page That Will Serve All Requests
	 * @package PRO CODE BMWEB FRAMEWORK
	 * @author  AP CAO <aphuycao.dev@gmail.com>
	 * @version 1.0.0
	 * @license https://bmweb.vn
	 * @PHP >=5.6
	 */
	if ($_POST['MACC']) {
		require_once 'config.php';
		$macpc = $_POST['MACC'];
		$_SESSION['MACC'] = $macpc;
	}
	
 ?>