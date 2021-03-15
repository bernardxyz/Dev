<?php

namespace App\Enum\Common;

use App\Enum\Common\Enumerator;

abstract class BaseAssociativeEnum implements Enumerator
{
    /**
     * Item key
     *
     * @var string
     */
    protected $key;

    /**
     * Item key
     *
     * @var string
     */
    protected $value;

    /**
     * Supported items
     *
     * @var string[]
     */
    protected static $supported = [];

    /**
     * @param string $name
     * @throws \InvalidArgumentException if item in not supported
     */
    protected function __construct($name)
    {
        if (!is_string($name) && !is_numeric($name)) {
            throw new \InvalidArgumentException(sprintf('Type "%s" is not supported', gettype($name)));
        }

        $key = array_search($name, static::$supported);

        if (false === $key) {
            throw new \InvalidArgumentException(sprintf('Item "%s" is not supported', $name));
        }

        $this->key = $key;
        $this->value = static::$supported[$key];
    }

    /**
     * @param string $value
     * @return BaseAssociativeEnum
     */
    public static function fromString(string $value)
    {
        return self::create($value);
    }

    /**
     * Method is responsible for instatiation of class
     *
     * @param  string $value
     * @throws \InvalidArgumentException if item in not supported
     *
     * @return static
     */
    public static function create($value)
    {
        $name = array_search($value, static::$supported);

        if ($name !== false) {
            return new static($value);
        }

        throw new \InvalidArgumentException(sprintf('Item "%s" is not supported', $value));
    }

    public static function createFromKey($key)
    {
        if (!array_key_exists($key, static::$supported)) {
            throw new \InvalidArgumentException(sprintf('Key "%s" is not supported', $key));
        }

        return new static(self::getValueForKey($key));
    }

    public function __toString()
    {
        return $this->toString();
    }

    public function toString()
    {
        return (string)$this->key;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getValue()
    {
        return $this->value;
    }

    public static function getValueForKey($key)
    {
        if (!array_key_exists($key, static::$supported)) {
            throw new \InvalidArgumentException(sprintf('Key "%s" is not supported', $key));
        }

        return static::$supported[$key];
    }

    public static function getSupported()
    {
        return static::$supported;
    }

    /**
     * @param Enumerator $other
     * @return bool
     */
    public function sameValueAs(Enumerator $other): bool
    {
        return $this->toString() === $other->toString();
    }
}