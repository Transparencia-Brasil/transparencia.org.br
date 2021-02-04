<?php 

namespace App\Model\Table;
use Cake\ORM\Table;

class NewsletterTable extends Table
{

	public function initialize(array $config)
    {
        $this->table('newsletter');
        $this->primaryKey('codigo');
        $this->addBehavior('Timestamp', [
            'events' => [
                'Newsletter.beforeSave' => [
                    'Criacao' => 'new',
                    'Alteracao' => 'always'
                ]
            ]
        ]);
    }

	public function validationUpdate($validator)
    {
        $validator
            ->add('Nome', 'notEmpty', [
                'rule' => 'notEmpty',
                'message' => __('O campo nome é obrigatório.'),
            ]);
        return $validator;
    }
}
?>