<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>E-Visa Processing System</title>

</head>

<body class="h-full">

<div class="min-h-full">
    @include('applicant.layouts.navbar')

    <main>
      <div class="mt-16">
        @yield('content')
      </div>
    </main>
</div>
  
</body>
</html>