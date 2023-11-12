<?php
    global $wpdb;

    $myrows = $wpdb->get_results( "SELECT * FROM wpab_events INNER JOIN wpab_type_of_attack ON wpab_events.type_id=wpab_type_of_attack.type_id");

?>


<table class="attacks-table" id="attacks-table">
    <thead>
            <tr>
                <th>Attacks Table</th>
                <th></th>
                <th></th>
                <th>Operation Section</th>
            </tr>
    </thead>
    
    <?php 
        foreach ($myrows as $details)
        { 
            ?>
            
            <tr>
                <td><input type="text" name="name" value="<?php echo $details->Name_of_attack;?>" readonly disabled></td>
                <td><input type="text" name="name" value="<?php echo $details->type_of_attack;?>" readonly disabled></td>
                <td><input type="text" name="name" value="<?php echo $details->ID;?>" readonly disabled></td>
                <form action="<?php $_PHP_SELF ?>" method="POST">
                    <?php $delRow = "delete_registration_{$details->ID}";?>
                    <td><input type="submit" name="delete" value="delete"></td>
                </form>
            </tr>   
    <?php  } ?>  
</table>


<?php 
    if(isset($_POST['delete']))
        {
            $deleteRow = $_POST["$delRow"];
            $d_query = $wpdb -> delete('wpab_events', array( 'ID' => $details->ID));
                        
            if($d_query)
            {
               
               ?> 
                <script type="text/javascript">
                    function removeDiv() {
                        var eTable = document.getElementById("attacks-table");
                        eTable.parentNode.removeChild(eTable);
                    }
                    removeDiv();
                </script>
                <?php
                $myrows = $wpdb->get_results( "SELECT * FROM wpab_events INNER JOIN wpab_type_of_attack ON wpab_events.type_id=wpab_type_of_attack.type_id");
                ?>
                <table class="attacks-table" id="attacks-table">
                    <thead>
                            <tr>
                                <th>Attacks Table</th>
                                <th></th>
                                <th></th>
                                <th>Operation Section</th>
                            </tr>
                    </thead>
    
                <?php 
                    foreach ($myrows as $details)
                    { 
                    ?> 
                            <tr>
                                <td><input type="text" name="name" value="<?php echo $details->Name_of_attack;?>" readonly disabled></td>
                                <td><input type="text" name="name" value="<?php echo $details->type_of_attack;?>" readonly disabled></td>
                                <td><input type="text" name="name" value="<?php echo $details->ID;?>" readonly disabled></td>
                                <form action="<?php $_PHP_SELF ?>" method="POST">
                                    <?php $delRow = "delete_registration_{$details->ID}";?>
                                    <td><input type="submit" name="delete" value="delete"></td>
                                </form>
                            </tr>   
                <?php  } ?>  
                </table>
            <?php  echo "Deleted"; ?>
          <?php     
            }else echo "Failed";
        }?>

