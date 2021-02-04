<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\I18n\Time;

class UDataComponent extends Component
{
    public static function ConverterDataBrasil($data, $hora = false)
    {
    	if($data != null)
    	{
    		$data = new Time($data);
    		$padrao = $hora ? 'dd/MM/yyyy HH:mm:ss' : 'dd/MM/yyyy';
            return $data->i18nFormat($padrao);
    	}
    }

    public static function ConverterMySQL($data)
    {
    	if($data != null)
    	{
    		Time::$defaultLocale = 'pt-BR';
            $data = Time::parseDate(stripslashes($data));
            return $data->i18nFormat('Y-MM-dd HH:mm:ss');
    	}
    }
}

?>