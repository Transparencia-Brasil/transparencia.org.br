<?php
namespace App\Controller;

use App\Model\Entity\Projeto;
use Cake\ORM\TableRegistry;
use Cake\Network\Http\Client;
use App\Model\Entity\TransacaoDoacao;
use App\Model\Entity\TransacaoUsuarioDado;
use App\Model\Entity\TransacaoStatusHistorico;
use Cake\Utility\Xml;
use Cake\I18n\Time;

class TransacaoController extends AppController{
	
	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('UString');
		$this->loadComponent('UData');
        $this->loadComponent('UNumero');
	}

	public function testePost(){
		$this->layout = 'admin_login';
	}

	public function index(){

		// dados para sanbox	
		$homolog = false;

		if($homolog){
			$token = 'F5DBB288EFBA4D218F13A1439E675A17'; // '2BEACA8795154688951E44F2494A65EC';
			$emailPagSeguro = 'doacoes@transparencia.org.br';
			$urlPagSeguro = 'https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/notifications/';//'https://ws.pagseguro.uol.com.br/v3/transactions/notifications';	
		}else{
			$token = '2BEACA8795154688951E44F2494A65EC';
			$emailPagSeguro = 'doacoes@transparencia.org.br';
			$urlPagSeguro = 'https://ws.pagseguro.uol.com.br/v3/transactions/notifications/';
		}

		if ($this->request->is(['post', 'get'])) {

			$notificationCode = $this->request->data["notificationCode"];
			$notificationType = $this->request->data["notificationType"];

			$this->UString->registrarErro("transacao", null, "Notificação recebida. Código: " . $notificationCode . " | Tipo:" . $notificationType);

			if(strlen($notificationCode) > 0 && strlen($notificationType) > 0){
				// buscar dados do valor doado
				$http = new Client();

				$urlPagSeguro .= $notificationCode;
				$urlPagSeguro .= '?email=' . $emailPagSeguro . '&token=' . $token;
				
				$response = $http->get($urlPagSeguro, []);

				$codigo = (int)$response->code;
				// verifica se não ocorreu erro de autorização
				if($codigo == 200) // OK
				{
					$xml = Xml::toArray(Xml::build($response->body));

					if($xml != null){
						$transacao = $xml['transaction'];

						$statusTransacao = $this->UNumero->ValidarNumero($transacao['status']);
						$dataUltimoEvento = $transacao['lastEventDate'];
						$dataCriacaoTransacao = $transacao['date'];
						$valorDoacao = $transacao['grossamount'];
						$emailDoador = $transacao['sender']['email'];
						$nomeDoador = $transacao['sender']['name'];
						
						// verifica se existe transação aberta para email retornado com menos de 24 horas de criação
						$transacao_table = TableRegistry::get('TransacoesDoacao');

						$dataOntem = $dataOntem = new Time('1 day ago');
						$dataOntem = $dataOntem->i18nFormat('Y-MM-dd HH:mm:ss');

						$transacao = $transacao_table->find('all')->contain(['TransacoesUsuarioDado'])
									->where(['TransacoesUsuarioDado.email' => $emailDoador])
									->andwhere(['TransacoesDoacao.Criacao >= ' => $dataOntem])->first();

						
						$historicoTransacao = new TransacaoStatusHistorico();
						// se a transação está nula, criar uma nova
						if($transacao == null){
							$transacao = new TransacaoDoacao();

							$transacao->CodigoStatusTransacao = 1; // nova
							$transacao->CodigoStatusTransacaoSP = $statusTransacao;
							$transacao->UsuarioDado = new TransacaoUsuarioDado();
							$transacao->UsuarioDado->Email = $emailDoador;

							$historicoTransacao->CodigoStatusTransacao = 1; // nova
							$historicoTransacao->CodigoStatusTransacaoSP = $statusTransacao; // status retornado do PagSeguro
							$historicoTransacao->XMLRetorno = $response; // xml de resposta
							
						}else{
							$transacao->CodigoStatusTransacaoSP = $statusTransacao;

							// pega o status atual para gravar no histórico
							$historicoTransacao = new TransacaoStatusHistorico();
							$historicoTransacao->CodigoStatusTransacao = $transacao->CodigoStatusTransacao; 
							$historicoTransacao->CodigoStatusTransacaoSP = $transacao->CodigoStatusTransacaoSP;						
						}

						$historicoTransacao->XMLRetorno = $response->body;
						$transacao->StatusHistorico = [$historicoTransacao];
						$transacao->ValorDoado = $valorDoacao;

						$data = date_create($dataUltimoEvento);
						$dataUltimoEvento = date_format($data, 'Y-m-d H:i:s');
						
						switch($statusTransacao){
							case 1: // aguardando pagamento. atualiza transação para pendente (somente transações novas)
								
								if($transacao->CodigoStatusTransacao == 1)
									$transacao->CodigoStatusTransacao = 2; 
								break;
							case 2: // em análise. atualiza pra pendente (somente transações novas)
								if($transacao->CodigoStatusTransacao == 1)
									$transacao->CodigoStatusTransacao = 2; 
								break;
							case 3: // paga. atualiza transação para paga
								$transacao->CodigoStatusTransacao = 3;
								$transacao->DataPagamento = $dataUltimoEvento;
								break;
							case 4: // paga e disponível para consulta. atualiza transação para paga
								$transacao->CodigoStatusTransacao = 3;
								$transacao->DataPagamento = $dataUltimoEvento;
								break;
							case 5: // em disputa. transação pendente
								$transacao->CodigoStatusTransacao = 2; 
								break;
							case 6: // devolvida. atualizar transação para cancelada
								$transacao->CodigoStatusTransacao = 4; 
								break;
							case 7: // devolvida. atualizar transação para cancelada
								$transacao->CodigoStatusTransacao = 4; 
								break;
							case 8: // chargeback (devolução do valor). atualizar transação para cancelada
								$transacao->CodigoStatusTransacao = 4; 
								break;
							case 9: // em contestação. atualiza transação para pendente
								$transacao->CodigoStatusTransacao = 2;
								break;
						}

						try{
							$transacao_table->save($transacao);
						}catch(Exception $ex){
							// gravar erro no banco
							$this->UString->registrarErro('/transacao/', $ex, debug($transacao));
						}

					}
				}
			}
		}
		die();
	}
}
?>