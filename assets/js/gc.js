jQuery(document).ready(function($) {

  $('li.nav-item > a').addClass('nav-link');

  // $('input.timepicker').timepicker({
  //   timeFormat: 'h:mm p',
  //   interval: 15,
  //   minTime: '9',
  //   maxTime: '10:00pm',
  //   defaultTime: '11',
  //   startTime: '9:00',
  //   dynamic: false,
  //   dropdown: true,
  //   scrollbar: true
  // });

});


function gcDeleteBulStart(id) {

  jQuery('#delete-bulletin-' + id).removeClass('show');
  jQuery('#delete-bulletin-' + id).addClass('d-none');

  jQuery('#delete-bulletin-' + id + '-confirm').removeClass('d-none');
  jQuery('#delete-bulletin-' + id + '-confirm').addClass('show');

}

function gcDeleteShiftStart(sid) {

  jQuery('#delete-tue-shift-' + sid).removeClass('show');
  jQuery('#delete-tue-shift-' + sid).addClass('d-none');

  jQuery('#delete-tue-shift-' + sid + '-confirm').removeClass('d-none');
  jQuery('#delete-tue-shift-' + sid + '-confirm').addClass('show');

}
