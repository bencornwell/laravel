@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ Lang::get('messages.ui.grant_list' ) }}
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Grant Form -->
                    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>{{ Lang::get('messages.ui.grant_create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Grants -->
            @if (count($grants) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{Lang::get('message.ui.grant_list' ) }}
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Grant</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($grants as $grant)
                                    <tr>
                                        <td class="table-text"><div>{{ $grant->project_title}}</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{url('task/' . $task->id )}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
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
