<!-- <!DOCTYPE html>
<html>
<head>
    <title>Contoh Mengambil Latitude dan Longitude</title>
    <script type="text/javascript">
        window.onload = function() {
            getLocation();
        };

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            }
        }

        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            document.getElementById("latitude").innerText = "Latitude: " + latitude;
            document.getElementById("longitude").innerText = "Longitude: " + longitude;
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("Anda Harus Mengijinkan Geo Location untuk mengisi form");
                    location.reload();
                    break;
            }
        }
    </script>
</head>
<body>
    <!-- Modal Form Anda -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" class ="myForm" enctype="multipart/form-data">
            <div class="modal-body">
                <input type="text" id="latitude" name="latitude" placeholder="latitude" class="form-control"><br>
                <input type="text" id="longitude" name="longitude" placeholder="longitude" class="form-control"><br>
                <p>Coba muncul</p>
                <p id="latitude"></p>
                <p id="longitude"></p>
                <button type="submit" class="btn btn-primary" name="addnew">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        
        </div>
    </div>
    </div>
    </form>
</body>
</html> -->
<!DOCTYPE html>
<html>
<head>
    <title>Contoh Mengambil Latitude dan Longitude</title>
    <script type="text/javascript">
        window.onload = function() {
            getLocation();
        };

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            }
        }

        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            document.getElementById("latitudeInput").value = latitude;
            document.getElementById("longitudeInput").value = longitude;
            document.getElementById("latitudeOutput").innerText = "Latitude: " + latitude;
            document.getElementById("longitudeOutput").innerText = "Longitude: " + longitude;
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("Anda Harus Mengijinkan Geo Location untuk mengisi form");
                    break;
                default:
                    alert("Gagal mengambil lokasi: " + error.message);
                    break;
            }
        }
    </script>
</head>
<body>
    <!-- Modal Form Anda -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" class="myForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="text" id="latitudeInput" name="latitude" placeholder="latitude" class="form-control"><br>
                        <input type="text" id="longitudeInput" name="longitude" placeholder="longitude" class="form-control"><br>
                        <p>Coba muncul:</p>
                        <p id="latitudeOutput"></p>
                        <p id="longitudeOutput"></p>
                        <button type="submit" class="btn btn-primary" name="addnew">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

