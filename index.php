<?php
    require_once "class/classes.php"; // requerimento das classes
    require_once "functions/function.php"; // requerimento das funções

    session_start();

    
?>
<!DOCTYPE html>
<html lang="pt-br" class="bg-dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shortner - Encurtador de links</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body class="bg-dark">

<?php
    

    if ( isset( $_POST["sendUrl"] ) ) // se o usuário clicar no botão "Encurtar"
    {
        require_once("requires/sendurl.php"); // requerimento do código se o usuário clicar no botão "sendUrl"
    }
    

    if(isset($_GET["short"])) //verifica se o usuário esta vindo de um redirecionamento com o GET "short"
    {   
        $sCheck = getShort(); //se tiver, irá buscar o link relacionado ao valor atribuido ao GET e setar o link na variavel $sCheck, 
                                  //caso não tenha um link relacionado ao código, retornará false.

        if ($sCheck != false) // se a variavel $sCheck não for false 
        {
            
            
            echo "<div class='container text-center text-light'>Obrigado por usar nosso encurtador de links! <br> <a href='{$sCheck}' target='_blank'><button type='button' class='btn btn-primary'>clique aqui</button></a> para acessar o site</div>";

        }else //se for false retornará uma mensagem de erro.
        {
    
            echo "<div class='container border-success bg-danger border border-dark py-3 mx-auto border-opacity-30 text-center'> Link não encontrado.</div>";
    
        }
        
    }

    if ( isset ( $_GET["shortmanage"])) // se o usuário tentar acessar a area administrativa do link através do GET "shortmanage"
    {
        require_once("requires/shortmanage.php"); // requerimento da logica da página de manutenção do link encurtado (shortmanage)
    }


    if ( !isset( $_GET["short"]) && !isset($_GET["shortmanage"])) // se o GET "short" não foi setado, mostrará o input de encurtamento de link
    {
        ?>

        <div class="mt-5 container bg-light border border-1 border-danger border-opacity-20 rounded-5 p-2 centered text-center">
            <span class="h1 text-danger fw-bold">Encurtador de links</span>
            <div class="row">
                <div class="col mt-5">
                    <!-- inicio formulário -->
                    <form action="#" method="post">
                        <label for="insertlink" class="mb-2">
                            Insira o link:
                        </label>
                        <!-- input url -->
                        <input type="url" name="insertlink" id="insertlink" placeholder="cole o link aqui" class="form-control border-success border border-success p-1 border-opacity-30 text-center">
                        <button type="submit" class="border border-success bg-primary p-1 border-opacity-10 rounded-3 mt-2" name="sendUrl">Encurtar</button>
                    </form>
                    <!-- fim formulário -->
                </div>
                
            </div><!-- row -->
        </div>

        <?php
    
        if (isset($short)) // se o objeto foi armazenado no banco de dados, a variavel $short foi setada
        {
            if ( $short == true ) // se o $short for true, mostrará os dados que foram salvos no banco de dados
            {
                ?>
                <div class="mt-4 text-center container col-7">
                    <div class="container bg-primary">

                        <div class="row border bg-light border border-1 border-danger border-opacity-20 rounded-5">
                            <div class="col">
                                Link Encurtado: <?php echo "<input type='text' class='form-control text-center' id='link' value='http://127.0.0.1/shortener/?short={$url->getShort()}'><button onClick='copiarShort()' class='btn btn-outline-dark mb-3'>Copiar link</button>"?>
                                <br>
                                Gerenciar Link: <?php echo "<input type='text' class='form-control text-center' id='link2' value='http://127.0.0.1/shortener/?shortmanage={$url->getManage()}'><button onClick='copiarManage()' class='btn btn-outline-dark mb-3'>Copiar link</button>"?>
                            </div>

                        </div>
                    
                    
                    </div>
                </div>
                <?php
            
            } else
            {
                echo "Houve um erro, tente novamente";
            }
        }
    }
    
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>