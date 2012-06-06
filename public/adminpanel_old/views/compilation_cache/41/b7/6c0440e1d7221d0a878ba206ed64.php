<?php

/* error.html */
class __TwigTemplate_41b76c0440e1d7221d0a878ba206ed64 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getContext($context, 'title'), "html");
        echo "</title>
\t\t<!-- Framework CSS BLUEPRINT START -->
\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"/adminpanel/css/joshuaclayton-blueprint-css-v1.0.1/blueprint/screen.css\" media=\"screen, projection\" />
\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"/adminpanel/css/joshuaclayton-blueprint-css-v1.0.1/blueprint/print.css\" media=\"print\" />
\t\t<!--[if lt IE 8]>
\t\t<link rel=\"stylesheet\" href=\"/adminpanel/css/joshuaclayton-blueprint-css-v1.0.1/blueprint/ie.css\" type=\"text/css\" media=\"screen, projection\" />
\t\t<![endif]-->
\t\t<!-- Framework CSS BLUEPRINT END -->
\t</head>
\t<body>
\t\t<hr class=\"space\">
\t\t<hr class=\"space\">
\t\t<hr class=\"space\">
\t\t<hr class=\"space\">
\t\t<hr class=\"space\">
\t\t<hr class=\"space\">
\t\t<hr class=\"space\">
\t\t<hr class=\"space\">
\t\t<hr class=\"space\">
\t\t<div class=\"span-10 prepend-23 append-0\">
\t\t\t<h3><a href=\"/adminpanel\">";
        // line 26
        echo twig_escape_filter($this->env, $this->getContext($context, 'site_name'), "html");
        echo "</a></h3>
\t\t</div>
\t\t<hr />
\t\t<div class=\"span-12 prepend-19 append-0\">
\t\t\t<p><b>";
        // line 30
        echo twig_escape_filter($this->env, $this->getContext($context, 'title'), "html");
        echo ".</b></p>

\t\t\t<p>";
        // line 32
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_description'), "html");
        echo "</p> 
\t\t</div>\t
\t\t<div class=\"span-2 last\">
\t\t\t<img class=\"top pull-1\" src=\"/adminpanel/images/error2.png\" width=\"80px\" height=\"80px\" alt=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->getContext($context, 'title'), "html");
        echo "\" />
\t\t</div>
\t</body>
</html>";
    }

    public function getTemplateName()
    {
        return "error.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
