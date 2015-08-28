Consulta o rastreamento de uma encomenda.
Não é necessário possuir contrato com os correios para utilizar esta api.

# Origem

> http://websro.correios.com.br/sro_bin/sroii_xml.eventos

# Campos

* __Usuario__: Seu Código de Empresa ( Não é necessário possuir contrato, preencha com "ECT" )
* __Senha__: Sua senha de acesso ao painel dos correios ( Não é necessário possuir contrato, preencha com "SRO" )
* __Tipo__: Tipo de lista de objetos ( L - Lista de Objetos / F - Intervalo de Objetos )
* __Resultado__: Indica quais eventos do rastreamento você deseja receber ( T - Todos os eventos / U - apenas o último evento )
* __Objetos__: Listagem de objetos, não é necessário utilizar separador ( Ex.: OB111111111BROB222222222BR )

# Exemplos

## Consulta todos os eventos de um objeto

```php

$Querys				= "";
$Querys				.= "Usuario=ECT";
$Querys				.= "&Senha=SRO";
$Querys				.= "&Tipo=L";
$Querys				.= "&Resultado=T";
$Querys				.= "&Objetos=PI827208964BR";

$URLcorreios 		= "http://websro.correios.com.br/sro_bin/sroii_xml.eventos?" . $Querys;
$GetCorreios		= file_get_contents($URLcorreios);
$DadosCorreios 		= simplexml_load_string($GetCorreios);
	
```

## Consulta o último evento de um objeto

```php

$Querys				= "";
$Querys				.= "Usuario=ECT";
$Querys				.= "&Senha=SRO";
$Querys				.= "&Tipo=L";
$Querys				.= "&Resultado=U";
$Querys				.= "&Objetos=PI827208964BR";

$URLcorreios 		= "http://websro.correios.com.br/sro_bin/sroii_xml.eventos?" . $Querys;
$GetCorreios		= file_get_contents($URLcorreios);
$DadosCorreios 		= simplexml_load_string($GetCorreios);
	
```

## Consulta o último evento de dois objetos

```php

$Querys				= "";
$Querys				.= "Usuario=ECT";
$Querys				.= "&Senha=SRO";
$Querys				.= "&Tipo=L";
$Querys				.= "&Resultado=U";
$Querys				.= "&Objetos=PI827208964BRDM546291524BR";

$URLcorreios 		= "http://websro.correios.com.br/sro_bin/sroii_xml.eventos?" . $Querys;
$GetCorreios		= file_get_contents($URLcorreios);
$DadosCorreios 		= simplexml_load_string($GetCorreios);
	
```

## Atenção

* Você pode localizar seu código de empresa no contrato firmado com os correios
* A senha inicial corresponde aos 8 primeiros dígitos do CNPJ
* Caso seja utilizado os dados de acesso padrão ( Usuario - ECT / Senha - SRO ) será limitado a dois objetos por consulta