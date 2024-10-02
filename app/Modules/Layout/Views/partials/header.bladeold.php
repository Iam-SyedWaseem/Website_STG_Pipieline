<!-- drawer init and toggle -->
<div class="text-center">
    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button" data-drawer-target="drawer-right-example" data-drawer-show="drawer-right-example" data-drawer-placement="right" aria-controls="drawer-right-example">
    Show right drawer
    </button>
 </div>

 <!-- drawer component -->
 <div id="drawer-right-example" class="fixed top-0 right-0 w-full sm:w-[25%] z-40 h-screen p-0 overflow-y-auto transition-transform translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-right-label">
    <div class="px-4 py-6 my-auto py-auto text-center mx-auto w-[100%] bg-crystawall-dark">
        <span id="drawer-navigation-label" class="text-3xl py-auto font-light text-center my-auto text-crystawall-light" style="">
            Get a Tailored Quote
        </span>
    </div>
    <button type="button" data-drawer-hide="drawer-right-example" aria-controls="drawer-right-example" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white" >
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
                ACCESSED AND A FORM WAS SUBMITION WAS MADE.

                <input type="text" id="side_panel_utm_source" name="utm_source" value="{{$utm_source}}" hidden>
                <input type="text" id="side_panel_utm_id" name="utm_id" value="{{$utm_id}}" hidden>
                <input type="text" id="side_panel_utm_campaign" name="utm_campaign" value="{{$utm_campaign}}" hidden>
                <input type="text" id="side_panel_utm_medium" name="utm_medium" value="{{$utm_medium}}" hidden>
                <input type="text" id="side_panel_page_url" name="page_url" value="{{$page_url}}" hidden>
                <input type="text" id="side_panel_ip_address" name="ip_address" value="{{$ip_address}}" hidden>
            --}}

            <div class="mb-5">
                <input type="text" id="name" name="name" placeholder="Full Name " class="block w-full p-4 text-crystawall-dark border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue " required>
            </div>
            <div class="mb-5">
                <input type="text" id="email" name="email" placeholder="Email" class="block w-full p-4 text-crystawall-dark border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue " required>
            </div>
            <div class="mb-0 lg:mb-5 grid grid-cols-1 lg:grid-cols-2 lg:gap-2">
                <select id="countries" name="country_code" id="country_code" aria-label="country code" class="mb-5 lg:mb-0 border border-crystawall-outline text-[#777777]  focus:ring-crystawall-blue focus:border-crystawall-blue block w-full p-4 ">
                    @foreach ($countries as $country)
                        <option value="{{ $country['code'] }}" @if($country['code'] == '+971') selected @endif >{{$country['name']}} ({{ $country['code'] }}) </option>
                    @endforeach
                </select>
                <div>
                    <input type="text" id="phone_no" name="phone_no" placeholder="Phone" class="mb-5 lg:mb-0 block w-full p-4  border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue " required>
                </div>
            </div>
            <div class="text-right">
                <input type="text" id="website" name="website" placeholder="Organization Website" class="block w-full p-4 text-crystawall-dark border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue">
                <small class="w-full text-right">*optional</small>
            </div>
            <div class="mb-5">
                <textarea id="message" rows="2" id="msg" name="message" placeholder="Message" class="block p-4 w-full  text-crystawall-dark rounded-none border border-crystawall-outline focus:crystawall-blue focus:crystawall-blue " required></textarea>
            </div>
            <div>
                <button type="submit" class="block w-full bg-blue-500 rounded-none p-4 text-white">
                    GET QUOTE
                </button>
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
