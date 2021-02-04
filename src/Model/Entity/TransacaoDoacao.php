<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use App\Controller\Component;

class TransacaoDoacao extends Entity{

	/* 
	  @Description: cria nova tentativa de transação
	  @Param "transacaoUsuario": dados do doador pontual
	*/
	public function NovaTransacao(TransacaoUsuarioDado $transacaoUsuario)
	{
		$transacao = TableRegistry::get('TransacoesDoacao');

		$novaTransacao = new TransacaoDoacao();

		$novaTransacao->CodigoStatusTransacao = 1; // nova

		if($transacaoUsuario == null)
			throw new InvalidArgumentException('Parâmetros inválidos.');

		// procura associado pelo CPF ou EMAIL
		$associado = TableRegistry::get('Associados')->find('all')->where(['CPF' => $transacaoUsuario->CPF])
											->orWhere(['email' => $transacaoUsuario->email])->first();

		$dataOntem = new Time('1 day ago');
		$dataOntem = $dataOntem->i18nFormat('Y-MM-dd HH:mm:ss');

		if($associado != null){
			$transacaoUsuario->CodigoAssociado = $associado->Codigo;
			$novaTransacao->UsuarioDado = $transacaoUsuario;
			$transacaoJaExiste = $transacao->find('all')
									->contain(['TransacoesUsuarioDado'])
									->where(['TransacoesDoacao.Criacao >=' => $dataOntem, 
										'TransacoesUsuarioDado.CodigoAssociado'=> $associado->Codigo,
										'TransacoesDoacao.CodigoStatusTransacao' => 1])->first();
		}else{
			$novaTransacao->UsuarioDado = $transacaoUsuario;
			$transacaoJaExiste = $transacao->find('all')->contain(['TransacoesUsuarioDado'])
									->orWhere(['TransacoesUsuarioDado.CPF' => $transacaoUsuario->CPF])
									->orWhere(['TransacoesUsuarioDado.CNPJ' => $transacaoUsuario->CNPJ])
									->orWhere(['TransacoesUsuarioDado.email' => $transacaoUsuario->email])
									->andwhere(['TransacoesDoacao.Criacao >= ' => $dataOntem, 
												'TransacoesDoacao.CodigoStatusTransacao' => 1])->first();
		}

		//die(debug($transacaoUsuario));
		// se já existe uma transação com menos de 24 horas de criação no banco, não cria nada
		if($transacaoJaExiste != null)
			return true;		

		return $transacao->save($novaTransacao);
	}
}

?>