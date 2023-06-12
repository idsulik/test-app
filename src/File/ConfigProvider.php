<?php

declare(strict_types=1);

namespace File;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
        ];
    }

    public function getDependencies(): array
    {
        return require __DIR__ . '/_etc/dependencies.php';
    }
}
