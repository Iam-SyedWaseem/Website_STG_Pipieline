@desktop
<section class="bg-crystawall-dark text-white dark:bg-gray-900 h-[40vh] md:h-[40vh] shadow-[0px_-5px_10px_5px] shadow-crystawall-dark">
    <div class="py-0 px-4 mx-auto max-w-screen-xl text-left h-full content-bottom">
        <div class="flex flex-row items-stretch h-full ">
            <div class="self-center md:self-end pb-10 w-full">
                <div class="grid grid-cols-4">
                    <div >
                        <h1 class="mb-4 text-xl font-light tracking-tight leading-none  md:text-xl">
                            Job Type
                        </h1>
                        <p>
                            {{$jobDetails->job_type}}
                        </p>
                    </div>

                    <div >
                        <h1 class="mb-4 text-xl font-light tracking-tight leading-none  md:text-xl">
                            Location
                        </h1>
                        <p>
                            {{$jobDetails->location}}
                        </p>
                    </div>

                    <div >
                        <h1 class="mb-4 text-xl font-light tracking-tight leading-none  md:text-xl">
                            Department
                        </h1>
                        <p>
                            {{$jobDetails->department->name}}
                        </p>
                    </div>
                </div>
                <h1 class="mb-4 text-3xl font-light tracking-tight leading-none md:text-5xl lg:text-8xl  my-8">{{$jobDetails->title}}</h1>

            </div>

        </div>
    </div>
</section>

{{-- <section class="bg-crystawall-dark dark:bg-gray-900 h-[40vh] md:h-[30vh] shadow-[0px_-5px_10px_5px] shadow-crystawall-dark content-bottom">
    <div class="py-0 px-4 mx-auto max-w-screen-xl text-left h-full content-end">
        <div class="bg-white  self-end rounded-xl p-8 mt-[100px] shadow-lg">
            <div class="grid  grid-cols-2 gap-4 w-full">
                <div >
                    <h1 class="mb-4 text-xl font-light tracking-tight leading-none  md:text-3xl">
                        Software Engineer
                    </h1>
                    <p>
                        Aug 22nd, 2024
                    </p>
                </div>

                <div class="text-right flex flex-row ms-auto gap-4">
                    <button class="p-3 md:p-4 text-sm md:text-base font-light border border-crystawall-outline bg-white rounded-lg">
                        <img src="{{asset('assest/v2/icons/share.png')}}" class="m-0 p-0" height="auto" width="auto" loading="lazy" alt="Share" title="Share"/>
                    </button>
                    <button class="p-3 md:p-4 text-sm md:text-base text-white font-light bg-blue-500 rounded-lg w-40">
                        APPLY
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-4 gap-4 w-full mt-8">
                <div >
                    <h1 class="mb-4 text-xl font-light tracking-tight leading-none  md:text-xl">
                        Job Type
                    </h1>
                    <p>
                        Full-time
                    </p>
                </div>

                <div >
                    <h1 class="mb-4 text-xl font-light tracking-tight leading-none  md:text-xl">
                        Location
                    </h1>
                    <p>
                        Business Bay, Dubai
                    </p>
                </div>

                <div >
                    <h1 class="mb-4 text-xl font-light tracking-tight leading-none  md:text-xl">
                        Department
                    </h1>
                    <p>
                        IT Services
                    </p>
                </div>

                <div >
                    <h1 class="mb-4 text-xl font-light tracking-tight leading-none  md:text-xl">
                        Experience
                    </h1>
                    <p>
                        02 yrs
                    </p>
                </div>
            </div>
        </div>
    </div>
</section> --}}
@enddesktop


@mobile
<section class="bg-crystawall-dark text-white dark:bg-gray-900 h-[40vh] md:h-[90vh] shadow-[0px_-5px_10px_5px] shadow-crystawall-dark">
    <div class="py-0 px-4 mx-auto max-w-screen-xl text-left h-full content-bottom">
        <div class="flex flex-row items-stretch h-full ">
            <div class="self-center md:self-end pb-10 ">
                <h1 class="mb-8 text-4xl font-light tracking-tight leading-none md:text-5xl lg:text-9xl  my-8">{{$jobDetails->title}}</h1>
                <div class="grid grid-cols-2 mb-2">
                    <div>
                        <p class="text-base font-light ">Job Type </p>
                    </div>
                    <div>
                        <p class="text-base font-light">:{{$jobDetails->job_type}}</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 mb-2">
                    <div>
                        <p class="text-base font-light ">Location </p>
                    </div>
                    <div>
                        <p class="text-base font-light">:{{$jobDetails->location}}</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 mb-2">
                    <div>
                        <p class="text-base font-light ">Department </p>
                    </div>
                    <div>
                        <p class="text-base font-light">:{{$jobDetails->department->name}}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endmobile
