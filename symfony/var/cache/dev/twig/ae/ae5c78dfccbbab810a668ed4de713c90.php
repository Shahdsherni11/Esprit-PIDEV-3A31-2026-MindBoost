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

/* admin_ai/tests.html.twig */
class __TwigTemplate_54f7f5f20f1d3f3fdeb7eea3c9694fbf extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_ai/tests.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_ai/tests.html.twig"));

        $this->parent = $this->load("back/base.html.twig", 1);
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

        yield "IA Tests";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 4
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

        // line 5
        yield "<div class=\"page-heading\">
    <h1><i class=\"fas fa-brain me-2\"></i>Gérer les tests avec IA</h1>
</div>

";
        // line 9
        if ((($tmp = (isset($context["successMessage"]) || array_key_exists("successMessage", $context) ? $context["successMessage"] : (function () { throw new RuntimeError('Variable "successMessage" does not exist.', 9, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 10
            yield "    <div class=\"alert alert-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["successMessage"]) || array_key_exists("successMessage", $context) ? $context["successMessage"] : (function () { throw new RuntimeError('Variable "successMessage" does not exist.', 10, $this->source); })()), "html", null, true);
            yield "</div>
";
        }
        // line 12
        yield "
";
        // line 13
        if ((($tmp = (isset($context["errorMessage"]) || array_key_exists("errorMessage", $context) ? $context["errorMessage"] : (function () { throw new RuntimeError('Variable "errorMessage" does not exist.', 13, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 14
            yield "    <div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["errorMessage"]) || array_key_exists("errorMessage", $context) ? $context["errorMessage"] : (function () { throw new RuntimeError('Variable "errorMessage" does not exist.', 14, $this->source); })()), "html", null, true);
            yield "</div>
";
        }
        // line 16
        yield "
<div class=\"card mb-4\">
    <div class=\"card-body\">
        <form method=\"POST\" action=\"";
        // line 19
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_ai_tests_generate");
        yield "\" class=\"row g-3\" id=\"generate-ai-test-form\">
            <div class=\"col-md-4\">
                <label class=\"form-label\">Type</label>
                <select name=\"type\" class=\"form-select\">
                    <option value=\"general\" ";
        // line 23
        if (((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 23, $this->source); })()) == "general")) {
            yield "selected";
        }
        yield ">Général</option>
                    <option value=\"specific\" ";
        // line 24
        if (((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 24, $this->source); })()) == "specific")) {
            yield "selected";
        }
        yield ">Spécifique</option>
                </select>
            </div>

            <div class=\"col-md-4\">
                <label class=\"form-label\">Catégorie</label>
                <input name=\"category\" class=\"form-control\" value=\"";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 30, $this->source); })()), "html", null, true);
        yield "\">
            </div>

            <div class=\"col-md-4\">
                <label class=\"form-label\">Nombre de questions</label>
                <input type=\"number\" min=\"3\" max=\"20\" name=\"questionCount\" class=\"form-control\" value=\"";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["questionCount"]) || array_key_exists("questionCount", $context) ? $context["questionCount"] : (function () { throw new RuntimeError('Variable "questionCount" does not exist.', 35, $this->source); })()), "html", null, true);
        yield "\">
            </div>

            <div class=\"col-12\">
                <button class=\"btn btn-primary\" id=\"generate-ai-test-button\" type=\"submit\">
                    <i class=\"fas fa-wand-magic-sparkles me-2\"></i>
                    <span class=\"btn-text\">Générer avec IA</span>
                </button>
            </div>
        </form>
    </div>
</div>

";
        // line 48
        if ((($tmp = (isset($context["generatedJson"]) || array_key_exists("generatedJson", $context) ? $context["generatedJson"] : (function () { throw new RuntimeError('Variable "generatedJson" does not exist.', 48, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 49
            yield "    <div class=\"card mb-4\">
        <div class=\"card-header\">JSON généré et enregistré</div>
        <div class=\"card-body\">
            <textarea class=\"form-control\" rows=\"14\" readonly>";
            // line 52
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["generatedJson"]) || array_key_exists("generatedJson", $context) ? $context["generatedJson"] : (function () { throw new RuntimeError('Variable "generatedJson" does not exist.', 52, $this->source); })()), "html", null, true);
            yield "</textarea>
        </div>
    </div>
";
        }
        // line 56
        yield "
";
        // line 57
        if ((($tmp = (isset($context["rawResponse"]) || array_key_exists("rawResponse", $context) ? $context["rawResponse"] : (function () { throw new RuntimeError('Variable "rawResponse" does not exist.', 57, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 58
            yield "    <div class=\"card\">
        <div class=\"card-header\">Réponse brute Gemini (debug)</div>
        <div class=\"card-body\">
            <textarea class=\"form-control\" rows=\"10\" readonly>";
            // line 61
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["rawResponse"]) || array_key_exists("rawResponse", $context) ? $context["rawResponse"] : (function () { throw new RuntimeError('Variable "rawResponse" does not exist.', 61, $this->source); })()), "html", null, true);
            yield "</textarea>
        </div>
    </div>
";
        }
        // line 65
        yield "
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('generate-ai-test-form');
    const button = document.getElementById('generate-ai-test-button');

    if (!form || !button) {
        return;
    }

    form.addEventListener('submit', function () {
        button.disabled = true;

        const icon = button.querySelector('i');
        if (icon) {
            icon.className = 'fas fa-spinner fa-spin me-2';
        }

        const text = button.querySelector('.btn-text');
        if (text) {
            text.textContent = 'Génération en cours...';
        }
    });
});
</script>
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
        return "admin_ai/tests.html.twig";
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
        return array (  209 => 65,  202 => 61,  197 => 58,  195 => 57,  192 => 56,  185 => 52,  180 => 49,  178 => 48,  162 => 35,  154 => 30,  143 => 24,  137 => 23,  130 => 19,  125 => 16,  119 => 14,  117 => 13,  114 => 12,  108 => 10,  106 => 9,  100 => 5,  87 => 4,  64 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}
{% block title %}IA Tests{% endblock %}

{% block content %}
<div class=\"page-heading\">
    <h1><i class=\"fas fa-brain me-2\"></i>Gérer les tests avec IA</h1>
</div>

{% if successMessage %}
    <div class=\"alert alert-success\">{{ successMessage }}</div>
{% endif %}

{% if errorMessage %}
    <div class=\"alert alert-danger\">{{ errorMessage }}</div>
{% endif %}

<div class=\"card mb-4\">
    <div class=\"card-body\">
        <form method=\"POST\" action=\"{{ path('admin_ai_tests_generate') }}\" class=\"row g-3\" id=\"generate-ai-test-form\">
            <div class=\"col-md-4\">
                <label class=\"form-label\">Type</label>
                <select name=\"type\" class=\"form-select\">
                    <option value=\"general\" {% if type == 'general' %}selected{% endif %}>Général</option>
                    <option value=\"specific\" {% if type == 'specific' %}selected{% endif %}>Spécifique</option>
                </select>
            </div>

            <div class=\"col-md-4\">
                <label class=\"form-label\">Catégorie</label>
                <input name=\"category\" class=\"form-control\" value=\"{{ category }}\">
            </div>

            <div class=\"col-md-4\">
                <label class=\"form-label\">Nombre de questions</label>
                <input type=\"number\" min=\"3\" max=\"20\" name=\"questionCount\" class=\"form-control\" value=\"{{ questionCount }}\">
            </div>

            <div class=\"col-12\">
                <button class=\"btn btn-primary\" id=\"generate-ai-test-button\" type=\"submit\">
                    <i class=\"fas fa-wand-magic-sparkles me-2\"></i>
                    <span class=\"btn-text\">Générer avec IA</span>
                </button>
            </div>
        </form>
    </div>
</div>

{% if generatedJson %}
    <div class=\"card mb-4\">
        <div class=\"card-header\">JSON généré et enregistré</div>
        <div class=\"card-body\">
            <textarea class=\"form-control\" rows=\"14\" readonly>{{ generatedJson }}</textarea>
        </div>
    </div>
{% endif %}

{% if rawResponse %}
    <div class=\"card\">
        <div class=\"card-header\">Réponse brute Gemini (debug)</div>
        <div class=\"card-body\">
            <textarea class=\"form-control\" rows=\"10\" readonly>{{ rawResponse }}</textarea>
        </div>
    </div>
{% endif %}

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('generate-ai-test-form');
    const button = document.getElementById('generate-ai-test-button');

    if (!form || !button) {
        return;
    }

    form.addEventListener('submit', function () {
        button.disabled = true;

        const icon = button.querySelector('i');
        if (icon) {
            icon.className = 'fas fa-spinner fa-spin me-2';
        }

        const text = button.querySelector('.btn-text');
        if (text) {
            text.textContent = 'Génération en cours...';
        }
    });
});
</script>
{% endblock %}", "admin_ai/tests.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/admin_ai/tests.html.twig");
    }
}
