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

/* specific_test/edit_specific.html.twig */
class __TwigTemplate_59cd902d51797faa659a517793b1a199 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "specific_test/edit_specific.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "specific_test/edit_specific.html.twig"));

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
        yield " - Tests Spécifiques";
        
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
    <h1><i class=\"fas fa-pen-to-square me-2\"></i>Éditer le Test Spécifique</h1>
    <p>Modifiez les informations du test spécifique.</p>
</div>

<div class=\"card mb-4\">
    <div class=\"card-body\">
        <form method=\"POST\" id=\"testForm\">
            <div class=\"form-group mb-3\">
                <label for=\"general_test_id\" class=\"form-label\">
                    <i class=\"fas fa-book\"></i> Test Général Parent *
                </label>
                <select id=\"general_test_id\" name=\"general_test_id\" class=\"form-select\" required>
                    <option value=\"\">-- Sélectionner un test général --</option>
                    ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["generalTests"]) || array_key_exists("generalTests", $context) ? $context["generalTests"] : (function () { throw new RuntimeError('Variable "generalTests" does not exist.', 20, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["generalTest"]) {
            // line 21
            yield "                        <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["generalTest"], "id", [], "any", false, false, false, 21), "html", null, true);
            yield "\"
                            ";
            // line 22
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 22, $this->source); })()), "generalTestId", [], "any", false, false, false, 22) == CoreExtension::getAttribute($this->env, $this->source, $context["generalTest"], "id", [], "any", false, false, false, 22))) {
                yield "selected";
            }
            yield ">
                            ";
            // line 23
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["generalTest"], "title", [], "any", false, false, false, 23), "html", null, true);
            yield "
                        </option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['generalTest'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        yield "                </select>
            </div>

            <div class=\"form-group mb-3\">
                <label for=\"category\" class=\"form-label\">
                    <i class=\"fas fa-folder\"></i> Catégorie *
                </label>
                <select id=\"category\" name=\"category\" class=\"form-select\" required>
                    <option value=\"Anxiete\" ";
        // line 34
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 34, $this->source); })()), "category", [], "any", false, false, false, 34) == "Anxiete")) {
            yield "selected";
        }
        yield ">Anxiete</option>
                    <option value=\"Stress\" ";
        // line 35
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 35, $this->source); })()), "category", [], "any", false, false, false, 35) == "Stress")) {
            yield "selected";
        }
        yield ">Stress</option>
                    <option value=\"Depression\" ";
        // line 36
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 36, $this->source); })()), "category", [], "any", false, false, false, 36) == "Depression")) {
            yield "selected";
        }
        yield ">Depression</option>
                    <option value=\"Trouble du Sommeil\" ";
        // line 37
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 37, $this->source); })()), "category", [], "any", false, false, false, 37) == "Trouble du Sommeil")) {
            yield "selected";
        }
        yield ">Trouble du Sommeil</option>
                </select>
            </div>

            <div class=\"form-group mb-3\">
                <label for=\"title\" class=\"form-label\">
                    <i class=\"fas fa-heading\"></i> Titre *
                </label>
                <input type=\"text\" id=\"title\" name=\"title\" class=\"form-control\"
                       value=\"";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 46, $this->source); })()), "title", [], "any", false, false, false, 46), "html", null, true);
        yield "\" required minlength=\"3\" maxlength=\"255\">
                <small class=\"form-text\">Le titre ne doit pas être uniquement des nombres.</small>
            </div>

            <div class=\"form-group mb-3\">
                <label for=\"description\" class=\"form-label\">
                    <i class=\"fas fa-align-left\"></i> Description
                </label>
                <textarea id=\"description\" name=\"description\" class=\"form-control\"
                          rows=\"5\">";
        // line 55
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["test"] ?? null), "description", [], "any", true, true, false, 55) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 55, $this->source); })()), "description", [], "any", false, false, false, 55)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 55, $this->source); })()), "description", [], "any", false, false, false, 55), "html", null, true)) : (""));
        yield "</textarea>
            </div>

            <div class=\"form-group mb-4\">
                <label for=\"status\" class=\"form-label\">
                    <i class=\"fas fa-toggle-on\"></i> Statut *
                </label>
                <select id=\"status\" name=\"status\" class=\"form-select\" required>
                    <option value=\"DRAFT\" ";
        // line 63
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 63, $this->source); })()), "status", [], "any", false, false, false, 63) == "DRAFT")) {
            yield "selected";
        }
        yield ">Brouillon</option>
                    <option value=\"ACTIVE\" ";
        // line 64
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 64, $this->source); })()), "status", [], "any", false, false, false, 64) == "ACTIVE")) {
            yield "selected";
        }
        yield ">Actif</option>
                    <option value=\"INACTIVE\" ";
        // line 65
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 65, $this->source); })()), "status", [], "any", false, false, false, 65) == "INACTIVE")) {
            yield "selected";
        }
        yield ">Inactif</option>
                </select>
                <small class=\"form-text\">Un seul test spécifique peut être actif par catégorie.</small>
            </div>

            <div class=\"row\">
                <div class=\"col-md-6\">
                    <button type=\"submit\" class=\"btn btn-success w-100\">
                        <i class=\"fas fa-save\"></i> Mettre à jour
                    </button>
                </div>
                <div class=\"col-md-6\">
                    <a href=\"";
        // line 77
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("specific_test_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 77, $this->source); })()), "id", [], "any", false, false, false, 77)]), "html", null, true);
        yield "\" class=\"btn btn-secondary w-100\">
                        <i class=\"fas fa-times\"></i> Annuler
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

";
        // line 86
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["questionsWithAnswers"]) || array_key_exists("questionsWithAnswers", $context) ? $context["questionsWithAnswers"] : (function () { throw new RuntimeError('Variable "questionsWithAnswers" does not exist.', 86, $this->source); })())) > 0)) {
            // line 87
            yield "    <div class=\"card\">
        <div class=\"card-header\">
            <i class=\"fas fa-question-circle me-2\"></i>Questions (";
            // line 89
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["questionsWithAnswers"]) || array_key_exists("questionsWithAnswers", $context) ? $context["questionsWithAnswers"] : (function () { throw new RuntimeError('Variable "questionsWithAnswers" does not exist.', 89, $this->source); })())), "html", null, true);
            yield ")
        </div>
        <div class=\"card-body\">
            ";
            // line 92
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["questionsWithAnswers"]) || array_key_exists("questionsWithAnswers", $context) ? $context["questionsWithAnswers"] : (function () { throw new RuntimeError('Variable "questionsWithAnswers" does not exist.', 92, $this->source); })()));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 93
                yield "                <div class=\"question-display mb-4\">
                    <h5 class=\"mb-3\">
                        <span class=\"badge badge-success me-2\">Q";
                // line 95
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 95), "html", null, true);
                yield "</span>
                        ";
                // line 96
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "question", [], "any", false, false, false, 96), "questionText", [], "any", false, false, false, 96), "html", null, true);
                yield "
                    </h5>

                    ";
                // line 99
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["item"], "answers", [], "any", false, false, false, 99)) > 0)) {
                    // line 100
                    yield "                        ";
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "answers", [], "any", false, false, false, 100));
                    foreach ($context['_seq'] as $context["_key"] => $context["answer"]) {
                        // line 101
                        yield "                            <div class=\"answer-item\">
                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <div>";
                        // line 103
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["answer"], "answerText", [], "any", false, false, false, 103), "html", null, true);
                        yield "</div>
                                    <span class=\"badge badge-info\">Score: ";
                        // line 104
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["answer"], "score", [], "any", false, false, false, 104), "html", null, true);
                        yield "</span>
                                </div>
                            </div>
                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['answer'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 108
                    yield "                    ";
                } else {
                    // line 109
                    yield "                        <p class=\"text-secondary mb-0\">Pas de réponses.</p>
                    ";
                }
                // line 111
                yield "                </div>
            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 113
            yield "        </div>
    </div>
";
        } else {
            // line 116
            yield "    <div class=\"alert alert-info\">
        <i class=\"fas fa-info-circle me-2\"></i>Aucune question pour ce test.
    </div>
";
        }
        // line 120
        yield "
<script>
document.getElementById('testForm').addEventListener('submit', function(e) {
    const generalTestId = document.getElementById('general_test_id').value;
    const title = document.getElementById('title').value.trim();

    if (!generalTestId) {
        e.preventDefault();
        alert('Veuillez sélectionner un test général parent.');
        return;
    }

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
        return "specific_test/edit_specific.html.twig";
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
        return array (  349 => 120,  343 => 116,  338 => 113,  323 => 111,  319 => 109,  316 => 108,  306 => 104,  302 => 103,  298 => 101,  293 => 100,  291 => 99,  285 => 96,  281 => 95,  277 => 93,  260 => 92,  254 => 89,  250 => 87,  248 => 86,  236 => 77,  219 => 65,  213 => 64,  207 => 63,  196 => 55,  184 => 46,  170 => 37,  164 => 36,  158 => 35,  152 => 34,  142 => 26,  133 => 23,  127 => 22,  122 => 21,  118 => 20,  102 => 6,  89 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}Éditer {{ test.title }} - Tests Spécifiques{% endblock %}

{% block content %}
<div class=\"page-heading\">
    <h1><i class=\"fas fa-pen-to-square me-2\"></i>Éditer le Test Spécifique</h1>
    <p>Modifiez les informations du test spécifique.</p>
</div>

<div class=\"card mb-4\">
    <div class=\"card-body\">
        <form method=\"POST\" id=\"testForm\">
            <div class=\"form-group mb-3\">
                <label for=\"general_test_id\" class=\"form-label\">
                    <i class=\"fas fa-book\"></i> Test Général Parent *
                </label>
                <select id=\"general_test_id\" name=\"general_test_id\" class=\"form-select\" required>
                    <option value=\"\">-- Sélectionner un test général --</option>
                    {% for generalTest in generalTests %}
                        <option value=\"{{ generalTest.id }}\"
                            {% if test.generalTestId == generalTest.id %}selected{% endif %}>
                            {{ generalTest.title }}
                        </option>
                    {% endfor %}
                </select>
            </div>

            <div class=\"form-group mb-3\">
                <label for=\"category\" class=\"form-label\">
                    <i class=\"fas fa-folder\"></i> Catégorie *
                </label>
                <select id=\"category\" name=\"category\" class=\"form-select\" required>
                    <option value=\"Anxiete\" {% if test.category == 'Anxiete' %}selected{% endif %}>Anxiete</option>
                    <option value=\"Stress\" {% if test.category == 'Stress' %}selected{% endif %}>Stress</option>
                    <option value=\"Depression\" {% if test.category == 'Depression' %}selected{% endif %}>Depression</option>
                    <option value=\"Trouble du Sommeil\" {% if test.category == 'Trouble du Sommeil' %}selected{% endif %}>Trouble du Sommeil</option>
                </select>
            </div>

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
                <small class=\"form-text\">Un seul test spécifique peut être actif par catégorie.</small>
            </div>

            <div class=\"row\">
                <div class=\"col-md-6\">
                    <button type=\"submit\" class=\"btn btn-success w-100\">
                        <i class=\"fas fa-save\"></i> Mettre à jour
                    </button>
                </div>
                <div class=\"col-md-6\">
                    <a href=\"{{ path('specific_test_show', {id: test.id}) }}\" class=\"btn btn-secondary w-100\">
                        <i class=\"fas fa-times\"></i> Annuler
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

{% if questionsWithAnswers|length > 0 %}
    <div class=\"card\">
        <div class=\"card-header\">
            <i class=\"fas fa-question-circle me-2\"></i>Questions ({{ questionsWithAnswers|length }})
        </div>
        <div class=\"card-body\">
            {% for item in questionsWithAnswers %}
                <div class=\"question-display mb-4\">
                    <h5 class=\"mb-3\">
                        <span class=\"badge badge-success me-2\">Q{{ loop.index }}</span>
                        {{ item.question.questionText }}
                    </h5>

                    {% if item.answers|length > 0 %}
                        {% for answer in item.answers %}
                            <div class=\"answer-item\">
                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <div>{{ answer.answerText }}</div>
                                    <span class=\"badge badge-info\">Score: {{ answer.score }}</span>
                                </div>
                            </div>
                        {% endfor %}
                    {% else %}
                        <p class=\"text-secondary mb-0\">Pas de réponses.</p>
                    {% endif %}
                </div>
            {% endfor %}
        </div>
    </div>
{% else %}
    <div class=\"alert alert-info\">
        <i class=\"fas fa-info-circle me-2\"></i>Aucune question pour ce test.
    </div>
{% endif %}

<script>
document.getElementById('testForm').addEventListener('submit', function(e) {
    const generalTestId = document.getElementById('general_test_id').value;
    const title = document.getElementById('title').value.trim();

    if (!generalTestId) {
        e.preventDefault();
        alert('Veuillez sélectionner un test général parent.');
        return;
    }

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
{% endblock %}", "specific_test/edit_specific.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/specific_test/edit_specific.html.twig");
    }
}
