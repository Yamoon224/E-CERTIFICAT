<x-app-layout>
    <h4 class="heading_a uk-margin-bottom">@lang('locale.user', ['prefix'=>'', 'suffix'=>''])</h4>
    <div class="md-card card-danger uk-margin-medium-bottom">
        <div class="md-card-content">
            <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
                <thead>
                    <th>#</th>
                    <th>@lang('locale.created_at')</th>
                    <th>@lang('locale.group', ['suffix'=>'', 'prefix'=>''])</th>
                    <th>@lang('locale.fullname')</th>
                    <th>@lang('locale.phone')</th>
                    <th>@lang('locale.email')</th>
                    <th>@lang('locale.username')</th>
                    <th>@lang('locale.action', ['suffix'=>'s'])</th>
                </thead>
                <tfoot>
                    <th>#</th>
                    <th>@lang('locale.created_at')</th>
                    <th>@lang('locale.group', ['suffix'=>'', 'prefix'=>''])</th>
                    <th>@lang('locale.fullname')</th>
                    <th>@lang('locale.phone')</th>
                    <th>@lang('locale.email')</th>
                    <th>@lang('locale.username')</th>
                    <th>@lang('locale.action', ['suffix'=>'s'])</th>
                </tfoot>
                <tbody>
                    @foreach($users as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</td>
                        <td>{{ $item->group->name }}</td>
                        <td>{{ $item->firstname ." ". $item->name }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->username }}</td>
                        <td>
                            <div style="display: inline-block">
                                <a class="btn btn-primary" data-target="#edit-user{{ $item->id }}" data-toggle="modal">
                                    <i class="typcn icon typcn-edit"></i>
                                </a>
                                {{-- <x-edit-user :user="$item" :groups="$groups"></x-edit-user> --}}
                            </div>
                            <form action="{{ route('users.destroy', $item->id) }}" style="display: inline-block" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="" onclick="if(!confirm('@lang('locale.do_you_confirm')')){ return false }">
                                    <i class="typcn typcn-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- <x-create-user :groups="$groups"></x-create-user> --}}
    @push('scripts')
    <x-script-datatables></x-script-datatables>
    @endpush
</x-app-layout>
