<x-app-layout>
    <h4 class="heading_a uk-margin-bottom">@lang('locale.district', ['suffix'=>'s', 'prefix'=>''])</h4>
    <div class="md-card card-top-primary card-bottom-primary uk-margin-medium-bottom">
        <div class="md-card-content">
            <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
                <thead>
                    <th>#</th>
                    <th>@lang('locale.created_at')</th>
                    <th>@lang('locale.department', ['prefix'=>'', 'suffix'=>''])</th>
                    <th>@lang('locale.city', ['prefix'=>'', 'suffix'=>''])</th>
                    <th>@lang('locale.district', ['suffix'=>'', 'prefix'=>''])</th>
                    <th>@lang('locale.area', ['suffix'=>'', 'prefix'=>''])</th>
                    <th>@lang('locale.action', ['suffix'=>'s'])</th>
                </thead>
                <tfoot>
                    <th>#</th>
                    <th>@lang('locale.created_at')</th>
                    <th>@lang('locale.department', ['prefix'=>'', 'suffix'=>''])</th>
                    <th>@lang('locale.city', ['prefix'=>'', 'suffix'=>''])</th>
                    <th>@lang('locale.district', ['suffix'=>'', 'prefix'=>''])</th>
                    <th>@lang('locale.area', ['suffix'=>'', 'prefix'=>''])</th>
                    <th>@lang('locale.action', ['suffix'=>'s'])</th>
                </tfoot>
                <tbody>
                    @foreach($areas as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</td>
                        <td>{{ $item->department->name }}</td>
                        <td>{{ $item->city->name }}</td>
                        <td>{{ $item->district->name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <div style="display: inline-block">
                                <a class="btn btn-primary" data-target="#edit-district{{ $item->id }}" data-toggle="modal"><i class="typcn icon typcn-edit"></i></a>
                                {{-- <x-edit-district :district="$item" :cities="$cities"></x-edit-district> --}}
                                <a class="btn btn-info" href="{{ route('districts.show', $item->id) }}"><i class="typcn icon typcn-eye"></i></a>
                            </div>
                            <form action="{{ route('districts.destroy', $item->id) }}" style="display: inline-block" method="post">
                                @csrf @method('DELETE')
                                <button class="waves-effect waves-light" onclick="if(!confirm('@lang('locale.do_you_confirm')')){ return false }"><i class="typcn typcn-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- <x-create-district :cities="$cities"></x-create-district> --}}
    @push('scripts')
    <x-script-datatables></x-script-datatables>
    @endpush
</x-app-layout>
