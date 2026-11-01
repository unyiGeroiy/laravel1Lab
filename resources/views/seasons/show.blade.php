@extends('layouts.app')

@section('content')
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">{{ $season->title }} — {{ $season->doctor }}</h5>
      <a href="{{ route('seasons.index') }}" class="btn-close btn-close-white" data-bs-dismiss="modal"></a>
    </div>

    <div class="modal-body">
      <div class="row g-3">
        <div class="col-md-5">
          @if ($season->image_path)
            <img src="{{ asset('storage/' . $season->image_path) }}" class="img-fluid rounded" alt="{{ $season->title }}">
          @endif
        </div>
        <div class="col-md-7">
          <p>{{ $season->description }}</p>
          <p><b>Доктор:</b> {{ $season->actor }}</p>
          <p><b>Премьера:</b> {{ $season->premiere_date->format('d.m.Y') }}</p>
          <p><b>Ключевые серии:</b> {{ $season->key_episodes }}</p>
          <p><b>Главные враги:</b> {{ $season->main_enemies }}</p>
        </div>
      </div>
    </div>

    <div class="modal-footer">
      <span class="modal-nav-hint">← → для переключения</span>
      <a href="{{ route('seasons.edit', $season) }}" class="btn btn-outline-light">Редактировать</a>
      <form action="{{ route('seasons.destroy', $season) }}" method="POST" onsubmit="return confirm('Удалить сезон?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Удалить</button>
      </form>
    </div>
  </div>
@endsection
