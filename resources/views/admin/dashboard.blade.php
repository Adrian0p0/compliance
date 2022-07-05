@extends('layouts.app')
@section('body-content')
<div class="md:flex md:justify-center w-full">
    @if (!$data->isEmpty())
        @foreach ($data as $submitsGroup)
        <div class="md:w-4/12 p-4">
            <a href="{{route('reports.show',$submitsGroup['id'])}}">
                <div class="border rounded p-3">
                    <div class="text-center text-xl font-bold">
                        {{$submitsGroup['name']}}
                    </div>
                    <div class="text-center mt-3 text-4xl font-bold">
                        {{$submitsGroup['counter']}}
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    @else
        <h3> {{__('messages.no-data')}} </h3>
    @endif
</div>
@endsection
