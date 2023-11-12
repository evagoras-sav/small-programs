<?php         <?php
                global $wpdb;
                if(isset($_POST['modify']))
                {
                    $data_array= array(
                    $ID= '$_POST['idNo']';            
                    $Name_of_attack ='$_POST["attack_name"]';
                    $Short_Description = '$_POST["attack_description"]';
                    $Attackers_and_entity_that_claimed_responsibility = '$_POST["attackers"]';
                    $How_attack_was_done = '$_POST["application_mode"]';
                    $Incidents_duration = '$_POST["insident_duration"]';
                    $Extend_of_impact_effect = '$_POST["extend_of_impact"]';
                    $Casualties_per_phase_Triage = '$_POST["casualties_per_phase"]';
                    $Mitigating_and_Excerbating_Conditions = '$_POST["mitigating"]';
                    $Target_Short_description_and_conditions = '$_POST["target"]';
                    $Routes_of_Escape_Supporting_services_infrastructures = '$_POST["routes_of_escape"]';
                    $Level_of_technology_used_by_the_attackers = '$_POST["technology_used"]';
                    $List_of_stakeholders_involved = '$_POST["stakeholders"]';
                    $Adequancy_of_where_existing_capacities_capabilities = '$_POST["adequancy"]';
                    $Interoperability_of_equipment_sops_ppe_chain_of_command = '$_POST["interoperability"]';
                    $Was_is_the_incident_event_included_in_risk_assessment_studies = '$_POST["event_included"]';
                    $Is_there_in_place_a_strategy_emergency_plan_for_similar_incident = '$_POST["emergency_plan"]';
                    $Was_the_incident_such_an_event_simulated_in_exercises = '$_POST["event_in_exercises"]';
                    $List_of_stakeholders_involved_in_the_exercise = '$_POST["stakeholders_involved"]';
                    $Existence_following_of_standard_joint_operational_procedures = '$_POST["existing_operations"]';
                    $Next_steps_to_improve_capacities_capabilities_to_takle_such_risk = '$_POST["steps_to_tackle_risk"]';
                    $Evaluate_of_inserted_data_has_to_be_done_for_accuracy = '$_POST["evaluate_data"]';
                    $Rehabilitation_of_environment = '$_POST["Rehabilitation_of_environment"]';
                    $type_id = '$_POST["type_id"]';


                    $data_where =  array(
                    

                             
                ?>
        ?>