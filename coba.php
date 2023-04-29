<!DOCTYPE html>
<html>
<head>
    <title>Contoh Mengambil Latitude dan Longitude</title>
    <script type="text/javascript">
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
<body onload="getLocation()">
    <h1>Data Lokasi</h1>
    <p id="latitude"></p>
    <p id="longitude"></p>
</body>
</html>
