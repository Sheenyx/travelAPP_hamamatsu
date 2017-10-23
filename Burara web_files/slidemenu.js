$(function(){
var menu = $('#slide_menu'), // スライドインするメニューを指定
	menuBtn = $('#menubutton'), // トリガーとなるボタンを指定
	body = $(document.body), 	
    menuWidth = menu.outerWidth();	            

    menuBtn.on('click', function(){
	body.toggleClass('open');
        if(body.hasClass('open')){
			body.animate({'right' : menuWidth }, 300);
			menu.animate({'right' : 0 }, 300);
		} else {
			menu.animate({'right' : -menuWidth }, 300);
			body.animate({'right' : 0 }, 300);
		}		     
    });
});    
