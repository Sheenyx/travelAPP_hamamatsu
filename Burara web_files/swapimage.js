$(function (){
    //定義
    var active="active",interval=6000;
    var index=0, timerId=null;
    var tabs=$(".thumbnail > ul > li"), content=$(".main_ph > p"), cap=$(".caption > li");
 
    tabs.each(function(){$(this).removeClass(active);});
    content.hide();
    cap.hide();
    tabs.eq(0).addClass(active);
    content.eq(0).show("fast");
    cap.eq(0).show("fast");
 
    //サムネイルクリック時
    tabs.click(function(){
        if($(this).hasClass("active")) return;
        if(timerId) clearInterval(timerId),timerId=null;
        change(tabs.index(this));
        setTimer();
        return false;
    });
 
    //タイマーセット
//    setTimer();
//    function setTimer(){
//        timerId=setTimeout(timeProcess,interval);
//        return false;
//    }
// 
//    function timeProcess(){
//        change((index+1)%tabs.length);
//        timerId=setTimeout(arguments.callee,interval);
//    }
 
    //サムネイルをクリックした時or指定時間がきた時の画像切り替え
    function change(t_index){
        tabs.eq(index).removeClass(active);
        tabs.eq(t_index).addClass(active);
        //fadeout
        setTimeout(function(){
            content.eq(index).stop(true, true).hide(),
            cap.eq(index).stop(true, true).hide()
        ;}, 300);
        //fadein
        setTimeout(function(){
            index=t_index;
            content.eq(index).show(),
            cap.eq(index).show()
        ;}, 400)
    }
});
