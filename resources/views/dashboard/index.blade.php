@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ Lang::get( 'messages.ui.dashboard' ) }}
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
					<h1>{{ Lang::get('messages.ui.dashboard') }}</h1>
                   
                </div>
            </div>

        </div>
    </div>
@endsection
