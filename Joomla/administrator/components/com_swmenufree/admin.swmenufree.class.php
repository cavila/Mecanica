<?php
/**
* SWmenuFree v4.0
* http://swonline.biz
* Copyright 2006 Sean White
**/

class swmenufreeMenu extends JTable 
{
var $id = null;
var $main_top= 0;
var $main_left= 0;
var $main_height= 0;
var $main_width= 0;
var $sub_width= 0;
var $main_back= "#135CAE";
var $main_over= "#0DB3D3";
var $sub_back= "#135CAE";
var $sub_over= "#0DB3D3";
var $sub_border= "0px none #FFFFFF";
var $main_font_color= "#FFFFFF";
var $main_font_size= 12;
var $sub_font_color= "#FFFF85";
var $sub_font_size= 12;
var $main_border= "0px none #FFFFFF";
var $sub_border_over= "0px none #FFFFFF";
var $main_font_color_over= "#FFFF85";
var $main_border_over= "1px solid #FFFFFF";
var $sub_align= "left";
var $main_align= "left";
var $sub_height= 0;
var $sub_font_color_over= "#FFFFFF";
var $position= "left";
var $orientation= "vertical";
var $font_family= "Verdana, Arial, Helvetica, sans-serif";
var $sub_font_family= "Verdana, Arial, Helvetica, sans-serif";
var $font_weight= "normal";
var $font_weight_over= "normal";
var $level1_sub_top= 0;
var $level1_sub_left= 0;
var $level2_sub_top= 0;
var $level2_sub_left= 0;
var $main_back_image= null;
var $main_back_image_over = null;
var $sub_back_image= null;
var $sub_back_image_over= null;
var $specialA= 90;
var $specialB= 300;
var $extra= "1";
var $sub_padding= "7px 5px 8px 5px";
var $main_padding= "7px 15px 7px 10px";


function swmenufreeMenu( &$db ) 
        {
                 parent::__construct('#__swmenufree_config', 'id', $db);
        }


function gosumenu() 
	{

$this->set('main_top', 0);
$this->set('main_left', 0);
$this->set('main_height', 0);
$this->set('main_width', 0);
$this->set('sub_width', 0);
$this->set('main_back', "#135CAE");
$this->set('main_over', "#0DB3D3");
$this->set('sub_back', "#135CAE");
$this->set('sub_over', "#0DB3D3");
$this->set('sub_border', "0px none #FFFFFF");
$this->set('main_font_color', "#FFFFFF");
$this->set('main_font_size', 12);
$this->set('sub_font_color', "#FFFF85");
$this->set('sub_font_size', 12);
$this->set('main_border', "0px none #FFFFFF");
$this->set('sub_border_over', "0px none #FFFFFF");
$this->set('main_font_color_over', "#FFFF85");
$this->set('main_border_over', "1px solid #FFFFFF");
$this->set('sub_align', "left");
$this->set('main_align', "left");
$this->set('sub_height', 0);
$this->set('sub_font_color_over', "#FFFFFF");
$this->set('position', "left");
$this->set('orientation', "vertical");
$this->set('font_family', "Verdana, Arial, Helvetica, sans-serif");
$this->set('sub_font_family', "Verdana, Arial, Helvetica, sans-serif");
$this->set('font_weight', "normal");
$this->set('font_weight_over', "normal");
$this->set('level1_sub_top', 0);
$this->set('level1_sub_left', 0);
$this->set('level2_sub_top', 0);
$this->set('level2_sub_left', 0);
$this->set('main_back_image', null);
$this->set('main_back_image_over ', null);
$this->set('sub_back_image', null);
$this->set('sub_back_image_over', null);
$this->set('specialA', 90);
$this->set('specialB', 300);
$this->set('sub_padding', "7px 5px 8px 5px");
$this->set('main_padding', "7px 15px 7px 10px");
$this->set('extra', "1");
		  

           return true;
        }



}


?>