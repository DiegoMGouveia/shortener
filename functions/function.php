<?php
    // Todas as funções do projeto serão armazenadas neste arquivo.

    function connection()
    {

        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=shortner", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
            return $conn;
            
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }


    }

    // A função shortLink recebe um objeto e o insere no banco de dados
    function shortLink($link) 
    {
        try {

            $connection = connection();
            $stmt = $connection->prepare('INSERT INTO links(url,date,short,manage,clicks,countend) VALUES(:url, :date, :short, :manage, :clicks, :countend)');
            $stmt->bindValue(':url', $link->getUrl());
            $stmt->bindValue(':date', $link->getDate());
            $stmt->bindValue(':short', $link->getShort());
            $stmt->bindValue(':manage', $link->getManage());
            $stmt->bindValue(':clicks', $link->getClicks());
            $stmt->bindValue(':countend', $link->getCountEnd());
            $stmt->execute();
            
            return true;

        } catch(PDOException $e)
        {
        
            echo 'ERROR: ' . $e->getMessage();
            return false;

        }
    }


    // A função setUrl cria o objeto link, gera um novo código short e manage verificando se os mesmos já não existem no banco de dados
    function setLink($url)
    {
        $Link = new Link();
        $Link->setUrl($url);
        // começo da geração e checagem do código short
        $checkShort = false;
        while ($checkShort == null) 
        {
            $Link->generate(); //gera um novo código short
            $checkShort = checkShort($Link->getShort());
        }

        $checkManage = false;
        while ($checkManage == null) 
        {
            $Link->generateManage(); //gera um novo código short
            $checkManage = checkManage($Link->getManage());
        }
        
        return $Link;
    }

    // a função checkShort irá verificar se o codigo short gerado ja existe no banco de dados
    function checkShort($short)
    {

        $query = 'SELECT * FROM links WHERE short = :search ';
        $connection = connection();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':search', $short);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        if (count($result) === 0) // se não houver o código no banco de dados, retornará true.
        {

            return true;

        }

    }


    // a função checkManage irá verificar se o codigo manage gerado ja existe no banco de dados
    function checkManage($manage)
    {

        $query = 'SELECT * FROM links WHERE manage = :search ';
        $connection = connection();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':search', $manage);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        if (count($result) === 0) // se não houver o código no banco de dados, retornará true.
        {

            return true;

        }


    }


    function getShort()
    {
        $query = 'SELECT * FROM links WHERE short = :search ';
        $connection = connection();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':search', $_GET["short"]);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        if (count($result) === 1) // se não houver o código no banco de dados, retornará true.
        {


            return $result[0]->url;

        } else
        {
            return false;
        }
    }