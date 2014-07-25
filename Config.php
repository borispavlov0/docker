<?php

/**
 * Config.php
 * Author: Boris Pavlov <borispavlov0 at gmail.com>
 * Date: 24-Jul-2014
 */

namespace Boris\Component\Docker;

/**
 * Description of Config
 */
class Config {
    
    
    public function __construct($params = array()) {
        if(!empty($params)){
            foreach($params as $key=>$value){
                $this->set($key, $value);
            }
        }
    }
    
    /**
     * 
     * @param string $var
     * @param mixed $value
     * @return \Boris\Component\Docker\Config
     * @throws \Boris\Component\Docker\Exception\UndefinedPropertyException
     */
    public function set($var, $value) {
        if(!property_exists(get_class($this), $var)){
            throw new \Boris\Component\Docker\Exception\UndefinedPropertyException("The property $var doesn't exist.");
        }
        $this->$var = $value;
        return $this;
    }    
    
    /**
     * 
     * @param string $var
     * @return mixed
     * @throws \Boris\Component\Docker\Exception\UndefinedPropertyException
     */
    public function get($var){
        if(!property_exists(get_class($this), $var)){
            throw new \Boris\Component\Docker\Exception\UndefinedPropertyException("The property $var doesn't exist.");
        }
        return $this->$var;
    }
}
