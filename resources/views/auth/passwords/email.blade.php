@include('layouts.headerTie')
@if (session('status'))
            <div class="modal modal-aviso">
                <div id="interno" class="alert alert-success">
                    <i class="fa fa-times"></i>
                    <span>{{ session('status') }}</span>
                </div>
            </div>
        @endif
        <section id="pant3" class="quienes-section contacto">
            <div class="row">
                <h2 class="home-h2">¡Recupera tu Contraseña!</h2>
                <div class="home-boxs-3">
                    <div class="h-box-3">
                        <div class="h-box-3-text">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                        
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                        
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                        
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary enviar-white">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
            	</div>
        </section>
@include('layouts/footer1')