<?php

namespace Mine;

use Mine\Annotation\CrudModelCollector;
use Mine\Annotation\DependProxyCollector;
use Mine\Command\MineGenServiceCommand;
use Mine\Listener\DependProxyListener;

class ServiceConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
            ],
            'commands' => [
                MineGenServiceCommand::class
            ],
            'listeners' => [
                DependProxyListener::class  =>  PHP_INT_MAX
            ],
            // 合并到  config/autoload/annotations.php 文件
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                    'collectors' => [
                        DependProxyCollector::class,
                        CrudModelCollector::class
                    ],
                ],
            ]
        ];
    }
}