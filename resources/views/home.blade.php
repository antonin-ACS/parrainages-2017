@extends('layouts.app')
@section('content')
    <form>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-10" style="padding-right:0;">
                    <input type="search" class="form-control input-lg" id="query" placeholder="Parrains, communes, régions, départements">
                </div>
                <div class="col-xs-1" style="padding-left:4px;">
                    <button type="submit" class="btn btn-default btn-lg btn-success"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </form>
    <hr />
    <div>
        <select id="candidatSelect" class="form-control input-lg">
            <option class="candidat" disabled="disabled">Choisissez un candidat</option>
            @foreach ($candidats as $candidat)
                <option class="candidat" data-id="{{$candidat->id}}" value="">{{$candidat->nom}} {{$candidat->prenom}} (xx parrains)</option>
            @endforeach
        </select>
        <script type="text/javascript">
            $(function() {
                $("#candidatSelect").on("click",function(e) {
                    console.log($(e.target));
                    if($(e.target).hasClass("candidat")) {
                        window.location.href = "/candidat/"+$(e.target).attr("data-id");
                    }
                });

            })
        </script>
    </div>
    <hr />
    <div id="mapid" style="width:100%;height:60vh;border:5px solid #eee;"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
    <script>
        /*affichage de la map et définition du point d'arrivée sur la carte*/
        var mymap = L.map('mapid').setView([47.221299, 5.967714], 15);
        /*type de "tiles" pour la map, on peut en changer (skin)*/  L.tileLayer('https://api.mapbox.com/styles/v1/benoitm/ciy5sprke005d2rpb6dxry2ah/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYmVub2l0bSIsImEiOiJjaXk1c24ycGYwMDJwMzNyamhmaXc2dTNnIn0.065FxCTP4WiqVfnlubCMmA', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
            '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="http://mapbox.com">Mapbox</a>',
        id: 'mapbox.streets'
        }).addTo(mymap);

        var marker = L.marker([47.221299, 5.967714]).addTo(mymap);
        marker.bindPopup("<b>CAEM Besançon</b><br>13 A avenue Ile-de-France<br>25000 Besançon").openPopup();
    </script>
@endsection