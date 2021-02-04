<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class AuditoriasContabilidadeTable extends Table
{
	public function initialize(array $config)
    {
        $this->hasMany('AuditoriasContabilidadeArquivos', [
            'foreignKey' => 'CodigoAuditoriaContabilidade', 
            'propertyName' => 'AuditoriasContabilidadeArquivos']);

        $this->table('auditorias_contabilidade');
        $this->primaryKey('Codigo');
    }

    
    public function validationDefault(Validator $validator)
    {
        $validator = new Validator();
        $validator->notEmpty('Ano')
                   ->notEmpty('Documento');

        return $validator;
    }
}
?>