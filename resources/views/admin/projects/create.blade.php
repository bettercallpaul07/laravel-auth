@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col">
            <h1>
                Aggiungi nuovo progetto
            </h1>
        </div>
        @if ($errors->any())
        <div class="row mb-4">
            <div class="col">
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="row mb-4">
        <div class="col">
            <form action="{{ route("admin.projects.store") }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input
                     type="text"
                     class="form-control"
                     id="title"
                     name="title"
                     placeholder="Inserisci il titolo..."
                     required
                     maxlength="128">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Contenuto</label>
                    <input
                     type="text"
                     class="form-control"
                     id="content"
                     name="content"
                     placeholder="Inserisci il contenuto..."
                     required
                     maxlength="4026">
                </div>

                <div>
                    <button type="submit" class="btn btn-success">
                        Salva nuovo progetto
                    </button>
                </div>
                     
                     
                     
                    



                </div>
            
            
            
            </form>

        </div>

    </div>
</div>
@endsection