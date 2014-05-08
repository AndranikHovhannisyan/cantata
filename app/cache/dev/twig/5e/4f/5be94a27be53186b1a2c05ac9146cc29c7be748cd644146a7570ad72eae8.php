<?php

/* CantataMainBundle:Main:main.html.twig */
class __TwigTemplate_5e4f5be94a27be53186b1a2c05ac9146cc29c7be748cd644146a7570ad72eae8 extends Twig_Template
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
        if (array_key_exists("form", $context)) {
            // line 2
            echo "    ";
            echo             $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "form"), 'form');
            echo "
    <br>
";
        }
        // line 5
        if (array_key_exists("table", $context)) {
            // line 6
            echo "    <table border='1' style='width:300px'>
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
            // line 17
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "table"));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 18
                echo "        <tr>
        ";
                // line 19
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "row"));
                foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                    // line 20
                    echo "            <td>
                ";
                    // line 21
                    echo twig_escape_filter($this->env, $this->getContext($context, "column"), "html", null, true);
                    echo "
            </td>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 24
                echo "        </tr>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo "    </table>
    <br>
";
        }
        // line 29
        if (array_key_exists("result", $context)) {
            // line 30
            echo "    <table border='1' style='width:300px'>
        <tr>
            <td></td>
            <td>Վաճառքի գներով</td>
            <td>Ինքնարժեքով</td>
            <td>Շահույթը</td>
        </tr>
        ";
            // line 37
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "result"));
            foreach ($context['_seq'] as $context["_key"] => $context["rows"]) {
                // line 38
                echo "            <tr>
            ";
                // line 39
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "rows"));
                foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                    // line 40
                    echo "                <td>
                    ";
                    // line 41
                    echo twig_escape_filter($this->env, $this->getContext($context, "column"), "html", null, true);
                    echo "
                </td>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 44
                echo "            </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rows'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo "    </table>
    <br>
    <a href=\"";
            // line 48
            echo $this->env->getExtension('routing')->getPath("getResponse");
            echo "\">Վերադառնալ նախորդ էջ</a>
    <br>
";
        }
        // line 51
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
        return array (  129 => 51,  123 => 48,  119 => 46,  112 => 44,  103 => 41,  100 => 40,  96 => 39,  93 => 38,  89 => 37,  80 => 30,  78 => 29,  73 => 26,  66 => 24,  57 => 21,  54 => 20,  50 => 19,  47 => 18,  43 => 17,  30 => 6,  28 => 5,  21 => 2,  19 => 1,);
    }
}
