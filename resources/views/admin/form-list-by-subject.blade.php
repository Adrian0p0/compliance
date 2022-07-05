@extends('layouts.app')
@section('body-content')

    <div class="w-full flex gap-2 justify-center flex-wrap">
        @foreach ($data['subjects'] as $subject)
            @if ($subject['name'] !== $data['title']->name)
                <a href="{{route('reports.show',$subject['id'])}}" class="border-2 rounded">
                    <div class="p-2">
                        {{$subject->name}}
                    </div>
                </a>
            @endif
        @endforeach
    </div>

    <div class="w-full border-b-2 mt-4">
        <div class="text-center text-4xl font-bold">
            {{$data['title']->name}}
        </div>
    </div>

    <div class="w-full mt-3 p-3 flex flex-wrap flex-row gap-2 justify-center">
        @if (!$data['content']->isEmpty())
            @foreach ($data['content'] as $submit)
                <div class="mb-2 p-2 border rounded flex-col flex relative flex-grow max-w-xs w-60 bg-white shadow">

                        <div class="p-2 text-center w-fit h-fit border-b-2 border-r-2 rounded absolute top-0 left-0 bg-white">
                            {{$submit['id']}}
                        </div>

                        <div class="p-2 w-full border-b-2 mb-3 mt-4 text-center text-lg">
                            {{$submit['title']}}
                        </div>

                        <div class="w-full flex">
                            <div class="p-2 text-center w-1/2 border-r-2 ">
                                @if ($submit['anonimRenounce'] == 0)
                                    <i class="material-icons">person_off</i>
                                @else
                                    <i class="material-icons">person</i>
                                @endif
                            </div>

                            <div class="p-2 text-center w-1/2 hover:bg-neutral-200 active:bg-neutral-200">
                                <a href="{{route('reports.edit',$submit['id'])}}">
                                    <i class="material-icons">edit</i>
                                </a>
                            </div>
                        </div>

                </div>
            @endforeach
        @else
            <h3> {{__('messages.no-data')}} </h3>
        @endif
    </div>
@endsection
@section('notification')
    @if(Session::has('success'))
        <div class="fixed top-4 right-3 z-20">
            <div class="bg-lime-500 rounded p-3 alert-popup cursor-pointer">
                {{Session::get('success')}}
            </div>
        </div>
    @endif
@endsection

@section('footer')
    <script>
        $('.alert-popup').click( function(){this.classList.add("hidden")})
        setTimeout(()=>{$('.alert-popup').each(function(){this.classList.add("hidden")})},3000)
    </script>
@endsection

@section('head')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
