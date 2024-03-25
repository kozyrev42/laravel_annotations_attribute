<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;
use ReflectionClass;

class ConsoleCommandServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerConsoleCommands();
        }
    }

    protected function registerConsoleCommands()
    {
        $commandsClasses = [
            \App\Console\Commands\MathCommands::class,
            // Добавьте сюда другие классы с командами
        ];

        foreach ($commandsClasses as $class) {
            $reflectionClass = new ReflectionClass($class);
            foreach ($reflectionClass->getMethods() as $method) {
                foreach ($method->getAttributes(\App\Attributes\ConsoleCommand::class) as $attribute) {
                    $commandData = $attribute->newInstance();
                    $signature = $commandData->name . ' {number}';
                    Artisan::command($signature, function ($number) use ($method, $class) {
                        $instance = resolve($class);
                        // Преобразуем аргумент в требуемый тип, если необходимо
                        $result = $method->invoke($instance, intval($number));
                        $this->info($result);
                    })->describe($commandData->description);
                }
            }
        }
    }
}
