/* ユーザ名の入力 */
function clickNow(){
  var r3 = document.querySelector('#radio3');
  var r2 = document.querySelector('#radio2');
  var r1 = document.querySelector('#radio1');
  var r0 = document.querySelector('#radio0');
  var res="";
  if(r3.checked){
    res="value";
  if(r2.checked){
    res="value";
  }
  if(r1.checked){
    res="";
  }
  if(r0.checked){
    res="";
  }
  var msg=document.querySelector('#msg')
  msg.textContent=res;
}
