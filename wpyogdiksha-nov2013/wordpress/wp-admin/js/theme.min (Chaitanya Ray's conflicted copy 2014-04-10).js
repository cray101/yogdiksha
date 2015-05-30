window.wp=window.wp||{},function(a){var b,c;b=wp.themes=wp.themes||{},b.data=_wpThemeSettings,c=b.data.l10n,_.extend(b,{model:{},view:{},routes:{},router:{},template:wp.template}),b.model=Backbone.Model.extend({}),b.view.Appearance=wp.Backbone.View.extend({el:"#wpbody-content .wrap .theme-browser",window:a(window),page:0,initialize:function(){_.bindAll(this,"scroller"),this.window.bind("scroll",_.throttle(this.scroller,300))},render:function(){this.view=new b.view.Themes({collection:this.collection,parent:this}),this.search(),this.view.render(),this.$el.empty().append(this.view.el).addClass("rendered"),this.$el.append('<br class="clear"/>')},search:function(){var d,e=this;1!==b.data.themes.length&&(d=new b.view.Search({collection:e.collection}),d.render(),a("#wpbody h2:first").append(a.parseHTML('<label class="screen-reader-text" for="theme-search-input">'+c.search+"</label>")).append(d.el))},scroller:function(){var a,b,c=this;a=this.window.scrollTop()+c.window.height(),b=c.$el.offset().top+c.$el.outerHeight(!1)-c.window.height(),b=Math.round(.9*b),a>b&&this.trigger("theme:scroll")}}),b.Collection=Backbone.Collection.extend({model:b.model,terms:"",doSearch:function(a){this.terms!==a&&(this.terms=a,this.terms.length>0&&this.search(this.terms),""===this.terms&&this.reset(b.data.themes),this.trigger("update"))},search:function(a){var c,d,e;this.reset(b.data.themes,{silent:!0}),a=a.replace(" ",")(?=.*"),c=new RegExp("^(?=.*"+a+").+","i"),d=this.filter(function(b){return e=_.union(b.get("name"),b.get("description"),b.get("author"),b.get("tags")),c.test(b.get("author"))&&a.length>2&&b.set("displayAuthor",!0),c.test(e)}),this.reset(d)},paginate:function(a){var b=this;return a=a||0,b=_(b.rest(15*a)),b=_(b.first(15))}}),b.view.Theme=wp.Backbone.View.extend({className:"theme",state:"grid",html:b.template("theme"),events:{click:"expand",touchend:"expand",touchmove:"preventExpand"},touchDrag:!1,render:function(){var a=this.model.toJSON();this.$el.html(this.html(a)),this.activeTheme(),this.model.get("displayAuthor")&&this.$el.addClass("display-author")},activeTheme:function(){this.model.get("active")&&this.$el.addClass("active")},expand:function(b){var c=this;return this.touchDrag===!0?this.touchDrag=!1:(b=b||window.event,a(b.target).is(".theme-actions a")||this.trigger("theme:expand",c.model.cid),void 0)},preventExpand:function(){this.touchDrag=!0}}),b.view.Details=wp.Backbone.View.extend({className:"theme-overlay",events:{click:"collapse","click .delete-theme":"deleteTheme","click .left":"previousTheme","click .right":"nextTheme"},html:b.template("theme-single"),render:function(){var a=this.model.toJSON();this.$el.html(this.html(a)),this.activeTheme(),this.navigation(),this.screenshotCheck(this.$el)},activeTheme:function(){this.$el.toggleClass("active",this.model.get("active"))},collapse:function(c){var d,e=this;c=c||window.event,1!==b.data.themes.length&&(a(c.target).is(".theme-backdrop")||a(c.target).is("div.close")||27===c.keyCode)&&(a("body").addClass("closing-overlay"),this.$el.fadeOut(130,function(){a("body").removeClass("theme-overlay-open closing-overlay"),e.closeOverlay(),d=document.body.scrollTop,b.router.navigate(b.router.baseUrl(""),{replace:!0}),document.body.scrollTop=d}))},navigation:function(){this.model.cid===this.model.collection.at(0).cid&&this.$el.find(".left").addClass("disabled"),this.model.cid===this.model.collection.at(this.model.collection.length-1).cid&&this.$el.find(".right").addClass("disabled")},closeOverlay:function(){this.remove(),this.unbind(),this.trigger("theme:collapse")},deleteTheme:function(){return confirm(b.data.settings.confirmDelete)},nextTheme:function(){var a=this;a.trigger("theme:next",a.model.cid)},previousTheme:function(){var a=this;a.trigger("theme:previous",a.model.cid)},screenshotCheck:function(a){var b,c;b=a.find(".screenshot img"),c=new Image,c.src=b.attr("src"),c.width&&c.width<=300&&a.addClass("small-screenshot")}}),b.view.Themes=wp.Backbone.View.extend({className:"themes",$overlay:a("div.theme-overlay"),index:0,count:a(".theme-count"),initialize:function(b){var c=this;this.parent=b.parent,this.setView("grid"),c.currentTheme(),this.listenTo(c.collection,"update",function(){c.parent.page=0,c.currentTheme(),c.render(this)}),this.listenTo(this.parent,"theme:scroll",function(){c.renderThemes(c.parent.page)}),a("body").on("keyup",function(a){c.overlay&&(39===a.keyCode&&c.overlay.nextTheme(),37===a.keyCode&&c.overlay.previousTheme(),27===a.keyCode&&c.overlay.collapse(a))})},render:function(){this.$el.html(""),1===b.data.themes.length&&(this.singleTheme=new b.view.Details({model:this.collection.models[0]}),this.singleTheme.render(),this.$el.addClass("single-theme"),this.$el.append(this.singleTheme.el)),this.renderThemes(this.parent.page),this.count.text(this.collection.length)},renderThemes:function(d){var e=this;e.instance=e.collection.paginate(d),0!==e.instance.length&&(d>=1&&a(".add-new-theme").remove(),e.instance.each(function(a){e.theme=new b.view.Theme({model:a}),e.theme.render(),e.$el.append(e.theme.el),e.listenTo(e.theme,"theme:expand",e.expand,e)}),b.data.settings.canInstall&&this.$el.append('<div class="theme add-new-theme"><a href="'+b.data.settings.installURI+'"><div class="theme-screenshot"><span></span></div><h3 class="theme-name">'+c.addNew+"</h3></a></div>"),this.parent.page++)},currentTheme:function(){var a,b=this;a=b.collection.findWhere({active:!0}),a&&(b.collection.remove(a),b.collection.add(a,{at:0}))},setView:function(a){return a},expand:function(c){var d=this;this.model=d.collection.get(c),b.router.navigate(b.router.baseUrl("?theme="+this.model.id),{replace:!0}),this.setView("detail"),a("body").addClass("theme-overlay-open"),this.overlay=new b.view.Details({model:d.model}),this.overlay.render(),this.$overlay.html(this.overlay.el),this.listenTo(this.overlay,"theme:next",function(){d.next([d.model.cid])}).listenTo(this.overlay,"theme:previous",function(){d.previous([d.model.cid])})},next:function(a){var b,c,d=this;b=d.collection.get(a[0]),c=d.collection.at(d.collection.indexOf(b)+1),void 0!==c&&(this.overlay.closeOverlay(),d.theme.trigger("theme:expand",c.cid))},previous:function(a){var b,c,d=this;b=d.collection.get(a[0]),c=d.collection.at(d.collection.indexOf(b)-1),void 0!==c&&(this.overlay.closeOverlay(),d.theme.trigger("theme:expand",c.cid))}}),b.view.Search=wp.Backbone.View.extend({tagName:"input",className:"theme-search",attributes:{placeholder:c.searchPlaceholder,type:"search"},events:{input:"search",keyup:"search",change:"search",search:"search"},search:function(a){"keyup"===a.type&&27===a.which&&(a.target.value=""),this.collection.doSearch(a.target.value),a.target.value?b.router.navigate(b.router.baseUrl("?search="+a.target.value),{replace:!0}):b.router.navigate(b.router.baseUrl(""),{replace:!0})}}),b.routes=Backbone.Router.extend({initialize:function(){this.routes=_.object([])},baseUrl:function(a){return b.data.settings.root+a}}),b.Run={init:function(){this.themes=new b.Collection(b.data.themes),this.view=new b.view.Appearance({collection:this.themes}),this.render()},render:function(){this.view.render(),this.routes(),"undefined"!=typeof b.data.settings.theme&&""!==b.data.settings.theme&&this.view.view.theme.trigger("theme:expand",this.view.collection.findWhere({id:b.data.settings.theme})),"undefined"!=typeof b.data.settings.search&&""!==b.data.settings.search&&(a(".theme-search").val(b.data.settings.search),this.themes.doSearch(b.data.settings.search)),window.history&&window.history.pushState&&Backbone.history.start({pushState:!0,silent:!0})},routes:function(){b.router=new b.routes}},jQuery(document).ready(_.bind(b.Run.init,b.Run))}(jQuery);var tb_position;jQuery(document).ready(function(a){tb_position=function(){var b=a("#TB_window"),c=a(window).width(),d=a(window).height(),e=c>1040?1040:c,f=0;a("body.admin-bar").length&&(f=parseInt(jQuery("#wpadminbar").css("height"),10)),b.size()&&(b.width(e-50).height(d-45-f),a("#TB_iframeContent").width(e-50).height(d-75-f),b.css({"margin-left":"-"+parseInt((e-50)/2,10)+"px"}),"undefined"!=typeof document.body.style.maxWidth&&b.css({top:20+f+"px","margin-top":"0"}))},a(window).resize(function(){tb_position()})});