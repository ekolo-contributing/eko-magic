<?php
    /**
     * Ce fichier est un component du Framework Ekolo
     * (c) Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
    namespace Ekolo\Component\EkoMagic;

    use Ekolo\Component\EkoMagic\Magic;

    /**
     * Permet de gérer des variables (parameters), leurs initialisation, modifications et utilisations
     */
    class ParameterBag extends Magic  implements \Countable
    {
        protected $parameters = [];

        public function __construct(array $parameters = [])
        {
            $this->add($parameters);
            parent::__construct($this->parameters);
        }

        /**
         * Retourne les parameters
         */
        public function all()
        {
            return $this->parameters;
        }

        /**
         * Renvoi les clés des paramètres
         * @return array
         */
        public function keys()
        {
            return array_keys($this->parameters);
        }

        /**
         * Remplace les anciens parameters par des nouveaux
         * @param array $parameters
         */
        public function replace(array $parameters = [])
        {
            $this->parameters = $parameters;
        }

        /**
         * Ajout des nouveaux parameters
         * @param array $parameters
         */
        public function add(array $parameters = [])
        {
            $this->parameters = array_replace($this->parameters, $parameters);
            $this->generateAttributes();
        }

        /**
         * Renvoi le parameter par nom
         * @param string $key La clé
         * @param mixed $default La valeur par défaut au cas ou ce parameter n'existe pas
         * @return mixed
         */
        public function get($key, $default = null)
        {
            return array_key_exists($key, $this->parameters) ? $this->parameters[$key] : $default;
        }

        /**
         * Modifie le parameter par nom
         * @param string $key La clé
         * @param mixed $value La valeur
         */
        public function set($key, $value)
        {
            $this->parameters[$key] = $value;
            $this->generateAttributes();
        }

        /**
         * Vérifie si le parameter existe
         * @param string $key
         * @return bool
         */
        public function has($key)
        {
            return array_key_exists($key, $this->parameters);
        }

        /**
         * Supprime un parameter par son nom
         * @param string $key La clé du parameter
         */
        public function remove($key)
        {
            unset($this->parameters[$key]);
        }

        /**
         * Retourne Le nombre de parameters
         * @return int
         */
        public function count()
        {
            return \count($this->parameters);
        }

        /**
         * Permet de générer des attributes magiques
         */
        private function generateAttributes()
        {
            if ($this->count() > 0) {
                foreach ($this->parameters as $key => $value) {
                    $this->$key = $value;
                }
            }
        }
    }
    