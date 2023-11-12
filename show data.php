<?php
    global $wpdb;

    $myrows = $wpdb->get_results( "SELECT * FROM wpab_events INNER JOIN wpab_type_of_attack ON wpab_events.type_id=wpab_type_of_attack.type_id");
    
?>

<table class="attacks-table">
    <thead>
            <tr>
                <th>Name of attack</th>
                <th>Type of attack</th>
                <th>Short Description</th>
                <th>Load more</th>
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
    <?php 
        foreach ($myrows as $details)
        { 
            ?>
            <tr><form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $details->ID;?>">
                <td><?php echo $details->Name_of_attack;?></td>
                <td><?php echo $details->type_of_attack;?></td>
                <td><?php echo $details->Short_Description;?></td>
                <td><input type="submit" name="load" value="Load all data"></td>
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
                </form></tr>
    <?php  } ?>  
    <tbody>  
</table>

<?php 
    if (isset($_POST['load']))
    {
        $idNo= $_POST["id"];
        $load_attack = $wpdb->get_results("SELECT * FROM wpab_events INNER JOIN wpab_type_of_attack ON wpab_events.type_id=wpab_type_of_attack.type_id WHERE ID = $idNo");

        foreach($load_attack as $detail)
        {?>
            <div>   
            <label> Name_of_attack<input type="text" name="attack_name" value="<?php echo $detail->Name_of_attack;?>" readonly/></label>
            <br>
            <label> Type of attack<input type="text" name="type_of_attack" value="<?php echo $detail->type_of_attack;?>" readonly/></label>
            <br>
            <label> Location: </label>
            <br>
            <label>Lat: <input type="text" name="lat" value="<?php echo $detail->Attack_lat;?>" readonly/></label>
            <label>Long: <input type="text" name="lng" value="<?php echo $detail->Attack_long;?>" readonly/></label>
            <br>
            <label> Short_Description<input type="text" name="attack_description" size="100" value="<?php echo $detail->Short_Description;?>" readonly/></label>
            </div>

            <div>
            <label> Attacker(s) and entity that claimed responsibility (if applicable)<input type ="text" name="attackers"  size="100" value="<?php echo $detail->Attackers_and_entity_that_claimed_responsibility;?>" readonly/></label>
            <br>
            <label> Application mode<input type="text" name="application_mode" size="100" value="<?php echo $detail->How_attack_was_done;?>" readonly/></label>
            <br>
            <label> Incidents' duration. Hazard duration can also be considered<input type="text" name="insident_duration" size="100" value="<?php echo $detail->Incidents_duration;?>" readonly/></label>
            </div>
            
            <div>
            <label> Extend of impact/effect -Static/Dynamic over time<input type="text" name="extend_of_impact" size="100" value="<?php echo $detail->Extend_of_impact_effect;?>" readonly/></label>
            <br>
            <label> Casualties per phase (if more than one phase) - Triage (if needed)<input type="text" name="casualties_per_phase" size="100" value="<?php echo $detail->Casualties_per_phase_Triage;?>" readonly/></label>
            <br>
            <label> Mitigating and Excerbating Conditions<input type="text" name="mitigating" size="100" value="<?php echo $detail->Mitigating_and_Excerbating_Conditions;?>" readonly/></label>
            <br>
            <label> Target (if not an accident). Short description and conditions<input type="text" name="target" size="100" value="<?php echo $detail->Target_Short_description_and_conditions;?>" readonly/></label>
            </div>

            <div>
            <label> Routes of Escape/Possibility of Confine and/or manage Contaminated Persons/Supporting services and Infrastructures<input type="text" name="routes_of_escape" size="100" value="<?php echo $detail->Routes_of_Escape_Supporting_services_infrastructures;?>" readonly/></label>
            <br>
            <label> Level of technology used by the attackers nature of agents , dispersion model<input type="text" name="technology_used" size="100" value="<?php echo $detail->Level_of_technology_used_by_the_attackers;?>" readonly/></label>
            </div>
            <label> List of stakehoders involved<input type="text" name="stakeholders" size="100" value="<?php echo $detail->List_of_stakeholders_involved;?>" readonly/></label>
            
            <div>
            <label> Adequancy of Where existing capacities/capabilities (including joint cooperation). adequate? Please describe<input type="text" name="adequancy" size="100" value="<?php echo $detail->Adequancy_of_where_existing_capacities_capabilities;?>" readonly/></label>
            <br>
            <label> Interoperability of Equipment -SOP's-PPE- Chain of Command?<input type="text" name="interoperability" size="150" value="<?php echo $detail->Interoperability_of_equipment_sops_ppe_chain_of_command;?>" readonly/></label>
            <br>
            <label> Was Is the incident event included in risk assessment studies in place?<input type="text" name="event_included" size="100" value="<?php echo $detail->Was_is_the_incident_event_included_in_risk_assessment_studies;?>" readonly/></label>
            <br>
            <label> Is there in place a strategy/emergency plans for similar incidents? Please describe shortly.<input type="text" name="emergency_plan" size="100" value="<?php echo $detail->Is_there_in_place_a_strategy_emergency_plan_for_similar_incident;?>" readonly/></label>
            <br>
            <label> Was the incident such an event simulated in exercise(s)?<input type="text" name="event_in_exercises" size="100" value="<?php echo $detail->Was_the_incident_such_an_event_simulated_in_exercises;?>" readonly/></label>
            </div>

            <label> List of stakehoders involved in the exercise(s)<input type="text" name="stakeholders_involved" size="100" value="<?php echo $detail->List_of_stakeholders_involved_in_the_exercise;?>" readonly/></label>
            
            <div>
            <label> Existence/following of Standard Joint Operational Procedures<input type="text" name="existing_operations" size="100" value="<?php echo $detail->Existence_following_of_standard_joint_operational_procedures;?>" readonly/></label>
            <br>
            <label> Next Steps(done or foreseen) to imrpove capacities/capabilities(including joint cooperation) to tackle such risks. Please describe shortly<input type="text" name="steps_to_tackle_risk" size="100" value="<?php echo $detail->Next_steps_to_improve_capacities_capabilities_to_takle_such_risk;?>" readonly/></label>
            <br>
            <label> Validation or Evaluation of the inserted data has to be done for accuracy, mistakes relevance<input type="text" name="evaluate_data" size="100" value="<?php echo $detail->Evaluate_of_inserted_data_has_to_be_done_for_accuracy;?>" readonly/></label>
            <br>
            <label> Rehabilitation of Environment/Management of the agent/decontamination of Critical and Vital and Expensive Equipment/Forensics Analysis/Bilateral Agreement for Specialized Labs in Situ/Contaminated Water Management<input type="text" name="Rehabilitation_of_environment" size="100" value="<?php echo $detail->Rehabilitation_of_environment;?>" readonly/></label>
            
            </div>
       <?php }
    }
?>