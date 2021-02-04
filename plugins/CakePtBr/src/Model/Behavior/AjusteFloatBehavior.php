<?php
/**
 * Behavior para ajustar os campos float
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @author        Juan Basso <jrbasso@gmail.com>
 * @author        Daniel Pakuschewski <contato@danielpk.com.br>
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
namespace CakePtbr\Model\Behavior;

use Cake\Database\Expression\Comparison;
use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\ORM\Query;

/**
 * AjusteFloatBehavior
 *
 *
 *
 * @link http://wiki.github.com/jrbasso/cake_ptbr/behavior-ajustefloat
 */
class AjusteFloatBehavior extends Behavior
{

    /**
     * Campos do tipo float
     *
     * @var array
     * @access public
     */
    private $__floatFields = [];

    /**
     * @inheritdoc
     * @param array $config Configurações do behavior
     * @return void
     */
    public function initialize(array $config = [])
    {
        $this->__floatFields[$this->_table->alias()] = [];
        foreach ($this->_table->schema()->columns() as $field) {
            if ($this->_table->schema()->columnType($field) == "float") {
                $this->__floatFields[$this->_table->alias()][] = $field;
            }
        }
    }

    /**
     * Before save
     * Transforma o valor de BRL para o formato SQL antes de  salvar a entidade
     * no banco de dados
     *
     * @param Event $event Instância do evento
     * @param Entity $entity Instância da entidade a ser salva pelo ORM
     * @return bool
     * @access public
     */
    public function beforeSave(Event $event, Entity $entity)
    {
        foreach ($this->_table->schema()->columns() as $campo) {
            $valor = $entity->get($campo);
            if (!empty($valor) && $this->_table->schema()->columnType($campo) === "float") {
                if (!is_string($valor) || preg_match('/^[0-9]+(\.[0-9]+)?$/', $valor)) {
                    continue;
                }
                $entity->set($campo, str_replace(['.', ','], ['', '.'], $valor));
            }
        }

        return true;
    }

    /**
     * Before Find
     * Transforma o valor de BRL para o formato SQL antes de executar uma query
     * com conditions.
     *
     * @param Event $event Evento reportado
     * @param Query $query Consulta a ser feita
     * @param array $options Opções da consulta
     * @return void
     * @access public
     */
    public function beforeFind(Event $event, Query $query, $options = [])
    {
        $query->clause("where")->traverse([$this, "traverseClause"]);
    }

    /**
     * Método a ser usado como callable no beforeFind.
     * @param Comparison $comparison O objeto de comparação da query
     * @return void
     */
    public function traverseClause($comparison)
    {
        if (isset($comparison)) {
            if ($this->_table->schema()->columnType($comparison->getField()) === "float") {
                if (is_string($comparison->getValue()) && !preg_match('/^[0-9]+(\.[0-9]+)?$/', $comparison->getValue())) {
                    $comparison->setValue(str_replace(',', '.', str_replace('.', '', $comparison->getValue())));
                }
            }
        }
    }
}
