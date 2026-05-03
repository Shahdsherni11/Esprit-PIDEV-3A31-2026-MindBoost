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

/* security/register.html.twig */
class __TwigTemplate_fbc15c3f3e91526ac9030fb6b300a616 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/register.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/register.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Inscription — MindBoost</title>
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
            padding: 2rem 1rem;
        }
        .auth-card {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(108,99,255,0.3);
            border-radius: 20px;
            padding: 2.5rem;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
            backdrop-filter: blur(10px);
        }
        .brand { text-align: center; margin-bottom: 2rem; }
        .brand-icon { font-size: 3rem; color: #6C63FF; }
        .brand h1 { font-size: 1.8rem; font-weight: 800; color: #fff; margin: 0.5rem 0 0.25rem; }
        .brand p { color: #9B9BB0; margin: 0; }
        .form-control, .form-select {
            background: rgba(255,255,255,0.08) !important;
            border: 1px solid rgba(255,255,255,0.15) !important;
            color: #E8E8F0 !important;
            border-radius: 10px !important;
            padding: 0.75rem 1rem;
        }
        .form-control:focus, .form-select:focus {
            border-color: #6C63FF !important;
            box-shadow: 0 0 0 0.2rem rgba(108,99,255,0.3) !important;
        }
        .form-control::placeholder { color: #9B9BB0 !important; }
        .form-label { color: #BFC6E6; font-weight: 500; }
        .btn-register {
            width: 100%;
            background: linear-gradient(to right, #2ECC71, #27AE60);
            border: none;
            border-radius: 10px;
            padding: 0.85rem;
            font-size: 1rem;
            font-weight: 700;
            color: white;
            transition: all 0.2s;
        }
        .btn-register:hover { transform: translateY(-1px); }
        .auth-footer { text-align: center; margin-top: 1.5rem; color: #9B9BB0; }
        .auth-footer a { color: #9A8CFF; text-decoration: none; }
        .auth-footer a:hover { color: #6C63FF; }
        .form-error { color: #E74C3C; font-size: 0.85rem; margin-top: 0.3rem; }
    </style>
</head>
<body>
    <div class=\"auth-card\">
        <div class=\"brand\">
            <div class=\"brand-icon\"><i class=\"bi bi-brain\"></i></div>
            <h1>Créer un compte</h1>
            <p>Rejoignez la communauté MindBoost</p>
        </div>

        ";
        // line 73
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 73, $this->source); })()), 'form_start', ["attr" => ["novalidate" => "novalidate"]]);
        yield "

        <div class=\"mb-3\">
            ";
        // line 76
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 76, $this->source); })()), "email", [], "any", false, false, false, 76), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
            ";
        // line 77
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 77, $this->source); })()), "email", [], "any", false, false, false, 77), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "votre@email.com"]]);
        yield "
            <div class=\"form-error\">";
        // line 78
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 78, $this->source); })()), "email", [], "any", false, false, false, 78), 'errors');
        yield "</div>
        </div>

        <div class=\"mb-3\">
            ";
        // line 82
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 82, $this->source); })()), "plainPassword", [], "any", false, false, false, 82), "first", [], "any", false, false, false, 82), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
            ";
        // line 83
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 83, $this->source); })()), "plainPassword", [], "any", false, false, false, 83), "first", [], "any", false, false, false, 83), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Min. 8 car., 1 maj., 1 chiffre"]]);
        yield "
            <div class=\"form-error\">";
        // line 84
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 84, $this->source); })()), "plainPassword", [], "any", false, false, false, 84), "first", [], "any", false, false, false, 84), 'errors');
        yield "</div>
        </div>

        <div class=\"mb-3\">
            ";
        // line 88
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 88, $this->source); })()), "plainPassword", [], "any", false, false, false, 88), "second", [], "any", false, false, false, 88), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
            ";
        // line 89
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 89, $this->source); })()), "plainPassword", [], "any", false, false, false, 89), "second", [], "any", false, false, false, 89), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Répétez le mot de passe"]]);
        yield "
            <div class=\"form-error\">";
        // line 90
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 90, $this->source); })()), "plainPassword", [], "any", false, false, false, 90), "second", [], "any", false, false, false, 90), 'errors');
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 90, $this->source); })()), "plainPassword", [], "any", false, false, false, 90), 'errors');
        yield "</div>
        </div>

        <div class=\"form-check mb-3\">
            ";
        // line 94
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 94, $this->source); })()), "agreeTerms", [], "any", false, false, false, 94), 'widget');
        yield "
            ";
        // line 95
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 95, $this->source); })()), "agreeTerms", [], "any", false, false, false, 95), 'label', ["label_attr" => ["class" => "form-check-label text-muted"]]);
        yield "
            <div class=\"form-error\">";
        // line 96
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 96, $this->source); })()), "agreeTerms", [], "any", false, false, false, 96), 'errors');
        yield "</div>
        </div>

        <button type=\"submit\" class=\"btn-register\"><i class=\"bi bi-person-check me-2\"></i>Créer mon compte</button>
        ";
        // line 100
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 100, $this->source); })()), 'form_end');
        yield "

        <div class=\"auth-footer\">
            <p>Déjà un compte ? <a href=\"";
        // line 103
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\">Se connecter</a></p>
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
        return "security/register.html.twig";
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
        return array (  195 => 103,  189 => 100,  182 => 96,  178 => 95,  174 => 94,  166 => 90,  162 => 89,  158 => 88,  151 => 84,  147 => 83,  143 => 82,  136 => 78,  132 => 77,  128 => 76,  122 => 73,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Inscription — MindBoost</title>
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
            padding: 2rem 1rem;
        }
        .auth-card {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(108,99,255,0.3);
            border-radius: 20px;
            padding: 2.5rem;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
            backdrop-filter: blur(10px);
        }
        .brand { text-align: center; margin-bottom: 2rem; }
        .brand-icon { font-size: 3rem; color: #6C63FF; }
        .brand h1 { font-size: 1.8rem; font-weight: 800; color: #fff; margin: 0.5rem 0 0.25rem; }
        .brand p { color: #9B9BB0; margin: 0; }
        .form-control, .form-select {
            background: rgba(255,255,255,0.08) !important;
            border: 1px solid rgba(255,255,255,0.15) !important;
            color: #E8E8F0 !important;
            border-radius: 10px !important;
            padding: 0.75rem 1rem;
        }
        .form-control:focus, .form-select:focus {
            border-color: #6C63FF !important;
            box-shadow: 0 0 0 0.2rem rgba(108,99,255,0.3) !important;
        }
        .form-control::placeholder { color: #9B9BB0 !important; }
        .form-label { color: #BFC6E6; font-weight: 500; }
        .btn-register {
            width: 100%;
            background: linear-gradient(to right, #2ECC71, #27AE60);
            border: none;
            border-radius: 10px;
            padding: 0.85rem;
            font-size: 1rem;
            font-weight: 700;
            color: white;
            transition: all 0.2s;
        }
        .btn-register:hover { transform: translateY(-1px); }
        .auth-footer { text-align: center; margin-top: 1.5rem; color: #9B9BB0; }
        .auth-footer a { color: #9A8CFF; text-decoration: none; }
        .auth-footer a:hover { color: #6C63FF; }
        .form-error { color: #E74C3C; font-size: 0.85rem; margin-top: 0.3rem; }
    </style>
</head>
<body>
    <div class=\"auth-card\">
        <div class=\"brand\">
            <div class=\"brand-icon\"><i class=\"bi bi-brain\"></i></div>
            <h1>Créer un compte</h1>
            <p>Rejoignez la communauté MindBoost</p>
        </div>

        {{ form_start(registrationForm, {'attr': {'novalidate': 'novalidate'}}) }}

        <div class=\"mb-3\">
            {{ form_label(registrationForm.email, null, {'label_attr': {'class': 'form-label'}}) }}
            {{ form_widget(registrationForm.email, {'attr': {'class': 'form-control', 'placeholder': 'votre@email.com'}}) }}
            <div class=\"form-error\">{{ form_errors(registrationForm.email) }}</div>
        </div>

        <div class=\"mb-3\">
            {{ form_label(registrationForm.plainPassword.first, null, {'label_attr': {'class': 'form-label'}}) }}
            {{ form_widget(registrationForm.plainPassword.first, {'attr': {'class': 'form-control', 'placeholder': 'Min. 8 car., 1 maj., 1 chiffre'}}) }}
            <div class=\"form-error\">{{ form_errors(registrationForm.plainPassword.first) }}</div>
        </div>

        <div class=\"mb-3\">
            {{ form_label(registrationForm.plainPassword.second, null, {'label_attr': {'class': 'form-label'}}) }}
            {{ form_widget(registrationForm.plainPassword.second, {'attr': {'class': 'form-control', 'placeholder': 'Répétez le mot de passe'}}) }}
            <div class=\"form-error\">{{ form_errors(registrationForm.plainPassword.second) }}{{ form_errors(registrationForm.plainPassword) }}</div>
        </div>

        <div class=\"form-check mb-3\">
            {{ form_widget(registrationForm.agreeTerms) }}
            {{ form_label(registrationForm.agreeTerms, null, {'label_attr': {'class': 'form-check-label text-muted'}}) }}
            <div class=\"form-error\">{{ form_errors(registrationForm.agreeTerms) }}</div>
        </div>

        <button type=\"submit\" class=\"btn-register\"><i class=\"bi bi-person-check me-2\"></i>Créer mon compte</button>
        {{ form_end(registrationForm) }}

        <div class=\"auth-footer\">
            <p>Déjà un compte ? <a href=\"{{ path('app_login') }}\">Se connecter</a></p>
        </div>
    </div>
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js\"></script>
</body>
</html>
", "security/register.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/security/register.html.twig");
    }
}
