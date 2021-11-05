@extends('layout')

@section('title', 'Detalles de un usuario')

@section('content')
    <div class="card">

        <div class="card-header h4">

            <h1>Crear nuevo usuario</h1>

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


            @endif

            <form action="{{ route('users.store') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" name="email" value="{{ old('email') }} " class="form-control" size="30" pattern="\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b">

                </div>

                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="bio">Biografía</label>
                    <textarea type="text" name="bio" class="form-control">{{ old('bio') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="twitter">Twitter</label>
                    <input type="text" name="twitter" class="form-control" value="{{ old('twitter') }}"
                    placeholder="URL de tu usuario de twitter">
                </div>

                <button type="submit" class="btn-primary btn">Crear usuario</button>
            </form>

        </div>

    <div class="card-footer footer">
        <p>

            <a href="{{ route('users.index') }}">Regresar al listado de usuarios</a>

        </p>
    </div>

@endsection