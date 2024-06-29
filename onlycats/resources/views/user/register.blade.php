@extends('templates.public')

@section('content')
<div class="row vh-100 g-0">
    <!-- Izquierda inicio 
    <div class="col-lg-6 position-relative d-none d-lg-block">
        <div class="bg-holder" style="background-image: url(images/Logo.png)"></div>
    </div>
    -->
    <!-- Izquierda fin -->

    <!-- derecha inicio -->
    <div class="right col-lg-6">
        <div class="row align-items-center justify-content-center h-100 g-0 px-4 px-sm-0">
            <div class="col col-sm-6 col-lg-7 col-xl-6">

                <!-- icono inicio -->
                <a href="https://aula.usm.cl" class="d-flex justify-content-center mb-4">
                    <img src="https://aula.usm.cl/portada/images/logo-usm_blanco.ba50c1e92c05ce59220ab09bd88a6d5b.svg" alt="" width="250">
                </a>
                <!-- icono fin -->

                <div class="text-center mb-5">
                    <h3 class="fw-bold">Registro</h3>
                    <p class="text-secondary">Crea tu cuenta</p>
                </div>

                <!-- divisor inicio -->
                <div class="position-relative">
                    <hr class="text-secondary">
                </div>
                <!-- divisor fin -->

                <!-- form inicio -->
                <form method="POST" action="{{ route('registering') }}">
                    @csrf
                    <div class="input-group mb-3 d-flex">
                        <span class="input-group-text">
                            <i class='bx bx-user'></i>
                        </span>
                        <input type="text" id="name" name="name" class="form-control form-control-lg fs-6" placeholder="Usuario">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class='bx bx-lock-alt'></i>
                        </span>
                        <input type="password" id="password" name="password" class="form-control form-control-lg fs-6" placeholder="Contraseña">
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button class="btn btn-primary btn-lg w-100" type="submit">
                    Registrarse
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection