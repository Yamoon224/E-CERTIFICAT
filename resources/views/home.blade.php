<x-app-layout>
    <!-- large chart -->
    <div class="md-card card-top-danger card-bottom-green">
        <div class="md-card-content">
            <div class="uk-text-center">
                <a href="{{ route('welcome') }}" title="@lang('locale.sign_in')">
                    <x-app-logo :src="'images/armoirie.png'" :height="60" :width="40"></x-app-logo><br>
                    <x-app-logo :height="40" :width="80"></x-app-logo>
                </a>
            </div>
            <div class="uk-tab-center">
                <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#citizen_tabs_content', animation:'slide-horizontal'}">
                    <li class="uk-active" aria-expanded="true"><a>@lang('locale.certificate', ['prefix'=>__('locale.my'), 'suffix'=>'s'])</a></li>
                </ul>
            </div>
            <ul id="citizen_tabs_content" class="uk-switcher">
                <li aria-hidden="false" class="uk-active">
                    <div class="uk-margin">
                        <div class="dt_colVis_buttons uk-margin-top"></div>
                        <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
                            <thead>
                                <th>#</th>
                                <th>@lang('locale.created_at')</th>
                                <th>@lang('locale.expired_at')</th>
                                <th>@lang('locale.destination')</th>
                                <th>@lang('locale.department', ['prefix'=>'', 'suffix'=>''])</th>
                                <th>@lang('locale.city', ['prefix'=>app()->getLocale() == 'en' ? 'y' : '', 'suffix'=>''])</th>
                                <th>@lang('locale.district', ['prefix'=>'', 'suffix'=>''])</th>
                                <th>@lang('locale.area', ['prefix'=>'', 'suffix'=>''])</th>
                                <th>@lang('locale.paid')</th>
                            </thead>
                            <tfoot>
                                <th>#</th>
                                <th>@lang('locale.created_at')</th>
                                <th>@lang('locale.expired_at')</th>
                                <th>@lang('locale.destination')</th>
                                <th>@lang('locale.department', ['prefix'=>'', 'suffix'=>''])</th>
                                <th>@lang('locale.city', ['prefix'=>app()->getLocale() == 'en' ? 'y' : '', 'suffix'=>''])</th>
                                <th>@lang('locale.district', ['prefix'=>'', 'suffix'=>''])</th>
                                <th>@lang('locale.area', ['prefix'=>'', 'suffix'=>''])</th>
                                <th>@lang('locale.paid')</th>
                            </tfoot>
                            <tbody>
                                @foreach($certificates as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($item->expired_at)) }}</td>
                                    <td>{{ $item->destinator }}</td>
                                    <td>{{ $item->department->name }}</td>
                                    <td>{{ $item->city->name }}</td>
                                    <td>{{ $item->district->name }}</td>
                                    <td>{{ $item->area->name }}</td>
                                    <td>
                                        <div style="display: inline-block">
                                            <a class="" href="{{ route('certificates.show', $item->id) }}"><i class="material-icons md-color-teal-400">print</i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <x-slot name="others">
        <x-add-certificate :areas="$areas"></x-add-certificate>
    </x-slot>
    @push('scripts')
    <x-script-datatables></x-script-datatables>
    @endpush
</x-app-layout>
