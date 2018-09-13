$(document).ready(function () {
  $('.datepicker').datepicker({
    format: 'dd/mm/yyyy'
  });
});

$(document).ready(function () {
  $('.timepicker').timepicker();
});

document.addEventListener('DOMContentLoaded', function () {
  var elems = document.querySelectorAll('select');
  var instances = M.FormSelect.init(elems, options);
});

$(document).ready(function () {
  $('select').formSelect();
});

$(document).ready(function () {
  $('.modal').modal();
});


$(document).ready(function(){
  $('.sidenav').sidenav();
});

CountDown.load();