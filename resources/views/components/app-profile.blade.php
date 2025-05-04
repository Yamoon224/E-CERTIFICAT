<div class="uk-modal uk-modal-card-fullscreen" id="modal_profil" aria-hidden="true" style="display: none; overflow-y: scroll;">
    <div class="uk-modal-dialog uk-modal-dialog-blank">
        <div class="md-card uk-height-viewport">
            <div class="md-card-toolbar">
                <span class="md-icon material-icons uk-modal-close"></span>
                <h3 class="md-card-toolbar-heading-text">@lang('locale.profile')</h3>
            </div>
            <div class="md-card-content">
                <div class="uk-grid">
                    <div class="uk-width-large-1-3"></div>
                    <div class="uk-width-large-1-3">
                        <div class="md-card card-bottom-green card-top-green">
                            <div class="md-card-content">
                                <div class="user_heading">
                                    <div class="user_heading_avatar">
                                        <div class="thumbnail">
                                            <img src="{{ uiavatar() }}" alt="PROFIL">
                                        </div>
                                    </div>
                                    <div class="user_heading_content">
                                        <h2 class="heading_b uk-margin-bottom">
                                            <span class="uk-text-truncate">{{ auth()->user()->name }}</span>
                                            <span class="sub-heading">{{ strtoupper(__('locale.'.auth()->user()->group->name)) }}</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="user_content">
                                    <div class="uk-grid" data-uk-grid-margin="">
                                        <div class="uk-width-large-1-1 uk-row-first">
                                            <ul class="md-list md-list-addon">
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons"></i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="mailto:{{ auth()->user()->email }}" class="__cf_email__">{{ auth()->user()->email }}</a></span>
                                                        <span class="uk-text-small uk-text-muted">@lang('locale.email')</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons"></i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">{{ auth()->user()->phone }}</span>
                                                        <span class="uk-text-small uk-text-muted">@lang('locale.phone')</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-large-1-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>