<?php
if ($_POST['Submit'])
{
?>
	<!-- <form action="" method="post">

    <div>   
    <label> Name_of_attack<input type="text" name="attack_name" size="30"/></label>

    <br>
    <label> Type of attack  </label>
    
    <label> Short_Description<input type="text" name="attack_description" size="100"/></label>
    </div>

    <div>
    <label> Attacker(s) and entity that claimed responsibility (if applicable)<input type ="text" name="attackers" size="80"/></label>
    <label> Application mode<input type="text" name="application_mode" size="100"/></label>
    <label> Incidents' duration. Hazard duration can also be considered<input type="text" name="insident_duration" size="80"/></label>
    </div>
    
    <div>
    <label> Extend of impact / effect -Static/Dynamic over time<input type="text" name="extend_of_impact" size="100"/></label>
    <label> Casualties per phase (if more than one phase) - Triage (if needed)<input type="text" name="casualties_per_phase" size="80"/></label>
    <label> Mitigating and Excerbating Conditions<input type="text" name="mitigating" size="80"/></label>
    <label> Target (if not an accident). Short description and conditions<input type="text" name="target" size="100"/></label>
    </div>

    <div>
    <label> Routes of Escape / Possibility of Confine and /or manage Contaminated Persons / Supporting services and Infrastructures<input type="text" name="routes_of_escape" size="100"/></label>
    <label> Level of technology used by the attackers nature of agents , dispersion model<input type="text" name="technology_used" size="100"/></label>
    </div>
    <label> List of stakehoders involved<input type="text" name="stakeholders" size="80"/></label>
    
    <div>
    <label> Adequancy of Where existing capacities / capabilities (including joint cooperation). adequate? Please describe<input type="text" name="adequancy" size="100"/></label>
    <label> Interoperability of Equipment - SOP's - PPE - Chain of Command?<input type="text" name="interoperability" size="80"/></label>
    <label> Was Is the incident event included in risk assessment studies in place?<input type="text" name="event_included" size="80"/></label>
    <label> Is there in place a strategy / emergency plans for similar incidents? Please describe shortly.<input type="text" name="emergency_plan" size="100"/></label>
    <label> Was the incident such an event simulated in exercise(s)?<input type="text" name="event_in_exercises" size="100"/></label>
    </div>

    <label> List of stakehoders involved in the exercise(s)<input type="text" name="stakeholders_involved" size="80"/></label>
    
    <div>
    <label> Existence / following of Standard Joint Operational Procedures<input type="text" name="existing_operations" size="80"/></label>
    <label> Next Steps(done or foreseen) to imrpove capacities/capabilities(including joint cooperation) to tackle such risks. Please describe shortly<input type="text" name="steps_to_tackle_risk" size="100"/></label>
    <label> Validation or Evaluation of the inserted data has to be done for accuracy, mistakes relevance<input type="text" name="evaluate_data" size="80"/></label>
    <label> Rehabilitation of Environment/Management of the agent/decontamination of Critical and Vital and Expensive Equipment/Forensics Analysis/Bilateral Agreement for Specialized Labs in Situ/Contaminated Water Management<input type="text" name="Rehabilitation_of_environment" size="100"/></label>
    
    </div>
	<input type="submit" name="Submit"  value="Submit"/> -->

	<?php

	global $wpdb;

    //$ID = $_POST['id'];
    $Name_of_attack	 = $_POST["attack_name"];
    $Attack_lat = $_POST["lat"];
    $Attack_long = $_POST["lng"];
    $Short_Description = $_POST["attack_description"];
    $Attackers_and_entity_that_claimed_responsibility = $_POST["attackers"];
    $How_attack_was_done = $_POST["application_mode"];
    $Incidents_duration = $_POST["insident_duration"];
    $Extend_of_impact_effect = $_POST["extend_of_impact"];
    $Casualties_per_phase_Triage = $_POST["casualties_per_phase"];
    $Mitigating_and_Excerbating_Conditions = $_POST["mitigating"];
    $Target_Short_description_and_conditions = $_POST["target"];
    $Routes_of_Escape_Supporting_services_infrastructures = $_POST["routes_of_escape"];
    $Level_of_technology_used_by_the_attackers = $_POST["technology_used"];
    $List_of_stakeholders_involved = $_POST["stakeholders"];
    $Adequancy_of_where_existing_capacities_capabilities = $_POST["adequancy"];
    $Interoperability_of_equipment_sops_ppe_chain_of_command = $_POST["interoperability"];
    $Was_is_the_incident_event_included_in_risk_assessment_studies = $_POST["event_included"];
    $Is_there_in_place_a_strategy_emergency_plan_for_similar_incident = $_POST["emergency_plan"];
    $Was_the_incident_such_an_event_simulated_in_exercises = $_POST["event_in_exercises"];
    $List_of_stakeholders_involved_in_the_exercise = $_POST["stakeholders_involved"];
    $Existence_following_of_standard_joint_operational_procedures = $_POST["existing_operations"];
    $Next_steps_to_improve_capacities_capabilities_to_takle_such_risk = $_POST["steps_to_tackle_risk"];
    $Evaluate_of_inserted_data_has_to_be_done_for_accuracy = $_POST["evaluate_data"];
    $Rehabilitation_of_environment = $_POST["Rehabilitation_of_environment"];
    $type_id = $_POST["type_id"];

    if ($wpdb->insert(
        'wpab_events',
        array(
            //'ID' => $ID;
            'Name_of_attack' => $Name_of_attack,
            'Attack_lat' => $Attack_lat,
            'Attack_long' => $Attack_long,
            'Short_Description' => $Short_Description,
            'Attackers_and_entity_that_claimed_responsibility' => $Attackers_and_entity_that_claimed_responsibility,
            'How_attack_was_done' => $How_attack_was_done,
            'Incidents_duration' => $Incidents_duration,
            'Extend_of_impact_effect' => $Extend_of_impact_effect, 
            'Casualties_per_phase_Triage' => $Casualties_per_phase_Triage,
            'Mitigating_and_Excerbating_Conditions' => $Mitigating_and_Excerbating_Conditions, 
            'Target_Short_description_and_conditions' => $Target_Short_description_and_conditions,
            'Routes_of_Escape_Supporting_services_infrastructures' => $Routes_of_Escape_Supporting_services_infrastructures,
            'Level_of_technology_used_by_the_attackers' => $Level_of_technology_used_by_the_attackers, 
            'List_of_stakeholders_involved' => $List_of_stakeholders_involved,
            'Adequancy_of_where_existing_capacities_capabilities' => $Adequancy_of_where_existing_capacities_capabilities, 
            'Interoperability_of_equipment_sops_ppe_chain_of_command' => $Interoperability_of_equipment_sops_ppe_chain_of_command, 
            'Was_is_the_incident_event_included_in_risk_assessment_studies' => $Was_is_the_incident_event_included_in_risk_assessment_studies, 
            'Is_there_in_place_a_strategy_emergency_plan_for_similar_incident' => $Is_there_in_place_a_strategy_emergency_plan_for_similar_incident,
            'Was_the_incident_such_an_event_simulated_in_exercises' => $Was_the_incident_such_an_event_simulated_in_exercises,
            'List_of_stakeholders_involved_in_the_exercise' => $List_of_stakeholders_involved_in_the_exercise,
            'Existence_following_of_standard_joint_operational_procedures' => $Existence_following_of_standard_joint_operational_procedures,
            'Next_steps_to_improve_capacities_capabilities_to_takle_such_risk' => $Next_steps_to_improve_capacities_capabilities_to_takle_such_risk,
            'Evaluate_of_inserted_data_has_to_be_done_for_accuracy' => $Evaluate_of_inserted_data_has_to_be_done_for_accuracy, 
            'Rehabilitation_of_environment' => $Rehabilitation_of_environment,
            'type_id' => $type_id
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
    <div>   
    <label> Name_of_attack<input type="text" name="attack_name" size="30"/></label>
    <br>
    <label> Type of attack  </label>
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
    <label> Location: </label>
    <br>
    
    <!-- Mini map -->
    <div id="mapid" style="width: 400px; height: 400px;"></div>
    
    <script>
        //var cord = [35.1753082, 33.3642006];
        var map = L.map('mapid').setView([35.1753082, 33.3642006], 6);

        L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
        maxZoom: 17,
        attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
        }).addTo(map);

        var lat;
        var lng;
        var theMarker = {};
        var latlong = [];

        map.on('click',function(e){
            lat = e.latlng.lat;
            lng = e.latlng.lng;
        
        //Clear existing marker, 

            if (theMarker != undefined) {
                map.removeLayer(theMarker);
            };

        //Add a marker to show where you clicked.
        theMarker = L.marker([lat,lng]).addTo(map);
        
            document.getElementById("lat").value = lat;
            document.getElementById("lng").value = lng; 
        });
        
    </script>
    

    <br>
    <label>Lat: <input type="text" name="lat" id="lat"/></label>
    <label>Long: <input type="text" name="lng" id="lng"/></label>
    <br>
    <label> Short_Description<input type="text" name="attack_description" size="100"/></label>
    </div>

    <div>
    <label> Attacker(s) and entity that claimed responsibility (if applicable)<input type ="text" name="attackers" size="80"/></label>
    <label> Application mode<input type="text" name="application_mode" size="100"/></label>
    <label> Incidents' duration. Hazard duration can also be considered<input type="text" name="insident_duration" size="80"/></label>
    </div>
    
    <div>
    <label> Extend of impact/effect -Static/Dynamic over time<input type="text" name="extend_of_impact" size="100"/></label>
    <label> Casualties per phase (if more than one phase) - Triage (if needed)<input type="text" name="casualties_per_phase" size="80"/></label>
    <label> Mitigating and Excerbating Conditions<input type="text" name="mitigating" size="80"/></label>
    <label> Target (if not an accident). Short description and conditions<input type="text" name="target" size="100"/></label>
    </div>

    <div>
    <label> Routes of Escape/Possibility of Confine and/or manage Contaminated Persons/Supporting services and Infrastructures<input type="text" name="routes_of_escape" size="100"/></label>
    <label> Level of technology used by the attackers nature of agents , dispersion model<input type="text" name="technology_used" size="100"/></label>
    </div>
    <label> List of stakehoders involved<input type="text" name="stakeholders" size="80"/></label>
    
    <div>
    <label> Adequancy of Where existing capacities/capabilities (including joint cooperation). adequate? Please describe<input type="text" name="adequancy" size="100"/></label>
    <label> Interoperability of Equipment -SOP's-PPE- Chain of Command?<input type="text" name="interoperability" size="80"/></label>
    <label> Was Is the incident event included in risk assessment studies in place?<input type="text" name="event_included" size="80"/></label>
    <label> Is there in place a strategy/emergency plans for similar incidents? Please describe shortly.<input type="text" name="emergency_plan" size="100"/></label>
    <label> Was the incident such an event simulated in exercise(s)?<input type="text" name="event_in_exercises" size="100"/></label>
    </div>

    <label> List of stakehoders involved in the exercise(s)<input type="text" name="stakeholders_involved" size="80"/></label>
    
    <div>
    <label> Existence/following of Standard Joint Operational Procedures<input type="text" name="existing_operations" size="80"/></label>
    <label> Next Steps(done or foreseen) to imrpove capacities/capabilities(including joint cooperation) to tackle such risks. Please describe shortly<input type="text" name="steps_to_tackle_risk" size="100"/></label>
    <label> Validation or Evaluation of the inserted data has to be done for accuracy, mistakes relevance<input type="text" name="evaluate_data" size="80"/></label>
    <label> Rehabilitation of Environment/Management of the agent/decontamination of Critical and Vital and Expensive Equipment/Forensics Analysis/Bilateral Agreement for Specialized Labs in Situ/Contaminated Water Management<input type="text" name="Rehabilitation_of_environment" size="100"/></label>
    
    </div>
	<input type="submit" name="Submit"  value="Submit"/>
</form>
<?php
}
?>