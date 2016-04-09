<?php
session_start();
//Üks sulg oli puudu, pikalt pidin nussima.
if(!isset($_SESSION['mypassword'])){
header("location:index.php");
}
$bussiness=$_SESSION['bussiness'];
?>

<!DOCTYPE html>
<html>


<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
    <title>Puhastid</title>
    <meta name="robots" content="noindex" />
</head>

<body>
<h1><center>Tere tulemast <?php echo $bussiness?>!</center></h1>

</center></h1>
<h3><center>Aastatel 2004-2014 EL ja KIK abirahadega rajatud ja rekonstrueeritud reoveepuhastite tõhususe hindamine</center></h3>

<!--sisselogimise aken-->
<table class="table1" width="300" border="0" align="right" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="logout.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#green">
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Logi välja"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
<br>
<h2><a href="manual.pdf">Täitmisjuhend</a></h2>

<?php

//DB ühendus
$con= mysqli_connect("");// or die(mysql_error());

if (mysqli_connect_errno()){
	echo "Ühendus serveriga ebaõnnestus: " . mysqli_connect_error();
	}


//echo $bussiness;
//print_r($bussiness);
$sql="SELECT stp_name FROM `kysimustik` WHERE bussiness='$bussiness'";
$result=mysqli_query($con, $sql);
$result2=mysqli_query($con, $sql);
$count=mysqli_num_rows($result)/3;
//echo $count;
//$row = mysqli_fetch_assoc($result);
//print_r ($row);
//$row2 = mysqli_fetch_assoc($result2);

?>

<h3>Teile kuuluvad/hooldatavad puhastid:</h3>
<!--Siia võiks kuvada ettevõtte andmed: nimi ja puhastite arv vms-->

<table width="150px" border="1" cellpadding="3" cellspacing="1" bgcolor="#green">
<tr>
	<th>Puhasti andmete muutmine</th>
</tr>
<?php for ($x=0; $x<$count; $x++){
$row = mysqli_fetch_assoc($result)?>
<form name="form1" action="stp_update.php" method="post">
	<tr>
		<td> <input type="submit" name="stp" value="<?php echo $row["stp_name"]?>"></td>
	</tr>
<?php 
}
mysqli_free_result($result);
?>

</table>
</form>

<br>
<!--
<table width="150px" border="1" cellpadding="3" cellspacing="1" bgcolor="#green">
<tr>
	<th>Puhasti andmete vaatamine</th>
</tr>
<form name="form2" action="overall_view.php" method="post">
<?php for ($x=0; $x<$count; $x++){
$row2 = mysqli_fetch_assoc($result2)?>
	<tr>
		<td> <input type="submit" name="stp" value="<?php echo $row2['stp_name']?>"></td>
	</tr>
<?php 

} 
?>-->
<footer>
       <hr>
 <img style="float:left" src="keskkonnaministeerium.png" hspace="40">
  <img style="float:left;width:128px" src="KIK_logo.jpg" hspace="40">
</footer>
<!--
</table>
</form>
-->

</body>
</html>



























