@php
    $layout = (auth()->check() && auth()->user()->role == 'admin') ? 'layouts.app_tiny' : 'layouts.app_home';
@endphp

@extends($layout)


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

                    {{ __('You are asdasdasd in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
