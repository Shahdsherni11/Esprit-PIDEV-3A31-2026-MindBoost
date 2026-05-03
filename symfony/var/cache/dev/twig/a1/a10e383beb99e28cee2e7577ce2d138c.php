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

/* front_test/specific_result.html.twig */
class __TwigTemplate_b6b0adda5afc936869d3e0f82eb2537c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front_test/specific_result.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front_test/specific_result.html.twig"));

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

        yield "Résultat du Test Spécifique";
        
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
    .result-container {
        max-width: 700px;
        margin: 2rem auto;
        animation: slideIn 0.5s ease-out;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .result-header {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
        padding: 2rem;
        border-radius: 20px;
        text-align: center;
        margin-bottom: 2rem;
        box-shadow: 0 16px 35px rgba(16,185,129,0.2);
    }

    .result-header h1 {
        margin: 0;
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }

    .result-header p {
        margin: 0.5rem 0;
        font-size: 1.1rem;
        opacity: 0.95;
    }

    .result-card {
        background: white;
        border: 2px solid #e5e7eb;
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    }

    .result-label {
        font-size: 0.9rem;
        color: #6b7280;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
    }

    .result-value {
        font-size: 2rem;
        font-weight: 900;
        color: #1f2937;
        margin-bottom: 0.5rem;
    }

    .result-description {
        color: #6b7280;
        font-size: 0.95rem;
    }

    .score-bar {
        width: 100%;
        height: 12px;
        background: #e5e7eb;
        border-radius: 999px;
        overflow: hidden;
        margin-top: 1rem;
    }

    .score-bar-fill {
        height: 100%;
        background: linear-gradient(90deg, #10b981, #059669);
        border-radius: 999px;
        transition: width 0.8s ease-out;
    }

    .level-badge {
        display: inline-block;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 700;
        margin-top: 1rem;
    }

    .level-badge.low {
        background: #dbeafe;
        color: #1e40af;
    }

    .level-badge.medium {
        background: #fef3c7;
        color: #92400e;
    }

    .level-badge.high {
        background: #fee2e2;
        color: #991b1b;
    }

    .success-message {
        background: linear-gradient(135deg, rgba(16,185,129,0.1), rgba(5,150,105,0.1));
        border-left: 4px solid #10b981;
        padding: 1.2rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }

    .success-message p {
        margin: 0;
        color: #059669;
        font-weight: 600;
    }

    .action-buttons {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
        flex-wrap: wrap;
    }

    .btn {
        flex: 1;
        min-width: 200px;
        padding: 1rem;
        border-radius: 12px;
        border: none;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.22s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-primary {
        background: #2563eb;
        color: white;
    }

    .btn-primary:hover {
        background: #1d4ed8;
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(37,99,235,0.3);
    }

    .btn-secondary {
        background: #e5e7eb;
        color: #1f2937;
    }

    .btn-secondary:hover {
        background: #d1d5db;
        transform: translateY(-2px);
    }

    .test-details {
        background: #f9fafb;
        border-radius: 12px;
        padding: 1.5rem;
        margin-top: 1.5rem;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        padding: 0.8rem 0;
        border-bottom: 1px solid #e5e7eb;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-label {
        color: #6b7280;
        font-weight: 600;
    }

    .detail-value {
        color: #1f2937;
        font-weight: 700;
    }

    @media (max-width: 768px) {
        .result-container {
            margin: 1rem;
        }

        .result-header {
            padding: 1.5rem;
        }

        .result-header h1 {
            font-size: 2rem;
        }

        .action-buttons {
            flex-direction: column;
        }

        .btn {
            min-width: auto;
            width: 100%;
        }
    }
</style>

<div class=\"result-container\">
    <!-- SUCCESS MESSAGE -->
    <div class=\"success-message\">
        <p>✅ Vos réponses ont été enregistrées avec succès !</p>
    </div>

    <!-- RESULT HEADER -->
    <div class=\"result-header\">
        <h1>";
        // line 232
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["percentage"]) || array_key_exists("percentage", $context) ? $context["percentage"] : (function () { throw new RuntimeError('Variable "percentage" does not exist.', 232, $this->source); })()), "html", null, true);
        yield "%</h1>
        <p><strong>Test :</strong> ";
        // line 233
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 233, $this->source); })()), "title", [], "any", false, false, false, 233), "html", null, true);
        yield "</p>
        <p><strong>Catégorie :</strong> ";
        // line 234
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 234, $this->source); })()), "category", [], "any", false, false, false, 234), "html", null, true);
        yield "</p>
    </div>

    <!-- SCORE CARD -->
    <div class=\"result-card\">
        <div class=\"result-label\">Votre Score</div>
        <div class=\"result-value\">";
        // line 240
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalScore"]) || array_key_exists("totalScore", $context) ? $context["totalScore"] : (function () { throw new RuntimeError('Variable "totalScore" does not exist.', 240, $this->source); })()), "html", null, true);
        yield " / ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["maxScore"]) || array_key_exists("maxScore", $context) ? $context["maxScore"] : (function () { throw new RuntimeError('Variable "maxScore" does not exist.', 240, $this->source); })()), "html", null, true);
        yield "</div>
        <div class=\"score-bar\">
            <div class=\"score-bar-fill\" style=\"width: ";
        // line 242
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["percentage"]) || array_key_exists("percentage", $context) ? $context["percentage"] : (function () { throw new RuntimeError('Variable "percentage" does not exist.', 242, $this->source); })()), "html", null, true);
        yield "%;\"></div>
        </div>
        <div class=\"result-description\">
            Vous avez répondu correctement à ";
        // line 245
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalScore"]) || array_key_exists("totalScore", $context) ? $context["totalScore"] : (function () { throw new RuntimeError('Variable "totalScore" does not exist.', 245, $this->source); })()), "html", null, true);
        yield " questions sur ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["maxScore"]) || array_key_exists("maxScore", $context) ? $context["maxScore"] : (function () { throw new RuntimeError('Variable "maxScore" does not exist.', 245, $this->source); })()), "html", null, true);
        yield ".
        </div>
    </div>

    <!-- LEVEL BADGE -->
    <div class=\"result-card\">
        <div class=\"result-label\">Votre Niveau</div>
        <div class=\"result-value\">
            ";
        // line 253
        if (((isset($context["level"]) || array_key_exists("level", $context) ? $context["level"] : (function () { throw new RuntimeError('Variable "level" does not exist.', 253, $this->source); })()) == "Bas")) {
            // line 254
            yield "                <span class=\"level-badge low\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["level"]) || array_key_exists("level", $context) ? $context["level"] : (function () { throw new RuntimeError('Variable "level" does not exist.', 254, $this->source); })()), "html", null, true);
            yield "</span>
            ";
        } elseif ((        // line 255
(isset($context["level"]) || array_key_exists("level", $context) ? $context["level"] : (function () { throw new RuntimeError('Variable "level" does not exist.', 255, $this->source); })()) == "Moyen")) {
            // line 256
            yield "                <span class=\"level-badge medium\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["level"]) || array_key_exists("level", $context) ? $context["level"] : (function () { throw new RuntimeError('Variable "level" does not exist.', 256, $this->source); })()), "html", null, true);
            yield "</span>
            ";
        } else {
            // line 258
            yield "                <span class=\"level-badge high\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["level"]) || array_key_exists("level", $context) ? $context["level"] : (function () { throw new RuntimeError('Variable "level" does not exist.', 258, $this->source); })()), "html", null, true);
            yield "</span>
            ";
        }
        // line 260
        yield "        </div>
        <div class=\"result-description\">
            ";
        // line 262
        if (((isset($context["level"]) || array_key_exists("level", $context) ? $context["level"] : (function () { throw new RuntimeError('Variable "level" does not exist.', 262, $this->source); })()) == "Bas")) {
            // line 263
            yield "                Vous pouvez continuer à progresser dans ce domaine. 💪
            ";
        } elseif ((        // line 264
(isset($context["level"]) || array_key_exists("level", $context) ? $context["level"] : (function () { throw new RuntimeError('Variable "level" does not exist.', 264, $this->source); })()) == "Moyen")) {
            // line 265
            yield "                Bon résultat ! Continuez vos efforts. 👍
            ";
        } else {
            // line 267
            yield "                ⚠️ Vous avez obtenu un niveau élevé. Une aide est recommandée.
            ";
        }
        // line 269
        yield "        </div>
    </div>

    <!-- TEST DETAILS -->
    <div class=\"result-card\">
        <div class=\"test-details\">
            <div class=\"detail-row\">
                <span class=\"detail-label\">Test :</span>
                <span class=\"detail-value\">";
        // line 277
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 277, $this->source); })()), "title", [], "any", false, false, false, 277), "html", null, true);
        yield "</span>
            </div>
            <div class=\"detail-row\">
                <span class=\"detail-label\">Catégorie :</span>
                <span class=\"detail-value\">";
        // line 281
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 281, $this->source); })()), "category", [], "any", false, false, false, 281), "html", null, true);
        yield "</span>
            </div>
            <div class=\"detail-row\">
                <span class=\"detail-label\">Score :</span>
                <span class=\"detail-value\">";
        // line 285
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalScore"]) || array_key_exists("totalScore", $context) ? $context["totalScore"] : (function () { throw new RuntimeError('Variable "totalScore" does not exist.', 285, $this->source); })()), "html", null, true);
        yield " / ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["maxScore"]) || array_key_exists("maxScore", $context) ? $context["maxScore"] : (function () { throw new RuntimeError('Variable "maxScore" does not exist.', 285, $this->source); })()), "html", null, true);
        yield "</span>
            </div>
            <div class=\"detail-row\">
                <span class=\"detail-label\">Pourcentage :</span>
                <span class=\"detail-value\">";
        // line 289
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["percentage"]) || array_key_exists("percentage", $context) ? $context["percentage"] : (function () { throw new RuntimeError('Variable "percentage" does not exist.', 289, $this->source); })()), "html", null, true);
        yield "%</span>
            </div>
            <div class=\"detail-row\">
                <span class=\"detail-label\">Niveau :</span>
                <span class=\"detail-value\">";
        // line 293
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["level"]) || array_key_exists("level", $context) ? $context["level"] : (function () { throw new RuntimeError('Variable "level" does not exist.', 293, $this->source); })()), "html", null, true);
        yield "</span>
            </div>
            <div class=\"detail-row\">
                <span class=\"detail-label\">Date :</span>
                <span class=\"detail-value\">";
        // line 297
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "d/m/Y H:i"), "html", null, true);
        yield "</span>
            </div>
        </div>
    </div>

    <!-- ACTION BUTTONS -->
    <div class=\"action-buttons\">
        <a href=\"";
        // line 304
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_user_home");
        yield "\" class=\"btn btn-primary\">
            <i class=\"fas fa-home\"></i>
            Retour à l'accueil
        </a>
        <a href=\"";
        // line 308
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_general_test");
        yield "\" class=\"btn btn-secondary\">
            <i class=\"fas fa-redo\"></i>
            Autre test
        </a>
        <a href=\"";
        // line 312
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_statistics_dashboard");
        yield "\" class=\"btn btn-secondary\">
            <i class=\"fas fa-chart-line\"></i>
            Mes statistiques
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
        return "front_test/specific_result.html.twig";
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
        return array (  482 => 312,  475 => 308,  468 => 304,  458 => 297,  451 => 293,  444 => 289,  435 => 285,  428 => 281,  421 => 277,  411 => 269,  407 => 267,  403 => 265,  401 => 264,  398 => 263,  396 => 262,  392 => 260,  386 => 258,  380 => 256,  378 => 255,  373 => 254,  371 => 253,  358 => 245,  352 => 242,  345 => 240,  336 => 234,  332 => 233,  328 => 232,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'front/base.html.twig' %}

{% block title %}Résultat du Test Spécifique{% endblock %}

{% block content %}
<style>
    .result-container {
        max-width: 700px;
        margin: 2rem auto;
        animation: slideIn 0.5s ease-out;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .result-header {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
        padding: 2rem;
        border-radius: 20px;
        text-align: center;
        margin-bottom: 2rem;
        box-shadow: 0 16px 35px rgba(16,185,129,0.2);
    }

    .result-header h1 {
        margin: 0;
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }

    .result-header p {
        margin: 0.5rem 0;
        font-size: 1.1rem;
        opacity: 0.95;
    }

    .result-card {
        background: white;
        border: 2px solid #e5e7eb;
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    }

    .result-label {
        font-size: 0.9rem;
        color: #6b7280;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
    }

    .result-value {
        font-size: 2rem;
        font-weight: 900;
        color: #1f2937;
        margin-bottom: 0.5rem;
    }

    .result-description {
        color: #6b7280;
        font-size: 0.95rem;
    }

    .score-bar {
        width: 100%;
        height: 12px;
        background: #e5e7eb;
        border-radius: 999px;
        overflow: hidden;
        margin-top: 1rem;
    }

    .score-bar-fill {
        height: 100%;
        background: linear-gradient(90deg, #10b981, #059669);
        border-radius: 999px;
        transition: width 0.8s ease-out;
    }

    .level-badge {
        display: inline-block;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 700;
        margin-top: 1rem;
    }

    .level-badge.low {
        background: #dbeafe;
        color: #1e40af;
    }

    .level-badge.medium {
        background: #fef3c7;
        color: #92400e;
    }

    .level-badge.high {
        background: #fee2e2;
        color: #991b1b;
    }

    .success-message {
        background: linear-gradient(135deg, rgba(16,185,129,0.1), rgba(5,150,105,0.1));
        border-left: 4px solid #10b981;
        padding: 1.2rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }

    .success-message p {
        margin: 0;
        color: #059669;
        font-weight: 600;
    }

    .action-buttons {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
        flex-wrap: wrap;
    }

    .btn {
        flex: 1;
        min-width: 200px;
        padding: 1rem;
        border-radius: 12px;
        border: none;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.22s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-primary {
        background: #2563eb;
        color: white;
    }

    .btn-primary:hover {
        background: #1d4ed8;
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(37,99,235,0.3);
    }

    .btn-secondary {
        background: #e5e7eb;
        color: #1f2937;
    }

    .btn-secondary:hover {
        background: #d1d5db;
        transform: translateY(-2px);
    }

    .test-details {
        background: #f9fafb;
        border-radius: 12px;
        padding: 1.5rem;
        margin-top: 1.5rem;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        padding: 0.8rem 0;
        border-bottom: 1px solid #e5e7eb;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-label {
        color: #6b7280;
        font-weight: 600;
    }

    .detail-value {
        color: #1f2937;
        font-weight: 700;
    }

    @media (max-width: 768px) {
        .result-container {
            margin: 1rem;
        }

        .result-header {
            padding: 1.5rem;
        }

        .result-header h1 {
            font-size: 2rem;
        }

        .action-buttons {
            flex-direction: column;
        }

        .btn {
            min-width: auto;
            width: 100%;
        }
    }
</style>

<div class=\"result-container\">
    <!-- SUCCESS MESSAGE -->
    <div class=\"success-message\">
        <p>✅ Vos réponses ont été enregistrées avec succès !</p>
    </div>

    <!-- RESULT HEADER -->
    <div class=\"result-header\">
        <h1>{{ percentage }}%</h1>
        <p><strong>Test :</strong> {{ test.title }}</p>
        <p><strong>Catégorie :</strong> {{ test.category }}</p>
    </div>

    <!-- SCORE CARD -->
    <div class=\"result-card\">
        <div class=\"result-label\">Votre Score</div>
        <div class=\"result-value\">{{ totalScore }} / {{ maxScore }}</div>
        <div class=\"score-bar\">
            <div class=\"score-bar-fill\" style=\"width: {{ percentage }}%;\"></div>
        </div>
        <div class=\"result-description\">
            Vous avez répondu correctement à {{ totalScore }} questions sur {{ maxScore }}.
        </div>
    </div>

    <!-- LEVEL BADGE -->
    <div class=\"result-card\">
        <div class=\"result-label\">Votre Niveau</div>
        <div class=\"result-value\">
            {% if level == 'Bas' %}
                <span class=\"level-badge low\">{{ level }}</span>
            {% elseif level == 'Moyen' %}
                <span class=\"level-badge medium\">{{ level }}</span>
            {% else %}
                <span class=\"level-badge high\">{{ level }}</span>
            {% endif %}
        </div>
        <div class=\"result-description\">
            {% if level == 'Bas' %}
                Vous pouvez continuer à progresser dans ce domaine. 💪
            {% elseif level == 'Moyen' %}
                Bon résultat ! Continuez vos efforts. 👍
            {% else %}
                ⚠️ Vous avez obtenu un niveau élevé. Une aide est recommandée.
            {% endif %}
        </div>
    </div>

    <!-- TEST DETAILS -->
    <div class=\"result-card\">
        <div class=\"test-details\">
            <div class=\"detail-row\">
                <span class=\"detail-label\">Test :</span>
                <span class=\"detail-value\">{{ test.title }}</span>
            </div>
            <div class=\"detail-row\">
                <span class=\"detail-label\">Catégorie :</span>
                <span class=\"detail-value\">{{ test.category }}</span>
            </div>
            <div class=\"detail-row\">
                <span class=\"detail-label\">Score :</span>
                <span class=\"detail-value\">{{ totalScore }} / {{ maxScore }}</span>
            </div>
            <div class=\"detail-row\">
                <span class=\"detail-label\">Pourcentage :</span>
                <span class=\"detail-value\">{{ percentage }}%</span>
            </div>
            <div class=\"detail-row\">
                <span class=\"detail-label\">Niveau :</span>
                <span class=\"detail-value\">{{ level }}</span>
            </div>
            <div class=\"detail-row\">
                <span class=\"detail-label\">Date :</span>
                <span class=\"detail-value\">{{ \"now\"|date('d/m/Y H:i') }}</span>
            </div>
        </div>
    </div>

    <!-- ACTION BUTTONS -->
    <div class=\"action-buttons\">
        <a href=\"{{ path('front_user_home') }}\" class=\"btn btn-primary\">
            <i class=\"fas fa-home\"></i>
            Retour à l'accueil
        </a>
        <a href=\"{{ path('front_general_test') }}\" class=\"btn btn-secondary\">
            <i class=\"fas fa-redo\"></i>
            Autre test
        </a>
        <a href=\"{{ path('user_statistics_dashboard') }}\" class=\"btn btn-secondary\">
            <i class=\"fas fa-chart-line\"></i>
            Mes statistiques
        </a>
    </div>
</div>

{% endblock %}", "front_test/specific_result.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/front_test/specific_result.html.twig");
    }
}
