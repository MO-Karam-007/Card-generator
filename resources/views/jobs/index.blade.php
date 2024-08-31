<x-layout>
    <x-slot:header class="flex">
         Cards Page
    </x-slot:header>



    <div class="flex justify-center">
        <form class="flex"  method="POST" action="{{route('jobs.index')}}">
            @csrf
            <x-form-input type="text" name="query" placeholder="Search for jobs..." >
            </x-form-input>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Search</button>
        </form> 
    </div> 
    
    <div class="space-y-4 flex flex-wrap justify-center">

        
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="block p-6 border border-gray-200 rounded-lg shadow-lg w-3/12 m-5 hover:shadow-2xl transition-shadow duration-200">
                  <!-- Job Image -->
                  <div class="mb-4">
                    @if($job->image)
                        <img src="{{ asset('storage/' . $job->image) }}" alt="{{ $job['job'] }}" class="w-full h-48 object-cover rounded-lg">
                    @endif
                </div>
                
                <div class="font-bold text-blue-500 text-lg">{{ $job->employer->name }}</div>

                <div class="text-gray-700 mt-2">
                    <strong>{{ $job['job'] }}:</strong>
                    <p>Pays {{ $job['salary'] }} per year.</p>
                </div>
            </a>
    
        @endforeach
    </div>


    {{-- <h2 class="text-xl font-semibold mt-8">Deleted Jobs</h2>
    <div class="space-y-4 flex flex-wrap justify-center">
        @foreach ($deletedJobs as $job)
            <div class="block p-6 border border-gray-200 rounded-lg shadow-lg w-3/12 m-5 bg-gray-100">
                <div class="mb-4">
                    @if($job->image)
                        <img src="{{ asset('storage/' . $job->image) }}" alt="{{ $job->job }}" class="w-full h-48 object-cover rounded-lg">
                    @else
                        <img src="{{ asset('images/placeholder.png') }}" alt="Placeholder" class="w-full h-48 object-cover rounded-lg">
                    @endif
                </div>
                
                <div class="font-bold text-blue-500 text-lg">{{ $job->employer->name }}</div>

                <div class="text-gray-700 mt-2">
                    <strong>{{ $job->job }}:</strong>
                    <p>Pays {{ $job->salary }} per year.</p>
                </div>

                <form method="POST" action="/jobs/restore/{{ $job->id }}" class="mt-4">
                    @csrf
                    <button type="submit" class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Restore
                    </button>
                </form>
            </div>
        @endforeach
    </div> --}}



    <div class="mt-6">
        {{ $jobs->links() }}
    </div>
    
</x-layout>
