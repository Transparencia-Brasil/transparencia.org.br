<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class UStringComponent extends Component
{
    
    public static function SelectEstados()
    {
        // return array("Selecione","AC"=>"Acre", "AL"=>"Alagoas", "AM"=>"Amazonas", "AP"=>"Amapá","BA"=>"Bahia","CE"=>"Ceará","DF"=>"Distrito Federal","ES"=>"Espírito Santo","GO"=>"Goiás","MA"=>"Maranhão","MT"=>"Mato Grosso","MS"=>"Mato Grosso do Sul","MG"=>"Minas Gerais","PA"=>"Pará","PB"=>"Paraíba","PR"=>"Paraná","PE"=>"Pernambuco","PI"=>"Piauí","RJ"=>"Rio de Janeiro","RN"=>"Rio Grande do Norte","RO"=>"Rondônia","RS"=>"Rio Grande do Sul","RR"=>"Roraima","SC"=>"Santa Catarina","SE"=>"Sergipe","SP"=>"São Paulo","TO"=>"Tocantins");
        return array("NA"=>"Não Aplicável","AC"=>"AC","AL"=>"AL","AM"=>"AM","AP"=>"AP","BA"=>"BA","CE"=>"CE","DF"=>"DF","ES"=>"ES","GO"=>"GO","MA"=>"MA","MT"=>"MT","MS"=>"MS","MG"=>"MG","PA"=>"PA","PB"=>"PB","PR"=>"PR","PE"=>"PE","PI"=>"PI","RJ"=>"RJ","RN"=>"RN","RO"=>"RO","RS"=>"RS","RR"=>"RR","SC"=>"SC","SE"=>"SE","SP"=>"SP","TO"=>"TO");
    }

    public static function BytesParaHumano($bytes, $dec = 2){       
        $size   = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $factor = floor((strlen($bytes) - 1) / 3);
    
        return sprintf("%.{$dec}f", $bytes / pow(1024, $factor)) . @$size[$factor];       
    }

    // remove caracteres especiais
    public static function AntiXSS($valor){
    	$valor = !UStringComponent::VazioOuNulo($valor) ? htmlspecialchars($valor) : "";
    	return $valor;
    }

    // coloca os caracteres especiais e limita o tamanho
    public static function AntiXSSComLimite($valor, $tamanho){
        return UStringComponent::LimitarTamanho(UStringComponent::AntiXSS($valor), $tamanho);
    }

    // diminui o tamanho de entrada de um valor
    public static function LimitarTamanho($valor, $tamanho){
        $valor = strlen($valor) <= $tamanho ? $valor : substr($valor, 0, $tamanho);
        return $valor;
    }

    public static function ValidarSenha($senha){
        return preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&+()*=]).{8,}/', $senha);
    }

    public static function VazioOuNulo($valor){
    	return !isset($valor) || empty($valor) || $valor == null;
    }

    public static function GerarSlug($valor){
        return strtolower(preg_replace("/[^a-zA-Z0-9_]/", "", $valor));
    }

    public static function GerarStringAleatoria($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    

    public static function ValidarNomeArquivo($arquivo)  {
        $nome = UStringComponent::GerarSlug(pathinfo($arquivo, PATHINFO_FILENAME));
        $extensao = pathinfo($arquivo,  PATHINFO_EXTENSION);

        return "$nome.$extensao";
    }

    public static function ValidarEmail($email){
        return preg_match('/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/', $email);
    }

    public static function registrarErro($pagina, Exception $ex, $variaveis){
        $log = TableRegistry::get('LogsErro');

        try{
            $novoLog = $log->newEntity();
            $novoLog->Pagina = $pagina;
            if($ex != null){
                $novoLog->Stack = $ex->StackTrace;
                $novoLog->Mensagem = $ex->Mensagem;
            }
            $novoLog->Variaveis = $variaveis;

            $log->save($novoLog);

        }catch(Exception $ex){
            // nada a fazer
        }
    }

    // http://php.net/manual/en/function.com-create-guid.php
    public static function guid(){
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

}
?>