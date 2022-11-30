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

	}
	#
	$id_user =  (int) $_POST['id_user'];
	$id_product = (int) $_POST['id_product'];
	#Lấy giá
	
	$baihoc = $d->rawQueryOne("SELECT id,name_vi,price from #_lists where type=? and id=? and find_in_set ('hienthi',status) order by numb asc, id desc",array("khoa-hoc",$id_product));
	$gia = (int) $baihoc['price'];

	#Lấy thông tin tài khoản
	$result_user  =  $d->rawQueryOne("select id,username from #_customers where id=?",array($id_user));
	#Kiểm tra bài viết đã mua
	$chitietbaihoc = $d->rawQueryOne("SELECT * from #_courses where type=? and author_id =? and find_in_set ('hienthi',status) order by numb asc, id desc",array("dang-ky-khoa-hoc",$id_user));
	#Kiểm tra số tiền còn lại
	$tongtien = 0;

	foreach($chitietbaihoc as $i => $val) {
		$arr_giaotrinhvideo[$i] = $val['id_product'];
		$tongtien += $val["price"];
	}
	//var_dump($chitietbaihoc);
	if(!in_array($id_product, $arr_giaotrinhvideo))
	{
		$data['id_product'] = $id_product;
		$data['author_id'] = $id_user;
		$data['name'] = $result_user['username'];
		$data['price'] = $gia;
		$data['status'] = 'hienthi';
		$data['view'] = 1;
 		$data['content'] = 'Khóa học được admin tự chọn - '.$func->getInfoItems('khoa-hoc',$id_product,'lists','name_vi');
 		$data['type'] = 'dang-ky-khoa-hoc';
		$data['createdAt'] = $d->now();
		$idInsert = $d->insert('courses', $data);

		if($idInsert){
			echo 1;
		} else {
			echo 0;
		}
	}

	// if($tongtien >= $gia)
	// {
	// if(!in_array($id_product, $arr_giaotrinhvideo))
	// {
	// 	$d->reset();
	// 	$data['id_product'] = $id_product;
	// 	$data['author_id'] = $id_user;
	// 	$data['price'] = $gia;
	// 	$data['createdAt'] = $d->now();
	// 	$idInsert = $d->insert('courses', $data);

	// 	if($idInsert){
	// 		echo 1;
	// 	} else {
	// 		echo 0;
	// 	}
	// }
	// else
	// {
	// 	echo 2;
	// }
	// } else {
	// 	echo 3;
	// }
?>