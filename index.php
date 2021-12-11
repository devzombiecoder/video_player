<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>video-stream</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: #fff;
        }

        body video {
            width: 700px;
        }
    </style>
</head>

<body>
    <video src="" id="video" controls></video>


    <script>
        var video = document.getElementById('video');

        var xhr = new XMLHttpRequest();
        xhr.open('GET', "stream.php", true);
        xhr.responseType = "arraybuffer";
        // xhr.responseType = "blob";

        xhr.onload = (e) => {
            var blob = new Blob([xhr.response], {type: 'video/*'});
            // console.log(blob);
            var url = URL.createObjectURL(blob);
            // console.log(url);
            video.setAttribute("src", url);
            video.onload = () => {
                // URL.revokeObjectURL(url);   to remove the  the url pointer 

            }


            // xhr.getResponseHeader('Header');

        }





        xhr.send();
        // var name = "sinners.mkv";
        // xhr.send("name=" + name);
    </script>
</body>

</html>