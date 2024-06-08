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
                                        <a href="#" class="nav-link px-0 text-body"> <span
                                                class="d-none d-sm-inline">Clientes</span></a>
                                    </li>
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
                            <h3>Gerenciar</h3>
                        </div>

                        <!-- Tabelas -->
                        <div class="mt-2">
                            <div class="">
                                <div class="div d-flex justify-content-between mb-3">
                                    <div class="d-flex flex-row align-items-center">
                                        <p class="m-0 flex-fill">Filtrar por:</p>
                                        <input type="text" class="form-control w-100" name="filtro" id="">
                                    </div>
                                    <div class="div">
                                        <a href="/create" class="btn btn-primary">Cadastrar Novo Cliente</a>
                                    </div>
                                </div>
                                <table class="table table-hover rounded">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Sobrenome</th>
                                            <th scope="col">Idade</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td>{{$customer->id}}</td>
                                            <td>{{$customer->nome}}</td>
                                            <td>{{$customer->sobrenome}}</td>
                                            <td>{{$customer->idade}}</td>
                                            <td>
                                                <a class="btn btn-outline-primary btn-sm ml-2" href="update/{{$customer->id}}">
                                                    <i class="fas fa-edit"></i> Alterar
                                                </a>
                                                <a type="button" class="btn btn-outline-danger btn-sm ml-2" href="delete/{{$customer->id}}"><i class="fas fa-trash-alt"></i> Excluir</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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