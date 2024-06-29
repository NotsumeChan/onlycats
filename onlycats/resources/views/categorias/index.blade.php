@extends('templates.public')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3 class="text-center m-3">Categorys</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-8 order-last order-lg-first">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                <tr>
                    <td class="align-middle">{{ $categoria->id }}</td>
                    <td class="align-middle">{{ $categoria->name }}</td>

                
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>
@endsection