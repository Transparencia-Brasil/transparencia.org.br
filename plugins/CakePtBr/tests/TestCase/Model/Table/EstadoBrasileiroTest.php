<?php
/**
 * Teste do Model EstadoBrasileiro
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @author        Juan Basso <jrbasso@gmail.com>
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
namespace CakePtbr\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use CakePtbr\Model\Table\EstadosBrasileirosTable;


/**
 * EstadoBrasileiro Test Case
 *
 */
class EstadoBrasileiroTestCase extends TestCase
{

    /**
     * EstadoBrasileiro
     *
     * @var object
     * @access public
     */
    public $EstadosBrasileiros = null;

    /**
     * start
     *
     * @retun void
     * @access public
     */
    public function setUp()
    {
        parent::setUp();
        $this->EstadosBrasileiros = new EstadosBrasileirosTable();
    }

    /**
     * testInstance
     *
     * @retun void
     * @access public
     */
    public function testInstance()
    {
        $this->assertInstanceOf('CakePtbr\Model\Table\EstadosBrasileirosTable', $this->EstadosBrasileiros);
    }

    /**
     * testFind
     *
     * @retun void
     * @access public
     */
    public function testFind()
    {
        $results = $this->EstadosBrasileiros->find('list');
        $this->assertEquals(count($results), 27);

        $results = $this->EstadosBrasileiros->find('all');
        $this->assertTrue(is_array($results['EstadoBrasileiro']));
        $this->assertEquals(count($results['EstadoBrasileiro']), 27);

        $results = $this->EstadosBrasileiros->find('first');
        $this->assertFalse($results);
    }

    /**
     * testListaEstados
     *
     * @retun void
     * @access public
     */
    public function testListaEstados()
    {
        $results = $this->EstadosBrasileiros->listaEstados();
        $this->assertEquals(count($results), 27);
        $this->assertEquals($results, $this->EstadosBrasileiros->find('list'));
        $this->assertTrue(isset($results['DF']));

        $results = $this->EstadosBrasileiros->listaEstados(false);
        $this->assertEquals(count($results), 26);
        $this->assertFalse(isset($results['DF']));
    }

    /**
     * testTodosEstados
     *
     * @retun void
     * @access public
     */
    public function testTodosEstados()
    {
        $results = $this->EstadosBrasileiros->todosEstados();
        $this->assertTrue(is_array($results['EstadoBrasileiro']));
        $this->assertEquals(count($results['EstadoBrasileiro']), 27);
        $this->assertEquals($results, $this->EstadosBrasileiros->find('all'));

        $results = $this->EstadosBrasileiros->todosEstados(false);
        $this->assertTrue(is_array($results['EstadoBrasileiro']));
        $this->assertEquals(count($results['EstadoBrasileiro']), 26);
    }

    /**
     * testEstadoPorSigla
     *
     * @retun void
     * @access public
     */
    public function testEstadoPorSigla()
    {
        $results = $this->EstadosBrasileiros->estadoPorSigla('SC');
        $this->assertEquals($results, 'Santa Catarina');

        $results = $this->EstadosBrasileiros->estadoPorSigla('SP');
        $this->assertEquals($results, 'São Paulo');

        $results = $this->EstadosBrasileiros->estadoPorSigla('XX');
        $this->assertFalse($results);
    }

    /**
     * testSiglaPorEstado
     *
     * @retun void
     * @access public
     */
    public function testSiglaPorEstado()
    {
        $results = $this->EstadosBrasileiros->siglaPorEstado('Santa Catarina');
        $this->assertEquals($results, 'SC');

        $results = $this->EstadosBrasileiros->siglaPorEstado('São Paulo');
        $this->assertEquals($results, 'SP');

        $results = $this->EstadosBrasileiros->siglaPorEstado('Sao Paulo');
        $this->assertFalse($results);
    }

    /**
     * testEstadosDoSul
     *
     * @retun void
     * @access public
     */
    public function testEstadosDoSul()
    {
        $results = $this->EstadosBrasileiros->estadosDoSul();
        $expected = array(
            'PR' => 'Paraná',
            'RS' => 'Rio Grande do Sul',
            'SC' => 'Santa Catarina'
        );
        $this->assertEquals($results, $expected);
    }

    /**
     * testEstadosDoSudeste
     *
     * @retun void
     * @access public
     */
    public function testEstadosDoSudeste()
    {
        $results = $this->EstadosBrasileiros->estadosDoSudeste();
        $expected = array(
            'ES' => 'Espírito Santo',
            'MG' => 'Minas Gerais',
            'RJ' => 'Rio de Janeiro',
            'SP' => 'São Paulo'
        );
        $this->assertEquals($results, $expected);
    }

    /**
     * testEstadosDoCentroOeste
     *
     * @retun void
     * @access public
     */
    public function testEstadosDoCentroOeste()
    {
        $results = $this->EstadosBrasileiros->estadosDoCentroOeste();
        $expected = [
            'DF' => 'Distrito Federal',
            'GO' => 'Goiás',
            'MT' => 'Mato Grosso',
            'MS' => 'Mato Grosso do Sul'
        ];
        $this->assertEquals($results, $expected);

        $results = $this->EstadosBrasileiros->estadosDoCentroOeste(false);
        unset($expected['DF']);
        $this->assertEquals($results, $expected);
    }

    /**
     * testEstadosDoNorte
     *
     * @retun void
     * @access public
     */
    public function testEstadosDoNorte()
    {
        $results = $this->EstadosBrasileiros->estadosDoNorte();
        $expected = array(
            'AC' => 'Acre',
            'AP' => 'Amapá',
            'AM' => 'Amazonas',
            'PA' => 'Pará',
            'RO' => 'Rondônia',
            'RR' => 'Roraima',
            'TO' => 'Tocantins'
        );
        $this->assertEquals($results, $expected);
    }

    /**
     * testEstadosDoNordeste
     *
     * @retun void
     * @access public
     */
    public function testEstadosDoNordeste()
    {
        $results = $this->EstadosBrasileiros->estadosDoNordeste();
        $expected = array(
            'AL' => 'Alagoas',
            'BA' => 'Bahia',
            'CE' => 'Ceará',
            'MA' => 'Maranhão',
            'PB' => 'Paraíba',
            'PI' => 'Piauí',
            'PE' => 'Pernambuco',
            'RN' => 'Rio Grande do Norte',
            'SE' => 'Sergipe'
        );
        $this->assertEquals($results, $expected);
    }

}
