document.addEventListener('DOMContentLoaded', function() {
  //  tool tip
    var toll = document.querySelectorAll('.tooltipped');
    var tollinstances = M.Tooltip.init(toll, {
      margin: 0
    });

  // droupdown
    var droup = document.querySelectorAll('.dropdown-trigger');
    var droupinstances = M.Dropdown.init(droup, {
      constrainWidth: false,
      coverTrigger: false,
      hover: true
    } );

  // selcet
    var slect = document.querySelectorAll('select');
    var slectinstances = M.FormSelect.init(slect);

  // nav drwaver
    var sidenav = document.querySelectorAll('.sidenav');
    var sidenavinstances = M.Sidenav.init(sidenav);

  // modal
    var model = document.querySelectorAll('.modal');
    var modelinstances = M.Modal.init(model);

    var date = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(date, {
      format: 'yyyy-mm-dd',});
  });

