<?php

declare(strict_types=1);

namespace Application;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\AbstractFactory\ReflectionBasedAbstractFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'redis.create' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/create',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'update',
                    ],
                ],
            ],
            'redis.update' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/update',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'update',
                    ],
                ],
            ],
            'redis.delete' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/delete',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'delete',
                    ],
                ],
            ],
            'application' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => ReflectionBasedAbstractFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
