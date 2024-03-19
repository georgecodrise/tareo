@extends('layout.master', [
    'title' => 'Inicio de sesión',
    'type' => 'auth',
])

@section('custom-scripts')
    <script src="{{ asset('assets/application/js/auth/login.js') . '?t=' . time() }}"></script>
@endsection

@section('content')
    <form id="form_login" class="form" action="{{ route('login') }}" method="POST">
        @csrf

        <div class="text-center mb-11">
            <h1 class="text-gray-800 fw-bolder mb-3">Iniciar sesión</h1>
            <div class="text-gray-500 fw-semibold fs-6">
                Introduzca sus credenciales de acceso para acceder a la aplicación
            </div>
        </div>

        <div class="fv-row mb-8">
            <label class="required fw-semibold fs-6 mb-2">Usuario</label>

            <input type="text" name="username" class="form-control bg-transparent" autocomplete="off" />

            <div id="username-errors" class="invalid-feedback"></div>
        </div>

        <div class="fv-row mb-10" data-kt-password-meter="true">
            <label class="required fw-semibold fs-6 mb-2">Contraseña</label>

            <div class="input-group has-validation">
                <input type="password" class="form-control bg-transparent" name="password" autocomplete="off" />

                <span class="input-group-text bg-transparent cursor-pointer" data-kt-password-meter-control="visibility">
                    <i class="ki-duotone ki-eye-slash fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                    </i>
                    <i class="ki-duotone ki-eye d-none fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>
                </span>

                <div id="password-errors" class="invalid-feedback"></div>
            </div>
        </div>

        <div class="d-grid mb-3">
            <button id="btn_submit_login" type="submit" class="btn btn-primary">
                <span class="indicator-label">
                    Ingresar
                </span>
                <span class="indicator-progress">
                    Cargando...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
            </button>
        </div>

        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold">
            <div></div>

            <a href="#" target="_blank" class="link-primary">
                ¿Olvidaste su contraseña?
            </a>
        </div>
    </form>
@endsection
