@extends('layouts.admin')

@section('content')

    <h1>HELLO {{ Auth::user()->name }}</h1>
@endsection
