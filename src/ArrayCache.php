<?php
/*
 * This file is part of the UniversalCache package.
 *
 * (c) Yo-An Lin <yoanlin93@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */


namespace UniversalCache;

class ArrayCache implements Cache
{
    private $_cache = array();

    public function get($key)
    {
        if (isset($this->_cache[ $key ])) {
            return $this->_cache[ $key ];
        }
    }

    public function set($key, $value, $ttl = 0)
    {
        $this->_cache[ $key ] = $value;
    }

    public function __set($key, $value)
    {
        $this->set($key, $value);
    }

    public function __get($key)
    {
        return $this->get($key);
    }

    public function remove($key)
    {
        unset($this->_cache[ $key ]);
    }

    public function clear()
    {
        $this->_cache = array();
    }

    public static function getInstance()
    {
        static $instance;

        return $instance ? $instance : $instance = new static();
    }
}
