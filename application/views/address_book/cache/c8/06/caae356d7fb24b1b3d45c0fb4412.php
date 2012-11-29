<?php

/* book_list.html */
class __TwigTemplate_c806caae356d7fb24b1b3d45c0fb4412 extends Twig_Template
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
\t\t\t<div class=\"span-10 prepend-10 append-0 last\">
\t\t\t\t<h2>";
        // line 3
        echo twig_escape_filter($this->env, $this->getContext($context, 'site_name'), "html");
        echo "</h2>
\t\t\t</div>
\t\t\t<br>
\t\t\t<!-- Url Add New Record START -->
\t\t\t<div class=\"span-10 prepend-10 append-0 last\">
\t\t\t\t<h3><a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getContext($context, 'site_url'), "html");
        echo "add_new_client.php\">";
        echo twig_escape_filter($this->env, $this->getContext($context, 'add_new_client'), "html");
        echo "</a></h3>
\t\t\t</div>
\t\t\t<!-- Url Add New Record FINISH -->
\t\t\t<!-- Preloader START -->
\t\t\t<div id=\"preloader\" class=\"span-10 prepend-9 append-0 last hide\">
\t\t\t\t<img width=\"220\" height=\"19\" alt=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getContext($context, 'preloader_alt_text'), "html");
        echo "\" src=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, 'image_path'), "html");
        echo "ajax-loader.gif\">
\t\t\t</div>
\t\t\t<!-- Preloader FINISH -->
\t\t\t<br>
\t\t</div>
\t\t<!-- View clients START -->
\t\t<div class=\"container\">
\t\t\t<div class=\"full_width\">
\t\t\t\t<div id=\"example_wrapper\" class=\"dataTables_wrapper\">
\t\t\t\t\t<!-- Icon for view client information START -->
\t\t\t\t\t<div id=\"details_open\" class=\"hide\">
\t\t\t\t\t\t<img src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getContext($context, 'image_path'), "html");
        echo "details_open.png\" height=\"20\" width=\"20\" alt=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, 'details_open'), "html");
        echo "\">
\t\t\t\t\t</div>
\t\t\t\t\t<div id=\"details_close\" class=\"hide\">
\t\t\t\t\t\t<img src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getContext($context, 'image_path'), "html");
        echo "details_close.png\" height=\"20\" width=\"20\" alt=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, 'details_close'), "html");
        echo "\">
\t\t\t\t\t</div>
\t\t\t\t\t<!-- Icon for view client information FINISH -->
\t\t\t\t\t<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" class=\"display\" id=\"example\">
\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th>ID</th>
\t\t\t\t\t\t\t\t<th>Name</th>
\t\t\t\t\t\t\t\t<th>Country</th>
\t\t\t\t\t\t\t\t<th>City</th>
\t\t\t\t\t\t\t\t<th>Action</th>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t</thead>
\t\t\t\t\t\t<tbody><tr><td></td></tr></tbody>
\t\t\t\t\t</table>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<!-- View clients FINISH -->
\t\t\t<div class=\"container showgrid\">
\t\t\t<br>
\t\t\t<br>
\t\t\t<div class=\"span-10 prepend-10 append-0 last\">
\t\t\t\t<h3><a href=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->getContext($context, 'site_url'), "html");
        echo "layout.php\">";
        echo twig_escape_filter($this->env, $this->getContext($context, 'back_to_page_layout'), "html");
        echo "</a></h3>
\t\t\t</div>
\t\t\t<br>
\t\t\t<br>
\t\t\t<!-- View phrase START -->
\t\t\t<div class=\"info\">
\t\t\t\t";
        // line 56
        echo twig_escape_filter($this->env, $this->getContext($context, 'phrase'), "html");
        echo "
\t\t\t</div>
\t\t\t<!-- View phrase FINISH -->
";
    }

    public function getTemplateName()
    {
        return "book_list.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
