<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class BannersTable extends Table
{
	public function initialize(array $config)
    {
        $this->belongsTo('BannersTipo', [
            'foreignKey' => 'CodigoBannerTipo', 
            'propertyName' => 'BannersTipo']);

        $this->belongsTo('TargetsTipo', 
            ['foreignKey' => 'CodigoTargetTipo', 
            'propertyName' => 'TargetsTipo']);

        $this->table('banners');
        $this->primaryKey('Codigo');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'Alteracao' => 'always'
                ]
            ]
        ]);
    }

    
    public function validationDefault(Validator $validator)
    {
        $validator = new Validator();
        $validator->notEmpty('Nome')
                   ->notEmpty('CodigoBannerTipo')
                   ->notEmpty('CodigoTargetTipo')
                   ->notEmpty('Link')
                   ->notEmpty('Nome');

        return $validator;
    }
}
?>