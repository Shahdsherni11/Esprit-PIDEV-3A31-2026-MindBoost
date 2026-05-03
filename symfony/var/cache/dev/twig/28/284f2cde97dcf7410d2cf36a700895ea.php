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

/* security/dashboard.html.twig */
class __TwigTemplate_91679bf3f4ce6ec1234bd7bb86f1e304 extends Template
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
            'body' => [$this, 'block_body'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/dashboard.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/dashboard.html.twig"));

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
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 5
        yield "<div class=\"mb-4\">
    <h1 class=\"fw-bold mb-1\">
        <i class=\"bi bi-house me-2\" style=\"color:#6C63FF;\"></i>
        Bonjour, ";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 8, $this->source); })()), "displayName", [], "any", false, false, false, 8), "html", null, true);
        yield " !
    </h1>
    <p class=\"text-muted\">Bienvenue sur MindBoost — ";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "d/m/Y"), "html", null, true);
        yield "</p>
</div>

<div class=\"row g-4 mb-5\">
    ";
        // line 15
        yield "    <div class=\"col-md-4\">
        <div class=\"card h-100\" style=\"border:1px solid rgba(108,99,255,0.4)!important;\">
            <div class=\"card-body d-flex flex-column\">
                <div class=\"mb-3\" style=\"font-size:2.5rem;color:#6C63FF;\">
                    <i class=\"bi bi-chat-dots\"></i>
                </div>
                <h4 class=\"card-title fw-bold\">Forum & Posts</h4>
                <p class=\"card-text text-muted flex-grow-1\">
                    Échangez avec la communauté, partagez vos expériences, découvrez les achievements et sauvegardez vos publications préférées.
                </p>
                <a href=\"";
        // line 25
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_post_index");
        yield "\" class=\"btn btn-primary mt-3\">
                    <i class=\"bi bi-arrow-right-circle me-2\"></i>Accéder au Forum
                </a>
            </div>
        </div>
    </div>

    ";
        // line 33
        yield "    <div class=\"col-md-4\">
        <div class=\"card h-100\" style=\"border:1px solid rgba(46,204,113,0.4)!important;\">
            <div class=\"card-body d-flex flex-column\">
                <div class=\"mb-3\" style=\"font-size:2.5rem;color:#2ECC71;\">
                    <i class=\"bi bi-check2-square\"></i>
                </div>
                <h4 class=\"card-title fw-bold\">Gestion des Tâches</h4>
                <p class=\"card-text text-muted flex-grow-1\">
                    Planifiez et suivez vos tâches de productivité, gérez vos sous-tâches et mesurez votre score de productivité.
                </p>
                <a href=\"";
        // line 43
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tache_focus_index");
        yield "\" class=\"btn btn-success mt-3\" style=\"background:linear-gradient(to right,#2ECC71,#27AE60)!important;border:none!important;\">
                    <i class=\"bi bi-arrow-right-circle me-2\"></i>Mes Tâches
                </a>
            </div>
        </div>
    </div>

    ";
        // line 51
        yield "    <div class=\"col-md-4\">
        <div class=\"card h-100\" style=\"border:1px solid rgba(78,205,196,0.4)!important;\">
            <div class=\"card-body d-flex flex-column\">
                <div class=\"mb-3\" style=\"font-size:2.5rem;color:#4ECDC4;\">
                    <i class=\"bi bi-clipboard2-pulse\"></i>
                </div>
                <h4 class=\"card-title fw-bold\">Tests Psychologiques</h4>
                <p class=\"card-text text-muted flex-grow-1\">
                    Évaluez votre bien-être mental, passez des tests généraux et spécifiques et suivez l'évolution de votre profil psychologique.
                </p>
                <a href=\"";
        // line 61
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_user_home");
        yield "\" class=\"btn mt-3\" style=\"background:linear-gradient(to right,#4ECDC4,#45B7AA)!important;border:none!important;color:white!important;font-weight:600!important;\">
                    <i class=\"bi bi-arrow-right-circle me-2\"></i>Mes Tests
                </a>
            </div>
        </div>
    </div>
</div>

";
        // line 70
        yield "<div class=\"row g-3 mb-4\">
    <div class=\"col-12\">
        <h5 class=\"fw-bold mb-3\"><i class=\"bi bi-lightning me-2\" style=\"color:#F39C12;\"></i>Accès Rapides</h5>
    </div>
    <div class=\"col-6 col-md-3\">
        <a href=\"";
        // line 75
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_post_index");
        yield "\" class=\"text-decoration-none\">
            <div class=\"card text-center py-3\">
                <i class=\"bi bi-file-post fs-2\" style=\"color:#6C63FF;\"></i>
                <div class=\"mt-2 fw-semibold\">Parcourir les posts</div>
            </div>
        </a>
    </div>
    <div class=\"col-6 col-md-3\">
        <a href=\"";
        // line 83
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_achievement_index");
        yield "\" class=\"text-decoration-none\">
            <div class=\"card text-center py-3\">
                <i class=\"bi bi-trophy fs-2\" style=\"color:#F39C12;\"></i>
                <div class=\"mt-2 fw-semibold\">Achievements</div>
            </div>
        </a>
    </div>
    <div class=\"col-6 col-md-3\">
        <a href=\"";
        // line 91
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_statistiques");
        yield "\" class=\"text-decoration-none\">
            <div class=\"card text-center py-3\">
                <i class=\"bi bi-graph-up fs-2\" style=\"color:#4ECDC4;\"></i>
                <div class=\"mt-2 fw-semibold\">Statistiques</div>
            </div>
        </a>
    </div>
    <div class=\"col-6 col-md-3\">
        <a href=\"";
        // line 99
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile_show");
        yield "\" class=\"text-decoration-none\">
            <div class=\"card text-center py-3\">
                <i class=\"bi bi-person-circle fs-2\" style=\"color:#2ECC71;\"></i>
                <div class=\"mt-2 fw-semibold\">Mon Profil</div>
            </div>
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
        return "security/dashboard.html.twig";
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
        return array (  224 => 99,  213 => 91,  202 => 83,  191 => 75,  184 => 70,  173 => 61,  161 => 51,  151 => 43,  139 => 33,  129 => 25,  117 => 15,  110 => 10,  105 => 8,  100 => 5,  87 => 4,  64 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'front/base.html.twig' %}
{% block title %}Accueil — MindBoost{% endblock %}

{% block body %}
<div class=\"mb-4\">
    <h1 class=\"fw-bold mb-1\">
        <i class=\"bi bi-house me-2\" style=\"color:#6C63FF;\"></i>
        Bonjour, {{ user.displayName }} !
    </h1>
    <p class=\"text-muted\">Bienvenue sur MindBoost — {{ 'now'|date('d/m/Y') }}</p>
</div>

<div class=\"row g-4 mb-5\">
    {# Forum #}
    <div class=\"col-md-4\">
        <div class=\"card h-100\" style=\"border:1px solid rgba(108,99,255,0.4)!important;\">
            <div class=\"card-body d-flex flex-column\">
                <div class=\"mb-3\" style=\"font-size:2.5rem;color:#6C63FF;\">
                    <i class=\"bi bi-chat-dots\"></i>
                </div>
                <h4 class=\"card-title fw-bold\">Forum & Posts</h4>
                <p class=\"card-text text-muted flex-grow-1\">
                    Échangez avec la communauté, partagez vos expériences, découvrez les achievements et sauvegardez vos publications préférées.
                </p>
                <a href=\"{{ path('front_post_index') }}\" class=\"btn btn-primary mt-3\">
                    <i class=\"bi bi-arrow-right-circle me-2\"></i>Accéder au Forum
                </a>
            </div>
        </div>
    </div>

    {# Tâches Focus #}
    <div class=\"col-md-4\">
        <div class=\"card h-100\" style=\"border:1px solid rgba(46,204,113,0.4)!important;\">
            <div class=\"card-body d-flex flex-column\">
                <div class=\"mb-3\" style=\"font-size:2.5rem;color:#2ECC71;\">
                    <i class=\"bi bi-check2-square\"></i>
                </div>
                <h4 class=\"card-title fw-bold\">Gestion des Tâches</h4>
                <p class=\"card-text text-muted flex-grow-1\">
                    Planifiez et suivez vos tâches de productivité, gérez vos sous-tâches et mesurez votre score de productivité.
                </p>
                <a href=\"{{ path('app_tache_focus_index') }}\" class=\"btn btn-success mt-3\" style=\"background:linear-gradient(to right,#2ECC71,#27AE60)!important;border:none!important;\">
                    <i class=\"bi bi-arrow-right-circle me-2\"></i>Mes Tâches
                </a>
            </div>
        </div>
    </div>

    {# Tests Psychologiques #}
    <div class=\"col-md-4\">
        <div class=\"card h-100\" style=\"border:1px solid rgba(78,205,196,0.4)!important;\">
            <div class=\"card-body d-flex flex-column\">
                <div class=\"mb-3\" style=\"font-size:2.5rem;color:#4ECDC4;\">
                    <i class=\"bi bi-clipboard2-pulse\"></i>
                </div>
                <h4 class=\"card-title fw-bold\">Tests Psychologiques</h4>
                <p class=\"card-text text-muted flex-grow-1\">
                    Évaluez votre bien-être mental, passez des tests généraux et spécifiques et suivez l'évolution de votre profil psychologique.
                </p>
                <a href=\"{{ path('front_user_home') }}\" class=\"btn mt-3\" style=\"background:linear-gradient(to right,#4ECDC4,#45B7AA)!important;border:none!important;color:white!important;font-weight:600!important;\">
                    <i class=\"bi bi-arrow-right-circle me-2\"></i>Mes Tests
                </a>
            </div>
        </div>
    </div>
</div>

{# Quick stats row #}
<div class=\"row g-3 mb-4\">
    <div class=\"col-12\">
        <h5 class=\"fw-bold mb-3\"><i class=\"bi bi-lightning me-2\" style=\"color:#F39C12;\"></i>Accès Rapides</h5>
    </div>
    <div class=\"col-6 col-md-3\">
        <a href=\"{{ path('front_post_index') }}\" class=\"text-decoration-none\">
            <div class=\"card text-center py-3\">
                <i class=\"bi bi-file-post fs-2\" style=\"color:#6C63FF;\"></i>
                <div class=\"mt-2 fw-semibold\">Parcourir les posts</div>
            </div>
        </a>
    </div>
    <div class=\"col-6 col-md-3\">
        <a href=\"{{ path('front_achievement_index') }}\" class=\"text-decoration-none\">
            <div class=\"card text-center py-3\">
                <i class=\"bi bi-trophy fs-2\" style=\"color:#F39C12;\"></i>
                <div class=\"mt-2 fw-semibold\">Achievements</div>
            </div>
        </a>
    </div>
    <div class=\"col-6 col-md-3\">
        <a href=\"{{ path('app_statistiques') }}\" class=\"text-decoration-none\">
            <div class=\"card text-center py-3\">
                <i class=\"bi bi-graph-up fs-2\" style=\"color:#4ECDC4;\"></i>
                <div class=\"mt-2 fw-semibold\">Statistiques</div>
            </div>
        </a>
    </div>
    <div class=\"col-6 col-md-3\">
        <a href=\"{{ path('app_profile_show') }}\" class=\"text-decoration-none\">
            <div class=\"card text-center py-3\">
                <i class=\"bi bi-person-circle fs-2\" style=\"color:#2ECC71;\"></i>
                <div class=\"mt-2 fw-semibold\">Mon Profil</div>
            </div>
        </a>
    </div>
</div>
{% endblock %}
", "security/dashboard.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/security/dashboard.html.twig");
    }
}
