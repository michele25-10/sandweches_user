<?php
function logon($data)
    {
        $url = 'http://localhost/webApp_sandweches/food-api/API/user/registration.php';

        $curl = curl_init($url);    //inizializza una nuova sessione di cUrl
        //Curl contiene il return del curl_init 

        curl_setopt($curl, CURLOPT_URL, $url); // setta l'url 
        curl_setopt($curl, CURLOPT_POST, true); // specifica che è una post request
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // ritorna il risultato come stringa


        $headers = array(
            "Content-Type: application/json",
            "Content-Lenght: 0",
        );


        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); // setta gli headers della request

        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

        $responseJson = curl_exec($curl);   //eseguo

        curl_close($curl);  //chiudo sessione

        $response = json_decode($responseJson);     //decodifico la response dal json

    var_dump($response->message); 
        
        if ($response->message == "1")        //response == true vuol dire sessione senza errori
        {
            header('Location: ../index.php');
        }
        else
        {
            return -1;
        }
    }
?>