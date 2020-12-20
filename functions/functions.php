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
?>