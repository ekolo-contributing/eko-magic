<?php
    /**
     * Ce fichier est une partie du Framework Ekolo
     * (c) Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
    namespace Ekolo\Component\EkoMagic;

    /**
     * Magic est une classe magique ;-) qui permet de faire des appels magiquements à des méthodes qui existent pas
     */
    class Magic {

        protected $methods = [];

        public function __construct(array $vars = [])
        {
            $this->methods = $vars;
        }

        public function registerMethod($method)
        {
            $this->methods[] = $method;
        }

        public function __set($key, $value)
        {
            $this->methods[$key] = $value;
        }

        public function __get($key)
        {
            return isset($this->methods[$key]) ? $this->methods[$key] : null;
        }

        public function __call($method, $args)
        {
            return $this->methods[$method];
        }
    }