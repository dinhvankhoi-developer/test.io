<?php  $khoahoc_lists = $d->rawQuery("SELECT id,name_$lang as name, status, alias_$lang as alias,icon,icon_thumb, photo, thumb,price, price_old from #_lists where type=? and find_in_set ('hienthi',status) order by numb asc, id desc",array("khoa-hoc")); ?>
<style> .item-product-main .product-item-main .product-bottom .price-box{display: block;}</style>
<?php if (!empty($idl) || !empty($idc)){ ?>
    <?php $link_search = ($_GET['com']!='tags-san-pham') ? $_GET['com']:$_GET['com'].'/'.$_GET['idl']; ?>
    <div class="wrap-bg-in margin-bottom-20">
        <div class="container">
            <div class="row d-flex flex-wrap justify-content-between">
                <div class="head-title">
                    <h1><?=$title?></h1>
                </div>
                <?php if($config['other']['sortby']==true){ ?>
                <div id="sort-by" class="item d-flex flex-wrap justify-content-end">
                    <label class="left"><?=_sap_xep?>: </label>
                    <ul class="ul_col">
                        <li>
                            <span class="show-sort-by"><?=_macdinh?> <i class="fa fa-angle-down"></i></span>
                            <ul class="content_ul">                    
                                <li><a style="cursor: pointer" class="change-sortby" data-href="<?=$link_search?>" data-sort="id-desc"><?=_macdinh?></a></li>
                                <li><a style="cursor: pointer" class="change-sortby" data-href="<?=$link_search?>" data-sort="name_<?=$lang?>-asc">A → Z</a></li>
                                <li><a style="cursor: pointer" class="change-sortby" data-href="<?=$link_search?>" data-sort="name_<?=$lang?>-desc">Z → A</a></li>
                                <li><a style="cursor: pointer" class="change-sortby" data-href="<?=$link_search?>" data-sort="price-asc"><?=_gia_tang_dan?></a></li>
                                <li><a style="cursor: pointer" class="change-sortby" data-href="<?=$link_search?>" data-sort="price-desc"><?=_gia_giam_dan?></a></li>
                                <li><a style="cursor: pointer" class="change-sortby" data-href="<?=$link_search?>" data-sort="createdAt-desc"><?=_hang_moi_nhat?></a></li>
                                <li><a style="cursor: pointer" class="change-sortby" data-href="<?=$link_search?>" data-sort="createdAt-asc"><?=_hang_cu_nhat?></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <?php } ?>
            </div>
            <div class="product-view">
                <?php $row_cast_list = $d->rawQuery("select id,name_$lang as name, status, alias_$lang as alias, photo, thumb from #_cats where type=? and id_list=? and tmp_table='products' and find_in_set ('hienthi',status) order by numb asc, id asc",array($type,$row_list['id']));?>
                <div class="row margin-top-10 d-flex flex-wrap justify-content-start" id="search-body" data-href="<?=$_GET['com']?>">
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
            <?php if($_GET['com']!='tags-san-pham'){ ?>
            <input type="hidden" name="href" value="<?=base64_encode($config_base.$link_search)?>">
            <?php }else{ ?>
            <input type="hidden" name="href" value="<?=base64_encode($config_base.$link_search)?>">
            <?php } ?>
        </div>
    </div>
    
<?php }else{ ?>
    <?php $link_search = ($_GET['com']!='tags-san-pham') ? $_GET['com']:$_GET['com'].'/'.$_GET['idl']; ?>
    <div class="wrap-bg-in margin-bottom-20">
        <div class="container">
            <div class="row d-flex flex-wrap justify-content-between">
                <div class="head-title item">
                    <h1><?=$title?></h1>
                </div>
                <?php if($config['other']['sortby']==true){ ?>
                <div id="sort-by" class="item d-flex flex-wrap justify-content-end">
                    <label class="left"><?=_sap_xep?>: </label>
                    <ul class="ul_col">
                        <li>
                            <span class="show-sort-by"><?=_macdinh?> <i class="fa fa-angle-down"></i></span>
                            <ul class="content_ul">                    
                                <li><a style="cursor: pointer" class="change-sortby" data-href="<?=$link_search?>" data-sort="id-desc"><?=_macdinh?></a></li>
                                <li><a style="cursor: pointer" class="change-sortby" data-href="<?=$link_search?>" data-sort="name_<?=$lang?>-asc">A → Z</a></li>
                                <li><a style="cursor: pointer" class="change-sortby" data-href="<?=$link_search?>" data-sort="name_<?=$lang?>-desc">Z → A</a></li>
                                <li><a style="cursor: pointer" class="change-sortby" data-href="<?=$link_search?>" data-sort="price-asc"><?=_gia_tang_dan?></a></li>
                                <li><a style="cursor: pointer" class="change-sortby" data-href="<?=$link_search?>" data-sort="price-desc"><?=_gia_giam_dan?></a></li>
                                <li><a style="cursor: pointer" class="change-sortby" data-href="<?=$link_search?>" data-sort="createdAt-desc"><?=_hang_moi_nhat?></a></li>
                                <li><a style="cursor: pointer" class="change-sortby" data-href="<?=$link_search?>" data-sort="createdAt-asc"><?=_hang_cu_nhat?></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <?php } ?>
            </div>
            <div class="product-view">
                <div class="row margin-top-10 d-flex flex-wrap justify-content-start" id="search-body" data-href="<?=$_GET['com']?>">
                    <?php if(!$func->isAjax()){ ?>
                        <?php echo $func->getTemplateProductList($khoahoc_lists,'col--4 item','','margin-bottom-30','resize/280x225/1/',0, null, 0); ?>
                    <?php } ?>
                </div>
            </div>
            <?php if($_GET['com']!='tags-san-pham'){ ?>
            <input type="hidden" name="href" value="<?=base64_encode($config_base.$link_search)?>">
            <?php }else{ ?>
            <input type="hidden" name="href" value="<?=base64_encode($config_base.$link_search)?>">
            <?php } ?>
        </div>
    </div>

<?php } ?>