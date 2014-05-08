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
            if (isset($context["form"])) { $_form_ = $context["form"]; } else { $_form_ = null; }
            echo             $this->env->getExtension('form')->renderer->renderBlock($_form_, 'form');
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
            if (isset($context["table"])) { $_table_ = $context["table"]; } else { $_table_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($_table_);
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 18
                echo "        <tr>
        ";
                // line 19
                if (isset($context["row"])) { $_row_ = $context["row"]; } else { $_row_ = null; }
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($_row_);
                foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                    // line 20
                    echo "            <td>
                ";
                    // line 21
                    if (isset($context["column"])) { $_column_ = $context["column"]; } else { $_column_ = null; }
                    echo twig_escape_filter($this->env, $_column_, "html", null, true);
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
    <a href=\"";
            // line 28
            echo $this->env->getExtension('routing')->getPath("getResponse");
            echo "\">Վերադառնալ նախորդ էջ</a>
    <br>
";
        }
        // line 31
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
        return array (  87 => 31,  81 => 28,  77 => 26,  70 => 24,  60 => 21,  57 => 20,  52 => 19,  49 => 18,  44 => 17,  31 => 6,  29 => 5,  21 => 2,  19 => 1,);
    }
}
