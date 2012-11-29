<?php

/* scripts.html */
class __TwigTemplate_47f5cbc3cf15e8bd0c2c905982363349 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 2
        if (($this->getContext($context, 'css_path') == true)) {
            // line 3
            echo "\t\t<!-- CSS file(s) START -->
";
            // line 4
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'css_path'));
            foreach ($context['_seq'] as $context['id'] => $context['value']) {
                // line 5
                echo "\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'css_path'), $this->getContext($context, 'id'), array(), "array", false), "html");
                echo "\">
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['id'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 7
            echo "\t\t<!-- CSS file(s) FINISH -->
";
        }
        // line 11
        if (($this->getContext($context, 'js_path') == true)) {
            // line 12
            echo "\t\t<!-- JavaScript file(s) START -->
";
            // line 13
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'js_path'));
            foreach ($context['_seq'] as $context['id'] => $context['value']) {
                // line 14
                echo "\t\t<script type=\"text/javascript\" src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'js_path'), $this->getContext($context, 'id'), array(), "array", false), "html");
                echo "\"></script>
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['id'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 16
            echo "\t\t<!-- JavaScript file(s) FINISH -->
";
        }
        // line 19
        echo "\t</head>
\t<body>
\t\t<noscript><div class=\"span-20 prepend-17 append-0 last\"><h3>";
        // line 21
        echo twig_escape_filter($this->env, $this->getContext($context, 'noscript'), "html");
        echo "</h3></div></noscript>
\t\t<div class=\"container showgrid\">
";
    }

    public function getTemplateName()
    {
        return "scripts.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
