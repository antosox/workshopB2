$(document).ready(function(){
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
    });
    
});

$(document).ready(function(){
    $('.timepicker').timepicker({
        default: 'now',
        twelvehour: false, 
        donetext: 'OK',
        format: "HH:ii:SS",
        autoclose: false,
        vibrate: true
    });
});

$('.timepicker').on('change', function() {
    let receivedVal = $(this).val();
    $(this).val(receivedVal + ":00");
});


document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('select').formSelect();
  });
        

  $(document).ready(function(){
    $('.modal').modal();
  });
