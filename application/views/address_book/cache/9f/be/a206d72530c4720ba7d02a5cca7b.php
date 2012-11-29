<?php

/* footer.html */
class __TwigTemplate_9fbea206d72530c4720ba7d02a5cca7b extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "\t\t\t<div class=\"span-10 prepend-12 append-0 last\">&copy; ";
        echo twig_escape_filter($this->env, $this->getContext($context, 'year'), "html");
        echo "</div>
\t\t</div>
\t</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "footer.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
