@extends('admin.layouts.main')

@section('content')
<div class="container mt-4">
    <h1>Agregar Categoría</h1>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nombre de la categoría</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar categoría</button>
    </form>
</div>
@endsection
