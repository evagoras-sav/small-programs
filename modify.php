<?php
    global $wpdb;

    $myrows = $wpdb->get_results( "SELECT * FROM wpab_events INNER JOIN wpab_type_of_attack ON wpab_events.type_id=wpab_type_of_attack.type_id");
    
?>

<table class="attacks-table" id="attacks-table">
    <thead>
            <tr>
                <th>Name of attack</th>
                <th>Type of attack</th>
                <th>Short Description</th>
                <th>Modify</th>
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
                <td><input type="submit" name="edit" value="Edit"></td>
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
    </tbody>
</table>

<?php 
    if (isset($_POST['edit']))
    {
        $idNo= $_POST["id"];
        $load_attack = $wpdb->get_results("SELECT * FROM wpab_events INNER JOIN wpab_type_of_attack ON wpab_events.type_id=wpab_type_of_attack.type_id WHERE ID = $idNo");
        
        foreach($load_attack as $detail)
        {?>
            <form action="" method="POST">
            <div>   
            <label>ID<input type="text" name="id" value="<?php echo $detail->ID;?>" readonly/></label>
            <br>
            <label> Name_of_attack<input type="text" name="attack_name" value="<?php echo $detail->Name_of_attack;?>" /></label>
            <br>
            <label> Type of attack<input type="text" name="type_of_attack" value="<?php echo $detail->type_of_attack;?>" readonly/></label>
            <?php 
                $table_name = "wpab_type_of_attack";
                $myrows = $wpdb->get_results( "SELECT * FROM $table_name");
                echo "<td><select name=type_id>";
                echo "<option value=$details->type_id disabled readonly>$details->type_of_attack</option>";
                foreach ($myrows as $details) 
                {
                    //echo '<option>'.$details->id.'</option>';
                    echo "<option value=$details->type_id>$details->type_of_attack</option>";
                    $val = $_GET["value"];
                } 
                echo "</select></td>";
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
            <label>Lat: <input type="text" name="lat" id="lat" value="<?php echo $detail->Attack_lat;?>"/></label>
            <label>Long: <input type="text" name="lng" id="lng" value="<?php echo $detail->Attack_long;?>" /></label>

            <br>

            <label> Short_Description<input type="text" name="attack_description" size="100" value="<?php echo $detail->Short_Description;?>" /></label>
            </div>

            <div>
            <label> Attacker(s) and entity that claimed responsibility (if applicable)<input type ="text" name="attackers"  size="100" value="<?php echo $detail->Attackers_and_entity_that_claimed_responsibility;?>" /></label>
            <br>
            <label> Application mode<input type="text" name="application_mode" size="100" value="<?php echo $detail->How_attack_was_done;?>" /></label>
            <br>
            <label> Incidents' duration. Hazard duration can also be considered<input type="text" name="insident_duration" size="100" value="<?php echo $detail->Incidents_duration;?>" /></label>
            </div>
            
            <div>
            <label> Extend of impact/effect -Static/Dynamic over time<input type="text" name="extend_of_impact" size="100" value="<?php echo $detail->Extend_of_impact_effect;?>" /></label>
            <br>
            <label> Casualties per phase (if more than one phase) - Triage (if needed)<input type="text" name="casualties_per_phase" size="100" value="<?php echo $detail->Casualties_per_phase_Triage;?>" /></label>
            <br>
            <label> Mitigating and Excerbating Conditions<input type="text" name="mitigating" size="100" value="<?php echo $detail->Mitigating_and_Excerbating_Conditions;?>" /></label>
            <br>
            <label> Target (if not an accident). Short description and conditions<input type="text" name="target" size="100" value="<?php echo $detail->Target_Short_description_and_conditions;?>" /></label>
            </div>

            <div>
            <label> Routes of Escape/Possibility of Confine and/or manage Contaminated Persons/Supporting services and Infrastructures<input type="text" name="routes_of_escape" size="100" value="<?php echo $detail->Routes_of_Escape_Supporting_services_infrastructures;?>" /></label>
            <br>
            <label> Level of technology used by the attackers nature of agents , dispersion model<input type="text" name="technology_used" size="100" value="<?php echo $detail->Level_of_technology_used_by_the_attackers;?>" /></label>
            </div>
            <label> List of stakehoders involved<input type="text" name="stakeholders" size="100" value="<?php echo $detail->List_of_stakeholders_involved;?>" /></label>
            
            <div>
            <label> Adequancy of Where existing capacities/capabilities (including joint cooperation). adequate? Please describe<input type="text" name="adequancy" size="100" value="<?php echo $detail->Adequancy_of_where_existing_capacities_capabilities;?>" /></label>
            <br>
            <label> Interoperability of Equipment -SOP's-PPE- Chain of Command?<input type="text" name="interoperability" size="150" value="<?php echo $detail->Interoperability_of_equipment_sops_ppe_chain_of_command;?>" /></label>
            <br>
            <label> Was Is the incident event included in risk assessment studies in place?<input type="text" name="event_included" size="100" value="<?php echo $detail->Was_is_the_incident_event_included_in_risk_assessment_studies;?>" /></label>
            <br>
            <label> Is there in place a strategy/emergency plans for similar incidents? Please describe shortly.<input type="text" name="emergency_plan" size="100" value="<?php echo $detail->Is_there_in_place_a_strategy_emergency_plan_for_similar_incident;?>" /></label>
            <br>
            <label> Was the incident such an event simulated in exercise(s)?<input type="text" name="event_in_exercises" size="100" value="<?php echo $detail->Was_the_incident_such_an_event_simulated_in_exercises;?>" /></label>
            </div>

            <label> List of stakehoders involved in the exercise(s)<input type="text" name="stakeholders_involved" size="100" value="<?php echo $detail->List_of_stakeholders_involved_in_the_exercise;?>" /></label>
            
            <div>
            <label> Existence/following of Standard Joint Operational Procedures<input type="text" name="existing_operations" size="100" value="<?php echo $detail->Existence_following_of_standard_joint_operational_procedures;?>" /></label>
            <br>
            <label> Next Steps(done or foreseen) to imrpove capacities/capabilities(including joint cooperation) to tackle such risks. Please describe shortly<input type="text" name="steps_to_tackle_risk" size="100" value="<?php echo $detail->Next_steps_to_improve_capacities_capabilities_to_takle_such_risk;?>" /></label>
            <br>
            <label> Validation or Evaluation of the inserted data has to be done for accuracy, mistakes relevance<input type="text" name="evaluate_data" size="100" value="<?php echo $detail->Evaluate_of_inserted_data_has_to_be_done_for_accuracy;?>" /></label>
            <br>
            <label> Rehabilitation of Environment/Management of the agent/decontamination of Critical and Vital and Expensive Equipment/Forensics Analysis/Bilateral Agreement for Specialized Labs in Situ/Contaminated Water Management<input type="text" name="Rehabilitation_of_environment" size="100" value="<?php echo $detail->Rehabilitation_of_environment;?>" /></label>
            
            </div>
            <input type="submit" name="modify"  value="Modify"/>
            </form>
       <?php }
    }

       if (isset($_POST['modify']))
        {
                $idNo=$_POST['id'];
                $attack_name = $_POST["attack_name"];
                $attack_lat = $_POST["lat"];
                $attack_long = $_POST["lng"];
                $short_descr = $_POST["attack_description"];
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
                $type_id=$_POST["type_id"];
                

                $m_query = $wpdb->update( 
                    'wpab_events', 
                    array( 
                        'Name_of_attack' => $attack_name,	// string
                        'Attack_lat' => $attack_lat, // string
                        'Attack_long' => $attack_long,
                        'Short_Description' => $short_descr, 
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
                    ), 
                    array( 'ID' => $idNo ), 
                    array( 
                        '%s',	// value1
                        '%f', '%f',//value(number)
                        '%s',	// value2(string)
                        '%s', '%s', '%s','%s',
                        '%s', '%s', '%s', '%s', '%s',
                        '%s', '%s', '%s', '%s', '%s',
                        '%s', '%s', '%s', '%s', '%s',
                        '%s',
                        '%d'
                    ), 
                    array( '%d' ) 
                );

               if($m_query)
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
                                    <th>Name of attack</th>
                                    <th>Type of attack</th>
                                    <th>Short Description</th>
                                    <th>Modify</th>
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
                                    <td><input type="submit" name="edit" value="Edit"></td>
                                </form>
                                </tr>
                        </tbody>
                <?php       } ?>    
        </table>
            <?php echo "Updated";?>
        <?php    }else echo "Failed";
    }?>