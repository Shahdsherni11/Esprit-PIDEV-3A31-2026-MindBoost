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

/* back/dashboard/index.html.twig */
class __TwigTemplate_73e24908dd9b14d4a907dba54445992f extends Template
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
            'body' => [$this, 'block_body'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/dashboard/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/dashboard/index.html.twig"));

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

        yield "Dashboard — Admin MindBoost";
        
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

        yield "Dashboard";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 8
        yield "<div class=\"row g-3 mb-4\">
    <div class=\"col-sm-6 col-xl-3\">
        <div class=\"card stat-card p-3\" style=\"border-left-color:#0d6efd;\">
            <div class=\"d-flex align-items-center gap-3\">
                <div class=\"fs-2 text-primary\"><i class=\"bi bi-file-post\"></i></div>
                <div>
                    <div class=\"fs-3 fw-bold\">";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalPosts"]) || array_key_exists("totalPosts", $context) ? $context["totalPosts"] : (function () { throw new RuntimeError('Variable "totalPosts" does not exist.', 14, $this->source); })()), "html", null, true);
        yield "</div>
                    <div class=\"text-muted small\">Total Posts</div>
                </div>
            </div>
        </div>
    </div>
    <div class=\"col-sm-6 col-xl-3\">
        <div class=\"card stat-card p-3\" style=\"border-left-color:#198754;\">
            <div class=\"d-flex align-items-center gap-3\">
                <div class=\"fs-2 text-success\"><i class=\"bi bi-chat-dots\"></i></div>
                <div>
                    <div class=\"fs-3 fw-bold\">";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalComments"]) || array_key_exists("totalComments", $context) ? $context["totalComments"] : (function () { throw new RuntimeError('Variable "totalComments" does not exist.', 25, $this->source); })()), "html", null, true);
        yield "</div>
                    <div class=\"text-muted small\">Total Comments</div>
                </div>
            </div>
        </div>
    </div>
    <div class=\"col-sm-6 col-xl-3\">
        <div class=\"card stat-card p-3\" style=\"border-left-color:#ffc107;\">
            <div class=\"d-flex align-items-center gap-3\">
                <div class=\"fs-2 text-warning\"><i class=\"bi bi-trophy\"></i></div>
                <div>
                    <div class=\"fs-3 fw-bold\">";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalAchievements"]) || array_key_exists("totalAchievements", $context) ? $context["totalAchievements"] : (function () { throw new RuntimeError('Variable "totalAchievements" does not exist.', 36, $this->source); })()), "html", null, true);
        yield "</div>
                    <div class=\"text-muted small\">Achievements</div>
                </div>
            </div>
        </div>
    </div>
    <div class=\"col-sm-6 col-xl-3\">
        <div class=\"card stat-card p-3\" style=\"border-left-color:#0dcaf0;\">
            <div class=\"d-flex align-items-center gap-3\">
                <div class=\"fs-2 text-info\"><i class=\"bi bi-bookmark\"></i></div>
                <div>
                    <div class=\"fs-3 fw-bold\">";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalSaves"]) || array_key_exists("totalSaves", $context) ? $context["totalSaves"] : (function () { throw new RuntimeError('Variable "totalSaves" does not exist.', 47, $this->source); })()), "html", null, true);
        yield "</div>
                    <div class=\"text-muted small\">Saved Posts</div>
                </div>
            </div>
        </div>
    </div>
</div>

";
        // line 56
        yield "<div class=\"row g-3 mb-4\">
    <div class=\"col-md-3\">
        <a href=\"";
        // line 58
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_post_new");
        yield "\" class=\"btn btn-primary w-100\">
            <i class=\"bi bi-plus-lg me-1\"></i>New Post
        </a>
    </div>
    <div class=\"col-md-3\">
        <a href=\"";
        // line 63
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_achievement_new");
        yield "\" class=\"btn btn-warning w-100\">
            <i class=\"bi bi-plus-lg me-1\"></i>New Achievement
        </a>
    </div>
    <div class=\"col-md-3\">
        <a href=\"";
        // line 68
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_saves_new");
        yield "\" class=\"btn btn-info text-white w-100\">
            <i class=\"bi bi-plus-lg me-1\"></i>New Save
        </a>
    </div>
    <div class=\"col-md-3\">
        <a href=\"";
        // line 73
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_home");
        yield "\" class=\"btn btn-outline-secondary w-100\">
            <i class=\"bi bi-eye me-1\"></i>View Site
        </a>
    </div>
</div>

";
        // line 80
        yield "<div class=\"card\">
    <div class=\"card-body\">
        <h6 class=\"fw-bold mb-3\"><i class=\"bi bi-clock-history me-2 text-muted\"></i>Recent Posts</h6>
        ";
        // line 83
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["recentPosts"]) || array_key_exists("recentPosts", $context) ? $context["recentPosts"] : (function () { throw new RuntimeError('Variable "recentPosts" does not exist.', 83, $this->source); })()))) {
            // line 84
            yield "        <p class=\"text-muted\">No posts yet.</p>
        ";
        } else {
            // line 86
            yield "        <div class=\"row g-3\">
            ";
            // line 87
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["recentPosts"]) || array_key_exists("recentPosts", $context) ? $context["recentPosts"] : (function () { throw new RuntimeError('Variable "recentPosts" does not exist.', 87, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 88
                yield "            <div class=\"col-md-6 col-xl-4\">
                <div class=\"card\" style=\"background:rgba(255,255,255,0.06);border-color:rgba(255,255,255,0.1);\">
                    <div class=\"card-body\">
                        <div class=\"d-flex justify-content-between align-items-start mb-1\">
                            <a href=\"";
                // line 92
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_post_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 92)]), "html", null, true);
                yield "\" class=\"fw-bold text-decoration-none\" style=\"color:#9A8CFF;\" target=\"_blank\">
                                ";
                // line 93
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 93), 0, 50), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 93)) > 50)) {
                    yield "…";
                }
                // line 94
                yield "                            </a>
                            ";
                // line 95
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "tag", [], "any", false, false, false, 95)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "<span class=\"badge bg-secondary ms-1\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "tag", [], "any", false, false, false, 95), "html", null, true);
                    yield "</span>";
                }
                // line 96
                yield "                        </div>
                        <div class=\"d-flex gap-2 mt-2\">
                            <span class=\"badge bg-success\"><i class=\"bi bi-hand-thumbs-up me-1\"></i>";
                // line 98
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "likes", [], "any", false, false, false, 98), "html", null, true);
                yield "</span>
                            <a href=\"";
                // line 99
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_post_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 99)]), "html", null, true);
                yield "\" class=\"btn btn-outline-secondary btn-sm ms-auto\"><i class=\"bi bi-pencil\"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 105
            yield "        </div>
        <div class=\"mt-2\">
            <a href=\"";
            // line 107
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_post_index");
            yield "\" class=\"btn btn-sm btn-outline-primary\">View all posts →</a>
        </div>
        ";
        }
        // line 110
        yield "    </div>
</div>

";
        // line 114
        yield "<div class=\"row g-3 mt-2\">
    <div class=\"col-12\">
        <h6 class=\"fw-bold text-muted\"><i class=\"bi bi-grid me-2\"></i>Accès Rapide — Toutes les Gestions</h6>
    </div>
    <div class=\"col-sm-6 col-lg-3\">
        <a href=\"";
        // line 119
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_post_index");
        yield "\" class=\"text-decoration-none\">
            <div class=\"card p-3 text-center h-100\" style=\"border-left: 3px solid #6C63FF;\">
                <i class=\"bi bi-file-post fs-3 mb-1\" style=\"color:#6C63FF;\"></i>
                <div class=\"fw-semibold\">Posts Forum</div>
                <small class=\"text-muted\">Gérer les posts</small>
            </div>
        </a>
    </div>
    <div class=\"col-sm-6 col-lg-3\">
        <a href=\"";
        // line 128
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tache_focus_index");
        yield "\" class=\"text-decoration-none\">
            <div class=\"card p-3 text-center h-100\" style=\"border-left: 3px solid #2ECC71;\">
                <i class=\"bi bi-check2-square fs-3 mb-1\" style=\"color:#2ECC71;\"></i>
                <div class=\"fw-semibold\">Tâches Focus</div>
                <small class=\"text-muted\">Gérer les tâches</small>
            </div>
        </a>
    </div>
    <div class=\"col-sm-6 col-lg-3\">
        <a href=\"";
        // line 137
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("general_test_index");
        yield "\" class=\"text-decoration-none\">
            <div class=\"card p-3 text-center h-100\" style=\"border-left: 3px solid #4ECDC4;\">
                <i class=\"bi bi-clipboard2-pulse fs-3 mb-1\" style=\"color:#4ECDC4;\"></i>
                <div class=\"fw-semibold\">Tests Psy</div>
                <small class=\"text-muted\">Gérer les tests</small>
            </div>
        </a>
    </div>
    <div class=\"col-sm-6 col-lg-3\">
        <a href=\"";
        // line 146
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_user_list");
        yield "\" class=\"text-decoration-none\">
            <div class=\"card p-3 text-center h-100\" style=\"border-left: 3px solid #F39C12;\">
                <i class=\"bi bi-people fs-3 mb-1\" style=\"color:#F39C12;\"></i>
                <div class=\"fw-semibold\">Utilisateurs</div>
                <small class=\"text-muted\">Gérer les comptes</small>
            </div>
        </a>
    </div>
</div>
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
        return "back/dashboard/index.html.twig";
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
        return array (  342 => 146,  330 => 137,  318 => 128,  306 => 119,  299 => 114,  294 => 110,  288 => 107,  284 => 105,  272 => 99,  268 => 98,  264 => 96,  258 => 95,  255 => 94,  250 => 93,  246 => 92,  240 => 88,  236 => 87,  233 => 86,  229 => 84,  227 => 83,  222 => 80,  213 => 73,  205 => 68,  197 => 63,  189 => 58,  185 => 56,  174 => 47,  160 => 36,  146 => 25,  132 => 14,  124 => 8,  111 => 6,  88 => 4,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}Dashboard — Admin MindBoost{% endblock %}
{% block page_title %}Dashboard{% endblock %}

{% block body %}
{# Stats row #}
<div class=\"row g-3 mb-4\">
    <div class=\"col-sm-6 col-xl-3\">
        <div class=\"card stat-card p-3\" style=\"border-left-color:#0d6efd;\">
            <div class=\"d-flex align-items-center gap-3\">
                <div class=\"fs-2 text-primary\"><i class=\"bi bi-file-post\"></i></div>
                <div>
                    <div class=\"fs-3 fw-bold\">{{ totalPosts }}</div>
                    <div class=\"text-muted small\">Total Posts</div>
                </div>
            </div>
        </div>
    </div>
    <div class=\"col-sm-6 col-xl-3\">
        <div class=\"card stat-card p-3\" style=\"border-left-color:#198754;\">
            <div class=\"d-flex align-items-center gap-3\">
                <div class=\"fs-2 text-success\"><i class=\"bi bi-chat-dots\"></i></div>
                <div>
                    <div class=\"fs-3 fw-bold\">{{ totalComments }}</div>
                    <div class=\"text-muted small\">Total Comments</div>
                </div>
            </div>
        </div>
    </div>
    <div class=\"col-sm-6 col-xl-3\">
        <div class=\"card stat-card p-3\" style=\"border-left-color:#ffc107;\">
            <div class=\"d-flex align-items-center gap-3\">
                <div class=\"fs-2 text-warning\"><i class=\"bi bi-trophy\"></i></div>
                <div>
                    <div class=\"fs-3 fw-bold\">{{ totalAchievements }}</div>
                    <div class=\"text-muted small\">Achievements</div>
                </div>
            </div>
        </div>
    </div>
    <div class=\"col-sm-6 col-xl-3\">
        <div class=\"card stat-card p-3\" style=\"border-left-color:#0dcaf0;\">
            <div class=\"d-flex align-items-center gap-3\">
                <div class=\"fs-2 text-info\"><i class=\"bi bi-bookmark\"></i></div>
                <div>
                    <div class=\"fs-3 fw-bold\">{{ totalSaves }}</div>
                    <div class=\"text-muted small\">Saved Posts</div>
                </div>
            </div>
        </div>
    </div>
</div>

{# Quick links #}
<div class=\"row g-3 mb-4\">
    <div class=\"col-md-3\">
        <a href=\"{{ path('back_post_new') }}\" class=\"btn btn-primary w-100\">
            <i class=\"bi bi-plus-lg me-1\"></i>New Post
        </a>
    </div>
    <div class=\"col-md-3\">
        <a href=\"{{ path('back_achievement_new') }}\" class=\"btn btn-warning w-100\">
            <i class=\"bi bi-plus-lg me-1\"></i>New Achievement
        </a>
    </div>
    <div class=\"col-md-3\">
        <a href=\"{{ path('back_saves_new') }}\" class=\"btn btn-info text-white w-100\">
            <i class=\"bi bi-plus-lg me-1\"></i>New Save
        </a>
    </div>
    <div class=\"col-md-3\">
        <a href=\"{{ path('front_home') }}\" class=\"btn btn-outline-secondary w-100\">
            <i class=\"bi bi-eye me-1\"></i>View Site
        </a>
    </div>
</div>

{# Recent posts #}
<div class=\"card\">
    <div class=\"card-body\">
        <h6 class=\"fw-bold mb-3\"><i class=\"bi bi-clock-history me-2 text-muted\"></i>Recent Posts</h6>
        {% if recentPosts is empty %}
        <p class=\"text-muted\">No posts yet.</p>
        {% else %}
        <div class=\"row g-3\">
            {% for post in recentPosts %}
            <div class=\"col-md-6 col-xl-4\">
                <div class=\"card\" style=\"background:rgba(255,255,255,0.06);border-color:rgba(255,255,255,0.1);\">
                    <div class=\"card-body\">
                        <div class=\"d-flex justify-content-between align-items-start mb-1\">
                            <a href=\"{{ path('front_post_show', {id: post.id}) }}\" class=\"fw-bold text-decoration-none\" style=\"color:#9A8CFF;\" target=\"_blank\">
                                {{ post.title|slice(0, 50) }}{% if post.title|length > 50 %}…{% endif %}
                            </a>
                            {% if post.tag %}<span class=\"badge bg-secondary ms-1\">{{ post.tag }}</span>{% endif %}
                        </div>
                        <div class=\"d-flex gap-2 mt-2\">
                            <span class=\"badge bg-success\"><i class=\"bi bi-hand-thumbs-up me-1\"></i>{{ post.likes }}</span>
                            <a href=\"{{ path('back_post_edit', {id: post.id}) }}\" class=\"btn btn-outline-secondary btn-sm ms-auto\"><i class=\"bi bi-pencil\"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            {% endfor %}
        </div>
        <div class=\"mt-2\">
            <a href=\"{{ path('back_post_index') }}\" class=\"btn btn-sm btn-outline-primary\">View all posts →</a>
        </div>
        {% endif %}
    </div>
</div>

{# Quick Access to All Gestions #}
<div class=\"row g-3 mt-2\">
    <div class=\"col-12\">
        <h6 class=\"fw-bold text-muted\"><i class=\"bi bi-grid me-2\"></i>Accès Rapide — Toutes les Gestions</h6>
    </div>
    <div class=\"col-sm-6 col-lg-3\">
        <a href=\"{{ path('back_post_index') }}\" class=\"text-decoration-none\">
            <div class=\"card p-3 text-center h-100\" style=\"border-left: 3px solid #6C63FF;\">
                <i class=\"bi bi-file-post fs-3 mb-1\" style=\"color:#6C63FF;\"></i>
                <div class=\"fw-semibold\">Posts Forum</div>
                <small class=\"text-muted\">Gérer les posts</small>
            </div>
        </a>
    </div>
    <div class=\"col-sm-6 col-lg-3\">
        <a href=\"{{ path('app_tache_focus_index') }}\" class=\"text-decoration-none\">
            <div class=\"card p-3 text-center h-100\" style=\"border-left: 3px solid #2ECC71;\">
                <i class=\"bi bi-check2-square fs-3 mb-1\" style=\"color:#2ECC71;\"></i>
                <div class=\"fw-semibold\">Tâches Focus</div>
                <small class=\"text-muted\">Gérer les tâches</small>
            </div>
        </a>
    </div>
    <div class=\"col-sm-6 col-lg-3\">
        <a href=\"{{ path('general_test_index') }}\" class=\"text-decoration-none\">
            <div class=\"card p-3 text-center h-100\" style=\"border-left: 3px solid #4ECDC4;\">
                <i class=\"bi bi-clipboard2-pulse fs-3 mb-1\" style=\"color:#4ECDC4;\"></i>
                <div class=\"fw-semibold\">Tests Psy</div>
                <small class=\"text-muted\">Gérer les tests</small>
            </div>
        </a>
    </div>
    <div class=\"col-sm-6 col-lg-3\">
        <a href=\"{{ path('app_admin_user_list') }}\" class=\"text-decoration-none\">
            <div class=\"card p-3 text-center h-100\" style=\"border-left: 3px solid #F39C12;\">
                <i class=\"bi bi-people fs-3 mb-1\" style=\"color:#F39C12;\"></i>
                <div class=\"fw-semibold\">Utilisateurs</div>
                <small class=\"text-muted\">Gérer les comptes</small>
            </div>
        </a>
    </div>
</div>
{% endblock %}
", "back/dashboard/index.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/back/dashboard/index.html.twig");
    }
}
