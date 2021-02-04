<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/*
Estrutura que reflete a tabela transacoes_usuario_dado que contém
informações dos usuários que fizeram doações pelo site
*/
class TransacoesUsuarioDadoTable extends Table
{

	public function initialize(array $config)
    {
        $this->table('transacoes_usuario_dado');
        $this->primaryKey('Codigo');
        $this->entityClass('App\Model\Entity\TransacaoUsuarioDado');

        $this->belongsTo('Associados',['foreignKey' => 'CodigoAssociado','conditions' => ["Associados.Ativo" => true],'propertyName' => 'Associado']);
        $this->belongsTo('TransacoesDoacao', ['foreignKey' => 'CodigoTransacao', 'propertyName' => 'UsuarioDado']);
    }

	public function validationDefault(Validator $validator)
    {
        $validator = new Validator();
        $validator->notEmpty('CodigoTransacao');
        return $validator;
    }
}
?>