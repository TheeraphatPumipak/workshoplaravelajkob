@extends('layout')
@section('content')
    <h1>Max Min Count AVg</h1>
    <div>Max:{{ $priceMax }}</div>
    <div>Min:{{ $priceMin }}</div>
    <div>Count:{{ $pricecount }}</div>
    <div>Avg:{{ $priceAvg }}</div>
@endsection
