<?php
namespace App\Controller;

use App\Model\Entity\Projeto;
use Cake\ORM\TableRegistry;

class PublicacoesController extends AppController
{
	public function initialize(){
        parent::initialize();

        $this->set('slug_pai', "publicacoes");
        $this->loadComponent('RequestHandler');
    }

	public function index()
    {
    	$conn_categorias = TableRegistry::get('PublicacoesCategoria');
        $categorias = $conn_categorias->find('list', ['keyField' => 'Codigo', 'valueField' => 'Nome'])->order(['Nome' => 'Asc']);

    	$conn_Publicacoes = TableRegistry::get('Publicacoes');
        // separa anos para drop-down
        $year = $conn_Publicacoes->find()->func()->year(['DataPublicacao' => 'literal']);
        $query = $conn_Publicacoes->find()->select(['anoData' => $year])->distinct(['anoData'])->where(['ativo' => true]);
        $anos = $query->find('list', ['keyField' => 'anoData', 'valueField' => 'anoData'])->order(['DataPublicacao' => 'Desc']);

    	$this->set('anos', $anos);
        $this->set('categorias', $categorias);
    }

    public function listarPublicacoes()
    {
        //Elimina a obrigatoriedade de uma view
        $this->autoRender = false;
        //Especifica qual é o tipo de retorno da action
        $this->response->type('application/json');
        
        //Tenta executar a query, se não conseguir dá erro
        try{
            //Registra a tabela de publicações para ser utilizada no código
            $conn_Publicacoes = TableRegistry::get('Publicacoes');
            
            //Faz uma query SELECT * FROM Publicacoes WHERE ativo = true order by DataPublicacao DESC
            // Pega tudo o que estiver na tabela publicacoes que está ativo e ordenado decrescente pela data de publicacao
            $retorno = $conn_Publicacoes->find('all')
                        ->andwhere(['ativo' => true])
                        ->andWhere(['CodigoCategoria' => 5])
                        ->order(['DataPublicacao' => 'Desc']);
        }catch(Exception $ex){
            //Se der erro, retorna mensagem
            $retorno = ["erro" => true, "msg" => "Erro ao buscar publicações."];
        }

    //Retorna o json para o javascript
    echo json_encode($retorno);
    }

    public function pesquisarPublicacoes()
    {
        $this->autoRender = false;
        $this->response->type('application/json');
        
        try{
            $ano = $this->request->data["ano"] == null ? 0 : $this->request->data["ano"];
            $categoria = $this->request->data["categoria"] == null ? 0 : $this->request->data["categoria"];

            $retorno = "";

            if ($ano > 0 || $categoria > 0){
                $conn_Publicacoes = TableRegistry::get('Publicacoes');
                $retorno = $conn_Publicacoes->find('all')->where(['ativo' => true]);
                if($ano > 0)
                    $retorno = $retorno->where(["year(DataPublicacao)" => $ano]);
                if($categoria > 0)
                    $retorno = $retorno->where(["CodigoCategoria" => $categoria]);

		$retorno = $retorno->order(['DataPublicacao' => 'Desc']);

            }else if($ano == 0 && $categoria == 0){
                //Registra a tabela de publicações para ser utilizada no código
                $conn_Publicacoes = TableRegistry::get('Publicacoes');
                
                //Faz uma query SELECT * FROM Publicacoes WHERE ativo = true order by DataPublicacao DESC
                // Pega tudo o que estiver na tabela publicacoes que está ativo e ordenado decrescente pela data de publicacao
                $retorno = $conn_Publicacoes->find('all')
                            ->andwhere(['ativo' => true])
                            ->order(['DataPublicacao' => 'Desc']);
            }
        }catch(Exception $ex){
            $retorno = ["erro" => true, "msg" => "Erro ao buscar publicações."];
        }

        echo json_encode($retorno);
    }

    public function pesquisarPublicacoesPorBusca()
    {
    	$this->autoRender = false;
    	$this->response->type('application/json');
    	
        try{
            $busca = $this->request->data["busca"] == null ? "" : $this->request->data["busca"];

        	$retorno = "";
        	if(strlen($busca) == 0 || !isset($busca) || empty($busca))
        	{
        		$retorno = ["erro" => true, "msg" => "busca vazia"];
        	}else{
        		$conn_Publicacoes = TableRegistry::get('Publicacoes');
        		$retorno = $conn_Publicacoes->find('all')
        					->orWhere(['Descricao LIKE' => '%'.$busca.'%'])->orWhere(['Nome LIKE' => '%'.$busca.'%'])
                            ->orWhere(['PalavrasChave LIKE' => '%'.$busca.'%'])
                            ->andwhere(['ativo' => true]);
        	}
        }
        catch(Exception $ex){
            $retorno = ["erro" => true, "msg" => "Erro ao buscar publicações"];
        }
        //die(debug($retorno));
    	echo json_encode($retorno);
    }
}

?>
