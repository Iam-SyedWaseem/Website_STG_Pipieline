@desktop
<section>
    <div class="mt-16 py-0 px-4 mx-auto max-w-screen-xl text-left">
        <div class="col-span-2 w-full">
            {{-- @if (session('success'))
                <div class="p-4 mb-4 text-sm font-light text-white rounded-lg bg-green-400" role="alert">
                    {{ session('success') }}
                </div>
            @endif --}}
            <h2 class="mb-4 text-4xl font-light text-crystawall-dark tracking-tight leading-none  md:text-3nnxl lg:mt-8">
                Position Overview
            </h2>
            <p class="mb-8 text-crystawall-dark font-light text-justify">
                {!! $jobDetails->description !!}
            </p>

            <h2 class="mb-4 text-4xl font-light text-crystawall-dark tracking-tight leading-none  md:text-3nnxl lg:mt-8">
                Required Skills
            </h2>
            <p class="mb-8 text-crystawall-dark font-light text-justify">
                {!! $jobDetails->skills !!}
            </p>
        </div>
    </div>
</section>
@enddesktop

@mobile
<section>
    <div class="mt-8 py-0 px-4 mx-auto max-w-screen-xl text-left">

            <div class="col-span-2 w-full">

                <h2 class="mb-4 text-4xl font-light text-crystawall-dark tracking-tight leading-none  md:text-xl lg:mt-8">
                    Position Overview
                </h2>
                <p class="mb-8 text-crystawall-dark font-light text-justify">
                    {!! $jobDetails->description !!}
                </p>

                <h2 class="mb-4 text-4xl font-light text-crystawall-dark tracking-tight leading-none  md:text-xl lg:mt-8">
                    Required Skills
                </h2>
                <p class="mb-8 text-crystawall-dark font-light text-justify">
                    {!! $jobDetails->skills !!}
                </p>
            </div>
    </div>
</section>
@endmobile
