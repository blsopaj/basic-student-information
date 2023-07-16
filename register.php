<?php

//startimi i sesionit
session_start();

//nese perdoruesi nuk eshte kyq, atehere paraqitja kete pamje te kesaj web faqeje
if(isset($_SESSION['usernameID']) && isset($_SESSION['roli'])) {
	//nese perdoruesi eshte admin, atehere paraqitja kete pamje te kesaj web faqeje
	if($_SESSION['roli'] == 1) {
?> 

<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
        <meta charset="UTF-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style/animate.css">
		<link rel="stylesheet" type="text/css" href="style/style.css">
	</head>

	<body>
        <a href="index.php"><img src="images/logopng.png" class="logo"/></a>
        <div class="searchbar" style="padding:30px"> 
            <form method="post">
            <label>
              <input type="search" name ="search" size="20" placeholder="Search...">
            </label>
            <label>
              <input type="submit" name="button"value="Search">
            </label>
            </form>
        </div>      
            <?php include "Includes/template/nav.php";?>
					<?php
					
					//se pari na nevojitet te i krijojme (deklarojme) variablat qe permbajne mesazhet e gabimeve qe kane ndodhur para se ti perdorim
					$errorGen = $errorFname = $errorLname = $errorDepartament = $errorEmail = $errorEmail = $errorEmail = $errorID = $errorID = $errorID = $errorID = $errorPass = $errorPass = $errorPassTooltip = "";
					
					//ne te njejten menyre i krijojme edhe variablat qe permbajne vlerat aktuale qe i ka shenuar perdoruesi kur e ka plotesuar formen
					//keto vlera do te shenohen neper fushat perkatese te tekstit permes atributut value, dmth vlerat qe i ka shenuar perdoruesi do te ruhen ne formen derisa te mund te realizohet insertimi i tyre ne db 
					$fname = $lname = $email = $id = $pass = "";
					$departament = "Perzgjidh departamentin";
					
					//kushti if ne kete rast do te plotesohet vetem pasi klikohet butoni Submit ne formen
					if($_SERVER['REQUEST_METHOD'] == 'POST') {
						//POST
						
						include 'Includes/validate/registerValidate.php';
					}
					?>
                    <div>
					   <center><h1>Regjistrimi i Studenteve</h1></center>
                    </div> 
						<form action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
                        <center><table>    
							<tr>
								<td><input type = "text" name = "fname" placeholder = "Emri" value="<?php echo $fname;?>"></td>
								<td><input type = "text" name = "lname" placeholder = "Mbiemri" value="<?php echo $lname;?>"></td>
							</tr>
							<!--errors-->
							<tr>
								<td>
								<?php
								echo "<span class='error'>$errorFname<span>";
								?>
								</td>
								<td>
								<?php
								echo "<span class='error'>$errorLname<span>";
								?>
								</td>
							</tr>
							<tr>
								<td>
									<select name = "departament" style = "width:90%">
										<option  value="<?php echo $departament;?>"><?php echo $departament;?></option>
										<?php include "Includes/functions/selectDepartament.php";?>
									</select>
								</td>
								<td><input type = "text" name = "email" placeholder = "Email adresa" value="<?php echo $email;?>"></td>
							</tr>
							<!--errors-->
							<tr>
								<td>
								<?php
								echo "<span class='error'>$errorDepartament<span>";
								?>
								</td>
								<td>
								<?php
								echo "<span class='error'>$errorEmail<span>";
								?>
								</td>
							</tr>
							<tr>
								<td><input type = "text" name = "idReg" placeholder = "ID" value="<?php echo $id;?>"></td>
								<td><input type = "password" name = "passwordReg" placeholder = "Fjalekalimi"></td>
							</tr>
							<!--errors-->
							<tr>
								<td>
								<?php
								echo "<span class='error'>$errorID<span>";
								?>
								</td>
								<td>
								<?php
								echo "<span class='error' title = '$errorPassTooltip'>$errorPass<span>";
								?>
								</td>
							</tr>
							<tr>
								<td>
								<?php
								echo "<span class='error'>$errorGen<span>";
								?>
								</td>
								<td></td>
							</tr>
							<tr><br>
								<td><input type = "submit" name = "register" value="Submit" style="width:195%;"></td>
							</tr>
					</table></center>	
                </form>    
			<?php include "Includes/template/footer.php";?>
        <script src="javascript/app.js"></script>
	</body>
</html>

<?php
	}
	//nese perdoruesi nuk eshte admin ridrejtoje ne faqen baze pas kyqjes
	else {
		header("Location: home.php");
	}
}
//nese perdoruesi nuk eshte kyq ridrejtoje ne faqen e logimit
else {
	header("Location: login.php");
}
?>