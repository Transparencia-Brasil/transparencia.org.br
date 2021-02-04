<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;
use Cake\I18n\Time;

class UsuarioAdmin extends Entity{

    public function validarLogin()
    {
        if($this === null || ($this->login == null || $this->senha == null))
            return false;

        $query = TableRegistry::get('UsuariosAdmin')->find()->where(['login' => $this->login, 'ativo' => true])->first();
        
        if(count($query) == 0)
            return false;

        return (new DefaultPasswordHasher)->check($this->senha, $query->Senha);
   }

   public function updateUltimoAcesso()
   {
        $usuarioTable = TableRegistry::get('UsuariosAdmin');
        $usuario = $usuarioTable->find()->where(['login' => $this->login, 'ativo' => true])->first();
        
        if($usuario != null){
          $usuario->UltimoAcesso = Time::now()->i18nFormat('YYYY-MM-dd HH:mm:ss');
          $usuarioTable->save($usuario);
        }
   }
}
?>