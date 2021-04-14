<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use App\Model\Entity\UsuarioAdmin;

class UsuariosAdminController extends AppController {

    public $helpers = ['Ativo'];

	public function initialize()
	{
        parent::initialize();
		$this->layout = 'admin';
        $this->loadComponent('Flash');
        $this->loadComponent('UData');
        $this->loadComponent('UString');
	}
	
	public function index()
    {
    	$usuarios = $this->UsuariosAdmin->find('all')->where(['Ativo' => true])->order(['Criacao' => 'DESC']);
        $this->set('usuarios', $usuarios);
    }

    // cria um novo ou edita um usuário
    public function edit($id = null)
    {
        $usuario = isset($id) ? $this->UsuariosAdmin->find()->where(['Codigo' => $id, 'Ativo' => true])->first() : new UsuarioAdmin();


        if ($this->request->is(['post', 'put'])) {
            $senha_antiga = $usuario->Senha;
            $this->UsuariosAdmin->patchEntity($usuario, $this->request->data);
            $usuario->Bloqueado = $this->request->data["UsuariosAdmin"]["Bloqueado"] == "1" ? (bool)1 :(bool)0;
            // se usuário não for novo não permitir alteração de senha
            if($usuario->Codigo > 0){
                $usuario->unsetProperty('Senha');
                $usuario->unsetProperty('UltimoAcesso');
            }else{
                $usuario->Senha = (new DefaultPasswordHasher)->hash($usuario->Senha);
            }
            if($this->UsuariosAdmin->save($usuario)){
                $this->Flash->success('Usuário salvo com sucesso!');
                $this->redirect(array('action' => 'index'));
            }else
            {
                $this->Flash->error('Erro ao salvar usuário!');
            }
        }

        if(isset($id))
        {
            $usuario->Senha = "";
            $usuario->UltimoAcesso = !is_null($usuario->UltimoAcesso) ? $this->UData->ConverterDataBrasil($usuario->UltimoAcesso, true) : null;
        }

        $this->set('usuario', $usuario);
    }

    // desabilita um usuário no banco
    public function delete($id = null)
    {
       /* $usuario = null;
        if(isset($id)){
            $usuario = $this->UsuariosAdmin->find()->where(['codigo' => $id, 'ativo' => true])->first();
            if($usuario != null){
                $usuario->Ativo = false;
                $this->Flash->success('Usuário excluído com sucesso.');
            }else{
                $this->Flash->error('Usuário não encontrado.');
            }
        }
        else{
            $this->Flash->error('Id de usuário inválido.');
        }*/

        $this->redirect(array('action' => 'index'));
    }

    public function senha($valor)
    {
        $this->render('senha');
        //die((new DefaultPasswordHasher)->hash($valor));
    }

    public function mudarSenha()
    {
        if ($this->request->is(['post', 'put'])) {
            $msgErro = "";
            
            $senhaAntiga = $this->request->data['senhaAtual'];
            $senhaNova = $this->request->data['senhaNova'];
            $confirmarSenha = $this->request->data['confirmarSenha'];

            $usuario = $this->UsuariosAdmin->find()->where(['Codigo' => $this->request->session()->read('Auth.User.id')])->first();
            $senhaAtualValida = (new DefaultPasswordHasher)->check($usuario->Senha, $senhaNova);

            if($senhaAtualValida){
                $msgErro = 'Senha atual inválida.';
            }
            else if($this->UString->VazioOuNulo($senhaAntiga) 
                || $this->UString->VazioOuNulo($senhaNova) 
                || $this->UString->VazioOuNulo($confirmarSenha)){
                $msgErro = 'Os valores digitados são inválidos. Verifique os campos com *.';
            }
            else if($confirmarSenha != $senhaNova){
                $msgErro = 'A senha nova não é igual ao valor digitado no campo "confirmar senha."';
            }
            else if($senhaAntiga == $senhaNova)
            {
                $msgErro = 'A senha nova é igual à senha antiga.';
            }else if(!$this->UString->ValidarSenha($senhaNova))
            {
                $msgErro = 'Nova senha inválida. Verifique os requisitos acima!';
            }

            if(strlen($msgErro) > 0){
                $this->Flash->error($msgErro);
            }
            else{
                $usuario->Senha = (new DefaultPasswordHasher)->hash($senhaNova);

                if($this->UsuariosAdmin->save($usuario))
                    $this->Flash->success('Senha modificada com sucesso.');
                else
                    $this->Flash->error('Erro ao modificar senha.');

                $this->redirect(array('action' => 'index'));
                return;
            }
            
        }
        $this->render('senha');
    }
}
?>