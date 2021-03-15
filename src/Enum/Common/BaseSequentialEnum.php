<?php

namespace App\Enum\Common;

use InvalidArgumentException;

/**
 * Example of usage
 *
 * <code>echo SomeEnumClass::create('dog')</code>
 * <output>dog</output>
 */
abstract class BaseSequentialEnum implements Enumerator
{
    /**
     * Name of item
     *
     * @var string
     */
    protected $name;

    /**
     * @param string $name
     * @throws \InvalidArgumentException if item in not supported
     */
    protected function __construct($name)
    {
        if (!is_string($name)) {
            throw new InvalidArgumentException(sprintf('Type "%s" is not supported %s', gettype($name), get_called_class()), 400);
        }

        if (false === in_array(strtolower($name), array_map('strtolower', static::$supported))) {
            throw new InvalidArgumentException(sprintf('Item "%s" is not supported for %s', $name, get_called_class()), 400);
        }

        $this->name = $name;
    }

    /**
     * @param string $value
     * @return static
     */
    public static function fromString($value)
    {
        return self::create($value);
    }

    public static function getFormCollection()
    {
        return array_flip(static::$supported);
    }

    public static function getFilterCollection()
    {
        return static::$supported;
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
        if (!is_string($value)) {
            throw new InvalidArgumentException(sprintf('Type "%s" is not supported for %s', gettype($value), get_called_class()), 400);
        }

        if (false === in_array(strtolower($value), array_map('strtolower', static::$supported))) {
            throw new InvalidArgumentException(sprintf('Item "%s" is not supported for %s', $value, get_called_class()), 400);
        }

        return new static($value);
    }

    public function __toString()
    {
        return $this->toString();
    }

    public function toString()
    {
        return $this->name;
    }

    public function jsonSerialize()
    {
        return $this->__toString();
    }
    
    public static function getSupported()
    {
        return static::$supported;
    }

    public static function getSupportedCollection()
    {
        return array_values(self::getSupported());
    }
    
    public static function isSupported($name)
    {
        if(in_array($name, static::$supported)){
            return true;
        }
        return false;
    }

    public static function getById($id, $fallback = null)
    {
        $supported = static::$supported;
        if(isset($supported[$id])){
            return static::$supported[$id];
        }
        return $fallback;
    }

    /**
     * @param Enumerator $other
     * @return bool
     */
    public function sameValueAs(Enumerator $other)
    {
        return $this->toString() === $other->toString();
    }

    public static function getIdByValue($value)
    {
        $flip = array_flip(static::$supported);

        if(isset($flip[$value])){
            return $flip[$value];
        }
    }

    public static function getFilters()
    {
        $ret = [];
        foreach (static::$supported as $key => $value){
            $ret[] = [
                'id' => $key,
                'value' => $value
            ];
        }
        return $ret;
    }
}
