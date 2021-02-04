<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Entity\Newsletter;

class NewslettersTable extends Table
{
	public function initialize(array $config)
    {
        $this->table('newsletters');
        $this->primaryKey('Codigo');
        $this->entityClass('App\Model\Entity\Newsletter');

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
        $validator->notEmpty('Nome')->notEmpty('Email');
        return $validator;
    }

    public function inserir($nome,$email,$optin_newsletter,$optin_press,$cidade,$uf,$veiculo,$telefone,$ddd,$token,$origem){
        try{
            // insere novo usuário na tabela de newsletter
            $newsletter = new Newsletter();

            $encontrado = $this->find()->where(["email" => $email])->first();

            if($encontrado == null){
                $newsletter->Nome = $nome;
                $newsletter->Email = $email;
                $newsletter->Optin_newsletter = $optin_newsletter;
                $newsletter->Optin_press = $optin_press;
                $newsletter->Cidade = $cidade;
                $newsletter->UF = $uf;
                $newsletter->Veiculo = $veiculo;
                $newsletter->Telefone = $telefone;
                $newsletter->DDD = $ddd;
                $newsletter->double_optin_token = $token;
                $newsletter->Origem = $origem;
                $this->save($newsletter);
                return false;
            } else {
                return true;
            }

        }catch(Exception $ex){
        // logar erro
        echo erro;
        die();

        }
    }

    public function updateDoubleOptin($token) {
        $registro = $this->find()->where(["double_optin_token" => $token])->first();
        if ($registro !== null) {
            $registro->double_optin = 1;
            $registro->double_optin_date = date('Y-m-d h:n:s');
            return $this->save($registro);
        }
        return false;
    }
}
?>