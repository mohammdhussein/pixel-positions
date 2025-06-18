@props(['employer','width' => '90'])
<div {{ $attributes }}>

    <img src="{{asset('storage/'.$employer->logo)}}" width="{{$width}}" class="rounded-xl" alt="">
</div>
