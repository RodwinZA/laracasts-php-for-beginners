# LaraCasts PHP For Beginners

## Starting PHP Server
`php -S localhost[portnumber]`

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