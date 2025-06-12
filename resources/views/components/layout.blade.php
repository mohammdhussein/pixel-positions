@php use Illuminate\Support\Facades\Vite; @endphp
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pixel Positions</title>
    @env()
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endenv

    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700;800&display=swap" rel="stylesheet">

</head>
<body class="bg-black text-white font-hanken-grotesk">
<div class="px-10">
    <nav class="flex justify-between items-center py-4 border-b border-white/10">
        <div>
            <a href="">
                <img src="{{Vite::asset('resources/images/logo.svg')}}" alt="">
            </a>
        </div>

        <div class="flex space-x-4  font-bold">
            <a href="/">Jobs</a>
            <a href="/">Careers</a>
            <a href="/">Salaries</a>
            <a href="/">Companies</a>
        </div>
        <div>
            <a href="/">Post a Job</a>
        </div>
    </nav>
</div>
<main class="mt-10 max-w-[986px] mx-auto">
    {{$slot}}
</main>

</body>
</html>
