<?php

namespace Gwilym;

/**
 * Value object representing a URL.
 */
class Url
{
    /**
     * A list of components used in URL parsing / formatting.
     *
     * @var array
     */
    protected static $parts = array(
        'scheme',
        'user',
        'pass',
        'host',
        'port',
        'path',
        'query',
        'fragment',
    );

    /**
     * Url factory, parsing $url stringa and returning a Url instance.
     *
     * On seriously malformed URLs, this may return FALSE (see
     * http://php.net/parse_url). Most any string is treated as a valid
     * URL though.
     *
     * @param  string $url
     * @return Url
     */
    public static function parse ($url)
    {
        $parsed = parse_url($url);
        if ($parsed === false) {
            return false;
        }

        $object = new Url();
        foreach (self::$parts as $part) {
            if (array_key_exists($part, $parsed)) {
                $object->$part = $parsed[$part];
            }
        }

        return $object;
    }

    /**
     * Format a URL string from an instance of Url.
     *
     * @param  Gwilym\Url $url
     * @return string
     */
    public static function format (Url $url)
    {
        if ($url->scheme) {
            $string = $url->scheme . '://';
        } else {
            $string = '';
        }

        if ($url->user) {
            $string .= $url->user;
            if ($url->pass) {
                $string .= ':' . $url->pass;
            }
            $string .= '@';
        }

        if ($url->host) {
            $string .= $url->host;
        }

        if ($url->port) {
            $string .= ':' . $url->port;
        }

        if ($url->path) {
            $string .= $url->path;
        }

        if ($url->query) {
            $string .= '?' . $url->query;
        }

        if ($url->fragment) {
            $string .= '#' . $url->fragment;
        }

        return $string;
    }

    /**
     * @var string
     */
    public $scheme;

    /**
     * @var string
     */
    public $user;

    /**
     * @var string
     */
    public $pass;

    /**
     * @var string
     */
    public $host;

    /**
     * @var string
     */
    public $port;

    /**
     * @var string
     */
    public $path;

    /**
     * @var string
     */
    public $query;

    /**
     * @var string
     */
    public $fragment;
}
