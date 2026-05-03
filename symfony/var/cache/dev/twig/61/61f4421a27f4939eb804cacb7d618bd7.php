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

/* back/base.html.twig */
class __TwigTemplate_a33c7f0cf3cd47be9834b55f07866a41 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/base.html.twig"));

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
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css\" rel=\"stylesheet\">

    ";
        // line 12
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 13
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
            overflow-x: hidden;
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
            flex-shrink: 0;
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
            margin: 1rem 0.8rem 0.5rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            text-decoration: none;
            color: var(--text-soft);
            padding: 0.85rem 1rem;
            border-radius: 18px;
            margin-bottom: 0.35rem;
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

        .sidebar-link i { width: 20px; text-align: center; flex-shrink: 0; }

        .sidebar-divider {
            border: none;
            border-top: 1px solid rgba(255,255,255,0.06);
            margin: 0.75rem 0;
        }

        .sidebar-footer {
            margin-top: auto;
            padding-top: 0.5rem;
            border-top: 1px solid rgba(255,255,255,0.06);
        }

        .sidebar-user {
            font-size: 0.82rem;
            color: var(--text-fade);
            padding: 0.5rem 1rem;
            margin-bottom: 0.25rem;
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
            position: sticky;
            top: 0;
            z-index: 50;
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

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .topbar-chip {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.07);
            color: white;
            padding: 0.6rem 1rem;
            border-radius: 999px;
            font-weight: 600;
            font-size: 0.88rem;
        }

        .topbar-date {
            color: var(--text-fade);
            font-size: 0.85rem;
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

        .page-heading { margin-bottom: 1.5rem; }

        .page-heading h1 {
            font-size: 2rem;
            font-weight: 800;
            margin: 0;
            color: white;
        }

        .page-heading p {
            margin: 0.45rem 0 0;
            color: var(--text-soft);
        }

        .card {
            background: linear-gradient(180deg, rgba(17,32,61,0.98) 0%, rgba(14,27,52,0.98) 100%);
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 26px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(90deg, rgba(47,107,255,0.16), rgba(25,181,254,0.10));
            border-bottom: 1px solid rgba(255,255,255,0.05);
            color: white;
            padding: 1rem 1.25rem;
            font-weight: 800;
        }

        .card-body {
            color: var(--text-main);
            padding: 1.25rem;
        }

        .stat-card {
            background: linear-gradient(180deg, rgba(17,32,61,0.96) 0%, rgba(21,40,76,0.96) 100%);
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 24px;
            padding: 1.25rem;
            height: 100%;
            box-shadow: var(--shadow);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: white;
        }

        .stat-label {
            color: var(--text-soft);
            margin-top: 0.3rem;
        }

        .quick-card {
            display: block;
            background: linear-gradient(180deg, rgba(17,32,61,0.98) 0%, rgba(14,27,52,0.98) 100%);
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 24px;
            padding: 1.5rem;
            text-decoration: none;
            color: var(--text-main);
            transition: all 0.22s ease;
            box-shadow: var(--shadow);
        }

        .quick-card:hover {
            background: linear-gradient(180deg, rgba(47,107,255,0.18) 0%, rgba(25,181,254,0.10) 100%);
            border-color: rgba(77,131,255,0.30);
            transform: translateY(-3px);
            color: white;
        }

        .quick-card h5 { color: white; font-weight: 700; margin: 0.75rem 0 0.4rem; }
        .quick-card p  { color: var(--text-soft); font-size: 0.88rem; margin: 0; }

        h1, h2, h3, h4, h5, h6 { color: var(--text-main); }
        .text-muted { color: var(--text-soft) !important; }
        a { color: var(--primary-light); }
        a:hover { color: var(--secondary); }

        .form-label {
            color: white;
            font-weight: 700;
            margin-bottom: 0.55rem;
        }

        .form-control,
        .form-select,
        textarea.form-control {
            background: #0F1D37;
            border: 1px solid rgba(255,255,255,0.08);
            color: white;
            border-radius: 16px;
            padding: 0.9rem 1rem;
        }

        .form-control::placeholder,
        textarea.form-control::placeholder {
            color: #7F90B6;
        }

        .form-control:focus,
        .form-select:focus {
            background: #122242;
            color: white;
            border-color: var(--primary-light);
            box-shadow: 0 0 0 0.2rem rgba(47,107,255,0.16);
        }

        .form-select option { color: #111827; }

        .btn {
            border: none;
            border-radius: 16px;
            font-weight: 700;
            padding: 0.8rem 1.15rem;
            transition: all 0.22s ease;
        }

        .btn:hover { transform: translateY(-2px); }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
        }

        .btn-success {
            background: linear-gradient(135deg, #00B8D9, var(--accent));
            color: white;
        }

        .btn-warning {
            background: linear-gradient(135deg, #FFC857, var(--warning));
            color: #142033;
        }

        .btn-danger {
            background: linear-gradient(135deg, #FF6B8A, var(--danger));
            color: white;
        }

        .btn-secondary {
            background: rgba(255,255,255,0.08);
            color: white;
            border: 1px solid rgba(255,255,255,0.08);
        }

        .btn-info {
            background: linear-gradient(135deg, #27C2FF, #19B5FE);
            color: white;
        }

        .btn-outline-primary   { border: 1px solid var(--primary) !important; color: var(--primary-light) !important; background: transparent !important; }
        .btn-outline-primary:hover   { background: rgba(47,107,255,0.18) !important; color: white !important; }
        .btn-outline-secondary { border: 1px solid rgba(255,255,255,0.18) !important; color: var(--text-soft) !important; background: transparent !important; }
        .btn-outline-secondary:hover { background: rgba(255,255,255,0.08) !important; color: white !important; }
        .btn-outline-danger    { border: 1px solid var(--danger) !important; color: var(--danger) !important; background: transparent !important; }
        .btn-outline-danger:hover    { background: rgba(255,90,116,0.15) !important; color: white !important; }
        .btn-outline-warning   { border: 1px solid var(--warning) !important; color: var(--warning) !important; background: transparent !important; }
        .btn-outline-warning:hover   { background: rgba(247,184,75,0.15) !important; color: white !important; }
        .btn-close { filter: invert(1) grayscale(1); }

        .table {
            color: var(--text-main);
            margin-bottom: 0;
        }

        .table thead {
            background: rgba(47,107,255,0.12);
        }

        .table th {
            color: white;
            border: none;
            padding: 1rem;
            font-weight: 800;
            white-space: nowrap;
        }

        .table td {
            border-color: rgba(255,255,255,0.05);
            padding: 1rem;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background: rgba(255,255,255,0.03);
        }

        .badge {
            font-size: 0.8rem;
            font-weight: 700;
            padding: 0.55rem 0.8rem;
            border-radius: 999px;
        }

        .alert {
            border-radius: 18px;
            border: 1px solid transparent;
        }

        .alert-success {
            background: rgba(41,204,122,0.12);
            color: #D6FFE8;
            border-color: rgba(41,204,122,0.18);
        }

        .alert-danger {
            background: rgba(255,90,116,0.12);
            color: #FFD8E0;
            border-color: rgba(255,90,116,0.18);
        }

        .alert-warning {
            background: rgba(247,184,75,0.12);
            color: #FFE8B8;
            border-color: rgba(247,184,75,0.18);
        }

        .alert-info {
            background: rgba(25,181,254,0.12);
            color: #C8EEFF;
            border-color: rgba(25,181,254,0.18);
        }

        @media (max-width: 992px) {
            .sidebar {
                width: 80px;
                min-width: 80px;
                padding: 1.5rem 0.5rem;
            }

            .brand-text,
            .sidebar-label,
            .sidebar-link span,
            .sidebar-user,
            .sidebar-footer .sidebar-link span {
                display: none;
            }

            .brand { justify-content: center; }
            .sidebar-link { justify-content: center; padding: 0.85rem; }
        }

        @media (max-width: 768px) {
            .app-layout { flex-direction: column; }

            .sidebar {
                width: 100%;
                min-width: 100%;
                height: auto;
                position: relative;
            }

            .brand-text,
            .sidebar-label,
            .sidebar-link span {
                display: block;
            }

            .sidebar-link { justify-content: flex-start; }
            .page, .topbar { padding-left: 1rem; padding-right: 1rem; }
        }
    </style>

    ";
        // line 480
        yield from $this->unwrap()->yieldBlock('extra_css', $context, $blocks);
        // line 481
        yield "</head>
<body>
<div class=\"app-layout\">
    <aside class=\"sidebar\">
        <div class=\"brand\">
            <div class=\"brand-icon\">
                <i class=\"fas fa-brain\"></i>
            </div>
            <div class=\"brand-text\">
                <div class=\"brand-title\">MindBoost</div>
                <div class=\"brand-subtitle\">Back Office</div>
            </div>
        </div>

        <div class=\"sidebar-label\">Vue d'ensemble</div>
        <a href=\"";
        // line 496
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_dashboard");
        yield "\" class=\"sidebar-link ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 496, $this->source); })()), "request", [], "any", false, false, false, 496), "attributes", [], "any", false, false, false, 496), "get", ["_route"], "method", false, false, false, 496) == "back_dashboard")) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-house\"></i>
            <span>Dashboard Forum</span>
        </a>
        <a href=\"";
        // line 500
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard");
        yield "\" class=\"sidebar-link ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 500, $this->source); })()), "request", [], "any", false, false, false, 500), "attributes", [], "any", false, false, false, 500), "get", ["_route"], "method", false, false, false, 500) == "dashboard")) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-chart-line\"></i>
            <span>Dashboard Tests</span>
        </a>

        <hr class=\"sidebar-divider\">
        <div class=\"sidebar-label\">Forum</div>
        <a href=\"";
        // line 507
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_post_index");
        yield "\" class=\"sidebar-link ";
        if ((is_string($_v0 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 507, $this->source); })()), "request", [], "any", false, false, false, 507), "attributes", [], "any", false, false, false, 507), "get", ["_route"], "method", false, false, false, 507)) && is_string($_v1 = "back_post_") && str_starts_with($_v0, $_v1))) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-file-lines\"></i>
            <span>Posts</span>
        </a>
        <a href=\"";
        // line 511
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_achievement_index");
        yield "\" class=\"sidebar-link ";
        if ((is_string($_v2 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 511, $this->source); })()), "request", [], "any", false, false, false, 511), "attributes", [], "any", false, false, false, 511), "get", ["_route"], "method", false, false, false, 511)) && is_string($_v3 = "back_achievement_") && str_starts_with($_v2, $_v3))) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-trophy\"></i>
            <span>Achievements</span>
        </a>
        <a href=\"";
        // line 515
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_saves_index");
        yield "\" class=\"sidebar-link ";
        if ((is_string($_v4 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 515, $this->source); })()), "request", [], "any", false, false, false, 515), "attributes", [], "any", false, false, false, 515), "get", ["_route"], "method", false, false, false, 515)) && is_string($_v5 = "back_saves_") && str_starts_with($_v4, $_v5))) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-bookmark\"></i>
            <span>Saves</span>
        </a>

        <hr class=\"sidebar-divider\">
        <div class=\"sidebar-label\">Tâches</div>
        <a href=\"";
        // line 522
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_tache_focus_index");
        yield "\" class=\"sidebar-link ";
        if ((is_string($_v6 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 522, $this->source); })()), "request", [], "any", false, false, false, 522), "attributes", [], "any", false, false, false, 522), "get", ["_route"], "method", false, false, false, 522)) && is_string($_v7 = "back_tache_focus") && str_starts_with($_v6, $_v7))) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-square-check\"></i>
            <span>Tâches Focus</span>
        </a>
        <a href=\"";
        // line 526
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_sous_tache_index");
        yield "\" class=\"sidebar-link ";
        if ((is_string($_v8 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 526, $this->source); })()), "request", [], "any", false, false, false, 526), "attributes", [], "any", false, false, false, 526), "get", ["_route"], "method", false, false, false, 526)) && is_string($_v9 = "back_sous_tache") && str_starts_with($_v8, $_v9))) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-list-check\"></i>
            <span>Sous-Tâches</span>
        </a>

        <hr class=\"sidebar-divider\">
        <div class=\"sidebar-label\">Tests Psy</div>
        <a href=\"";
        // line 533
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("general_test_index");
        yield "\" class=\"sidebar-link ";
        if ((is_string($_v10 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 533, $this->source); })()), "request", [], "any", false, false, false, 533), "attributes", [], "any", false, false, false, 533), "get", ["_route"], "method", false, false, false, 533)) && is_string($_v11 = "general_test") && str_starts_with($_v10, $_v11))) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-clipboard-list\"></i>
            <span>Tests Généraux</span>
        </a>
        <a href=\"";
        // line 537
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("specific_test_index");
        yield "\" class=\"sidebar-link ";
        if ((is_string($_v12 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 537, $this->source); })()), "request", [], "any", false, false, false, 537), "attributes", [], "any", false, false, false, 537), "get", ["_route"], "method", false, false, false, 537)) && is_string($_v13 = "specific_test") && str_starts_with($_v12, $_v13))) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-clipboard-check\"></i>
            <span>Tests Spécifiques</span>
        </a>

        <hr class=\"sidebar-divider\">
        <div class=\"sidebar-label\">Insights & Stats</div>
        <a href=\"";
        // line 544
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_results_history");
        yield "\" class=\"sidebar-link ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 544, $this->source); })()), "request", [], "any", false, false, false, 544), "attributes", [], "any", false, false, false, 544), "get", ["_route"], "method", false, false, false, 544) == "admin_results_history")) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-clock-rotate-left\"></i>
            <span>Historique résultats</span>
        </a>
        <a href=\"";
        // line 548
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_analytics_dashboard");
        yield "\" class=\"sidebar-link ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 548, $this->source); })()), "request", [], "any", false, false, false, 548), "attributes", [], "any", false, false, false, 548), "get", ["_route"], "method", false, false, false, 548) == "admin_analytics_dashboard")) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-chart-pie\"></i>
            <span>Analytique</span>
        </a>
        <a href=\"";
        // line 552
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_statistics_dashboard");
        yield "\" class=\"sidebar-link ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 552, $this->source); })()), "request", [], "any", false, false, false, 552), "attributes", [], "any", false, false, false, 552), "get", ["_route"], "method", false, false, false, 552) == "admin_statistics_dashboard")) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-chart-bar\"></i>
            <span>Statistiques & Mailing</span>
        </a>

        <hr class=\"sidebar-divider\">
        <div class=\"sidebar-label\">Intelligence IA</div>
        <a href=\"";
        // line 559
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_ai_tests");
        yield "\" class=\"sidebar-link ";
        if ((is_string($_v14 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 559, $this->source); })()), "request", [], "any", false, false, false, 559), "attributes", [], "any", false, false, false, 559), "get", ["_route"], "method", false, false, false, 559)) && is_string($_v15 = "admin_ai_") && str_starts_with($_v14, $_v15))) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-robot\"></i>
            <span>Gérer par IA</span>
        </a>

        <hr class=\"sidebar-divider\">
        <div class=\"sidebar-label\">Utilisateurs</div>
        <a href=\"";
        // line 566
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_user_list");
        yield "\" class=\"sidebar-link ";
        if ((is_string($_v16 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 566, $this->source); })()), "request", [], "any", false, false, false, 566), "attributes", [], "any", false, false, false, 566), "get", ["_route"], "method", false, false, false, 566)) && is_string($_v17 = "app_admin_user") && str_starts_with($_v16, $_v17))) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-users\"></i>
            <span>Utilisateurs</span>
        </a>
        <a href=\"";
        // line 570
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_profile_list");
        yield "\" class=\"sidebar-link ";
        if ((is_string($_v18 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 570, $this->source); })()), "request", [], "any", false, false, false, 570), "attributes", [], "any", false, false, false, 570), "get", ["_route"], "method", false, false, false, 570)) && is_string($_v19 = "app_admin_profile") && str_starts_with($_v18, $_v19))) {
            yield "active";
        }
        yield "\">
            <i class=\"fas fa-id-badge\"></i>
            <span>Profils</span>
        </a>

        <hr class=\"sidebar-divider\">
        <div class=\"sidebar-footer\">
            ";
        // line 577
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 577, $this->source); })()), "user", [], "any", false, false, false, 577)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 578
            yield "                <div class=\"sidebar-user\">
                    <i class=\"fas fa-circle-user me-1\"></i>";
            // line 579
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 579, $this->source); })()), "user", [], "any", false, false, false, 579), "displayName", [], "any", false, false, false, 579), "html", null, true);
            yield "
                    <span class=\"badge bg-secondary ms-1\" style=\"font-size:0.7rem;padding:0.3rem 0.5rem;border-radius:8px;\">";
            // line 580
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 580, $this->source); })()), "user", [], "any", false, false, false, 580), "role", [], "any", false, false, false, 580), "html", null, true);
            yield "</span>
                </div>
                <a href=\"";
            // line 582
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            yield "\" class=\"sidebar-link\" style=\"color: var(--danger);\">
                    <i class=\"fas fa-right-from-bracket\"></i>
                    <span>Déconnexion</span>
                </a>
            ";
        }
        // line 587
        yield "            <a href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dashboard");
        yield "\" class=\"sidebar-link\">
                <i class=\"fas fa-right-to-bracket\"></i>
                <span>Espace Étudiant</span>
            </a>
        </div>
    </aside>

    <main class=\"main\">
        <div class=\"topbar\">
            <div>
                <h2>";
        // line 597
        yield from $this->unwrap()->yieldBlock('page_title', $context, $blocks);
        yield "</h2>
                <p>";
        // line 598
        yield from $this->unwrap()->yieldBlock('page_subtitle', $context, $blocks);
        yield "</p>
            </div>
            <div class=\"topbar-right\">
                <span class=\"topbar-date\"><i class=\"fas fa-calendar me-1\"></i>";
        // line 601
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "d M Y"), "html", null, true);
        yield "</span>
                ";
        // line 602
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 602, $this->source); })()), "user", [], "any", false, false, false, 602)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 603
            yield "                    <div class=\"topbar-chip\">
                        <i class=\"fas fa-shield-heart me-2\"></i>";
            // line 604
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 604, $this->source); })()), "user", [], "any", false, false, false, 604), "displayName", [], "any", false, false, false, 604), "html", null, true);
            yield "
                    </div>
                ";
        } else {
            // line 607
            yield "                    <div class=\"topbar-chip\">
                        <i class=\"fas fa-shield-heart me-2\"></i>Admin
                    </div>
                ";
        }
        // line 611
        yield "            </div>
        </div>

        <div class=\"page\">
            ";
        // line 615
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 615, $this->source); })()), "flashes", ["success"], "method", false, false, false, 615));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 616
            yield "                <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fas fa-circle-check me-2\"></i>";
            // line 617
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
                    <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\"></button>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 621
        yield "
            ";
        // line 622
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 622, $this->source); })()), "flashes", ["error"], "method", false, false, false, 622));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 623
            yield "                <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fas fa-circle-xmark me-2\"></i>";
            // line 624
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
                    <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\"></button>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 628
        yield "
            ";
        // line 629
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 629, $this->source); })()), "flashes", ["warning"], "method", false, false, false, 629));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 630
            yield "                <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fas fa-triangle-exclamation me-2\"></i>";
            // line 631
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
                    <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\"></button>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 635
        yield "
            ";
        // line 636
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 636, $this->source); })()), "flashes", ["info"], "method", false, false, false, 636));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 637
            yield "                <div class=\"alert alert-info alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fas fa-circle-info me-2\"></i>";
            // line 638
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
                    <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\"></button>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 642
        yield "
            <div class=\"page-shell\">
                ";
        // line 644
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 645
        yield "            </div>
        </div>
    </main>
</div>

<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js\"></script>
";
        // line 651
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 654
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

    // line 480
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

    // line 597
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

        yield "MindBoost Admin Panel";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 598
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

        yield "Gestion du contenu MindBoost";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 644
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

    // line 651
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

        // line 652
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
        return "back/base.html.twig";
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
        return array (  1096 => 652,  1083 => 651,  1039 => 644,  1016 => 598,  993 => 597,  971 => 480,  949 => 12,  926 => 6,  914 => 654,  912 => 651,  904 => 645,  902 => 644,  898 => 642,  888 => 638,  885 => 637,  881 => 636,  878 => 635,  868 => 631,  865 => 630,  861 => 629,  858 => 628,  848 => 624,  845 => 623,  841 => 622,  838 => 621,  828 => 617,  825 => 616,  821 => 615,  815 => 611,  809 => 607,  803 => 604,  800 => 603,  798 => 602,  794 => 601,  788 => 598,  784 => 597,  770 => 587,  762 => 582,  757 => 580,  753 => 579,  750 => 578,  748 => 577,  734 => 570,  723 => 566,  709 => 559,  695 => 552,  684 => 548,  673 => 544,  659 => 537,  648 => 533,  634 => 526,  623 => 522,  609 => 515,  598 => 511,  587 => 507,  573 => 500,  562 => 496,  545 => 481,  543 => 480,  74 => 13,  72 => 12,  63 => 6,  56 => 1,);
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
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css\" rel=\"stylesheet\">

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
            overflow-x: hidden;
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
            flex-shrink: 0;
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
            margin: 1rem 0.8rem 0.5rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            text-decoration: none;
            color: var(--text-soft);
            padding: 0.85rem 1rem;
            border-radius: 18px;
            margin-bottom: 0.35rem;
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

        .sidebar-link i { width: 20px; text-align: center; flex-shrink: 0; }

        .sidebar-divider {
            border: none;
            border-top: 1px solid rgba(255,255,255,0.06);
            margin: 0.75rem 0;
        }

        .sidebar-footer {
            margin-top: auto;
            padding-top: 0.5rem;
            border-top: 1px solid rgba(255,255,255,0.06);
        }

        .sidebar-user {
            font-size: 0.82rem;
            color: var(--text-fade);
            padding: 0.5rem 1rem;
            margin-bottom: 0.25rem;
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
            position: sticky;
            top: 0;
            z-index: 50;
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

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .topbar-chip {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.07);
            color: white;
            padding: 0.6rem 1rem;
            border-radius: 999px;
            font-weight: 600;
            font-size: 0.88rem;
        }

        .topbar-date {
            color: var(--text-fade);
            font-size: 0.85rem;
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

        .page-heading { margin-bottom: 1.5rem; }

        .page-heading h1 {
            font-size: 2rem;
            font-weight: 800;
            margin: 0;
            color: white;
        }

        .page-heading p {
            margin: 0.45rem 0 0;
            color: var(--text-soft);
        }

        .card {
            background: linear-gradient(180deg, rgba(17,32,61,0.98) 0%, rgba(14,27,52,0.98) 100%);
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 26px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(90deg, rgba(47,107,255,0.16), rgba(25,181,254,0.10));
            border-bottom: 1px solid rgba(255,255,255,0.05);
            color: white;
            padding: 1rem 1.25rem;
            font-weight: 800;
        }

        .card-body {
            color: var(--text-main);
            padding: 1.25rem;
        }

        .stat-card {
            background: linear-gradient(180deg, rgba(17,32,61,0.96) 0%, rgba(21,40,76,0.96) 100%);
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 24px;
            padding: 1.25rem;
            height: 100%;
            box-shadow: var(--shadow);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: white;
        }

        .stat-label {
            color: var(--text-soft);
            margin-top: 0.3rem;
        }

        .quick-card {
            display: block;
            background: linear-gradient(180deg, rgba(17,32,61,0.98) 0%, rgba(14,27,52,0.98) 100%);
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 24px;
            padding: 1.5rem;
            text-decoration: none;
            color: var(--text-main);
            transition: all 0.22s ease;
            box-shadow: var(--shadow);
        }

        .quick-card:hover {
            background: linear-gradient(180deg, rgba(47,107,255,0.18) 0%, rgba(25,181,254,0.10) 100%);
            border-color: rgba(77,131,255,0.30);
            transform: translateY(-3px);
            color: white;
        }

        .quick-card h5 { color: white; font-weight: 700; margin: 0.75rem 0 0.4rem; }
        .quick-card p  { color: var(--text-soft); font-size: 0.88rem; margin: 0; }

        h1, h2, h3, h4, h5, h6 { color: var(--text-main); }
        .text-muted { color: var(--text-soft) !important; }
        a { color: var(--primary-light); }
        a:hover { color: var(--secondary); }

        .form-label {
            color: white;
            font-weight: 700;
            margin-bottom: 0.55rem;
        }

        .form-control,
        .form-select,
        textarea.form-control {
            background: #0F1D37;
            border: 1px solid rgba(255,255,255,0.08);
            color: white;
            border-radius: 16px;
            padding: 0.9rem 1rem;
        }

        .form-control::placeholder,
        textarea.form-control::placeholder {
            color: #7F90B6;
        }

        .form-control:focus,
        .form-select:focus {
            background: #122242;
            color: white;
            border-color: var(--primary-light);
            box-shadow: 0 0 0 0.2rem rgba(47,107,255,0.16);
        }

        .form-select option { color: #111827; }

        .btn {
            border: none;
            border-radius: 16px;
            font-weight: 700;
            padding: 0.8rem 1.15rem;
            transition: all 0.22s ease;
        }

        .btn:hover { transform: translateY(-2px); }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
        }

        .btn-success {
            background: linear-gradient(135deg, #00B8D9, var(--accent));
            color: white;
        }

        .btn-warning {
            background: linear-gradient(135deg, #FFC857, var(--warning));
            color: #142033;
        }

        .btn-danger {
            background: linear-gradient(135deg, #FF6B8A, var(--danger));
            color: white;
        }

        .btn-secondary {
            background: rgba(255,255,255,0.08);
            color: white;
            border: 1px solid rgba(255,255,255,0.08);
        }

        .btn-info {
            background: linear-gradient(135deg, #27C2FF, #19B5FE);
            color: white;
        }

        .btn-outline-primary   { border: 1px solid var(--primary) !important; color: var(--primary-light) !important; background: transparent !important; }
        .btn-outline-primary:hover   { background: rgba(47,107,255,0.18) !important; color: white !important; }
        .btn-outline-secondary { border: 1px solid rgba(255,255,255,0.18) !important; color: var(--text-soft) !important; background: transparent !important; }
        .btn-outline-secondary:hover { background: rgba(255,255,255,0.08) !important; color: white !important; }
        .btn-outline-danger    { border: 1px solid var(--danger) !important; color: var(--danger) !important; background: transparent !important; }
        .btn-outline-danger:hover    { background: rgba(255,90,116,0.15) !important; color: white !important; }
        .btn-outline-warning   { border: 1px solid var(--warning) !important; color: var(--warning) !important; background: transparent !important; }
        .btn-outline-warning:hover   { background: rgba(247,184,75,0.15) !important; color: white !important; }
        .btn-close { filter: invert(1) grayscale(1); }

        .table {
            color: var(--text-main);
            margin-bottom: 0;
        }

        .table thead {
            background: rgba(47,107,255,0.12);
        }

        .table th {
            color: white;
            border: none;
            padding: 1rem;
            font-weight: 800;
            white-space: nowrap;
        }

        .table td {
            border-color: rgba(255,255,255,0.05);
            padding: 1rem;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background: rgba(255,255,255,0.03);
        }

        .badge {
            font-size: 0.8rem;
            font-weight: 700;
            padding: 0.55rem 0.8rem;
            border-radius: 999px;
        }

        .alert {
            border-radius: 18px;
            border: 1px solid transparent;
        }

        .alert-success {
            background: rgba(41,204,122,0.12);
            color: #D6FFE8;
            border-color: rgba(41,204,122,0.18);
        }

        .alert-danger {
            background: rgba(255,90,116,0.12);
            color: #FFD8E0;
            border-color: rgba(255,90,116,0.18);
        }

        .alert-warning {
            background: rgba(247,184,75,0.12);
            color: #FFE8B8;
            border-color: rgba(247,184,75,0.18);
        }

        .alert-info {
            background: rgba(25,181,254,0.12);
            color: #C8EEFF;
            border-color: rgba(25,181,254,0.18);
        }

        @media (max-width: 992px) {
            .sidebar {
                width: 80px;
                min-width: 80px;
                padding: 1.5rem 0.5rem;
            }

            .brand-text,
            .sidebar-label,
            .sidebar-link span,
            .sidebar-user,
            .sidebar-footer .sidebar-link span {
                display: none;
            }

            .brand { justify-content: center; }
            .sidebar-link { justify-content: center; padding: 0.85rem; }
        }

        @media (max-width: 768px) {
            .app-layout { flex-direction: column; }

            .sidebar {
                width: 100%;
                min-width: 100%;
                height: auto;
                position: relative;
            }

            .brand-text,
            .sidebar-label,
            .sidebar-link span {
                display: block;
            }

            .sidebar-link { justify-content: flex-start; }
            .page, .topbar { padding-left: 1rem; padding-right: 1rem; }
        }
    </style>

    {% block extra_css %}{% endblock %}
</head>
<body>
<div class=\"app-layout\">
    <aside class=\"sidebar\">
        <div class=\"brand\">
            <div class=\"brand-icon\">
                <i class=\"fas fa-brain\"></i>
            </div>
            <div class=\"brand-text\">
                <div class=\"brand-title\">MindBoost</div>
                <div class=\"brand-subtitle\">Back Office</div>
            </div>
        </div>

        <div class=\"sidebar-label\">Vue d'ensemble</div>
        <a href=\"{{ path('back_dashboard') }}\" class=\"sidebar-link {% if app.request.attributes.get('_route') == 'back_dashboard' %}active{% endif %}\">
            <i class=\"fas fa-house\"></i>
            <span>Dashboard Forum</span>
        </a>
        <a href=\"{{ path('dashboard') }}\" class=\"sidebar-link {% if app.request.attributes.get('_route') == 'dashboard' %}active{% endif %}\">
            <i class=\"fas fa-chart-line\"></i>
            <span>Dashboard Tests</span>
        </a>

        <hr class=\"sidebar-divider\">
        <div class=\"sidebar-label\">Forum</div>
        <a href=\"{{ path('back_post_index') }}\" class=\"sidebar-link {% if app.request.attributes.get('_route') starts with 'back_post_' %}active{% endif %}\">
            <i class=\"fas fa-file-lines\"></i>
            <span>Posts</span>
        </a>
        <a href=\"{{ path('back_achievement_index') }}\" class=\"sidebar-link {% if app.request.attributes.get('_route') starts with 'back_achievement_' %}active{% endif %}\">
            <i class=\"fas fa-trophy\"></i>
            <span>Achievements</span>
        </a>
        <a href=\"{{ path('back_saves_index') }}\" class=\"sidebar-link {% if app.request.attributes.get('_route') starts with 'back_saves_' %}active{% endif %}\">
            <i class=\"fas fa-bookmark\"></i>
            <span>Saves</span>
        </a>

        <hr class=\"sidebar-divider\">
        <div class=\"sidebar-label\">Tâches</div>
        <a href=\"{{ path('back_tache_focus_index') }}\" class=\"sidebar-link {% if app.request.attributes.get('_route') starts with 'back_tache_focus' %}active{% endif %}\">
            <i class=\"fas fa-square-check\"></i>
            <span>Tâches Focus</span>
        </a>
        <a href=\"{{ path('back_sous_tache_index') }}\" class=\"sidebar-link {% if app.request.attributes.get('_route') starts with 'back_sous_tache' %}active{% endif %}\">
            <i class=\"fas fa-list-check\"></i>
            <span>Sous-Tâches</span>
        </a>

        <hr class=\"sidebar-divider\">
        <div class=\"sidebar-label\">Tests Psy</div>
        <a href=\"{{ path('general_test_index') }}\" class=\"sidebar-link {% if app.request.attributes.get('_route') starts with 'general_test' %}active{% endif %}\">
            <i class=\"fas fa-clipboard-list\"></i>
            <span>Tests Généraux</span>
        </a>
        <a href=\"{{ path('specific_test_index') }}\" class=\"sidebar-link {% if app.request.attributes.get('_route') starts with 'specific_test' %}active{% endif %}\">
            <i class=\"fas fa-clipboard-check\"></i>
            <span>Tests Spécifiques</span>
        </a>

        <hr class=\"sidebar-divider\">
        <div class=\"sidebar-label\">Insights & Stats</div>
        <a href=\"{{ path('admin_results_history') }}\" class=\"sidebar-link {% if app.request.attributes.get('_route') == 'admin_results_history' %}active{% endif %}\">
            <i class=\"fas fa-clock-rotate-left\"></i>
            <span>Historique résultats</span>
        </a>
        <a href=\"{{ path('admin_analytics_dashboard') }}\" class=\"sidebar-link {% if app.request.attributes.get('_route') == 'admin_analytics_dashboard' %}active{% endif %}\">
            <i class=\"fas fa-chart-pie\"></i>
            <span>Analytique</span>
        </a>
        <a href=\"{{ path('admin_statistics_dashboard') }}\" class=\"sidebar-link {% if app.request.attributes.get('_route') == 'admin_statistics_dashboard' %}active{% endif %}\">
            <i class=\"fas fa-chart-bar\"></i>
            <span>Statistiques & Mailing</span>
        </a>

        <hr class=\"sidebar-divider\">
        <div class=\"sidebar-label\">Intelligence IA</div>
        <a href=\"{{ path('admin_ai_tests') }}\" class=\"sidebar-link {% if app.request.attributes.get('_route') starts with 'admin_ai_' %}active{% endif %}\">
            <i class=\"fas fa-robot\"></i>
            <span>Gérer par IA</span>
        </a>

        <hr class=\"sidebar-divider\">
        <div class=\"sidebar-label\">Utilisateurs</div>
        <a href=\"{{ path('app_admin_user_list') }}\" class=\"sidebar-link {% if app.request.attributes.get('_route') starts with 'app_admin_user' %}active{% endif %}\">
            <i class=\"fas fa-users\"></i>
            <span>Utilisateurs</span>
        </a>
        <a href=\"{{ path('app_admin_profile_list') }}\" class=\"sidebar-link {% if app.request.attributes.get('_route') starts with 'app_admin_profile' %}active{% endif %}\">
            <i class=\"fas fa-id-badge\"></i>
            <span>Profils</span>
        </a>

        <hr class=\"sidebar-divider\">
        <div class=\"sidebar-footer\">
            {% if app.user %}
                <div class=\"sidebar-user\">
                    <i class=\"fas fa-circle-user me-1\"></i>{{ app.user.displayName }}
                    <span class=\"badge bg-secondary ms-1\" style=\"font-size:0.7rem;padding:0.3rem 0.5rem;border-radius:8px;\">{{ app.user.role }}</span>
                </div>
                <a href=\"{{ path('app_logout') }}\" class=\"sidebar-link\" style=\"color: var(--danger);\">
                    <i class=\"fas fa-right-from-bracket\"></i>
                    <span>Déconnexion</span>
                </a>
            {% endif %}
            <a href=\"{{ path('app_dashboard') }}\" class=\"sidebar-link\">
                <i class=\"fas fa-right-to-bracket\"></i>
                <span>Espace Étudiant</span>
            </a>
        </div>
    </aside>

    <main class=\"main\">
        <div class=\"topbar\">
            <div>
                <h2>{% block page_title %}MindBoost Admin Panel{% endblock %}</h2>
                <p>{% block page_subtitle %}Gestion du contenu MindBoost{% endblock %}</p>
            </div>
            <div class=\"topbar-right\">
                <span class=\"topbar-date\"><i class=\"fas fa-calendar me-1\"></i>{{ \"now\"|date(\"d M Y\") }}</span>
                {% if app.user %}
                    <div class=\"topbar-chip\">
                        <i class=\"fas fa-shield-heart me-2\"></i>{{ app.user.displayName }}
                    </div>
                {% else %}
                    <div class=\"topbar-chip\">
                        <i class=\"fas fa-shield-heart me-2\"></i>Admin
                    </div>
                {% endif %}
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

            {% for message in app.flashes('info') %}
                <div class=\"alert alert-info alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fas fa-circle-info me-2\"></i>{{ message }}
                    <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\"></button>
                </div>
            {% endfor %}

            <div class=\"page-shell\">
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
</html>", "back/base.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/back/base.html.twig");
    }
}
