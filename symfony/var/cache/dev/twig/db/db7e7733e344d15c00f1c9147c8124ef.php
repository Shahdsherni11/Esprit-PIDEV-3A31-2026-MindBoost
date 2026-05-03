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

/* front_test/general_result.html.twig */
class __TwigTemplate_76b9f321730bddc8875f713413645daa extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "front/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front_test/general_result.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front_test/general_result.html.twig"));

        $this->parent = $this->load("front/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Résultat Général - MindBoost";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 6
        yield "<style>
    .result-layout {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 1.4rem;
    }

    .result-main-card {
        background: linear-gradient(180deg, #ffffff 0%, #f9fbff 100%);
        border: 1px solid #dbe7ff;
        border-radius: 28px;
        box-shadow: 0 18px 34px rgba(23,37,84,0.07);
        padding: 1.5rem;
    }

    .result-hero {
        background: linear-gradient(135deg, rgba(37,99,235,0.10), rgba(20,184,166,0.08));
        border: 1px solid #d8e6ff;
        border-radius: 22px;
        padding: 1.2rem;
        margin-bottom: 1.2rem;
    }

    .result-hero h4 {
        margin: 0 0 0.45rem;
        font-size: 1.35rem;
        font-weight: 900;
        color: #17253a;
    }

    .result-stats {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .result-mini {
        background: #f3f8ff;
        border: 1px solid #dce9fb;
        border-radius: 18px;
        padding: 1rem;
        text-align: center;
    }

    .result-mini-value {
        font-size: 1.7rem;
        font-weight: 900;
        color: #2563eb;
    }

    .result-mini-label {
        margin-top: 0.3rem;
        color: #6c7b95;
        font-weight: 700;
    }

    .result-category {
        background: rgba(37,99,235,0.10);
        color: #1d4ed8;
        border-radius: 18px;
        padding: 1rem 1.1rem;
        font-weight: 700;
    }

    .result-side {
        background: linear-gradient(180deg, #ffffff 0%, #f9fbff 100%);
        border: 1px solid #dbe7ff;
        border-radius: 28px;
        box-shadow: 0 18px 34px rgba(23,37,84,0.07);
        padding: 1.3rem;
        height: fit-content;
    }

    .result-side-icon {
        width: 58px;
        height: 58px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #2563eb, #06b6d4);
        color: white;
        font-size: 1.3rem;
        margin-bottom: 1rem;
        box-shadow: 0 12px 24px rgba(37,99,235,0.18);
    }

    @media (max-width: 768px) {
        .result-layout,
        .result-stats {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class=\"page-heading\">
    <h1><i class=\"fas fa-chart-pie me-2\"></i>Résultat Général</h1>
    <p>Voici le résultat de votre test général.</p>
</div>

<div class=\"result-layout\">
    <div class=\"result-main-card\">
        <div class=\"result-hero\">
            <h4>";
        // line 110
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 110, $this->source); })()), "title", [], "any", false, false, false, 110), "html", null, true);
        yield "</h4>
            <p class=\"mb-0\" style=\"color:#657790;\">
                Votre catégorie a été calculée selon vos réponses au test général.
            </p>
        </div>

        <div class=\"result-stats\">
            <div class=\"result-mini\">
                <div class=\"result-mini-value\">";
        // line 118
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalScore"]) || array_key_exists("totalScore", $context) ? $context["totalScore"] : (function () { throw new RuntimeError('Variable "totalScore" does not exist.', 118, $this->source); })()), "html", null, true);
        yield "</div>
                <div class=\"result-mini-label\">Score total</div>
            </div>

            <div class=\"result-mini\">
                <div class=\"result-mini-value\">";
        // line 123
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["percentage"]) || array_key_exists("percentage", $context) ? $context["percentage"] : (function () { throw new RuntimeError('Variable "percentage" does not exist.', 123, $this->source); })()), "html", null, true);
        yield "%</div>
                <div class=\"result-mini-label\">Pourcentage</div>
            </div>
        </div>

        <div class=\"result-category mb-4\">
            <i class=\"fas fa-circle-check me-2\"></i>
            Catégorie détectée :
            <strong>";
        // line 131
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 131, $this->source); })()), "html", null, true);
        yield "</strong>
        </div>

        <div class=\"d-flex flex-wrap gap-3\">
            <a href=\"";
        // line 135
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_user_home");
        yield "\" class=\"btn btn-primary\">
                <i class=\"fas fa-house me-2\"></i>Retour à l’espace étudiant
            </a>

            <a href=\"";
        // line 139
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_specific_test", ["category" => (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 139, $this->source); })())]), "html", null, true);
        yield "\" class=\"btn btn-success\">
                <i class=\"fas fa-layer-group me-2\"></i>Passer le test spécifique
            </a>

            <a href=\"";
        // line 143
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_test_history");
        yield "\" class=\"btn btn-secondary\">
                <i class=\"fas fa-clock-rotate-left me-2\"></i>Historique
            </a>
        </div>
    </div>

    <div class=\"result-side\">
        <div class=\"result-side-icon\">
            <i class=\"fas fa-brain\"></i>
        </div>
        <h5 class=\"fw-bold mb-3\">Test général terminé</h5>
        <p class=\"mb-0\" style=\"color:#6b7c96;\">
            Vous pouvez maintenant consulter votre historique ou passer au test spécifique correspondant à votre catégorie.
        </p>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "front_test/general_result.html.twig";
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
        return array (  257 => 143,  250 => 139,  243 => 135,  236 => 131,  225 => 123,  217 => 118,  206 => 110,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'front/base.html.twig' %}

{% block title %}Résultat Général - MindBoost{% endblock %}

{% block content %}
<style>
    .result-layout {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 1.4rem;
    }

    .result-main-card {
        background: linear-gradient(180deg, #ffffff 0%, #f9fbff 100%);
        border: 1px solid #dbe7ff;
        border-radius: 28px;
        box-shadow: 0 18px 34px rgba(23,37,84,0.07);
        padding: 1.5rem;
    }

    .result-hero {
        background: linear-gradient(135deg, rgba(37,99,235,0.10), rgba(20,184,166,0.08));
        border: 1px solid #d8e6ff;
        border-radius: 22px;
        padding: 1.2rem;
        margin-bottom: 1.2rem;
    }

    .result-hero h4 {
        margin: 0 0 0.45rem;
        font-size: 1.35rem;
        font-weight: 900;
        color: #17253a;
    }

    .result-stats {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .result-mini {
        background: #f3f8ff;
        border: 1px solid #dce9fb;
        border-radius: 18px;
        padding: 1rem;
        text-align: center;
    }

    .result-mini-value {
        font-size: 1.7rem;
        font-weight: 900;
        color: #2563eb;
    }

    .result-mini-label {
        margin-top: 0.3rem;
        color: #6c7b95;
        font-weight: 700;
    }

    .result-category {
        background: rgba(37,99,235,0.10);
        color: #1d4ed8;
        border-radius: 18px;
        padding: 1rem 1.1rem;
        font-weight: 700;
    }

    .result-side {
        background: linear-gradient(180deg, #ffffff 0%, #f9fbff 100%);
        border: 1px solid #dbe7ff;
        border-radius: 28px;
        box-shadow: 0 18px 34px rgba(23,37,84,0.07);
        padding: 1.3rem;
        height: fit-content;
    }

    .result-side-icon {
        width: 58px;
        height: 58px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #2563eb, #06b6d4);
        color: white;
        font-size: 1.3rem;
        margin-bottom: 1rem;
        box-shadow: 0 12px 24px rgba(37,99,235,0.18);
    }

    @media (max-width: 768px) {
        .result-layout,
        .result-stats {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class=\"page-heading\">
    <h1><i class=\"fas fa-chart-pie me-2\"></i>Résultat Général</h1>
    <p>Voici le résultat de votre test général.</p>
</div>

<div class=\"result-layout\">
    <div class=\"result-main-card\">
        <div class=\"result-hero\">
            <h4>{{ test.title }}</h4>
            <p class=\"mb-0\" style=\"color:#657790;\">
                Votre catégorie a été calculée selon vos réponses au test général.
            </p>
        </div>

        <div class=\"result-stats\">
            <div class=\"result-mini\">
                <div class=\"result-mini-value\">{{ totalScore }}</div>
                <div class=\"result-mini-label\">Score total</div>
            </div>

            <div class=\"result-mini\">
                <div class=\"result-mini-value\">{{ percentage }}%</div>
                <div class=\"result-mini-label\">Pourcentage</div>
            </div>
        </div>

        <div class=\"result-category mb-4\">
            <i class=\"fas fa-circle-check me-2\"></i>
            Catégorie détectée :
            <strong>{{ category }}</strong>
        </div>

        <div class=\"d-flex flex-wrap gap-3\">
            <a href=\"{{ path('front_user_home') }}\" class=\"btn btn-primary\">
                <i class=\"fas fa-house me-2\"></i>Retour à l’espace étudiant
            </a>

            <a href=\"{{ path('front_specific_test', {category: category}) }}\" class=\"btn btn-success\">
                <i class=\"fas fa-layer-group me-2\"></i>Passer le test spécifique
            </a>

            <a href=\"{{ path('user_test_history') }}\" class=\"btn btn-secondary\">
                <i class=\"fas fa-clock-rotate-left me-2\"></i>Historique
            </a>
        </div>
    </div>

    <div class=\"result-side\">
        <div class=\"result-side-icon\">
            <i class=\"fas fa-brain\"></i>
        </div>
        <h5 class=\"fw-bold mb-3\">Test général terminé</h5>
        <p class=\"mb-0\" style=\"color:#6b7c96;\">
            Vous pouvez maintenant consulter votre historique ou passer au test spécifique correspondant à votre catégorie.
        </p>
    </div>
</div>
{% endblock %}", "front_test/general_result.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/front_test/general_result.html.twig");
    }
}
