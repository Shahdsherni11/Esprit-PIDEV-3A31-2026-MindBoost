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

/* admin/user_show.html.twig */
class __TwigTemplate_94b8d2f36db0d89dbb5db81762f06bb0 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/user_show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/user_show.html.twig"));

        $this->parent = $this->load("back/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 2
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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 2, $this->source); })()), "email", [], "any", false, false, false, 2), "html", null, true);
        yield " — Admin";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 3
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

        yield "Détail Utilisateur";
        
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
        yield "<div class=\"mb-4 d-flex gap-2\">
    <a href=\"";
        // line 7
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_user_list");
        yield "\" class=\"btn btn-secondary btn-sm\">
        <i class=\"bi bi-arrow-left me-1\"></i>Retour
    </a>
    <a href=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_user_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 10, $this->source); })()), "id", [], "any", false, false, false, 10)]), "html", null, true);
        yield "\" class=\"btn btn-warning btn-sm\">
        <i class=\"bi bi-pencil me-1\"></i>Modifier
    </a>
</div>

<div class=\"row g-4\">
    <div class=\"col-md-4\">
        <div class=\"card text-center p-4\">
            <div class=\"rounded-circle mb-3 mx-auto d-flex align-items-center justify-content-center fw-bold\"
                 style=\"width:80px;height:80px;background:linear-gradient(135deg,#6C63FF,#5A52D5);font-size:2rem;color:white;\">
                ";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 20, $this->source); })()), "displayName", [], "any", false, false, false, 20), 0, 1)), "html", null, true);
        yield "
            </div>
            <h5 class=\"fw-bold\">";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 22, $this->source); })()), "displayName", [], "any", false, false, false, 22), "html", null, true);
        yield "</h5>
            <p class=\"text-muted small mb-2\">";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 23, $this->source); })()), "email", [], "any", false, false, false, 23), "html", null, true);
        yield "</p>
            <span class=\"badge bg-";
        // line 24
        yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 24, $this->source); })()), "role", [], "any", false, false, false, 24) == "admin")) ? ("danger") : ((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 24, $this->source); })()), "role", [], "any", false, false, false, 24) == "psychologist")) ? ("warning text-dark") : ("secondary"))));
        yield "\">
                ";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 25, $this->source); })()), "role", [], "any", false, false, false, 25), "html", null, true);
        yield "
            </span>
        </div>
    </div>
    <div class=\"col-md-8\">
        <div class=\"card p-4\">
            <h6 class=\"fw-bold mb-3\">Informations</h6>
            <dl class=\"row\">
                <dt class=\"col-sm-4 text-muted\">ID</dt>
                <dd class=\"col-sm-8\">";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 34, $this->source); })()), "id", [], "any", false, false, false, 34), "html", null, true);
        yield "</dd>
                <dt class=\"col-sm-4 text-muted\">Email</dt>
                <dd class=\"col-sm-8\">";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 36, $this->source); })()), "email", [], "any", false, false, false, 36), "html", null, true);
        yield "</dd>
                <dt class=\"col-sm-4 text-muted\">Rôle</dt>
                <dd class=\"col-sm-8\">";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 38, $this->source); })()), "role", [], "any", false, false, false, 38), "html", null, true);
        yield "</dd>
                <dt class=\"col-sm-4 text-muted\">Vérifié</dt>
                <dd class=\"col-sm-8\">";
        // line 40
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 40, $this->source); })()), "isVerified", [], "any", false, false, false, 40)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("✅ Oui") : ("❌ Non"));
        yield "</dd>
                <dt class=\"col-sm-4 text-muted\">Inscrit le</dt>
                <dd class=\"col-sm-8\">";
        // line 42
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 42, $this->source); })()), "createdAt", [], "any", false, false, false, 42)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 42, $this->source); })()), "createdAt", [], "any", false, false, false, 42), "d/m/Y H:i"), "html", null, true)) : ("—"));
        yield "</dd>
                ";
        // line 43
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 43, $this->source); })()), "profile", [], "any", false, false, false, 43)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 44
            yield "                <dt class=\"col-sm-4 text-muted\">Prénom</dt>
                <dd class=\"col-sm-8\">";
            // line 45
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 45, $this->source); })()), "profile", [], "any", false, false, false, 45), "firstName", [], "any", false, false, false, 45), "html", null, true);
            yield "</dd>
                <dt class=\"col-sm-4 text-muted\">Nom</dt>
                <dd class=\"col-sm-8\">";
            // line 47
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 47, $this->source); })()), "profile", [], "any", false, false, false, 47), "lastName", [], "any", false, false, false, 47), "html", null, true);
            yield "</dd>
                <dt class=\"col-sm-4 text-muted\">Téléphone</dt>
                <dd class=\"col-sm-8\">";
            // line 49
            yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 49, $this->source); })()), "profile", [], "any", false, false, false, 49), "phone", [], "any", false, false, false, 49)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 49, $this->source); })()), "profile", [], "any", false, false, false, 49), "phone", [], "any", false, false, false, 49), "html", null, true)) : ("—"));
            yield "</dd>
                <dt class=\"col-sm-4 text-muted\">Personnalité</dt>
                <dd class=\"col-sm-8\">";
            // line 51
            yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 51, $this->source); })()), "profile", [], "any", false, false, false, 51), "personalityType", [], "any", false, false, false, 51)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 51, $this->source); })()), "profile", [], "any", false, false, false, 51), "personalityType", [], "any", false, false, false, 51), "html", null, true)) : ("—"));
            yield "</dd>
                ";
        }
        // line 53
        yield "            </dl>
        </div>
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
        return "admin/user_show.html.twig";
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
        return array (  225 => 53,  220 => 51,  215 => 49,  210 => 47,  205 => 45,  202 => 44,  200 => 43,  196 => 42,  191 => 40,  186 => 38,  181 => 36,  176 => 34,  164 => 25,  160 => 24,  156 => 23,  152 => 22,  147 => 20,  134 => 10,  128 => 7,  125 => 6,  112 => 5,  89 => 3,  65 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}
{% block title %}{{ user.email }} — Admin{% endblock %}
{% block page_title %}Détail Utilisateur{% endblock %}

{% block body %}
<div class=\"mb-4 d-flex gap-2\">
    <a href=\"{{ path('app_admin_user_list') }}\" class=\"btn btn-secondary btn-sm\">
        <i class=\"bi bi-arrow-left me-1\"></i>Retour
    </a>
    <a href=\"{{ path('app_admin_user_edit', {id: user.id}) }}\" class=\"btn btn-warning btn-sm\">
        <i class=\"bi bi-pencil me-1\"></i>Modifier
    </a>
</div>

<div class=\"row g-4\">
    <div class=\"col-md-4\">
        <div class=\"card text-center p-4\">
            <div class=\"rounded-circle mb-3 mx-auto d-flex align-items-center justify-content-center fw-bold\"
                 style=\"width:80px;height:80px;background:linear-gradient(135deg,#6C63FF,#5A52D5);font-size:2rem;color:white;\">
                {{ user.displayName|slice(0,1)|upper }}
            </div>
            <h5 class=\"fw-bold\">{{ user.displayName }}</h5>
            <p class=\"text-muted small mb-2\">{{ user.email }}</p>
            <span class=\"badge bg-{{ user.role == 'admin' ? 'danger' : (user.role == 'psychologist' ? 'warning text-dark' : 'secondary') }}\">
                {{ user.role }}
            </span>
        </div>
    </div>
    <div class=\"col-md-8\">
        <div class=\"card p-4\">
            <h6 class=\"fw-bold mb-3\">Informations</h6>
            <dl class=\"row\">
                <dt class=\"col-sm-4 text-muted\">ID</dt>
                <dd class=\"col-sm-8\">{{ user.id }}</dd>
                <dt class=\"col-sm-4 text-muted\">Email</dt>
                <dd class=\"col-sm-8\">{{ user.email }}</dd>
                <dt class=\"col-sm-4 text-muted\">Rôle</dt>
                <dd class=\"col-sm-8\">{{ user.role }}</dd>
                <dt class=\"col-sm-4 text-muted\">Vérifié</dt>
                <dd class=\"col-sm-8\">{{ user.isVerified ? '✅ Oui' : '❌ Non' }}</dd>
                <dt class=\"col-sm-4 text-muted\">Inscrit le</dt>
                <dd class=\"col-sm-8\">{{ user.createdAt ? user.createdAt|date('d/m/Y H:i') : '—' }}</dd>
                {% if user.profile %}
                <dt class=\"col-sm-4 text-muted\">Prénom</dt>
                <dd class=\"col-sm-8\">{{ user.profile.firstName }}</dd>
                <dt class=\"col-sm-4 text-muted\">Nom</dt>
                <dd class=\"col-sm-8\">{{ user.profile.lastName }}</dd>
                <dt class=\"col-sm-4 text-muted\">Téléphone</dt>
                <dd class=\"col-sm-8\">{{ user.profile.phone ?: '—' }}</dd>
                <dt class=\"col-sm-4 text-muted\">Personnalité</dt>
                <dd class=\"col-sm-8\">{{ user.profile.personalityType ?: '—' }}</dd>
                {% endif %}
            </dl>
        </div>
    </div>
</div>
{% endblock %}
", "admin/user_show.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/admin/user_show.html.twig");
    }
}
