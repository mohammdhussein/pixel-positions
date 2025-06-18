@props(['job'])
<x-panel class="flex gap-x-6">
    <x-employer-logo :employer="$job->employer"/>

    <div class="flex-1 flex flex-col">
        <a class="self-start text-sm text-gray-400 transition-colors duration-300">{{$job->employer->name}}</a>

        <h3 class="font-bold text-lg group-hover:text-blue-700 ">
            <a href="{{route('jobs.edit',$job)}}"> {{$job->title}}</a>
        </h3>
        <p class="text-sm text-gray-400 mt-6">{{$job->schedule}} - {{$job->salary}}</p>
    </div>


    <div>
        @foreach($job->tags as $tag)
            <x-tag :$tag/>
        @endforeach
    </div>
</x-panel>
