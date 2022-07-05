
<h2>{{__('messages.mail.title')}}</h2>
<h3>{{__('messages.mail.subject')}}: {{$mailInfo['title']}}</h3>

@isset($mailInfo['mail'])
    <p>{{__('messages.mail.respondTo')}}: <a href="mailto:{{$mailInfo['mail']}}">{{$mailInfo['mail']}}</a> </p>
@endisset

<p>{{__('messages.mail.company')}}: {{$mailInfo['company']}}</p>
<p>{{__('messages.mail.country')}}: {{$mailInfo['country']}}</p>
<p>{{__('messages.mail.area')}}: {{$mailInfo['area']}}</p>

<p>{{$mailInfo['message']}}</p>

@if ($mailInfo['files'])
    @foreach ($mailInfo['files'] as $filePath)
        @php preg_match_all('/([^\/]*\..{1,5})$/m', $filePath, $matches, PREG_SET_ORDER, 0); @endphp
        <p><a href="{{asset(str_replace('public/','',$filePath))}}" download="{{ $matches[0][0] }}">{{ $matches[0][0] }}</a></p>
    @endforeach
@endif
