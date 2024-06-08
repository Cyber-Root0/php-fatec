<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto de PHP | Clientes</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <!-- Body -->
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Chamando a Side-Bar do sistema -->
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 pt-4 mvh-100 bg-white shadow-sm">
                <div class="container">
                    <div class="div d-flex flex-column align-items-center justify-content-center mt-4 gap-2">
                        <img style="width: 48px;" src="/img/avatar.png" alt="">
                        <div class="texts div d-flex flex-column align-items-center justify-content-center">
                            <h6> Projeto PHP</h6>
                            <p class="small">Administrador</p>
                        </div>
                    </div>
                    <div
                        class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100"
                            id="menu">
                            <!-- Home - Retroflix -->
                            <li class="nav-item w-100 ">
                                <a href="/" class="nav-link align-middle px-0">
                                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Início</span>
                                </a>
                            </li>
                            <!-- Gerenciar -->
                            <li class="nav-item w-100">
                                <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi bi-pencil-square"></i> <span
                                        class="ms-1 d-none d-sm-inline">Gerenciar</span> </a>
                                <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                    <li class="w-100">
                                        <a href="/" class="nav-link px-0 text-body"> <span
                                                class="d-none d-sm-inline">Clientes</span></a>
                                    </li>
                                </ul>
                            </li>

                    </div>
                </div>
            </div>
           <!-- Conteúdo do site -->
           <div class="col-auto col-md-9 ms-5 mt-4 bg-light py-3">
                <h2>Clientes</h2>

                <!-- Breadcrumb -->
                <nav class="mt-4 mb-2" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">

                </nav>

                <!-- Container geral -->
                <div class="container d-flex bg-white ms-0 py-4 px-4 rounded shadow-sm">
                    <form action="" method="post" class="gap-2 w-100">

                        <!-- Título -->
                        <div class="title pb-2">
                            <h3>Cadastrar</h3>
                        </div>

                        <!-- Container formulário -->
                        <div class="d-grid gap-3 d-fill">
                            <!-- Linha formulário -->
                            <div class="row">
                                <div class="form-group col-md-3 flex-fill">
                                    <label for="nome" class="" >Nome</label>
                                    @csrf
                                    <input type="text" name="nome" id="nome" required class="form-control" value="{{$customer->nome}}">
                                    <input type="hidden" name="id" id="nome" required class="form-control" value="{{$customer->id}}">
                                </div>

                                <div class="form-group col-md-3 flex-fill">
                                    <label for="email">Sobrenome</label>
                                    <input type="text" name="sobrenome" id="descriptions" required class="form-control" value="{{$customer->sobrenome}}">
                                </div>

                                <div class="form-group col-md-3 flex-fill">
                                    <label for="valor">Idade</label>
                                    <input type="text" name="idade" id="idade" required class="form-control" value="{{$customer->idade}}">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end pt-3">
                                <div class="col-md-2 ">
                                    <input type="submit" name="cadastrar" class="w-100 btn  btn-primary" value="Atualizar">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>


        </div>
    </div>
    </div>

</body>

</html>