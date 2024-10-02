

@desktop
<section  class="bg-center bg-no-repeat bg-[url('/public/assest/v2/img/hero_desktop/1-10.webp')] bg-blend-multiply bg-cover text-white h-screen shadow-[0px_0px_10px_0px] shadow-crystawall-dark">
    <div class="py-8 px-4 mx-auto max-w-screen-xl md:max-w-screen-lg 2xl:max-w-screen-xl  text-center lg:py-16 lg:px-12 h-full content-center">
        <h1 class="my-auto text-sm md:text-base">
            Crystawall - Dubai’s Premium Digital Innovation Hub
        </h1>
        <h2 data-aos="zoom-in" data-aos-duration="2000" class=" mb-4 text-4xl font-bold tracking-tight  md:text-5xl 2xl:text-8xl xl:text-6xl my-8" style="line-height: 1.2 !important;">
            <span class="gradient-text">Let’s level up your</span><br><span class="">ideas!</span>
        </h2>

        {{-- <div id='greeting'>Hello<div> --}}


        <button id="menu-btn-hero" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" data-drawer-placement="right" aria-controls="drawer-navigation" class="element p-3 md:p-4 text-sm md:text-base text-white font-light border border-crystawall-blue rounded-none my-8 hover:bg-crystawall-blue transition ease-in-out ">
            GET A TAILORED QUOTE
        </button>

        <p class="mb-8 font-light  sm:px-16 xl:px-48 ">
            With our cohesive and experienced teams, we ensure the seamless delivery of end-to-end projects, combining efficiency and reliability at every stage of your digital journey
        </p>

    </div>
</section>
@enddesktop


@mobile
<section class=" text-white  bg-[url('/public/assest/v2/img/hero_mobile/1-10.webp')] bg-blend-multiply bg-cover h-screen shadow-[0px_-5px_10px_5px] shadow-crystawall-dark">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12 h-3/4 content-center">
        <h1 class="my-auto text-base md:text-base">
            Crystawall - Dubai’s Premium Digital Innovation Hub
        </h1>

        <h2 class="mb-4 text-6xl font-thin tracking-tight leading-none md:text-5xl lg:text-9xl my-8">
            <span class="gradient-text">Let’s level up your </span><br>ideas!
        </h2>

        <button id="menu-btn-hero" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" data-drawer-placement="right" aria-controls="drawer-navigation" class="element p-3 md:p-4 text-sm md:text-base text-white font-light border border-crystawall-blue rounded-none my-8 hover:bg-crystawall-blue transition ease-in-out">
            GET A TAILORED QUOTE
        </button>

        <p class="font-light  sm:px-16 xl:px-48 ">
            With our cohesive and experienced teams, we ensure the seamless delivery of end-to-end projects, combining efficiency and reliability at every stage of your digital journey
        </p>

    </div>
</section>
@endmobile


<script>

    //--------CODE TO CREATE A CHANGING H2 IN THE HOME PAGE HERO SECTION BASED ON THE ARRAY BELOW--------------
    // var text = ["Visualize your ", "Conceptualize your", "Transform your", "Achieve your", "Let’s level up your"];
    // var counter = 0;
    // var elem = $("#greeting");
    // setInterval(change, 3000);
    // function change() {
    //     elem.fadeOut(function(){
    //         elem.html(text[counter]);
    //         counter++;
    //         if(counter >= text.length) { counter = 0; }
    //         elem.fadeIn();
    //     });
    // }

    document.getElementById('menu-btn-hero').addEventListener('click', function() {
        document.getElementById('drawer-navigation').classList.remove('translate-x-full');
        document.getElementById('drawer-navigation').classList.add('translate-x-0');
        document.getElementById('overlay').classList.remove('overlay-hidden');
        document.getElementById('overlay').classList.add('overlay-visible');
    });
</script>
