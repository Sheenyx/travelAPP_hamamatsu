

<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, inimum-scale=0.5,user-scalable=yes,initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<title>観光アプリ</title>
</head>



<body>




	<section>
      <form id="btn-all">
		<div class="main ja">
			<h2>浜松で観光する</h2>
			<form action="detailcheck.php" method="post">
				<?php
				require('api_login.php');
				$Travelinglabel = $client->makeLabel('Traveling');
				$Travelingnodes = $Travelinglabel->getNodes();
				foreach ($Travelingnodes as $node) {
				$spot=$node->getProperty('name');
				}



				echo ($node->getProperty('name').'<input type="radio" name="radio' . $spot . '" value="3" id="radio3">
					<label for="radio3">高関心</label>
					<input type="radio" name="radio' . $spot . '" value="2" id="radio2">
					<label for="radio2">中関心</label>
					<input type="radio" name="radio' . $spot . '" value="1" id="radio1">
					<label for="radio1">低関心</label>
					<input type="radio" name="radio' . $spot . '" value="0" id="radio0">
					<label for="radio0">無関心</label><a href="spot.php?name=' . $spot .' ">
					' . $spot . 'の関連スポット<a><br>');
				}

			echo("<h2>浜松グルメを食べる</h2>");

				$Gourmetlabel = $client->makeLabel('Gourmet');
				$Gourmetnodes = $Gourmetlabel->getNodes();
				foreach ($Gourmetnodes as $node) {
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



				$Shoppinglabel = $client->makeLabel('Shopping');
				$Shoppingnodes = $Shoppinglabel->getNodes();
				foreach ($Shoppingnodes as $node) {


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

				<button check="checkNow">検索</button>





	</div>

</form>
</section><!--main en-->


	<nav><div id="page-top"><ul class="clearfix">
		<li id="goback"><a href="javascript:history.back()"><i class="fa fa-undo" aria-hidden="true"></i> BACK</a></li>
		<li id="gohome"><a href="../top.php"><i class="fa fa-home"></i> HOME</a></li>
	</ul></div></nav>




</body>
</html>
