<?php
session_start();
//�ks sulg oli puudu, pikalt pidin nussima.
if(!isset($_SESSION['mypassword'])){
header("location:index.php");
}
?>

<!DOCTYPE html>
<html>


<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
    <title>Info toetuse kohta</title>
    <meta name="robots" content="noindex" />
</head>

<body>
<h1><center>Info toetuse kohta</center></h1>

</center></h1>

<!--sisselogimise aken-->
<table class="table1" width="300" border="0" align="right" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="logout.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#green">
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Logi v�lja"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
<br>

<?php

//DB �hendus
$con= mysqli_connect();// or die(mysql_error());

if (mysqli_connect_errno()){
	echo "ܜhendus serveriga eba�nnestus: " . mysqli_connect_error();
	}

if(!isset($_SESSION['stp'])){
	$stp = $_POST['stp'];
	$_SESSION['stp'] = $stp;
} else {
	$stp=$_SESSION['stp'];
}

$sql="SELECT source_of_support,reconstruction,designer,builder,construction_supervision,construction_time,reconstruction_time,launch_month,wwtreatment_investment,wwtreatment_selfinvestment,wwtreatment_investment_total,sludge_treatment_invesment,sludge_treatment_selfinvestment,sludge_investment_total,sludge_treatment_establishment,Investment_total,figures_gen_lim,bht_lim,kht_lim,ha_lim,n_gen_lim,p_gen_lim,other_lim,figures,bht,kht,ha,n_gen,p_gen,others  FROM kysimustik WHERE stp_name='$stp'";
$result=mysqli_query($con, $sql);
$row=mysqli_fetch_array($result);
?>

<h3><?php echo $stp;?> toetuse info andmete muutmine</h3>

<table class="table3" width="100%"  border="1" cellpadding="3" cellspacing="1" bgcolor="#green">
	<col style="width:1%">
	<col style="width:40%">
	<col style="width:30%">
	<col style="width:30%">
<form name="form" method="post" action="specific_update.php">
<tr>
	<th>#</th>
	<th>Parameeter</th>
	<th>Hetkev��rtus</th>
	<th style="width:100px">Muuda</th>
</tr>
<!--Toetuse allikas-->
<tr>
	<td> </td>
	<th><a class="tooltip" href="#">Reoveepuhasti rajamisel v�i rekonstrueerimisel kasutatud toetuse allikas<span class="classic">Iga puhasti puhul valida toetuse allikas (selle olemasolul) koosk�lastatud nimekirjast.</span></a></th>
	<td><?php echo $row['source_of_support']?></td>
	<td><select name="source_of_support"><?php
	//Escape charactere &nbsp ei saa �ra v�tta ning millegi muuga asendad. Kahjuks j��vad nad ka tabelisse sisse.
	$source_of_support_types=array("�F&nbsp2004-2006", "�F&nbsp2007-2013", "KIK&nbspKP&nbspreoveek�itluse&nbspalamprogramm", "KIK&nbspmuu&nbspalamprogramm", "KIK&nbspjoogiveevarustuse&nbspalamprogramm", "Muu" );
	$correct_source_of_support_type ="";
	$arrlength=count($source_of_support_types);
	for($x=0;$x<$arrlength;$x++) {
		if($row['source_of_support'] == $source_of_support_types[$x]) {
			$correct_source_of_support_type = $source_of_support_types[$x];
		} else {
			echo "<option value=".$source_of_support_types[$x]." selected>$source_of_support_types[$x]</option>/n";
		}
	}
	echo "<option value=". $correct_source_of_support_type ." selected>$correct_source_of_support_type</option>/n";
	?>
	</select>
	</td>
</tr>
<!--Investeeringuga tehtud tegevused-->
<tr>
	<td> </td>
	<th><a class="tooltip" href="#">Investeeringuga l�biviidud tegevus<span class="classic">Asendamise puhul j�etakse olemasolev seade kasutusest v�lja ja/v�i likvideeritakse, rekonstruteerimise korral t�iendatakse ja renoveeritakse olemasolevat s�steemi.</span></a></th>
	<td><?php echo $row['reconstruction']?></td>
	<td><select name="reconstruction"><?php
	$reconstruction_types=array("Asendamine&nbspsamas&nbspkohas", "Asendamine&nbspuues&nbspkohas", "Rekonstrueerimine", "Uue&nbsppuhasti&nbsprajamine" );
	$correct_reconstruction_type ="";
	$arrlength=count($reconstruction_types);
	for($x=0;$x<$arrlength;$x++) {
		if($row['reconstruction'] == $reconstruction_types[$x]) {
			$correct_reconstruction_type = $reconstruction_types[$x];
		} else {
			echo "<option value=".$reconstruction_types[$x]." selected>$reconstruction_types[$x]</option>/n";
		}
	}
	echo "<option value=". $correct_reconstruction_type ." selected>$correct_reconstruction_type</option>/n";
	?>
	</select>
	</td>
</tr>
<!--Puhasti projekteerija �rinimi-->
<tr>
	<td> </td>
	<th><a class="tooltip" href="#">Puhasti projekteerija �rinimi<span class="classic">Ettev�tte �rinime leiab �riregistris, vt https://ariregister.rik.ee</span></a></th>
	<td><?php echo $row['designer']?></td>
	<td><input type="text" name="designer" value="<?php echo $row['designer']?>"></td>
</tr>
<!--Ehitaja-->
<tr>
	<td> </td>
	<th><a class="tooltip" href="#">Ehitaja �rinimi<span class="classic">Ettev�tte �rinime leiab �riregistris, vt https://ariregister.rik.ee</span></a></th>
	<td><?php echo $row['builder']?></td>
	<td><input type="text" name="builder" value="<?php echo $row['builder']?>"></td>
</tr>
<!--Ehitusj�relvalvaja �rinimi-->
<tr>
	<td> </td>
	<th><a class="tooltip" href="#">Ehitusj�relvalve �rinimi<span class="classic">Ettev�tte �rinime leiab �riregistris, vt https://ariregister.rik.ee</span></a></th>
	<td><?php echo $row['construction_supervision']?></td>
	<td><input type="text" name="construction_supervision" value="<?php echo $row['construction_supervision']?>"></td>
</tr>
<!--Puhasti rajamise aeg-->
<tr>
	<td> </td>
	<th><a class="tooltip" href="#">Vana reoveepuhasti rajamise aeg<span class="classic">Esmase rajamise aeg.</span></a></th>
	<td><?php echo $row['construction_time']?></td>
	<td><input type="text" name="construction_time" value="<?php echo $row['construction_time']?>"></td>
</tr>
<!--Rekonstrueerimise aeg-->
<tr>
	<td> </td>
	<th>Reoveepuhasti rekonstrueerimise/rajamise aeg</th>
	<td><?php echo $row['reconstruction_time']?></td>
	<td><select name="reconstruction_time"><?php
	$years=array("2004", "2005", "2006", "2007", "2008", "2009", "2010", "2011", "2012", "2013", "2014");
	$correct_year;
	$arrlength=count($years);
	for($x=0;$x<$arrlength;$x++) {
		if($row['reconstruction_time'] == $years[$x]) {
			$correct_year = $years[$x];
		} else {
			echo "<option value=".$years[$x]." selected>$years[$x]</option>/n";
		}
	}
	echo "<option value=".$correct_year." selected>$correct_year</option>/n";
	
	?>
	</select>
	</td>
</tr>
<!--K�iku andmise kuu-->
<tr>
	<td> </td>
	<th>Reoveepuhasti k�iku andmise kuu</th>
	<td><?php echo $row['launch_month']?></td>
	<td><select name="launch_month"><?php
	$months=array("Jaanuar", "Veebruar", "M�rts", "Aprill", "Mai", "Juuni", "Juuli", "August", "September", "Oktoober", "November", "Detsember");
	$correct_month;
	$arrlength=count($months);
	for($x=0;$x<$arrlength;$x++) {
		if($row['launch_month'] == $months[$x]) {
			$correct_month = $months[$x];
		} else {
			echo "<option value=".$months[$x]." selected>$months[$x]</option>/n";
		}
	}
	echo "<option value=".$correct_month." selected>$correct_month</option>/n";
	
	?>
	</select>
	</td>
</tr>
<!--Toetus-->
<tr>
	<td> </td>
	<th colspan="3">Toetusega elluviidud projekti maksumus</th>
</tr>
<tr>
	<td> </td>
	<th><li><a class="tooltip" href="#">Toetuse abil reoveepuhastusse (v.a. settek�itlus) tehtud investeeringu suurus, �<span class="classic">Reoveepuhastusse projekti raames tehtud investeeringute toetuse suurus eurodes.</span></a></li></th>
	<td><?php echo number_format( $row['wwtreatment_investment'] , 2, '.', ' ')?></td>
	<td><input type="text" name="wwtreatment_investment" value="<?php echo $row['wwtreatment_investment']?>"></td>
</tr>
<!--Omafin.-->
<tr>
	<td> </td>
	<th><li><a class="tooltip" href="#">Omafinantseeringu abil reoveepuhastusse (v.a. settek�itlus) tehtud investeeringu suurus, �<span class="classic">Reoveepuhastusse projekti raames tehtud investeeringute omafinantseering eurodes.</span></a></li></th>
	<td><?php echo number_format( $row['wwtreatment_selfinvestment'] , 2, '.', ' ')?></td>
	<td><input type="text" name="wwtreatment_selfinvestment" value="<?php echo $row['wwtreatment_selfinvestment']?>"></td>
</tr>
<!--Kokku-->
<tr>
	<td> </td>
	<th><li><a class="tooltip" href="#">Kokku reoveepuhastusse (v.a. settek�itlus) tehtud investeeringu suurus, �<span class="classic">Reoveepuhastusse projekti raames tehtud investeeringute kogusumma eurodes.</span></a></li></th>
	<td><?php echo number_format(( $row['wwtreatment_selfinvestment'] + $row['wwtreatment_investment']) , 2, '.', ' ')?></td>
	<td></td>
</tr>
<!--Toetus settek�itlus-->
<tr>
	<td> </td>
	<th><li><a class="tooltip" href="#">Toetuse abil settek�itlusesse tehtud investeeringu suurus, �<span class="classic">SA Keskkonnainvesteeringute Keskuse v�i Euroopa Liidu �htekuuluvusfondi abil projekti raames settek�itlusesse  tehtud investeeringute suurus, toetuse suurus eurodes.</span></a></li></th>
	<td><?php echo number_format( $row['sludge_treatment_invesment'] , 2, '.', ' ')?></td>
	<td><input type="text" name="sludge_treatment_invesment" value="<?php echo $row['sludge_treatment_invesment']?>"></td>
</tr>
<!--Omafinantseering settek�itlusesse-->
<tr>
	<td> </td>
	<th><li><a class="tooltip" href="#">Omafinantseeringu abil settek�itlusesse tehtud investeeringu suurus, �<span class="classic">Projekti raames settek�itlusesse tehtud vee-ettev�tte poolsete investeeringute suurus eurodes.</span></a></li></th>
	<td><?php echo number_format( $row['sludge_treatment_selfinvestment'] , 2, '.', ' ')?></td>
	<td><input type="text" name="sludge_treatment_selfinvestment" value="<?php echo $row['sludge_treatment_selfinvestment']?>"></td>
</tr>
<!--Kokku settek�itlusesse-->
<tr>
	<td> </td>
	<th><li><a class="tooltip" href="#">Kokku settek�itlusesse tehtud investeeringu suurus, �<span class="classic">SA Keskkonnainvesteeringute Keskuse v�i Euroopa Liidu �htekuuluvusfondi abil projekti raames settek�itlusesse  tehtud investeeringute ning vee-ettev�tte poolsete investeeringute kogusumma eurodes.</span></a></li></th>
	<td><?php echo number_format( ($row['sludge_treatment_selfinvestment'] + $row['sludge_treatment_invesment']) , 2, '.', ' ')?></td>
	<td></td>
</tr>
<!--Settek�itluse �hikkulu-->
<tr>
	<td> </td>
	<th>Reoveepuhasti tegelik reostuskoormus, ie</th> <!--Enne oli siin Settek�itluse rajamise/rekonstrueerimise �hikkulu, �/ie"-->
	<td><?php echo number_format( $row['sludge_treatment_establishment'] , 2, '.', ' ')?></td>
	<td><input type="text" name="sludge_treatment_establishment" value="<?php echo $row['sludge_treatment_establishment']?>"></td>
</tr>
<!--Investeering kokku-->
<tr>
	<td> </td>
	<th>Investeering kokku reoveepuhastisse ja settek�itlusesse, �</th>
	<td><?php echo number_format($row['Investment_total'] , 2, '.', ' ') ?></td>
	<td><input type="text" name="Investment_total" value="<?php echo $row['Investment_total']?>"></td>
</tr>
<!--N�itajad ja nende piirv��rtused-->
<tr>
	<th></th>
	<td colspan ="3"><center><input type="submit" name="Submit" value="Sisesta"></center></td>
</tr>
</form>
</table>

</body>

<!--Footer k�igile sama-->
<hr>
<footer>
<table class="table2" width="150px" cellpadding="3" cellspacing="1" bgcolor="#green">
<tr>
	<td>
		<form action="login_success.php">
			<input type="submit" value="Puhasti valimine">
		</form>
	</td>
	<td>
		<form action="edit.php">
			<input type="submit" value="�ldandmed">
		</form>
	</td>
	<td>
		<form action="edit_p2.php">
			<input type="submit" value="Info toetuse kohta">
		</form>
	</td>
		<td>
		<form action="edit_p2.5.php">
			<input type="submit" value="Info veeloa kohta">
		</form>
	</td>
	<td>
		<form action="edit_p3.php">
			<input type="submit" value="Vee-ettev�tte vahenditest tehtud lisainvesteeringud">
		</form>
	</td>	
	<td>
		<form action="edit_p4.php">
			<input type="submit" value="Reoveepuhastamise ja settek�itluse hoolduskulud">
		</form>
	</td>	
</tr>
</table>
       <hr>
 <img style="float:left" src="keskkonnaministeerium.png" hspace="40">
  <img style="float:left;width:128px" src="KIK_logo.jpg" hspace="40">

</footer>

</html>