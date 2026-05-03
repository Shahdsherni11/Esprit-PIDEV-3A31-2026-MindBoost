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

/* pdf/user_result_pdf.html.twig */
class __TwigTemplate_0859cfbe907fd057ea03ec02aa9407db extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pdf/user_result_pdf.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pdf/user_result_pdf.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Résultat du test</title>
    <style>
        body {
            font-family: Helvetica, Arial, sans-serif;
            color: #17253a;
            margin: 30px;
        }

        .header {
            text-align: center;
            margin-bottom: 28px;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 14px;
        }

        .header h1 {
            margin: 0;
            color: #2563eb;
            font-size: 24px;
        }

        .header p {
            margin: 6px 0 0;
            color: #6c7b95;
        }

        .card {
            border: 1px solid #dbe7ff;
            border-radius: 14px;
            padding: 18px;
            margin-bottom: 18px;
            background: #f8fbff;
        }

        .title {
            font-size: 20px;
            font-weight: bold;
            color: #17253a;
            margin-bottom: 14px;
        }

        .stat-row {
            margin-bottom: 10px;
            font-size: 15px;
        }

        .label {
            font-weight: bold;
            color: #2563eb;
        }

        .level {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 999px;
            background: #dcfce7;
            color: #166534;
            font-weight: bold;
            margin-top: 10px;
        }

        .footer {
            margin-top: 24px;
            font-size: 11px;
            color: #7a8ba5;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class=\"header\">
        <h1>Résultat du test spécifique</h1>
        <p>Document généré le ";
        // line 77
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate((isset($context["generatedAt"]) || array_key_exists("generatedAt", $context) ? $context["generatedAt"] : (function () { throw new RuntimeError('Variable "generatedAt" does not exist.', 77, $this->source); })()), "d/m/Y H:i"), "html", null, true);
        yield "</p>
    </div>

    <div class=\"card\">
        <div class=\"title\">";
        // line 81
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 81, $this->source); })()), "html", null, true);
        yield "</div>

        <div class=\"stat-row\">
            <span class=\"label\">Score total :</span> ";
        // line 84
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["score"]) || array_key_exists("score", $context) ? $context["score"] : (function () { throw new RuntimeError('Variable "score" does not exist.', 84, $this->source); })()), "html", null, true);
        yield "
        </div>

        <div class=\"stat-row\">
            <span class=\"label\">Maximum :</span> ";
        // line 88
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["maxScore"]) || array_key_exists("maxScore", $context) ? $context["maxScore"] : (function () { throw new RuntimeError('Variable "maxScore" does not exist.', 88, $this->source); })()), "html", null, true);
        yield "
        </div>

        <div class=\"stat-row\">
            <span class=\"label\">Pourcentage :</span> ";
        // line 92
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["percentage"]) || array_key_exists("percentage", $context) ? $context["percentage"] : (function () { throw new RuntimeError('Variable "percentage" does not exist.', 92, $this->source); })()), "html", null, true);
        yield "%
        </div>

        <div class=\"stat-row\">
            <span class=\"label\">Niveau détecté :</span>
            <span class=\"level\">";
        // line 97
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["level"]) || array_key_exists("level", $context) ? $context["level"] : (function () { throw new RuntimeError('Variable "level" does not exist.', 97, $this->source); })()), "html", null, true);
        yield "</span>
        </div>
    </div>

    <div class=\"footer\">
        MindBoost - Résultat utilisateur
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
        return "pdf/user_result_pdf.html.twig";
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
        return array (  161 => 97,  153 => 92,  146 => 88,  139 => 84,  133 => 81,  126 => 77,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Résultat du test</title>
    <style>
        body {
            font-family: Helvetica, Arial, sans-serif;
            color: #17253a;
            margin: 30px;
        }

        .header {
            text-align: center;
            margin-bottom: 28px;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 14px;
        }

        .header h1 {
            margin: 0;
            color: #2563eb;
            font-size: 24px;
        }

        .header p {
            margin: 6px 0 0;
            color: #6c7b95;
        }

        .card {
            border: 1px solid #dbe7ff;
            border-radius: 14px;
            padding: 18px;
            margin-bottom: 18px;
            background: #f8fbff;
        }

        .title {
            font-size: 20px;
            font-weight: bold;
            color: #17253a;
            margin-bottom: 14px;
        }

        .stat-row {
            margin-bottom: 10px;
            font-size: 15px;
        }

        .label {
            font-weight: bold;
            color: #2563eb;
        }

        .level {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 999px;
            background: #dcfce7;
            color: #166534;
            font-weight: bold;
            margin-top: 10px;
        }

        .footer {
            margin-top: 24px;
            font-size: 11px;
            color: #7a8ba5;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class=\"header\">
        <h1>Résultat du test spécifique</h1>
        <p>Document généré le {{ generatedAt|date('d/m/Y H:i') }}</p>
    </div>

    <div class=\"card\">
        <div class=\"title\">{{ title }}</div>

        <div class=\"stat-row\">
            <span class=\"label\">Score total :</span> {{ score }}
        </div>

        <div class=\"stat-row\">
            <span class=\"label\">Maximum :</span> {{ maxScore }}
        </div>

        <div class=\"stat-row\">
            <span class=\"label\">Pourcentage :</span> {{ percentage }}%
        </div>

        <div class=\"stat-row\">
            <span class=\"label\">Niveau détecté :</span>
            <span class=\"level\">{{ level }}</span>
        </div>
    </div>

    <div class=\"footer\">
        MindBoost - Résultat utilisateur
    </div>
</body>
</html>", "pdf/user_result_pdf.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/pdf/user_result_pdf.html.twig");
    }
}
