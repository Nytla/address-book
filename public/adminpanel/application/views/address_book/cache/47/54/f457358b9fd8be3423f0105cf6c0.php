<?php

/* errors.html */
class __TwigTemplate_4754f457358b9fd8be3423f0105cf6c0 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "\t\t\t<br>
\t\t\t<br>
\t\t\t<br>
\t\t\t<div class=\"span-10 prepend-11 append-0\">
\t\t\t\t<h3><a href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getContext($context, 'site_url'), "html");
        echo "index.php\">";
        echo twig_escape_filter($this->env, $this->getContext($context, 'site_name'), "html");
        echo "</a></h3>
\t\t\t</div>
\t\t\t<br>
\t\t\t<br>
\t\t\t<br>
\t\t\t<div class=\"span-12 prepend-11 append-0\">
\t\t\t\t<h3>";
        // line 11
        echo twig_escape_filter($this->env, $this->getContext($context, 'page_error'), "html");
        echo "</h3>
\t\t\t</div>
\t\t\t<div class=\"span-15 prepend-8\">
\t\t\t\t<p>
\t\t\t\t\t<img class=\"top pull-1 left\" src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getContext($context, 'image'), "html");
        echo "error.png\" width=\"100px\" height=\"100px\" alt=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_description'), "html");
        echo "\">
\t\t\t\t\t<br><br><h4>";
        // line 16
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_description'), "html");
        echo "</h4>
\t\t\t\t</p>
\t\t\t</div>
\t\t\t<br>
";
    }

    public function getTemplateName()
    {
        return "errors.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
