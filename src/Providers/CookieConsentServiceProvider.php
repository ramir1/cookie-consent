<?php namespace Ramir1\CookieConsent\Providers;


use Illuminate\Support\ServiceProvider;

class CookieConsentServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'cookie_consent');
        $this->loadTranslationsFrom(__DIR__ . '/../../lang', 'cookie_consent');
        $this->loadJSONTranslationsFrom(__DIR__ . '/../../lang');
    }

    public function register(): void
    {
//        $this->app->register(CookieConsentServiceProvider::class);
    }


}
