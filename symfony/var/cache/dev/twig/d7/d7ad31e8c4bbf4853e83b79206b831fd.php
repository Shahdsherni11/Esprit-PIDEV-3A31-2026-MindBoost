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

/* general_test/index.html.twig */
class __TwigTemplate_50634b340783d366379e954e3084b57f extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "general_test/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "general_test/index.html.twig"));

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

        yield "Tests Généraux — Admin MindBoost";
        
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

        yield "Tests Généraux";
        
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
    .test-list-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 1.25rem;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        transition: background .2s;
    }
    .test-list-item:last-child { border-bottom: none; }
    .test-list-item:hover { background: rgba(255,255,255,0.03); }

    .test-icon {
        width: 42px;
        height: 42px;
        border-radius: 13px;
        background: linear-gradient(135deg, #2F6BFF, #19B5FE);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        color: white;
        flex-shrink: 0;
    }

    .test-title {
        font-weight: 700;
        font-size: .95rem;
        color: var(--text-main, #F4F7FC);
    }

    .test-meta {
        display: flex;
        align-items: center;
        gap: .45rem;
        flex-wrap: wrap;
        margin-top: .3rem;
    }

    .status-pill {
        display: inline-flex;
        align-items: center;
        gap: .25rem;
        border-radius: 999px;
        padding: .2rem .6rem;
        font-size: .75rem;
        font-weight: 700;
    }
    .status-active   { background: rgba(41,204,122,0.18);  color: #29CC7A; }
    .status-draft    { background: rgba(255,255,255,0.08);  color: #AAB6D3; }
    .status-inactive { background: rgba(255,90,116,0.15);   color: #FF5A74; }
    .status-archived { background: rgba(255,255,255,0.05);  color: #7E8DB1; }

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
        max-width: 320px;
    }

    .action-group { display: flex; gap: .4rem; flex-shrink: 0; }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 79
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

        // line 80
        yield "
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <span class=\"text-muted\">";
        // line 82
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["generalCount"]) || array_key_exists("generalCount", $context) ? $context["generalCount"] : (function () { throw new RuntimeError('Variable "generalCount" does not exist.', 82, $this->source); })()), "html", null, true);
        yield " test(s) au total</span>
    <div class=\"d-flex gap-2\">
        <a href=\"";
        // line 84
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_ai_tests");
        yield "\" class=\"btn btn-warning btn-sm\">
            <i class=\"bi bi-robot me-1\"></i>Gérer test IA
        </a>
        <a href=\"";
        // line 87
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("general_test_create");
        yield "\" class=\"btn btn-primary btn-sm\">
            <i class=\"bi bi-plus-lg me-1\"></i>Nouveau Test
        </a>
    </div>
</div>

<div class=\"card mb-4 p-3\">
    <form method=\"GET\" class=\"d-flex gap-2 flex-wrap align-items-end\">
        <input type=\"text\" name=\"search\" class=\"form-control form-control-sm\"
               placeholder=\"Rechercher par titre...\" value=\"";
        // line 96
        yield (((array_key_exists("search", $context) &&  !(null === $context["search"]))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["search"], "html", null, true)) : (""));
        yield "\" style=\"width:220px;\">
        <select name=\"sort\" class=\"form-select form-select-sm\" style=\"width:190px;\">
            <option value=\"date_desc\"  ";
        // line 98
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 98, $this->source); })()) == "date_desc")) {
            yield "selected";
        }
        yield ">Date - Plus récent</option>
            <option value=\"date_asc\"   ";
        // line 99
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 99, $this->source); })()) == "date_asc")) {
            yield "selected";
        }
        yield ">Date - Plus ancien</option>
            <option value=\"title_asc\"  ";
        // line 100
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 100, $this->source); })()) == "title_asc")) {
            yield "selected";
        }
        yield ">Titre A-Z</option>
            <option value=\"title_desc\" ";
        // line 101
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 101, $this->source); })()) == "title_desc")) {
            yield "selected";
        }
        yield ">Titre Z-A</option>
        </select>
        <button type=\"submit\" class=\"btn btn-primary btn-sm\"><i class=\"bi bi-search me-1\"></i>Appliquer</button>
    </form>
</div>

";
        // line 107
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["generalTests"]) || array_key_exists("generalTests", $context) ? $context["generalTests"] : (function () { throw new RuntimeError('Variable "generalTests" does not exist.', 107, $this->source); })())) == 0)) {
            // line 108
            yield "<div class=\"card p-5 text-center text-muted\">
    <i class=\"bi bi-inbox display-4\"></i>
    <p class=\"mt-2\">Aucun test trouvé.</p>
</div>
";
        } else {
            // line 113
            yield "<div class=\"card\">
    <div class=\"card-body p-0\">
        ";
            // line 115
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["generalTests"]) || array_key_exists("generalTests", $context) ? $context["generalTests"] : (function () { throw new RuntimeError('Variable "generalTests" does not exist.', 115, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["test"]) {
                // line 116
                yield "            <div class=\"test-list-item\">
                <div class=\"test-icon\">
                    <i class=\"bi bi-journal-bookmark-fill\"></i>
                </div>

                <div class=\"flex-grow-1 min-width-0\">
                    <div class=\"test-title\">";
                // line 122
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["test"], "title", [], "any", false, false, false, 122), "html", null, true);
                yield "</div>
                    <div class=\"test-meta\">
                        ";
                // line 124
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["test"], "status", [], "any", false, false, false, 124) == "ACTIVE")) {
                    // line 125
                    yield "                            <span class=\"status-pill status-active\"><i class=\"bi bi-check-circle-fill\"></i>Actif</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 126
$context["test"], "status", [], "any", false, false, false, 126) == "DRAFT")) {
                    // line 127
                    yield "                            <span class=\"status-pill status-draft\"><i class=\"bi bi-pencil-square\"></i>Brouillon</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 128
$context["test"], "status", [], "any", false, false, false, 128) == "INACTIVE")) {
                    // line 129
                    yield "                            <span class=\"status-pill status-inactive\"><i class=\"bi bi-x-circle-fill\"></i>Inactif</span>
                        ";
                } else {
                    // line 131
                    yield "                            <span class=\"status-pill status-archived\"><i class=\"bi bi-archive-fill\"></i>Archivé</span>
                        ";
                }
                // line 133
                yield "                        <span class=\"date-pill\"><i class=\"bi bi-calendar3 me-1\"></i>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["test"], "createdAt", [], "any", false, false, false, 133), "d/m/Y"), "html", null, true);
                yield "</span>
                        ";
                // line 134
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["test"], "description", [], "any", false, false, false, 134)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 135
                    yield "                            <span class=\"desc-text\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["test"], "description", [], "any", false, false, false, 135), 0, 65), "html", null, true);
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["test"], "description", [], "any", false, false, false, 135)) > 65)) {
                        yield "…";
                    }
                    yield "</span>
                        ";
                }
                // line 137
                yield "                    </div>
                </div>

                <div class=\"action-group\">
                    <a href=\"";
                // line 141
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("general_test_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["test"], "id", [], "any", false, false, false, 141)]), "html", null, true);
                yield "\"
                       class=\"btn btn-xs btn-outline-info\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Voir\">
                        <i class=\"bi bi-eye\"></i>
                    </a>
                    <a href=\"";
                // line 146
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("general_test_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["test"], "id", [], "any", false, false, false, 146)]), "html", null, true);
                yield "\"
                       class=\"btn btn-xs btn-outline-secondary\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Modifier\">
                        <i class=\"bi bi-pencil\"></i>
                    </a>
                    <a href=\"";
                // line 151
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("general_test_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["test"], "id", [], "any", false, false, false, 151)]), "html", null, true);
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
            // line 160
            yield "    </div>
</div>

<div class=\"mt-4 d-flex justify-content-center\">
    ";
            // line 164
            yield $this->env->getRuntime('Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationRuntime')->render($this->env, (isset($context["generalTests"]) || array_key_exists("generalTests", $context) ? $context["generalTests"] : (function () { throw new RuntimeError('Variable "generalTests" does not exist.', 164, $this->source); })()));
            yield "
</div>
";
        }
        // line 167
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
        return "general_test/index.html.twig";
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
        return array (  395 => 167,  389 => 164,  383 => 160,  368 => 151,  360 => 146,  352 => 141,  346 => 137,  337 => 135,  335 => 134,  330 => 133,  326 => 131,  322 => 129,  320 => 128,  317 => 127,  315 => 126,  312 => 125,  310 => 124,  305 => 122,  297 => 116,  293 => 115,  289 => 113,  282 => 108,  280 => 107,  269 => 101,  263 => 100,  257 => 99,  251 => 98,  246 => 96,  234 => 87,  228 => 84,  223 => 82,  219 => 80,  206 => 79,  125 => 7,  112 => 6,  89 => 4,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}Tests Généraux — Admin MindBoost{% endblock %}
{% block page_title %}Tests Généraux{% endblock %}

{% block extra_css %}
<style>
    .test-list-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 1.25rem;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        transition: background .2s;
    }
    .test-list-item:last-child { border-bottom: none; }
    .test-list-item:hover { background: rgba(255,255,255,0.03); }

    .test-icon {
        width: 42px;
        height: 42px;
        border-radius: 13px;
        background: linear-gradient(135deg, #2F6BFF, #19B5FE);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        color: white;
        flex-shrink: 0;
    }

    .test-title {
        font-weight: 700;
        font-size: .95rem;
        color: var(--text-main, #F4F7FC);
    }

    .test-meta {
        display: flex;
        align-items: center;
        gap: .45rem;
        flex-wrap: wrap;
        margin-top: .3rem;
    }

    .status-pill {
        display: inline-flex;
        align-items: center;
        gap: .25rem;
        border-radius: 999px;
        padding: .2rem .6rem;
        font-size: .75rem;
        font-weight: 700;
    }
    .status-active   { background: rgba(41,204,122,0.18);  color: #29CC7A; }
    .status-draft    { background: rgba(255,255,255,0.08);  color: #AAB6D3; }
    .status-inactive { background: rgba(255,90,116,0.15);   color: #FF5A74; }
    .status-archived { background: rgba(255,255,255,0.05);  color: #7E8DB1; }

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
        max-width: 320px;
    }

    .action-group { display: flex; gap: .4rem; flex-shrink: 0; }
</style>
{% endblock %}

{% block content %}

<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <span class=\"text-muted\">{{ generalCount }} test(s) au total</span>
    <div class=\"d-flex gap-2\">
        <a href=\"{{ path('admin_ai_tests') }}\" class=\"btn btn-warning btn-sm\">
            <i class=\"bi bi-robot me-1\"></i>Gérer test IA
        </a>
        <a href=\"{{ path('general_test_create') }}\" class=\"btn btn-primary btn-sm\">
            <i class=\"bi bi-plus-lg me-1\"></i>Nouveau Test
        </a>
    </div>
</div>

<div class=\"card mb-4 p-3\">
    <form method=\"GET\" class=\"d-flex gap-2 flex-wrap align-items-end\">
        <input type=\"text\" name=\"search\" class=\"form-control form-control-sm\"
               placeholder=\"Rechercher par titre...\" value=\"{{ search ?? '' }}\" style=\"width:220px;\">
        <select name=\"sort\" class=\"form-select form-select-sm\" style=\"width:190px;\">
            <option value=\"date_desc\"  {% if sort == 'date_desc'  %}selected{% endif %}>Date - Plus récent</option>
            <option value=\"date_asc\"   {% if sort == 'date_asc'   %}selected{% endif %}>Date - Plus ancien</option>
            <option value=\"title_asc\"  {% if sort == 'title_asc'  %}selected{% endif %}>Titre A-Z</option>
            <option value=\"title_desc\" {% if sort == 'title_desc' %}selected{% endif %}>Titre Z-A</option>
        </select>
        <button type=\"submit\" class=\"btn btn-primary btn-sm\"><i class=\"bi bi-search me-1\"></i>Appliquer</button>
    </form>
</div>

{% if generalTests|length == 0 %}
<div class=\"card p-5 text-center text-muted\">
    <i class=\"bi bi-inbox display-4\"></i>
    <p class=\"mt-2\">Aucun test trouvé.</p>
</div>
{% else %}
<div class=\"card\">
    <div class=\"card-body p-0\">
        {% for test in generalTests %}
            <div class=\"test-list-item\">
                <div class=\"test-icon\">
                    <i class=\"bi bi-journal-bookmark-fill\"></i>
                </div>

                <div class=\"flex-grow-1 min-width-0\">
                    <div class=\"test-title\">{{ test.title }}</div>
                    <div class=\"test-meta\">
                        {% if test.status == 'ACTIVE' %}
                            <span class=\"status-pill status-active\"><i class=\"bi bi-check-circle-fill\"></i>Actif</span>
                        {% elseif test.status == 'DRAFT' %}
                            <span class=\"status-pill status-draft\"><i class=\"bi bi-pencil-square\"></i>Brouillon</span>
                        {% elseif test.status == 'INACTIVE' %}
                            <span class=\"status-pill status-inactive\"><i class=\"bi bi-x-circle-fill\"></i>Inactif</span>
                        {% else %}
                            <span class=\"status-pill status-archived\"><i class=\"bi bi-archive-fill\"></i>Archivé</span>
                        {% endif %}
                        <span class=\"date-pill\"><i class=\"bi bi-calendar3 me-1\"></i>{{ test.createdAt|date('d/m/Y') }}</span>
                        {% if test.description %}
                            <span class=\"desc-text\">{{ test.description|slice(0, 65) }}{% if test.description|length > 65 %}…{% endif %}</span>
                        {% endif %}
                    </div>
                </div>

                <div class=\"action-group\">
                    <a href=\"{{ path('general_test_show', {id: test.id}) }}\"
                       class=\"btn btn-xs btn-outline-info\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Voir\">
                        <i class=\"bi bi-eye\"></i>
                    </a>
                    <a href=\"{{ path('general_test_edit', {id: test.id}) }}\"
                       class=\"btn btn-xs btn-outline-secondary\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Modifier\">
                        <i class=\"bi bi-pencil\"></i>
                    </a>
                    <a href=\"{{ path('general_test_delete', {id: test.id}) }}\"
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
    {{ knp_pagination_render(generalTests) }}
</div>
{% endif %}

{% endblock %}
", "general_test/index.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/general_test/index.html.twig");
    }
}
