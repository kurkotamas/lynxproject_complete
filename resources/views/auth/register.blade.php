<div class="modal" id="registerModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register</h5>
                <button class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Full Name"  autocomplete="name" autofocus >
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" autofocus>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                    </div>
                    <div class="form-group form-check pt-3">
                        <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror" id="termsCheck" name="terms">
                        <label class="form-check-label" for="termsCheck">I agree to the <a href="">Terms of Service</a></label>
                        @error('terms')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-block">Register</button>
                    </div>
                </form>
                {{--@if (count($errors) > 0)--}}
                    {{--<script>--}}
                        {{--$(document).ready(function() {--}}
                            {{--$('#registerModal').modal('show');--}}
                        {{--});--}}
                    {{--</script>--}}
                {{--@endif--}}
            </div>
        </div>
    </div>
</div>