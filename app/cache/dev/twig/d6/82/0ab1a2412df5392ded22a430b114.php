<?php

/* DWUserBundle:Default:login.html.twig */
class __TwigTemplate_d6820ab1a2412df5392ded22a430b114 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html class=\"no-js\" lang=\"en\">
<head>
\t<meta content=\"charset=utf-8\">
\t<title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <br/><br/>
    <form action=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("dw_user_login"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
        echo ">
        ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'widget');
        echo "

    <input type=\"submit\" />
    </form>
    <br/><br/><br/>
    ";
        // line 16
        if ((!(null === $this->getContext($context, "user_name")))) {
            // line 17
            echo "        Vous êtes connecté en tant que : <b>";
            echo twig_escape_filter($this->env, $this->getContext($context, "user_name"), "html", null, true);
            echo "</b>
    ";
        }
        // line 19
        echo "    <br/>
    <br/>
    ";
        // line 21
        if ((!(null === $this->getContext($context, "user_roles")))) {
            // line 22
            echo "        <ul>
        ";
            // line 23
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "user_roles"));
            foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
                // line 24
                echo "            <li>";
                echo twig_escape_filter($this->env, $this->getContext($context, "role"), "html", null, true);
                echo "</li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 26
            echo "        </ul>
        <br/><br/>
        <ul>
            <li><a href=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user"), "html", null, true);
            echo "\">Gérer les utilisateurs</a></li>
            <li><a href=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("role"), "html", null, true);
            echo "\">Gérer les rôles</a></li>
        </ul>
    ";
        }
        // line 33
        echo "    ";
        if ((!(null === $this->getContext($context, "gest_site")))) {
            // line 34
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("item"), "html", null, true);
            echo "\">Gérer les produits</a>
    ";
        }
        // line 36
        echo "</body>
</html>";
    }

    public function getTemplateName()
    {
        return "DWUserBundle:Default:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 36,  90 => 34,  87 => 33,  81 => 30,  77 => 29,  72 => 26,  63 => 24,  59 => 23,  56 => 22,  54 => 21,  50 => 19,  44 => 17,  42 => 16,  34 => 11,  28 => 10,  17 => 1,);
    }
}
