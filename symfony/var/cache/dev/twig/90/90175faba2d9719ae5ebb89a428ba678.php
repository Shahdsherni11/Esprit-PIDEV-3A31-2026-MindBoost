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

/* back/post/index.html.twig */
class __TwigTemplate_ade896ef9846b8f417908d921a45f065 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/post/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/post/index.html.twig"));

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

        yield "Manage Posts — Admin MindBoost";
        
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

        yield "Manage Posts";
        
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
    .post-list-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 1.25rem;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        transition: background .2s;
    }
    .post-list-item:last-child { border-bottom: none; }
    .post-list-item:hover { background: rgba(255,255,255,0.03); }

    .post-index-num {
        width: 32px;
        height: 32px;
        border-radius: 10px;
        background: rgba(47,107,255,0.15);
        color: #4D83FF;
        font-size: .78rem;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .post-body { flex: 1; min-width: 0; }
    .post-title-link {
        display: block;
        font-weight: 700;
        font-size: .95rem;
        color: var(--text-main, #F4F7FC);
        text-decoration: none;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100%;
    }
    .post-title-link:hover { color: #4D83FF; }

    .post-meta {
        display: flex;
        align-items: center;
        gap: .45rem;
        flex-wrap: wrap;
        margin-top: .3rem;
    }

    .tag-pill {
        display: inline-block;
        padding: .2rem .6rem;
        border-radius: 999px;
        font-size: .75rem;
        font-weight: 700;
        background: rgba(47,107,255,0.18);
        color: #7BA5FF;
        border: 1px solid rgba(47,107,255,0.25);
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

    .vote-pill {
        display: inline-flex;
        align-items: center;
        gap: .25rem;
        font-size: .75rem;
        font-weight: 700;
        border-radius: 999px;
        padding: .2rem .55rem;
    }
    .vote-up   { background: rgba(41,204,122,0.15); color: #29CC7A; }
    .vote-down { background: rgba(255,90,116,0.15);  color: #FF5A74; }

    .score-badge {
        background: rgba(25,181,254,0.15);
        color: #19B5FE;
        border-radius: 999px;
        padding: .2rem .55rem;
        font-size: .75rem;
        font-weight: 700;
    }

    .achiev-earned {
        display: inline-flex;
        align-items: center;
        gap: .3rem;
        background: linear-gradient(135deg, rgba(247,184,75,0.22), rgba(232,160,32,0.15));
        border: 1px solid rgba(247,184,75,0.35);
        color: #F7B84B;
        border-radius: 999px;
        padding: .2rem .6rem;
        font-size: .75rem;
        font-weight: 800;
        white-space: nowrap;
        animation: shimmer 2.5s ease-in-out infinite;
    }
    @keyframes shimmer {
        0%, 100% { opacity: 1; }
        50% { opacity: .75; }
    }

    .action-group { display: flex; gap: .4rem; flex-shrink: 0; }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 122
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

        // line 123
        yield "<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <span class=\"text-muted\">";
        // line 124
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 124, $this->source); })())), "html", null, true);
        yield " post(s) total</span>
    <a href=\"";
        // line 125
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_post_new");
        yield "\" class=\"btn btn-primary btn-sm\">
        <i class=\"bi bi-plus-lg me-1\"></i>New Post
    </a>
</div>

";
        // line 130
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 130, $this->source); })()))) {
            // line 131
            yield "<div class=\"card p-5 text-center text-muted\">
    <i class=\"bi bi-inbox display-4\"></i>
    <p class=\"mt-2\">No posts yet. <a href=\"";
            // line 133
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_post_new");
            yield "\">Create the first one!</a></p>
</div>
";
        } else {
            // line 136
            yield "<div class=\"card\">
    <div class=\"card-body p-0\">
        ";
            // line 138
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 138, $this->source); })()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 139
                yield "            ";
                // line 140
                yield "            ";
                $context["postScore"] = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "helpMeter", [], "any", false, false, false, 140);
                // line 141
                yield "            ";
                $context["earnedAchievement"] = null;
                // line 142
                yield "            ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["achievements"]) || array_key_exists("achievements", $context) ? $context["achievements"] : (function () { throw new RuntimeError('Variable "achievements" does not exist.', 142, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["ach"]) {
                    // line 143
                    yield "                ";
                    if (((isset($context["postScore"]) || array_key_exists("postScore", $context) ? $context["postScore"] : (function () { throw new RuntimeError('Variable "postScore" does not exist.', 143, $this->source); })()) >= CoreExtension::getAttribute($this->env, $this->source, $context["ach"], "achievementScore", [], "any", false, false, false, 143))) {
                        // line 144
                        yield "                    ";
                        $context["earnedAchievement"] = $context["ach"];
                        // line 145
                        yield "                ";
                    }
                    // line 146
                    yield "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['ach'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 147
                yield "
            <div class=\"post-list-item\">
                <div class=\"post-index-num\">";
                // line 149
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 149), "html", null, true);
                yield "</div>

                <div class=\"post-body\">
                    <a href=\"";
                // line 152
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_post_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 152)]), "html", null, true);
                yield "\"
                       class=\"post-title-link\" target=\"_blank\">
                        ";
                // line 154
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 154), 0, 70), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 154)) > 70)) {
                    yield "…";
                }
                // line 155
                yield "                    </a>
                    <div class=\"post-meta\">
                        <span class=\"user-pill\">
                            <i class=\"bi bi-person-fill\"></i>";
                // line 158
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "userId", [], "any", false, false, false, 158), "html", null, true);
                yield "
                        </span>
                        ";
                // line 160
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "tag", [], "any", false, false, false, 160)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 161
                    yield "                            <span class=\"tag-pill\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "tag", [], "any", false, false, false, 161), "html", null, true);
                    yield "</span>
                        ";
                }
                // line 163
                yield "                        <span class=\"vote-pill vote-up\">
                            <i class=\"bi bi-hand-thumbs-up-fill\"></i> ";
                // line 164
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "likes", [], "any", false, false, false, 164), "html", null, true);
                yield "
                        </span>
                        <span class=\"vote-pill vote-down\">
                            <i class=\"bi bi-hand-thumbs-down-fill\"></i> ";
                // line 167
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "dislikes", [], "any", false, false, false, 167), "html", null, true);
                yield "
                        </span>
                        <span class=\"score-badge\" title=\"Help Meter score\">
                            <i class=\"bi bi-star-half me-1\"></i>";
                // line 170
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["postScore"]) || array_key_exists("postScore", $context) ? $context["postScore"] : (function () { throw new RuntimeError('Variable "postScore" does not exist.', 170, $this->source); })()), "html", null, true);
                yield "
                        </span>
                        ";
                // line 172
                if ((($tmp = (isset($context["earnedAchievement"]) || array_key_exists("earnedAchievement", $context) ? $context["earnedAchievement"] : (function () { throw new RuntimeError('Variable "earnedAchievement" does not exist.', 172, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 173
                    yield "                            <span class=\"achiev-earned\" title=\"Required score: ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["earnedAchievement"]) || array_key_exists("earnedAchievement", $context) ? $context["earnedAchievement"] : (function () { throw new RuntimeError('Variable "earnedAchievement" does not exist.', 173, $this->source); })()), "achievementScore", [], "any", false, false, false, 173), "html", null, true);
                    yield "\">
                                <i class=\"bi bi-trophy-fill\"></i>
                                ";
                    // line 175
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["earnedAchievement"]) || array_key_exists("earnedAchievement", $context) ? $context["earnedAchievement"] : (function () { throw new RuntimeError('Variable "earnedAchievement" does not exist.', 175, $this->source); })()), "achievementName", [], "any", false, false, false, 175), "html", null, true);
                    yield "
                            </span>
                        ";
                }
                // line 178
                yield "                    </div>
                </div>

                <div class=\"action-group\">
                    <a href=\"";
                // line 182
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_post_stats", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 182)]), "html", null, true);
                yield "\"
                       class=\"btn btn-xs btn-outline-warning\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Stats\">
                        <i class=\"bi bi-bar-chart-line\"></i>
                    </a>
                    <a href=\"";
                // line 187
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_post_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 187)]), "html", null, true);
                yield "\"
                       class=\"btn btn-xs btn-outline-secondary\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Edit\">
                        <i class=\"bi bi-pencil\"></i>
                    </a>
                    <form method=\"post\" action=\"";
                // line 192
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_post_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 192)]), "html", null, true);
                yield "\"
                          onsubmit=\"return confirm('Delete this post and its comments?')\">
                        <input type=\"hidden\" name=\"_token\" value=\"";
                // line 194
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 194))), "html", null, true);
                yield "\">
                        <button class=\"btn btn-xs btn-outline-danger\"
                                style=\"font-size:.75rem;padding:3px 9px;\" title=\"Delete\">
                            <i class=\"bi bi-trash\"></i>
                        </button>
                    </form>
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
            unset($context['_seq'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 203
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
        return "back/post/index.html.twig";
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
        return array (  460 => 203,  437 => 194,  432 => 192,  424 => 187,  416 => 182,  410 => 178,  404 => 175,  398 => 173,  396 => 172,  391 => 170,  385 => 167,  379 => 164,  376 => 163,  370 => 161,  368 => 160,  363 => 158,  358 => 155,  353 => 154,  348 => 152,  342 => 149,  338 => 147,  332 => 146,  329 => 145,  326 => 144,  323 => 143,  318 => 142,  315 => 141,  312 => 140,  310 => 139,  293 => 138,  289 => 136,  283 => 133,  279 => 131,  277 => 130,  269 => 125,  265 => 124,  262 => 123,  249 => 122,  125 => 7,  112 => 6,  89 => 4,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}Manage Posts — Admin MindBoost{% endblock %}
{% block page_title %}Manage Posts{% endblock %}

{% block extra_css %}
<style>
    .post-list-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 1.25rem;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        transition: background .2s;
    }
    .post-list-item:last-child { border-bottom: none; }
    .post-list-item:hover { background: rgba(255,255,255,0.03); }

    .post-index-num {
        width: 32px;
        height: 32px;
        border-radius: 10px;
        background: rgba(47,107,255,0.15);
        color: #4D83FF;
        font-size: .78rem;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .post-body { flex: 1; min-width: 0; }
    .post-title-link {
        display: block;
        font-weight: 700;
        font-size: .95rem;
        color: var(--text-main, #F4F7FC);
        text-decoration: none;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100%;
    }
    .post-title-link:hover { color: #4D83FF; }

    .post-meta {
        display: flex;
        align-items: center;
        gap: .45rem;
        flex-wrap: wrap;
        margin-top: .3rem;
    }

    .tag-pill {
        display: inline-block;
        padding: .2rem .6rem;
        border-radius: 999px;
        font-size: .75rem;
        font-weight: 700;
        background: rgba(47,107,255,0.18);
        color: #7BA5FF;
        border: 1px solid rgba(47,107,255,0.25);
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

    .vote-pill {
        display: inline-flex;
        align-items: center;
        gap: .25rem;
        font-size: .75rem;
        font-weight: 700;
        border-radius: 999px;
        padding: .2rem .55rem;
    }
    .vote-up   { background: rgba(41,204,122,0.15); color: #29CC7A; }
    .vote-down { background: rgba(255,90,116,0.15);  color: #FF5A74; }

    .score-badge {
        background: rgba(25,181,254,0.15);
        color: #19B5FE;
        border-radius: 999px;
        padding: .2rem .55rem;
        font-size: .75rem;
        font-weight: 700;
    }

    .achiev-earned {
        display: inline-flex;
        align-items: center;
        gap: .3rem;
        background: linear-gradient(135deg, rgba(247,184,75,0.22), rgba(232,160,32,0.15));
        border: 1px solid rgba(247,184,75,0.35);
        color: #F7B84B;
        border-radius: 999px;
        padding: .2rem .6rem;
        font-size: .75rem;
        font-weight: 800;
        white-space: nowrap;
        animation: shimmer 2.5s ease-in-out infinite;
    }
    @keyframes shimmer {
        0%, 100% { opacity: 1; }
        50% { opacity: .75; }
    }

    .action-group { display: flex; gap: .4rem; flex-shrink: 0; }
</style>
{% endblock %}

{% block content %}
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <span class=\"text-muted\">{{ posts|length }} post(s) total</span>
    <a href=\"{{ path('back_post_new') }}\" class=\"btn btn-primary btn-sm\">
        <i class=\"bi bi-plus-lg me-1\"></i>New Post
    </a>
</div>

{% if posts is empty %}
<div class=\"card p-5 text-center text-muted\">
    <i class=\"bi bi-inbox display-4\"></i>
    <p class=\"mt-2\">No posts yet. <a href=\"{{ path('back_post_new') }}\">Create the first one!</a></p>
</div>
{% else %}
<div class=\"card\">
    <div class=\"card-body p-0\">
        {% for post in posts %}
            {# Find the highest achievement whose score the post's helpMeter meets #}
            {% set postScore = post.helpMeter %}
            {% set earnedAchievement = null %}
            {% for ach in achievements %}
                {% if postScore >= ach.achievementScore %}
                    {% set earnedAchievement = ach %}
                {% endif %}
            {% endfor %}

            <div class=\"post-list-item\">
                <div class=\"post-index-num\">{{ loop.index }}</div>

                <div class=\"post-body\">
                    <a href=\"{{ path('front_post_show', {id: post.id}) }}\"
                       class=\"post-title-link\" target=\"_blank\">
                        {{ post.title|slice(0, 70) }}{% if post.title|length > 70 %}…{% endif %}
                    </a>
                    <div class=\"post-meta\">
                        <span class=\"user-pill\">
                            <i class=\"bi bi-person-fill\"></i>{{ post.userId }}
                        </span>
                        {% if post.tag %}
                            <span class=\"tag-pill\">{{ post.tag }}</span>
                        {% endif %}
                        <span class=\"vote-pill vote-up\">
                            <i class=\"bi bi-hand-thumbs-up-fill\"></i> {{ post.likes }}
                        </span>
                        <span class=\"vote-pill vote-down\">
                            <i class=\"bi bi-hand-thumbs-down-fill\"></i> {{ post.dislikes }}
                        </span>
                        <span class=\"score-badge\" title=\"Help Meter score\">
                            <i class=\"bi bi-star-half me-1\"></i>{{ postScore }}
                        </span>
                        {% if earnedAchievement %}
                            <span class=\"achiev-earned\" title=\"Required score: {{ earnedAchievement.achievementScore }}\">
                                <i class=\"bi bi-trophy-fill\"></i>
                                {{ earnedAchievement.achievementName }}
                            </span>
                        {% endif %}
                    </div>
                </div>

                <div class=\"action-group\">
                    <a href=\"{{ path('back_post_stats', {id: post.id}) }}\"
                       class=\"btn btn-xs btn-outline-warning\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Stats\">
                        <i class=\"bi bi-bar-chart-line\"></i>
                    </a>
                    <a href=\"{{ path('back_post_edit', {id: post.id}) }}\"
                       class=\"btn btn-xs btn-outline-secondary\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Edit\">
                        <i class=\"bi bi-pencil\"></i>
                    </a>
                    <form method=\"post\" action=\"{{ path('back_post_delete', {id: post.id}) }}\"
                          onsubmit=\"return confirm('Delete this post and its comments?')\">
                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ post.id) }}\">
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
", "back/post/index.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/back/post/index.html.twig");
    }
}
