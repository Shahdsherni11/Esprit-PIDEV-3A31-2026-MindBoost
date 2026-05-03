<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* emails/reminder_test.html.twig */
class __TwigTemplate_54c92cee8f8a895a8783fc45e92616e4 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/reminder_test.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/reminder_test.html.twig"));

        // line 1
        yield "<h2>Bonjour ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["userName"]) || array_key_exists("userName", $context) ? $context["userName"] : (function () { throw new RuntimeError('Variable "userName" does not exist.', 1, $this->source); })()), "html", null, true);
        yield ",</h2>
<p>Petit rappel bienveillant 💙 : pensez à passer votre test MindBoost.</p>
<p>
    <a href=\"";
        // line 4
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["testUrl"]) || array_key_exists("testUrl", $context) ? $context["testUrl"] : (function () { throw new RuntimeError('Variable "testUrl" does not exist.', 4, $this->source); })()), "html", null, true);
        yield "\" style=\"background:#2563eb;color:#fff;padding:10px 14px;border-radius:8px;text-decoration:none;\">
        Passer le test maintenant
    </a>
</p>
<p>Merci 💙 ,<br>L'équipe MindBoost</p>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "emails/reminder_test.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  55 => 4,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<h2>Bonjour {{ userName }},</h2>
<p>Petit rappel bienveillant 💙 : pensez à passer votre test MindBoost.</p>
<p>
    <a href=\"{{ testUrl }}\" style=\"background:#2563eb;color:#fff;padding:10px 14px;border-radius:8px;text-decoration:none;\">
        Passer le test maintenant
    </a>
</p>
<p>Merci 💙 ,<br>L'équipe MindBoost</p>
", "emails/reminder_test.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/emails/reminder_test.html.twig");
    }
}
