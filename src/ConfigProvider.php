<?php


namespace hyperf\Pro\LogHelper;



class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'publish' => [
                [
                    'id' => 'hyperf-pro/log-helper',
                    'description' => 'logger-config',
                    'source' => __DIR__ . '/../publish/logger.php',
                    'destination' => BASE_PATH . '/config/autoload/logger.php',
                ],
            ],
        ];
    }
}