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

        function filterByAuthor($books, $author){
            $filteredBooks = [];

            foreach ($books as $book){
                if ($book["author"] === $author){
                    // append filtered book to $filteredBooks array
                    $filteredBooks[] = $book;
                }
            }
            return $filteredBooks;
        }
    ?>

    <ul>
        <?php foreach (filterByAuthor($books, "Andy Weir") as $book) : ?>
        <li>
            <a href="<?= $book["purchaseUrl"] ?>">
                         <?= $book["name"]; ?> (<?= $book["releaseYear"] ?>) - By <?= $book["author"] ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>