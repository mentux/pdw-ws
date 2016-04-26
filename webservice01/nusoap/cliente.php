<?php
// Observacoes:
// Comentar a extensao php_soap
// Baixar o arquivo nusoap.php

// inclusao do arquivo de classes NuSOAP
require_once 'lib/nusoap.php';

// criacao de uma instancia do cliente
try {
    $client = new nusoap_client('http://localhost/pdw/pdw-ws/webservice01/nusoap/server.php');
} catch (Exception $e) {
    echo get_class($e).' thrown within the exception handler. <hr> Message: '.$e->getMessage().' on line '.$e->getLine();
}

// chamada do m�todo SOAP
$result = $client->call('helloWorld', array('Tormen Juca'));
//var_dump($result);
// exibe o resultado
print_r($result);

// OPCIONAL : exibe a requisicao e a resposta

echo '<h2>Requisicao</h2>';
echo '<pre>'.htmlspecialchars($client->request).'</pre>';
echo '<h2>Resposta</h2>';
echo '<pre>'.htmlspecialchars($client->response).'</pre>';
// Exibe mensagens para debug
echo '<h2>Debug</h2>';
echo '<pre>'.htmlspecialchars($client->debug_str).'</pre>';
/**/
?>
