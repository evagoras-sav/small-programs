<?php

    if(isset($_POST["delete"]))
    {
        global wpdb;

        $table_name = "wpab_type_of_attack";
    
        $myrows = $wpdb->delete($table_name, array('id' =>$id));

        if($myrows)
        {
            echo 'Row deleted';
        }else echo 'Delete failed';
    }

?>

<form action="" method="POST">
    <label><input type="text" name="id" required>ID to delete<label>

    <input type="submit" name="delete" value="delete">
</form>