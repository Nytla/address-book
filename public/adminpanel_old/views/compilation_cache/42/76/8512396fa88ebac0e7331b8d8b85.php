<?php

/* header.html */
class __TwigTemplate_42768512396fa88ebac0e7331b8d8b85 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"
    \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\">
\t<head>
\t\t<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" />
\t\t<title>";
        // line 6
        echo twig_escape_filter($this->env, $this->getContext($context, 'site_name'), "html");
        echo "</title>
\t\t<!-- Framework CSS BLUEPRINT START -->
\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"./css/joshuaclayton-blueprint-css-v1.0.1/blueprint/screen.css\" media=\"screen, projection\" />
\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"./css/joshuaclayton-blueprint-css-v1.0.1/blueprint/print.css\" media=\"print\" />
\t\t<!--[if lt IE 8]>
\t\t<link rel=\"stylesheet\" href=\"./css/joshuaclayton-blueprint-css-v1.0.1/blueprint/ie.css\" type=\"text/css\" media=\"screen, projection\" />
\t\t<![endif]-->
\t\t<!-- Framework CSS BLUEPRINT END -->
\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"./css/style_for_impromptu.css\" />
\t\t<script type=\"text/javascript\" src=\"../libraries/jQuery/jquery-1.6.2.min.js\"></script>
\t\t<script type=\"text/javascript\" src=\"../libraries/jQuery/jquery-impromptu.3.1.min.js\"></script>
\t\t<script type=\"text/javascript\" src=\"./javascript/admin_function.js\"></script>
\t</head>
\t<body>
\t\t<noscript><p>Your browser does not support JavaScript!</p></noscript>
\t\t<div class=\"container showgrid\">
\t\t\t<div id=\"testing\"></div>
\t\t\t<div id=\"content\"></div>
";
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
