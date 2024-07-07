@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header bg-primary text-white">Eliminar docente</div>
                <div class="card-body">
                    <form action="{{ route('docentes.destroy', $docente->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $docente->nombre }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $docente->apellido }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $docente->email }}" disabled>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-danger me-md-2">Eliminar</button>
                            <a href="{{ route('docentes.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection