<?php namespace Ramir1\CookieConsent;

use Illuminate\Support\ServiceProvider;

class CookieConsentServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'cookie_consent');
        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'cookie_consent');
        $this->loadJSONTranslationsFrom(__DIR__ . '/../lang');

        $this->publishes([__DIR__ . '/../resources/css/cookie-consent.css' => public_path('vendor/cookie-consent/cookie-consent.css')
        ], ['assets', 'cookie-consent']);
        $this->publishes([__DIR__ . '/../resources/js/cookie-consent.js' => public_path('vendor/cookie-consent/cookie-consent.js')],
            ['assets', 'cookie-consent']);
    }

    public function register(): void
    {
//        $this->app->register(CookieConsentServiceProvider::class);
    }


}
