<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $page ?? 'ToDo Project' }}</title>
    <link rel="shortcut icon" href="/assets/images/project-icon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
   
</head>

<body>
    <div class="container">
        <div class="content">
            @if (Auth::check() && Route::currentRouteName() !== 'welcome')
                <x-navbar>
                    <x-slot name="slot">
                        {{ $btn ?? '' }}
                    </x-slot>
                </x-navbar>
            @endif
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
