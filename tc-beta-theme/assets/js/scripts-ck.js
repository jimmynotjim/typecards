$(document).ready(function(){$(".ref-link").text(function(e,t){return t.length>32?t.substring(0,32)+"...":t});$("#slider li:nth-child(1), #slider li:nth-child(2)").addClass("on");$(".card-body").click(function(){$(this).parents(".card").toggleClass("flipped");$(this).parents(".card").children(".card-back").toggleClass("hidden visible")});$(".phone").mouseenter(function(){$(".card-nav").addClass("active")}).mouseleave(function(){$(".card-nav").removeClass("active")})});