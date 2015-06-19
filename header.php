<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Webonise</title>
    <title>Live Cropping Demo</title>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <script src="js/jquery.min.js"></script>
    <script src="js/Jcrop.js"></script>
    <script src="js/ckeditor/ckeditor.js"></script>
    <script src="js/ckeditor/adapters/jquery.js"></script>
    <link rel="stylesheet" href="css/main.css" type="text/css" />
    <link rel="stylesheet" href="css/demos.css" type="text/css" />
    <link rel="stylesheet" href="css/custom.css" type="text/css" />
    <link rel="stylesheet" href="css/Jcrop.css" type="text/css" />

    <script type="text/javascript">

        $(function(){

            $('#cropbox').Jcrop({
                aspectRatio: 1,
                onSelect: updateCoords
            });

        });

        function updateCoords(c)
        {
            $('#x').val(c.x);
            $('#y').val(c.y);
            $('#w').val(c.w);
            $('#h').val(c.h);
        };

        function checkCoords()
        {
            if (parseInt($('#w').val())) return true;
            alert('Please select a crop region then press submit.');
            return false;
        };

    </script>
    <style type="text/css">
        table{
            width:600px;
            margin:0 auto;

        }
        #target {
            background-color: #ccc;
            width: 500px;
            height: 330px;
            font-size: 24px;
            display: block;
        }
    </style>

</head>
<body>