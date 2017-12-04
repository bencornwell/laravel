$('.datepicker').datepicker({dateFormat:'dd/mm/yy'});

$(document).ready( function() {
    $('#grant-table').DataTable( );
    $('#lead_organisation_change').click(function(){doModal({wrapper:'#lead_organisation_modal',url:'/organisations/modal',target:'#lead_organisation_id'});});
});

function doModal(c)
{
    $(c.wrapper).removeData('bs.modal');
    
    var response = $.ajax({url:c.url, type:'GET' }).done(function(data){
        $(c.wrapper+ ' .modal-content').html(data);
        $(c.wrapper).modal('show');
        $('#modal_close').click(function(){ 
                $(c.wrapper).modal('hide');
                $(c.wrapper+ ' .modal-content').empty();
        });
    });

}
