<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 196;
$thumb_height = 145;
?>

<div class="lt_slider_li">
	<h2><a href="<?php echo get_pretty_url($bo_table); ?>"><?php echo $bo_subject ?></a></h2>
	<ul>
	<?php 
		for ($i=0; $i<count($list); $i++) {
		    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);
		
		    if($thumb['src']) {
		        $img = $thumb['src'];
		    } else {
		        $img = G5_THEME_IMG_URL.'/no_img.png';
		        $thumb['alt'] = '이미지가 없습니다.';
		    }
		    $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
	?>
	    <li>
	    	<a href="<?php echo $list[$i]['href'] ?>" class="lt_img"><?php echo $img_content; ?></a>
	    	<div class="lt_cnt">
		        <?php
		        if ($list[$i]['icon_secret']) echo "<i class=\"fa fa-lock\" aria-hidden=\"true\"></i> ";
		        echo "<a href=\"".$list[$i]['href']."\" class=\"lt_tit\">";
		        if ($list[$i]['is_notice'])
		            echo "<strong>".$list[$i]['subject']."</strong>";
		        else
		            echo $list[$i]['subject'];
		        if ($list[$i]['icon_new']) echo " <span class=\"new_icon\">N</span>";
		        if ($list[$i]['icon_file']) echo " <i class=\"fa fa-download\" aria-hidden=\"true\"></i>" ;
		        if ($list[$i]['icon_link']) echo " <i class=\"fa fa-link\" aria-hidden=\"true\"></i>" ;
		        if ($list[$i]['icon_hot']) echo " <i class=\"fa fa-heart\" aria-hidden=\"true\"></i>";
	
		        echo "</a>";
	
		        ?>
		        <div class="lt_info">
		            <?php echo $list[$i]['name'] ?>
		            <span class="lt_date"><i class="far fa-clock"></i> <?php echo $list[$i]['datetime2'] ?></span>
		        </div>
	        </div>
	    </li>
	<?php } ?>
	<?php if (count($list) == 0) { //게시물이 없을 때 ?>
	<li class="empty_li">게시물이 없습니다.</li>
	<?php } ?>
	</ul>
	<a href=""<?php echo get_pretty_url($bo_table); ?>" class="lt_more"><i class="fas fa-ellipsis-v"></i><span class="sound_only"><?php echo $bo_subject ?> 더보기</span></a>
</div>
