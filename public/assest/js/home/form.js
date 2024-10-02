
    $(document).ready(function() {
        $('#contact_form').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            var form = $(this);
            var formData = new FormData(form[0]);
            var submitButton = form.find('button[type="submit"]'); // Correctly select the submit button

            submitButton.prop('disabled', true);
            submitButton.text('Sending...');

            $.ajax({
                url: form.attr('action'), // The URL to send the request to
                method: 'POST', // The HTTP method to use for the request
                data: formData, // The form data
                processData: false, // Prevent jQuery from automatically transforming the data into a query string
                contentType: false, // Prevent jQuery from automatically setting the content type
                success: function(response) {
                      // Handle success response
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.success,
                        confirmButtonText: 'OK'
                    });
                   // alert(response.success); // Show success message
                   // $('#success-message').text(response.success).show().fadeIn(500).delay(2000).fadeOut(1000); // Display success message
                    form[0].reset(); // Reset the form
                },
                error: function(xhr) {
                    // Handle error response
                    var errors = xhr.responseJSON.errors;
                    $('.input-error').remove(); // Remove existing errors
                    $.each(errors, function(key, value) {
                        var input = $('input[name="' + key + '"], textarea[name="' + key + '"]');
                        input.after('<div class="input-error">' + value[0] + '</div>'); // Display error message
                    });
                },
                complete: function() {
                    // Re-enable the submit button and reset text
                    submitButton.prop('disabled', false);
                    submitButton.text('Send Message'); // Optional: Restore button text
                }

            });
        });

           // Clear error message on title input
    $('#name').on('input', function() {
      $('#name').next('.input-error').remove();
    });

    // Clear error message on description textarea
    $('#email').on('input', function() {
      $('#email').next('.input-error').remove();
    });
      // Clear error message on description textarea
      $('#phone_no').on('input', function() {
      $('#phone_no').next('.input-error').remove();
    });
      // Clear error message on description textarea
      $('#write_msg').on('input', function() {
      $('#write_msg').next('.input-error').remove();
    });

    });
