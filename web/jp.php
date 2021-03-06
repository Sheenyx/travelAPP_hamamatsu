

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




	<header><div class="header ja" id="top">
		<h1><title="観光アプリ">観光アプリ</a></h1>

	</div></header>



	<section>


		<div class="main ja">
		<nav><ul class="area_tab">
			<li id="tab1" class="select">観光</li>
			<li id="tab2">グルメ</li>
			<li id="tab3">買い物</li>
			<li id="tab4">オススメ</li>
		</ul></nav><!--area_tab-->
		<div class="area_main susukino">
			<h2>浜松で観光する</h2>
			<nav><ul class="area_list">
				<?php
				require('api_login.php');
				$label = $client->makeLabel('Traveling');
				$nodes = $label->getNodes();
				foreach ($nodes as $node) {


						$spot=$node->getProperty('name');
					echo ($node->getProperty('name').'<input type="radio" name="radio' . $spot . '" id="radio3">
					<label for="radioA">高関心</label>
					<input type="radio" name="radio' . $spot . '" id="radio2">
					<label for="radioB">中関心</label>
					<input type="radio" name="radio' . $spot . '" id="radio1">
					<label for="radioC">低関心</label>
					<input type="radio" name="radio' . $spot . '" id="radio0">
					<label for="radioD">無関心</label><a href="spot.php?name=' . $spot .' ">
					' . $spot . 'の関連スポット<a><br>');

				}


				?>
			</ul></nav>
		</div>
		<div class="area_main dohri hide">
			<h2>浜松グルメを食べる</h2>
			<nav><ul class="area_list">
				<?php
				require('api_login.php');
				$label = $client->makeLabel('Gourmet');
				$nodes = $label->getNodes();
				foreach ($nodes as $node) {


						$spot=$node->getProperty('name');

					echo ('名称 : ' . $node->getProperty('name').'<input type="radio" name="' . $spot . '" value="3" id="radio3">
					<label for="radio3">高関心</label>
					<input type="radio" name="' . $spot . '" value="2" id="radio2">
					<label for="radio2">中関心</label>
					<input type="radio" "' . $spot . '" value="1" id="radio1">
					<label for="Radio1">低関心</label>
					<input type="radio" name="' . $spot . '" value="0" id="radio0">
					<label for="radio0">無関心</label>
					<a href="spot.php?name=' . $spot .' ">' . $spot . 'の関連スポット<a><br>');
				}
				?>

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
					<a href="spot.php?name=' . $spot .' ">' . $spot . 'の関連スポット<a><br>');
				}
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
				$Hotel2='ホテル';
       echo ('名称 : ' . $Hotel2);
				foreach ($nodes as $node) {
					echo ('名称 : ' . $node->getProperty('name'));

				}
			?>


					<a>
			</ul></nav>
		</div><!--etc-->



	</div>
	<span class="input-group-btn">
    <button class="btn btn-default search" type="submit"  value="detailsearch">検索</button>
  </span>
</form>
</section><!--main en-->


	<nav><div id="page-top"><ul class="clearfix">
		<li id="goback"><a href="javascript:history.back()"><i class="fa fa-undo" aria-hidden="true"></i> BACK</a></li>
		<li id="gohome"><a href="../top.php"><i class="fa fa-home"></i> HOME</a></li>
	</ul></div></nav>




</body>
</html>
