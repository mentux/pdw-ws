<?php
// Observacoes:
// Comentar a extensao php_soap
// Baixar o arquivo nusoap.php

require_once 'lib/nusoap.php';
include_once '../Constants.php';

// Definicao da localizacao do arquivo WSDL
$wsdl = Constants::URL_LOCAL_NUSOAP_WSDL; // ex.: http://localhost/nusoap/server2.php?wsdl
// criacao de uma instancia do cliente
try {
    $client = new nusoap_client($wsdl);//, true);
    // verifica se ocorreu erro na criacao do objeto
} catch (Exception $e) {
    echo get_class($e).' thrown within the exception handler. Message: '.$e->getMessage().' on line '.$e->getLine();
}

$err = $client->getError();
if ($err) {
    echo 'Erro no construtor<pre>'.$err.'</pre>';
}

// chamada do metodo SOAP
$result = $client->call('helloWorld', array('Tormen'));
// verifica se ocorreu falha na chamada do metodo
if ($client->fault) {
    echo 'Falha<pre>'.print_r($result).'</pre>';
} else {
    // verifica se ocorreu erro
    $err = $client->getError();
    if ($err) {
        echo 'Erro<pre>'.$err.'</pre>';
    } else {
        print_r($result);
    }//end_else
}//end_else
;
