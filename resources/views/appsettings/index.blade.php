@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ Lang::get('messages.ui.application_settings' ) }}
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif

                    <!-- Application Settings Form -->
                    <form action="{{ url('appsettings') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        @if (count($appsettings)>0)
                            @foreach( $appsettings as $setting)
                                <div class="form-group">
                                    <label for="app-setting[{{$setting->id}}]value" class="col-sm-3 control-label">{{$setting->name}}:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="app-setting[{{$setting->id}}]value" id="app-setting[{{$setting->id}}]value", class="form-control" value="{{$setting->setting_value}}" />
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <!-- App Settings Save Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="glyphicon fa-btn glyphicon-save"></i>{{ Lang::get('messages.ui.save_settings') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
