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

/* security/login.html.twig */
class __TwigTemplate_58908dcd635cde478f8192c732852fc0 extends Template
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
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Connexion — MindBoost</title>
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css\">
    <style>
        body {
            background: linear-gradient(135deg, #1A1A2E 0%, #16213E 50%, #0F3460 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #E8E8F0;
        }
        .auth-card {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(108,99,255,0.3);
            border-radius: 20px;
            padding: 2.5rem;
            width: 100%;
            max-width: 440px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
            backdrop-filter: blur(10px);
        }
        .brand { text-align: center; margin-bottom: 2rem; }
        .brand-icon { font-size: 3rem; color: #6C63FF; }
        .brand h1 { font-size: 1.8rem; font-weight: 800; color: #fff; margin: 0.5rem 0 0.25rem; }
        .brand p { color: #9B9BB0; margin: 0; }
        .form-control {
            background: rgba(255,255,255,0.08) !important;
            border: 1px solid rgba(255,255,255,0.15) !important;
            color: #E8E8F0 !important;
            border-radius: 10px !important;
            padding: 0.75rem 1rem;
        }
        .form-control:focus {
            border-color: #6C63FF !important;
            box-shadow: 0 0 0 0.2rem rgba(108,99,255,0.3) !important;
        }
        .form-control::placeholder { color: #9B9BB0 !important; }
        .form-label { color: #BFC6E6; font-weight: 500; }
        .btn-login {
            width: 100%;
            background: linear-gradient(to right, #6C63FF, #5A52D5);
            border: none;
            border-radius: 10px;
            padding: 0.85rem;
            font-size: 1rem;
            font-weight: 700;
            color: white;
            transition: all 0.2s;
        }
        .btn-login:hover { background: linear-gradient(to right, #7B73FF, #6C63FF); transform: translateY(-1px); }
        .auth-footer { text-align: center; margin-top: 1.5rem; color: #9B9BB0; }
        .auth-footer a { color: #9A8CFF; text-decoration: none; }
        .auth-footer a:hover { color: #6C63FF; }
        .alert-danger {
            background: rgba(231,76,60,0.15) !important;
            border-color: rgba(231,76,60,0.35) !important;
            color: #E74C3C !important;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class=\"auth-card\">
        <div class=\"brand\">
            <div class=\"brand-icon\"><i class=\"bi bi-brain\"></i></div>
            <h1>MindBoost</h1>
            <p>Votre espace de bien-être mental</p>
        </div>

        ";
        // line 77
        if ((($tmp = (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 77, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 78
            yield "            <div class=\"alert alert-danger\"><i class=\"bi bi-exclamation-triangle me-2\"></i>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 78, $this->source); })()), "messageKey", [], "any", false, false, false, 78), CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 78, $this->source); })()), "messageData", [], "any", false, false, false, 78), "security"), "html", null, true);
            yield "</div>
        ";
        }
        // line 80
        yield "
        <form method=\"post\">
            <div class=\"mb-3\">
                <label class=\"form-label\" for=\"username\"><i class=\"bi bi-envelope me-1\"></i>Adresse email</label>
                <input type=\"email\" id=\"username\" name=\"_username\"
                       value=\"";
        // line 85
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new RuntimeError('Variable "last_username" does not exist.', 85, $this->source); })()), "html", null, true);
        yield "\" class=\"form-control\"
                       placeholder=\"votre@email.com\" autocomplete=\"email\" required autofocus>
            </div>
            <div class=\"mb-3\">
                <label class=\"form-label\" for=\"password\"><i class=\"bi bi-lock me-1\"></i>Mot de passe</label>
                <input type=\"password\" id=\"password\" name=\"_password\"
                       class=\"form-control\" placeholder=\"Votre mot de passe\"
                       autocomplete=\"current-password\" required>
            </div>
            <div class=\"form-check mb-3\">
                <input type=\"checkbox\" class=\"form-check-input\" id=\"remember_me\" name=\"_remember_me\" value=\"on\">
                <label class=\"form-check-label text-muted\" for=\"remember_me\">Se souvenir de moi</label>
            </div>
            <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 98
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        yield "\">
            <button type=\"submit\" class=\"btn-login\"><i class=\"bi bi-box-arrow-in-right me-2\"></i>Se connecter</button>
        </form>

        <div class=\"auth-footer\">
            <p>Pas encore de compte ? <a href=\"";
        // line 103
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\">S'inscrire gratuitement</a></p>
        </div>
    </div>
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js\"></script>
</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "security/login.html.twig";
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
        return array (  165 => 103,  157 => 98,  141 => 85,  134 => 80,  128 => 78,  126 => 77,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Connexion — MindBoost</title>
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css\">
    <style>
        body {
            background: linear-gradient(135deg, #1A1A2E 0%, #16213E 50%, #0F3460 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #E8E8F0;
        }
        .auth-card {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(108,99,255,0.3);
            border-radius: 20px;
            padding: 2.5rem;
            width: 100%;
            max-width: 440px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
            backdrop-filter: blur(10px);
        }
        .brand { text-align: center; margin-bottom: 2rem; }
        .brand-icon { font-size: 3rem; color: #6C63FF; }
        .brand h1 { font-size: 1.8rem; font-weight: 800; color: #fff; margin: 0.5rem 0 0.25rem; }
        .brand p { color: #9B9BB0; margin: 0; }
        .form-control {
            background: rgba(255,255,255,0.08) !important;
            border: 1px solid rgba(255,255,255,0.15) !important;
            color: #E8E8F0 !important;
            border-radius: 10px !important;
            padding: 0.75rem 1rem;
        }
        .form-control:focus {
            border-color: #6C63FF !important;
            box-shadow: 0 0 0 0.2rem rgba(108,99,255,0.3) !important;
        }
        .form-control::placeholder { color: #9B9BB0 !important; }
        .form-label { color: #BFC6E6; font-weight: 500; }
        .btn-login {
            width: 100%;
            background: linear-gradient(to right, #6C63FF, #5A52D5);
            border: none;
            border-radius: 10px;
            padding: 0.85rem;
            font-size: 1rem;
            font-weight: 700;
            color: white;
            transition: all 0.2s;
        }
        .btn-login:hover { background: linear-gradient(to right, #7B73FF, #6C63FF); transform: translateY(-1px); }
        .auth-footer { text-align: center; margin-top: 1.5rem; color: #9B9BB0; }
        .auth-footer a { color: #9A8CFF; text-decoration: none; }
        .auth-footer a:hover { color: #6C63FF; }
        .alert-danger {
            background: rgba(231,76,60,0.15) !important;
            border-color: rgba(231,76,60,0.35) !important;
            color: #E74C3C !important;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class=\"auth-card\">
        <div class=\"brand\">
            <div class=\"brand-icon\"><i class=\"bi bi-brain\"></i></div>
            <h1>MindBoost</h1>
            <p>Votre espace de bien-être mental</p>
        </div>

        {% if error %}
            <div class=\"alert alert-danger\"><i class=\"bi bi-exclamation-triangle me-2\"></i>{{ error.messageKey|trans(error.messageData, 'security') }}</div>
        {% endif %}

        <form method=\"post\">
            <div class=\"mb-3\">
                <label class=\"form-label\" for=\"username\"><i class=\"bi bi-envelope me-1\"></i>Adresse email</label>
                <input type=\"email\" id=\"username\" name=\"_username\"
                       value=\"{{ last_username }}\" class=\"form-control\"
                       placeholder=\"votre@email.com\" autocomplete=\"email\" required autofocus>
            </div>
            <div class=\"mb-3\">
                <label class=\"form-label\" for=\"password\"><i class=\"bi bi-lock me-1\"></i>Mot de passe</label>
                <input type=\"password\" id=\"password\" name=\"_password\"
                       class=\"form-control\" placeholder=\"Votre mot de passe\"
                       autocomplete=\"current-password\" required>
            </div>
            <div class=\"form-check mb-3\">
                <input type=\"checkbox\" class=\"form-check-input\" id=\"remember_me\" name=\"_remember_me\" value=\"on\">
                <label class=\"form-check-label text-muted\" for=\"remember_me\">Se souvenir de moi</label>
            </div>
            <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token('authenticate') }}\">
            <button type=\"submit\" class=\"btn-login\"><i class=\"bi bi-box-arrow-in-right me-2\"></i>Se connecter</button>
        </form>

        <div class=\"auth-footer\">
            <p>Pas encore de compte ? <a href=\"{{ path('app_register') }}\">S'inscrire gratuitement</a></p>
        </div>
    </div>
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js\"></script>
</body>
</html>
", "security/login.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/security/login.html.twig");
    }
}
