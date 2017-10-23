/* ユーザ名の入力 */
function clickNow(){
  var input1 = document.querySelector('#input1');
  var value = input1.value;
  var username = document.querySelector('#username');
  username.textContent = "こんにちは、" + value + "さん!" ;
}
