<?php

namespace App\Controller\Component;

use Cake\Network\Email\Email;
use Cake\Controller\Component;
use Cake\I18n\Time;
use Cake\Filesystem\File;
use App\Controller\Component\UStringComponent;

class UEmailComponent extends Component
{

	public static function EnviarEmail($nomeDestinatario, $emailDestinatario, $titulo, $body, $boolHtml, $replyEmail="",$emailTransport)
	{
		try{
			//$from = "lai@transparencia.org.br";

			$email = new Email($emailTransport);
			$email->to($emailDestinatario, $nomeDestinatario);
			//$email->sender($from, 'Transparência Brasil');
			if (!empty($replyEmail))
				$email->replyTo($replyEmail);

			if($boolHtml)
				$email->emailFormat('html');

			//$email->from($from);
			$email->subject($titulo);

			$resultado = $email->send($body);

			return true;

		}catch(Exception $ex)
		{
			// logar no banco
			$url = $_SERVER['REQUEST_URI'];
			$variaveis = "Erro ao enviar e-mail:" . $titulo . " " . $emailDestinatario;
			UStringComponent::registrarErro($url, $ex, $variaveis);
			return false;
		}
	}

	public static function EmailAdmAvisoNovoAssociado($nome, $email)
	{
		
		$email_destino = "associados@transparencia.org.br";
		$assuntoEmail = " [transparencia.org.br] Novo associado para moderação: " . $nome;
		$replyEmail = $email;

		$arquivo = WWW_ROOT . "emails" . DS . "adm-aviso-novo-associado.html";

		$file = new File($arquivo);
		$conteudo = $file->read();

		$file->close();
		$conteudo = str_replace("{URL}",BASE_URL."painel-ctl",$conteudo);
		$conteudo = str_replace("{NOME}", $nome, $conteudo);
		$conteudo = str_replace("{EMAIL}", $email, $conteudo);
		

		return UEmailComponent::EnviarEmail("", $email_destino, $assuntoEmail, $conteudo, true, $replyEmail, 'default');
	}

	public static function EmailNewsletterDoubleOptin($nome, $email, $token, $replyEmail=null)
	{
		$email_destino = $email;
		$assuntoEmail = "Confirme o seu email para assinar a newsletter";

		$arquivo = WWW_ROOT . "emails" . DS . "newsletter-double-optin.html";

		$file = new File($arquivo);
		$conteudo = $file->read();

		$file->close();
		$conteudo = str_replace("{URL}",BASE_URL,$conteudo);
		$conteudo = str_replace("{NOME}", $nome, $conteudo);
		$conteudo = str_replace("{EMAIL}", $email, $conteudo);
		$conteudo = str_replace("{TOKEN}", $token, $conteudo);
		return UEmailComponent::EnviarEmail("", $email_destino, $assuntoEmail, $conteudo, true, $replyEmail, 'default');		
	}
}

?>
