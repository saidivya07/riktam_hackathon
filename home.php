<!--DOCTYPE HTML-->
<?php
include("includes/connection.php");
?>
<html>
<head>
	<title>Welcome User</title>
	<link rel="stylesheet" href="styles/home_style.css" media="all"/>
</head>
<body>
	<!--Container Starts -->
	<div class="container">
		<!--Header Wrapper Starts-->
		<div id="head_wrap">
			<!--Header Starts-->
			<div id="header">
				<ul id="menu">
					<li><a href="home.php">Home</a></li>
					<li><a href="members.php">Members</a></li>
					<strong>Topics</strong>
					<?php
					$get_topics="select * from topics";
					$run_topics=mysqli_query($con,$get_topics);
					while($row=mysqli_fetch_array($run_topics)){
						$topic_id=$row['topic_id'];
						$topic_name=$row['topic_name'];
						echo "<li><a href='topic.php?topic=$topic_id'>$topic_name</a></li>";
					}
					?>
				</ul>

			</div>
			<!-- header ends-->
		</div>
		<!-- header wrapper ends--> 
		   <!--Content Area Starts-->
		   <div class="content">
				<!--user timeline starta-->
				<div id="user_timeline">



				</div>
				<!-- Content Timeline endss-->
			</div>
			<!--Content area ends-->
		
		</div>
		<!--Container Ends-->
					
	</body>