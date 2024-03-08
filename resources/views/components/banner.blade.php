<div id="cookie_consent__label">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
        <path
            d="M12 4.942c1.827 1.105 3.474 1.6 5 1.833v7.76c0 1.606-.415 1.935-5 4.76v-14.353zm9-1.942v11.535c0 4.603-3.203 5.804-9 9.465-5.797-3.661-9-4.862-9-9.465v-11.535c3.516 0 5.629-.134 9-3 3.371 2.866 5.484 3 9 3zm-2 1.96c-2.446-.124-4.5-.611-7-2.416-2.5 1.805-4.554 2.292-7 2.416v9.575c0 3.042 1.69 3.83 7 7.107 5.313-3.281 7-4.065 7-7.107v-9.575z"/>
    </svg>
</div>
<div id="cookie_consent" class="hidden">
    <div id="cookie_consent__block_first">
        <div>
            @lang('cookie_consent::banner.first_block')
        </div>

        <div id="cookie_consent__btn_ok" class="btn btn-light mx-1"> @lang('cookie_consent::banner.ok')</div>
        <div id="cookie_consent__btn_setting" class=" mx-1 btn btn-info"> @lang('cookie_consent::banner.setting')</div>
    </div>
    <div id="cookie_consent__block_setting" class="hidden">
        <form id="cookie_consent__form">
            <label class="block">
                <input type="checkbox" id="cookie_consent__necessary" name="necessary" checked autocomplete="off"
                       disabled/>
                @lang('cookie_consent::banner.necessary_desc')
            </label>
            <label class="block">
                <input type="checkbox" id="cookie_consent__preferences" name="preferences" checked autocomplete="off"/>
                @lang('cookie_consent::banner.preferences')
            </label>
            <label class="block">
                <input type="checkbox" id="cookie_consent__statistics" name="statistics" checked autocomplete="off"/>
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

<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"
        integrity="sha256-WCzAhd2P6gRJF9Hv3oOOd+hFJi/QJbv+Azn4CGB8gfY=" crossorigin="anonymous"></script>
<script>

    let cc = [];
    const block = document.getElementById('cookie_consent');
    const block_first = document.getElementById('cookie_consent__block_first');
    const block_setting = document.getElementById('cookie_consent__block_setting');
    const btn_setting = document.getElementById('cookie_consent__btn_setting')
    const btn_ok = document.getElementById('cookie_consent__btn_ok')
    const btn_setting_close = document.getElementById('cookie_consent__btn_setting_close')
    const btn_setting_apply = document.getElementById('cookie_consent__btn_setting_apply')
    const btn_setting_allow_all = document.getElementById('cookie_consent__btn_setting_allow_all')
    const btn_label = document.getElementById('cookie_consent__label')
    const cc_form = document.getElementById('cookie_consent__form')

    function allowAll() {
        const checkboxes = cc_form.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function (checkbox) {
            cc[checkbox.name] = 'allow';
        });
        agree(cc);
    }

    function agree(settings) {
        let default_settings = {
            necessary: 'allow',
            preferences: 'denied',
            statistics: 'denied',
            marketing: 'denied'
        }
        let options = {
            'sameSite': 'Lax',
            'domain': '',
            expires: 365
        };
        if (document.querySelector('meta[name=app-domain]')) {
            options.domain = document.querySelector('meta[name=app-domain]').content;
        }
        for (const key in settings) {
            if (settings.hasOwnProperty(key)) {
                default_settings[key] = settings[key];
            }
        }
        console.log(default_settings); // Для проверки в консоль
        Cookies.set('cookie_consent', JSON.stringify(default_settings), options);
        block.classList.add("hidden")
    }

    btn_ok.onclick = () => allowAll();

    btn_label.onclick = (function () {
        block.classList.remove("hidden")
    });
    btn_setting.onclick = (function () {
        block_setting.classList.remove("hidden")
        block_first.classList.add("hidden")
    });
    btn_setting_close.onclick = (function () {
        block_setting.classList.add("hidden")
        block_first.classList.remove("hidden")
    });
    btn_setting_apply.onclick = (function () {
        //Обработка формы cookie_consent__form
        const checkboxes = cc_form.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function (checkbox) {
            cc[checkbox.name] = checkbox.checked ? 'allow' : 'denied';
        });
        console.log(cc); // Вывод для проверки в консоль
        agree(cc);
    });
    btn_setting_allow_all.onclick = () => allowAll();
    let cookie_consent = Cookies.get('cookie_consent');
    if (typeof cookie_consent === 'undefined') {
        block.classList.remove("hidden");
    }
    console.log(cookie_consent);

</script>
<style>
    #cookie_consent__label {
        /*@apply fixed hidden right-0 bottom-0 w-[48px] h-[48px] z-40 border rounded text-center text-black bg-gray-500 font-normal px-3 py-2 cursor-pointer*/
        border-radius: .25rem;
        border-width: 1px;
        bottom: 48px;
        cursor: pointer;
        /*display: none;*/
        height: 48px;
        position: fixed;
        right: 0;
        width: 48px;
        z-index: 99;
        --tw-bg-opacity: 1;
        background-color: rgb(107 114 128/var(--tw-bg-opacity));
        font-weight: 400;
        padding: .5rem .75rem;
        text-align: center;
        --tw-text-opacity: 1;
        color: rgb(0 0 0/var(--tw-text-opacity));
    }

    #cookie_consent {
        /*@apply fixed bottom-0 left-0 right-0 text-center mb-0 p-1 hidden bg-white w-full p-4 border*/
        border-width: 1px;
        bottom: 0;
        /*display: block;*/
        left: 0;
        margin-bottom: 0;
        position: fixed;
        right: 0;
        width: 100%;
        --tw-bg-opacity: 1;
        background-color: #2e6e9e;
        padding: 1rem;
        z-index: 100
        /*text-align: center;*/
    }
</style>
