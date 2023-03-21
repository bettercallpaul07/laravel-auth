@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col">
            <h1>
                Modifica progetto
            </h1>
        </div>
        @include('partials.errors')
    </div>
    <div class="row mb-4">
        <div class="col">
            <form action="{{ route("admin.projects.update"), $project->id }}" method="POST">
                @csrf
                @method("PUT")
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input
                     type="text"
                     class="form-control"
                     id="title"
                     name="title"
                     value="{{ old("title", $post->title) }}"
                     placeholder="Inserisci il titolo..."
                     required
                     maxlength="128">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Contenuto</label>
                    <textarea
                        rows="10"
                        class="form-control"
                        id="content"
                        name="content"
                        placeholder="Inserisci il contenuto..."
                        required
                        maxlength="4096">{{ old("content", $post->content) }}</textarea>
                </div>

                <div>
                    <button type="submit" class="btn btn-warning">
                        Aggiorna il progetto
                    </button>
                </div>
                     
                     
                     
                    



                </div>
            
            
            
            </form>

        </div>

    </div>
</div>
@endsection