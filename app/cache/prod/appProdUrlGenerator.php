<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appProdUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes = array(
        'homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Cantata\\MainBundle\\Controller\\MainController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),),
        'addProdFromFile' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Cantata\\MainBundle\\Controller\\MainController::addProductAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/add_prod_from_file',    ),  ),  4 =>   array (  ),),
        'addProductQantityInOut' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Cantata\\MainBundle\\Controller\\MainController::astatkiAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/add_product_qantity_in_out',    ),  ),  4 =>   array (  ),),
        'cantata_main_main_addnewproduct' => array (  0 =>   array (    0 => 'code',  ),  1 =>   array (    'code' => 0,    '_controller' => 'Cantata\\MainBundle\\Controller\\MainController::addNewProductAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'code',    ),    1 =>     array (      0 => 'text',      1 => '/addProduct',    ),  ),  4 =>   array (  ),),
        'getResponse' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Cantata\\MainBundle\\Controller\\MainController::otchyotAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/get_response',    ),  ),  4 =>   array (  ),),
        'cantata_main_homepage' => array (  0 =>   array (    0 => 'name',  ),  1 =>   array (    '_controller' => 'Cantata\\MainBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'name',    ),    1 =>     array (      0 => 'text',      1 => '/hello',    ),  ),  4 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens);
    }
}
