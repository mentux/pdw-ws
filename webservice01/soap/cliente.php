<?php
// Observacoes:
// Adicionar a extensao php_soap no php.ini
include_once('../Constants.php');
// configurando o objeto executor cliente com o endereco do servidor
$client = new SoapClient(null, array(
	'location' => Constants::URL_LOCAL_SOAP_SERVER,  // ex.: http://localhost/soap/server.php
	'uri' => Constants::URL_LOCAL_SOAP,  				// ex.: http://localhost/soap/
	'trace' => 1));

// chamada do servico SOAP
$result = $client->helloWorld('Tormen');

// verifica erros na execucao do servico e exibe o resultado
if (is_soap_fault($result)){
	trigger_error("SOAP Fault: (faultcode: {$result->faultcode},
	faultstring: {$result->faulstring})", E_ERROR);
}else{
	echo "Resultado Encontrado: ";
	print_r($result);
}
?>
