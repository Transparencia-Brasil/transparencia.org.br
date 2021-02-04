<?php
/**
 * Model com as informações dos estados brasileiros
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @author        Juan Basso <jrbasso@gmail.com>
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
namespace CakePtbr\Model\Table;

use CakePtbr\Lib\Estados;
use Cake\ORM\Table;

/**
 * EstadoBrasileiro
 *
 * @link http://wiki.github.com/jrbasso/cake_ptbr/model-estadobrasileiro
 */
class EstadosBrasileirosTable extends Table
{

    /**
     * @inheritdoc
     * @return void
     */
    public function initialize()
    {
        $this->connection(null);
        $this->table(null);
        $this->_estados = Estados::lista();
    }

    /**
     * Nome da Table
     *
     * @var string
     * @access public
     */
    public $name = 'EstadoBrasileiro';

    /**
     * Find
     * @param string $type Tipo do find, pode ser all ou list
     * @param array $options Opções, não utilize este paramêtro
     * @return array|bool
     */
    public function find($type = 'all', $options = [])
    {
        if (is_string($type)) {
            switch ($type) {
                case 'list':
                    return $this->listaEstados();
                case 'all':
                    return $this->todosEstados();
            }
        }
        return false;
    }

    /**
     * Lista dos estados na forma do list
     *
     * @param bool $incluirDF Incluir Distrito Federal na lista?
     * @return array Lista dos estados
     * @access public
     */
    public function listaEstados($incluirDF = true)
    {
        if ($incluirDF) {
            return $this->_estados;
        }
        $estados = $this->_estados;
        unset($estados['DF']);
        return $estados;
    }

    /**
     * Lista dos estados na forma do find
     *
     * @param bool $incluirDF Incluir Distrito Federal na lista?
     * @return array Lista dos estados
     * @access public
     */
    public function todosEstados($incluirDF = true)
    {
        $estados = array('EstadoBrasileiro' => array());
        foreach ($this->_estados as $sigla => $nome) {
            if (!$incluirDF && $sigla === 'DF') {
                continue;
            }
            $estados['EstadoBrasileiro'][] = array(
                'sigla' => $sigla,
                'nome' => $nome
            );
        }
        return $estados;
    }

    /**
     * Nome do estado conforme a sigla
     *
     * @param string $sigla Sigla do estado
     * @return string Nome do estado. False quando sigla for inválida
     * @access public
     */
    public function estadoPorSigla($sigla)
    {
        if (isset($this->_estados[$sigla])) {
            return $this->_estados[$sigla];
        }
        return false;
    }

    /**
     * Sigla do estado conforme o nome
     *
     * @param string $estado Nome extenso do estado
     * @return string Sigla do estado. False quando estado for inválido
     */
    public function siglaPorEstado($estado)
    {
        if ($sigla = array_search($estado, $this->_estados)) {
            return $sigla;
        }
        return false;
    }

    /**
     * Lista dos estados do sul
     *
     * @return array Lista dos estados do sul
     * @access public
     */
    public function estadosDoSul()
    {
        return $this->_estadosPorRegiao(array('PR', 'RS', 'SC'));
    }

    /**
     * Lista dos estados do sudeste
     *
     * @return array Lista dos estados do sudeste
     * @access public
     */
    public function estadosDoSudeste()
    {
        return $this->_estadosPorRegiao(array('ES', 'MG', 'RJ', 'SP'));
    }

    /**
     * Lista dos estados do centro oeste
     *
     * @param bool $incluirDF Incluir Distrito Federal?
     * @return array Lista dos estados do centro oeste
     * @access public
     */
    public function estadosDoCentroOeste($incluirDF = true)
    {
        if ($incluirDF) {
            return $this->_estadosPorRegiao(array('DF', 'GO', 'MT', 'MS'));
        }
        return $this->_estadosPorRegiao(array('GO', 'MT', 'MS'));
    }

    /**
     * Lista dos estados do norte
     *
     * @return array Lista dos estados do norte
     * @access public
     */
    public function estadosDoNorte()
    {
        return $this->_estadosPorRegiao(array('AC', 'AP', 'AM', 'PA', 'RO', 'RR', 'TO'));
    }

    /**
     * Lista dos estados do norteste
     *
     * @return array Lista dos estados do norteste
     * @access public
     */
    public function estadosDoNordeste()
    {
        return $this->_estadosPorRegiao(array('AL', 'BA', 'CE', 'MA', 'PB', 'PI', 'PE', 'RN', 'SE'));
    }

    /**
     * Método auxiliar para pegar os estados
     *
     * @param array $estados Listas dos estados que deseja filtrar
     * @return array Lista dos estados
     * @access protected
     */
    protected function _estadosPorRegiao($estados)
    {
        $retorno = array();
        foreach ($estados as $estado) {
            $retorno[$estado] = $this->_estados[$estado];
        }
        return $retorno;
    }
}
