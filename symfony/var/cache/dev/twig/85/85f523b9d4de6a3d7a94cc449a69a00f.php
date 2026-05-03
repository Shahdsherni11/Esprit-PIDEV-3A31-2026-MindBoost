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

/* front_test/specific_test.html.twig */
class __TwigTemplate_ea3e7464fa618e33f5c7306f3d4b79ef extends Template
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
        return "front/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front_test/specific_test.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front_test/specific_test.html.twig"));

        $this->parent = $this->load("front/base.html.twig", 1);
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

        yield "Test Spécifique - MindBoost";
        
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
        yield "<style>
    .specific-hero {
        background: linear-gradient(135deg, rgba(37,99,235,0.10), rgba(20,184,166,0.08));
        border: 1px solid #d7e5ff;
        border-radius: 28px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .specific-hero h1 {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        margin: 0;
        font-size: 2.2rem;
        font-weight: 900;
        color: #17253a;
    }

    .specific-hero p {
        margin: 0.7rem 0 0;
        font-size: 1.03rem;
        color: #62738f;
    }

    .specific-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.55rem 1rem;
        border-radius: 999px;
        background: rgba(37,99,235,0.12);
        color: #2563eb;
        font-weight: 800;
        margin-top: 0.8rem;
    }

    .specific-stack {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

    .question-card {
        background: linear-gradient(180deg, #ffffff 0%, #f9fbff 100%);
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        box-shadow: 0 14px 30px rgba(23,37,84,0.06);
        overflow: hidden;
    }

    .question-card-header {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding: 1rem 1.2rem;
        font-weight: 800;
        color: #1f3352;
        background: linear-gradient(90deg, rgba(37,99,235,0.08), rgba(6,182,212,0.08));
        border-bottom: 1px solid #e2ebfb;
    }

    .question-card-body {
        padding: 1.3rem;
    }

    .question-title {
        font-size: 1.16rem;
        line-height: 1.5;
        font-weight: 800;
        color: #17253a;
        margin-bottom: 1rem;
    }

    .answer-option {
        display: block;
        background: #f8fbff;
        border: 1px solid #d8e5fb;
        border-radius: 18px;
        padding: 0.95rem 1rem;
        margin-bottom: 0.85rem;
        transition: all 0.22s ease;
        cursor: pointer;
    }

    .answer-option:hover {
        background: #f0f6ff;
        border-color: #8bb4ff;
        transform: translateY(-1px);
    }

    .form-check-input {
        transform: scale(1.12);
        accent-color: #2563eb;
    }
</style>

<div class=\"specific-hero\">
    <h1><i class=\"fas fa-layer-group\"></i>";
        // line 103
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 103, $this->source); })()), "title", [], "any", false, false, false, 103), "html", null, true);
        yield "</h1>
    <p>Répondez avec sincérité à chaque question pour obtenir un résultat fiable.</p>
    <div class=\"specific-badge\">
        <i class=\"fas fa-tag me-2\"></i>";
        // line 106
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 106, $this->source); })()), "category", [], "any", false, false, false, 106), "html", null, true);
        yield "
    </div>
</div>

<form method=\"POST\" action=\"";
        // line 110
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_specific_test_submit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 110, $this->source); })()), "id", [], "any", false, false, false, 110)]), "html", null, true);
        yield "\" id=\"specificTestForm\">
    <div class=\"specific-stack\">
        ";
        // line 112
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["questionsWithAnswers"]) || array_key_exists("questionsWithAnswers", $context) ? $context["questionsWithAnswers"] : (function () { throw new RuntimeError('Variable "questionsWithAnswers" does not exist.', 112, $this->source); })()));
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
            // line 113
            yield "            <div class=\"question-card\">
                <div class=\"question-card-header\">
                    <i class=\"fas fa-circle-question\"></i>
                    Question ";
            // line 116
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 116), "html", null, true);
            yield "
                </div>

                <div class=\"question-card-body\">
                    <div class=\"question-title\">";
            // line 120
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "question", [], "any", false, false, false, 120), "questionText", [], "any", false, false, false, 120), "html", null, true);
            yield "</div>

                    ";
            // line 122
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "answers", [], "any", false, false, false, 122));
            foreach ($context['_seq'] as $context["_key"] => $context["answer"]) {
                // line 123
                yield "                        <label class=\"answer-option\">
                            <div class=\"d-flex align-items-center\">
                                <input class=\"form-check-input me-3\"
                                       type=\"radio\"
                                       name=\"answers[";
                // line 127
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "question", [], "any", false, false, false, 127), "id", [], "any", false, false, false, 127), "html", null, true);
                yield "]\"
                                       value=\"";
                // line 128
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["answer"], "id", [], "any", false, false, false, 128), "html", null, true);
                yield "\"
                                       required>
                                <div>";
                // line 130
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["answer"], "answerText", [], "any", false, false, false, 130), "html", null, true);
                yield "</div>
                            </div>
                        </label>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['answer'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 134
            yield "                </div>
            </div>
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
        // line 137
        yield "    </div>

    <div class=\"d-flex justify-content-end mt-4\">
        <button type=\"submit\" class=\"btn btn-success\">
            <i class=\"fas fa-check me-2\"></i>Soumettre le test spécifique
        </button>
    </div>
</form>
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
        return "front_test/specific_test.html.twig";
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
        return array (  296 => 137,  280 => 134,  270 => 130,  265 => 128,  261 => 127,  255 => 123,  251 => 122,  246 => 120,  239 => 116,  234 => 113,  217 => 112,  212 => 110,  205 => 106,  199 => 103,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'front/base.html.twig' %}

{% block title %}Test Spécifique - MindBoost{% endblock %}

{% block content %}
<style>
    .specific-hero {
        background: linear-gradient(135deg, rgba(37,99,235,0.10), rgba(20,184,166,0.08));
        border: 1px solid #d7e5ff;
        border-radius: 28px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .specific-hero h1 {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        margin: 0;
        font-size: 2.2rem;
        font-weight: 900;
        color: #17253a;
    }

    .specific-hero p {
        margin: 0.7rem 0 0;
        font-size: 1.03rem;
        color: #62738f;
    }

    .specific-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.55rem 1rem;
        border-radius: 999px;
        background: rgba(37,99,235,0.12);
        color: #2563eb;
        font-weight: 800;
        margin-top: 0.8rem;
    }

    .specific-stack {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

    .question-card {
        background: linear-gradient(180deg, #ffffff 0%, #f9fbff 100%);
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        box-shadow: 0 14px 30px rgba(23,37,84,0.06);
        overflow: hidden;
    }

    .question-card-header {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding: 1rem 1.2rem;
        font-weight: 800;
        color: #1f3352;
        background: linear-gradient(90deg, rgba(37,99,235,0.08), rgba(6,182,212,0.08));
        border-bottom: 1px solid #e2ebfb;
    }

    .question-card-body {
        padding: 1.3rem;
    }

    .question-title {
        font-size: 1.16rem;
        line-height: 1.5;
        font-weight: 800;
        color: #17253a;
        margin-bottom: 1rem;
    }

    .answer-option {
        display: block;
        background: #f8fbff;
        border: 1px solid #d8e5fb;
        border-radius: 18px;
        padding: 0.95rem 1rem;
        margin-bottom: 0.85rem;
        transition: all 0.22s ease;
        cursor: pointer;
    }

    .answer-option:hover {
        background: #f0f6ff;
        border-color: #8bb4ff;
        transform: translateY(-1px);
    }

    .form-check-input {
        transform: scale(1.12);
        accent-color: #2563eb;
    }
</style>

<div class=\"specific-hero\">
    <h1><i class=\"fas fa-layer-group\"></i>{{ test.title }}</h1>
    <p>Répondez avec sincérité à chaque question pour obtenir un résultat fiable.</p>
    <div class=\"specific-badge\">
        <i class=\"fas fa-tag me-2\"></i>{{ test.category }}
    </div>
</div>

<form method=\"POST\" action=\"{{ path('front_specific_test_submit', {id: test.id}) }}\" id=\"specificTestForm\">
    <div class=\"specific-stack\">
        {% for item in questionsWithAnswers %}
            <div class=\"question-card\">
                <div class=\"question-card-header\">
                    <i class=\"fas fa-circle-question\"></i>
                    Question {{ loop.index }}
                </div>

                <div class=\"question-card-body\">
                    <div class=\"question-title\">{{ item.question.questionText }}</div>

                    {% for answer in item.answers %}
                        <label class=\"answer-option\">
                            <div class=\"d-flex align-items-center\">
                                <input class=\"form-check-input me-3\"
                                       type=\"radio\"
                                       name=\"answers[{{ item.question.id }}]\"
                                       value=\"{{ answer.id }}\"
                                       required>
                                <div>{{ answer.answerText }}</div>
                            </div>
                        </label>
                    {% endfor %}
                </div>
            </div>
        {% endfor %}
    </div>

    <div class=\"d-flex justify-content-end mt-4\">
        <button type=\"submit\" class=\"btn btn-success\">
            <i class=\"fas fa-check me-2\"></i>Soumettre le test spécifique
        </button>
    </div>
</form>
{% endblock %}", "front_test/specific_test.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/front_test/specific_test.html.twig");
    }
}
