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

/* front/post/index.html.twig */
class __TwigTemplate_d7e4dfa5db3498178d2b202c3d1bfbe4 extends Template
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
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/post/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/post/index.html.twig"));

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

        yield "Posts — MindBoost";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <h2 class=\"fw-bold mb-0\"><i class=\"bi bi-file-post me-2 text-primary\"></i>Community Posts</h2>
    <a href=\"";
        // line 8
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_post_new");
        yield "\" class=\"btn btn-primary btn-sm\">
        <i class=\"bi bi-plus-lg me-1\"></i>New Post
    </a>
</div>

";
        // line 14
        yield "<div class=\"row g-3 mb-4\">
    <div class=\"col-md-4\">
        <div class=\"card text-center p-3\">
            <div class=\"fs-1 fw-bold text-primary\">";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalPosts"]) || array_key_exists("totalPosts", $context) ? $context["totalPosts"] : (function () { throw new RuntimeError('Variable "totalPosts" does not exist.', 17, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"text-muted small\">Total Posts</div>
        </div>
    </div>
    <div class=\"col-md-8\">
        ";
        // line 22
        if ((($tmp = (isset($context["mostLiked"]) || array_key_exists("mostLiked", $context) ? $context["mostLiked"] : (function () { throw new RuntimeError('Variable "mostLiked" does not exist.', 22, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 23
            yield "        <div class=\"card p-3\">
            <div class=\"text-muted small mb-1\"><i class=\"bi bi-heart-fill text-danger me-1\"></i>Most Liked Post</div>
            <a href=\"";
            // line 25
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_post_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["mostLiked"]) || array_key_exists("mostLiked", $context) ? $context["mostLiked"] : (function () { throw new RuntimeError('Variable "mostLiked" does not exist.', 25, $this->source); })()), "id", [], "any", false, false, false, 25)]), "html", null, true);
            yield "\" class=\"fw-bold text-decoration-none\" style=\"color:#17253a;\">
                ";
            // line 26
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mostLiked"]) || array_key_exists("mostLiked", $context) ? $context["mostLiked"] : (function () { throw new RuntimeError('Variable "mostLiked" does not exist.', 26, $this->source); })()), "title", [], "any", false, false, false, 26), "html", null, true);
            yield "
            </a>
            <span class=\"ms-2 badge bg-danger\">";
            // line 28
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mostLiked"]) || array_key_exists("mostLiked", $context) ? $context["mostLiked"] : (function () { throw new RuntimeError('Variable "mostLiked" does not exist.', 28, $this->source); })()), "likes", [], "any", false, false, false, 28), "html", null, true);
            yield " likes</span>
        </div>
        ";
        }
        // line 31
        yield "    </div>
</div>

";
        // line 35
        yield "<div class=\"card mb-4 p-3\">
    <form method=\"get\" class=\"row g-2 align-items-end\">
        <div class=\"col-md-6\">
            <input type=\"text\" name=\"search\" class=\"form-control\" placeholder=\"Search posts...\" value=\"";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 38, $this->source); })()), "html", null, true);
        yield "\">
        </div>
        <div class=\"col-md-4\">
            <input type=\"text\" name=\"tag\" class=\"form-control\" placeholder=\"Filter by tag...\" value=\"";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["tag"]) || array_key_exists("tag", $context) ? $context["tag"] : (function () { throw new RuntimeError('Variable "tag" does not exist.', 41, $this->source); })()), "html", null, true);
        yield "\">
        </div>
        <div class=\"col-md-2\">
            <button type=\"submit\" class=\"btn btn-outline-primary w-100\">
                <i class=\"bi bi-search\"></i> Search
            </button>
        </div>
    </form>
    ";
        // line 49
        if (((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 49, $this->source); })()) || (isset($context["tag"]) || array_key_exists("tag", $context) ? $context["tag"] : (function () { throw new RuntimeError('Variable "tag" does not exist.', 49, $this->source); })()))) {
            // line 50
            yield "    <div class=\"mt-2\">
        <a href=\"";
            // line 51
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_post_index");
            yield "\" class=\"btn btn-sm btn-outline-secondary\">
            <i class=\"bi bi-x-lg\"></i> Clear filters
        </a>
    </div>
    ";
        }
        // line 56
        yield "</div>

";
        // line 58
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 58, $this->source); })()))) {
            // line 59
            yield "    <div class=\"text-center py-5 text-muted\">
        <i class=\"bi bi-inbox display-4\"></i>
        <p class=\"mt-2\">No posts found.</p>
    </div>
";
        } else {
            // line 64
            yield "    <div class=\"row g-4\">
        ";
            // line 65
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 65, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 66
                yield "        <div class=\"col-md-6 col-lg-4\">
            <div class=\"card h-100\">
                ";
                // line 68
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "imageUrl", [], "any", false, false, false, 68)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 69
                    yield "                <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "imageUrl", [], "any", false, false, false, 69), "html", null, true);
                    yield "\" class=\"card-img-top\" alt=\"Post image\" style=\"height:180px;object-fit:cover;border-radius:12px 12px 0 0;\">
                ";
                }
                // line 71
                yield "                <div class=\"card-body d-flex flex-column\">
                    <div class=\"mb-2\">
                        ";
                // line 73
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "tag", [], "any", false, false, false, 73)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 74
                    yield "                        <span class=\"tag-badge\"><i class=\"bi bi-tag me-1\"></i>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "tag", [], "any", false, false, false, 74), "html", null, true);
                    yield "</span>
                        ";
                }
                // line 76
                yield "                    </div>
                    <h5 class=\"card-title fw-bold\">
                        <a href=\"";
                // line 78
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_post_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 78)]), "html", null, true);
                yield "\" class=\"text-decoration-none\" style=\"color:#111111;\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 78), "html", null, true);
                yield "</a>
                    </h5>
                    <p class=\"card-text flex-grow-1\" style=\"color:#9B9BB0;overflow:hidden;max-height:80px;\">
                        ";
                // line 81
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "content", [], "any", false, false, false, 81), 0, 150), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "content", [], "any", false, false, false, 81)) > 150)) {
                    yield "...";
                }
                // line 82
                yield "                    </p>
                    <div class=\"d-flex justify-content-between align-items-center mt-3\">
                        <div class=\"d-flex gap-2\">
                            <form method=\"post\" action=\"";
                // line 85
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_post_react", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 85)]), "html", null, true);
                yield "\" class=\"d-inline react-form\">
                                <input type=\"hidden\" name=\"type\" value=\"like\">
                                <button class=\"btn btn-sm btn-outline-success\" title=\"Like\">
                                    <i class=\"bi bi-hand-thumbs-up\"></i> <span class=\"like-count\">";
                // line 88
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "likes", [], "any", false, false, false, 88), "html", null, true);
                yield "</span>
                                </button>
                            </form>
                            <form method=\"post\" action=\"";
                // line 91
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_post_react", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 91)]), "html", null, true);
                yield "\" class=\"d-inline react-form\">
                                <input type=\"hidden\" name=\"type\" value=\"dislike\">
                                <button class=\"btn btn-sm btn-outline-danger\" title=\"Dislike\">
                                    <i class=\"bi bi-hand-thumbs-down\"></i> <span class=\"dislike-count\">";
                // line 94
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "dislikes", [], "any", false, false, false, 94), "html", null, true);
                yield "</span>
                                </button>
                            </form>
                            <form method=\"post\" action=\"";
                // line 97
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_saves_save", ["postId" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 97)]), "html", null, true);
                yield "\" class=\"d-inline\">
                                <input type=\"hidden\" name=\"_token\" value=\"";
                // line 98
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("save_post" . CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 98))), "html", null, true);
                yield "\">
                                <button class=\"btn btn-sm btn-outline-warning\" title=\"Save post\">
                                    <i class=\"bi bi-bookmark-plus\"></i>
                                </button>
                            </form>
                        </div>
                        <a href=\"";
                // line 104
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_post_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 104)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-outline-primary\" title=\"Read more\">
                            <i class=\"bi bi-arrow-right\"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 112
            yield "    </div>
";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 116
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

        // line 117
        yield "<script>
document.querySelectorAll('.react-form').forEach(form => {
    form.addEventListener('submit', async e => {
        e.preventDefault();
        const fd = new FormData(form);
        const res = await fetch(form.action, { method: 'POST', body: fd, headers: { 'X-Requested-With': 'XMLHttpRequest' } });
        if (res.ok) {
            const data = await res.json();
            const card = form.closest('.card-body');
            card.querySelector('.like-count').textContent = data.likes;
            card.querySelector('.dislike-count').textContent = data.dislikes;
        }
    });
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
        return "front/post/index.html.twig";
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
        return array (  330 => 117,  317 => 116,  304 => 112,  290 => 104,  281 => 98,  277 => 97,  271 => 94,  265 => 91,  259 => 88,  253 => 85,  248 => 82,  243 => 81,  235 => 78,  231 => 76,  225 => 74,  223 => 73,  219 => 71,  213 => 69,  211 => 68,  207 => 66,  203 => 65,  200 => 64,  193 => 59,  191 => 58,  187 => 56,  179 => 51,  176 => 50,  174 => 49,  163 => 41,  157 => 38,  152 => 35,  147 => 31,  141 => 28,  136 => 26,  132 => 25,  128 => 23,  126 => 22,  118 => 17,  113 => 14,  105 => 8,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'front/base.html.twig' %}

{% block title %}Posts — MindBoost{% endblock %}

{% block body %}
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <h2 class=\"fw-bold mb-0\"><i class=\"bi bi-file-post me-2 text-primary\"></i>Community Posts</h2>
    <a href=\"{{ path('front_post_new') }}\" class=\"btn btn-primary btn-sm\">
        <i class=\"bi bi-plus-lg me-1\"></i>New Post
    </a>
</div>

{# Stats section #}
<div class=\"row g-3 mb-4\">
    <div class=\"col-md-4\">
        <div class=\"card text-center p-3\">
            <div class=\"fs-1 fw-bold text-primary\">{{ totalPosts }}</div>
            <div class=\"text-muted small\">Total Posts</div>
        </div>
    </div>
    <div class=\"col-md-8\">
        {% if mostLiked %}
        <div class=\"card p-3\">
            <div class=\"text-muted small mb-1\"><i class=\"bi bi-heart-fill text-danger me-1\"></i>Most Liked Post</div>
            <a href=\"{{ path('front_post_show', {id: mostLiked.id}) }}\" class=\"fw-bold text-decoration-none\" style=\"color:#17253a;\">
                {{ mostLiked.title }}
            </a>
            <span class=\"ms-2 badge bg-danger\">{{ mostLiked.likes }} likes</span>
        </div>
        {% endif %}
    </div>
</div>

{# Search/Filter #}
<div class=\"card mb-4 p-3\">
    <form method=\"get\" class=\"row g-2 align-items-end\">
        <div class=\"col-md-6\">
            <input type=\"text\" name=\"search\" class=\"form-control\" placeholder=\"Search posts...\" value=\"{{ search }}\">
        </div>
        <div class=\"col-md-4\">
            <input type=\"text\" name=\"tag\" class=\"form-control\" placeholder=\"Filter by tag...\" value=\"{{ tag }}\">
        </div>
        <div class=\"col-md-2\">
            <button type=\"submit\" class=\"btn btn-outline-primary w-100\">
                <i class=\"bi bi-search\"></i> Search
            </button>
        </div>
    </form>
    {% if search or tag %}
    <div class=\"mt-2\">
        <a href=\"{{ path('front_post_index') }}\" class=\"btn btn-sm btn-outline-secondary\">
            <i class=\"bi bi-x-lg\"></i> Clear filters
        </a>
    </div>
    {% endif %}
</div>

{% if posts is empty %}
    <div class=\"text-center py-5 text-muted\">
        <i class=\"bi bi-inbox display-4\"></i>
        <p class=\"mt-2\">No posts found.</p>
    </div>
{% else %}
    <div class=\"row g-4\">
        {% for post in posts %}
        <div class=\"col-md-6 col-lg-4\">
            <div class=\"card h-100\">
                {% if post.imageUrl %}
                <img src=\"{{ post.imageUrl }}\" class=\"card-img-top\" alt=\"Post image\" style=\"height:180px;object-fit:cover;border-radius:12px 12px 0 0;\">
                {% endif %}
                <div class=\"card-body d-flex flex-column\">
                    <div class=\"mb-2\">
                        {% if post.tag %}
                        <span class=\"tag-badge\"><i class=\"bi bi-tag me-1\"></i>{{ post.tag }}</span>
                        {% endif %}
                    </div>
                    <h5 class=\"card-title fw-bold\">
                        <a href=\"{{ path('front_post_show', {id: post.id}) }}\" class=\"text-decoration-none\" style=\"color:#111111;\">{{ post.title }}</a>
                    </h5>
                    <p class=\"card-text flex-grow-1\" style=\"color:#9B9BB0;overflow:hidden;max-height:80px;\">
                        {{ post.content|slice(0, 150) }}{% if post.content|length > 150 %}...{% endif %}
                    </p>
                    <div class=\"d-flex justify-content-between align-items-center mt-3\">
                        <div class=\"d-flex gap-2\">
                            <form method=\"post\" action=\"{{ path('front_post_react', {id: post.id}) }}\" class=\"d-inline react-form\">
                                <input type=\"hidden\" name=\"type\" value=\"like\">
                                <button class=\"btn btn-sm btn-outline-success\" title=\"Like\">
                                    <i class=\"bi bi-hand-thumbs-up\"></i> <span class=\"like-count\">{{ post.likes }}</span>
                                </button>
                            </form>
                            <form method=\"post\" action=\"{{ path('front_post_react', {id: post.id}) }}\" class=\"d-inline react-form\">
                                <input type=\"hidden\" name=\"type\" value=\"dislike\">
                                <button class=\"btn btn-sm btn-outline-danger\" title=\"Dislike\">
                                    <i class=\"bi bi-hand-thumbs-down\"></i> <span class=\"dislike-count\">{{ post.dislikes }}</span>
                                </button>
                            </form>
                            <form method=\"post\" action=\"{{ path('front_saves_save', {postId: post.id}) }}\" class=\"d-inline\">
                                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('save_post' ~ post.id) }}\">
                                <button class=\"btn btn-sm btn-outline-warning\" title=\"Save post\">
                                    <i class=\"bi bi-bookmark-plus\"></i>
                                </button>
                            </form>
                        </div>
                        <a href=\"{{ path('front_post_show', {id: post.id}) }}\" class=\"btn btn-sm btn-outline-primary\" title=\"Read more\">
                            <i class=\"bi bi-arrow-right\"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {% endfor %}
    </div>
{% endif %}
{% endblock %}

{% block javascripts %}
<script>
document.querySelectorAll('.react-form').forEach(form => {
    form.addEventListener('submit', async e => {
        e.preventDefault();
        const fd = new FormData(form);
        const res = await fetch(form.action, { method: 'POST', body: fd, headers: { 'X-Requested-With': 'XMLHttpRequest' } });
        if (res.ok) {
            const data = await res.json();
            const card = form.closest('.card-body');
            card.querySelector('.like-count').textContent = data.likes;
            card.querySelector('.dislike-count').textContent = data.dislikes;
        }
    });
});
</script>
{% endblock %}
", "front/post/index.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/front/post/index.html.twig");
    }
}
