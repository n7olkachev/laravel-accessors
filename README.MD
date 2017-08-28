# Laravel Accessors

<p align="center">
<a href="https://websecret.by"><img src="https://websecret.by/images/logo-github.png" /></a>
</p>

[![Code quality](https://img.shields.io/scrutinizer/g/n7olkachev/laravel-accessors.svg?style=flat-square)](https://scrutinizer-ci.com/g/n7olkachev/laravel-accessors/)
[![Licence](https://img.shields.io/packagist/l/n7olkachev/laravel-accessors.svg?style=flat-square)](https://packagist.org/packages/n7olkachev/laravel-accessors)
[![Build Status](https://travis-ci.org/n7olkachev/laravel-accessors.svg?branch=master)](https://travis-ci.org/n7olkachev/laravel-accessors)

This package gives you ability to use `getFooBarAttribute` and `setFooBarAttribute` methods in your classes with one trait.

## Examples

```php
class User
{
    use Accessors;
    
    protected $name;
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    public function getNameAttribute()
    {
        return $this->name;
    }
    
    public function setNameAttribute($name)
    {
        $this->name = $name;
    }
}

$user = new User('Nick');
echo $user->name; // calls getNameAttribute
$user->name = 'Not Nick' // calls setNameAttribute
```

## Instalation

```bash
$ composer require n7olkachev/laravel-accessors
```

In your class:
```php
class User {
    use Accessors;
}
```

## Testing

``` bash
$ composer test
```

## Credits

- [Nikita Tolkachev](https://github.com/n7olkachev)

## Sponsored by

https://websecret.by/

Web agency based in Minsk, Belarus

## License

The MIT License (MIT)
