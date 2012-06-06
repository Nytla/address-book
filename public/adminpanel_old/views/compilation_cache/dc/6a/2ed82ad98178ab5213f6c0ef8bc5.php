<?php

/* authorization.html */
class __TwigTemplate_dc6a2ed82ad98178ab5213f6c0ef8bc5 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "\t\t<hr />
\t\t<hr />
\t\t<hr />
\t\t<div class=\"span-10 prepend-11 append-0\">
\t\t\t<h3><a href=\"/adminpanel\">";
        // line 5
        echo twig_escape_filter($this->env, $this->getContext($context, 'site_name'), "html");
        echo "</a></h3>
\t\t</div>
\t\t<hr />
\t\t<hr />
\t\t<hr />
\t\t<div class=\"span-10 prepend-10 append-0\">
\t\t\t<h1><a href=\"#authorization\" id=\"auth_url\">Authorization</a></h1>
\t\t</div>
\t\t<div id=\"auth\" class=\"span-10 prepend-10 append-0\">
\t\t</div>
\t\t<div id=\"auth_content\" class=\"span-10 prepend-10 append-0 hide\">
\t\t\t<fieldset>
\t\t\t\t<form method=\"post\" id=\"auth_form\" action=\"\">
\t\t\t\t\t<p>
\t\t\t\t\t\t<label for=\"login\">Login:</label><br />
\t\t\t\t\t\t<input id=\"login\" type=\"text\" name=\"valueLogin\" class=\"text\" maxlength=\"16\" />
\t\t\t\t\t</p>
\t\t\t\t\t<p>
\t\t\t\t\t\t<label for=\"pass\">Password:</label><br />
\t\t\t\t\t\t<input id=\"pass\" type=\"password\" name=\"valuePass\" class=\"text\" maxlength=\"16\" />
\t\t\t\t\t</p>
\t\t\t\t\t\t<div id=\"error\" class=\"hide\">Login or password is incorrect!</div>
\t\t\t\t\t\t<div id=\"error_empty\" class=\"hide\">Login or password is empty!</div>
\t\t\t\t\t<p>
\t\t\t\t\t\t<input id=\"loginButton\" type=\"submit\" value=\"Login\" />
\t\t\t\t\t</p>
\t\t\t\t</form>
\t\t\t</fieldset>
\t\t</div>
\t\t<hr />
\t\t<hr />
\t\t<hr />
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
