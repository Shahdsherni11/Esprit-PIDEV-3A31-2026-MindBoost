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

/* dashboard.html.twig */
class __TwigTemplate_05614f983324acaa71c31612804a7b7a extends Template
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
        return "back/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard.html.twig"));

        $this->parent = $this->load("back/base.html.twig", 1);
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

        yield "Dashboard - MindBoost";
        
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
        yield "<div class=\"page-heading\">
    <h1><i class=\"fas fa-chart-line me-2\"></i>Dashboard Admin</h1>
    <p>Vue d’ensemble de la plateforme et des tests disponibles.</p>
</div>

<div class=\"row g-4 mb-4\">
    <div class=\"col-md-6 col-xl-3\">
        <div class=\"stat-card\">
            <div class=\"d-flex justify-content-between align-items-start\">
                <div>
                    <div class=\"stat-number\">";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["generalTestsCount"]) || array_key_exists("generalTestsCount", $context) ? $context["generalTestsCount"] : (function () { throw new RuntimeError('Variable "generalTestsCount" does not exist.', 16, $this->source); })()), "html", null, true);
        yield "</div>
                    <div class=\"stat-label\">Tests généraux</div>
                </div>
                <i class=\"fas fa-book-open fa-2x\" style=\"color:#4D83FF;\"></i>
            </div>
        </div>
    </div>

    <div class=\"col-md-6 col-xl-3\">
        <div class=\"stat-card\">
            <div class=\"d-flex justify-content-between align-items-start\">
                <div>
                    <div class=\"stat-number\">";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["specificTestsCount"]) || array_key_exists("specificTestsCount", $context) ? $context["specificTestsCount"] : (function () { throw new RuntimeError('Variable "specificTestsCount" does not exist.', 28, $this->source); })()), "html", null, true);
        yield "</div>
                    <div class=\"stat-label\">Tests spécifiques</div>
                </div>
                <i class=\"fas fa-layer-group fa-2x\" style=\"color:#19B5FE;\"></i>
            </div>
        </div>
    </div>

    <div class=\"col-md-6 col-xl-3\">
        <div class=\"stat-card\">
            <div class=\"d-flex justify-content-between align-items-start\">
                <div>
                    <div class=\"stat-number\">";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((isset($context["generalTestsCount"]) || array_key_exists("generalTestsCount", $context) ? $context["generalTestsCount"] : (function () { throw new RuntimeError('Variable "generalTestsCount" does not exist.', 40, $this->source); })()) + (isset($context["specificTestsCount"]) || array_key_exists("specificTestsCount", $context) ? $context["specificTestsCount"] : (function () { throw new RuntimeError('Variable "specificTestsCount" does not exist.', 40, $this->source); })())), "html", null, true);
        yield "</div>
                    <div class=\"stat-label\">Total des tests</div>
                </div>
                <i class=\"fas fa-chart-pie fa-2x\" style=\"color:#00D1C7;\"></i>
            </div>
        </div>
    </div>

    <div class=\"col-md-6 col-xl-3\">
        <div class=\"stat-card\">
            <div class=\"d-flex justify-content-between align-items-start\">
                <div>
                    <div class=\"stat-number\">2026</div>
                    <div class=\"stat-label\">Session active</div>
                </div>
                <i class=\"fas fa-calendar-check fa-2x\" style=\"color:#F7B84B;\"></i>
            </div>
        </div>
    </div>
</div>

<div class=\"row g-4\">
    <div class=\"col-lg-6\">
        <a href=\"";
        // line 63
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("general_test_index");
        yield "\" class=\"quick-card\">
            <i class=\"fas fa-book-open fa-xl\" style=\"color:#4D83FF;\"></i>
            <h5>Gérer les tests généraux</h5>
            <p>Consulter, rechercher, trier et modifier les tests généraux.</p>
        </a>
    </div>

    <div class=\"col-lg-6\">
        <a href=\"";
        // line 71
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("specific_test_index");
        yield "\" class=\"quick-card\">
            <i class=\"fas fa-layer-group fa-xl\" style=\"color:#19B5FE;\"></i>
            <h5>Gérer les tests spécifiques</h5>
            <p>Filtrer par catégorie et appliquer les restrictions métier.</p>
        </a>
    </div>

    <div class=\"col-lg-6\">
        <a href=\"";
        // line 79
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("general_test_create");
        yield "\" class=\"quick-card\">
            <i class=\"fas fa-circle-plus fa-xl\" style=\"color:#00D1C7;\"></i>
            <h5>Créer un test général</h5>
            <p>Ajouter un nouveau QCM général avec questions et réponses.</p>
        </a>
    </div>

    <div class=\"col-lg-6\">
        <a href=\"";
        // line 87
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("specific_test_create");
        yield "\" class=\"quick-card\">
            <i class=\"fas fa-plus-circle fa-xl\" style=\"color:#F7B84B;\"></i>
            <h5>Créer un test spécifique</h5>
            <p>Lier un test à une catégorie et à un test général parent.</p>
        </a>
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
        return "dashboard.html.twig";
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
        return array (  201 => 87,  190 => 79,  179 => 71,  168 => 63,  142 => 40,  127 => 28,  112 => 16,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}Dashboard - MindBoost{% endblock %}

{% block content %}
<div class=\"page-heading\">
    <h1><i class=\"fas fa-chart-line me-2\"></i>Dashboard Admin</h1>
    <p>Vue d’ensemble de la plateforme et des tests disponibles.</p>
</div>

<div class=\"row g-4 mb-4\">
    <div class=\"col-md-6 col-xl-3\">
        <div class=\"stat-card\">
            <div class=\"d-flex justify-content-between align-items-start\">
                <div>
                    <div class=\"stat-number\">{{ generalTestsCount }}</div>
                    <div class=\"stat-label\">Tests généraux</div>
                </div>
                <i class=\"fas fa-book-open fa-2x\" style=\"color:#4D83FF;\"></i>
            </div>
        </div>
    </div>

    <div class=\"col-md-6 col-xl-3\">
        <div class=\"stat-card\">
            <div class=\"d-flex justify-content-between align-items-start\">
                <div>
                    <div class=\"stat-number\">{{ specificTestsCount }}</div>
                    <div class=\"stat-label\">Tests spécifiques</div>
                </div>
                <i class=\"fas fa-layer-group fa-2x\" style=\"color:#19B5FE;\"></i>
            </div>
        </div>
    </div>

    <div class=\"col-md-6 col-xl-3\">
        <div class=\"stat-card\">
            <div class=\"d-flex justify-content-between align-items-start\">
                <div>
                    <div class=\"stat-number\">{{ generalTestsCount + specificTestsCount }}</div>
                    <div class=\"stat-label\">Total des tests</div>
                </div>
                <i class=\"fas fa-chart-pie fa-2x\" style=\"color:#00D1C7;\"></i>
            </div>
        </div>
    </div>

    <div class=\"col-md-6 col-xl-3\">
        <div class=\"stat-card\">
            <div class=\"d-flex justify-content-between align-items-start\">
                <div>
                    <div class=\"stat-number\">2026</div>
                    <div class=\"stat-label\">Session active</div>
                </div>
                <i class=\"fas fa-calendar-check fa-2x\" style=\"color:#F7B84B;\"></i>
            </div>
        </div>
    </div>
</div>

<div class=\"row g-4\">
    <div class=\"col-lg-6\">
        <a href=\"{{ path('general_test_index') }}\" class=\"quick-card\">
            <i class=\"fas fa-book-open fa-xl\" style=\"color:#4D83FF;\"></i>
            <h5>Gérer les tests généraux</h5>
            <p>Consulter, rechercher, trier et modifier les tests généraux.</p>
        </a>
    </div>

    <div class=\"col-lg-6\">
        <a href=\"{{ path('specific_test_index') }}\" class=\"quick-card\">
            <i class=\"fas fa-layer-group fa-xl\" style=\"color:#19B5FE;\"></i>
            <h5>Gérer les tests spécifiques</h5>
            <p>Filtrer par catégorie et appliquer les restrictions métier.</p>
        </a>
    </div>

    <div class=\"col-lg-6\">
        <a href=\"{{ path('general_test_create') }}\" class=\"quick-card\">
            <i class=\"fas fa-circle-plus fa-xl\" style=\"color:#00D1C7;\"></i>
            <h5>Créer un test général</h5>
            <p>Ajouter un nouveau QCM général avec questions et réponses.</p>
        </a>
    </div>

    <div class=\"col-lg-6\">
        <a href=\"{{ path('specific_test_create') }}\" class=\"quick-card\">
            <i class=\"fas fa-plus-circle fa-xl\" style=\"color:#F7B84B;\"></i>
            <h5>Créer un test spécifique</h5>
            <p>Lier un test à une catégorie et à un test général parent.</p>
        </a>
    </div>
</div>
{% endblock %}", "dashboard.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/dashboard.html.twig");
    }
}
