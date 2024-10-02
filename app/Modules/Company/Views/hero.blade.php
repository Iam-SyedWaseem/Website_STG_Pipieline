@desktop
<section class=" bg-crystawall-dark lg:bg-[url('/public/assest/v2/img/hero_desktop/1-7.webp')] bg-center bg-cover text-white h-[40vh] md:h-[93vh] -z-10 shadow-[0px_-5px_10px_5px] shadow-crystawall-dark">
    <div class="py-0 px-4 mx-auto max-w-screen-xl md:max-w-screen-lg 2xl:max-w-screen-xl h-full content-bottom">
        <div class="flex flex-row items-stretch h-[80%] ">
            <div class="self-center md:self-top pb-10">
                <h1  class="text-base font-light ">Your Partner in Cutting Edge Software Innovation</h1>
                <h2 data-aos="fade-right" data-aos-duration="2000" class="mb-4 text-5xl font-light tracking-tight leading-none  md:text-5xl 2xl:text-8xl xl:text-6xl  my-8">
                    Driven by <span class="gradient-text">Excellence</span>
                </h2>
            </div>
            <div data-aos="fade-left" data-aos-duration="2000" class="self-end hidden md:block ms-auto">
                <img src="{{asset('assest/v2/logo/logo-160x160.png')}}" class="" height="auto" width="auto" loading="lazy" alt="crystawall-icon" title="Crystawall Brand Icon">
            </div>
        </div>
        {{-- <div class="hidden lg:hidden 2xl:block absolute bottom-20 left-0 w-full px-0">
            <hr class="border-crystawall-hero-hr mb-2 ">
            <div class="max-w-screen-xl mx-auto">
                <div class="grid grid-cols-2 text-sm">
                    <div>
                        <span>© 2024</span>
                    </div>
                    <div class="text-right">
                        <span>About Us</span>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</section>
@enddesktop



@mobile
<section class=" text-white  bg-[url('/public/assest/v2/img/hero_mobile/1-7.webp')] bg-center bg-cover h-[70vh] shadow-[0px_-5px_10px_5px] shadow-crystawall-dark">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-left lg:py-16 lg:px-12 h-full content-center">
        <h1 class="my-auto text-base md:text-base">
            Your Partner in Cutting Edge Software Innovation
        </h1>

        <h2 class="mb-4 text-6xl font-thin tracking-tight leading-none md:text-5xl lg:text-9xl my-8">
            Driven by <span class="gradient-text">Excellence</span>
        </h2>

        <button id="menu-btn-hero" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" data-drawer-placement="right" aria-controls="drawer-navigation" class="element p-3 md:p-4 text-sm md:text-base text-white font-light border border-crystawall-blue rounded-none my-8 hover:bg-crystawall-blue transition ease-in-out">
            GET A TAILORED QUOTE
        </button>
    </div>
</section>
@endmobile
