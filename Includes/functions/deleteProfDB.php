<?php
//startimi i sesionit
session_start();

//marrja e te dhenave me metoden GET
//perdoruesi i kyqur dhe roli i tij administrator
if(isset($_SESSION['usernameID']) && isset($_SESSION['roli']) && $_SESSION['roli'] == 1 && isset($_GET['id'])) {
	$id = $_GET['id'];

	//konekto me db
	require "connect.php";

	//query per fshirjen e lendes perkatese
	$deleteQuery = "DELETE FROM perdoruesi WHERE id = '$id';";
    $deleteQuery .= "DELETE FROM profesori WHERE id = '$id';";
	//ekzekutimi i query-it per fshirjen
	mysqli_multi_query($connect, $deleteQuery);
	
}

//ridrejto ne faqen baze

header("Location: ../../deleteProf.php");
?>