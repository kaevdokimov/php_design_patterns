<?php

namespace factory_method;

interface Worker
{
    public function work();
}

class Developer implements Worker
{
    #[\Override] public function work(): string
    {
        return 'Developer work';
    }
}

class Designer implements Worker
{
    #[\Override] public function work(): string
    {
        return 'Designer work';
    }
}

interface WorkerFactory
{
    public static function make();
}

class DeveloperFactory implements WorkerFactory
{
    #[\Override] public static function make(): Developer
    {
        return new Developer();
    }
}

class DesignerFactory implements WorkerFactory
{
    #[\Override] public static function make(): Designer
    {
        return new Designer();
    }
}

$developer = DeveloperFactory::make();
$designer = DesignerFactory::make();

var_dump($developer->work());
var_dump($designer->work());
