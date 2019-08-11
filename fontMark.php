<?php
/**
 * Title: fontMark
 * Author: iqiqiya (77sec.cn)
 * Date: 2019/8/11
 */

/*打开图片*/
$src = "./image/88e5f5652ade2aed283bd83fd836a91b.jpg";
$info = getimagesize($src);
//print_r($info);
$type = image_type_to_extension($info[2],false);
$fun = "imagecreatefrom{$type}";
$image = $fun($src);
$font = "./font/FZMWFont.ttf";
$content = "你好，齐齐";
$col = imagecolorallocatealpha($image,255,255,255,50);
//以左上角顶点偏移
imagettftext($image,20,0,20,30,$col,$font,$content);

//两种展示方式
//1.浏览器显示
header("Content-type:".$info['mime']);
$func = "image{$type}";//imagejpeg;imagepng;
$func($image);

//2.保存图片
$func($image,'./image/newimage.'.$type);

//清理内存
imagedestroy($image);
?>