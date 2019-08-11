<?php
/**
 * Title: imageMark
 * Author: iqiqiya (77sec.cn)
 * Date: 2019/8/11
 */

/*打开图片*/
$src = "./image/Akie.png";
$info = getimagesize($src);
//print_r($info);
$type = image_type_to_extension($info[2],false);
$fun = "imagecreatefrom{$type}";
$image = $fun($src);

/*操作图片*/
$image_Mark = "./image/water_mark_img.gif";
$info2 = getimagesize($image_Mark);
$type2 = image_type_to_extension($info2[2],false);
$fun2 = "imagecreatefrom{$type2}";
$water = $fun2($image_Mark);
//合并图片
imagecopymerge($image,$water,20,30,0,0,$info2[0],$info2[1],30);
//最后一个参数30设置的是水印图片的透明度
imagedestroy($water);

/*输出图片*/
//两种展示方式
//1.浏览器显示
header("Content-type:".$info['mime']);
$func = "image{$type}";//imagejpeg;imagepng;
$func($image);

//2.保存图片
$func($image,'./image/newimage2.'.$type);

//清理内存
imagedestroy($image);
?>