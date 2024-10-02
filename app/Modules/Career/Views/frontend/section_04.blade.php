@desktop
<section>
    <div class="mt-16 py-0 px-4 mx-auto max-w-screen-xl md:max-w-screen-lg 2xl:max-w-screen-xl text-left">
        <div class="col-span-2 w-full">

            <h2 class="mb-4 text-4xl font-light text-crystawall-dark tracking-tight leading-none  md:text-3xl lg:mt-8">
                How To Apply?
            </h2>
            <p class="mb-8 text-crystawall-dark font-light text-justify">
                If you are passionate about this job posting and excited to join our dynamic team, we would love to hear from you. Please submit your resume and cover letter below or browse more positions available through our careers page.
            </p>
            <form id="contact_form" action="{{route('apply')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- <input type="hidden" name="job_id" value="{{encrypt($jobDetails->id)}}"> --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="">
                        <input type="text" id="name" name="firstName" placeholder="First Name " value="{{old('firstName')}}"  class="block w-full p-4 text-crystawall-dark border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue " required>
                        @error('firstName')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <input type="text" id="name" name="lastName" placeholder="Last Name " value="{{old('lastName')}}"  class="block w-full p-4 text-crystawall-dark border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue " required>
                        @error('lastName')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <select id="countries" name="countryCode" id="countryCode" class="mb-5 lg:mb-0 border border-crystawall-outline text-[#777777]  focus:ring-crystawall-blue focus:border-crystawall-blue block w-full p-4 ">
                            @foreach ($countries as $country)
                                <option value="{{ $country['code'] }}" @if($country['code'] == '+971') selected @endif >{{$country['name']}} ({{ $country['code'] }}) </option>
                            @endforeach
                        </select>
                        @error('countryCode')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Phone" value="{{old('phoneNumber')}}"  class="block w-full p-4  border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue " required>
                        @error('phoneNumber')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class=" col-span-2">
                        <input type="text" id="email" name="email" placeholder="Email" value="{{old('email')}}"  class="block w-full p-4 text-crystawall-dark border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue " required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class=" col-span-2">
                        <input  id="resume" type="file" accept=".pdf, .doc, .docx" name="resume" class="block w-full text-lg  text-crystawall-dark border border-crystawall-outline rounded-none cursor-pointer bg-light dark:text-gray-400 focus:outline-none dark:bg-crystawall-dark dark:border-crystawall-dark dark:placeholder-crystawall-dark">
                        <span class="text-sm tracking-wide">upload formats: pdf, doc, docx</span>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-2 mb-5">
                        <textarea id="message" rows="2" maxlength="1000" id="coverLetter" name="coverLetter" value="{{old('coverLetter')}}"  placeholder="Cover Letter" class="block p-4 w-full  text-crystawall-dark rounded-none border border-crystawall-outline focus:crystawall-blue focus:crystawall-blue " required></textarea>
                        @error('coverLetter')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-2 mb-5">
                        <button type="submit" class="block w-full bg-crystawall-dark rounded-none p-4 text-white">
                            SUBMIT APPLICATION
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@enddesktop

@mobile
    <section>
        <div class="mt-16 py-0 px-4 mx-auto max-w-screen-xl text-left">
            <div class="col-span-2 w-full">

                <h2 class="mb-4 text-4xl font-light text-crystawall-dark tracking-tight leading-none  md:text-xl lg:mt-8">
                    How To Apply?
                </h2>
                <p class="mb-8 text-crystawall-dark font-light text-justify">
                    If you are passionate about this job posting and excited to join our dynamic team, we would love to hear from you. Please submit your resume and cover letter below or browse more positions available through our careers page.
                </p>


                @if (session('success'))
                    <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <form id="contact_form" action="{{route('apply')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    {{-- <input type="hidden" name="job_id" value="{{encrypt($jobDetails->id)}}"> --}}
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                        <div class="col-span-2">
                            <input type="text" id="name" name="firstName" placeholder="First Name " value="{{old('firstName')}}" class="block w-full p-4 text-crystawall-dark border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue " required>
                            @error('firstName')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <input type="text" id="name" name="lastName" placeholder="Last Name " value="{{old('lastName')}}" class="block w-full p-4 text-crystawall-dark border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue " required>
                            @error('lastName')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <select id="countries" name="countryCode" id="countryCode" class="mb-5 lg:mb-0 border border-crystawall-outline text-[#777777]  focus:ring-crystawall-blue focus:border-crystawall-blue block w-full p-4 ">
                                @foreach ($countries as $country)
                                    <option value="{{ $country['code'] }}" @if($country['code'] == '+971') selected @endif >{{$country['name']}} ({{ $country['code'] }}) </option>
                                @endforeach
                            </select>
                            @error('countryCode')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Phone" value="{{old('phoneNumber')}}" class="block w-full p-4  border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue " required>
                            @error('phoneNumber')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" col-span-2">
                            <input type="text" id="email" name="email" placeholder="Email" value="{{old('email')}}" class="block w-full p-4 text-crystawall-dark border border-crystawall-outline text-base focus:ring-crystawall-blue focus:border-crystawall-blue " required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" col-span-2">
                            <input id="resume" type="file" accept=".pdf, .doc, .docx" name="resume" class="block w-full text-lg  text-crystawall-dark border border-crystawall-outline rounded-none cursor-pointer bg-light dark:text-gray-400 focus:outline-none dark:bg-crystawall-dark dark:border-crystawall-dark dark:placeholder-crystawall-dark" >
                            <span class="text-sm tracking-wide">upload formats: pdf, doc, docx</span>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-2 mb-5">
                            <textarea id="message" rows="2" maxlength="1000" id="coverLetter" name="coverLetter" placeholder="Cover Letter" value="{{old('coverLetter')}}" class="block p-4 w-full  text-crystawall-dark rounded-none border border-crystawall-outline focus:crystawall-blue focus:crystawall-blue " required></textarea>
                            @error('coverLetter')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-2 mb-5">
                            <button type="submit" class="block w-full bg-crystawall-dark rounded-none p-4 text-white">
                                SUBMIT APPLICATION
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endmobile
<script>
    $(document).ready(function() {
        // Clear error message on title input
        $('#firstName').on('input', function() {
        $('#firstName').next('.text-danger').remove();
        });

        // Clear error message on description textarea
        $('#lastName').on('input', function() {
        $('#lastName').next('.text-danger').remove();
        });
        // Clear error message on description textarea
        $('#email').on('input', function() {
        $('#email').next('.text-danger').remove();
        });
        // Clear error message on description textarea
        $('#countryCode').on('input', function() {
        $('#countryCode').next('.text-danger').remove();
        });
        // Clear error message on description textarea
        $('#phoneNumber').on('input', function() {
        $('#phoneNumber').next('.text-danger').remove();
        });

        $('#resume').on('input', function() {
        $('#resume').next('.text-danger').remove();
        });

        $('#coverLetter').on('input', function() {
        $('#coverLetter').next('.text-danger').remove();
        });
    });
</script>
