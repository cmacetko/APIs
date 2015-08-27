<?
$Querys				 = "http://jadlog.com.br/JadlogEdiWs/services/ValorFreteBean?method=valorar";
$Querys				 .=	"&vModalidade=0";
$Querys				 .=	"&Password=12345678910";
$Querys				 .=	"&vSeguro=N";
$Querys				 .=	"&vVlDec=1";
$Querys				 .=	"&vVlColeta=0";
$Querys				 .=	"&vCepOrig=70150903";
$Querys				 .=	"&vCepDest=07500000";
$Querys				 .=	"&vPeso=1";
$Querys				 .=	"&vFrap=N";
$Querys				 .=	"&vEntrega=D";
$Querys				 .=	"&vCnpj=12345678910";

try {

	$GetCorreios		= file_get_contents($Querys);
	
	$GetCorreios 		= str_replace('<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><soapenv:Body><valorarResponse xmlns=""><ns1:valorarReturn xmlns:ns1="http://jadlogEdiws">', '', $GetCorreios);
	$GetCorreios 		= str_replace('</ns1:valorarReturn></valorarResponse></soapenv:Body></soapenv:Envelope>', '', $GetCorreios);
	$GetCorreios 		= str_replace('<?xml version="1.0" encoding="UTF-8"?>', '', $GetCorreios);
	$GetCorreios 		= str_replace('&gt;', '>', $GetCorreios);
	$GetCorreios 		= str_replace('&lt;', '<', $GetCorreios);
	$GetCorreios 		= str_replace('&quot;', '"', $GetCorreios);
	$GetCorreios 		= str_replace('<string xmlns="http://www.jadlog.com.br/JadlogWebService/services">', '', $GetCorreios);
	$GetCorreios 		= str_replace('</string>', '', $GetCorreios);		
	
	if( strlen($GetCorreios) >= 10 )
	{
	
		$DadosCorreios 		= simplexml_load_string($GetCorreios);
		$DadValor 			= $DadosCorreios->Retorno;
		
	}else{
		
		$DadValor 			= 0;
		
	}
	
} catch (Exception $e) {
	
	$DadValor 			= 0;
	
}

echo $DadValor;
?>