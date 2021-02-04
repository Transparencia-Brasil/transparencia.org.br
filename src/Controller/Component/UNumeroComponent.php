<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class UNumeroComponent extends Component
{

	// limpa variável para retornar apenas números
    public static function SomenteNumeros($valor)
    {
        return preg_replace('/[^\d]+/', '', $valor);
    }

    // verifica se é um número e o retorna, do contrário retorna zero
    public static function ValidarNumero($valor)
	{
		$valor = is_numeric((int)$valor) ? $valor : 0;
		return (int)$valor;
	}

	public static function ConverterDoubleMySql($valor){
		if($valor == null || $valor == 0)
			return 0;

		$valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);

        return (double)$valor;
	}

	// valida um CPF e retorna true para ok e false para não ok
	public static function ValidarCPF($cpf){

		//$cpf = str_pad(ereg_replace('[^0-9]', '', $cpf), 11, '0', STR_PAD_LEFT);
		$cpf = str_pad(preg_replace('[^0-9]', '', $cpf), 11, '0', STR_PAD_LEFT);

		// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
	    if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999')
		{
			return false;
	    }
		else
		{   
			// Calcula os números para verificar se o CPF é verdadeiro
	        for ($t = 9; $t < 11; $t++) {
	            for ($d = 0, $c = 0; $c < $t; $c++) {
	                $d += $cpf{$c} * (($t + 1) - $c);
	            }
	            $d = ((10 * $d) % 11) % 10;
	 
	            if ($cpf{$c} != $d) {
	                return false;
	            }
        	}

        	return true;
		}
	}

	function ValidarCNPJ($cnpj)
	{
		$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

		// Valida tamanho
		if (strlen($cnpj) != 14)
			return false;

		// Valida primeiro dígito verificador
		for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
		{
			$soma += $cnpj{$i} * $j;
			$j = ($j == 2) ? 9 : $j - 1;
		}

		$resto = $soma % 11;

		if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
			return false;

		// Valida segundo dígito verificador
		for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
		{
			$soma += $cnpj{$i} * $j;
			$j = ($j == 2) ? 9 : $j - 1;
		}

		$resto = $soma % 11;

		return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
	}

	public static function stringToSecret($string = NULL)
	{
		if (!$string) {
			return NULL;
		}
		$length = strlen($string);
		$visibleCount = (int) round($length / 4);
		$hiddenCount = $length - ($visibleCount * 2);
		return substr($string, 0, $visibleCount) . str_repeat('*', $hiddenCount) . substr($string, ($visibleCount * -1), $visibleCount);
	}

	public static function emailToSecret($string = NULL)
	{
		if (!$string) {
			return NULL;
		}
		$length = strlen($string);
		$visibleEndCount = 11;
		$visibleCount = (int) round($length / 4);
		$hiddenCount = $length - ($visibleCount * 2);
		return substr($string, 0, $visibleCount) . str_repeat('*', $hiddenCount) . substr($string, ($visibleEndCount * -1));
	}

}

?>