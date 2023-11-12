<?php
    global $wpdb;
    error_reporting(0);

    $type_id = $_GET['rn'];
    $query = "DELETE FROM wpab_events WHERE type_id = '$type_id'";

    $data= $wpdb->$query;

    if($data)
    {
        echo "Record Deleted";
    }else echo "Delete failed";
?>