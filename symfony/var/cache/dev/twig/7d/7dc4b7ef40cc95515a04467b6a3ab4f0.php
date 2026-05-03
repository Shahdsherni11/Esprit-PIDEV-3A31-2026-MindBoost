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

/* specific_test/delete.html.twig */
class __TwigTemplate_39b550a75023e544432fd06124adf884 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "specific_test/delete.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "specific_test/delete.html.twig"));

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

        yield "Confirmer la suppression - MindBoost";
        
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
    <h1><i class=\"fas fa-triangle-exclamation me-2\"></i>Confirmer la Suppression</h1>
    <p>Cette action est irréversible.</p>
</div>

<div class=\"row\">
    <div class=\"col-lg-8 mx-auto\">
        <div class=\"card\">
            <div class=\"card-header\" style=\"background: linear-gradient(90deg, rgba(231,76,60,0.35), rgba(255,107,157,0.18));\">
                <i class=\"fas fa-trash me-2\"></i>Suppression du test
            </div>
            <div class=\"card-body\">
                <div class=\"alert alert-danger\">
                    <i class=\"fas fa-warning me-2\"></i>
                    <strong>Attention !</strong> Toutes les questions et réponses associées seront supprimées.
                </div>

                <p class=\"mb-4 fs-5\">Êtes-vous sûr de vouloir supprimer le test suivant ?</p>

                <div class=\"question-card mb-4\">
                    <h5 class=\"mb-2\">";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 26, $this->source); })()), "title", [], "any", false, false, false, 26), "html", null, true);
        yield "</h5>
                    ";
        // line 27
        if (((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 27, $this->source); })()) == "specific")) {
            // line 28
            yield "                        <p class=\"mb-2\"><strong>Catégorie :</strong> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 28, $this->source); })()), "category", [], "any", false, false, false, 28), "html", null, true);
            yield "</p>
                    ";
        }
        // line 30
        yield "                    <p class=\"mb-0 text-secondary\">
                        ";
        // line 31
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 31, $this->source); })()), "description", [], "any", false, false, false, 31)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 32
            yield "                            ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 32, $this->source); })()), "description", [], "any", false, false, false, 32), 0, 120), "html", null, true);
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 32, $this->source); })()), "description", [], "any", false, false, false, 32)) > 120)) {
                yield "...";
            }
            // line 33
            yield "                        ";
        } else {
            // line 34
            yield "                            Aucune description
                        ";
        }
        // line 36
        yield "                    </p>
                </div>

                <form method=\"POST\">
                    <div class=\"row\">
                        <div class=\"col-md-6\">
                            <button type=\"submit\" class=\"btn btn-danger w-100\">
                                <i class=\"fas fa-trash\"></i> Oui, supprimer
                            </button>
                        </div>
                        <div class=\"col-md-6\">
                            <a href=\"";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(((((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 47, $this->source); })()) == "general")) ? ("general_test_show") : ("specific_test_show")), ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 47, $this->source); })()), "id", [], "any", false, false, false, 47)]), "html", null, true);
        yield "\"
                               class=\"btn btn-secondary w-100\">
                                <i class=\"fas fa-times\"></i> Annuler
                            </a>
                        </div>
                    </div>
                </form>
            </div>
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
        return "specific_test/delete.html.twig";
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
        return array (  165 => 47,  152 => 36,  148 => 34,  145 => 33,  139 => 32,  137 => 31,  134 => 30,  128 => 28,  126 => 27,  122 => 26,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}Confirmer la suppression - MindBoost{% endblock %}

{% block content %}
<div class=\"page-heading\">
    <h1><i class=\"fas fa-triangle-exclamation me-2\"></i>Confirmer la Suppression</h1>
    <p>Cette action est irréversible.</p>
</div>

<div class=\"row\">
    <div class=\"col-lg-8 mx-auto\">
        <div class=\"card\">
            <div class=\"card-header\" style=\"background: linear-gradient(90deg, rgba(231,76,60,0.35), rgba(255,107,157,0.18));\">
                <i class=\"fas fa-trash me-2\"></i>Suppression du test
            </div>
            <div class=\"card-body\">
                <div class=\"alert alert-danger\">
                    <i class=\"fas fa-warning me-2\"></i>
                    <strong>Attention !</strong> Toutes les questions et réponses associées seront supprimées.
                </div>

                <p class=\"mb-4 fs-5\">Êtes-vous sûr de vouloir supprimer le test suivant ?</p>

                <div class=\"question-card mb-4\">
                    <h5 class=\"mb-2\">{{ test.title }}</h5>
                    {% if type == 'specific' %}
                        <p class=\"mb-2\"><strong>Catégorie :</strong> {{ test.category }}</p>
                    {% endif %}
                    <p class=\"mb-0 text-secondary\">
                        {% if test.description %}
                            {{ test.description|slice(0, 120) }}{% if test.description|length > 120 %}...{% endif %}
                        {% else %}
                            Aucune description
                        {% endif %}
                    </p>
                </div>

                <form method=\"POST\">
                    <div class=\"row\">
                        <div class=\"col-md-6\">
                            <button type=\"submit\" class=\"btn btn-danger w-100\">
                                <i class=\"fas fa-trash\"></i> Oui, supprimer
                            </button>
                        </div>
                        <div class=\"col-md-6\">
                            <a href=\"{{ path(type == 'general' ? 'general_test_show' : 'specific_test_show', {id: test.id}) }}\"
                               class=\"btn btn-secondary w-100\">
                                <i class=\"fas fa-times\"></i> Annuler
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{% endblock %}", "specific_test/delete.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/specific_test/delete.html.twig");
    }
}
