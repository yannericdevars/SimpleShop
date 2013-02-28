<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appdevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        // _wdt
        if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?<token>[^/]+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',)), array('_route' => '_wdt'));
        }

        if (0 === strpos($pathinfo, '/_profiler')) {
            // _profiler_search
            if ($pathinfo === '/_profiler/search') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',  '_route' => '_profiler_search',);
            }

            // _profiler_purge
            if ($pathinfo === '/_profiler/purge') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',  '_route' => '_profiler_purge',);
            }

            // _profiler_info
            if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?<about>[^/]+)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::infoAction',)), array('_route' => '_profiler_info'));
            }

            // _profiler_import
            if ($pathinfo === '/_profiler/import') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',  '_route' => '_profiler_import',);
            }

            // _profiler_export
            if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?<token>[^/\\.]+)\\.txt$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',)), array('_route' => '_profiler_export'));
            }

            // _profiler_phpinfo
            if ($pathinfo === '/_profiler/phpinfo') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::phpinfoAction',  '_route' => '_profiler_phpinfo',);
            }

            // _profiler_search_results
            if (preg_match('#^/_profiler/(?<token>[^/]+)/search/results$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',)), array('_route' => '_profiler_search_results'));
            }

            // _profiler
            if (preg_match('#^/_profiler/(?<token>[^/]+)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',)), array('_route' => '_profiler'));
            }

            // _profiler_redirect
            if (rtrim($pathinfo, '/') === '/_profiler') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_profiler_redirect');
                }

                return array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction',  'route' => '_profiler_search_results',  'token' => 'empty',  'ip' => '',  'url' => '',  'method' => '',  'limit' => '10',  '_route' => '_profiler_redirect',);
            }

        }

        if (0 === strpos($pathinfo, '/_configurator')) {
            // _configurator_home
            if (rtrim($pathinfo, '/') === '/_configurator') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_configurator_home');
                }

                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
            }

            // _configurator_step
            if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?<index>[^/]+)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',)), array('_route' => '_configurator_step'));
            }

            // _configurator_final
            if ($pathinfo === '/_configurator/final') {
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
            }

        }

        // dw_slide_show_homepage
        if (0 === strpos($pathinfo, '/boutique') && preg_match('#^/boutique/(?<ref>[^/]+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'DW\\SlideShowBundle\\Controller\\DefaultController::boutiqueAction',)), array('_route' => 'dw_slide_show_homepage'));
        }

        if (0 === strpos($pathinfo, '/item')) {
            // item
            if (rtrim($pathinfo, '/') === '/item') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'item');
                }

                return array (  '_controller' => 'DW\\SlideShowBundle\\Controller\\ItemController::indexAction',  '_route' => 'item',);
            }

            // item_show
            if (preg_match('#^/item/(?<id>[^/]+)/show$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'DW\\SlideShowBundle\\Controller\\ItemController::showAction',)), array('_route' => 'item_show'));
            }

            // item_new
            if ($pathinfo === '/item/new') {
                return array (  '_controller' => 'DW\\SlideShowBundle\\Controller\\ItemController::newAction',  '_route' => 'item_new',);
            }

            // item_create
            if ($pathinfo === '/item/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_item_create;
                }

                return array (  '_controller' => 'DW\\SlideShowBundle\\Controller\\ItemController::createAction',  '_route' => 'item_create',);
            }
            not_item_create:

            // item_edit
            if (preg_match('#^/item/(?<id>[^/]+)/edit$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'DW\\SlideShowBundle\\Controller\\ItemController::editAction',)), array('_route' => 'item_edit'));
            }

            // item_update
            if (preg_match('#^/item/(?<id>[^/]+)/update$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_item_update;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'DW\\SlideShowBundle\\Controller\\ItemController::updateAction',)), array('_route' => 'item_update'));
            }
            not_item_update:

            // item_delete
            if (preg_match('#^/item/(?<id>[^/]+)/delete$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_item_delete;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'DW\\SlideShowBundle\\Controller\\ItemController::deleteAction',)), array('_route' => 'item_delete'));
            }
            not_item_delete:

        }

        if (0 === strpos($pathinfo, '/image')) {
            // image
            if (rtrim($pathinfo, '/') === '/image') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'image');
                }

                return array (  '_controller' => 'DW\\SlideShowBundle\\Controller\\ImageController::indexAction',  '_route' => 'image',);
            }

            // image_show
            if (preg_match('#^/image/(?<id>[^/]+)/show$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'DW\\SlideShowBundle\\Controller\\ImageController::showAction',)), array('_route' => 'image_show'));
            }

            // image_new
            if ($pathinfo === '/image/new') {
                return array (  '_controller' => 'DW\\SlideShowBundle\\Controller\\ImageController::newAction',  '_route' => 'image_new',);
            }

            // image_create
            if ($pathinfo === '/image/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_image_create;
                }

                return array (  '_controller' => 'DW\\SlideShowBundle\\Controller\\ImageController::createAction',  '_route' => 'image_create',);
            }
            not_image_create:

            // image_edit
            if (preg_match('#^/image/(?<id>[^/]+)/edit$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'DW\\SlideShowBundle\\Controller\\ImageController::editAction',)), array('_route' => 'image_edit'));
            }

            // image_update
            if (preg_match('#^/image/(?<id>[^/]+)/update$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_image_update;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'DW\\SlideShowBundle\\Controller\\ImageController::updateAction',)), array('_route' => 'image_update'));
            }
            not_image_update:

            // image_delete
            if (preg_match('#^/image/(?<id>[^/]+)/delete$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_image_delete;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'DW\\SlideShowBundle\\Controller\\ImageController::deleteAction',)), array('_route' => 'image_delete'));
            }
            not_image_delete:

        }

        // dw_user_homepage
        if ($pathinfo === '/hello') {
            return array (  '_controller' => 'DW\\UserBundle\\Controller\\DefaultController::indexAction',  '_route' => 'dw_user_homepage',);
        }

        // dw_password_reinit
        if (0 === strpos($pathinfo, '/pass') && preg_match('#^/pass/(?<email>[^/]+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'DW\\UserBundle\\Controller\\DefaultController::passwordReinitAction',)), array('_route' => 'dw_password_reinit'));
        }

        // dw_password_reinit_post
        if ($pathinfo === '/pass/reinit') {
            return array (  '_controller' => 'DW\\UserBundle\\Controller\\DefaultController::passwordReinitPostAction',  '_route' => 'dw_password_reinit_post',);
        }

        // dw_user_login
        if ($pathinfo === '/login') {
            return array (  '_controller' => 'DW\\UserBundle\\Controller\\DefaultController::loginAction',  '_route' => 'dw_user_login',);
        }

        if (0 === strpos($pathinfo, '/role')) {
            // role
            if (rtrim($pathinfo, '/') === '/role') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'role');
                }

                return array (  '_controller' => 'DW\\UserBundle\\Controller\\RoleController::indexAction',  '_route' => 'role',);
            }

            // role_show
            if (preg_match('#^/role/(?<id>[^/]+)/show$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'DW\\UserBundle\\Controller\\RoleController::showAction',)), array('_route' => 'role_show'));
            }

            // role_new
            if ($pathinfo === '/role/new') {
                return array (  '_controller' => 'DW\\UserBundle\\Controller\\RoleController::newAction',  '_route' => 'role_new',);
            }

            // role_create
            if ($pathinfo === '/role/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_role_create;
                }

                return array (  '_controller' => 'DW\\UserBundle\\Controller\\RoleController::createAction',  '_route' => 'role_create',);
            }
            not_role_create:

            // role_edit
            if (preg_match('#^/role/(?<id>[^/]+)/edit$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'DW\\UserBundle\\Controller\\RoleController::editAction',)), array('_route' => 'role_edit'));
            }

            // role_update
            if (preg_match('#^/role/(?<id>[^/]+)/update$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_role_update;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'DW\\UserBundle\\Controller\\RoleController::updateAction',)), array('_route' => 'role_update'));
            }
            not_role_update:

            // role_delete
            if (preg_match('#^/role/(?<id>[^/]+)/delete$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_role_delete;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'DW\\UserBundle\\Controller\\RoleController::deleteAction',)), array('_route' => 'role_delete'));
            }
            not_role_delete:

        }

        if (0 === strpos($pathinfo, '/user')) {
            // user
            if (rtrim($pathinfo, '/') === '/user') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'user');
                }

                return array (  '_controller' => 'DW\\UserBundle\\Controller\\UserController::indexAction',  '_route' => 'user',);
            }

            // user_show
            if (preg_match('#^/user/(?<id>[^/]+)/show$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'DW\\UserBundle\\Controller\\UserController::showAction',)), array('_route' => 'user_show'));
            }

            // user_new
            if ($pathinfo === '/user/new') {
                return array (  '_controller' => 'DW\\UserBundle\\Controller\\UserController::newAction',  '_route' => 'user_new',);
            }

            // user_create
            if ($pathinfo === '/user/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_user_create;
                }

                return array (  '_controller' => 'DW\\UserBundle\\Controller\\UserController::createAction',  '_route' => 'user_create',);
            }
            not_user_create:

            // user_edit
            if (preg_match('#^/user/(?<id>[^/]+)/edit$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'DW\\UserBundle\\Controller\\UserController::editAction',)), array('_route' => 'user_edit'));
            }

            // user_update
            if (preg_match('#^/user/(?<id>[^/]+)/update$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_user_update;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'DW\\UserBundle\\Controller\\UserController::updateAction',)), array('_route' => 'user_update'));
            }
            not_user_update:

            // user_delete
            if (preg_match('#^/user/(?<id>[^/]+)/delete$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_user_delete;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'DW\\UserBundle\\Controller\\UserController::deleteAction',)), array('_route' => 'user_delete'));
            }
            not_user_delete:

        }

        // login
        if ($pathinfo === '/login') {
            return array (  '_controller' => 'AcmeSecurityBundle:Security:login',  '_route' => 'login',);
        }

        // login_check
        if ($pathinfo === '/login_check') {
            return array('_route' => 'login_check');
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
