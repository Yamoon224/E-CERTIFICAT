<div class="md-fab-wrapper">
    <a class="md-fab md-bg-teal-800 md-fab-wave waves-effect waves-button" href="#new_certificate" data-uk-modal="{center:true}">
        <i class="material-icons uk-text-contrast"></i>
    </a>
</div>
<div class="uk-modal" id="new_certificate" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog card-top-danger card-bottom-green">
        <button class="uk-modal-close uk-close" type="button"></button>
        <div class="uk-modal-header">
            <h3 class="uk-modal-title">@lang('locale.certificate', ['prefix'=>'', 'suffix'=>''])</h3>
        </div>
        <form action="{{ route('certificates.store') }}" method="post">
            @csrf
            <div class="uk-modal-content">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-1-2 uk-width-medium-1-2 uk-margin-small">
                        <div class="uk-input-group">
                            <span class="uk-input-group-addon"><i class="material-icons">location_on</i></span>
                            <select id="select_demo_5" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="@lang('locale.select')" name="area_id" required>
                                <option value="">@lang('locale.area', ['prefix'=>'', 'suffix'=>''])</option>
                                @foreach ($areas as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="uk-width-large-1-2 uk-width-medium-1-2 uk-margin-small">
                        <div class="uk-input-group">
                            <span class="uk-input-group-addon"><i class="material-icons">location_city</i></span>
                            <label for="destinator">@lang('locale.destinator')</label>
                            <input type="text" class="md-input" name="destinator" id="destinator"/>
                        </div>
                    </div>   
                    <div class="uk-width-large-1-1 uk-width-medium-1-1 uk-margin-small">
                        <div class="uk-input-group">
                            <span class="uk-input-group-addon"><i class="material-icons">location_city</i></span>
                            <label for="living_from">@lang('locale.living_from') <span class="md-color-deep-orange-A700 req">*</span></label>
                            <input type="text" class="md-input" name="living_from" id="living_from" required/>
                        </div>
                    </div>                                
                    <div class="uk-width-large-1-1 uk-width-medium-1-1 uk-margin">
                        <div class="uk-form-row">
                            <x-input-label for="reason">@lang('locale.reason') <span class="md-color-deep-orange-A700 req">*</span></x-input-label>
                            <textarea rows="1" class="md-input" name="reason" id="reason" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-modal-footer">
                <div class="uk-text-center">
                    <x-app-btn class="md-bg-yellow-500 md-btn-block md-btn-large">@lang('locale.submit')</x-app-btn>
                </div>
            </div>        
        </form>
    </div>
</div>