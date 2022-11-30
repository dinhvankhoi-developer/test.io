
<section id="menu" class="menu-fixed-scroll">
    <nav id="menu-box">
        <ul class="item-big">
            <li class="nav-item <?=($source=='index') ? 'active':''?>">
                <a class="a-img home" href=""><i class="fa fa-home"></i></a>
            </li>
            <li class="nav-item <?=($_GET['com']=='khoa-hoc') ? 'active':''?>">
                <a class="a-img" href="khoa-hoc">Khóa học</a>
            </li>
            <li class="nav-item <?=($_GET['com']=='tai-lieu') ? 'active':''?>">
                <a class="a-img" href="tai-lieu">Tài liệu</a>
                
            </li>
            <li class="nav-item <?=($_GET['com']=='video') ? 'active':''?>">
                <a class="a-img" href="video">Video</a>
            </li>
            <li class="nav-item <?=($_GET['com']=='hoi-dap') ? 'active':''?>">
                <a class="a-img" href="hoi-dap">Hỏi đáp</a>
            </li>
             <li class="nav-item <?=($_GET['com']=='san-pham') ? 'active':''?>">
                <a class="a-img" href="san-pham">Sản phẩm</a>
                <?php if(count($menu_lists_product)>0){ ?>

                <ul class="sub-menu level0 mega-content">

                    <?php foreach ($menu_lists_product as $k => $v) { $menu_cats_product = $d->rawQuery("SELECT id,name_$lang as name, alias_$lang as alias from #_cats where type=? and find_in_set ('hienthi',status) and id_list=? order by numb asc, id desc",array("san-pham",$v['id'])); ?>

                    <li>

                        <a href="<?=$v['alias']?>"><?=$v['name']?> <?php if(count($menu_cats_product)>0) { ?><span class="btn-dropdown-menu"><i class="fa fa-angle-right"></i></span><?php } ?></a>

                        <?php if(count($menu_cats_product)>0) { ?>

                        <ul class="sub-menu level1">

                            <?php foreach ($menu_cats_product as $k1 => $v1) { ?>

                            <li class="level2"> <a href="<?=$v1['alias']?>"><span><?=$v1['name']?></span></a></li>

                            <?php } ?>

                        </ul>

                        <?php } ?>

                    </li>

                    <?php } ?>

                </ul>

                <?php } ?>
            </li>
             <li class="nav-item <?=($_GET['com']=='du-an') ? 'active':''?>">
                <a class="a-img" href="du-an">Dự án</a>
            </li>
            <li class="nav-item <?=($_GET['com']=='lien-he') ? 'active':''?>">
                <a class="a-img" href="lien-he"><?=_lienhe?></a>
            </li>
            
            <?php if(!empty($_SESSION['signin']['id'])){ ?>
                <li class="nav-item login-ul">
                    <a class="a-img" href="javascript:void(0)"><img src="images/i_dangnhap.png"> <?=$_SESSION['signin']['username']?></a>
                    <ul class="sub-menu level0 mega-content">
                        <li>
                            <a href="account/thong-tin-tai-khoan"><img src="images/i_dangnhap.png"> Thông tin tài khoản</a>
                        </li>
                        <li>
                            <a href="account/dang-xuat"><img src="images/i_dangky.png"> Đăng xuất</a>
                        </li>
                    </ul>
                </li>
            <?php }else{?>
                <li class="nav-item login-ul <?=($_GET['com']=='account/dang-ky') ? 'active':''?>">

                    <a class="a-img" href="account/dang-ky"><img src="images/i_dangky.png"> Đăng ký</a>   

                </li>

                <li class="nav-item login-ul <?=($_GET['com']=='account/dang-nhap') ? 'active':''?>">

                    <a class="a-img" href="account/dang-nhap"><img src="images/i_dangnhap.png"> Đăng nhập</a>   

                </li>
            <?php } ?>
            <li class="nav-item">
                <span class="search-icon">
                    <i class="fa fa-search"></i>
                </span>
            </li>
        </ul>
        <div class="menu-mobile">
            <span></span>
        </div>
        <form class="search-bar" action="tim-kiem" id="search-form" name="search-form" method="get" onsubmit="return false" role="search">
            <input type="text" name="keywords" value="<?=$_GET['keywords']?>" id="keywords" role="search-input" placeholder="<?=_timkiem?>... " class="search-text">
            <button class="search-btn">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </nav>
</section>

