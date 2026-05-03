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

/* sous_tache/show.html.twig */
class __TwigTemplate_c4cd1f6e487cf848ca607aecb87c1ac4 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sous_tache/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sous_tache/show.html.twig"));

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

        yield "Détail Sous-Tâche";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 3
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

        // line 4
        yield "
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <div>
        <h1 style=\"margin:0;font-size:1.8rem;font-weight:900;color:#17253a;\">✅ Détail Sous-Tâche</h1>
        <p style=\"margin:.3rem 0 0;color:#6c7b95;font-size:.92rem;\">Informations complètes de la sous-tâche</p>
    </div>
    <div style=\"display:flex;gap:.6rem;\">
        <a href=\"";
        // line 11
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sous_tache_index");
        yield "\" style=\"display:inline-flex;align-items:center;gap:.4rem;background:#f1f5f9;color:#475569;padding:.55rem 1.1rem;border-radius:12px;text-decoration:none;font-weight:600;font-size:.88rem;border:1px solid #e2e8f0;\">← Retour liste</a>
        <a href=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sous_tache_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["sous_tache"]) || array_key_exists("sous_tache", $context) ? $context["sous_tache"] : (function () { throw new RuntimeError('Variable "sous_tache" does not exist.', 12, $this->source); })()), "id", [], "any", false, false, false, 12)]), "html", null, true);
        yield "\" style=\"display:inline-flex;align-items:center;gap:.4rem;background:linear-gradient(135deg,#fbbf24,#f59e0b);color:#1a1a1a;padding:.55rem 1.2rem;border-radius:12px;text-decoration:none;font-weight:700;font-size:.88rem;\">✏️ Modifier</a>
    </div>
</div>

<div style=\"display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-bottom:1rem;\">

    <div style=\"background:white;border-radius:20px;padding:1.5rem;border:1px solid #e8efff;box-shadow:0 2px 16px rgba(37,99,235,0.06);grid-column:1/-1;\">
        <div style=\"font-size:.72rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.08em;margin-bottom:.6rem;\">Description</div>
        <div style=\"font-size:1.05rem;font-weight:600;color:#17253a;line-height:1.6;\">";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["sous_tache"]) || array_key_exists("sous_tache", $context) ? $context["sous_tache"] : (function () { throw new RuntimeError('Variable "sous_tache" does not exist.', 20, $this->source); })()), "description", [], "any", false, false, false, 20), "html", null, true);
        yield "</div>
    </div>

    <div style=\"background:white;border-radius:20px;padding:1.5rem;border:1px solid #e8efff;box-shadow:0 2px 16px rgba(37,99,235,0.06);\">
        <div style=\"font-size:.72rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.08em;margin-bottom:.6rem;\">État</div>
        ";
        // line 25
        if (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["sous_tache"]) || array_key_exists("sous_tache", $context) ? $context["sous_tache"] : (function () { throw new RuntimeError('Variable "sous_tache" does not exist.', 25, $this->source); })()), "etat", [], "any", false, false, false, 25) == "Terminée") || (CoreExtension::getAttribute($this->env, $this->source, (isset($context["sous_tache"]) || array_key_exists("sous_tache", $context) ? $context["sous_tache"] : (function () { throw new RuntimeError('Variable "sous_tache" does not exist.', 25, $this->source); })()), "etat", [], "any", false, false, false, 25) == "Terminee"))) {
            // line 26
            yield "            <span style=\"background:#dcfce7;color:#15803d;padding:.35rem .9rem;border-radius:50px;font-size:.85rem;font-weight:700;\">✓ Terminée</span>
        ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 27
(isset($context["sous_tache"]) || array_key_exists("sous_tache", $context) ? $context["sous_tache"] : (function () { throw new RuntimeError('Variable "sous_tache" does not exist.', 27, $this->source); })()), "etat", [], "any", false, false, false, 27) == "En cours")) {
            // line 28
            yield "            <span style=\"background:#dbeafe;color:#1d4ed8;padding:.35rem .9rem;border-radius:50px;font-size:.85rem;font-weight:700;\">● En cours</span>
        ";
        } elseif (((CoreExtension::getAttribute($this->env, $this->source,         // line 29
(isset($context["sous_tache"]) || array_key_exists("sous_tache", $context) ? $context["sous_tache"] : (function () { throw new RuntimeError('Variable "sous_tache" does not exist.', 29, $this->source); })()), "etat", [], "any", false, false, false, 29) == "À faire") || (CoreExtension::getAttribute($this->env, $this->source, (isset($context["sous_tache"]) || array_key_exists("sous_tache", $context) ? $context["sous_tache"] : (function () { throw new RuntimeError('Variable "sous_tache" does not exist.', 29, $this->source); })()), "etat", [], "any", false, false, false, 29) == "A faire"))) {
            // line 30
            yield "            <span style=\"background:#fef9c3;color:#a16207;padding:.35rem .9rem;border-radius:50px;font-size:.85rem;font-weight:700;\">◆ À faire</span>
        ";
        } else {
            // line 32
            yield "            <span style=\"background:#f1f5f9;color:#475569;padding:.35rem .9rem;border-radius:50px;font-size:.85rem;font-weight:700;\">○ ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["sous_tache"]) || array_key_exists("sous_tache", $context) ? $context["sous_tache"] : (function () { throw new RuntimeError('Variable "sous_tache" does not exist.', 32, $this->source); })()), "etat", [], "any", false, false, false, 32), "html", null, true);
            yield "</span>
        ";
        }
        // line 34
        yield "    </div>

    <div style=\"background:white;border-radius:20px;padding:1.5rem;border:1px solid #e8efff;box-shadow:0 2px 16px rgba(37,99,235,0.06);\">
        <div style=\"font-size:.72rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.08em;margin-bottom:.6rem;\">Priorité</div>
        <div style=\"width:40px;height:40px;border-radius:50%;background:#eff6ff;color:#2563eb;font-size:1.1rem;font-weight:800;display:inline-flex;align-items:center;justify-content:center;border:2px solid #dbeafe;\">
            ";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["sous_tache"]) || array_key_exists("sous_tache", $context) ? $context["sous_tache"] : (function () { throw new RuntimeError('Variable "sous_tache" does not exist.', 39, $this->source); })()), "priorite", [], "any", false, false, false, 39), "html", null, true);
        yield "
        </div>
    </div>

    <div style=\"background:white;border-radius:20px;padding:1.5rem;border:1px solid #e8efff;box-shadow:0 2px 16px rgba(37,99,235,0.06);\">
        <div style=\"font-size:.72rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.08em;margin-bottom:.6rem;\">Durée recommandée</div>
        <div style=\"font-size:1.4rem;font-weight:900;color:#2563eb;\">";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["sous_tache"]) || array_key_exists("sous_tache", $context) ? $context["sous_tache"] : (function () { throw new RuntimeError('Variable "sous_tache" does not exist.', 45, $this->source); })()), "dureeRecommandee", [], "any", false, false, false, 45), "html", null, true);
        yield "<span style=\"font-size:.85rem;font-weight:600;color:#94a3b8;margin-left:.3rem;\">min</span></div>
    </div>

    <div style=\"background:white;border-radius:20px;padding:1.5rem;border:1px solid #e8efff;box-shadow:0 2px 16px rgba(37,99,235,0.06);\">
        <div style=\"font-size:.72rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.08em;margin-bottom:.6rem;\">Heure début</div>
        <div style=\"font-size:1.4rem;font-weight:900;color:#17253a;\">";
        // line 50
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["sous_tache"]) || array_key_exists("sous_tache", $context) ? $context["sous_tache"] : (function () { throw new RuntimeError('Variable "sous_tache" does not exist.', 50, $this->source); })()), "heureDebut", [], "any", false, false, false, 50)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["sous_tache"]) || array_key_exists("sous_tache", $context) ? $context["sous_tache"] : (function () { throw new RuntimeError('Variable "sous_tache" does not exist.', 50, $this->source); })()), "heureDebut", [], "any", false, false, false, 50), "H:i"), "html", null, true)) : ("—"));
        yield "</div>
    </div>

    <div style=\"background:white;border-radius:20px;padding:1.5rem;border:1px solid #e8efff;box-shadow:0 2px 16px rgba(37,99,235,0.06);\">
        <div style=\"font-size:.72rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.08em;margin-bottom:.6rem;\">Heure fin</div>
        <div style=\"font-size:1.4rem;font-weight:900;color:#17253a;\">";
        // line 55
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["sous_tache"]) || array_key_exists("sous_tache", $context) ? $context["sous_tache"] : (function () { throw new RuntimeError('Variable "sous_tache" does not exist.', 55, $this->source); })()), "heureFin", [], "any", false, false, false, 55)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["sous_tache"]) || array_key_exists("sous_tache", $context) ? $context["sous_tache"] : (function () { throw new RuntimeError('Variable "sous_tache" does not exist.', 55, $this->source); })()), "heureFin", [], "any", false, false, false, 55), "H:i"), "html", null, true)) : ("—"));
        yield "</div>
    </div>

    ";
        // line 58
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["sous_tache"]) || array_key_exists("sous_tache", $context) ? $context["sous_tache"] : (function () { throw new RuntimeError('Variable "sous_tache" does not exist.', 58, $this->source); })()), "tacheFocus", [], "any", false, false, false, 58)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 59
            yield "    <div style=\"background:white;border-radius:20px;padding:1.5rem;border:1px solid #e8efff;box-shadow:0 2px 16px rgba(37,99,235,0.06);grid-column:1/-1;\">
        <div style=\"font-size:.72rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.08em;margin-bottom:.6rem;\">Tâche parente</div>
        <a href=\"";
            // line 61
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tache_focus_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["sous_tache"]) || array_key_exists("sous_tache", $context) ? $context["sous_tache"] : (function () { throw new RuntimeError('Variable "sous_tache" does not exist.', 61, $this->source); })()), "tacheFocus", [], "any", false, false, false, 61), "id", [], "any", false, false, false, 61)]), "html", null, true);
            yield "\" style=\"background:#eff6ff;color:#2563eb;padding:.4rem 1rem;border-radius:10px;font-size:.88rem;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:.4rem;\">
            🎯 ";
            // line 62
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["sous_tache"]) || array_key_exists("sous_tache", $context) ? $context["sous_tache"] : (function () { throw new RuntimeError('Variable "sous_tache" does not exist.', 62, $this->source); })()), "tacheFocus", [], "any", false, false, false, 62), "titre", [], "any", false, false, false, 62), "html", null, true);
            yield "
        </a>
    </div>
    ";
        }
        // line 66
        yield "
</div>

<div style=\"background:white;border-radius:20px;padding:1.2rem 1.5rem;border:1px solid #fee2e2;box-shadow:0 2px 16px rgba(239,68,68,0.04);display:flex;align-items:center;justify-content:space-between;\">
    <div>
        <div style=\"font-weight:700;color:#17253a;font-size:.92rem;\">Zone de danger</div>
        <div style=\"color:#94a3b8;font-size:.82rem;margin-top:.2rem;\">Cette action est irréversible</div>
    </div>
    ";
        // line 74
        yield Twig\Extension\CoreExtension::include($this->env, $context, "sous_tache/_delete_form.html.twig");
        yield "
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
        return "sous_tache/show.html.twig";
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
        return array (  219 => 74,  209 => 66,  202 => 62,  198 => 61,  194 => 59,  192 => 58,  186 => 55,  178 => 50,  170 => 45,  161 => 39,  154 => 34,  148 => 32,  144 => 30,  142 => 29,  139 => 28,  137 => 27,  134 => 26,  132 => 25,  124 => 20,  113 => 12,  109 => 11,  100 => 4,  87 => 3,  64 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'front/base.html.twig' %}
{% block title %}Détail Sous-Tâche{% endblock %}
{% block content %}

<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <div>
        <h1 style=\"margin:0;font-size:1.8rem;font-weight:900;color:#17253a;\">✅ Détail Sous-Tâche</h1>
        <p style=\"margin:.3rem 0 0;color:#6c7b95;font-size:.92rem;\">Informations complètes de la sous-tâche</p>
    </div>
    <div style=\"display:flex;gap:.6rem;\">
        <a href=\"{{ path('app_sous_tache_index') }}\" style=\"display:inline-flex;align-items:center;gap:.4rem;background:#f1f5f9;color:#475569;padding:.55rem 1.1rem;border-radius:12px;text-decoration:none;font-weight:600;font-size:.88rem;border:1px solid #e2e8f0;\">← Retour liste</a>
        <a href=\"{{ path('app_sous_tache_edit', {'id': sous_tache.id}) }}\" style=\"display:inline-flex;align-items:center;gap:.4rem;background:linear-gradient(135deg,#fbbf24,#f59e0b);color:#1a1a1a;padding:.55rem 1.2rem;border-radius:12px;text-decoration:none;font-weight:700;font-size:.88rem;\">✏️ Modifier</a>
    </div>
</div>

<div style=\"display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-bottom:1rem;\">

    <div style=\"background:white;border-radius:20px;padding:1.5rem;border:1px solid #e8efff;box-shadow:0 2px 16px rgba(37,99,235,0.06);grid-column:1/-1;\">
        <div style=\"font-size:.72rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.08em;margin-bottom:.6rem;\">Description</div>
        <div style=\"font-size:1.05rem;font-weight:600;color:#17253a;line-height:1.6;\">{{ sous_tache.description }}</div>
    </div>

    <div style=\"background:white;border-radius:20px;padding:1.5rem;border:1px solid #e8efff;box-shadow:0 2px 16px rgba(37,99,235,0.06);\">
        <div style=\"font-size:.72rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.08em;margin-bottom:.6rem;\">État</div>
        {% if sous_tache.etat == 'Terminée' or sous_tache.etat == 'Terminee' %}
            <span style=\"background:#dcfce7;color:#15803d;padding:.35rem .9rem;border-radius:50px;font-size:.85rem;font-weight:700;\">✓ Terminée</span>
        {% elseif sous_tache.etat == 'En cours' %}
            <span style=\"background:#dbeafe;color:#1d4ed8;padding:.35rem .9rem;border-radius:50px;font-size:.85rem;font-weight:700;\">● En cours</span>
        {% elseif sous_tache.etat == 'À faire' or sous_tache.etat == 'A faire' %}
            <span style=\"background:#fef9c3;color:#a16207;padding:.35rem .9rem;border-radius:50px;font-size:.85rem;font-weight:700;\">◆ À faire</span>
        {% else %}
            <span style=\"background:#f1f5f9;color:#475569;padding:.35rem .9rem;border-radius:50px;font-size:.85rem;font-weight:700;\">○ {{ sous_tache.etat }}</span>
        {% endif %}
    </div>

    <div style=\"background:white;border-radius:20px;padding:1.5rem;border:1px solid #e8efff;box-shadow:0 2px 16px rgba(37,99,235,0.06);\">
        <div style=\"font-size:.72rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.08em;margin-bottom:.6rem;\">Priorité</div>
        <div style=\"width:40px;height:40px;border-radius:50%;background:#eff6ff;color:#2563eb;font-size:1.1rem;font-weight:800;display:inline-flex;align-items:center;justify-content:center;border:2px solid #dbeafe;\">
            {{ sous_tache.priorite }}
        </div>
    </div>

    <div style=\"background:white;border-radius:20px;padding:1.5rem;border:1px solid #e8efff;box-shadow:0 2px 16px rgba(37,99,235,0.06);\">
        <div style=\"font-size:.72rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.08em;margin-bottom:.6rem;\">Durée recommandée</div>
        <div style=\"font-size:1.4rem;font-weight:900;color:#2563eb;\">{{ sous_tache.dureeRecommandee }}<span style=\"font-size:.85rem;font-weight:600;color:#94a3b8;margin-left:.3rem;\">min</span></div>
    </div>

    <div style=\"background:white;border-radius:20px;padding:1.5rem;border:1px solid #e8efff;box-shadow:0 2px 16px rgba(37,99,235,0.06);\">
        <div style=\"font-size:.72rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.08em;margin-bottom:.6rem;\">Heure début</div>
        <div style=\"font-size:1.4rem;font-weight:900;color:#17253a;\">{{ sous_tache.heureDebut ? sous_tache.heureDebut|date('H:i') : '—' }}</div>
    </div>

    <div style=\"background:white;border-radius:20px;padding:1.5rem;border:1px solid #e8efff;box-shadow:0 2px 16px rgba(37,99,235,0.06);\">
        <div style=\"font-size:.72rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.08em;margin-bottom:.6rem;\">Heure fin</div>
        <div style=\"font-size:1.4rem;font-weight:900;color:#17253a;\">{{ sous_tache.heureFin ? sous_tache.heureFin|date('H:i') : '—' }}</div>
    </div>

    {% if sous_tache.tacheFocus %}
    <div style=\"background:white;border-radius:20px;padding:1.5rem;border:1px solid #e8efff;box-shadow:0 2px 16px rgba(37,99,235,0.06);grid-column:1/-1;\">
        <div style=\"font-size:.72rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.08em;margin-bottom:.6rem;\">Tâche parente</div>
        <a href=\"{{ path('app_tache_focus_show', {'id': sous_tache.tacheFocus.id}) }}\" style=\"background:#eff6ff;color:#2563eb;padding:.4rem 1rem;border-radius:10px;font-size:.88rem;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:.4rem;\">
            🎯 {{ sous_tache.tacheFocus.titre }}
        </a>
    </div>
    {% endif %}

</div>

<div style=\"background:white;border-radius:20px;padding:1.2rem 1.5rem;border:1px solid #fee2e2;box-shadow:0 2px 16px rgba(239,68,68,0.04);display:flex;align-items:center;justify-content:space-between;\">
    <div>
        <div style=\"font-weight:700;color:#17253a;font-size:.92rem;\">Zone de danger</div>
        <div style=\"color:#94a3b8;font-size:.82rem;margin-top:.2rem;\">Cette action est irréversible</div>
    </div>
    {{ include('sous_tache/_delete_form.html.twig') }}
</div>

{% endblock %}", "sous_tache/show.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/sous_tache/show.html.twig");
    }
}
