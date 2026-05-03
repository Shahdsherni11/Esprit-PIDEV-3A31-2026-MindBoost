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

/* admin_insights/results.html.twig */
class __TwigTemplate_b8428f114efd0ea3822a82e5f483a4f8 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_insights/results.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_insights/results.html.twig"));

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

        yield "Historique Résultats Admin";
        
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
    .results-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 1.25rem;
    }

    .result-card {
        background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        padding: 1.25rem;
        box-shadow: 0 16px 35px rgba(8, 26, 58, 0.10);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        color: #122033;
    }

    .result-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 40px rgba(8, 26, 58, 0.14);
    }

    .result-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1rem;
    }

    .result-type {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.45rem 0.85rem;
        border-radius: 999px;
        font-weight: 800;
        font-size: 0.82rem;
        text-transform: capitalize;
    }

    .result-type.general {
        background: rgba(47,107,255,0.12);
        color: #2157d5;
    }

    .result-type.specific {
        background: rgba(0,209,199,0.12);
        color: #008f88;
    }

    .result-user {
        font-size: 0.9rem;
        font-weight: 700;
        color: #5a6c88;
    }

    .result-title {
        font-size: 1.2rem;
        font-weight: 800;
        color: #122033;
        line-height: 1.35;
        margin-bottom: 1rem;
    }

    .result-meta {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.85rem;
        margin-bottom: 1rem;
    }

    .meta-box {
        background: #f2f7ff;
        border: 1px solid #d9e6fb;
        border-radius: 16px;
        padding: 0.85rem;
    }

    .meta-label {
        font-size: 0.78rem;
        font-weight: 700;
        color: #6f7f99;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 0.3rem;
    }

    .meta-value {
        font-size: 1rem;
        font-weight: 800;
        color: #122033;
    }

    .result-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px solid #e4edfb;
    }

    .score-pill {
        display: flex;
        gap: 0.6rem;
        align-items: center;
        background: linear-gradient(135deg, #2F6BFF, #4D83FF);
        color: white;
        border-radius: 18px;
        padding: 0.7rem 1rem;
        font-weight: 800;
        box-shadow: 0 10px 22px rgba(47,107,255,0.18);
    }

    .date-info {
        text-align: right;
        color: #6a7a94;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .empty-box {
        background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        padding: 2.5rem 1.5rem;
        text-align: center;
        color: #122033;
    }

    .empty-box i {
        font-size: 2.8rem;
        color: #2F6BFF;
        margin-bottom: 1rem;
    }
</style>

<div class=\"page-heading\">
    <h1><i class=\"fas fa-table-list me-2\"></i>Historique et analyse des résultats</h1>
    <p>Vue administrative plus claire et moderne des résultats enregistrés.</p>
</div>

";
        // line 149
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["history"]) || array_key_exists("history", $context) ? $context["history"] : (function () { throw new RuntimeError('Variable "history" does not exist.', 149, $this->source); })())) > 0)) {
            // line 150
            yield "    <div class=\"card mb-4\">
        <div class=\"card-header\">
            <i class=\"fas fa-layer-group me-2\"></i>Résultats enregistrés (";
            // line 152
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["historyCount"]) || array_key_exists("historyCount", $context) ? $context["historyCount"] : (function () { throw new RuntimeError('Variable "historyCount" does not exist.', 152, $this->source); })()), "html", null, true);
            yield ")
        </div>
        <div class=\"card-body\">
            <div class=\"results-grid\">
                ";
            // line 156
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["history"]) || array_key_exists("history", $context) ? $context["history"] : (function () { throw new RuntimeError('Variable "history" does not exist.', 156, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 157
                yield "                    <div class=\"result-card\">
                        <div class=\"result-top\">
                            <div class=\"result-type ";
                // line 159
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "type", [], "any", false, false, false, 159), "html", null, true);
                yield "\">
                                <i class=\"fas ";
                // line 160
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["row"], "type", [], "any", false, false, false, 160) == "general")) {
                    yield "fa-book-open";
                } else {
                    yield "fa-layer-group";
                }
                yield "\"></i>
                                ";
                // line 161
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "type", [], "any", false, false, false, 161), "html", null, true);
                yield "
                            </div>
                            <div class=\"result-user\">
                                User #";
                // line 164
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "user_id", [], "any", false, false, false, 164), "html", null, true);
                yield "
                            </div>
                        </div>

                        <div class=\"result-title\">
                            ";
                // line 169
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "test_title", [], "any", false, false, false, 169), "html", null, true);
                yield "
                        </div>

                        <div class=\"result-meta\">
                            <div class=\"meta-box\">
                                <div class=\"meta-label\">Catégorie</div>
                                <div class=\"meta-value\">";
                // line 175
                yield ((CoreExtension::getAttribute($this->env, $this->source, $context["row"], "category", [], "any", false, false, false, 175)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "category", [], "any", false, false, false, 175), "html", null, true)) : ("-"));
                yield "</div>
                            </div>

                            <div class=\"meta-box\">
                                <div class=\"meta-label\">Niveau</div>
                                <div class=\"meta-value\">";
                // line 180
                yield ((CoreExtension::getAttribute($this->env, $this->source, $context["row"], "level", [], "any", false, false, false, 180)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "level", [], "any", false, false, false, 180), "html", null, true)) : ("-"));
                yield "</div>
                            </div>
                        </div>

                        <div class=\"result-footer\">
                            <div class=\"score-pill\">
                                <i class=\"fas fa-chart-line\"></i>
                                Score ";
                // line 187
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "score", [], "any", false, false, false, 187), "html", null, true);
                yield " | ";
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["row"], "percentage", [], "any", true, true, false, 187) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["row"], "percentage", [], "any", false, false, false, 187)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "percentage", [], "any", false, false, false, 187), "html", null, true)) : (0));
                yield "%
                            </div>

                            <div class=\"date-info\">
                                ";
                // line 191
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["row"], "passed_at", [], "any", false, false, false, 191)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 192
                    yield "                                    ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "passed_at", [], "any", false, false, false, 192), "d/m/Y"), "html", null, true);
                    yield "<br>
                                    <small>";
                    // line 193
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "passed_at", [], "any", false, false, false, 193), "H:i"), "html", null, true);
                    yield "</small>
                                ";
                } else {
                    // line 195
                    yield "                                    <span>-</span>
                                ";
                }
                // line 197
                yield "                            </div>
                        </div>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['row'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 201
            yield "            </div>

            <div class=\"d-flex justify-content-center mt-4\">
                ";
            // line 204
            yield $this->env->getRuntime('Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationRuntime')->render($this->env, (isset($context["history"]) || array_key_exists("history", $context) ? $context["history"] : (function () { throw new RuntimeError('Variable "history" does not exist.', 204, $this->source); })()));
            yield "
            </div>
        </div>
    </div>
";
        } else {
            // line 209
            yield "    <div class=\"empty-box\">
        <i class=\"fas fa-folder-open\"></i>
        <h3>Aucun résultat enregistré</h3>
        <p class=\"mb-0\">Il n’y a pas encore de données à afficher dans l’historique.</p>
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
        return "admin_insights/results.html.twig";
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
        return array (  366 => 209,  358 => 204,  353 => 201,  344 => 197,  340 => 195,  335 => 193,  330 => 192,  328 => 191,  319 => 187,  309 => 180,  301 => 175,  292 => 169,  284 => 164,  278 => 161,  270 => 160,  266 => 159,  262 => 157,  258 => 156,  251 => 152,  247 => 150,  245 => 149,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}Historique Résultats Admin{% endblock %}

{% block content %}
<style>
    .results-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 1.25rem;
    }

    .result-card {
        background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        padding: 1.25rem;
        box-shadow: 0 16px 35px rgba(8, 26, 58, 0.10);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        color: #122033;
    }

    .result-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 40px rgba(8, 26, 58, 0.14);
    }

    .result-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1rem;
    }

    .result-type {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.45rem 0.85rem;
        border-radius: 999px;
        font-weight: 800;
        font-size: 0.82rem;
        text-transform: capitalize;
    }

    .result-type.general {
        background: rgba(47,107,255,0.12);
        color: #2157d5;
    }

    .result-type.specific {
        background: rgba(0,209,199,0.12);
        color: #008f88;
    }

    .result-user {
        font-size: 0.9rem;
        font-weight: 700;
        color: #5a6c88;
    }

    .result-title {
        font-size: 1.2rem;
        font-weight: 800;
        color: #122033;
        line-height: 1.35;
        margin-bottom: 1rem;
    }

    .result-meta {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.85rem;
        margin-bottom: 1rem;
    }

    .meta-box {
        background: #f2f7ff;
        border: 1px solid #d9e6fb;
        border-radius: 16px;
        padding: 0.85rem;
    }

    .meta-label {
        font-size: 0.78rem;
        font-weight: 700;
        color: #6f7f99;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 0.3rem;
    }

    .meta-value {
        font-size: 1rem;
        font-weight: 800;
        color: #122033;
    }

    .result-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px solid #e4edfb;
    }

    .score-pill {
        display: flex;
        gap: 0.6rem;
        align-items: center;
        background: linear-gradient(135deg, #2F6BFF, #4D83FF);
        color: white;
        border-radius: 18px;
        padding: 0.7rem 1rem;
        font-weight: 800;
        box-shadow: 0 10px 22px rgba(47,107,255,0.18);
    }

    .date-info {
        text-align: right;
        color: #6a7a94;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .empty-box {
        background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        padding: 2.5rem 1.5rem;
        text-align: center;
        color: #122033;
    }

    .empty-box i {
        font-size: 2.8rem;
        color: #2F6BFF;
        margin-bottom: 1rem;
    }
</style>

<div class=\"page-heading\">
    <h1><i class=\"fas fa-table-list me-2\"></i>Historique et analyse des résultats</h1>
    <p>Vue administrative plus claire et moderne des résultats enregistrés.</p>
</div>

{% if history|length > 0 %}
    <div class=\"card mb-4\">
        <div class=\"card-header\">
            <i class=\"fas fa-layer-group me-2\"></i>Résultats enregistrés ({{ historyCount }})
        </div>
        <div class=\"card-body\">
            <div class=\"results-grid\">
                {% for row in history %}
                    <div class=\"result-card\">
                        <div class=\"result-top\">
                            <div class=\"result-type {{ row.type }}\">
                                <i class=\"fas {% if row.type == 'general' %}fa-book-open{% else %}fa-layer-group{% endif %}\"></i>
                                {{ row.type }}
                            </div>
                            <div class=\"result-user\">
                                User #{{ row.user_id }}
                            </div>
                        </div>

                        <div class=\"result-title\">
                            {{ row.test_title }}
                        </div>

                        <div class=\"result-meta\">
                            <div class=\"meta-box\">
                                <div class=\"meta-label\">Catégorie</div>
                                <div class=\"meta-value\">{{ row.category ?: '-' }}</div>
                            </div>

                            <div class=\"meta-box\">
                                <div class=\"meta-label\">Niveau</div>
                                <div class=\"meta-value\">{{ row.level ?: '-' }}</div>
                            </div>
                        </div>

                        <div class=\"result-footer\">
                            <div class=\"score-pill\">
                                <i class=\"fas fa-chart-line\"></i>
                                Score {{ row.score }} | {{ row.percentage ?? 0 }}%
                            </div>

                            <div class=\"date-info\">
                                {% if row.passed_at %}
                                    {{ row.passed_at|date('d/m/Y') }}<br>
                                    <small>{{ row.passed_at|date('H:i') }}</small>
                                {% else %}
                                    <span>-</span>
                                {% endif %}
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
    <div class=\"empty-box\">
        <i class=\"fas fa-folder-open\"></i>
        <h3>Aucun résultat enregistré</h3>
        <p class=\"mb-0\">Il n’y a pas encore de données à afficher dans l’historique.</p>
    </div>
{% endif %}
{% endblock %}", "admin_insights/results.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/admin_insights/results.html.twig");
    }
}
