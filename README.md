# cookie-consent
##Install

    composer require ramir1/cookie-consent

##Add in layout

    <x-cookie_consent::banner/>
    
    php artisan vendor:publish --provider="Ramir1\CookieConsent\CookieConsentServiceProvider"
    
 or
 
     yarn add js-cookie
 
    <x-cookie_consent::banner :style=0 :script=0 />
    
  To app.js
  
    import '../../vendor/ramir1/cookie-consent/resources/js/cookie-consent';
    
  to app.css/app.scss
  
    @import "../../vendor/ramir1/cookie-consent/resources/css/cookie-consent.css"  

Setting GTM (google tag manager)

    https://www.youtube.com/watch?v=yZjGzfWDc0Y
