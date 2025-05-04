<x-app-layout>
    <h4 class="heading_a uk-margin-bottom">@lang('locale.certificate', ['prefix'=>'', 'suffix'=>'s'])</h4>
    <div class="md-card card-top-primary card-bottom-primary uk-margin-medium-bottom">
        <div class="md-card-content">
            <div class="dt_colVis_buttons"></div>
            <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
                <thead>
                    <th>#</th>
                    <th>@lang('locale.created_at')</th>
                    <th>@lang('locale.expired_at')</th>
                    <th>@lang('locale.destination')</th>
                    <th>@lang('locale.citizen')</th>
                    <th>@lang('locale.department', ['prefix'=>'', 'suffix'=>''])</th>
                    <th>@lang('locale.city', ['prefix'=>app()->getLocale() == 'en' ? 'y' : '', 'suffix'=>''])</th>
                    <th>@lang('locale.district', ['prefix'=>'', 'suffix'=>''])</th>
                    <th>@lang('locale.area', ['prefix'=>'', 'suffix'=>''])</th>
                    <th>@lang('locale.action', ['suffix'=>'s'])</th>
                </thead>
                <tfoot>
                    <th>#</th>
                    <th>@lang('locale.created_at')</th>
                    <th>@lang('locale.expired_at')</th>
                    <th>@lang('locale.destination')</th>
                    <th>@lang('locale.citizen')</th>
                    <th>@lang('locale.department', ['prefix'=>'', 'suffix'=>''])</th>
                    <th>@lang('locale.city', ['prefix'=>app()->getLocale() == 'en' ? 'y' : '', 'suffix'=>''])</th>
                    <th>@lang('locale.district', ['prefix'=>'', 'suffix'=>''])</th>
                    <th>@lang('locale.area', ['prefix'=>'', 'suffix'=>''])</th>
                    <th>@lang('locale.action', ['suffix'=>'s'])</th>
                </tfoot>
                <tbody>
                    @foreach($certificates as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</td>
                        <td>{{ date('d/m/Y H:i:s', strtotime($item->expired_at)) }}</td>
                        <td>{{ $item->destinator }}</td>
                        <td>{{ $item->firstname." ".$item->name." | ".$item->phone }}</td>
                        <td>{{ $item->department->name }}</td>
                        <td>{{ $item->city->name }}</td>
                        <td>{{ $item->district->name }}</td>
                        <td>{{ $item->area->name }}</td>
                        <td>
                            <div style="display: inline-block">
                                <a class="" href="{{ route('certificates.show', $item->id) }}"><i class="typcn icon typcn-eye"></i></a>
                            </div>
                            <form action="{{ route('certificates.destroy', $item->id) }}" style="display: inline-block" method="post">
                                @csrf @method('DELETE')
                                <button class="" onclick="UIkit.modal.confirm('@lang('locale.do_you_confirm')', function(){ UIkit.modal.alert('Confirmed!'); });"><i class="material-icons">delete</i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
    <x-script-datatables></x-script-datatables>
    @endpush
</x-app-layout>
