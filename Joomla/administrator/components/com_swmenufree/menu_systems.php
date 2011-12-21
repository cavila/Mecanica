<?php
/**
* swmenupro v4.0
* http://swonline.biz
* Copyright 2006 Sean White
**/




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE> swMenuFree Menu Systems Info Page</TITLE>


<script type="text/javascript" src="modules/mod_swmenufree/menu_Packed.js"></script>
<script type="text/javascript" src="modules/mod_swmenufree/transmenu_Packed.js"></script>
<script type="text/javascript" src="modules/mod_swmenufree/ie5_Packed.js"></script>
<script type="text/javascript" src="modules/mod_swmenufree/DropDownMenuX_Packed.js"></script>




<style type='text/css'>
<!--
.maintable{
width:720px;

}

h3{
padding-top:20px;
margin-bottom:0px;
color:#003366;
font-family:arial;
}
.logo {
padding-right:20px;
}
.mainheading,
.mainheading a{
background-color:#003366;
color:#fff;
font-size:17px;
font-family:arial;
font-weight:bold;
padding:3px;
}

.subheading{
background-color:#add1f3;
color:#000;
font-size:14px;
font-family:arial;
font-weight:bold;
padding:3px;
border-bottom:1px solid #003366;
border-top:1px solid #003366;
}

-->
</style>


<style type='text/css'>
<!--
.transMenu {
 position:absolute ; 
 overflow:hidden; 
 left:-1000px; 
 top:-1000px; 
}
.transMenu .content {
 position:absolute  ; 
}
.transMenu .items {
 border: 0px solid #FFFFFF ; 
 position:relative ; 
 left:0px; top:0px; 
 z-index:2; 
}
.transMenu  td
{
 padding: 5px 10px 5px 10px  !important;  
 font-size: 12px !important ; 
 font-family: Arial, Helvetica, sans-serif !important ; 
 text-align: left !important ; 
 font-weight: bold !important ; 
 color: #E18246 !important ; 
} 
#subwrap 
{ 
 text-align: left ; 
}
.transMenu  .item.hover td
{ 
 color: #FF9900 !important ; 
}
.transMenu .item { 
 text-decoration: none ; 
 cursor:pointer; 
 cursor:hand; 
}
.transMenu .background {
 background-color: #FFF2AB !important ; 
 position:absolute ; 
 left:0px; top:0px; 
 z-index:1; 
 opacity:0.85; 
 filter:alpha(opacity=85) 
}
.transMenu .shadowRight { 
 position:absolute ; 
 z-index:3; 
 top:3px; width:2px; 
 opacity:0.85; 
 filter:alpha(opacity=85)
}
.transMenu .shadowBottom { 
 position:absolute ; 
 z-index:1; 
 left:3px; height:2px; 
 opacity:0.85; 
 filter:alpha(opacity=85)
}
.transMenu .item.hover {
 background-color: #FFFFCC !important ; 
}
.transMenu .item img { 
 margin-left:10px !important ; 
}
table.menu {
 top: 0px; 
 left: 0px; 
 position:relative ; 
 margin:0px !important ; 
 border: 0px solid #FFFFFF ; 
 z-index: 1; 
}
table.menu a{
 margin:0px !important ; 
 padding: 5px 35px 5px 35px  !important ; 
 display:block !important; 
 position:relative !important ; 
}
div.menu a,
div.menu a:visited,
div.menu a:link {
 font-size: 12px !important ; 
 font-family: Arial, Helvetica, sans-serif !important ; 
 text-align: left !important ; 
 font-weight: bold !important ; 
 color: #FFF2AB !important ; 
 text-decoration: none !important ; 
 margin-bottom:0px !important ; 
 display:block !important; 
 white-space:nowrap ; 
}
div.menu td {
 border-right: 1px solid #124170 ; 
 border-top: 1px solid #124170 ; 
 border-left: 1px solid #124170 ; 
 background-color: #2F82CC !important ; 
} 
div.menu td.last {
 border-bottom: 1px solid #124170 ; 
} 
#trans-active a{
 color: #FFFFFF !important ; 
 background-color: #6BA6DE !important ; 
} 
#menu a.hover   { 
 color: #FFFFFF !important ; 
 background-color: #6BA6DE !important ; 
 display:block; 
}
#menu span {
 display:none; 
}
#menu a img.seq1,
.transMenu img.seq1,
{
 display:    inline; 
}
#menu a.hover img.seq2,
.transMenu .item.hover img.seq2 
{
 display:   inline; 
}
#menu a.hover img.seq1,
#menu a img.seq2,
.transMenu img.seq2,
.transMenu .item.hover img.seq1
{
 display:   none; 
}
#trans-active a img.seq1
{
 display: none;
}
#trans-active a img.seq2
{
 display: inline;
}

-->
</style>





<style type='text/css'>
<!--
.ddmx{
border:0px solid #FFFFFF !important ; 
}
.ddmx a.item1,
.ddmx a.item1:hover,
.ddmx a.item1-active,
.ddmx a.item1-active:hover {
 padding: 5px 35px 5px 35px  !important ; 
 top: 0px !important ; 
 left: 0px; 
 font-size: 12px !important ; 
 font-family: Arial, Helvetica, sans-serif !important ; 
 text-align: left !important ; 
 font-weight: bold !important ; 
 color: #FFF2AB !important ; 
 text-decoration: none !important ; 
 display: block; 
 white-space: nowrap; 
 position: relative; 
}
.ddmx td.item11 {
 background-color: #2F82CC !important ; 
 padding:0 !important ; 
 border-top: 1px solid #124170 !important ; 
 border-left: 1px solid #124170 !important ; 
 border-right: 1px solid #124170 !important ; 
 border-bottom: 0 !important ; 
 white-space: nowrap !important ; 
}
.ddmx td.item11-last {
 background-color: #2F82CC !important ; 
 padding:0 !important ; 
 border: 1px solid #124170 !important ; 
 white-space: nowrap; 
}
.ddmx td.item11-acton {
 padding:0 !important ; 
 border-top: 1px solid #124170 !important ; 
 border-left: 1px solid #124170 !important ; 
 white-space: nowrap; 
 border-right: 1px solid #124170 !important ; 
}
.ddmx td.item11-acton-last {
 border: 1px solid #124170 !important ; 
}
.ddmx .item11-acton-last a.item1,
.ddmx .item11-acton a.item1,
.ddmx .item11-acton-last a:hover,
.ddmx .item11-acton a:hover,
.ddmx .item11 a:hover,
.ddmx .item11-last a:hover,
.ddmx a.item1-active,
.ddmx a.item1-active:hover {
 color: #FFFFFF !important ; 
 background-color: #6BA6DE !important ; 
}
.ddmx a.item2,
.ddmx a.item2:hover,
.ddmx a.item2-active,
.ddmx a.item2-active:hover {
 padding: 5px 15px 5px 15px  !important ; 
 font-size: 12px !important ; 
 font-family: Arial, Helvetica, sans-serif !important ; 
 text-align: left !important ; 
 font-weight: bold !important ; 
 text-decoration: none !important ; 
 display: block; 
 white-space: nowrap; 
 opacity:0.85; 
}
.ddmx a.item2 {
 background-color: #FFF2AB !important ; 
 color: #E18246 !important ; 
 border-top: 1px solid #124170 !important ; 
 border-left: 1px solid #124170 !important ; 
 border-right: 1px solid #124170 !important ; 
}
.ddmx a.item2-last {
 background-color: #FFF2AB !important ; 
 color: #E18246 !important ; 
 border-bottom: 1px solid #124170 !important ; 
 z-index:500; 
}
.ddmx a.item2:hover,
.ddmx a.item2-active,
.ddmx a.item2-active:hover {
 background-color: #FFFFCC !important ; 
 color: #FF9900 !important ; 
 border-top: 1px solid #124170 !important ; 
 border-left: 1px solid #124170 !important ; 
 border-right: 1px solid #124170 !important ; 
}
.ddmx .section {
 border: 0px solid #FFFFFF !important ; 
 position: absolute; 
 visibility: hidden; 
 display: block; 
 z-index: -1; 
}
.ddmxframe {
 border: 0px solid #FFFFFF !important ; 
}
.ddmx .item11-acton .item1 img.seq2,
.ddmx .item11-acton-last .item1 img.seq2,
.ddmx img.seq1
{
 display:    inline; 
}
.ddmx a.item1:hover img.seq2,
.ddmx a.item1-active img.seq2,
.ddmx a.item1-active:hover img.seq2,
.ddmx a.item2:hover img.seq2,
.ddmx a.item2-active img.seq2,
.ddmx a.item2-active:hover img.seq2
{
 display:    inline; 
}
.ddmx img.seq2,
.ddmx .item11-acton .item1 img.seq1,
.ddmx .item11-acton-last .item1 img.seq1,
.ddmx a.item2:hover img.seq1,
.ddmx a.item2-active img.seq1,
.ddmx a.item2-active:hover img.seq1,
.ddmx a.item1:hover img.seq1,
.ddmx a.item1-active img.seq1,
.ddmx a.item1-active:hover img.seq1
{
 display:   none; 
}
* html .ddmx td { position: static; } /* ie 5.0 fix */

-->
</style>

<style type='text/css'>
<!--
.m0l0iout { 
 font-family: Arial, Helvetica, sans-serif !important ; 
 font-size: 12px !important ; 
 text-decoration: none !important ; 
 padding: 2px 0px 0px 30px !important ; 
 color: #FFF2AB !important ; 
 font-weight: bold !important ; 
 text-align: left !important ; 
}
.m0l0iover {
 font-family: Arial, Helvetica, sans-serif !important ; 
 font-size: 12px !important ; 
 text-decoration: none !important ; 
 padding: 2px 0px 0px 30px !important ; 
 color: #FFFFFF !important ; 
 font-weight: bold !important ; 
 text-align: left !important ; 
}
.m0l0oout { 
 text-decoration : none !important ; 
 border: 1px solid #124170 !important ; 
 background-color: #2F82CC !important ; 
}
.m0l0oover { 
 text-decoration : none !important ; 
 border: 1px solid #124170 !important ; 
 background-color: #6BA6DE !important ; 
}
.m0l1iout {
 font-family: Arial, Helvetica, sans-serif !important ; 
 font-size: 12px !important ; 
 text-decoration: none !important ; 
 padding: 2px 0px 0px 10px !important ; 
 color: #E18246 !important ; 
 font-weight: bold !important ; 
 text-align: left !important ; 
}
.m0l1iover { 
 font-family: Arial, Helvetica, sans-serif !important ; 
 font-size: 12px !important ; 
 text-decoration: none !important ; 
 padding: 2px 0px 0px 10px !important ; 
 color: #FF9900 !important ; 
 font-weight: bold !important ; 
 text-align: left !important ; 
}  
.m0l1oout { 
 text-decoration : none !important ; 
 border: 1px solid #124170 !important ; 
 background-color: #FFF2AB !important ; 
 opacity:0.85; 
 filter:alpha(opacity=85) 
} 
.m0l1oover {
 text-decoration : none !important ; 
 border: 1px solid #124170 !important ; 
 background-color: #FFFFCC !important ; 
}
#swactive_menu a,
#swactive_menu div{ 
 color: #FFFFFF !important ; 
 font-weight: bold !important ; 
 text-decoration : none !important ; 
 background-color: #6BA6DE !important ; 
}
.m0l0oout img.seq1, 
.m0l1oout img.seq1 
{ 
 display:    inline; 
} 
.m0l1ooverHover seq2,
.m0l1ooverActive seq2, 
.m0l0ooverHover seq2,
.m0l0ooverActive seq2 
{ 
 display:    inline; 
}
.m0l0oout .seq2, 
.m0l0oout .seq1,  
.m0l0oover .seq1, 
.m0l1oout .seq2,   
.m0l1oout .seq1,   
.m0l1oover .seq1   
{                                                 
 display:    none; 
} 
#swactive_menu a img.seq1
{
 display: none;
}
#swactive_menu a img.seq2
{
 display: inline;
}

-->
</style>




</HEAD>

<BODY>
<img align="left" src="images/swmenufree_logo.png" alt="swMenuFree Menu Systems" class="logo" /><h3>Menu Systems Info Page</h3>
<table class="maintable" cellpadding="0" cellspacing="3">
<tr><td class="mainheading" colspan="2">
DHTML POP-OUT Menu Sytems
</td></tr>
<tr><td class="subheading" colspan="2">
MyGosu Menu System
</td></tr><tr><td valign="top">



<div align="left">
<table cellspacing="0" cellpadding="0" id="menu" class="ddmx"  > 

<tr> 
<td class='item11'> 
<a class='item1' href="javascript:void(0)" >Top item 1</a> 
<div class="section"  ><a class="item2" href="javascript:void(0)" >Sub item 1.1</a> 
<div class="section"  ><a class="item2" href="javascript:void(0)" >Sub item 1.1.1</a> 
<a class="item2" href="javascript:void(0)" >Sub item 1.1.2</a> 
<div class="section"  ><a class="item2" href="javascript:void(0)" >Sub item 1.1.2.1</a> 
<a class="item2" style="border-bottom:1px solid #124170" href="javascript:void(0)" >Sub item 1.1.2.2</a> 
</div><a class="item2" style="border-bottom:1px solid #124170" href="javascript:void(0)" >Sub item 1.1.3</a> 
</div><a class="item2" href="javascript:void(0)" >Sub item 1.2</a> 

<a class="item2" href="javascript:void(0)" >Sub item 1.3</a> 
<a class="item2" style="border-bottom:1px solid #124170" href="javascript:void(0)" >Sub item 1.4</a> 
</div></td> 
</tr> 
<tr> 
<td class='item11'> 
<a class='item1' href="javascript:void(0)" >Top item 2</a> 
<div class="section"  ><a class="item2" href="javascript:void(0)" >Sub item 2.1</a> 
<a class="item2" href="javascript:void(0)" >Sub item 2.2</a> 
<a class="item2" style="border-bottom:1px solid #124170" href="javascript:void(0)" >Sub item 2.3</a> 
</div></td> 

</tr> 
<tr> 
<td class='item11'> 
<a class='item1' href="javascript:void(0)" >Top item 3</a> 
<div class="section"  ><a class="item2" href="javascript:void(0)" >Sub item 3.1</a> 
<a class="item2" style="border-bottom:1px solid #124170" href="javascript:void(0)" >Sub item 3.2</a> 
<div class="section"  ><a class="item2" style="border-bottom:1px solid #124170" href="javascript:void(0)" >Sub item 3.2.1</a> 
</div></div></td> 
</tr> 
<tr> 
<td class='item11'> 
<a class='item1' href="javascript:void(0)" >Top item 4</a> 

<div class="section"  ><a class="item2" href="javascript:void(0)" >Sub item 4.1</a> 
<a class="item2" href="javascript:void(0)" >Sub item 4.2</a> 
<div class="section"  ><a class="item2" href="javascript:void(0)" >Sub item 4.2.1</a> 
<a class="item2" style="border-bottom:1px solid #124170" href="javascript:void(0)" >Sub item 4.2.2</a> 
</div><a class="item2" href="javascript:void(0)" >Sub item 4.3</a> 
<a class="item2" href="javascript:void(0)" >Sub item 4.4</a> 
<div class="section"  ><a class="item2" style="border-bottom:1px solid #124170" href="javascript:void(0)" >Sub item 4.4.1</a> 
<div class="section"  ><a class="item2" style="border-bottom:1px solid #124170" href="javascript:void(0)" >Sub item 4.4.1.1</a> 
</div></div><a class="item2" style="border-bottom:1px solid #124170" href="javascript:void(0)" >Sub item 4.5</a> 

</div></td> 
</tr> 
<tr> 
<td class='item11'> 
<a class='item1' href="javascript:void(0)" >Top item 5</a> 
<div class="section"  ><a class="item2" href="javascript:void(0)" >Sub item 5.1</a> 
<a class="item2" style="border-bottom:1px solid #124170" href="javascript:void(0)" >Sub item 5.2</a> 
</div></td> 
</tr> 
<tr> 
<td class='item11'> 
<a class='item1' href="javascript:void(0)" >Top item 6</a> 
<div class="section"  ><a class="item2" style="border-bottom:1px solid #124170" href="javascript:void(0)" >Sub item 6.1</a> 

</div></td> 
</tr> 
<tr> 
<td class='item11-last'> 
<a class='item1' href="javascript:void(0)" >Top item 7</a> 
<div class="section"  ><a class="item2" href="javascript:void(0)" >Sub item 7.1</a> 
<a class="item2" href="javascript:void(0)" >Sub item 7.2</a> 
<a class="item2" href="javascript:void(0)" >Sub item 7.3</a> 
<a class="item2" href="javascript:void(0)" >Sub item 7.4</a> 
<a class="item2" style="border-bottom:1px solid #124170" href="javascript:void(0)" >Sub item 7.5</a> 
</div></td> 

</tr> 
</table></div> 
<script type="text/javascript">
<!--
function makemenu(){
var ddmx = new DropDownMenuX('menu');
ddmx.type = "vertical"; 
ddmx.delay.show = 0;
ddmx.iframename = 'ddmx';
ddmx.delay.hide = 50;
ddmx.position.levelX.left = -1;
ddmx.position.levelX.top = 0;
ddmx.position.level1.left = 0;
ddmx.position.level1.top = -1; 
ddmx.fixIeSelectBoxBug = false;
ddmx.init(); 
}
if ( typeof window.addEventListener != "undefined" )
window.addEventListener( "load", makemenu, false );
else if ( typeof window.attachEvent != "undefined" ) { 
window.attachEvent( "onload", makemenu );
}
else {
if ( window.onload != null ) {
var oldOnload = window.onload;
window.onload = function ( e ) { 
oldOnload( e ); 
makemenu() 
} 
}  
else  { 
window.onload = makemenu();
} }
--> 
</script>  
</td><td valign="top">
<b>Advantages:</b>
<ul>
<li>Top menu items can be aligned vertically or horizontally.</li>
<li>Top menu and sub menu item widths and heights can be made to autoresize.</li>
<li>Can accurately specify inside and outside borders top menu and sub menus</li>
<li>Top menu items will even display correctly in non-javascript enabled browsers.</li>
<li>All menu items and links are easily accessible by search engines.</li>
</ul>

<b>Disadvantages:</b>
<ul>
<li>Sub menu items can stick open sometimes with fast mouse movement.</li>
<li>Sub menus will not display untill the whole page loads.</li>
</ul>

</td></tr><tr><td class="subheading" colspan="2">
Trans Menu System
</td></tr><tr><td valign="top">






<div id="wrap" class="menu" align="left">
<table cellspacing="0" cellpadding="0" id="menu" class="menu" > 
<tr> 

<td> 
<a id="menu1" href="javascript:void(0)" >Top item 1</a> 
</td> 
</tr> 
<tr> 
<td> 
<a id="menu11" href="javascript:void(0)" >Top item 2</a> 
</td> 
</tr> 
<tr> 
<td> 
<a id="menu15" href="javascript:void(0)" >Top item 3</a> 
</td> 
</tr> 

<tr> 
<td> 
<a id="menu19" href="javascript:void(0)" >Top item 4</a> 
</td> 
</tr> 
<tr> 
<td> 
<a id="menu29" href="javascript:void(0)" >Top item 5</a> 
</td> 
</tr> 
<tr> 
<td> 
<a id="menu32" href="javascript:void(0)" >Top item 6</a> 
</td> 

</tr> 
<tr> 
<td class="last"> 
<a id="menu34" href="javascript:void(0)" >Top item 7</a> 
</td> 
</tr> 
</table></div> 
<div id="subwrap"> 
<script type="text/javascript">
<!--
if (TransMenu.isSupported()) {
var ms = new TransMenuSet(TransMenu.direction.right, 0, -1, TransMenu.reference.topRight);
var menu1 = ms.addMenu(document.getElementById("menu1"));
 menu1.addItem("Sub item 1.1", "javascript:void(0);", "0");
var menu3 = menu1.addMenu(menu1.items[0],-1,0);
menu3.addItem("Sub item 1.1.1", "javascript:void(0);", "0");
menu3.addItem("Sub item 1.1.2", "javascript:void(0);", "0");
var menu5 = menu3.addMenu(menu3.items[1],-1,0);
menu5.addItem("Sub item 1.1.2.1", "javascript:void(0);", "0");
menu5.addItem("Sub item 1.1.2.2", "javascript:void(0);", "0");
menu3.addItem("Sub item 1.1.3", "javascript:void(0);", "0");
menu1.addItem("Sub item 1.2", "javascript:void(0);", "0");
menu1.addItem("Sub item 1.3", "javascript:void(0);", "0");
menu1.addItem("Sub item 1.4", "javascript:void(0);", "0");
var menu11 = ms.addMenu(document.getElementById("menu11"));
 menu11.addItem("Sub item 2.1", "javascript:void(0);", "0");
menu11.addItem("Sub item 2.2", "javascript:void(0);", "0");
menu11.addItem("Sub item 2.3", "javascript:void(0);", "0");
var menu15 = ms.addMenu(document.getElementById("menu15"));
 menu15.addItem("Sub item 3.1", "javascript:void(0);", "0");
menu15.addItem("Sub item 3.2", "javascript:void(0);", "0");
var menu18 = menu15.addMenu(menu15.items[1],-1,0);
menu18.addItem("Sub item 3.2.1", "javascript:void(0);", "0");
var menu19 = ms.addMenu(document.getElementById("menu19"));
 menu19.addItem("Sub item 4.1", "javascript:void(0);", "0");
menu19.addItem("Sub item 4.2", "javascript:void(0);", "0");
var menu22 = menu19.addMenu(menu19.items[1],-1,0);
menu22.addItem("Sub item 4.2.1", "javascript:void(0);", "0");
menu22.addItem("Sub item 4.2.2", "javascript:void(0);", "0");
menu19.addItem("Sub item 4.3", "javascript:void(0);", "0");
menu19.addItem("Sub item 4.4", "javascript:void(0);", "0");
var menu26 = menu19.addMenu(menu19.items[3],-1,0);
menu26.addItem("Sub item 4.4.1", "javascript:void(0);", "0");
var menu27 = menu26.addMenu(menu26.items[0],-1,0);
menu27.addItem("Sub item 4.4.1.1", "javascript:void(0);", "0");
menu19.addItem("Sub item 4.5", "javascript:void(0);", "0");
var menu29 = ms.addMenu(document.getElementById("menu29"));
 menu29.addItem("Sub item 5.1", "javascript:void(0);", "0");
menu29.addItem("Sub item 5.2", "javascript:void(0);", "0");
var menu32 = ms.addMenu(document.getElementById("menu32"));
 menu32.addItem("Sub item 6.1", "javascript:void(0);", "0");
var menu34 = ms.addMenu(document.getElementById("menu34"));
 menu34.addItem("Sub item 7.1", "javascript:void(0);", "0");
menu34.addItem("Sub item 7.2", "javascript:void(0);", "0");
menu34.addItem("Sub item 7.3", "javascript:void(0);", "0");
menu34.addItem("Sub item 7.4", "javascript:void(0);", "0");
menu34.addItem("Sub item 7.5", "javascript:void(0);", "0");
function init() {
if (TransMenu.isSupported()) {
TransMenu.initialize();
menu1.onactivate = function() {document.getElementById("menu1").className = "hover"; };
 menu1.ondeactivate = function() {document.getElementById("menu1").className = ""; };
 menu11.onactivate = function() {document.getElementById("menu11").className = "hover"; };
 menu11.ondeactivate = function() {document.getElementById("menu11").className = ""; };
 menu15.onactivate = function() {document.getElementById("menu15").className = "hover"; };
 menu15.ondeactivate = function() {document.getElementById("menu15").className = ""; };
 menu19.onactivate = function() {document.getElementById("menu19").className = "hover"; };
 menu19.ondeactivate = function() {document.getElementById("menu19").className = ""; };
 menu29.onactivate = function() {document.getElementById("menu29").className = "hover"; };
 menu29.ondeactivate = function() {document.getElementById("menu29").className = ""; };
 menu32.onactivate = function() {document.getElementById("menu32").className = "hover"; };
 menu32.ondeactivate = function() {document.getElementById("menu32").className = ""; };
 menu34.onactivate = function() {document.getElementById("menu34").className = "hover"; };
 menu34.ondeactivate = function() {document.getElementById("menu34").className = ""; };
 }}
TransMenu.spacerGif = "modules/mod_swmenufree/images/transmenu/x.gif";
TransMenu.dingbatOn = "modules/mod_swmenufree/images/transmenu/submenu-on.gif";
TransMenu.dingbatOff = "modules/mod_swmenufree/images/transmenu/submenu-off.gif"; 
TransMenu.sub_indicator = true; 
TransMenu.menuPadding = 0;
TransMenu.itemPadding = 0;
TransMenu.shadowSize = 2;
TransMenu.shadowOffset = 3;
TransMenu.shadowColor = "#888";
TransMenu.shadowPng = "modules/mod_swmenufree/images/transmenu/grey-40.png";
TransMenu.backgroundColor = "#FFF2AB";
TransMenu.backgroundPng = "modules/mod_swmenufree/images/transmenu/white-90.png";
TransMenu.hideDelay = 100;
TransMenu.slideTime = 300;
TransMenu.selecthack = 0;
TransMenu.autoposition = 1;
TransMenu.renderAll();
if ( typeof window.addEventListener != "undefined" )
window.addEventListener( "load", init, false );
else if ( typeof window.attachEvent != "undefined" ) {
window.attachEvent( "onload", init );
}else{
if ( window.onload != null ) {
var oldOnload = window.onload;
window.onload = function ( e ) {
oldOnload( e );
init();
}
}else
window.onload = init();
}
}
-->
</script>
</div>

</td><td valign="top">
<b>Advantages:</b>
<ul>
<li>Top menu items can be aligned vertically or horizontally. Also has full support for right to left languages with options for left opening sub menus.</li>
<li>Top menu and sub menu item widths and heights can be made to autoresize.</li>
<li>Sub menu indicator, slide effect, and shadow options for sub menus.</li>
<li>Sub menu autoposition feature re-aligns sub menus that would otherwise go off the page.</li>
<li>Top menu items will even display correctly in non-javascript enabled browsers.</li>
<li>Top menu items and links are easily accessible by search engines.</li>
</ul>

<b>Disadvantages:</b>
<ul>
<li>Sub menu items may have innaccesible links for search engine robots.</li>
<li>Top menu mouse over CSS and sub menus will not display untill the whole page loads.</li>
</ul>
</td></tr>

<tr><td class="subheading" colspan="2">
Tigra Menu System
</td></tr><tr><td valign="top">


<script type="text/javascript">
<!--
var MENU_ITEMS = [
  ['Top item 1','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Top item 1'},
  ['Sub item 1.1','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 1.1'},
  ['Sub item 1.1.1','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 1.1.1'}],
  ['Sub item 1.1.2','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 1.1.2'},
  ['Sub item 1.1.2.1','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 1.1.2.1'}],
  ['Sub item 1.1.2.2','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 1.1.2.2'}],],
  ['Sub item 1.1.3','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 1.1.3'}],],
  ['Sub item 1.2','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 1.2'}],
  ['Sub item 1.3','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 1.3'}],
  ['Sub item 1.4','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 1.4'}],],
  ['Top item 2','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Top item 2'},
  ['Sub item 2.1','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 2.1'}],
  ['Sub item 2.2','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 2.2'}],
  ['Sub item 2.3','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 2.3'}],],
  ['Top item 3','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Top item 3'},
  ['Sub item 3.1','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 3.1'}],
  ['Sub item 3.2','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 3.2'},
  ['Sub item 3.2.1','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 3.2.1'}],],],
  ['Top item 4','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Top item 4'},
  ['Sub item 4.1','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 4.1'}],
  ['Sub item 4.2','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 4.2'},
  ['Sub item 4.2.1','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 4.2.1'}],
  ['Sub item 4.2.2','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 4.2.2'}],],
  ['Sub item 4.3','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 4.3'}],
  ['Sub item 4.4','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 4.4'},
  ['Sub item 4.4.1','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 4.4.1'},
  ['Sub item 4.4.1.1','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 4.4.1.1'}],],],
  ['Sub item 4.5','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 4.5'}],],
  ['Top item 5','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Top item 5'},
  ['Sub item 5.1','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 5.1'}],
  ['Sub item 5.2','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 5.2'}],],
  ['Top item 6','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Top item 6'},
  ['Sub item 6.1','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 6.1'}],],
  ['Top item 7','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Top item 7'},
  ['Sub item 7.1','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 7.1'}],
  ['Sub item 7.2','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 7.2'}],
  ['Sub item 7.3','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 7.3'}],
  ['Sub item 7.4','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 7.4'}],
  ['Sub item 7.5','javascript:void(0);',{ 'tw' : '_self' , 'sb' : 'Sub item 7.5'}],],
 ];
 -->
 </SCRIPT> 

<script type="text/javaScript">
<!-- 
var MENU_POS = [
{
'height':25,
'width':130,
'block_top': 0,
'block_left': 0,
'top':26,
'left':0,
'hide_delay':50,
'expd_delay': 50,
'css' : {
'outer': ['m0l0oout', 'm0l0oover'],
'inner': ['m0l0iout', 'm0l0iover']
}
}, 
{
'height': 25,
'width':120,
'block_top': 0 ,
'block_left':125,
'top': 26,
'left': 0, 
'css': {
'outer' : ['m0l1oout', 'm0l1oover'],
'inner' : ['m0l1iout', 'm0l1iover'] 
}
}, 
{
'block_top': 0,
'block_left':115,
'css': {
'outer' : ['m0l1oout', 'm0l1oover'],
'inner' : ['m0l1iout', 'm0l1iover'] 
} 
} 
] 
--> 
</script> 
<div style="position:relative;z-index:1; top:0px; left:0px; width:130px; height:182px " >
<script type="text/javaScript">
<!--
new menu (MENU_ITEMS, MENU_POS);
--> 
</script>
</div>
</td><td valign="top">
<b>Advantages:</b>
<ul>
<li>Top menu items can be aligned vertically or horizontally.</li>
<li>Top menu can be positioned absolutely or relatively within the page.</li>
<li>Small script and fast loading.</li>
<li>Will work and display before whole page has loaded.</li>
</ul>

<b>Disadvantages:</b>
<ul>
<li>Top and sub menu items may have innaccesible links for search engine robots.</li>
<li>Will not display in non-javascript enabled browsers.</li>
</ul>
</td></tr>

<tr><td colspan="2" class="mainheading">
<center><a href="#" onClick="window.close()"><b>Close Window</b></a></center>
</td></tr>
</table>





</BODY>
</HTML>

    <?php

?>
 
    
 
