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

/* user_progress/evolution.html.twig */
class __TwigTemplate_c716ae355efb444117799da5010e5ada extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user_progress/evolution.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user_progress/evolution.html.twig"));

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

        yield "Mon Évolution";
        
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
    .evolution-hero {
        margin-bottom: 1.5rem;
    }

    .evolution-hero h1 {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        font-size: 2.2rem;
        font-weight: 900;
        margin: 0;
    }

    .evolution-hero p {
        margin: 0.5rem 0 0;
        color: #6c7b95;
        font-size: 1.02rem;
    }

    .evolution-timeline {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .evolution-card {
        background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        box-shadow: 0 14px 30px rgba(23,37,84,0.06);
        padding: 1.2rem;
        position: relative;
        overflow: hidden;
    }

    .evolution-card::before {
        content: \"\";
        position: absolute;
        top: 0;
        left: 0;
        width: 6px;
        height: 100%;
        background: linear-gradient(180deg, #2563eb, #06b6d4);
    }

    .evolution-head {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        align-items: start;
        margin-bottom: 1rem;
    }

    .evolution-week {
        font-size: 1.28rem;
        font-weight: 900;
        color: #17253a;
    }

    .evolution-percent {
        font-size: 1.7rem;
        font-weight: 900;
        color: #2563eb;
        text-align: right;
    }

    .evolution-date {
        color: #6b7a95;
        font-weight: 700;
        font-size: 0.9rem;
    }

    .evolution-meta {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.9rem;
        margin-bottom: 1rem;
    }

    .evo-box {
        background: #f3f8ff;
        border: 1px solid #dce9fb;
        border-radius: 16px;
        padding: 0.9rem;
    }

    .evo-label {
        font-size: 0.78rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #72829c;
        font-weight: 700;
        margin-bottom: 0.3rem;
    }

    .evo-value {
        font-size: 1rem;
        font-weight: 800;
        color: #17253a;
    }

    .trend-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        padding: 0.55rem 0.9rem;
        border-radius: 999px;
        font-size: 0.86rem;
        font-weight: 800;
    }

    .trend-good {
        background: rgba(22,163,74,0.12);
        color: #15803d;
    }

    .trend-bad {
        background: rgba(239,68,68,0.12);
        color: #b91c1c;
    }

    .trend-stable {
        background: rgba(245,158,11,0.14);
        color: #a16207;
    }

    .evolution-empty {
        text-align: center;
        padding: 2.5rem 1rem;
        background: white;
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        box-shadow: 0 14px 30px rgba(23,37,84,0.06);
    }

    .evolution-empty i {
        font-size: 2.6rem;
        color: #2563eb;
        margin-bottom: 1rem;
    }
</style>

<div class=\"evolution-hero\">
    <h1><i class=\"fas fa-arrow-trend-up\"></i>Suivi d’évolution</h1>
    <p>Suivez votre progression semaine après semaine dans une interface plus lisible et plus visuelle.</p>
</div>

";
        // line 154
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["evolution"]) || array_key_exists("evolution", $context) ? $context["evolution"] : (function () { throw new RuntimeError('Variable "evolution" does not exist.', 154, $this->source); })())) > 0)) {
            // line 155
            yield "    <div class=\"evolution-timeline\">
        ";
            // line 156
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["evolution"]) || array_key_exists("evolution", $context) ? $context["evolution"] : (function () { throw new RuntimeError('Variable "evolution" does not exist.', 156, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 157
                yield "            <div class=\"evolution-card\">
                <div class=\"evolution-head\">
                    <div>
                        <div class=\"evolution-week\">Semaine ";
                // line 160
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "week", [], "any", false, false, false, 160), "html", null, true);
                yield "</div>
                        <div class=\"evolution-date\">";
                // line 161
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "date", [], "any", false, false, false, 161), "d/m/Y"), "html", null, true);
                yield "</div>
                    </div>

                    <div class=\"evolution-percent\">
                        ";
                // line 165
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "percentage", [], "any", false, false, false, 165), "html", null, true);
                yield "%
                    </div>
                </div>

                <div class=\"evolution-meta\">
                    <div class=\"evo-box\">
                        <div class=\"evo-label\">Catégorie</div>
                        <div class=\"evo-value\">";
                // line 172
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "category", [], "any", false, false, false, 172), "html", null, true);
                yield "</div>
                    </div>

                    <div class=\"evo-box\">
                        <div class=\"evo-label\">Niveau</div>
                        <div class=\"evo-value\">";
                // line 177
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "level", [], "any", false, false, false, 177), "html", null, true);
                yield "</div>
                    </div>
                </div>

                ";
                // line 181
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["row"], "trend", [], "any", false, false, false, 181) == "amélioration")) {
                    // line 182
                    yield "                    <span class=\"trend-badge trend-good\">
                        <i class=\"fas fa-arrow-up\"></i>
                        Amélioration (+";
                    // line 184
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "difference", [], "any", false, false, false, 184), "html", null, true);
                    yield ")
                    </span>
                ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 186
$context["row"], "trend", [], "any", false, false, false, 186) == "aggravation")) {
                    // line 187
                    yield "                    <span class=\"trend-badge trend-bad\">
                        <i class=\"fas fa-arrow-down\"></i>
                        Aggravation (";
                    // line 189
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "difference", [], "any", false, false, false, 189), "html", null, true);
                    yield ")
                    </span>
                ";
                } else {
                    // line 192
                    yield "                    <span class=\"trend-badge trend-stable\">
                        <i class=\"fas fa-minus\"></i>
                        Stable
                    </span>
                ";
                }
                // line 197
                yield "            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['row'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 199
            yield "    </div>
";
        } else {
            // line 201
            yield "    <div class=\"evolution-empty\">
        <i class=\"fas fa-chart-line\"></i>
        <h3>Aucune donnée d’évolution</h3>
        <p class=\"mb-0\">Passez plusieurs tests pour voir apparaître votre progression.</p>
    </div>
";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "user_progress/evolution.html.twig";
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
        return array (  341 => 201,  337 => 199,  330 => 197,  323 => 192,  317 => 189,  313 => 187,  311 => 186,  306 => 184,  302 => 182,  300 => 181,  293 => 177,  285 => 172,  275 => 165,  268 => 161,  264 => 160,  259 => 157,  255 => 156,  252 => 155,  250 => 154,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'front/base.html.twig' %}

{% block title %}Mon Évolution{% endblock %}

{% block content %}
<style>
    .evolution-hero {
        margin-bottom: 1.5rem;
    }

    .evolution-hero h1 {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        font-size: 2.2rem;
        font-weight: 900;
        margin: 0;
    }

    .evolution-hero p {
        margin: 0.5rem 0 0;
        color: #6c7b95;
        font-size: 1.02rem;
    }

    .evolution-timeline {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .evolution-card {
        background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        box-shadow: 0 14px 30px rgba(23,37,84,0.06);
        padding: 1.2rem;
        position: relative;
        overflow: hidden;
    }

    .evolution-card::before {
        content: \"\";
        position: absolute;
        top: 0;
        left: 0;
        width: 6px;
        height: 100%;
        background: linear-gradient(180deg, #2563eb, #06b6d4);
    }

    .evolution-head {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        align-items: start;
        margin-bottom: 1rem;
    }

    .evolution-week {
        font-size: 1.28rem;
        font-weight: 900;
        color: #17253a;
    }

    .evolution-percent {
        font-size: 1.7rem;
        font-weight: 900;
        color: #2563eb;
        text-align: right;
    }

    .evolution-date {
        color: #6b7a95;
        font-weight: 700;
        font-size: 0.9rem;
    }

    .evolution-meta {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.9rem;
        margin-bottom: 1rem;
    }

    .evo-box {
        background: #f3f8ff;
        border: 1px solid #dce9fb;
        border-radius: 16px;
        padding: 0.9rem;
    }

    .evo-label {
        font-size: 0.78rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #72829c;
        font-weight: 700;
        margin-bottom: 0.3rem;
    }

    .evo-value {
        font-size: 1rem;
        font-weight: 800;
        color: #17253a;
    }

    .trend-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        padding: 0.55rem 0.9rem;
        border-radius: 999px;
        font-size: 0.86rem;
        font-weight: 800;
    }

    .trend-good {
        background: rgba(22,163,74,0.12);
        color: #15803d;
    }

    .trend-bad {
        background: rgba(239,68,68,0.12);
        color: #b91c1c;
    }

    .trend-stable {
        background: rgba(245,158,11,0.14);
        color: #a16207;
    }

    .evolution-empty {
        text-align: center;
        padding: 2.5rem 1rem;
        background: white;
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        box-shadow: 0 14px 30px rgba(23,37,84,0.06);
    }

    .evolution-empty i {
        font-size: 2.6rem;
        color: #2563eb;
        margin-bottom: 1rem;
    }
</style>

<div class=\"evolution-hero\">
    <h1><i class=\"fas fa-arrow-trend-up\"></i>Suivi d’évolution</h1>
    <p>Suivez votre progression semaine après semaine dans une interface plus lisible et plus visuelle.</p>
</div>

{% if evolution|length > 0 %}
    <div class=\"evolution-timeline\">
        {% for row in evolution %}
            <div class=\"evolution-card\">
                <div class=\"evolution-head\">
                    <div>
                        <div class=\"evolution-week\">Semaine {{ row.week }}</div>
                        <div class=\"evolution-date\">{{ row.date|date('d/m/Y') }}</div>
                    </div>

                    <div class=\"evolution-percent\">
                        {{ row.percentage }}%
                    </div>
                </div>

                <div class=\"evolution-meta\">
                    <div class=\"evo-box\">
                        <div class=\"evo-label\">Catégorie</div>
                        <div class=\"evo-value\">{{ row.category }}</div>
                    </div>

                    <div class=\"evo-box\">
                        <div class=\"evo-label\">Niveau</div>
                        <div class=\"evo-value\">{{ row.level }}</div>
                    </div>
                </div>

                {% if row.trend == 'amélioration' %}
                    <span class=\"trend-badge trend-good\">
                        <i class=\"fas fa-arrow-up\"></i>
                        Amélioration (+{{ row.difference }})
                    </span>
                {% elseif row.trend == 'aggravation' %}
                    <span class=\"trend-badge trend-bad\">
                        <i class=\"fas fa-arrow-down\"></i>
                        Aggravation ({{ row.difference }})
                    </span>
                {% else %}
                    <span class=\"trend-badge trend-stable\">
                        <i class=\"fas fa-minus\"></i>
                        Stable
                    </span>
                {% endif %}
            </div>
        {% endfor %}
    </div>
{% else %}
    <div class=\"evolution-empty\">
        <i class=\"fas fa-chart-line\"></i>
        <h3>Aucune donnée d’évolution</h3>
        <p class=\"mb-0\">Passez plusieurs tests pour voir apparaître votre progression.</p>
    </div>
{% endif %}
{% endblock %}", "user_progress/evolution.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/user_progress/evolution.html.twig");
    }
}
