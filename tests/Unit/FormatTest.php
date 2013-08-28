<?php

use Gwilym\Url;

class FormatTest extends PHPUnit_Framework_TestCase
{
    public function testPath()
    {
        $path = '/foo/bar.baz';
        $object = new Url();
        $object->path = $path;
        $this->assertSame($path, Url::format($object));
    }

    public function testScheme()
    {
        $object = new Url();
        $object->scheme = 'http';
        $this->assertSame('http://', Url::format($object));
    }

    public function testUser()
    {
        $object = new Url();
        $object->user = 'user';
        $this->assertSame('user@', Url::format($object));
    }

    public function testUserPass()
    {
        $object = new Url();
        $object->user = 'user';
        $object->pass = 'pass';
        $this->assertSame('user:pass@', Url::format($object));
    }

    public function testHost()
    {
        $object = new Url();
        $object->host = 'example.com';
        $this->assertSame('example.com', Url::format($object));
    }

    public function testPort()
    {
        $object = new Url();
        $object->port = 123;
        $this->assertSame(':123', Url::format($object));
    }

    public function testQuery()
    {
        $object = new Url();
        $object->query = 'foo=bar';
        $this->assertSame('?foo=bar', Url::format($object));
    }

    public function testFragment()
    {
        $object = new Url();
        $object->fragment = 'example';
        $this->assertSame('#example', Url::format($object));
    }

    public function testFull()
    {
        $object = new Url();
        $object->scheme = 'http';
        $object->user = 'user';
        $object->pass = 'pass';
        $object->host = 'example.com';
        $object->port = '123';
        $object->path = '/foo/bar';
        $object->query = 'foo=bar';
        $object->fragment = 'example';
        $this->assertSame('http://user:pass@example.com:123/foo/bar?foo=bar#example', Url::format($object));
    }
}
