<x-guest-layout :version="''">
    <div class="login_page_wrapper">
        <div class="md-card card-top-danger card-bottom-green" id="login_card">
            <div class="md-card-content large-padding" id="login_form">
                <div class="login_heading">
                    <x-app-logo :src="'images/armoirie.png'" :height="60" :width="40"></x-app-logo><br>
                    <x-app-logo :height="40" :width="80"></x-app-logo>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @if (!empty($errors) && !empty($errors->all()))
                    <div class="uk-text-center">
                        <p class="uk-text-danger uk-text-small">{{ implode('', $errors->all()) }}</p>
                    </div>
                    @endif
                    <div class="uk-form-row">
                        <x-input-label for="email" :value="__('locale.email').' | '.__('locale.phone')" />
                        <x-text-input id="email" type="text" name="email" :value="old('email')" required autofocus autocomplete="off" />
                    </div>
                    <div class="md-input-wrapper md-input-filled uk-form-row">
                        <x-input-label for="password" :value="__('locale.password')" />
                        <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
                        <a class="uk-form-password-toggle" data-uk-form-password="">Show</a>
                        <span class="md-input-bar "></span>
                    </div>
                    <div class="uk-margin-top">
                        @if (Route::has('password.request'))
                        <a title="@lang('locale.forgot_password')?" id="password_reset_show" class="uk-float-right"><span class="material-icons">lock_open</span></a>
                        @endif
                        <span class="icheck-inline">
                            <input type="checkbox" name="login_page_stay_signed" id="login_page_stay_signed" data-md-icheck />
                            <label for="login_page_stay_signed" class="inline-label uk-text-small">@lang('locale.remember')</label>
                        </span>
                    </div>
                    <div class="">
                        <x-app-btn class="md-bg-yellow-500 md-btn-block md-btn-large">@lang('locale.submit')</x-app-btn>
                    </div>
                    <div class="uk-margin-top">
                        <a title="@lang('locale.create_one')?" href="{{ route('register') }}" class="uk-float-right uk-text-small">@lang('locale.create_one')</a>
                        <span class="icheck-inline">
                            <label for="login_page_stay_signed" class="inline-label uk-text-small">@lang('locale.dont_get_account')</label>
                        </span>
                    </div>
                    <div class="uk-text-center uk-margin-top">
                        <x-app-author></x-app-author>
                    </div>
                </form>
            </div>
            <div class="md-card-content large-padding" id="login_password_reset" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_a uk-margin-medium-bottom">Create an account</h2>
                <form>
                    <div class="uk-form-row">
                        <label for="login_email_reset">Your email address</label>
                        <input class="md-input" type="text" id="login_email_reset" name="login_email_reset" />
                    </div>
                    <div class="uk-margin-medium-top">
                        <x-app-btn class="md-bg-yellow-500 md-btn-block">Reset password</x-app-btn>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
