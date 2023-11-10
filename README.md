# php-module

## Definitions
```php
// create container
$container = new Container();

// bind and define with class name 
$container->set(Database::class);

// define with class name and bind with contract class
$container->set(CartContract::class, Cart::class);

// define with function and bind with contract class
$container->set(CommerceContract::class, function () {
    return new Commerce();
});

$db = $container->get(Database::class)
```

## Values
```php
$container->set('db.host', 'localhost');
$container->set('db.port', 5432);
$container->set('db.user', 'root');
$container->set('db.pass', 'pass');

$container->set(Database::class, function () {
    return new Database(
        $container->get('db.host'),
        $container->get('db.port'),
        $container->get('db.user'),
        $container->get('db.pass'),
    )
});
```


## Singleton
```php
// singaton definitions
$container->singleton(Logger::class);

$a = $container->get(Logger::class);
$b = $container->get(Logger::class);

// $a === $b
```

## Factory
```php
$container->set(Product::class);

$a = $container->get(Product::class);
$b = $container->get(Product::class);

// $a != $b
```

## Auto Injection
```php
class Database {
}

class ProductRepo {
    public function construct(private Database $db) {
    }
}

$container->set(Database::class);
$container->set(ProductRepo::class); // auto autowired
```

## Autowired
```php
$container->set(Logger::class);

// auto inject during define function
$container->set(Database::class, function (Logger $logger) {
    return new Database($logger);
});
```

## Call
```php
$container->set(Database::class);

$findUserById = function (Database $db, int $id): User {
    return new User($db->row('user', ['id' => $id]));
}

$user = $container->call($findUserById, ['id' => 3]);
```

## Define
```php
tbc
```