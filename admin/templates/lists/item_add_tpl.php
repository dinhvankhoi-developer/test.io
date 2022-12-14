<?php 

    $csetting = $setting[$_GET['table']][$_GET['type']];

?>

<!--Content Header (Page header)-->

<div class="content-header row align-items-center m-0">

    <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">

        <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">

            <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>

            <li class="breadcrumb-item active"><a href="index.html?com=lists&act=man<?=$url_type?>">Danh mục <?=$csetting['name']?></a></li>

        </ol>

    </nav>

    <div class="col-sm-8 header-title p-0">

        <div class="media">

            <div class="header-icon text-success mr-3"><i class="typcn typcn-spiral"></i></div>

            <div class="media-body">

                <h1 class="font-weight-bold">Danh mục <?=$csetting['name']?> cấp 1</h1>

                <small>Hệ thống quản trị nội dung website</small>

            </div>

        </div>

    </div>

</div>

<!--/.Content Header (Page header)--> 

<div class="body-content">

    <?php if($_GET['act']=='edit' && $csetting['list-seo']==true){ ?>

    <?php foreach ($config['website']['lang'] as $k => $v) { ?>

        <?=$func->messageSeoPage($item['title_'.$k],$item['description_'.$k],$k)?>

    <?php } ?> 

    <?php } ?>

    <?=$func->messagePage($_GET['message'])?>

    <form action="index.html?com=lists&act=save<?=$url_type?><?=($_GET['id']) ? '&id='.$_GET['id']:''?>" method="post" name="form-action" id="form-action"  enctype="multipart/form-data" autocomplete="off" accept-charset="utf-8">

        <div class="row ngonngu-sticky">

            <div class="col-lg-12">

                <div class="card mb-4 ">

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-8">

                                <?php if (count($config['website']['lang'])>1){ ?>

                                <ul class="nav-ngonngu">

                                    <?php foreach ($config['website']['lang'] as $k => $v) { ?>

                                    <li class="mr-3">

                                        <a href="<?=$k?>" class="<?= ($k == 'vi') ? 'active': '' ?> tipS">

                                            <img src="assets/dist/img/<?=$k?>.svg"> <?=$v?>

                                        </a>

                                    </li>

                                    <?php } ?>

                                </ul>

                                <?php } ?>

                            </div>

                            <div class="col-md-4">

                                <div class="form-group text-right mb-0">

                                    <button type="submit" class="btn btn-fill btn-primary"><?=($_GET['act']=='edit') ? 'Cập nhật':'Thêm mới'?></button>

                                    <a role="button" href="index.html?com=lists&act=man<?=$url_type?>" class="btn btn-fill btn-danger">Thoát</a>

                                </div>

                            </div>

                        </div>

                        

                    </div>

                </div>

            </div>

        </div>

        <?php if($csetting['list-img']==true){ ?>

        <div class="row">

            <div class="col-lg-12">

                <div class="card mb-4">

                    <div class="card-header">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="fs-17 font-weight-600 mb-0">Ảnh đại diện danh mục</h6>

                            </div>

                        </div>

                    </div>

                    <div class="card-body">

                        <?php if($_GET['act']=='edit' && $item['photo']!=''){ ?>

                        <div class="row hinhanh">

                            <div class="col-md-12">

                                <div class="form-group">

                                    <div class="delete-img">

                                        <img src="<?=$path.$item['photo']?>" width="250">

                                        <span class="deleteImg" data-table="<?=$_GET['com']?>" data-path="<?=$path?>" data-id="<?=$item['id']?>"><i class="typcn typcn-trash"></i></span>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <?php } ?>

                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">

                                    <p class="text-danger">Width: <?=$setting[$_GET['table']][$_GET['type']]['list-thumb-w']?>px - Height: <?=$setting[$_GET['table']][$_GET['type']]['list-thumb-h']?>px</p>

                                </div>

                                <div class="form-group mb-0">

                                    <input type="file" name="photo" id="photo" class="custom-input-file"/>

                                    <label for="photo">

                                        <i class="typcn typcn-upload"></i>

                                        <span><?=($item['photo']!='') ? $path.$item['photo']:'Choose a file…'?></span>

                                    </label>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <?php } ?>



        <?php if($csetting['list-icon']==true) { ?>

        <div class="row">

            <div class="col-lg-12">

                <div class="card mb-4">

                    <div class="card-header">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="fs-17 font-weight-600 mb-0">Ảnh icon</h6>

                            </div>

                        </div>

                    </div>

                    <div class="card-body">

                        <?php if($_GET['act']=='edit' && $item['icon']!=''){ ?>

                        <div class="row hinhanh">

                            <div class="col-md-12">

                                <div class="form-group">

                                    <div class="delete-img">

                                        <img src="<?=$path.$item['icon']?>" width="200" style="max-width: 100% !important;">

                                        <span class="deleteImg" data-table="<?=$_GET['com']?>" data-path="<?=$path?>" data-field="icon,icon_thumb" data-id="<?=$item['id']?>"><i class="typcn typcn-trash"></i></span>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <?php } ?>

                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">

                                    <p class="text-danger">Width: <?=$csetting['list-thumb-iw']?>px - Height: <?=$csetting['list-thumb-ih']?>px</p>

                                </div>

                                <div class="form-group mb-0">

                                    <input type="file" name="icon" id="icon" class="custom-input-file"/>

                                    <label for="icon">

                                        <i class="typcn typcn-upload"></i>

                                        <span><?=($item['icon']!='') ? $path.$item['icon']:'Choose a file…'?></span>

                                    </label>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <?php } ?>

        

        <?php if($csetting['list-adv']==true) { ?>

        <div class="row">

            <div class="col-lg-12">

                <div class="card mb-4">

                    <div class="card-header">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="fs-17 font-weight-600 mb-0">Ảnh adv</h6>

                            </div>

                        </div>

                    </div>

                    <div class="card-body">

                        <?php if($_GET['act']=='edit' && $item['adv']!=''){ ?>

                        <div class="row hinhanh">

                            <div class="col-md-12">

                                <div class="form-group">

                                    <div class="delete-img">

                                        <img src="<?=$path.$item['adv']?>" width="<?=$csetting['list-thumb-aw']?>" style="max-width: 100% !important;">

                                        <span class="deleteImg" data-table="<?=$_GET['com']?>" data-path="<?=$path?>" data-field="adv,adv_thumb" data-id="<?=$item['id']?>"><i class="typcn typcn-trash"></i></span>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <?php } ?>

                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">

                                    <p class="text-danger">Width: <?=$csetting['list-thumb-aw']?>px - Height: <?=$csetting['list-thumb-ah']?>px</p>

                                </div>

                                <div class="form-group">

                                    <input type="file" name="adv" id="adv" class="custom-input-file"/>

                                    <label for="adv">

                                        <i class="typcn typcn-upload"></i>

                                        <span><?=($item['adv']!='') ? $path.$item['adv']:'Choose a file…'?></span>

                                    </label>

                                </div>

                            </div>

                            

                        </div>

                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group mb-0">

                                    <label class="font-weight-600">Link adv</label>

                                    <input type="text" class="form-control" value="<?=$item['adv_link']?>" id="adv_link" name="data[adv_link]" placeholder="Link adv">

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <?php } ?>





        <div class="row">

            <div class="col-lg-12">

                <div class="card mb-4">

                    <div class="card-header">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="fs-17 font-weight-600 mb-0">Thông tin chung</h6>

                            </div>

                        </div>

                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">

                                    <?php foreach ($config['website']['lang'] as $k => $v) { ?>

                                    <div class="form-group lang_hidden lang_<?=$k?> <?= ($k == 'vi') ? 'active': '' ?>">

                                        <label class="font-weight-600">Tiêu đề [<?=$v?>]</label>

                                        <input type="text" class="form-control" value="<?=$item['name_'.$k]?>" data-validation="required" data-validation-error-msg="Tiêu đề không được để trống" onkeyup="changeSlug('name_<?=$k?>','alias_<?=$k?>','url_seo_<?=$k?>','title_seo_<?=$k?>','title_<?=$k?>')" id="name_<?=$k?>" name="data[name_<?=$k?>]" placeholder="Tiêu đề">

                                    </div>

                                    <?php } ?>

                                </div>

                            </div>

                        </div>

                        <?php if($csetting['list-name']==true) { ?>

                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">

                                    <?php foreach ($config['website']['lang'] as $k => $v) { ?>

                                    <div class="form-group lang_hidden lang_<?=$k?> <?= ($k == 'vi') ? 'active': '' ?>">

                                        <label class="font-weight-600">Tiêu đề html [<?=$v?>]</label>

                                        <input type="text" class="form-control" value="<?=$item['show_'.$k]?>" data-validation="required" data-validation-error-msg="Tiêu đề html không được để trống" id="show_<?=$k?>" name="data[show_<?=$k?>]" placeholder="Tiêu đề html">

                                    </div>

                                    <?php } ?>

                                </div>

                            </div>

                        </div>

                        <?php } ?>

                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">

                                    <?php foreach ($config['website']['lang'] as $k => $v) { ?>

                                    <div class="form-group lang_hidden lang_<?=$k?> <?= ($k == 'vi') ? 'active': '' ?>">

                                        <label class="font-weight-600">Alias [<?=$v?>]</label>

                                        <div class="input-group">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text" id="website-link"><?=$config_base?></span>

                                            </div>

                                            <input type="text" class="form-control" onblur="changeUrl('alias_<?=$k?>','url_seo_<?=$k?>')" data-validation="required" data-validation-error-msg="Url không được để trống" value="<?=$item['alias_'.$k]?>" id="alias_<?=$k?>" name="data[alias_<?=$k?>]" placeholder="Url (tên không dấu)">

                                            <?php if($_GET['act']=='edit'){ ?>

                                            <div class="input-group-append">

                                                <div class="input-group-text">

                                                    <input type="checkbox" id="checkUrl<?=$k?>" data-id="<?=$k?>" class="change_alias alias_<?=$k?>" checked>

                                                    <label for="checkUrl<?=$k?>" class="mb-0 ml-1">Không đổi link</label>

                                                </div>

                                            </div>

                                            <?php } ?>

                                        </div>

                                    </div>

                                    <?php } ?>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                             <?php if($csetting['list-price']==true){ ?>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <label class="font-weight-600">Giá bán</label>

                                    <input type="text" class="form-control money-form" value="<?=($item['price']) ? $item['price']:0?>" id="price" name="data[price]" placeholder="Giá bán < Giá cũ">

                                </div>

                            </div>

                            <?php } ?>

                            <?php if($csetting['list-price-old']==true){ ?>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <label class="font-weight-600">Giá cũ</label>

                                    <input type="text" class="form-control money-form" value="<?=($item['price_old']) ? $item['price_old']:0?>" id="price_old" name="data[price_old]" placeholder="Giá cũ > giá bán">

                                </div>

                            </div>

                            <?php } ?>

                            <?php if($csetting['list-code']==true){ ?>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <label class="font-weight-600">SKU</label>

                                    <input type="text" class="form-control" value="<?=$item['code']?>" id="code" name="data[code]" placeholder="Mã SKU">

                                </div>

                            </div>

                            <?php } ?>

                            

                        </div>

                        <?php if($csetting['list-mota']==true) { ?>

                        <div class="row">

                            <div class="col-md-12">

                                <?php foreach ($config['website']['lang'] as $k => $v) { ?>

                                <div class="form-group lang_hidden lang_<?=$k?> <?= ($k == 'vi') ? 'active': '' ?>">

                                    <label class="font-weight-600">Mô tả [<?=$v?>]</label>

                                    <textarea rows="4" cols="80" <?php if($csetting['list-mota-ck']==true) { ?>class="ck_editor" data-height="300"<?php }else{ ?>class="form-control"<?php } ?> name="data[desc_<?=$k?>]" id="desc_<?=$k?>"  placeholder="Nhập mô tả"><?=$item['desc_'.$k]?></textarea>

                                </div>

                                <?php } ?>

                            </div>

                        </div>

                        <?php } ?>

                        <?php if($csetting['list-noidung']==true) { ?>

                        <div class="row">

                            <div class="col-md-12">

                                <?php foreach ($config['website']['lang'] as $k => $v) { ?>

                                <div class="form-group lang_hidden lang_<?=$k?> <?= ($k == 'vi') ? 'active': '' ?>">

                                    <label class="font-weight-600">Nội dung [<?=$v?>]</label>

                                    <textarea rows="4" cols="80" <?php if($csetting['list-noidung-ck']==true) { ?>class="ck_editor" data-height="300"<?php }else{ ?>class="form-control"<?php } ?> name="data[content_<?=$k?>]" id="content_<?=$k?>"  placeholder="Nhập nội dung"><?=$item['content_'.$k]?></textarea>

                                </div>

                                <?php } ?>

                            </div>

                        </div>

                        <?php } ?>

                    </div>

                    

                </div>

            </div>

        </div>

        <?php if($csetting['list-seo']==true){ ?>

        <div class="row">

            <div class="col-lg-12">

                <div class="card mb-4">

                    <div class="card-header">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="fs-17 font-weight-600 mb-0">Hiển thị trên google search</h6>

                            </div>

                        </div>

                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-12">

                                <?php foreach ($config['website']['lang'] as $k => $v) { ?>

                                <div class="form-group mb-0 lang_hidden lang_<?=$k?> <?= ($k == 'vi') ? 'active': '' ?>">

                                    <p class="url_seo"><?=$config_base?><span id="url_seo_<?=$k?>"><?=($item['alias_'.$k]!='') ? $item['alias_'.$k]:'toi-uu-seo-onpage'?></span></p>

                                    <h3 class="title_seo" id="title_seo_<?=$k?>"><?=($item['title_'.$k]!='') ? $item['title_'.$k]:'[SEO Onpage] là gì? Hướng dẫn tối ưu SEO Onpage ...'?></h3>

                                    <p class="description_seo" id="description_seo_<?=$k?>"><?=($item['description_'.$k]!='') ? $item['description_'.$k]:'Hướng dẫn SEO onpage căn bản tối ưu để trang web chuẩn SEO lên top Google nhanh và bền vững, kỹ thuật tối ưu SEO onpage đơn giản'?></p>

                                </div>

                                <?php } ?>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-lg-12">

                <div class="card mb-4">

                    <div class="card-header">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="fs-17 font-weight-600 mb-0">Thông tin Seo</h6>

                            </div>

                        </div>

                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-12">

                                <?php foreach ($config['website']['lang'] as $k => $v) { ?>

                                <div class="form-group lang_hidden lang_<?=$k?> <?= ($k == 'vi') ? 'active': '' ?>">

                                    <label class="font-weight-600">Title [<?=$v?>]</label>

                                    <input type="text" class="form-control" value="<?=$item['title_'.$k]?>" onkeyup="changeSeo('title_<?=$k?>','title_seo_<?=$k?>','name_<?=$k?>'),countChar('title_<?=$k?>')" id="title_<?=$k?>" data-min="10" data-max="70" name="data[title_<?=$k?>]" placeholder="Tiêu đề">

                                    <p class="mt-2">Số ký tự [10-70]: 

                                        <span class="text-danger" id="count_title_<?=$k?>"><?=mb_strlen($item['title_'.$k])?></span>

                                        <span class="<?=(mb_strlen($item['title_'.$k])<10 || mb_strlen($item['title_'.$k])>70) ? 'text-danger':'text-success'?>" id="status_title_<?=$k?>"><?=(mb_strlen($item['title_'.$k])<10 || mb_strlen($item['title_'.$k])>70) ? 'Không tốt':'Khá tốt'?></span>

                                    </p>

                                    

                                </div>

                                <?php } ?>

                                

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-12">

                               <?php foreach ($config['website']['lang'] as $k => $v) { ?>

                                <div class="form-group lang_hidden lang_<?=$k?> <?= ($k == 'vi') ? 'active': '' ?>">

                                    <label class="font-weight-600">Keywords [<?=$v?>]</label>

                                    <textarea rows="4" cols="80" class="form-control" name="data[keywords_<?=$k?>]" id="keywords_<?=$k?>"  placeholder="Nhập Keywords SEO"><?=$item['keywords_'.$k]?></textarea>

                                    <p class="mt-2 text-danger">

                                        Meta keywords là những từ hoặc cụm từ liên quan đến nội dung trang web của bạn. Trước đây, mọi người đã cố gắng tận dụng thẻ này để bây giờ nó không ảnh hưởng đến thứ hạng tìm kiếm của bạn như trước đây.

                                    </p>

                                </div>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-12">

                                <?php foreach ($config['website']['lang'] as $k => $v) { ?>

                                <div class="form-group mb-0 lang_hidden lang_<?=$k?> <?= ($k == 'vi') ? 'active': '' ?>">

                                    <label class="font-weight-600">Description [<?=$v?>]</label>

                                    <textarea rows="4" cols="80" class="form-control" onkeyup="changeSeo('description_<?=$k?>','description_seo_<?=$k?>','null'),countChar('description_<?=$k?>')" name="data[description_<?=$k?>]" id="description_<?=$k?>" data-min="160" data-max="300" placeholder="Nhập Description SEO"><?=$item['description_'.$k]?></textarea>

                                    <p class="mt-2">Số ký tự [160-300]: 

                                        <span class="text-danger" id="count_description_<?=$k?>"><?=mb_strlen($item['description_'.$k])?></span>

                                        <span class="<?=(mb_strlen($item['description_'.$k])<160 || mb_strlen($item['description_'.$k])>300) ? 'text-danger':'text-success'?>" id="status_description_<?=$k?>"><?=(mb_strlen($item['description_'.$k])<160 || mb_strlen($item['description_'.$k])>300) ? 'Không tốt':'Khá tốt'?></span>

                                    </p>

                                </div>

                                <?php } ?>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <?php } ?>

        <div class="row">

            <div class="col-lg-12">

                <div class="card mb-4">

                    <div class="card-footer">

                        <button type="submit" class="btn btn-fill btn-primary"><?=($_GET['act']=='edit') ? 'Cập nhật':'Thêm mới'?></button>

                        <a role="button" href="index.html?com=lists&act=man<?=$url_type?>" class="btn btn-fill btn-danger">Thoát</a>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>