<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title')</title>

  <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/styles.css">
</head>

<body>
  <header class="h-100 w-100">
    <nav class="navbar navbar-expand-md bg-primary" data-bs-theme="dark">
      <div class="container">
        <div class="container-fluid">
          <a class="navbar-brand text-light d-flex align-items-center uniPlaceLogo" href="/">UniPlace
            <ion-icon name="bag-check-outline" class="d-flex align-items-center text-light ms-2"></ion-icon>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <div class="ml-auto">
              @guest
              <ul class="justify-content-end d-flex align-items-center nav-list">
                <li class="nav-item d-flex align-items-center">
                  <a href="/login" class="nav-link text-light d-flex justify-content-end align-items-center">
                    Entrar
                  </a>
                </li>
                <li class="nav-item d-flex align-items-center">
                  <a href="/register" class="nav-link text-light d-flex justify-content-end align-items-center">
                    Cadastrar
                  </a>
                </li>
              </ul>
              @endguest
              @auth
              <div class="btn-group headerAjust">
                <button type="button" class="btn btn-primary dropdown-toggle w-100" data-bs-toggle="dropdown" aria-expanded="false">
                  <ion-icon name="person-outline"></ion-icon>
                </button>
                <ul class="dropdown-menu">
                  <li class="nav-item">
                    <a class="nav-link text-primary dropdown-item text-center" href="/userProfile">
                      Minha conta
                    </a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-primary dropdown-item text-center" href="/myproducts">
                      Meus produtos
                    </a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-primary dropdown-item text-center" href="/shoppingList">
                      Minhas compras
                    </a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="d-flex justify-content-center">
                      @csrf
                      <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                      this.closest('form').submit();">
                        {{ __('Sair da conta') }}
                      </x-dropdown-link>
                    </form>
                  </li>
                  </ul>
                </div>
              @endauth
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
  @yield('content')
  <footer class="bg-primary mt-3 py-3">
    <div class="container">
      <div class="justify-content-center d-flex align-items-center">
        <p class="text-center text-light mb-0">UniPlace &copy; 2023</p>
      </div>
    </div>
  </footer>
  @yield('footer')
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>