<!DOCTYPE html>
<html >
<!-- 
---------------------------------------------------------------------------------------------------------------------------
IMPRTANT TIPS FOR FUTURE DEVELOPMENT:
1)Use PDO or mysqli instead of mysql, since the mysql_* functions are no longer maintained and community has begun the deprecation process.
2)Change this code to depend more on ID-s, not names, for example line 51 or 155 and alot of stuff between and after these lines.
3)You can use alot less mysqsl_connect and mysql_select_db statements than I used (didn't bother to remove them).
4)This is my first PHP page EVER, so it is not advised to copy code or practices used in here.
5)I should've used AJAX to update my table, since that way I wouldn't need to update the whole page. If you want to 
develop this page further, I advise you to use AJAX (I didn't because I didn't know what AJAX is, still dont).
6)Dont ever make accessing your databases as easy as I did. ;)
---------------------------------------------------------------------------------------------------------------------------
-->
  <head>
    <meta charset="UTF-8">
    <title>Configuration</title>
    <link rel='shortcut icon' type='image/x-icon' href='/css/favicon.ico' />

        <link rel="stylesheet" href="css/style.css">
        <!-- <link rel="stylesheet" type="text/css" href="themes/easydropdown.css"/>-->

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
    <?php
      # here database details      
      mysql_connect('localhost', 'root', 'raspberry');
      mysql_select_db('buildit');
      for ($x = 1; $x <= 15; $x++) {
          echo("<tr>");
            echo("<td>");
                $sql = "SELECT name, triger_id, action_id FROM alias";
                $result = mysql_query($sql);
                $selected_alias = "Alias $x";
                /**
                if(isset($_REQUEST['update'])) {
                    $selected_alias = $_POST["alias_name $x"];
                } else if (isset($_REQUEST['save'])) {
                    $selected_alias = $_POST["alias_name $x"];
                }**/
                echo('<select name="'."alias_name$x".'" class="dropdown" onchange="updateSelect();">');
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
            echo("</td>");
            echo("<td>");
                # here database details      
                mysql_connect('localhost', 'root', 'raspberry');
                mysql_select_db('buildit');
                $sql = "SELECT name FROM triger";
                $result = mysql_query($sql);
                $sql2 = "SELECT triger.name FROM triger INNER JOIN alias ON triger.id=alias.triger_id WHERE alias.name = '$selected_alias';";
                $result2 = mysql_query($sql2);
                if (mysql_num_rows($result2) == 0) {
                    $selected_triger_name = '';
                } else {
                    $selected_triger_name = mysql_result($result2, 0);
                }
                echo '<select name="'."triger_name$x".'" class="dropdown">';
                echo "<option value=''></option>";
                while ($row = mysql_fetch_array($result)) {
                    if($selected_triger_name == $row['name']) {
                        echo "<option value=". "'$selected_triger_name'" ." selected>"."$selected_triger_name"."</option>/n"; 
                    } else { 
                        echo "<option value='" . $row['name'] ."'>". $row['name'] ."</option>";
                    }
                }
                echo "</select>";
            echo("</td>");
            echo("<td>");
                # here database details      
                mysql_connect('localhost', 'root', 'raspberry');
                mysql_select_db('buildit');
                $sql = "SELECT name FROM action";
                $result = mysql_query($sql);
                $sql2 = "SELECT action.name FROM action INNER JOIN alias ON action.id=alias.action_id WHERE alias.name = '$selected_alias';";
                $result2 = mysql_query($sql2);
                if (mysql_num_rows($result2) == 0) {
                    $selected_action_name = '';
                } else {
                    $selected_action_name = mysql_result($result2, 0);
                }
                
                echo '<select name="'."action_name$x".'" class="dropdown">';
                echo "<option value=''></option>";
                while ($row = mysql_fetch_array($result)) {
                    if($selected_action_name == $row['name']) {
                        echo "<option value=". "'$selected_action_name'" ." selected> ". "$selected_action_name" ."</option>/n"; 
                    } else { 
                        echo "<option value='" . $row['name'] ."'>". $row['name'] ."</option>";
                    }
                }
                
                echo "</select>";            
            echo("</td>");
          echo("</tr>");
      }
      ?>
    </tbody>
  </table>
  <div class="buttonHolder">
  <button class="button" name="save">save</button>
  <button class="button" name="reset">reset</button>
  <input type="submit" id="update" name="update" value="update" style="display: none;"/>
  </div>
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
    mysql_connect('localhost', 'root', 'raspberry');
    mysql_select_db('buildit');
    
    //$alias_name = $_POST['alias_name'];
    for ($x = 1; $x <= 15; $x++) {
        //$alias_name = $_POST["alias_name $x"];
        $alias_name = "Alias $x";
        if ($_POST["triger_name$x"] != '' and $_POST["action_name$x"] != '') {
            // get triger data from database
            $trigger_name = $_POST["triger_name$x"];
            $sql = "SELECT data FROM triger WHERE name = " ."'"."$trigger_name"."'".";";
            $result = mysql_query($sql);
            if (!$result) {
                // Handle error here
            } else {
                $triger_data = mysql_result($result, 0);
            }
            // get action data
            $action_name = $_POST["action_name$x"];
            $sql = "SELECT data FROM action WHERE name = '$action_name';";
            $result = mysql_query($sql);
            if (!$result) {
                // Handle error here
            } else {
                $action_data = mysql_result($result, 0);
            }
            //Get triger_id
            $triger_name = $_POST["triger_name$x"];
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
                echo("<p style='color:orange;background-color:red;'>Error - couldnt write data to the database.");
            } else {
                //echo("<p style='color:orange;background-color:red;'>Sucessfully wrote data to the database.\r\n");
            }
            writeToConfiguration();
            } else if ($_POST["triger_name$x"] == '' and $_POST["action_name$x"] == '') {
                $sql = "UPDATE alias SET triger_id=0, action_id=0 where name='$alias_name';";
                $result = mysql_query($sql);
                if (!$result) {
                    echo("<p style='color:orange;background-color:red;'>Error - couldnt write data to the database.");
                } else {
                    //echo("<p style='color:orange;background-color:red;'>Sucessfully wrote data to the database.\r\n");
                }
            } else {
                echo("<p style='color:orange;background-color:red;text-align:center'>WARNING: Didnt update automation! You cannot leave only one empty!");
                echo "<script style='color:orange;background-color:red;text-align:center'>alert('WARNING: Didnt update automation! You cannot leave only one empty!');</script>";
        }
    }
                echo '<script type="text/javascript">'
                , 'updateSelect();'
                , '</script>'
                ;
}
?>
<?php
//Save the current selection to the databse.
if(isset($_REQUEST['reset'])){
    mysql_connect('localhost', 'root', 'raspberry');
    mysql_select_db('buildit');
    for ($x = 1; $x <= 15; $x++) {
        $alias_name = "Alias $x";
        $sql = "UPDATE alias SET triger_id=0, action_id=0 where name='$alias_name';";
        $result = mysql_query($sql);
        if (!$result) {
            echo "<script style='color:orange;background-color:red;text-align:center'>alert('WARNING: Didnt update automation! You cannot leave only one empty!');</script>";
            echo("<p style='color:orange;background-color:red;'>Error - couldnt write data to the database.");
        } else {
            //echo("<p style='color:orange;background-color:red;'>Sucessfully wrote data to the database.\r\n");
        }
    }
    echo '<script type="text/javascript">'
                , 'updateSelect();'
                , '</script>'
                ;
}
?>
<?php
function writeToConfiguration() {
    //Variable to store new automation.
    $automation = "";
    //Connect to the database.
    mysql_connect('localhost', 'root', 'raspberry');
    mysql_select_db('buildit');
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
    //$lines = fopen("/root/.homeassistant/configuration.yaml", 'r');
    $lines = fopen("configuration.yaml", 'r');
            
    $old_data = '';
    
    //Add automation to the configuration file
    for ($i=0; $i < 139; $i++) {
        $line = fgets($lines);
        #if ($line != 0) {
        $old_data .= $line;
        #}
        }
    
    fclose($lines);
    $old_data .= $automation;
    
    //$fp = fopen("/root/.homeassistant/configuration.yaml", 'w');
    $fp = fopen("configuration.yaml", 'w');
    fwrite($fp, $old_data); 
    fclose($fp);
    //echo("<p style='color:orange;background-color:red;'>Successfully wrote data to configuration file!\r\n");
}
?>
<html>
<body>
</form>
</body>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://tablesorter.com/__jquery.tablesorter.min.js'></script>
<!--<script src="js/jquery.easydropdown.js" type="text/javascript"></script>-->
        <script src="js/index.js"></script>
  </body>
</html>
