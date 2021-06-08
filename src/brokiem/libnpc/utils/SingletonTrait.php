<?php

declare(strict_types=1);

namespace brokiem\libnpc\utils;

trait SingletonTrait {
    private static ?SingletonTrait $instance = null;

    public static function getInstance(): self {
        if (self::$instance === null) {
            self::$instance = self::make();
        }
        return self::$instance;
    }

    private static function make(): self {
        return new self;
    }
}