<!DOCTYPE html>
<html>
<head>
<title>Civic Problems Finder!</title>
<link rel="stylesheet" href="styles/style.css" media="all"/>
</head>
<body>
<!--Container starts from here -->
<div class="container">
	<!-- Header wrapper starts here -->
	<div id="header_wrapper">
		<!-- Header starts here -->
		<div id="header">
			<img src="images/img2.jpg" style="float:left;"/>
			<form method="post" action="" id="form1">
				<strong>Email:</strong>
				<input type="email" name="email" placeholder="Email" required="required"/>
				<strong> Password:</strong>
				<input type="password" name="pass" placeholder="********" required="required"/>
				<button name="login">Login</button>
			</form>
		</div>
		<!-- Header ends here -->
	</div>
	<!-- Header wrapper ends here -->

	<div id="content"> <!-- Content Area Starts here -->
		<div>
			<h2 style="margin-left:40px"><i> Vow for a Change within the Community!</i></h2>
			<img src="images/img1.png" style="float:left; margin-left:40px"/>
		</div>
		<div id="form2">
			<form action="" method="post">
				<h2 style="margin-left:40px">Register Today...</h2>
			<sub style="margin-left:40px">Contribute towards the betterment of the community!</sub>
			<table style="margin-left:40px">
				<tr>
				<td align="right"><strong>Name</strong></td>
					<td><input type="text" name="u_name" required="required" placeholder="Enter your name"/></td>
					</tr>
					
					<tr>
					<td align="right"><strong>Email Id</strong></td>
					<td><input type="email" name="u_email" required="required" placeholder="Enter your Email"/></td>
					</tr>

					<tr>
					<td align="right"><strong>Password</strong></td>
					<td><input type="password" name="u_pass" required="required" placeholder="Create password"/></td>
					</tr>

					<tr>
					<td align="right"><strong>Country</strong></td>
					<td><input type="text" name="u_country" required="required" placeholder="Your Country Name"/></td>
					</tr>

					<tr>
					<td align="right"><strong>Gender</strong></td>
					<td><select name="u_gender">
						<option>Male</option>
						<option>Female</option>
						<option>Dont want to say</option>
					</select>
					</td>
					</tr>

					<tr>
					<td align="right"><strong>Birthday</strong></td>
					<td><input type="date" name="u_birthday" required="required"/></td>
					</tr>

					<tr>
						<td align="right">
							<button name="sign_up"> Sign Up</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>

<!--footer starts-->

<div id="footer">
	<h2>&copy; SAI DIVYA NALLAPANENI</h2>
</div>
<!-- Footer Ends-->
</div>
</body>
</html>
