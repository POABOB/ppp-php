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

/* add.html */
class __TwigTemplate_709009ef6025f175df241d355e5485a0183a3b110cd73ec603d22de7a98ffcc0 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("layout.html", "add.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "
<form action=\"";
        // line 4
        echo twig_escape_filter($this->env, base_url("/Message/save"), "html", null, true);
        echo "\" method=\"POST\">
    <div class=\"form-group\">
        <label>標題</label>
        <input type=\"text\" class=\"form-control\" name=\"title\" placeholder=\"請輸入標題\">
    </div>
    <div class=\"form-group\">
        <label>内容</label>
        <textarea class=\"form-control\" name=\"content\" placeholder=\"請輸入内容\"></textarea>
    </div>

    <button type=\"submit\" class=\"btn btn-default\">提交</button>
</form>
<!-- <a href=\"";
        // line 16
        echo twig_escape_filter($this->env, base_url("/Message"), "html", null, true);
        echo "\"></a>
<img src=\"";
        // line 17
        echo twig_escape_filter($this->env, site_url("/image/qqq.jpg"), "html", null, true);
        echo "\" alt=\"\"> -->
<!-- <img src=\"/PPP-PHP/app/views/assets/image/qqq.jpg\" alt=\"\"> -->
";
    }

    public function getTemplateName()
    {
        return "add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 17,  68 => 16,  53 => 4,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout.html\" %}
{% block content %}

<form action=\"{{ '/Message/save'|base_url() }}\" method=\"POST\">
    <div class=\"form-group\">
        <label>標題</label>
        <input type=\"text\" class=\"form-control\" name=\"title\" placeholder=\"請輸入標題\">
    </div>
    <div class=\"form-group\">
        <label>内容</label>
        <textarea class=\"form-control\" name=\"content\" placeholder=\"請輸入内容\"></textarea>
    </div>

    <button type=\"submit\" class=\"btn btn-default\">提交</button>
</form>
<!-- <a href=\"{{ '/Message'|base_url }}\"></a>
<img src=\"{{ '/image/qqq.jpg'|site_url }}\" alt=\"\"> -->
<!-- <img src=\"/PPP-PHP/app/views/assets/image/qqq.jpg\" alt=\"\"> -->
{% endblock %}", "add.html", "/opt/lampp/htdocs/ppp-php/app/views/add.html");
    }
}
