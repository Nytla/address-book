<?php

/* add_admin.html */
class __TwigTemplate_bad579c215155c2f543cd71c5fcc6e3b extends Twig_Template
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
        echo "layout.php\">";
        echo twig_escape_filter($this->env, $this->getContext($context, 'layout'), "html");
        echo "</a></h3>
\t\t\t</div>
\t\t\t<div class=\"span-10 prepend-8 append-0\">
\t\t\t\t<h1>";
        // line 8
        echo twig_escape_filter($this->env, $this->getContext($context, 'content'), "html");
        echo "</h1>
\t\t\t</div>
\t\t\t<div id=\"auth\" class=\"span-10 prepend-10 append-0\">
\t\t\t</div>
\t\t\t<div id=\"auth_content\" class=\"span-10 prepend-8 append-0\">
\t\t\t\t<fieldset>
\t\t\t\t\t<form method=\"post\" name=\"addAdminForm\" id=\"addAdminForm\" action=\"\">
\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t<label for=\"login\">";
        // line 16
        echo twig_escape_filter($this->env, $this->getContext($context, 'login'), "html");
        echo "</label><br>
\t\t\t\t\t\t\t<input id=\"login\" type=\"text\" name=\"login\" class=\"text\" minlength=\"5\" maxlength=\"16\">
\t\t\t\t\t\t</p>
\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t<label for=\"pass\">";
        // line 20
        echo twig_escape_filter($this->env, $this->getContext($context, 'password'), "html");
        echo "</label><br>
\t\t\t\t\t\t\t<input id=\"pass\" type=\"password\" name=\"pass\" class=\"text\" minlength=\"5\" maxlength=\"16\">
\t\t\t\t\t\t</p>
\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t<label for=\"confirm_pass\">";
        // line 24
        echo twig_escape_filter($this->env, $this->getContext($context, 'confirm_password'), "html");
        echo "</label><br>
\t\t\t\t\t\t\t<input id=\"confirm_pass\" type=\"password\" name=\"confirm_pass\" class=\"text\">
\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t<div id=\"error_empty_login\" class=\"hide\">";
        // line 27
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_empty_login'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_empty_pass\" class=\"hide\">";
        // line 28
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_empty_pass'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_empty_pass_conf\" class=\"hide\">";
        // line 29
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_empty_pass_conf'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_incorect_login\" class=\"hide\">";
        // line 30
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_incorect_login'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_incorect_pass\" class=\"hide\">";
        // line 31
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_incorect_pass'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_min_length_login\" class=\"hide\">";
        // line 32
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_min_length_login'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_min_length_pass\" class=\"hide\">";
        // line 33
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_min_length_pass'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_max_length_login\" class=\"hide\">";
        // line 34
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_max_length_login'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_max_length_pass\" class=\"hide\">";
        // line 35
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_max_length_pass'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_confirm\" class=\"hide\">";
        // line 36
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_confirm'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_exists\" class=\"hide\">";
        // line 37
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_exists'), "html");
        echo "</div>
\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t<input id=\"loginButton\" type=\"submit\" class=\"submit\" value=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->getContext($context, 'save'), "html");
        echo "\">
\t\t\t\t\t\t</p>
\t\t\t\t\t</form>
\t\t\t\t\t<div id=\"add_good_message\" class=\"hide\">";
        // line 42
        echo twig_escape_filter($this->env, $this->getContext($context, 'add_good_message'), "html");
        echo "</div>
\t\t\t\t</fieldset>
\t\t\t</div>
\t\t\t<br>
\t\t\t<br>
\t\t\t<br>
";
    }

    public function getTemplateName()
    {
        return "add_admin.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
