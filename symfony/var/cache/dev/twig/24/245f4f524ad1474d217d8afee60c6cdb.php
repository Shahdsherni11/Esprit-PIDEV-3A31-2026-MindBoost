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

/* home/index.html.twig */
class __TwigTemplate_36f092f4d213c490681a89fa17c674e7 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $this->parent = $this->load("front/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 2
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

        yield "Accueil — MindBoost";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 4
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

        // line 5
        yield "<div class=\"page-heading\">
    <h1><i class=\"fas fa-brain me-2\"></i>Tableau de bord</h1>
    <p>Bienvenue sur MindBoost — votre espace de productivité et bien-être.</p>
</div>

<div class=\"row g-4 mb-4\">
    <div class=\"col-sm-6 col-lg-3\">
        <div class=\"card text-center p-3\">
            <div style=\"font-size:2rem;font-weight:900;color:var(--primary);\">";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalTaches"]) || array_key_exists("totalTaches", $context) ? $context["totalTaches"] : (function () { throw new RuntimeError('Variable "totalTaches" does not exist.', 13, $this->source); })()), "html", null, true);
        yield "</div>
            <div style=\"color:var(--text-soft);font-size:.9rem;\">Tâches au total</div>
        </div>
    </div>
    <div class=\"col-sm-6 col-lg-3\">
        <div class=\"card text-center p-3\">
            <div style=\"font-size:2rem;font-weight:900;color:#16a34a;\">";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["tachesTerminees"]) || array_key_exists("tachesTerminees", $context) ? $context["tachesTerminees"] : (function () { throw new RuntimeError('Variable "tachesTerminees" does not exist.', 19, $this->source); })()), "html", null, true);
        yield "</div>
            <div style=\"color:var(--text-soft);font-size:.9rem;\">Terminées</div>
        </div>
    </div>
    <div class=\"col-sm-6 col-lg-3\">
        <div class=\"card text-center p-3\">
            <div style=\"font-size:2rem;font-weight:900;color:#2563eb;\">";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["tachesEnCours"]) || array_key_exists("tachesEnCours", $context) ? $context["tachesEnCours"] : (function () { throw new RuntimeError('Variable "tachesEnCours" does not exist.', 25, $this->source); })()), "html", null, true);
        yield "</div>
            <div style=\"color:var(--text-soft);font-size:.9rem;\">En cours</div>
        </div>
    </div>
    <div class=\"col-sm-6 col-lg-3\">
        <div class=\"card text-center p-3\">
            <div style=\"font-size:2rem;font-weight:900;color:var(--secondary);\">";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalSousTaches"]) || array_key_exists("totalSousTaches", $context) ? $context["totalSousTaches"] : (function () { throw new RuntimeError('Variable "totalSousTaches" does not exist.', 31, $this->source); })()), "html", null, true);
        yield "</div>
            <div style=\"color:var(--text-soft);font-size:.9rem;\">Sous-tâches</div>
        </div>
    </div>
</div>

<div class=\"row g-4 mb-4\">
    <div class=\"col-md-6\">
        <div class=\"card p-3\">
            <div style=\"font-weight:800;margin-bottom:.75rem;\"><i class=\"fas fa-chart-line me-2 text-primary\"></i>Progression globale</div>
            <div class=\"progress\" style=\"height:14px;border-radius:999px;background:rgba(37,99,235,0.1);\">
                <div class=\"progress-bar\" role=\"progressbar\" style=\"width:";
        // line 42
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["progression"]) || array_key_exists("progression", $context) ? $context["progression"] : (function () { throw new RuntimeError('Variable "progression" does not exist.', 42, $this->source); })()), "html", null, true);
        yield "%;background:linear-gradient(90deg,#2563eb,#3b82f6);border-radius:999px;\" aria-valuenow=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["progression"]) || array_key_exists("progression", $context) ? $context["progression"] : (function () { throw new RuntimeError('Variable "progression" does not exist.', 42, $this->source); })()), "html", null, true);
        yield "\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>
            </div>
            <div style=\"margin-top:.5rem;color:var(--text-soft);font-size:.9rem;\">";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["progression"]) || array_key_exists("progression", $context) ? $context["progression"] : (function () { throw new RuntimeError('Variable "progression" does not exist.', 44, $this->source); })()), "html", null, true);
        yield "% des tâches terminées</div>
        </div>
    </div>
    <div class=\"col-md-6\">
        <div class=\"card p-3\">
            <div style=\"font-weight:800;margin-bottom:.75rem;\"><i class=\"fas fa-star me-2 text-warning\"></i>Score de productivité moyen</div>
            <div style=\"font-size:2.5rem;font-weight:900;color:var(--primary);\">";
        // line 50
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["scoreMoyen"]) || array_key_exists("scoreMoyen", $context) ? $context["scoreMoyen"] : (function () { throw new RuntimeError('Variable "scoreMoyen" does not exist.', 50, $this->source); })()), "html", null, true);
        yield "<span style=\"font-size:1rem;color:var(--text-soft);\">/100</span></div>
        </div>
    </div>
</div>

<div class=\"d-flex gap-3 flex-wrap\">
    <a href=\"";
        // line 56
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tache_focus_index");
        yield "\" class=\"btn btn-primary\">
        <i class=\"fas fa-bullseye me-2\"></i>Voir mes tâches
    </a>
    <a href=\"";
        // line 59
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tache_focus_new");
        yield "\" class=\"btn btn-success\">
        <i class=\"fas fa-plus me-2\"></i>Nouvelle tâche
    </a>
    <a href=\"";
        // line 62
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_post_index");
        yield "\" class=\"btn btn-secondary\">
        <i class=\"fas fa-comments me-2\"></i>Forum
    </a>
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
        return "home/index.html.twig";
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
        return array (  188 => 62,  182 => 59,  176 => 56,  167 => 50,  158 => 44,  151 => 42,  137 => 31,  128 => 25,  119 => 19,  110 => 13,  100 => 5,  87 => 4,  64 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'front/base.html.twig' %}
{% block title %}Accueil — MindBoost{% endblock %}

{% block content %}
<div class=\"page-heading\">
    <h1><i class=\"fas fa-brain me-2\"></i>Tableau de bord</h1>
    <p>Bienvenue sur MindBoost — votre espace de productivité et bien-être.</p>
</div>

<div class=\"row g-4 mb-4\">
    <div class=\"col-sm-6 col-lg-3\">
        <div class=\"card text-center p-3\">
            <div style=\"font-size:2rem;font-weight:900;color:var(--primary);\">{{ totalTaches }}</div>
            <div style=\"color:var(--text-soft);font-size:.9rem;\">Tâches au total</div>
        </div>
    </div>
    <div class=\"col-sm-6 col-lg-3\">
        <div class=\"card text-center p-3\">
            <div style=\"font-size:2rem;font-weight:900;color:#16a34a;\">{{ tachesTerminees }}</div>
            <div style=\"color:var(--text-soft);font-size:.9rem;\">Terminées</div>
        </div>
    </div>
    <div class=\"col-sm-6 col-lg-3\">
        <div class=\"card text-center p-3\">
            <div style=\"font-size:2rem;font-weight:900;color:#2563eb;\">{{ tachesEnCours }}</div>
            <div style=\"color:var(--text-soft);font-size:.9rem;\">En cours</div>
        </div>
    </div>
    <div class=\"col-sm-6 col-lg-3\">
        <div class=\"card text-center p-3\">
            <div style=\"font-size:2rem;font-weight:900;color:var(--secondary);\">{{ totalSousTaches }}</div>
            <div style=\"color:var(--text-soft);font-size:.9rem;\">Sous-tâches</div>
        </div>
    </div>
</div>

<div class=\"row g-4 mb-4\">
    <div class=\"col-md-6\">
        <div class=\"card p-3\">
            <div style=\"font-weight:800;margin-bottom:.75rem;\"><i class=\"fas fa-chart-line me-2 text-primary\"></i>Progression globale</div>
            <div class=\"progress\" style=\"height:14px;border-radius:999px;background:rgba(37,99,235,0.1);\">
                <div class=\"progress-bar\" role=\"progressbar\" style=\"width:{{ progression }}%;background:linear-gradient(90deg,#2563eb,#3b82f6);border-radius:999px;\" aria-valuenow=\"{{ progression }}\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>
            </div>
            <div style=\"margin-top:.5rem;color:var(--text-soft);font-size:.9rem;\">{{ progression }}% des tâches terminées</div>
        </div>
    </div>
    <div class=\"col-md-6\">
        <div class=\"card p-3\">
            <div style=\"font-weight:800;margin-bottom:.75rem;\"><i class=\"fas fa-star me-2 text-warning\"></i>Score de productivité moyen</div>
            <div style=\"font-size:2.5rem;font-weight:900;color:var(--primary);\">{{ scoreMoyen }}<span style=\"font-size:1rem;color:var(--text-soft);\">/100</span></div>
        </div>
    </div>
</div>

<div class=\"d-flex gap-3 flex-wrap\">
    <a href=\"{{ path('app_tache_focus_index') }}\" class=\"btn btn-primary\">
        <i class=\"fas fa-bullseye me-2\"></i>Voir mes tâches
    </a>
    <a href=\"{{ path('app_tache_focus_new') }}\" class=\"btn btn-success\">
        <i class=\"fas fa-plus me-2\"></i>Nouvelle tâche
    </a>
    <a href=\"{{ path('front_post_index') }}\" class=\"btn btn-secondary\">
        <i class=\"fas fa-comments me-2\"></i>Forum
    </a>
</div>
{% endblock %}
", "home/index.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/home/index.html.twig");
    }
}
