<?php

namespace Api\Controller\Factory;

use Api\Controller\CoursesController;
use Application\Service\CoursesService;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class CoursesControllerFactory implements FactoryInterface
{
    /**
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
    
        return new CoursesController(
             $container->get(CoursesService::class)
        );
    }
}
