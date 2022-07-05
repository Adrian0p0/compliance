@extends('layouts.front')
@section('body-content')
    <x-lang-switch/>

    <div class="p-5 border-2 rounded">
        <p class="mb-3 text-xl text-center">
            {!!__('messages.Descriere.Head')!!}
        </p>
        <p class="mb-3 p-2 text-base border-b-2">
            {!!__('messages.Descriere.Body.p1')!!}
        </p>
        <p class="mb-3 p-2 text-base border-b-2">
            {!!__('messages.Descriere.Body.p2')!!}
        </p>
        <p class="mb-3 p-2 text-base border-b-2">
            {!!__('messages.Descriere.Body.p3')!!}
        </p>
        <p class="mb-3 p-2 text-base border-b-2">
            {!!__('messages.Descriere.Body.p4')!!}
        </p>
        <p class="mb-3 p-2 text-base border-b-2">
            {!!__('messages.Descriere.Body.p5')!!}
        </p>
        <p class=" p-2 text-base">
            {!!__('messages.Descriere.Body.p6')!!}
        </p>
        <p class="mb-3 p-2 text-base border-b-2">
            {!!__('messages.Descriere.Body.responsabil')!!}
        </p>
        <p class="mb-3 p-2 text-base border-b-2">
            {!!__('messages.Descriere.Body.p7')!!}
        </p>
        <p class="p-2 text-base">
            {!! __('messages.Descriere.Body.p8q') !!}
            {!! __('messages.Descriere.Body.p8d1') !!}
            {!! __('messages.Descriere.Body.p8d2') !!}
        </p>
        <p class="mb-3 p-2 text-base border-b-2 border-t-2 mt-3">
            {!!__('messages.Descriere.Body.p9')!!}
        </p>
        <p class="mb-3 p-2 text-base">
            {!!__('messages.Descriere.Body.p10')!!}
        </p>
    </div>

    <div class="mt-8 p-5  border-2 rounded">
        <p class="mb-3 text-xl text-center">
            {!!__('messages.GDPR.Head')!!}
        </p>
        <p class="mb-3 p-2 text-base border-b-2">
            {!!__('messages.GDPR.Body.p1')!!}
        </p>
        <p class="mb-3 p-2 text-base border-b-2">
            {!!__('messages.GDPR.Body.p2')!!}
        </p>
        <p class="mb-3 p-2 text-base border-b-2">
            {!!__('messages.GDPR.Body.p3')!!}
        </p>
        <p class="mb-3 p-2 text-base border-b-2">
            {!!__('messages.GDPR.Body.p4')!!}
        </p>
        <p class="mb-3 p-2 text-base border-b-2">
            {!!__('messages.GDPR.Body.p5')!!}
        </p>
        <p class="mb-3 p-2 text-base">
            {!!__('messages.GDPR.Body.p6')!!}
        </p>
    </div>

    <div class="mt-8 pt-5">
        <a href="{{route('FormSubmit')}}" class="rounded p-2 m-auto bg-neutral-600 text-white">{{__('messages.toForm')}}</a>
    </div>
@endsection
