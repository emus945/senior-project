$(document).ready(function() {
  $("#book-form").submit(function(event) {
    // Prevent the form from submitting normally
    event.preventDefault();

    // Get the form data
    var formData = {
      'name': $('input[name=name]').val(),
      'email': $('input[name=email]').val(),
      'phone': $('input[name=phone]').val(),
      'date': $('input[name=date]').val(),
      'time': $('input[name=time]').val(),
      'guests': $('input[name=guests]').val()
    };

    // Send the form data using AJAX
    $.ajax({
      type: 'POST',
      url: 'reservation.php',
      data: formData,
      dataType: 'json',
      encode: true
    })
    .done(function(data) {
      // Display the success message
      $("#success-message").html(data.message);
      $("#success-message").removeClass("hidden");
      $("#book-form").addClass("hidden");
    })
    .fail(function(data) {
      // Display the error message
      $("#error-message").html(data.responseJSON.message);
      $("#error-message").removeClass("hidden");
    });
  });
});
