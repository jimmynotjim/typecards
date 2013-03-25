(function(e){e.typecards=function(){var t={menuState:"closed",speed:.4,vpHeight:function(){return e(window).height()},margTop:function(){return t.vpHeight()>300?(t.vpHeight()-300)*.5:0},offSet:function(){return t.vpHeight()<600?t.vpHeight()*.85:t.vpHeight()*.9},setCardHeight:function(){e(".main").height(t.vpHeight())},setCharMargin:function(){var n=t.vpHeight()>300?(t.vpHeight()-300)*.5:0;e(".character").css("margin-top",n)},setAppStyles:function(){var n=".main{height:"+t.vpHeight()+"px;} .character{margin-top:"+t.margTop()+"px;}";e("#app-styles").length===0?e("head").append('<style id="app-styles">'+n+"</style>"):e("#app-styles").html(n)},initiateResizeListener:function(){e(window).resize(function(){t.setAppStyles()})},isOpen:function(){return t.menuState==="open"?!0:!1},showMenu:function(n){var r=t.addAnimations(n),i=t.translateOpen();e("#anatomy_slider").attr("style",i+r)},hideMenu:function(n){var r=t.addAnimations(n),i=t.translateClosed();e("#anatomy_slider").attr("style",i+r)},addAnimations:function(e){return"-webkit-transition: all "+e+"s;-moz-transition: all "+e+"s;transition:all "+e+"s;"},translateOpen:function(){return"-webkit-transform:translate3d(0,-"+t.offSet()+"px,0); -moz-transform:translate3d(0,-"+t.offSet()+"px,0); transform:translate3d(0,-"+t.offSet()+"px,0);"},translateClosed:function(){return"-webkit-transform:translate3d(0,0,0); -moz-transform:translate3d(0,0,0); transform:translate3d(0,0,0);"},removeAnimations:function(n){var r=t.menuState==="open"?t.translateOpen():t.translateClosed();setTimeout(function(){e("#anatomy_slider").attr("style",r)},n*1e3)},openMenu:function(e){t.menuState="open";t.showMenu(e);t.removeAnimations(e)},closeMenu:function(e){t.menuState="closed";t.hideMenu(e);t.removeAnimations(e)},triggerMenu:function(){t.menuState==="open"?t.closeMenu(t.speed):t.openMenu(t.speed)},flipCard:function(t){var n=e(t).closest(".card");n.toggleClass("flipped")},isMenuTrigger:function(t){var n=e(".menu-btn, #all-cards");return t.closest(n).length?!0:!1},isFlipTrigger:function(e){return e.closest(".card-body").length?!0:!1},initiateClickListeners:function(){e("body").on("click",function(n){var r=e(n.target);if(t.isMenuTrigger(r)){n.preventDefault();t.triggerMenu(.5)}else if(t.isFlipTrigger(r)){n.preventDefault();t.menuState==="closed"?t.flipCard(r):t.closeMenu(.5)}})},initiateTouchListeners:function(){var n,r,i,s,o,u,a,f=t.offSet()*.5,l=t.speed*.5;e(".menu-btn").on("touchstart",function(e){n=event.touches[0];r=n.pageY;i=r;e.preventDefault()});e(".menu-btn").on("touchmove",function(u){n=event.touches[0];i=n.pageY;s=i-r;var f;if(s>0){o=s;a="translate3d(0,-"+(t.offSet()-o)+"px,0)"}else{o=s*-1;a="translate3d(0,-"+o+"px,0)"}if(i<t.offSet()&&s>0&&t.menuState==="open"){f="-webkit-transform:"+a+"; -moz-transform:"+a+"; ransform:"+a+";";e("#anatomy_slider").attr("style",f)}else if(s<0&&i>t.vpHeight()-t.offSet()&&t.menuState==="closed"){f="-webkit-transform:"+a+"; -moz-transform:"+a+"; ransform:"+a+";";e("#anatomy_slider").attr("style",f)}u.preventDefault()});e(".menu-btn").on("touchend",function(){u=i;u===r&&t.menuState==="closed"?t.openMenu(t.speed):u===r&&t.menuState==="open"?t.closeMenu(t.speed):i<f?t.openMenu(l):t.closeMenu(l)})},init:function(){t.setAppStyles();t.initiateResizeListener();t.initiateClickListeners();t.initiateTouchListeners();setTimeout(function(){t.openMenu(.5)},300)}};return{on:t.init,trigger:t.triggerMenu,open:t.openMenu,close:t.closeMenu}}})(jQuery);