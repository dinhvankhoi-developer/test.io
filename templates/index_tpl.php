
<?php require_once _layouts.'about.php'; ?>


<?php  $product_lists = $d->rawQuery("SELECT id,desc_$lang as descs,name_$lang as name, alias_$lang as alias,photo from #_lists where type=? and find_in_set ('hienthi',status) and find_in_set ('noibat',status) order by numb asc, id desc",array("khoa-hoc"));
?>
<section id="product-page" class="product-page wow fadeInUp animated" data-wow-duration="2s">
	<div class="container">
		<div class="title-section-module margin-bottom-20">
			<h4>Khóa học PLC</h4>
			<p>Đào tạo lập trình chuyên sâu về PLC, Wincc, Hmi cho các hãng Siemens, LS...</p>
		</div>
		<div class="owl-carousel in-product" data-dot="0" data-nav='1' data-loop='1' data-play='1' data-lg-items='3' data-md-items='3' data-sm-items='2' data-xs-items="2" data-margin='30'>
            <?php foreach ($product_lists as $k => $v) { ?>
			<div class="group-list">
				<div class="img-list">
					<img class="img-block" src="resize/390x305/1/<?=_upload_product_l.$v['photo']?>" alt="<?=$v['name']?>">
					<h4 class="list-title">
						<a href="<?=$v['alias']?>"><?=$v['name']?></a>
					</h4>
					
				</div>
				<div class="position-list">
					<div>
						<p>
							<?=$v['descs']?>
						</p>
					</div>
				</div>
				<p class="xemthem-list"><a href="<?=$v['alias']?>">Xem thêm</a></p>
			</div>
			<?php } ?>
        </div>
	</div>
</section>

<?php 
    $product_lists = $d->rawQuery("SELECT id,name_$lang as name, status, alias_$lang as alias,icon,icon_thumb, photo, thumb from #_lists where type=? and find_in_set ('hienthi',status) order by numb asc, id desc",array("khoa-hoc"));
?>
<section  id="tab-paging" class="saleoff padding-top-30 wow fadeInUp animated" data-wow-duration="2s">
    <div class="container">
    	<div class="title-section-module margin-bottom-20">
			<h4>Video bài giảng</h4>
			<p>Đào tạo lập trình chuyên sâu về PLC, Wincc, Hmi cho các hãng Siemens, LS...</p>
		</div>
        <div class="list-index none">
        	<div class="img-li" data-id="" data-el="view-load-product">
                <span class="name">Tất cả</span>
            </div>
            <?php foreach ($product_lists as $k => $v) { ?>
            <div class="img-li" data-id="<?=$v['id']?>" data-el="view-load-product">
                <span class="name"><?=$v['name']?></span>
            </div>
            <?php } ?>
        </div>
        <div class="row1 margin-top-10 d-flex flex-wrap justify-content-start product-view" id="view-load-product"></div>
    </div>
</section>
<?php require_once _layouts.'product_new.php'; ?>

<?php
     $result_duan = $d->rawQuery("SELECT id,name_$lang as name,desc_$lang as descs, alias_$lang as alias, photo, thumb,UNIX_TIMESTAMP(createdAt) as datecreated from #_posts where type=? and find_in_set ('hienthi',status) order by numb asc limit 0,15",array("du-an"));
?>
<section id="productNew" class="section_sanphamnoibat margin-top-30 margin-bottom-30 wow fadeInUp animated" data-wow-duration="2s">
    <div class="container">
        <div class="wrap-bg-in product-view">
            <div class="title-section-module margin-bottom-20">
                <h4>Dự án</h4>
                <p>Đào tạo lập trình chuyên sâu về PLC, Wincc, Hmi cho các hãng Siemens, LS...</p>
            </div>
            <div class="row d-flex flex-wrap justify-content-between">
                <div class="owl-carousel in-product" data-dot="0" data-nav='1' data-loop='1' data-play='1' data-lg-items='4' data-md-items='4' data-sm-items='3' data-xs-items="2" data-margin='25'>
                	<?php 
						foreach ($result_duan as $k => $v) {
							echo '<div class="col--1">
								<div class="img-service1">
									<div class="content-service1">
										<a href="'.$v['alias'].'"><img class="img-block-auto" src="resize/280x280/1/'._upload_post_l.$v['photo'].'?v='.$config['version'].'" alt="'.$v['name'].'"></a>
										<h3>
											<a href="'.$v['alias'].'" title="'.$v['name'].'">'.$v['name'].'</a>
										</h3>
									</div>
								</div>
							</div>';
						}
					 ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
	$result_hoidap = $d->rawQuery("SELECT id,name_$lang as name,content_$lang as content, alias_$lang as alias, photo, thumb,UNIX_TIMESTAMP(createdAt) as datecreated from #_posts where type=? and find_in_set ('hienthi',status) order by numb asc limit 0,15",array("hoi-dap"));
?>
<section id="quets-box" class="wow fadeInUp animated" data-wow-duration="2s">
	<div class="container">
		<div class="title-section-module margin-bottom-20">
            <h4>Hỏi & Đáp</h4>
        </div>
		<div class="group-hoidap">
			<div class="tabs-question">
				<?php foreach ($result_hoidap as $key => $value){ ?>
					<input class="input-question" name="tabs-question" type="radio" id="tab-<?=$key + 1?>" <?=($key == 0)? 'checked="checked"':''?>/>
					  <label class="label-question" for="tab-<?=$key + 1?>"><?=$value['name']?> <i class="fa fa-angle-right"></i></label>
					  <div class="panel-question">
					  	<?php 
					  		echo htmlspecialchars_decode($func->checkSSLContent($value['content']));
					  	 ?>
					</div>
					<hr>
				<?php } ?>
			  </div>
			</div>
		</div>
	</div>
</section>
<?php 
	$result_why = $d->rawQuery("select thumb, photo, name_$lang as name,link,desc_$lang as descs from #_multi_photos where type=? and find_in_set ('hienthi',status) order by numb asc",array('why'));
?>
<section id="why-box" class="wow fadeInUp animated" data-wow-duration="2s">
	<div class="container">
		<div class="title-section-module text-center margin-bottom-20">
            <h3>Vì sao chọn chúng tôi</h3>
            <p class="white">Đào tạo lập trình chuyên sâu về PLC, Wincc, Hmi cho các hãng Siemens, LS...</p>
        </div>
		<div class="box-why owl-carousel in-product" data-dot="0" data-nav='1' data-loop='1' data-play='0' data-lg-items='4' data-md-items='4' data-sm-items='3' data-xs-items="2" data-margin='20'>
			<?php foreach ($result_why as $k => $v) { ?>
			<div class="box-i-why">
				<div class="cycle">
					<p>
						<a href="<?=$v['link']?>" title="<?=$v['name']?>">
							<img src="<?=_upload_photo_l.$v['photo']?>?v=<?=$config['version']?>" alt="<?=$v['name']?>">
						</a>
					</p>
				</div>
				<div class="desc-why">
					<h4>
						<a href="<?=$v['link']?>" title="<?=$v['name']?>"><?=$v['name']?></a>
					</h4>
					 <p class="meta-content">
                        <?=$func->subSpaceStr($v['descs'],25)?>
                    </p>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php 
	$row_album = $d->rawQuery("select thumb, photo, name_$lang as name, alias_$lang as alias from #_multi_photos where type=? and find_in_set ('hienthi',status) and id_parent=0  order by numb asc",array('album'));
?>
<section id="partner" class="partner-one wow fadeInUp animated" data-wow-duration="2s">
	<div class="container">
		<div class="title-section-module margin-bottom-20">
            <h4>Tài liệu tham khảo</h4>
            <p>Đào tạo lập trình chuyên sâu về PLC, Wincc, Hmi cho các hãng Siemens, LS...</p>
        </div>
		<div class="desc-partner">
			<div class="owl-carousel in-product" data-dot="0" data-nav='1' data-loop='1' data-play='1' data-lg-items='5' data-md-items='5' data-sm-items='4' data-xs-items="3" data-margin='30'>
	            <?php foreach ($row_album as $k => $v) { ?>
				<div class="img-partner">
					<a href="<?=$v['alias']?>" class="d-block"><img class="img-block-auto" src="resize/220x300/1/<?=_upload_photo_l.$v['photo']?>?v=<?=$config['version']?>" alt="<?=$v['name']?>"></a>
				</div>
				<?php } ?>
	        </div>
		</div>
	</div>
</section>

<?php 
	$row_adv = $d->rawQueryOne("select photo,link,name_$lang as name,status from #_photos where type=? and find_in_set ('hienthi', status) limit 0,1", array('adv'));
?>
<section id="adv" class="wow fadeInUp animated" data-wow-duration="2s">
	<div class="adv-product">
		<a href="<?=$row_adv['link']?>" title="<?=$row_adv['name']?>">
			<img class="img-block-auto" src="<?=_upload_photo_l.$row_adv['photo']?>" alt="<?=$row_adv['name']?>">
		</a>
	</div>
</section>


<?php
    $result_news = $d->rawQuery("SELECT id,name_$lang as name,desc_$lang as descs, alias_$lang as alias, photo, thumb,UNIX_TIMESTAMP(createdAt) as datecreated from #_posts where type=? and find_in_set ('hienthi',status) order by numb asc limit 0,15",array("tin-tuc"));
	
	$result_video = $d->rawQuery("select thumb,name_$lang as name,desc_$lang as descs,youtube,view,id,photo from #_videos where type=? and find_in_set ('hienthi',status) order by numb asc, id desc",array('clips')); ?>
<section class="news-one wow fadeInUp animated" data-wow-duration="2s">
	<div class="container">
		<div class="box-news-video d-flex flex-wrap justify-content-between row">
			<div class="item col--2 wow fadeInLeft animated" data-wow-duration="2s">
				<div class="title-service margin-bottom-20">
					<h5 onclick="window.location.href='tin-tuc'">Tin tức & sự kiện</h5>
				</div>
				<div class="slick slick-page slick-why" data-dots="0" data-infinite="0" data-arrows="0" data-autoplay='0' data-slidesDefault="3:1" data-lg-items='3:1' data-md-items='3:1' data-sm-items='3:1' data-xs-items="3:1" data-vertical="1">
		            <?php foreach ($result_news as $k => $v) { ?>
					<div>
						<div class="post-inner">
			                <div class="post-img <?=(($k+1)%2==1) ? 'order1':'order2'?>">
			                    <a href="<?=$v['alias']?>" title="<?=$v['name']?>">
			                        <img class="img-block" src="resize/390x300/1/<?=_upload_post_l.$v['photo']?>" class="img-block-auto" alt="<?=$v['name']?>">
			                    </a>
			                </div>
			                <div class="post-content <?=(($k+1)%2==1) ? 'order2':'order1'?>">
			                	<h3>
			                        <a title="<?=$v['name']?>" href="<?=$v['alias']?>"><?=$v['name']?></a>
			                    </h3>
			                    <p class="meta-content">
			                        <?=$func->subSpaceStr($v['descs'],25)?>
			                    </p>
			                </div>
			            </div>
					</div>
					<?php } ?>
		        </div>
			</div>
			<section id="mail" class="item col--2 wow fadeInRight animated" data-wow-duration="2s">
				<div class="container">
					<div class="content-mail d-flex justify-content-between flex-wrap align-items-center">
						<div class="info-mail">
							<h5>Form đăng ký khóa học</h5>
							<p>Hãy đăng ký để nhận thông tin giá sỉ mới nhất từ chúng tôi ngay nhé</p>
						</div>
						<div class="form-mail">
							<form action="" onsubmit="return false;" method="post" id="subscribe-form" name="subscribe-form" target="_blank">
								<div class="form-d">
									<input type="text" class="input" value="" placeholder="Họ và tên" name="fullname" id="fullname">
								</div>
								<div class="form-d">
									<div class="form-d-2">
										<input type="text" class="input" value="" placeholder="Số điện thoại" name="phone" id="phone">
									</div>
									<div class="form-d-2">
										<input type="email" class="input" value="" placeholder="Email" name="email" id="email">
									</div>
								</div>
								<div class="form-d">
									<textarea name="content" class="input" id="content" placeholder="Nội dung"></textarea>
								</div>
								<input type="hidden" class="input" id="type" value="datlich" name="type">
                                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
								<button class="btn btn-primary subscribe" type="submit" name="subscribe" id="subscribe">Đăng ký ngay</button>
							</form>
						</div>
						<div class="bottom-form">
							<p>Giờ làm việc: <?=$row_setting['time_work']?> </p>
							<p>Quý khách liên hệ để được hỗ trợ</p>
						</div>
					</div>
				</div>
			</section>
			
		</div>
	</div>
</section>

