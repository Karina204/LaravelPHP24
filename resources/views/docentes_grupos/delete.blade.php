@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-danger text-white">Eliminar docente grupo</div>

                <div class="card-body">
                    <form action="{{ route('docentes_grupos.destroy', $docenteGrupo->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="mb-3">
                            <label for="docente_nombre" class="form-label">Docente</label>
                            <input type="text" class="form-control" id="docente_nombre" 
                            value="{{ $docenteGrupo->docente->nombre }} {{ $docenteGrupo->docente->apellido }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="grupo_nombre" class="form-label">Grupo</label>
                            <input type="text" class="form-control" id="grupo_nombre" 
                            value="{{ $docenteGrupo->grupo->nombre }}" disabled>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-danger me-2">Eliminar</button>
                            <a href="{{ route('docentes_grupos.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection