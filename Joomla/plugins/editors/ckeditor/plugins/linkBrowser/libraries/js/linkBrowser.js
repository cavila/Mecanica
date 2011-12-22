/*
* This plugin uses parts of JCE extension by Ryan Demmer.
* @copyright	Copyright (C) 2005 - 2011 Ryan Demmer. All rights reserved.
* @copyright	Copyright (C) 2003 - 2011, CKSource - Frederico Knabben. All rights reserved.
* @license		GNU/GPL
* CKEditor extension is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

var linkBrowser = Plugin.extend({

	moreOptions : function(){
		return {};
	},
	initialize : function(options){

		this.setOptions(this.moreOptions(), options);
		this.initTree();
	},
	initTree : function(){
		this.tree = new Tree('link-options', {
			collapseTree: true,
			charLength: 50,
			onInit : function(fn){
				fn.apply();
			},
			// When a node is clicked
			onNodeClick : function(e, node){
				e = new Event(e);
				var v, el = e.target;
				if(!el.getParent().hasClass('nolink')){
					v = el.getProperty('href');
					if(v == 'javascript:;') v = node.id;
					//v = (document.location.protocol+'//'+document.location.hostname+document.location.pathname).replace('administrator/index.php','')+v;
					if (window.parent.linkBrowserUrl == 'relative')
					{
						link = v;
					}
					else
					{
						v = v.replace('index.php','');
						v = (document.location.protocol+'//'+document.location.hostname+document.location.pathname).replace('administrator/index.php','')+v;
					}
					window.parent.CKEDITOR.tools.callFunction(window.parent.FuncDialogNr, v);
				}
				if(el.getParent().hasClass('folder')){
					this.tree.toggleNode(e, node);
				}
			}.bind(this),
			// When a node is toggled and loaded
			onNodeLoad : function(node){
				this.tree.toggleLoader(node);
				var query = string.query(string.unescape(node.id));
				this.xhr('getLinks', query, function(o){
					if(o){
						if(!o.error){
							var ul = $E('ul', node);
							if(ul){
								ul.remove();
							}
							this.tree.createNode(o.folders, node);
							this.tree.toggleNodeState(node, true);
						}else{
							alert(o.error);
						}
					}
					this.tree.toggleLoader(node);
				}.bind(this));
			}.bind(this)
		});

	}
});
linkBrowser.implement(new Events, new Options);