<!DOCTYPE html>
<html lang="it">
  <head>
    {!! str_replace(['<title>', '<meta name="description"'], ['<title inertia>', '<meta inertia name="description"'], Meta::toHtml()) !!}
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <script type="text/javascript">
        var _iub = _iub || [];
        _iub.csConfiguration = {"invalidateConsentWithoutLog":true,"reloadOnConsent":true,"consentOnContinuedBrowsing":false,"whitelabel":false,"lang":"it","siteId":{{ config('custom.iubenda-siteid') }},"floatingPreferencesButtonDisplay":"bottom-right","cookiePolicyId":{{ config('custom.iubenda-code') }}, "banner":{ "closeButtonRejects":true,"acceptButtonDisplay":true,"customizeButtonDisplay":true,"rejectButtonDisplay":true,"explicitWithdrawal":true,"position":"float-bottom-right" }};
        </script>
    <script type="text/javascript" src="//cdn.iubenda.com/cs/iubenda_cs.js" charset="UTF-8" async></script>
  </head>
  <body>
    @inertia
  </body>
</html>
