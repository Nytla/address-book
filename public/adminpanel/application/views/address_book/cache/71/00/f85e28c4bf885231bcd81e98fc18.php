<?php

/* scripts.html */
class __TwigTemplate_7100f85e28c4bf885231bcd81e98fc18 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 2
        if (($this->getContext($context, 'num') > 0)) {
            // line 3
            $context['one'] = "css";
            // line 4
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, $this->getContext($context, 'num')));
            foreach ($context['_seq'] as $context['_key'] => $context['i']) {
                // line 5
                echo "\t";
                if (($this->getAttribute($this->getContext($context, 'flag'), $this->getContext($context, 'i'), array(), "array", false) == $this->getContext($context, 'one'))) {
                    // line 6
                    echo "\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'path'), $this->getContext($context, 'i'), array(), "array", false), "html");
                    echo "\">
";
                } else {
                    // line 8
                    echo "\t<script type=\"text/javascript\" src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'path'), $this->getContext($context, 'i'), array(), "array", false), "html");
                    echo "\"></script>
";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
        }
        // line 13
        echo "\t</head>
\t<body>
\t\t<noscript><p>";
        // line 15
        echo twig_escape_filter($this->env, $this->getContext($context, 'noscript'), "html");
        echo "</p></noscript>
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
