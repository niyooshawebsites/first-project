<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    {{-- This is comment in blade file --}}
    <h1>Product name: {{ request()->name }}</h1>
    <h1>Product ID: {{ request()->id }}</h1>

    <!-- <h1>Product name: {{ $name }}</h1>
    <h1>Product ID: {{ $id }}</h1> -->

    {{-- for loop --}}
    @for ($i = 0; $i < 10; $i++)
        @if ($i == 5)
            <p>This is {{ $i }}</p>
        @endif
        <p>{{ $i }}</p>
    @endfor

    @include('subviews.input')
</body>

</html>
