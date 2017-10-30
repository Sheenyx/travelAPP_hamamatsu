

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
			<li id="tab1" class="select">オススメ</li>
			<li id="tab2">観光</li>
			<li id="tab3">グルメ</li>
			<li id="tab4">買い物</li>
		</ul></nav>

		<div class="main ja">
			<form action="detailcheck.php" method="post">
				<?php
				require('deletecheck.php');

				require('api_login.php');

			  echo'<div class="area_main Shopping hide">
				<h2>ホテルと自由時間を決めよう</h2>
				<nav><ul class="area_list">';



				//泊まっているホテルを選び、自由時間を決める

				$Hotellabel = $client->makeLabel('Hotel');
				$Hotelnodes = $Hotellabel->getNodes();
				foreach ($Hotelnodes as $Hotelnode) {
				$spot4[]=$Hotelnode->getProperty('name');
				}
				foreach($spot4 as $Hotelplace){
					echo'<input type="radio" name="spot4[]" value="' .$Hotelplace. '"　>';
					echo'' .$Hotelplace. '';
					echo'<select name=', $Hotelplace ,'>';
					echo'<option value="a">無制限</option>';
					echo'<option value="b">1時間</option>';
					echo'<option value="c">2時間</option>';
					echo'<option value="d">3時間</option>';
					echo'<option value="e">4時間</option>';
					echo'<option value="f">5時間</option>';
					echo'<option value="g">6時間</option>';
					echo'</select>';
					echo nl2br("\n");
				}
				echo'</ul></nav></div>';

				//観光資源をデータベースから取り出す
				echo'<div class="area_main travel hide">
					<h2>浜松で観光する</h2>
					<nav><ul class="area_list">';
				$Travelinglabel = $client->makeLabel('Traveling');
				$Travelingnodes = $Travelinglabel->getNodes();
				foreach ($Travelingnodes as $node) {
				$spot1[]=$node->getProperty('name');
				}

				foreach($spot1 as $Travelingplace){
					echo'<input type="checkbox" name="spot1[]" value="', $Travelingplace, '">';
					echo $Travelingplace;
					echo'<select name=', $Travelingplace ,'>';
					echo'<option value="a">大変興味ある</option>';
					echo'<option value="b">興味ある</option>';
					echo'<option value="c">少し興味ある</option>';
					echo'</select>';
					echo('<a href="spot.php?name=' . $Travelingplace .' ">
					' . $Travelingplace . 'の関連スポット<a>');
					echo nl2br("\n");
				}
				echo'</ul></nav></div>';




				//グルメ資源をデータベースから取り出す
				echo'<div class="area_main Gourmet hide">
					<h2>浜松グルメを食べる</h2>
					<nav><ul class="area_list">';
			$Gourmetlabel = $client->makeLabel('Gourmet');
			$Gourmetnodes = $Gourmetlabel->getNodes();
			foreach ($Gourmetnodes as $Gourmetnode) {
			$spot2[]=$Gourmetnode->getProperty('name');
			}
			foreach($spot2 as $Gourmetplace){
				echo'<input type="checkbox" name="spot2[]" value="', $Gourmetplace, '">';
				echo $Gourmetplace;
				echo'<select name=', $Gourmetplace ,'>';
				echo'<option value="a">大変興味ある</option>';
				echo'<option value="b">興味ある</option>';
				echo'<option value="c">少し興味ある</option>';
				echo'</select>';
				echo('<a href="spot.php?name=' . $Gourmetplace .' ">
				' . $Gourmetplace . 'の関連スポット<a>');
				echo nl2br("\n");
			}
		echo'</ul></nav></div>';

			//買い物資源をデータベースから取り出す
			echo'<div class="area_main Shopping hide">
				<h2>浜松で買い物する</h2>
				<nav><ul class="area_list">';
		$Shoppinglabel = $client->makeLabel('Shopping');
		$Shoppingnodes = $Shoppinglabel->getNodes();
		foreach ($Shoppingnodes as $Shoppingnode) {
		$spot3[]=$Shoppingnode->getProperty('name');
		}
		foreach($spot3 as $Shoppingplace){
			echo'<input type="checkbox" name="spot3[]" value="', $Shoppingplace, '">';
			echo $Shoppingplace;
			echo'<select name=', $Shoppingplace ,'>';
			echo'<option value="a">大変興味ある</option>';
			echo'<option value="b">興味ある</option>';
			echo'<option value="c">少し興味ある</option>';
			echo'</select>';
			echo('<a href="spot.php?name=' . $Shoppingplace .' ">
			' . $Shoppingplace . 'の関連スポット<a>');
			echo nl2br("\n");
		}
		echo'</ul></nav></div>';



echo '<p><input type="submit" value="確定"></p>';

?>



<?php
/*

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


*/
?>





	<nav><div id="page-top"><ul class="clearfix">
		<li id="goback"><a href="jp3.php"><i class="fa fa-back"></i> 再予測</a></li>
		<li id="gohome"><a href="../top.php"><i class="fa fa-home"></i> HOME</a></li>
	</ul></div></nav>




</body>
</html>
