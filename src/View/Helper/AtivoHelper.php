<?php
namespace App\View\Helper;

use Cake\View\Helper;

class AtivoHelper extends Helper
{
    public function exibirStatus($status)
    {
        return $status ? 'Ativo' : 'Inativo';
    }
}
?>