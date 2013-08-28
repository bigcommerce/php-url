<?php

use Gwilym\Url;

class ParseTest extends PHPUnit_Framework_TestCase
{
    public function testFilesystemPath()
    {
        $string = '/foo/bar.baz';
        $object = Url::parse($string);
        $this->assertSame($string, $object->path);
    }

    public function testScheme()
    {
        $string = 'http://example.com';
        $object = Url::parse($string);
        $this->assertSame('http', $object->scheme);
    }

    public function testHost()
    {
        $string = 'http://example.com';
        $object = Url::parse($string);
        $this->assertSame('example.com', $object->host);
    }

    // additional tests here may hold little value since this is mostly powered
    // by PHP's parse_url core functionality
}
