<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class TransacoesDoacaoTable extends Table
{

	public function initialize(array $config)
    {
        $this->table('transacoes_doacao');
        $this->primaryKey('Codigo');
        $this->entityClass('App\Model\Entity\TransacaoDoacao');

        $this->hasOne('TransacoesUsuarioDado',['foreignKey' => 'CodigoTransacao', 'propertyName' => 'UsuarioDado']);
        $this->hasMany('TransacoesStatusHistorico',['foreignKey' => 'CodigoTransacao','propertyName' => 'StatusHistorico']);
        $this->belongsTo('TransacoesStatus', ['foreignKey' => 'CodigoStatusTransacao', 'propertyName' => 'Status']);
    }

	public function validationDefault(Validator $validator)
    {
        $validator = new Validator();
        $validator->notEmpty('CodigoStatusTransacao');
        return $validator;
    }
}
?>