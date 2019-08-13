<div class="modal" id="loginModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5>
                <button class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user "></i>
                                </span>
                            </div>
                            <input class="form-control @error('email') is-invalid @enderror" name="email"  type="email" placeholder="E-mail" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-key "></i>
                                </span>
                            </div>
                            <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <small>Forgot your <a href="{{ route('password.request') }}">password</a>?</small>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                </form>
                @if ( count($errors) > 0 )
                    <script>
                        $(document).ready(function() {
                            $('#loginModal').modal('show');
                        });
                    </script>
                @endif
            </div>
        </div>
    </div>

