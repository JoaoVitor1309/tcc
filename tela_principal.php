<!DOCTYPE html>
<html>
<head>
  <meta charset=UTF-8>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  



    <title>Marco Antonio </title>

    <style>
        h1{
            text-align: center;
            font-size: 100px;
            color: #00c317;
        }
        h3{
            font-size: 80px;
            text-align: center;
            color:#ececec;
           
        }
        a{ 
            padding-left: 150px;

        }
        #bod {
            background-color: rgb(0, 0, 0);
        }

        .dropdown{
            
            justify-content: center;
            right: 21%;

            
        }

        h4{

            justify-content: center;
            width: 800px;


        }


    </style>
</head>    
<body id="bod">

    <nav id="nav" class="navbar navbar-expand-sm navbar-dark bg-success justify-content-center" class="container">
       
        <div class="container-fluid">
            
        <h4>OSVAC</h4>
        
        <ul class="navbar-nav">

            <div class="dropdown">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                 Cliente
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="cadastrocliente2.php">Cadastrar Cliente</a>
                    <a class="dropdown-item" href="ver_clientes2.php">Listagem de Clientes</a>
                </div>
            </div>                
                
            <div class="dropdown">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                  Estoque
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="cadastropecas.php">Cadastrar Peça</a>
                    <a class="dropdown-item" href="verestoque.php">Listagem de Estoque</a>
                </div>
            </div> 

            <div class="dropdown">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                  Funcionários
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="cadastrofunc.php">Cadastrar Funcionário</a>
                    <a class="dropdown-item" href="verfunc.php">Listagem de Funcionários</a>
                </div>
            </div> 

            <div class="dropdown">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                 Serviços
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="cadastroaparelho.php">Cadastrar Serviço</a>
                    <a class="dropdown-item" href="verservicos.php">Listagem de Serviços</a>
                </div>
            </div> 

        </ul>
        
    </nav><br><br><br><br><br><br>


    
    <h1>Vai Ali Consertos</h1>
    <h3>Menu Principal</h3>
    <br><br>
</body>
</html>