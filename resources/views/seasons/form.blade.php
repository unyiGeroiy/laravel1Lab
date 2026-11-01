@extends('layouts.app')

@section('title', $season->exists ? 'Редактирование сезона' : 'Новый сезон')

@section('content')
  <h1 class="main-title">{{ $season->exists ? 'Редактирование: ' . $season->title : 'Новый сезон' }}</h1>

  <div class="row justify-content-center">
    <div class="col-lg-8">
      <form action="{{ $season->exists ? route('seasons.update', $season) : route('seasons.store') }}"
            method="POST" enctype="multipart/form-data" class="needs-validation bg-dark p-4 rounded" novalidate>
        @csrf
        @if ($season->exists)
          @method('PUT')
        @endif

        <div class="row g-3">
          <div class="col-md-6">
            <label for="title" class="form-label">Название</label>
            <input type="text" id="title" name="title" maxlength="100" required
                   class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title', $season->title) }}">
            <div class="invalid-feedback">{{ $errors->first('title') ?: 'Укажите название (до 100 символов)' }}</div>
          </div>

          <div class="col-md-6">
            <label for="premiere_date" class="form-label">Дата премьеры</label>
            <input type="date" id="premiere_date" name="premiere_date" required
                   class="form-control @error('premiere_date') is-invalid @enderror"
                   value="{{ old('premiere_date', $season->premiere_date?->format('Y-m-d')) }}">
            <div class="invalid-feedback">{{ $errors->first('premiere_date') ?: 'Укажите дату премьеры' }}</div>
          </div>

          <div class="col-md-6">
            <label for="doctor" class="form-label">Доктор</label>
            <input type="text" id="doctor" name="doctor" maxlength="50" required placeholder="10-й Доктор"
                   class="form-control @error('doctor') is-invalid @enderror"
                   value="{{ old('doctor', $season->doctor) }}">
            <div class="invalid-feedback">{{ $errors->first('doctor') ?: 'Укажите Доктора' }}</div>
          </div>

          <div class="col-md-6">
            <label for="actor" class="form-label">Актёр</label>
            <input type="text" id="actor" name="actor" maxlength="100" required
                   class="form-control @error('actor') is-invalid @enderror"
                   value="{{ old('actor', $season->actor) }}">
            <div class="invalid-feedback">{{ $errors->first('actor') ?: 'Укажите актёра' }}</div>
          </div>

          <div class="col-12">
            <label for="short_description" class="form-label">Краткое описание (для карточки)</label>
            <textarea id="short_description" name="short_description" rows="2" maxlength="300" required
                      class="form-control @error('short_description') is-invalid @enderror">{{ old('short_description', $season->short_description) }}</textarea>
            <div class="invalid-feedback">{{ $errors->first('short_description') ?: 'Заполните краткое описание (до 300 символов)' }}</div>
          </div>

          <div class="col-12">
            <label for="description" class="form-label">Подробное описание</label>
            <textarea id="description" name="description" rows="4" maxlength="2000" required
                      class="form-control @error('description') is-invalid @enderror">{{ old('description', $season->description) }}</textarea>
            <div class="invalid-feedback">{{ $errors->first('description') ?: 'Заполните описание' }}</div>
          </div>
                    <div class="col-md-6">
            <label for="key_episodes" class="form-label">Ключевые серии</label>
            <input type="text" id="key_episodes" name="key_episodes" maxlength="255" required
                   class="form-control @error('key_episodes') is-invalid @enderror"
                   value="{{ old('key_episodes', $season->key_episodes) }}">
            <div class="invalid-feedback">{{ $errors->first('key_episodes') ?: 'Укажите ключевые серии' }}</div>
          </div>

          <div class="col-md-6">
            <label for="main_enemies" class="form-label">Главные враги</label>
            <input type="text" id="main_enemies" name="main_enemies" maxlength="255" required
                   class="form-control @error('main_enemies') is-invalid @enderror"
                   value="{{ old('main_enemies', $season->main_enemies) }}">
            <div class="invalid-feedback">{{ $errors->first('main_enemies') ?: 'Укажите главных врагов' }}</div>
          </div>

          <div class="col-12">
            <label for="image" class="form-label">Картинка{{ $season->exists ? ' (оставьте пустым, чтобы не менять)' : '' }}</label>
            @if ($season->image_path)
              <img src="{{ asset('storage/' . $season->image_path) }}" alt="" class="d-block rounded mb-2" style="max-height: 150px">
            @endif
            <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/webp"
                   class="form-control @error('image') is-invalid @enderror"
                   @unless ($season->exists) required @endunless>
            <div class="invalid-feedback">{{ $errors->first('image') ?: 'Выберите картинку' }}</div>
          </div>
        </div>

        <div class="d-flex gap-2 justify-content-end mt-4">
          <a href="{{ route('seasons.index') }}" class="btn btn-secondary">Отмена</a>
          <button type="submit" class="btn btn-primary">{{ $season->exists ? 'Сохранить' : 'Добавить' }}</button>
        </div>
      </form>
    </div>
  </div>
@endsection



