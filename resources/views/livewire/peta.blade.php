<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Peta Potensi') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                {{-- map1 --}}
                                <div id="map" style="width: 1050px; height: 600px;" wire:ignore></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts1')
    <script src="https://maps.googleapis.com/maps/api/js?libraries=drawing&key=AIzaSyAbXF62gVyhJOVkRiTHcVp_BkjPYDQfH5w"></script>
    <script>
    document.addEventListener('livewire:load', () => {
        // Initialize map
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -8.4811566, lng: 117.3968992},
            zoom: 13,
            mapTypeId: 'satellite'
        });

        // Initialize drawing manager
        var drawingManager = new google.maps.drawing.DrawingManager({
            drawingMode: google.maps.drawing.OverlayType.POLYGON,
            drawingControl: true,
            drawingControlOptions: {
                position: google.maps.ControlPosition.TOP_LEFT,
                drawingModes: ['polygon']
            },
            polygonOptions: {
                fillColor: getRandomColor(),
                fillOpacity: 0.8,
                strokeWeight: 2,
                strokeColor: '#000',
                clickable: true,
                editable: true,
                zIndex: 1
            }
        });

        drawingManager.setMap(map);

        // Function to get random color
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        // Load client markers from database
        var clients = {!! json_encode($clients->toArray()) !!};
        clients.forEach(function(client) {
            var marker = new google.maps.Marker({
                position: {lat: parseFloat(client.lat), lng: parseFloat(client.long)},
                map: map,
                title: client.nama
            });

            var infoWindow = new google.maps.InfoWindow({
                content: `
                    <b>Nama</b>: ${client.nama}<br>
                    <b>Alamat</b>: ${client.alamat}<br>
                    <b>Jenis Jaringan</b>: ${client.jenis_jaringan}<br>
                    <b>Kecepatan Jaringan</b>: ${client.kecepatan_jaringan} Mbps<br>
                    <b>No. Telepon</b>: ${client.no_tlpn}
                `
            });

            marker.addListener('click', function() {
                infoWindow.open(map, marker);
            });
        });

       
    });
</script>


    @endpush
</div>
