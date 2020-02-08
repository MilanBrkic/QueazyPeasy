<?php
    function curl($url){
       
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, false);
        $curl_odgovor = curl_exec($curl);
        curl_close($curl);
        return $curl_odgovor;
        
        
    }

?>