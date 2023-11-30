<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨

$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

  
    <?php for ($i=0; $i<$list_count; $i++) {  ?>
     
            <?php

            echo "<div class='ad'>";
         
            echo "<a href=\"".get_pretty_url($bo_table, $list[$i]['wr_id'])."\"> ";
            
            echo $list[$i]['subject'];

            echo "</a>";
			
            echo $list[$i]['icon_reply']." ";

            echo "</div>"

          
            ?>
          
    <?php }  ?>
    <?php if ($list_count == 0) { //게시물이 없을 때  ?>
    게시물이 없습니다.
    <?php }  ?>
   