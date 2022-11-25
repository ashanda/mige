<?php
include('../Config/Connection.php');
if(isset($_POST['input_value']))
{
    $input_value=$_POST['input_value'];
    //$input_value = "Dharmani Apps";
    $input_value = str_replace(" ", "+", $input_value);
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://maps.googleapis.com/maps/api/place/queryautocomplete/json?key='.Google_Key.'&input='.$input_value,
    CURLOPT_POST => 1,
    ));
    // Send the request & save response to $resp
    $response = curl_exec($curl);
    $response = json_decode($response);
    // Close request to clear up some resources
    curl_close($curl);
    $predictions = $response->predictions;
    $locations = array();

    foreach ($predictions as $key) 
    {
        if(array_key_exists('place_id', $key))
        {
            $latitude = '';
            $state = '';
            $postal_code = '';
            $longitude = '';
            $data['location_description'] = $key->description;
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://maps.googleapis.com/maps/api/place/details/json?place_id='.$key->place_id.'&fields=name,geometry,formatted_address,photo,website,plus_code,address_component&key='.Google_Key,
            CURLOPT_POST => 1,
            ));
            // Send the request & save response to $resp
            $place_response = curl_exec($curl);
            $place_response = json_decode($place_response);
            // Close request to clear up some resources
            curl_close($curl);
            $latitude = $place_response->result->geometry->location->lat;
            $longitude = $place_response->result->geometry->location->lng;

            for ($i=0; $i<count($place_response->result->address_components); $i++) 
            {
                for ($b=0;$b<count($place_response->result->address_components[$i]->types);$b++) {

                //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                    
                    if ($place_response->result->address_components[$i]->types[$b] == "administrative_area_level_1") {
                        //this is the object you are looking for
                        $state= $place_response->result->address_components[$i]->long_name;
                    }
                    if ($place_response->result->address_components[$i]->types[$b] == "postal_code") {
                        //this is the object you are looking for
                        $postal_code= $place_response->result->address_components[$i]->long_name;
                    }
                }
            }
            $data['place_id'] = $key->place_id;
            $data['state'] = $state;
            $data['zip_code'] = $postal_code;
            $data['latitude'] = (string)$latitude;
            $data['longitude'] = (string)$longitude;
            array_push($locations, $data);
        }
        
    }
    echo json_encode(array('status'=>1,'locations'=>$locations,'count'=>count($locations)));
    exit();
}
?>