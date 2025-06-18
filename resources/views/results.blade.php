<x-layout>
    <x-page-heading>Results</x-page-heading>
    <x-forms.divider/>

    @if($jobs->isEmpty())
        <h1 class="text-center text-2xl">No Results Found</h1>
    @endif
    <div class="space-y-6">
        @foreach($jobs as $job)
            <x-job-card-wide :$job/>
        @endforeach

    </div>
</x-layout>
