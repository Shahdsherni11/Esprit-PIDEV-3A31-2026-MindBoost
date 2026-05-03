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

/* general_test/show.html.twig */
class __TwigTemplate_8a814f7f5d6cc2542c2e727def79d878 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "general_test/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "general_test/show.html.twig"));

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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 3, $this->source); })()), "title", [], "any", false, false, false, 3), "html", null, true);
        yield " - Tests Généraux";
        
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
        yield "<div class=\"page-heading d-flex flex-wrap justify-content-between align-items-start gap-3\">
    <div>
        <h1><i class=\"fas fa-book me-2\"></i>";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 8, $this->source); })()), "title", [], "any", false, false, false, 8), "html", null, true);
        yield "</h1>
        <p>Détail du test général.</p>
    </div>

    <div class=\"action-buttons\">
        <a href=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("general_test_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 13, $this->source); })()), "id", [], "any", false, false, false, 13)]), "html", null, true);
        yield "\" class=\"btn btn-warning\">
            <i class=\"fas fa-edit\"></i> Éditer
        </a>
        <a href=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("general_test_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 16, $this->source); })()), "id", [], "any", false, false, false, 16)]), "html", null, true);
        yield "\" class=\"btn btn-danger\">
            <i class=\"fas fa-trash\"></i> Supprimer
        </a>
        <a href=\"";
        // line 19
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("general_test_index");
        yield "\" class=\"btn btn-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour
        </a>
    </div>
</div>

<div class=\"card mb-4\">
    <div class=\"card-header\">
        <i class=\"fas fa-circle-info me-2\"></i>Informations
    </div>
    <div class=\"card-body\">
        <div class=\"row mb-3\">
            <div class=\"col-md-6\"><strong>Titre :</strong> ";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 31, $this->source); })()), "title", [], "any", false, false, false, 31), "html", null, true);
        yield "</div>
            <div class=\"col-md-6\">
                <strong>Statut :</strong>
                <span class=\"badge badge-";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 34, $this->source); })()), "status", [], "any", false, false, false, 34)), "html", null, true);
        yield "\">
                    ";
        // line 35
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 35, $this->source); })()), "status", [], "any", false, false, false, 35) == "DRAFT")) {
            // line 36
            yield "                        Brouillon
                    ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 37
(isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 37, $this->source); })()), "status", [], "any", false, false, false, 37) == "ACTIVE")) {
            // line 38
            yield "                        Actif
                    ";
        } else {
            // line 40
            yield "                        Inactif
                    ";
        }
        // line 42
        yield "                </span>
            </div>
        </div>

        <div class=\"row mb-3\">
            <div class=\"col-md-6\"><strong>Créé par :</strong> Utilisateur #";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 47, $this->source); })()), "createdBy", [], "any", false, false, false, 47), "html", null, true);
        yield "</div>
            <div class=\"col-md-6\"><strong>Créé le :</strong> ";
        // line 48
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 48, $this->source); })()), "createdAt", [], "any", false, false, false, 48), "d/m/Y H:i"), "html", null, true);
        yield "</div>
        </div>

        ";
        // line 51
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 51, $this->source); })()), "description", [], "any", false, false, false, 51)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 52
            yield "            <div>
                <strong>Description :</strong>
                <p class=\"mt-2 mb-0\">";
            // line 54
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 54, $this->source); })()), "description", [], "any", false, false, false, 54), "html", null, true);
            yield "</p>
            </div>
        ";
        }
        // line 57
        yield "    </div>
</div>

";
        // line 60
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["questionsWithAnswers"]) || array_key_exists("questionsWithAnswers", $context) ? $context["questionsWithAnswers"] : (function () { throw new RuntimeError('Variable "questionsWithAnswers" does not exist.', 60, $this->source); })())) > 0)) {
            // line 61
            yield "    <div class=\"card\">
        <div class=\"card-header\">
            <i class=\"fas fa-question-circle me-2\"></i>Questions (";
            // line 63
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["questionsWithAnswers"]) || array_key_exists("questionsWithAnswers", $context) ? $context["questionsWithAnswers"] : (function () { throw new RuntimeError('Variable "questionsWithAnswers" does not exist.', 63, $this->source); })())), "html", null, true);
            yield ")
        </div>
        <div class=\"card-body\">
            ";
            // line 66
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["questionsWithAnswers"]) || array_key_exists("questionsWithAnswers", $context) ? $context["questionsWithAnswers"] : (function () { throw new RuntimeError('Variable "questionsWithAnswers" does not exist.', 66, $this->source); })()));
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
                // line 67
                yield "                <div class=\"question-display mb-4\">
                    <h5 class=\"mb-3\">
                        <span class=\"badge badge-primary me-2\">Q";
                // line 69
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 69), "html", null, true);
                yield "</span>
                        ";
                // line 70
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "question", [], "any", false, false, false, 70), "questionText", [], "any", false, false, false, 70), "html", null, true);
                yield "
                    </h5>

                    ";
                // line 73
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["item"], "answers", [], "any", false, false, false, 73)) > 0)) {
                    // line 74
                    yield "                        ";
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "answers", [], "any", false, false, false, 74));
                    foreach ($context['_seq'] as $context["_key"] => $context["answer"]) {
                        // line 75
                        yield "                            <div class=\"answer-item\">
                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <div>
                                        <span class=\"badge badge-secondary me-2\">";
                        // line 78
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["answer"], "answerLabel", [], "any", false, false, false, 78), "html", null, true);
                        yield "</span>
                                        ";
                        // line 79
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["answer"], "answerText", [], "any", false, false, false, 79), "html", null, true);
                        yield "
                                    </div>
                                    <span class=\"badge badge-info\">Score: ";
                        // line 81
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["answer"], "score", [], "any", false, false, false, 81), "html", null, true);
                        yield "</span>
                                </div>
                            </div>
                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['answer'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 85
                    yield "                    ";
                } else {
                    // line 86
                    yield "                        <p class=\"text-secondary mb-0\">Pas de réponses.</p>
                    ";
                }
                // line 88
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
            // line 90
            yield "        </div>
    </div>
";
        } else {
            // line 93
            yield "    <div class=\"alert alert-info\">
        <i class=\"fas fa-info-circle me-2\"></i>Aucune question pour ce test.
    </div>
";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "general_test/show.html.twig";
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
        return array (  300 => 93,  295 => 90,  280 => 88,  276 => 86,  273 => 85,  263 => 81,  258 => 79,  254 => 78,  249 => 75,  244 => 74,  242 => 73,  236 => 70,  232 => 69,  228 => 67,  211 => 66,  205 => 63,  201 => 61,  199 => 60,  194 => 57,  188 => 54,  184 => 52,  182 => 51,  176 => 48,  172 => 47,  165 => 42,  161 => 40,  157 => 38,  155 => 37,  152 => 36,  150 => 35,  146 => 34,  140 => 31,  125 => 19,  119 => 16,  113 => 13,  105 => 8,  101 => 6,  88 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}{{ test.title }} - Tests Généraux{% endblock %}

{% block content %}
<div class=\"page-heading d-flex flex-wrap justify-content-between align-items-start gap-3\">
    <div>
        <h1><i class=\"fas fa-book me-2\"></i>{{ test.title }}</h1>
        <p>Détail du test général.</p>
    </div>

    <div class=\"action-buttons\">
        <a href=\"{{ path('general_test_edit', {id: test.id}) }}\" class=\"btn btn-warning\">
            <i class=\"fas fa-edit\"></i> Éditer
        </a>
        <a href=\"{{ path('general_test_delete', {id: test.id}) }}\" class=\"btn btn-danger\">
            <i class=\"fas fa-trash\"></i> Supprimer
        </a>
        <a href=\"{{ path('general_test_index') }}\" class=\"btn btn-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour
        </a>
    </div>
</div>

<div class=\"card mb-4\">
    <div class=\"card-header\">
        <i class=\"fas fa-circle-info me-2\"></i>Informations
    </div>
    <div class=\"card-body\">
        <div class=\"row mb-3\">
            <div class=\"col-md-6\"><strong>Titre :</strong> {{ test.title }}</div>
            <div class=\"col-md-6\">
                <strong>Statut :</strong>
                <span class=\"badge badge-{{ test.status|lower }}\">
                    {% if test.status == 'DRAFT' %}
                        Brouillon
                    {% elseif test.status == 'ACTIVE' %}
                        Actif
                    {% else %}
                        Inactif
                    {% endif %}
                </span>
            </div>
        </div>

        <div class=\"row mb-3\">
            <div class=\"col-md-6\"><strong>Créé par :</strong> Utilisateur #{{ test.createdBy }}</div>
            <div class=\"col-md-6\"><strong>Créé le :</strong> {{ test.createdAt|date('d/m/Y H:i') }}</div>
        </div>

        {% if test.description %}
            <div>
                <strong>Description :</strong>
                <p class=\"mt-2 mb-0\">{{ test.description }}</p>
            </div>
        {% endif %}
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
                        <span class=\"badge badge-primary me-2\">Q{{ loop.index }}</span>
                        {{ item.question.questionText }}
                    </h5>

                    {% if item.answers|length > 0 %}
                        {% for answer in item.answers %}
                            <div class=\"answer-item\">
                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <div>
                                        <span class=\"badge badge-secondary me-2\">{{ answer.answerLabel }}</span>
                                        {{ answer.answerText }}
                                    </div>
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
{% endblock %}", "general_test/show.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/general_test/show.html.twig");
    }
}
