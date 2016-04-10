<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Sortable Tabular Data</title>

        <link rel="stylesheet" href="css/style.css">

  </head>

<form action="index.php" method="post">

    <body>
 <div id="wrapper">
  <h1>Configuration</h1>
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

            $sql = "SELECT name FROM alias";
            $result = mysql_query($sql);
            $selected_alias = 'Turn on lobby LED';
            /*
            if(isset($_REQUEST['update'])) {
                echo("update!");
                $selected_alias = $_POST['alias_name'];
                echo($selected_alias);
            } else */if (isset($_REQUEST['save'])) {
                echo("update through save!");
                $selected_alias = $_POST['alias_name'];
                echo($selected_alias);
            } else {
                echo("didnt update");
            }
            echo '<select name="alias_name" onchange="updateSelect();">';
            while ($row = mysql_fetch_array($result)) {
                if($selected_alias == $row['name']) {
                    echo "<option value=" ."'$selected_alias'" ." selected>$selected_alias</option>/n"; 
                } else {
                    echo "<option value='" . $row['name'] ."'>". $row['name'] ."</option>";
                }
            }
            echo "</select>";

            # here name is the column of my table
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
            $sql2 = "SELECT triger.name FROM triger INNER JOIN alias ON triger.id=alias.triger_id WHERE alias.name = '$selected_alias';";
            echo($sql2);
            $result2 = mysql_query($sql2);
            $selected_triger_name = mysql_result($result2, 0);

            echo "<select name='triger_name'>";
            echo "<option value=''></option>";
            while ($row = mysql_fetch_array($result)) {
                if($selected_triger_name == $row['name']) {
                    echo "<option value=". "'$selected_triger_name'" ." selected>"."$selected_triger_name"."</option>/n"; 
                } else { 
                    echo "<option value='" . $row['name'] ."'>". $row['name'] ."</option>";
                }
            }
            echo "</select>";
            ?>
        </td>

        <td>
            <?php
            # here database details      
            mysql_connect('localhost', 'root', '');
            mysql_select_db('buildit2');


            $sql = "SELECT name FROM action";
            $result = mysql_query($sql);
            $sql2 = "SELECT action.name FROM action INNER JOIN alias ON action.id=alias.action_id WHERE alias.name = '$selected_alias';";
            $result2 = mysql_query($sql2);
            $selected_action_name = mysql_result($result2, 0);

            echo "<select name='action_name'>";
            echo "<option value=''></option>";
            while ($row = mysql_fetch_array($result)) {
                if($selected_action_name == $row['name']) {
                    echo "<option value=". "'$selected_action_name'" ." selected> ". "$selected_action_name" ."</option>/n"; 
                } else { 
                    echo "<option value='" . $row['name'] ."'>". $row['name'] ."</option>";
                }
            }
            
            echo "</select>";
            ?>
        </td>

        <td>
            <input type="submit" name="save" value="Save"/>
            <input type="submit" id="update" name="update" value="update" style="display: none;"/>
        </td>
      </tr>
    </tbody>
  </table>
 </div>

<script>
function updateSelect()
{
    document.getElementById('update').click();
}
</script>


<?php
//Save the current selection to the databse.
if(isset($_REQUEST['save'])){
    mysql_connect('localhost', 'root', '');
    mysql_select_db('buildit2');
    
    $alias_name = $_POST['alias_name'];
    echo("---".$alias_name."---");
    print_r($_POST);

    if ($_POST['triger_name'] != '' and $_POST['action_name'] != '') {
        // get triger data from database
        $trigger_name = $_POST['triger_name'];

        $sql = "SELECT data FROM triger WHERE name = " ."'"."$trigger_name"."'".";";
        $result = mysql_query($sql);
        if (!$result) {
            // Handle error here
        } else {
            $triger_data = mysql_result($result, 0);
        }

        // get action data
        $action_name = $_POST['action_name'];
        $sql = "SELECT data FROM action WHERE name = '$action_name';";
        $result = mysql_query($sql);
        if (!$result) {
            // Handle error here
        } else {
            $action_data = mysql_result($result, 0);
        }

        //Get triger_id
        $triger_name = $_POST['triger_name'];
        $sql = "SELECT id FROM triger WHERE name = '$triger_name';";
        $result = mysql_query($sql);
        if (!$result) {
            // Handle error here
        } else {
            $triger_id = mysql_result($result, 0);
        }

        //Get action_id
        $sql = "SELECT id FROM action WHERE name = '$action_name';";
        $result = mysql_query($sql);
        if (!$result) {
            // Handle error here
        } else {
            $action_id = mysql_result($result, 0);
        }

        //Insert automation into the database
        $sql = "UPDATE alias SET triger_id=$triger_id, action_id=$action_id where name='$alias_name';";

        $result = mysql_query($sql);
        if (!$result) {
            echo("Error - couldnt write data to the database.");
        } else {
            echo("Sucessfully wrote data to the database.");
        }
        writeToConfiguration();
        } else {
        echo("WARNING: Didnt update automation! You have to choose all the fields!");
    }
} else {
    echo("\r\nChoose alias, triger, action and press the save button\r\n");
}
?>

<?php
function writeToConfiguration() {
    //Variable to store new automation.
    $automation = "";
    //Connect to the database.
    mysql_connect('localhost', 'root', '');
    mysql_select_db('buildit2');

    $sql = "SELECT id, name, triger_id, action_id FROM alias";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        //name of automation
        $alias_name = $row['name'];
        //id of automation
        $alias_id = $row['id'];
        if ($row['triger_id'] == 0 or $row['action_id'] ==  0) {
            continue;
        }
        //get triger data
        $sql = "SELECT triger.data FROM triger INNER JOIN alias ON triger.id=alias.triger_id WHERE alias.id = $alias_id";
        $temp_result = mysql_query($sql);
        if (!$temp_result) {
            // Handle error here
        } else {
            $triger_data = mysql_result($temp_result, 0); //assign content to to variable that holds triger data
        }
        //query for action_data
        $sql = "SELECT action.data FROM action INNER JOIN alias ON action.id=alias.action_id WHERE alias.id = $alias_id";
        $temp_result = mysql_query($sql);
        if (!$temp_result) {
            // Handle error here
        } else {
            $action_data = mysql_result($temp_result, 0); //assign content to to variable that holds action data
        }
        
        //Start creating automation
        $automation .= '- alias: "'.$alias_name.'"'."\r\n";
        $automation .= $triger_data . "\r\n";
        $automation .= $action_data . "\r\n\r\n";
    }
    // load the data and delete the line from the array 
    $lines = fopen('C:\xampp\htdocs\Configuration.yaml', 'r'); 
    $old_data = '';
    
    //Add automation to the configuration file
    for ($i=0; $i < 133; $i++) {
        $line = fgets($lines);
        #if ($line != 0) {
        $old_data .= $line;
        #}
        }
    
    $old_data .= $automation;
    $fp = fopen('C:\xampp\htdocs\Configuration.yaml', 'w'); 
    fwrite($fp, $old_data); 
    fclose($fp);
    echo("Successfully wrote data to configuration file!");

}
?>

<html>
<body>
</form>




</body>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://tablesorter.com/__jquery.tablesorter.min.js'></script>

        <script src="js/index.js"></script>

  </body>
</html>
