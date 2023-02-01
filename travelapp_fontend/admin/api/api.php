<?php
function delete($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    $result = curl_exec($ch);
    $result = json_decode($result,true);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $result;
}

function get($url){
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$resp = curl_exec($ch);
$record =json_decode($resp,true);
curl_close($ch);
return $record;
 }

 function post($url,$data){
    //$data = array("name" => "Hagrid", "content" => "36");
    $data_string = json_encode($data);
    
    $curl = curl_init($url);
    
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
    );    
    $result = curl_exec($curl);
    curl_close($curl);
    return json_decode($result,true);
    }

    function put($url,$data){
        //$data = array("name" => "Hagrid", "content" => "36");
        $data_string = json_encode($data);
        
        $curl = curl_init($url);
        
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
        );
        
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }

?>