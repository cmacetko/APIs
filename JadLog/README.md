Consulta o Valor do Frete.
É necessário possuir Contrato com a Jadlog e solicitar o __Código de Cliente (CNPJ)__ e __Senha__.

# Origem

> http://jadlog.com.br/JadlogEdiWs/services/ValorFreteBean?method=valorar

# Campos

* __vModalidade__: Modalidade do frete. Deve conter apenas números
* __Password__: Senha de acesso à área de Serviços on-line do site da JADLOG
* __vSeguro__: Tipo do Seguro / N - Normal (Mais Utilizado) / A - Apólice Própria
* __vVlDec__: Valor da Nota fiscal Ex: 100,00
* __vVlColeta__: Valor da coleta negociado com a unidade JADLOG. Ex. 10,00 (Normalmente não é utilizado)
* __vCepOrig__: CEP de origem Ex.: 02714020
* __vCepDest__: CEP de destino Ex.: 02714020
* __vPeso__: Peso Real em quilos Ex.: 13,23
* __vFrap__: Frete a pagar no destino / S - Sim / N - Não
* __vEntrega__: Tipo de entrega / R - Retira Unidade JADLOG / D - Domicilio
* __vCnpj__: CNPJ do contratante

# Modalidades

* __0__: EXPRESSO
* __3__: .PACKAGE
* __4__: RODOVIÁRIO
* __5__: ECONÔMICO
* __6__: DOC
* __7__: CORPORATE
* __9__: .COM
* __10__: INTERNACIONAL
* __12__: CARGO
* __14__: EMERGÊNCIAL

# Regra de Cubagem

Para que seja localizado o peso real de uma cubagem deve utilizar a seguinte formula:

Altura * Comprimento * Largura / MODAL (dimensões em centímetros)
Ex. 120x354x54 = 2293920/3333(RODO) = 688,24 kg.

* RODO(3333) 
* AEREO (6000) 

## Tabela de Modal

* __0__: EXPRESSO -> AEREO
* __3__: .PACKAGE -> RODO
* __4__: RODOVIÁRIO -> RODO
* __5__: ECONÔMICO -> RODO
* __6__: DOC -> RODO
* __7__: CORPORATE -> AEREO
* __9__: .COM -> AEREO
* __10__: INTERNACIONAL -> AEREO
* __12__: CARGO -> AEREO
* __14__: EMERGÊNCIAL -> RODO