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

/* back/post/stats.html.twig */
class __TwigTemplate_486862628d5c4f4e097bc9d3d257daa2 extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/post/stats.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/post/stats.html.twig"));

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

        yield "Post Stats #";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 3, $this->source); })()), "id", [], "any", false, false, false, 3), "html", null, true);
        yield " — Admin MindBoost";
        
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

        yield "Post Stats — ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 4, $this->source); })()), "title", [], "any", false, false, false, 4), 0, 40), "html", null, true);
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 4, $this->source); })()), "title", [], "any", false, false, false, 4)) > 40)) {
            yield "…";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 7
        yield "<style>
    .kpi-card { border-radius: 14px; padding: 1.25rem 1.5rem; position: relative; overflow: hidden; }
    .kpi-card .kpi-value { font-size: 2rem; font-weight: 700; line-height: 1.1; }
    .kpi-card .kpi-label { font-size: .8rem; text-transform: uppercase; letter-spacing: .8px; opacity: .75; margin-top: .2rem; }
    .kpi-card .kpi-icon { position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); font-size: 3.5rem; opacity: .12; }
    .kpi-likes    { background: linear-gradient(135deg,#2ECC71,#27AE60); color: #fff; }
    .kpi-dislikes { background: linear-gradient(135deg,#E74C3C,#C0392B); color: #fff; }
    .kpi-help     { background: linear-gradient(135deg,#3498DB,#2980B9); color: #fff; }
    .kpi-saves    { background: linear-gradient(135deg,#9B59B6,#8E44AD); color: #fff; }
    .kpi-comments { background: linear-gradient(135deg,#F39C12,#E67E22); color: #fff; }
    .kpi-engage   { background: linear-gradient(135deg,#1ABC9C,#16A085); color: #fff; }
    .chart-card   { background: rgba(255,255,255,0.06) !important; border: 1px solid rgba(255,255,255,0.08) !important; border-radius: 14px; padding: 1.25rem; }
    .chart-title  { font-size: .85rem; font-weight: 600; text-transform: uppercase; letter-spacing: .7px; color: #9A8CFF; margin-bottom: 1rem; }
    .ratio-bar-wrap { height: 24px; border-radius: 12px; overflow: hidden; background: rgba(255,255,255,0.08); }
    .ratio-bar-fill { height: 100%; border-radius: 12px; transition: width .6s ease; }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 25
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

        // line 27
        yield "<nav aria-label=\"breadcrumb\" class=\"mb-3\">
    <ol class=\"breadcrumb\" style=\"background:transparent;padding:0;\">
        <li class=\"breadcrumb-item\"><a href=\"";
        // line 29
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_post_index");
        yield "\">Posts</a></li>
        <li class=\"breadcrumb-item active text-muted\">Stats #";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 30, $this->source); })()), "id", [], "any", false, false, false, 30), "html", null, true);
        yield "</li>
    </ol>
</nav>

";
        // line 35
        yield "<div class=\"card mb-4 p-3\">
    <div class=\"d-flex align-items-start gap-3 flex-wrap\">
        ";
        // line 37
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 37, $this->source); })()), "imageUrl", [], "any", false, false, false, 37)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 38
            yield "        <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 38, $this->source); })()), "imageUrl", [], "any", false, false, false, 38), "html", null, true);
            yield "\" alt=\"\" style=\"width:80px;height:80px;object-fit:cover;border-radius:10px;\">
        ";
        }
        // line 40
        yield "        <div>
            <h4 class=\"mb-1\">";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 41, $this->source); })()), "title", [], "any", false, false, false, 41), "html", null, true);
        yield "</h4>
            <div class=\"d-flex gap-3 flex-wrap\">
                <span class=\"text-muted small\"><i class=\"bi bi-person-fill me-1\"></i>User ID: <strong class=\"text-white\">";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 43, $this->source); })()), "userId", [], "any", false, false, false, 43), "html", null, true);
        yield "</strong></span>
                ";
        // line 44
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 44, $this->source); })()), "tag", [], "any", false, false, false, 44)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<span class=\"badge bg-secondary\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 44, $this->source); })()), "tag", [], "any", false, false, false, 44), "html", null, true);
            yield "</span>";
        }
        // line 45
        yield "                ";
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 45, $this->source); })()), "achievementId", [], "any", false, false, false, 45)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<span class=\"text-muted small\"><i class=\"bi bi-trophy me-1\"></i>Achievement #";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 45, $this->source); })()), "achievementId", [], "any", false, false, false, 45), "html", null, true);
            yield "</span>";
        }
        // line 46
        yield "            </div>
        </div>
        <a href=\"";
        // line 48
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_post_index");
        yield "\" class=\"btn btn-sm btn-outline-secondary ms-auto\">
            <i class=\"bi bi-arrow-left me-1\"></i>Back
        </a>
    </div>
</div>

";
        // line 55
        yield "<div class=\"row g-3 mb-4\">
    <div class=\"col-6 col-md-4 col-xl-2\">
        <div class=\"kpi-card kpi-likes\">
            <div class=\"kpi-value\">";
        // line 58
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 58, $this->source); })()), "likes", [], "any", false, false, false, 58), "html", null, true);
        yield "</div>
            <div class=\"kpi-label\">Likes</div>
            <i class=\"bi bi-hand-thumbs-up kpi-icon\"></i>
        </div>
    </div>
    <div class=\"col-6 col-md-4 col-xl-2\">
        <div class=\"kpi-card kpi-dislikes\">
            <div class=\"kpi-value\">";
        // line 65
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 65, $this->source); })()), "dislikes", [], "any", false, false, false, 65), "html", null, true);
        yield "</div>
            <div class=\"kpi-label\">Dislikes</div>
            <i class=\"bi bi-hand-thumbs-down kpi-icon\"></i>
        </div>
    </div>
    <div class=\"col-6 col-md-4 col-xl-2\">
        <div class=\"kpi-card kpi-help\">
            <div class=\"kpi-value\">";
        // line 72
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 72, $this->source); })()), "helpMeter", [], "any", false, false, false, 72), "html", null, true);
        yield "</div>
            <div class=\"kpi-label\">Help Meter</div>
            <i class=\"bi bi-heart-pulse kpi-icon\"></i>
        </div>
    </div>
    <div class=\"col-6 col-md-4 col-xl-2\">
        <div class=\"kpi-card kpi-comments\">
            <div class=\"kpi-value\">";
        // line 79
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["commentCount"]) || array_key_exists("commentCount", $context) ? $context["commentCount"] : (function () { throw new RuntimeError('Variable "commentCount" does not exist.', 79, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"kpi-label\">Comments</div>
            <i class=\"bi bi-chat-dots kpi-icon\"></i>
        </div>
    </div>
    <div class=\"col-6 col-md-4 col-xl-2\">
        <div class=\"kpi-card kpi-saves\">
            <div class=\"kpi-value\">";
        // line 86
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["savesCount"]) || array_key_exists("savesCount", $context) ? $context["savesCount"] : (function () { throw new RuntimeError('Variable "savesCount" does not exist.', 86, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"kpi-label\">Saves</div>
            <i class=\"bi bi-bookmark-star kpi-icon\"></i>
        </div>
    </div>
    <div class=\"col-6 col-md-4 col-xl-2\">
        <div class=\"kpi-card kpi-engage\">
            <div class=\"kpi-value\">";
        // line 93
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["engagementRate"]) || array_key_exists("engagementRate", $context) ? $context["engagementRate"] : (function () { throw new RuntimeError('Variable "engagementRate" does not exist.', 93, $this->source); })()), "html", null, true);
        yield "%</div>
            <div class=\"kpi-label\">Engagement</div>
            <i class=\"bi bi-lightning-charge kpi-icon\"></i>
        </div>
    </div>
</div>

";
        // line 101
        yield "<div class=\"card mb-4 p-3\">
    <div class=\"chart-title\">Interaction Breakdown</div>
    <div class=\"row g-3\">
        <div class=\"col-md-4\">
            <div class=\"d-flex justify-content-between mb-1\">
                <small class=\"text-success\">Like Rate</small>
                <small class=\"text-success fw-bold\">";
        // line 107
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["likeRate"]) || array_key_exists("likeRate", $context) ? $context["likeRate"] : (function () { throw new RuntimeError('Variable "likeRate" does not exist.', 107, $this->source); })()), "html", null, true);
        yield "%</small>
            </div>
            <div class=\"ratio-bar-wrap\">
                <div class=\"ratio-bar-fill bg-success\" style=\"width:";
        // line 110
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["likeRate"]) || array_key_exists("likeRate", $context) ? $context["likeRate"] : (function () { throw new RuntimeError('Variable "likeRate" does not exist.', 110, $this->source); })()), "html", null, true);
        yield "%\"></div>
            </div>
        </div>
        <div class=\"col-md-4\">
            <div class=\"d-flex justify-content-between mb-1\">
                <small class=\"text-danger\">Dislike Rate</small>
                <small class=\"text-danger fw-bold\">";
        // line 116
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["dislikeRate"]) || array_key_exists("dislikeRate", $context) ? $context["dislikeRate"] : (function () { throw new RuntimeError('Variable "dislikeRate" does not exist.', 116, $this->source); })()), "html", null, true);
        yield "%</small>
            </div>
            <div class=\"ratio-bar-wrap\">
                <div class=\"ratio-bar-fill bg-danger\" style=\"width:";
        // line 119
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["dislikeRate"]) || array_key_exists("dislikeRate", $context) ? $context["dislikeRate"] : (function () { throw new RuntimeError('Variable "dislikeRate" does not exist.', 119, $this->source); })()), "html", null, true);
        yield "%\"></div>
            </div>
        </div>
        <div class=\"col-md-4\">
            <div class=\"d-flex justify-content-between mb-1\">
                <small class=\"text-info\">Help Rate</small>
                <small class=\"text-info fw-bold\">";
        // line 125
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["helpRate"]) || array_key_exists("helpRate", $context) ? $context["helpRate"] : (function () { throw new RuntimeError('Variable "helpRate" does not exist.', 125, $this->source); })()), "html", null, true);
        yield "%</small>
            </div>
            <div class=\"ratio-bar-wrap\">
                <div class=\"ratio-bar-fill bg-info\" style=\"width:";
        // line 128
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["helpRate"]) || array_key_exists("helpRate", $context) ? $context["helpRate"] : (function () { throw new RuntimeError('Variable "helpRate" does not exist.', 128, $this->source); })()), "html", null, true);
        yield "%\"></div>
            </div>
        </div>
        <div class=\"col-md-4\">
            <div class=\"d-flex justify-content-between mb-1\">
                <small style=\"color:#9A8CFF\">Comment Positivity</small>
                <small style=\"color:#9A8CFF\" class=\"fw-bold\">";
        // line 134
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["commentPositiveRate"]) || array_key_exists("commentPositiveRate", $context) ? $context["commentPositiveRate"] : (function () { throw new RuntimeError('Variable "commentPositiveRate" does not exist.', 134, $this->source); })()), "html", null, true);
        yield "%</small>
            </div>
            <div class=\"ratio-bar-wrap\">
                <div class=\"ratio-bar-fill\" style=\"width:";
        // line 137
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["commentPositiveRate"]) || array_key_exists("commentPositiveRate", $context) ? $context["commentPositiveRate"] : (function () { throw new RuntimeError('Variable "commentPositiveRate" does not exist.', 137, $this->source); })()), "html", null, true);
        yield "%;background:#9A8CFF\"></div>
            </div>
        </div>
        <div class=\"col-md-4\">
            <div class=\"d-flex justify-content-between mb-1\">
                <small style=\"color:#F39C12\">Comments per Interaction</small>
                ";
        // line 143
        $context["commentRatio"] = ((((isset($context["totalInteractions"]) || array_key_exists("totalInteractions", $context) ? $context["totalInteractions"] : (function () { throw new RuntimeError('Variable "totalInteractions" does not exist.', 143, $this->source); })()) > 0)) ? (Twig\Extension\CoreExtension::round((((isset($context["commentCount"]) || array_key_exists("commentCount", $context) ? $context["commentCount"] : (function () { throw new RuntimeError('Variable "commentCount" does not exist.', 143, $this->source); })()) / (isset($context["totalInteractions"]) || array_key_exists("totalInteractions", $context) ? $context["totalInteractions"] : (function () { throw new RuntimeError('Variable "totalInteractions" does not exist.', 143, $this->source); })())) * 100), 1)) : (0));
        // line 144
        yield "                <small style=\"color:#F39C12\" class=\"fw-bold\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["commentRatio"]) || array_key_exists("commentRatio", $context) ? $context["commentRatio"] : (function () { throw new RuntimeError('Variable "commentRatio" does not exist.', 144, $this->source); })()), "html", null, true);
        yield "%</small>
            </div>
            <div class=\"ratio-bar-wrap\">
                <div class=\"ratio-bar-fill\" style=\"width:";
        // line 147
        yield ((((isset($context["commentRatio"]) || array_key_exists("commentRatio", $context) ? $context["commentRatio"] : (function () { throw new RuntimeError('Variable "commentRatio" does not exist.', 147, $this->source); })()) > 100)) ? (100) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["commentRatio"]) || array_key_exists("commentRatio", $context) ? $context["commentRatio"] : (function () { throw new RuntimeError('Variable "commentRatio" does not exist.', 147, $this->source); })()), "html", null, true)));
        yield "%;background:#F39C12\"></div>
            </div>
        </div>
        <div class=\"col-md-4\">
            <div class=\"d-flex justify-content-between mb-1\">
                <small style=\"color:#1ABC9C\">Save Rate</small>
                ";
        // line 153
        $context["saveRatio"] = ((((isset($context["totalInteractions"]) || array_key_exists("totalInteractions", $context) ? $context["totalInteractions"] : (function () { throw new RuntimeError('Variable "totalInteractions" does not exist.', 153, $this->source); })()) > 0)) ? (Twig\Extension\CoreExtension::round((((isset($context["savesCount"]) || array_key_exists("savesCount", $context) ? $context["savesCount"] : (function () { throw new RuntimeError('Variable "savesCount" does not exist.', 153, $this->source); })()) / (isset($context["totalInteractions"]) || array_key_exists("totalInteractions", $context) ? $context["totalInteractions"] : (function () { throw new RuntimeError('Variable "totalInteractions" does not exist.', 153, $this->source); })())) * 100), 1)) : (0));
        // line 154
        yield "                <small style=\"color:#1ABC9C\" class=\"fw-bold\">";
        yield ((((isset($context["saveRatio"]) || array_key_exists("saveRatio", $context) ? $context["saveRatio"] : (function () { throw new RuntimeError('Variable "saveRatio" does not exist.', 154, $this->source); })()) > 100)) ? (100) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["saveRatio"]) || array_key_exists("saveRatio", $context) ? $context["saveRatio"] : (function () { throw new RuntimeError('Variable "saveRatio" does not exist.', 154, $this->source); })()), "html", null, true)));
        yield "%</small>
            </div>
            <div class=\"ratio-bar-wrap\">
                <div class=\"ratio-bar-fill\" style=\"width:";
        // line 157
        yield ((((isset($context["saveRatio"]) || array_key_exists("saveRatio", $context) ? $context["saveRatio"] : (function () { throw new RuntimeError('Variable "saveRatio" does not exist.', 157, $this->source); })()) > 100)) ? (100) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["saveRatio"]) || array_key_exists("saveRatio", $context) ? $context["saveRatio"] : (function () { throw new RuntimeError('Variable "saveRatio" does not exist.', 157, $this->source); })()), "html", null, true)));
        yield "%;background:#1ABC9C\"></div>
            </div>
        </div>
    </div>
</div>

";
        // line 164
        yield "<div class=\"row g-3 mb-3\">
    ";
        // line 166
        yield "    <div class=\"col-md-4\">
        <div class=\"chart-card h-100\">
            <div class=\"chart-title\"><i class=\"bi bi-pie-chart-fill me-1\"></i>Post Likes vs Dislikes</div>
            <canvas id=\"chartLikesDislikes\" height=\"220\"></canvas>
        </div>
    </div>

    ";
        // line 174
        yield "    <div class=\"col-md-8\">
        <div class=\"chart-card h-100\">
            <div class=\"chart-title\"><i class=\"bi bi-bar-chart-fill me-1\"></i>Overall Engagement Metrics</div>
            <canvas id=\"chartEngagement\" height=\"220\"></canvas>
        </div>
    </div>
</div>

";
        // line 183
        yield "<div class=\"row g-3 mb-3\">
    ";
        // line 185
        yield "    <div class=\"col-md-4\">
        <div class=\"chart-card h-100\">
            <div class=\"chart-title\"><i class=\"bi bi-chat-heart-fill me-1\"></i>Comment Sentiment</div>
            ";
        // line 188
        if (((isset($context["commentCount"]) || array_key_exists("commentCount", $context) ? $context["commentCount"] : (function () { throw new RuntimeError('Variable "commentCount" does not exist.', 188, $this->source); })()) > 0)) {
            // line 189
            yield "            <canvas id=\"chartCommentSentiment\" height=\"220\"></canvas>
            ";
        } else {
            // line 191
            yield "            <div class=\"text-center text-muted py-5\"><i class=\"bi bi-chat-slash display-5\"></i><p class=\"mt-2\">No comments yet</p></div>
            ";
        }
        // line 193
        yield "        </div>
    </div>

    ";
        // line 197
        yield "    <div class=\"col-md-8\">
        <div class=\"chart-card h-100\">
            <div class=\"chart-title\"><i class=\"bi bi-graph-up me-1\"></i>Per-Comment Engagement (Line)</div>
            ";
        // line 200
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["commentEngagement"]) || array_key_exists("commentEngagement", $context) ? $context["commentEngagement"] : (function () { throw new RuntimeError('Variable "commentEngagement" does not exist.', 200, $this->source); })())) > 0)) {
            // line 201
            yield "            <canvas id=\"chartCommentLine\" height=\"220\"></canvas>
            ";
        } else {
            // line 203
            yield "            <div class=\"text-center text-muted py-5\"><i class=\"bi bi-chat-slash display-5\"></i><p class=\"mt-2\">No comments to chart</p></div>
            ";
        }
        // line 205
        yield "        </div>
    </div>
</div>

";
        // line 210
        yield "<div class=\"row g-3 mb-4\">
    ";
        // line 212
        yield "    <div class=\"col-md-6\">
        <div class=\"chart-card h-100\">
            <div class=\"chart-title\"><i class=\"bi bi-people-fill me-1\"></i>Top Commenters by User ID</div>
            ";
        // line 215
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["commentsPerUser"]) || array_key_exists("commentsPerUser", $context) ? $context["commentsPerUser"] : (function () { throw new RuntimeError('Variable "commentsPerUser" does not exist.', 215, $this->source); })())) > 0)) {
            // line 216
            yield "            <canvas id=\"chartTopCommenters\" height=\"260\"></canvas>
            ";
        } else {
            // line 218
            yield "            <div class=\"text-center text-muted py-5\"><i class=\"bi bi-people display-5\"></i><p class=\"mt-2\">No commenters yet</p></div>
            ";
        }
        // line 220
        yield "        </div>
    </div>

    ";
        // line 224
        yield "    <div class=\"col-md-6\">
        <div class=\"chart-card h-100\">
            <div class=\"chart-title\"><i class=\"bi bi-donut me-1\"></i>Full Interaction Mix</div>
            <canvas id=\"chartMix\" height=\"260\"></canvas>
        </div>
    </div>
</div>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 234
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 235
        yield "<script src=\"https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js\"></script>
<script>
Chart.defaults.color = '#9B9BB0';
Chart.defaults.borderColor = 'rgba(255,255,255,0.08)';

const palette = {
    green:  '#2ECC71',
    red:    '#E74C3C',
    blue:   '#3498DB',
    purple: '#9B59B6',
    orange: '#F39C12',
    teal:   '#1ABC9C',
    violet: '#9A8CFF',
};

// ── Chart 1: Likes vs Dislikes (Doughnut) ──
new Chart(document.getElementById('chartLikesDislikes'), {
    type: 'doughnut',
    data: {
        labels: ['Likes', 'Dislikes'],
        datasets: [{
            data: [";
        // line 256
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 256, $this->source); })()), "likes", [], "any", false, false, false, 256), "html", null, true);
        yield ", ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 256, $this->source); })()), "dislikes", [], "any", false, false, false, 256), "html", null, true);
        yield "],
            backgroundColor: [palette.green, palette.red],
            borderWidth: 0,
            hoverOffset: 8,
        }]
    },
    options: {
        cutout: '65%',
        plugins: {
            legend: { position: 'bottom', labels: { padding: 14, boxWidth: 12 } },
            tooltip: { callbacks: { label: ctx => ` \${ctx.label}: \${ctx.raw}` } }
        }
    }
});

// ── Chart 2: Overall Engagement Bar ──
new Chart(document.getElementById('chartEngagement'), {
    type: 'bar',
    data: {
        labels: ['Likes', 'Dislikes', 'Help Meter', 'Comments', 'Saves'],
        datasets: [{
            label: 'Count',
            data: [";
        // line 278
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 278, $this->source); })()), "likes", [], "any", false, false, false, 278), "html", null, true);
        yield ", ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 278, $this->source); })()), "dislikes", [], "any", false, false, false, 278), "html", null, true);
        yield ", ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 278, $this->source); })()), "helpMeter", [], "any", false, false, false, 278), "html", null, true);
        yield ", ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["commentCount"]) || array_key_exists("commentCount", $context) ? $context["commentCount"] : (function () { throw new RuntimeError('Variable "commentCount" does not exist.', 278, $this->source); })()), "html", null, true);
        yield ", ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["savesCount"]) || array_key_exists("savesCount", $context) ? $context["savesCount"] : (function () { throw new RuntimeError('Variable "savesCount" does not exist.', 278, $this->source); })()), "html", null, true);
        yield "],
            backgroundColor: [palette.green, palette.red, palette.blue, palette.orange, palette.purple],
            borderRadius: 8,
            borderSkipped: false,
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
            y: { beginAtZero: true, ticks: { stepSize: 1 }, grid: { color: 'rgba(255,255,255,0.06)' } },
            x: { grid: { display: false } }
        }
    }
});

";
        // line 294
        if (((isset($context["commentCount"]) || array_key_exists("commentCount", $context) ? $context["commentCount"] : (function () { throw new RuntimeError('Variable "commentCount" does not exist.', 294, $this->source); })()) > 0)) {
            // line 295
            yield "// ── Chart 3: Comment Sentiment (Doughnut) ──
new Chart(document.getElementById('chartCommentSentiment'), {
    type: 'doughnut',
    data: {
        labels: ['Comment Likes', 'Comment Dislikes'],
        datasets: [{
            data: [";
            // line 301
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["commentLikes"]) || array_key_exists("commentLikes", $context) ? $context["commentLikes"] : (function () { throw new RuntimeError('Variable "commentLikes" does not exist.', 301, $this->source); })()), "html", null, true);
            yield ", ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["commentDislikes"]) || array_key_exists("commentDislikes", $context) ? $context["commentDislikes"] : (function () { throw new RuntimeError('Variable "commentDislikes" does not exist.', 301, $this->source); })()), "html", null, true);
            yield "],
            backgroundColor: [palette.teal, palette.red],
            borderWidth: 0,
            hoverOffset: 8,
        }]
    },
    options: {
        cutout: '65%',
        plugins: {
            legend: { position: 'bottom', labels: { padding: 14, boxWidth: 12 } },
            tooltip: { callbacks: { label: ctx => ` \${ctx.label}: \${ctx.raw}` } }
        }
    }
});
";
        }
        // line 316
        yield "
";
        // line 317
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["commentEngagement"]) || array_key_exists("commentEngagement", $context) ? $context["commentEngagement"] : (function () { throw new RuntimeError('Variable "commentEngagement" does not exist.', 317, $this->source); })())) > 0)) {
            // line 318
            yield "// ── Chart 4: Per-Comment Engagement (Line) ──
const ceLabels  = [";
            // line 319
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["commentEngagement"]) || array_key_exists("commentEngagement", $context) ? $context["commentEngagement"] : (function () { throw new RuntimeError('Variable "commentEngagement" does not exist.', 319, $this->source); })()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                yield "'";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "label", [], "any", false, false, false, 319), "html", null, true);
                yield "'";
                if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 319)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield ",";
                }
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
            unset($context['_seq'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            yield "];
const ceLikes    = [";
            // line 320
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["commentEngagement"]) || array_key_exists("commentEngagement", $context) ? $context["commentEngagement"] : (function () { throw new RuntimeError('Variable "commentEngagement" does not exist.', 320, $this->source); })()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "likes", [], "any", false, false, false, 320), "html", null, true);
                if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 320)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield ",";
                }
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
            unset($context['_seq'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            yield "];
const ceDislikes = [";
            // line 321
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["commentEngagement"]) || array_key_exists("commentEngagement", $context) ? $context["commentEngagement"] : (function () { throw new RuntimeError('Variable "commentEngagement" does not exist.', 321, $this->source); })()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "dislikes", [], "any", false, false, false, 321), "html", null, true);
                if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 321)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield ",";
                }
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
            unset($context['_seq'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            yield "];

new Chart(document.getElementById('chartCommentLine'), {
    type: 'line',
    data: {
        labels: ceLabels,
        datasets: [
            {
                label: 'Likes',
                data: ceLikes,
                borderColor: palette.green,
                backgroundColor: 'rgba(46,204,113,0.12)',
                tension: 0.35,
                fill: true,
                pointRadius: 5,
                pointHoverRadius: 7,
            },
            {
                label: 'Dislikes',
                data: ceDislikes,
                borderColor: palette.red,
                backgroundColor: 'rgba(231,76,60,0.10)',
                tension: 0.35,
                fill: true,
                pointRadius: 5,
                pointHoverRadius: 7,
            }
        ]
    },
    options: {
        responsive: true,
        interaction: { mode: 'index', intersect: false },
        plugins: { legend: { position: 'bottom', labels: { padding: 14, boxWidth: 12 } } },
        scales: {
            y: { beginAtZero: true, ticks: { stepSize: 1 }, grid: { color: 'rgba(255,255,255,0.06)' } },
            x: { grid: { display: false } }
        }
    }
});
";
        }
        // line 361
        yield "
";
        // line 362
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["commentsPerUser"]) || array_key_exists("commentsPerUser", $context) ? $context["commentsPerUser"] : (function () { throw new RuntimeError('Variable "commentsPerUser" does not exist.', 362, $this->source); })())) > 0)) {
            // line 363
            yield "// ── Chart 5: Top Commenters Bar ──
const topUsers  = [";
            // line 364
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["commentsPerUser"]) || array_key_exists("commentsPerUser", $context) ? $context["commentsPerUser"] : (function () { throw new RuntimeError('Variable "commentsPerUser" does not exist.', 364, $this->source); })()));
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
            foreach ($context['_seq'] as $context["uid"] => $context["cnt"]) {
                yield "'User ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["uid"], "html", null, true);
                yield "'";
                if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 364)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield ",";
                }
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
            unset($context['_seq'], $context['uid'], $context['cnt'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            yield "];
const topCounts = [";
            // line 365
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["commentsPerUser"]) || array_key_exists("commentsPerUser", $context) ? $context["commentsPerUser"] : (function () { throw new RuntimeError('Variable "commentsPerUser" does not exist.', 365, $this->source); })()));
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
            foreach ($context['_seq'] as $context["uid"] => $context["cnt"]) {
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["cnt"], "html", null, true);
                if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 365)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield ",";
                }
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
            unset($context['_seq'], $context['uid'], $context['cnt'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            yield "];

new Chart(document.getElementById('chartTopCommenters'), {
    type: 'bar',
    data: {
        labels: topUsers,
        datasets: [{
            label: 'Comments',
            data: topCounts,
            backgroundColor: palette.violet,
            borderRadius: 8,
            borderSkipped: false,
        }]
    },
    options: {
        indexAxis: 'y',
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
            x: { beginAtZero: true, ticks: { stepSize: 1 }, grid: { color: 'rgba(255,255,255,0.06)' } },
            y: { grid: { display: false } }
        }
    }
});
";
        }
        // line 390
        yield "
// ── Chart 6: Full Interaction Mix Doughnut ──
new Chart(document.getElementById('chartMix'), {
    type: 'doughnut',
    data: {
        labels: ['Post Likes', 'Post Dislikes', 'Help Meter', 'Comment Likes', 'Comment Dislikes', 'Saves'],
        datasets: [{
            data: [";
        // line 397
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 397, $this->source); })()), "likes", [], "any", false, false, false, 397), "html", null, true);
        yield ", ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 397, $this->source); })()), "dislikes", [], "any", false, false, false, 397), "html", null, true);
        yield ", ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 397, $this->source); })()), "helpMeter", [], "any", false, false, false, 397), "html", null, true);
        yield ", ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["commentLikes"]) || array_key_exists("commentLikes", $context) ? $context["commentLikes"] : (function () { throw new RuntimeError('Variable "commentLikes" does not exist.', 397, $this->source); })()), "html", null, true);
        yield ", ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["commentDislikes"]) || array_key_exists("commentDislikes", $context) ? $context["commentDislikes"] : (function () { throw new RuntimeError('Variable "commentDislikes" does not exist.', 397, $this->source); })()), "html", null, true);
        yield ", ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["savesCount"]) || array_key_exists("savesCount", $context) ? $context["savesCount"] : (function () { throw new RuntimeError('Variable "savesCount" does not exist.', 397, $this->source); })()), "html", null, true);
        yield "],
            backgroundColor: [palette.green, palette.red, palette.blue, palette.teal, palette.orange, palette.purple],
            borderWidth: 0,
            hoverOffset: 10,
        }]
    },
    options: {
        cutout: '55%',
        plugins: {
            legend: { position: 'bottom', labels: { padding: 12, boxWidth: 12 } },
            tooltip: { callbacks: { label: ctx => ` \${ctx.label}: \${ctx.raw}` } }
        }
    }
});
</script>
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
        return "back/post/stats.html.twig";
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
        return array (  901 => 397,  892 => 390,  833 => 365,  796 => 364,  793 => 363,  791 => 362,  788 => 361,  714 => 321,  679 => 320,  642 => 319,  639 => 318,  637 => 317,  634 => 316,  614 => 301,  606 => 295,  604 => 294,  577 => 278,  550 => 256,  527 => 235,  514 => 234,  495 => 224,  490 => 220,  486 => 218,  482 => 216,  480 => 215,  475 => 212,  472 => 210,  466 => 205,  462 => 203,  458 => 201,  456 => 200,  451 => 197,  446 => 193,  442 => 191,  438 => 189,  436 => 188,  431 => 185,  428 => 183,  418 => 174,  409 => 166,  406 => 164,  397 => 157,  390 => 154,  388 => 153,  379 => 147,  372 => 144,  370 => 143,  361 => 137,  355 => 134,  346 => 128,  340 => 125,  331 => 119,  325 => 116,  316 => 110,  310 => 107,  302 => 101,  292 => 93,  282 => 86,  272 => 79,  262 => 72,  252 => 65,  242 => 58,  237 => 55,  228 => 48,  224 => 46,  217 => 45,  211 => 44,  207 => 43,  202 => 41,  199 => 40,  193 => 38,  191 => 37,  187 => 35,  180 => 30,  176 => 29,  172 => 27,  159 => 25,  132 => 7,  119 => 6,  92 => 4,  67 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}Post Stats #{{ post.id }} — Admin MindBoost{% endblock %}
{% block page_title %}Post Stats — {{ post.title|slice(0,40) }}{% if post.title|length > 40 %}…{% endif %}{% endblock %}

{% block stylesheets %}
<style>
    .kpi-card { border-radius: 14px; padding: 1.25rem 1.5rem; position: relative; overflow: hidden; }
    .kpi-card .kpi-value { font-size: 2rem; font-weight: 700; line-height: 1.1; }
    .kpi-card .kpi-label { font-size: .8rem; text-transform: uppercase; letter-spacing: .8px; opacity: .75; margin-top: .2rem; }
    .kpi-card .kpi-icon { position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); font-size: 3.5rem; opacity: .12; }
    .kpi-likes    { background: linear-gradient(135deg,#2ECC71,#27AE60); color: #fff; }
    .kpi-dislikes { background: linear-gradient(135deg,#E74C3C,#C0392B); color: #fff; }
    .kpi-help     { background: linear-gradient(135deg,#3498DB,#2980B9); color: #fff; }
    .kpi-saves    { background: linear-gradient(135deg,#9B59B6,#8E44AD); color: #fff; }
    .kpi-comments { background: linear-gradient(135deg,#F39C12,#E67E22); color: #fff; }
    .kpi-engage   { background: linear-gradient(135deg,#1ABC9C,#16A085); color: #fff; }
    .chart-card   { background: rgba(255,255,255,0.06) !important; border: 1px solid rgba(255,255,255,0.08) !important; border-radius: 14px; padding: 1.25rem; }
    .chart-title  { font-size: .85rem; font-weight: 600; text-transform: uppercase; letter-spacing: .7px; color: #9A8CFF; margin-bottom: 1rem; }
    .ratio-bar-wrap { height: 24px; border-radius: 12px; overflow: hidden; background: rgba(255,255,255,0.08); }
    .ratio-bar-fill { height: 100%; border-radius: 12px; transition: width .6s ease; }
</style>
{% endblock %}

{% block body %}
{# ── Breadcrumb ── #}
<nav aria-label=\"breadcrumb\" class=\"mb-3\">
    <ol class=\"breadcrumb\" style=\"background:transparent;padding:0;\">
        <li class=\"breadcrumb-item\"><a href=\"{{ path('back_post_index') }}\">Posts</a></li>
        <li class=\"breadcrumb-item active text-muted\">Stats #{{ post.id }}</li>
    </ol>
</nav>

{# ── Post header info ── #}
<div class=\"card mb-4 p-3\">
    <div class=\"d-flex align-items-start gap-3 flex-wrap\">
        {% if post.imageUrl %}
        <img src=\"{{ post.imageUrl }}\" alt=\"\" style=\"width:80px;height:80px;object-fit:cover;border-radius:10px;\">
        {% endif %}
        <div>
            <h4 class=\"mb-1\">{{ post.title }}</h4>
            <div class=\"d-flex gap-3 flex-wrap\">
                <span class=\"text-muted small\"><i class=\"bi bi-person-fill me-1\"></i>User ID: <strong class=\"text-white\">{{ post.userId }}</strong></span>
                {% if post.tag %}<span class=\"badge bg-secondary\">{{ post.tag }}</span>{% endif %}
                {% if post.achievementId %}<span class=\"text-muted small\"><i class=\"bi bi-trophy me-1\"></i>Achievement #{{ post.achievementId }}</span>{% endif %}
            </div>
        </div>
        <a href=\"{{ path('back_post_index') }}\" class=\"btn btn-sm btn-outline-secondary ms-auto\">
            <i class=\"bi bi-arrow-left me-1\"></i>Back
        </a>
    </div>
</div>

{# ── KPI Cards ── #}
<div class=\"row g-3 mb-4\">
    <div class=\"col-6 col-md-4 col-xl-2\">
        <div class=\"kpi-card kpi-likes\">
            <div class=\"kpi-value\">{{ post.likes }}</div>
            <div class=\"kpi-label\">Likes</div>
            <i class=\"bi bi-hand-thumbs-up kpi-icon\"></i>
        </div>
    </div>
    <div class=\"col-6 col-md-4 col-xl-2\">
        <div class=\"kpi-card kpi-dislikes\">
            <div class=\"kpi-value\">{{ post.dislikes }}</div>
            <div class=\"kpi-label\">Dislikes</div>
            <i class=\"bi bi-hand-thumbs-down kpi-icon\"></i>
        </div>
    </div>
    <div class=\"col-6 col-md-4 col-xl-2\">
        <div class=\"kpi-card kpi-help\">
            <div class=\"kpi-value\">{{ post.helpMeter }}</div>
            <div class=\"kpi-label\">Help Meter</div>
            <i class=\"bi bi-heart-pulse kpi-icon\"></i>
        </div>
    </div>
    <div class=\"col-6 col-md-4 col-xl-2\">
        <div class=\"kpi-card kpi-comments\">
            <div class=\"kpi-value\">{{ commentCount }}</div>
            <div class=\"kpi-label\">Comments</div>
            <i class=\"bi bi-chat-dots kpi-icon\"></i>
        </div>
    </div>
    <div class=\"col-6 col-md-4 col-xl-2\">
        <div class=\"kpi-card kpi-saves\">
            <div class=\"kpi-value\">{{ savesCount }}</div>
            <div class=\"kpi-label\">Saves</div>
            <i class=\"bi bi-bookmark-star kpi-icon\"></i>
        </div>
    </div>
    <div class=\"col-6 col-md-4 col-xl-2\">
        <div class=\"kpi-card kpi-engage\">
            <div class=\"kpi-value\">{{ engagementRate }}%</div>
            <div class=\"kpi-label\">Engagement</div>
            <i class=\"bi bi-lightning-charge kpi-icon\"></i>
        </div>
    </div>
</div>

{# ── Ratio bars ── #}
<div class=\"card mb-4 p-3\">
    <div class=\"chart-title\">Interaction Breakdown</div>
    <div class=\"row g-3\">
        <div class=\"col-md-4\">
            <div class=\"d-flex justify-content-between mb-1\">
                <small class=\"text-success\">Like Rate</small>
                <small class=\"text-success fw-bold\">{{ likeRate }}%</small>
            </div>
            <div class=\"ratio-bar-wrap\">
                <div class=\"ratio-bar-fill bg-success\" style=\"width:{{ likeRate }}%\"></div>
            </div>
        </div>
        <div class=\"col-md-4\">
            <div class=\"d-flex justify-content-between mb-1\">
                <small class=\"text-danger\">Dislike Rate</small>
                <small class=\"text-danger fw-bold\">{{ dislikeRate }}%</small>
            </div>
            <div class=\"ratio-bar-wrap\">
                <div class=\"ratio-bar-fill bg-danger\" style=\"width:{{ dislikeRate }}%\"></div>
            </div>
        </div>
        <div class=\"col-md-4\">
            <div class=\"d-flex justify-content-between mb-1\">
                <small class=\"text-info\">Help Rate</small>
                <small class=\"text-info fw-bold\">{{ helpRate }}%</small>
            </div>
            <div class=\"ratio-bar-wrap\">
                <div class=\"ratio-bar-fill bg-info\" style=\"width:{{ helpRate }}%\"></div>
            </div>
        </div>
        <div class=\"col-md-4\">
            <div class=\"d-flex justify-content-between mb-1\">
                <small style=\"color:#9A8CFF\">Comment Positivity</small>
                <small style=\"color:#9A8CFF\" class=\"fw-bold\">{{ commentPositiveRate }}%</small>
            </div>
            <div class=\"ratio-bar-wrap\">
                <div class=\"ratio-bar-fill\" style=\"width:{{ commentPositiveRate }}%;background:#9A8CFF\"></div>
            </div>
        </div>
        <div class=\"col-md-4\">
            <div class=\"d-flex justify-content-between mb-1\">
                <small style=\"color:#F39C12\">Comments per Interaction</small>
                {% set commentRatio = totalInteractions > 0 ? (commentCount / totalInteractions * 100)|round(1) : 0 %}
                <small style=\"color:#F39C12\" class=\"fw-bold\">{{ commentRatio }}%</small>
            </div>
            <div class=\"ratio-bar-wrap\">
                <div class=\"ratio-bar-fill\" style=\"width:{{ commentRatio > 100 ? 100 : commentRatio }}%;background:#F39C12\"></div>
            </div>
        </div>
        <div class=\"col-md-4\">
            <div class=\"d-flex justify-content-between mb-1\">
                <small style=\"color:#1ABC9C\">Save Rate</small>
                {% set saveRatio = totalInteractions > 0 ? (savesCount / totalInteractions * 100)|round(1) : 0 %}
                <small style=\"color:#1ABC9C\" class=\"fw-bold\">{{ saveRatio > 100 ? 100 : saveRatio }}%</small>
            </div>
            <div class=\"ratio-bar-wrap\">
                <div class=\"ratio-bar-fill\" style=\"width:{{ saveRatio > 100 ? 100 : saveRatio }}%;background:#1ABC9C\"></div>
            </div>
        </div>
    </div>
</div>

{# ── Charts row 1 ── #}
<div class=\"row g-3 mb-3\">
    {# Chart 1 – Post Likes vs Dislikes donut #}
    <div class=\"col-md-4\">
        <div class=\"chart-card h-100\">
            <div class=\"chart-title\"><i class=\"bi bi-pie-chart-fill me-1\"></i>Post Likes vs Dislikes</div>
            <canvas id=\"chartLikesDislikes\" height=\"220\"></canvas>
        </div>
    </div>

    {# Chart 2 – Overall engagement bar #}
    <div class=\"col-md-8\">
        <div class=\"chart-card h-100\">
            <div class=\"chart-title\"><i class=\"bi bi-bar-chart-fill me-1\"></i>Overall Engagement Metrics</div>
            <canvas id=\"chartEngagement\" height=\"220\"></canvas>
        </div>
    </div>
</div>

{# ── Charts row 2 ── #}
<div class=\"row g-3 mb-3\">
    {# Chart 3 – Comment sentiment donut #}
    <div class=\"col-md-4\">
        <div class=\"chart-card h-100\">
            <div class=\"chart-title\"><i class=\"bi bi-chat-heart-fill me-1\"></i>Comment Sentiment</div>
            {% if commentCount > 0 %}
            <canvas id=\"chartCommentSentiment\" height=\"220\"></canvas>
            {% else %}
            <div class=\"text-center text-muted py-5\"><i class=\"bi bi-chat-slash display-5\"></i><p class=\"mt-2\">No comments yet</p></div>
            {% endif %}
        </div>
    </div>

    {# Chart 4 – Per-comment likes/dislikes line chart #}
    <div class=\"col-md-8\">
        <div class=\"chart-card h-100\">
            <div class=\"chart-title\"><i class=\"bi bi-graph-up me-1\"></i>Per-Comment Engagement (Line)</div>
            {% if commentEngagement|length > 0 %}
            <canvas id=\"chartCommentLine\" height=\"220\"></canvas>
            {% else %}
            <div class=\"text-center text-muted py-5\"><i class=\"bi bi-chat-slash display-5\"></i><p class=\"mt-2\">No comments to chart</p></div>
            {% endif %}
        </div>
    </div>
</div>

{# ── Charts row 3 ── #}
<div class=\"row g-3 mb-4\">
    {# Chart 5 – Top commenters bar #}
    <div class=\"col-md-6\">
        <div class=\"chart-card h-100\">
            <div class=\"chart-title\"><i class=\"bi bi-people-fill me-1\"></i>Top Commenters by User ID</div>
            {% if commentsPerUser|length > 0 %}
            <canvas id=\"chartTopCommenters\" height=\"260\"></canvas>
            {% else %}
            <div class=\"text-center text-muted py-5\"><i class=\"bi bi-people display-5\"></i><p class=\"mt-2\">No commenters yet</p></div>
            {% endif %}
        </div>
    </div>

    {# Chart 6 – Interaction mix doughnut (likes + dislikes + helpMeter + saves + comments) #}
    <div class=\"col-md-6\">
        <div class=\"chart-card h-100\">
            <div class=\"chart-title\"><i class=\"bi bi-donut me-1\"></i>Full Interaction Mix</div>
            <canvas id=\"chartMix\" height=\"260\"></canvas>
        </div>
    </div>
</div>

{% endblock %}

{% block javascripts %}
<script src=\"https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js\"></script>
<script>
Chart.defaults.color = '#9B9BB0';
Chart.defaults.borderColor = 'rgba(255,255,255,0.08)';

const palette = {
    green:  '#2ECC71',
    red:    '#E74C3C',
    blue:   '#3498DB',
    purple: '#9B59B6',
    orange: '#F39C12',
    teal:   '#1ABC9C',
    violet: '#9A8CFF',
};

// ── Chart 1: Likes vs Dislikes (Doughnut) ──
new Chart(document.getElementById('chartLikesDislikes'), {
    type: 'doughnut',
    data: {
        labels: ['Likes', 'Dislikes'],
        datasets: [{
            data: [{{ post.likes }}, {{ post.dislikes }}],
            backgroundColor: [palette.green, palette.red],
            borderWidth: 0,
            hoverOffset: 8,
        }]
    },
    options: {
        cutout: '65%',
        plugins: {
            legend: { position: 'bottom', labels: { padding: 14, boxWidth: 12 } },
            tooltip: { callbacks: { label: ctx => ` \${ctx.label}: \${ctx.raw}` } }
        }
    }
});

// ── Chart 2: Overall Engagement Bar ──
new Chart(document.getElementById('chartEngagement'), {
    type: 'bar',
    data: {
        labels: ['Likes', 'Dislikes', 'Help Meter', 'Comments', 'Saves'],
        datasets: [{
            label: 'Count',
            data: [{{ post.likes }}, {{ post.dislikes }}, {{ post.helpMeter }}, {{ commentCount }}, {{ savesCount }}],
            backgroundColor: [palette.green, palette.red, palette.blue, palette.orange, palette.purple],
            borderRadius: 8,
            borderSkipped: false,
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
            y: { beginAtZero: true, ticks: { stepSize: 1 }, grid: { color: 'rgba(255,255,255,0.06)' } },
            x: { grid: { display: false } }
        }
    }
});

{% if commentCount > 0 %}
// ── Chart 3: Comment Sentiment (Doughnut) ──
new Chart(document.getElementById('chartCommentSentiment'), {
    type: 'doughnut',
    data: {
        labels: ['Comment Likes', 'Comment Dislikes'],
        datasets: [{
            data: [{{ commentLikes }}, {{ commentDislikes }}],
            backgroundColor: [palette.teal, palette.red],
            borderWidth: 0,
            hoverOffset: 8,
        }]
    },
    options: {
        cutout: '65%',
        plugins: {
            legend: { position: 'bottom', labels: { padding: 14, boxWidth: 12 } },
            tooltip: { callbacks: { label: ctx => ` \${ctx.label}: \${ctx.raw}` } }
        }
    }
});
{% endif %}

{% if commentEngagement|length > 0 %}
// ── Chart 4: Per-Comment Engagement (Line) ──
const ceLabels  = [{% for c in commentEngagement %}'{{ c.label }}'{% if not loop.last %},{% endif %}{% endfor %}];
const ceLikes    = [{% for c in commentEngagement %}{{ c.likes }}{% if not loop.last %},{% endif %}{% endfor %}];
const ceDislikes = [{% for c in commentEngagement %}{{ c.dislikes }}{% if not loop.last %},{% endif %}{% endfor %}];

new Chart(document.getElementById('chartCommentLine'), {
    type: 'line',
    data: {
        labels: ceLabels,
        datasets: [
            {
                label: 'Likes',
                data: ceLikes,
                borderColor: palette.green,
                backgroundColor: 'rgba(46,204,113,0.12)',
                tension: 0.35,
                fill: true,
                pointRadius: 5,
                pointHoverRadius: 7,
            },
            {
                label: 'Dislikes',
                data: ceDislikes,
                borderColor: palette.red,
                backgroundColor: 'rgba(231,76,60,0.10)',
                tension: 0.35,
                fill: true,
                pointRadius: 5,
                pointHoverRadius: 7,
            }
        ]
    },
    options: {
        responsive: true,
        interaction: { mode: 'index', intersect: false },
        plugins: { legend: { position: 'bottom', labels: { padding: 14, boxWidth: 12 } } },
        scales: {
            y: { beginAtZero: true, ticks: { stepSize: 1 }, grid: { color: 'rgba(255,255,255,0.06)' } },
            x: { grid: { display: false } }
        }
    }
});
{% endif %}

{% if commentsPerUser|length > 0 %}
// ── Chart 5: Top Commenters Bar ──
const topUsers  = [{% for uid, cnt in commentsPerUser %}'User {{ uid }}'{% if not loop.last %},{% endif %}{% endfor %}];
const topCounts = [{% for uid, cnt in commentsPerUser %}{{ cnt }}{% if not loop.last %},{% endif %}{% endfor %}];

new Chart(document.getElementById('chartTopCommenters'), {
    type: 'bar',
    data: {
        labels: topUsers,
        datasets: [{
            label: 'Comments',
            data: topCounts,
            backgroundColor: palette.violet,
            borderRadius: 8,
            borderSkipped: false,
        }]
    },
    options: {
        indexAxis: 'y',
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
            x: { beginAtZero: true, ticks: { stepSize: 1 }, grid: { color: 'rgba(255,255,255,0.06)' } },
            y: { grid: { display: false } }
        }
    }
});
{% endif %}

// ── Chart 6: Full Interaction Mix Doughnut ──
new Chart(document.getElementById('chartMix'), {
    type: 'doughnut',
    data: {
        labels: ['Post Likes', 'Post Dislikes', 'Help Meter', 'Comment Likes', 'Comment Dislikes', 'Saves'],
        datasets: [{
            data: [{{ post.likes }}, {{ post.dislikes }}, {{ post.helpMeter }}, {{ commentLikes }}, {{ commentDislikes }}, {{ savesCount }}],
            backgroundColor: [palette.green, palette.red, palette.blue, palette.teal, palette.orange, palette.purple],
            borderWidth: 0,
            hoverOffset: 10,
        }]
    },
    options: {
        cutout: '55%',
        plugins: {
            legend: { position: 'bottom', labels: { padding: 12, boxWidth: 12 } },
            tooltip: { callbacks: { label: ctx => ` \${ctx.label}: \${ctx.raw}` } }
        }
    }
});
</script>
{% endblock %}
", "back/post/stats.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/back/post/stats.html.twig");
    }
}
