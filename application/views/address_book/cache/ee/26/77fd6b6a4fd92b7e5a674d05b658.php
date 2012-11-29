<?php

/* layout.html */
class __TwigTemplate_ee2677fd6b6a4fd92b7e5a674d05b658 extends Twig_Template
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
\t\t\t<div class=\"span-10 prepend-";
        // line 4
        echo twig_escape_filter($this->env, $this->getContext($context, 'prepend'), "html");
        echo " append-0 last\">
\t\t\t\t<h3>
\t\t\t\t\t<a href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->getContext($context, 'site_url'), "html");
        echo "book_list.php\">";
        echo twig_escape_filter($this->env, $this->getContext($context, 'ab'), "html");
        echo "</a>
\t\t\t\t\t|
\t\t\t\t\t<a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getContext($context, 'site_url'), "html");
        echo "logout.php\">";
        echo twig_escape_filter($this->env, $this->getContext($context, 'log_out'), "html");
        echo "</a>
\t\t\t\t\t";
        // line 9
        if (($this->getContext($context, 'admin_permission') != 0)) {
            // line 10
            echo "\t\t\t\t\t|
\t\t\t\t\t<a href=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->getContext($context, 'site_url'), "html");
            echo "add_admin.php\">";
            echo twig_escape_filter($this->env, $this->getContext($context, 'add_admin'), "html");
            echo "</a>
\t\t\t\t\t";
        }
        // line 13
        echo "\t\t\t\t</h3>
\t\t\t</div>
\t\t\t<br>
\t\t\t<br>
\t\t\t<br>
\t\t\t<br>
\t\t\t<br>
\t\t\t<br>
\t\t\t<br>
\t\t\t<div class=\"span-10 prepend-10 append-0 last\">
\t\t\t\t<h3>";
        // line 23
        echo twig_escape_filter($this->env, $this->getContext($context, 'content'), "html");
        echo "</h3>
\t\t\t</div>
\t\t\t<br>
\t\t\t<br>
\t\t\t<br>
\t\t\t<br>
\t\t\t<br>
\t\t\t<br>
\t\t\t<br>
";
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
