<div id="detail-product" class="wrap-bg-in">
    <div class="container">
        <form method="post" data-role="add-to-cart" enctype="multipart/form-data" onsubmit="return false" name="product-detail-<?=$row_detail['id']?>" id="product-detail-<?=$row_detail['id']?>">
            <input type="hidden" name="act" value="addcart">
            <input type="hidden" name="id" value="<?=$row_detail['id']?>">
             <div class="header"><h1><?=$row_detail['name']?></h1></div>
             <div class="row23 d-flex flex-wrap justify-content-between"> 
                <div class="item23 left-k" id="photo-view-detail">
                    <div class="section margin-top-20">
                        <div class="product-tab e-tabs">
                            <div id="chitiet">
                                <div class="detail-set">
                                    <?php 
                                        if(!empty($array_slider)){
                                            $noidung = str_replace(array_keys($array_slider), array_values($array_slider), $func->checkSSLContent($row_detail['content']));
                                            echo htmlspecialchars_decode($func->checkSSLContent($noidung));
                                        }else{
                                            echo htmlspecialchars_decode($func->checkSSLContent($row_detail['content']));
                                        }
                                    ?>
                                </div>
                            </div>
                            <div id="comnent">
                                <div class="fb-comments" data-href="<?=$func->getCurrentPageURL()?>" data-width="100%" data-numposts="5"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item23 right-k">
                    <div class="section margin-top-20 margin-bottom-20">
                        <div class="head-title">
                            <h2 class="d-inline-block title-page">Bài học khác</h2>
                        </div>
                        <div class="product-view">
                            <div class="all-khoa-hoc-other">
                                
                            
                                <ul class="list-bv-video col--1">
                                    <?php foreach ($product_other as $key => $value){ ?>
                                        <li>
                                            <a href="<?=$value['alias']?>">
                                                <i class="fa fa-play-circle" aria-hidden="true"></i>
                                                <?=$value['name']?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    
                                </ul>
                                 <?php $row_cast_list = $d->rawQuery("select id,name_$lang as name, status, alias_$lang as alias, photo, thumb from #_cats where type=? and id_list=? and tmp_table='products' and find_in_set ('hienthi',status) order by numb asc, id asc",array($type,$row_detail['id_list']));?>
                                <div class="margin-top-10 d-flex flex-wrap justify-content-start" id="search-body" data-href="<?=$_GET['com']?>">
                                    <div class="col--1">
                                        <?php if ($row_cast_list && empty($idc)){ ?>
                                            <?php foreach ($row_cast_list as $key => $value){ $row_item_list = $d->rawQuery("select id,name_$lang as name, status, alias_$lang as alias, photo, thumb from #_products where type=? and id_cat=?  and find_in_set ('hienthi',status) order by numb asc, id asc",array($type,$value['id']));?>
                                                <div class="showmenu khoahoc-cs2" data-id="<?=$value['id']?>"><?=$value['name']?></div>
                                                <ul class="list-bv-video margin-bottom-20" data-id="<?=$value['id']?>" style="display: none;">
                                                     <?php foreach ($row_item_list as $k => $v){ ?>
                                                        <li>
                                                            <a href="<?=$v['alias']?>">
                                                                <i class="fa fa-play-circle" aria-hidden="true"></i>
                                                                <?=$v['name']?>
                                                            </a>
                                                        </li>
                                                     <?php } ?>
                                                </ul>
                                            <?php } ?>
                                        <?php }else{ ?>
                                            <?php if(!$func->isAjax()){ ?>
                                                <ul class="list-bv-video">
                                                    <?php foreach ($items as $key => $value){ ?>
                                                        <li>
                                                            <a href="<?=$value['alias']?>">
                                                                <i class="fa fa-play-circle" aria-hidden="true"></i>
                                                                <?=$value['name']?>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                    
                                                </ul>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>

                            </div>
                            <?php /*<div class="margin-top-10 d-flex flex-wrap justify-content-start" id="search-body" data-href="<?=$_GET['com']?>">
                                <?php if(!$func->isAjax()){ ?>
                                    <ul class="list-bv-video col--1">
                                        <?php foreach ($product_other as $key => $value){ ?>
                                            <li>
                                                <a href="<?=$value['alias']?>">
                                                    <i class="fa fa-play-circle" aria-hidden="true"></i>
                                                    <?=$value['name']?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                        
                                    </ul>
                                <?php } ?>
                            </div>*/ ?>
                        </div>
                    </div>
                </div>
             </div>
            
            <div id="content" class="row23 d-flex flex-wrap justify-content-between margin-bottom-20 margin-top-20">
                <div class="item23 left" id="photo-view-detail">
                    <div class="img-top">
                        <a href="<?=_upload_product_l.$row_detail['photo']?>" class="MagicZoom" id="Zoom-1" data-options="variableZoom: true;expand: off; hint: always; " >
                            <img src="<?=_upload_product_l.$row_detail['photo']?>" alt="<?=$row_detail['name']?>"/>
                        </a>
                    </div>
                    <?php if(count($photo)>0){ ?>
                    <div class="img-bottom">
                        <div class="product-detail-slider owl-carousel owl-theme not-aweowl">
                            <div class="items"><div class="img"><a data-zoom-id="Zoom-1" href="<?=_upload_product_l.$row_detail['photo']?>" data-image="<?=_upload_product_l.$row_detail['photo']?>"><img src="<?=_upload_product_l.$row_detail['thumb']?>" alt="<?=$row_detail['name']?>"></a></div></div>
                            <?php foreach($photo as $k=>$v){  ?>
                            <div class="items"><div class="img"><a data-zoom-id="Zoom-1" href="<?=_upload_product_l.$v['photo']?>" data-image="<?=_upload_product_l.$v['photo']?>"><img src="<?=_upload_product_l.$v['thumb']?>" alt="<?=$v['alt']?>"></a></div></div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php 
                    $ex_status = explode(',',$row_detail['status']);
                ?>
                <div class="item23 right">
                    <div class="quickview-info">
                        <div class="status-page">
                            <?php if($row_detail['id_list']!=0){ ?>
                            <div class="status">Khóa học: <span class="status-class"><?=$list_detail['name']?>...</span></div>
                            <?php } ?>
                        </div>
                        <?php if($config['other']['rating']){ ?>
                        <div class="reviews"><?=$func->getRating(5)?></div>
                        <?php } ?>

                         <div class="reviews d-flex justify-content-start">
                            <p class="margin-right-20"><i style="margin-right: 5px;" class="fa fa-calendar" aria-hidden="true"></i><?=($row_detail['updatedAt'])? $row_detail['updatedAt'] : $row_detail['createdAt']?></p>

                            <p><i style="margin-right: 5px;" class="fa fa-eye" aria-hidden="true"> </i> <?=$row_detail['view']?></p>
                        </div>
                        
                    </div>
                    <div class="product-description">
                        <div class="rte"><?=nl2br($row_detail['descs'])?></div>
                    </div>
                
                    <div class="hotline-product margin-top-15">
                        <i class="fa fa-phone"></i> <?=_goi?>: <a href="tel:<?=$row_setting['hotline']?>" title="<?=$row_setting['hotline']?>"><?=$row_setting['hotline']?></a> <span>Để được tư vấn.</span>
                    </div>
                    
                    <div class="social-product">
                        <ul>
                            <li>
                                <button class="sharer btn btn-primary btn-lg" data-sharer="twitter" data-title="<?=$title?>" data-url="<?=$func->getCurrentPageURL()?>"><i class="fa fa-twitter"></i></button>
                            </li>
                            <li>
                                <button class="sharer btn btn-primary btn-lg" data-sharer="facebook" data-url="<?=$func->getCurrentPageURL()?>"><i class="fa fa-facebook"></i></button>
                            </li>
                            <li>
                                <button class="sharer btn btn-primary btn-lg" data-sharer="linkedin" data-url="<?=$func->getCurrentPageURL()?>"><i class="fa fa-linkedin"></i></button>
                            </li>
                            <li>
                               <button class="sharer btn btn-primary btn-lg" data-sharer="email" data-title="<?=$title?>" data-url="<?=$func->getCurrentPageURL()?>" data-subject="<?=$title?>" data-to="<?=$row_setting['email']?>"><i class="fa fa-envelope"></i></button>
                            </li>
                            <li>
                                <button class="sharer btn btn-primary btn-lg" data-sharer="whatsapp" data-title="<?=$title?>" data-url="<?=$func->getCurrentPageURL()?>"><i class="fa fa-whatsapp"></i></button>
                            </li>
                            <li>
                                <button class="sharer btn btn-primary btn-lg" data-sharer="pinterest" data-url="<?=$func->getCurrentPageURL()?>"><i class="fa fa-pinterest"></i></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="section margin-top-20">
                 <?php $row_cast_list = $d->rawQuery("select id,name_$lang as name, status, alias_$lang as alias, photo, thumb from #_cats where type=? and id_list=? and tmp_table='products' and find_in_set ('hienthi',status) order by numb asc, id asc",array($type,$row_detail['id_list']));?>
                <ul class="tags">
                    <?php foreach ($row_cast_list as $k => $v) { ?>
                        <li><a href="<?=$v['alias']?>" class="tag"><?=$v['name']?></a></li>
                    <?php } ?>
                </ul>
            </div>
      
            <?php if(count($product_tags)>0){ ?>
            <div class="section margin-top-20">
                <ul class="tags">
                    <?php foreach ($product_tags as $k => $v) { ?>
                    <li><a href="tags-san-pham/<?=$v['alias']?>" class="tag"><?=$v['name']?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <?php } ?>
        </form>
       
    </div>
</div>
