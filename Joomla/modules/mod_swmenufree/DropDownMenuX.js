/*
 * DO NOT REMOVE THIS NOTICE
 *
 * PROJECT:   mygosuMenu
 * VERSION:   1.1.6
 * COPYRIGHT: (c) 2003,2004 Cezary Tomczak
 * LINK:      http://gosu.pl/dhtml/mygosumenu.html
 * LICENSE:   BSD (revised)
 */

/*
  Todo, bugs to fix:
  - delay.show = 400 , delay.hide = 400
    go Product Three -> Live Demo -> Test Drive -> Test Three , go fast to Product Four.
    Result: 2 elements highlighted in the same section
  - delay.show = 0 , delay.hide = 400
    go Product Three -> Live Demo , section out , section over, seciont out.
    Result: Live Demo is not highlighted
  - active className changing, unnecessary blink
  - opera: hideSection() exceptions are throwed
*/

function DropDownMenuX(id) {

    /* Type of the menu: "horizontal" or "vertical" */
    this.type = "horizontal";

    /* Delay (in miliseconds >= 0): show-hide menu
     * Hide must be > 0 */
    this.delay = {
        "show": 0,
        "hide": 400
    };
    /* Change the default position of sub-menu by Y pixels from top and X pixels from left
     * Negative values are allowed */
    this.position = {
        "level1": { "top": 0, "left": 0},
        "levelX": { "top": 0, "left": 0}
    };

	this.iframename = 0;
    

    /* fix ie selectbox bug ? */
    this.fixIeSelectBoxBug = false;
	
    /* Z-index property for .section */
    this.zIndex = {
        "visible": 500,
        "hidden": -1
    };

    // Browser detection
    this.browser = {
        "ie": Boolean(document.body.currentStyle),
        "ie5": (navigator.appVersion.indexOf("MSIE 5.5") != -1 || navigator.appVersion.indexOf("MSIE 5.0") != -1),
        "ie6": (navigator.appVersion.indexOf("MSIE 6.0") != -1)
    };
    
    if (!this.browser.ie) {
        this.browser.ie5 = false;
        this.browser.ie6 = false;
    }

    /* Initialize the menu */
    this.init = function() {
        if (!document.getElementById(this.id)) { return alert("DropDownMenuX.init() failed. Element '"+ this.id +"' does not exist."); }
        if (this.type != "horizontal" && this.type != "vertical") { return alert("DropDownMenuX.init() failed. Unknown menu type: '"+this.type+"'"); }
        if (this.browser.ie && this.browser.ie5) { fixWrap(); }
      
		fixSections();
        parse(document.getElementById(this.id).childNodes, this.tree, this.id);
    };

    /* Search for .section elements and set width for them */
    function fixSections() {
        var arr = document.getElementById(self.id).getElementsByTagName("div");
        var sections = new Array();
        var widths = new Array();
        
        for (var i = 0; i < arr.length; i++) {
            if (arr[i].className == "section") {
                sections.push(arr[i]);
            }
        }
        for (var i = 0; i < sections.length; i++) {
            widths.push(getMaxWidth(sections[i].childNodes));
        }
        for (var i = 0; i < sections.length; i++) {
            sections[i].style.width = (widths[i]) + "px";
        }
        if (self.browser.ie) {
            for (var i = 0; i < sections.length; i++) {
                setMaxWidth(sections[i].childNodes, widths[i]);
           }
        }
    }

    function fixWrap() {
        var elements = document.getElementById(self.id).getElementsByTagName("a");
        for (var i = 0; i < elements.length; i++) {
            if (/item2/.test(elements[i].className)) {
                elements[i].innerHTML = '<div nowrap="nowrap">'+elements[i].innerHTML+'</div>';
            }
        }
    }

    /* Search for an element with highest width among given nodes, return that width */
    function getMaxWidth(nodes) {
        var maxWidth = 0;
        for (var i = 0; i < nodes.length; i++) {
            if (nodes[i].nodeType != 1 || /section/.test(nodes[i].className)) { continue; }
            if (nodes[i].offsetWidth > maxWidth) { maxWidth = nodes[i].offsetWidth; }
        }
        return maxWidth;
    }

    /* Set width for item2 elements */
    function setMaxWidth(nodes, maxWidth) {
        for (var i = 0; i < nodes.length; i++) {
            if (nodes[i].nodeType == 1 && /item2/.test(nodes[i].className) && nodes[i].currentStyle) {
                if (self.browser.ie5 || self.browser.ie6) {
                   // nodes[i].style.width = (maxWidth - parseInt(nodes[i].currentStyle.paddingLeft) - parseInt(nodes[i].currentStyle.paddingRight)) + "px";
					nodes[i].style.width = (maxWidth) + "px";
				} else {
                    nodes[i].style.width = (maxWidth - parseInt(nodes[i].currentStyle.paddingLeft) - parseInt(nodes[i].currentStyle.paddingRight)) + "px";
					// nodes[i].style.width = (maxWidth) + "px";
				}
            }
        }
    }

    /* Parse nodes, create events, position elements */
    function parse(nodes, tree, id) {
        for (var i = 0; i < nodes.length; i++) {
            if (1 != nodes[i].nodeType) {
                continue;
            }
            switch (true) {
                // .item1
                case /\bitem1\b/.test(nodes[i].className):
                    nodes[i].id = id + "-" + tree.length;
                    tree.push(new Array());
                    nodes[i].onmouseover = itemOver;
                    nodes[i].onmouseout = itemOut;
                    break;
                // .item2
                case /\bitem2\b/.test(nodes[i].className):
                    nodes[i].id = id + "-" + tree.length;
                    tree.push(new Array());
                    nodes[i].onmouseover = itemOver;
                    nodes[i].onmouseout = itemOut;
					//alert(nodes[i].id);
                    break;
                // .section
                case /\bsection\b/.test(nodes[i].className):
                    // id, events
                    nodes[i].id = id + "-" + (tree.length - 1) + "-section";
                    nodes[i].onmouseover = sectionOver;
                    nodes[i].onmouseout = sectionOut;
                    // position
                    var box1 = document.getElementById(id + "-" + (tree.length - 1));
                    var box2 = document.getElementById(nodes[i].id);
					//alert(nodes[i].id);
                    var el = new Element(box1.id);
                    if (1 == el.level) {
                        if ("horizontal" == self.type) {
                            box2.style.top = box1.offsetTop + box1.offsetHeight + self.position.level1.top + "px";
                            if (self.browser.ie5) {
                                box2.style.left = self.position.level1.left + "px";
                            } else {
                                box2.style.left = box1.offsetLeft + self.position.level1.left + "px";
                            }
                        } else if ("vertical" == self.type) {
                            box2.style.top = box1.offsetTop + self.position.level1.top + "px";
                            if (self.browser.ie5) {
                                box2.style.left = box1.offsetWidth + self.position.level1.left + "px";
                            } else {
                                box2.style.left = box1.offsetLeft + box1.offsetWidth + self.position.level1.left + "px";
                            }
                        }
                    } else {
                        box2.style.top = box1.offsetTop + self.position.levelX.top + "px";
                        box2.style.left = box1.offsetLeft + box1.offsetWidth + self.position.levelX.left + "px";
                    }
                    // sections, sectionsShowCnt, sectionsHideCnt
                    self.sections.push(nodes[i].id);
                    self.sectionsShowCnt.push(0);
                    self.sectionsHideCnt.push(0);
                    if (self.fixIeSelectBoxBug && self.browser.ie6) {
                        nodes[i].innerHTML = nodes[i].innerHTML + '<iframe id="'+nodes[i].id+'-iframe" class="'+self.iframename+'frame" src="javascript:false" scrolling="no" frameborder="0" style="position: absolute; top: 0px; left: 0px; display: none; "></iframe>';
                    }
                    break;
            }
            if (nodes[i].childNodes) {
                if (/\bsection\b/.test(nodes[i].className)) {
                    parse(nodes[i].childNodes, tree[tree.length - 1], id + "-" + (tree.length - 1));
                } else {
                    parse(nodes[i].childNodes, tree, id);
                }
            }
        }
    }

    /* event, item:onmouseover */
      /* event, item:onmouseover */
    function itemOver() {
        //debug("itemOver("+this.id+") , visible = " + self.visible);
        self.itemShowCnt++;
        var id_section = this.id + "-section";
        if (self.visible.length) {
			
			/*	Array prototyped .getLast function replaced with normal function (GT 2005)
            var el = new Element(self.visible.getLast());
			*/
			var el = new Element(lastItemOfArray(self.visible));			
			
            el = document.getElementById(el.getParent().id);
			
			// modded by Guy Thomas 2005/06/02 to cope with new css item names (mine include _ before number)
            if (/item\d-active/.test(el.className)) {
			//if (/((Item_\d)|(Item))-active/.test(el.className)) {				
                el.className = el.className.replace(/(item\d)-active/, "$1");
				//el.className = el.className.replace(/((Item_\d)|(Item))-active/, "$1");
            }
        }
		
		
/*	Array prototyped .contains function replaced with normal function (GT 2005)	
        if (self.sections.contains(id_section)) {
*/
		if (stringInArray(self.sections, id_section)) {			
            clearTimers();
			
/*	Array prototyped indexof function replaced with normal function (GT 2005)
            self.sectionsHideCnt[self.sections.indexOf(id_section)]++;
*/
            self.sectionsHideCnt[itemInArray(self.sections, id_section)]++;
			
/*	Array prototyped indexof function replaced with normal function (GT 2005)			
            var cnt = self.sectionsShowCnt[self.sections.indexOf(id_section)];
*/
            var cnt = self.sectionsShowCnt[itemInArray(self.sections, id_section)];			
            var timerId = setTimeout(function(a, b) { return function() { self.showSection(a, b); } } (id_section, cnt), self.delay.show);
            self.timers.push(timerId);
        } else {
            if (self.visible.length) {
                clearTimers();
                var timerId = setTimeout(function(a, b) { return function() { self.showItem(a, b); } } (this.id, self.itemShowCnt), self.delay.show);
                self.timers.push(timerId);
            }
        }
    };

    /* event, item:onmouseout */
    function itemOut() {
       // debug("itemOut("+this.id+") , visible = " + self.visible);
        self.itemShowCnt++;
        var id_section = this.id + "-section";
		
		/*	Array prototyped .contains function replaced with normal function (GT 2005)			
        if (self.sections.contains(id_section)) {
		*/
        if (stringInArray(self.sections, id_section)) {		
			
			/*	Array prototyped indexof function replaced with normal function (GT 2005)			
            self.sectionsShowCnt[self.sections.indexOf(id_section)]++;
			*/
			self.sectionsShowCnt[itemInArray(self.sections, id_section)]++;

			/*	Array prototyped .contains function replaced with normal function (GT 2005)							
            if (self.visible.contains(id_section)) {
			*/
			if (stringInArray(self.visible, id_section)) {
				
				/*	Array prototyped function replaced with normal function (GT 2005)
                var cnt = self.sectionsHideCnt[self.sections.indexOf(id_section)];
				*/
				var cnt = self.sectionsHideCnt[itemInArray(self.sections, id_section)];				
                var timerId = setTimeout(function(a, b) { return function() { self.hideSection(a, b); } }(id_section, cnt), self.delay.hide);
                self.timers.push(timerId);
            }
        }
    };

    /* event, section:onmouseover */
    function sectionOver() {
        //debug("sectionOver("+this.id+") , visible = " + self.visible);
		
		/*	Array prototyped function replaced with normal function (GT 2005)
        self.sectionsHideCnt[self.sections.indexOf(this.id)]++;
		*/
		self.sectionsHideCnt[itemInArray(self.sections,this.id)]++;
		
        var el = new Element(this.id);
        var parent = document.getElementById(el.getParent().id);
		// modded by Guy Thomas 2005/06/02 to cope with new css item names (mine include _ before number)
        if (!/item\d-active/.test(parent.className)) {		
        //if (!/((Item_\d)|(Item))-active/.test(parent.className)) {
          parent.className = parent.className.replace(/(item\d)/, "$1-active");
		//	parent.className = parent.className.replace(/((Item_\d)|(Item))/, "$1-active");
        }
    };

    /* event, section:onmouseout */
    function sectionOut() {
        //debug("sectionOut("+this.id+") , visible = " + self.visible);
		
		/*	Array prototyped function replaced with normal function (GT 2005)
        self.sectionsShowCnt[self.sections.indexOf(this.id)]++;
		*/		
		self.sectionsShowCnt[itemInArray(self.sections,this.id)]++;

		/*	Array prototyped function replaced with normal function (GT 2005)
        var cnt = self.sectionsHideCnt[self.sections.indexOf(this.id)];
		*/
        var cnt = self.sectionsHideCnt[itemInArray(self.sections,this.id)];
		
        var timerId = setTimeout(function(a, b) { return function() { self.hideSection(a, b); } }(this.id, cnt), self.delay.hide);
        self.timers.push(timerId);
    };

    /* Show section (1 argument passed)
     * Try to show section (2 arguments passed) - check cnt with sectionShowCnt */
    this.showSection = function(id, cnt) {
        if (typeof cnt != "undefined") {
			
			/*	Array prototyped function replaced with normal function (GT 2005)
            if (cnt != this.sectionsShowCnt[this.sections.indexOf(id)]) { return; }
			*/
			if (cnt != this.sectionsShowCnt[itemInArray(this.sections,id)]) { return; }
			
        }
        //debug("showSection("+id+", "+cnt+") , visible = " + this.visible);
		
		/*	Array prototyped function replaced with normal function (GT 2005)
        this.sectionsShowCnt[this.sections.indexOf(id)]++;
		*/
		this.sectionsShowCnt[itemInArray(this.sections,id)]++;
        if (this.visible.length) {
			/*	Array prototyped .getLast function replaced with normal function (GT 2005)
            if (id == this.visible.getLast()) { return; }
			*/
			if (id == lastItemOfArray(this.visible)) { return; }
			
            var el = new Element(id);
            var parents = el.getParentSections();
            //debug("getParentSections("+el.id+") = " + parents);
            for (var i = this.visible.length - 1; i >= 0; i--) {				
				/*	Array prototyped .contains function replaced with normal function (GT 2005)							
                if (parents.contains(this.visible[i])) {
				*/
				if (stringInArray(parents, this.visible[i])) {				
                    break;
                } else {
                    this.hideSection(this.visible[i]);
                }
            }
        }
		
        var el = new Element(id);
        var parent = document.getElementById(el.getParent().id);		

		// modded by Guy Thomas 2005/06/02 to cope with new css item names (mine include _ before number)
         if (!/item\d-active/.test(parent.className)) {		
		//if (!/((Item_\d)|(Item))-active/.test(parent.className)) {					
            parent.className = parent.className.replace(/(item\d)/, "$1-active");
            //parent.className = parent.className.replace(/((Item_\d)|(Item))/, "$1-active");	
        }
        if (document.all) { document.getElementById(id).style.display = "block"; }
        document.getElementById(id).style.visibility = "visible";
        document.getElementById(id).style.zIndex = this.zIndex.visible;
		

        if (this.fixIeSelectBoxBug && this.browser.ie6) {
			//fix no border bug in css by Guy Thomas 2004/12/09
            var div = document.getElementById(id);			
			if (div.currentStyle.border==null){
				div.style.borderLeftWidth=0;
				div.style.borderRightWidth=0;
				div.style.borderTopWidth=0;
				div.style.borderBottomWidth=0;
			}
            var iframe = document.getElementById(id+"-iframe");
            iframe.style.width = div.offsetWidth + parseInt(div.currentStyle.borderLeftWidth) + parseInt(div.currentStyle.borderRightWidth);
            iframe.style.height = div.offsetHeight + parseInt(div.currentStyle.borderTopWidth) + parseInt(div.currentStyle.borderBottomWidth);
            iframe.style.top = -parseInt(div.currentStyle.borderTopWidth);
            iframe.style.left = -parseInt(div.currentStyle.borderLeftWidth);
//            iframe.style.zIndex = div.style.zIndex-1;
			iframe.style.zIndex = -1; //Mod by Guy Thomas 2005/05/31
            iframe.style.display = "block";
        }
        this.visible.push(id);
    };

    /* Emulating an empty non-existent section, we have to hide elements, works like showSection() */
    this.showItem = function(id, cnt) {
        if (typeof cnt != "undefined") {
            if (cnt != this.itemShowCnt) { return; }
        }
        this.itemShowCnt++;
        if (this.visible.length) {
            var el = new Element(id + "-section");
            var parents = el.getParentSections();
            //debug("showItem() getParentSections("+el.id+") = " + parents);
            for (var i = this.visible.length - 1; i >= 0; i--) {				
				/*	Array prototyped .contains function replaced with normal function (GT 2005)					
                if (parents.contains(this.visible[i])) {
				*/
				if (stringInArray(parents, this.visible[i])) {					
                    break;
                } else {
                    this.hideSection(this.visible[i]);
                }
            }
        }
    };

    /* Hide section (1 argument passed)
     * Try to hide section (2 arguments passed) - check cnt with sectionHideCnt */
    this.hideSection = function(id, cnt) {
        if (typeof cnt != "undefined") {			
			/*	Array prototyped function replaced with normal function (GT 2005)
            if (cnt != this.sectionsHideCnt[this.sections.indexOf(id)]) { return; }
			*/
			if (cnt != this.sectionsHideCnt[itemInArray(this.sections,id)]) { return; }
			
			/*	Array prototyped .getLast function replaced with normal function (GT 2005)			
            if (id == this.visible.getLast()) {
			*/
			
			if (id == lastItemOfArray(this.visible)) {						
                //debug("hideSectionAll("+id+", "+cnt+") , visible = " + this.visible);			
                for (var i = this.visible.length - 1; i >= 0; i--) {
                    this.hideSection(this.visible[i]);
                }
                return;
            }
        }
        //debug("hideSection("+id+", "+cnt+") , visible = " + this.visible);
        var el = new Element(id);
        var parent = document.getElementById(el.getParent().id);
		
		// modded by Guy Thomas 2005/06/02 to cope with new css item names (mine include _ before number)
        if (/item\d-active/.test(parent.className)) {
		//if (/((Item_\d)|(Item))-active/.test(parent.className)) {
            parent.className = parent.className.replace(/(item\d)-active/, "$1");
		//	parent.className = parent.className.replace(/((Item_\d)|(Item))-active/, "$1");
        }
        document.getElementById(id).style.zIndex = this.zIndex.hidden;
        document.getElementById(id).style.visibility = "hidden";
        if (document.all) { document.getElementById(id).style.display = "none"; }
		
		/*	Array prototyped .contains function replaced with normal function (GT 2005)							
        if (this.visible.contains(id)) {
		*/			
        if (stringInArray(this.visible,id)) {
			
			/*	Array prototyped .getLast function replaced with normal function (GT 2005)			
            if (id == this.visible.getLast()) {
			*/
			if (id == lastItemOfArray(this.visible)) {						
									  
                this.visible.pop();
            } else {
				// removed by GT 2005/05/30 (causes a js error in IE6)
                //throw "DropDownMenuX.hideSection('"+id+"', "+cnt+") failed, trying to hide a section that is not the deepest visible section";
            }
        } else {
			// removed by GT 2005/05/30 (causes a js error in IE6)			
            //throw "DropDownMenuX.hideSection('"+id+"', "+cnt+") failed, cannot hide element that is not visible";
        }
		/*	Array prototyped .indexOf function replaced with normal function (GT 2005)
        this.sectionsHideCnt[this.sections.indexOf(id)]++;
		*/
		this.sectionsHideCnt[itemInArray(this.sections,id)]++;		
    };

    /* Element (.section, .subItem etc) */
    function Element(id) {
        
        this.menu = self;
        this.id = id;

        /* Get Level of given id
         * Examples: menu-1 (1 level), menu-1-4 (2 level) */
        this.getLevel = function() {
            var s = this.id.substr(this.menu.id.length);
						
			/*	String prototyped .substrCount function replaced with normal function (GT 2005)			
            return s.substrCount("-");
			*/
			return countSubStr(s,"-");
        };

        /* Get parent Element */
        this.getParent = function() {
            var s = this.id.substr(this.menu.id.length);
            var a = s.split("-");
            a.pop();
            return new Element(this.menu.id + a.join("-"));
        };

        /* Check whether an element has a parent element */
        this.hasParent = function() {
            var s = this.id.substr(this.menu.id.length);
            var a = s.split("-");
            return a.length > 2;
        };

        /* Check whether an element has a sub-section */
        this.hasChilds = function() {
            return Boolean(document.getElementById(this.id + "-section"));
        };

        /* Get parent section elements for current section */
        this.getParentSections = function() {
            var s = this.id.substr(this.menu.id.length);
            s = s.substr(0, s.length - "-section".length);
            var a = s.split("-");
            a.shift();
            a.pop();
            var s = this.menu.id;
            var parents = [];
            for (var i = 0; i < a.length; i++) {
                s += ("-" + a[i]);
                parents.push(s + "-section");
            }
            return parents;
        };
        
        this.level = this.getLevel();
    };

    /* Clear all timers set with setTimeout() */
    function clearTimers() {
        for (var i = self.timers.length - 1; i >= 0; i--) {
            clearTimeout(self.timers[i]);
            self.timers.pop();
        }
    };

    var self = this;
    this.id = id; /* menu id */
    this.tree = []; /* tree structure of menu */
    this.sections = []; /* all sections, required for timeout */
    this.sectionsShowCnt = [];
    this.sectionsHideCnt = [];
    this.itemShowCnt = 0;
    this.timers = []; // timeout ids
    this.visible = []; /* visible section, ex. Array("menu-0-section", ..) , succession is important: top to bottom */
};

/*GT 2005/04/22 ALL MYGOSU PROTOTYPING FUNCTIONS HAVE BEEN REPLACED BY STANDARD FUNCTIONS
BECAUSE THEY INTERFERE WITH HTML AREA 3 XTD */

/* Finds the index of the first occurence of item in the array, or -1 if not found */
/* THIS SCRIPT SCREWS UP HTML AREA XTD SO I'VE REPLACED IT!! (GT 2005/04/22) */
/*
if (typeof Array.prototype.indexOf == "undefined") {
	Array.prototype.indexOf = function(item) {
		for (var i = 0; i < this.length; i++) {
			if (this[i] === item) {
				return i;
			}
		}
		return -1;
	}
}
*/

/* Finds the index of the first occurence of item in the array, or -1 if not found */
/* GT 2005/04/22 - replacement function for searching array - necessary for compatability with html area xtd */
function itemInArray (inArray, srchItem) {
		for (var i = 0; i < inArray.length; i++) {
			if (inArray[i] === srchItem) {
				return i;
			}
		}
		return -1; // item not found
};

/* Check whether array contains given string */
/* THIS SCRIPT SCREWS UP HTML AREA XTD SO I'VE REPLACED IT!! (GT 2005/04/22) */
/*
if (typeof Array.prototype.contains == "undefined") {
	Array.prototype.contains = function(s) {
		for (var i = 0; i < this.length; i++) {
			if (this[i] === s) {
				return true;
			}
		}
		return false;
	}
}
*/

/* Check whether array contains given string */
function stringInArray (inArray, srchItem){
		for (var i = 0; i < inArray.length; i++) {
			if (inArray[i] === srchItem) {
				return true;
			}
		}
		return false;
};



/* Counts the number of substring occurrences */
/* THIS SCRIPT SCREWS UP HTML AREA XTD SO I'VE REPLACED IT!! (GT 2005/04/22) */	
/*
if (typeof String.prototype.substrCount == "undefined") {
	String.prototype.substrCount = function(s) {
		return this.split(s).length - 1;
	}
}
*/

/* Counts the number of substring occurrences */
function countSubStr (srcStr, subStr){
	return srcStr.split(subStr).length - 1;
};

/* Get the last element from the array */
/* THIS SCRIPT SCREWS UP HTML AREA XTD SO I'VE REPLACED IT!! (GT 2005/04/22) */
/*
if (typeof Array.prototype.getLast == "undefined") {
	Array.prototype.getLast = function() {
		return this[this.length-1];
	}
}
*/

/* Get the last element from the array */
function lastItemOfArray (inArray){
	return inArray[inArray.length-1];
};
