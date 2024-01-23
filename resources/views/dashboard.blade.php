@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as ') }}

                    @if (Auth::user()->role_type === 'a')
                        {{ __('Administrator user !') }}
                    @else
                        {{ __('Normal user !') }}
                    @endif
                </div>
                <div class="card-body">
                    @if (Auth::user()->role_type === 'a')
                        <a href="{{ route('listings.index') }}">
                            <button type="button" class="btn btn-primary">Go to Listing Page</button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection