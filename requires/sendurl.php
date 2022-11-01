<?php
    if ( isset ($_POST["insertlink"]) ) // verifica se o usuário digitou um link
    {
     
        $url = setLink($_POST["insertlink"]); //retorna o objeto da Url encurtada

        $short = shortLink($url); // armazena os dados do objeto no banco de dados, se tudo estiver certo, retornará true
    
    }