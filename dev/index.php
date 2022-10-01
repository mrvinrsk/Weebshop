<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toast Test</title>

    <link rel="stylesheet" href="../style/css/global.min.css">

    <script src="../js/toast.js"></script>
</head>
<body>

<button onclick="toast({ debug: true, unsafe: true, autoClose: { enabled: true, showProgress: false, delay: 3000, autoAdjust: { enabled: false } }, closeButton: true , content: 'Wie komme ich eigentlich immer darauf, dass es eine gute Idee wäre meine JS-Dinger so überkomplex zu programmieren?...'});">Toast!</button>

</body>
</html>