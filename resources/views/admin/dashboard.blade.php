<x-app-layout>
    @push('links')
        <link rel="stylesheet" href="{{ asset('bower_components/weather-icons/css/weather-icons.min.css') }}" media="all">
        <link rel="stylesheet" href="{{ asset('bower_components/metrics-graphics/dist/metricsgraphics.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/chartist/dist/chartist.min.css') }}">
    @endpush

    <!-- statistics (small charts) -->
    <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
        @foreach ($departments as $item)
        <div>
            <div class="md-card card-left-green">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="material-icons md-36 uk-text-success">location_city</span></div>
                    <span class="uk-text-muted uk-text-small">{{ $item->name }}</span>
                    <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript>{{ $item->certificates()->count() }}</noscript></span></h2>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- large chart -->
    <div class="uk-grid">
        <div class="uk-width-1-1">
            <div class="md-card card-bottom-green card-top-green">
                <div class="md-card-toolbar">
                    <div class="md-card-toolbar-actions">
                        <i class="md-icon material-icons md-card-fullscreen-activate">&#xE5D0;</i>
                    </div>
                    <h3 class="md-card-toolbar-heading-text">@lang('locale.chart', ['prefix'=>__('locale.the')])</h3>
                </div>
                <div class="md-card-content">
                    <div class="mGraph-wrapper">
                        <div id="ct-chart" class="chartist mGraph"></div>
                    </div>
                    <div class="md-card-fullscreen-content">
                        <div class="uk-overflow-container">
                            <table class="uk-table uk-table-condensed uk-table-striped uk-table-hover uk-text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('locale.department', ['suffix'=>'', 'prefix'=>''])</th>
                                        <th>@lang('locale.certificate', ['suffix'=>'s', 'prefix'=>''])</th>
                                        <th>%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->certificates()->count() }}</td>
                                        <td>
                                            <div class="uk-progress uk-progress-mini uk-progress-primary uk-margin-remove">
                                                <div class="uk-progress-bar" style="width: 40%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <!-- d3 -->
    <script src="{{ asset('bower_components/d3/d3.min.js') }}"></script>
    <script src="{{ asset('bower_components/metrics-graphics/dist/metricsgraphics.min.js') }}"></script>
    <script src="{{ asset('bower_components/chartist/dist/chartist.min.js') }}"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="{{ asset('bower_components/maplace-js/dist/maplace.min.js') }}"></script>
    <script src="{{ asset('bower_components/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('bower_components/countUp.js/countUp.min.js') }}"></script>
    <script src="{{ asset('bower_components/handlebars/handlebars.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/handlebars_helpers.min.js') }}"></script>
    <script src="{{ asset('bower_components/clndr/src/clndr.js') }}"></script>
    <script src="{{ asset('bower_components/fitvids/jquery.fitvids.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.min.js') }}"></script>

    <script>
        $(function() {
            altair_helpers.retina_images();
            if(Modernizr.touch) { FastClick.attach(document.body); }
        });
    </script>
    @endpush
</x-app-layout>
