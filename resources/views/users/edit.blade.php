
@extends('layout')

@section('title', 'Editar usuario')

@section('content')
    <div class="card">

        <div class="card-header h4">

    <h1>Editar usuario</h1>

        </div>
    </div>

    <div class="card-body visible-print">
    @if($errors->any())
        <div class="alert alert-danger">
            <h6>Por favor, corrige los siguientes errores:</h6>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                    </ul>
        </div>
    </div>
    @endif


    <form action="{{ route('users.update', $user) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <label for="name">Nombre:</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}">
        <br>
        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" size="30" pattern="\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b">
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" >
        <br>
        <button type="submit" class="btn btn-success">Editar usuario</button>
    </form>
    <br>


    <div class="card-footer footer">
    <p>

        <a href="{{ route('users.index') }}">Regresar al listado de usuarios</a>

    </p>
    </div>

@endsection
