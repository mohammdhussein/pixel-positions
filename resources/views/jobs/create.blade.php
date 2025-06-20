<x-layout>
    <x-page-heading>New Job</x-page-heading>

    <x-forms.form method="POST" action="{{route('jobs.store')}}">

        <x-forms.input label="Title" name="title" placeholder="CEO"/>
        <x-forms.input label="Salary" name="salary" placeholder="$90,000 USD"/>
        <x-forms.input label="Location" name="location" placeholder="Winter Park, Florida"/>

        <x-forms.select label="Schedule" name="schedule">
            <option class="bg-black">Full Time</option>
            <option class="bg-black">Part Time</option>
        </x-forms.select>

        <x-forms.input label="Url" name="url" placeholder="https://acme/jobs/ceo-wanted"/>

        <x-forms.checkbox label="Feature (Costs Extra)" name="featured"/>

        <x-forms.divider/>

        <x-forms.input label="Tags (Comma Separated)" name="tags" placeholder="laracasts, video, education"/>

        <x-forms.button>Publish</x-forms.button>

    </x-forms.form>
</x-layout>
