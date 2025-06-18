<x-layout>
    <x-page-heading>Edit Job</x-page-heading>

    <x-forms.form method="PUT" action="{{route('jobs.update',$job)}}">

        <x-forms.input label="Title" name="title" placeholder="CEO" value="{{$job->title}}"/>
        <x-forms.input label="Salary" name="salary" placeholder="$90,000 USD" value="{{$job->salary}}"/>
        <x-forms.input label="Location" name="location" placeholder="Winter Park, Florida" value="{{$job->location}}"/>

        <x-forms.select label="Schedule" name="schedule" value="{{$job->schedule}}">
            <option value="Full Time" {{ $job->schedule === 'Full Time' ? 'selected' : '' }}>Full Time</option>
            <option value="Part Time" {{ $job->schedule === 'Part Time' ? 'selected' : '' }}>Part Time</option>
        </x-forms.select>

        <x-forms.input label="Url" name="url" placeholder="https://acme/jobs/ceo-wanted" value="{{$job->url}}"/>

        <x-forms.checkbox label="Feature (Costs Extra)" name="featured" :checked="$job->featured"/>

        <x-forms.divider/>

        <x-forms.input label="Tags (Comma Separated)" name="tags"
                       placeholder="laracasts, video, education"
                       value="{{ $job->tags->pluck('name')->implode(', ') }}"/>

        <x-forms.button class="cursor-pointer ...">Update</x-forms.button>

    </x-forms.form>
</x-layout>
