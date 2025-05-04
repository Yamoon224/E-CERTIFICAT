<div class="modal" id="create-city">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">@lang('locale.add', ['param'=>__('locale.city', ['suffix'=>app()->getLocale() == 'en' ? 'y' : '', 'prefix'=>''])])</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('cities.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <x-input-label for="name">@lang('locale.city', ['suffix'=>app()->getLocale() == 'en' ? 'y' : '', 'prefix'=>''])<span class="text-danger">*</span></x-input-label>
                                <x-text-input id="name" type="text" name="name" placeholder="{{ __('locale.name') }}" required />
                            </div>
                            <div class="form-group">
                                <x-input-label for="department_id">@lang('locale.department', ['prefix'=>'', 'suffix'=>''])<span class="text-danger">*</span></x-input-label>
                                <select class="form-control select2" id="department_id" name="department_id" style="width: 100%;">
                                    <option label="@lang('locale.choose')" value=""></option>
                                    @foreach ($departments as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
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