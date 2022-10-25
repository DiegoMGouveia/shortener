<?php
    // Todas as funções do projeto serão armazenadas neste arquivo.

    function connection()
    {

        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=bemmequerodb", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
            return $conn;
            
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }


    }


    function shortLink($link) // EDITANDO AQUI, ESTOU FAZENKDO UMA FUNÇÃO PARA ARMAZENAR O OBJETO Link NO BANCO DE DADOS
    {
        try {

            $conection = connection();
            $stmt = $conection->prepare('INSERT INTO links(url,data,short,manage,clicks,countend) VALUES(:url, :data, :short, :manage, :clicks, :countend)');
            $stmt->bindValue(':url', $serviceObj->getName());
            $stmt->bindValue(':data', $serviceObj->getPrice());
            $stmt->bindValue(':short', $serviceObj->getDescription());
            $stmt->bindValue(':manage', $serviceObj->getImage());
            $stmt->bindValue(':clicks', $serviceObj->getImage());
            $stmt->bindValue(':countend', $serviceObj->getImage());
            $stmt->execute();
            
            return true;

        } catch(PDOException $e)
        {
        
            echo 'ERROR: ' . $e->getMessage();
            return false;

        }
    }