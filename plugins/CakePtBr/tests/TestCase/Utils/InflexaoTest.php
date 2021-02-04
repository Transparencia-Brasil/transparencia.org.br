<?php
/**
 * Teste do ajuste de inflexão
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @author        Juan Basso <jrbasso@gmail.com>
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
namespace CakePtbr\Test\TestCase\Console\Templates;

use CakePtbr\Utils\Inflexao;
use Cake\TestSuite\TestCase;

/**
 * Inflexao
 *
 */
class InflexaoTest extends TestCase
{

    /**
     * testAcentos
     *
     * @retun void
     * @access public
     */
    public function testAcentos()
    {
        $this->assertEquals('caminhão', Inflexao::acentos('caminhao'));
        $this->assertEquals('Pão', Inflexao::acentos('Pao'));
        $this->assertEquals('canção', Inflexao::acentos('cancao'));
        $this->assertEquals('canções', Inflexao::acentos('cancoes'));
        $this->assertEquals('limões', Inflexao::acentos('limoes'));
        $this->assertEquals('mães', Inflexao::acentos('maes'));

        $this->assertEquals('joão do caminhão', Inflexao::acentos('joao do caminhao'));
        $this->assertEquals('joão_do_caminhão', Inflexao::acentos('joao_do_caminhao'));
    }
}
