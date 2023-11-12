<?php 

        global $wpdb;

        if(isset($_POST['Search']))
            {
                $attack_name = $_POST["attack_name"];
                $query= "SELECT * FROM `wpab_events` INNER JOIN wpab_type_of_attack ON wpab_events.type_id=wpab_type_of_attack.type_id WHERE Name_of_attack LIKE  '%$attack_name%'";
                $results = $wpdb ->get_results($query); 

?>
                <table class="attacks-table">
                    <thead>
                        <tr>
                            <th>Name of attack</th>
                            <th>Type of attack</th>
                            <th>Short Description</th>
                            <!-- <th>Attackers and entity that claimed responsibility</th>
                            <th>How attack was done</th> 
                            <th>Incidents duration</th> 
                            <th>Extend of impact effect</th> 
                            <th>Casualties per phase Triage</th>
                            <th>Mitigating and Excerbating Conditions</th> 
                            <th>Target Short description and conditions</th> 
                            <th>Routes of Escape Supporting services/infrastructures</th> 
                            <th>Level of technology used by the attackers</th> 
                            <th>List of stakeholders involved</th>
                            <th>Adequancy of where existing capacities capabilities</th>
                            <th>Interoperability of equipment sops/ppe chain of command</th> 
                            <th>Was/is the incident event included in risk assessment studies</th> 
                            <th>Is there in place a strategy/emergency plan for similar incident</th> 
                            <th>Was the incident such an event simulated in exercises</th>
                            <th>List of stakeholders involved in the exercise</th> 
                            <th>Existence following of standard/joint operational procedures</th> 
                            <th>Next steps to improve capacities/capabilities to takle such risk</th> 
                            <th>Evaluate of inserted data has to be done for accuracy</th> 
                            <th>Rehabilitation of environment</th>  -->
                        </tr>
                    </thead>
                    <tbody>
               <?php foreach($results as $details)
               {?>
                    <tr>
                        <td><?php  echo $details->Name_of_attack;?></td>
                        <td><?php echo $details->type_of_attack;?></td>
                        <td><?php echo $details->Short_Description;?></td>
                        <!-- <td><?php echo $details->Attackers_and_entity_that_claimed_responsibility;?></td>
                        <td><?php echo $details->How_attack_was_done;?></td>
                        <td><?php echo $details->Incidents_duration;?></td>
                        <td><?php echo $details->Extend_of_impact_effect;?></td>
                        <td><?php echo $details->Casualties_per_phase_Triage;?></td>
                        <td><?php echo $details->Mitigating_and_Excerbating_Conditions;?></td>
                        <td><?php echo $details->Target_Short_description_and_conditions;?></td>
                        <td><?php echo $details->Routes_of_Escape_Supporting_services_infrastructures;?></td>
                        <td><?php echo $details->Level_of_technology_used_by_the_attackers;?></td>
                        <td><?php echo $details->List_of_stakeholders_involved;?></td>
                        <td><?php echo $details->Adequancy_of_where_existing_capacities_capabilities;?></td>
                        <td><?php echo $details->Interoperability_of_equipment_sops_ppe_chain_of_command;?></td>
                        <td><?php echo $details->Was_is_the_incident_event_included_in_risk_assessment_studies;?></td>
                        <td><?php echo $details->Is_there_in_place_a_strategy_emergency_plan_for_similar_incident;?></td>
                        <td><?php echo $details->Was_the_incident_such_an_event_simulated_in_exercises;?></td>
                        <td><?php echo $details->List_of_stakeholders_involved_in_the_exercise;?></td>
                        <td><?php echo $details->Existence_following_of_standard_joint_operational_procedures;?></td>
                        <td><?php echo $details->Next_steps_to_improve_capacities_capabilities_to_takle_such_risk;?></td>
                        <td><?php echo $details->Evaluate_of_inserted_data_has_to_be_done_for_accuracy;?></td>
                        <td><?php echo $details->Rehabilitation_of_environment;?></td> -->
                    </tr>
        <?php  } ?>  
                    <tbody>  
                </table>
        <?php }
            else {
                $query = "SELECT * FROM `wpab_events` INNER JOIN wpab_type_of_attack ON wpab_events.type_id=wpab_type_of_attack.type_id";
                $res = $wpdb -> get_results($query);
            }
        ?>

<form action="" method="post">
    <label> Name of attack:<input type="text" name="attack_name" size="30"/></label>
    <input type="submit" name="Search" value="Search">
    
    <br>
    <br>
    <label>Type of attack:<input type="text" name="type" size="30"/></label>
    <input type="submit" name="filter" value = "Filter by type">
<form>

<?php 

        global $wpdb;

        if(isset($_POST['filter']))
            {
                $type = $_POST["type"];
                $query= "SELECT * FROM `wpab_events` INNER JOIN wpab_type_of_attack ON wpab_events.type_id=wpab_type_of_attack.type_id WHERE type_of_attack LIKE  '%$type%'";
                $results = $wpdb ->get_results($query); 

?>
                <table class="attacks-table">
                    <thead>
                        <tr>
                            <th>Name of attack</th>
                            <th>Type of attack</th>
                            <th>Short Description</th>
                            <!-- <th>Attackers and entity that claimed responsibility</th>
                            <th>How attack was done</th> 
                            <th>Incidents duration</th> 
                            <th>Extend of impact effect</th> 
                            <th>Casualties per phase Triage</th>
                            <th>Mitigating and Excerbating Conditions</th> 
                            <th>Target Short description and conditions</th> 
                            <th>Routes of Escape Supporting services/infrastructures</th> 
                            <th>Level of technology used by the attackers</th> 
                            <th>List of stakeholders involved</th>
                            <th>Adequancy of where existing capacities capabilities</th>
                            <th>Interoperability of equipment sops/ppe chain of command</th> 
                            <th>Was/is the incident event included in risk assessment studies</th> 
                            <th>Is there in place a strategy/emergency plan for similar incident</th> 
                            <th>Was the incident such an event simulated in exercises</th>
                            <th>List of stakeholders involved in the exercise</th> 
                            <th>Existence following of standard/joint operational procedures</th> 
                            <th>Next steps to improve capacities/capabilities to takle such risk</th> 
                            <th>Evaluate of inserted data has to be done for accuracy</th> 
                            <th>Rehabilitation of environment</th>  -->
                        </tr>
                    </thead>
                    <tbody>
               <?php foreach($results as $details)
               {?>
                    <tr>
                        <td><?php  echo $details->Name_of_attack;?></td>
                        <td><?php echo $details->type_of_attack;?></td>
                        <td><?php echo $details->Short_Description;?></td>
                        <!-- <td><?php echo $details->Attackers_and_entity_that_claimed_responsibility;?></td>
                        <td><?php echo $details->How_attack_was_done;?></td>
                        <td><?php echo $details->Incidents_duration;?></td>
                        <td><?php echo $details->Extend_of_impact_effect;?></td>
                        <td><?php echo $details->Casualties_per_phase_Triage;?></td>
                        <td><?php echo $details->Mitigating_and_Excerbating_Conditions;?></td>
                        <td><?php echo $details->Target_Short_description_and_conditions;?></td>
                        <td><?php echo $details->Routes_of_Escape_Supporting_services_infrastructures;?></td>
                        <td><?php echo $details->Level_of_technology_used_by_the_attackers;?></td>
                        <td><?php echo $details->List_of_stakeholders_involved;?></td>
                        <td><?php echo $details->Adequancy_of_where_existing_capacities_capabilities;?></td>
                        <td><?php echo $details->Interoperability_of_equipment_sops_ppe_chain_of_command;?></td>
                        <td><?php echo $details->Was_is_the_incident_event_included_in_risk_assessment_studies;?></td>
                        <td><?php echo $details->Is_there_in_place_a_strategy_emergency_plan_for_similar_incident;?></td>
                        <td><?php echo $details->Was_the_incident_such_an_event_simulated_in_exercises;?></td>
                        <td><?php echo $details->List_of_stakeholders_involved_in_the_exercise;?></td>
                        <td><?php echo $details->Existence_following_of_standard_joint_operational_procedures;?></td>
                        <td><?php echo $details->Next_steps_to_improve_capacities_capabilities_to_takle_such_risk;?></td>
                        <td><?php echo $details->Evaluate_of_inserted_data_has_to_be_done_for_accuracy;?></td>
                        <td><?php echo $details->Rehabilitation_of_environment;?></td> -->
                    </tr>
        <?php  } ?>  
                    <tbody>  
                </table>
        <?php }    ?>
