@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h1>Lista de Docentes por Grupo</h1>

    <form action="{{ route('docentes_grupos.index') }}" method="GET">
        @csrf
        <div class="row mb-3">
            <div class="col-sm-4">
                <label for="docente_id" class="form-label">Docente</label>
                <select name="docente_id" class="form-control" required>
                    <option value="">Seleccione un docente</option>
                    @foreach ($docentes as $docente)
                        <option value="{{ $docente->id }}">{{ $docente->nombre }} {{ $docente->apellido }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary me-2">Buscar</button>
                <a href="{{ route('docentes_grupos.create') }}" class="btn btn-secondary">Crear Nuevo</a>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Docente</th>
                    <th>Grupo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($docenteGrupos as $docenteGrupo)
                    <tr>
                        <td>{{ $docenteGrupo->docente->nombre }} {{ $docenteGrupo->docente->apellido }}</td>
                        <td>{{ $docenteGrupo->grupo->nombre }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('docentes_grupos.edit', $docenteGrupo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <a href="{{ route('docentes_grupos.show', $docenteGrupo->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('docentes_grupos.delete', $docenteGrupo->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No hay registros disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="row mt-4">
        <div class="col-sm-12 d-flex justify-content-center">
            {{ $docenteGrupos->links() }}
        </div>
    </div>
</div>
@endsection