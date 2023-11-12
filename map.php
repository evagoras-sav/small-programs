<?php
    global $wpdb;

    $myrows = $wpdb->get_results( "SELECT * FROM wpab_events INNER JOIN wpab_type_of_attack ON wpab_events.type_id=wpab_type_of_attack.type_id WHERE Attack_lat <> 0");


    if ( ! $myrows ) {
        echo mysql_error();
        die;
    }
    
    // echo $wpdb->num_rows;
    //DATA LAT/LONG
    // echo "var LatLong = [";
    
    // foreach ($myrows as $attack_info)
    // {
    //     echo "[",$attack_info->Attack_lat,",",$attack_info->Attack_long,"]";
    // }
    // echo "];";
?>


<div id="mapid" style="width: 1000px; height: 600px;"></div>
<script>
	var map = L.map('mapid').setView([35.1753082, 33.3642006], 4);


	L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
	maxZoom: 17,
	attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
	}).addTo(map);
	
    //Load full details of attack
    function getAttackData(){
        <?php 
            foreach ($myrows as $full_details)
            {?>
                var aname = <?php echo '"',$full_details->Name_of_attack,'"'?>;
                var atype = <?php echo '"',$full_details->type_of_attack,'"'?>;
                var adescr = <?php echo '"',$full_details->Short_Description,'"'?>;
                var aattackers = <?php echo '"',$full_details->Attackers_and_entity_that_claimed_responsibility,'"'?>;
                var ahow = <?php echo '"',$full_details->How_attack_was_done,'"'?>;
                var ainci = <?php echo '"',$full_details->Incidents_duration,'"'?>;
                var aextend = <?php echo '"',$full_details->Extend_of_impact_effect,'"'?>;
                var acasualties = <?php echo '"',$full_details->Casualties_per_phase_Triage,'"'?>;
                var amitigate = <?php echo '"',$full_details->Mitigating_and_Excerbating_Conditions,'"'?>;
                var atarget = <?php echo '"',$full_details->Target_Short_description_and_conditions,'"'?>;
                var aroutes = <?php echo '"',$full_details->Routes_of_Escape_Supporting_services_infrastructures,'"'?>;
                var alevel = <?php echo '"',$full_details->Level_of_technology_used_by_the_attackers,'"'?>;
                var alist = <?php echo '"',$full_details->List_of_stakeholders_involved,'"'?>;
                var aadequancy = <?php echo '"',$full_details->Adequancy_of_where_existing_capacities_capabilities,'"'?>;
                var aintero = <?php echo '"',$full_details->Interoperability_of_equipment_sops_ppe_chain_of_command,'"'?>;
                var awas = <?php echo '"',$full_details->Was_is_the_incident_event_included_in_risk_assessment_studies,'"'?>;
                var aplace = <?php echo '"',$full_details->Is_there_in_place_a_strategy_emergency_plan_for_similar_incident,'"'?>;
                var aincident = <?php echo '"',$full_details->Was_the_incident_such_an_event_simulated_in_exercises,'"'?>;
                var aexercise = <?php echo '"',$full_details->List_of_stakeholders_involved_in_the_exercise,'"'?>;
                var astandard = <?php echo '"',$full_details->Existence_following_of_standard_joint_operational_procedures,'"'?>;
                var asteps = <?php echo '"',$full_details->Next_steps_to_improve_capacities_capabilities_to_takle_such_risk,'"'?>;
                var aevaluate = <?php echo '"',$full_details->Evaluate_of_inserted_data_has_to_be_done_for_accuracy,'"'?>;
                var arehabilitation = <?php echo '"',$full_details->Rehabilitation_of_environment,'"'?>;
      <?php } ?>
    };        
    

    //Attack-Lat/Long
    var attack_info = [<?php 
        $count = 0;
        foreach ($myrows as $attack_info)
        {
            echo "[",$attack_info->ID, "," ,$attack_info->Attack_lat,",",$attack_info->Attack_long,"]";
            echo ",";
            $count=$count+1;
            // if ($count-2)
            // {
            //     echo ",";
            // }
        }
        ?>];
        

    //Attack-Name/type of attack
    var info_array = [<?php 
        $count2 = 0;
        foreach ($myrows as $popup_info)
        {
            echo '"',$popup_info->ID, ',' ,$popup_info->Name_of_attack, ',' ,$popup_info->type_of_attack,'"';
            echo ",";
            $count2=$count2+1;
            // if ($count2-2)
            // {
            //     echo ",";
            // }
        }
        ?>];
        console.log(info_array);

    //Populate Markers
    for (var i = 0; i < attack_info.length; i++) {
        var marker = new L.marker([attack_info[i][1],attack_info[i][2]],{customId: attack_info[i][0].toString()}).on('click', markerOnClick)
        .bindPopup(info_array[i]).addTo(map);
    };
    

    function markerOnClick(e) 
    {
        document.getElementById("mID").value = +this.options.customId;
        document.getElementById("view").style.display = "block";
         
        var markerID = this.options.customId;

        $.ajax({
            url: "/markerInfo.php", //This is the current doc
            type: "POST",
            dataType:'html', // add json datatype to get json
            data: ({'markerID': markerID}),
            success: function(data){
                console.log(data);
                $('#attacks_map').html(data);
            }
        });  
    };


</script>

<form action="" method="post">

    <div id = "response">
    <table id="attacks_map">
      
    </table>
    <input type="hidden" name="mID" id="mID"/>
    <input type="submit" name="view" id="view" value="Load More" hidden/>
    </div>

</form>

<?php 
    if (isset($_POST['view']))
    {
        $idNo= $_POST["mID"];
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
    <?php  }
    }?>