$(document).ready(function () {
  $('#button').click(function () {
    var name = $("#name").val();
    var email = $("#email").val();
    $.post("process.php", {
      name: name,
      email: email
    }).complete(function() {
        console.log("Success");
      });
  });
});