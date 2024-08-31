<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <x-header></x-header>
    <div class="container mx-auto my-5 flex justify-between items-center">
        <h1 class="text-[32px] ">{{ $header }}</h1>
@auth
        <x-button href="/jobs/create">Create Job</x-button>
        @endauth
    </div>


    <hr>
    <div class="container mx-auto my-5">

        <?= $slot ?>
    </div>

</body>

</html>
