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

/* statistique/index.html.twig */
class __TwigTemplate_5c91a537e7d7f57f15dfad29ea983f77 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "statistique/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "statistique/index.html.twig"));

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

        yield "Statistiques";
        
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
    <div class=\"page-heading\" style=\"margin-bottom:0;\">
        <h1>📊 Statistiques de Productivité</h1>
        <p>Vue globale de votre progression</p>
    </div>
    <a href=\"";
        // line 10
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_statistiques_pdf");
        yield "\" class=\"btn btn-danger\">
        📄 Exporter en PDF
    </a>
</div>

<div class=\"row mb-4\">
    <div class=\"col-md-3\">
        <div class=\"stat-card text-center p-4\">
            <div style=\"font-size:36px;\">🎯</div>
            <div class=\"stat-number\">";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalTaches"]) || array_key_exists("totalTaches", $context) ? $context["totalTaches"] : (function () { throw new RuntimeError('Variable "totalTaches" does not exist.', 19, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Total Tâches</div>
        </div>
    </div>
    <div class=\"col-md-3\">
        <div class=\"stat-card text-center p-4\">
            <div style=\"font-size:36px;\">✓</div>
            <div class=\"stat-number\">";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalSousTaches"]) || array_key_exists("totalSousTaches", $context) ? $context["totalSousTaches"] : (function () { throw new RuntimeError('Variable "totalSousTaches" does not exist.', 26, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Total Sous-Tâches</div>
        </div>
    </div>
    <div class=\"col-md-3\">
        <div class=\"stat-card text-center p-4\">
            <div style=\"font-size:36px;\">✅</div>
            <div class=\"stat-number\" style=\"color:#16a34a;\">";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["tachesTerminees"]) || array_key_exists("tachesTerminees", $context) ? $context["tachesTerminees"] : (function () { throw new RuntimeError('Variable "tachesTerminees" does not exist.', 33, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Tâches Terminées</div>
        </div>
    </div>
    <div class=\"col-md-3\">
        <div class=\"stat-card text-center p-4\">
            <div style=\"font-size:36px;\">🚀</div>
            <div class=\"stat-number\" style=\"color:#e879a0;\">";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["scoreMoyen"]) || array_key_exists("scoreMoyen", $context) ? $context["scoreMoyen"] : (function () { throw new RuntimeError('Variable "scoreMoyen" does not exist.', 40, $this->source); })()), "html", null, true);
        yield "%</div>
            <div class=\"stat-label\">Score Moyen</div>
        </div>
    </div>
</div>

<div class=\"card mb-4\">
    <div class=\"card-header\"><h5 class=\"mb-0\">📈 Progression Globale</h5></div>
    <div class=\"card-body p-4\">
        <div class=\"d-flex justify-content-between mb-2\">
            <span style=\"color:var(--text-soft);\">Tâches terminées</span>
            <span style=\"font-weight:bold;\">";
        // line 51
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["progression"]) || array_key_exists("progression", $context) ? $context["progression"] : (function () { throw new RuntimeError('Variable "progression" does not exist.', 51, $this->source); })()), "html", null, true);
        yield "%</span>
        </div>
        <div style=\"background:rgba(37,99,235,0.10);border-radius:10px;height:12px;\">
            <div style=\"background:linear-gradient(to right,#2563eb,#06b6d4);width:";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["progression"]) || array_key_exists("progression", $context) ? $context["progression"] : (function () { throw new RuntimeError('Variable "progression" does not exist.', 54, $this->source); })()), "html", null, true);
        yield "%;height:12px;border-radius:10px;\"></div>
        </div>
        <small style=\"color:var(--text-soft);\">";
        // line 56
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["tachesTerminees"]) || array_key_exists("tachesTerminees", $context) ? $context["tachesTerminees"] : (function () { throw new RuntimeError('Variable "tachesTerminees" does not exist.', 56, $this->source); })()), "html", null, true);
        yield " sur ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalTaches"]) || array_key_exists("totalTaches", $context) ? $context["totalTaches"] : (function () { throw new RuntimeError('Variable "totalTaches" does not exist.', 56, $this->source); })()), "html", null, true);
        yield " tâches terminées</small>
    </div>
</div>

<div class=\"row\">
    <div class=\"col-md-4 mb-4\">
        <div class=\"card h-100\">
            <div class=\"card-header\"><h5 class=\"mb-0\">🎯 Tâches par Statut</h5></div>
            <div class=\"card-body p-4\">
                ";
        // line 65
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["parStatut"]) || array_key_exists("parStatut", $context) ? $context["parStatut"] : (function () { throw new RuntimeError('Variable "parStatut" does not exist.', 65, $this->source); })()));
        foreach ($context['_seq'] as $context["statut"] => $context["count"]) {
            // line 66
            yield "                <div class=\"mb-3\">
                    <div class=\"d-flex justify-content-between mb-1\">
                        <span>";
            // line 68
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["statut"], "html", null, true);
            yield "</span>
                        <span style=\"color:#2563eb;font-weight:bold;\">";
            // line 69
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["count"], "html", null, true);
            yield "</span>
                    </div>
                    <div style=\"background:rgba(37,99,235,0.10);border-radius:6px;height:8px;\">
                        <div style=\"background:#2563eb;width:";
            // line 72
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::round((($context["count"] / (isset($context["totalTaches"]) || array_key_exists("totalTaches", $context) ? $context["totalTaches"] : (function () { throw new RuntimeError('Variable "totalTaches" does not exist.', 72, $this->source); })())) * 100)), "html", null, true);
            yield "%;height:8px;border-radius:6px;\"></div>
                    </div>
                </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['statut'], $context['count'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 76
        yield "            </div>
        </div>
    </div>
    <div class=\"col-md-4 mb-4\">
        <div class=\"card h-100\">
            <div class=\"card-header\"><h5 class=\"mb-0\">✅ Sous-Tâches par État</h5></div>
            <div class=\"card-body p-4\">
                ";
        // line 83
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["parEtat"]) || array_key_exists("parEtat", $context) ? $context["parEtat"] : (function () { throw new RuntimeError('Variable "parEtat" does not exist.', 83, $this->source); })()));
        foreach ($context['_seq'] as $context["etat"] => $context["count"]) {
            // line 84
            yield "                <div class=\"mb-3\">
                    <div class=\"d-flex justify-content-between mb-1\">
                        <span>";
            // line 86
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["etat"], "html", null, true);
            yield "</span>
                        <span style=\"color:#06b6d4;font-weight:bold;\">";
            // line 87
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["count"], "html", null, true);
            yield "</span>
                    </div>
                    <div style=\"background:rgba(6,182,212,0.10);border-radius:6px;height:8px;\">
                        <div style=\"background:#06b6d4;width:";
            // line 90
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::round((($context["count"] / (isset($context["totalSousTaches"]) || array_key_exists("totalSousTaches", $context) ? $context["totalSousTaches"] : (function () { throw new RuntimeError('Variable "totalSousTaches" does not exist.', 90, $this->source); })())) * 100)), "html", null, true);
            yield "%;height:8px;border-radius:6px;\"></div>
                    </div>
                </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['etat'], $context['count'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 94
        yield "            </div>
        </div>
    </div>
    <div class=\"col-md-4 mb-4\">
        <div class=\"card h-100\">
            <div class=\"card-header\"><h5 class=\"mb-0\">⚡ Tâches par Difficulté</h5></div>
            <div class=\"card-body p-4\">
                ";
        // line 101
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["parDifficulte"]) || array_key_exists("parDifficulte", $context) ? $context["parDifficulte"] : (function () { throw new RuntimeError('Variable "parDifficulte" does not exist.', 101, $this->source); })()));
        foreach ($context['_seq'] as $context["diff"] => $context["count"]) {
            // line 102
            yield "                <div class=\"mb-3\">
                    <div class=\"d-flex justify-content-between mb-1\">
                        <span>";
            // line 104
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["diff"], "html", null, true);
            yield "</span>
                        <span style=\"color:#e879a0;font-weight:bold;\">";
            // line 105
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["count"], "html", null, true);
            yield "</span>
                    </div>
                    <div style=\"background:rgba(232,121,160,0.10);border-radius:6px;height:8px;\">
                        <div style=\"background:#e879a0;width:";
            // line 108
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::round((($context["count"] / (isset($context["totalTaches"]) || array_key_exists("totalTaches", $context) ? $context["totalTaches"] : (function () { throw new RuntimeError('Variable "totalTaches" does not exist.', 108, $this->source); })())) * 100)), "html", null, true);
            yield "%;height:8px;border-radius:6px;\"></div>
                    </div>
                </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['diff'], $context['count'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 112
        yield "            </div>
        </div>
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
        return "statistique/index.html.twig";
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
        return array (  291 => 112,  281 => 108,  275 => 105,  271 => 104,  267 => 102,  263 => 101,  254 => 94,  244 => 90,  238 => 87,  234 => 86,  230 => 84,  226 => 83,  217 => 76,  207 => 72,  201 => 69,  197 => 68,  193 => 66,  189 => 65,  175 => 56,  170 => 54,  164 => 51,  150 => 40,  140 => 33,  130 => 26,  120 => 19,  108 => 10,  100 => 4,  87 => 3,  64 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'front/base.html.twig' %}
{% block title %}Statistiques{% endblock %}
{% block content %}

<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <div class=\"page-heading\" style=\"margin-bottom:0;\">
        <h1>📊 Statistiques de Productivité</h1>
        <p>Vue globale de votre progression</p>
    </div>
    <a href=\"{{ path('app_statistiques_pdf') }}\" class=\"btn btn-danger\">
        📄 Exporter en PDF
    </a>
</div>

<div class=\"row mb-4\">
    <div class=\"col-md-3\">
        <div class=\"stat-card text-center p-4\">
            <div style=\"font-size:36px;\">🎯</div>
            <div class=\"stat-number\">{{ totalTaches }}</div>
            <div class=\"stat-label\">Total Tâches</div>
        </div>
    </div>
    <div class=\"col-md-3\">
        <div class=\"stat-card text-center p-4\">
            <div style=\"font-size:36px;\">✓</div>
            <div class=\"stat-number\">{{ totalSousTaches }}</div>
            <div class=\"stat-label\">Total Sous-Tâches</div>
        </div>
    </div>
    <div class=\"col-md-3\">
        <div class=\"stat-card text-center p-4\">
            <div style=\"font-size:36px;\">✅</div>
            <div class=\"stat-number\" style=\"color:#16a34a;\">{{ tachesTerminees }}</div>
            <div class=\"stat-label\">Tâches Terminées</div>
        </div>
    </div>
    <div class=\"col-md-3\">
        <div class=\"stat-card text-center p-4\">
            <div style=\"font-size:36px;\">🚀</div>
            <div class=\"stat-number\" style=\"color:#e879a0;\">{{ scoreMoyen }}%</div>
            <div class=\"stat-label\">Score Moyen</div>
        </div>
    </div>
</div>

<div class=\"card mb-4\">
    <div class=\"card-header\"><h5 class=\"mb-0\">📈 Progression Globale</h5></div>
    <div class=\"card-body p-4\">
        <div class=\"d-flex justify-content-between mb-2\">
            <span style=\"color:var(--text-soft);\">Tâches terminées</span>
            <span style=\"font-weight:bold;\">{{ progression }}%</span>
        </div>
        <div style=\"background:rgba(37,99,235,0.10);border-radius:10px;height:12px;\">
            <div style=\"background:linear-gradient(to right,#2563eb,#06b6d4);width:{{ progression }}%;height:12px;border-radius:10px;\"></div>
        </div>
        <small style=\"color:var(--text-soft);\">{{ tachesTerminees }} sur {{ totalTaches }} tâches terminées</small>
    </div>
</div>

<div class=\"row\">
    <div class=\"col-md-4 mb-4\">
        <div class=\"card h-100\">
            <div class=\"card-header\"><h5 class=\"mb-0\">🎯 Tâches par Statut</h5></div>
            <div class=\"card-body p-4\">
                {% for statut, count in parStatut %}
                <div class=\"mb-3\">
                    <div class=\"d-flex justify-content-between mb-1\">
                        <span>{{ statut }}</span>
                        <span style=\"color:#2563eb;font-weight:bold;\">{{ count }}</span>
                    </div>
                    <div style=\"background:rgba(37,99,235,0.10);border-radius:6px;height:8px;\">
                        <div style=\"background:#2563eb;width:{{ (count/totalTaches*100)|round }}%;height:8px;border-radius:6px;\"></div>
                    </div>
                </div>
                {% endfor %}
            </div>
        </div>
    </div>
    <div class=\"col-md-4 mb-4\">
        <div class=\"card h-100\">
            <div class=\"card-header\"><h5 class=\"mb-0\">✅ Sous-Tâches par État</h5></div>
            <div class=\"card-body p-4\">
                {% for etat, count in parEtat %}
                <div class=\"mb-3\">
                    <div class=\"d-flex justify-content-between mb-1\">
                        <span>{{ etat }}</span>
                        <span style=\"color:#06b6d4;font-weight:bold;\">{{ count }}</span>
                    </div>
                    <div style=\"background:rgba(6,182,212,0.10);border-radius:6px;height:8px;\">
                        <div style=\"background:#06b6d4;width:{{ (count/totalSousTaches*100)|round }}%;height:8px;border-radius:6px;\"></div>
                    </div>
                </div>
                {% endfor %}
            </div>
        </div>
    </div>
    <div class=\"col-md-4 mb-4\">
        <div class=\"card h-100\">
            <div class=\"card-header\"><h5 class=\"mb-0\">⚡ Tâches par Difficulté</h5></div>
            <div class=\"card-body p-4\">
                {% for diff, count in parDifficulte %}
                <div class=\"mb-3\">
                    <div class=\"d-flex justify-content-between mb-1\">
                        <span>{{ diff }}</span>
                        <span style=\"color:#e879a0;font-weight:bold;\">{{ count }}</span>
                    </div>
                    <div style=\"background:rgba(232,121,160,0.10);border-radius:6px;height:8px;\">
                        <div style=\"background:#e879a0;width:{{ (count/totalTaches*100)|round }}%;height:8px;border-radius:6px;\"></div>
                    </div>
                </div>
                {% endfor %}
            </div>
        </div>
    </div>
</div>

{% endblock %}", "statistique/index.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/statistique/index.html.twig");
    }
}
