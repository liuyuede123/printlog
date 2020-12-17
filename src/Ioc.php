<?php


namespace Liuyuede123\Printlog;


class Ioc
{
    // 别名 类的关系
    private $bindings = [];

    public function bind($alias, $concrete)
    {
        $this->bindings[$alias]['concrete'] = function ($ioc) use ($concrete) {
            return $ioc->build($concrete);
        };
    }

    public function build($concrete)
    {
        $reflector = new \ReflectionClass($concrete);

        $constructor = $reflector->getConstructor();

        if (is_null($constructor)) {
            return $reflector->newInstance();
        } else {
            $parameters = $constructor->getParameters();
            $instances = $this->getDependencies($parameters);
            return $reflector->newInstanceArgs($instances);
        }
    }

    public function getDependencies($parameters)
    {
        $dependencies = [];
        foreach ($parameters as $parameter) {
            $dependencies[] = $this->make($parameter->name);
        }
        return $dependencies;
    }

    public function make($alias)
    {
        $concrete = $this->bindings[$alias]['concrete'];
        return $concrete($this);
    }
}