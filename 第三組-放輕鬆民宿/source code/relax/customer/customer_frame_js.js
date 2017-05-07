//back to top
$(function () {
	$("body").append("<img id='goTopButton' style='width: 71px; height: 71px; display: none; z-index: 5; cursor: pointer;' title='回到頂端'/>");
	var img = "customer_picture/back.png";		//圖片路徑
	var locatioin = 0.85;			// 按鈕出現在螢幕的高度
	var right = 12;					// 距離右邊 px 值
	var opacity = 0.3;				// 透明度
	var speed = 1600;				// 捲動速度
	var $button = $("#goTopButton");
	var $body = $(document);
	var $win = $(window);
	
	$button.attr("src", img);
	$button.on({
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
//prototype login
function login() {
	var username = "relax";
	var pwd = "relax";
	var inputUsername = document.getElementById("username").value;
	var inputPwd = document.getElementById("pwd").value;
	if(inputUsername == username && inputPwd == pwd) window.location.assign("boss_homepage.html");
	else {
		document.getElementById("loginFail").innerHTML = "帳號密碼輸入錯誤";
		document.getElementById("loginFail").setAttribute("class", "center-block");
	}
}
