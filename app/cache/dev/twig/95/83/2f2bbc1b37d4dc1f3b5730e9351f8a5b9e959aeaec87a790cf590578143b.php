<?php

/* CantataMainBundle::layout.html.twig */
class __TwigTemplate_95832f2bbc1b37d4dc1f3b5730e9351f8a5b9e959aeaec87a790cf590578143b extends Twig_Template
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
        echo "<!DOCTYPE HTML>
<html>
    <head>
        <link href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/cantatamain/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"/>
        <link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/cantatamain/css/main.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"/>
        <script src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/cantatamain/js/jquery.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/cantatamain/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
    </head>
    <body>
        ";
        // line 10
        if (array_key_exists("notification", $context)) {
            // line 11
            echo "            ";
            echo twig_escape_filter($this->env, $this->getContext($context, "notification"), "html", null, true);
            echo "
            <br>
        ";
        }
        // line 14
        echo "        <div class=\"content\">
            <ul>
                <li>
                    <a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("addProdFromFile");
        echo "\">Մուտքագրել ապրանքների անվանումները և գները ֆայլից</a>
                </li>
                <li>
                    <a href=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("addProductQantityInOut");
        echo "\">Մուտքագրել ապրանքների մնացորդները կամ մուտք/ելքերը</a>
                </li>
                <li>
                    <a href=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath("getResponse");
        echo "\">Ստանալ ամսեկան հաշվետվություն</a>
                </li>
            </ul>
        <div>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "CantataMainBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 23,  62 => 20,  56 => 17,  51 => 14,  44 => 11,  42 => 10,  36 => 7,  32 => 6,  28 => 5,  24 => 4,  19 => 1,);
    }
}
