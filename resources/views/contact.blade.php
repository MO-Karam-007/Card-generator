<x-layout>
    <x-slot:header>
        Deleted Jobs
    </x-slot:header>
    @if($deletedJobs->isEmpty())
    <p>No deleted jobs found.</p>
@else
    <ul>
        @foreach($deletedJobs as $job)
            <li>{{ $job->job }} - {{ $job->salary }}</li>
        @endforeach
    </ul>
@endif</x-layout>