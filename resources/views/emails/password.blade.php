<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>{{$message->getSubject()}}</title>
    </head>
    <body>
        Click here to reset your password: {{ link_to('password/reset/'.$token) }}
    </body>
</html>
