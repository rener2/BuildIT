<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Sortable Tabular Data</title>
    
    
    
    
        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>

    <body>
 <div id="wrapper">
  <h1>Configuration</h1>
  
  <table id="keywords" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th><span>Alias</span></th>
        <th><span>ReadDevice</span></th>
        <th><span>Trigger</span></th>
        <th><span>Conditions</span></th>
        <th><span>TargetDevice</span></th>
        <th><span>TargetAction</span></th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <select name="Aliases">
            <option value="Empty"></option>
            <option value="LEDKöök">Alias1</option>
            <option value="LEDEsik">Alias2</option>
            <option value="LEDMagamis">Alias3</option>
            <option value="LEDNurk">Alias4</option>
          </select></td>
        <td>
        <form action="#" method="post">
		<?php
		# here database details      
		mysql_connect('localhost', 'root', '');
		mysql_select_db('buildit');

		$sql = "SELECT device_name FROM devices";
		$result = mysql_query($sql);

		echo "<select name='device_entity'>";
		echo "<option value='empty'></option>";
		while ($row = mysql_fetch_array($result)) {
		    echo "<option value='" . $row['device_name'] ."'>" . $row['device_name'] ."</option>";
		}
		echo "</select>";

		# here username is the column of my table(userregistration)
		# it works perfectly
		?>
		</form>
        </td>
        <td>
          <select name="ReadDevice1">
            <option value="Empty"></option>
            <option value="On">on</option>
            <option value="Off">off</option>
            <option value=">">suurem kui</option>
            <option value="<">väiksem kui</option>
          </select>
        </td>
        <td>
          <select name="ReadDevice1">
            <option value="Empty"></option>
            <option value="On">Temp > 10</option>
            <option value="Off">Temp > 15</option>
            <option value=">">Temp < 20</option>
            <option value="<">Temp < 25</option>
            <option value="<">Bedroom LED on</option>
            <option value="<">Bedroom LED off</option>
          </select>
        <td>
          <select name="TargetDevice1">
            <option value="Empty"></option>
            <option value="LEDKöök">Köögi tuli</option>
            <option value="LEDEsik">Esiku tuli</option>
            <option value="LEDMagamis">Magamistoa tuli</option>
            <option value="LEDNurk">Nurga tuli</option>
            <option value="Fan">Ventilaator</option>
            <option value="Uks">Uks</option>
            <option value="Kardin">Kardin</option>
            <option value="Peltier">Radiaator</option>
          </select>
        </td>
        <td>
          <select name="TargetAction1">
            <option value="Empty"></option>
            <option value="On">on</option>
            <option value="Off">off</option>
          </select>
        </td>
      </tr>
      <tr>
    </tbody>
  </table>
 <p id="aligncenter"><input type="submit" name="submit" value="Get Selected Value"></p>
 </div>
 <?php
if (isset($_POST['submit'])){
echo("You pressed the button!------------------------------------------------------------------------------------------");
$selected_val = $_POST['device_entity'];  // Storing Selected Value In Variable
echo "You have selected : " + $selected_val;  // Displaying Selected Value
} else {
	echo("something");
}
?>

</body>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://tablesorter.com/__jquery.tablesorter.min.js'></script>

        <script src="js/index.js"></script>

    
    
    
  </body>
</html>
