<!doctype html>
<html>
<head>

    <meta charset="utf-8">
	<link href="http://bootstrapdocs.com/v3.3.5/docs//dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container">

<?
$Querys				= "";
$Querys				.= "Usuario=ECT";
$Querys				.= "&Senha=SRO";
$Querys				.= "&Tipo=L";
$Querys				.= "&Resultado=T";
$Querys				.= "&Objetos=PI827208964BR";

try {

	$URLcorreios 		= "http://websro.correios.com.br/sro_bin/sroii_xml.eventos?" . $Querys;
	$GetCorreios		= file_get_contents($URLcorreios);
	$DadosCorreios 		= simplexml_load_string($GetCorreios);
	
	foreach( $DadosCorreios->objeto as $DadObjeto )
	{
		
		?>
        
        <h1>Objeto: <?=$DadObjeto->numero?></h1>
        
        <table class="table table-bordered">
          <thead>
          	<tr>
              <th align="left">tipo</th>
              <th align="left">status</th>
              <th align="left">data</th>
              <th align="left">hora</th>
              <th align="left">descricao</th>
              <th align="left">local</th>
              <th align="left">cidade</th>
              <th align="left">uf</th>
              <th align="left">destino</th>
            </tr>
          </thead>
          <tbody>
          	<? foreach( $DadObjeto->evento as $DadEvento ){ ?>
            <tr>
              <td align="left"><?=$DadEvento->tipo?></td>
              <td align="left"><?=$DadEvento->status?></td>
              <td align="left"><?=$DadEvento->data?></td>
              <td align="left"><?=$DadEvento->hora?></td>
              <td align="left"><?=$DadEvento->descricao?></td>
              <td align="left"><?=$DadEvento->local?></td>
              <td align="left"><?=$DadEvento->cidade?></td>
              <td align="left"><?=$DadEvento->uf?></td>
              <td align="left">
			  	
				<? if( isset($DadEvento->destino) ){ ?>
                	
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td width="100" align="left">local</td>
                          <td align="left"><?=$DadEvento->destino->local?></td>
                        </tr>
                        <tr>
                          <td align="left">cidade</td>
                          <td align="left"><?=$DadEvento->destino->cidade?></td>
                        </tr>
                        <tr>
                          <td align="left">bairro</td>
                          <td align="left"><?=$DadEvento->destino->bairro?></td>
                        </tr>
                        <tr>
                          <td align="left">uf</td>
                          <td align="left"><?=$DadEvento->destino->uf?></td>
                        </tr>
                      </tbody>
                    </table>
                
                <? }else{ ?>
                	
                    --//--
                    
				<? } ?>
                
              </td>
              
            </tr>
            <? } ?>
          </tbody>
        </table>
        
        <hr />
        
        <?
		
	}
	
} catch (Exception $e) {
	
	echo "FALHA: " . $i;
	
}
?>
</div>

</body>
</html>