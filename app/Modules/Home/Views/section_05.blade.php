
<section class="my-8">
    <div class="px-4 mx-auto max-w-screen-xl md:max-w-screen-lg 2xl:max-w-screen-xl text-center lg:py-12 lg:px-12 h-full content-center">

        <div class="grid grid-cols-1 md:grid-cols-2 md:px-4 md:max-w-screen-md lg:max-w-full my-auto md:gap-8">

            <div>
                <h2 class="font-light text-left text-3xl md:text-6xl text-crystawall-dark uppercase ">
                    GET IN TOUCH
                </h2>

                <p class="font-light text-justify lg:text-left my-4 md:my-8 ">
                    Schedule a call with our team to discuss your needs, get expert advice, or simply learn more about what we offer. We’re here to provide personalized support and ensure you have all the information you need to move forward with confidence.
                </p>
            </div>

            <div class="h-full content-center text-left lg:text-center">
                <button id="get-in-touch" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" data-drawer-placement="right" aria-controls="drawer-navigation"  data-aos="fade-in" data-aos-easing="ease-out-cubic" data-aos-duration="1000" class="my-auto p-4 md:p-8 bg-crystawall-dark rounded-lg text-white text-base md:text-xl font-light">GET A TAILORED QUOTE</button>
            </div>


        </div>
    </div>
</section>

<script>
    document.getElementById('get-in-touch').addEventListener('click', function() {
        document.getElementById('drawer-navigation').classList.remove('translate-x-full');
        document.getElementById('drawer-navigation').classList.add('translate-x-0');
        document.getElementById('overlay').classList.remove('overlay-hidden');
        document.getElementById('overlay').classList.add('overlay-visible');
    });
</script>
