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

/* statistique/pdf.html.twig */
class __TwigTemplate_dc1f8a6bec262726a8b0102aa976da42 extends Template
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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "statistique/pdf.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "statistique/pdf.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <style>
        body { font-family: Arial, sans-serif; color: #1a1a2e; margin: 0; padding: 20px; }

        .header { background: #2563eb; color: white; padding: 20px; margin-bottom: 20px; }
        .header h1 { margin: 0; font-size: 22px; }
        .header p { margin: 5px 0 0; font-size: 11px; opacity: 0.85; }

        .stats-row { width: 100%; margin-bottom: 20px; border-collapse: collapse; }
        .stat-box { width: 25%; text-align: center; background: #f0f6ff; border: 1px solid #dbe7ff; padding: 12px; }
        .stat-number { font-size: 26px; font-weight: bold; color: #2563eb; }
        .stat-label { font-size: 11px; color: #6c7b95; margin-top: 4px; }

        .section-title { font-size: 14px; font-weight: bold; color: #2563eb; border-bottom: 2px solid #2563eb; padding-bottom: 5px; margin: 20px 0 10px; }

        .progress-bg { background: #e2ebfb; height: 12px; margin: 6px 0; }
        .progress-fill { background: #2563eb; height: 12px; }

        table { width: 100%; border-collapse: collapse; font-size: 12px; margin-top: 10px; }
        thead tr { background: #2563eb; color: white; }
        th { padding: 8px 10px; text-align: left; }
        td { padding: 7px 10px; border-bottom: 1px solid #e2ebfb; }
        tr:nth-child(even) td { background: #f8fbff; }

        .badge-terminee { background: #d1fae5; color: #065f46; padding: 2px 8px; }
        .badge-encours  { background: #dbeafe; color: #1e40af; padding: 2px 8px; }
        .badge-autre    { background: #f3f4f6; color: #374151; padding: 2px 8px; }

        .footer { text-align: center; font-size: 10px; color: #9ca3af; margin-top: 30px; padding-top: 10px; border-top: 1px solid #e2ebfb; }
    </style>
</head>
<body>

<div class=\"header\">
    <h1>MindBoost — Rapport de Productivité</h1>
    <p>Généré le ";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate((isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 39, $this->source); })()), "d/m/Y à H:i"), "html", null, true);
        yield "</p>
</div>

<table class=\"stats-row\">
    <tr>
        <td class=\"stat-box\">
            <div class=\"stat-number\">";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalTaches"]) || array_key_exists("totalTaches", $context) ? $context["totalTaches"] : (function () { throw new RuntimeError('Variable "totalTaches" does not exist.', 45, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Total Tâches</div>
        </td>
        <td class=\"stat-box\">
            <div class=\"stat-number\">";
        // line 49
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalSousTaches"]) || array_key_exists("totalSousTaches", $context) ? $context["totalSousTaches"] : (function () { throw new RuntimeError('Variable "totalSousTaches" does not exist.', 49, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Total Sous-Tâches</div>
        </td>
        <td class=\"stat-box\">
            <div class=\"stat-number\" style=\"color:#16a34a;\">";
        // line 53
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["tachesTerminees"]) || array_key_exists("tachesTerminees", $context) ? $context["tachesTerminees"] : (function () { throw new RuntimeError('Variable "tachesTerminees" does not exist.', 53, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Tâches Terminées</div>
        </td>
        <td class=\"stat-box\">
            <div class=\"stat-number\" style=\"color:#e879a0;\">";
        // line 57
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["scoreMoyen"]) || array_key_exists("scoreMoyen", $context) ? $context["scoreMoyen"] : (function () { throw new RuntimeError('Variable "scoreMoyen" does not exist.', 57, $this->source); })()), "html", null, true);
        yield "%</div>
            <div class=\"stat-label\">Score Moyen</div>
        </td>
    </tr>
</table>

<div class=\"section-title\">Progression Globale</div>
<p style=\"font-size:12px;color:#6c7b95;margin:0;\">";
        // line 64
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["tachesTerminees"]) || array_key_exists("tachesTerminees", $context) ? $context["tachesTerminees"] : (function () { throw new RuntimeError('Variable "tachesTerminees" does not exist.', 64, $this->source); })()), "html", null, true);
        yield " sur ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalTaches"]) || array_key_exists("totalTaches", $context) ? $context["totalTaches"] : (function () { throw new RuntimeError('Variable "totalTaches" does not exist.', 64, $this->source); })()), "html", null, true);
        yield " tâches terminées — ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["progression"]) || array_key_exists("progression", $context) ? $context["progression"] : (function () { throw new RuntimeError('Variable "progression" does not exist.', 64, $this->source); })()), "html", null, true);
        yield "%</p>
<div class=\"progress-bg\">
    <div class=\"progress-fill\" style=\"width:";
        // line 66
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["progression"]) || array_key_exists("progression", $context) ? $context["progression"] : (function () { throw new RuntimeError('Variable "progression" does not exist.', 66, $this->source); })()), "html", null, true);
        yield "%;\"></div>
</div>

<div class=\"section-title\">Liste des Tâches Focus</div>
<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Objectif</th>
            <th>Difficulté</th>
            <th>Statut</th>
            <th>Score</th>
            <th>Début</th>
            <th>Fin</th>
        </tr>
    </thead>
    <tbody>
    ";
        // line 83
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["taches"]) || array_key_exists("taches", $context) ? $context["taches"] : (function () { throw new RuntimeError('Variable "taches" does not exist.', 83, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["tache"]) {
            // line 84
            yield "        <tr>
            <td><strong>";
            // line 85
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "titre", [], "any", false, false, false, 85), "html", null, true);
            yield "</strong></td>
            <td>";
            // line 86
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "objectifPrincipal", [], "any", false, false, false, 86), "html", null, true);
            yield "</td>
            <td style=\"text-align:center;\">";
            // line 87
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "niveauDifficulte", [], "any", true, true, false, 87) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "niveauDifficulte", [], "any", false, false, false, 87)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "niveauDifficulte", [], "any", false, false, false, 87), "html", null, true)) : ("-"));
            yield "</td>
            <td>
                ";
            // line 89
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "statut", [], "any", false, false, false, 89) == "Terminée")) {
                // line 90
                yield "                    <span class=\"badge-terminee\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "statut", [], "any", false, false, false, 90), "html", null, true);
                yield "</span>
                ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 91
$context["tache"], "statut", [], "any", false, false, false, 91) == "En cours")) {
                // line 92
                yield "                    <span class=\"badge-encours\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "statut", [], "any", false, false, false, 92), "html", null, true);
                yield "</span>
                ";
            } else {
                // line 94
                yield "                    <span class=\"badge-autre\">";
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "statut", [], "any", true, true, false, 94) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "statut", [], "any", false, false, false, 94)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "statut", [], "any", false, false, false, 94), "html", null, true)) : ("-"));
                yield "</span>
                ";
            }
            // line 96
            yield "            </td>
            <td style=\"text-align:center;font-weight:bold;color:
                ";
            // line 98
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "scoreProductivite", [], "any", false, false, false, 98) >= 75)) {
                yield "#16a34a
                ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 99
$context["tache"], "scoreProductivite", [], "any", false, false, false, 99) >= 50)) {
                yield "#f59e0b
                ";
            } else {
                // line 100
                yield "#ef4444";
            }
            yield ";\">
                ";
            // line 101
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "scoreProductivite", [], "any", true, true, false, 101) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "scoreProductivite", [], "any", false, false, false, 101)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "scoreProductivite", [], "any", false, false, false, 101), "html", null, true)) : (0));
            yield "%
            </td>
            <td>";
            // line 103
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "heureDebut", [], "any", false, false, false, 103)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "heureDebut", [], "any", false, false, false, 103), "H:i"), "html", null, true)) : ("-"));
            yield "</td>
            <td>";
            // line 104
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "heureFin", [], "any", false, false, false, 104)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "heureFin", [], "any", false, false, false, 104), "H:i"), "html", null, true)) : ("-"));
            yield "</td>
        </tr>
    ";
            $context['_iterated'] = true;
        }
        // line 106
        if (!$context['_iterated']) {
            // line 107
            yield "        <tr><td colspan=\"7\" style=\"text-align:center;padding:15px;color:#9ca3af;\">Aucune tâche</td></tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['tache'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 109
        yield "    </tbody>
</table>

<div class=\"footer\">
    MindBoost &copy; ";
        // line 113
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate((isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 113, $this->source); })()), "Y"), "html", null, true);
        yield " — Application de gestion de focus et productivité
</div>

</body>
</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "statistique/pdf.html.twig";
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
        return array (  248 => 113,  242 => 109,  235 => 107,  233 => 106,  226 => 104,  222 => 103,  217 => 101,  212 => 100,  207 => 99,  203 => 98,  199 => 96,  193 => 94,  187 => 92,  185 => 91,  180 => 90,  178 => 89,  173 => 87,  169 => 86,  165 => 85,  162 => 84,  157 => 83,  137 => 66,  128 => 64,  118 => 57,  111 => 53,  104 => 49,  97 => 45,  88 => 39,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <style>
        body { font-family: Arial, sans-serif; color: #1a1a2e; margin: 0; padding: 20px; }

        .header { background: #2563eb; color: white; padding: 20px; margin-bottom: 20px; }
        .header h1 { margin: 0; font-size: 22px; }
        .header p { margin: 5px 0 0; font-size: 11px; opacity: 0.85; }

        .stats-row { width: 100%; margin-bottom: 20px; border-collapse: collapse; }
        .stat-box { width: 25%; text-align: center; background: #f0f6ff; border: 1px solid #dbe7ff; padding: 12px; }
        .stat-number { font-size: 26px; font-weight: bold; color: #2563eb; }
        .stat-label { font-size: 11px; color: #6c7b95; margin-top: 4px; }

        .section-title { font-size: 14px; font-weight: bold; color: #2563eb; border-bottom: 2px solid #2563eb; padding-bottom: 5px; margin: 20px 0 10px; }

        .progress-bg { background: #e2ebfb; height: 12px; margin: 6px 0; }
        .progress-fill { background: #2563eb; height: 12px; }

        table { width: 100%; border-collapse: collapse; font-size: 12px; margin-top: 10px; }
        thead tr { background: #2563eb; color: white; }
        th { padding: 8px 10px; text-align: left; }
        td { padding: 7px 10px; border-bottom: 1px solid #e2ebfb; }
        tr:nth-child(even) td { background: #f8fbff; }

        .badge-terminee { background: #d1fae5; color: #065f46; padding: 2px 8px; }
        .badge-encours  { background: #dbeafe; color: #1e40af; padding: 2px 8px; }
        .badge-autre    { background: #f3f4f6; color: #374151; padding: 2px 8px; }

        .footer { text-align: center; font-size: 10px; color: #9ca3af; margin-top: 30px; padding-top: 10px; border-top: 1px solid #e2ebfb; }
    </style>
</head>
<body>

<div class=\"header\">
    <h1>MindBoost — Rapport de Productivité</h1>
    <p>Généré le {{ date|date('d/m/Y à H:i') }}</p>
</div>

<table class=\"stats-row\">
    <tr>
        <td class=\"stat-box\">
            <div class=\"stat-number\">{{ totalTaches }}</div>
            <div class=\"stat-label\">Total Tâches</div>
        </td>
        <td class=\"stat-box\">
            <div class=\"stat-number\">{{ totalSousTaches }}</div>
            <div class=\"stat-label\">Total Sous-Tâches</div>
        </td>
        <td class=\"stat-box\">
            <div class=\"stat-number\" style=\"color:#16a34a;\">{{ tachesTerminees }}</div>
            <div class=\"stat-label\">Tâches Terminées</div>
        </td>
        <td class=\"stat-box\">
            <div class=\"stat-number\" style=\"color:#e879a0;\">{{ scoreMoyen }}%</div>
            <div class=\"stat-label\">Score Moyen</div>
        </td>
    </tr>
</table>

<div class=\"section-title\">Progression Globale</div>
<p style=\"font-size:12px;color:#6c7b95;margin:0;\">{{ tachesTerminees }} sur {{ totalTaches }} tâches terminées — {{ progression }}%</p>
<div class=\"progress-bg\">
    <div class=\"progress-fill\" style=\"width:{{ progression }}%;\"></div>
</div>

<div class=\"section-title\">Liste des Tâches Focus</div>
<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Objectif</th>
            <th>Difficulté</th>
            <th>Statut</th>
            <th>Score</th>
            <th>Début</th>
            <th>Fin</th>
        </tr>
    </thead>
    <tbody>
    {% for tache in taches %}
        <tr>
            <td><strong>{{ tache.titre }}</strong></td>
            <td>{{ tache.objectifPrincipal }}</td>
            <td style=\"text-align:center;\">{{ tache.niveauDifficulte ?? '-' }}</td>
            <td>
                {% if tache.statut == 'Terminée' %}
                    <span class=\"badge-terminee\">{{ tache.statut }}</span>
                {% elseif tache.statut == 'En cours' %}
                    <span class=\"badge-encours\">{{ tache.statut }}</span>
                {% else %}
                    <span class=\"badge-autre\">{{ tache.statut ?? '-' }}</span>
                {% endif %}
            </td>
            <td style=\"text-align:center;font-weight:bold;color:
                {% if tache.scoreProductivite >= 75 %}#16a34a
                {% elseif tache.scoreProductivite >= 50 %}#f59e0b
                {% else %}#ef4444{% endif %};\">
                {{ tache.scoreProductivite ?? 0 }}%
            </td>
            <td>{{ tache.heureDebut ? tache.heureDebut|date('H:i') : '-' }}</td>
            <td>{{ tache.heureFin ? tache.heureFin|date('H:i') : '-' }}</td>
        </tr>
    {% else %}
        <tr><td colspan=\"7\" style=\"text-align:center;padding:15px;color:#9ca3af;\">Aucune tâche</td></tr>
    {% endfor %}
    </tbody>
</table>

<div class=\"footer\">
    MindBoost &copy; {{ date|date('Y') }} — Application de gestion de focus et productivité
</div>

</body>
</html>", "statistique/pdf.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/statistique/pdf.html.twig");
    }
}
