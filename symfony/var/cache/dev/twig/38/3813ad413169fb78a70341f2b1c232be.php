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

/* back/saves/index.html.twig */
class __TwigTemplate_0480d64fa3d808e174253392a4d0389a extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/saves/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/saves/index.html.twig"));

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

        yield "Manage Saves — Admin MindBoost";
        
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

        yield "Manage Saves";
        
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
    .saves-list-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 1.25rem;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        transition: background .2s;
    }
    .saves-list-item:last-child { border-bottom: none; }
    .saves-list-item:hover { background: rgba(255,255,255,0.03); }

    .save-icon {
        width: 42px;
        height: 42px;
        border-radius: 13px;
        background: linear-gradient(135deg, #19B5FE, #00D1C7);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        color: white;
        flex-shrink: 0;
    }

    .save-post-link {
        font-weight: 700;
        font-size: .95rem;
        color: var(--text-main, #F4F7FC);
        text-decoration: none;
    }
    .save-post-link:hover { color: #19B5FE; }

    .save-meta {
        display: flex;
        align-items: center;
        gap: .45rem;
        flex-wrap: wrap;
        margin-top: .3rem;
    }

    .user-pill {
        display: inline-flex;
        align-items: center;
        gap: .25rem;
        font-size: .75rem;
        font-weight: 700;
        background: rgba(255,255,255,0.06);
        color: #AAB6D3;
        border-radius: 999px;
        padding: .2rem .55rem;
    }

    .desc-pill {
        font-size: .78rem;
        color: #7E8DB1;
        font-style: italic;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 260px;
    }

    .action-group { display: flex; gap: .4rem; flex-shrink: 0; }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 74
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

        // line 75
        yield "<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <span class=\"text-muted\">";
        // line 76
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["saves"]) || array_key_exists("saves", $context) ? $context["saves"] : (function () { throw new RuntimeError('Variable "saves" does not exist.', 76, $this->source); })())), "html", null, true);
        yield " save(s) total</span>
    <a href=\"";
        // line 77
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_saves_new");
        yield "\" class=\"btn btn-info text-white btn-sm\">
        <i class=\"bi bi-plus-lg me-1\"></i>New Save
    </a>
</div>

";
        // line 82
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["saves"]) || array_key_exists("saves", $context) ? $context["saves"] : (function () { throw new RuntimeError('Variable "saves" does not exist.', 82, $this->source); })()))) {
            // line 83
            yield "<div class=\"card p-5 text-center text-muted\">
    <i class=\"bi bi-bookmark display-4\"></i>
    <p class=\"mt-2\">No saves yet.</p>
</div>
";
        } else {
            // line 88
            yield "<div class=\"card\">
    <div class=\"card-body p-0\">
        ";
            // line 90
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["saves"]) || array_key_exists("saves", $context) ? $context["saves"] : (function () { throw new RuntimeError('Variable "saves" does not exist.', 90, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["save"]) {
                // line 91
                yield "            <div class=\"saves-list-item\">
                <div class=\"save-icon\">
                    <i class=\"bi bi-bookmark-fill\"></i>
                </div>

                <div class=\"flex-grow-1 min-width-0\">
                    <a href=\"";
                // line 97
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_post_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["save"], "postId", [], "any", false, false, false, 97)]), "html", null, true);
                yield "\"
                       class=\"save-post-link\" target=\"_blank\">
                        Post #";
                // line 99
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["save"], "postId", [], "any", false, false, false, 99), "html", null, true);
                yield "
                    </a>
                    <div class=\"save-meta\">
                        <span class=\"user-pill\">
                            <i class=\"bi bi-person-fill\"></i>User #";
                // line 103
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["save"], "userId", [], "any", false, false, false, 103), "html", null, true);
                yield "
                        </span>
                        ";
                // line 105
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["save"], "description", [], "any", false, false, false, 105)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 106
                    yield "                            <span class=\"desc-pill\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["save"], "description", [], "any", false, false, false, 106), 0, 80), "html", null, true);
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["save"], "description", [], "any", false, false, false, 106)) > 80)) {
                        yield "…";
                    }
                    yield "</span>
                        ";
                }
                // line 108
                yield "                    </div>
                </div>

                <div class=\"action-group\">
                    <a href=\"";
                // line 112
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_saves_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["save"], "id", [], "any", false, false, false, 112)]), "html", null, true);
                yield "\"
                       class=\"btn btn-xs btn-outline-secondary\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Edit\">
                        <i class=\"bi bi-pencil\"></i>
                    </a>
                    <form method=\"post\" action=\"";
                // line 117
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_saves_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["save"], "id", [], "any", false, false, false, 117)]), "html", null, true);
                yield "\"
                          onsubmit=\"return confirm('Remove this save?')\">
                        <input type=\"hidden\" name=\"_token\" value=\"";
                // line 119
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete_save" . CoreExtension::getAttribute($this->env, $this->source, $context["save"], "id", [], "any", false, false, false, 119))), "html", null, true);
                yield "\">
                        <button class=\"btn btn-xs btn-outline-danger\"
                                style=\"font-size:.75rem;padding:3px 9px;\" title=\"Delete\">
                            <i class=\"bi bi-trash\"></i>
                        </button>
                    </form>
                </div>
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['save'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 128
            yield "    </div>
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
        return "back/saves/index.html.twig";
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
        return array (  316 => 128,  301 => 119,  296 => 117,  288 => 112,  282 => 108,  273 => 106,  271 => 105,  266 => 103,  259 => 99,  254 => 97,  246 => 91,  242 => 90,  238 => 88,  231 => 83,  229 => 82,  221 => 77,  217 => 76,  214 => 75,  201 => 74,  125 => 7,  112 => 6,  89 => 4,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}Manage Saves — Admin MindBoost{% endblock %}
{% block page_title %}Manage Saves{% endblock %}

{% block extra_css %}
<style>
    .saves-list-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 1.25rem;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        transition: background .2s;
    }
    .saves-list-item:last-child { border-bottom: none; }
    .saves-list-item:hover { background: rgba(255,255,255,0.03); }

    .save-icon {
        width: 42px;
        height: 42px;
        border-radius: 13px;
        background: linear-gradient(135deg, #19B5FE, #00D1C7);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        color: white;
        flex-shrink: 0;
    }

    .save-post-link {
        font-weight: 700;
        font-size: .95rem;
        color: var(--text-main, #F4F7FC);
        text-decoration: none;
    }
    .save-post-link:hover { color: #19B5FE; }

    .save-meta {
        display: flex;
        align-items: center;
        gap: .45rem;
        flex-wrap: wrap;
        margin-top: .3rem;
    }

    .user-pill {
        display: inline-flex;
        align-items: center;
        gap: .25rem;
        font-size: .75rem;
        font-weight: 700;
        background: rgba(255,255,255,0.06);
        color: #AAB6D3;
        border-radius: 999px;
        padding: .2rem .55rem;
    }

    .desc-pill {
        font-size: .78rem;
        color: #7E8DB1;
        font-style: italic;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 260px;
    }

    .action-group { display: flex; gap: .4rem; flex-shrink: 0; }
</style>
{% endblock %}

{% block content %}
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <span class=\"text-muted\">{{ saves|length }} save(s) total</span>
    <a href=\"{{ path('back_saves_new') }}\" class=\"btn btn-info text-white btn-sm\">
        <i class=\"bi bi-plus-lg me-1\"></i>New Save
    </a>
</div>

{% if saves is empty %}
<div class=\"card p-5 text-center text-muted\">
    <i class=\"bi bi-bookmark display-4\"></i>
    <p class=\"mt-2\">No saves yet.</p>
</div>
{% else %}
<div class=\"card\">
    <div class=\"card-body p-0\">
        {% for save in saves %}
            <div class=\"saves-list-item\">
                <div class=\"save-icon\">
                    <i class=\"bi bi-bookmark-fill\"></i>
                </div>

                <div class=\"flex-grow-1 min-width-0\">
                    <a href=\"{{ path('front_post_show', {id: save.postId}) }}\"
                       class=\"save-post-link\" target=\"_blank\">
                        Post #{{ save.postId }}
                    </a>
                    <div class=\"save-meta\">
                        <span class=\"user-pill\">
                            <i class=\"bi bi-person-fill\"></i>User #{{ save.userId }}
                        </span>
                        {% if save.description %}
                            <span class=\"desc-pill\">{{ save.description|slice(0, 80) }}{% if save.description|length > 80 %}…{% endif %}</span>
                        {% endif %}
                    </div>
                </div>

                <div class=\"action-group\">
                    <a href=\"{{ path('back_saves_edit', {id: save.id}) }}\"
                       class=\"btn btn-xs btn-outline-secondary\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Edit\">
                        <i class=\"bi bi-pencil\"></i>
                    </a>
                    <form method=\"post\" action=\"{{ path('back_saves_delete', {id: save.id}) }}\"
                          onsubmit=\"return confirm('Remove this save?')\">
                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete_save' ~ save.id) }}\">
                        <button class=\"btn btn-xs btn-outline-danger\"
                                style=\"font-size:.75rem;padding:3px 9px;\" title=\"Delete\">
                            <i class=\"bi bi-trash\"></i>
                        </button>
                    </form>
                </div>
            </div>
        {% endfor %}
    </div>
</div>
{% endif %}
{% endblock %}
", "back/saves/index.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/back/saves/index.html.twig");
    }
}
