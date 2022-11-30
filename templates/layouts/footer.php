<?php 
	$result_online = $counter->countOnline();
	$result_counter = $counter->getCounter();

	$result_chinhsach = $d->rawQuery("select name_$lang as name, alias_$lang as alias, id from #_posts where type=? and find_in_set ('hienthi',status) order by numb asc",array('chinh-sach'));
	$result_branchs = $d->rawQuery("select name_$lang as name, alias_$lang as alias, id, address_$lang as address, phone, hotline, email from #_branchs where type=? and find_in_set ('hienthi',status) order by numb asc",array('branch'));
	$row_footer = $d->rawQueryOne("select name_$lang as name, alias_$lang as alias, desc_$lang as descs, id,thumb,photo from #_infos where type=? order by numb asc",array('footer'));
	$result_social = $d->rawQuery("select thumb,name_$lang as name,photo,link from #_multi_photos where type=? and find_in_set ('hienthi',status)",array('social'));
	$row_logo_footer = $d->rawQueryOne("select photo,thumb,name_$lang as name from #_photos where type=? and find_in_set ('hienthi',status)",array('logo-footer'));
	$menu_lists_footer = $d->rawQuery("SELECT id,name_$lang as name, alias_$lang as alias from #_lists where type=? and find_in_set ('hienthi',status) order by numb asc, id desc",array("san-pham"));
?>

<footer class="footer bg-footer wow fadeInUp animated" data-wow-duration="2s">
	<div class="container">
		<div class="footer-top row d-flex justify-content-between">
			<div class="item f-social">
				<h4 class="name-company">Thông tin liên hệ</h4>
				 <?php if($row_footer['descs'] !=''){ ?>

					<div class="showtext margin-bottom-20">

						<?=htmlspecialchars_decode($row_footer['descs'])?>

					</div>

					<?php }?>	
				<span class="margin-right-20">Mạng xã hội</span>
				<ul class="social d-flex flex-wrap justify-content-start align-items-center">
			       	<?php foreach ($result_social as $k => $v){ ?>
					<li class="margin-right-10">
						<a href="<?=$v['link']?>">
							<img src="<?=_upload_photo_l.$v['thumb']?>" alt="<?=$v['name']?>">
						</a>	
					</li>
					<?php } ?>
		       </ul>
			</div>
			<div class="item f-name">
				<h4 class="name-company">Chính sách ưu đãi</h4>
				<?php if($result_chinhsach){ ?>
				<ul class="list-menu d-flex justify-content-center flex-wrap margin-top-20">
		        	<?php foreach ($result_chinhsach as $k => $v) { ?>
		            <li class="li_menu"><a href="<?=$v['alias']?>"><?=$v['name']?></a></li>
		            <?php } ?>
		        </ul>
		        <?php } ?>
			</div>
			<div class="item f-mail">
				<h4 class="name-company">Fanpage facebook</h4>
				<div class="fanpage-overflow">
					<div class="fb-page" data-href="<?=$row_setting['fanpage']?>" data-width="500" data-height="250" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?=$row_setting['fanpage']?>"><a href="<?=$row_setting['fanpage']?>"><?=$row_setting['ten_'.$lang]?></a></blockquote></div></div>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright">
		<div class="container">
			<div class="d-flex justify-content-between align-items-center">
				<p>
					© Bản quyền thuộc về <b><a href="<?=$row_setting['website']?>" title="<?=$row_setting['company']?>" target="_blank"><?=$row_setting['company']?></a></b> Cung cấp bởi <a href="//BMWEB.vn" rel="nofollow" title="BMWEB" target="_blank">BMWEB co.ltd</a>
				</p>
				<p>
					Đang online: <?=$result_online['dangxem']?> | Tổng truy cập: <?=$result_counter['totalaccess']?>
				</p>
			</div>
		</div>
	</div>
</footer>

