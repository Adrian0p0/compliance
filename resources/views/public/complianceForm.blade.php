@extends('layouts.front')
@section('body-content')
<div class="p-5 mt-4 border-2 rounded">
    <form action="{{route('FormSubmitSave')}}" method="POST" enctype="multipart/form-data" >
        @csrf

        <div class="w-full mt-7 md:inline-flex block">
            <div class="md:w-7/12 w-full">
                <select name="company" id="companies" class="w-full rounded dropdown-fetch @if($errors->has('company')) border-red-400 @else border-neutral-300 @endif">
                    <option value= >{{__('messages.form.company')}} *</option>
                    @foreach ($data['companies'] as $company)
                        @if (old('company') == $company->id)
                            <option value="{{$company->id}}" selected>{{$company->name}}</option>
                        @else
                            <option value="{{$company->id}}">{{$company->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="md:w-5/12 w-full px-4 py-2" id="companies-description">
            </div>
        </div>

        <div class="w-full mt-7 md:inline-flex block">
            <div class="md:w-7/12 w-full">
                <input type="text" placeholder="{{__('messages.form.title')}} *" name="title" value="{{old('title')}}" class="w-full rounded @if($errors->has('title')) border-red-400 @else border-neutral-300 @endif"/>
            </div>
        </div>

        <div class="w-full mt-7 md:inline-flex block">
            <div class="md:w-7/12 w-full">
                <input type="text" placeholder="{{__('messages.form.country')}}" name="country" value="{{old('country')}}" class="w-full border-neutral-300 rounded"/>
            </div>
        </div>

        <div class="w-full mt-7 md:inline-flex block">
            <div class="md:w-7/12 w-full">
                <input type="text" placeholder="{{__('messages.form.area')}}" name="area" value="{{old('area')}}" class="w-full border-neutral-300 rounded"/>
            </div>
        </div>

        <div class="w-full mt-7 md:inline-flex block">
            <div class="md:w-7/12 w-full">
                <textarea type="text" rows="10" placeholder="{{__('messages.form.body-text')}} *" name="body-text" class="w-full  rounded @if($errors->has('body-text')) border-red-400 @else border-neutral-300 @endif">{{old('body-text')}}</textarea>
            </div>
            <div class="md:w-5/12 w-full px-4 py-2">
                {{__('messages.form.body-text-atention')}}
            </div>
        </div>

        <div class="w-full mt-7 md:inline-flex block">
            <div class="md:w-7/12 w-full">
                <label for="formFileMultiple" class="form-label inline-block mb-2 text-gray-700"> {{__('messages.form.file-atach')}} </label>
                <button class="w-full text-left border @if($errors->has('attachment')) border-red-400 @else border-neutral-300 @endif rounded p-3" onclick="event.preventDefault(); document.getElementById('getFile').click()">
                    {{__('messages.form.file-atach-button')}}
                </button>
                <input type="file" class="hidden" name="attachment[]" id="getFile" accept=".png,.jpg,jpeg,.doc,.docx,.pdf,.txt,.zip" multiple>
                <div id=file-list class="flex flex-wrap flex-row gap-2 mt-3">
                </div>
            </div>
            <div class="md:w-5/12 w-full px-4 py-2">
                {{__('messages.form.file-atach-text')}}
            </div>
        </div>

        <div class="w-full mt-7 md:inline-flex block">
            <div class="md:w-7/12 w-full">
                <input type="checkbox" name="toReply" id="toReply" class="mr-3 w-6 h-6 rounded">{{__('messages.form.toReply')}}
            </div>
            <div class="md:w-5/12 w-full px-4 py-2">
                {{__('messages.form.AnonimityRenounce')}}
            </div>
        </div>

        <div class="w-full mt-7 md:inline-flex block">
            <div class="md:w-7/12 w-full" id="replyTo">
            </div>
        </div>

        <div class="w-full mt-7 md:inline-flex block">
            <div class="md:w-7/12 w-full">
                <div class="w-full">
                    {!! captcha_image_html('ContactCaptcha') !!}
                </div>
                <div class="w-full">
                    <input class="rounded w-full @if($errors->has('CaptchaCode')) border-red-400 @else border-neutral-300 @endif" type="text" id="CaptchaCode" name="CaptchaCode">
                </div>
            </div>
        </div>

        <div class="w-full mt-7 md:inline-flex block">
            <div class="md:w-7/12 w-full text-center">
                <button type="submit" name="Submit" autofocus role="button" class="border p-3 rounded bg-blue-500 active:bg-blue-700">
                    {{__('messages.form.submit')}}
                </button>
            </div>
        </div>

    </form>
</div>
@endsection
@section('footer-content')
<script>
$(function(){ $('button[type="submit"]').click(function(){ $(this).html('<i class="material-icons">hourglass_bottom</i>');}); });

$(function () {
    $(".dropdown-fetch").change(function () {
        $dest = "#"+$(this).attr('id')+'-description';
        if($(this).val()){
            $.ajax({ type: 'POST', url: '{{route("ajax-get-data")}}',
                data: { '_token':'{{ csrf_token() }}', 'action':$(this).attr('id'), 'selected': $(this).val() },
                success: function (data) { $($dest).html(data); },
            });
        }
        else{ $($dest).html(''); }
    });
});

$(function () {
    $("#toReply").click(function () {
        if($(this).prop('checked')){ $('#replyTo').html('<input type="email" placeholder="{{__("messages.form.email")}}" name="email" class="w-full rounded"/>')}
        else{ $('#replyTo').html('') }
    });
});

$(function () {
    $("input").change(function () { this.classList.remove("border-red-400") });
    $("textarea").change(function () { this.classList.remove("border-red-400") });
    $("select").change(function () { this.classList.remove("border-red-400") });
});

$('.alert-popup').click( function(){this.classList.add("hidden")})
setTimeout(()=>{$('.alert-popup').each(function(){this.classList.add("hidden")})},5000)

$(function(){
    $('input[type="file"]').change(function(){
        var limit = 18*1024*1024;
        $('#file-list').html('');
        this.classList.remove("border-red-400");
        $(this).each(function(index, field){
            for(var i=0;i<field.files.length;i++){
                const file = field.files[i];
                $('#file-list').append(
                    '<div class="files border-2 rounded p-3">' + file.name + '</div>'
                )
                limit -= file.size;
            }
            if(limit <= 0){
                $('#file-list').html('{{__("messages.form.files-too-big")}}');
            }
            else{
                $('#file-list').append( '<div onclick="$(`input[type=file]`).value=``; $(`#file-list`).html(``);" class="w-full border-2 rounded p-3 text-center cursor-pointer"> {{__("messages.form.file-empty")}} </div>' )
            }
        });
    })
})
</script>
@endsection
@section('head-content')
<link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection


@section('notification')
    @if(Session::has('success'))
        <div class="fixed top-4 right-3 left-3">
            <div class="flex flex-col items-center">
                <div class="bg-lime-500 rounded p-3 alert-popup cursor-pointer text-xl">
                    {{Session::get('success')}}
                </div>
            </div>
        </div>
    @endif
@endsection

