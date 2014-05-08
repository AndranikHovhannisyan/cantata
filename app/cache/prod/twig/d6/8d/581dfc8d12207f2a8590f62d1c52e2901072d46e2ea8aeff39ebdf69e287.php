<?php

/* CantataMainBundle::layout.html.twig */
class __TwigTemplate_d68d581dfc8d12207f2a8590f62d1c52e2901072d46e2ea8aeff39ebdf69e287 extends Twig_Template
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
        echo "<html>
";
        // line 2
        if (array_key_exists("notification", $context)) {
            // line 3
            echo "    ";
            if (isset($context["notification"])) { $_notification_ = $context["notification"]; } else { $_notification_ = null; }
            echo twig_escape_filter($this->env, $_notification_, "html", null, true);
            echo "
    <br>
";
        }
        // line 6
        echo "
<a href=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("addProdFromFile");
        echo "\">Մուտքագրել ապրանքների անվանումները և գները ֆայլից</a>
<br>
<a href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("addProductQantityInOut");
        echo "\">Մուտքագրել ապրանքների մնացորդները կամ մուտք/ելքերը</a>
<br>
<a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("getResponse");
        echo "\">Ստանալ ամսեկան հաշվետվություն</a>
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
        return array (  45 => 11,  40 => 9,  35 => 7,  32 => 6,  24 => 3,  22 => 2,  19 => 1,);
    }
}
