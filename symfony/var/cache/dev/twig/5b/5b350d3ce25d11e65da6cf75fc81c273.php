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

/* tache_focus/_form.html.twig */
class __TwigTemplate_0cf3c9d5f7ff6333c671087dcff51b66 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "tache_focus/_form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "tache_focus/_form.html.twig"));

        // line 1
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 1, $this->source); })()), 'form_start', ["attr" => ["class" => "needs-validation"]]);
        yield "
<div class=\"mb-3\">
    ";
        // line 3
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 3, $this->source); })()), "titre", [], "any", false, false, false, 3), 'label');
        yield "
    ";
        // line 4
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 4, $this->source); })()), "titre", [], "any", false, false, false, 4), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Ex: Terminer le rapport"]]);
        yield "
    ";
        // line 5
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 5, $this->source); })()), "titre", [], "any", false, false, false, 5), 'errors');
        yield "
</div>
<div class=\"mb-3\">
    ";
        // line 8
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 8, $this->source); })()), "objectifPrincipal", [], "any", false, false, false, 8), 'label');
        yield "
    ";
        // line 9
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 9, $this->source); })()), "objectifPrincipal", [], "any", false, false, false, 9), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Décrivez l objectif...", "rows" => 3]]);
        yield "
    ";
        // line 10
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 10, $this->source); })()), "objectifPrincipal", [], "any", false, false, false, 10), 'errors');
        yield "
</div>
<div class=\"row\">
    <div class=\"col-md-6 mb-3\">
        ";
        // line 14
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 14, $this->source); })()), "niveauDifficulte", [], "any", false, false, false, 14), 'label');
        yield "
        ";
        // line 15
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 15, $this->source); })()), "niveauDifficulte", [], "any", false, false, false, 15), 'widget', ["attr" => ["class" => "form-control", "min" => 1, "max" => 5]]);
        yield "
        ";
        // line 16
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 16, $this->source); })()), "niveauDifficulte", [], "any", false, false, false, 16), 'errors');
        yield "
        <small style=\"color: #9B9BB0;\">Entre 1 et 5</small>
    </div>
    <div class=\"col-md-6 mb-3\">
        ";
        // line 20
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 20, $this->source); })()), "scoreProductivite", [], "any", false, false, false, 20), 'label');
        yield "
        ";
        // line 21
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 21, $this->source); })()), "scoreProductivite", [], "any", false, false, false, 21), 'widget', ["attr" => ["class" => "form-control", "min" => 0, "max" => 100]]);
        yield "
        ";
        // line 22
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 22, $this->source); })()), "scoreProductivite", [], "any", false, false, false, 22), 'errors');
        yield "
        <small style=\"color: #9B9BB0;\">Entre 0 et 100</small>
    </div>
</div>
<div class=\"mb-3\">
    ";
        // line 27
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 27, $this->source); })()), "statut", [], "any", false, false, false, 27), 'label');
        yield "
    ";
        // line 28
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 28, $this->source); })()), "statut", [], "any", false, false, false, 28), 'widget', ["attr" => ["class" => "form-select"]]);
        yield "
    ";
        // line 29
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 29, $this->source); })()), "statut", [], "any", false, false, false, 29), 'errors');
        yield "
</div>
<div class=\"row\">
    <div class=\"col-md-6 mb-3\">
        ";
        // line 33
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 33, $this->source); })()), "heureDebut", [], "any", false, false, false, 33), 'label');
        yield "
        ";
        // line 34
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 34, $this->source); })()), "heureDebut", [], "any", false, false, false, 34), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
        ";
        // line 35
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 35, $this->source); })()), "heureDebut", [], "any", false, false, false, 35), 'errors');
        yield "
    </div>
    <div class=\"col-md-6 mb-3\">
        ";
        // line 38
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 38, $this->source); })()), "heureFin", [], "any", false, false, false, 38), 'label');
        yield "
        ";
        // line 39
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 39, $this->source); })()), "heureFin", [], "any", false, false, false, 39), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
        ";
        // line 40
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 40, $this->source); })()), "heureFin", [], "any", false, false, false, 40), 'errors');
        yield "
    </div>
</div>
<div class=\"mt-4 d-flex gap-2\">
    <button type=\"submit\" class=\"btn btn-primary\">
        ";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("button_label", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["button_label"]) || array_key_exists("button_label", $context) ? $context["button_label"] : (function () { throw new RuntimeError('Variable "button_label" does not exist.', 45, $this->source); })()), "✚ Sauvegarder")) : ("✚ Sauvegarder")), "html", null, true);
        yield "
    </button>
    <a href=\"";
        // line 47
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tache_focus_index");
        yield "\" class=\"btn btn-secondary\">
        Annuler
    </a>
</div>
";
        // line 51
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), 'form_end');
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "tache_focus/_form.html.twig";
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
        return array (  170 => 51,  163 => 47,  158 => 45,  150 => 40,  146 => 39,  142 => 38,  136 => 35,  132 => 34,  128 => 33,  121 => 29,  117 => 28,  113 => 27,  105 => 22,  101 => 21,  97 => 20,  90 => 16,  86 => 15,  82 => 14,  75 => 10,  71 => 9,  67 => 8,  61 => 5,  57 => 4,  53 => 3,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ form_start(form, {'attr': {'class': 'needs-validation'}}) }}
<div class=\"mb-3\">
    {{ form_label(form.titre) }}
    {{ form_widget(form.titre, {'attr': {'class': 'form-control', 'placeholder': 'Ex: Terminer le rapport'}}) }}
    {{ form_errors(form.titre) }}
</div>
<div class=\"mb-3\">
    {{ form_label(form.objectifPrincipal) }}
    {{ form_widget(form.objectifPrincipal, {'attr': {'class': 'form-control', 'placeholder': 'Décrivez l objectif...', 'rows': 3}}) }}
    {{ form_errors(form.objectifPrincipal) }}
</div>
<div class=\"row\">
    <div class=\"col-md-6 mb-3\">
        {{ form_label(form.niveauDifficulte) }}
        {{ form_widget(form.niveauDifficulte, {'attr': {'class': 'form-control', 'min': 1, 'max': 5}}) }}
        {{ form_errors(form.niveauDifficulte) }}
        <small style=\"color: #9B9BB0;\">Entre 1 et 5</small>
    </div>
    <div class=\"col-md-6 mb-3\">
        {{ form_label(form.scoreProductivite) }}
        {{ form_widget(form.scoreProductivite, {'attr': {'class': 'form-control', 'min': 0, 'max': 100}}) }}
        {{ form_errors(form.scoreProductivite) }}
        <small style=\"color: #9B9BB0;\">Entre 0 et 100</small>
    </div>
</div>
<div class=\"mb-3\">
    {{ form_label(form.statut) }}
    {{ form_widget(form.statut, {'attr': {'class': 'form-select'}}) }}
    {{ form_errors(form.statut) }}
</div>
<div class=\"row\">
    <div class=\"col-md-6 mb-3\">
        {{ form_label(form.heureDebut) }}
        {{ form_widget(form.heureDebut, {'attr': {'class': 'form-control'}}) }}
        {{ form_errors(form.heureDebut) }}
    </div>
    <div class=\"col-md-6 mb-3\">
        {{ form_label(form.heureFin) }}
        {{ form_widget(form.heureFin, {'attr': {'class': 'form-control'}}) }}
        {{ form_errors(form.heureFin) }}
    </div>
</div>
<div class=\"mt-4 d-flex gap-2\">
    <button type=\"submit\" class=\"btn btn-primary\">
        {{ button_label|default('✚ Sauvegarder') }}
    </button>
    <a href=\"{{ path('app_tache_focus_index') }}\" class=\"btn btn-secondary\">
        Annuler
    </a>
</div>
{{ form_end(form) }}", "tache_focus/_form.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/tache_focus/_form.html.twig");
    }
}
