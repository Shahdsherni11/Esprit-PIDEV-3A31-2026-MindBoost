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

/* user_statistics/index.html.twig */
class __TwigTemplate_d38e67d6835f26d4b3e56e387d40f283 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user_statistics/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user_statistics/index.html.twig"));

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

        yield "Mes Statistiques";
        
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
    .user-kpi-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .user-kpi-card {
        background: linear-gradient(180deg, #ffffff 0%, #f7fbff 100%);
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        padding: 1.1rem;
        box-shadow: 0 14px 30px rgba(23,37,84,0.06);
        text-align: center;
    }

    .user-kpi-value {
        font-size: 1.8rem;
        font-weight: 900;
        color: #2563eb;
    }

    .user-kpi-label {
        margin-top: 0.35rem;
        color: #6c7b95;
        font-weight: 600;
        font-size: 0.85rem;
    }

    .motivational-alert {
        background: linear-gradient(135deg, rgba(59,182,255,0.1), rgba(79,172,254,0.1));
        border: 2px solid #a7d8ff;
        border-radius: 16px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        animation: slideDown 0.5s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .motivational-alert-title {
        color: #0c5ba3;
        font-weight: 700;
        margin: 0 0 0.8rem 0;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .motivational-alert-quote {
        color: #0c5ba3;
        font-style: italic;
        margin: 0.5rem 0 0;
        font-size: 1rem;
        line-height: 1.6;
        padding: 0.8rem 0;
    }

    .motivational-alert-author {
        color: #0c5ba3;
        font-size: 0.9rem;
        margin: 0.5rem 0 0;
        font-weight: 500;
    }

    .quote-actions {
        display: flex;
        gap: 0.8rem;
        margin-top: 1rem;
        flex-wrap: wrap;
    }

    .btn-small {
        padding: 0.6rem 1rem;
        border-radius: 8px;
        border: none;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        font-size: 0.9rem;
        transition: all 0.22s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
    }

    .btn-small-secondary {
        background: #e5e7eb;
        color: #1f2937;
    }

    .btn-small-secondary:hover {
        background: #d1d5db;
        transform: translateY(-1px);
        color: #1f2937;
    }

    .user-chart-grid {
        display: grid;
        grid-template-columns: 1.4fr 1fr;
        gap: 1.2rem;
        margin-bottom: 1.5rem;
    }

    .user-chart-card, .user-history-card {
        background: white;
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        padding: 1.2rem;
        box-shadow: 0 14px 30px rgba(23,37,84,0.06);
    }

    .user-card-title {
        font-size: 1.05rem;
        font-weight: 800;
        color: #17253a;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .timeline {
        display: flex;
        flex-direction: column;
        gap: 0.9rem;
    }

    .timeline-item {
        background: #f7fbff;
        border: 1px solid #dbe7ff;
        border-radius: 18px;
        padding: 0.95rem 1rem;
        transition: all 0.22s ease;
    }

    .timeline-item:hover {
        border-color: #2563eb;
        box-shadow: 0 4px 12px rgba(37,99,235,0.1);
    }

    .timeline-top {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 0.5rem;
    }

    .timeline-title {
        font-weight: 900;
        color: #17253a;
    }

    .timeline-percent {
        font-weight: 900;
        color: #2563eb;
    }

    .timeline-meta {
        color: #6c7b95;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .empty-state {
        text-align: center;
        padding: 2rem;
        color: #6c7b95;
    }

    .empty-state-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    @media (max-width: 1100px) {
        .user-kpi-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        .user-chart-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .user-kpi-grid {
            grid-template-columns: 1fr;
        }

        .quote-actions {
            flex-direction: column;
        }

        .btn-small {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class=\"page-heading\">
    <h1><i class=\"fas fa-chart-line me-2\"></i>Mes Statistiques</h1>
    <p>Suivez votre progrès au cours des semaines.</p>
</div>

";
        // line 223
        if ((($tmp = (isset($context["motivationalQuote"]) || array_key_exists("motivationalQuote", $context) ? $context["motivationalQuote"] : (function () { throw new RuntimeError('Variable "motivationalQuote" does not exist.', 223, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 224
            yield "    <div class=\"motivational-alert\">
        <p class=\"motivational-alert-title\">
            <i class=\"fas fa-lightbulb\"></i>
            <strong>Message de soutien du jour</strong>
        </p>

        <p class=\"motivational-alert-quote\">
            \"";
            // line 231
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivationalQuote"]) || array_key_exists("motivationalQuote", $context) ? $context["motivationalQuote"] : (function () { throw new RuntimeError('Variable "motivationalQuote" does not exist.', 231, $this->source); })()), "content", [], "any", false, false, false, 231), "html", null, true);
            yield "\"
        </p>

        <p class=\"motivational-alert-author\">
            — ";
            // line 235
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivationalQuote"]) || array_key_exists("motivationalQuote", $context) ? $context["motivationalQuote"] : (function () { throw new RuntimeError('Variable "motivationalQuote" does not exist.', 235, $this->source); })()), "author", [], "any", false, false, false, 235), "html", null, true);
            yield "
        </p>

        <div class=\"quote-actions\">
            <a href=\"";
            // line 239
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_statistics_dashboard");
            yield "\" class=\"btn-small btn-small-secondary\" style=\"flex: 1; justify-content: center;\">
                <i class=\"fas fa-sync-alt\"></i>
                Actualiser
            </a>
        </div>
    </div>
";
        }
        // line 246
        yield "
<div class=\"user-kpi-grid\">
    <div class=\"user-kpi-card\">
        <div class=\"user-kpi-value\">";
        // line 249
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 249, $this->source); })()), "kpis", [], "any", false, false, false, 249), "total_tests", [], "any", false, false, false, 249), "html", null, true);
        yield "</div>
        <div class=\"user-kpi-label\">Tests passés</div>
    </div>
    <div class=\"user-kpi-card\">
        <div class=\"user-kpi-value\">";
        // line 253
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 253, $this->source); })()), "kpis", [], "any", false, false, false, 253), "best_percentage", [], "any", false, false, false, 253), "html", null, true);
        yield "%</div>
        <div class=\"user-kpi-label\">Meilleur score</div>
    </div>
    <div class=\"user-kpi-card\">
        <div class=\"user-kpi-value\">";
        // line 257
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 257, $this->source); })()), "kpis", [], "any", false, false, false, 257), "average_percentage", [], "any", false, false, false, 257), "html", null, true);
        yield "%</div>
        <div class=\"user-kpi-label\">Moyenne</div>
    </div>
    <div class=\"user-kpi-card\">
        <div class=\"user-kpi-value\" style=\"font-size: 1.2rem;\">
            ";
        // line 262
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 262, $this->source); })()), "kpis", [], "any", false, false, false, 262), "dominant_category", [], "any", false, false, false, 262)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 263
            yield "                ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 263, $this->source); })()), "kpis", [], "any", false, false, false, 263), "dominant_category", [], "any", false, false, false, 263), "html", null, true);
            yield "
            ";
        } else {
            // line 265
            yield "                -
            ";
        }
        // line 267
        yield "        </div>
        <div class=\"user-kpi-label\">Catégorie dominante</div>
    </div>
    <div class=\"user-kpi-card\">
        <div class=\"user-kpi-value\" style=\"font-size: 1.2rem;\">
            ";
        // line 272
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 272, $this->source); })()), "kpis", [], "any", false, false, false, 272), "dominant_level", [], "any", false, false, false, 272)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 273
            yield "                ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 273, $this->source); })()), "kpis", [], "any", false, false, false, 273), "dominant_level", [], "any", false, false, false, 273), "html", null, true);
            yield "
            ";
        } else {
            // line 275
            yield "                -
            ";
        }
        // line 277
        yield "        </div>
        <div class=\"user-kpi-label\">Niveau dominant</div>
    </div>
</div>

<div class=\"user-chart-grid\">
    <div class=\"user-chart-card\">
        <div class=\"user-card-title\">
            <i class=\"fas fa-chart-line\"></i>
            Progression hebdomadaire
        </div>
        ";
        // line 288
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 288, $this->source); })()), "weekly_labels", [], "any", false, false, false, 288)) > 0)) {
            // line 289
            yield "            ";
            yield $this->extensions['Symfony\UX\Chartjs\Twig\ChartExtension']->renderChart((isset($context["progressChart"]) || array_key_exists("progressChart", $context) ? $context["progressChart"] : (function () { throw new RuntimeError('Variable "progressChart" does not exist.', 289, $this->source); })()));
            yield "
        ";
        } else {
            // line 291
            yield "            <div class=\"empty-state\">
                <div class=\"empty-state-icon\"><i class=\"fas fa-inbox\"></i></div>
                <p>Aucune donnée de progression disponible</p>
            </div>
        ";
        }
        // line 296
        yield "    </div>

    <div class=\"user-chart-card\">
        <div class=\"user-card-title\">
            <i class=\"fas fa-chart-pie\"></i>
            Répartition des catégories
        </div>
        ";
        // line 303
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 303, $this->source); })()), "category_labels", [], "any", false, false, false, 303)) > 0)) {
            // line 304
            yield "            ";
            yield $this->extensions['Symfony\UX\Chartjs\Twig\ChartExtension']->renderChart((isset($context["userCategoryChart"]) || array_key_exists("userCategoryChart", $context) ? $context["userCategoryChart"] : (function () { throw new RuntimeError('Variable "userCategoryChart" does not exist.', 304, $this->source); })()));
            yield "
        ";
        } else {
            // line 306
            yield "            <div class=\"empty-state\">
                <div class=\"empty-state-icon\"><i class=\"fas fa-inbox\"></i></div>
                <p>Aucune catégorie testée</p>
            </div>
        ";
        }
        // line 311
        yield "    </div>
</div>

<div class=\"user-history-card\">
    <div class=\"user-card-title\">
        <i class=\"fas fa-history\"></i>
        Historique détaillé
    </div>

    ";
        // line 320
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 320, $this->source); })()), "history", [], "any", false, false, false, 320)) > 0)) {
            // line 321
            yield "        <div class=\"timeline\">
            ";
            // line 322
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::reverse($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 322, $this->source); })()), "history", [], "any", false, false, false, 322)));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 323
                yield "                <div class=\"timeline-item\">
                    <div class=\"timeline-top\">
                        <div class=\"timeline-title\">
                            <i class=\"fas fa-calendar-check\" style=\"color: #2563eb; margin-right: 0.5rem;\"></i>
                            Semaine ";
                // line 327
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "week", [], "any", false, false, false, 327), "html", null, true);
                yield "
                        </div>
                        <div class=\"timeline-percent\">";
                // line 329
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "percentage", [], "any", false, false, false, 329), "html", null, true);
                yield "%</div>
                    </div>
                    <div class=\"timeline-meta\">
                        📁 Catégorie : <strong>";
                // line 332
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "category", [], "any", false, false, false, 332), "html", null, true);
                yield "</strong> |
                        📊 Niveau : <strong>";
                // line 333
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "level", [], "any", false, false, false, 333), "html", null, true);
                yield "</strong>
                        ";
                // line 334
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "date", [], "any", false, false, false, 334)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield " | 📅 ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "date", [], "any", false, false, false, 334), "d/m/Y"), "html", null, true);
                }
                // line 335
                yield "                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 338
            yield "        </div>
    ";
        } else {
            // line 340
            yield "        <div class=\"empty-state\">
            <div class=\"empty-state-icon\"><i class=\"fas fa-inbox\"></i></div>
            <p>Aucune donnée statistique pour le moment.</p>
            <p style=\"font-size: 0.9rem; margin-top: 0.5rem;\">
                <a href=\"";
            // line 344
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_general_test");
            yield "\" style=\"color: #2563eb; text-decoration: none; font-weight: 600;\">
                    Passez un test pour commencer →
                </a>
            </p>
        </div>
    ";
        }
        // line 350
        yield "</div>

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
        return "user_statistics/index.html.twig";
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
        return array (  541 => 350,  532 => 344,  526 => 340,  522 => 338,  514 => 335,  509 => 334,  505 => 333,  501 => 332,  495 => 329,  490 => 327,  484 => 323,  480 => 322,  477 => 321,  475 => 320,  464 => 311,  457 => 306,  451 => 304,  449 => 303,  440 => 296,  433 => 291,  427 => 289,  425 => 288,  412 => 277,  408 => 275,  402 => 273,  400 => 272,  393 => 267,  389 => 265,  383 => 263,  381 => 262,  373 => 257,  366 => 253,  359 => 249,  354 => 246,  344 => 239,  337 => 235,  330 => 231,  321 => 224,  319 => 223,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'front/base.html.twig' %}

{% block title %}Mes Statistiques{% endblock %}

{% block content %}
<style>
    .user-kpi-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .user-kpi-card {
        background: linear-gradient(180deg, #ffffff 0%, #f7fbff 100%);
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        padding: 1.1rem;
        box-shadow: 0 14px 30px rgba(23,37,84,0.06);
        text-align: center;
    }

    .user-kpi-value {
        font-size: 1.8rem;
        font-weight: 900;
        color: #2563eb;
    }

    .user-kpi-label {
        margin-top: 0.35rem;
        color: #6c7b95;
        font-weight: 600;
        font-size: 0.85rem;
    }

    .motivational-alert {
        background: linear-gradient(135deg, rgba(59,182,255,0.1), rgba(79,172,254,0.1));
        border: 2px solid #a7d8ff;
        border-radius: 16px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        animation: slideDown 0.5s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .motivational-alert-title {
        color: #0c5ba3;
        font-weight: 700;
        margin: 0 0 0.8rem 0;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .motivational-alert-quote {
        color: #0c5ba3;
        font-style: italic;
        margin: 0.5rem 0 0;
        font-size: 1rem;
        line-height: 1.6;
        padding: 0.8rem 0;
    }

    .motivational-alert-author {
        color: #0c5ba3;
        font-size: 0.9rem;
        margin: 0.5rem 0 0;
        font-weight: 500;
    }

    .quote-actions {
        display: flex;
        gap: 0.8rem;
        margin-top: 1rem;
        flex-wrap: wrap;
    }

    .btn-small {
        padding: 0.6rem 1rem;
        border-radius: 8px;
        border: none;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        font-size: 0.9rem;
        transition: all 0.22s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
    }

    .btn-small-secondary {
        background: #e5e7eb;
        color: #1f2937;
    }

    .btn-small-secondary:hover {
        background: #d1d5db;
        transform: translateY(-1px);
        color: #1f2937;
    }

    .user-chart-grid {
        display: grid;
        grid-template-columns: 1.4fr 1fr;
        gap: 1.2rem;
        margin-bottom: 1.5rem;
    }

    .user-chart-card, .user-history-card {
        background: white;
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        padding: 1.2rem;
        box-shadow: 0 14px 30px rgba(23,37,84,0.06);
    }

    .user-card-title {
        font-size: 1.05rem;
        font-weight: 800;
        color: #17253a;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .timeline {
        display: flex;
        flex-direction: column;
        gap: 0.9rem;
    }

    .timeline-item {
        background: #f7fbff;
        border: 1px solid #dbe7ff;
        border-radius: 18px;
        padding: 0.95rem 1rem;
        transition: all 0.22s ease;
    }

    .timeline-item:hover {
        border-color: #2563eb;
        box-shadow: 0 4px 12px rgba(37,99,235,0.1);
    }

    .timeline-top {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 0.5rem;
    }

    .timeline-title {
        font-weight: 900;
        color: #17253a;
    }

    .timeline-percent {
        font-weight: 900;
        color: #2563eb;
    }

    .timeline-meta {
        color: #6c7b95;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .empty-state {
        text-align: center;
        padding: 2rem;
        color: #6c7b95;
    }

    .empty-state-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    @media (max-width: 1100px) {
        .user-kpi-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        .user-chart-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .user-kpi-grid {
            grid-template-columns: 1fr;
        }

        .quote-actions {
            flex-direction: column;
        }

        .btn-small {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class=\"page-heading\">
    <h1><i class=\"fas fa-chart-line me-2\"></i>Mes Statistiques</h1>
    <p>Suivez votre progrès au cours des semaines.</p>
</div>

{% if motivationalQuote %}
    <div class=\"motivational-alert\">
        <p class=\"motivational-alert-title\">
            <i class=\"fas fa-lightbulb\"></i>
            <strong>Message de soutien du jour</strong>
        </p>

        <p class=\"motivational-alert-quote\">
            \"{{ motivationalQuote.content }}\"
        </p>

        <p class=\"motivational-alert-author\">
            — {{ motivationalQuote.author }}
        </p>

        <div class=\"quote-actions\">
            <a href=\"{{ path('user_statistics_dashboard') }}\" class=\"btn-small btn-small-secondary\" style=\"flex: 1; justify-content: center;\">
                <i class=\"fas fa-sync-alt\"></i>
                Actualiser
            </a>
        </div>
    </div>
{% endif %}

<div class=\"user-kpi-grid\">
    <div class=\"user-kpi-card\">
        <div class=\"user-kpi-value\">{{ stats.kpis.total_tests }}</div>
        <div class=\"user-kpi-label\">Tests passés</div>
    </div>
    <div class=\"user-kpi-card\">
        <div class=\"user-kpi-value\">{{ stats.kpis.best_percentage }}%</div>
        <div class=\"user-kpi-label\">Meilleur score</div>
    </div>
    <div class=\"user-kpi-card\">
        <div class=\"user-kpi-value\">{{ stats.kpis.average_percentage }}%</div>
        <div class=\"user-kpi-label\">Moyenne</div>
    </div>
    <div class=\"user-kpi-card\">
        <div class=\"user-kpi-value\" style=\"font-size: 1.2rem;\">
            {% if stats.kpis.dominant_category %}
                {{ stats.kpis.dominant_category }}
            {% else %}
                -
            {% endif %}
        </div>
        <div class=\"user-kpi-label\">Catégorie dominante</div>
    </div>
    <div class=\"user-kpi-card\">
        <div class=\"user-kpi-value\" style=\"font-size: 1.2rem;\">
            {% if stats.kpis.dominant_level %}
                {{ stats.kpis.dominant_level }}
            {% else %}
                -
            {% endif %}
        </div>
        <div class=\"user-kpi-label\">Niveau dominant</div>
    </div>
</div>

<div class=\"user-chart-grid\">
    <div class=\"user-chart-card\">
        <div class=\"user-card-title\">
            <i class=\"fas fa-chart-line\"></i>
            Progression hebdomadaire
        </div>
        {% if stats.weekly_labels|length > 0 %}
            {{ render_chart(progressChart) }}
        {% else %}
            <div class=\"empty-state\">
                <div class=\"empty-state-icon\"><i class=\"fas fa-inbox\"></i></div>
                <p>Aucune donnée de progression disponible</p>
            </div>
        {% endif %}
    </div>

    <div class=\"user-chart-card\">
        <div class=\"user-card-title\">
            <i class=\"fas fa-chart-pie\"></i>
            Répartition des catégories
        </div>
        {% if stats.category_labels|length > 0 %}
            {{ render_chart(userCategoryChart) }}
        {% else %}
            <div class=\"empty-state\">
                <div class=\"empty-state-icon\"><i class=\"fas fa-inbox\"></i></div>
                <p>Aucune catégorie testée</p>
            </div>
        {% endif %}
    </div>
</div>

<div class=\"user-history-card\">
    <div class=\"user-card-title\">
        <i class=\"fas fa-history\"></i>
        Historique détaillé
    </div>

    {% if stats.history|length > 0 %}
        <div class=\"timeline\">
            {% for item in stats.history|reverse %}
                <div class=\"timeline-item\">
                    <div class=\"timeline-top\">
                        <div class=\"timeline-title\">
                            <i class=\"fas fa-calendar-check\" style=\"color: #2563eb; margin-right: 0.5rem;\"></i>
                            Semaine {{ item.week }}
                        </div>
                        <div class=\"timeline-percent\">{{ item.percentage }}%</div>
                    </div>
                    <div class=\"timeline-meta\">
                        📁 Catégorie : <strong>{{ item.category }}</strong> |
                        📊 Niveau : <strong>{{ item.level }}</strong>
                        {% if item.date %} | 📅 {{ item.date|date('d/m/Y') }}{% endif %}
                    </div>
                </div>
            {% endfor %}
        </div>
    {% else %}
        <div class=\"empty-state\">
            <div class=\"empty-state-icon\"><i class=\"fas fa-inbox\"></i></div>
            <p>Aucune donnée statistique pour le moment.</p>
            <p style=\"font-size: 0.9rem; margin-top: 0.5rem;\">
                <a href=\"{{ path('front_general_test') }}\" style=\"color: #2563eb; text-decoration: none; font-weight: 600;\">
                    Passez un test pour commencer →
                </a>
            </p>
        </div>
    {% endif %}
</div>

{% endblock %}", "user_statistics/index.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/user_statistics/index.html.twig");
    }
}
