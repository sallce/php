<?php
session_start();


$x=70;
$y=25;

$im=imagecreate($x,$y);

$bg=imagecolorallocate($im,249,249,249);
$black=imagecolorallocate($im,0,0,0);

$color[0]=imagecolorallocate($im,153,51,51);
$color[1]=imagecolorallocate($im,51,153,102);
$color[2]=imagecolorallocate($im,51,102,153);
$color[3]=imagecolorallocate($im,102,0,153);
$color[4]=imagecolorallocate($im,0,051,204);

imagefill($im,0,0,$bg);

imagecolortransparent($im,$bg);

$code='';
for($i=0;$i<4;$i++){
	$size=rand(12,16);
	$angle=rand(0,80);
	$angle-=40;
	$text=rand(0,9).'';
	$code.=$text;
	imagettftext($im,$size,$angle,$i*15+5,20,$color[rand(0,4)],"MSYH.TTF",$text);
}
//imagettftext($im,$size,$angle,1,20,$color[rand(0,4)],"MSYH.TTF",$_SESSION['checkcode']);
for($i=0;$i<100;$i++)   //
{ 
    $randcolor = ImageColorallocate($im,rand(0,255),rand(0,255),rand(0,255));
    imagesetpixel($im, rand()%70 , rand()%25 , $randcolor); 
} 

$_SESSION['checkcode']=sha1($code);
header ("Content-type: image/gif");
imagegif($im);
imagedestroy($im);

?>