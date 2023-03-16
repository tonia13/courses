<?php

namespace Api;

use Laminas\View\Helper\Doctype;

return [
    'router' => require __DIR__ . '/module.routes.config.php',
    'view_manager' => [
        'strategies' => [
            'ViewJsonStrategy',
        ],
        'doctype' => Doctype::HTML5,
        'display_not_found_reason' => false,
        // Controls whether to display the detailed information about the "Page not Found" error.
        'display_exceptions' => false,
        // Defines whether to display information about an unhandled exception and its stack trace
        'not_found_template' => 'error/404',
        // Defines the template name for the 404 error
        'exception_template' => 'error/index',
        'template_map' => [
            'site/layout' => __DIR__ . '/../view/error/404.phtml'
        ],
        // By default, the MVC's default Rendering Strategy uses the
        // template name "layout/layout" for the site's layout.
        // Here, we tell it to use the "site/layout" template,
        // which we mapped via the TemplateMapResolver above.
        'layout' => 'site/layout'
    ],
    'service_manager' => [
        'factories' => [
        ],
    ],
    'controllers' => include __DIR__ . '/module.controllers.config.php',
];
