//back to top
$(function () {
	$('.tablesorter').tablesorter();
	$("body").append("<img id='gopButton' style='width: 71px; height: 71px; display: none; z-index: 5; cursor: pointer;' title='回到頂端'/>");
	var img = "host_picture/back.png";		//圖片路徑
	var locatioin = 0.85;			// 按鈕出現在螢幕的高度
	var right = 12;					// 距離右邊 px 值
	var opacity = 0.3;				// 透明度
	var speed = 1600;				// 捲動速度
	var $but = $("#gopButton");
	var $body = $(document);
	var $win = $(window);
	
	
	$but.attr("src", img);
	$but.on({
		mouseover: function() {$button.css("opacity", 1);},
		mouseout: function() {$button.css("opacity", opacity);},
		click: function() {$("html, body").animate({scrollTop: 0}, speed);}
	});
	window.goTopMove = function () {
		var scrollH = $body.scrollTop();
		var winH = $win.height();
		var css = {"top": winH * locatioin + "px", "position": "fixed", "right": right, "opacity": opacity};
		
		if(scrollH > 20) {
			$button.css(css);
			$button.fadeIn("slow");
		}
		else $button.fadeOut("slow");
		
	};
	$win.on({
		scroll: function() {goTopMove();},
		resize: function() {goTopMove();}
	});
});
$('.table-remove').click(function () {
  $(this).parents('tr').detach();
});
    

//login fail
$(function login() {
	for(var i=0; i<sessionStorage.length; i++) {
		if(sessionStorage.key(i) == "loginFail" && sessionStorage.getItem(sessionStorage.key(i)) == "yes") {
			document.getElementById("loginFail").innerHTML = "帳號密碼輸入錯誤";
			document.getElementById("loginFail").setAttribute("class", "center-block");
			sessionStorage.clear();
		}
	}
});