/**
* swmenufree v4.0
* http://swonline.biz
* Copyright 2004 Sean White
**/

function getOffsets (evt) {
  var target = evt.target;
  if (typeof target.offsetLeft == 'undefined') {
    target = target.parentNode;
  }
  var pageCoords = getPageCoords(target);
  var eventCoords = {
    x: window.pageXOffset + evt.clientX,
    y: window.pageYOffset + evt.clientY
  };
  var offsets = {
    offsetX: eventCoords.x - pageCoords.x,
    offsetY: eventCoords.y - pageCoords.y
  };
  return offsets;
}

function getPageCoords (element) {
  var coords = {x : 0, y : 0};
  while (element) {
    coords.x += element.offsetLeft;
    coords.y += element.offsetTop;
    element = element.offsetParent;
  }
  return coords;
}


var pcol="#a0a0a0";
var qtr=new Array();
var rd=new Array();
rd[0]=new Array(0,1,0);
rd[1]=new Array(-1,0,0);
rd[2]=new Array(0,0,1);
rd[3]=new Array(0,-1,0);
rd[4]=new Array(1,0,0);
rd[5]=new Array(0,0,-1);
rd[6]=new Array(255,1,1);


function reLod(){
  qtr[0]=-180;
  qtr[1]=360;
  qtr[2]=180;
  qtr[3]=0;
}


//populate color radians
var col=new Array(360);
for (i=0;i< 6;i++){
   for (j=0;j<60;j++){
      col[60*i+j]=new Array(3);
      for (k=0;k<3;k++){
        col[60*i+j][k]=rd[6][k];
        rd[6][k]+=(rd[i][k]*4);
      }
   }
}


function xyOff(evt) {
  if (typeof evt.offsetX == 'undefined') {
    var evtOffsets = getOffsets(evt);
    ox = evtOffsets.offsetX;
    oy = evtOffsets.offsetY;
  } else {
    ox = evt.offsetX;
    oy = evt.offsetY;
  }
  ox = 4*ox;
  oy = 4*oy;
  reLod();
  nr=0;
  oxm=ox-512;
  oym=oy-512;
  oxflg=(oxm<0?0:1);
  oyflg=(oym<0?0:1);
  qsel=2*oxflg+oyflg;
  absx=Math.abs(oxm);
  absy=Math.abs(oym);
  deg=absx*45/absy;
  if (absx>absy) {
     deg=90-(absy*45/absx);
  }
  deg1=Math.floor(Math.abs(qtr[qsel]-deg));
  oxm=Math.abs(ox-512);
  oym=Math.abs(oy-512);
  rd1=Math.sqrt(Math.pow(oym,2)+Math.pow(oxm,2));
  if (oy==512&&ox==512) {
     pcol='000000';
  } else {
     for (i=0;i<3;i++){
         rd2=col[deg1][i]*rd1/256;
         if (rd1>256){
            rd2+=Math.floor(rd1-256);
         }
         if (rd2>255){
            rd2=255;
         }
         nr=256*nr+Math.floor(rd2);
     }
     pcol=nr.toString(16);
     while (pcol.length<6) {
        pcol='0'+pcol;
     }
  }
  pcol='#'+pcol.toUpperCase();

  if (document.getElementById){
     document.getElementById('CPCP_ColorCurrent').style.backgroundColor=pcol;
     document.getElementById('CPCP_ColorSelected').innerHTML=pcol;
  }
  if (document.layers) {
     document.layers['CPCP_Wheel'].document.forms[0].elements[0].value=pcol;
     document.layers['CPCP_ColorSelected'].bgColor=pcol;
  }
  return false;
}


function wrtVal(){
  if (document.getElementById) {
     document.getElementById('CPCP_Input').style.background = pcol;
     document.getElementById('CPCP_Input_RGB').value = pcol;
     document.getElementById('CPCP_Input_RGB').select();
  }
  if (document.layers) {
     document.layers['CPCP_Input'].bgColor=pcol;
     document.layers['CPCP_Input_RGB'].value=pcol;
     document.layers['CPCP_Input_RGB'].select();
  }
}



function doMainPadding(){
var padtop = trim(document.getElementById('main_pad_top').value);
var padright = trim(document.getElementById('main_pad_right').value);
var padbottom = trim(document.getElementById('main_pad_bottom').value);
var padleft = trim(document.getElementById('main_pad_left').value);

document.getElementById('main_padding').value = padtop+'px '+padright+'px '+padbottom+'px '+padleft+'px ';
}

function doSubPadding(){

var padtop = trim(document.getElementById('sub_pad_top').value);
var padright = trim(document.getElementById('sub_pad_right').value);
var padbottom = trim(document.getElementById('sub_pad_bottom').value);
var padleft = trim(document.getElementById('sub_pad_left').value);

document.getElementById('sub_padding').value = padtop+'px '+padright+'px '+padbottom+'px '+padleft+'px ';
}


function doMainBorder(){
var mainwidth = trim(document.getElementById('main_border_width').value);
var mainstyle = trim(document.getElementById('main_border_style').value);
var maincolor = trim(document.getElementById('main_border_color').value);

document.getElementById('main_border').value = mainwidth+'px '+mainstyle+' '+maincolor;

var mainwidth = trim(document.getElementById('main_border_over_width').value);
var mainstyle = trim(document.getElementById('main_border_over_style').value);
var maincolor = trim(document.getElementById('main_border_color_over').value);

document.getElementById('main_border_over').value = mainwidth+'px '+mainstyle+' '+maincolor;
}

function doMainBorderTree(){
var mainwidth = trim(document.getElementById('main_border_width').value);
var mainstyle = trim(document.getElementById('main_border_style').value);
var maincolor = trim(document.getElementById('main_border_color').value);

document.getElementById('main_border').value = mainwidth+'px '+mainstyle+' '+maincolor;
}


function doSubBorder(){
var mainwidth = trim(document.getElementById('sub_border_width').value);
var mainstyle = trim(document.getElementById('sub_border_style').value);
var maincolor = trim(document.getElementById('sub_border_color').value);

document.getElementById('sub_border').value = mainwidth+'px '+mainstyle+' '+maincolor;

var mainwidth = trim(document.getElementById('sub_border_over_width').value);
var mainstyle = trim(document.getElementById('sub_border_over_style').value);
var maincolor = trim(document.getElementById('sub_border_color_over').value);

document.getElementById('sub_border_over').value = mainwidth+'px '+mainstyle+' '+maincolor;
}

function doTransSubBorder(){
var mainwidth = trim(document.getElementById('sub_border_width').value);
var mainstyle = trim(document.getElementById('sub_border_style').value);
var maincolor = trim(document.getElementById('sub_border_color').value);

document.getElementById('sub_border').value = mainwidth+'px '+mainstyle+' '+maincolor;

}


function copyColor(temp_box){
var temp_x ;

  if (document.getElementById) {
     temp_x = document.getElementById('CPCP_Input_RGB').value;
     document.getElementById(temp_box).value = temp_x;
     document.getElementById(temp_box + '_box').bgColor = temp_x;
    
  }
}

function copyBackImage(temp_box){
var temp_x ;

  if (document.getElementById) {
     temp_x = document.getElementById(temp_box).value;
     document.getElementById(temp_box + '_box').background = temp_x;
      
  }
}


function doSave() {
	
	if(document.adminForm.title.value==""){

		alert("Menu module needs a name.");

	}else if(document.adminForm.menutype.value==-999){

		alert("Menu module needs a valid menu source.");

	}else{
	doMainBorder();
	doSubBorder();
	document.adminForm.task.value="saveedit";
        document.adminForm.target="_self";
        document.adminForm.action="index2.php";
        setTimeout('document.adminForm.submit()',200) ;
        }


}


function doExport() {

	if(document.adminForm.title.value==""){

		alert("Menu module needs a name.");

	}else if(document.adminForm.menutype.value==-999){

		alert("Menu module needs a valid menu source.");

	}else{
	 doMainBorder();
	doSubBorder();
	document.adminForm.task.value="saveedit";
	  document.adminForm.returntask.value="editDhtmlMenu";
	document.adminForm.export2.value=1;
        document.adminForm.target="_self";
        document.adminForm.action="index2.php";
        setTimeout('document.adminForm.submit()',200) ;
        }
  }

function doCancel() {
	document.adminForm.task.value="showmodules";
        document.adminForm.target="_self";
        document.adminForm.action="index2.php";
        setTimeout('document.adminForm.submit()',200) ;
        }


function doPreviewWindow() {

if(document.adminForm.menustyle.value =="transmenu"){
doMainBorder();
doTransSubBorder();
 } else{
 doMainBorder();
doSubBorder();
 }

document.adminForm.no_html.value=1;
document.adminForm.target="win1";
document.adminForm.action="index2.php";
document.adminForm.task.value="preview";
 window.open('', 'win1', 'status=no,toolbar=no,scrollbars=auto,titlebar=no,menubar=no,resizable=yes,width=600,height=500,directories=no,location=no');
 setTimeout('document.adminForm.submit()',200) ;
 setTimeout('document.adminForm.target="_self"',300);
 setTimeout('document.adminForm.action="index2.php"',300);
 setTimeout('document.adminForm.no_html.value=0',300);


}





var manager = new ImageManager('components/com_swmenufree/ImageManager','en');
       
        BackgroundSelector = 
        {
            
            update : function(params)
            {
                if(this.field )
                {
                    
                    this.field.style.background = "url(../modules/mod_swmenufree/images" + params.f_file + ")"; //params.f_url
                    this.field2.value = "modules/mod_swmenufree/images" + params.f_file; //params.f_url
                    

                }
            },
            
            select: function(textfieldID)
            {
                this.field = document.getElementById(textfieldID+'_box');
                this.field2 = document.getElementById(textfieldID);
                manager.popManager(this);   
            }
        };  
