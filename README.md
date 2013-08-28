# gwilym/url

Value object representing a URL. Makes parsing, formatting and handing around
URLs in a PHP app somewhat cleaner in some situations.

Couldn't think of a clever vendor name, so I used my own odd one.

## Installation

Use composer to bring it into your project, then follow the usage examples.

## Usage

It's intended to very simply wrap the components of a URL:

```php
$string = 'http://example.com';
$object = Gwilym\Url::parse($string);
$string = Gwilym\Url::format($object);
```

Additionally:

```php
$object = Gwilym\Url::parse('http://example.com');
echo $object->host; // example.com
```
