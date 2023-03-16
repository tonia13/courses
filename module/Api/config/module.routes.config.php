<?php

namespace Api;

use Api\Controller\CoursesController;
use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Method;
use Laminas\Router\Http\Segment;

$routes = [
    'api' => [
        'type' => Literal::class,
        'options' => [
            'route' => '/api',
        
        ],
        'may_terminate' => false,
        'child_routes' => [
        'courses' => [
            'type' => Literal::class,
            'options' => [
                'route' => '/courses',
            ],
            'may_terminate' => false,
            'child_routes' => [
                'post' => [
                    'type' => Method::class,
                    'options' => [
                        'verb' => 'post',
                        'defaults' => [
                            'controller' => CoursesController::class,
                            'action' => 'create',
                        ]
                    ],
                    'may_terminate' => true
                ],
                'get' => [
                    'type' => Method::class,
                    'options' => [
                        'verb' => 'get',
                        'defaults' => [
                            'controller' => CoursesController::class,
                            'action' => 'getList',
                        ]
                    ],
                    'may_terminate' => true
                ],
            ]
            ],
            'course' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/courses/[:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ]
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'put' => [
                        'type' => Method::class,
                        'options' => [
                            'verb' => 'put',
                            'defaults' => [
                                'controller' => CoursesController::class,
                                'action' => 'update',
                            ]
                        ],
                        'may_terminate' => true
                    ],
                    'delete' => [
                        'type' => Method::class,
                        'options' => [
                            'verb' => 'delete',
                            'defaults' => [
                                'controller' => CoursesController::class,
                                'action' => 'delete',
                            ]
                        ],
                        'may_terminate' => true
                    ],
                    'get' => [
                        'type' => Method::class,
                        'options' => [
                            'verb' => 'get',
                            'defaults' => [
                                'controller' => CoursesController::class,
                                'action' => 'getCourse',
                            ]
                        ],
                        'may_terminate' => true
                    ],
                ]
            ]
        ]
    ]
];

return ['routes' => $routes];
