<?php 
$servername = "localhost";
$username = "root"; // default username for localhost is root
$password = ""; // default password for localhost is empty
$dbname = "student_login"; // database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

  $usererror = $first_name =  $password = $passerror = "";



if ($_SERVER['REQUEST_METHOD']=="POST"){    
    if (empty($_POST["name1"])){           
        $usererror="Name is Required";        
    } else {  
        if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) { 
        $usererror = "Digits are not allowed.";                          
        }
    }

    if(strlen($_POST["pass"]) <= 5){
        $passerror = "Password must be 5 characters long.";
    } 

    


    if($usererror == "" and $passerror == "" ){

      
      // if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit'])) {
		// get variables from the form
		$first_name = $_POST['name1'];
		// $last_name = $_POST['lastname'];
		
		$password = $_POST['pass'];
		

		//write sql query

		$sql = "SELECT * FROM Student_cred WHERE name1 = '$first_name' AND pass = '$password'";

		// execute the query

		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "New record created successfully.";
		}else{
			echo "Error:". $sql . "<br>". $conn->error;
		}

		$conn->close();

	}


    header(
        'Location:18mis7058_success.php'
    );

       
    }

}
?><!DOCTYPE html>
<html>
<head>
	<title>Student Faculty Interaction Outside The Classroom</title>
	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/84b8764c65.js"></script>
	<style type="text/css">
		body{
			background: url(home3.jpg);
			background-size: cover;
			background-position: center;
			font-family: lato;
		}
		#centering{
			text-align: center;
			padding-top: 20%;
			text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
                		 0px 8px 13px rgba(0,0,0,0.1),
                		 0px 18px 23px rgba(0,0,0,0.1);
		}
		#bag{
			background-color: rgba(37, 33, 33,0.9); 
			margin-left: 35%;
			margin-right: 35%;
			padding-top: 2%;
			padding-bottom: 5%;
			/*text-align: center;
			
			text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
                		 0px 8px 13px rgba(0,0,0,0.1),
                		 0px 18px 23px rgba(0,0,0,0.1);*/
		}
		#forml{
			color: white;
		}
		#name{
			color: black;
		}
		h1{
			font-weight: 700;
			font-size: 5em;
		}
		h1,h3{
			color: #aaaaaa;
		}
		hr{
			width:400px;
			border-top: 1px solid #f8f8f8;
			border-bottom:1px solid rgba(0,0,0,0.2);
		}
		html{
			height: 100%;
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
				<a href="#" class="navbar-brand fcolor">Student Faculty Interaction</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-nav-demo">
				<div class="nav navbar-nav ">
					<li >
						<a href="Student Faculty Interaction home.html">Home</a>
					</li>
					<li>
						<a href="About.html">About</a>
					</li>
					<li>
						<a href="Contact.html">Contact</a>
					</li>
				</div>

				<div class="nav navbar-nav navbar-right">
					
					<li class="active">
						<a href="#">Login<span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
					</li>
				</div>
			</div>
			
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div id="centering">
					<h1>Student Login</h1>
					<div id="bag">
						<form id="forml">
  							<div >
  							  <label for="name">Student ID: </label>
  							  <input type="text" name="name1" id="name" placeholder="Registration Id" required>
                                <span>*<?php echo $usererror; ?></span>

  							</div>
  							<div >
  							  <label for="Password">Password.  : </label>
  							  <input type="Password" name="Password" id="pass" pattern=".{5,10}" placeholder="5-10 characters" required title="5 to 10 characters">
                                <span>*<?php echo $passerror; ?></span>
							  </div>
							  <h3> </h3>
                              <input type="submit" name="submit" value="submit">
  							
						</form>
						
						
					</div>
				</div>
			</div>
			
		</div>
	</div>



	<script src="https://code.jquery.com/jquery-3.4.1.js"integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>