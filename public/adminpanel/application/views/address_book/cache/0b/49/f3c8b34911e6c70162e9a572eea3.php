<?php

/* add_new_client.html */
class __TwigTemplate_0b49f3c8b34911e6c70162e9a572eea3 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getContext($context, 'page_name'), "html");
        echo "</h2>
\t\t\t</div>
\t\t\t<br>
\t\t\t<div id=\"auth_content\" class=\"span-16 prepend-4 append-0\">
\t\t\t\t<fieldset>
\t\t\t\t\t<div id=\"forms_content\" class=\"prepend-2\">
\t\t\t\t\t\t<form action=\"\" method=\"post\" id=\"InformationForm\">
\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<label for=\"first_name\">";
        // line 11
        echo twig_escape_filter($this->env, $this->getContext($context, 'first_name'), "html");
        echo "</label>
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"first_name\" id=\"first_name\" class=\"text\" maxlength=\"16\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<label for=\"last_name\">";
        // line 15
        echo twig_escape_filter($this->env, $this->getContext($context, 'last_name'), "html");
        echo "</label>
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"last_name\" id=\"last_name\" class=\"text\" maxlength=\"16\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<label for=\"email\">";
        // line 19
        echo twig_escape_filter($this->env, $this->getContext($context, 'email'), "html");
        echo "</label>
\t\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"email\" id=\"email\" class=\"text\" maxlength=\"16\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<label for=\"country\">";
        // line 23
        echo twig_escape_filter($this->env, $this->getContext($context, 'country'), "html");
        echo "</label>
\t\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name=\"country\" id=\"country\">
\t\t\t\t\t\t\t\t\t<option value=\"\">";
        // line 25
        echo twig_escape_filter($this->env, $this->getContext($context, 'empty_option'), "html");
        echo "</option>
\t\t\t\t\t\t\t\t\t";
        // line 26
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'country_array'));
        foreach ($context['_seq'] as $context['id'] => $context['country']) {
            // line 27
            echo "\t<option value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
            echo "\">";
            echo twig_escape_filter($this->env, $this->getContext($context, 'country'), "html");
            echo "</option>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['country'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 29
        echo "\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<label for=\"city\">";
        // line 32
        echo twig_escape_filter($this->env, $this->getContext($context, 'city'), "html");
        echo "</label>
\t\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name=\"city\" id=\"city\">
\t\t\t\t\t\t\t\t\t<option value=\"\">";
        // line 34
        echo twig_escape_filter($this->env, $this->getContext($context, 'empty_option'), "html");
        echo "</option>
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</form>
\t\t\t\t\t\t<form action=\"\" method=\"post\" enctype=\"multipart/form-data\" id=\"ImagesForm\">
\t\t\t\t\t\t\t<div id=\"image_block\">
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"1024000\">
\t\t\t\t\t\t\t\t<label for=\"photo\">";
        // line 41
        echo twig_escape_filter($this->env, $this->getContext($context, 'photo'), "html");
        echo "</label>
\t\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"file\" name=\"image_file\" id=\"image_file\" class=\"text\">
\t\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"upload_photo\" id=\"upload_photo\" value=\"Upload\" disabled=\"disabled\">
\t\t\t\t\t\t\t\t<img class=\"hide\" width=\"32\" height=\"32\" alt=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->getContext($context, 'preloader_alt_text'), "html");
        echo "\" src=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, 'image_path'), "html");
        echo "photo-loader.gif\" id=\"preloader\">
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Allowed image types: jpeg, gif, png | Maximum file size: 1 Mb</h6>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div id=\"error_image_size\" class=\"hide\">";
        // line 50
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_image_size'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_image_extension\" class=\"hide\">";
        // line 51
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_image_extension'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_image_resize\" class=\"hide\">";
        // line 52
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_image_resize'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"preview_photo\" class=\"prepend-2 hide\"></div>
\t\t\t\t\t\t</form>




\t\t\t\t\t\t<form action=\"\" method=\"post\" id=\"NotesForm\">\t
\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t<label for=\"notes\">";
        // line 61
        echo twig_escape_filter($this->env, $this->getContext($context, 'notes'), "html");
        echo " ";
        echo twig_escape_filter($this->env, $this->getContext($context, 'mess_max_length_notes'), "html");
        echo "</label>
\t\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t\t<textarea cols=\"20\" rows=\"5\" name=\"notes\" id=\"notes\" class=\"text\" maxlength=\"1500\"></textarea>
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"span-8 prepend-3\">
\t\t\t\t\t\t\t\t<input type=\"submit\" name=\"save\" id=\"save\" value=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->getContext($context, 'save'), "html");
        echo "\">
\t\t\t\t\t\t\t\t<input type=\"reset\" name=\"reset_forms\" id=\"reset_forms\" value=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->getContext($context, 'reset'), "html");
        echo "\">
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div id=\"error_empty_f_n\" class=\"hide\">";
        // line 71
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_empty_f_n'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_min_length_f_n\" class=\"hide\">";
        // line 72
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_min_length_f_n'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_max_length_f_n\" class=\"hide\">";
        // line 73
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_max_length_f_n'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_empty_l_n\" class=\"hide\">";
        // line 74
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_empty_l_n'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_min_length_l_n\" class=\"hide\">";
        // line 75
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_min_length_l_n'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_max_length_l_n\" class=\"hide\">";
        // line 76
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_max_length_l_n'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_empty_email\" class=\"hide\">";
        // line 77
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_empty_email'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_min_length_email\" class=\"hide\">";
        // line 78
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_min_length_email'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_max_length_email\" class=\"hide\">";
        // line 79
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_max_length_email'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_incorect_email\" class=\"hide\">";
        // line 80
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_incorect_email'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_empty_country\" class=\"hide\">";
        // line 81
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_empty_country'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_empty_city\" class=\"hide\">";
        // line 82
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_empty_city'), "html");
        echo "</div>
\t\t\t\t\t\t\t<div id=\"error_upload_photo\" class=\"hide\">";
        // line 83
        echo twig_escape_filter($this->env, $this->getContext($context, 'error_upload_photo'), "html");
        echo "</div>
\t\t\t\t\t\t</form>

\t\t\t\t\t</div>
\t\t\t\t\t<div id=\"add_good_message\" class=\"hide\">";
        // line 87
        echo twig_escape_filter($this->env, $this->getContext($context, 'add_good_message'), "html");
        echo "</div>
\t\t\t\t</fieldset>
\t\t\t</div>
\t\t\t<br>
\t\t\t<div class=\"span-10 prepend-9 append-0 last\">
\t\t\t\t<h3><a href=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->getContext($context, 'site_url'), "html");
        echo "book_list.php\">";
        echo twig_escape_filter($this->env, $this->getContext($context, 'back_to_book_list'), "html");
        echo "</a></h3>
\t\t\t</div>
";
    }

    public function getTemplateName()
    {
        return "add_new_client.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
