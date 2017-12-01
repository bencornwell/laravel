<div class="tab-pane fade in show active" id="summary" role="tabpanel" aria-labelledby="summary-tab">
    <div class="form-group">
        {{ Form::label( 'project_title', Lang::get('messages.ui.project_title' ),  ['class' => 'col-sm-3 control-label'] ) }}
        <div class="col-sm-9">
            {{ Form::text( 'project_title', null,  ['class' => 'form-control'] ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( 'lead_organisation_id', Lang::get( 'messages.ui.lead_organisation' ), [ 'class' => 'col-sm-3 control-label' ] ) }}
        <div class="col-sm-6">
            {{ $grant->leadOrganisation( )->first( )->name }} &nbsp;&nbsp;
            {{ Form::button( '<i class="fa fa-btn fa-edit"></i>' . Lang::get('messages.ui.change'), ['class' => 'btn btn-default'] ) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">{{ Lang::get( 'messages.ui.funding_agency' ) }}</label>
        <div class="col-sm-9">
            {{ $grant->fundingAgency( )->first( )->name }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( 'project_title', Lang::get( 'messages.ui.grant_program' ), ['class' => 'col-sm-3 control-label'] ) }}
        <div class="col-sm-9">
            {{ $grant->fundingRound( )->first( )->fullname( ) }} &nbsp;&nbsp; {{ Form::button( '<i class="fa fa-btn fa-edit"></i>' . Lang::get('messages.ui.change'), ['class' => 'btn btn-default'] ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( 'funding_agency_reference', Lang::get('messages.ui.funding_agency_reference' ), ['class'=>'col-sm-3 control-label' ] ) }}
        <div class="col-sm-9">
            {{ Form::text( 'funding_agency_reference', null, ['class' => 'form-control'] ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( 'status_id', Lang::get('messages.ui.project_status'), ['class' => 'col-sm-3 control-label'] ) }}
        <div class="col-sm-9">
            {{ Form::select( 'status_id', $statuses, null, ['class' => 'form-control' ] ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( 'project_description', Lang::get('messages.ui.project_description'), ['class' => 'col-sm-3 control-label'] ) }}
        <div class="col-sm-9">
            {{ Form::textarea( 'project_description', null, ['class' => 'form-control', 'rows' => 5] ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( 'application_date', Lang::get('messages.ui.application_date'), ['class' => 'col-sm-3 control-label'] ) }}
        <div class="col-sm-3">
            {{ Form::text( 'application_date', null, ['class' => 'form-control datepicker' ] ) }}
        </div>
        {{ Form::label( 'funder_decision_date', Lang::get('messages.ui.funder_decision_date'), ['class' => 'col-sm-3 control-label'] ) }}
        <div class="col-sm-3">
            {{ Form::text( 'funder_decision_date', null, ['class' => 'form-control datepicker' ] ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( 'planned_start_date', Lang::get('messages.ui.planned_start_date'), ['class' => 'col-sm-3 control-label'] ) }}
        <div class="col-sm-3">
            {{ Form::text( 'planned_start_date', null, ['class' => 'form-control datepicker' ] ) }}
        </div>
        {{ Form::label( 'planned_end_date', Lang::get('messages.ui.planned_end_date'), ['class' => 'col-sm-3 control-label'] ) }}
        <div class="col-sm-3">
            {{ Form::text( 'planned_end_date',null, ['class' => 'form-control datepicker' ] ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( 'actual_end_date', Lang::get('messages.ui.actual_end_date'), ['class' => 'col-sm-3 control-label'] ) }}
        <div class="col-sm-3">
            {{ Form::text( 'actual_end_date', null, ['class' => 'form-control datepicker' ] ) }}
        </div>
        {{ Form::label( 'relinquished_date', Lang::get('messages.ui.relinquished_date'), ['class' => 'col-sm-3 control-label'] ) }}
        <div class="col-sm-3">
            {{ Form::text( 'relinquished_date',null, ['class' => 'form-control datepicker' ] ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( 'transferred_in_date', Lang::get('messages.ui.transferred_in_date'), ['class' => 'col-sm-3 control-label'] ) }}
        <div class="col-sm-3">
            {{ Form::text( 'transferred_in_date', null, ['class' => 'form-control datepicker' ] ) }}
        </div>
        {{ Form::label( 'transferred_in_organisation_id', Lang::get('messages.ui.transferred_from'), ['class' => 'col-sm-3 control-label'] ) }}
        <div class="col-sm-3">
            @if ($grant->transferredFromOrganisation( )->first( )) 
                {{ $grant->transferredFromOrganisation( )->first( )->name }} &nbsp;&nbsp;
            @endif
            {{ Form::button( '<i class="fa fa-btn fa-edit"></i>' . Lang::get('messages.ui.change'), ['class' => 'btn btn-default'] ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( 'transferred_out_date', Lang::get('messages.ui.transferred_out_date'), ['class' => 'col-sm-3 control-label'] ) }}
        <div class="col-sm-3">
            {{ Form::text( 'transferred_out_date', null, ['class' => 'form-control datepicker' ] ) }}
        </div>
        {{ Form::label( 'transferred_out_organisation_id', Lang::get('messages.ui.transferred_to'), ['class' => 'col-sm-3 control-label'] ) }}
        <div class="col-sm-3">
            @if ($grant->transferredToOrganisation( )->first( )) 
                {{ $grant->transferredToOrganisation( )->first( )->name }} &nbsp;&nbsp;
            @endif
            {{ Form::button( '<i class="fa fa-btn fa-edit"></i>' . Lang::get('messages.ui.change'), ['class' => 'btn btn-default'] ) }}
        </div>
    </div>
</div>
