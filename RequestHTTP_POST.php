<?php


$tag = $_POST["tag"];
echo $tag;



$curl = curl_init();
$q =  curl_escape($curl ,'SHOW MEASUREMENTS With spaces');
##
# Basta substituir sosbrumadinho pelo nome da sua organização
# O restante do processo é automático
##
//$url = "https://api.github.com/users/sosbrumadinho/repos";
//$url = "https://api.github.com/search/users?q=sosbrumadinho";
//$url = "https://api.github.com/search/issues?q=windows+label:bug+language:python+state:open&sort=created&order=asc";
$url = "https://api.github.com/search/repositories?q=topic:{$tag}+org:sosbrumadinho";


$pieces = explode("/", $url);
//echo $pieces[4];

##
# Preparação da requisição HTTP
##
curl_setopt_array($curl, array(
   CURLOPT_RETURNTRANSFER => 1,
   CURLOPT_URL => $url ,
   CURLOPT_SSL_VERIFYPEER => false, // If You have https://
   CURLOPT_SSL_VERIFYHOST => false,
   CURLOPT_CUSTOMREQUEST => "GET",
   CURLOPT_HTTPHEADER => array("Accept:application/vnd.github.mercy-preview+json", "User-Agent: leothimoteo"),
  
));

# Send the request & save response to $resp
$resp = curl_exec($curl);
if( !$resp ){
   // log this Curl ERROR: 
   echo curl_error($curl) ;
}

curl_close($curl);
$character = json_decode($resp,TRUE);

foreach ($character as $valor){
    foreach ( $valor as $value){
        print $value["html_url"];
        print "=====";
 }
}


//print_r ($character);
?>