<?php 
    require_once( 'wp-load.php' );
    if (isset($_POST['markerID']))
    {
        global $wpdb;
        //Take the markerID and make the query
        $markerID = $_POST['markerID'];
        
        $myrows = $wpdb->get_results( "SELECT * FROM wpab_events INNER JOIN wpab_type_of_attack ON wpab_events.type_id=wpab_type_of_attack.type_id WHERE ID LIKE  '%$markerID%'");

        //print_r($myrows);
        $table_build = '<thead>
                            <tr>
                                <th>Name of attack</th>
                                <th>Type of attack</th>
                                <th>Short Description</th>
                            </tr>
                        </thead>
                        <tbody>';
        
        foreach($myrows as $row)
        {
            $table_build .= '<tr><td>'.$row->Name_of_attack.'</td><td>'.$row->type_of_attack.'</td>
                 <td>' .$row->Short_Description.'</td></tr>';
        }
        $table_build .= '</tbody>';
        echo $table_build;
        exit;
    }
?>