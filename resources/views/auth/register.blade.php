<x-guest-layout :version="'login_page_v2'">
    <div class="uk-container uk-container-center">
        <div class="md-card card-top-danger card-bottom-green">
            <div class="md-card-content">
                <div class="uk-text-center">
                    <a href="{{ route('welcome') }}" title="@lang('locale.sign_in')">
                        <x-app-logo :src="'images/armoirie.png'" :height="60" :width="40"></x-app-logo><br>
                        <x-app-logo :height="40" :width="80"></x-app-logo>
                    </a>
                </div>
                @if (!empty($errors) && !empty($errors->all()))
                <div class="uk-text-center">
                    <p class="uk-text-danger uk-text-small">{{ implode(' | ', $errors->all()) }}</p>
                </div>
                @endif
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="uk-tab-center">
                        <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#citizen_tabs_content', animation:'slide-horizontal'}">
                            <li class="uk-active md-bg-red-A700" aria-expanded="true"><a class="uk-text-contrast">@lang('locale.identity')</a></li>
                            <li aria-expanded="false" class="md-bg-yellow-500"><a>@lang('locale.biography')</a></li>
                            <li aria-expanded="false" class="md-bg-teal-800"><a class="uk-text-contrast">@lang('locale.auth_id')</a></li>
                        </ul>
                    </div>
                    <ul id="citizen_tabs_content" class="uk-switcher">
                        <li aria-hidden="false" class="uk-active uk-margin-top uk-margin-left uk-margin-right">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-large-1-3 uk-width-medium-1-2">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="material-icons">person</i></span>
                                        <label for="firstname">@lang('locale.firstname') <span class="md-color-deep-orange-A700 req">*</span></label>
                                        <input type="text" class="md-input" name="firstname" id="firstname" required />
                                    </div>
                                </div>
                                <div class="uk-width-large-1-3 uk-width-medium-1-2">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="material-icons">person</i></span>
                                        <label for="name">@lang('locale.name') <span class="md-color-deep-orange-A700 req">*</span></label>
                                        <input type="text" class="md-input" name="name" id="name" required />
                                    </div>
                                </div>
                                <div class="uk-width-large-1-3 uk-width-medium-1-2">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="material-icons">wc</i></span>
                                        <select id="gender" name="citizen[gender]" data-md-selectize required>
                                            <option value="">@lang('locale.gender')</option>
                                            <option value="M">@lang('locale.male')</option>
                                            <option value="F">@lang('locale.female')</option>
                                        </select>
                                    </div>
                                </div>                                
                                <div class="uk-width-large-1-3 uk-width-medium-1-2">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="material-icons">flag</i></span>
                                        <label for="citizenship">@lang('locale.citizenship') <span class="md-color-deep-orange-A700 req">*</span></label>
                                        <input type="text" class="md-input" name="citizen[citizenship]" id="citizenship" required/>
                                    </div>                                                    
                                </div>                                                    
                                <div class="uk-width-large-1-3 uk-width-medium-1-2">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="material-icons">work</i></span>
                                        <label for="profession">@lang('locale.profession') <span class="md-color-deep-orange-A700 req">*</span></label>
                                        <input type="text" class="md-input" name="citizen[profession]" id="profession" required />
                                    </div>
                                </div>
                                <div class="uk-width-large-1-3 uk-width-medium-1-2">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="material-icons">assignment_ind</i></span>
                                        <label for="role">@lang('locale.role') <span class="md-color-deep-orange-A700 req">*</span></label>
                                        <input type="text" class="md-input" name="citizen[role]" id="role" required />
                                    </div>    
                                </div>    
                            </div>
                        </li>
                        <li aria-hidden="true" class="uk-margin-top uk-margin-left uk-margin-right">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                        <div class="md-input-wrapper">
                                            <label for="uk_dp_1">@lang('locale.birthday') <span class="md-color-deep-orange-A700 req">*</span></label>
                                            <input class="md-input" type="text" id="uk_dp_1" data-uk-datepicker="{format:'DD/MM/YYYY'}" max="{{ date('d')."/".date('m')."/".(date('Y')-16) }}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="material-icons">location_on</i></span>
                                        <label for="birthplace">@lang('locale.birthplace') <span class="md-color-deep-orange-A700 req">*</span></label>
                                        <input type="text" class="md-input" name="citizen[birthplace]" id="birthplace" required />
                                    </div>
                                </div>
                                <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="material-icons">person</i></span>
                                        <label for="father">@lang('locale.father') <span class="md-color-deep-orange-A700 req">*</span></label>
                                        <input type="text" class="md-input" name="citizen[father]" id="father" required />
                                    </div>
                                </div>
                                <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="material-icons">person</i></span>
                                        <label for="mother">@lang('locale.mother') <span class="md-color-deep-orange-A700 req">*</span></label>
                                        <input type="text" class="md-input" name="citizen[mother]" id="mother" required />
                                    </div>  
                                </div>
                            </div>
                        </li>
                        <li aria-hidden="true" class="uk-margin-top uk-margin-left uk-margin-right">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="material-icons">&#xE0BE;</i></span>
                                        <label for="email">@lang('locale.email') <span class="md-color-deep-orange-A700 req">*</span></label>
                                        <input type="email" class="md-input" name="email" id="email" required />
                                    </div>
                                </div>
                                <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="material-icons">&#xE0CD;</i></span>
                                        <label for="phone">@lang('locale.phone') <span class="md-color-deep-orange-A700 req">*</span></label>
                                        <input type="tel" class="md-input" name="phone" id="phone" maxlength="9" minlength="9" required/>
                                    </div>
                                </div>                                
                                <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                    <div class="md-input-wrapper">
                                        <x-input-label for="password">@lang('locale.password') <span class="md-color-deep-orange-A700 req">*</span></x-input-label>
                                        <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
                                        <a class="uk-form-password-toggle" data-uk-form-password="">Show</a>
                                        <span class="md-input-bar "></span>
                                    </div>
                                </div>
                                <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                    <div class="md-input-wrapper">
                                        <x-input-label for="password_confirmation">@lang('locale.password_confirmation') <span class="md-color-deep-orange-A700 req">*</span></x-input-label>
                                        <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="current-password" />
                                        <a class="uk-form-password-toggle" data-uk-form-password="">Show</a>
                                        <span class="md-input-bar "></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="uk-text-center uk-margin uk-margin-left uk-margin-right">
                        <div class="">
                            <x-app-btn class="md-bg-yellow-500 md-btn-block md-btn-large">@lang('locale.submit')</x-app-btn>
                        </div>
                        <div class="uk-margin-top">
                            <x-app-author></x-app-author>
                        </div>
                    </div>                    
                </form>
            </div>                
        </div>
    </div>
</x-guest-layout>
