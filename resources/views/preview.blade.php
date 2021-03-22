<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Preview</title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <div>
            {!!$content!!}
        </div>
    </body>
</html>

