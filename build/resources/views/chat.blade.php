@extends('layouts.main')
@extends('layouts.topbar')
@extends('layouts.sidebar')

@section('content')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3>Delta <span class="small">Messanger</span></h3>
                </div>

                <div class="card-body" id="app">
                    <chat-app :user="{{ Auth()->user() }}"></chat-app>
                </div>
                <script src="{{ asset('/build/public/js/app.js') }}" defer></script>
            </div>
        </div>
    </div>
</div>
@endsection
