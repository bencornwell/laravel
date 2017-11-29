@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-offset-2 col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if(isset($grant))
                        {{ Lang::get('messages.ui.grant_edit' ) }}
                    @else
                        {{ Lang::get('messages.ui.grant_create' ) }}
                    @endif
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Grant Form -->
                    @if(isset($grant))
                        {{ Form::model( $grant, ['route' => ['grant.edit', $grant->id],'class' => 'form-horizontal' ] )  }}
                    @else
                        {{ Form::open( ['route' => ['grant.create'], 'class'=> 'form-horizontal' ] ) }}
                    @endif
                        {{ csrf_field() }}

                        <!-- Grant Project title -->
                        <div class="form-group">
                            {{ Form::label( 'project_title', 'Project Title', ['class' => 'col-sm-3 control-label'] ) }}
                            <div class="col-sm-9">
                                {{ Form::text( 'project_title', null,  ['class' => 'form-control'] ) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label( 'status_id', 'Project Status', ['class' => 'col-sm-3 control-label'] ) }}
                            <div class="col-sm-9">
                                {{ Form::select( 'status_id', $statuses, null, ['class' => 'form-control' ] ) }}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label( 'project_description', 'Project Description', ['class' => 'col-sm-3 control-label'] ) }}
                            <div class="col-sm-9">
                                {{ Form::textarea( 'project_description', null, ['class' => 'form-control', 'rows' => 5] ) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label( 'application_date', 'Application Date', ['class' => 'col-sm-3 control-label'] ) }}
                            <div class="col-sm-3">
                                {{ Form::text( 'application_date', null, ['class' => 'form-control datepicker' ] ) }}
                            </div>
                        </div>

                        <!-- Add Grant Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                {{ Form::button( '<i class="fa fa-btn fa-plus"></i>' . Lang::get('messages.ui.grant_save'), ['class' => 'btn btn-default', 'type' => 'submit'] ) }}
                            </div>
                        </div>

                    {{ Form::close() }}

                </div>
            </div>

        </div>
    </div>
@endsection
