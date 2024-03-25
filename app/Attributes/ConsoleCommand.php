<?php

namespace App\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class ConsoleCommand
{
    public function __construct(
        public string $name,
        public string $description = '',
        public array $arguments = []
    ) {
    }
}
