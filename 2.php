<!DOCTYPE html>
<html>

<body>
    <p>Click the button to get Location.</p>
      <p>Try with and without providing a permission to access your location. </p>
    <button type="button" onclick="getLocation()">Share my Location</button>
    <pre id="json-result"></pre>
    <script>
    var result = document.getElementById("json-result");
    const Http = new XMLHttpRequest();
    function getLocation() {
        console.log("getLocation Called");
        var bdcApi = "https://api.bigdatacloud.net/data/reverse-geocode-client"

        navigator.geolocation.getCurrentPosition(
            (position) => {
                bdcApi = bdcApi
                    + "?latitude=" + position.coords.latitude
                    + "&longitude=" + position.coords.longitude
                    + "&localityLanguage=vn";
                getApi(bdcApi);

            },
            (err) => { getApi(bdcApi); },
            {
                enableHighAccuracy: true,
                timeout: 5000,
                maximumAge: 0
            });
    }
    function getApi(bdcApi) {
        Http.open("GET", bdcApi);
        Http.send();
        Http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                result.innerHTML = this.responseText;
            }
        };
    }
</script>
</body>
</html>

