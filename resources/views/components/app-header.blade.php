<header id="header_main">
    <div class="header_main_content">
        <nav class="uk-navbar">                            
            <!-- main sidebar switch -->
            <a id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                <span class="sSwitchIcon"></span>
            </a>
                        
            <div class="uk-navbar-flip">
                <ul class="uk-navbar-nav user_actions">
                    <li><a id="full_screen_toggle" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE5D0;</i></a></li>
                    
                    @if (isgroupauth([1]))
                    <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                        <a class="user_action_icon"><i class="material-icons md-24 md-light">&#xE7F4;</i><span class="uk-badge">16</span></a>
                        <div class="uk-dropdown uk-dropdown-xlarge">
                            <div class="md-card-content">
                                <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#header_alerts',animation:'slide-horizontal'}">
                                    <li class="uk-width-1-2 uk-active"><a class="js-uk-prevent uk-text-small">Messages (12)</a></li>
                                </ul>
                                <ul id="header_alerts" class="uk-switcher uk-margin">
                                    <li>
                                        <ul class="md-list md-list-addon">
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <span class="md-user-letters md-bg-cyan">yd</span>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="pages_mailbox.html">Enim neque est.</a></span>
                                                    <span class="uk-text-small uk-text-muted">Fugit non sit neque commodi molestiae quia nobis quia.</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <img class="md-user-image md-list-addon-avatar" src="assets/img/avatars/avatar_07_tn.png" alt=""/>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="pages_mailbox.html">Occaecati aut.</a></span>
                                                    <span class="uk-text-small uk-text-muted">Quis incidunt facere corrupti dolor at aut harum eum a sed.</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <span class="md-user-letters md-bg-light-green">hr</span>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="pages_mailbox.html">Saepe est.</a></span>
                                                    <span class="uk-text-small uk-text-muted">Repellat veritatis et illum magnam a dignissimos consequuntur molestiae.</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <img class="md-user-image md-list-addon-avatar" src="assets/img/avatars/avatar_02_tn.png" alt=""/>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="pages_mailbox.html">Non necessitatibus inventore.</a></span>
                                                    <span class="uk-text-small uk-text-muted">Enim et explicabo laboriosam enim voluptatum odio ut.</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <img class="md-user-image md-list-addon-avatar" src="assets/img/avatars/avatar_09_tn.png" alt=""/>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="pages_mailbox.html">Voluptatem ratione maxime.</a></span>
                                                    <span class="uk-text-small uk-text-muted">Dignissimos occaecati in voluptatem eos reiciendis.</span>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="uk-text-center uk-margin-top uk-margin-small-bottom">
                                            <a href="page_mailbox.html" class="md-btn md-btn-flat md-btn-flat-primary js-uk-prevent">Show All</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    @endif

                    <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                        <a class="user_action_image"><img class="md-user-image" src="{{ uiavatar() }}" alt="PROFIL"/></a>
                        <div class="uk-dropdown uk-dropdown-small">
                            <ul class="uk-nav js-uk-prevent">
                                <li><a data-uk-modal="{target:'#modal_profil'}">{{ ucfirst(strtolower(__('locale.profile'))) }}</a></li>
                                <li><a href="{{ route('logout') }}">@lang('locale.logout')</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<x-app-profile></x-app-profile>
<x-app-topbar></x-app-topbar>