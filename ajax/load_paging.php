<?php 
	/**
	 * Application Main Page That Will Serve All Requests
	 * @package PRO CODE BMWEB FRAMEWORK
	 * @author  AP CAO <aphuycao.dev@gmail.com>
	 * @version 1.0.0
	 * @license https://bmweb.vn
	 * @PHP >=5.6
	 */
	require_once 'config.php';

	require_once _lib.'paginations.php';
	
	//$field_load = "name_$lang as name, alias_$lang as alias, id, photo, thumb, price, price_old, status";

	$field_load = "thumb,name_$lang as name,desc_$lang as descs,youtube,view,id,photo";
	
	$perPage = new paginations();
	$perPage->perpage = $row_setting['page_index'];
	$rowcount = (int)htmlspecialchars($_GET['rowcount']);
	$cateid = (int)htmlspecialchars($_GET['cateid']);
	$listid = (int)htmlspecialchars($_GET['listid']);
	$eShow = htmlspecialchars($_GET['eShow']);

	if(!empty($_GET['cateid'])){
		$where .= " and id_cat=".$cateid;
	}
	if(!empty($_GET['listid'])){
		$where .= " and id_list=".$listid;
	}
	$sql = "SELECT $field_load from #_videos where id<>0 $where and find_in_set('hienthi',status) and type='clips' ";
	if(!empty($_GET['cateid']) && !empty($_GET['listid'])){
		$paginationlink = "ajax/load_paging.php?listid=".$listid."&cateid=".$cateid."&p=";
	}else{
		$paginationlink = "ajax/load_paging.php?listid=".$listid."&p=";
	}
	$page = 1;
	if(!empty($_GET["p"])) { $page = (int)$_GET["p"]; }

	$start = ($page-1) * $perPage->perpage;
	if($start < 0) $start = 0;

	$query =  $sql . " limit " . $start . "," . $perPage->perpage; 
	$items = $d->rawQuery($query);

	$result = $d->rawQuery($sql);

	if($rowcount==0) {
		$rowcount = count($result);
	}
	
	$perpageresult = $perPage->getAllPageLinks($rowcount, $paginationlink,$eShow);	

	$output = '';
	if(count($result)==0){
		$output .= '<div class="w-100 margin-bottom-30"><p class="text-center">Dữ liệu không được tìm thấy</p></div>';
	}else{
		// $output .= $func->getTemplateProduct($items,'col--4 item','','margin-bottom-30','resize/280x225/1/',0, array('moi'), 1);
		// 
		//$output .= $func->getTemplateProduct($items,'col--4 item','','margin-bottom-30','resize/280x225/1/',0, null, 0);

		foreach ($items as $k => $v) {
			$output .= '<div class="item col-3 margin-bottom-30">
				<div class="img-service1"><a data-fancybox="thumbnail" href="https://www.youtube.com/watch?v='.$func->youtobe($v['youtube']).'" title="'.$v['name'].'">
					<div class="img-video">
						<img class="ytd-thumbnail img-block" src="https://i1.ytimg.com/vi/'.$func->youtobe($v['youtube']).'/0.jpg" alt="'.$v['name'].'">
						<span class="play"></span>
					</div>
					<h4 class="video-title">'.$v['name'].'</h4>
				</a></div>
			</div>';
		}
	}
	

	if(!empty($perpageresult)) {
		$output .= '<div id="pagination">' . $perpageresult . '</div>';
	}
	echo $output;
?>