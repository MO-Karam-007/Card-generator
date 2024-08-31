<x-layout>
    <x-slot:header>
        Create a New Job
        <p class="mt-1 text-sm leading-6 text-gray-600">We just need a handful of details from you.</p>

    </x-slot:header>
    {{-- <h1> {{ $job['job'] }} career</h1> --}}
    {{-- <h1>Starts with {{ $job['salary'] }}</h1> --}}
    <form method="post" action="/jobs" enctype="multipart/form-data">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                {{-- <h2 class="text-base font-semibold leading-7 text-gray-900"></h2> --}}
                {{-- <p class="mt-1 text-sm leading-6 text-gray-600">We just need a handful of details from you.</p> --}}

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                       
                        <x-form-label for='job'>Title</x-form-label>
                        <div class="mt-2">
                           
                            <x-form-input placeholder="Spider-Man"  type="text" name="job" id="job" />
                           
                            <x-form-error name='job' />
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <x-form-label for='salary'>Power</x-form-label>

                        <div class="mt-2">
                            <x-form-input placeholder="800"  type="text" name="salary" id="salary" />

                            <x-form-error name='salary' />
                          
                           
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                       
                        <x-form-label for='image'>Cover</x-form-label>
                        <div class="mt-2">
                           
                            <x-form-input   type="file" name="image" id="image" />
                           
                            <x-form-error name='image' />
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div class="">
                <a href="/jobs"
                    class="rounded-md bg-yellow-600 px-3 py-3 mx-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Cancel
                </a>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </div>
    </form>





</x-layout>
