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

/* front_test/general_test.html.twig */
class __TwigTemplate_4e3d6743631ac3da5a4d55be191e144d extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front_test/general_test.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front_test/general_test.html.twig"));

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

        yield "Test Général - MindBoost";
        
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
    .test-hero {
        background: linear-gradient(135deg, rgba(37,99,235,0.10), rgba(20,184,166,0.08));
        border: 1px solid #d7e5ff;
        border-radius: 28px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .test-hero h1 {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        margin: 0;
        font-size: 2.2rem;
        font-weight: 900;
        color: #17253a;
    }

    .test-hero p {
        margin: 0.7rem 0 0;
        font-size: 1.03rem;
        color: #62738f;
    }

    .questions-stack {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

    .question-card-ui {
        background: linear-gradient(180deg, #ffffff 0%, #f9fbff 100%);
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        box-shadow: 0 14px 30px rgba(23,37,84,0.06);
        overflow: hidden;
    }

    .question-card-head {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding: 1rem 1.2rem;
        background: linear-gradient(90deg, rgba(37,99,235,0.08), rgba(6,182,212,0.08));
        border-bottom: 1px solid #e2ebfb;
    }

    .question-icon {
        width: 42px;
        height: 42px;
        border-radius: 14px;
        background: linear-gradient(135deg, #2563eb, #06b6d4);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        box-shadow: 0 10px 20px rgba(37,99,235,0.18);
    }

    .question-label {
        font-size: 0.88rem;
        color: #5f708d;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.06em;
    }

    .question-body-ui {
        padding: 1.3rem;
    }

    .question-text-ui {
        font-size: 1.18rem;
        line-height: 1.5;
        font-weight: 800;
        color: #17253a;
        margin-bottom: 1rem;
    }

    .answers-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.9rem;
    }

    .answer-choice {
        position: relative;
    }

    .answer-choice input[type=\"radio\"] {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .answer-pill {
        display: flex;
        align-items: center;
        gap: 0.85rem;
        width: 100%;
        padding: 1rem 1rem;
        border-radius: 18px;
        border: 1px solid #d8e5fb;
        background: #f8fbff;
        cursor: pointer;
        transition: all 0.22s ease;
        min-height: 72px;
    }

    .answer-pill:hover {
        border-color: #8bb4ff;
        background: #f0f6ff;
        transform: translateY(-1px);
    }

    .answer-marker {
        width: 22px;
        height: 22px;
        border-radius: 50%;
        border: 2px solid #9cb9ea;
        background: white;
        flex-shrink: 0;
        position: relative;
        transition: all 0.22s ease;
    }

    .answer-marker::after {
        content: \"\";
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: transparent;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        transition: all 0.22s ease;
    }

    .answer-code {
        width: 30px;
        height: 30px;
        border-radius: 10px;
        background: linear-gradient(135deg, #eaf2ff, #f4f8ff);
        color: #2563eb;
        font-weight: 900;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .answer-text-ui {
        font-size: 1rem;
        font-weight: 700;
        color: #23344e;
    }

    .answer-choice input[type=\"radio\"]:checked + .answer-pill {
        background: linear-gradient(135deg, rgba(37,99,235,0.12), rgba(20,184,166,0.10));
        border-color: #4d86ff;
        box-shadow: 0 10px 24px rgba(37,99,235,0.12);
    }

    .answer-choice input[type=\"radio\"]:checked + .answer-pill .answer-marker {
        border-color: #2563eb;
    }

    .answer-choice input[type=\"radio\"]:checked + .answer-pill .answer-marker::after {
        background: #2563eb;
    }

    .submit-bar {
        margin-top: 1.6rem;
        display: flex;
        justify-content: flex-end;
    }

    .submit-bar .btn {
        min-width: 240px;
        font-size: 1.02rem;
    }

    @media (max-width: 768px) {
        .answers-grid {
            grid-template-columns: 1fr;
        }

        .test-hero h1 {
            font-size: 1.8rem;
        }

        .question-text-ui {
            font-size: 1.05rem;
        }

        .submit-bar {
            justify-content: stretch;
        }

        .submit-bar .btn {
            width: 100%;
        }
    }
</style>

<div class=\"test-hero\">
    <h1>
        <i class=\"fas fa-book-open\"></i>
        ";
        // line 217
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 217, $this->source); })()), "title", [], "any", false, false, false, 217), "html", null, true);
        yield "
    </h1>
    <p>
        Répondez avec attention à chaque question pour obtenir un résultat plus précis et cohérent.
    </p>
</div>

<form method=\"POST\" action=\"";
        // line 224
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_general_test_submit");
        yield "\">
    <div class=\"questions-stack\">
        ";
        // line 226
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["questionsWithAnswers"]) || array_key_exists("questionsWithAnswers", $context) ? $context["questionsWithAnswers"] : (function () { throw new RuntimeError('Variable "questionsWithAnswers" does not exist.', 226, $this->source); })()));
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
            // line 227
            yield "            ";
            $context["question"] = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "question", [], "any", false, false, false, 227);
            // line 228
            yield "            ";
            $context["answers"] = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "answers", [], "any", false, false, false, 228);
            // line 229
            yield "
            <div class=\"question-card-ui\">
                <div class=\"question-card-head\">
                    <div class=\"question-icon\">
                        <i class=\"fas fa-circle-question\"></i>
                    </div>
                    <div>
                        <div class=\"question-label\">Question ";
            // line 236
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 236), "html", null, true);
            yield "</div>
                    </div>
                </div>

                <div class=\"question-body-ui\">
                    <div class=\"question-text-ui\">
                        ";
            // line 242
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 242, $this->source); })()), "questionText", [], "any", false, false, false, 242), "html", null, true);
            yield "
                    </div>

                    <div class=\"answers-grid\">
                        ";
            // line 246
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["answers"]) || array_key_exists("answers", $context) ? $context["answers"] : (function () { throw new RuntimeError('Variable "answers" does not exist.', 246, $this->source); })()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["answer"]) {
                // line 247
                yield "                            <div class=\"answer-choice\">
                                <input
                                    type=\"radio\"
                                    id=\"answer_";
                // line 250
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["answer"], "id", [], "any", false, false, false, 250), "html", null, true);
                yield "\"
                                    name=\"answers[";
                // line 251
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 251, $this->source); })()), "id", [], "any", false, false, false, 251), "html", null, true);
                yield "]\"
                                    value=\"";
                // line 252
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["answer"], "id", [], "any", false, false, false, 252), "html", null, true);
                yield "\"
                                    required
                                >
                                <label class=\"answer-pill\" for=\"answer_";
                // line 255
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["answer"], "id", [], "any", false, false, false, 255), "html", null, true);
                yield "\">
                                    <span class=\"answer-marker\"></span>
                                    <span class=\"answer-code\">";
                // line 257
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["answer"], "answerLabel", [], "any", true, true, false, 257) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["answer"], "answerLabel", [], "any", false, false, false, 257)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["answer"], "answerLabel", [], "any", false, false, false, 257), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 257), "html", null, true)));
                yield "</span>
                                    <span class=\"answer-text-ui\">";
                // line 258
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["answer"], "answerText", [], "any", false, false, false, 258), "html", null, true);
                yield "</span>
                                </label>
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
            unset($context['_seq'], $context['_key'], $context['answer'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 262
            yield "                    </div>
                </div>
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
        // line 266
        yield "    </div>

    <div class=\"submit-bar\">
        <button type=\"submit\" class=\"btn btn-primary\">
            <i class=\"fas fa-check me-2\"></i>Soumettre le test général
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
        return "front_test/general_test.html.twig";
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
        return array (  456 => 266,  439 => 262,  421 => 258,  417 => 257,  412 => 255,  406 => 252,  402 => 251,  398 => 250,  393 => 247,  376 => 246,  369 => 242,  360 => 236,  351 => 229,  348 => 228,  345 => 227,  328 => 226,  323 => 224,  313 => 217,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'front/base.html.twig' %}

{% block title %}Test Général - MindBoost{% endblock %}

{% block content %}
<style>
    .test-hero {
        background: linear-gradient(135deg, rgba(37,99,235,0.10), rgba(20,184,166,0.08));
        border: 1px solid #d7e5ff;
        border-radius: 28px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .test-hero h1 {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        margin: 0;
        font-size: 2.2rem;
        font-weight: 900;
        color: #17253a;
    }

    .test-hero p {
        margin: 0.7rem 0 0;
        font-size: 1.03rem;
        color: #62738f;
    }

    .questions-stack {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

    .question-card-ui {
        background: linear-gradient(180deg, #ffffff 0%, #f9fbff 100%);
        border: 1px solid #dbe7ff;
        border-radius: 24px;
        box-shadow: 0 14px 30px rgba(23,37,84,0.06);
        overflow: hidden;
    }

    .question-card-head {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding: 1rem 1.2rem;
        background: linear-gradient(90deg, rgba(37,99,235,0.08), rgba(6,182,212,0.08));
        border-bottom: 1px solid #e2ebfb;
    }

    .question-icon {
        width: 42px;
        height: 42px;
        border-radius: 14px;
        background: linear-gradient(135deg, #2563eb, #06b6d4);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        box-shadow: 0 10px 20px rgba(37,99,235,0.18);
    }

    .question-label {
        font-size: 0.88rem;
        color: #5f708d;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.06em;
    }

    .question-body-ui {
        padding: 1.3rem;
    }

    .question-text-ui {
        font-size: 1.18rem;
        line-height: 1.5;
        font-weight: 800;
        color: #17253a;
        margin-bottom: 1rem;
    }

    .answers-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.9rem;
    }

    .answer-choice {
        position: relative;
    }

    .answer-choice input[type=\"radio\"] {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .answer-pill {
        display: flex;
        align-items: center;
        gap: 0.85rem;
        width: 100%;
        padding: 1rem 1rem;
        border-radius: 18px;
        border: 1px solid #d8e5fb;
        background: #f8fbff;
        cursor: pointer;
        transition: all 0.22s ease;
        min-height: 72px;
    }

    .answer-pill:hover {
        border-color: #8bb4ff;
        background: #f0f6ff;
        transform: translateY(-1px);
    }

    .answer-marker {
        width: 22px;
        height: 22px;
        border-radius: 50%;
        border: 2px solid #9cb9ea;
        background: white;
        flex-shrink: 0;
        position: relative;
        transition: all 0.22s ease;
    }

    .answer-marker::after {
        content: \"\";
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: transparent;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        transition: all 0.22s ease;
    }

    .answer-code {
        width: 30px;
        height: 30px;
        border-radius: 10px;
        background: linear-gradient(135deg, #eaf2ff, #f4f8ff);
        color: #2563eb;
        font-weight: 900;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .answer-text-ui {
        font-size: 1rem;
        font-weight: 700;
        color: #23344e;
    }

    .answer-choice input[type=\"radio\"]:checked + .answer-pill {
        background: linear-gradient(135deg, rgba(37,99,235,0.12), rgba(20,184,166,0.10));
        border-color: #4d86ff;
        box-shadow: 0 10px 24px rgba(37,99,235,0.12);
    }

    .answer-choice input[type=\"radio\"]:checked + .answer-pill .answer-marker {
        border-color: #2563eb;
    }

    .answer-choice input[type=\"radio\"]:checked + .answer-pill .answer-marker::after {
        background: #2563eb;
    }

    .submit-bar {
        margin-top: 1.6rem;
        display: flex;
        justify-content: flex-end;
    }

    .submit-bar .btn {
        min-width: 240px;
        font-size: 1.02rem;
    }

    @media (max-width: 768px) {
        .answers-grid {
            grid-template-columns: 1fr;
        }

        .test-hero h1 {
            font-size: 1.8rem;
        }

        .question-text-ui {
            font-size: 1.05rem;
        }

        .submit-bar {
            justify-content: stretch;
        }

        .submit-bar .btn {
            width: 100%;
        }
    }
</style>

<div class=\"test-hero\">
    <h1>
        <i class=\"fas fa-book-open\"></i>
        {{ test.title }}
    </h1>
    <p>
        Répondez avec attention à chaque question pour obtenir un résultat plus précis et cohérent.
    </p>
</div>

<form method=\"POST\" action=\"{{ path('front_general_test_submit') }}\">
    <div class=\"questions-stack\">
        {% for item in questionsWithAnswers %}
            {% set question = item.question %}
            {% set answers = item.answers %}

            <div class=\"question-card-ui\">
                <div class=\"question-card-head\">
                    <div class=\"question-icon\">
                        <i class=\"fas fa-circle-question\"></i>
                    </div>
                    <div>
                        <div class=\"question-label\">Question {{ loop.index }}</div>
                    </div>
                </div>

                <div class=\"question-body-ui\">
                    <div class=\"question-text-ui\">
                        {{ question.questionText }}
                    </div>

                    <div class=\"answers-grid\">
                        {% for answer in answers %}
                            <div class=\"answer-choice\">
                                <input
                                    type=\"radio\"
                                    id=\"answer_{{ answer.id }}\"
                                    name=\"answers[{{ question.id }}]\"
                                    value=\"{{ answer.id }}\"
                                    required
                                >
                                <label class=\"answer-pill\" for=\"answer_{{ answer.id }}\">
                                    <span class=\"answer-marker\"></span>
                                    <span class=\"answer-code\">{{ answer.answerLabel ?? loop.index }}</span>
                                    <span class=\"answer-text-ui\">{{ answer.answerText }}</span>
                                </label>
                            </div>
                        {% endfor %}
                    </div>
                </div>
            </div>
        {% endfor %}
    </div>

    <div class=\"submit-bar\">
        <button type=\"submit\" class=\"btn btn-primary\">
            <i class=\"fas fa-check me-2\"></i>Soumettre le test général
        </button>
    </div>
</form>
{% endblock %}", "front_test/general_test.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/front_test/general_test.html.twig");
    }
}
