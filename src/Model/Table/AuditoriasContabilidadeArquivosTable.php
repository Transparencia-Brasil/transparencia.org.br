<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class AuditoriasContabilidadeArquivosTable extends Table
{
	public function initialize(array $config)
    {
        $this->belongsTo('AuditoriasContabilidade', [
            'foreignKey' => 'CodigoAuditoriaContabilidade', 
            'propertyName' => 'AuditoriasContabilidade']);
    }

    
    public function validationDefault(Validator $validator)
    {
        $validator = new Validator();
        $validator->notEmpty('Arquivo')
                   ->notEmpty('CodigoAuditoriaContabilidade');

        return $validator;
    }
}
?>