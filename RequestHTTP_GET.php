 <?php 

function retorna_topicos($array_topicos_total, $repos, $org){
   $curl = curl_init();
   $q =  curl_escape($curl ,'SHOW MEASUREMENTS With spaces');
   $url = "https://api.github.com/repos/{$org}/{$repos}/topics";

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
   // Send the request & save response to $resp
   $resp = curl_exec($curl);
   if( !$resp ){
      // log this Curl ERROR: 
      echo curl_error($curl) ;
   }

   $character = json_decode($resp,TRUE);
   

   foreach ( $character as $valor){
         foreach ( $valor as $value){
            # a função in_array, verifica se existe o repositório no vetor
         if (in_array($value, $array_topicos_total)) { 
         }
         else{
            $array_topicos_total[] = $value;
         }
      }
   }
   return $array_topicos_total;
   
}
##
# PROGRAMA PRINCIPAL
# Programa capaz de retornar um json com lista de TOPICS dentro de uma Organização
# Percorre todas os repositórios e cria uma lista 
##

$curl = curl_init();
$q =  curl_escape($curl ,'SHOW MEASUREMENTS With spaces');
##
# Basta substituir sosbrumadinho pelo nome da sua organização
# O restante do processo é automático
##
//$url = "https://api.github.com/users/sosbrumadinho/repos";
//$url = "https://api.github.com/search/users?q=sosbrumadinho";
//$url = "https://api.github.com/search/issues?q=windows+label:bug+language:python+state:open&sort=created&order=asc";
$url = "https://api.github.com/search/repositories?q=topic:csharp+org:sosbrumadinho";


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
print_r ($character);
/*
##
# Tranforma o arquivo json em um vetor
##
$character = json_decode($resp,TRUE);

##
# A cada iteração do for, entramos em um repositório da organização através da função retorna_topicos
# que recebe como argumento, uma lista de tópicos que será incrementada, o nome do repositório e o nome
# da organização. 
##
$newarray = array();
foreach ($character as $valor){
   # Essa função é responsável por percorrer os tópicos do repositório e caso não estejam na lista
   # são inseridos
   $newarray = retorna_topicos ($newarray, $valor["name"], $pieces[4]);
}

##
# Printa na tela um json da lista com os repositórios. 
##
print_r ($newarray);

*/


 ?>