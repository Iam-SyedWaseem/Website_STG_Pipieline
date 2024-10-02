@extends('layout::layouts.main')
@section('title', 'Contact Us')
@section('style')
<style>
    #success-message {
        background-color: #d4edda;
        border: 1px solid #c3e6cb;
        padding: 15px;
        border-radius: 5px;
        font-size: 16px;
    }
</style>
@endsection
@section('content')
<div class="banner_area banner1 d-flex align-items-center pt-60 page-overlay" style="position: relative; background-image:url({{asset('assest/images/contact.jpg')}})">
        <div class="container">
            <div class="row position-relative z-1">
                <div class="col-lg-8 pt-30 wow fadeInLeft  ">
                    <div class="section_title text-left mb-90">
                        <div class="banner_text_content">
                            <h1>Contact Us</h1>
							<ol class="breadcrumb mt-10">
							  <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
							  <li class="breadcrumb-item active">Contact Us</li>
							</ol>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 pl-80 wow fadeInRight ">

                </div>
            </div>
        </div>
    </div>
	<div class="contact_address_area pt-100 pb-80 contact-us-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text_center mb-55 wow fadeInDown  animated" style="visibility: visible; animation-name: fadeInDown;">
                        <div class="section_sub_title uppercase mb-3">
                            <h6>CONTACT US</h6>
                        </div>
                        <div class="section_main_title">
                            <h1>We Are Here For You</h1>
                        </div>
                        <div class="em_bar">
                            <div class="em_bar_bg"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">

                <div class="row text-center">

                <div class="col-lg-4 col-md-4 col-sm-12 contact-us-info wow fadeInUp  animated animated" style="animation-delay: 0.1s; visibility: visible; animation-name: fadeInUp;">
                    <div class="single_contact_address text_center mb-30">
                        <div class="contact_address_icon pb-3">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="contact_address_title pb-2">
                            <h4>CrystaWall technologies LLC</h4>
                        </div>
                        <div class="contact_address_text">
                            <p><a href="#" target="_blank">1901 Westburry office tower, Business Bay, Dubai

</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12  wow fadeInUp  animated animated" style="animation-delay: 0.2s; visibility: visible; animation-name: fadeInUp;">
                    <div class="single_contact_address text_center mb-30">
                        <div class="contact_address_icon pb-3">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="contact_address_title pb-2">
                            <h4>Email</h4>
                        </div>
                        <div class="contact_address_text">
                            <p><a href="mailto:contact@crystawalltech.com">contact@crystawalltech.com</a></p>
                        </div>
                    </div>
                </div>

				<div class="col-lg-4 col-md-4 col-sm-12  wow fadeInUp  animated animated" style="animation-delay: 0.2s; visibility: visible; animation-name: fadeInUp;">
                    <div class="single_contact_address text_center mb-30">
                        <div class="contact_address_icon pb-3">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="contact_address_title pb-2">
                            <h4>Phone</h4>
                        </div>
                        <div class="contact_address_text">
                            <p><a href="tel:+97145531572">+971 455 31572</a></p>
                        </div>
                    </div>
                </div>



            </div>


            </div>
        </div>
    </div>

    <!-----  Contact Form ----->
    <div class="main_contact_area pt-80 bg_color2 pb-90" id="contact_form_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text_center mb-55 wow fadeInUp ">
                        <div class="section_sub_title uppercase mb-3">
                            <h6>CONTACT US</h6>
                        </div>
                        <div class="section_main_title">
                            <h1>Feel Free to Contact</h1>
                            <h1>with Us</h1>
                        </div>
                        <div class="em_bar">
                            <div class="em_bar_bg"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                     <div class="contact_from wow fadeInUp " style="animation-delay: 0.2s;">
                     <div class="mb-3" id="success-message" style="display:none;"></div>
                        <form id="contact_form" action="{{route('contact.contactFormSubmit')}}" method="POST" enctype="multipart/form-data">
                             <!-- <input type="hidden" name="_token" value="vngiVwUv4XLOwOZhWbLaLocYj6plDg3SBkLCrjBT">  -->
                                   @csrf
                             <div class="row">

                                <div class="col-lg-6">
                                    <div class="form_box mb-30">
                                        <input type="text" name="name" id="name" maxlength="200"  placeholder="Name">
                                        @error('name')
                                            <div class="input-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form_box mb-30">
                                        <input type="email" name="email" id="email" maxlength="255" placeholder="Email Address">
                                        @error('email')
                                            <div class="input-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form_box mb-30">
                                        <input type="number" name="phone_no" id="phone_no" maxlength="20"  placeholder="Phone Number">
                                        @error('phone_no')
                                            <div class="input-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form_box mb-30">
                                        <input type="text" name="website"  placeholder="Website">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form_box mb-30">
                                        <textarea name="message" id="write_msg" maxlength="1000" cols="30" rows="10"
                                                  placeholder="Write a Message"></textarea>
                                                  @error('message')
                                            <div class="input-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="quote_btn text_center">
                                        <button class="btn" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="form-message">

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="mCustomScrollbar">
    <div class="popup right-menu">
        <div class="right-menu-wrap">
            <div class="user-menu-close js-close-aside">
                <a href="#" class="user-menu-content  js-clode-aside">
                    <span></span>
                    <span></span>
                </a>
            </div>
            <div class="logo">
                <a href="{{route('home.index')}}" class="full-block-link"></a>
                <img loading="lazy" src="{{asset('assest/images/logo-final.png')}}" height="70px" alt="Crystawall Technologies LLC">


            </div>


        </div>

        <div class="widget contacts mt-15">
            <h4 class="contacts-title">Get In Touch</h4>
            <p class="contacts-text">We are here for you. Feel free to contact us! </p>
            <div class="contacts-item">
                <div class="icon">
                    <i class="fa fa-map-marker"></i>
                </div>
                <div class="content">
                    <a href="#" class="title">CrystalWall Technologies LLC </a>
                    <p class="sub-title akash-custom">1901 Westburry office tower, Business Bay, Dubai</p>
                </div>
            </div>
            <div class="contacts-item pt-10">
                <div class="icon">
                    <i class="fa fa-envelope" style="font-size: 0.80em;"></i>
                </div>

                <div class="content">
                    <a href="#" class="title">Email</a>
                    <p class="sub-title"><a class="akash-custom"
                                            href="mailto:contact@crystawalltech.com">contact@crystawalltech.com</a></p>
                </div>
            </div>
            <div class="contacts-item" style="">
                <div class="icon">
                    <i class="fa fa-phone"></i>
                </div>
                <div class="content" style="">
                    <a href="#" class="title">Contact</a>
                    <p class="sub-title akash-custom"><a class="akash-custom" href="tel:+97145531572">+971 455 31572</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
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
                  //  $('#success-message').text(response.success).show().fadeIn(500).delay(2000).fadeOut(1000); // Display success message
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
</script>

@endsection
