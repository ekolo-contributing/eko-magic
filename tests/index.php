<?php
    require __DIR__.'/../vendor/autoload.php';

    use Ekolo\Component\EkoMagic\ParameterBag;

    class Test extends ParameterBag {

        public function __construct()
        {
            parent::__construct([
                'id' => '1',
                'nom' => 'Etokila',
                'prenom' => 'Diani',
                'sexe' => 'M'
            ]);
        }
    }

    echo (new Test)->nom();
