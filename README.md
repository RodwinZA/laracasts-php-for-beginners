# LaraCasts PHP For Beginners

## Starting PHP Server
`php -S localhost:[portnumber]`

## The Fundamentals

### 1. Your First PHP Tag

PHP needs an index file to use as source. This could be `index.php` or `index.html`. An HTML file will render static
content but as soon as you have a php file you can now work dynamically, with e.g. strings:

```php
</head>
<body>
    <h1>
        <?php echo "Hello World"?>
    </h1>
</body>

```

### 2. Variables

Variables are 'containers' in which values are stored for later reference. Variables
in PHP are prefixed with the dollar sign `$`. The types that can be stored are strings,
numbers, booleans, objects and arrays.

When referencing strings, using the double quotation will evaluate the string and output
its value whereas using single quotes will output the variable name, e.g:

```php
</head>
<body>
        <?php
            $greeting = "Hola";
            echo "$greeting World";
            // output: Hola World
        ?>
        
        <?php
            $greeting = "Hola";
            echo '$greeting World';
            // output: $greeting World
        ?>

</body>
```

### 3. Conditionals & Booleans

We can display dynamic content to users based on conditionals using booleans. E.g. whether
something is switched on or off; an answer is yes or no, etc. We use the keywords `true`
or `false` to achieve this.

In the below example we 'ask' the user if they read the book 'Dark Matter' or not and base
our program output on the resulting answer.

The variable `$read`'s value will determine the `$message` displayed. In this case the user
has NOT read the book.

```php
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
```

There is a shorthand method to `echo` a value. Instead of
```php
<?php echo "Hello world" ?>
```

we can use
```php
<?= "Hello world" ?>
```
and get the same result.


### 4. Arrays

Arrays are items stored together as a collection, you can have a collection of names, students,
books.. literally anything that we can group together in real life can be represented using arrays.

Below we have an example of a list of books that we iterate through using a `foreach` loop. There are
more ways to loop through items that will get covered later.

```php
<body>
    <h1>Recommended Books</h1>

    <?php
        $books = [
            "Do Androids Dream of Electric Sheep",
            "The Langoliers",
            "Hail Mary",
        ];
    ?>

    <ul>
        <?php foreach ($books as $book) : ?>
        <li>
            <?= $book ?>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
```

### 5. Associative Arrays

Associative arrays are arrays where you have key-value pairs. Instead
of identifying an item in an array by its position we now use a key
to do it.

Below is an example of an associative array.

```php
<body>
    <h1>Recommended Books</h1>

    <?php
        $books = [
                    [
                        "name" => "Do Androids Dream of Electric Sheep",
                        "author" => "Philip K. Dick",
                        "purchaseUrl" => "http://example.com"
                    ],
                    [
                        "name" => "Project Hail Mary",
                        "author" => "Andy Weir",
                        "purchaseUrl" => "http://example.com"
                    ],
        ];

    ?>

    <ul>
        <?php foreach ($books as $book) : ?>
        <li>
            <a href="<?= $book["purchaseUrl"] ?>">
                <?= $book["name"]; ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
```

### 6. Functions and Filters

Functions are used to isolate and abstract sometimes complicated logic.
They are declared with said logic and gets referenced as soon as we 'call' it
inside our code.

The next example shows how to create a filter function for a list of books. This function is restrictive as it 
only shows how to filter by author, but this will be remedied later on.

```php
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
```

### 7. Lambda Functions

```php
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
```

### 8. Separate Logic from Templates

Separating views from logic is important as this will increase readability
of code as well as minimise 'clutter' as your codebase grows.

We can split the php code as follows, `index.php` which is linked
to `index.views.php` where the view file will have your markup. The view file needs to be imported
to the logic file and that can be achieved by placing `require "index.views.php` at
the end of our `index.php` file.

--- 

## Dynamic Web Applications

### 1. Page Links

PHP defers to the default index when it cannot locate a given url parameter.

### 2. PHP Partials

We create smaller 'snippets' of our code and arrange them into partials. This prevents code duplication inside our markup, e.g.
our navigation will look the same across all our pages, so we can do the following:

Create a `partials` folder. Inside of that folder create a `nav.php` file which will hold all of our shared markup. This partial
can then be referenced inside our view by simply requiring it, e.g. `require "views/partials/nav.php`.

### 3. Superglobals and Current Page

TIP: An easier way to probe `var_dump` and `die()` is to place it inside a function, e.g.
```php
function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}
```
and to just substitute the `$value` with the superglobal needed.

We can also create a `functions.php` file in order to minimise code duplication and store all common functions in.

### 4. Make a PHP Router

### 5. Create a MYSQL Database

If using homebrew for installations you need to start mysql first
by running `brew services start mysql` in the terminal.

In the terminal create a database by typing `mysql -uroot` and then
`create database [database-name]`.

### 6. PDO First Steps

To connect to a MySQL database we create a new instance of the PDO class and pass it the data source name
parameter. The data source name (`$dsn`) contains our db connection details.

```php
$dsn = "mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4;user=root";
$pdo = new PDO($dsn);
```

Once connected we then prepare a query as below. The query will select everything inside our posts' database.

```php
$statement = $pdo->prepare(select * from posts);
$statement->execute();
```

After our query is prepared we can fetch the results, as an associative array and
store it inside a variable.
```php
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
```

After fetching the data it is now ready to be displayed and can be done as key/pair.

### 7. Extract a PHP Database Class

Our database connection code can be improved by creating a class and moving it into
its own file. We pass a `$query` parameter in order to make it more flexible when fetching
results.

```php
class Database {
    public $connection;
    
    public  function __construct(){
        $dsn = "mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4;user=root";
        $this->connection = new PDO($dsn);
    }
    public function query($query){

        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement;
    }
}
```

We can now simply require the connection inside our index.php file,
create a new instance of the db and query.

```php
require "Database.php";

$db = new Database();
$post = $db->query("select * from posts where id = 1")->fetch(PDO::FETCH_ASSOC);
$posts = $db-> query("select * from posts")->fetchAll(PDO::FETCH_ASSOC);
```

### 8. Environments and Configuration Flexibility

We can make our codebase more flexible by creating a configuration file for our environment that is easily
adjustable. Example in code.

### 9. SQL Injection Vulnerabilities

As software developers we should always assume that our users will try something malicious.
When accepting user input through a query string or a form, never inline it as part of a sql query.

Don't do this:
```php
$id = $_GET['id'];
$posts = $db-> query("select * from posts where id = {$id}")->fetch();
```

Instead, leverage prepared statements with bound parameters like this;
```php

$id = $_GET['id'];
$posts = $db-> query("select * from posts where id = ?", [$id])->fetch();
```