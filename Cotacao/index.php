<?
$XMLRead			= simplexml_load_file("http://economia.uol.com.br/cotacoes/xml/cotacoesmidia.jhtm");

foreach( $XMLRead->cotacao as $DadLinha )
{
	
	switch($DadLinha->attributes()->nome)
	{
		
		case "Dolar comercial":
		case "Dolar paralelo":
		case "Dolar turismo":
		case "Euro":
		
			echo "<h1>" . $DadLinha->attributes()->nome . "</h1>";
			
			echo "<p>";
			echo "<b>Valor Compra: " . $DadLinha->indice[0] . "<br>";
			echo "<b>Valor Venda: " . $DadLinha->indice[0] . "<br>";
			echo "<b>Variacao: " . $DadLinha->indice[0] . "<br>";
			echo "</p>";
			
		break;
		
		case "Bovespa":
		
			echo "<h1>" . $DadLinha->attributes()->nome . "</h1>";
			
			echo "<p>";
			echo "<b>Indice: " . $DadLinha->indice . "<br>";
			echo "<b>Pontos: " . $DadLinha->pontos. "<br>";
			echo "</p>";
			
		break;
		
		case "Nasdaq":
		case "Japão":
		case "Londres":
			
			echo "<h1>" . $DadLinha->attributes()->nome . "</h1>";
			
			echo "<p>";
			echo "<b>Indice: " . $DadLinha->indice . "<br>";
			echo "</p>";
			
		break;
		
	}

}
?>