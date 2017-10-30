<?php
  session_start();
?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, inimum-scale=0.5,user-scalable=yes,initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<title>浜松市観光アプリ</title>

<script>
function clickNow(){
  var input1 = document.querySelector('#input1');
  var value = input1.value;
  var username = document.querySelector('#username');
  $a = username.textContent = value ;
}
</script>

</head>
<body>


	<header><div class="header ja" id="top">
		<h1><title="浜松市観光アプリ">浜松市観光アプリ</a></h1>
	</div></header>


	<section><div class="main ja">
		<h2>一晩の短い間でも<br>浜松を堪能しよう</h2>

		<nav>

			<ul id="areamenu">
        <li id="recommendation">あなたにぴったりのスポットを薦める!<?php echo('<a href="web/jp3.php#tab1">オススメ</a>');?>
      </li>
				<li id="travelling">観光地へ遊びに行こう!<?php echo('<a href="web/jp3.php#tab2">観光</a>');?>
      </li>
				<li id="eating">美味しいものを食べよう!<?php echo('<a href="web/jp3.php#tab3">グルメ</a>');?>
      </li>
				<li id="shopping">いっぱい買い物しよう!<?php echo('<a href="web/jp3.php#tab4">買い物</a>');?>

      </ul>
		</nav>
<h3 id="title">ユーザ名を入力してください</h3>



<?php
/*require('web/api_login.php');
// ユーザノード作成

$label = $client->makeLabel('USER');
$usernodes = $label->getNodes();

$newuserNode = $client->makeNode();
$newuserNode->setProperty('name', 'edf')
    ->save();
*/
?>



<?php
if (!isset($_SESSION['count'])){
  // STARTノード作成
    print('初回の訪問です。セッションを開始します。');
    $_SESSION['count']=1;



}else{
  $_SESSION['count']++;
    print('セッションは開始しています。<br>');
    print('セッションIDは '.$_COOKIE["PHPSESSID"].' です。');
    echo 'あなたのアクセス回数:' . $_SESSION['count'];
    if ($_SESSION['count']==2){require('web/api_login.php');
    $userNode = $client->makeNode();
    $userNode->setProperty('name', $_COOKIE["PHPSESSID"])
        ->save();
    $userLabel = $client->makeLabel('USER');
    $userNode->addLabels([$userLabel]);

    }
}

?>

<?php




/*
// ENDノード作成
$props = [
    'name' => 'end node',
    'created' => '2015-08'
];
$endNode = $client->makeNode($props)
    ->save();
$endLabel = $client->makeLabel('END');
$endNode->addLabels([$endLabel]);
// STARTノードとENDノードのリレーションシップ作成
$startNode->relateTo($endNode, 'HAS_RELATION')
    ->setProperty('created', '2015-08')
    ->save();
		*/
?>



</body>
</html>
