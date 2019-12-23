// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
  function printDiv(elementId) {
    // var a = document.getElementById('printing-css').value;
    var b = document.getElementById(elementId).innerHTML;
    // window.frames["print_frame"].document.title = "REPORT";
    window.frames["print_frame"].document.body.innerHTML = '<style></style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
  }
});
