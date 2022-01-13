<!DOCTYPE html>
<html lang="it">
  <head>
    {!! str_replace(['<title>', '<meta name="description"'], ['<title inertia>', '<meta inertia name="description"'], Meta::toHtml()) !!}
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <script type="text/javascript">
        var _iub = _iub || [];
        _iub.csConfiguration = {"invalidateConsentWithoutLog":true,"reloadOnConsent":true,"consentOnContinuedBrowsing":false,"whitelabel":false,"lang":"it","siteId":{{ config('custom.iubenda-siteid') }},"floatingPreferencesButtonDisplay":"bottom-right","cookiePolicyId":{{ config('custom.iubenda-code') }}, "banner":{ "closeButtonRejects":true,"acceptButtonDisplay":true,"customizeButtonDisplay":true,"rejectButtonDisplay":true,"explicitWithdrawal":true,"position":"float-bottom-right" },
        "callback": {
            onPreferenceExpressedOrNotNeeded: function(preference) {
                dataLayer.push({
                    iubenda_ccpa_opted_out: _iub.cs.api.isCcpaOptedOut()
                });
                if (!preference) {
                    dataLayer.push({
                        event: "iubenda_preference_not_needed"
                    });
                } else {
                    if (preference.consent === true) {
                        dataLayer.push({
                            event: "iubenda_consent_given"
                        });
                    } else if (preference.consent === false) {
                        dataLayer.push({
                            event: "iubenda_consent_rejected"
                        });
                    } else if (preference.purposes) {
                        for (var purposeId in preference.purposes) {
                            if (preference.purposes[purposeId]) {
                                dataLayer.push({
                                    event: "iubenda_consent_given_purpose_" + purposeId
                                });
                            }
                        }
                    }
                }
            }
        }};
        </script>
    <script type="text/javascript" src="//cdn.iubenda.com/cs/iubenda_cs.js" charset="UTF-8" async></script>
  </head>
  <body>
    @inertia
  </body>
</html>
