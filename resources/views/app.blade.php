<!DOCTYPE html>
<html>
  <head>
    {!! str_replace('<title>','<title inertia>', Meta::toHtml()) !!}
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
  </head>
  <body>
    @inertia
  </body>
</html>
