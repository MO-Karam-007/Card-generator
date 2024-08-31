<x-layout>
    <x-slot:header>
        {{ $job['job'] }} page
    </x-slot:header>
    @if($job->image)
    <img src="{{ asset('storage/' . $job->image) }}" alt="{{ $job['job'] }}" class="w-45 h-75 object-cover rounded-lg">
@else
    <img src="{{ asset('images/placeholder.png') }}" alt="Placeholder" class="w-full h-48 object-cover rounded-lg">
@endif
    <h1> {{ $job['job'] }} career</h1>
    <h1>Power : {{ $job['salary'] }}</h1>
    <h1>Slug : {{ $job['slug'] }}</h1>
    <p>created by : {{$job->employer->name}}</p>


    <div class="mt-6 flex items-center justify-between gap-x-6" > 
        <form method="POST" action="/jobs/{{ $job->id }}" onsubmit="return confirmDelete(event);">
            @csrf
            @method('DELETE')
            <button type="submit" href="/jobs"
                class="rounded-md bg-red-600 px-3 py-3 me-3 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Delete
            </button>
        </form>

        <form action="/jobs/{{ $job->id }}/edit" method="GET">

            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Update</button>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete(event) {
            event.preventDefault(); // Prevent form submission
    
            const form = event.target;
    
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the form if confirmed
                }
            });
        }
    </script>
</x-layout>
