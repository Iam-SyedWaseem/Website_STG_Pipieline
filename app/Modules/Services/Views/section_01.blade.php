@desktop
<section>
    <div class="mt-16 py-0 px-4 mx-auto max-w-screen-xl md:max-w-screen-lg 2xl:max-w-screen-xl text-left">
        {{-- <div>
            <h2 class="mb-4 text-xl font-light tracking-tight leading-none  md:text-3xl md:my-8">
                Our Services
            </h2>
        </div> --}}
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <div>
                <h2 class="mb-4 text-xl font-light tracking-tight leading-none  md:text-3xl md:my-8">
                    Our Services
                </h2>
            </div>

            <div class="col-span-2 w-full">

                <h2  class="mb-4 text-3xl font-light tracking-tight leading-none  md:text-3xl ">
                    See What We Can Achieve Together
                </h2>
                <p class="mb-8 text-crystawall-dark font-light text-justify">
                    Unlock the full potential of your digital projects with our diverse range of services. From pioneering web and mobile app development to crafting engaging UI/UX designs, our team delivers innovative solutions that drive results. Dive into our offerings to see how we can transform your ideas into impactful, user-centric experiences and elevate your brand with strategic digital marketing. Let’s build something exceptional together.
                </p>
            </div>
            <div class=" w-full hidden lg:block">
                <img src="{{asset("assest/v2/img/1.webp")}}" class="mb-4 my-auto hidden md:block w-full rounded-lg" height="auto" width="auto" loading="lazy" alt="Services" title="Services">
            </div>
        </div>
    </div>
</section>
@enddesktop



@mobile
<section>
    <div class="mt-8 py-0 px-4 mx-auto max-w-screen-xl text-left">
        <div>
            <h2 class="mb-4 text-xl font-light tracking-tight leading-none  md:text-3xl md:my-8">
                Our Services
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="col-span-2 w-full">

                <h2 class="mb-4 text-5xl font-light tracking-tight leading-none  md:text-4xl ">
                    See What We Can Achieve Together
                </h2>
                <div class=" w-full">
                    <img src="{{asset("assest/v2/img/1.webp")}}" class="mb-4 my-auto w-full" height="auto" width="auto" loading="lazy" alt="envrionment" title="Research">
                </div>
                <p class="text-crystawall-dark font-light text-justify">
                    Unlock the full potential of your digital projects with our diverse range of services. From pioneering web and mobile app development to crafting engaging UI/UX designs, our team delivers innovative solutions that drive results. Dive into our offerings to see how we can transform your ideas into impactful, user-centric experiences and elevate your brand with strategic digital marketing. Let’s build something exceptional together.
                </p>
            </div>

        </div>
    </div>
</section>
@endmobile
