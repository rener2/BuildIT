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