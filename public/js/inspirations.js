$(document).ready(function(){$(".grid-inspi").masonry({itemSelector:".grid-item",horizontalOrder:!1});var e=$(".grid").data("zoomTitle");$(".grid-item.zoom-gallery a").append('<div class="zoom-loop"><img src="/images/Zoomicon.png" class="img-fluid" alt=""></div>'),$(".grid-item.zoom-gallery a").mouseover(function(){var e=$(this).find(".zoom-loop");e.hasClass("animated")||e.toggleClass("animated zoomInUp")}),$(".grid-item.zoom-gallery a").mouseout(function(){$(this).find(".zoom-loop").removeClass("animated zoomInUp")}),$(".zoom-gallery").magnificPopup({delegate:"a",type:"image",closeOnContentClick:!1,closeBtnInside:!1,mainClass:"mfp-with-zoom mfp-img-mobile",image:{verticalFit:!0,titleSrc:function(e){return"<p>"+e.el.attr("title")+"</p>"}},tLoading:"Chargement...",gallery:{enabled:!0},zoom:{enabled:!0,duration:300,easing:"ease-out",opener:function(e){return e.is(".item-block")?e:e.find(".item-block")}}}),$(".zoom-gallery").click(function(){$(".mfp-content").append('<div class="fill-zoom">'+e+"</div>"),$(".mfp-content").addClass("animated pulse")}),$("a.btn-gallery").on("click",function(i){i.preventDefault();var n,o=$(this).attr("href");$(o).magnificPopup({delegate:"a",removalDelay:500,type:"image",closeOnContentClick:!1,closeBtnInside:!1,mainClass:"mfp-with-zoom mfp-img-mobile animated bounceIn",image:{verticalFit:!0,titleSrc:function(e){return"<p>"+e.el.attr("title")+"</p>"}},tLoading:"Chargement...",gallery:{enabled:!0},callbacks:{open:function(){n=setInterval(function(){$.magnificPopup.instance.next()},5e3)},close:function(){clearInterval(n)},imageLoadComplete:function(){0==$(".fill-zoom").length&&($(".mfp-content").append('<div class="fill-zoom">'+e+"</div>"),$(".mfp-content").addClass("animated fadeIn"))},beforeOpen:function(){this.st.mainClass=this.st.el.attr("data-effect")}},midClick:!0}).magnificPopup("open")})}),$(window).load(function(){$(".loader-inspirations").fadeOut(1e3),$(".grid").fadeIn(1500),$(".grid").fadeTo(1e3,1)});