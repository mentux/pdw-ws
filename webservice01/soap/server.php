<?php
// Observacoes:
// Adicionar a extensao php_soap no php.ini

//criacao de uma instancia do servidor (coloque o endereco na sua maquina local)
$server = new SoapServer(null, array('uri' => "http://127.0.0.1:8081/webservice01/soap/"));  // ex.: http://localhost/soap/

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
	print "Métodos disponíveis no serviço:";
	print "<hr />";
	print " <ul>";
	foreach ($functions as $func) {
		print "<li>$func</li>";
	}
	print "</ul>";
}
?>
