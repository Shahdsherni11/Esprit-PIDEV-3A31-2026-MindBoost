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

/* user_progress/history.html.twig */
class __TwigTemplate_6ce8b013ba77db3ce43fed30e844c097 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user_progress/history.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user_progress/history.html.twig"));

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

        yield "Mon Historique";
        
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
    .history-hero {
        margin-bottom: 1.5rem;
    }

    .history-hero h1 {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        font-size: 2.2rem;
        font-weight: 900;
        margin: 0;
    }

    .history-hero p {
        margin: 0.5rem 0 0;
        color: #6c7b95;
        font-size: 1.02rem;
    }

    .history-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 1.2rem;
    }

    .history-card {
        background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        box-shadow: 0 14px 30px rgba(23,37,84,0.06);
        padding: 1.2rem;
    }

    .history-top {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        align-items: start;
        margin-bottom: 1rem;
    }

    .history-type {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 0.85rem;
        border-radius: 999px;
        font-size: 0.82rem;
        font-weight: 800;
        text-transform: capitalize;
    }

    .history-type.general {
        background: rgba(37,99,235,0.12);
        color: #2563eb;
    }

    .history-type.specific {
        background: rgba(20,184,166,0.12);
        color: #0f9e8f;
    }

    .history-date {
        text-align: right;
        color: #667892;
        font-weight: 700;
        font-size: 0.92rem;
    }

    .history-title {
        font-size: 1.18rem;
        font-weight: 900;
        color: #17253a;
        margin-bottom: 1rem;
        line-height: 1.4;
    }

    .history-meta {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.8rem;
    }

    .meta-tile {
        background: #f3f8ff;
        border: 1px solid #dce9fb;
        border-radius: 16px;
        padding: 0.85rem;
    }

    .meta-tile-label {
        font-size: 0.78rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #6f819b;
        font-weight: 700;
        margin-bottom: 0.3rem;
    }

    .meta-tile-value {
        font-size: 1rem;
        font-weight: 800;
        color: #17253a;
    }

    .history-empty {
        text-align: center;
        padding: 2.5rem 1rem;
        background: white;
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        box-shadow: 0 14px 30px rgba(23,37,84,0.06);
    }

    .history-empty i {
        font-size: 2.6rem;
        color: #2563eb;
        margin-bottom: 1rem;
    }
</style>

<div class=\"history-hero\">
    <h1><i class=\"fas fa-clock-rotate-left\"></i>Historique personnel</h1>
    <p>Retrouvez tous vos tests passés, vos scores et vos résultats dans une vue plus claire.</p>
</div>
<div class=\"mb-4\">
    <a href=\"";
        // line 133
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_history_pdf");
        yield "\" class=\"btn btn-primary\">
        <i class=\"fas fa-file-pdf me-2\"></i>Exporter mon historique PDF
    </a>
</div>
";
        // line 137
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["history"]) || array_key_exists("history", $context) ? $context["history"] : (function () { throw new RuntimeError('Variable "history" does not exist.', 137, $this->source); })())) > 0)) {
            // line 138
            yield "    <div class=\"card mb-4\">
        <div class=\"card-header\">
            <i class=\"fas fa-layer-group me-2\"></i>Mes résultats (";
            // line 140
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["historyCount"]) || array_key_exists("historyCount", $context) ? $context["historyCount"] : (function () { throw new RuntimeError('Variable "historyCount" does not exist.', 140, $this->source); })()), "html", null, true);
            yield ")
        </div>
        <div class=\"card-body\">
            <div class=\"history-grid\">
                ";
            // line 144
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["history"]) || array_key_exists("history", $context) ? $context["history"] : (function () { throw new RuntimeError('Variable "history" does not exist.', 144, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 145
                yield "                    <div class=\"history-card\">
                        <div class=\"history-top\">
                            <div class=\"history-type ";
                // line 147
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "type", [], "any", false, false, false, 147), "html", null, true);
                yield "\">
                                <i class=\"fas ";
                // line 148
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["row"], "type", [], "any", false, false, false, 148) == "general")) {
                    yield "fa-book-open";
                } else {
                    yield "fa-layer-group";
                }
                yield "\"></i>
                                ";
                // line 149
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "type", [], "any", false, false, false, 149), "html", null, true);
                yield "
                            </div>

                            <div class=\"history-date\">
                                ";
                // line 153
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["row"], "date", [], "any", false, false, false, 153)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 154
                    yield "                                    ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "date", [], "any", false, false, false, 154), "d/m/Y"), "html", null, true);
                    yield "<br>
                                    <small>";
                    // line 155
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "date", [], "any", false, false, false, 155), "H:i"), "html", null, true);
                    yield "</small>
                                ";
                } else {
                    // line 157
                    yield "                                    -
                                ";
                }
                // line 159
                yield "                            </div>
                        </div>

                        <div class=\"history-title\">";
                // line 162
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "title", [], "any", false, false, false, 162), "html", null, true);
                yield "</div>

                        <div class=\"history-meta\">
                            <div class=\"meta-tile\">
                                <div class=\"meta-tile-label\">Score</div>
                                <div class=\"meta-tile-value\">";
                // line 167
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "score", [], "any", false, false, false, 167), "html", null, true);
                yield "</div>
                            </div>

                            <div class=\"meta-tile\">
                                <div class=\"meta-tile-label\">Pourcentage</div>
                                <div class=\"meta-tile-value\">";
                // line 172
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["row"], "percentage", [], "any", true, true, false, 172) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["row"], "percentage", [], "any", false, false, false, 172)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "percentage", [], "any", false, false, false, 172), "html", null, true)) : ("-"));
                yield "%</div>
                            </div>

                            <div class=\"meta-tile\">
                                <div class=\"meta-tile-label\">Catégorie</div>
                                <div class=\"meta-tile-value\">";
                // line 177
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "category", [], "any", false, false, false, 177), "html", null, true);
                yield "</div>
                            </div>

                            <div class=\"meta-tile\">
                                <div class=\"meta-tile-label\">Niveau</div>
                                <div class=\"meta-tile-value\">";
                // line 182
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "level", [], "any", false, false, false, 182), "html", null, true);
                yield "</div>
                            </div>
                        </div>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['row'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 187
            yield "            </div>

            <div class=\"d-flex justify-content-center mt-4\">
                ";
            // line 190
            yield $this->env->getRuntime('Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationRuntime')->render($this->env, (isset($context["history"]) || array_key_exists("history", $context) ? $context["history"] : (function () { throw new RuntimeError('Variable "history" does not exist.', 190, $this->source); })()));
            yield "
            </div>
        </div>
    </div>
";
        } else {
            // line 195
            yield "    <div class=\"history-empty\">
        <i class=\"fas fa-folder-open\"></i>
        <h3>Aucun historique disponible</h3>
        <p class=\"mb-0\">Vous n’avez pas encore passé de test enregistré.</p>
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
        return "user_progress/history.html.twig";
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
        return array (  353 => 195,  345 => 190,  340 => 187,  329 => 182,  321 => 177,  313 => 172,  305 => 167,  297 => 162,  292 => 159,  288 => 157,  283 => 155,  278 => 154,  276 => 153,  269 => 149,  261 => 148,  257 => 147,  253 => 145,  249 => 144,  242 => 140,  238 => 138,  236 => 137,  229 => 133,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'front/base.html.twig' %}

{% block title %}Mon Historique{% endblock %}

{% block content %}
<style>
    .history-hero {
        margin-bottom: 1.5rem;
    }

    .history-hero h1 {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        font-size: 2.2rem;
        font-weight: 900;
        margin: 0;
    }

    .history-hero p {
        margin: 0.5rem 0 0;
        color: #6c7b95;
        font-size: 1.02rem;
    }

    .history-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 1.2rem;
    }

    .history-card {
        background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        box-shadow: 0 14px 30px rgba(23,37,84,0.06);
        padding: 1.2rem;
    }

    .history-top {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        align-items: start;
        margin-bottom: 1rem;
    }

    .history-type {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 0.85rem;
        border-radius: 999px;
        font-size: 0.82rem;
        font-weight: 800;
        text-transform: capitalize;
    }

    .history-type.general {
        background: rgba(37,99,235,0.12);
        color: #2563eb;
    }

    .history-type.specific {
        background: rgba(20,184,166,0.12);
        color: #0f9e8f;
    }

    .history-date {
        text-align: right;
        color: #667892;
        font-weight: 700;
        font-size: 0.92rem;
    }

    .history-title {
        font-size: 1.18rem;
        font-weight: 900;
        color: #17253a;
        margin-bottom: 1rem;
        line-height: 1.4;
    }

    .history-meta {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.8rem;
    }

    .meta-tile {
        background: #f3f8ff;
        border: 1px solid #dce9fb;
        border-radius: 16px;
        padding: 0.85rem;
    }

    .meta-tile-label {
        font-size: 0.78rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #6f819b;
        font-weight: 700;
        margin-bottom: 0.3rem;
    }

    .meta-tile-value {
        font-size: 1rem;
        font-weight: 800;
        color: #17253a;
    }

    .history-empty {
        text-align: center;
        padding: 2.5rem 1rem;
        background: white;
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        box-shadow: 0 14px 30px rgba(23,37,84,0.06);
    }

    .history-empty i {
        font-size: 2.6rem;
        color: #2563eb;
        margin-bottom: 1rem;
    }
</style>

<div class=\"history-hero\">
    <h1><i class=\"fas fa-clock-rotate-left\"></i>Historique personnel</h1>
    <p>Retrouvez tous vos tests passés, vos scores et vos résultats dans une vue plus claire.</p>
</div>
<div class=\"mb-4\">
    <a href=\"{{ path('user_history_pdf') }}\" class=\"btn btn-primary\">
        <i class=\"fas fa-file-pdf me-2\"></i>Exporter mon historique PDF
    </a>
</div>
{% if history|length > 0 %}
    <div class=\"card mb-4\">
        <div class=\"card-header\">
            <i class=\"fas fa-layer-group me-2\"></i>Mes résultats ({{ historyCount }})
        </div>
        <div class=\"card-body\">
            <div class=\"history-grid\">
                {% for row in history %}
                    <div class=\"history-card\">
                        <div class=\"history-top\">
                            <div class=\"history-type {{ row.type }}\">
                                <i class=\"fas {% if row.type == 'general' %}fa-book-open{% else %}fa-layer-group{% endif %}\"></i>
                                {{ row.type }}
                            </div>

                            <div class=\"history-date\">
                                {% if row.date %}
                                    {{ row.date|date('d/m/Y') }}<br>
                                    <small>{{ row.date|date('H:i') }}</small>
                                {% else %}
                                    -
                                {% endif %}
                            </div>
                        </div>

                        <div class=\"history-title\">{{ row.title }}</div>

                        <div class=\"history-meta\">
                            <div class=\"meta-tile\">
                                <div class=\"meta-tile-label\">Score</div>
                                <div class=\"meta-tile-value\">{{ row.score }}</div>
                            </div>

                            <div class=\"meta-tile\">
                                <div class=\"meta-tile-label\">Pourcentage</div>
                                <div class=\"meta-tile-value\">{{ row.percentage ?? '-' }}%</div>
                            </div>

                            <div class=\"meta-tile\">
                                <div class=\"meta-tile-label\">Catégorie</div>
                                <div class=\"meta-tile-value\">{{ row.category }}</div>
                            </div>

                            <div class=\"meta-tile\">
                                <div class=\"meta-tile-label\">Niveau</div>
                                <div class=\"meta-tile-value\">{{ row.level }}</div>
                            </div>
                        </div>
                    </div>
                {% endfor %}
            </div>

            <div class=\"d-flex justify-content-center mt-4\">
                {{ knp_pagination_render(history) }}
            </div>
        </div>
    </div>
{% else %}
    <div class=\"history-empty\">
        <i class=\"fas fa-folder-open\"></i>
        <h3>Aucun historique disponible</h3>
        <p class=\"mb-0\">Vous n’avez pas encore passé de test enregistré.</p>
    </div>
{% endif %}
{% endblock %}", "user_progress/history.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/user_progress/history.html.twig");
    }
}
