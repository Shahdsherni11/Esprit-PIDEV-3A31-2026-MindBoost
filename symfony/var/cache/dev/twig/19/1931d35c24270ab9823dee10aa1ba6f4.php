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

/* back/achievement/index.html.twig */
class __TwigTemplate_89b9b8f9067e01986d577b56cc16b74e extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/achievement/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/achievement/index.html.twig"));

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

        yield "Manage Achievements — Admin MindBoost";
        
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

        yield "Manage Achievements";
        
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
    .achiev-list-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 1.25rem;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        transition: background .2s;
    }
    .achiev-list-item:last-child { border-bottom: none; }
    .achiev-list-item:hover { background: rgba(255,255,255,0.03); }

    .achiev-icon {
        width: 42px;
        height: 42px;
        border-radius: 13px;
        background: linear-gradient(135deg, #F7B84B, #E8A020);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        color: #142033;
        flex-shrink: 0;
    }

    .achiev-name {
        font-weight: 700;
        font-size: .95rem;
        color: var(--text-main, #F4F7FC);
    }

    .achiev-sub {
        font-size: .78rem;
        color: #7E8DB1;
        margin-top: .15rem;
    }

    .score-pill {
        background: rgba(247,184,75,0.18);
        color: #F7B84B;
        border: 1px solid rgba(247,184,75,0.28);
        border-radius: 999px;
        padding: .28rem .75rem;
        font-size: .82rem;
        font-weight: 800;
        white-space: nowrap;
        flex-shrink: 0;
    }

    .action-group { display: flex; gap: .4rem; flex-shrink: 0; }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 60
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

        // line 61
        yield "<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <span class=\"text-muted\">";
        // line 62
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["achievements"]) || array_key_exists("achievements", $context) ? $context["achievements"] : (function () { throw new RuntimeError('Variable "achievements" does not exist.', 62, $this->source); })())), "html", null, true);
        yield " achievement(s) total</span>
    <a href=\"";
        // line 63
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_achievement_new");
        yield "\" class=\"btn btn-warning btn-sm\">
        <i class=\"bi bi-plus-lg me-1\"></i>New Achievement
    </a>
</div>

";
        // line 68
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["achievements"]) || array_key_exists("achievements", $context) ? $context["achievements"] : (function () { throw new RuntimeError('Variable "achievements" does not exist.', 68, $this->source); })()))) {
            // line 69
            yield "<div class=\"card p-5 text-center text-muted\">
    <i class=\"bi bi-trophy display-4\"></i>
    <p class=\"mt-2\">No achievements yet. <a href=\"";
            // line 71
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_achievement_new");
            yield "\">Create the first one!</a></p>
</div>
";
        } else {
            // line 74
            yield "<div class=\"card\">
    <div class=\"card-body p-0\">
        ";
            // line 76
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["achievements"]) || array_key_exists("achievements", $context) ? $context["achievements"] : (function () { throw new RuntimeError('Variable "achievements" does not exist.', 76, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["achievement"]) {
                // line 77
                yield "            <div class=\"achiev-list-item\">
                <div class=\"achiev-icon\">
                    <i class=\"bi bi-trophy-fill\"></i>
                </div>

                <div class=\"flex-grow-1 min-width-0\">
                    <div class=\"achiev-name\">";
                // line 83
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["achievement"], "achievementName", [], "any", false, false, false, 83), "html", null, true);
                yield "</div>
                    <div class=\"achiev-sub\">ID #";
                // line 84
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["achievement"], "id", [], "any", false, false, false, 84), "html", null, true);
                yield "</div>
                </div>

                <span class=\"score-pill\">
                    <i class=\"bi bi-star-half me-1\"></i>";
                // line 88
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["achievement"], "achievementScore", [], "any", false, false, false, 88), "html", null, true);
                yield " pts
                </span>

                <div class=\"action-group\">
                    <a href=\"";
                // line 92
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_achievement_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["achievement"], "id", [], "any", false, false, false, 92)]), "html", null, true);
                yield "\"
                       class=\"btn btn-xs btn-outline-secondary\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Edit\">
                        <i class=\"bi bi-pencil\"></i>
                    </a>
                    <form method=\"post\" action=\"";
                // line 97
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_achievement_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["achievement"], "id", [], "any", false, false, false, 97)]), "html", null, true);
                yield "\"
                          onsubmit=\"return confirm('Delete this achievement?')\">
                        <input type=\"hidden\" name=\"_token\" value=\"";
                // line 99
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete_achievement" . CoreExtension::getAttribute($this->env, $this->source, $context["achievement"], "id", [], "any", false, false, false, 99))), "html", null, true);
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
            unset($context['_seq'], $context['_key'], $context['achievement'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 108
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
        return "back/achievement/index.html.twig";
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
        return array (  289 => 108,  274 => 99,  269 => 97,  261 => 92,  254 => 88,  247 => 84,  243 => 83,  235 => 77,  231 => 76,  227 => 74,  221 => 71,  217 => 69,  215 => 68,  207 => 63,  203 => 62,  200 => 61,  187 => 60,  125 => 7,  112 => 6,  89 => 4,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}Manage Achievements — Admin MindBoost{% endblock %}
{% block page_title %}Manage Achievements{% endblock %}

{% block extra_css %}
<style>
    .achiev-list-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 1.25rem;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        transition: background .2s;
    }
    .achiev-list-item:last-child { border-bottom: none; }
    .achiev-list-item:hover { background: rgba(255,255,255,0.03); }

    .achiev-icon {
        width: 42px;
        height: 42px;
        border-radius: 13px;
        background: linear-gradient(135deg, #F7B84B, #E8A020);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        color: #142033;
        flex-shrink: 0;
    }

    .achiev-name {
        font-weight: 700;
        font-size: .95rem;
        color: var(--text-main, #F4F7FC);
    }

    .achiev-sub {
        font-size: .78rem;
        color: #7E8DB1;
        margin-top: .15rem;
    }

    .score-pill {
        background: rgba(247,184,75,0.18);
        color: #F7B84B;
        border: 1px solid rgba(247,184,75,0.28);
        border-radius: 999px;
        padding: .28rem .75rem;
        font-size: .82rem;
        font-weight: 800;
        white-space: nowrap;
        flex-shrink: 0;
    }

    .action-group { display: flex; gap: .4rem; flex-shrink: 0; }
</style>
{% endblock %}

{% block content %}
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <span class=\"text-muted\">{{ achievements|length }} achievement(s) total</span>
    <a href=\"{{ path('back_achievement_new') }}\" class=\"btn btn-warning btn-sm\">
        <i class=\"bi bi-plus-lg me-1\"></i>New Achievement
    </a>
</div>

{% if achievements is empty %}
<div class=\"card p-5 text-center text-muted\">
    <i class=\"bi bi-trophy display-4\"></i>
    <p class=\"mt-2\">No achievements yet. <a href=\"{{ path('back_achievement_new') }}\">Create the first one!</a></p>
</div>
{% else %}
<div class=\"card\">
    <div class=\"card-body p-0\">
        {% for achievement in achievements %}
            <div class=\"achiev-list-item\">
                <div class=\"achiev-icon\">
                    <i class=\"bi bi-trophy-fill\"></i>
                </div>

                <div class=\"flex-grow-1 min-width-0\">
                    <div class=\"achiev-name\">{{ achievement.achievementName }}</div>
                    <div class=\"achiev-sub\">ID #{{ achievement.id }}</div>
                </div>

                <span class=\"score-pill\">
                    <i class=\"bi bi-star-half me-1\"></i>{{ achievement.achievementScore }} pts
                </span>

                <div class=\"action-group\">
                    <a href=\"{{ path('back_achievement_edit', {id: achievement.id}) }}\"
                       class=\"btn btn-xs btn-outline-secondary\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Edit\">
                        <i class=\"bi bi-pencil\"></i>
                    </a>
                    <form method=\"post\" action=\"{{ path('back_achievement_delete', {id: achievement.id}) }}\"
                          onsubmit=\"return confirm('Delete this achievement?')\">
                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete_achievement' ~ achievement.id) }}\">
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
", "back/achievement/index.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/back/achievement/index.html.twig");
    }
}
