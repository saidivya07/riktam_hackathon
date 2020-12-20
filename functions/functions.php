<?php
$con=mysqli_connect("localhost","root","","riktam_civicproblems") or die("Connection was not established");
//function for getting topics

function getTopics(){
	global $con;
	$get_topics="select * from topics";
	$run_topics=mysqli_query($con,$get_topics);
	while($row=mysqli_fetch_array($run_topics))
	{
		$topic_id = $row['topic_id'];
		$topic_name = $row['topic_name'];
	echo "<option value='$topic_id'> $topic_name </option>";
}

}

//function for inserting posts
function insertPost()
{
	if(isset($_POST['sub']))
	{
		global $con;
		global $user_id;
		$title = addslashes($_POST['title']);
		$content = addslashes($_POST['content']);
		$topic=$_POST['topic'];
		if($content=='' OR $title=='')
		{
			echo "<h2>please enter title and description</h2>";
		exit();
	    }
		else
		{

		$insert ="insert into posts
		(user_id,topic_id,post_title,post_content,post_date,post_image) values ('$user_id','$topic','$title','$content',NOW(),'default2.png')";

		$run = mysqli_query($con,$insert);

		if($run)
		{
			echo "<h3>Posted to Timeline Successfully!</h3>";

			$update="update users set posts='yes' where user_id='$user_id'";
			$run_update=mysqli_query($con,$update);
		}

	    }
    }
}


//function for displaying posts
function get_posts()
{
	global $con;
	$per_page=5;
	if(isset($GET['page']))
	{
		$page=$_GET['page'];
	}
	else
	{
		$page=1;
	}
	$start_from = ($page-1) * $per_page;
	$get_posts = "select * from posts ORDER by 1 DESC LIMIT $start_from, $per_page";
	$run_posts=mysqli_query($con,$get_posts);
	while($row_posts=mysqli_fetch_array($run_posts)){
		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$post_title = $row_posts['post_title'];
		$post_content = substr($row_posts['post_content'],0,150);
		$post_date = $row_posts['post_date'];

		//getting the user who has posted the thread
		$user = "select * from users where user_id='$user_id'";
		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];
		//now displaying all at once
		echo "<div id='posts'>
		<p><img src='users/$user_image' width='50' height='50'/></p>
		<h3><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
		<h3>$post_title</h3>
		<h4>$post_date</h4>
		<h5>$post_content</h5>
		<a href='single.php?post_id=$post_id' style='float:right;'><button>See Replies or Reply to This</button></a>
		</div><br/>";
	}
	include("pagination.php");
}


?>

