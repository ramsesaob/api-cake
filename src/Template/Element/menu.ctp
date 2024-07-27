<nav class=" navbar navbar-expand-lg bg-black" data-bs-theme="dark" >
            <div class="container-fluid">
              <a class="navbar-brand" href="#"><img src="img/shopgle_cart2.png" alt="logo" width="250"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav  mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="index.html">Todas</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Categorias
                    </a>
                    <ul class="dropdown-menu" id="menuCategorias">
                      <li><a class="dropdown-item" href="#"><img src="img/categorias/case.png" alt="" width="25" > Action</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Color de Fondo
                    </a>
                    <ul class="dropdown-menu" id="colores">

                      <li><a class="dropdown-item" href="#" id="c2"><img src="img/fondo1.png" alt="" width="25"> Azul Oscuro</a></li>
                      <li><a class="dropdown-item" href="#" id="c3"><img src="img/fondo2.png" alt="" width="25"> Morado</a></li>
                      <li><a class="dropdown-item" href="#" id="c4"><img src="img/fondo3.png" alt="" width="25"> Azul Claro</a></li>
                      <li><a class="dropdown-item" href="#" id="c5"><img src="img/fondo4.png" alt="" width="25"> Rojo</a></li>
                      <li><a class="dropdown-item" href="#" id="c1"><img src="img/fondo0.png" alt="" width="25"> Blanco</a></li>
                    </ul>
                  </li>
                  <li class="nav-item" id="btnCarrito">
                    <a class="nav-link " href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"> 
                        <i class="bx bx-cart text-warning icono"></i>
                        <span id="contadorCarrito">(0)</span>
                    </a>
                  </li>
                </ul>

               
              </div>
              <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="txtBuscar">
                <button class="btn btn-outline-danger" type="submit">Search</button>
              </form>
            </div>
        </nav>