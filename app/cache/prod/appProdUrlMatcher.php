<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'Cantata\\MainBundle\\Controller\\MainController::indexAction',  '_route' => 'homepage',);
        }

        if (0 === strpos($pathinfo, '/add')) {
            if (0 === strpos($pathinfo, '/add_prod')) {
                // addProdFromFile
                if ($pathinfo === '/add_prod_from_file') {
                    return array (  '_controller' => 'Cantata\\MainBundle\\Controller\\MainController::addProductAction',  '_route' => 'addProdFromFile',);
                }

                // addProductQantityInOut
                if ($pathinfo === '/add_product_qantity_in_out') {
                    return array (  '_controller' => 'Cantata\\MainBundle\\Controller\\MainController::astatkiAction',  '_route' => 'addProductQantityInOut',);
                }

            }

            // cantata_main_main_addnewproduct
            if (0 === strpos($pathinfo, '/addProduct') && preg_match('#^/addProduct(?:/(?P<code>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cantata_main_main_addnewproduct')), array (  'code' => 0,  '_controller' => 'Cantata\\MainBundle\\Controller\\MainController::addNewProductAction',));
            }

        }

        // getResponse
        if ($pathinfo === '/get_response') {
            return array (  '_controller' => 'Cantata\\MainBundle\\Controller\\MainController::otchyotAction',  '_route' => 'getResponse',);
        }

        // cantata_main_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'cantata_main_homepage')), array (  '_controller' => 'Cantata\\MainBundle\\Controller\\DefaultController::indexAction',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
