# AjusteDataBehavior

Ajuste dos campos de data para o formato SQL.


## Como usar

Você pode simplesmente adicionar o behavior na inicialização da Table da forma abaixo, 
para que o behavior identifique automaticamente todos campos do tipo ```date``` ou ```datetime```.

```php
<?php

    class PessoasTable extends Table 
    {
        public function initialize($config = [])
        {
            $this->addBehavior("CakePtbr.AjusteData");
        }
    }
```