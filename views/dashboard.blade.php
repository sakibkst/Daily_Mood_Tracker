@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1 class="mb-4">Welcome back!</h1>
    @if($streak >= 3)
        <div class="alert alert-success">
            🏅 You have a {{ $streak }}-day streak!
        </div>
    @endif
</div>
@endsection
