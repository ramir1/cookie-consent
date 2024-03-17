<?php namespace Ramir1\CookieConsent;

use Illuminate\Support\ServiceProvider;

class CookieConsentServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'cookie_consent');
        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'cookie_consent');
        $this->loadJSONTranslationsFrom(__DIR__ . '/../lang');

        $this->publishes([
            __DIR__ . '/../public/cookie-consent.css' => public_path('vendor/cookie-consent/cookie-consent.css'),
            __DIR__ . '/../public/cookie-consent.css.gz' => public_path('vendor/cookie-consent/cookie-consent.css.gz')
        ], ['assets', 'cookie-consent']);
        $this->publishes([
            __DIR__ . '/../public/cookie-consent.js' => public_path('vendor/cookie-consent/cookie-consent.js'),
            __DIR__ . '/../public/cookie-consent.js.gz' => public_path('vendor/cookie-consent/cookie-consent.js.gz')

        ],
            ['assets', 'cookie-consent']);
    }

    public function register(): void
    {
//        $this->app->register(CookieConsentServiceProvider::class);
    }


}
