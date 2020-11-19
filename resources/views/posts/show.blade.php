@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-full bg-white p-6 rounded-lg">
            <x-post :post="$post" />
        </div>
    </div>
@endsection
