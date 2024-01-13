<?php

namespace prototype;

abstract class WorkerPrototype
{
    protected string $name;
    protected string $position;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function setPosition(string $position): void
    {
        $this->position = $position;
    }

    public function __toString(): string
    {
        return get_called_class() . PHP_EOL .
            'Name: ' . $this->name . PHP_EOL .
            'Position: ' . $this->position . PHP_EOL . PHP_EOL;

    }
}

class Developer extends WorkerPrototype
{
    protected string $position = 'Developer';
}

class Designer extends WorkerPrototype
{
    protected string $position = 'Designer';
}

$developer = new Developer();
$developer->setName('Alexander');

$designer = new Designer();
$designer->setName('Maria');

echo $developer;
echo $designer;
