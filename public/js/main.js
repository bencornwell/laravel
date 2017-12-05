$('.datepicker').datepicker({dateFormat:'dd/mm/yy'});

$(document).ready( function() {
    $('#grant-table').DataTable( );
    $('#lead_organisation_change').click(function(){doModal({wrapper:'#lead_organisation_modal',url:'/organisations/modal',target:'#lead_organisation_id'});});
    $('#lead_organisation_id').on( 'change', function(e){
        var orgUrl = '/organisation/'+$(this).val( );
        var response = $.ajax({url:orgUrl, type:'GET' }).done(function(data){ 
            $('#lead_organisation_name').html(data.name); 
        });
    });
    $('#funding_round_change').click(function(){doModal({wrapper:'#funding_round_modal',url:'/fundinground/modal',target:'#funding_round_id'});});
    $('#lead_organisation_id').on( 'change', function(e){
            $('#funding_round_full_name').html('foo'); 
    });
});

var modalResult;
function doModal(c)
{
    $(c.wrapper).removeData('bs.modal');
    modalResult = c.target;
    
    var response = $.ajax({url:c.url, type:'GET' }).done(function(data){
        $(c.wrapper+ ' .modal-content').html(data);
        $(c.wrapper).modal('show');
        $('#modal_close').click(function(){ 
                $(c.wrapper).modal('hide');
                $(c.wrapper+ ' .modal-content').empty();
        });
    });

}
