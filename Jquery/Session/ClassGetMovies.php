<?php
				//session_start();
		
				class getMovies
				{
					protected $age;

					function __construct()
					{
						$this->age = $_SESSION['age'];
						//$this->age = "25";
					}

					function fetchDet()
					{
						$sql="";
				
				
						$con = mysql_connect("localhost","root","");
						if (!$con)
						{
						  die('Could not connect: ' . mysql_error());
						}

						mysql_select_db("joetest", $con);
						
						if($this->age<18)
							$sql="SELECT * FROM movies where category='K'";
						elseif($this->age>=18 && $this->age<21)
							$sql="SELECT * FROM movies where category='K' OR category='UA'";
						elseif($this->age>=21)
							$sql="SELECT * FROM movies";

						$result = mysql_query($sql);

						$num = mysql_num_rows($result);

						if($num > 0)
						{
							
							while($row = mysql_fetch_array($result))
							{
								
								echo "<BR>Name: ".$row['movieName'];
								echo "<BR>Category: ".$row['category'];
								echo "<BR>Rating: ".$row['Ratings'];
								echo "<br />";
							}
						}

						mysql_close($con);
					}
				}

				$getMovObj = new getMovies();
				$getMovObj->fetchDet();


				
	?>