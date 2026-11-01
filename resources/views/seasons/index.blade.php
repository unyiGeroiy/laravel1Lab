@extends('layouts.app')

@section('content')
  <h1 class="main-title">Сезоны сериала Доктор Кто</h1>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xxl-5 g-4 justify-content-center">
    @forelse ($seasons as $season)
      <div class="col">
        <a href="{{ route('seasons.show', $season) }}" class="season-link text-decoration-none js-card">
          <article class="card card--season-{{ $loop->index % 5 + 1 }} h-100">
            <span class="card__type">{{ $season->title }}</span>
            @if ($season->image_path)
              <img src="{{ asset('storage/' . $season->image_path) }}" class="card-img-top img-fluid" alt="{{ $season->title }}">
            @endif
            <div class="card-body">
              <h2 class="card-title">{{ $season->title }}</h2>
              <p class="card-text">
                {{ $season->premiere_date->year }} год | {{ $season->doctor }}<br>
                {{ $season->short_description }}
              </p>
            </div>
          </article>
        </a>
      </div>
    @empty
      <p class="text-center">Сезонов пока нет.</p>
    @endforelse
  </div>

  <div class="modal fade" id="seasonModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content"></div>
    </div>
  </div>
@endsection
