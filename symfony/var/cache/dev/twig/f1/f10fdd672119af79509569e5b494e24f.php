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

/* specific_test/index.html.twig */
class __TwigTemplate_244c530d95e27da3d0270ea65740a949 extends Template
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
            'page_title' => [$this, 'block_page_title'],
            'extra_css' => [$this, 'block_extra_css'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "specific_test/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "specific_test/index.html.twig"));

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

        yield "Tests Spécifiques — Admin MindBoost";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_title"));

        yield "Tests Spécifiques";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_extra_css(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "extra_css"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "extra_css"));

        // line 7
        yield "<style>
    .spec-test-list-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 1.25rem;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        transition: background .2s;
    }
    .spec-test-list-item:last-child { border-bottom: none; }
    .spec-test-list-item:hover { background: rgba(255,255,255,0.03); }

    .spec-test-icon {
        width: 42px;
        height: 42px;
        border-radius: 13px;
        background: linear-gradient(135deg, #29CC7A, #00D1C7);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        color: white;
        flex-shrink: 0;
    }

    .spec-test-title {
        font-weight: 700;
        font-size: .95rem;
        color: var(--text-main, #F4F7FC);
    }

    .spec-test-meta {
        display: flex;
        align-items: center;
        gap: .45rem;
        flex-wrap: wrap;
        margin-top: .3rem;
    }

    .category-pill {
        display: inline-block;
        padding: .2rem .6rem;
        border-radius: 999px;
        font-size: .75rem;
        font-weight: 700;
        background: rgba(25,181,254,0.18);
        color: #19B5FE;
        border: 1px solid rgba(25,181,254,0.25);
    }

    .date-pill {
        font-size: .75rem;
        color: #7E8DB1;
    }

    .desc-text {
        font-size: .78rem;
        color: #7E8DB1;
        font-style: italic;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 300px;
    }

    .action-group { display: flex; gap: .4rem; flex-shrink: 0; }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 76
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

        // line 77
        yield "
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <span class=\"text-muted\">";
        // line 79
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["specificCount"]) || array_key_exists("specificCount", $context) ? $context["specificCount"] : (function () { throw new RuntimeError('Variable "specificCount" does not exist.', 79, $this->source); })()), "html", null, true);
        yield " test(s) au total</span>
    <a href=\"";
        // line 80
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("specific_test_create");
        yield "\" class=\"btn btn-success btn-sm\">
        <i class=\"bi bi-plus-lg me-1\"></i>Nouveau Test
    </a>
</div>

<div class=\"card mb-4 p-3\">
    <form method=\"GET\" class=\"d-flex gap-2 flex-wrap align-items-end\">
        <input type=\"text\" name=\"search\" class=\"form-control form-control-sm\"
               placeholder=\"Rechercher par titre...\" value=\"";
        // line 88
        yield (((array_key_exists("search", $context) &&  !(null === $context["search"]))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["search"], "html", null, true)) : (""));
        yield "\" style=\"width:220px;\">
        <select name=\"category\" class=\"form-select form-select-sm\" style=\"width:200px;\">
            <option value=\"\">Toutes les catégories</option>
            <option value=\"Anxiete\"          ";
        // line 91
        if (((isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 91, $this->source); })()) == "Anxiete")) {
            yield "selected";
        }
        yield ">Anxiété</option>
            <option value=\"Stress\"           ";
        // line 92
        if (((isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 92, $this->source); })()) == "Stress")) {
            yield "selected";
        }
        yield ">Stress</option>
            <option value=\"Depression\"       ";
        // line 93
        if (((isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 93, $this->source); })()) == "Depression")) {
            yield "selected";
        }
        yield ">Dépression</option>
            <option value=\"Trouble du Sommeil\" ";
        // line 94
        if (((isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 94, $this->source); })()) == "Trouble du Sommeil")) {
            yield "selected";
        }
        yield ">Trouble du Sommeil</option>
        </select>
        <button type=\"submit\" class=\"btn btn-success btn-sm\"><i class=\"bi bi-search me-1\"></i>Rechercher</button>
    </form>
</div>

";
        // line 100
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["specificTests"]) || array_key_exists("specificTests", $context) ? $context["specificTests"] : (function () { throw new RuntimeError('Variable "specificTests" does not exist.', 100, $this->source); })())) == 0)) {
            // line 101
            yield "<div class=\"card p-5 text-center text-muted\">
    <i class=\"bi bi-inbox display-4\"></i>
    <p class=\"mt-2\">Aucun test spécifique trouvé.</p>
</div>
";
        } else {
            // line 106
            yield "<div class=\"card\">
    <div class=\"card-body p-0\">
        ";
            // line 108
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["specificTests"]) || array_key_exists("specificTests", $context) ? $context["specificTests"] : (function () { throw new RuntimeError('Variable "specificTests" does not exist.', 108, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["test"]) {
                // line 109
                yield "            <div class=\"spec-test-list-item\">
                <div class=\"spec-test-icon\">
                    <i class=\"bi bi-layers-fill\"></i>
                </div>

                <div class=\"flex-grow-1 min-width-0\">
                    <div class=\"spec-test-title\">";
                // line 115
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["test"], "title", [], "any", false, false, false, 115), "html", null, true);
                yield "</div>
                    <div class=\"spec-test-meta\">
                        ";
                // line 117
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["test"], "category", [], "any", false, false, false, 117)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 118
                    yield "                            <span class=\"category-pill\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["test"], "category", [], "any", false, false, false, 118), "html", null, true);
                    yield "</span>
                        ";
                }
                // line 120
                yield "                        <span class=\"date-pill\"><i class=\"bi bi-calendar3 me-1\"></i>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["test"], "createdAt", [], "any", false, false, false, 120), "d/m/Y"), "html", null, true);
                yield "</span>
                        ";
                // line 121
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["test"], "description", [], "any", false, false, false, 121)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 122
                    yield "                            <span class=\"desc-text\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["test"], "description", [], "any", false, false, false, 122), 0, 60), "html", null, true);
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["test"], "description", [], "any", false, false, false, 122)) > 60)) {
                        yield "…";
                    }
                    yield "</span>
                        ";
                }
                // line 124
                yield "                    </div>
                </div>

                <div class=\"action-group\">
                    <a href=\"";
                // line 128
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("specific_test_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["test"], "id", [], "any", false, false, false, 128)]), "html", null, true);
                yield "\"
                       class=\"btn btn-xs btn-outline-info\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Voir\">
                        <i class=\"bi bi-eye\"></i>
                    </a>
                    <a href=\"";
                // line 133
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("specific_test_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["test"], "id", [], "any", false, false, false, 133)]), "html", null, true);
                yield "\"
                       class=\"btn btn-xs btn-outline-secondary\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Modifier\">
                        <i class=\"bi bi-pencil\"></i>
                    </a>
                    <a href=\"";
                // line 138
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("specific_test_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["test"], "id", [], "any", false, false, false, 138)]), "html", null, true);
                yield "\"
                       class=\"btn btn-xs btn-outline-danger\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Supprimer\"
                       onclick=\"return confirm('Supprimer ce test ?')\">
                        <i class=\"bi bi-trash\"></i>
                    </a>
                </div>
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['test'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 147
            yield "    </div>
</div>

<div class=\"mt-4 d-flex justify-content-center\">
    ";
            // line 151
            yield $this->env->getRuntime('Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationRuntime')->render($this->env, (isset($context["specificTests"]) || array_key_exists("specificTests", $context) ? $context["specificTests"] : (function () { throw new RuntimeError('Variable "specificTests" does not exist.', 151, $this->source); })()));
            yield "
</div>
";
        }
        // line 154
        yield "
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
        return "specific_test/index.html.twig";
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
        return array (  373 => 154,  367 => 151,  361 => 147,  346 => 138,  338 => 133,  330 => 128,  324 => 124,  315 => 122,  313 => 121,  308 => 120,  302 => 118,  300 => 117,  295 => 115,  287 => 109,  283 => 108,  279 => 106,  272 => 101,  270 => 100,  259 => 94,  253 => 93,  247 => 92,  241 => 91,  235 => 88,  224 => 80,  220 => 79,  216 => 77,  203 => 76,  125 => 7,  112 => 6,  89 => 4,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}Tests Spécifiques — Admin MindBoost{% endblock %}
{% block page_title %}Tests Spécifiques{% endblock %}

{% block extra_css %}
<style>
    .spec-test-list-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 1.25rem;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        transition: background .2s;
    }
    .spec-test-list-item:last-child { border-bottom: none; }
    .spec-test-list-item:hover { background: rgba(255,255,255,0.03); }

    .spec-test-icon {
        width: 42px;
        height: 42px;
        border-radius: 13px;
        background: linear-gradient(135deg, #29CC7A, #00D1C7);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        color: white;
        flex-shrink: 0;
    }

    .spec-test-title {
        font-weight: 700;
        font-size: .95rem;
        color: var(--text-main, #F4F7FC);
    }

    .spec-test-meta {
        display: flex;
        align-items: center;
        gap: .45rem;
        flex-wrap: wrap;
        margin-top: .3rem;
    }

    .category-pill {
        display: inline-block;
        padding: .2rem .6rem;
        border-radius: 999px;
        font-size: .75rem;
        font-weight: 700;
        background: rgba(25,181,254,0.18);
        color: #19B5FE;
        border: 1px solid rgba(25,181,254,0.25);
    }

    .date-pill {
        font-size: .75rem;
        color: #7E8DB1;
    }

    .desc-text {
        font-size: .78rem;
        color: #7E8DB1;
        font-style: italic;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 300px;
    }

    .action-group { display: flex; gap: .4rem; flex-shrink: 0; }
</style>
{% endblock %}

{% block content %}

<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <span class=\"text-muted\">{{ specificCount }} test(s) au total</span>
    <a href=\"{{ path('specific_test_create') }}\" class=\"btn btn-success btn-sm\">
        <i class=\"bi bi-plus-lg me-1\"></i>Nouveau Test
    </a>
</div>

<div class=\"card mb-4 p-3\">
    <form method=\"GET\" class=\"d-flex gap-2 flex-wrap align-items-end\">
        <input type=\"text\" name=\"search\" class=\"form-control form-control-sm\"
               placeholder=\"Rechercher par titre...\" value=\"{{ search ?? '' }}\" style=\"width:220px;\">
        <select name=\"category\" class=\"form-select form-select-sm\" style=\"width:200px;\">
            <option value=\"\">Toutes les catégories</option>
            <option value=\"Anxiete\"          {% if category == 'Anxiete'          %}selected{% endif %}>Anxiété</option>
            <option value=\"Stress\"           {% if category == 'Stress'           %}selected{% endif %}>Stress</option>
            <option value=\"Depression\"       {% if category == 'Depression'       %}selected{% endif %}>Dépression</option>
            <option value=\"Trouble du Sommeil\" {% if category == 'Trouble du Sommeil' %}selected{% endif %}>Trouble du Sommeil</option>
        </select>
        <button type=\"submit\" class=\"btn btn-success btn-sm\"><i class=\"bi bi-search me-1\"></i>Rechercher</button>
    </form>
</div>

{% if specificTests|length == 0 %}
<div class=\"card p-5 text-center text-muted\">
    <i class=\"bi bi-inbox display-4\"></i>
    <p class=\"mt-2\">Aucun test spécifique trouvé.</p>
</div>
{% else %}
<div class=\"card\">
    <div class=\"card-body p-0\">
        {% for test in specificTests %}
            <div class=\"spec-test-list-item\">
                <div class=\"spec-test-icon\">
                    <i class=\"bi bi-layers-fill\"></i>
                </div>

                <div class=\"flex-grow-1 min-width-0\">
                    <div class=\"spec-test-title\">{{ test.title }}</div>
                    <div class=\"spec-test-meta\">
                        {% if test.category %}
                            <span class=\"category-pill\">{{ test.category }}</span>
                        {% endif %}
                        <span class=\"date-pill\"><i class=\"bi bi-calendar3 me-1\"></i>{{ test.createdAt|date('d/m/Y') }}</span>
                        {% if test.description %}
                            <span class=\"desc-text\">{{ test.description|slice(0, 60) }}{% if test.description|length > 60 %}…{% endif %}</span>
                        {% endif %}
                    </div>
                </div>

                <div class=\"action-group\">
                    <a href=\"{{ path('specific_test_show', {id: test.id}) }}\"
                       class=\"btn btn-xs btn-outline-info\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Voir\">
                        <i class=\"bi bi-eye\"></i>
                    </a>
                    <a href=\"{{ path('specific_test_edit', {id: test.id}) }}\"
                       class=\"btn btn-xs btn-outline-secondary\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Modifier\">
                        <i class=\"bi bi-pencil\"></i>
                    </a>
                    <a href=\"{{ path('specific_test_delete', {id: test.id}) }}\"
                       class=\"btn btn-xs btn-outline-danger\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Supprimer\"
                       onclick=\"return confirm('Supprimer ce test ?')\">
                        <i class=\"bi bi-trash\"></i>
                    </a>
                </div>
            </div>
        {% endfor %}
    </div>
</div>

<div class=\"mt-4 d-flex justify-content-center\">
    {{ knp_pagination_render(specificTests) }}
</div>
{% endif %}

{% endblock %}
", "specific_test/index.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/specific_test/index.html.twig");
    }
}
