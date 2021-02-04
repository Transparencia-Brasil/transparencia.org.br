<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class RelatoriosAtividadesTable extends Table
{
	public function initialize(array $config)
    {
        $this->hasMany('RelatoriosAtividadesArquivos', [
            'foreignKey' => 'CodigoRelatorioAtividade', 
            'propertyName' => 'RelatoriosAtividadesArquivos']);

        $this->table('relatorios_atividades');
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