/* アンカーがうまく動かないのの対策 */
window.onload = function() {
    setTimeout(function() {
        scrollTo(0, 1);
    }, 100);
    var p = location.hash;
    var q =  $(p).offset().top;
    var hashId = p.indexOf("#");
    if(0 == hashId){
        $('html,body').animate({ scrollTop: q }, 'slow');
        return false;
    }
}
