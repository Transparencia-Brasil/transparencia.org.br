<?php
/**
 * Behavior para ajustar o formato de data
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @author     Juan Basso <jrbasso@gmail.com>
 * @license    http://www.opensource.org/licenses/mit-license.php The MIT License
 */
namespace CakePtbr\Model\Behavior;

use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Entity;

/**
 * AjusteDataBehavior
 *
 * @link http://wiki.github.com/jrbasso/cake_ptbr/behavior-ajustedata
 */
class AjusteDataBehavior extends Behavior
{

    /**
     * Configuração dos campos
     *
     * @var    array
     * @access public
     */
    public $campos;

    /**
     * Inicialização do behavior
     * @param array $config Array com a configuração básica do behavior
     * @return void
     */
    public function initialize(array $config = [])
    {
        if (empty($config)) {
            // Caso não seja informado os campos, ele irá buscar no schema
            $this->campos[$this->_table->alias()] = $this->__buscaCamposDate();
        } else {
            $this->campos[$this->_table->alias()] = $config;
        }
    }

    /**
     * Muda o valor dos campos configurados para o padrão SQL
     * @param Event  $event  A instância de evento
     * @param Entity $entity A entidade a ser salva
     * @return void
     */
    public function beforeSave(Event $event, Entity &$entity)
    {
        $this->__ajustarDatas($entity);
    }

    /**
     * Corrigir os campos de data ou timestamp
     * @param Entity $entity Uma instância
     * @return void
     */
    private function __ajustarDatas(Entity &$entity)
    {
        foreach ($this->campos[$this->_table->alias()] as $campo) {
            if ($entity->has($campo) && $entity->get($campo) !== "") {
                // DATA E HORA
                if ($this->__isDataHora($entity->get($campo))) {
                    $this->__ajustarDataHora($entity, $campo);
                } elseif (preg_match('/\d{1,2}\/\d{1,2}\/\d{2,4}/', $entity->get($campo))) { // DATA
                    $this->__ajustarData($entity, $campo);
                }
            }
        }
    }

    /**
     * Verifica se string é uma representação de timestamp
     * @param string $valor A string a ser checada
     * @return int
     */
    private function __isDataHora($valor)
    {
        return preg_match('/\d{1,2}\/\d{1,2}\/\d{2,4} \d{1,2}\:\d{1,2}/', $valor);
    }

    /**
     * Buscar campos de data nos dados da model
     *
     * @return array Lista dos campos
     */
    private function __buscaCamposDate()
    {
        $colunas = $this->_table->schema()->columns();
        if (!is_array($colunas)) {
            return [];
        }
        $saida = [];
        foreach ($colunas as $campo) {
            if ($this->_table->schema()->columnType($campo) === 'date'
                || $this->_table->schema()->columnType($campo) === 'datetime'
                && !in_array($campo, ['created', 'updated', 'modified'])
            ) {
                $saida[] = $campo;
            }
        }
        return $saida;
    }

    /**
     * Ajusta o valor do campo do tipo data de uma entidade.
     * @param Entity $entity Instância de entidade
     * @param string $campo  Nome do campo a ser atualizado
     * @return void
     */
    private function __ajustarDataHora(Entity &$entity, $campo)
    {
        if (is_array($campo)) {
            $campo = implode('', $campo);
        }
        $novaData = $this->__separarDataHora($entity->get($campo));
        list($dia, $mes, $ano) = explode('/', $novaData[0]);
        list($hora, $minuto, $segundo) = explode(':', $novaData[1]);
        if (strlen($ano) == 2) {
            $ano = $ano > 50 ? $ano + 1900 : $ano + 2000;
        }
        $entity->set($campo, "$ano-$mes-$dia $hora:$minuto:$segundo");
    }

    /**
     * Ajusta o valor do campo do tipo data de uma entidade.
     * @param Entity $entity Instância de entidade
     * @param string $campo  Nome do campo a ser atualizado
     * @return void
     */
    private function __ajustarData(Entity &$entity, $campo)
    {
        if (is_array($campo)) {
            $campo = implode('', $campo);
        }
        list($dia, $mes, $ano) = explode('/', $entity->get($campo));
        if (strlen($ano) == 2) {
            $ano = $ano > 50 ? $ano + 1900 : $ano + 2000;
        }
        $entity->set($campo, "$ano-$mes-$dia");
    }

    /**
     * Dada uma string que representa o timestamp separa a data e hora.
     * @param string $valor timestamp como string
     * @return array Array vazio, se receber como parametro uma string vazia ou um formato de data não válido.
     * Caso contrário, um array contendo a data e hora.
     */
    private function __separarDataHora($valor = "")
    {
        if (!isset($valor) || empty($valor)) {
            return [];
        }
        if (strpos($valor, "T")) {
            return explode("T", $valor);
        } elseif (strpos($valor, "t")) {
            return explode("t", $valor);
        } elseif (strpos($valor, " ")) {
            return explode(" ", $valor);
        }
    }
}
