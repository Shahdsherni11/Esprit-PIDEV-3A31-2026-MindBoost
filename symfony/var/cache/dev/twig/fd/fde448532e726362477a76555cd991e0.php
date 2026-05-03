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

/* front/post/show.html.twig */
class __TwigTemplate_264fcdb15216a3fd870f42822246fef7 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/post/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/post/show.html.twig"));

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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 3, $this->source); })()), "title", [], "any", false, false, false, 3), "html", null, true);
        yield " — MindBoost";
        
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
        yield "<div class=\"row\">
    <div class=\"col-lg-8\">
        <nav aria-label=\"breadcrumb\" class=\"mb-3\">
            <ol class=\"breadcrumb\">
                <li class=\"breadcrumb-item\"><a href=\"";
        // line 10
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_post_index");
        yield "\">Posts</a></li>
                <li class=\"breadcrumb-item active\">";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 11, $this->source); })()), "title", [], "any", false, false, false, 11), 0, 40), "html", null, true);
        yield "</li>
            </ol>
        </nav>

        <div class=\"card mb-4\">
            ";
        // line 16
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 16, $this->source); })()), "imageUrl", [], "any", false, false, false, 16)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 17
            yield "            <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 17, $this->source); })()), "imageUrl", [], "any", false, false, false, 17), "html", null, true);
            yield "\" class=\"card-img-top\" alt=\"Post image\" style=\"max-height:350px;object-fit:cover;border-radius:12px 12px 0 0;\">
            ";
        }
        // line 19
        yield "            <div class=\"card-body\">
                <div class=\"mb-2\">
                    ";
        // line 21
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 21, $this->source); })()), "tag", [], "any", false, false, false, 21)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 22
            yield "                    <span class=\"tag-badge\"><i class=\"bi bi-tag me-1\"></i>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 22, $this->source); })()), "tag", [], "any", false, false, false, 22), "html", null, true);
            yield "</span>
                    ";
        }
        // line 24
        yield "                </div>
                <h2 class=\"fw-bold\">";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 25, $this->source); })()), "title", [], "any", false, false, false, 25), "html", null, true);
        yield "</h2>
                <p id=\"post-content\" class=\"text-body";
        // line 26
        if ((($tmp = (isset($context["postProfane"]) || array_key_exists("postProfane", $context) ? $context["postProfane"] : (function () { throw new RuntimeError('Variable "postProfane" does not exist.', 26, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " profane-blur";
        }
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 26, $this->source); })()), "content", [], "any", false, false, false, 26), "html", null, true);
        yield "</p>
                ";
        // line 27
        if ((($tmp = (isset($context["postProfane"]) || array_key_exists("postProfane", $context) ? $context["postProfane"] : (function () { throw new RuntimeError('Variable "postProfane" does not exist.', 27, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 28
            yield "                <button class=\"btn btn-sm btn-outline-warning mt-1\" onclick=\"toggleBlur(document.getElementById('post-content'))\">
                    <i class=\"bi bi-eye me-1\"></i>Reveal content
                </button>
                ";
        }
        // line 32
        yield "
                <div class=\"d-flex gap-3 mt-3 align-items-center flex-wrap\">
                    <form method=\"post\" action=\"";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_post_react", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 34, $this->source); })()), "id", [], "any", false, false, false, 34)]), "html", null, true);
        yield "\" class=\"d-inline react-form\">
                        <input type=\"hidden\" name=\"type\" value=\"like\">
                        <button class=\"btn btn-outline-success btn-sm\">
                            <i class=\"bi bi-hand-thumbs-up\"></i> <span id=\"likes-count\">";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 37, $this->source); })()), "likes", [], "any", false, false, false, 37), "html", null, true);
        yield "</span>
                        </button>
                    </form>
                    <form method=\"post\" action=\"";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_post_react", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 40, $this->source); })()), "id", [], "any", false, false, false, 40)]), "html", null, true);
        yield "\" class=\"d-inline react-form\">
                        <input type=\"hidden\" name=\"type\" value=\"dislike\">
                        <button class=\"btn btn-outline-danger btn-sm\">
                            <i class=\"bi bi-hand-thumbs-down\"></i> <span id=\"dislikes-count\">";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 43, $this->source); })()), "dislikes", [], "any", false, false, false, 43), "html", null, true);
        yield "</span>
                        </button>
                    </form>
                    <span class=\"text-muted small\"><i class=\"bi bi-speedometer2 me-1\"></i>Help meter: ";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 46, $this->source); })()), "helpMeter", [], "any", false, false, false, 46), "html", null, true);
        yield "</span>
                </div>
            </div>
        </div>

        ";
        // line 52
        yield "        <div class=\"card mb-4\">
            <div class=\"card-body\">
                <h6 class=\"fw-bold mb-3\"><i class=\"bi bi-robot me-2 text-primary\"></i>AI Tools</h6>
                <div class=\"d-flex gap-2 flex-wrap mb-3\">
                    <button id=\"btn-summarize\" class=\"btn btn-outline-primary btn-sm\" onclick=\"summarizePost(";
        // line 56
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 56, $this->source); })()), "id", [], "any", false, false, false, 56), "html", null, true);
        yield ")\">
                        <i class=\"bi bi-card-text me-1\"></i>Summarize
                    </button>
                    <div class=\"input-group\" style=\"max-width:300px;\">
                        <select class=\"form-select form-select-sm\" id=\"translate-lang\">
                            <option value=\"fr\">French</option>
                            <option value=\"es\">Spanish</option>
                            <option value=\"ar\">Arabic</option>
                            <option value=\"de\">German</option>
                        </select>
                        <button class=\"btn btn-outline-info btn-sm\" onclick=\"translatePost(";
        // line 66
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 66, $this->source); })()), "id", [], "any", false, false, false, 66), "html", null, true);
        yield ")\">
                            <i class=\"bi bi-translate me-1\"></i>Translate
                        </button>
                    </div>
                </div>
                <div id=\"ai-result\" class=\"d-none\">
                    <div class=\"alert alert-light border\">
                        <div class=\"d-flex justify-content-between\">
                            <strong id=\"ai-result-label\">Result</strong>
                            <button class=\"btn-close btn-sm\" onclick=\"document.getElementById('ai-result').classList.add('d-none')\"></button>
                        </div>
                        <p id=\"ai-result-text\" class=\"mt-2 mb-0\"></p>
                    </div>
                </div>
                <div id=\"ai-loading\" class=\"d-none text-muted small\">
                    <div class=\"spinner-border spinner-border-sm me-1\"></div> Processing...
                </div>
            </div>
        </div>

        ";
        // line 87
        yield "        <div class=\"card mb-4\">
            <div class=\"card-body\">
                <h5 class=\"fw-bold mb-3\"><i class=\"bi bi-chat-dots me-2 text-secondary\"></i>Comments (";
        // line 89
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["comments"]) || array_key_exists("comments", $context) ? $context["comments"] : (function () { throw new RuntimeError('Variable "comments" does not exist.', 89, $this->source); })())), "html", null, true);
        yield ")</h5>

                ";
        // line 91
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["comments"]) || array_key_exists("comments", $context) ? $context["comments"] : (function () { throw new RuntimeError('Variable "comments" does not exist.', 91, $this->source); })()))) {
            // line 92
            yield "                <p class=\"text-muted\">No comments yet. Be the first!</p>
                ";
        } else {
            // line 94
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["comments"]) || array_key_exists("comments", $context) ? $context["comments"] : (function () { throw new RuntimeError('Variable "comments" does not exist.', 94, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
                // line 95
                yield "                <div class=\"d-flex mb-3 pb-3 border-bottom\">
                    <div class=\"flex-shrink-0 me-3\">
                        <div class=\"bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center\" style=\"width:38px;height:38px;font-size:.9rem;\">
                            ";
                // line 98
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "userId", [], "any", false, false, false, 98), "html", null, true);
                yield "
                        </div>
                    </div>
                    <div class=\"flex-grow-1\">
                        <div class=\"d-flex justify-content-between align-items-start\">
                            <small class=\"fw-bold text-muted\">User #";
                // line 103
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "userId", [], "any", false, false, false, 103), "html", null, true);
                yield "</small>
                            <div class=\"d-flex gap-1\">
                                <a href=\"";
                // line 105
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_comment_edit", ["postId" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 105, $this->source); })()), "id", [], "any", false, false, false, 105), "id" => CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 105)]), "html", null, true);
                yield "\" class=\"btn btn-xs btn-outline-secondary\" style=\"font-size:.75rem;padding:2px 6px;\">
                                    <i class=\"bi bi-pencil\"></i>
                                </a>
                                <form method=\"post\" action=\"";
                // line 108
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_comment_delete", ["postId" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 108, $this->source); })()), "id", [], "any", false, false, false, 108), "id" => CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 108)]), "html", null, true);
                yield "\"
                                      onsubmit=\"return confirm('Delete comment?')\">
                                    <input type=\"hidden\" name=\"_token\" value=\"";
                // line 110
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete_comment" . CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 110))), "html", null, true);
                yield "\">
                                    <button class=\"btn btn-xs btn-outline-danger\" style=\"font-size:.75rem;padding:2px 6px;\">
                                        <i class=\"bi bi-trash\"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <p class=\"mb-1 comment-text";
                // line 117
                if ((CoreExtension::getAttribute($this->env, $this->source, ($context["commentsProfane"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 117), [], "array", true, true, false, 117) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentsProfane"]) || array_key_exists("commentsProfane", $context) ? $context["commentsProfane"] : (function () { throw new RuntimeError('Variable "commentsProfane" does not exist.', 117, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 117), [], "array", false, false, false, 117))) {
                    yield " profane-blur";
                }
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "comment", [], "any", false, false, false, 117), "html", null, true);
                yield "</p>
                        ";
                // line 118
                if ((CoreExtension::getAttribute($this->env, $this->source, ($context["commentsProfane"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 118), [], "array", true, true, false, 118) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentsProfane"]) || array_key_exists("commentsProfane", $context) ? $context["commentsProfane"] : (function () { throw new RuntimeError('Variable "commentsProfane" does not exist.', 118, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 118), [], "array", false, false, false, 118))) {
                    // line 119
                    yield "                        <button class=\"btn btn-xs btn-outline-warning mb-1\" style=\"font-size:.75rem;padding:2px 6px;\" onclick=\"toggleBlur(this.previousElementSibling)\">
                            <i class=\"bi bi-eye me-1\"></i>Reveal
                        </button>
                        ";
                }
                // line 123
                yield "                        <div class=\"d-flex gap-1 align-items-center mt-1\">
                            <form method=\"post\" action=\"";
                // line 124
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_comment_react", ["postId" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 124, $this->source); })()), "id", [], "any", false, false, false, 124), "id" => CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 124)]), "html", null, true);
                yield "\" class=\"d-inline comment-react-form\">
                                <input type=\"hidden\" name=\"type\" value=\"like\">
                                <button class=\"btn btn-xs btn-outline-success\" style=\"font-size:.75rem;padding:2px 6px;\" title=\"Like\">
                                    <i class=\"bi bi-hand-thumbs-up\"></i> <span class=\"comment-likes-count\">";
                // line 127
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "likes", [], "any", false, false, false, 127), "html", null, true);
                yield "</span>
                                </button>
                            </form>
                            <form method=\"post\" action=\"";
                // line 130
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_comment_react", ["postId" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 130, $this->source); })()), "id", [], "any", false, false, false, 130), "id" => CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 130)]), "html", null, true);
                yield "\" class=\"d-inline comment-react-form\">
                                <input type=\"hidden\" name=\"type\" value=\"dislike\">
                                <button class=\"btn btn-xs btn-outline-danger\" style=\"font-size:.75rem;padding:2px 6px;\" title=\"Dislike\">
                                    <i class=\"bi bi-hand-thumbs-down\"></i> <span class=\"comment-dislikes-count\">";
                // line 133
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "dislikes", [], "any", false, false, false, 133), "html", null, true);
                yield "</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['comment'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 140
            yield "                ";
        }
        // line 141
        yield "
                <hr>
                <h6 class=\"fw-bold mb-2\">Add a Comment</h6>
                ";
        // line 144
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["commentForm"]) || array_key_exists("commentForm", $context) ? $context["commentForm"] : (function () { throw new RuntimeError('Variable "commentForm" does not exist.', 144, $this->source); })()), 'form_start', ["attr" => ["class" => ""]]);
        yield "
                <div class=\"mb-2\">
                    ";
        // line 146
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentForm"]) || array_key_exists("commentForm", $context) ? $context["commentForm"] : (function () { throw new RuntimeError('Variable "commentForm" does not exist.', 146, $this->source); })()), "comment", [], "any", false, false, false, 146), 'widget');
        yield "
                    ";
        // line 147
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentForm"]) || array_key_exists("commentForm", $context) ? $context["commentForm"] : (function () { throw new RuntimeError('Variable "commentForm" does not exist.', 147, $this->source); })()), "comment", [], "any", false, false, false, 147), 'errors');
        yield "
                </div>
                <button type=\"submit\" class=\"btn btn-primary btn-sm\">
                    <i class=\"bi bi-send me-1\"></i>Post Comment
                </button>
                ";
        // line 152
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["commentForm"]) || array_key_exists("commentForm", $context) ? $context["commentForm"] : (function () { throw new RuntimeError('Variable "commentForm" does not exist.', 152, $this->source); })()), 'form_end');
        yield "
            </div>
        </div>
    </div>

    <div class=\"col-lg-4\">
        <div class=\"card mb-3\">
            <div class=\"card-body\">
                <h6 class=\"fw-bold\">Actions</h6>
                <div class=\"d-grid gap-2\">
                    <form method=\"post\" action=\"";
        // line 162
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_saves_save", ["postId" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 162, $this->source); })()), "id", [], "any", false, false, false, 162)]), "html", null, true);
        yield "\">
                        <input type=\"hidden\" name=\"_token\" value=\"";
        // line 163
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("save_post" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 163, $this->source); })()), "id", [], "any", false, false, false, 163))), "html", null, true);
        yield "\">
                        <button class=\"btn btn-warning btn-sm w-100\">
                            <i class=\"bi bi-bookmark-plus me-1\"></i>Save Post
                        </button>
                    </form>
                    <a href=\"";
        // line 168
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_saves_index");
        yield "\" class=\"btn btn-outline-warning btn-sm\">
                        <i class=\"bi bi-bookmark me-1\"></i>View Saves
                    </a>
                    <a href=\"";
        // line 171
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_post_index");
        yield "\" class=\"btn btn-outline-dark btn-sm\">
                        <i class=\"bi bi-arrow-left me-1\"></i>Back to Posts
                    </a>
                    ";
        // line 174
        if ((($tmp = (isset($context["canManagePost"]) || array_key_exists("canManagePost", $context) ? $context["canManagePost"] : (function () { throw new RuntimeError('Variable "canManagePost" does not exist.', 174, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 175
            yield "                        <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_post_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 175, $this->source); })()), "id", [], "any", false, false, false, 175)]), "html", null, true);
            yield "\" class=\"btn btn-outline-secondary btn-sm\">
                            <i class=\"bi bi-pencil me-1\"></i>Edit Post
                        </a>
                        <form method=\"post\" action=\"";
            // line 178
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_post_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 178, $this->source); })()), "id", [], "any", false, false, false, 178)]), "html", null, true);
            yield "\"
                              onsubmit=\"return confirm('Delete this post and its comments?')\">
                            <input type=\"hidden\" name=\"_token\" value=\"";
            // line 180
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 180, $this->source); })()), "id", [], "any", false, false, false, 180))), "html", null, true);
            yield "\">
                            <button class=\"btn btn-outline-danger btn-sm w-100\">
                                <i class=\"bi bi-trash me-1\"></i>Delete Post
                            </button>
                        </form>
                    ";
        }
        // line 186
        yield "                </div>
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 193
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

        // line 194
        yield "<script>
document.querySelectorAll('.react-form').forEach(form => {
    form.addEventListener('submit', async e => {
        e.preventDefault();
        const fd = new FormData(form);
        const res = await fetch(form.action, { method: 'POST', body: fd, headers: { 'X-Requested-With': 'XMLHttpRequest' } });
        if (res.ok) {
            const data = await res.json();
            document.getElementById('likes-count').textContent = data.likes;
            document.getElementById('dislikes-count').textContent = data.dislikes;
        }
    });
});

async function summarizePost(id) {
    showLoading();
    try {
        const res = await fetch(`/posts/\${id}/summarize`, { method: 'POST', headers: { 'X-Requested-With': 'XMLHttpRequest' } });
        const data = await res.json();
        showResult('Summary', data.summary || data.error);
    } catch (e) {
        showResult('Error', 'Failed to summarize.');
    }
}

async function translatePost(id) {
    showLoading();
    const lang = document.getElementById('translate-lang').value;
    const fd = new FormData();
    fd.append('lang', lang);
    try {
        const res = await fetch(`/posts/\${id}/translate`, { method: 'POST', body: fd, headers: { 'X-Requested-With': 'XMLHttpRequest' } });
        const data = await res.json();
        showResult('Translation', data.translation || data.error);
    } catch (e) {
        showResult('Error', 'Failed to translate.');
    }
}

function showLoading() {
    document.getElementById('ai-loading').classList.remove('d-none');
    document.getElementById('ai-result').classList.add('d-none');
}

function showResult(label, text) {
    document.getElementById('ai-loading').classList.add('d-none');
    document.getElementById('ai-result-label').textContent = label;
    document.getElementById('ai-result-text').textContent = text;
    document.getElementById('ai-result').classList.remove('d-none');
}

document.querySelectorAll('.comment-react-form').forEach(form => {
    form.addEventListener('submit', async e => {
        e.preventDefault();
        const fd = new FormData(form);
        const res = await fetch(form.action, { method: 'POST', body: fd, headers: { 'X-Requested-With': 'XMLHttpRequest' } });
        if (res.ok) {
            const data = await res.json();
            const commentBody = form.closest('.d-flex.gap-1');
            commentBody.querySelector('.comment-likes-count').textContent = data.likes;
            commentBody.querySelector('.comment-dislikes-count').textContent = data.dislikes;
        }
    });
});

function toggleBlur(el) {
    el.classList.toggle('profane-blur');
    const btn = el.nextElementSibling;
    if (btn) {
        btn.innerHTML = el.classList.contains('profane-blur')
            ? '<i class=\"bi bi-eye me-1\"></i>Reveal'
            : '<i class=\"bi bi-eye-slash me-1\"></i>Hide';
    }
}
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
        return "front/post/show.html.twig";
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
        return array (  464 => 194,  451 => 193,  435 => 186,  426 => 180,  421 => 178,  414 => 175,  412 => 174,  406 => 171,  400 => 168,  392 => 163,  388 => 162,  375 => 152,  367 => 147,  363 => 146,  358 => 144,  353 => 141,  350 => 140,  337 => 133,  331 => 130,  325 => 127,  319 => 124,  316 => 123,  310 => 119,  308 => 118,  300 => 117,  290 => 110,  285 => 108,  279 => 105,  274 => 103,  266 => 98,  261 => 95,  256 => 94,  252 => 92,  250 => 91,  245 => 89,  241 => 87,  218 => 66,  205 => 56,  199 => 52,  191 => 46,  185 => 43,  179 => 40,  173 => 37,  167 => 34,  163 => 32,  157 => 28,  155 => 27,  147 => 26,  143 => 25,  140 => 24,  134 => 22,  132 => 21,  128 => 19,  122 => 17,  120 => 16,  112 => 11,  108 => 10,  102 => 6,  89 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'front/base.html.twig' %}

{% block title %}{{ post.title }} — MindBoost{% endblock %}

{% block body %}
<div class=\"row\">
    <div class=\"col-lg-8\">
        <nav aria-label=\"breadcrumb\" class=\"mb-3\">
            <ol class=\"breadcrumb\">
                <li class=\"breadcrumb-item\"><a href=\"{{ path('front_post_index') }}\">Posts</a></li>
                <li class=\"breadcrumb-item active\">{{ post.title|slice(0,40) }}</li>
            </ol>
        </nav>

        <div class=\"card mb-4\">
            {% if post.imageUrl %}
            <img src=\"{{ post.imageUrl }}\" class=\"card-img-top\" alt=\"Post image\" style=\"max-height:350px;object-fit:cover;border-radius:12px 12px 0 0;\">
            {% endif %}
            <div class=\"card-body\">
                <div class=\"mb-2\">
                    {% if post.tag %}
                    <span class=\"tag-badge\"><i class=\"bi bi-tag me-1\"></i>{{ post.tag }}</span>
                    {% endif %}
                </div>
                <h2 class=\"fw-bold\">{{ post.title }}</h2>
                <p id=\"post-content\" class=\"text-body{% if postProfane %} profane-blur{% endif %}\">{{ post.content }}</p>
                {% if postProfane %}
                <button class=\"btn btn-sm btn-outline-warning mt-1\" onclick=\"toggleBlur(document.getElementById('post-content'))\">
                    <i class=\"bi bi-eye me-1\"></i>Reveal content
                </button>
                {% endif %}

                <div class=\"d-flex gap-3 mt-3 align-items-center flex-wrap\">
                    <form method=\"post\" action=\"{{ path('front_post_react', {id: post.id}) }}\" class=\"d-inline react-form\">
                        <input type=\"hidden\" name=\"type\" value=\"like\">
                        <button class=\"btn btn-outline-success btn-sm\">
                            <i class=\"bi bi-hand-thumbs-up\"></i> <span id=\"likes-count\">{{ post.likes }}</span>
                        </button>
                    </form>
                    <form method=\"post\" action=\"{{ path('front_post_react', {id: post.id}) }}\" class=\"d-inline react-form\">
                        <input type=\"hidden\" name=\"type\" value=\"dislike\">
                        <button class=\"btn btn-outline-danger btn-sm\">
                            <i class=\"bi bi-hand-thumbs-down\"></i> <span id=\"dislikes-count\">{{ post.dislikes }}</span>
                        </button>
                    </form>
                    <span class=\"text-muted small\"><i class=\"bi bi-speedometer2 me-1\"></i>Help meter: {{ post.helpMeter }}</span>
                </div>
            </div>
        </div>

        {# AI Tools #}
        <div class=\"card mb-4\">
            <div class=\"card-body\">
                <h6 class=\"fw-bold mb-3\"><i class=\"bi bi-robot me-2 text-primary\"></i>AI Tools</h6>
                <div class=\"d-flex gap-2 flex-wrap mb-3\">
                    <button id=\"btn-summarize\" class=\"btn btn-outline-primary btn-sm\" onclick=\"summarizePost({{ post.id }})\">
                        <i class=\"bi bi-card-text me-1\"></i>Summarize
                    </button>
                    <div class=\"input-group\" style=\"max-width:300px;\">
                        <select class=\"form-select form-select-sm\" id=\"translate-lang\">
                            <option value=\"fr\">French</option>
                            <option value=\"es\">Spanish</option>
                            <option value=\"ar\">Arabic</option>
                            <option value=\"de\">German</option>
                        </select>
                        <button class=\"btn btn-outline-info btn-sm\" onclick=\"translatePost({{ post.id }})\">
                            <i class=\"bi bi-translate me-1\"></i>Translate
                        </button>
                    </div>
                </div>
                <div id=\"ai-result\" class=\"d-none\">
                    <div class=\"alert alert-light border\">
                        <div class=\"d-flex justify-content-between\">
                            <strong id=\"ai-result-label\">Result</strong>
                            <button class=\"btn-close btn-sm\" onclick=\"document.getElementById('ai-result').classList.add('d-none')\"></button>
                        </div>
                        <p id=\"ai-result-text\" class=\"mt-2 mb-0\"></p>
                    </div>
                </div>
                <div id=\"ai-loading\" class=\"d-none text-muted small\">
                    <div class=\"spinner-border spinner-border-sm me-1\"></div> Processing...
                </div>
            </div>
        </div>

        {# Comments #}
        <div class=\"card mb-4\">
            <div class=\"card-body\">
                <h5 class=\"fw-bold mb-3\"><i class=\"bi bi-chat-dots me-2 text-secondary\"></i>Comments ({{ comments|length }})</h5>

                {% if comments is empty %}
                <p class=\"text-muted\">No comments yet. Be the first!</p>
                {% else %}
                {% for comment in comments %}
                <div class=\"d-flex mb-3 pb-3 border-bottom\">
                    <div class=\"flex-shrink-0 me-3\">
                        <div class=\"bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center\" style=\"width:38px;height:38px;font-size:.9rem;\">
                            {{ comment.userId }}
                        </div>
                    </div>
                    <div class=\"flex-grow-1\">
                        <div class=\"d-flex justify-content-between align-items-start\">
                            <small class=\"fw-bold text-muted\">User #{{ comment.userId }}</small>
                            <div class=\"d-flex gap-1\">
                                <a href=\"{{ path('back_comment_edit', {postId: post.id, id: comment.id}) }}\" class=\"btn btn-xs btn-outline-secondary\" style=\"font-size:.75rem;padding:2px 6px;\">
                                    <i class=\"bi bi-pencil\"></i>
                                </a>
                                <form method=\"post\" action=\"{{ path('back_comment_delete', {postId: post.id, id: comment.id}) }}\"
                                      onsubmit=\"return confirm('Delete comment?')\">
                                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete_comment' ~ comment.id) }}\">
                                    <button class=\"btn btn-xs btn-outline-danger\" style=\"font-size:.75rem;padding:2px 6px;\">
                                        <i class=\"bi bi-trash\"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <p class=\"mb-1 comment-text{% if commentsProfane[comment.id] is defined and commentsProfane[comment.id] %} profane-blur{% endif %}\">{{ comment.comment }}</p>
                        {% if commentsProfane[comment.id] is defined and commentsProfane[comment.id] %}
                        <button class=\"btn btn-xs btn-outline-warning mb-1\" style=\"font-size:.75rem;padding:2px 6px;\" onclick=\"toggleBlur(this.previousElementSibling)\">
                            <i class=\"bi bi-eye me-1\"></i>Reveal
                        </button>
                        {% endif %}
                        <div class=\"d-flex gap-1 align-items-center mt-1\">
                            <form method=\"post\" action=\"{{ path('front_comment_react', {postId: post.id, id: comment.id}) }}\" class=\"d-inline comment-react-form\">
                                <input type=\"hidden\" name=\"type\" value=\"like\">
                                <button class=\"btn btn-xs btn-outline-success\" style=\"font-size:.75rem;padding:2px 6px;\" title=\"Like\">
                                    <i class=\"bi bi-hand-thumbs-up\"></i> <span class=\"comment-likes-count\">{{ comment.likes }}</span>
                                </button>
                            </form>
                            <form method=\"post\" action=\"{{ path('front_comment_react', {postId: post.id, id: comment.id}) }}\" class=\"d-inline comment-react-form\">
                                <input type=\"hidden\" name=\"type\" value=\"dislike\">
                                <button class=\"btn btn-xs btn-outline-danger\" style=\"font-size:.75rem;padding:2px 6px;\" title=\"Dislike\">
                                    <i class=\"bi bi-hand-thumbs-down\"></i> <span class=\"comment-dislikes-count\">{{ comment.dislikes }}</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                {% endfor %}
                {% endif %}

                <hr>
                <h6 class=\"fw-bold mb-2\">Add a Comment</h6>
                {{ form_start(commentForm, {'attr': {'class': ''}}) }}
                <div class=\"mb-2\">
                    {{ form_widget(commentForm.comment) }}
                    {{ form_errors(commentForm.comment) }}
                </div>
                <button type=\"submit\" class=\"btn btn-primary btn-sm\">
                    <i class=\"bi bi-send me-1\"></i>Post Comment
                </button>
                {{ form_end(commentForm) }}
            </div>
        </div>
    </div>

    <div class=\"col-lg-4\">
        <div class=\"card mb-3\">
            <div class=\"card-body\">
                <h6 class=\"fw-bold\">Actions</h6>
                <div class=\"d-grid gap-2\">
                    <form method=\"post\" action=\"{{ path('front_saves_save', {postId: post.id}) }}\">
                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('save_post' ~ post.id) }}\">
                        <button class=\"btn btn-warning btn-sm w-100\">
                            <i class=\"bi bi-bookmark-plus me-1\"></i>Save Post
                        </button>
                    </form>
                    <a href=\"{{ path('front_saves_index') }}\" class=\"btn btn-outline-warning btn-sm\">
                        <i class=\"bi bi-bookmark me-1\"></i>View Saves
                    </a>
                    <a href=\"{{ path('front_post_index') }}\" class=\"btn btn-outline-dark btn-sm\">
                        <i class=\"bi bi-arrow-left me-1\"></i>Back to Posts
                    </a>
                    {% if canManagePost %}
                        <a href=\"{{ path('front_post_edit', {id: post.id}) }}\" class=\"btn btn-outline-secondary btn-sm\">
                            <i class=\"bi bi-pencil me-1\"></i>Edit Post
                        </a>
                        <form method=\"post\" action=\"{{ path('front_post_delete', {id: post.id}) }}\"
                              onsubmit=\"return confirm('Delete this post and its comments?')\">
                            <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ post.id) }}\">
                            <button class=\"btn btn-outline-danger btn-sm w-100\">
                                <i class=\"bi bi-trash me-1\"></i>Delete Post
                            </button>
                        </form>
                    {% endif %}
                </div>
            </div>
        </div>
    </div>
</div>
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
            document.getElementById('likes-count').textContent = data.likes;
            document.getElementById('dislikes-count').textContent = data.dislikes;
        }
    });
});

async function summarizePost(id) {
    showLoading();
    try {
        const res = await fetch(`/posts/\${id}/summarize`, { method: 'POST', headers: { 'X-Requested-With': 'XMLHttpRequest' } });
        const data = await res.json();
        showResult('Summary', data.summary || data.error);
    } catch (e) {
        showResult('Error', 'Failed to summarize.');
    }
}

async function translatePost(id) {
    showLoading();
    const lang = document.getElementById('translate-lang').value;
    const fd = new FormData();
    fd.append('lang', lang);
    try {
        const res = await fetch(`/posts/\${id}/translate`, { method: 'POST', body: fd, headers: { 'X-Requested-With': 'XMLHttpRequest' } });
        const data = await res.json();
        showResult('Translation', data.translation || data.error);
    } catch (e) {
        showResult('Error', 'Failed to translate.');
    }
}

function showLoading() {
    document.getElementById('ai-loading').classList.remove('d-none');
    document.getElementById('ai-result').classList.add('d-none');
}

function showResult(label, text) {
    document.getElementById('ai-loading').classList.add('d-none');
    document.getElementById('ai-result-label').textContent = label;
    document.getElementById('ai-result-text').textContent = text;
    document.getElementById('ai-result').classList.remove('d-none');
}

document.querySelectorAll('.comment-react-form').forEach(form => {
    form.addEventListener('submit', async e => {
        e.preventDefault();
        const fd = new FormData(form);
        const res = await fetch(form.action, { method: 'POST', body: fd, headers: { 'X-Requested-With': 'XMLHttpRequest' } });
        if (res.ok) {
            const data = await res.json();
            const commentBody = form.closest('.d-flex.gap-1');
            commentBody.querySelector('.comment-likes-count').textContent = data.likes;
            commentBody.querySelector('.comment-dislikes-count').textContent = data.dislikes;
        }
    });
});

function toggleBlur(el) {
    el.classList.toggle('profane-blur');
    const btn = el.nextElementSibling;
    if (btn) {
        btn.innerHTML = el.classList.contains('profane-blur')
            ? '<i class=\"bi bi-eye me-1\"></i>Reveal'
            : '<i class=\"bi bi-eye-slash me-1\"></i>Hide';
    }
}
</script>
{% endblock %}
", "front/post/show.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/front/post/show.html.twig");
    }
}
