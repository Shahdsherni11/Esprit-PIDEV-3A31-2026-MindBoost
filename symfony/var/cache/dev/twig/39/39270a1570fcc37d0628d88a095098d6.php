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

/* admin_insights/analytics.html.twig */
class __TwigTemplate_80853ecbd68d0bb10592b3519bc711bc extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_insights/analytics.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_insights/analytics.html.twig"));

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

        yield "Dashboard Analytique Admin";
        
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
    .analytics-hero {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .kpi-card {
        background: linear-gradient(180deg, rgba(17,32,61,0.96) 0%, rgba(21,40,76,0.96) 100%);
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 24px;
        padding: 1.25rem;
        box-shadow: 0 16px 36px rgba(0,0,0,0.22);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .kpi-card::after {
        content: \"\";
        position: absolute;
        top: -25px;
        right: -25px;
        width: 90px;
        height: 90px;
        background: rgba(255,255,255,0.04);
        border-radius: 50%;
    }

    .kpi-label {
        font-size: 0.9rem;
        color: #aab6d3;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .kpi-value {
        font-size: 2.3rem;
        font-weight: 900;
        line-height: 1;
        margin-bottom: 0.5rem;
    }

    .kpi-icon {
        font-size: 1.2rem;
        color: #7eb2ff;
    }

    .toolbar-container {
        margin-bottom: 1.5rem;
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .analytics-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.25rem;
    }

    .analytics-panel {
        background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 16px 35px rgba(8, 26, 58, 0.10);
    }

    .analytics-panel-header {
        background: linear-gradient(135deg, #173970, #1f4d96);
        color: white;
        padding: 1rem 1.2rem;
        font-size: 1.05rem;
        font-weight: 800;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .analytics-panel-body {
        padding: 1.2rem;
        color: #122033;
    }

    .stat-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
        padding: 0.9rem 0;
        border-bottom: 1px solid #e7eefc;
    }

    .stat-row:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .stat-name {
        font-weight: 700;
        color: #24344d;
        flex: 1;
        word-break: break-word;
        max-width: 200px;
    }

    .stat-right {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        min-width: 160px;
        justify-content: flex-end;
    }

    .progress-mini {
        width: 90px;
        height: 8px;
        background: #e6eefc;
        border-radius: 999px;
        overflow: hidden;
    }

    .progress-mini span {
        display: block;
        height: 100%;
        background: linear-gradient(90deg, #2F6BFF, #4D83FF);
        border-radius: 999px;
        transition: width 0.3s ease;
    }

    .stat-value {
        font-weight: 900;
        color: #122033;
        min-width: 30px;
        text-align: right;
    }

    .empty-analytics {
        color: #6d7e99;
        font-weight: 600;
        text-align: center;
        padding: 2rem 1rem;
    }

    .btn-history {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        padding: 0.85rem 1.2rem;
        border-radius: 16px;
        border: none;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.22s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .btn-history:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 24px rgba(59,130,246,0.25);
        color: white;
    }

    @media (max-width: 1200px) {
        .analytics-hero {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .analytics-hero,
        .analytics-grid {
            grid-template-columns: 1fr;
        }

        .toolbar-container {
            flex-direction: column;
        }

        .btn-history {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class=\"page-heading\">
    <h1><i class=\"fas fa-chart-simple me-2\"></i>Tableau de bord analytique</h1>
    <p>Vue synthétique, moderne et lisible des indicateurs clés.</p>
</div>

<div class=\"toolbar-container\">
    <a href=\"";
        // line 202
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_results_history");
        yield "\" class=\"btn-history\">
        <i class=\"fas fa-history\"></i>
        Historique des résultats
    </a>
</div>

<div class=\"analytics-hero\">
    <div class=\"kpi-card\">
        <div class=\"kpi-label\">Tests généraux</div>
        <div class=\"kpi-value\">";
        // line 211
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 211, $this->source); })()), "total_general_results", [], "any", false, false, false, 211), "html", null, true);
        yield "</div>
        <div class=\"kpi-icon\"><i class=\"fas fa-book-open\"></i></div>
    </div>

    <div class=\"kpi-card\">
        <div class=\"kpi-label\">Tests spécifiques</div>
        <div class=\"kpi-value\">";
        // line 217
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 217, $this->source); })()), "total_specific_results", [], "any", false, false, false, 217), "html", null, true);
        yield "</div>
        <div class=\"kpi-icon\"><i class=\"fas fa-layer-group\"></i></div>
    </div>

    <div class=\"kpi-card\">
        <div class=\"kpi-label\">Résultats totaux</div>
        <div class=\"kpi-value\">";
        // line 223
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 223, $this->source); })()), "total_general_results", [], "any", false, false, false, 223) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 223, $this->source); })()), "total_specific_results", [], "any", false, false, false, 223)), "html", null, true);
        yield "</div>
        <div class=\"kpi-icon\"><i class=\"fas fa-chart-pie\"></i></div>
    </div>

    <div class=\"kpi-card\">
        <div class=\"kpi-label\">Catégorie dominante</div>
        <div class=\"kpi-value\" style=\"font-size: 1.5rem;\">
            ";
        // line 230
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 230, $this->source); })()), "categories", [], "any", false, false, false, 230)) > 0)) {
            // line 231
            yield "                ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), Twig\Extension\CoreExtension::keys(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 231, $this->source); })()), "categories", [], "any", false, false, false, 231))), "html", null, true);
            yield "
            ";
        } else {
            // line 233
            yield "                -
            ";
        }
        // line 235
        yield "        </div>
        <div class=\"kpi-icon\"><i class=\"fas fa-star\"></i></div>
    </div>
</div>

<div class=\"analytics-grid\">
    <div class=\"analytics-panel\">
        <div class=\"analytics-panel-header\">
            <i class=\"fas fa-calendar-week\"></i>
            <span>Tests passés par semaine</span>
        </div>
        <div class=\"analytics-panel-body\">
            ";
        // line 247
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 247, $this->source); })()), "tests_per_week", [], "any", false, false, false, 247)) > 0)) {
            // line 248
            yield "                ";
            $context["maxWeek"] = Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 248, $this->source); })()), "tests_per_week", [], "any", false, false, false, 248));
            // line 249
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 249, $this->source); })()), "tests_per_week", [], "any", false, false, false, 249));
            foreach ($context['_seq'] as $context["label"] => $context["value"]) {
                // line 250
                yield "                    <div class=\"stat-row\">
                        <div class=\"stat-name\">";
                // line 251
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true);
                yield "</div>
                        <div class=\"stat-right\">
                            <div class=\"progress-mini\">
                                <span style=\"width: ";
                // line 254
                yield ((((isset($context["maxWeek"]) || array_key_exists("maxWeek", $context) ? $context["maxWeek"] : (function () { throw new RuntimeError('Variable "maxWeek" does not exist.', 254, $this->source); })()) > 0)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["value"] / (isset($context["maxWeek"]) || array_key_exists("maxWeek", $context) ? $context["maxWeek"] : (function () { throw new RuntimeError('Variable "maxWeek" does not exist.', 254, $this->source); })())) * 100), "html", null, true)) : (0));
                yield "%;\"></span>
                            </div>
                            <div class=\"stat-value\">";
                // line 256
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html", null, true);
                yield "</div>
                        </div>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['label'], $context['value'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 260
            yield "            ";
        } else {
            // line 261
            yield "                <div class=\"empty-analytics\">Aucune donnée</div>
            ";
        }
        // line 263
        yield "        </div>
    </div>

    <div class=\"analytics-panel\">
        <div class=\"analytics-panel-header\">
            <i class=\"fas fa-tags\"></i>
            <span>Catégories fréquentes</span>
        </div>
        <div class=\"analytics-panel-body\">
            ";
        // line 272
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 272, $this->source); })()), "categories", [], "any", false, false, false, 272)) > 0)) {
            // line 273
            yield "                ";
            $context["maxCategory"] = Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 273, $this->source); })()), "categories", [], "any", false, false, false, 273));
            // line 274
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 274, $this->source); })()), "categories", [], "any", false, false, false, 274));
            foreach ($context['_seq'] as $context["label"] => $context["value"]) {
                // line 275
                yield "                    <div class=\"stat-row\">
                        <div class=\"stat-name\">";
                // line 276
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true);
                yield "</div>
                        <div class=\"stat-right\">
                            <div class=\"progress-mini\">
                                <span style=\"width: ";
                // line 279
                yield ((((isset($context["maxCategory"]) || array_key_exists("maxCategory", $context) ? $context["maxCategory"] : (function () { throw new RuntimeError('Variable "maxCategory" does not exist.', 279, $this->source); })()) > 0)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["value"] / (isset($context["maxCategory"]) || array_key_exists("maxCategory", $context) ? $context["maxCategory"] : (function () { throw new RuntimeError('Variable "maxCategory" does not exist.', 279, $this->source); })())) * 100), "html", null, true)) : (0));
                yield "%;\"></span>
                            </div>
                            <div class=\"stat-value\">";
                // line 281
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html", null, true);
                yield "</div>
                        </div>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['label'], $context['value'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 285
            yield "            ";
        } else {
            // line 286
            yield "                <div class=\"empty-analytics\">Aucune donnée</div>
            ";
        }
        // line 288
        yield "        </div>
    </div>

    <div class=\"analytics-panel\">
        <div class=\"analytics-panel-header\">
            <i class=\"fas fa-signal\"></i>
            <span>Niveaux détectés</span>
        </div>
        <div class=\"analytics-panel-body\">
            ";
        // line 297
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 297, $this->source); })()), "levels", [], "any", false, false, false, 297)) > 0)) {
            // line 298
            yield "                ";
            $context["maxLevel"] = Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 298, $this->source); })()), "levels", [], "any", false, false, false, 298));
            // line 299
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 299, $this->source); })()), "levels", [], "any", false, false, false, 299));
            foreach ($context['_seq'] as $context["label"] => $context["value"]) {
                // line 300
                yield "                    <div class=\"stat-row\">
                        <div class=\"stat-name\">";
                // line 301
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true);
                yield "</div>
                        <div class=\"stat-right\">
                            <div class=\"progress-mini\">
                                <span style=\"width: ";
                // line 304
                yield ((((isset($context["maxLevel"]) || array_key_exists("maxLevel", $context) ? $context["maxLevel"] : (function () { throw new RuntimeError('Variable "maxLevel" does not exist.', 304, $this->source); })()) > 0)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["value"] / (isset($context["maxLevel"]) || array_key_exists("maxLevel", $context) ? $context["maxLevel"] : (function () { throw new RuntimeError('Variable "maxLevel" does not exist.', 304, $this->source); })())) * 100), "html", null, true)) : (0));
                yield "%;\"></span>
                            </div>
                            <div class=\"stat-value\">";
                // line 306
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html", null, true);
                yield "</div>
                        </div>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['label'], $context['value'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 310
            yield "            ";
        } else {
            // line 311
            yield "                <div class=\"empty-analytics\">Aucune donnée</div>
            ";
        }
        // line 313
        yield "        </div>
    </div>

    <div class=\"analytics-panel\">
        <div class=\"analytics-panel-header\">
            <i class=\"fas fa-fire\"></i>
            <span>Tests les plus utilisés</span>
        </div>
        <div class=\"analytics-panel-body\">
            ";
        // line 322
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 322, $this->source); })()), "test_usage", [], "any", false, false, false, 322)) > 0)) {
            // line 323
            yield "                ";
            $context["maxTest"] = Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 323, $this->source); })()), "test_usage", [], "any", false, false, false, 323));
            // line 324
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 324, $this->source); })()), "test_usage", [], "any", false, false, false, 324), 0, 8));
            foreach ($context['_seq'] as $context["label"] => $context["value"]) {
                // line 325
                yield "                    <div class=\"stat-row\">
                        <div class=\"stat-name\" title=\"";
                // line 326
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true);
                yield "\">
                            ";
                // line 327
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), $context["label"], 0, 25), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), $context["label"]) > 25)) {
                    yield "...";
                }
                // line 328
                yield "                        </div>
                        <div class=\"stat-right\">
                            <div class=\"progress-mini\">
                                <span style=\"width: ";
                // line 331
                yield ((((isset($context["maxTest"]) || array_key_exists("maxTest", $context) ? $context["maxTest"] : (function () { throw new RuntimeError('Variable "maxTest" does not exist.', 331, $this->source); })()) > 0)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["value"] / (isset($context["maxTest"]) || array_key_exists("maxTest", $context) ? $context["maxTest"] : (function () { throw new RuntimeError('Variable "maxTest" does not exist.', 331, $this->source); })())) * 100), "html", null, true)) : (0));
                yield "%;\"></span>
                            </div>
                            <div class=\"stat-value\">";
                // line 333
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html", null, true);
                yield "</div>
                        </div>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['label'], $context['value'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 337
            yield "            ";
        } else {
            // line 338
            yield "                <div class=\"empty-analytics\">Aucune donnée</div>
            ";
        }
        // line 340
        yield "        </div>
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
        return "admin_insights/analytics.html.twig";
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
        return array (  569 => 340,  565 => 338,  562 => 337,  552 => 333,  547 => 331,  542 => 328,  537 => 327,  533 => 326,  530 => 325,  525 => 324,  522 => 323,  520 => 322,  509 => 313,  505 => 311,  502 => 310,  492 => 306,  487 => 304,  481 => 301,  478 => 300,  473 => 299,  470 => 298,  468 => 297,  457 => 288,  453 => 286,  450 => 285,  440 => 281,  435 => 279,  429 => 276,  426 => 275,  421 => 274,  418 => 273,  416 => 272,  405 => 263,  401 => 261,  398 => 260,  388 => 256,  383 => 254,  377 => 251,  374 => 250,  369 => 249,  366 => 248,  364 => 247,  350 => 235,  346 => 233,  340 => 231,  338 => 230,  328 => 223,  319 => 217,  310 => 211,  298 => 202,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}Dashboard Analytique Admin{% endblock %}

{% block content %}
<style>
    .analytics-hero {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .kpi-card {
        background: linear-gradient(180deg, rgba(17,32,61,0.96) 0%, rgba(21,40,76,0.96) 100%);
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 24px;
        padding: 1.25rem;
        box-shadow: 0 16px 36px rgba(0,0,0,0.22);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .kpi-card::after {
        content: \"\";
        position: absolute;
        top: -25px;
        right: -25px;
        width: 90px;
        height: 90px;
        background: rgba(255,255,255,0.04);
        border-radius: 50%;
    }

    .kpi-label {
        font-size: 0.9rem;
        color: #aab6d3;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .kpi-value {
        font-size: 2.3rem;
        font-weight: 900;
        line-height: 1;
        margin-bottom: 0.5rem;
    }

    .kpi-icon {
        font-size: 1.2rem;
        color: #7eb2ff;
    }

    .toolbar-container {
        margin-bottom: 1.5rem;
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .analytics-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.25rem;
    }

    .analytics-panel {
        background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 16px 35px rgba(8, 26, 58, 0.10);
    }

    .analytics-panel-header {
        background: linear-gradient(135deg, #173970, #1f4d96);
        color: white;
        padding: 1rem 1.2rem;
        font-size: 1.05rem;
        font-weight: 800;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .analytics-panel-body {
        padding: 1.2rem;
        color: #122033;
    }

    .stat-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
        padding: 0.9rem 0;
        border-bottom: 1px solid #e7eefc;
    }

    .stat-row:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .stat-name {
        font-weight: 700;
        color: #24344d;
        flex: 1;
        word-break: break-word;
        max-width: 200px;
    }

    .stat-right {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        min-width: 160px;
        justify-content: flex-end;
    }

    .progress-mini {
        width: 90px;
        height: 8px;
        background: #e6eefc;
        border-radius: 999px;
        overflow: hidden;
    }

    .progress-mini span {
        display: block;
        height: 100%;
        background: linear-gradient(90deg, #2F6BFF, #4D83FF);
        border-radius: 999px;
        transition: width 0.3s ease;
    }

    .stat-value {
        font-weight: 900;
        color: #122033;
        min-width: 30px;
        text-align: right;
    }

    .empty-analytics {
        color: #6d7e99;
        font-weight: 600;
        text-align: center;
        padding: 2rem 1rem;
    }

    .btn-history {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        padding: 0.85rem 1.2rem;
        border-radius: 16px;
        border: none;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.22s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .btn-history:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 24px rgba(59,130,246,0.25);
        color: white;
    }

    @media (max-width: 1200px) {
        .analytics-hero {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .analytics-hero,
        .analytics-grid {
            grid-template-columns: 1fr;
        }

        .toolbar-container {
            flex-direction: column;
        }

        .btn-history {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class=\"page-heading\">
    <h1><i class=\"fas fa-chart-simple me-2\"></i>Tableau de bord analytique</h1>
    <p>Vue synthétique, moderne et lisible des indicateurs clés.</p>
</div>

<div class=\"toolbar-container\">
    <a href=\"{{ path('admin_results_history') }}\" class=\"btn-history\">
        <i class=\"fas fa-history\"></i>
        Historique des résultats
    </a>
</div>

<div class=\"analytics-hero\">
    <div class=\"kpi-card\">
        <div class=\"kpi-label\">Tests généraux</div>
        <div class=\"kpi-value\">{{ stats.total_general_results }}</div>
        <div class=\"kpi-icon\"><i class=\"fas fa-book-open\"></i></div>
    </div>

    <div class=\"kpi-card\">
        <div class=\"kpi-label\">Tests spécifiques</div>
        <div class=\"kpi-value\">{{ stats.total_specific_results }}</div>
        <div class=\"kpi-icon\"><i class=\"fas fa-layer-group\"></i></div>
    </div>

    <div class=\"kpi-card\">
        <div class=\"kpi-label\">Résultats totaux</div>
        <div class=\"kpi-value\">{{ stats.total_general_results + stats.total_specific_results }}</div>
        <div class=\"kpi-icon\"><i class=\"fas fa-chart-pie\"></i></div>
    </div>

    <div class=\"kpi-card\">
        <div class=\"kpi-label\">Catégorie dominante</div>
        <div class=\"kpi-value\" style=\"font-size: 1.5rem;\">
            {% if stats.categories|length > 0 %}
                {{ stats.categories|keys|first }}
            {% else %}
                -
            {% endif %}
        </div>
        <div class=\"kpi-icon\"><i class=\"fas fa-star\"></i></div>
    </div>
</div>

<div class=\"analytics-grid\">
    <div class=\"analytics-panel\">
        <div class=\"analytics-panel-header\">
            <i class=\"fas fa-calendar-week\"></i>
            <span>Tests passés par semaine</span>
        </div>
        <div class=\"analytics-panel-body\">
            {% if stats.tests_per_week|length > 0 %}
                {% set maxWeek = stats.tests_per_week|first %}
                {% for label, value in stats.tests_per_week %}
                    <div class=\"stat-row\">
                        <div class=\"stat-name\">{{ label }}</div>
                        <div class=\"stat-right\">
                            <div class=\"progress-mini\">
                                <span style=\"width: {{ maxWeek > 0 ? (value / maxWeek * 100) : 0 }}%;\"></span>
                            </div>
                            <div class=\"stat-value\">{{ value }}</div>
                        </div>
                    </div>
                {% endfor %}
            {% else %}
                <div class=\"empty-analytics\">Aucune donnée</div>
            {% endif %}
        </div>
    </div>

    <div class=\"analytics-panel\">
        <div class=\"analytics-panel-header\">
            <i class=\"fas fa-tags\"></i>
            <span>Catégories fréquentes</span>
        </div>
        <div class=\"analytics-panel-body\">
            {% if stats.categories|length > 0 %}
                {% set maxCategory = stats.categories|first %}
                {% for label, value in stats.categories %}
                    <div class=\"stat-row\">
                        <div class=\"stat-name\">{{ label }}</div>
                        <div class=\"stat-right\">
                            <div class=\"progress-mini\">
                                <span style=\"width: {{ maxCategory > 0 ? (value / maxCategory * 100) : 0 }}%;\"></span>
                            </div>
                            <div class=\"stat-value\">{{ value }}</div>
                        </div>
                    </div>
                {% endfor %}
            {% else %}
                <div class=\"empty-analytics\">Aucune donnée</div>
            {% endif %}
        </div>
    </div>

    <div class=\"analytics-panel\">
        <div class=\"analytics-panel-header\">
            <i class=\"fas fa-signal\"></i>
            <span>Niveaux détectés</span>
        </div>
        <div class=\"analytics-panel-body\">
            {% if stats.levels|length > 0 %}
                {% set maxLevel = stats.levels|first %}
                {% for label, value in stats.levels %}
                    <div class=\"stat-row\">
                        <div class=\"stat-name\">{{ label }}</div>
                        <div class=\"stat-right\">
                            <div class=\"progress-mini\">
                                <span style=\"width: {{ maxLevel > 0 ? (value / maxLevel * 100) : 0 }}%;\"></span>
                            </div>
                            <div class=\"stat-value\">{{ value }}</div>
                        </div>
                    </div>
                {% endfor %}
            {% else %}
                <div class=\"empty-analytics\">Aucune donnée</div>
            {% endif %}
        </div>
    </div>

    <div class=\"analytics-panel\">
        <div class=\"analytics-panel-header\">
            <i class=\"fas fa-fire\"></i>
            <span>Tests les plus utilisés</span>
        </div>
        <div class=\"analytics-panel-body\">
            {% if stats.test_usage|length > 0 %}
                {% set maxTest = stats.test_usage|first %}
                {% for label, value in stats.test_usage|slice(0, 8) %}
                    <div class=\"stat-row\">
                        <div class=\"stat-name\" title=\"{{ label }}\">
                            {{ label|slice(0, 25) }}{% if label|length > 25 %}...{% endif %}
                        </div>
                        <div class=\"stat-right\">
                            <div class=\"progress-mini\">
                                <span style=\"width: {{ maxTest > 0 ? (value / maxTest * 100) : 0 }}%;\"></span>
                            </div>
                            <div class=\"stat-value\">{{ value }}</div>
                        </div>
                    </div>
                {% endfor %}
            {% else %}
                <div class=\"empty-analytics\">Aucune donnée</div>
            {% endif %}
        </div>
    </div>
</div>
{% endblock %}", "admin_insights/analytics.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/admin_insights/analytics.html.twig");
    }
}
