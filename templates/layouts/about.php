<?php 
	$row_gioithieu = $d->rawQueryOne("select name_$lang as name, alias_$lang as alias, desc_$lang as descs, id,thumb from #_pages where type=? order by numb asc",array('gioi-thieu'));
?>
<section id="about" class="about">
	<div class="container">
		<div class="row d-flex justify-content-between flex-wrap">
			
			<div class="item col--2 wow fadeInLeft animated" data-wow-duration="2s">
				<h5>Đào tạo PLC</h5>
				<h2><?=$row_gioithieu['name']?></h2>
				<div class="desc">
					<?=htmlspecialchars_decode($row_gioithieu['descs'])?>
				</div>
				<a href="gioi-thieu" class="readmore">Xem thêm</a>
			</div>
			<div class="item col--2 wow fadeInRight animated" data-wow-duration="2s">
				<div class="desc-img d-flex justify-content-end flex-wrap">
					<a href="gioi-thieu" title="">
						<img class="img-block" src="<?=_upload_post_l.$row_gioithieu['thumb']?>" alt="<?=$row_gioithieu['name']?>">
					</a>
				</div>
			</div>
		</div>
	</div>
</section>