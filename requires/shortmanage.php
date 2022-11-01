<?php
        $manageShort = getShortManage(); // retorna o objeto referente ao GET
        
        if (isset($manageShort->url)) // verifica se o codigo foi encontrado no banco de dados
        {
            if (strlen($manageShort->getUrl())>25)  // verifica se o link possui mais de 25 caracteres, se houver irá mostrar na tela apenas 20.
            {
                $urlsmall=substr($manageShort->getUrl(),0,25);  //criando a string com 25 caracteres
            }
            
            ?>
            
            <!-- Informações do link encurtado se o objeto estiver setado -->
            <div class="container col-7"> 
                <div class="h1 text-center text-bg-warning rounded-bottom">
                    Informações gerais do Link:
                </div>
            </div>
            <div class="container col-3 text-center">
            
                <div class="row text-bg-light border border-warning p-0">

                    <span class="text-dark fw-bold">URL:</span> <span> <a href="<?php echo $manageShort->getUrl() ?>" target="_blank" rel="noopener noreferrer"><?php echo $urlsmall . "..." ?></a></span>

                </div>

                <div class="row text-bg-light border border-warning border-top-0 p-0">

                    <span class="text-dark fw-bold">Total de Clicks:</span> <span> <?php echo $manageShort->getClicks() ?></span>

                </div>
                
                <div class="row text-bg-light border border-warning border-top-0 p-0">

                    <span class="text-dark fw-bold">Clicks para quebrar o link:</span> <span> <?php echo $manageShort->getCountEnd() ?></span>

                </div>
            </div>

            <?php
        }