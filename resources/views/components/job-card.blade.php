@props(['job'])

<x-panel class="flex flex-col text-center">
    <div class="self-start text-sm">{{ $job->employer->name}}</div>

    <div class="py-6">
        <h3 class="group-hover:text-blue-700 font-bold transition-colors duration-300">
            <a href="{{$job->getViewOrEditUrlAttribute()}}"> {{$job->title}}</a>
        </h3>
        <p class="text-sm mt-4">{{$job->schedule}} - {{$job->salary}}</p>
    </div>

    <div class="flex justify-between items-center mt-auto">
        <div>
            @foreach($job->tags as $tag)
                <x-tag :$tag size="small"/>
            @endforeach

        </div>
        <x-employer-logo :employer="$job->employer" :width="42"/>
    </div>
</x-panel>
