@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success fade show" id="success-message" role="alert" data-bs-dismiss="alert">
            {{ session('success') }}
        </div>
    @endif

    <h1>Lista de grupos</h1>

    <form action="{{ route('grupos.index') }}" method="GET">
        @csrf
        <div class="row mb-3">
            <div class="col-sm-4">
                <input type="text" class="form-control" name="nombre" placeholder="Buscar por nombre">
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="apellido" placeholder="Buscar por apellido">
            </div>
            <div class="col-sm-4 d-flex">
                <button type="submit" class="btn btn-primary btn-sm me-2">Buscar</button>
                <a href="{{ route('grupos.create') }}" class="btn btn-secondary btn-sm">Crear Nuevo</a>
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grupos as $grupo)
                <tr>
                    <td>{{ $grupo->nombre }}</td>
                    <td>{{ $grupo->descripcion }}</td>
                    <td>
                        <a href="{{ route('grupos.edit', $grupo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <a href="{{ route('grupos.show', $grupo->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('grupos.delete', $grupo->id) }}" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row mt-4">
        <div class="col-sm-12">
            {{ $grupos->links() }}
        </div>
    </div>
@endsection