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

/* specific_test/show.html.twig */
class __TwigTemplate_bb6b3933482e71dd9c037e152ffdea17 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "specific_test/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "specific_test/show.html.twig"));

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
        yield "<div class=\"page-heading d-flex flex-wrap justify-content-between align-items-start gap-3\">
    <div>
        <h1><i class=\"fas fa-layer-group me-2\"></i>";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 8, $this->source); })()), "title", [], "any", false, false, false, 8), "html", null, true);
        yield "</h1>
        <p>Détail du test spécifique.</p>
    </div>

    <div class=\"action-buttons\">
        <a href=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("specific_test_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 13, $this->source); })()), "id", [], "any", false, false, false, 13)]), "html", null, true);
        yield "\" class=\"btn btn-warning\">
            <i class=\"fas fa-edit\"></i> Éditer
        </a>
        <a href=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("specific_test_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 16, $this->source); })()), "id", [], "any", false, false, false, 16)]), "html", null, true);
        yield "\" class=\"btn btn-danger\">
            <i class=\"fas fa-trash\"></i> Supprimer
        </a>
        <a href=\"";
        // line 19
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("specific_test_index");
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
                <strong>Catégorie :</strong>
                <span class=\"badge badge-info\">";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 34, $this->source); })()), "category", [], "any", false, false, false, 34), "html", null, true);
        yield "</span>
            </div>
        </div>

        <div class=\"row mb-3\">
            <div class=\"col-md-6\"><strong>Test général parent :</strong> #";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 39, $this->source); })()), "generalTestId", [], "any", false, false, false, 39), "html", null, true);
        yield "</div>
            <div class=\"col-md-6\">
                <strong>Statut :</strong>
                <span class=\"badge badge-";
        // line 42
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 42, $this->source); })()), "status", [], "any", false, false, false, 42)), "html", null, true);
        yield "\">
                    ";
        // line 43
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 43, $this->source); })()), "status", [], "any", false, false, false, 43) == "DRAFT")) {
            // line 44
            yield "                        Brouillon
                    ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 45
(isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 45, $this->source); })()), "status", [], "any", false, false, false, 45) == "ACTIVE")) {
            // line 46
            yield "                        Actif
                    ";
        } else {
            // line 48
            yield "                        Inactif
                    ";
        }
        // line 50
        yield "                </span>
            </div>
        </div>

        <div class=\"row mb-3\">
            <div class=\"col-md-6\"><strong>Créé le :</strong> ";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 55, $this->source); })()), "createdAt", [], "any", false, false, false, 55), "d/m/Y H:i"), "html", null, true);
        yield "</div>
            <div class=\"col-md-6\"><strong>Créé par :</strong> Utilisateur #";
        // line 56
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 56, $this->source); })()), "createdBy", [], "any", false, false, false, 56), "html", null, true);
        yield "</div>
        </div>

        ";
        // line 59
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 59, $this->source); })()), "description", [], "any", false, false, false, 59)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 60
            yield "            <div>
                <strong>Description :</strong>
                <p class=\"mt-2 mb-0\">";
            // line 62
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 62, $this->source); })()), "description", [], "any", false, false, false, 62), "html", null, true);
            yield "</p>
            </div>
        ";
        }
        // line 65
        yield "    </div>
</div>

";
        // line 68
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["questionsWithAnswers"]) || array_key_exists("questionsWithAnswers", $context) ? $context["questionsWithAnswers"] : (function () { throw new RuntimeError('Variable "questionsWithAnswers" does not exist.', 68, $this->source); })())) > 0)) {
            // line 69
            yield "    <div class=\"card\">
        <div class=\"card-header\">
            <i class=\"fas fa-question-circle me-2\"></i>Questions (";
            // line 71
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["questionsWithAnswers"]) || array_key_exists("questionsWithAnswers", $context) ? $context["questionsWithAnswers"] : (function () { throw new RuntimeError('Variable "questionsWithAnswers" does not exist.', 71, $this->source); })())), "html", null, true);
            yield ")
        </div>
        <div class=\"card-body\">
            ";
            // line 74
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["questionsWithAnswers"]) || array_key_exists("questionsWithAnswers", $context) ? $context["questionsWithAnswers"] : (function () { throw new RuntimeError('Variable "questionsWithAnswers" does not exist.', 74, $this->source); })()));
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
                // line 75
                yield "                <div class=\"question-display mb-4\">
                    <h5 class=\"mb-3\">
                        <span class=\"badge badge-success me-2\">Q";
                // line 77
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 77), "html", null, true);
                yield "</span>
                        ";
                // line 78
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "question", [], "any", false, false, false, 78), "questionText", [], "any", false, false, false, 78), "html", null, true);
                yield "
                    </h5>

                    ";
                // line 81
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["item"], "answers", [], "any", false, false, false, 81)) > 0)) {
                    // line 82
                    yield "                        ";
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "answers", [], "any", false, false, false, 82));
                    foreach ($context['_seq'] as $context["_key"] => $context["answer"]) {
                        // line 83
                        yield "                            <div class=\"answer-item\">
                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <div>";
                        // line 85
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["answer"], "answerText", [], "any", false, false, false, 85), "html", null, true);
                        yield "</div>
                                    <span class=\"badge badge-info\">Score: ";
                        // line 86
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["answer"], "score", [], "any", false, false, false, 86), "html", null, true);
                        yield "</span>
                                </div>
                            </div>
                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['answer'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 90
                    yield "                    ";
                } else {
                    // line 91
                    yield "                        <p class=\"text-secondary mb-0\">Pas de réponses.</p>
                    ";
                }
                // line 93
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
            // line 95
            yield "        </div>
    </div>
";
        } else {
            // line 98
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
        return "specific_test/show.html.twig";
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
        return array (  308 => 98,  303 => 95,  288 => 93,  284 => 91,  281 => 90,  271 => 86,  267 => 85,  263 => 83,  258 => 82,  256 => 81,  250 => 78,  246 => 77,  242 => 75,  225 => 74,  219 => 71,  215 => 69,  213 => 68,  208 => 65,  202 => 62,  198 => 60,  196 => 59,  190 => 56,  186 => 55,  179 => 50,  175 => 48,  171 => 46,  169 => 45,  166 => 44,  164 => 43,  160 => 42,  154 => 39,  146 => 34,  140 => 31,  125 => 19,  119 => 16,  113 => 13,  105 => 8,  101 => 6,  88 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}{{ test.title }} - Tests Spécifiques{% endblock %}

{% block content %}
<div class=\"page-heading d-flex flex-wrap justify-content-between align-items-start gap-3\">
    <div>
        <h1><i class=\"fas fa-layer-group me-2\"></i>{{ test.title }}</h1>
        <p>Détail du test spécifique.</p>
    </div>

    <div class=\"action-buttons\">
        <a href=\"{{ path('specific_test_edit', {id: test.id}) }}\" class=\"btn btn-warning\">
            <i class=\"fas fa-edit\"></i> Éditer
        </a>
        <a href=\"{{ path('specific_test_delete', {id: test.id}) }}\" class=\"btn btn-danger\">
            <i class=\"fas fa-trash\"></i> Supprimer
        </a>
        <a href=\"{{ path('specific_test_index') }}\" class=\"btn btn-secondary\">
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
                <strong>Catégorie :</strong>
                <span class=\"badge badge-info\">{{ test.category }}</span>
            </div>
        </div>

        <div class=\"row mb-3\">
            <div class=\"col-md-6\"><strong>Test général parent :</strong> #{{ test.generalTestId }}</div>
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
            <div class=\"col-md-6\"><strong>Créé le :</strong> {{ test.createdAt|date('d/m/Y H:i') }}</div>
            <div class=\"col-md-6\"><strong>Créé par :</strong> Utilisateur #{{ test.createdBy }}</div>
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
{% endblock %}", "specific_test/show.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/specific_test/show.html.twig");
    }
}
