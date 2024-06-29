@extends('templates.user')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3 class="text-center m-3">Menú</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-8 order-last order-lg-first">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th colspan="2">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                <tr>
                    <td class="align-middle">{{ $categoria->id }}</td>
                    <td class="align-middle">{{ $categoria->name }}</td>

                    <td class="text-center" style="width: 1rem">
                        <form action="{{ route('category.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $categoria->id }}">
                            <button type="submit" class="btn btn-sm btn-warning pb-0 text-white">
                                <span class="material-icons">edit</span>
                            </button>
                        </form>
                    </td>

                    <td class="text-center" style="width: 1rem">
                        <form action="{{ route('category.delete') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $categoria->id }}">
                            <button type="submit" class="btn btn-sm btn-danger pb-0 text-white">
                                <span class="material-icons">delete</span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    <div class="col-12 col-lg-4 order-first order-lg-last">
        <div class="card">
            <div class="card-header bg-dark text-white">Agregar producto</div>
            <div class="card-body">

                <form method="POST" action="{{ route('category.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="estado" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="mb-3 d-grid gap-2 d-lg-block">
                        <button type="reset" class="btn btn-warning">cancel</button>
                        <button type="submit" class="btn btn-success">Add Category</button>
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('category')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </form>
            </div>
        </div>
    </div>
</div>
@endsection