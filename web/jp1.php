

<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, inimum-scale=0.5,user-scalable=yes,initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<title>観光アプリ</title>
<script type="text/javascript" src="../import.js"></script>
</head>

<body>


<div class="container">


	<header><div class="header ja" id="top">
		<h1><title="観光アプリ">観光アプリ</a></h1>

	</div></header>



	<section><div class="main ja">
		<nav><ul class="area_tab">
			<li id="tab1" class="select">観光</li>
			<li id="tab2">グルメ</li>
			<li id="tab3">買い物</li>
			<li id="tab4">オススメ</li>
		</ul></nav><!--area_tab-->
		<div class="area_main susukino">
			<h2>浜松で観光する</h2>
			<nav><ul class="area_list">

			</ul></nav>
		</div>
		<div class="area_main dohri hide">
			<h2>浜松グルメを食べる</h2>
			<nav><ul class="area_list">
				<p>
	徳川家康：
	<input type="radio" id="3" name="tokugawa" value="3" />
	<label for="3">高関心</label>
	<input type="radio" id="2" name="tokugawa" value="2" />
	<label for="2">中関心</label>
	<input type="radio" id="1" name="tokugawa" value="1" />
	<label for="1">低関心</label>
	<input type="radio" id="0" name="tokugawa" value="0" />
	<label for="0">無関心</label>
</p>
<button type="button" id="btn">クリック</button>

			</ul></nav>
		</div><!--dohri-->
		<div class="area_main satsueki hide">
			<h2>浜松でショッピング</h2>
			<nav><ul class="area_list">
				<?php
				require('api_login.php');


				$label = $client->makeLabel('Shopping');
				$nodes = $label->getNodes();
				foreach ($nodes as $node) {


						$spot=$node->getProperty('name');
					echo ('<form name="jp" action="./recommend.php" method="POST">');
					echo ('名称 : ' . $node->getProperty('name').'<input type="radio" value="' . $spot . '" name="radio' . $spot . '" id="radio3">
					<label for="radioA">高関心</label>
					<input type="radio" value="' . $spot . '" name="radio' . $spot . '" id="radio2">
					<label for="radioB">中関心</label>
					<input type="radio" value="' . $spot . '" name="radio' . $spot . '" id="radio1">
					<label for="radioC">低関心</label>
					<input type="radio" value="' . $spot . '" name="radio' . $spot . '" id="radio0">
					<label for="radioD">無関心</label>
					<input type="submit"><a href="spot.php?name=' . $spot .' ">' . $spot . 'の関連スポット<a><br>');
				}
				  echo ('<input type="submit" name="Submit" value="送信">');
				?>
			</ul></nav>
		</div><!--satsueki-->
		<div class="area_main etc hide">
			<h2>オススメのスポットを予測</h2>
			<nav><ul class="area_list">
				<a>ホテルを選ぼう!<a><br>
				<?php
				echo($_COOKIE["PHPSESSID"]."<br/>\n");
				require('api_login.php');
				$label = $client->makeLabel('Hotel');
				$nodes = $label->getNodes();
				$Hotel=$node->getProperty('name');

				foreach ($nodes as $node) {
					echo ('名称 : ' . $node->getProperty('name').'<input type="radio" name="radio' . $Hotel . '" id="radioA">
					<label for="radioA">ここにいる</label>
					<input type="submit"><br>');

				}
			?>


					<a>
			</ul></nav>
		</div><!--etc-->



	</div></section><!--main en-->


	<nav><div id="page-top"><ul class="clearfix">
		<li id="goback"><a href="javascript:history.back()"><i class="fa fa-undo" aria-hidden="true"></i> BACK</a></li>
		<li id="gohome"><a href="../top.php"><i class="fa fa-home"></i> HOME</a></li>
	</ul></div></nav>
	<?php
	require('api_login.php');
	// STARTノード作成
	$startNode = $client->makeNode();
	$startNode->setProperty('name', 'start node')
	    ->setProperty('created', '2015-08')
	    ->save();
	$startLabel = $client->makeLabel('START');
	$startNode->addLabels([$startLabel]);
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




</body>
</html>
