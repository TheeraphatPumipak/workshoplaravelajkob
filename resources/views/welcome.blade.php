{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hello laravel by Kob</h1>
</body>
</html> --}}
{{-- <x-layout>
    <h1>Hello Laravel by kob</h1>
    <x-Demo></x-Demo>
</x-layout> --}}
@extends('layout')
@section('content')
    @livewire('counter')
@endsection
