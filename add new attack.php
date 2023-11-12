<?php

if ($_POST['Submit'])
{
?>
	<form action="" method="post">

    <label> Name_of_attack:<input type="text" name="attack_name" size = "30"/></label>
    <label> Short_Description:<input type="text" name="attack_description" size = "50"/></label>

	<input type="submit" name="Submit"  value="Submit"/></form>

	<?php

	global $wpdb;

    //$ID = $_POST['id'];
    $Name_of_attack	 = $_POST["attack_name"];
    $Short_Description = $_POST["attack_description"];

    if ($wpdb->insert(
        'wpab_events',
        array(
            //'ID' => $ID;
            'Name_of_attack' => $Name_of_attack,
            'Short_Description' => $Short_Description
        )
    ) == false) wp_die('Insertion Failed');
    else echo 'Insertion Successful <p />';
?>
<?php
}
else 
{  
?>
    <form action="" method="post">
        <?php
            $table_name = "wpab_type_of_attack";
            $myrows = $wpdb->get_results( "SELECT * FROM $table_name");
            echo '<td><select>';
            echo '<option value="0">Select type of attack</option>';
            foreach ($myrows as $details) 
            {
                //echo '<option>'.$details->type_id.'</option>';
                echo '<option value="'.$details->type_id.'">'.$details->type_of_attack.'</option>';
            } 
            echo '</select></td>';
        ?>
        <label> Name_of_attack:<input type="text" name="attack_name" size="30"/></label>
        <label> Short_Description:<input type="text" name="attack_description" size="50"/></label>

	    <input type="submit" name="Submit"  value="Submit"/>
    </form>
<?php
}
?>