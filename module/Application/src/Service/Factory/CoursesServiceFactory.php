<?php

namespace Application\Service\Factory;

use Application\Service\CoursesService;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Propel\CoursesQuery;
use Propel\Courses;

class CoursesServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new CoursesService(
          CoursesQuery::create(),
          new Courses()
        );
    }
}
