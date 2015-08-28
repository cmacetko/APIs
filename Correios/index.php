<?
$Querys				= "";
$Querys				.= "nCdEmpresa=";
$Querys				.= "&sDsSenha=";
$Querys				.= "&nCdServico=40010";
$Querys				.= "&sCepOrigem=01002902";
$Querys				.= "&sCepDestino=01310000";
$Querys				.= "&nVlPeso=1";
$Querys				.= "&nCdFormato=1";
$Querys				.= "&nVlComprimento=16";
$Querys				.= "&nVlAltura=2";
$Querys				.= "&nVlLargura=11";
$Querys				.= "&nVlDiametro=0";
$Querys				.= "&sCdMaoPropria=n";
$Querys				.= "&nVlValorDeclarado=100";
$Querys				.= "&sCdAvisoRecebimento=n";
$Querys				.= "&StrRetorno=xml";

try {

	$URLcorreios 		= "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?" . $Querys;
	$GetCorreios		= file_get_contents($URLcorreios);
	
	if( strlen($GetCorreios) >= 10 )
	{
	
		$DadosCorreios 			= simplexml_load_string($GetCorreios);
		
		$DadValor 				= $DadosCorreios->xpath('cServico/Valor');
		$DadValor				= $DadValor[0];
		
		$DadPrazoEntrega		= $DadosCorreios->xpath('cServico/PrazoEntrega');
		$DadPrazoEntrega		= intval($DadPrazoEntrega[0]);
		
		$DadEntregaDomiciliar	= $DadosCorreios->xpath('cServico/EntregaDomiciliar');
		$DadEntregaDomiciliar	= $DadEntregaDomiciliar[0];
		
		$DadEntregaSabado		= $DadosCorreios->xpath('cServico/EntregaSabado');
		$DadEntregaSabado		= $DadEntregaSabado[0];
		
	}else{
		
		$DadValor 				= 0;
		$DadPrazoEntrega		= 0;
		$DadEntregaDomiciliar	= "";
		$DadEntregaSabado		= "";
		
	}
	
} catch (Exception $e) {
	
	$DadValor 				= 0;
	$DadPrazoEntrega		= 0;
	$DadEntregaDomiciliar	= "";
	$DadEntregaSabado		= "";
	
}

echo "Valor do Frete: " . $DadValor . "<br>";
echo "Prazo de Entrega: " . $DadPrazoEntrega . "<br>";
echo "Entrega Domiciliar? " . $DadEntregaDomiciliar . "<br>";
echo "Entrega Sábado? " . $DadEntregaSabado . "<br>";
?>