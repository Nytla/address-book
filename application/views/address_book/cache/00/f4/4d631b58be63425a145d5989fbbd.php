<?php

/* authorization.html */
class __TwigTemplate_00f44d631b58be63425a145d5989fbbd extends Twig_Template
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
\t\t\t<div class=\"span-10 prepend-10 append-0\">
\t\t\t\t<h1>";
        // line 5
        echo twig_escape_filter($this->env, $this->getContext($context, 'auth'), "html");
        echo "</h1>
\t\t\t</div>
\t\t\t<!-- Authorization form START -->
\t\t\t<div id=\"auth_content\" class=\"span-10 prepend-8 append-0\">
\t\t\t\t<form method=\"post\" name=\"authForm\" id=\"authForm\" action=\"\">
\t\t\t\t\t<fieldset>
\t\t\t\t\t\t<legend></legend>
\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t<label for=\"login\">";
        // line 13
        echo twig_escape_filter($this->env, $this->getContext($context, 'login'), "html");
        echo "</label><br>
\t\t\t\t\t\t\t<input id=\"login\" type=\"text\" name=\"valueLogin\" value=\"\" class=\"text\" maxlength=\"16\">
\t\t\t\t\t\t</p>
\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t<label for=\"pass\">";
        // line 17
        echo twig_escape_filter($this->env, $this->getContext($context, 'password'), "html");
        echo "</label><br>
\t\t\t\t\t\t\t<input id=\"pass\" type=\"password\" name=\"valuePass\" value=\"\" class=\"text\" maxlength=\"16\">
\t\t\t\t\t\t</p>
\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t<input id=\"hide\" type=\"hidden\" name=\"valueHide\" value=\"\" class=\"text\" maxlength=\"16\">
\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t<div id=\"error_empty\" class=\"hide\">";
        // line 23
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_empty'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_incorect\" class=\"hide\">";
        // line 24
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_incorect'), "html");
        echo "</div>\t\t
\t\t\t\t\t\t\t<div id=\"error_capcha\" class=\"hide\">";
        // line 25
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_capcha'), "html");
        echo "</div>\t\t\t\t\t\t\t
\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t<input id=\"loginButton\" type=\"submit\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getContext($context, 'login_button'), "html");
        echo "\">
\t\t\t\t\t\t</p>
\t\t\t\t\t</fieldset>
\t\t\t\t</form>
\t\t\t</div>
\t\t\t<!-- Authorization form FINISH -->
\t\t\t<br>
\t\t\t<br>
\t\t\t<br>
";
    }

    public function getTemplateName()
    {
        return "authorization.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
