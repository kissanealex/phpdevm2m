<?php

/* display_result.html.twig */
class __TwigTemplate_6246eaa0e4bcfa13a6b3f98b679f6bbbde907616b776a13ca190ab0a3bb5c226 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("banner.html.twig", "display_result.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "banner.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "
  <div id=\"page-header-div\">";
        // line 4
        echo twig_escape_filter($this->env, ($context["page_heading_2"] ?? null), "html", null, true);
        echo "</div>
    <div id=\"page-content-div\">
        <p>";
        // line 6
        echo twig_escape_filter($this->env, ($context["page_text"] ?? null), "html", null, true);
        echo "</p>
";
        // line 7
        echo twig_escape_filter($this->env, ($context["result"] ?? null), "html", null, true);
        echo "
    </div>
";
    }

    public function getTemplateName()
    {
        return "display_result.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 7,  39 => 6,  34 => 4,  31 => 3,  28 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "display_result.html.twig", "C:\\xampp\\htdocs\\Slim\\m2m\\app\\templates\\display_result.html.twig");
    }
}
