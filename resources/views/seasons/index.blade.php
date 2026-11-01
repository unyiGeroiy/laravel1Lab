@extends('layouts.app')

@section('content')
  <h1 class="main-title">Сезоны сериала Доктор Кто</h1>

  <div class="row g-4 justify-content-center">
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3 col-xxxl-2">
          <article class="card card--season-1 h-100 js-card">
            <span class="card__type">Сезон 1</span>
            <img src="/storage/images/season1.jpeg" class="card-img-top img-fluid" alt="Сезон 1">
            <div class="card-body">
              <h2 class="card-title">Сезон 1</h2>
              <p class="card-text">2005 год | 9-й Доктор<br>Серии: «Роза» (Доктор спасает девушку от оживших манекенов), «Конец света» (наблюдение за гибелью Земли в далеком будущем).</p>
            </div>
          </article>
        </div>

        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3 col-xxxl-2">
          <article class="card card--season-2 h-100 js-card">
            <span class="card__type">Сезоны 2–4</span>
            <img src="/storage/images/season2.jpeg" class="card-img-top img-fluid" alt="Сезоны 2–4">
            <div class="card-body">
              <h2 class="card-title">Сезоны 2–4</h2>
              <p class="card-text">2006 год | 10-й Доктор<br>Серии: «Новая Земля» (путешествие на планету-госпиталь), «Клык и коготь» (встреча с королевой Викторией и оборотнем).</p>
            </div>
          </article>
        </div>

        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3 col-xxxl-2">
          <article class="card card--season-3 h-100 js-card">
            <span class="card__type">Сезоны 5–7</span>
            <img src="/storage/images/season5.jpeg" class="card-img-top img-fluid" alt="Сезоны 5–7">
            <div class="card-body">
              <h2 class="card-title">Сезоны 5–7</h2>
              <p class="card-text">2010 год | 11-й Доктор<br>Серии: «Одиннадцатый час» (новый Доктор спасает мир за 20 минут), «Время ангелов» (столкновение с Плачущими Ангелами).</p>
            </div>
          </article>
        </div>

        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3 col-xxxl-2">
          <article class="card card--season-4 h-100 js-card">
            <span class="card__type">Сезоны 8–10</span>
            <img src="/storage/images/season8.jpeg" class="card-img-top img-fluid" alt="Сезоны 8–10">
            <div class="card-body">
              <h2 class="card-title">Сезоны 8–10</h2>
              <p class="card-text">2014 год | 12-й Доктор<br>Серии: «Глубокий вдох» (расследование серии убийств в викторианском Лондоне), «Внутрь далека» (путешествие внутрь заклятого врага).</p>
            </div>
          </article>
        </div>

        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3 col-xxxl-2">
          <article class="card card--season-5 h-100 js-card">
            <span class="card__type">Сезоны 11–13</span>
            <img src="/storage/images/season11.jpeg" class="card-img-top img-fluid" alt="Сезоны 11–13">
            <div class="card-body">
              <h2 class="card-title">Сезоны 11–13</h2>
              <p class="card-text">2018 год | 13-й Доктор<br>Серии: «Женщина, которая упала на Землю» (появление нового Доктора в Шеффилде), «Роза» (встреча с Розой Паркс в 1955 году).</p>
            </div>
          </article>
        </div>
  </div>
@endsection
