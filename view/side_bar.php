<?php
include_once 'model/model_side_bar.php';
$model_side_bar = new model_side_bar();
$category_names = $model_side_bar->get_category_name();
//var_dump($category_names);
?>

<div id="sidebar" class="float_l">
    <div class="sidebar_box"><span class="bottom"></span>
        <h3>Categories</h3>   
        <div class="content">
            <ul class="sidebar_list">
                <?php
                foreach ($category_names as $category_name) {
                    echo '<li><a href="#'
                    . strtolower($category_name["name"]) . '">'
                    . $category_name["name"] . '</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div> 


