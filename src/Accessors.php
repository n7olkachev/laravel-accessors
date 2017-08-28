<?php

namespace N7olkachev\LaravelAccessors;

trait Accessors
{
    public function __get($key)
    {
        return $this->callMutator('get', $key);
    }

    public function __set($key, $value)
    {
        return $this->callMutator('set', $key, $value);
    }

    protected function callMutator($type, $key, $value = null)
    {
        if (method_exists($this, $method = $this->getAccessorName($type, $key))) {
            return $this->$method($value);
        } else {
            throw new \Exception("Undefined property: $key");
        }
    }

    protected function getAccessorName($type, $key)
    {
        $key = str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $key)));

        return $type . $key . 'Attribute';
    }
}