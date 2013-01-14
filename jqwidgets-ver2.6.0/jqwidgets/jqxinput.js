/*
jQWidgets v2.6.0 (2012-Dec-27)
Copyright (c) 2011-2013 jQWidgets.
License: http://jqwidgets.com/license/
*/

(function(a){a.jqx.jqxWidget("jqxInput","",{});a.extend(a.jqx._jqxInput.prototype,{defineInstance:function(){this.disabled=false;this.filter=this.filter||this._filter;this.sort=this.sort||this._sort;this.highlight=this.highlight||this._highlight;this.renderer=this.renderer||this._renderer;this.shown=false;this.$popup=a("<ul></ul>");this.items=8;this.item='<li><a href="#"></a></li>';this.minLength=1;this.source=[];this.roundedCorners=true;this.searchMode="default";this.placeHolder="";this.width=null;this.height=null},createInstance:function(d){this.addHandlers();if(!a.isFunction(this.source)){var c=this;var b=new Array;b=a.map(this.source,function(f){if(f==undefined){return null}if(typeof f==="string"){return{label:f,value:f}}if(typeof f!="string"){var e="";var g="";if(c.displayMember!=""&&c.displayMember!=undefined){if(f[c.displayMember]){e=f[c.displayMember]}}if(c.valueMember!=""&&c.valueMember!=undefined){g=f[c.valueMember]}if(e==""){e=f.label}if(g==""){g=f.value}return{label:e,value:g}}return f});this.source=b}},_refreshClasses:function(c){var b=c?"addClass":"removeClass";this.host[b](this.toThemeProperty("jqx-widget-content"));this.host[b](this.toThemeProperty("jqx-input"));this.host[b](this.toThemeProperty("jqx-widget"));this.$popup[b](this.toThemeProperty("jqx-menu"));this.$popup[b](this.toThemeProperty("jqx-menu-vertical"));this.$popup[b](this.toThemeProperty("jqx-menu-dropdown"));this.$popup[b](this.toThemeProperty("jqx-widget"));this.$popup[b](this.toThemeProperty("jqx-widget-content"));this.host[b]("jqx-rc-all");if(this.disabled){this.host[b](this.toThemeProperty("jqx-fill-state-disabled"))}else{this.host.removeClass(this.toThemeProperty("jqx-fill-state-disabled"))}},refresh:function(){this._refreshClasses(false);this._refreshClasses(true);if(this.width){this.host.width(this.width)}if(this.height){this.host.height(this.height)}this.host.attr("disabled",this.disabled);if(!this.host.attr("placeholder")){if("placeholder" in this.element){this.host.attr("placeHolder",this.placeHolder)}else{var b=this;if(this.host.val()==""){this.host.val(this.placeHolder);this.host.focus(function(){if(b.host.val()==b.placeHolder){b.host.val("")}});a(input).blur(function(){if(b.host.val()==""||b.host.val()==b.placeHolder){b.host.val(b.placeHolder)}})}}}},destroy:function(){this.removeHandlers()},propertyChangedHandler:function(b,c,e,d){b.refresh()},select:function(b,c){var d=this.$popup.find(".jqx-fill-state-pressed").attr("data-value");this.host.val(this.renderer(d,this.host.val())).change();return this.close()},_renderer:function(b){return b},open:function(){var b=a.extend({},this.host.position(),{height:this.host[0].offsetHeight});this.$popup.insertAfter(this.host).css({top:b.top+b.height,left:b.left}).show();this.shown=true;return this},close:function(){this.$popup.hide();this.shown=false;return this},suggest:function(c){var b;this.query=this.host.val();if(!this.query||this.query.length<this.minLength){return this.shown?this.close():this}b=a.isFunction(this.source)?this.source(this.query,a.proxy(this.load,this)):this.source;return b?this.load(b):this},load:function(b){var c=this;b=a.grep(b,function(d){return c.filter(d)});b=this.sort(b);if(!b.length){return this.shown?this.close():this}return this.render(b.slice(0,this.items)).open()},_filter:function(b){var c=this.query;var d=b;if(b.label!=null){d=b.label}switch(this.searchMode){case"containsignorecase":default:return a.jqx.string.containsIgnoreCase(d,c);case"contains":return a.jqx.string.contains(d,c);case"equals":return a.jqx.string.equals(d,c);case"equalsignorecase":return a.jqx.string.equalsIgnoreCase(d,c);case"startswith":return a.jqx.string.startsWith(d,c);case"startswithignorecase":return a.jqx.string.startsWithIgnoreCase(d,c);case"endswith":return a.jqx.string.endsWith(d,c);case"endswithignorecase":return a.jqx.string.endsWithIgnoreCase(d,c)}},_sort:function(d){var e=[],c=[],b=[],f;while(f=d.shift()){var g=f;if(f.label){g=f.label}if(!g.toLowerCase().indexOf(this.query.toLowerCase())){e.push(f)}else{if(~g.indexOf(this.query)){c.push(f)}else{b.push(f)}}}return e.concat(c,b)},_highlight:function(b){var c=this.query.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g,"\\$&");return b.replace(new RegExp("("+c+")","ig"),function(d,e){return"<strong>"+e+"</strong>"})},render:function(b){var c=this;b=a(b).map(function(d,e){var f=e;if(e.value!=undefined){d=a(c.item).attr("data-value",e.value)}else{if(e.label!=undefined){d=a(c.item).attr("data-value",e.label)}else{d=a(c.item).attr("data-value",e)}}if(e.label){f=e.label}d.find("a").html(c.highlight(f));d[0].className=c.toThemeProperty("jqx-item")+" "+c.toThemeProperty("jqx-menu-item")+" "+c.toThemeProperty("jqx-rc-all");return d[0]});b.first().addClass(this.toThemeProperty("jqx-fill-state-pressed"));this.$popup.html(b);this.$popup.width(this.host.width()-4);return this},next:function(c){var d=this.$popup.find(".jqx-fill-state-pressed").removeClass(this.toThemeProperty("jqx-fill-state-pressed")),b=d.next();if(!b.length){b=a(this.$popup.find("li")[0])}b.addClass(this.toThemeProperty("jqx-fill-state-pressed"))},prev:function(c){var d=this.$popup.find(".jqx-fill-state-pressed").removeClass(this.toThemeProperty("jqx-fill-state-pressed")),b=d.prev();if(!b.length){b=this.$popup.find("li").last()}b.addClass(this.toThemeProperty("jqx-fill-state-pressed"))},addHandlers:function(){this.addHandler(this.host,"blur",a.proxy(this.blur,this));this.addHandler(this.host,"keypress",a.proxy(this.keypress,this));this.addHandler(this.host,"keyup",a.proxy(this.keyup,this));this.addHandler(this.host,"keydown",a.proxy(this.keydown,this));this.addHandler(this.$popup,"click",a.proxy(this.click,this));this.$popup.on("mouseenter","li",a.proxy(this.mouseenter,this))},removeHandlers:function(){this.removeHandler(this.host,"blur",a.proxy(this.blur,this));this.removeHandler(this.host,"keypress",a.proxy(this.keypress,this));this.removeHandler(this.host,"keyup",a.proxy(this.keyup,this));this.removeHandler(this.host,"keydown",a.proxy(this.keydown,this));this.removeHandler(this.$popup,"click",a.proxy(this.click,this));this.$popup.off("mouseenter","li",a.proxy(this.mouseenter,this))},move:function(b){if(!this.shown){return}switch(b.keyCode){case 9:case 13:case 27:b.preventDefault();break;case 38:b.preventDefault();this.prev();break;case 40:b.preventDefault();this.next();break}b.stopPropagation()},keydown:function(b){this.suppressKeyPressRepeat=~a.inArray(b.keyCode,[40,38,9,13,27]);this.move(b)},keypress:function(b){if(this.suppressKeyPressRepeat){return}this.move(b)},keyup:function(c){switch(c.keyCode){case 40:case 38:case 16:case 17:case 18:break;case 9:case 13:if(!this.shown){return}this.select(c,this);break;case 27:if(!this.shown){return}this.close();break;default:var b=this;if(this.timer){clearTimeout(this.timer)}this.timer=setTimeout(function(){b.suggest()},300)}c.stopPropagation();c.preventDefault()},blur:function(c){var b=this;setTimeout(function(){b.close()},150)},click:function(b){b.stopPropagation();b.preventDefault();this.select(b,this)},mouseenter:function(b){this.$popup.find(".jqx-fill-state-pressed").removeClass(this.toThemeProperty("jqx-fill-state-pressed"));a(b.currentTarget).addClass(this.toThemeProperty("jqx-fill-state-pressed"))}})})(jQuery);