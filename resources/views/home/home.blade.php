@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                            }
                        </div>
                    @endif
                    
                    <ul>
                        <li><a href="{{ route('servicios') }}">{{ __('Gestion Servicios') }}</a></li>
                        <li><a href="{{ route('fiestas') }}">{{ __('Gestion de Fiestas') }}</a></li>
                        <li><a href="{{ route('herramientas') }}">{{ __('Gestion de Herramientas') }}</a></li>
                        <li><a href="{{ route('usuarios') }}">{{ __('Gestion de Usuarios') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
