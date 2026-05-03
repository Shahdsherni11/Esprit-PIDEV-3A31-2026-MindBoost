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

/* admin_statistics/index.html.twig */
class __TwigTemplate_ebf8086240fa95ec7a6808a888c0c877 extends Template
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
            'javascripts' => [$this, 'block_javascripts'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_statistics/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_statistics/index.html.twig"));

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

        yield "Statistiques Admin";
        
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
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .kpi-card {
        background: linear-gradient(180deg, rgba(17,32,61,0.98), rgba(21,40,76,0.98));
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 24px;
        padding: 1.2rem;
        box-shadow: 0 16px 36px rgba(0,0,0,0.20);
    }

    .kpi-value {
        font-size: 2rem;
        font-weight: 900;
        color: white;
    }

    .kpi-label {
        margin-top: 0.35rem;
        color: #aab6d3;
        font-weight: 600;
    }

    .chart-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.2rem;
    }

    .chart-card {
        background: white;
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        padding: 1.2rem;
        box-shadow: 0 14px 30px rgba(8,26,58,0.08);
    }

    .chart-title {
        font-size: 1.05rem;
        font-weight: 800;
        color: #17253a;
        margin-bottom: 1rem;
    }

    .actions-wrap {
        margin: 1rem 0 1.4rem 0;
    }

    @media (max-width: 1100px) {
        .stats-grid, .chart-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 768px) {
        .stats-grid, .chart-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class=\"page-heading\">
    <h1><i class=\"fas fa-chart-pie me-2\"></i>Statistiques Admin</h1>
    <p>Nombre de personnes stressées, niveaux détectés, tranches de score et évolution hebdomadaire.</p>
</div>

";
        // line 77
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 77, $this->source); })()), "flashes", ["success"], "method", false, false, false, 77));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 78
            yield "    <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
        <i class=\"fas fa-circle-check me-2\"></i>";
            // line 79
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
        <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\"></button>
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 83
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 83, $this->source); })()), "flashes", ["error"], "method", false, false, false, 83));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 84
            yield "    <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
        <i class=\"fas fa-circle-xmark me-2\"></i>";
            // line 85
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
        <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\"></button>
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 89
        yield "
<div class=\"actions-wrap\">
    <form method=\"POST\" action=\"";
        // line 91
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_statistics_send_reminder");
        yield "\">
        <button type=\"submit\" class=\"btn btn-warning\">
            <i class=\"fas fa-envelope me-2\"></i>Envoyer rappel test aux utilisateurs
        </button>
    </form>
</div>

<div class=\"stats-grid\">
    <div class=\"kpi-card\">
        <div class=\"kpi-value\">";
        // line 100
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 100, $this->source); })()), "kpis", [], "any", false, false, false, 100), "total_general_results", [], "any", false, false, false, 100), "html", null, true);
        yield "</div>
        <div class=\"kpi-label\">Tests généraux passés</div>
    </div>
    <div class=\"kpi-card\">
        <div class=\"kpi-value\">";
        // line 104
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 104, $this->source); })()), "kpis", [], "any", false, false, false, 104), "total_specific_results", [], "any", false, false, false, 104), "html", null, true);
        yield "</div>
        <div class=\"kpi-label\">Tests spécifiques passés</div>
    </div>
    <div class=\"kpi-card\">
        <div class=\"kpi-value\">";
        // line 108
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 108, $this->source); })()), "kpis", [], "any", false, false, false, 108), "total_students_tested", [], "any", false, false, false, 108), "html", null, true);
        yield "</div>
        <div class=\"kpi-label\">Étudiants testés</div>
    </div>
    <div class=\"kpi-card\">
        <div class=\"kpi-value\">";
        // line 112
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 112, $this->source); })()), "kpis", [], "any", false, false, false, 112), "average_general_score", [], "any", false, false, false, 112), "html", null, true);
        yield "%</div>
        <div class=\"kpi-label\">Moyenne générale</div>
    </div>
</div>

<div class=\"chart-grid\">
    <div class=\"chart-card\">
        <div class=\"chart-title\">Répartition par catégorie</div>
        ";
        // line 120
        yield $this->extensions['Symfony\UX\Chartjs\Twig\ChartExtension']->renderChart((isset($context["categoryChart"]) || array_key_exists("categoryChart", $context) ? $context["categoryChart"] : (function () { throw new RuntimeError('Variable "categoryChart" does not exist.', 120, $this->source); })()));
        yield "
    </div>

    <div class=\"chart-card\">
        <div class=\"chart-title\">Répartition par niveau</div>
        ";
        // line 125
        yield $this->extensions['Symfony\UX\Chartjs\Twig\ChartExtension']->renderChart((isset($context["levelChart"]) || array_key_exists("levelChart", $context) ? $context["levelChart"] : (function () { throw new RuntimeError('Variable "levelChart" does not exist.', 125, $this->source); })()));
        yield "
    </div>

    <div class=\"chart-card\">
        <div class=\"chart-title\">Tranches de score</div>
        ";
        // line 130
        yield $this->extensions['Symfony\UX\Chartjs\Twig\ChartExtension']->renderChart((isset($context["scoreRangeChart"]) || array_key_exists("scoreRangeChart", $context) ? $context["scoreRangeChart"] : (function () { throw new RuntimeError('Variable "scoreRangeChart" does not exist.', 130, $this->source); })()));
        yield "
    </div>

    <div class=\"chart-card\">
        <div class=\"chart-title\">Tests passés par semaine</div>
        ";
        // line 135
        yield $this->extensions['Symfony\UX\Chartjs\Twig\ChartExtension']->renderChart((isset($context["weeklyChart"]) || array_key_exists("weeklyChart", $context) ? $context["weeklyChart"] : (function () { throw new RuntimeError('Variable "weeklyChart" does not exist.', 135, $this->source); })()));
        yield "
    </div>
</div>

<div class=\"chart-grid mt-4\">
    <div class=\"chart-card\">
        <div class=\"chart-title\">Tests généraux les plus utilisés</div>
        ";
        // line 142
        yield $this->extensions['Symfony\UX\Chartjs\Twig\ChartExtension']->renderChart((isset($context["generalUsageChart"]) || array_key_exists("generalUsageChart", $context) ? $context["generalUsageChart"] : (function () { throw new RuntimeError('Variable "generalUsageChart" does not exist.', 142, $this->source); })()));
        yield "
    </div>

    <div class=\"chart-card\">
        <div class=\"chart-title\">Tests spécifiques les plus utilisés</div>
        ";
        // line 147
        yield $this->extensions['Symfony\UX\Chartjs\Twig\ChartExtension']->renderChart((isset($context["specificUsageChart"]) || array_key_exists("specificUsageChart", $context) ? $context["specificUsageChart"] : (function () { throw new RuntimeError('Variable "specificUsageChart" does not exist.', 147, $this->source); })()));
        yield "
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 152
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 153
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
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
        return "admin_statistics/index.html.twig";
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
        return array (  326 => 153,  313 => 152,  298 => 147,  290 => 142,  280 => 135,  272 => 130,  264 => 125,  256 => 120,  245 => 112,  238 => 108,  231 => 104,  224 => 100,  212 => 91,  208 => 89,  198 => 85,  195 => 84,  191 => 83,  181 => 79,  178 => 78,  174 => 77,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}Statistiques Admin{% endblock %}

{% block content %}
<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .kpi-card {
        background: linear-gradient(180deg, rgba(17,32,61,0.98), rgba(21,40,76,0.98));
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 24px;
        padding: 1.2rem;
        box-shadow: 0 16px 36px rgba(0,0,0,0.20);
    }

    .kpi-value {
        font-size: 2rem;
        font-weight: 900;
        color: white;
    }

    .kpi-label {
        margin-top: 0.35rem;
        color: #aab6d3;
        font-weight: 600;
    }

    .chart-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.2rem;
    }

    .chart-card {
        background: white;
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        padding: 1.2rem;
        box-shadow: 0 14px 30px rgba(8,26,58,0.08);
    }

    .chart-title {
        font-size: 1.05rem;
        font-weight: 800;
        color: #17253a;
        margin-bottom: 1rem;
    }

    .actions-wrap {
        margin: 1rem 0 1.4rem 0;
    }

    @media (max-width: 1100px) {
        .stats-grid, .chart-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 768px) {
        .stats-grid, .chart-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class=\"page-heading\">
    <h1><i class=\"fas fa-chart-pie me-2\"></i>Statistiques Admin</h1>
    <p>Nombre de personnes stressées, niveaux détectés, tranches de score et évolution hebdomadaire.</p>
</div>

{% for message in app.flashes('success') %}
    <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
        <i class=\"fas fa-circle-check me-2\"></i>{{ message }}
        <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\"></button>
    </div>
{% endfor %}
{% for message in app.flashes('error') %}
    <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
        <i class=\"fas fa-circle-xmark me-2\"></i>{{ message }}
        <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\"></button>
    </div>
{% endfor %}

<div class=\"actions-wrap\">
    <form method=\"POST\" action=\"{{ path('admin_statistics_send_reminder') }}\">
        <button type=\"submit\" class=\"btn btn-warning\">
            <i class=\"fas fa-envelope me-2\"></i>Envoyer rappel test aux utilisateurs
        </button>
    </form>
</div>

<div class=\"stats-grid\">
    <div class=\"kpi-card\">
        <div class=\"kpi-value\">{{ stats.kpis.total_general_results }}</div>
        <div class=\"kpi-label\">Tests généraux passés</div>
    </div>
    <div class=\"kpi-card\">
        <div class=\"kpi-value\">{{ stats.kpis.total_specific_results }}</div>
        <div class=\"kpi-label\">Tests spécifiques passés</div>
    </div>
    <div class=\"kpi-card\">
        <div class=\"kpi-value\">{{ stats.kpis.total_students_tested }}</div>
        <div class=\"kpi-label\">Étudiants testés</div>
    </div>
    <div class=\"kpi-card\">
        <div class=\"kpi-value\">{{ stats.kpis.average_general_score }}%</div>
        <div class=\"kpi-label\">Moyenne générale</div>
    </div>
</div>

<div class=\"chart-grid\">
    <div class=\"chart-card\">
        <div class=\"chart-title\">Répartition par catégorie</div>
        {{ render_chart(categoryChart) }}
    </div>

    <div class=\"chart-card\">
        <div class=\"chart-title\">Répartition par niveau</div>
        {{ render_chart(levelChart) }}
    </div>

    <div class=\"chart-card\">
        <div class=\"chart-title\">Tranches de score</div>
        {{ render_chart(scoreRangeChart) }}
    </div>

    <div class=\"chart-card\">
        <div class=\"chart-title\">Tests passés par semaine</div>
        {{ render_chart(weeklyChart) }}
    </div>
</div>

<div class=\"chart-grid mt-4\">
    <div class=\"chart-card\">
        <div class=\"chart-title\">Tests généraux les plus utilisés</div>
        {{ render_chart(generalUsageChart) }}
    </div>

    <div class=\"chart-card\">
        <div class=\"chart-title\">Tests spécifiques les plus utilisés</div>
        {{ render_chart(specificUsageChart) }}
    </div>
</div>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
{% endblock %}", "admin_statistics/index.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/admin_statistics/index.html.twig");
    }
}
