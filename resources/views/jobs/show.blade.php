<x-layout>
    <x-slot:header>
        {{ $job['job'] }} page
    </x-slot:header>
    <h1> {{ $job['job'] }} career</h1>
    <h1>Starts with {{ $job['salary'] }}</h1>


    <div class="mt-6 flex items-center justify-between gap-x-6">
        <form method="POST" action="/jobs/{{ $job->id }}">
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
</x-layout>
