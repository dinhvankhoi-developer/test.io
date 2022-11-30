<?php 
	$row_logo_index = $d->rawQueryOne("select photo,thumb,name_$lang as name from #_photos where type=? and find_in_set ('hienthi',status)",array('logo'));
	$row_logo_index1 = $d->rawQueryOne("select photo,thumb,name_$lang as name from #_photos where type=? and find_in_set ('hienthi',status)",array('logo1'));
	$row_banner_index = $d->rawQueryOne("select photo,thumb,name_$lang as name from #_photos where type=? and find_in_set ('hienthi',status)",array('banner'));
    $menu_lists_product = $d->rawQuery("SELECT id,name_$lang as name, alias_$lang as alias from #_lists where type=? and find_in_set ('hienthi',status) order by numb asc, id desc",array("san-pham"));
?>
<header id="header" class="header">
	<div class="container">
		<div class="header-box d-flex justify-content-between align-items-center">
			<div class="logo d-flex justify-content-center align-items-center">
				<a href="">
					<img class="img-block-auto" src="<?=_upload_photo_l.$row_logo_index['photo']?>" alt="<?=$row_setting['company']?>">
				</a>
			</div>
			<div class="menu-list d-flex flex-wrap justify-content-end">
				<?php require_once _layouts.'menu.php'; ?>
			</div>
		</div>
	</div>
</header><!-- /header -->

