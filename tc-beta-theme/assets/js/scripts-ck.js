$(document).ready(function(){var e=$(window).height(),t=e<600?e*.85:e*.9,n=function(){var e="#anatomy_slider.inactive { -webkit-transform:translate3d(0,-"+t+"px,0); -moz-transform:translate3d(0,-"+t+"px,0)}",n=document.getElementsByTagName("head")[0],r=document.createElement("style");r.type="text/css";r.styleSheet?r.styleSheet.cssText=e:r.appendChild(document.createTextNode(e));n.appendChild(r)},r=function(){$(".main").height(e);n()},i=function(){var e=$(window).height(),t=(e-300)*.5;e>300?$(".character").css("margin-top",t):$(".character").css("margin-top",0)};r();i();$(window).resize(function(){e=$(window).height();t=e<600?e*.85:e*.9;r();i()});$(".card-body").on("click",function(){var e=$(this).closest(".card");if($("#anatomy_slider").hasClass("inactive"))$("#anatomy_slider").removeClass("inactive");else{e.toggleClass("flipped");e.find(".card-back").toggleClass("hidden visible")}});$(".instructions .dismiss").on("click",function(){$.cookie("dismissInstructions",1,{expires:365});$(".instructions").toggleClass("hidden")}).bind("tap",function(e){e.stopPropagation()});$(".terms-nav .dismiss").on("click",function(){$(".terms-nav").toggleClass("hidden")});$(".phone").mouseenter(function(){$(".card-nav").addClass("active")}).mouseleave(function(){$(".card-nav").removeClass("active")});var s,o,u,a,f,l,c,h=t*.5,p="translate3d(0,-"+t+"px,0)",d="translate3d(0,0,0)",v=500,m=v+"ms",g=v*.5+"ms",y=!0,b=$(".menu-btn, #all-cards, .shortcut");$("body").on("click",function(e){var t=$(e.target),n=t.closest(b).length;if(n){if(y===!0){$("#anatomy_slider").css("-webkit-transform",d).css("-webkit-transition",m).removeClass("inactive");y=!1}else{$("#anatomy_slider").css("-webkit-transform",p).css("-webkit-transition",m).addClass("inactive");y=!0}return!1}if($(e.toElement).parent(".tt-suggestion").length){$("#anatomy_slider").css("-webkit-transform",d).css("-webkit-transition",m).removeClass("inactive");y=!1}else $(".tt-dropdown-menu").removeClass("tt-is-open")});$(".search-terms").on("keypress",function(e){if(e.keyCode===13){$("#anatomy_slider").css("-webkit-transform",d).css("-webkit-transition",m).removeClass("inactive");y=!1}});$(".shortcut").on("click",function(){$(".terms-nav").addClass("hidden")});$(".menu-btn").on("touchstart",function(e){s=event.touches[0];o=s.pageY;u=o;e.preventDefault()});$(".menu-btn").on("touchmove",function(n){s=event.touches[0];u=s.pageY;a=u-o;if(a>0){f=a;c="translate3d(0,-"+(t-f)+"px,0)"}else{f=a*-1;c="translate3d(0,-"+f+"px,0)"}u<t&&a>0&&y===!0?$("#anatomy_slider").css("-webkit-transform",c):a<0&&u>e-t&&y===!1&&$("#anatomy_slider").css("-webkit-transform",c);n.preventDefault()});$(".menu-btn").on("touchend",function(){l=u;if(l===o&&y===!1){$("#anatomy_slider").css("-webkit-transform",p).css("-webkit-transition",m).addClass("inactive");y=!0}else if(l===o&&y===!0){$("#anatomy_slider").css("-webkit-transform",d).css("-webkit-transition",m).removeClass("inactive");y=!1}else if(u<h){$("#anatomy_slider").css("-webkit-transform",p).css("-webkit-transition",g).addClass("inactive");y=!0}else{$("#anatomy_slider").css("-webkit-transform",d).css("-webkit-transition",g).removeClass("inactive");y=!1}});$("#anatomy_slider").on("webkitTransitionEnd",function(){$(".touch #anatomy_slider").css("-webkit-transition","0")})});