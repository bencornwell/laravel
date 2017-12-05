<div class="col-sm-12">
    <div class="panel panel-default">
        @if($rounds)
            <div class="panel-heading">
                {{ Lang::get('messages.ui.select_funding_round') }}
            </div>
            <div style="margin:20px;">
            {!! $table !!}
            </div>
            <div class="panel-footer">
                {{ Form::button( '<i class="fa fa-btn fa-close"></i>' . Lang::get('messages.ui.cancel'), ['class' => 'btn btn-default', 'id' => 'modal_close'] ) }}
            </div>
        @endif
    </div>
</div>
