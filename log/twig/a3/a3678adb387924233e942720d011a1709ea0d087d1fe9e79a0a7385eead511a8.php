<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* index.html */
class __TwigTemplate_8ce93fcfbf0eb22a142f5522a04f3a4f6490794c06d83bbefca0d3f586a9284c extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout.html", "index.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "
";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["val"]) {
            // line 5
            echo "<div class=\"panel panel-default\">
    <div class=\"panel-heading\"><a href=\"";
            // line 6
            echo twig_escape_filter($this->env, base_url("/Message/info/id/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["val"], "id", [], "any", false, false, false, 6), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["val"], "title", [], "any", false, false, false, 6), "html", null, true);
            echo "</a></div>
    <div class=\"panel-body\">
      <a href=\"";
            // line 8
            echo twig_escape_filter($this->env, base_url("/Message/info/id/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["val"], "id", [], "any", false, false, false, 8), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["val"], "content", [], "any", false, false, false, 8), 0, 5) . "..."), "html", null, true);
            echo "</a> 
      <p>";
            // line 9
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["val"], "create_at", [], "any", false, false, false, 9), "Y-m-d H:i:s"), "html", null, true);
            echo "</p>
      <p><a href=\"";
            // line 10
            echo twig_escape_filter($this->env, base_url("/Message/del/id/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["val"], "id", [], "any", false, false, false, 10), "html", null, true);
            echo "\">删除</a></p>
    </div>
  </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['val'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "
";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 14,  79 => 10,  75 => 9,  68 => 8,  60 => 6,  57 => 5,  53 => 4,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout.html\" %}
{% block content %}

{% for val in data %}
<div class=\"panel panel-default\">
    <div class=\"panel-heading\"><a href=\"{{ '/Message/info/id/'|base_url }}{{val.id}}\">{{val.title}}</a></div>
    <div class=\"panel-body\">
      <a href=\"{{ '/Message/info/id/'|base_url }}{{val.id}}\">{{val.content|slice(0, 5) ~ '...' }}</a> 
      <p>{{val.create_at|date('Y-m-d H:i:s')}}</p>
      <p><a href=\"{{ '/Message/del/id/'|base_url }}{{val.id}}\">删除</a></p>
    </div>
  </div>
{% endfor %}

{% endblock %}", "index.html", "/opt/lampp/htdocs/ppp-php/app/views/index.html");
    }
}
