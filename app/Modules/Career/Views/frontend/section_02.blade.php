<section>
    <div data-aos="fade-in" data-aos-delay="600" data-aos-duration="1000" class="mb-16 py-0 px-4 mx-auto max-w-screen-xl md:max-w-screen-lg 2xl:max-w-screen-xl text-left">
        <div class="grid grid-flow-row auto-rows-max hover:auto-rows-min">
            @if(count($jobOpenings)>0)
                @foreach ($jobOpenings as $job)
                    <div class="grid grid-cols-3 md:grid-cols-3 lg:grid-cols-3 lg:gap-8 my-2 border-b border-crystawall-outline xl:text-xl">
                        <div class="my-auto">
                            <h3>{{$job->title}}</h3>
                        </div>
                        <div class="my-auto mx-auto">
                            <p>{{$job->job_type}}</p>
                        </div>
                        <div class="my-auto ms-auto">
                            <a href="{{route('career-job-details',['job_id'=>$job->id, 'utm_source'=>'company-website', 'utm_medium'=>'career-page'])}}">
                                <img src="{{asset('assest/v2/icons/down_arrow.png')}}" class="text-right" height="auto" width="auto" loading="lazy" alt="Services" title="Services">
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
            <div class="grid grid-cols-3 md:grid-cols-3 lg:grid-cols-3 lg:gap-8 my-2 border-b border-crystawall-outline xl:text-xl">
                <div class="col-span-3 my-auto">
                    <h1>We're currently not hiring</h1>
                </div>
            </div>
            <p>We're not currently hiring, but we appreciate your interest in our company. Please check back with us in the future for any open positions.</p>
            {{-- <p>Interested in joining our team? While we may not have active job openings at the moment, we're always on the lookout for talented individuals. Please submit your CV and portfolio using the form below. We'll keep your information on file for future opportunities</p> --}}
            @endif
        </div>
    </div>
</section>
