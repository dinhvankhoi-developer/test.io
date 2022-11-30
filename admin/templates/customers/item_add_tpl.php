<?php 
    $csetting = $setting[$_GET['com']][$_GET['type']];
?>
<style type="text/css">
    .addBook { cursor: pointer; display: inline-block; padding: 5px 15px; background-color: #0a61df; color: #fff; margin-top: 5px; margin-bottom: 25px;}
    .videodadangky { text-align: center;}
    .videodadangky li { display: flex; margin-bottom: 2px; border: 1px solid #ccc;}
    .videodadangky li .td { box-sizing: border-box; padding: 5px; border-right: 1px solid #ccc;}
    .videodadangky li .td1 { width: 50%;}
    .videodadangky li .td2 { width: 20%;}
    .videodadangky li .td3 { width: 20%;}
    .videodadangky li .td4 { width: 10%; border-right: none;}
    .videodadangky span.delete-kh { cursor: pointer; display: inline-block; font-weight: bold;} 
    .videodadangky span.delete-kh:hover { color: red;}
</style>
<!--Content Header (Page header)-->
<div class="content-header row align-items-center m-0">
    <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
        <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active"><a href="index.html?com=customers&act=man<?=$url_type?>">Account</a></li>
        </ol>
    </nav>
    <div class="col-sm-8 header-title p-0">
        <div class="media">
            <div class="header-icon text-success mr-3"><i class="typcn typcn-spiral"></i></div>
            <div class="media-body">
                <h1 class="font-weight-bold">Danh sách <?=$csetting['name']?></h1>
                <small>Hệ thống quản trị nội dung website</small>
            </div>
        </div>
    </div>
</div>
<!--/.Content Header (Page header)--> 
<div class="body-content">
    <?=$func->messagePage($_GET['message'])?>
    <form action="index.html?com=customers&act=save<?=$url_type?><?=($_GET['id']) ? '&id='.$_GET['id']:''?>" method="post" name="form-profile" id="form-profile"  enctype="multipart/form-data" autocomplete="off" accept-charset="utf-8">
        <?php if($csetting['img']==true) { ?>
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
                                    <p class="text-danger">Width: <?=$csetting['thumb-w']?>px - Height: <?=$csetting['thumb-h']?>px</p>
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
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Thông tin cá nhân</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                       
                        <div class="row">
                            <div class="col-md-6 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600">Email address</label>
                                    <input type="email" class="form-control" data-validation="email" data-validation-error-msg="Email không hợp lệ" value="<?=$item['email']?>" name="data[email]" placeholder="mike@email.com">
                                </div>
                            </div>
                            <div class="col-md-6 pl-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600">Mật khẩu mới</label>
                                    <input type="password" <?=($_GET['act']=='add') ? ' data-validation="required" data-validation-error-msg="Mật khẩu không được để trống"':''?> class="form-control" value="" autocomplete="new-password" name="data[password]">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600">Username</label>
                                    <input type="text" class="form-control" value="<?=$item['username']?>" data-validation="required" data-validation-error-msg="Username không được để trống" name="data[username]" placeholder="Username">
                                </div>
                            </div>
                            <div class="col-md-6 pl-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600">Phone</label>
                                    <input type="text" class="form-control" value="<?=$item['phone']?>" data-validation="required number" data-validation-error-msg="Điện thoại không được để trống" name="data[phone]"  data-validation-error-msg-number="Điện thoại phải là số" placeholder="Phone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600">Fullname</label>
                                    <input type="text" class="form-control" value="<?=$item['fullname']?>" name="data[fullname]" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="col-md-6 pl-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600">Address</label>
                                    <input type="text" class="form-control" value="<?=$item['address']?>" name="data[address]" placeholder="Home Address">
                                </div>
                            </div>
                        </div>
                        <?php if ($_GET['act']=='edit11'){ ?>
                             <div class="row">
                                <?php $ex_tags = json_decode($item['tags'],true); ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-600">Chọn kích hoạt khóa học</label>
                                        <select multiple="multiple" name="data[tags][]" class="select2">
                                            <?php foreach ($items_tags_type as $k => $v) { ?>
                                            <option value="<?=$v['id']?>" <?=(isset($ex_tags) && count($ex_tags)>0) ? ((in_array($v['id'],$ex_tags)) ? 'selected':''):''?>><?=$v['name_vi']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                        <?php } ?>
                        <?php 
                            //Số điểm còn lại:
                            $id = isset($_GET['id']) ? (int)$_GET['id'] : "";
                            $chitietbaihoc = $d->rawQuery("SELECT * from #_courses where type=? and author_id =? and find_in_set ('hienthi',status) order by numb asc, id desc",array("dang-ky-khoa-hoc",$id));
                            $tongtien = 0;
                            foreach($chitietbaihoc as $i => $val) {
                                $arr_giaotrinhvideo[$i] = $val['id_product'];
                                $tongtien += $val["price"];
                            }
                        ?>
                         <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="font-weight-600">Chọn kích hoạt khóa học</label>
                                    <?php
               
                                        $giaotrinhvideo = $d->rawQuery("SELECT id,name_vi from #_lists where type=? and find_in_set ('hienthi',status) order by numb asc, id desc",array("khoa-hoc"));
                                    ?>
                                    
                                        <select class="select2 my_select_box" data-placeholder="Tuỳ chọn giáo trình được học">
                                        <?php foreach($giaotrinhvideo as $val) 
                                        { 
                                            if(!in_array($val['id'], $arr_giaotrinhvideo)) {
                                        ?>
                                            <option value="<?= $val['id'] ?>"><?= $val["name_vi"] ?></option>
                                        <?php } } ?>
                                        </select>
                                        <div class="addBook" data-id="<?=$id?>">Thêm giáo trình</div>
                                       
                                 
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="font-weight-600">Danh sách giáo trình video</label>
                                     <ul class="videodadangky">
                                        <li>
                                            <div class="td td1">Tên</div>
                                            <div class="td td2">Giá</div>
                                            <div class="td td3">Ngày mua</div>
                                            <div class="td td4"><i class="typcn typcn-delete-outline"></i></div>
                                        </li>
                                        <?php foreach($chitietbaihoc as $val){ ?>
                                            <li>
                                                <div class="td td1"><?php echo $func->getInfoItems('khoa-hoc',$val['id_product'],'lists','name_vi'); ?></div>
                                                <div class="td td2"><?= $val["price"] ?></div>
                                                <div class="td td3"><?= $val['createdAt'] ?></div>
                                                <div class="td td4"><span value="<?= $val["id"] ?>" class="delete-kh">Xóa</span></div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary"><?=($_GET['act']=='edit') ? 'Cập nhật':'Thêm mới'?></button>
                        <a role="button" href="index.html?com=customers&act=man<?=$url_type?>" class="btn btn-fill btn-danger">Thoát</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
