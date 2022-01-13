<!DOCTYPE html>
<html lang="it">
  <head>
    {!! str_replace(['<title>', '<meta name="description"'], ['<title inertia>', '<meta inertia name="description"'], Meta::toHtml()) !!}
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
  </head>
  <body>
    @inertia
  </body>
</html>
