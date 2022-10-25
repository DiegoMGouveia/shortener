<?php
    class Link
    {
        private $id; // ID do objeto
        private $url; //url digitado pelo usuário
        private $data; // data em que o link foi encurtado
        private $short; // link curto
        private $manage; // link para editar as configurações do link
        private $clicks; // quantidades de clicks realizados
        private $countEnd; // quantidade de clicks para encerrar o encurtador

        public function __construct($id=null, $url=null, $data=null, $short=null, $manage=null, $clicks=0, $countEnd=null)
        {

            $this->id = $id;
            $this->url = $url;
            $this->data = $data;
            $this->short = $short;
            $this->manage = $manage;;
            $this->clicks = $clicks;
            $this->$countEnd = $countEnd;
            
        }

        
        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }


        /**
         * Get the value of url
         */ 
        public function getUrl()
        {
                return $this->url;
        }

        /**
         * Set the value of url
         *
         * @return  self
         */ 
        public function setUrl($url)
        {
                $this->url = $url;
                

                return $this;
        }

        /**
         * Get the value of data
         */ 
        public function getData()
        {
                return $this->data;
        }

        /**
         * Set the value of data
         *
         * @return  self
         */ 
        public function setData($data)
        {
                $this->data = $data;

                return $this;
        }

        /**
         * Get the value of short
         */ 
        public function getShort()
        {
                return $this->short;
        }

        /**
         * Set the value of short
         *
         * @return  self
         */ 
        public function setShort($short)
        {
                $this->short = $short;

                return $this;
        }

        /**
         * Get the value of manage
         */ 
        public function getManage()
        {
                return $this->manage;
        }

        /**
         * Set the value of manage
         *
         * @return  self
         */ 
        public function setManage($manage)
        {
                $this->manage = $manage;

                return $this;
        }

        /**
         * Get the value of clicks
         */ 
        public function getClicks()
        {
                return $this->clicks;
        }

        /**
         * Set the value of clicks
         *
         * @return  self
         */ 
        public function setClicks($clicks)
        {
                $this->clicks = $clicks;

                return $this;
        }

        /**
         * Get the value of countEnd
         */ 
        public function getCountEnd()
        {
                return $this->countEnd;
        }

        /**
         * Set the value of countEnd
         *
         * @return  self
         */ 
        public function setCountEnd($countEnd)
        {
                $this->countEnd = $countEnd;

                return $this;
        }

        // A função generate gera 6 caracteres aleatórios entre numeros, letras maiúsculas e minúsculas
        public function generate()
        {
            $characters = "ABCDEFGHIJKLMNOPQRSTUVYXWZabcdefghijklmnopqrstuvyxwz0123456789"; 
            $this->setShort(substr(str_shuffle($characters),0,6));

            return $this;

        }
        
        // A função generateManage gera 26 caracteres aleatórios entre numeros, letras maiúsculas e minúsculas
        public function generateManage()
        {
            $characters = "ABCDEFGHIJKLMNOPQRSTUVYXWZabcdefghijklmnopqrstuvyxwz0123456789"; 
            $this->setManage(substr(str_shuffle($characters),0,26));

            return $this;
        }

        // A função newDate atribui a data e hora atual na propriedade $date
        public function newDate()
        {
            $this->date = date("d/m/Y h:i:s");

            return $this;

        }

    }