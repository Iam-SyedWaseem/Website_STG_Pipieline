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
    $ip_address = request()->ip();

@endphp

    <nav class="bg-crystawall-dark border-crystawall-outline z-20">
        <div class="max-w-screen-xl md:max-w-screen-lg 2xl:max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
                <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('assest/v2/logo/crystawall-logo-2.png') }}" alt="Crystawall Log" title="Home" height="auto" width="auto" loading="lazy"/>
                    {{-- <span class="self-center text-2xl font-semibold whitespace-nowrap ">Crystawall Technologies</span> --}}
                </a>
            <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul class="nav-link font-light text-sm flex flex-col p-2 md:p-0 mt-4 border border-crystawall-outline rounded-lg bg-crystawall-dark md:flex-row md:mt-0 md:border-0 gap-2">
                    <li>
                        <a href="{{ url('/') }}" class="block py-2 px-3 text-crystawall-light hover:underline rounded p-2 {{ request()->is('/') ? 'underline' : '' }}" aria-current="page">HOME</a>
                    </li>
                    <li>
                        <a href="{{ url('/about-us') }}" class="block py-2 px-3 text-crystawall-light rounded hover:underline md:border-0 p-2 {{ request()->is('about-us') ? 'underline' : '' }}">ABOUT</a>
                    </li>
                    <li>
                        <a href="{{ url('/services') }}" class="block py-2 px-3 text-crystawall-light rounded hover:underline md:border-0 p-2 {{ request()->is('services') ? 'underline' : '' }}">SERVICES</a>
                    </li>
                    <li>
                        <a href="{{ url('/contact-us') }}" class="block py-2 px-3 text-crystawall-light rounded hover:underline md:border-0 p-2 {{ request()->is('contact-us') ? 'underline' : '' }}">CONTACT</a>
                    </li>
                    <li>
                        <button id="dropdownNavbarLink " data-dropdown-toggle="dropdownNavbar"
                        class="flex my-auto items-center justify-between w-full py-2 px-3 text-crystawall-light ">
                            CAREERS
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar" class="z-10 hidden font-normal bg-crystawall-dark sm:bg-dark divide-y divide-crystawall-outline rounded-none shadow w-44 border md:border-none">
                            <ul class="py-2 text-sm text-crystawall-light sm:text-white " aria-labelledby="dropdownLargeButton">
                                <li>
                                <a href="{{url('/life-at-crystawall')}}" class="block px-4 py-2 hover:underline sm:text-crystawall-light dark:hover:bg-gray-600">LIFE AT CRYSTAWALL</a>
                                </li>
                                <li>
                                <a href="{{url('/careers')}}" class="block px-4 py-2 hover:underline sm:text-crystawall-light dark:hover:bg-gray-600">CAREERS</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <button type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" data-drawer-placement="right" aria-controls="drawer-navigation" id="menu-btn" class="block  text-white p-2 border border-white rounded-none hover:bg-white hover:text-black transition ease-in-out ">
                            GET QUOTE
                        </button>
                    </li>
                    <li class="">
                    </li>
                    {{-- <li class="flex flex-row">
                        <a href="tel:+97145531572" class="block bg-blue-00 text-crystawall-light p-2 md:px-0 rounded-md mx-2">
                            <img src="{{ asset('assest/v2/icons/phone.png') }}" height="auto" width="auto" loading="lazy" alt="Call Us +97145531572" title="Call Us +97145531572">
                        </a>
                        <a href="mailto:contact@crystawalltech.com" class="block bg-blue-00 text-crystawall-light p-2 md:px-0 rounded-md mx-2">
                            <img src="{{ asset('assest/v2/icons/email.png') }}" height="auto" width="auto" loading="lazy" alt="Email Us contact@crystawalltech.com" title="Email Us contact@crystawalltech.com">
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>



    <div class="relative">
        {{-- <div id="overlay" class="fixed inset-0 bg-black overlay-hidden"></div> --}}
        <div id="drawer-navigation" class="drawer fixed top-0 right-0 z-40 w-full sm:w-[25%] h-screen p-0 overflow-y-auto transition-transform transform translate-x-full bg-white" tabindex="-1" aria-labelledby="drawer-navigation-label">

            <div class="px-4 py-6 my-auto py-auto text-center mx-auto w-[100%] bg-crystawall-dark">
                <span id="drawer-navigation-label" class="text-3xl py-auto font-light text-center my-auto text-crystawall-light" style="">
                    Get a Tailored Quote
                </span>
            </div>

            <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close menu</span>
            </button>

            <div class="py-4 px-8 overflow-y-auto ">

                <p class="mx-auto text-center text-base text-crystawall-dark my-8">
                    Tell us what you need, and we'll craft a quote that's as unique as your idea.  It's that simple!
                </p>

                <form id="contact_form_header" action="{{route('contact.contactFormSubmit')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{--
                        THESE INPUTS ARE VIABLE FOR COLLECTING MARKET DATA FROM ANY SOURCE WHERE THE WEBSITE WAS
                        ACCESSED AND A FORM WAS SUBMITION WAS MADE
                        <input type="text" id="side_panel_utm_source" name="utm_source" value="{{$utm_source}}" hidden>
                        <input type="text" id="side_panel_utm_id" name="utm_id" value="{{$utm_id}}" hidden>
                        <input type="text" id="side_panel_utm_campaign" name="utm_campaign" value="{{$utm_campaign}}" hidden>
                        <input type="text" id="side_panel_utm_medium" name="utm_medium" value="{{$utm_medium}}" hidden>
                        <input type="text" id="side_panel_page_url" name="page_url" value="{{$page_url}}" hidden>
                        <input type="text" id="side_panel_ip_address" name="ip_address" value="{{$ip_address}}" hidden>
                    --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb- col-span-2">
                            <input type="text" id="name" name="name" placeholder="Full Name" maxlength="40" class="block w-full p-4 text-crystawall-dark border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue " required>
                            @error('name')
                                <span class="input-error ">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb- col-span-2">
                            <input type="email" id="email" name="email" placeholder="Email" class="block w-full p-4 text-crystawall-dark border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue " required>
                            @error('email')
                                <span class="input-error ">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb- col-span-2 md:col-span-1">
                            <select id="countries" name="country_code" id="country_code" aria-label="country code" class="mb-5 lg:mb-0 border border-crystawall-outline text-[#777777]  focus:ring-crystawall-blue focus:border-crystawall-blue block w-full p-4 " required>
                                @foreach ($countries as $country)
                                    <option value="{{ $country['code'] }}" @if($country['code'] == '+971') selected @endif >{{$country['name']}} ({{ $country['code'] }}) </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb- col-span-2 md:col-span-1">
                            <input type="number" id="phone_no" name="phone_no" maxlenght="20" placeholder="Phone" class="lg:mb-0 block w-full p-4  border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue " required>
                            @error('phone_no')
                                <span class="input-error mb-5" style="color: #f80000 !important;">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- <div class="mb-0 sm:mb-5 lg:mb-5 grid grid-cols-1 lg:grid-cols-2 lg:gap-2">
                            <div>
                                <select id="countries" name="country_code" id="country_code" aria-label="country code" class="mb-5 lg:mb-0 border border-crystawall-outline text-[#777777]  focus:ring-crystawall-blue focus:border-crystawall-blue block w-full p-4 " required>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country['code'] }}" @if($country['code'] == '+971') selected @endif >{{$country['name']}} ({{ $country['code'] }}) </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-5 sm:mb-0">
                                <input type="number" id="phone_no" name="phone_no" maxlenght="20" placeholder="Phone" class="lg:mb-0 block w-full p-4  border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue " required>
                                @error('phone_no')
                                    <span class="input-error mb-5" style="color: #f80000 !important;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="mb- col-span-2">
                            <input type="text" id="website" name="website" placeholder="Organization Website (optional)" class="block w-full p-4 text-crystawall-dark border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue">
                            @error('website')
                                <span class="input-error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb- col-span-2">
                            <textarea id="message" rows="2" id="msg" name="message" placeholder="Message" class="block p-4 w-full  text-crystawall-dark rounded-none border border-crystawall-outline focus:crystawall-blue focus:crystawall-blue " required></textarea>
                            @error('message')
                                <span class="input-error ">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" id="quote-form-submit" class="block w-full bg-blue-500 rounded-none p-4 text-white">
                                GET QUOTE
                            </button>
                        </div>
                    </div>


                </form>
            </div>

            <div class="py-4 px-8">
                <hr>
            </div>

            <div class="py-4 px-8">
                <div class="flex sm:justify-center gap-10 my-auto">
                    <a href="#" class="text-crystawall-dark hover:text-crystawall-blue dark:hover:text-white my-auto">
                        <img src="{{asset('assest/v2/icons/dark/fb.png')}}" height="auto" width="auto" loading="lazy" alt="crystawall-social-media" title="Facebook">
                        <span class="sr-only">Facebook </span>
                    </a>
                    <a href="https://www.instagram.com/crystawall?utm_source=crystawall_website&utm_medium=social_media_click" class="text-crystawall-dark hover:text-crystawall-blue dark:hover:text-white my-auto">
                        <img src="{{asset('assest/v2/icons/dark/ig.png')}}" height="auto" width="auto" loading="lazy" alt="crystawall-social-media" title="instagram.com/crystawall">
                        <span class="sr-only">Instagram</span>
                    </a>
                    <a href="https://www.linkedin.com/company/crystawalltech?utm_source=crystawall_website&utm_medium=social_media_click" class="text-crystawall-dark hover:text-crystawall-blue dark:hover:text-white my-auto">
                        <img src="{{asset('assest/v2/icons/dark/in.png')}}" height="auto" width="auto" loading="lazy" alt="crystawall-social-media" title="linkedin.com/company/crystawalltech">
                        <span class="sr-only">LinkedIn</span>
                    </a>
                    <a href="https://www.youtube.com/@CrystaWallTechnologies?utm_source=crystawall_website&utm_medium=social_media_click" class="text-crystawall-dark hover:text-crystawall-blue dark:hover:text-white my-auto">
                        <img src="{{asset('assest/v2/icons/dark/yt.png')}}" height="auto" width="auto" loading="lazy" alt="crystawall-social-media" title="youtube.com/@CrystaWallTechnologies">
                        <span class="sr-only">YouTube</span>
                    </a>
                    <a href="https://www.pinterest.com/crystawallTech?utm_source=crystawall_website&utm_medium=social_media_click" class="text-crystawall-dark hover:text-crystawall-blue dark:hover:text-white my-auto">
                        <img src="{{asset('assest/v2/icons/dark/pt.png')}}" height="auto" width="auto" loading="lazy" alt="crystawall-social-media" title="pinterest.com/crystawallTech">
                        <span class="sr-only">Pinterest</span>
                    </a>
                    <a href="https://www.behance.net/crystawall?utm_source=crystawall_website&utm_medium=social_media_click" class="text-crystawall-dark hover:text-crystawall-blue dark:hover:text-white my-auto">
                        <img src="{{asset('assest/v2/icons/dark/be.png')}}" height="auto" width="auto" loading="lazy" alt="crystawall-social-media" title="behance.net/crystawall">
                        <span class="sr-only">Behance</span>
                    </a>
                </div>
            </div>

            <div class="py-4 px-8 text-center text-crystawall-dark hover:underline">
                <a href="https://maps.app.goo.gl/knAGErq6ruUb82xL7" target="_blank">1901, Westburry Office Tower,  Business Bay, Dubai</a>
            </div>

            <div class="py-4 px-8 text-center text-crystawall-dark hover:underline">
                <a href="mailto:contact@crystawalltech.com">contact@crystawalltech.com</a>
            </div>

            <div class="py-4 px-8 text-center text-crystawall-dark hover:underline">
                <a href="tel:+97145531572">+971 455 31572</a>
            </div>
        </div>


        <script>

            document.getElementById('phone_no').addEventListener('input', function (e) {
                    let maxLength = 20;
                    if (this.value.length > maxLength) {
                        this.value = this.value.slice(0, maxLength); // Trim value to maxLength
                    }
            });

            document.getElementById('menu-btn').addEventListener('click', function() {
                document.getElementById('drawer-navigation').classList.remove('translate-x-full');
                document.getElementById('drawer-navigation').classList.add('translate-x-0');
                const drawerBackdropElement = document.querySelector('.drawer-backdrop');
                drawerBackdropElement.classList.add('hidden');
            });
            document.querySelector('[data-drawer-hide]').addEventListener('click', function() {
                document.getElementById('drawer-navigation').classList.add('translate-x-full');
                document.getElementById('drawer-navigation').classList.remove('translate-x-0');
            });

            // JavaScript to add underline to active link
            const currentLocation = window.location.pathname;
            const navLinks = document.querySelectorAll('.nav-link');

            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentLocation) {
                link.classList.add('underline');
                }
            });
        </script>
    </div>



    <script>
        $(document).ready(function() {
            $('#contact_form_header').on('submit', function(e) {
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
        $('#website').on('input', function() {
        $('#website').next('.input-error').remove();
        });
        // Clear error message on description textarea
        $('#phone_no').on('input', function() {
            $('#phone_no').next('.input-error').remove();
        });
        // Clear error message on description textarea
        $('#message').on('input', function() {
        $('#message').next('.input-error').remove();
        });
        });
    </script>
