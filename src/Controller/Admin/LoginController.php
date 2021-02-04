<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Model\Entity\UsuarioAdmin;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;

class LoginController extends AppController
{
	
    public function initialize(){
        parent::initialize();
        
        $this->loadComponent('UNumero');
        $this->loadModel("UsuarioAdmin");
    }

	public function index()
	{
		$this->layout = 'admin_login';
	}

	public function logar()
	{
        $contadorLogin = 0;

        if ($this->request->is('post')) {
            $sessao = $this->request->session();

            if($sessao->check('contadorLogin'))
            {
               $contadorLogin = $this->UNumero->ValidarNumero($sessao->read('contadorLogin'));
            }

            $user_conn = TableRegistry::get('UsuariosAdmin');
            $login = $this->request->data['login'];
            $senha = $this->request->data['senha'];

            $usuario_update = $user_conn->find()->where(["login" => $login])->first();
            $usuario = new UsuarioAdmin(array('login' => $login, 'senha' => $senha));

            if($usuario_update->Bloqueado === true){
                $this->Flash->error(__('Usuário bloqueado. Entre em contato com o administrador do sistema.'), 'default',[], 'auth');
            }
            // else if($login == "transparencia" && $senha = "q2w3e4Trans123")
            else if($usuario->validarLogin())
            {
                $usuario->updateUltimoAcesso();
                $arrUsuario = array('username' => $login, 'password'=> $senha, 'id' => $usuario_update->Codigo);
                $this->Auth->setUser($arrUsuario);

                $sessao->delete('contadorLogin');
                $this->redirect(array('controller' => 'Home', 'action' => 'index'));
                return;
    		}
            else{
                $contadorLogin++;
                $sessao->write('contadorLogin', $contadorLogin);
                $this->Flash->error(__('Usuário ou senha incorretos.'), 'default',[], 'auth');
            }
        }

        // bloqueia usuário se tiver 5 tentativas inválidas de login
        if($contadorLogin >= 5){
            $usuario_update->Bloqueado = 1;
            $user_conn->save($usuario_update);
            $sessao->write('contadorLogin', 0);
        }

        $this->layout = 'admin_login';
        $this->render('login');
	}

	public function logout()
    {
        $this->layout = 'admin_login';
        $this->Auth->logout();
        $this->render('login');
    }
}

?>