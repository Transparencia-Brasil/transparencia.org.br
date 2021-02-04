<?php
namespace CakePtbr\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class NoticiasFixture extends TestFixture {

    public $fields = [
        'id' => ['type' => 'integer'],
        'titulo' => ['type'=>'string', 'null'=>false, 'length' => 100],
        'conteudo' => ['type'=>'string', 'null' => false],
        'autor_id' => ['type'=>'integer', 'null'=> true],
        'publicado_em' => ['type'=>'datetime', 'null'=>true],
        'autorizado_em' => ['type'=>'date', 'null'=>true],
        'created' => ['type' => 'datetime', 'null' => true, 'default' => null],
        'modified' => ['type' => 'datetime', 'null' => true, 'default' => null],
        '_constraints' => [ 'primary' => ['type' => 'primary', 'columns' => ['id']] ]
    ];


    /**
     * Records
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'titulo' => 'Exemplo 1',
            'conteudo' => 'Exemplo exemplo',
            'autor_id' => 2,
            'publicado_em' => '2011-04-21 16:42:05',
            'autorizado_em' => '2011-04-21',
            'created' => '2011-04-21 16:42:05',
            'modified' => '2011-04-21 16:42:05'
        ],
        [
            'id' => 2,
            'titulo' => 'Exemplo 3',
            'conteudo' => 'Exemplo exemplo',
            'autor_id' => 3,
            'publicado_em' => '2011-04-21 16:42:05',
            'autorizado_em' => '2011-04-21',
            'created' => '2011-04-21 16:42:05',
            'modified' => '2011-04-21 16:42:05'
        ],
        [
            'id' => 3,
            'titulo' => 'Exemplo 2',
            'conteudo' => 'Exemplo exemplo',
            'autor_id' => 3,
            'publicado_em' => null,
            'autorizado_em' => '2011-04-21',
            'created' => '2011-04-21 16:42:05',
            'modified' => '2011-04-21 16:42:05'
        ]
    ];
}