

				<?php


				require('api_login.php');


				$Username=$_COOKIE["PHPSESSID"];
				$Travelinglabel = $client->makeLabel('Traveling');
				$Travelingnodes = $Travelinglabel->getNodes();
				foreach ($Travelingnodes as $Travelingnode) {
				$Travelingplace=$Travelingnode->getProperty('name');

					$cypherStatement =
					"MATCH (ho1:Traveling { name: '$Travelingplace' })<-[r:Like]-(us1:USER { name: '$Username' })"
					. "DELETE r";
					$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
					$resultSet = $cypherQuery->getResultSet();

				}

				$Gourmetlabel = $client->makeLabel('Gourmet');
				$Gourmetnodes = $Gourmetlabel->getNodes();
				foreach ($Gourmetnodes as $Gourmetnode) {
				$Gourmetplace=$Gourmetnode->getProperty('name');

					$cypherStatement =
					"MATCH (ho1:Gourmet { name: '$Gourmetplace' })<-[r:Like]-(us1:USER { name: '$Username' })"
					. "DELETE r";
					$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
					$resultSet = $cypherQuery->getResultSet();

				}


								$Shoppinglabel = $client->makeLabel('Shopping');
								$Shoppingnodes = $Shoppinglabel->getNodes();
								foreach ($Shoppingnodes as $Shoppingnode) {
								$Shoppingplace=$Shoppingnode->getProperty('name');

									$cypherStatement =
									"MATCH (ho1:Shopping { name: '$Shoppingplace' })<-[r:Like]-(us1:USER { name: '$Username' })"
									. "DELETE r";
									$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
									$resultSet = $cypherQuery->getResultSet();

								}

								$cypherStatement =
								"MATCH (pa)<-[d:belongsTo]-(us1:USER { name: '$Username' })"
								. "DELETE d";
								$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
								$resultSet = $cypherQuery->getResultSet();

								$cypherStatement =
								"MATCH (ho)<-[h:livedIn]-(us1:USER { name: '$Username' })"
								. "DELETE h";
								$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
								$resultSet = $cypherQuery->getResultSet();

								$cypherStatement =
								"MATCH (sp)<-[v:visited]-(us1:USER { name: '$Username' })"
								. "DELETE v";
								$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
								$resultSet = $cypherQuery->getResultSet();

?>
