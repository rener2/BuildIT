<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Sortable Tabular Data</title>

        <link rel="stylesheet" href="css/style.css">

  </head>

<form action="change.php" method="post">
    <body>
 <div id="wrapper">
  <h1>Configuration</h1>
  <?php

        ?>
  <table id="keywords" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th><span>Alias</span></th>
        <th><span>Trigger</span></th>
        <th><span>Conditions</span></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
        <?php
          		# here database details      
        mysql_connect('localhost', 'root', '');
        mysql_select_db('buildit2');

        $sql = "SELECT id, name, triger_id, action_id FROM alias";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
        echo($row['triger_id']);
        echo "<select name='device_entity'>";
        echo "<option value='empty'></option>";
        while ($row = mysql_fetch_array($result)) {
            echo "<option value='" . $row['name'] ."'>" . $row['name'] ."</option>";
        }
        echo "</select>";

        # here username is the column of my table(userregistration)
        # it works perfectly
        ?>
        </td>
        <td>
        <?php
        # here database details      
        mysql_connect('localhost', 'root', '');
        mysql_select_db('buildit2');

        $sql = "SELECT name FROM triger";
        $result = mysql_query($sql);

        echo "<select name='device_entity'>";
        echo "<option value='empty'></option>";
        while ($row = mysql_fetch_array($result)) {
            echo "<option value='" . $row['name'] ."'>" . $row['name'] ."</option>";
        }
        echo "</select>";

        # here username is the column of my table(userregistration)
        # it works perfectly
        ?>
        </td>
        <td>
        <?php
        # here database details      
        mysql_connect('localhost', 'root', '');
        mysql_select_db('buildit2');

        $sql = "SELECT name FROM action";
        $result = mysql_query($sql);

        echo "<select name='device_entity'>";
        echo "<option value='empty'></option>";
        while ($row = mysql_fetch_array($result)) {
            echo "<option value='" . $row['name'] ."'>" . $row['name'] ."</option>";
        }
        echo "</select>";

        # here username is the column of my table(userregistration)
        # it works perfectly
        ?>
          </td>
      </tr>
    </tbody>
  </table>
 </div>
 

 <?php
if (isset($_REQUEST['submit'])) {
	$username1 = $_POST['username'];
	print ($username1);
	echo("woop");
    overwrite();
}
?>
 <?php
 function overwrite() {
    echo("Overwriting");
    // load the data and delete the line from the array 
    $lines = file('Configuration.yaml'); 
    $last = sizeof($lines) - 134 ;
    unset($lines[$last]); 
    
    for ($i=sizeof($lines); $i > 134; $i--) {
            unset($lines[$i]); 
            }
    // write the new data to the file 
    $fp = fopen('Configuration.yaml', 'w'); 
    fwrite($fp, implode('', $lines)); 
    fclose($fp); 
}
?>

<html>
<body>


<input type="submit" name="submit" value="select"/>
<INPUT TYPE = "Text" VALUE ="username" NAME = "username">
</form>




</body>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://tablesorter.com/__jquery.tablesorter.min.js'></script>

        <script src="js/index.js"></script>

  </body>
</html>
