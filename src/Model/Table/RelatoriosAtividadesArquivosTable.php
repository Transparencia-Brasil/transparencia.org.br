<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class RelatoriosAtividadesArquivosTable extends Table
{
	public function initialize(array $config)
    {
        $this->belongsTo('RelatoriosAtividades', [
            'foreignKey' => 'CodigoRelatorioAtividade', 
            'propertyName' => 'RelatoriosAtividades']);

        $this->table('relatorios_atividades_arquivos');
        $this->primaryKey('Codigo');            
    }

    
    public function validationDefault(Validator $validator)
    {
        $validator = new Validator();
        $validator->notEmpty('Arquivo')
                   ->notEmpty('CodigoRelatorioAtividade');

        return $validator;
    }
}
?>