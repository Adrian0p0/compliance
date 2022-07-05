<body class="container">
    <div style="text-align: center">
        <h2 >{{__('messages.mail.titleResponse')}}</h2>
        <h3>{{__('messages.mail.subject')}}: {{$mailInfo['title']}}</h3>
    </div>

    <div>
        <p>{{__('messages.mail.YourMessage')}}</p>
        <p>{{__('messages.mail.company')}}: {{$mailInfo['company']}}</p>
        <p>{{__('messages.mail.country')}}: {{$mailInfo['country']}}</p>
        <p>{{__('messages.mail.area')}}:    {{$mailInfo['area']}}</p>

        <p>{{__('messages.mail.your_title')}}: {{$mailInfo['your_title']}}</p>
        <p>{{__('messages.mail.your_message')}}: {{$mailInfo['your_message']}}</p>
        <p>{{__('messages.mail.our_response')}}:</p>
        <p>
            {{$mailInfo['message']}}
        </p>

    </div>
</body>
