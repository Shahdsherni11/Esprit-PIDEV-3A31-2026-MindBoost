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

/* pdf/user_history_pdf.html.twig */
class __TwigTemplate_f0759826d00ceb4d35835ba27ded53d2 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pdf/user_history_pdf.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pdf/user_history_pdf.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Historique utilisateur</title>
    <style>
        body {
            font-family: Helvetica, Arial, sans-serif;
            color: #1f2937;
            margin: 0;
            padding: 0;
            background: #ffffff;
        }

        .page {
            padding: 34px 36px;
        }

        .header {
            background: #1d4ed8;
            color: #ffffff;
            padding: 28px 30px;
            border-radius: 18px;
            margin-bottom: 28px;
        }

        .brand {
            font-size: 13px;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #dbeafe;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .title {
            font-size: 32px;
            font-weight: bold;
            margin: 0 0 8px;
            color: #ffffff;
        }

        .subtitle {
            font-size: 14px;
            margin: 0;
            color: #e0ecff;
        }

        .meta-row {
            margin-bottom: 22px;
        }

        .meta-box {
            background: #ffffff;
            border: 1px solid #bcd0ee;
            border-radius: 14px;
            padding: 14px 18px;
        }

        .meta-label {
            font-size: 11px;
            text-transform: uppercase;
            color: #4b6285;
            margin-bottom: 6px;
            font-weight: bold;
        }

        .meta-value {
            font-size: 15px;
            font-weight: bold;
            color: #16345f;
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            color: #16345f;
            margin: 30px 0 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #ffffff;
            border-radius: 14px;
            overflow: hidden;
            border: 1px solid #c9d7ee;
        }

        thead th {
            background: #dbe7f7;
            color: #16345f;
            font-size: 13px;
            padding: 12px 10px;
            text-align: left;
            border-bottom: 1px solid #c2d2ec;
        }

        tbody td {
            padding: 11px 10px;
            border-bottom: 1px solid #dfe8f5;
            font-size: 13px;
            color: #24344f;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .pill {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: bold;
        }

        .pill-general {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .pill-specific {
            background: #ccfbf1;
            color: #0f766e;
        }

        .score {
            font-weight: bold;
            color: #1d4ed8;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 11px;
            color: #5f7291;
            border-top: 1px solid #d7e3f2;
            padding-top: 14px;
        }

        .empty-box {
            background: #ffffff;
            border: 1px solid #dce6f8;
            border-radius: 14px;
            padding: 24px;
            color: #4b6285;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class=\"page\">
        <div class=\"header\">
            <div class=\"brand\">MindBoost • Rapport utilisateur</div>
            <h1 class=\"title\">Historique personnel</h1>
            <p class=\"subtitle\">
                Export PDF de l’historique des tests passés
            </p>
        </div>

        <div class=\"meta-row\">
            <div class=\"meta-box\">
                <div class=\"meta-label\">Date de génération</div>
                <div class=\"meta-value\">";
        // line 165
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate((isset($context["generatedAt"]) || array_key_exists("generatedAt", $context) ? $context["generatedAt"] : (function () { throw new RuntimeError('Variable "generatedAt" does not exist.', 165, $this->source); })()), "d/m/Y à H:i"), "html", null, true);
        yield "</div>
            </div>
        </div>

        <div class=\"section-title\">Résumé des résultats</div>

        ";
        // line 171
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["history"]) || array_key_exists("history", $context) ? $context["history"] : (function () { throw new RuntimeError('Variable "history" does not exist.', 171, $this->source); })())) > 0)) {
            // line 172
            yield "            <table>
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Titre du test</th>
                        <th>Score</th>
                        <th>%</th>
                        <th>Catégorie</th>
                        <th>Niveau</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    ";
            // line 185
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["history"]) || array_key_exists("history", $context) ? $context["history"] : (function () { throw new RuntimeError('Variable "history" does not exist.', 185, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 186
                yield "                        <tr>
                            <td>
                                ";
                // line 188
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["row"], "type", [], "any", false, false, false, 188) == "general")) {
                    // line 189
                    yield "                                    <span class=\"pill pill-general\">Général</span>
                                ";
                } else {
                    // line 191
                    yield "                                    <span class=\"pill pill-specific\">Spécifique</span>
                                ";
                }
                // line 193
                yield "                            </td>
                            <td>";
                // line 194
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "title", [], "any", false, false, false, 194), "html", null, true);
                yield "</td>
                            <td class=\"score\">";
                // line 195
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "score", [], "any", false, false, false, 195), "html", null, true);
                yield "</td>
                            <td>";
                // line 196
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["row"], "percentage", [], "any", true, true, false, 196) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["row"], "percentage", [], "any", false, false, false, 196)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "percentage", [], "any", false, false, false, 196), "html", null, true)) : ("-"));
                yield "%</td>
                            <td>";
                // line 197
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "category", [], "any", false, false, false, 197), "html", null, true);
                yield "</td>
                            <td>";
                // line 198
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "level", [], "any", false, false, false, 198), "html", null, true);
                yield "</td>
                            <td>
                                ";
                // line 200
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["row"], "date", [], "any", false, false, false, 200)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 201
                    yield "                                    ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "date", [], "any", false, false, false, 201), "d/m/Y H:i"), "html", null, true);
                    yield "
                                ";
                } else {
                    // line 203
                    yield "                                    -
                                ";
                }
                // line 205
                yield "                            </td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['row'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 208
            yield "                </tbody>
            </table>
        ";
        } else {
            // line 211
            yield "            <div class=\"empty-box\">
                Aucun historique disponible.
            </div>
        ";
        }
        // line 215
        yield "
        <div class=\"footer\">
            Document généré automatiquement par MindBoost
        </div>
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
        return "pdf/user_history_pdf.html.twig";
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
        return array (  313 => 215,  307 => 211,  302 => 208,  294 => 205,  290 => 203,  284 => 201,  282 => 200,  277 => 198,  273 => 197,  269 => 196,  265 => 195,  261 => 194,  258 => 193,  254 => 191,  250 => 189,  248 => 188,  244 => 186,  240 => 185,  225 => 172,  223 => 171,  214 => 165,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Historique utilisateur</title>
    <style>
        body {
            font-family: Helvetica, Arial, sans-serif;
            color: #1f2937;
            margin: 0;
            padding: 0;
            background: #ffffff;
        }

        .page {
            padding: 34px 36px;
        }

        .header {
            background: #1d4ed8;
            color: #ffffff;
            padding: 28px 30px;
            border-radius: 18px;
            margin-bottom: 28px;
        }

        .brand {
            font-size: 13px;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #dbeafe;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .title {
            font-size: 32px;
            font-weight: bold;
            margin: 0 0 8px;
            color: #ffffff;
        }

        .subtitle {
            font-size: 14px;
            margin: 0;
            color: #e0ecff;
        }

        .meta-row {
            margin-bottom: 22px;
        }

        .meta-box {
            background: #ffffff;
            border: 1px solid #bcd0ee;
            border-radius: 14px;
            padding: 14px 18px;
        }

        .meta-label {
            font-size: 11px;
            text-transform: uppercase;
            color: #4b6285;
            margin-bottom: 6px;
            font-weight: bold;
        }

        .meta-value {
            font-size: 15px;
            font-weight: bold;
            color: #16345f;
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            color: #16345f;
            margin: 30px 0 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #ffffff;
            border-radius: 14px;
            overflow: hidden;
            border: 1px solid #c9d7ee;
        }

        thead th {
            background: #dbe7f7;
            color: #16345f;
            font-size: 13px;
            padding: 12px 10px;
            text-align: left;
            border-bottom: 1px solid #c2d2ec;
        }

        tbody td {
            padding: 11px 10px;
            border-bottom: 1px solid #dfe8f5;
            font-size: 13px;
            color: #24344f;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .pill {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: bold;
        }

        .pill-general {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .pill-specific {
            background: #ccfbf1;
            color: #0f766e;
        }

        .score {
            font-weight: bold;
            color: #1d4ed8;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 11px;
            color: #5f7291;
            border-top: 1px solid #d7e3f2;
            padding-top: 14px;
        }

        .empty-box {
            background: #ffffff;
            border: 1px solid #dce6f8;
            border-radius: 14px;
            padding: 24px;
            color: #4b6285;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class=\"page\">
        <div class=\"header\">
            <div class=\"brand\">MindBoost • Rapport utilisateur</div>
            <h1 class=\"title\">Historique personnel</h1>
            <p class=\"subtitle\">
                Export PDF de l’historique des tests passés
            </p>
        </div>

        <div class=\"meta-row\">
            <div class=\"meta-box\">
                <div class=\"meta-label\">Date de génération</div>
                <div class=\"meta-value\">{{ generatedAt|date('d/m/Y à H:i') }}</div>
            </div>
        </div>

        <div class=\"section-title\">Résumé des résultats</div>

        {% if history|length > 0 %}
            <table>
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Titre du test</th>
                        <th>Score</th>
                        <th>%</th>
                        <th>Catégorie</th>
                        <th>Niveau</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    {% for row in history %}
                        <tr>
                            <td>
                                {% if row.type == 'general' %}
                                    <span class=\"pill pill-general\">Général</span>
                                {% else %}
                                    <span class=\"pill pill-specific\">Spécifique</span>
                                {% endif %}
                            </td>
                            <td>{{ row.title }}</td>
                            <td class=\"score\">{{ row.score }}</td>
                            <td>{{ row.percentage ?? '-' }}%</td>
                            <td>{{ row.category }}</td>
                            <td>{{ row.level }}</td>
                            <td>
                                {% if row.date %}
                                    {{ row.date|date('d/m/Y H:i') }}
                                {% else %}
                                    -
                                {% endif %}
                            </td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        {% else %}
            <div class=\"empty-box\">
                Aucun historique disponible.
            </div>
        {% endif %}

        <div class=\"footer\">
            Document généré automatiquement par MindBoost
        </div>
    </div>
</body>
</html>", "pdf/user_history_pdf.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/pdf/user_history_pdf.html.twig");
    }
}
