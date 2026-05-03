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

/* base.html.twig */
class __TwigTemplate_681f641da91f3844b0c746f282220c8f extends Template
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

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'extra_css' => [$this, 'block_extra_css'],
            'content' => [$this, 'block_content'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>

    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\">

    ";
        // line 11
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 12
        yield "
    <style>
        :root {
            --bg-main: #081120;
            --bg-sidebar: #0B1730;
            --primary: #2F6BFF;
            --primary-light: #4D83FF;
            --secondary: #19B5FE;
            --accent: #00D1C7;
            --danger: #FF5A74;
            --warning: #F7B84B;
            --success: #29CC7A;
            --text-main: #F4F7FC;
            --text-soft: #AAB6D3;
            --text-fade: #7E8DB1;
            --shadow: 0 18px 40px rgba(0,0,0,0.30);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Inter', 'Segoe UI', sans-serif;
            background:
                radial-gradient(circle at top right, rgba(47,107,255,0.16), transparent 18%),
                radial-gradient(circle at bottom left, rgba(25,181,254,0.10), transparent 20%),
                linear-gradient(135deg, #07101D 0%, #091425 50%, #0C1A2E 100%);
            color: var(--text-main);
            min-height: 100vh;
        }

        .app-layout { display: flex; min-height: 100vh; }

        .sidebar {
            width: 280px;
            min-width: 280px;
            background: linear-gradient(180deg, #091326 0%, #0B1730 100%);
            border-right: 1px solid rgba(255,255,255,0.05);
            padding: 1.5rem 1rem;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 12px 0 30px rgba(0,0,0,0.18);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            padding: 0 0.6rem;
            margin-bottom: 2rem;
        }

        .brand-icon {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.35rem;
            box-shadow: 0 14px 30px rgba(47,107,255,0.35);
        }

        .brand-title {
            font-size: 1.35rem;
            font-weight: 800;
            color: white;
        }

        .brand-subtitle {
            font-size: 0.84rem;
            color: var(--text-fade);
        }

        .sidebar-label {
            font-size: 0.74rem;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            font-weight: 700;
            color: var(--text-fade);
            margin: 1rem 0.8rem 0.8rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            text-decoration: none;
            color: var(--text-soft);
            padding: 0.95rem 1rem;
            border-radius: 18px;
            margin-bottom: 0.45rem;
            transition: all 0.25s ease;
            font-weight: 600;
        }

        .sidebar-link:hover {
            background: rgba(47,107,255,0.12);
            color: white;
            transform: translateX(4px);
        }

        .sidebar-link.active {
            background: linear-gradient(90deg, rgba(47,107,255,0.22), rgba(25,181,254,0.10));
            color: white;
            border: 1px solid rgba(77,131,255,0.20);
        }

        .sidebar-link i { width: 20px; text-align: center; }

        .sidebar-divider {
            border: none;
            border-top: 1px solid rgba(255,255,255,0.06);
            margin: 1rem 0;
        }

        .main {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            padding: 1.2rem 2rem;
            border-bottom: 1px solid rgba(255,255,255,0.05);
            background: rgba(9,20,37,0.55);
            backdrop-filter: blur(12px);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar h2 {
            margin: 0;
            font-size: 1.15rem;
            font-weight: 800;
            color: white;
        }

        .topbar p {
            margin: 0.2rem 0 0;
            color: var(--text-fade);
            font-size: 0.88rem;
        }

        .topbar-chip {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.07);
            color: white;
            padding: 0.7rem 1rem;
            border-radius: 999px;
            font-weight: 600;
        }

        .page { padding: 2rem; }

        .page-shell {
            background: rgba(255,255,255,0.025);
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 30px;
            padding: 1.5rem;
            box-shadow: var(--shadow);
            backdrop-filter: blur(10px);
        }

        @media (max-width: 992px) {
            .sidebar { width: 96px; min-width: 96px; }
            .brand-text, .sidebar-label, .sidebar-link span { display: none; }
            .sidebar-link { justify-content: center; }
        }

        @media (max-width: 768px) {
            .app-layout { flex-direction: column; }
            .sidebar { width: 100%; min-width: 100%; height: auto; position: relative; }
            .brand-text, .sidebar-label, .sidebar-link span { display: block; }
            .page, .topbar { padding-left: 1rem; padding-right: 1rem; }
        }
    </style>

    ";
        // line 196
        yield from $this->unwrap()->yieldBlock('extra_css', $context, $blocks);
        // line 197
        yield "</head>
<body>
<div class=\"app-layout\">
    <aside class=\"sidebar\">
        <div class=\"brand\">
            <div class=\"brand-icon\"><i class=\"fas fa-brain\"></i></div>
            <div class=\"brand-text\">
                <div class=\"brand-title\">MindBoost</div>
                <div class=\"brand-subtitle\">Back Office</div>
            </div>
        </div>

        <div class=\"sidebar-label\">Navigation</div>

        <a href=\"";
        // line 211
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard");
        yield "\" class=\"sidebar-link ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 211, $this->source); })()), "request", [], "any", false, false, false, 211), "attributes", [], "any", false, false, false, 211), "get", ["_route"], "method", false, false, false, 211) == "dashboard")) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-house\"></i><span>Dashboard</span>
        </a>
        <a href=\"";
        // line 214
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("general_test_index");
        yield "\" class=\"sidebar-link ";
        if ((is_string($_v0 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 214, $this->source); })()), "request", [], "any", false, false, false, 214), "attributes", [], "any", false, false, false, 214), "get", ["_route"], "method", false, false, false, 214)) && is_string($_v1 = "general_test_") && str_starts_with($_v0, $_v1))) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-book-open\"></i><span>Tests Généraux</span>
        </a>
        <a href=\"";
        // line 217
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("specific_test_index");
        yield "\" class=\"sidebar-link ";
        if ((is_string($_v2 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 217, $this->source); })()), "request", [], "any", false, false, false, 217), "attributes", [], "any", false, false, false, 217), "get", ["_route"], "method", false, false, false, 217)) && is_string($_v3 = "specific_test_") && str_starts_with($_v2, $_v3))) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-layer-group\"></i><span>Tests Spécifiques</span>
        </a>
        <a href=\"";
        // line 220
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_results_history");
        yield "\" class=\"sidebar-link ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 220, $this->source); })()), "request", [], "any", false, false, false, 220), "attributes", [], "any", false, false, false, 220), "get", ["_route"], "method", false, false, false, 220) == "admin_results_history")) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-table-list\"></i><span>Historique résultats</span>
        </a>
        <a href=\"";
        // line 223
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_analytics_dashboard");
        yield "\" class=\"sidebar-link ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 223, $this->source); })()), "request", [], "any", false, false, false, 223), "attributes", [], "any", false, false, false, 223), "get", ["_route"], "method", false, false, false, 223) == "admin_analytics_dashboard")) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-chart-simple\"></i><span>Analytics</span>
        </a>
        <a href=\"";
        // line 226
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_statistics_dashboard");
        yield "\" class=\"sidebar-link ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 226, $this->source); })()), "request", [], "any", false, false, false, 226), "attributes", [], "any", false, false, false, 226), "get", ["_route"], "method", false, false, false, 226) == "admin_statistics_dashboard")) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-chart-pie\"></i><span>Statistiques</span>
        </a>

        <hr class=\"sidebar-divider\">

        <a href=\"";
        // line 232
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_user_home");
        yield "\" class=\"sidebar-link\">
            <i class=\"fas fa-user\"></i><span>Espace User</span>
        </a>
    </aside>

    <main class=\"main\">
        <div class=\"topbar\">
            <div>
                <h2>MindBoost Admin Panel</h2>
                <p>Gestion professionnelle des tests psychologiques</p>
            </div>
            <div class=\"topbar-chip\">
                <i class=\"fas fa-shield-heart me-2\"></i>Admin
            </div>
        </div>

        <div class=\"page\">
            ";
        // line 249
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 249, $this->source); })()), "flashes", ["success"], "method", false, false, false, 249));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 250
            yield "                <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fas fa-circle-check me-2\"></i>";
            // line 251
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
                    <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\"></button>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 255
        yield "
            ";
        // line 256
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 256, $this->source); })()), "flashes", ["error"], "method", false, false, false, 256));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 257
            yield "                <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fas fa-circle-xmark me-2\"></i>";
            // line 258
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
                    <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\"></button>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 262
        yield "
            ";
        // line 263
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 263, $this->source); })()), "flashes", ["warning"], "method", false, false, false, 263));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 264
            yield "                <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fas fa-triangle-exclamation me-2\"></i>";
            // line 265
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
                    <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\"></button>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 269
        yield "
            <div class=\"page-shell\">
                ";
        // line 271
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 272
        yield "            </div>
        </div>
    </main>
</div>

<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js\"></script>

";
        // line 279
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 282
        yield "</body>
</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 6
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

        yield "MindBoost Admin";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 11
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 196
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 271
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 279
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

        // line 280
        yield "    ";
        yield $this->env->getRuntime('Symfony\Bridge\Twig\Extension\ImportMapRuntime')->importmap("app");
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
        return "base.html.twig";
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
        return array (  545 => 280,  532 => 279,  510 => 271,  488 => 196,  466 => 11,  443 => 6,  431 => 282,  429 => 279,  420 => 272,  418 => 271,  414 => 269,  404 => 265,  401 => 264,  397 => 263,  394 => 262,  384 => 258,  381 => 257,  377 => 256,  374 => 255,  364 => 251,  361 => 250,  357 => 249,  337 => 232,  324 => 226,  314 => 223,  304 => 220,  294 => 217,  284 => 214,  274 => 211,  258 => 197,  256 => 196,  70 => 12,  68 => 11,  60 => 6,  53 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{% block title %}MindBoost Admin{% endblock %}</title>

    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\">

    {% block stylesheets %}{% endblock %}

    <style>
        :root {
            --bg-main: #081120;
            --bg-sidebar: #0B1730;
            --primary: #2F6BFF;
            --primary-light: #4D83FF;
            --secondary: #19B5FE;
            --accent: #00D1C7;
            --danger: #FF5A74;
            --warning: #F7B84B;
            --success: #29CC7A;
            --text-main: #F4F7FC;
            --text-soft: #AAB6D3;
            --text-fade: #7E8DB1;
            --shadow: 0 18px 40px rgba(0,0,0,0.30);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Inter', 'Segoe UI', sans-serif;
            background:
                radial-gradient(circle at top right, rgba(47,107,255,0.16), transparent 18%),
                radial-gradient(circle at bottom left, rgba(25,181,254,0.10), transparent 20%),
                linear-gradient(135deg, #07101D 0%, #091425 50%, #0C1A2E 100%);
            color: var(--text-main);
            min-height: 100vh;
        }

        .app-layout { display: flex; min-height: 100vh; }

        .sidebar {
            width: 280px;
            min-width: 280px;
            background: linear-gradient(180deg, #091326 0%, #0B1730 100%);
            border-right: 1px solid rgba(255,255,255,0.05);
            padding: 1.5rem 1rem;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 12px 0 30px rgba(0,0,0,0.18);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            padding: 0 0.6rem;
            margin-bottom: 2rem;
        }

        .brand-icon {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.35rem;
            box-shadow: 0 14px 30px rgba(47,107,255,0.35);
        }

        .brand-title {
            font-size: 1.35rem;
            font-weight: 800;
            color: white;
        }

        .brand-subtitle {
            font-size: 0.84rem;
            color: var(--text-fade);
        }

        .sidebar-label {
            font-size: 0.74rem;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            font-weight: 700;
            color: var(--text-fade);
            margin: 1rem 0.8rem 0.8rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            text-decoration: none;
            color: var(--text-soft);
            padding: 0.95rem 1rem;
            border-radius: 18px;
            margin-bottom: 0.45rem;
            transition: all 0.25s ease;
            font-weight: 600;
        }

        .sidebar-link:hover {
            background: rgba(47,107,255,0.12);
            color: white;
            transform: translateX(4px);
        }

        .sidebar-link.active {
            background: linear-gradient(90deg, rgba(47,107,255,0.22), rgba(25,181,254,0.10));
            color: white;
            border: 1px solid rgba(77,131,255,0.20);
        }

        .sidebar-link i { width: 20px; text-align: center; }

        .sidebar-divider {
            border: none;
            border-top: 1px solid rgba(255,255,255,0.06);
            margin: 1rem 0;
        }

        .main {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            padding: 1.2rem 2rem;
            border-bottom: 1px solid rgba(255,255,255,0.05);
            background: rgba(9,20,37,0.55);
            backdrop-filter: blur(12px);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar h2 {
            margin: 0;
            font-size: 1.15rem;
            font-weight: 800;
            color: white;
        }

        .topbar p {
            margin: 0.2rem 0 0;
            color: var(--text-fade);
            font-size: 0.88rem;
        }

        .topbar-chip {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.07);
            color: white;
            padding: 0.7rem 1rem;
            border-radius: 999px;
            font-weight: 600;
        }

        .page { padding: 2rem; }

        .page-shell {
            background: rgba(255,255,255,0.025);
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 30px;
            padding: 1.5rem;
            box-shadow: var(--shadow);
            backdrop-filter: blur(10px);
        }

        @media (max-width: 992px) {
            .sidebar { width: 96px; min-width: 96px; }
            .brand-text, .sidebar-label, .sidebar-link span { display: none; }
            .sidebar-link { justify-content: center; }
        }

        @media (max-width: 768px) {
            .app-layout { flex-direction: column; }
            .sidebar { width: 100%; min-width: 100%; height: auto; position: relative; }
            .brand-text, .sidebar-label, .sidebar-link span { display: block; }
            .page, .topbar { padding-left: 1rem; padding-right: 1rem; }
        }
    </style>

    {% block extra_css %}{% endblock %}
</head>
<body>
<div class=\"app-layout\">
    <aside class=\"sidebar\">
        <div class=\"brand\">
            <div class=\"brand-icon\"><i class=\"fas fa-brain\"></i></div>
            <div class=\"brand-text\">
                <div class=\"brand-title\">MindBoost</div>
                <div class=\"brand-subtitle\">Back Office</div>
            </div>
        </div>

        <div class=\"sidebar-label\">Navigation</div>

        <a href=\"{{ path('dashboard') }}\" class=\"sidebar-link {% if app.request.attributes.get('_route') == 'dashboard' %}active{% endif %}\">
            <i class=\"fas fa-house\"></i><span>Dashboard</span>
        </a>
        <a href=\"{{ path('general_test_index') }}\" class=\"sidebar-link {% if app.request.attributes.get('_route') starts with 'general_test_' %}active{% endif %}\">
            <i class=\"fas fa-book-open\"></i><span>Tests Généraux</span>
        </a>
        <a href=\"{{ path('specific_test_index') }}\" class=\"sidebar-link {% if app.request.attributes.get('_route') starts with 'specific_test_' %}active{% endif %}\">
            <i class=\"fas fa-layer-group\"></i><span>Tests Spécifiques</span>
        </a>
        <a href=\"{{ path('admin_results_history') }}\" class=\"sidebar-link {% if app.request.attributes.get('_route') == 'admin_results_history' %}active{% endif %}\">
            <i class=\"fas fa-table-list\"></i><span>Historique résultats</span>
        </a>
        <a href=\"{{ path('admin_analytics_dashboard') }}\" class=\"sidebar-link {% if app.request.attributes.get('_route') == 'admin_analytics_dashboard' %}active{% endif %}\">
            <i class=\"fas fa-chart-simple\"></i><span>Analytics</span>
        </a>
        <a href=\"{{ path('admin_statistics_dashboard') }}\" class=\"sidebar-link {% if app.request.attributes.get('_route') == 'admin_statistics_dashboard' %}active{% endif %}\">
            <i class=\"fas fa-chart-pie\"></i><span>Statistiques</span>
        </a>

        <hr class=\"sidebar-divider\">

        <a href=\"{{ path('front_user_home') }}\" class=\"sidebar-link\">
            <i class=\"fas fa-user\"></i><span>Espace User</span>
        </a>
    </aside>

    <main class=\"main\">
        <div class=\"topbar\">
            <div>
                <h2>MindBoost Admin Panel</h2>
                <p>Gestion professionnelle des tests psychologiques</p>
            </div>
            <div class=\"topbar-chip\">
                <i class=\"fas fa-shield-heart me-2\"></i>Admin
            </div>
        </div>

        <div class=\"page\">
            {% for message in app.flashes('success') %}
                <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fas fa-circle-check me-2\"></i>{{ message }}
                    <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\"></button>
                </div>
            {% endfor %}

            {% for message in app.flashes('error') %}
                <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fas fa-circle-xmark me-2\"></i>{{ message }}
                    <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\"></button>
                </div>
            {% endfor %}

            {% for message in app.flashes('warning') %}
                <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fas fa-triangle-exclamation me-2\"></i>{{ message }}
                    <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\"></button>
                </div>
            {% endfor %}

            <div class=\"page-shell\">
                {% block content %}{% endblock %}
            </div>
        </div>
    </main>
</div>

<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js\"></script>

{% block javascripts %}
    {{ importmap('app') }}
{% endblock %}
</body>
</html>", "base.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/base.html.twig");
    }
}
