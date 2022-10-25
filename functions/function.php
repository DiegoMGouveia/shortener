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

            $url = "https://diegouveia.tk/";
            $data = date('d M Y H:i');
            $short = "IJSHIA";
            $manage = "HISHISHISUHSIHS";
            $clicks = 0;
            $countEnd = 0;

            $conection = connection();
            $stmt = $conection->prepare('INSERT INTO links(url,data,short,manage,clicks,countend) VALUES(:url, :data, :short, :manage, :clicks, :countend)');
            $stmt->bindValue(':url', $url);
            $stmt->bindValue(':data', $data);
            $stmt->bindValue(':short', $short);
            $stmt->bindValue(':manage', $manage);
            $stmt->bindValue(':clicks', $clicks);
            $stmt->bindValue(':countend', $countEnd);
            $stmt->execute();
            
            return true;

        } catch(PDOException $e)
        {
        
            echo 'ERROR: ' . $e->getMessage();
            return false;

        }
    }