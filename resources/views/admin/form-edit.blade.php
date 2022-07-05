@extends('layouts.app')
@section('body-content')
    <div class="p-5 mt-4 border-2 rounded flex flex-wrap">

        <div class="w-full md:w-7/12">

            <div class="w-full md:inline-flex block">
                <div class="w-full">
                    {{__('messages.pages.edit.registeredData')}}
                    <div class="border-2 p-3 rounded">{{$data->registered}}</div>
                </div>
            </div>

            <div class="w-full mt-7 md:inline-flex block">
                <div class="w-full">
                    {{__('messages.pages.edit.company')}}
                    <div class="border-2 p-3 rounded">{{$data->c_name}}</div>
                </div>
            </div>

            <div class="w-full mt-7 md:inline-flex block">
                <div class="w-full">
                    {{__('messages.pages.edit.title')}}
                    <div class="border-2 p-3 rounded">{{$data->title}} </div>
                </div>
            </div>

            <div class="w-full mt-7 md:inline-flex block">
                <div class="w-full">
                    {{__('messages.pages.edit.country')}}
                    <div class="border-2 p-3 rounded">{{$data->country}} </div>
                </div>
            </div>

            <div class="w-full mt-7 md:inline-flex block">
                <div class="w-full">
                    {{__('messages.pages.edit.area')}}
                    <div class="border-2 p-3 rounded">{{$data->area}}</div>
                </div>
            </div>

            <div class="w-full mt-7 md:inline-flex block">
                <div class="w-full">
                    {{__('messages.pages.edit.message')}}
                    <div class="border-2 p-3 rounded">{{$data->message}}</div>
                </div>
            </div>

            @if($data->anonim)
                <div class="w-full mt-7 md:inline-flex block">
                    <div class="w-full">
                        {{__('messages.pages.edit.contact')}}
                        <a href="@if ($data->is_mail) mailto: @else tel: @endif{{$data->contact}}">
                            <div class="border-2 p-3 rounded">{{$data->contact}}</div>
                        </a>
                    </div>
                </div>
            @endif

        </div>

        <div class="w-full md:w-5/12 md:pl-3 flex flex-wrap flex-1 gap-2 justify-center content-start ">
            @if($data->files)
                @foreach (json_decode($data->files) as $file)
                    <a href="{{asset(str_replace('public/','',$file))}}" download class="border-2 rounded p-3 w-full break-words">
                        {{pathinfo(storage_path('app/'.$file))['basename']}}
                    </a>
                @endforeach
            @endif
        </div>

        @if($data->anonim && $data->is_mail)
            <div id="modalContent" class="@if (!$errors->any()) hidden @endif overflow-x-hidden overflow-y-scroll z-10 fixed right-0 left-0 top-0 bottom-0 h-full bg-opacity-60 bg-neutral-800 p-4">
                <div class="w-full max-w-screen-sm m-auto relative bg-white p-7 border rounded pt-11">
                    <div class="absolute right-2 top-2 cursor-pointer" id="modalClose">
                        <i class="material-icons">close</i>
                    </div>
                    <form class="bg-white" action="{{route('reports.save')}}" method="post" id="modalForm">
                        @csrf
                        @method('POST')
                        <input type="hidden" name='id' value='{{$data->id}}'>
                        <input type="hidden" name='status'>

                        <div class="w-full mt-7">
                            {{__('messages.respondTo')}}: {{$data->contact}}
                        </div>

                        <div class="w-full mt-7">
                            <textarea type="text" rows=6 placeholder="{{__('messages.message')}}" name="message" class="border-2 w-full rounded @if($errors->has('message')) border-red-400 @else border-gray-200 @endif"></textarea>
                        </div>

                        <div class="w-full mt-7 text-center">
                            <p class="p-3">
                                <input type="checkbox" name="dont_send" class="rounded mr-2" id=""> {{__('messages.pages.edit.check_dont_send')}}
                            </p>

                            <input type="submit" role="button" value="{{__('messages.form.send')}}" name="submit" class="text-base inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        </div>
                    </form>
                </div>
            </div>

            <div class="w-full mt-7 md:inline-flex block">
                <div class="md:w-6/12 w-full text-center">
                    <button id="finish" class="formDisplay inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        {{__('messages.form.status-'.$data->status)}}
                    </button>
                </div>

                <div class="md:w-6/12 w-full text-center">
                    <button id="reject" class="formDisplay inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        {{__('messages.form.reject')}}
                    </button>
                </div>

            </div>
        @else
            <form action="{{route('reports.save')}}" method="POST" class="w-full">
                @csrf
                @method('POST')
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="w-full mt-7 md:inline-flex block">
                    <div class="md:w-6/12 w-full text-center">
                        <input type="submit" name="finish" id="" role="button" value="{{__('messages.form.status-'.$data->status)}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    </div>
                    <div class="md:w-6/12 w-full text-center">
                        <input type="submit" name="reject" id="" role="button" value="{{__('messages.form.reject')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    </div>
                </div>
            </form>
        @endif
    </div>
@endsection

@section('footer')
    <script>
        $('.alert-popup').click( function(){this.classList.add("hidden")})
        setTimeout(()=>{$('.alert-popup').each(function(){this.classList.add("hidden")})},3000)
        $('.formDisplay').click(function(){ $('#modalContent').removeClass("hidden"); $('input[name="status"]').val($(this).attr('id')); })
        $('#modalClose').click(function(){$("#modalContent").addClass("hidden")})
    </script>
@endsection

@section('head')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
