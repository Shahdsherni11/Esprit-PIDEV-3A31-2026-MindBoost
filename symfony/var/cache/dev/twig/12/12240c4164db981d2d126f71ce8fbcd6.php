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

/* front/base.html.twig */
class __TwigTemplate_1f4111bb6871aa9197a4696b9923da81 extends Template
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
            'page_title' => [$this, 'block_page_title'],
            'page_subtitle' => [$this, 'block_page_subtitle'],
            'body' => [$this, 'block_body'],
            'content' => [$this, 'block_content'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"";
        // line 2
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 2), "locale", [], "any", true, true, false, 2)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 2, $this->source); })()), "request", [], "any", false, false, false, 2), "locale", [], "any", false, false, false, 2), "fr")) : ("fr")), "html", null, true);
        yield "\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>

    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css\" rel=\"stylesheet\">

    ";
        // line 12
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 13
        yield "
    <style>
        :root {
            --primary: #2563eb;
            --primary-2: #3b82f6;
            --secondary: #06b6d4;
            --accent: #14b8a6;
            --bg-main: #eef4ff;
            --card: #ffffff;
            --border: #dbe7ff;
            --text-main: #17253a;
            --text-soft: #6c7b95;
            --success: #16a34a;
            --warning: #f59e0b;
            --danger: #ef4444;
            --shadow: 0 18px 40px rgba(37,99,235,0.08);
            --radius-xl: 28px;
            --radius-lg: 20px;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Inter', 'Segoe UI', sans-serif;
            color: var(--text-main);
            background:
                radial-gradient(circle at top right, rgba(37,99,235,0.10), transparent 22%),
                radial-gradient(circle at bottom left, rgba(6,182,212,0.08), transparent 25%),
                linear-gradient(135deg, #edf4ff 0%, #f8fbff 100%);
            min-height: 100vh;
        }

        .front-layout {
            display: flex;
            min-height: 100vh;
        }

        .front-sidebar {
            width: 270px;
            min-width: 270px;
            background: linear-gradient(180deg, #0f2a57 0%, #13376f 100%);
            color: white;
            padding: 1.5rem 1rem;
            box-shadow: 10px 0 28px rgba(0,0,0,0.10);
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
        }

        .front-brand {
            display: flex;
            align-items: center;
            gap: .9rem;
            padding: 0 .4rem;
            margin-bottom: 2rem;
        }

        .front-brand-icon {
            width: 52px;
            height: 52px;
            border-radius: 18px;
            background: linear-gradient(135deg, var(--primary-2), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
            box-shadow: 0 14px 26px rgba(59,130,246,0.28);
        }

        .front-brand-title {
            font-size: 1.35rem;
            font-weight: 800;
            color: white;
            line-height: 1.1;
        }

        .front-brand-subtitle {
            color: rgba(255,255,255,0.70);
            font-size: .88rem;
            margin-top: .15rem;
        }

        .front-sidebar-label {
            color: rgba(255,255,255,0.55);
            font-size: .76rem;
            text-transform: uppercase;
            letter-spacing: .12em;
            font-weight: 700;
            margin: 1rem .8rem .8rem;
        }

        .front-sidebar-link {
            display: flex;
            align-items: center;
            gap: .85rem;
            color: rgba(255,255,255,0.86);
            text-decoration: none;
            padding: .95rem 1rem;
            border-radius: 18px;
            margin-bottom: .45rem;
            font-weight: 600;
            transition: all .22s ease;
        }

        .front-sidebar-link:hover {
            background: rgba(255,255,255,0.10);
            color: white;
            transform: translateX(4px);
        }

        .front-sidebar-link.active {
            background: linear-gradient(90deg, rgba(255,255,255,0.16), rgba(20,184,166,0.12));
            border: 1px solid rgba(255,255,255,0.10);
            color: white;
        }

        .front-sidebar-link i { width: 20px; text-align: center; }

        .front-sidebar-divider {
            border: none;
            border-top: 1px solid rgba(255,255,255,0.10);
            margin: 1rem 0;
        }

        .front-main {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        .front-topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.35rem 2rem;
            background: rgba(255,255,255,0.70);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(37,99,235,0.06);
            gap: 1rem;
        }

        .front-topbar h2 {
            margin: 0;
            font-size: 1.15rem;
            font-weight: 800;
        }

        .front-topbar p {
            margin: .2rem 0 0;
            color: var(--text-soft);
            font-size: .9rem;
        }

        .front-topbar-right {
            display: flex;
            align-items: center;
            gap: .75rem;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .front-chip {
            background: white;
            border: 1px solid #e2ebfb;
            color: var(--primary);
            padding: .85rem 1.2rem;
            border-radius: 999px;
            font-weight: 700;
            box-shadow: 0 10px 25px rgba(37,99,235,0.08);
            white-space: nowrap;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }

        .front-chip:hover { background: #eef4ff; color: var(--primary); }

        .front-page { padding: 2rem; }

        .front-shell {
            background: linear-gradient(180deg, rgba(255,255,255,0.70) 0%, rgba(255,255,255,0.55) 100%);
            border: 1px solid rgba(37,99,235,0.08);
            border-radius: 34px;
            padding: 2rem;
            box-shadow: var(--shadow);
            backdrop-filter: blur(10px);
        }

        .page-heading { margin-bottom: 1.6rem; }

        .page-heading h1 {
            margin: 0;
            font-size: 2.25rem;
            font-weight: 900;
            color: var(--text-main);
            letter-spacing: -0.02em;
        }

        .page-heading p {
            margin: .5rem 0 0;
            color: var(--text-soft);
            font-size: 1.02rem;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 900;
            color: var(--text-main);
            margin-bottom: .25rem;
        }

        .page-subtitle {
            color: var(--text-soft);
            font-size: 1rem;
        }

        .btn {
            border: none;
            border-radius: 16px;
            padding: .85rem 1.2rem;
            font-weight: 700;
            transition: all .22s ease;
        }

        .btn:hover { transform: translateY(-2px); }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-2));
            color: white;
            box-shadow: 0 12px 24px rgba(37,99,235,0.20);
        }

        .btn-secondary {
            background: #eef4ff;
            color: var(--primary);
            border: 1px solid #d7e5ff;
        }

        .btn-success {
            background: linear-gradient(135deg, var(--secondary), var(--accent));
            color: white;
            box-shadow: 0 12px 24px rgba(6,182,212,0.18);
        }

        .btn-danger {
            background: linear-gradient(135deg, #f87171, var(--danger));
            color: white;
        }

        .btn-warning {
            background: linear-gradient(135deg, #fcd34d, var(--warning));
            color: #7c2d12;
        }

        .btn-outline-primary  { border: 1px solid var(--primary) !important; color: var(--primary) !important; background: transparent; }
        .btn-outline-primary:hover  { background: rgba(37,99,235,0.08) !important; }
        .btn-outline-secondary { border: 1px solid #d7e5ff !important; color: var(--text-soft) !important; background: transparent; }
        .btn-outline-secondary:hover { background: #f0f6ff !important; }
        .btn-outline-success  { border: 1px solid var(--success) !important; color: var(--success) !important; background: transparent; }
        .btn-outline-success:hover  { background: rgba(22,163,74,0.08) !important; }
        .btn-outline-danger   { border: 1px solid var(--danger) !important; color: var(--danger) !important; background: transparent; }
        .btn-outline-danger:hover   { background: rgba(239,68,68,0.08) !important; }
        .btn-outline-warning  { border: 1px solid var(--warning) !important; color: #b45309 !important; background: transparent; }
        .btn-outline-warning:hover  { background: rgba(245,158,11,0.08) !important; }

        .profane-blur { filter: blur(6px); transition: filter .25s; cursor: pointer; user-select: none; }
        .profane-blur:hover { filter: blur(4px); }

        .form-control, .form-select {
            border-radius: 16px;
            border: 1px solid #d8e5fb;
            background: #fbfdff;
            color: var(--text-main);
            padding: .9rem 1rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-2);
            box-shadow: 0 0 0 .2rem rgba(37,99,235,0.12);
        }

        .table { color: var(--text-main); }
        .table th { color: var(--text-main); font-weight: 700; border-color: var(--border); }
        .table td { border-color: var(--border); vertical-align: middle; }
        .table tbody tr:hover { background: rgba(37,99,235,0.04); }

        .card {
            background: white;
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
        }

        .badge { font-size: .8rem; font-weight: 700; padding: .5rem .85rem; border-radius: 999px; }

        .alert { border: none; border-radius: 18px; }
        .alert-success { background: rgba(22,163,74,0.10); color: #166534; }
        .alert-danger  { background: rgba(239,68,68,0.10); color: #991b1b; }
        .alert-warning { background: rgba(245,158,11,0.12); color: #92400e; }
        .alert-info    { background: rgba(6,182,212,0.10); color: #155e75; }

        @media (max-width: 992px) {
            .front-sidebar { width: 90px; min-width: 90px; }
            .front-brand-text, .front-sidebar-label, .front-sidebar-link span { display: none; }
            .front-sidebar-link { justify-content: center; }
        }

        @media (max-width: 768px) {
            .front-layout { flex-direction: column; }
            .front-sidebar { width: 100%; min-width: 100%; height: auto; position: relative; }
            .front-brand-text, .front-sidebar-label, .front-sidebar-link span { display: block; }
            .front-page, .front-topbar { padding-left: 1rem; padding-right: 1rem; }
            .front-topbar { flex-direction: column; align-items: flex-start; }
            .front-topbar-right { width: 100%; justify-content: space-between; }
            .front-shell { padding: 1.2rem; border-radius: 24px; }
            .page-heading h1 { font-size: 1.8rem; }
        }
    </style>

    ";
        // line 335
        yield from $this->unwrap()->yieldBlock('extra_css', $context, $blocks);
        // line 336
        yield "</head>
<body>
<div class=\"front-layout\">
    <aside class=\"front-sidebar\">
        <div class=\"front-brand\">
            <div class=\"front-brand-icon\">
                <i class=\"fas fa-brain\"></i>
            </div>
            <div class=\"front-brand-text\">
                <div class=\"front-brand-title\">MindBoost</div>
                <div class=\"front-brand-subtitle\">Espace Utilisateur</div>
            </div>
        </div>

        <div class=\"front-sidebar-label\">Navigation</div>

        <a href=\"";
        // line 352
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\"
           class=\"front-sidebar-link ";
        // line 353
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 353, $this->source); })()), "request", [], "any", false, false, false, 353), "attributes", [], "any", false, false, false, 353), "get", ["_route"], "method", false, false, false, 353) == "app_home")) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-house\"></i>
            <span>Accueil</span>
        </a>

        <div class=\"front-sidebar-label\">Forum</div>

        <a href=\"";
        // line 360
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_post_index");
        yield "\"
           class=\"front-sidebar-link ";
        // line 361
        if (((is_string($_v0 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 361, $this->source); })()), "request", [], "any", false, false, false, 361), "attributes", [], "any", false, false, false, 361), "get", ["_route"], "method", false, false, false, 361)) && is_string($_v1 = "front_post_") && str_starts_with($_v0, $_v1)) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 361, $this->source); })()), "request", [], "any", false, false, false, 361), "attributes", [], "any", false, false, false, 361), "get", ["_route"], "method", false, false, false, 361) != "front_post_new"))) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-comments\"></i>
            <span>Posts</span>
        </a>

        <a href=\"";
        // line 366
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_post_new");
        yield "\"
           class=\"front-sidebar-link ";
        // line 367
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 367, $this->source); })()), "request", [], "any", false, false, false, 367), "attributes", [], "any", false, false, false, 367), "get", ["_route"], "method", false, false, false, 367) == "front_post_new")) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-pen-to-square\"></i>
            <span>Nouveau Post</span>
        </a>

        <a href=\"";
        // line 372
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_saves_index");
        yield "\"
           class=\"front-sidebar-link ";
        // line 373
        if ((is_string($_v2 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 373, $this->source); })()), "request", [], "any", false, false, false, 373), "attributes", [], "any", false, false, false, 373), "get", ["_route"], "method", false, false, false, 373)) && is_string($_v3 = "front_saves_") && str_starts_with($_v2, $_v3))) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-bookmark\"></i>
            <span>Mes Sauvegardes</span>
        </a>

        <a href=\"";
        // line 378
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_achievement_index");
        yield "\"
           class=\"front-sidebar-link ";
        // line 379
        if ((is_string($_v4 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 379, $this->source); })()), "request", [], "any", false, false, false, 379), "attributes", [], "any", false, false, false, 379), "get", ["_route"], "method", false, false, false, 379)) && is_string($_v5 = "front_achievement_") && str_starts_with($_v4, $_v5))) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-trophy\"></i>
            <span>Achievements</span>
        </a>

        <div class=\"front-sidebar-label\">Productivité</div>

        <a href=\"";
        // line 386
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tache_focus_index");
        yield "\"
           class=\"front-sidebar-link ";
        // line 387
        if (((is_string($_v6 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 387, $this->source); })()), "request", [], "any", false, false, false, 387), "attributes", [], "any", false, false, false, 387), "get", ["_route"], "method", false, false, false, 387)) && is_string($_v7 = "app_tache_focus") && str_starts_with($_v6, $_v7)) || (is_string($_v8 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 387, $this->source); })()), "request", [], "any", false, false, false, 387), "attributes", [], "any", false, false, false, 387), "get", ["_route"], "method", false, false, false, 387)) && is_string($_v9 = "app_sous_tache_") && str_starts_with($_v8, $_v9)))) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-check-circle\"></i>
            <span>Mes Tâches</span>
        </a>

        <a href=\"";
        // line 392
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tache_focus_new");
        yield "\"
           class=\"front-sidebar-link ";
        // line 393
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 393, $this->source); })()), "request", [], "any", false, false, false, 393), "attributes", [], "any", false, false, false, 393), "get", ["_route"], "method", false, false, false, 393) == "app_tache_focus_new")) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-plus-circle\"></i>
            <span>Nouvelle Tâche</span>
        </a>

        <a href=\"";
        // line 398
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sous_tache_index");
        yield "\"
           class=\"front-sidebar-link ";
        // line 399
        if ((is_string($_v10 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 399, $this->source); })()), "request", [], "any", false, false, false, 399), "attributes", [], "any", false, false, false, 399), "get", ["_route"], "method", false, false, false, 399)) && is_string($_v11 = "app_sous_tache") && str_starts_with($_v10, $_v11))) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-list-check\"></i>
            <span>Sous-Tâches</span>
        </a>

        <div class=\"front-sidebar-label\">Test Psy</div>

        <a href=\"";
        // line 406
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_user_home");
        yield "\"
           class=\"front-sidebar-link ";
        // line 407
        if (((is_string($_v12 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 407, $this->source); })()), "request", [], "any", false, false, false, 407), "attributes", [], "any", false, false, false, 407), "get", ["_route"], "method", false, false, false, 407)) && is_string($_v13 = "front_user") && str_starts_with($_v12, $_v13)) || (is_string($_v14 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 407, $this->source); })()), "request", [], "any", false, false, false, 407), "attributes", [], "any", false, false, false, 407), "get", ["_route"], "method", false, false, false, 407)) && is_string($_v15 = "front_test") && str_starts_with($_v14, $_v15)))) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-clipboard-list\"></i>
            <span>Tests Psy</span>
        </a>

        <a href=\"";
        // line 412
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_test_history");
        yield "\"
           class=\"front-sidebar-link ";
        // line 413
        if (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 413, $this->source); })()), "request", [], "any", false, false, false, 413), "attributes", [], "any", false, false, false, 413), "get", ["_route"], "method", false, false, false, 413) == "user_test_history") || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 413, $this->source); })()), "request", [], "any", false, false, false, 413), "attributes", [], "any", false, false, false, 413), "get", ["_route"], "method", false, false, false, 413) == "user_test_evolution"))) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-clock-rotate-left\"></i>
            <span>Historique</span>
        </a>

        <a href=\"";
        // line 418
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_statistics_dashboard");
        yield "\"
           class=\"front-sidebar-link ";
        // line 419
        if ((is_string($_v16 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 419, $this->source); })()), "request", [], "any", false, false, false, 419), "attributes", [], "any", false, false, false, 419), "get", ["_route"], "method", false, false, false, 419)) && is_string($_v17 = "user_statistics") && str_starts_with($_v16, $_v17))) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-chart-line\"></i>
            <span>Statistiques &amp; Mailing</span>
        </a>

        <a href=\"";
        // line 424
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_ai_chat");
        yield "\"
           class=\"front-sidebar-link ";
        // line 425
        if ((is_string($_v18 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 425, $this->source); })()), "request", [], "any", false, false, false, 425), "attributes", [], "any", false, false, false, 425), "get", ["_route"], "method", false, false, false, 425)) && is_string($_v19 = "user_ai_") && str_starts_with($_v18, $_v19))) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-robot\"></i>
            <span>Coach IA</span>
        </a>

        <a href=\"";
        // line 430
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile_show");
        yield "\"
           class=\"front-sidebar-link ";
        // line 431
        if ((is_string($_v20 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 431, $this->source); })()), "request", [], "any", false, false, false, 431), "attributes", [], "any", false, false, false, 431), "get", ["_route"], "method", false, false, false, 431)) && is_string($_v21 = "app_profile") && str_starts_with($_v20, $_v21))) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-user-circle\"></i>
            <span>Mon Profil</span>
        </a>

        ";
        // line 436
        if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 437
            yield "        <hr class=\"front-sidebar-divider\">
        <div class=\"front-sidebar-label\">Administration</div>
        <a href=\"";
            // line 439
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_dashboard");
            yield "\"
           class=\"front-sidebar-link\">
            <i class=\"fas fa-shield-heart\"></i>
            <span>Espace Admin</span>
        </a>
        ";
        }
        // line 445
        yield "
        <hr class=\"front-sidebar-divider\">

        ";
        // line 448
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 448, $this->source); })()), "user", [], "any", false, false, false, 448)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 449
            yield "        <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            yield "\" class=\"front-sidebar-link\">
            <i class=\"fas fa-sign-out-alt\"></i>
            <span>Déconnexion</span>
        </a>
        ";
        } else {
            // line 454
            yield "        <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\" class=\"front-sidebar-link\">
            <i class=\"fas fa-sign-in-alt\"></i>
            <span>Connexion</span>
        </a>
        <a href=\"";
            // line 458
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
            yield "\" class=\"front-sidebar-link\">
            <i class=\"fas fa-user-plus\"></i>
            <span>Inscription</span>
        </a>
        ";
        }
        // line 463
        yield "    </aside>

    <main class=\"front-main\">
        <div class=\"front-topbar\">
            <div>
                <h2>";
        // line 468
        yield from $this->unwrap()->yieldBlock('page_title', $context, $blocks);
        yield "</h2>
                <p>";
        // line 469
        yield from $this->unwrap()->yieldBlock('page_subtitle', $context, $blocks);
        yield "</p>
            </div>

            <div class=\"front-topbar-right\">
                ";
        // line 473
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 473, $this->source); })()), "user", [], "any", false, false, false, 473)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 474
            yield "                <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile_show");
            yield "\" class=\"front-chip\">
                    <i class=\"fas fa-user me-2\"></i>";
            // line 475
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 475, $this->source); })()), "user", [], "any", false, false, false, 475), "displayName", [], "any", false, false, false, 475), "html", null, true);
            yield "
                </a>
                ";
        } else {
            // line 478
            yield "                <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\" class=\"front-chip\">
                    <i class=\"fas fa-sign-in-alt me-2\"></i>Connexion
                </a>
                ";
        }
        // line 482
        yield "            </div>
        </div>

        <div class=\"front-page\">
            ";
        // line 486
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 486, $this->source); })()), "flashes", ["success"], "method", false, false, false, 486));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 487
            yield "                <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fas fa-circle-check me-2\"></i>";
            // line 488
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 492
        yield "
            ";
        // line 493
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 493, $this->source); })()), "flashes", ["error"], "method", false, false, false, 493));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 494
            yield "                <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fas fa-circle-xmark me-2\"></i>";
            // line 495
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 499
        yield "
            ";
        // line 500
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 500, $this->source); })()), "flashes", ["warning"], "method", false, false, false, 500));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 501
            yield "                <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fas fa-triangle-exclamation me-2\"></i>";
            // line 502
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 506
        yield "
            <div class=\"front-shell\">
                ";
        // line 508
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 509
        yield "            </div>
        </div>
    </main>
</div>

<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js\"></script>
";
        // line 515
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 518
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

        yield "MindBoost Espace Étudiant";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 12
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

    // line 335
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

    // line 468
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

        yield "MindBoost";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 469
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_subtitle(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_subtitle"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_subtitle"));

        yield "Espace calme, lisible et centré sur l'utilisateur";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 508
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

        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

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

    // line 515
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

        // line 516
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
        return "front/base.html.twig";
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
        return array (  956 => 516,  943 => 515,  899 => 508,  876 => 469,  853 => 468,  831 => 335,  809 => 12,  786 => 6,  774 => 518,  772 => 515,  764 => 509,  762 => 508,  758 => 506,  748 => 502,  745 => 501,  741 => 500,  738 => 499,  728 => 495,  725 => 494,  721 => 493,  718 => 492,  708 => 488,  705 => 487,  701 => 486,  695 => 482,  687 => 478,  681 => 475,  676 => 474,  674 => 473,  667 => 469,  663 => 468,  656 => 463,  648 => 458,  640 => 454,  631 => 449,  629 => 448,  624 => 445,  615 => 439,  611 => 437,  609 => 436,  599 => 431,  595 => 430,  585 => 425,  581 => 424,  571 => 419,  567 => 418,  557 => 413,  553 => 412,  543 => 407,  539 => 406,  527 => 399,  523 => 398,  513 => 393,  509 => 392,  499 => 387,  495 => 386,  483 => 379,  479 => 378,  469 => 373,  465 => 372,  455 => 367,  451 => 366,  441 => 361,  437 => 360,  425 => 353,  421 => 352,  403 => 336,  401 => 335,  77 => 13,  75 => 12,  66 => 6,  59 => 2,  56 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"{{ app.request.locale|default('fr') }}\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{% block title %}MindBoost Espace Étudiant{% endblock %}</title>

    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css\" rel=\"stylesheet\">

    {% block stylesheets %}{% endblock %}

    <style>
        :root {
            --primary: #2563eb;
            --primary-2: #3b82f6;
            --secondary: #06b6d4;
            --accent: #14b8a6;
            --bg-main: #eef4ff;
            --card: #ffffff;
            --border: #dbe7ff;
            --text-main: #17253a;
            --text-soft: #6c7b95;
            --success: #16a34a;
            --warning: #f59e0b;
            --danger: #ef4444;
            --shadow: 0 18px 40px rgba(37,99,235,0.08);
            --radius-xl: 28px;
            --radius-lg: 20px;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Inter', 'Segoe UI', sans-serif;
            color: var(--text-main);
            background:
                radial-gradient(circle at top right, rgba(37,99,235,0.10), transparent 22%),
                radial-gradient(circle at bottom left, rgba(6,182,212,0.08), transparent 25%),
                linear-gradient(135deg, #edf4ff 0%, #f8fbff 100%);
            min-height: 100vh;
        }

        .front-layout {
            display: flex;
            min-height: 100vh;
        }

        .front-sidebar {
            width: 270px;
            min-width: 270px;
            background: linear-gradient(180deg, #0f2a57 0%, #13376f 100%);
            color: white;
            padding: 1.5rem 1rem;
            box-shadow: 10px 0 28px rgba(0,0,0,0.10);
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
        }

        .front-brand {
            display: flex;
            align-items: center;
            gap: .9rem;
            padding: 0 .4rem;
            margin-bottom: 2rem;
        }

        .front-brand-icon {
            width: 52px;
            height: 52px;
            border-radius: 18px;
            background: linear-gradient(135deg, var(--primary-2), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
            box-shadow: 0 14px 26px rgba(59,130,246,0.28);
        }

        .front-brand-title {
            font-size: 1.35rem;
            font-weight: 800;
            color: white;
            line-height: 1.1;
        }

        .front-brand-subtitle {
            color: rgba(255,255,255,0.70);
            font-size: .88rem;
            margin-top: .15rem;
        }

        .front-sidebar-label {
            color: rgba(255,255,255,0.55);
            font-size: .76rem;
            text-transform: uppercase;
            letter-spacing: .12em;
            font-weight: 700;
            margin: 1rem .8rem .8rem;
        }

        .front-sidebar-link {
            display: flex;
            align-items: center;
            gap: .85rem;
            color: rgba(255,255,255,0.86);
            text-decoration: none;
            padding: .95rem 1rem;
            border-radius: 18px;
            margin-bottom: .45rem;
            font-weight: 600;
            transition: all .22s ease;
        }

        .front-sidebar-link:hover {
            background: rgba(255,255,255,0.10);
            color: white;
            transform: translateX(4px);
        }

        .front-sidebar-link.active {
            background: linear-gradient(90deg, rgba(255,255,255,0.16), rgba(20,184,166,0.12));
            border: 1px solid rgba(255,255,255,0.10);
            color: white;
        }

        .front-sidebar-link i { width: 20px; text-align: center; }

        .front-sidebar-divider {
            border: none;
            border-top: 1px solid rgba(255,255,255,0.10);
            margin: 1rem 0;
        }

        .front-main {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        .front-topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.35rem 2rem;
            background: rgba(255,255,255,0.70);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(37,99,235,0.06);
            gap: 1rem;
        }

        .front-topbar h2 {
            margin: 0;
            font-size: 1.15rem;
            font-weight: 800;
        }

        .front-topbar p {
            margin: .2rem 0 0;
            color: var(--text-soft);
            font-size: .9rem;
        }

        .front-topbar-right {
            display: flex;
            align-items: center;
            gap: .75rem;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .front-chip {
            background: white;
            border: 1px solid #e2ebfb;
            color: var(--primary);
            padding: .85rem 1.2rem;
            border-radius: 999px;
            font-weight: 700;
            box-shadow: 0 10px 25px rgba(37,99,235,0.08);
            white-space: nowrap;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }

        .front-chip:hover { background: #eef4ff; color: var(--primary); }

        .front-page { padding: 2rem; }

        .front-shell {
            background: linear-gradient(180deg, rgba(255,255,255,0.70) 0%, rgba(255,255,255,0.55) 100%);
            border: 1px solid rgba(37,99,235,0.08);
            border-radius: 34px;
            padding: 2rem;
            box-shadow: var(--shadow);
            backdrop-filter: blur(10px);
        }

        .page-heading { margin-bottom: 1.6rem; }

        .page-heading h1 {
            margin: 0;
            font-size: 2.25rem;
            font-weight: 900;
            color: var(--text-main);
            letter-spacing: -0.02em;
        }

        .page-heading p {
            margin: .5rem 0 0;
            color: var(--text-soft);
            font-size: 1.02rem;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 900;
            color: var(--text-main);
            margin-bottom: .25rem;
        }

        .page-subtitle {
            color: var(--text-soft);
            font-size: 1rem;
        }

        .btn {
            border: none;
            border-radius: 16px;
            padding: .85rem 1.2rem;
            font-weight: 700;
            transition: all .22s ease;
        }

        .btn:hover { transform: translateY(-2px); }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-2));
            color: white;
            box-shadow: 0 12px 24px rgba(37,99,235,0.20);
        }

        .btn-secondary {
            background: #eef4ff;
            color: var(--primary);
            border: 1px solid #d7e5ff;
        }

        .btn-success {
            background: linear-gradient(135deg, var(--secondary), var(--accent));
            color: white;
            box-shadow: 0 12px 24px rgba(6,182,212,0.18);
        }

        .btn-danger {
            background: linear-gradient(135deg, #f87171, var(--danger));
            color: white;
        }

        .btn-warning {
            background: linear-gradient(135deg, #fcd34d, var(--warning));
            color: #7c2d12;
        }

        .btn-outline-primary  { border: 1px solid var(--primary) !important; color: var(--primary) !important; background: transparent; }
        .btn-outline-primary:hover  { background: rgba(37,99,235,0.08) !important; }
        .btn-outline-secondary { border: 1px solid #d7e5ff !important; color: var(--text-soft) !important; background: transparent; }
        .btn-outline-secondary:hover { background: #f0f6ff !important; }
        .btn-outline-success  { border: 1px solid var(--success) !important; color: var(--success) !important; background: transparent; }
        .btn-outline-success:hover  { background: rgba(22,163,74,0.08) !important; }
        .btn-outline-danger   { border: 1px solid var(--danger) !important; color: var(--danger) !important; background: transparent; }
        .btn-outline-danger:hover   { background: rgba(239,68,68,0.08) !important; }
        .btn-outline-warning  { border: 1px solid var(--warning) !important; color: #b45309 !important; background: transparent; }
        .btn-outline-warning:hover  { background: rgba(245,158,11,0.08) !important; }

        .profane-blur { filter: blur(6px); transition: filter .25s; cursor: pointer; user-select: none; }
        .profane-blur:hover { filter: blur(4px); }

        .form-control, .form-select {
            border-radius: 16px;
            border: 1px solid #d8e5fb;
            background: #fbfdff;
            color: var(--text-main);
            padding: .9rem 1rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-2);
            box-shadow: 0 0 0 .2rem rgba(37,99,235,0.12);
        }

        .table { color: var(--text-main); }
        .table th { color: var(--text-main); font-weight: 700; border-color: var(--border); }
        .table td { border-color: var(--border); vertical-align: middle; }
        .table tbody tr:hover { background: rgba(37,99,235,0.04); }

        .card {
            background: white;
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
        }

        .badge { font-size: .8rem; font-weight: 700; padding: .5rem .85rem; border-radius: 999px; }

        .alert { border: none; border-radius: 18px; }
        .alert-success { background: rgba(22,163,74,0.10); color: #166534; }
        .alert-danger  { background: rgba(239,68,68,0.10); color: #991b1b; }
        .alert-warning { background: rgba(245,158,11,0.12); color: #92400e; }
        .alert-info    { background: rgba(6,182,212,0.10); color: #155e75; }

        @media (max-width: 992px) {
            .front-sidebar { width: 90px; min-width: 90px; }
            .front-brand-text, .front-sidebar-label, .front-sidebar-link span { display: none; }
            .front-sidebar-link { justify-content: center; }
        }

        @media (max-width: 768px) {
            .front-layout { flex-direction: column; }
            .front-sidebar { width: 100%; min-width: 100%; height: auto; position: relative; }
            .front-brand-text, .front-sidebar-label, .front-sidebar-link span { display: block; }
            .front-page, .front-topbar { padding-left: 1rem; padding-right: 1rem; }
            .front-topbar { flex-direction: column; align-items: flex-start; }
            .front-topbar-right { width: 100%; justify-content: space-between; }
            .front-shell { padding: 1.2rem; border-radius: 24px; }
            .page-heading h1 { font-size: 1.8rem; }
        }
    </style>

    {% block extra_css %}{% endblock %}
</head>
<body>
<div class=\"front-layout\">
    <aside class=\"front-sidebar\">
        <div class=\"front-brand\">
            <div class=\"front-brand-icon\">
                <i class=\"fas fa-brain\"></i>
            </div>
            <div class=\"front-brand-text\">
                <div class=\"front-brand-title\">MindBoost</div>
                <div class=\"front-brand-subtitle\">Espace Utilisateur</div>
            </div>
        </div>

        <div class=\"front-sidebar-label\">Navigation</div>

        <a href=\"{{ path('app_home') }}\"
           class=\"front-sidebar-link {% if app.request.attributes.get('_route') == 'app_home' %}active{% endif %}\">
            <i class=\"fas fa-house\"></i>
            <span>Accueil</span>
        </a>

        <div class=\"front-sidebar-label\">Forum</div>

        <a href=\"{{ path('front_post_index') }}\"
           class=\"front-sidebar-link {% if app.request.attributes.get('_route') starts with 'front_post_' and app.request.attributes.get('_route') != 'front_post_new' %}active{% endif %}\">
            <i class=\"fas fa-comments\"></i>
            <span>Posts</span>
        </a>

        <a href=\"{{ path('front_post_new') }}\"
           class=\"front-sidebar-link {% if app.request.attributes.get('_route') == 'front_post_new' %}active{% endif %}\">
            <i class=\"fas fa-pen-to-square\"></i>
            <span>Nouveau Post</span>
        </a>

        <a href=\"{{ path('front_saves_index') }}\"
           class=\"front-sidebar-link {% if app.request.attributes.get('_route') starts with 'front_saves_' %}active{% endif %}\">
            <i class=\"fas fa-bookmark\"></i>
            <span>Mes Sauvegardes</span>
        </a>

        <a href=\"{{ path('front_achievement_index') }}\"
           class=\"front-sidebar-link {% if app.request.attributes.get('_route') starts with 'front_achievement_' %}active{% endif %}\">
            <i class=\"fas fa-trophy\"></i>
            <span>Achievements</span>
        </a>

        <div class=\"front-sidebar-label\">Productivité</div>

        <a href=\"{{ path('app_tache_focus_index') }}\"
           class=\"front-sidebar-link {% if app.request.attributes.get('_route') starts with 'app_tache_focus' or app.request.attributes.get('_route') starts with 'app_sous_tache_' %}active{% endif %}\">
            <i class=\"fas fa-check-circle\"></i>
            <span>Mes Tâches</span>
        </a>

        <a href=\"{{ path('app_tache_focus_new') }}\"
           class=\"front-sidebar-link {% if app.request.attributes.get('_route') == 'app_tache_focus_new' %}active{% endif %}\">
            <i class=\"fas fa-plus-circle\"></i>
            <span>Nouvelle Tâche</span>
        </a>

        <a href=\"{{ path('app_sous_tache_index') }}\"
           class=\"front-sidebar-link {% if app.request.attributes.get('_route') starts with 'app_sous_tache' %}active{% endif %}\">
            <i class=\"fas fa-list-check\"></i>
            <span>Sous-Tâches</span>
        </a>

        <div class=\"front-sidebar-label\">Test Psy</div>

        <a href=\"{{ path('front_user_home') }}\"
           class=\"front-sidebar-link {% if app.request.attributes.get('_route') starts with 'front_user' or app.request.attributes.get('_route') starts with 'front_test' %}active{% endif %}\">
            <i class=\"fas fa-clipboard-list\"></i>
            <span>Tests Psy</span>
        </a>

        <a href=\"{{ path('user_test_history') }}\"
           class=\"front-sidebar-link {% if app.request.attributes.get('_route') == 'user_test_history' or app.request.attributes.get('_route') == 'user_test_evolution' %}active{% endif %}\">
            <i class=\"fas fa-clock-rotate-left\"></i>
            <span>Historique</span>
        </a>

        <a href=\"{{ path('user_statistics_dashboard') }}\"
           class=\"front-sidebar-link {% if app.request.attributes.get('_route') starts with 'user_statistics' %}active{% endif %}\">
            <i class=\"fas fa-chart-line\"></i>
            <span>Statistiques &amp; Mailing</span>
        </a>

        <a href=\"{{ path('user_ai_chat') }}\"
           class=\"front-sidebar-link {% if app.request.attributes.get('_route') starts with 'user_ai_' %}active{% endif %}\">
            <i class=\"fas fa-robot\"></i>
            <span>Coach IA</span>
        </a>

        <a href=\"{{ path('app_profile_show') }}\"
           class=\"front-sidebar-link {% if app.request.attributes.get('_route') starts with 'app_profile' %}active{% endif %}\">
            <i class=\"fas fa-user-circle\"></i>
            <span>Mon Profil</span>
        </a>

        {% if is_granted('ROLE_ADMIN') %}
        <hr class=\"front-sidebar-divider\">
        <div class=\"front-sidebar-label\">Administration</div>
        <a href=\"{{ path('back_dashboard') }}\"
           class=\"front-sidebar-link\">
            <i class=\"fas fa-shield-heart\"></i>
            <span>Espace Admin</span>
        </a>
        {% endif %}

        <hr class=\"front-sidebar-divider\">

        {% if app.user %}
        <a href=\"{{ path('app_logout') }}\" class=\"front-sidebar-link\">
            <i class=\"fas fa-sign-out-alt\"></i>
            <span>Déconnexion</span>
        </a>
        {% else %}
        <a href=\"{{ path('app_login') }}\" class=\"front-sidebar-link\">
            <i class=\"fas fa-sign-in-alt\"></i>
            <span>Connexion</span>
        </a>
        <a href=\"{{ path('app_register') }}\" class=\"front-sidebar-link\">
            <i class=\"fas fa-user-plus\"></i>
            <span>Inscription</span>
        </a>
        {% endif %}
    </aside>

    <main class=\"front-main\">
        <div class=\"front-topbar\">
            <div>
                <h2>{% block page_title %}MindBoost{% endblock %}</h2>
                <p>{% block page_subtitle %}Espace calme, lisible et centré sur l'utilisateur{% endblock %}</p>
            </div>

            <div class=\"front-topbar-right\">
                {% if app.user %}
                <a href=\"{{ path('app_profile_show') }}\" class=\"front-chip\">
                    <i class=\"fas fa-user me-2\"></i>{{ app.user.displayName }}
                </a>
                {% else %}
                <a href=\"{{ path('app_login') }}\" class=\"front-chip\">
                    <i class=\"fas fa-sign-in-alt me-2\"></i>Connexion
                </a>
                {% endif %}
            </div>
        </div>

        <div class=\"front-page\">
            {% for message in app.flashes('success') %}
                <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fas fa-circle-check me-2\"></i>{{ message }}
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                </div>
            {% endfor %}

            {% for message in app.flashes('error') %}
                <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fas fa-circle-xmark me-2\"></i>{{ message }}
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                </div>
            {% endfor %}

            {% for message in app.flashes('warning') %}
                <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fas fa-triangle-exclamation me-2\"></i>{{ message }}
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                </div>
            {% endfor %}

            <div class=\"front-shell\">
                {% block body %}{% block content %}{% endblock %}{% endblock %}
            </div>
        </div>
    </main>
</div>

<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js\"></script>
{% block javascripts %}
    {{ importmap('app') }}
{% endblock %}
</body>
</html>", "front/base.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/front/base.html.twig");
    }
}
