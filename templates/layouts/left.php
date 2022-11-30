<?php 
	$menu_lists_product = $d->rawQuery("SELECT id,name_$lang as name, alias_$lang as alias from #_lists where type=? and find_in_set ('hienthi',status) order by numb asc, id desc",array("san-pham"));
?>
<?php if($menu_lists_product){ ?>
<div class="left-sub">
	<h4 class="head-left"><span>Danh mục sản phẩm</span></h4>
	<?php if(count($menu_lists_product)>0){ ?>
    <ul class="menu-left level0 d-flex flex-wrap justify-content-between">
        <?php foreach ($menu_lists_product as $k => $v) {  $menu_cats_product = $d->rawQuery("SELECT id,name_$lang as name, alias_$lang as alias from #_cats where type=? and id_list=? and find_in_set ('hienthi',status) and NOT find_in_set ('menu',status) order by numb asc, id desc",array("san-pham",$v['id']));?>
        <li class="level1 parent item">
            <a href="<?=$v['alias']?>">
                <?=$v['name']?>
            </a>
            <?php if(count($menu_cats_product)>0){ ?>
		    <ul>
		        <?php foreach ($menu_cats_product as $k1 => $v1) {  ?>
		        <li>
		            <a href="<?=$v1['alias']?>">
		                <?=$v1['name']?>
		            </a>
		        </li>
		        <?php } ?>
		    </ul>
		    <?php } ?>

        </li>
        <?php } ?>
    </ul>
    <?php } ?>
</div>
<?php } ?>
