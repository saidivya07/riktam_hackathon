<?php
session_start();
include("includes/connection.php");
include("functions/functions.php");
?>
<!--DOCTYPE HTML-->
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
				<form method="get" action="results.php" id="form1">
					<input type="text" name="user_query" placeholder="Search a topic"/>
					<input type="submit" name="search" value="Search"/>
				</form>

			</div>
			<!-- header ends-->
		</div>
		<!-- header wrapper ends--> 
		   <!--Content Area Starts-->
		    <div class="content">
				<!--user timeline starta-->
		    	<div id="user_timeline">
					<div id="user_details">
						<?php
						$user=$_SESSION['user_email'];
						$get_user="select * from users where user_email='$user'";
						$run_user=mysqli_query($con,$get_user);
						$row=mysqli_fetch_array($run_user);
						$user_id=$row['user_id'];
						$user_name=$row['user_name'];
						$user_country=$row['user_country'];
						$user_image=$row['user_image'];
						$user_reg_date=$row['user_reg_date'];
						$last_login=$row['user_last_login'];
						$user_posts="select * from posts where user_id='$user_id'";
						$run_posts=mysqli_query($con,$user_posts);
						$posts=mysqli_num_rows($run_posts);
						//getting number of unread messages
						$sel_msg="select * from messages where receiver='$user_id' AND status='unread' ORDER by 1 DESC";
						$run_msg=mysqli_query($con,$sel_msg);
						$count_msg=mysqli_num_rows($run_msg);
						echo "
						<center>
						<img src='users/$user_image' width='200' height='200'/>
						</center>
						<div id='user_mention'>
						<p><strong>Name:</strong> $user_name</p>
						<p><strong>Country:</strong> $user_country</p>
						<p><strong>LastLogin:</strong>$last_login</p>
						<p><strong>Membersince:</strong> $user_reg_date</p>
						<p><a href='my_messages.php?u_id=$user_id'>Messages($count_msg)</a></p>
						<p><a href='my_posts.php?u_id=$user_id'>My Posts ($posts)</a></p>
						<p><a href='edit_profile.php?user_id'$user_id'>Edit My Account</a></p>
						<p><a href='logout.php'>Logout</a></p>";
						?>
					</div>
				</div>
				</div>
			
		    	<!-- user timeline ends here>
		    	<!-- content timeline starts here-->
		    	<div id="content_timeline">
		    		<?php
		    		if(isset($_GET['post_id']))
		    		{
		    			$get_id= $_GET['post_id'];
		    			$get_post="select * from posts where post_id='$get_id'";
		    			$run_post=mysqli_query($con,$get_post);
		    			$row=mysqli_fetch_array($run_post);
		    			$post_title=$row['post_title'];
		    			$post_con=$row['post_content'];
		    		}
		    		?>
		    		<form action="" method="post" id="f">
		    			<h2>Edit your post</h2>
		    			<input type='text' name='title' value="<?php echo $post_title;?>" size="82" required="required"/><br/>

		    			<textarea cols="83" rows="4" name="content"><?php echo $post_con;?></textarea><br/>
		    			<select name="topic">
		    				<option>Select Topic</option>
		    				<?php getTopics();?>
		    			</select>
		    			<input type="submit" name="update" value="Update Post"/>
		    		</form>

		    		<?php
		    		if(isset($_POST['update'])){
		    			$title=$_POST['title'];
		    			$content=$_POST['content'];
		    			$topic=$_POST['topic'];

		    			$update_post = "update posts set post_title='$title', post_content='$content',topic_id='$topic' where post_id='$get_id'";
		    			$run_update = mysqli_query($con,$update_post);
		    			if($run_update){
		    				echo "<scripts>alert('A post has updated!')</script>";
		echo "<scripts>window.open('home.php','_self')</script>";
		    			}
		    		}
		   ?>
		    	</div>
		    	<!-- content timeline ends here-->
			<!--Content area ends-->
		</div>
		<!--Container Ends-->				
</body>
</html>