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
        preferences: 'allow',
        statistics: 'allow',
        marketing: 'allow'
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
