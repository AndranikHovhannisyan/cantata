<?php

/* CantataMainBundle:Main:main.html.twig */
class __TwigTemplate_d745ca1bf4ef23bf1bf0854d24737c6bc2a2122b9394220955abd76e6aebb4a7 extends Twig_Template
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
        echo "<link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/cantatamain/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"/>
<link href=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/cantatamain/css/main.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"/>
<script src=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/cantatamain/js/jquery.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/cantatamain/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
";
        // line 5
        if (array_key_exists("form", $context)) {
            // line 6
            echo "    ";
            echo             $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "form"), 'form');
            echo "
    <br>
";
        }
        // line 9
        if (array_key_exists("table", $context)) {
            // line 10
            echo "    <table class=\"table\">
        <tr>
            <td>Անվանումը</td>
            <td>Ապրանքի քանակը</td>
            <td>Ապրանքի մուտք/ելքը</td>
            <td>Ապրանքի մնացորդը</td>
            <td>Վաճառքը</td>
            <td>Վաճառքի գինը</td>
            <td>Ինքնարժեքը</td>
            <td>Եկամուտը</td>
        </tr>
    ";
            // line 21
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "table"));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 22
                echo "        <tr>
        ";
                // line 23
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "row"));
                foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                    // line 24
                    echo "            <td>
                ";
                    // line 25
                    echo twig_escape_filter($this->env, $this->getContext($context, "column"), "html", null, true);
                    echo "
            </td>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 28
                echo "        </tr>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "    </table>
    <br>
";
        }
        // line 33
        if (array_key_exists("result", $context)) {
            // line 34
            echo "    <table class=\"table\">
        <tr>
            <td></td>
            <td>Վաճառքի գներով</td>
            <td>Ինքնարժեքով</td>
            <td>Շահույթը</td>
        </tr>
        ";
            // line 41
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "result"));
            foreach ($context['_seq'] as $context["_key"] => $context["rows"]) {
                // line 42
                echo "            <tr>
            ";
                // line 43
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "rows"));
                foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                    // line 44
                    echo "                <td>
                    ";
                    // line 45
                    echo twig_escape_filter($this->env, $this->getContext($context, "column"), "html", null, true);
                    echo "
                </td>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 48
                echo "            </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rows'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 50
            echo "    </table>
    <br>
    <a href=\"";
            // line 52
            echo $this->env->getExtension('routing')->getPath("getResponse");
            echo "\">Վերադառնալ նախորդ էջ</a>
    <br>
";
        }
        // line 55
        echo "<a href=\"";
        echo $this->env->getExtension('routing')->getPath("homepage");
        echo "\">Վերադառնալ գլխավոր էջ</a>
";
    }

    public function getTemplateName()
    {
        return "CantataMainBundle:Main:main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 55,  140 => 52,  136 => 50,  129 => 48,  120 => 45,  117 => 44,  113 => 43,  110 => 42,  106 => 41,  97 => 34,  95 => 33,  90 => 30,  83 => 28,  74 => 25,  71 => 24,  67 => 23,  64 => 22,  60 => 21,  47 => 10,  45 => 9,  38 => 6,  36 => 5,  32 => 4,  28 => 3,  24 => 2,  19 => 1,);
    }
}
