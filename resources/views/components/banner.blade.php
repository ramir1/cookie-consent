<?php
if (!isset($style)) $style = 1;
if (!isset($script)) $script = 1;
?>
<div id="cookie_consent__label">
    <div class="cookie_consent__icon"></div>
</div>
<div id="cookie_consent" class="hidden">
    <div class="flex">
        <div id="cookie_consent__block_icon">
            <div class="cookie_consent__icon"></div>
        </div>
        <div id="cookie_consent__block_first">
            <div>
                @lang('cookie_consent::banner.first_block')
            </div>

            <div id="cookie_consent__btn_ok" class="btn btn-light mx-1"> @lang('cookie_consent::banner.ok')</div>
            <div id="cookie_consent__btn_setting"
                 class=" mx-1 btn btn-info"> @lang('cookie_consent::banner.setting')</div>
        </div>
        <div id="cookie_consent__block_setting" class="hidden">
            <form id="cookie_consent__form">
                <label class="block">
                    <input type="checkbox" id="cookie_consent__necessary" name="necessary" checked autocomplete="off"
                           disabled/>
                    @lang('cookie_consent::banner.necessary_desc')
                </label>
                <label class="block">
                    <input type="checkbox" id="cookie_consent__preferences" name="preferences" checked
                           autocomplete="off"/>
                    @lang('cookie_consent::banner.preferences')
                </label>
                <label class="block">
                    <input type="checkbox" id="cookie_consent__statistics" name="statistics" checked
                           autocomplete="off"/>
                    @lang('cookie_consent::banner.statistics')
                </label>
                <label class="block">
                    <input type="checkbox" id="cookie_consent__marketing" name="marketing" checked autocomplete="off"/>
                    @lang('cookie_consent::banner.marketing')
                </label>
                <div id="cookie_consent__btn_setting_close" class="btn btn-light mx-1">
                    @lang('cookie_consent::banner.back')
                </div>
                <div id="cookie_consent__btn_setting_apply" class="btn btn-light mx-1">
                    @lang('cookie_consent::banner.apply')
                </div>
                <div id="cookie_consent__btn_setting_allow_all" class="btn btn-light mx-1">
                    @lang('cookie_consent::banner.allow_all')
                </div>

            </form>
        </div>
    </div>
</div>

@if($style)
    <link rel="stylesheet" href="/vendor/cookie-consent/cookie-consent.css">
@endif
@if($script)
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"
            integrity="sha256-WCzAhd2P6gRJF9Hv3oOOd+hFJi/QJbv+Azn4CGB8gfY=" crossorigin="anonymous"></script>

    <script src="/vendor/cookie-consent/cookie-consent.js"></script>
@endif
