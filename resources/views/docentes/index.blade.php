@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success fade show" id="success-message" role="alert" data-bs-dismiss="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h1>Lista de Docentes</h1>

    <form action="{{ route('docentes.index') }}" method="GET">
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
                <a href="{{ route('docentes.create') }}" class="btn btn-secondary btn-sm">Crear Nuevo</a>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($docentes as $docente)
                    <tr>
                        <td>{{ $docente->nombre }}</td>
                        <td>{{ $docente->apellido }}</td>
                        <td>{{ $docente->email }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('docentes.edit', $docente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <a href="{{ route('docentes.show', $docente->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('docentes.delete', $docente->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No hay docentes disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="row mt-4">
        <div class="col-sm-12">
            {{ $docentes->links() }}
        </div>
    </div>
</div>
@endsection