<?php

namespace static_factory;

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

class WorkerFactory
{
    public static function make(string $workerTitle): ?Worker
    {
        $ClassName = __NAMESPACE__.'\\'.ucfirst($workerTitle);
        if(class_exists($ClassName, true))
        {
            return new $ClassName();
        }
        return null;
    }
}

$developer = WorkerFactory::make('developer');
var_dump($developer);
var_dump($developer->work());

$designer = WorkerFactory::make('designer');
var_dump($designer->work());
