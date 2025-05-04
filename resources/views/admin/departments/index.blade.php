<x-app-layout>
    <h4 class="heading_a uk-margin-bottom">@lang('locale.department', ['prefix'=>'', 'suffix'=>'s'])</h4>
    <div class="md-card card-top-primary card-bottom-primary uk-margin-medium-bottom">
        <div class="md-card-content">
            <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
                <thead>
                    <th>#</th>
                    <th>@lang('locale.created_at')</th>
                    <th>@lang('locale.department', ['prefix'=>'', 'suffix'=>''])</th>
                    <th>@lang('locale.action', ['suffix'=>'s'])</th>
                </thead>
                <tfoot>
                    <th>#</th>
                    <th>@lang('locale.created_at')</th>
                    <th>@lang('locale.department', ['prefix'=>'', 'suffix'=>''])</th>
                    <th>@lang('locale.action', ['suffix'=>'s'])</th>
                </tfoot>
                <tbody>
                    @foreach($departments as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <div style="display: inline-block">
                                <a class="" data-target="#edit-city{{ $item->id }}" data-toggle="modal"><i class="material-icons">edit</i></a>
                                {{-- <x-edit-city :city="$item" :departments="$departments"></x-edit-city> --}}
                                <a class="" href="{{ route('departments.show', $item->id) }}"><i class="typcn icon typcn-eye"></i></a>
                            </div>
                            <form action="{{ route('departments.destroy', $item->id) }}" style="display: inline-block" method="post">
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

    {{-- <x-create-department></x-create-department> --}}
    @push('scripts')
    <x-script-datatables></x-script-datatables>
    @endpush
</x-app-layout>
