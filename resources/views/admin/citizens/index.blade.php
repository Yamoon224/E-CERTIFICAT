<x-app-layout>
    <h4 class="heading_a uk-margin-bottom">@lang('locale.citizen', ['prefix'=>'', 'suffix'=>'s'])</h4>
    <div class="md-card card-top-primary card-bottom-primary uk-margin-medium-bottom">
        <div class="md-card-content">
            <div class="dt_colVis_buttons"></div>
            <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
                <thead>
                    <th>#</th>
                    <th>@lang('locale.created_at')</th>
                    <th>@lang('locale.firstname')</th>
                    <th>@lang('locale.name')</th>
                    <th>@lang('locale.gender')</th>
                    <th>@lang('locale.phone')</th>
                    <th>@lang('locale.birthday')</th>
                    <th>@lang('locale.birthplace')</th>
                    <th>@lang('locale.profession')</th>
                    <th>@lang('locale.role')</th>
                    <th>@lang('locale.father')</th>
                    <th>@lang('locale.mother')</th>
                    <th>@lang('locale.citizenship')</th>
                    <th>@lang('locale.action', ['suffix'=>'s'])</th>
                </thead>
                <tfoot>
                    <th>#</th>
                    <th>@lang('locale.created_at')</th>
                    <th>@lang('locale.firstname')</th>
                    <th>@lang('locale.name')</th>
                    <th>@lang('locale.gender')</th>
                    <th>@lang('locale.phone')</th>
                    <th>@lang('locale.birthday')</th>
                    <th>@lang('locale.birthplace')</th>
                    <th>@lang('locale.profession')</th>
                    <th>@lang('locale.role')</th>
                    <th>@lang('locale.father')</th>
                    <th>@lang('locale.mother')</th>
                    <th>@lang('locale.citizenship')</th>
                    <th>@lang('locale.action', ['suffix'=>'s'])</th>
                </tfoot>
                <tbody>
                    @foreach($citizens as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</td>
                        <td>{{ $item->firstname }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ date('d/m/Y', strtotime($item->birthday)) }}</td>
                        <td>{{ $item->birthplace }}</td>
                        <td>{{ $item->profession }}</td>
                        <td>{{ $item->role }}</td>
                        <td>{{ $item->father }}</td>
                        <td>{{ $item->mother }}</td>
                        <td>{{ $item->citizenship }}</td>
                        <td>
                            <div style="display: inline-block">
                                <a class="" href="{{ route('certificates.show', $item->id) }}"><i class="typcn icon typcn-eye"></i></a>
                            </div>
                            <form action="{{ route('certificates.destroy', $item->id) }}" style="display: inline-block" method="post">
                                @csrf @method('DELETE')
                                <button class="md-btn md-btn-danger md-btn-mini md-btn-wave-light md-btn-icon waves-effect waves-button waves-light" onclick="UIkit.modal.confirm('@lang('locale.do_you_confirm')', function(){ UIkit.modal.alert('Confirmed!'); });"><i class="material-icons">delete</i></button>
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
