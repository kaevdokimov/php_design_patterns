<?php

namespace singlton;

final class Connection
{
    private static ?self $instance = null;
    private static string $name;

    public function __clone(): void
    {
        // TODO: Implement __clone() method.
    }

    public function __wakeup(): void
    {
        // TODO: Implement __wakeup() method.
    }

    public static function getInstance(): self
    {
        if(self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function getName(): string
    {
        return self::$name;
    }

    public static function setName(string $name): void
    {
        self::$name = $name;
    }
}

$connection = Connection::getInstance();
$connection::setName('MariaDB');

var_dump($connection::getName());
