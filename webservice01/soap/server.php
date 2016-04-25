<?php
// Observacoes:
// Adicionar a extensao php_soap no php.ini

include_once('../Constants.php');
//criacao de uma instancia do servidor (coloque o endereco na sua maquina local)
$server = new SoapServer(null, array('uri' => Constants::URL_LOCAL_SOAP));

//definicao dos métodos disponíveis para uso do servico ( vai retornar apenas a frase Hello World + parametro que receber + ! )
	  function helloWorld($name) {
			return 'Hello World '.$name.'!';
	  }

//registro do servico na instania
$server->addFunction("helloWorld");

// chamada do metodo para atender as requisicoes do servico
// se a chamada for um POST executa o método, caso contrario, apenas mostra a lista das funcoes disponiveis
if ($_SERVER["REQUEST_METHOD"]== "POST") {
		$server->handle();
} else {
	$functions = $server->getFunctions();
	print "Metodos disponiveis no servico:";
	print "<hr />";
	print " <ul>";
	foreach ($functions as $func) {
		print "<li>$func</li>";
	}
	print "</ul>";
}
?>
