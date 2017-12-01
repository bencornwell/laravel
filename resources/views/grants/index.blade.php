@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-sm col-sm-9">
                        @include('common.errors')
                    </div>
                    <!-- Action  Button -->
                    <div class="col-sm col-sm-3">
                        <button onClick="window.open('{{ url('/grant/create') }} ', '_self');" class="btn btn-default">
                            <i class="fa fa-btn fa-plus"></i>{{ Lang::get('messages.ui.grant_create') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ Lang::get('messages.ui.search' ) }}
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->

                </div>
            </div>
        </div>
        <div class="col-sm col-sm-12">

            <!-- Current Grants -->
            @if (count($grants) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{Lang::get('messages.ui.grant_list' ) }}
                    </div>

                    <div class="panel-body">
                        <table id="grant-table" class="table table-striped grant-table">
                            <thead>
                                <th>Project Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Application Date</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($grants as $grant)
                                    <tr>
                                        <td class="table-text"><a href="{{ url('/grant/edit/'.$grant->id) }}">{{ $grant->project_title }}</a></td>
                                        <td class="table-text">{{ $grant->project_description }}</td>
                                        <td class="table-text">{{ $grant->status( )->first( )->status_name }}</td>
                                        <td class="table-text">{{ $grant->application_date }}</td>
                                        <!-- Grant Delete Button -->
                                        <td>
                                            <form action="{{url('task/' . $grant->id )}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-task-{{ $grant->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>{{ Lang::get('messages.ui.delete' ) }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
