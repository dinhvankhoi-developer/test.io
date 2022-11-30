<?php
    $product_moi = $d->rawQuery("SELECT id,name_$lang as name, alias_$lang as alias, photo, thumb,price,price_old from #_products where type=? and find_in_set ('hienthi',status) and find_in_set ('noibat',status) order by numb asc limit 0,15",array("san-pham"));
?>
<section id="productNew" class="section_sanphamnoibat margin-top-30 margin-bottom-30 wow fadeInUp animated" data-wow-duration="2s">
    <div class="container">
        <div class="wrap-bg-in product-view">
            <div class="title-section-module margin-bottom-20">
                <h4>Sản phẩm</h4>
                <p>Đào tạo lập trình chuyên sâu về PLC, Wincc, Hmi cho các hãng Siemens, LS...</p>
            </div>
            <div class="row d-flex flex-wrap justify-content-between">
                <?php echo $func->getTemplateProduct($product_moi,'col--4 item','none-border','margin-bottom-20','resize/480x480/1/'); ?>
            </div>
            <div class="text-center">
                <a class="button_more" href="san-pham" title="Xem tất cả Sản Phẩm">Xem tất cả Sản Phẩm</a>
            </div>
        </div>
    </div>
</section>