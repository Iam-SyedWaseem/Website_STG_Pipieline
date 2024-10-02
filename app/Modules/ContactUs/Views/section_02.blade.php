@php
    // Get the UTM values from the URL
    $utm_source = request()->input('utm_source');
    $utm_id = request()->input('utm_id');
    $utm_campaign = request()->input('utm_campaign');
    $utm_medium = request()->input('utm_medium');

    // Remove UTM parameters from the URL
    $page_url = preg_replace('/(\?|&)utm_source=[^&]+/', '', request()->fullUrl());
    $page_url = preg_replace('/(\?|&)utm_id=[^&]+/', '', $page_url);
    $page_url = preg_replace('/(\?|&)utm_campaign=[^&]+/', '', $page_url);
    $page_url = preg_replace('/(\?|&)utm_medium=[^&]+/', '', $page_url);

    // Get the IP address
    $ip_address = request()->ips();

@endphp

@desktop
<section>
    <div class="my-16 py-0 px-4 mx-auto max-w-screen-xl md:max-w-screen-lg 2xl:max-w-screen-xl text-left">

        <div class="grid grid-cols-1 md:grid-cols-3 h-full gap-8">
            <div class="h-full w-full content-between">
                <div class="w-full grid">
                    <h2 class="mb-4 text-4xl uppercase font-light tracking-tight leading-none  md:text-5xl md:mb-8">
                        Get in touch
                    </h2>
                </div>
                <div>
                    <p class="mb-8 text-crystawall-dark font-light text-justify">
                        We’re here to help you take the next step toward realizing your vision. Whether you have a specific project in mind or just want to learn more about how Crystawall can support your business, we’d love to hear from you.
                    </p>
                </div>
            </div>
            <div class="col-span-2">
                <form id="contact_form" action="{{route('contact.contactFormSubmit')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="">
                            <input type="text" id="name" name="name" placeholder="Full Name" maxlength="40" class="block w-full p-4 text-crystawall-dark border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue " required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="">
                            <input type="text" id="email" name="email" placeholder="Email" class="block w-full p-4 text-crystawall-dark border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue " required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <select id="countries" name="country_code" id="country_code" aria-label="country code" class="mb-5 lg:mb-0 border border-crystawall-outline text-[#777777]  focus:ring-crystawall-blue focus:border-crystawall-blue block w-full p-4 ">
                            @foreach ($countries as $country)
                                <option value="{{ $country['code'] }}" @if($country['code'] == '+971') selected @endif >{{$country['name']}} ({{ $country['code'] }}) </option>
                            @endforeach
                        </select>
                        <div class="">
                            <input type="number" id="phone_no_contact" name="phone_no" placeholder="Phone" class="block w-full p-4 border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue " required>
                            @error('phone_no')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <input type="text" id="website" name="website" placeholder="Organization Website (optional)" class="block w-full p-4 text-crystawall-dark border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue">
                            @error('website')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-2 ">
                            <textarea id="message" rows="2" id="msg" name="message" placeholder="Inquiry" class="block p-4 w-full  text-crystawall-dark rounded-none border border-crystawall-outline focus:crystawall-blue focus:crystawall-blue " required></textarea>
                            @error('message')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-2 mb-5">
                            <button type="submit" id="contact-form-submit" class="block w-full bg-black rounded-none p-4 text-white">
                                GET QUOTE
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@enddesktop

@mobile
<section>
    <div class="my-8 py-0 px-4 mx-auto max-w-screen-xl text-left">
        <div class="w-full grid">
            <h2 class="mb-4 text-4xl uppercase font-light tracking-tight leading-none  md:text-5xl md:my-8">
                Get in touch
            </h2>
        </div>
        <div class="">
            <form id="contact_form" action="{{route('contact.contactFormSubmit')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <input type="text" id="name" name="name" placeholder="Full Name " maxlength="40" class="block w-full p-4 text-crystawall-dark border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue " required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-5">
                    <input type="text" id="email" name="email" placeholder="Email" class="block w-full p-4 text-crystawall-dark border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue " required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5">
                    <select id="countries" name="country_code" id="country_code" aria-label="country code" class="lg:mb-0 border border-crystawall-outline text-[#777777]  focus:ring-crystawall-blue focus:border-crystawall-blue block w-full p-4 ">
                        @foreach ($countries as $country)
                            <option value="{{ $country['code'] }}" @if($country['code'] == '+971') selected @endif >{{$country['name']}} ({{ $country['code'] }}) </option>
                        @endforeach
                    </select>
                    <div>
                        <input type="number" id="phone_no_contact" name="phone_no" placeholder="Phone" class="block w-full p-4  border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue " required>
                        @error('phone_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-5">
                    <input type="text" id="website" name="website" placeholder="Organization Website (optional)" class="block w-full p-4 text-crystawall-dark border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue">
                    @error('website')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-2 mb-5">
                    <textarea id="message" rows="2" id="msg" name="message" placeholder="Inquiry" class="block p-4 w-full  text-crystawall-dark rounded-none border border-crystawall-outline focus:crystawall-blue focus:crystawall-blue " required></textarea>
                    @error('message')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-2 mb-5">
                    <button type="submit" id="contact-form-submit" class="block w-full bg-black rounded-none p-4 text-white">
                        GET IN TOUCH
                    </button>
                </div>
            </form>
            <div class="h-full w-full content-between">
                <div>
                    <p class="mb-8 text-crystawall-dark font-light text-justify">
                        We’re here to help you take the next step toward realizing your vision. Whether you have a specific project in mind or just want to learn more about how Crystawall can support your business, we’d love to hear from you.
                    </p>
                </div>

                <div>
                    <p class="mb-8 text-crystawall-dark font-light text-justify">
                        Simply fill out the form below with your details and inquiry, and our team will get back to you promptly. Let’s start a conversation that could transform your business. Your journey to innovative digital solutions begins here.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endmobile

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        document.getElementById('phone_no_contact').addEventListener('input', function (e) {
            let maxLength = 20;
            if (this.value.length > maxLength) {
                this.value = this.value.slice(0, maxLength); // Trim value to maxLength
            }
        });
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
                        $('#success-message').text(response.success).show().fadeIn(500).delay(2000).fadeOut(1000); // Display success message
                        form[0].reset(); // Reset the form
                    },
                    error: function(xhr) {
                        // Handle error response
                        var errors = xhr.responseJSON.errors;
                        $('.input-error').remove(); // Remove existing errors
                        $.each(errors, function(key, value) {
                            var input = $('input[name="' + key + '"], textarea[name="' + key + '"]');
                            input.after('<span class="input-error text-red-600">' + value[0] + '</span>'); // Display error message
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
        $('#phone_no_contact').on('input', function() {
        $('#phone_no_contact').next('.input-error').remove();
        });
        // Clear error message on description textarea
        $('#message').on('input', function() {
        $('#message').next('.input-error').remove();
        });
        });
</script>
