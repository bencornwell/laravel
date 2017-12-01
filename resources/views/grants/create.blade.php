@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md col-md-12">
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

                        @include('grants.nav' )

                        <!-- Grant Project title -->

                        <div class="tab-content" id="grantTabContent" >
                        @include('grants.tabs.summary' )
                        @include('grants.tabs.investigators' )
                        @include('grants.tabs.organisations' )
                        @include('grants.tabs.financials' )
                        @include('grants.tabs.documents' )
                        @include('grants.tabs.notes' )
                        @include('grants.tabs.audit' )
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
