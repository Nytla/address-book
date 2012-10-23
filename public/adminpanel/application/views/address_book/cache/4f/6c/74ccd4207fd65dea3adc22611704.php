<?php

/* book_list.html */
class __TwigTemplate_4f6c74ccd4207fd65dea3adc22611704 extends Twig_Template
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
\t\t\t<!-- Preloader START -->
\t\t\t<div id=\"preloader\" class=\"span-10 prepend-9 append-0 last hide\">
\t\t\t\t<img class=\"top\" width=\"220\" height=\"19\" alt=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getContext($context, 'preloader_alt_text'), "html");
        echo "\" src=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, 'image_path'), "html");
        echo "ajax-loader.gif\">
\t\t\t</div>
\t\t\t<!-- Preloader FINISH -->

\t\t\t<!-- Url Add New Record START -->
\t\t\t<div class=\"span-10 prepend-10 append-0 last\">
\t\t\t\t<h3><a href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getContext($context, 'site_url'), "html");
        echo "add_new_client.php\">";
        echo twig_escape_filter($this->env, $this->getContext($context, 'add_new_client'), "html");
        echo "</a></h3>
\t\t\t</div>
\t\t\t<!-- Url Add New Record FINISH -->
\t\t</div>

\t\t<!-- View clients START -->
\t\t<div class=\"container\">
\t\t\t<div class=\"full_width\">
\t\t\t\t<div id=\"example_wrapper\" class=\"dataTables_wrapper\">
\t\t\t\t\t<!-- Icon for view client information START -->
\t\t\t\t\t<div id=\"details_open\" class=\"hide\">
\t\t\t\t\t\t<img src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->getContext($context, 'image_path'), "html");
        echo "details_open.png\" height=\"20\" width=\"20\" alt=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, 'details_open'), "html");
        echo "\">
\t\t\t\t\t</div>
\t\t\t\t\t<div id=\"details_close\" class=\"hide\">
\t\t\t\t\t\t<img src=\"";
        // line 28
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
\t\t\t\t\t\t<tbody>
\t";
        // line 42
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'clients_data'));
        foreach ($context['_seq'] as $context['id'] => $context['value']) {
            // line 43
            echo "\t\t\t\t\t\t\t<tr class=\"gradeA\">
\t\t\t\t\t\t\t\t<td>";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'clients_data'), $this->getContext($context, 'id'), array(), "array", false), "id", array(), "array", false), "html");
            echo "</td>
\t\t\t\t\t\t\t\t<td>";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'clients_data'), $this->getContext($context, 'id'), array(), "array", false), "first_name", array(), "array", false), "html");
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'clients_data'), $this->getContext($context, 'id'), array(), "array", false), "last_name", array(), "array", false), "html");
            echo "</td>
\t\t\t\t\t\t\t\t<td>";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'clients_data'), $this->getContext($context, 'id'), array(), "array", false), "countryname_en", array(), "array", false), "html");
            echo "</td>
\t\t\t\t\t\t\t\t<td>";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'clients_data'), $this->getContext($context, 'id'), array(), "array", false), "cityname_en", array(), "array", false), "html");
            echo "</td>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<a href=\"/adminpanel/edit_client.php?edit_id=";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'clients_data'), $this->getContext($context, 'id'), array(), "array", false), "id", array(), "array", false), "html");
            echo "\" name=\"edit\">";
            echo twig_escape_filter($this->env, $this->getContext($context, 'client_edit'), "html");
            echo "</a>
\t\t\t\t\t\t\t\t\t|
\t\t\t\t\t\t\t\t\t<a href=\"#delete_id=";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'clients_data'), $this->getContext($context, 'id'), array(), "array", false), "id", array(), "array", false), "html");
            echo "\" name=\"delete\">";
            echo twig_escape_filter($this->env, $this->getContext($context, 'client_delete'), "html");
            echo "</a>
\t\t\t\t\t\t\t\t\t<div id=\"view_content_";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'clients_data'), $this->getContext($context, 'id'), array(), "array", false), "id", array(), "array", false), "html");
            echo "\" class=\"hide\">
\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'clients_data'), $this->getContext($context, 'id'), array(), "array", false), "photo_name", array(), "array", false), "html");
            echo "\" height=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'clients_data'), $this->getContext($context, 'id'), array(), "array", false), "photo_height", array(), "array", false), "html");
            echo "\" width=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'clients_data'), $this->getContext($context, 'id'), array(), "array", false), "photo_width", array(), "array", false), "html");
            echo "\" class=\"left\" style=\"padding: 10px;\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'clients_data'), $this->getContext($context, 'id'), array(), "array", false), "photo_description", array(), "array", false), "html");
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t<p style=\"padding: 10px;\">";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'clients_data'), $this->getContext($context, 'id'), array(), "array", false), "notes", array(), "array", false), "html");
            echo "</p>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 61
        echo "\t\t\t\t\t\t</tbody>
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
        // line 72
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
        // line 78
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
