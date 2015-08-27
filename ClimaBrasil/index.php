<?
$GetRet		= file_get_contents("http://developers.agenciaideias.com.br/tempo/json/brusque-sc");
$DadReg		= json_decode($GetRet, true);

print_r($DadReg);
?>