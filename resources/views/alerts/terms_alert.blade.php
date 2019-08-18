@if(\App\Term::last_term_id() and \Illuminate\Support\Facades\Auth::user() and !\App\UserTerm::is_accepted(\Illuminate\Support\Facades\Auth::user()->id))
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="alert" class="alert alert-danger" role="alert">
                    We have updated our <strong> Terms of Service</strong>. Please read carefully.
                    <a href="{{ route('terms_and_conditions') }}">Learn more</a> about what's changed.
                    <div>
                        {!! Form::open(['method'=>'POST', 'action'=>['UserTermController@store']])!!}
                            <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}" />
                            <input type="hidden" name="term_id" value="{{ \App\Term::last_term_id() }}" />
                            {!! Form::submit('Accept', ['class'=>'btn btn-danger btn-sm']) !!}
                            <a href="{{ route('currently_accepted_terms') }}" class="btn btn-warning btn-sm">Currently Accepted Terms</a>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
