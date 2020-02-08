<?php
    $url ='https://programming-quotes-api.herokuapp.com/quotes/random';
   include_once "../curl.php";
   $curl_obj=curl($url);
       $json_objekat=json_decode($curl_obj);
   
?>    

<p id="quote"><i>
<?php 
    echo $json_objekat->en;
?>
</i></p>
<div id="buttonGenerate">
    <button id="generate" onclick="generate_quote()">Generate quote</button>
</div>