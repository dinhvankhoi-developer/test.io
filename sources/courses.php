<?php 
	//echo $_SESSION['id_product_course'];
	$row_item_course = $d->rawQueryOne("select id,name_$lang as name, status, alias_$lang as alias,icon,icon_thumb, photo, thumb,price, price_old from #_lists where type=? and id=? and tmp_table='products' and find_in_set ('hienthi',status)",array("khoa-hoc",$_SESSION['id_product_course']));

	$row_detail = $d->rawQueryOne("SELECT id,name_$lang as name, alias_$lang as alias, desc_$lang as descs, type, content_$lang as content, photo, thumb, title_$lang as title, keywords_$lang as keywords, description_$lang as description from #_pages where type=? ",array($type));

	$str_breadcrumbs = $breadcrumbs->getUrl(_trangchu, array(array('alias'=>$type,'name'=>$title)));
	$title_seo = ($row_detail['title']=='') ? $row_detail['name']:$row_detail['title'];
	$keywords_seo = ($row_detail['keywords']=='') ? $row_setting['keywords']:$row_detail['keywords'];
	$description_seo = ($row_detail['description']=='') ? $row_setting['description']:$row_detail['description'];
	$str_share = $func->getShare($row_detail,_upload_post_l,$type_ob,false);
	//echo $sqll = "select id,name, id_product,price from #_courses where type=dang-ky-khoa-hoc and author_id=".$_SESSION['signin']['id']." and id_product=".$_SESSION['id_product_course']."";
	$row_course = $d->rawQueryOne("select id,name, id_product,price from #_courses where type=? and author_id=? and id_product=?",array("dang-ky-khoa-hoc",$_SESSION['signin']['id'],$_SESSION['id_product_course']));

	if ($row_course) {
		$func->transfer('Khóa học bạn đăng ký đang đợi admin kích hoạt. Liên hệ admin để được hỗ trợ nếu chưa được kích hoạt'.'!', $config_base);
	}
	if(!empty($_POST)){
		$data = $_POST['data'];
    	if($_POST){
    		foreach ($data as $k => $v) {
				$data[$k] = htmlspecialchars($v);
			}
    	}
    	if($data['price']){
			$data['price'] = str_replace('.', '', $data['price']);
		}
    	//$data['subject'] = 'Liên hệ mua khóa học từ website';
    	//$data['status'] = 'hienthi';
		$data['createdAt'] = $d->now();
		
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {
		    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
		    $recaptcha_secret = $config['website']['secretkey'];
		    $recaptcha_response = $_POST['recaptcha_response'];
		    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
		    $recaptcha = json_decode($recaptcha);

		    $id_insert = $d->insert('courses', $data);
			if ($id_insert) {
			    $result['status'] = 200;
				$result['message'] = _thong_bao_them_du_lieu_thanh_cong.' id#'.$id_insert;
				$func->transfer("Đăng ký khóa học thành công".'!', $config_base.'khoa-hoc');
			}else{
				$func->transfer('Đăng ký thất bại'.'!', $config_base.'lien-he');
			}
		 //    if ($recaptcha->score >= 0.5) {
			// 	if($func->sendMailIndex($row_setting['email'],_lien_he_den_tu.' website',$data['content'],array($row_setting['email']),null,null)){
			// 		$id_insert = $d->insert('contacts', $data);
			// 		if ($id_insert) {
			// 		    $result['status'] = 200;
			// 			$result['message'] = _thong_bao_them_du_lieu_thanh_cong.' id#'.$id_insert;
			// 		}
			// 		$func->transfer(_thong_bao_gui_mail_thanh_cong.'!', $config_base);
			// 	}else{
			// 		$func->transfer(_thong_bao_gui_mail_that_bai.'!', $config_base.'lien-he');
			// 	}
			// }else{
			// 	$result['status'] = 201;
			// 	$func->transfer(_thong_bao_spam_he_thong.'!', $config_base.'lien-he');
			// }
		}
	}

?>