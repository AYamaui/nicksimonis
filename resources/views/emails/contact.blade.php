<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>{{$message->getSubject()}}</title>
    </head>
    <body>
        <p>New message in nicksimonis.co</p>
        <ul>
            <li>Email: {{$email}}</li>
            <li>Subject: {{$subject}}</li>
            <li>Message: {{$messageString}}</li>
            <li>Ip Address: {{Request::getClientIp()}}</li>
        </ul>
    </body>
</html>