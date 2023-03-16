<?php
/**
 * This is the configuration in which you put your factories needed for your controllers.
 */
namespace Api\Controller;

use Api\Controller\Factory\CoursesControllerFactory;

return [
    'factories' => [
        CoursesController::class => CoursesControllerFactory::class
    ]
];