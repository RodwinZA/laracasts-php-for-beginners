<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h1>Recommended Books</h1>

    <?php
        $books = [
                [
                        "name" => "Do Androids Dream of Electric Sheep",
                        "author" => "Philip K. Dick",
                        "releaseYear" => 1968,
                        "purchaseUrl" => "http://example.com"
                ],
                [
                        "name" => "Project Hail Mary",
                        "author" => "Andy Weir",
                        "releaseYear" => 2021,
                        "purchaseUrl" => "http://example.com"
                ],
                [
                    "name" => "The Martian",
                    "author" => "Andy Weir",
                    "releaseYear" => 2011,
                    "purchaseUrl" => "http://example.com"
                ],
        ];

        function filter($items, $fn){
            $filteredItems = [];

            foreach ($items as $item){
                if ($fn($item)){
                    // append filtered book to $filteredBooks array
                    $filteredItems[] = $item;
                }
            }
            return $filteredItems;
        }


        // swapping out array for array_filter does the exact same thing as array_filter is a built-in php function
        $filteredBooks = array_filter($books, function ($book){
           return $book["releaseYear"] >= 2000;
        });
    ?>

    <ul>
        <?php foreach ($filteredBooks as $book) : ?>
        <li>
            <a href="<?= $book["purchaseUrl"] ?>">
                         <?= $book["name"]; ?> (<?= $book["releaseYear"] ?>) - By <?= $book["author"] ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>