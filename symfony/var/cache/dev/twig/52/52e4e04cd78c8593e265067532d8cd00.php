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

/* general_test/edit_general.html.twig */
class __TwigTemplate_403f43001b631edebc614742b16ed312 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "general_test/edit_general.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "general_test/edit_general.html.twig"));

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

        yield "Éditer ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 3, $this->source); })()), "title", [], "any", false, false, false, 3), "html", null, true);
        yield " - MindBoost";
        
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
        yield "<div class=\"page-heading\">
    <h1><i class=\"fas fa-pen-to-square me-2\"></i>Éditer le Test Général</h1>
    <p>Modifiez les informations du test.</p>
</div>

<div class=\"card\">
    <div class=\"card-body\">
        <form method=\"POST\" id=\"testForm\">
            <div class=\"form-group mb-3\">
                <label for=\"title\" class=\"form-label\">
                    <i class=\"fas fa-heading\"></i> Titre *
                </label>
                <input type=\"text\" id=\"title\" name=\"title\" class=\"form-control\"
                       value=\"";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 19, $this->source); })()), "title", [], "any", false, false, false, 19), "html", null, true);
        yield "\" required minlength=\"3\" maxlength=\"255\">
                <small class=\"form-text\">Le titre ne doit pas être uniquement des nombres.</small>
            </div>

            <div class=\"form-group mb-3\">
                <label for=\"description\" class=\"form-label\">
                    <i class=\"fas fa-align-left\"></i> Description
                </label>
                <textarea id=\"description\" name=\"description\" class=\"form-control\"
                          rows=\"5\">";
        // line 28
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["test"] ?? null), "description", [], "any", true, true, false, 28) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 28, $this->source); })()), "description", [], "any", false, false, false, 28)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 28, $this->source); })()), "description", [], "any", false, false, false, 28), "html", null, true)) : (""));
        yield "</textarea>
            </div>

            <div class=\"form-group mb-4\">
                <label for=\"status\" class=\"form-label\">
                    <i class=\"fas fa-toggle-on\"></i> Statut *
                </label>
                <select id=\"status\" name=\"status\" class=\"form-select\" required>
                    <option value=\"DRAFT\" ";
        // line 36
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 36, $this->source); })()), "status", [], "any", false, false, false, 36) == "DRAFT")) {
            yield "selected";
        }
        yield ">Brouillon</option>
                    <option value=\"ACTIVE\" ";
        // line 37
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 37, $this->source); })()), "status", [], "any", false, false, false, 37) == "ACTIVE")) {
            yield "selected";
        }
        yield ">Actif</option>
                    <option value=\"INACTIVE\" ";
        // line 38
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 38, $this->source); })()), "status", [], "any", false, false, false, 38) == "INACTIVE")) {
            yield "selected";
        }
        yield ">Inactif</option>
                </select>
            </div>

            <div class=\"row\">
                <div class=\"col-md-6\">
                    <button type=\"submit\" class=\"btn btn-primary w-100\">
                        <i class=\"fas fa-save\"></i> Mettre à jour
                    </button>
                </div>
                <div class=\"col-md-6\">
                    <a href=\"";
        // line 49
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("general_test_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 49, $this->source); })()), "id", [], "any", false, false, false, 49)]), "html", null, true);
        yield "\" class=\"btn btn-secondary w-100\">
                        <i class=\"fas fa-times\"></i> Annuler
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('testForm').addEventListener('submit', function(e) {
    const title = document.getElementById('title').value.trim();

    if (title.length < 3) {
        e.preventDefault();
        alert('Le titre doit contenir au moins 3 caractères.');
        return;
    }

    if (/^\\d+\$/.test(title)) {
        e.preventDefault();
        alert('Le titre ne doit pas être uniquement des nombres.');
        return;
    }
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
        return "general_test/edit_general.html.twig";
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
        return array (  168 => 49,  152 => 38,  146 => 37,  140 => 36,  129 => 28,  117 => 19,  102 => 6,  89 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}Éditer {{ test.title }} - MindBoost{% endblock %}

{% block content %}
<div class=\"page-heading\">
    <h1><i class=\"fas fa-pen-to-square me-2\"></i>Éditer le Test Général</h1>
    <p>Modifiez les informations du test.</p>
</div>

<div class=\"card\">
    <div class=\"card-body\">
        <form method=\"POST\" id=\"testForm\">
            <div class=\"form-group mb-3\">
                <label for=\"title\" class=\"form-label\">
                    <i class=\"fas fa-heading\"></i> Titre *
                </label>
                <input type=\"text\" id=\"title\" name=\"title\" class=\"form-control\"
                       value=\"{{ test.title }}\" required minlength=\"3\" maxlength=\"255\">
                <small class=\"form-text\">Le titre ne doit pas être uniquement des nombres.</small>
            </div>

            <div class=\"form-group mb-3\">
                <label for=\"description\" class=\"form-label\">
                    <i class=\"fas fa-align-left\"></i> Description
                </label>
                <textarea id=\"description\" name=\"description\" class=\"form-control\"
                          rows=\"5\">{{ test.description ?? '' }}</textarea>
            </div>

            <div class=\"form-group mb-4\">
                <label for=\"status\" class=\"form-label\">
                    <i class=\"fas fa-toggle-on\"></i> Statut *
                </label>
                <select id=\"status\" name=\"status\" class=\"form-select\" required>
                    <option value=\"DRAFT\" {% if test.status == 'DRAFT' %}selected{% endif %}>Brouillon</option>
                    <option value=\"ACTIVE\" {% if test.status == 'ACTIVE' %}selected{% endif %}>Actif</option>
                    <option value=\"INACTIVE\" {% if test.status == 'INACTIVE' %}selected{% endif %}>Inactif</option>
                </select>
            </div>

            <div class=\"row\">
                <div class=\"col-md-6\">
                    <button type=\"submit\" class=\"btn btn-primary w-100\">
                        <i class=\"fas fa-save\"></i> Mettre à jour
                    </button>
                </div>
                <div class=\"col-md-6\">
                    <a href=\"{{ path('general_test_show', {id: test.id}) }}\" class=\"btn btn-secondary w-100\">
                        <i class=\"fas fa-times\"></i> Annuler
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('testForm').addEventListener('submit', function(e) {
    const title = document.getElementById('title').value.trim();

    if (title.length < 3) {
        e.preventDefault();
        alert('Le titre doit contenir au moins 3 caractères.');
        return;
    }

    if (/^\\d+\$/.test(title)) {
        e.preventDefault();
        alert('Le titre ne doit pas être uniquement des nombres.');
        return;
    }
});
</script>
{% endblock %}", "general_test/edit_general.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/general_test/edit_general.html.twig");
    }
}
