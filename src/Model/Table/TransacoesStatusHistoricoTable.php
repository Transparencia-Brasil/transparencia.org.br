<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class TransacoesStatusHistoricoTable extends Table
{

	public function initialize(array $config)
    {
        $this->table('transacoes_status_historico');
        $this->primaryKey('Codigo');
        $this->entityClass('App\Model\Entity\TransacaoStatusHistorico');

        $this->belongsTo('TransacoesDoacao', [
            'foreignKey' => 'CodigoTransacao', 
            'propertyName' => 'StatusHistorico']);
    }

	public function validationDefault(Validator $validator)
    {
        $validator = new Validator();
        $validator->notEmpty('CodigoTransacao')->notEmpty('CodigoStatusTransacao');
        return $validator;
    }
}
?>