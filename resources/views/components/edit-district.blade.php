<div class="modal" id="edit-district{{ $district->id }}">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">@lang('locale.edit', ['param'=>__('locale.district', ['suffix'=>app()->getLocale() == 'en' ? 'y' : '', 'prefix'=>''])])</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('districts.update', $district->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <x-input-label for="name">@lang('locale.district', ['suffix'=>'', 'prefix'=>'']) <span class="text-danger">*</span></x-input-label>
                                <x-text-input id="name" type="text" name="name" :value="$district->name" placeholder="{{ __('locale.name') }}" required />
                            </div>
                            <div class="form-group">
                                <x-input-label for="city_id{{ $district->id }}">@lang('locale.city', ['prefix'=>'', 'suffix'=>app()->getLocale() == 'en' ? 'y' : ''])<span class="text-danger">*</span></x-input-label>
                                <select class="form-control select2" id="city_id{{ $district->id }}" name="city_id" style="width: 100%;">
                                    <option label="@lang('locale.choose')" value=""></option>
                                    @foreach ($cities as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $district->city_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <x-app-button class="btn-primary">@lang('locale.submit')</x-app-button>
                </div>
            </form>            
        </div>
    </div>
</div>