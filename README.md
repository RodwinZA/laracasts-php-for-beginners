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