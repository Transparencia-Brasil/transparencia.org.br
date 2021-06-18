<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\I18n\Time;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;
use Cake\Log\Log;

class RecaptchaComponent extends Component
{
    public static function getSiteKey() {
        return Configure::read("Recaptcha.siteKey");
    }

    public static function getSecretKey() {
        return Configure::read("Recaptcha.secretKey");
    }

    public static function getMinScore() {
        return Configure::read("Recaptcha.minScore");
    }

    /**
     * Procura o Token do Recaptcha e Valida o Score para Dizer se o Usuário Passou na Validação.
     */
    public static function ValidarToken($token, $origem, $origemCorreta) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RecaptchaComponent::getSecretKey(), 'response' => $token)));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $arrResponse = json_decode($response, true);
        
        if($arrResponse["success"] == '1' && $origem == $origemCorreta && $arrResponse["score"] >= RecaptchaComponent::getMinScore()) {
            return true;
        } 
        else {
            Log::write('error', "Falha na Autenticação Recaptcha: " . 
            "\r\n Origem = $origem vs $origemCorreta" .
            "\r\n Secret = " . RecaptchaComponent::getSecretKey() .
            "\r\n Token = $token = \r\n  " . print_r($arrResponse, true));
            return false;    
        }
    }
}