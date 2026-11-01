<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Доктор Кто — Сезоны')</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

  <header class="header">
    <nav class="navbar navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="{{ route('seasons.index') }}">
          <img src="{{ asset('storage/images/doctorWhoLogo.png') }}" alt="Доктор Кто" class="logo-img">
        </a>
        <div>
          <a href="{{ route('seasons.create') }}" class="btn btn-outline-light me-2">
            <i class="fa-solid me-2"></i>Добавить
          </a>
        </div>
      </div>
    </nav>
  </header>


  <main class="main">
    <div class="container">
      @yield('content')
    </div>
  </main>

  <footer class="footer">
    <div class="container">
      <div class="footer__name">Климов Клим</div>
      <div class="footer__icons">
        <a href="#" class="footer__icon">
          <img src="{{ asset('storage/images/icons8-твиттер-50.png') }}" alt="Twitter">
        </a>
        <a href="#" class="footer__icon">
          <img src="{{ asset('storage/images/facebook-app-round-white-icon.png') }}" alt="Facebook">
        </a>
        <a href="#" class="footer__icon footer__icon--dark">
          <img src="{{ asset('storage/images/linkedin.png') }}" alt="LinkedIn">
        </a>
      </div>
    </div>
  </footer>

  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="loadToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <i class="fa-solid fa-gear icon-loading me-2"></i>
        <strong class="me-auto">Загрузка</strong>
        <small>только что</small>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
      </div>
      <div class="toast-body">
        Загрузка пока недоступна: инопланетные силы остановили сервер.
      </div>
    </div>
  </div>

  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
