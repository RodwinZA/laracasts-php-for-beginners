<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php
        $name = "Dark Matter";
        $read = false;
        $message = "";

        if ($read){
            $message = "You have read $name.";
        } else {
            $message = "You have NOT read $name.";
        }
    ?>
    <h1>
        <?php echo $message; ?>
    </h1>
</body>
</html>