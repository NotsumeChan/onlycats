@extends('templates.user')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3 class="text-center m-3">Menú</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-8 ">
            <div class="row">
                <div class="col-md-2">
                    <form action="{{route('producto.sortby')}}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="hidden" name="sort" value="name">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Name</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-2">
                    <form action="{{route('producto.sortby')}}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="hidden" name="sort" value="category">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Category</button>
                        </div>
                    </form>
                </div>
            </div>
            
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th colspan="3">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <td class="align-middle">{{ $producto->id }}</td>
                    <td class="align-middle">{{ $producto->name }}</td>
                    <td class="align-middle">{{ $producto->description }}</td>
                    <td class="align-middle">{{ $producto->category_id }}</td>
                    <td class="align-middle">{{ $producto->price }}</td>
                    <td class="align-middle">{{ $producto->stock }}</td>

                    <td class="text-center" style="width: 1rem">
                        <form action="{{ route('producto.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $producto->id }}">
                            <button type="submit" class="btn btn-sm btn-warning pb-0 text-white">
                                <span class="material-icons">edit</span>
                            </button>
                        </form>
                    </td>
    
                    <td class="text-center" style="width: 1rem">
                        <form action="{{ route('producto.delete') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $producto->id }}">
                            <button type="submit" class="btn btn-sm btn-danger pb-0 text-white">
                                <span class="material-icons">delete</span>
                            </button>
                        </form>
                    </td>
                    
                    <td class="text-center" style="width: 1rem">
                        <form action="{{ route('producto.substract') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $producto->id }}">
                            <button type="submit" class="btn btn-sm btn-danger pb-0 text-white">
                                <span class="material-icons">shopping_cart</span>
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
            <div class="card-header bg-dark text-white">Sort By</div>
            <div class="card-body">

                <form method="POST" action="{{ route('producto.search') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="estado" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Category</label>
                        <input type="text" name="category" id="category" class="form-control">
                    </div>
                    <div class="mb-3 d-grid gap-2 d-lg-block">
                        <button type="reset" class="btn btn-warning">Cancel</button>
                        <button type="submit" class="btn btn-success">sort</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-dark text-white">Add product</div>
            <div class="card-body">

                <form method="POST" action="{{ route('producto.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="estado" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="capacidad" class="form-label">Description</label>
                        <input type="text" name="description" id="description" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Price</label>
                        <input type="text" name="price" id="price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Stock</label>
                        <input type="text" name="stock" id="stock" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Category</label>
                        <input type="text" name="category" id="category" class="form-control">
                    </div>
                    @error('category', 'name', 'description', 'price', 'stock')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3 d-grid gap-2 d-lg-block">
                        <button type="reset" class="btn btn-warning">Cancelar</button>
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection