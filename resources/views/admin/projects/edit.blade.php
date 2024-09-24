@extends('layouts.app')

@section('content')
    <h1>Modifica {{ $project->title }}</h1>
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.projects.update', $project) }}" method="POST">
        @csrf <!-- Token CSRF necessario per protezione -->
        @method('PUT')
        <div class="form-group">
            <label for="title">Titolo</label>
            <input value="{{ old('title', $project->title) }}" type="text" name="title" id="title"
                class="@error('title') is-invalid @enderror form-control">
            @error('title')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="txt">Descrizione</label>
            <textarea name="description" id="description" class="@error('description') is-invalid @enderror form-control"
                rows="5">{{ old('description', $project->description) }}</textarea>
            @error('description')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="reading_time">Data di inizio</label>
            <input value="{{ old('start_date', $project->start_date) }}" type="string" name="start_date" id="start_date"
                class="@error('start_date') is-invalid @enderror form-control" min="1">
            @error('start_date')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="end_date">Data di fine</label>
            <input value="{{ old('end_date', $project->end_date) }}" type="string" name="end_date" id="end_date"
                class="@error('end_date') is-invalid @enderror form-control">
            @error('end_date')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="collaborators">Numero di collaboratori</label>
            <input value="{{ old('collaborators', $project->collaborators) }}" type="number" name="collaborators"
                id="collaborators" class="@error('collaborators') is-invalid @enderror form-control" min="1">
            @error('collaborators')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="img">URL Immagine</label>
            <input value="{{ old('img', $project->img) }}" type="url" name="img" id="img"
                class="@error('img') is-invalid @enderror form-control">
            @error('img')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>


        <button type="submit" class="btn btn-danger">Modifica Progetto</button>
    </form>
@endsection
