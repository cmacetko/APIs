<?
$GetRet		= file_get_contents("http://developers.agenciaideias.com.br/loterias/megasena/json");
$DadReg		= json_decode($GetRet, true);

print_r($DadReg);
?>