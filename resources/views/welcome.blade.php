@extends('layouts.app')
@section('styles')
    @parent
@endsection
@section('scripts')
    @parent
    <script src="{{asset('public/plugins/datamaps/d3.min.js')}}"></script>
    <script src="{{asset('public/plugins/datamaps/topojson.min.js')}}"></script>
    <script src="{{asset('public/plugins/datamaps/datamaps.world.min.js')}}"></script>
    <script src="{{asset('public/js/my.js')}}"></script>
    <script>
        var map = new Datamap({
		element: document.getElementById('container'),
		geographyConfig: {
			highlightBorderColor: '#bada55',
			popupTemplate: function(geography, data) { 
				$('path').click(function () {
				        url = $(this).attr('class'); 
			var res = url.split(" ");
					document.location.href = '/' + res[1] + '/' + geography.properties.name;
				});
				  return '<div class="hoverinfo">' + geography.properties.name + '</div>'
			},
			highlightBorderWidth: 3
		}
		});
    </script>
@endsection
@section('content')
    <div id="container"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 bodycon">

                <div class="panel-body main_body">
                    <div class="main_page">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-mama" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                                                      data-toggle="tab">Contitents</a></li>
                            <li role="presentation"><a href="#services" aria-controls="calculate" role="tab"
                                                       data-toggle="tab">Countries</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab"
                                                       data-toggle="tab">Cities</a></li>
                            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab"
                                                       data-toggle="tab">Travels</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                Continents

                            </div>
                            <div role="tabpanel" class="tab-pane" id="services">
                                Countries
                                <br style="clear: both;">
                                <div class="text">
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="profile">
                               Cities
                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages">
                               Travels
                            </div>
                        </div>
                    </div>
                </div>
                <h2 class="hdtext">Hottels near from here</h2>
                <div class="picblock">
                    Hottels
                </div>
            </div>
        </div>
    </div>

@endsection