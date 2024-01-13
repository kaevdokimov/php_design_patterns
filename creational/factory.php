<?php

namespace factory;

class Work
{
    private string $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

}

class WorkFactory
{
    public static function make(): Work
    {
        return new Work();
    }
}

$work = WorkFactory::make();
$work->setName('Programming');
var_dump($work->getName());
