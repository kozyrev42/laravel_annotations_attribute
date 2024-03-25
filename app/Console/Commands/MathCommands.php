<?php

namespace App\Console\Commands;

use App\Attributes\ConsoleCommand;

class MathCommands
{
    // регистрируем команду в консоли, с помощью атрибута
    #[ConsoleCommand(
        name: "calculate:factorial", 
        description: "Calculates the factorial of a given number",
        arguments: ["number"]
        // пример вызова: php artisan calculate:factorial 5
    )]
    public function factorial($number): int
    {
        $number = intval($number); // Преобразование в int для безопасности
        if ($number <= 1) {
            return 1;
        } else {
            return $number * $this->factorial($number - 1);
        }
    }
}
