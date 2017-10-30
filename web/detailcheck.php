

<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, inimum-scale=0.5,user-scalable=yes,initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<title>観光アプリ</title>
</head>



<body>
				<?php

				require('deletecheck.php');
				require('api_login.php');

				$TravelingNum=0;
				$GourmetNum=0;
				$ShoppingNum=0;

				$Username=$_COOKIE["PHPSESSID"];
				if (isset($_REQUEST['spot1'])){
				foreach($_REQUEST['spot1'] as $Travelingplace){
				switch ($_REQUEST["$Travelingplace"]){
					case 'a':
					$TravelingNum=$TravelingNum+3;
					$cypherStatement =
					"MATCH (ho1:Traveling { name: '$Travelingplace' })"
					. "MATCH (us1:USER { name: '$Username' })"
					. "CREATE (us1)-[:Like{weight:3}]->(ho1)";
					$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
					$resultSet = $cypherQuery->getResultSet();
					echo "'$Travelingplace'に大変興味ある<br>";
					break;
				case 'b':
				$TravelingNum=$TravelingNum+2;
				$cypherStatement =
				"MATCH (ho1:Traveling { name: '$Travelingplace' })"
				. "MATCH (us1:USER { name: '$Username' })"
				. "CREATE (us1)-[:Like{weight:2}]->(ho1)";
				$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
				$resultSet = $cypherQuery->getResultSet();
				echo "'$Travelingplace'に興味ある<br>";
				break;
			case 'c':
			$TravelingNum=$TravelingNum+1;
			$cypherStatement =
			"MATCH (ho1:Traveling { name: '$Travelingplace' })"
			. "MATCH (us1:USER { name: '$Username' })"
			. "CREATE (us1)-[:Like{weight:1}]->(ho1)";
			$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
			$resultSet = $cypherQuery->getResultSet();
			echo "'$Travelingplace'に少し興味ある<br>";
			break;

		}
	}
}else{}

				if (isset($_REQUEST['spot2'])){
	foreach($_REQUEST['spot2'] as $Gourmetplace){
	switch ($_REQUEST["$Gourmetplace"]){
	case 'a':
	$GourmetNum=$GourmetNum+3;
	$cypherStatement =
	"MATCH (ho1:Gourmet { name: '$Gourmetplace' })"
	. "MATCH (us1:USER { name: '$Username' })"
	. "CREATE (us1)-[:Like{weight:3}]->(ho1)";
	$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
	$resultSet = $cypherQuery->getResultSet();
	echo "'$Gourmetplace'に大変興味ある<br>";
	break;
	case 'b':
	$GourmetNum=$GourmetNum+2;
	$cypherStatement =
	"MATCH (ho1:Gourmet { name: '$Gourmetplace' })"
	. "MATCH (us1:USER { name: '$Username' })"
	. "CREATE (us1)-[:Like{weight:2}]->(ho1)";
	$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
	$resultSet = $cypherQuery->getResultSet();
	echo "'$Gourmetplace'に興味ある<br>";
	break;
	case 'c':
	$GourmetNum=$GourmetNum+1;
	$cypherStatement =
	"MATCH (ho1:Gourmet { name: '$Gourmetplace' })"
	. "MATCH (us1:USER { name: '$Username' })"
	. "CREATE (us1)-[:Like{weight:1}]->(ho1)";
	$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
	$resultSet = $cypherQuery->getResultSet();
	echo "'$Gourmetplace'に少し興味ある<br>";
	break;

	}
	}
}else{}

					if (isset($_REQUEST['spot3'])){
	foreach($_REQUEST['spot3'] as $Shoppingplace){
	switch ($_REQUEST["$Shoppingplace"]){
	case 'a':
	$ShoppingNum=$ShoppingNum+3;
	$cypherStatement =
	"MATCH (ho1:Shopping { name: '$Shoppingplace' })"
	. "MATCH (us1:USER { name: '$Username' })"
	. "CREATE (us1)-[:Like{weight:3}]->(ho1)";
	$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
	$resultSet = $cypherQuery->getResultSet();
	echo "'$Shoppingplace'に大変興味ある<br>";
	break;
	case 'b':
	$ShoppingNum=$ShoppingNum+2;
	$cypherStatement =
	"MATCH (ho1:Shopping { name: '$Shoppingplace' })"
	. "MATCH (us1:USER { name: '$Username' })"
	. "CREATE (us1)-[:Like{weight:2}]->(ho1)";
	$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
	$resultSet = $cypherQuery->getResultSet();
	echo "'$Shoppingplace'に興味ある<br>";
	break;
	case 'c':
	$ShoppingNum=$ShoppingNum+1;
	$cypherStatement =
	"MATCH (ho1:Shopping { name: '$Shoppingplace' })"
	. "MATCH (us1:USER { name: '$Username' })"
	. "CREATE (us1)-[:Like{weight:1}]->(ho1)";
	$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
	$resultSet = $cypherQuery->getResultSet();
	echo "'$Shoppingplace'に少し興味ある<br>";
	break;

	}
	}
}else{}

	echo nl2br("\n");
	echo "あなたが観光に対する関心度は'$TravelingNum'<br>";
	echo "あなたがグルメに対する関心度は'$GourmetNum'<br>";
	echo "あなたが買い物に対する関心度は'$ShoppingNum'<br>";
	echo nl2br("\n");

	if($TravelingNum>=$GourmetNum+$ShoppingNum){
		echo "あなたは高関心行動パターン(観光、グルメ)";
		$cypherStatement =
		"MATCH (pa1:Pattern { name: '高関心' })"
		. "MATCH (us1:USER { name: '$Username' })"
		. "CREATE (us1)-[:belongsTo]->(pa1)";
		$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
		$resultSet = $cypherQuery->getResultSet();
	}
	elseif($GourmetNum>=$TravelingNum+$ShoppingNum){
		echo "あなたは低関心行動パターン(グルメ、買い物)";
		$cypherStatement =
		"MATCH (pa1:Pattern { name: '低関心' })"
		. "MATCH (us1:USER { name: '$Username' })"
		. "CREATE (us1)-[:belongsTo]->(pa1)";
		$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
		$resultSet = $cypherQuery->getResultSet();
	}

	elseif($ShoppingNum>=$TravelingNum+$GourmetNum){
		echo "あなたは無関心行動パターン(買い物)";
		$cypherStatement =
		"MATCH (pa1:Pattern { name: '無関心' })"
		. "MATCH (us1:USER { name: '$Username' })"
		. "CREATE (us1)-[:belongsTo]->(pa1)";
		$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
		$resultSet = $cypherQuery->getResultSet();

	}
	else{
		echo "あなたはその他行動パターン(観光、グルメ、買い物)";
		$cypherStatement =
		"MATCH (pa1:Pattern { name: 'その他' })"
		. "MATCH (us1:USER { name: '$Username' })"
		. "CREATE (us1)-[:belongsTo]->(pa1)";
		$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
		$resultSet = $cypherQuery->getResultSet();
	}


if (isset($_REQUEST['spot4'])){
	foreach($_REQUEST['spot4'] as $Hotelplace){
		$cypherStatement =
		"MATCH (ho1:Hotel { name: '$Hotelplace' })"
		. "MATCH (us1:USER { name: '$Username' })"
		. "CREATE (us1)-[:livedIn]->(ho1)";
		$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
		$resultSet = $cypherQuery->getResultSet();
	switch ($_REQUEST["$Hotelplace"]){
	case 'a':
	$time=5000;
	echo nl2br("\n");
	echo "あなたの自由時間制限なし";
	break;
	case 'b':
	$time=60;
	echo nl2br("\n");
	echo "あなたの自由時間は'$time'分<br>";
	break;
	case 'c':
	$time=120;
	echo nl2br("\n");
	echo "あなたの自由時間は'$time'分<br>";
	break;
	case 'd':
	$time=180;
	echo nl2br("\n");
	echo "あなたの自由時間は'$time'分<br>";
	break;
	case 'e':
	$time=240;
	echo nl2br("\n");
	echo "あなたの自由時間は'$time'分<br>";
	break;
	case 'f':
	$time=300;
	echo nl2br("\n");
	echo "あなたの自由時間は'$time'分<br>";
	break;
	case 'g':
	$time=360;
	echo nl2br("\n");
	echo "あなたの自由時間は'$time'分<br>";
	break;

	}
	}
	}



echo '<h1><a>あなたにぴったりのスポット</a></h1>';
if (isset($_REQUEST['spot4'])){
	foreach($_REQUEST['spot4'] as $Hotelplace){
  $_REQUEST['spot4']=$Hotelplace;
	$cypherStatement =
	"MATCH (us1:USER { name: '$Username' })-[:Like]->(d)<-[:canfind]-(共通スポット)-[:belongsTo]->(e)<-[:contains]-(f)<-[:belongsTo]-(us1:USER { name: '$Username' }) "
	. "MATCH (us2:USER { name: '$Username' })-[:livedIn]->(ho1:Hotel { name: '$Hotelplace' })-[r:DISTANCE]->(共通スポット) "
	. "WHERE r.walk*2+共通スポット.timecost<=$time OR r.bus*2+共通スポット.timecost<=$time "
	. "RETURN 共通スポット ";
}
	$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
	$resultSet = $cypherQuery->getResultSet();

	echo'<form action="SecondRecommend.php" method="post">';
	foreach ($resultSet as $node) {
		$FirstRecommends=$node['共通スポット']->getProperty('name');
		/*$allFirstRecommends=$FirstRecommends;
		$uniqueFirstRecommends = array_unique($allFirstRecommends);
		if (count($uniqueFirstRecommends) === count($allFirstRecommends)) {*/
		echo'スポット名：'. $FirstRecommends.'';
		echo'<input type="radio" name="FirstRecommends" value="' .$FirstRecommends. '"　>';
		echo'ここに行った';
		echo nl2br("\n");
	}
/*else{count($allFirstRecommends)=count($allFirstRecommends)-1;}
		}*/
		echo '<p><input type="submit" value="確定"></p>';
		echo'</form>';
}
else{
	echo('<h2><a href="jp3.php#tab1">あなたが泊まっているホテルを選んでください！</a><h2>');
}

?>
<nav><div id="page-top"><ul class="clearfix">
	<li id="goback"><a href="jp3.php"><i class="fa fa-back"></i> 再予測</a></li>
	<li id="gohome"><a href="../top.php"><i class="fa fa-home"></i> HOME</a></li>
</ul></div></nav>




</body>
</html>
