<?php

/* header.html */
class __TwigTemplate_81562e02c8ae5d713af83551c4470a45 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\"
\t\"http://www.w3.org/TR/html4/strict.dtd\">
<html>
\t<head>
\t\t<meta http-equiv=\"Content-Type\" content=\"text/html;charset=";
        // line 5
        echo twig_escape_filter($this->env, $this->getContext($context, 'charset'), "html");
        echo "\">
\t\t<title>";
        // line 6
        echo twig_escape_filter($this->env, $this->getContext($context, 'title'), "html");
        echo "</title>
\t\t<link rel=\"icon\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getContext($context, 'image_path'), "html");
        echo "favicon.ico\" type=\"image/x-icon\">
";
        // line 8
        if (($this->getContext($context, 'flag_blue_print') == 1)) {
            // line 9
            echo "\t\t<!-- Framework CSS BLUEPRINT START -->
\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
            // line 10
            echo twig_escape_filter($this->env, $this->getContext($context, 'screen'), "html");
            echo "screen.css\" media=\"screen, projection\">
\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->getContext($context, 'print'), "html");
            echo "print.css\" media=\"print\">
\t\t<!--[if lt IE 8]>\t
\t\t<link rel=\"stylesheet\" href=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->getContext($context, 'ie'), "html");
            echo "ie.css\" type=\"text/css\" media=\"screen, projection\">
\t\t<![endif]-->
\t\t<!-- Framework CSS BLUEPRINT FINISH -->
";
        }
    }

    public function getTemplateName()
    {
        return "header.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
