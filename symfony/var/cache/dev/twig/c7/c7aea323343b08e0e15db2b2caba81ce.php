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

/* front_test/user_home.html.twig */
class __TwigTemplate_14d32d4605ece1f3a6097889700c48a4 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front_test/user_home.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front_test/user_home.html.twig"));

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

        yield "Accueil - MindBoost";
        
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
    .home-box {
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: linear-gradient(135deg, rgba(37,99,235,0.08), rgba(6,182,212,0.06));
        border: 2px solid rgba(37,99,235,0.12);
        border-radius: 20px;
    }

    .emotion-box {
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: linear-gradient(135deg, rgba(16,185,129,0.08), rgba(59,130,246,0.06));
        border: 2px solid rgba(16,185,129,0.14);
        border-radius: 20px;
    }

    .emotion-textarea {
        width: 100%;
        min-height: 120px;
        border: 1px solid #cfe0ff;
        border-radius: 14px;
        padding: 1rem;
        resize: vertical;
        background: #fff;
        color: #17253a;
        font-size: 1rem;
        margin-top: 1rem;
    }

    .emotion-actions {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        margin-top: 1rem;
    }

    .btn-reset-visible {
        background: #e5e7eb !important;
        color: #1f2937 !important;
        border: 1px solid #d1d5db !important;
        text-decoration: none;
    }

    .btn-reset-visible:hover {
        background: #d1d5db !important;
        color: #111827 !important;
    }

    .sentiment-feedback {
        margin-top: 1.2rem;
        padding: 1rem 1.2rem;
        border-radius: 16px;
        border: 1px solid transparent;
        min-height: 110px;
    }

    .sentiment-feedback.positive {
        background: rgba(34,197,94,0.12);
        border-color: rgba(34,197,94,0.2);
        color: #166534;
    }

    .sentiment-feedback.neutral {
        background: rgba(59,130,246,0.10);
        border-color: rgba(59,130,246,0.18);
        color: #1d4ed8;
    }

    .sentiment-feedback.critical {
        background: rgba(239,68,68,0.10);
        border-color: rgba(239,68,68,0.18);
        color: #991b1b;
    }

    .sentiment-feedback.unknown {
        background: rgba(148,163,184,0.10);
        border-color: rgba(148,163,184,0.18);
        color: #334155;
    }

    .sentiment-meta {
        font-size: 0.92rem;
        margin-top: 0.5rem;
        opacity: 0.95;
    }

    .quick-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
    }

    @media (max-width: 768px) {
        .quick-grid {
            grid-template-columns: 1fr;
        }

        .emotion-actions {
            flex-direction: column;
        }
    }
</style>

<div class=\"page-heading\">
    <h1><i class=\"fas fa-home me-2\"></i>Accueil</h1>
    <p>Bienvenue dans votre espace MindBoost</p>
</div>

<div class=\"emotion-box\">
    <h3 style=\"color: #166534; font-weight: 700; margin: 0 0 0.7rem 0;\">
        <i class=\"fas fa-heart-circle-bolt\" style=\"margin-right: 0.5rem;\"></i>
        Journal émotionnel du jour
    </h3>

    <p style=\"color:#334155; margin:0;\">
        Souhaitez-vous décrire votre ressenti en une phrase ?
    </p>

    <form method=\"POST\" action=\"";
        // line 125
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_emotion_journal_analyze");
        yield "\">
        <textarea
            name=\"emotion_text\"
            class=\"emotion-textarea\"
            placeholder=\"Exemple : Je me sens un peu fatigué mais motivé aujourd’hui.\"
        >";
        // line 130
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("emotionText", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["emotionText"]) || array_key_exists("emotionText", $context) ? $context["emotionText"] : (function () { throw new RuntimeError('Variable "emotionText" does not exist.', 130, $this->source); })()), "")) : ("")), "html", null, true);
        yield "</textarea>

        <div class=\"emotion-actions\">
            <button type=\"submit\" class=\"btn btn-success\">
                <i class=\"fas fa-wave-square me-2\"></i>
                Analyser mon ressenti
            </button>

            <a href=\"";
        // line 138
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_user_home");
        yield "\" class=\"btn btn-reset-visible\">
                <i class=\"fas fa-rotate-right me-2\"></i>
                Réinitialiser
            </a>
        </div>
    </form>

    <div class=\"sentiment-feedback ";
        // line 145
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("sentimentUiLevel", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["sentimentUiLevel"]) || array_key_exists("sentimentUiLevel", $context) ? $context["sentimentUiLevel"] : (function () { throw new RuntimeError('Variable "sentimentUiLevel" does not exist.', 145, $this->source); })()), "unknown")) : ("unknown")), "html", null, true);
        yield "\">
        <div style=\"font-weight: 800; font-size: 1rem;\">
            ";
        // line 147
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["emotionText"]) || array_key_exists("emotionText", $context) ? $context["emotionText"] : (function () { throw new RuntimeError('Variable "emotionText" does not exist.', 147, $this->source); })()))) {
            // line 148
            yield "                ℹ️ Résultat de l’analyse
            ";
        } elseif ((        // line 149
(isset($context["sentimentUiLevel"]) || array_key_exists("sentimentUiLevel", $context) ? $context["sentimentUiLevel"] : (function () { throw new RuntimeError('Variable "sentimentUiLevel" does not exist.', 149, $this->source); })()) == "positive")) {
            // line 150
            yield "                ✅ Ressenti plutôt positif
            ";
        } elseif ((        // line 151
(isset($context["sentimentUiLevel"]) || array_key_exists("sentimentUiLevel", $context) ? $context["sentimentUiLevel"] : (function () { throw new RuntimeError('Variable "sentimentUiLevel" does not exist.', 151, $this->source); })()) == "critical")) {
            // line 152
            yield "                ⚠️ Ressenti émotionnel fragile
            ";
        } elseif ((        // line 153
(isset($context["sentimentUiLevel"]) || array_key_exists("sentimentUiLevel", $context) ? $context["sentimentUiLevel"] : (function () { throw new RuntimeError('Variable "sentimentUiLevel" does not exist.', 153, $this->source); })()) == "neutral")) {
            // line 154
            yield "                ℹ️ Ressenti plutôt neutre
            ";
        } else {
            // line 156
            yield "                ℹ️ Résultat de l’analyse
            ";
        }
        // line 158
        yield "        </div>

        <div style=\"margin-top: 0.45rem;\">
            ";
        // line 161
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("sentimentFeedback", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["sentimentFeedback"]) || array_key_exists("sentimentFeedback", $context) ? $context["sentimentFeedback"] : (function () { throw new RuntimeError('Variable "sentimentFeedback" does not exist.', 161, $this->source); })()), "Écrivez une phrase puis cliquez sur analyser.")) : ("Écrivez une phrase puis cliquez sur analyser.")), "html", null, true);
        yield "
        </div>

        <div class=\"sentiment-meta\">
            <strong>Texte analysé :</strong>
            ";
        // line 166
        yield (((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["emotionText"]) || array_key_exists("emotionText", $context) ? $context["emotionText"] : (function () { throw new RuntimeError('Variable "emotionText" does not exist.', 166, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["emotionText"]) || array_key_exists("emotionText", $context) ? $context["emotionText"] : (function () { throw new RuntimeError('Variable "emotionText" does not exist.', 166, $this->source); })()), "html", null, true)) : ("Aucun texte saisi"));
        yield "<br>

            ";
        // line 168
        if ((($tmp = (isset($context["sentimentAnalysis"]) || array_key_exists("sentimentAnalysis", $context) ? $context["sentimentAnalysis"] : (function () { throw new RuntimeError('Variable "sentimentAnalysis" does not exist.', 168, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 169
            yield "                <strong>Sentiment détecté :</strong> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["sentimentAnalysis"] ?? null), "sentiment", [], "any", true, true, false, 169)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentimentAnalysis"]) || array_key_exists("sentimentAnalysis", $context) ? $context["sentimentAnalysis"] : (function () { throw new RuntimeError('Variable "sentimentAnalysis" does not exist.', 169, $this->source); })()), "sentiment", [], "any", false, false, false, 169), "NEUTRAL")) : ("NEUTRAL")), "html", null, true);
            yield " |
                <strong>Score :</strong> ";
            // line 170
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["sentimentAnalysis"] ?? null), "score", [], "any", true, true, false, 170)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentimentAnalysis"]) || array_key_exists("sentimentAnalysis", $context) ? $context["sentimentAnalysis"] : (function () { throw new RuntimeError('Variable "sentimentAnalysis" does not exist.', 170, $this->source); })()), "score", [], "any", false, false, false, 170), 0)) : (0)), "html", null, true);
            yield "
            ";
        } else {
            // line 172
            yield "                <strong>Sentiment détecté :</strong> indisponible |
                <strong>Score :</strong> indisponible
            ";
        }
        // line 175
        yield "        </div>
    </div>
</div>

<div class=\"home-box\">
    <h3 style=\"color: #0c5ba3; font-weight: 700; margin: 0 0 1rem 0;\">
        <i class=\"fas fa-lightbulb\" style=\"color: #2563eb; margin-right: 0.5rem;\"></i>
        Citation motivante du jour
    </h3>

    ";
        // line 185
        if ((((isset($context["motivationalQuote"]) || array_key_exists("motivationalQuote", $context) ? $context["motivationalQuote"] : (function () { throw new RuntimeError('Variable "motivationalQuote" does not exist.', 185, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, ($context["motivationalQuote"] ?? null), "content", [], "any", true, true, false, 185)) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivationalQuote"]) || array_key_exists("motivationalQuote", $context) ? $context["motivationalQuote"] : (function () { throw new RuntimeError('Variable "motivationalQuote" does not exist.', 185, $this->source); })()), "content", [], "any", false, false, false, 185))) {
            // line 186
            yield "        <p style=\"color: #1f2937; font-style: italic; font-size: 1.05rem; line-height: 1.8; margin: 0;\">
            \"";
            // line 187
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivationalQuote"]) || array_key_exists("motivationalQuote", $context) ? $context["motivationalQuote"] : (function () { throw new RuntimeError('Variable "motivationalQuote" does not exist.', 187, $this->source); })()), "content", [], "any", false, false, false, 187), "html", null, true);
            yield "\"
        </p>
        <p style=\"color: #6c7b95; margin: 0.5rem 0 0 0; font-size: 0.9rem;\">
            — ";
            // line 190
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["motivationalQuote"] ?? null), "author", [], "any", true, true, false, 190)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivationalQuote"]) || array_key_exists("motivationalQuote", $context) ? $context["motivationalQuote"] : (function () { throw new RuntimeError('Variable "motivationalQuote" does not exist.', 190, $this->source); })()), "author", [], "any", false, false, false, 190), "Auteur inconnu")) : ("Auteur inconnu")), "html", null, true);
            yield "
        </p>
    ";
        } else {
            // line 193
            yield "        <p style=\"color: #1f2937; font-style: italic; font-size: 1.05rem; line-height: 1.8; margin: 0;\">
            Aucune citation disponible pour le moment. Réessayez dans quelques instants.
        </p>
    ";
        }
        // line 197
        yield "</div>

<h2 style=\"font-size: 1.3rem; font-weight: 900; color: #17253a; margin: 2rem 0 1rem 0;\">
    <i class=\"fas fa-play-circle\" style=\"margin-right: 0.5rem;\"></i>
    Commencer votre évaluation
</h2>

";
        // line 204
        if ((($tmp = (isset($context["generalTest"]) || array_key_exists("generalTest", $context) ? $context["generalTest"] : (function () { throw new RuntimeError('Variable "generalTest" does not exist.', 204, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 205
            yield "    <div style=\"background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%); border: 2px solid #dbe7ff; border-radius: 20px; padding: 2rem; box-shadow: 0 14px 30px rgba(23,37,84,0.06); margin-bottom: 2rem;\">
        <h3 style=\"font-size: 1.5rem; font-weight: 900; color: #17253a; margin: 0 0 0.5rem 0;\">
            ";
            // line 207
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["generalTest"] ?? null), "title", [], "any", true, true, false, 207)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["generalTest"]) || array_key_exists("generalTest", $context) ? $context["generalTest"] : (function () { throw new RuntimeError('Variable "generalTest" does not exist.', 207, $this->source); })()), "title", [], "any", false, false, false, 207), "Test général")) : ("Test général")), "html", null, true);
            yield "
        </h3>
        <p style=\"color: #6c7b95; margin: 0; line-height: 1.6;\">
            ";
            // line 210
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["generalTest"] ?? null), "description", [], "any", true, true, false, 210)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["generalTest"]) || array_key_exists("generalTest", $context) ? $context["generalTest"] : (function () { throw new RuntimeError('Variable "generalTest" does not exist.', 210, $this->source); })()), "description", [], "any", false, false, false, 210), "Ce test permet une première évaluation de votre état.")) : ("Ce test permet une première évaluation de votre état.")), "html", null, true);
            yield "
        </p>

        <div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem; margin: 1.5rem 0;\">
            <div style=\"display: flex; align-items: center; gap: 0.8rem; color: #4b5563;\">
                <i class=\"fas fa-clock\" style=\"color: #10b981;\"></i>
                <span>Durée : 10-15 min</span>
            </div>
            <div style=\"display: flex; align-items: center; gap: 0.8rem; color: #4b5563;\">
                <i class=\"fas fa-check-circle\" style=\"color: #10b981;\"></i>
                <span>Évaluation complète</span>
            </div>
            <div style=\"display: flex; align-items: center; gap: 0.8rem; color: #4b5563;\">
                <i class=\"fas fa-chart-line\" style=\"color: #10b981;\"></i>
                <span>Suivi des progrès</span>
            </div>
            <div style=\"display: flex; align-items: center; gap: 0.8rem; color: #4b5563;\">
                <i class=\"fas fa-lock\" style=\"color: #10b981;\"></i>
                <span>Données sécurisées</span>
            </div>
        </div>

        <a href=\"";
            // line 232
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_general_test");
            yield "\" class=\"btn btn-primary\">
            <i class=\"fas fa-book-open me-2\"></i>
            Passer le test général
        </a>
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
        return "front_test/user_home.html.twig";
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
        return array (  396 => 232,  371 => 210,  365 => 207,  361 => 205,  359 => 204,  350 => 197,  344 => 193,  338 => 190,  332 => 187,  329 => 186,  327 => 185,  315 => 175,  310 => 172,  305 => 170,  300 => 169,  298 => 168,  293 => 166,  285 => 161,  280 => 158,  276 => 156,  272 => 154,  270 => 153,  267 => 152,  265 => 151,  262 => 150,  260 => 149,  257 => 148,  255 => 147,  250 => 145,  240 => 138,  229 => 130,  221 => 125,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'front/base.html.twig' %}

{% block title %}Accueil - MindBoost{% endblock %}

{% block content %}
<style>
    .home-box {
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: linear-gradient(135deg, rgba(37,99,235,0.08), rgba(6,182,212,0.06));
        border: 2px solid rgba(37,99,235,0.12);
        border-radius: 20px;
    }

    .emotion-box {
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: linear-gradient(135deg, rgba(16,185,129,0.08), rgba(59,130,246,0.06));
        border: 2px solid rgba(16,185,129,0.14);
        border-radius: 20px;
    }

    .emotion-textarea {
        width: 100%;
        min-height: 120px;
        border: 1px solid #cfe0ff;
        border-radius: 14px;
        padding: 1rem;
        resize: vertical;
        background: #fff;
        color: #17253a;
        font-size: 1rem;
        margin-top: 1rem;
    }

    .emotion-actions {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        margin-top: 1rem;
    }

    .btn-reset-visible {
        background: #e5e7eb !important;
        color: #1f2937 !important;
        border: 1px solid #d1d5db !important;
        text-decoration: none;
    }

    .btn-reset-visible:hover {
        background: #d1d5db !important;
        color: #111827 !important;
    }

    .sentiment-feedback {
        margin-top: 1.2rem;
        padding: 1rem 1.2rem;
        border-radius: 16px;
        border: 1px solid transparent;
        min-height: 110px;
    }

    .sentiment-feedback.positive {
        background: rgba(34,197,94,0.12);
        border-color: rgba(34,197,94,0.2);
        color: #166534;
    }

    .sentiment-feedback.neutral {
        background: rgba(59,130,246,0.10);
        border-color: rgba(59,130,246,0.18);
        color: #1d4ed8;
    }

    .sentiment-feedback.critical {
        background: rgba(239,68,68,0.10);
        border-color: rgba(239,68,68,0.18);
        color: #991b1b;
    }

    .sentiment-feedback.unknown {
        background: rgba(148,163,184,0.10);
        border-color: rgba(148,163,184,0.18);
        color: #334155;
    }

    .sentiment-meta {
        font-size: 0.92rem;
        margin-top: 0.5rem;
        opacity: 0.95;
    }

    .quick-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
    }

    @media (max-width: 768px) {
        .quick-grid {
            grid-template-columns: 1fr;
        }

        .emotion-actions {
            flex-direction: column;
        }
    }
</style>

<div class=\"page-heading\">
    <h1><i class=\"fas fa-home me-2\"></i>Accueil</h1>
    <p>Bienvenue dans votre espace MindBoost</p>
</div>

<div class=\"emotion-box\">
    <h3 style=\"color: #166534; font-weight: 700; margin: 0 0 0.7rem 0;\">
        <i class=\"fas fa-heart-circle-bolt\" style=\"margin-right: 0.5rem;\"></i>
        Journal émotionnel du jour
    </h3>

    <p style=\"color:#334155; margin:0;\">
        Souhaitez-vous décrire votre ressenti en une phrase ?
    </p>

    <form method=\"POST\" action=\"{{ path('front_emotion_journal_analyze') }}\">
        <textarea
            name=\"emotion_text\"
            class=\"emotion-textarea\"
            placeholder=\"Exemple : Je me sens un peu fatigué mais motivé aujourd’hui.\"
        >{{ emotionText|default('') }}</textarea>

        <div class=\"emotion-actions\">
            <button type=\"submit\" class=\"btn btn-success\">
                <i class=\"fas fa-wave-square me-2\"></i>
                Analyser mon ressenti
            </button>

            <a href=\"{{ path('front_user_home') }}\" class=\"btn btn-reset-visible\">
                <i class=\"fas fa-rotate-right me-2\"></i>
                Réinitialiser
            </a>
        </div>
    </form>

    <div class=\"sentiment-feedback {{ sentimentUiLevel|default('unknown') }}\">
        <div style=\"font-weight: 800; font-size: 1rem;\">
            {% if emotionText is empty %}
                ℹ️ Résultat de l’analyse
            {% elseif sentimentUiLevel == 'positive' %}
                ✅ Ressenti plutôt positif
            {% elseif sentimentUiLevel == 'critical' %}
                ⚠️ Ressenti émotionnel fragile
            {% elseif sentimentUiLevel == 'neutral' %}
                ℹ️ Ressenti plutôt neutre
            {% else %}
                ℹ️ Résultat de l’analyse
            {% endif %}
        </div>

        <div style=\"margin-top: 0.45rem;\">
            {{ sentimentFeedback|default('Écrivez une phrase puis cliquez sur analyser.') }}
        </div>

        <div class=\"sentiment-meta\">
            <strong>Texte analysé :</strong>
            {{ emotionText is not empty ? emotionText : 'Aucun texte saisi' }}<br>

            {% if sentimentAnalysis %}
                <strong>Sentiment détecté :</strong> {{ sentimentAnalysis.sentiment|default('NEUTRAL') }} |
                <strong>Score :</strong> {{ sentimentAnalysis.score|default(0) }}
            {% else %}
                <strong>Sentiment détecté :</strong> indisponible |
                <strong>Score :</strong> indisponible
            {% endif %}
        </div>
    </div>
</div>

<div class=\"home-box\">
    <h3 style=\"color: #0c5ba3; font-weight: 700; margin: 0 0 1rem 0;\">
        <i class=\"fas fa-lightbulb\" style=\"color: #2563eb; margin-right: 0.5rem;\"></i>
        Citation motivante du jour
    </h3>

    {% if motivationalQuote and motivationalQuote.content is defined and motivationalQuote.content %}
        <p style=\"color: #1f2937; font-style: italic; font-size: 1.05rem; line-height: 1.8; margin: 0;\">
            \"{{ motivationalQuote.content }}\"
        </p>
        <p style=\"color: #6c7b95; margin: 0.5rem 0 0 0; font-size: 0.9rem;\">
            — {{ motivationalQuote.author|default('Auteur inconnu') }}
        </p>
    {% else %}
        <p style=\"color: #1f2937; font-style: italic; font-size: 1.05rem; line-height: 1.8; margin: 0;\">
            Aucune citation disponible pour le moment. Réessayez dans quelques instants.
        </p>
    {% endif %}
</div>

<h2 style=\"font-size: 1.3rem; font-weight: 900; color: #17253a; margin: 2rem 0 1rem 0;\">
    <i class=\"fas fa-play-circle\" style=\"margin-right: 0.5rem;\"></i>
    Commencer votre évaluation
</h2>

{% if generalTest %}
    <div style=\"background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%); border: 2px solid #dbe7ff; border-radius: 20px; padding: 2rem; box-shadow: 0 14px 30px rgba(23,37,84,0.06); margin-bottom: 2rem;\">
        <h3 style=\"font-size: 1.5rem; font-weight: 900; color: #17253a; margin: 0 0 0.5rem 0;\">
            {{ generalTest.title|default('Test général') }}
        </h3>
        <p style=\"color: #6c7b95; margin: 0; line-height: 1.6;\">
            {{ generalTest.description|default('Ce test permet une première évaluation de votre état.') }}
        </p>

        <div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem; margin: 1.5rem 0;\">
            <div style=\"display: flex; align-items: center; gap: 0.8rem; color: #4b5563;\">
                <i class=\"fas fa-clock\" style=\"color: #10b981;\"></i>
                <span>Durée : 10-15 min</span>
            </div>
            <div style=\"display: flex; align-items: center; gap: 0.8rem; color: #4b5563;\">
                <i class=\"fas fa-check-circle\" style=\"color: #10b981;\"></i>
                <span>Évaluation complète</span>
            </div>
            <div style=\"display: flex; align-items: center; gap: 0.8rem; color: #4b5563;\">
                <i class=\"fas fa-chart-line\" style=\"color: #10b981;\"></i>
                <span>Suivi des progrès</span>
            </div>
            <div style=\"display: flex; align-items: center; gap: 0.8rem; color: #4b5563;\">
                <i class=\"fas fa-lock\" style=\"color: #10b981;\"></i>
                <span>Données sécurisées</span>
            </div>
        </div>

        <a href=\"{{ path('front_general_test') }}\" class=\"btn btn-primary\">
            <i class=\"fas fa-book-open me-2\"></i>
            Passer le test général
        </a>
    </div>
{% endif %}
{% endblock %}", "front_test/user_home.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/front_test/user_home.html.twig");
    }
}
