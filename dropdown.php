    <?php
    global $wpdb;

    $table_name = "wpab_type_of_attack";
    $myrows = $wpdb->get_results( "SELECT * FROM $table_name");
    echo '<td><select name="type_id">';
    echo '<option value="0">Select type of attack</option>';
    foreach ($myrows as $details) 
    {
        //echo '<option>'.$details->id.'</option>';
        echo '<option value="'.$details->type_id.'">'.$details->type_of_attack.'</option>';
        $val = $_GET["value"];
    } 
    echo '</select></td>';
    ?>
    <br>
    <br>

