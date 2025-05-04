<aside id="sidebar_main">
        
    <div class="sidebar_main_header">
        <div class="sidebar_logo">
            <a href="{{ route('dashboard') }}" class="sSidebar_hide">
                <x-app-logo :height="25" :width="90"></x-app-logo><br>
            </a>
            <a href="{{ route('dashboard') }}" class="sSidebar_show">
                <x-app-logo :src="'images/armoirie.png'" :height="32" :width="32"></x-app-logo><br>
            </a>
        </div>
        <div class="sidebar_actions">
            <select id="lang_switcher" name="lang_switcher">
                <option value="{{ app()->getLocale() == 'en' ? 'gb' : 'fr' }}" selected>@lang('locale.'.app()->getLocale() == 'en' ? 'english' : 'french')</option>
            </select>
        </div>
    </div>
    
    <div class="menu_section">
        <ul>
            <li class="{{ Route::is('dashboard') ? 'current_section' : '' }}" title="@lang('locale.dashboard')">
                <a href="{{ route('dashboard') }}">
                    <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                    <span class="menu_title">@lang('locale.dashboard')</span>
                </a>
            </li>
            @if (isgroupauth([1, 2, 3, 4, 5]))
            <li class="{{ Route::is('certificates.index') ? 'current_section' : '' }}" title="@lang('locale.certificate', ['prefix'=>'', 'suffix'=>'s'])">
                <a href="{{ route('certificates.index') }}">
                    <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                    <span class="menu_title">@lang('locale.certificate', ['prefix'=>'', 'suffix'=>'s'])</span>
                </a>
            </li>
            <li class="{{ Route::is('citizens.index') ? 'current_section' : '' }}" title="@lang('locale.citizen', ['prefix'=>'', 'suffix'=>'s'])">
                <a href="{{ route('citizens.index') }}">
                    <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                    <span class="menu_title">@lang('locale.citizen', ['prefix'=>'', 'suffix'=>'s'])</span>
                </a>
            </li>
            @endif

            @if (isgroupauth([1]))
            <li>
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">&#xE8D2;</i></span>
                    <span class="menu_title">@lang('locale.localities')</span>
                </a>
                <ul>
                    <li class="{{ Route::is('departments.index') ? 'act_item' : '' }}"><a href="{{ route('departments.index') }}">@lang('locale.department', ['prefix'=>'', 'suffix'=>'s'])</a></li>
                    <li class="{{ Route::is('cities.index') ? 'act_item' : '' }}"><a href="{{ route('cities.index') }}">@lang('locale.city', ['suffix'=>app()->getLocale() == 'en' ? 'ies' : 's', 'prefix'=>''])</a></li>
                    <li class="{{ Route::is('districts.index') ? 'act_item' : '' }}"><a href="{{ route('districts.index') }}">@lang('locale.district', ['prefix'=>'', 'suffix'=>'s'])</a></li>
                    <li class="{{ Route::is('areas.index') ? 'act_item' : '' }}"><a href="{{ route('areas.index') }}">@lang('locale.area', ['prefix'=>'', 'suffix'=>'s'])</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">&#xE8F1;</i></span>
                    <span class="menu_title">@lang('locale.administration')</span>
                </a>
                <ul>
                    <li class="{{ Route::is('users.index') ? 'act_item' : '' }}"><a href="{{ route('users.index') }}">@lang('locale.user', ['prefix'=>'', 'suffix'=>'s'])</a></li>
                </ul>
            </li>
            @endif
        </ul>
    </div>
</aside>