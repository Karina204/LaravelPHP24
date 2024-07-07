@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header bg-primary text-white">Ver docente</div>

                <div class="card-body">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" value="{{ $docente->nombre }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" value="{{ $docente->apellido }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" value="{{ $docente->email }}" disabled>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('docentes.index') }}" class="btn btn-primary me-md-2">Retornar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection