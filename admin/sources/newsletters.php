<?php 
	/**
	 * Application Main Page That Will Serve All Requests
	 * @package PRO CODE BMWEB FRAMEWORK
	 * @author  APCAO - aphuycao@gmail.com
	 * @version 1.0.0
	 * @license https://bmweb.vn
	 * @PHP >=5.6
	 */
	$url_type .= (isset($_GET['type'])) ? '&type='.htmlspecialchars($_GET['type']):'';
	$type = (isset($_GET['type'])) ? htmlspecialchars($_GET['type']):'';
	$path = _upload_photo;
	switch ($act) {
        case 'man':
			get_items();
			$templates = 'newsletters/items';
			break;
		case 'add':
			$templates = 'newsletters/item_add';
			break;
		case 'edit':
			get_item();
			$templates = 'newsletters/item_add';
			break;
		case 'save':
			save_item();
			$templates = 'newsletters/item_add';
			break;
		case 'delete':
			delete_item();
			break;
        case 'send':
			send_item();
			break;
		default:
			$templates = 'index';
			break;
	}
	function get_items(){
	    global $d,$items,$type;
	    $items = $d->rawQuery("SELECT * from #_newsletters where type=? order by id desc",array($type));
	}
	function get_item(){
		global $d,$item,$type;
		$id = (int)$_GET['id'];
		$item  =  $d->rawQueryOne("select * from #_newsletters where id=? and type=?",array($id,$type));
		if(empty($item)){
			$func->transfer('Không nhận được dữ liệu','index.html');
		}
	}
	function save_item(){
		global $d,$config,$func,$type,$url_type,$setting,$path;
		$message = '';
		$id = (int)$_GET['id'];
		$table = 'newsletters';
		$set = $setting[$table][$type];

		$data = $_POST['data'];
    	if($_POST){
    		foreach ($data as $k => $v) {
				$data[$k] = htmlspecialchars($v);
			}
    	}
		    	
		if($id){
			
			$data['updatedAt'] = $d->now();
			$data['edit_count'] = $d->inc(1);
    		$d->where('id', $id);
			if ($d->update('newsletters', $data)) {
			    $result['status'] = 200;
				$result['message'] = 'Đã cập nhật thông tin thành công id#'.$id;
				$message = base64_encode(json_encode($result));
				$func->redirect('index.html?com=newsletters&act=edit'.$url_type.'&id='.$id.'&message='.$message);
			} else {
			  	$func->transfer('Không nhận được dữ liệu','index.html?com=newsletters&act=man'.$url_type);
			}
		}else{
			$email = $data['email'];
	    	$item_email  =  $d->rawQueryOne("select email from #_newsletters where email=?",array($email));
	    	if($item_email){
	    		$result['status'] = 201;
				$result['message'] = 'Email không được trùng';
				$message = base64_encode(json_encode($result));
				$func->redirect('index.html?com=newsletters&act=add'.$url_type.'&message='.$message);
	    	}else{
			    $data['status'] = 'hienthi';
				$data['type'] = $type;
				$data['createdAt'] = $d->now();
				$id_insert = $d->insert('newsletters', $data);
				if ($id_insert) {
				    $result['status'] = 200;
					$result['message'] = 'Đã thêm dữ liệu thành công id#'.$id_insert;
					$message = base64_encode(json_encode($result));
					$func->redirect('index.html?com=newsletters&act=man'.$url_type.'&message='.$message);
				}
	    	}
		}
	}
	function delete_item(){
		global $d,$func,$url_type;
		$id = (int)$_GET['id'];

		if(isset($_GET['id'])){
			$item  =  $d->rawQueryOne("select id from #_newsletters where id=?",array($id));
			if($item){
				$d->where('id', $item['id']);
				$d->delete('newsletters');
	        	$result['status'] = 200;
				$result['message'] = 'Đã xóa dữ liệu thành công id#'.$id;
				$message = base64_encode(json_encode($result));
				$func->redirect('index.html?com=newsletters&act=man'.$url_type.'&message='.$message);
			}else{
				$func->transfer('Không nhận được dữ liệu','index.html?com=newsletters&act=man'.$url_type);
			}
		}elseif(isset($_GET['listid'])){
			$listid = explode(",",$_GET['listid']);
			if(count($listid)){
				$result['message'] = 'Đã xóa dữ liệu thành công id#';
				foreach ($listid as $k => $v) {
					$id = (int)$v;
					$item  =  $d->rawQueryOne("select id from #_newsletters where id=?",array($id));
					if($item){
						$d->where('id', $item['id']);
						$d->delete('newsletters');
						$result['message'] .= $id.',';
					}
				}
				$result['message'] = substr($result['message'], 0, -1);
				$result['status'] = 200;
				$message = base64_encode(json_encode($result));
				$func->redirect('index.html?com=newsletters&act=man'.$url_type.'&message='.$message);
			}else{
				$func->transfer('Không nhận được dữ liệu','index.html?com=newsletters&act=man'.$url_type);
			}
		}

	}
	function send_item(){
		global $d,$func,$url_type,$config,$path,$config_url;
		
		$mail = new PHPMailer();
		$mail->IsSMTP(); // Gọi đến class xử lý SMTP
		$mail->Host       = $config['mail']['ip']; // tên SMTP server
		$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
		$mail->SMTPSecure =  $config['mail']['smtp'];                // Sử dụng đăng nhập vào account
		$mail->Port   = $config['mail']['port'];                  // Sử dụng đăng nhập vào account
		$mail->Username   = $config['mail']['email']; // SMTP account username
		$mail->Password   = $config['mail']['password'];  
		$mail->SetFrom($config['mail']['email'], $_POST['subject']);

		if (!empty($_FILES['file']) && count($_FILES['file'])>0) {
            if (isset($_FILES['file'])) {
            	$arrFiles = array();
            	$m = 0;
            	for($i=0;$i<count($_FILES['file']['name']);$i++){
            		if($_FILES['file']['error'][$i]!=4){
            			$files['name'] = $_FILES['file']['name'][$i];
						$files['type'] = $_FILES['file']['type'][$i];
						$files['tmp_name'] = $_FILES['file']['tmp_name'][$i];
						$files['error'] = $_FILES['file']['error'][$i];
						$files['size'] = $_FILES['file']['size'][$i];
						$photo = $func->uploadFileSend('file',$files,$path);
			    		$arrFiles[$m] = $path.$photo['file'];
			    		$m++;
            		}
            	}
            }
        }
        
		$listid = explode(",",$_POST['listid']);
		$arrMail = array();
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin = $listid[$i]; 
			$id =  (int)$idTin;		
			$sql = "select email from #_newsletters where id=?";
			$row = $d->rawQueryOne($sql,array($id));
			$arrMail[$i] = $row['email'];
			$mail->AddAddress($row['email'], $_POST['subject']);
		}
		for ($i=0; $i < count($arrFiles); $i++) { 
			$mail->AddAttachment($config_url.$arrFiles[$i]);
		}
				
		$mail->Subject    = '['.$_POST['subject'].']';
		$mail->IsHTML(true);
		$mail->CharSet = "utf-8";	
		$body = $_POST['summernote'];
		$mail->Body = $body;
		$mail->Send();
		$data['type'] = htmlspecialchars($_POST['type']);
		$data['subject'] = htmlspecialchars($_POST['subject']);
		$data['contents'] = htmlspecialchars($body);
		$data['files_attach'] = json_encode($arrFiles);
		$data['lists_mail'] = json_encode($arrMail);
		$data['createdAt'] = $d->now();
		$id_insert = $d->insert('sends', $data);
		if ($id_insert) {
		    $result['status'] = 200;
			$result['message'] = 'Đã thêm dữ liệu thành công id#'.$id_insert;
			$message = base64_encode(json_encode($result));
			$func->transfer('Đã gữi hoàn tất','index.html?com=newsletters&act=man'.$url_type);
		}
	}
?>