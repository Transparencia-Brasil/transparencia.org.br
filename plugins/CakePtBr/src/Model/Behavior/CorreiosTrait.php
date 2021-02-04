<?php
/**
 * Behavior de acesso a serviços dos Correios
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @author        Juan Basso <jrbasso@gmail.com>
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
namespace CakePtbr\Model\Behavior;

use Cake\Core\Configure;
use Cake\Filesystem\File;
use Cake\Log\Log;
use Cake\Network\Http\Client;
use Cake\ORM\Behavior;
use Cake\Utility\Xml;

/**
 * CorreiosBehavior
 *
 * @link http://wiki.github.com/jrbasso/cake_ptbr/behavior-correios
 */
trait CorreiosTrait
{


    // Tipo de frete
    public static $CORREIOS_SEDEX = 40010;
    public static $CORREIOS_SEDEX_A_COBRAR = 40045;
    public static $CORREIOS_SEDEX_10 = 40215;
    public static $CORREIOS_SEDEX_HOJE = 40290;
    public static $CORREIOS_PAC = 41106;

    // Formato de encomendas
    public static $ENCOMENDA_CAIXA = 1;
    public static $ENCOMENDA_ROLO = 2;
    public static $ENCOMENDA_ENVELOPE = 3;

    // Erros
    public static $ERRO_CORREIOS_PARAMETROS_INVALIDOS = -1000;
    public static $ERRO_CORREIOS_EXCESSO_PESO = -1001;
    public static $ERRO_CORREIOS_FALHA_COMUNICACAO = -1002;
    public static $ERRO_CORREIOS_CONTEUDO_INVALIDO = -1003;
    public static $ERRO_POSTMON_CEP_INVALIDO = -1004;


    /**
     * Cálculo do valor e prazo do frete
     *
     * $opcoes
     * `servico`  (int)  Código do serviço, ver as defines CORREIOS_*. (Obrigatório)
     * `cepOrigem`  (string)  CEP de origem no formato XXXXX-XXX (Obrigatório)
     * `cepDestino`  (string)  CEP de destino no formato XXXXX-XXX (Obrigatório)
     * `peso`  (float)  Peso do pacote, em quilos (Obrigatório)
     * `maoPropria`  (bool)  Usar recurso de mão própria? (Obrigatório)
     * `valorDeclarado`  (float)  Valor declarado do pacote. (Obrigatório)
     * `avisoRecebimento`  (bool)  Aviso de recebimento?. (Obrigatório)
     * `formato`  (int)  Formato da encomenda (Caixa, Rolo ou envelope) veja os campos estáticos. (Obrigatório)
     * `comprimento`  (float)  Comprimento da encomenda. (Obrigatório)
     * `altura`  (float)  Altura da encomenda, caso formato seja envolope deve ser 0
     * `largura`  (float)  Largura da encomenda (Obrigatório) > 11cm
     * `diametro`  (float)  Diametro caso formato seja rolo.
     * `empresa`  (string)  O código administrativo cadastrado no ECT.
     * `senha`  (string)  A senha da empresa
     *
     * @param array $opcoes As opções para passar para API
     * @return mixed Array com os dados do frete ou integer com erro. Ver defines ERRO_CORREIOS_* para erros.
     */
    public function valorFrete($opcoes = [])
    {
        // Validação dos parâmetros
        if ($this->__erroCorreios($this->__validaOpcoes($opcoes))) {
            return $this->__validaOpcoes($opcoes);
        }

        // Ajustes nos parâmetros
        $opcoes["maoPropria"] = $opcoes["maoPropria"] ? 'S' : 'N';
        $opcoes["avisoRecebimento"] = $opcoes["avisoRecebimento"] ? 'S' : 'N';

        $query = [
            'op' => 'CalcPrecoPrazo',
            'nCdEmpresa' => isset($opcoes["empresa"]) ? $opcoes["empresa"] : "",
            'sDsSenha' => isset($opcoes["senha"]) ? $opcoes["senha"] : "",
            'nCdServico' => $opcoes["servico"],
            'sCepOrigem' => $opcoes["cepOrigem"],
            'sCepDestino' => $opcoes["cepDestino"],
            'nVlPeso' => $opcoes["peso"],
            'nCdFormato' => $opcoes["formato"],
            'nVlComprimento' => $opcoes["comprimento"],
            'nVlAltura' => $opcoes["formato"] === CorreiosTrait::$ENCOMENDA_ENVELOPE ? 0 : $opcoes["altura"] ,
            'nVlLargura' => $opcoes["largura"],
            'nVlDiametro' => $opcoes["formato"] === CorreiosTrait::$ENCOMENDA_ROLO ? $opcoes["diametro"] : 0 ,
            'sCdMaoPropria' => $opcoes["maoPropria"],
            'nVlValorDeclarado' => $opcoes["valorDeclarado"] ? $opcoes["valorDeclarado"] : 'n',
            'sCdAvisoRecebimento' => $opcoes["avisoRecebimento"] ? $opcoes["avisoRecebimento"] : 'n',
            'StrRetorno' => 'xml',
            'nIndicaCalculo' => 3
        ];
        /*
         * http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=09146920&sDsSenha=123456&sCepOrigem=70002900&sCepDestino=71939360&nVlPeso=1&nCdFormato=1&nVlComprimento=30&nVlAltura=30&nVlLargura=30&sCdMaoPropria=n&nVlValorDeclarado=0&sCdAvisoRecebimento=n&nCdServico=40010&nVlDiametro=0&StrRetorno=xml&nIndicaCalculo=3
         */

        $retornoCorreios = $this->_requisitaUrl('http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx', 'get', $query);





        if (is_integer($retornoCorreios)) {
            return $retornoCorreios;
        }


        $xml = Xml::build($retornoCorreios);
        $infoCorreios = Xml::toArray($xml);


        if (!isset($infoCorreios['Servicos']['cServico'])) {
            return CorreiosTrait::$ERRO_CORREIOS_CONTEUDO_INVALIDO;
        }


        extract($infoCorreios['Servicos']['cServico']);
        /**
         * @var string $ValorMaoPropria
         * @var string $ValorValorDeclarado
         * @var string $Valor
         * @var string $EntregaDomiciliar
         * @var string $EntregaSabado
         */
        return [
            'valorMaoPropria' => $ValorMaoPropria,
            'valorTarifaValorDeclarado' => $ValorValorDeclarado,
            'valorFrete' => ($Valor - $ValorValorDeclarado - $ValorMaoPropria),
            'valorTotal' => $Valor,
            'entregaDomiciliar' => $EntregaDomiciliar === "S" ? true : false,
            'entregaSabado' => $EntregaSabado === "S" ? true : false
        ];
    }


    /**
     * Pegar o endereço de um CEP específico usando a API Postmon (postmon.com.br)
     *
     * @param string $cep CEP no format XXXXX-XXX
     * @return mixed Array com os dados do endereço ou interger para erro. Ver campos estáticos da trait $ERRO_POSTMON para os erros.
     */
    public function endereco($cep)
    {
        if (!$this->_validaCep($cep, "postmon")) {
            return CorreiosTrait::$ERRO_CORREIOS_PARAMETROS_INVALIDOS;
        }

        $url =  "http://api.postmon.com.br/v1/cep/" . $cep;

        $cliente = new Client();
        $resposta = $cliente->get($url);

        if ($resposta->statusCode() === "404") {
            return CorreiosTrait::$ERRO_POSTMON_CEP_INVALIDO;
        }

        return $resposta->json;
    }

    /**
     * Verifica se o valor é um erro.
     * @param int $valor Valor a ser verificado
     * @return bool
     */
    private function __erroCorreios($valor)
    {
        $todosErros = [
            CorreiosTrait::$ERRO_CORREIOS_CONTEUDO_INVALIDO,
            CorreiosTrait::$ERRO_CORREIOS_EXCESSO_PESO,
            CorreiosTrait::$ERRO_CORREIOS_FALHA_COMUNICACAO,
            CorreiosTrait::$ERRO_CORREIOS_PARAMETROS_INVALIDOS
        ];
        return in_array($valor, $todosErros);
    }

    /**
     * Verifica se os parametros são válidos
     *
     * int $servico Código do serviço, ver as variáveis deste trait começando por CORREIOS_*
     * string $cepOrigem Cep do remetente
     * string $cepDestino Cep do destinatário
     * float $peso Peso do pacote
     * float $valorDeclarado Valor declarado do pacote
     * @param array $opcoes Opções passadas para os métodos
     * @return int
     */
    private function __validaOpcoes($opcoes = [])
    {
        $tipos = [CorreiosTrait::$CORREIOS_SEDEX, CorreiosTrait::$CORREIOS_SEDEX_A_COBRAR, CorreiosTrait::$CORREIOS_SEDEX_10, CorreiosTrait::$CORREIOS_SEDEX_HOJE];
        if (!in_array($opcoes["servico"], $tipos)) {
            return CorreiosTrait::$ERRO_CORREIOS_PARAMETROS_INVALIDOS;
        }
        if (!$this->_validaCep($opcoes["cepOrigem"]) || !$this->_validaCep($opcoes["cepDestino"])) {
            return CorreiosTrait::$ERRO_CORREIOS_PARAMETROS_INVALIDOS;
        }
        if (!is_numeric($opcoes["peso"]) || !is_numeric($opcoes["valorDeclarado"])) {
            return CorreiosTrait::$ERRO_CORREIOS_PARAMETROS_INVALIDOS;
        }
        if ($opcoes["peso"] > 30.0) {
            return CorreiosTrait::$ERRO_CORREIOS_EXCESSO_PESO;
        } elseif ($opcoes["peso"] < 0.0) {
            return CorreiosTrait::$ERRO_CORREIOS_PARAMETROS_INVALIDOS;
        }
        if ($opcoes['formato'] === CorreiosTrait::$ENCOMENDA_CAIXA) {
            if ($opcoes['largura'] <= 11) {
                return CorreiosTrait::$ERRO_CORREIOS_PARAMETROS_INVALIDOS;
            }
        }
        if ($opcoes["valorDeclarado"] < 0.0) {
            return CorreiosTrait::$ERRO_CORREIOS_PARAMETROS_INVALIDOS;
        }

        return 0;
    }

    /**
     * Verificar se o CEP digitado está correto
     *
     * @param string $cep CEP
     * @return boolean CEP Correto
     * @access protected
     */
    protected function _validaCep($cep, $api = '')
    {
        if ($api === 'postmon') {
            if (preg_match('/^\d{8}$/', $cep)) {
                $cep = substr_replace($cep, "-", 5, 0);
            }
        } else {
            if (preg_match('/^\d{5}\-?\d{3}$/', $cep)) {
                $cep = str_replace("-", "", $cep);
            }
        }
        Log::debug("## " . $cep);
        return (bool)(preg_match('/^\d{5}\-?\d{3}$/', $cep) || preg_match('/^\d{8}$/', $cep));
    }

    /**
     * Requisita dados dos Correios
     *
     * @param string $url Caminho relativo da página nos Correios
     * @param string $method Método de requisição (POST/GET)
     * @param array $query Dados para enviar na página
     * @return string Página solicitada
     * @access protected
     */
    protected function _requisitaUrl($url, $method, $query)
    {
        $httpClient = new Client();

        if ($method === 'get') {
            $response = $httpClient->get($url . "?" . http_build_query($query));
        } else {
            $response = $httpClient->post($url, $query);
        }


        if (!$response->isOk()) {
            return CorreiosTrait::$ERRO_CORREIOS_FALHA_COMUNICACAO;
        }

        return trim($response->body());
    }
}
