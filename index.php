<?php
    require_once "class/classes.php"; // requerimento das classes
    require_once "functions/function.php"; // requerimento das funções

    session_start();

    if(isset($_GET["short"])) //verifica se o usuário esta vindo de um redirecionamento com o GET "short"
    {   
        $sCheck = getShort(); //se tiver, irá buscar o link relacionado ao valor atribuido ao GET e setar o link na variavel $sCheck, 
                                  //caso não tenha um link relacionado ao código, retornará false.

        if ($sCheck != false)
        {
            
            
            echo "<div class='container text-center'>Obrigado por usar nosso encurtador de links! <br> <a href='{$sCheck}' target='_blank'><button type='button' class='btn btn-primary'>clique aqui</button></a> para acessar o site</div>";

        }else
        {
    
            echo "<div class='container border-success bg-danger border border-dark py-3 mx-auto border-opacity-30 text-center'> Link não encontrado.</div>";
    
        }
        
    }

    
    
    
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
        if ( isset ($_POST["insertlink"]) ) // verifica se o usuário digitou um link
        {
         
            $url = setLink($_POST["insertlink"]); //retorna o objeto da Url encurtada

            $short = shortLink($url); // armazena os dados do objeto no banco de dados, se tudo estiver certo, retornará true
        
        }
    }
    
    if ( !isset( $_GET["short"]))
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
    
        if (isset($short))
        {
            if ( $short == true ) // se o $short for true, mostrará os dados que foram salvos no banco de dados
            {
                ?>
                <div class="mt-2 container col-2">
                    <table class="table table-striped table-success border">
                        <thead>
                        <tr class="table-success">
                            <th scope="col">  </th>
                            <th scope="col">  </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="table-light">
                            <th scope="row">Link Encurtado</th>
                            <td><?php echo "<input type='text'  id='link' value='https://127.0.0.1/shortner/?short={$url->getShort()}'><button onClick='copiarTexto()'>Copiar link</button>"?></td>
                        </tr> 
                        <tr class="table-light">
                            <th scope="row">Gerenciar Link</th>
                            <td><?php echo $url->getManage()?></td>
                        </tr>
                        </tbody>
                    </table>
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