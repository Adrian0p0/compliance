@extends('layouts.app')
@section('body-content')
<div id="modalContent" class="@if (!$errors->any()) hidden @endif overflow-x-hidden overflow-y-scroll z-10 fixed right-0 left-0 top-0 bottom-0 h-full bg-opacity-60 bg-neutral-800 p-4">
    <div class="w-full max-w-screen-sm m-auto relative bg-white p-7 border rounded pt-11">
        <div class="absolute right-2 top-2 cursor-pointer" id="modalClose">
            <i class="material-icons">close</i>
        </div>
        <form class="bg-white" action="" method="post" id="modalForm">
            @csrf
            @method('POST')
            <input type="hidden" name='id'>
            <div class="w-full">
                <input type="text" placeholder="{{__('messages.form.name')}}" name="name" class="w-full rounded @if($errors->has('name')) border-red-400 @endif" value="{{old('name')}}"/>
            </div>

            <div class="w-full mt-7">
                <input type="text" placeholder="{{__('messages.form.adress')}}" name="adress" class="w-full rounded @if($errors->has('adress')) border-red-400 @endif" value="{{old('adress')}}"/>
            </div>

            <div class="w-full mt-7">
                <textarea type="text" rows=4 placeholder="{{__('messages.form.description_ro')}}" name="description-ro" class="w-full rounded @if($errors->has('description-ro')) border-red-400 @endif">{{old('description-ro')}}</textarea>
            </div>

            <div class="w-full mt-7">
                <textarea type="text" rows=4 placeholder="{{__('messages.form.description_en')}}" name="description-en" class="w-full rounded @if($errors->has('description-en')) border-red-400 @endif">{{old('description-en')}}</textarea>
            </div>

            <div class="w-full mt-7">
                <textarea type="text" rows=4 placeholder="{{__('messages.form.description_de')}}" name="description-de" class="w-full rounded @if($errors->has('description-de')) border-red-400 @endif">{{old('description-de')}}</textarea>
            </div>

            <div class="w-full mt-7">
                <input type="text" placeholder="{{__('messages.form.contact')}}" name="contact" class="w-full rounded @if($errors->has('contact')) border-red-400 @endif"/>
            </div>

            <div class="w-full mt-7 text-center">
                <input type="submit" role="button" value="{{__('messages.form.submit')}}" name="submit" class="text-base inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
            </div>
        </form>
    </div>
</div>
<div id="addModal" class="fixed bottom-4 right-4 bg-white rounded-full p-4 text-center flex justify-center items-center cursor-pointer">
    <i class="material-icons">add</i>
</div>

<div class="w-full mt-3 p-3 flex flex-wrap flex-row gap-2 justify-center" x-data={more:false}>
    @if (!$data->isEmpty())
        @foreach ($data as $subject)
            <div class="mb-2 p-2 border rounded flex-col flex relative flex-grow max-w-lg w-full md:w-1/2 bg-white shadow h-full">
                <div class="p-2 text-center w-fit h-fit border-b-2 border-r-2 rounded absolute top-0 left-0 bg-white">
                    {{$subject['id']}}
                </div>
                <div class="p-2 w-full border-b-2 mb-3 mt-4 text-center text-lg">
                    {{$subject['name']}}
                </div>
                <div class="p-2 w-full border-b-2 mb-3 mt-4 text-left text-lg">
                    {{$subject['adress']}}
                </div>
                <div class="p-2 w-full border-b-2 mb-3 mt-4 text-left text-lg min-h-7ch ">
                    <div class="overflow-hidden transition-all duration-700 max-h-28" id="{{$subject['id']}}">
                        {{$subject['description']}}
                    </div>
                    <div class="w-full mt-2 text-center">
                        <button class="expander border-2 text-center rounded py-1 px-2" id="b-{{$subject['id']}}" state="closed" onclick="expand({{$subject['id']}})">
                            {{__('messages.pages.see-more')}}
                        </button>
                    </div>
                </div>
                <div class="p-2 w-full border-b-2 mb-3 mt-4 text-left text-lg">
                    {{__('messages.contact')}}: {{$subject['contact']}}
                </div>
                <div class="w-full flex">
                    <div class="p-2 text-center w-1/2 hover:bg-neutral-200 active:bg-neutral-200 border-r-2">
                        <a class="edit-form cursor-pointer" id="{{$subject['id']}}">
                            <i class="material-icons">edit</i>
                        </a>
                    </div>
                    <div class="p-2 text-center w-1/2 hover:bg-neutral-200 active:bg-neutral-200">
                        <a class="cursor-pointer" href="{{route('companies.delete',$subject['id'])}}">
                            <i class="material-icons">delete</i>
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

@section('footer')
<script>

$(function(){
    $('.edit-form').click(function(){
        $('#modalForm').attr('action', "{{route('companies.save')}}")
        $('#modalContent').removeClass("hidden")
        $.ajax({ type: 'POST', url: '{{route("companies.edit")}}',
                data: { '_token':'{{ csrf_token() }}', 'selected': $(this).attr('id') },
                success: function(data) {
                    $('input[name="id"]').val(data['id'])
                    $('input[name="name"]').val(data['name'])
                    $('input[name="adress"]').val(data['adress'])
                    $('textarea[name="description-ro"]').val(data['description-ro'])
                    $('textarea[name="description-en"]').val(data['description-en'])
                    $('textarea[name="description-de"]').val(data['description-de'])
                    $('input[name="contact"]').val(data['contact'])
                },
        });
    })
})

$(function(){
    $('#addModal').click(function(){
        $('#modalContent').removeClass("hidden")
        $('input[name="id"]').val('')
        $('input[name="name"]').val('')
        $('input[name="adress"]').val('')
        $('textarea[name="description-ro"]').val('')
        $('textarea[name="description-en"]').val('')
        $('textarea[name="description-de"]').val('')
        $('input[name="contact"]').val('')
        $('#modalForm').attr('action', "{{route('companies.add')}}")
    })

    $('#modalClose').click(function(){$("#modalContent").addClass("hidden")})
})
$(function(){
    $("input").change(function(){ this.classList.remove("border-red-400") });
    $("textarea").change(function(){ this.classList.remove("border-red-400") });
});

$('.alert-popup').click( function(){this.classList.add("hidden")})
setTimeout(()=>{$('.alert-popup').each(function(){this.classList.add("hidden")})},3000)
function expand(id){
    btn = $("#b-"+id)
    if(btn.attr('state') == 'opened'){
        btn.attr('state','closed')
        btn.html("{{__('messages.pages.see-more')}}")
    }
    else{
        btn.attr('state','opened')
        btn.html("{{__('messages.pages.see-less')}}")
    }

    $("#"+id).toggleClass('max-h-28')
}
</script>
@endsection
@section('head')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
