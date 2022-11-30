<div class="wrap-bg-in contact-body margin-bottom-20" id="contact-body">
    <div class="container">
        <div class="head-title">
            <h1><?=$title?></h1>
        </div>
        <div class="row margin-top-20 d-flex flex-wrap justify-content-start">
            <div class="item col-4">
                <h4 class="title">
                    Đăng ký khóa học
                </h4>
                <div class="content-contact margin-top-20">
                    <?=htmlspecialchars_decode($func->checkSSLContent($row_detail['content']))?>
                </div>
            </div>
            <div class="item col-8">
                <h4 class="title">
                    <?=_gui_yeu_cau_cho_chung_toi?>
                </h4>
                <div class="form-contact margin-top-20">
                    <form action="dang-ky-khoa-hoc" method="post" id="contact-form" name="contact-form" accept-charset="utf-8">
                        <div class="row d-flex flex-wrap justify-content-start">
                            <div class="item col-6">
                                <div class="r-input margin-bottom-10">
                                    <label>Khóa học:</label>
                                    <h3 class="input-control"><?=$row_item_course['name']?></h3>
                                </div>
                                <div class="r-input margin-bottom-10">
                                    <label>Giá:</label>
                                    <h3 class="input-control"><?=$func->moneyFormat($row_item_course['price'],'<u> đ</u>')?></h3>
                                </div>
                                <div class="r-input margin-bottom-10">
                                    <label>Username: </label>
                                    <input type="text" name="data[name]" class="input-control" id="name" value="<?=$_SESSION['signin']['fullname']?>" placeholder="<?=_nhap_ho_ten?> (*)">
                                </div>
                               
                            </div>
                            <div class="item col-6">
                                <div class="r-input margin-bottom-10">
                                    <label>Ghi chú: </label>
                                    <textarea name="data[content]" class="input-control" id="content" placeholder="Ghi chú">Tôi muốn mua gói khóa học <?=$row_item_course['name']?></textarea>
                                </div>
                                <div class="r-input margin-top-10 margin-bottom-0 text-right">
                                    <input type="hidden" name="data[id_product]" class="input-control" id="id_product" value="<?=$row_item_course['id']?>">
                                    <input type="hidden" name="data[author_id]" class="input-control" id="author_id" value="<?=$_SESSION['signin']['id']?>">
                                    <input type="hidden" name="data[price]" class="input-control" id="price" value="<?=$row_item_course['price']?>">
                                    <input type="hidden" class="input" id="type" value="dang-ky-khoa-hoc" name="data[type]">
                                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                                    <button type="submit" class="button-control">Đăng ký</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>