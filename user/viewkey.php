<?php
session_start(); //Start the session

if (!isset($_SESSION['name'])) {
        echo "Please Login";
		//$_SESSION['error'] = "Please Login First";
		echo "<script type=\"text/javascript\">"." alert('Please Login'); " ."</script>";
		} if (!$_SESSION['name']){
		      echo  header("Location: http://localhost/data-leakage-detection/userlogin.php");
		}

		
		else{
		
		define('ADMIN',$_SESSION['name']); //Get the user name from the previously registered super global variable
		//if(!session_is_registered("admin")){ //If session not registered
//header("location:login.php"); // Redirect to login.php page
//}
//else //Continue to current page
header( 'Content-Type: text/html; charset=utf-8' );
//include'includes/conn.php';
 }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Data Leakage Detection</title>
	<meta charset="utf-8" />
	
	<link rel="stylesheet" href="stylesheet.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body class="body">
	
	<header class="mainHeader">
		<nav><ul>
			
			<li ><a href="https://cse3501project.herokuapp.com/user/user.php">Home</a></li>
			<li><a href="https://cse3501project.herokuapp.com/user/viewmsg.php">View msg</a></li>
			<li><a href="https://cse3501project.herokuapp.com/user/viewfile.php">View Article</a></li>
			<li class="active"><a href="https://cse3501project.herokuapp.com/user/viewkey.php">View key</a></li>
			
	</ul></nav>
	</header>
		
	<div class="mainContent1">
		<div class="content">	
				<article class="topcontent1">	
					<header>
						<h2><a href="#" rel="bookmark" title="Permalink to this POST TITLE"> View Keys</a></h2>
					</header>
					<table align="center" cellpadding="9" cellspacing="2" width="10" >
							<tr bgcolor="green"><td>KeySender</td><td>filename</td><td>Keys</td></tr>
		
					<?PHP
				
				include 'config.php';
				//$con = mysqli_connect("sql6.freemysqlhosting.net","sql6453269","13gSHbLs1b");
                                if (!$con)
                                    echo('Could not connect: ' . mysqli_error());
                                else
                                {
                                    //mysqli_select_db( $con,"sql6453269");
									


$qry="Select * FROM askkey where user='$_SESSION[name]'";
	$result=mysqli_query($con,$qry);
while($w1=mysqli_fetch_array($result))
{
	echo'			<tr bgcolor="white">
	
	<td>'.$w1["reciver"].'    </td><td>     '.$w1["filename"].'	
					</td><td>'.$w1["k"].'

	</td>
</tr>


	
	
	';
		
}
								}

?>
					
					
     




						</p>
	
					
				</article>

</table>

				</div>
<aside class="top-sidebar">
					<article>
					<h2>Welcome: <?php echo $_SESSION['name']/*Echo the username */ ?></h2>
					<li><a href="https://cse3501project.herokuapp.com/user/logout.php">Logout</a></li>
					
					<p></p>
				    </article>
				</aside>	
		</div>
			
				
	</div>
	
	<footer class="mainFooter">
		<p>CSE3501 Project</p>
	</footer>

</body>
</html>
