<?php
    require_once "class/classes.php"; // requerimento das classes
    require_once "functions/function.php"; // requerimento das funções

    session_start();
    
    
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shortner - Encurtador de links</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<?php
    $Teste = new Link();
    $Teste->generate();

    echo $Teste->getShort();


    if ( isset( $_POST["sendUrl"] ) ) // se o usuário clicar no botão "Encurtar"
    {
        if ( isset ($_POST["insertlink"]) ) // verifica se o usuário digitou um link
        {
         
            $Link = new Link(null,$_POST["insertlink"]);
            $Link->newDate();
            $Link->generate();
            $Link->generateManage();
        
        }
    }
    ?>

    <div class="container centered text-center">
        <span class="h1 fw-bold">Encurtador de links</span>
        <div class="row">
            <div class="col mt-5">
                <!-- inicio formulário -->
                <form action="#" method="post">
                    <label for="insertlink" class="mb-2">
                        Insira o link:
                    </label>
                    <!-- input url -->
                    <input type="url" name="insertlink" id="insertlink" class="form-control border-success border border-success p-1 border-opacity-30 text-center">
                    <button type="submit" class="border border-success p-1 border-opacity-10 rounded mt-2" name="sendUrl">Encurtar</button>
                </form>
                <!-- fim formulário -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>