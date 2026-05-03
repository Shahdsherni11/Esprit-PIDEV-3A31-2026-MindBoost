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

/* profile/show.html.twig */
class __TwigTemplate_20f44c1ad7bb38255c993e446dfe2f12 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "profile/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "profile/show.html.twig"));

        $this->parent = $this->load("front/base.html.twig", 1);
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

        yield "Mon Profil — MindBoost";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 4
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

        // line 5
        yield "<div class=\"mb-4\">
    <h1 class=\"fw-bold\"><i class=\"bi bi-person-circle me-2\" style=\"color:#6C63FF;\"></i>Mon Profil</h1>
    <p class=\"text-muted\">Vos informations personnelles</p>
</div>

<div class=\"row g-4\">
    <div class=\"col-md-4\">
        <div class=\"card text-center p-4\">
            ";
        // line 13
        if (((isset($context["profile"]) || array_key_exists("profile", $context) ? $context["profile"] : (function () { throw new RuntimeError('Variable "profile" does not exist.', 13, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["profile"]) || array_key_exists("profile", $context) ? $context["profile"] : (function () { throw new RuntimeError('Variable "profile" does not exist.', 13, $this->source); })()), "avatarUrl", [], "any", false, false, false, 13))) {
            // line 14
            yield "                <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["profile"]) || array_key_exists("profile", $context) ? $context["profile"] : (function () { throw new RuntimeError('Variable "profile" does not exist.', 14, $this->source); })()), "avatarUrl", [], "any", false, false, false, 14), "html", null, true);
            yield "\" alt=\"Avatar\" class=\"rounded-circle mb-3 mx-auto\" style=\"width:100px;height:100px;object-fit:cover;border:3px solid #6C63FF;\">
            ";
        } else {
            // line 16
            yield "                <div class=\"rounded-circle mb-3 mx-auto d-flex align-items-center justify-content-center fw-bold\"
                     style=\"width:100px;height:100px;background:linear-gradient(135deg,#6C63FF,#5A52D5);font-size:2.5rem;color:white;\">
                    ";
            // line 18
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 18, $this->source); })()), "displayName", [], "any", false, false, false, 18), 0, 1)), "html", null, true);
            yield "
                </div>
            ";
        }
        // line 21
        yield "            <h4 class=\"fw-bold\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 21, $this->source); })()), "displayName", [], "any", false, false, false, 21), "html", null, true);
        yield "</h4>
            <p class=\"text-muted mb-1\">";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 22, $this->source); })()), "email", [], "any", false, false, false, 22), "html", null, true);
        yield "</p>
            <span class=\"badge bg-primary\">";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 23, $this->source); })()), "role", [], "any", false, false, false, 23), "html", null, true);
        yield "</span>
            <div class=\"mt-3\">
                <a href=\"";
        // line 25
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile_edit");
        yield "\" class=\"btn btn-primary btn-sm\">
                    <i class=\"bi bi-pencil me-1\"></i>Modifier le profil
                </a>
            </div>
        </div>
    </div>
    <div class=\"col-md-8\">
        <div class=\"card p-4\">
            <h5 class=\"fw-bold mb-3\"><i class=\"bi bi-info-circle me-2\" style=\"color:#6C63FF;\"></i>Informations</h5>
            ";
        // line 34
        if ((($tmp = (isset($context["profile"]) || array_key_exists("profile", $context) ? $context["profile"] : (function () { throw new RuntimeError('Variable "profile" does not exist.', 34, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 35
            yield "            <div class=\"row g-3\">
                <div class=\"col-sm-6\">
                    <div class=\"text-muted small\">Prénom</div>
                    <div class=\"fw-semibold\">";
            // line 38
            yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["profile"]) || array_key_exists("profile", $context) ? $context["profile"] : (function () { throw new RuntimeError('Variable "profile" does not exist.', 38, $this->source); })()), "firstName", [], "any", false, false, false, 38)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["profile"]) || array_key_exists("profile", $context) ? $context["profile"] : (function () { throw new RuntimeError('Variable "profile" does not exist.', 38, $this->source); })()), "firstName", [], "any", false, false, false, 38), "html", null, true)) : ("—"));
            yield "</div>
                </div>
                <div class=\"col-sm-6\">
                    <div class=\"text-muted small\">Nom</div>
                    <div class=\"fw-semibold\">";
            // line 42
            yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["profile"]) || array_key_exists("profile", $context) ? $context["profile"] : (function () { throw new RuntimeError('Variable "profile" does not exist.', 42, $this->source); })()), "lastName", [], "any", false, false, false, 42)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["profile"]) || array_key_exists("profile", $context) ? $context["profile"] : (function () { throw new RuntimeError('Variable "profile" does not exist.', 42, $this->source); })()), "lastName", [], "any", false, false, false, 42), "html", null, true)) : ("—"));
            yield "</div>
                </div>
                <div class=\"col-sm-6\">
                    <div class=\"text-muted small\">Téléphone</div>
                    <div class=\"fw-semibold\">";
            // line 46
            yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["profile"]) || array_key_exists("profile", $context) ? $context["profile"] : (function () { throw new RuntimeError('Variable "profile" does not exist.', 46, $this->source); })()), "phone", [], "any", false, false, false, 46)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["profile"]) || array_key_exists("profile", $context) ? $context["profile"] : (function () { throw new RuntimeError('Variable "profile" does not exist.', 46, $this->source); })()), "phone", [], "any", false, false, false, 46), "html", null, true)) : ("—"));
            yield "</div>
                </div>
                <div class=\"col-sm-6\">
                    <div class=\"text-muted small\">Type de personnalité</div>
                    <div class=\"fw-semibold\">
                        ";
            // line 51
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["profile"]) || array_key_exists("profile", $context) ? $context["profile"] : (function () { throw new RuntimeError('Variable "profile" does not exist.', 51, $this->source); })()), "personalityType", [], "any", false, false, false, 51)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 52
                yield "                            <span class=\"badge bg-info text-dark\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["profile"]) || array_key_exists("profile", $context) ? $context["profile"] : (function () { throw new RuntimeError('Variable "profile" does not exist.', 52, $this->source); })()), "personalityType", [], "any", false, false, false, 52), "html", null, true);
                yield "</span>
                        ";
            } else {
                // line 53
                yield "—";
            }
            // line 54
            yield "                    </div>
                </div>
                ";
            // line 56
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["profile"]) || array_key_exists("profile", $context) ? $context["profile"] : (function () { throw new RuntimeError('Variable "profile" does not exist.', 56, $this->source); })()), "bio", [], "any", false, false, false, 56)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 57
                yield "                <div class=\"col-12\">
                    <div class=\"text-muted small\">Biographie</div>
                    <div>";
                // line 59
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["profile"]) || array_key_exists("profile", $context) ? $context["profile"] : (function () { throw new RuntimeError('Variable "profile" does not exist.', 59, $this->source); })()), "bio", [], "any", false, false, false, 59), "html", null, true);
                yield "</div>
                </div>
                ";
            }
            // line 62
            yield "                <div class=\"col-sm-6\">
                    <div class=\"text-muted small\">Membre depuis</div>
                    <div class=\"fw-semibold\">";
            // line 64
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 64, $this->source); })()), "createdAt", [], "any", false, false, false, 64)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 64, $this->source); })()), "createdAt", [], "any", false, false, false, 64), "d/m/Y"), "html", null, true)) : ("—"));
            yield "</div>
                </div>
            </div>
            ";
        } else {
            // line 68
            yield "                <p class=\"text-muted\">Aucun profil créé. <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile_edit");
            yield "\">Complétez votre profil</a>.</p>
            ";
        }
        // line 70
        yield "        </div>
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
        return "profile/show.html.twig";
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
        return array (  227 => 70,  221 => 68,  214 => 64,  210 => 62,  204 => 59,  200 => 57,  198 => 56,  194 => 54,  191 => 53,  185 => 52,  183 => 51,  175 => 46,  168 => 42,  161 => 38,  156 => 35,  154 => 34,  142 => 25,  137 => 23,  133 => 22,  128 => 21,  122 => 18,  118 => 16,  112 => 14,  110 => 13,  100 => 5,  87 => 4,  64 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'front/base.html.twig' %}
{% block title %}Mon Profil — MindBoost{% endblock %}

{% block body %}
<div class=\"mb-4\">
    <h1 class=\"fw-bold\"><i class=\"bi bi-person-circle me-2\" style=\"color:#6C63FF;\"></i>Mon Profil</h1>
    <p class=\"text-muted\">Vos informations personnelles</p>
</div>

<div class=\"row g-4\">
    <div class=\"col-md-4\">
        <div class=\"card text-center p-4\">
            {% if profile and profile.avatarUrl %}
                <img src=\"{{ profile.avatarUrl }}\" alt=\"Avatar\" class=\"rounded-circle mb-3 mx-auto\" style=\"width:100px;height:100px;object-fit:cover;border:3px solid #6C63FF;\">
            {% else %}
                <div class=\"rounded-circle mb-3 mx-auto d-flex align-items-center justify-content-center fw-bold\"
                     style=\"width:100px;height:100px;background:linear-gradient(135deg,#6C63FF,#5A52D5);font-size:2.5rem;color:white;\">
                    {{ user.displayName|slice(0,1)|upper }}
                </div>
            {% endif %}
            <h4 class=\"fw-bold\">{{ user.displayName }}</h4>
            <p class=\"text-muted mb-1\">{{ user.email }}</p>
            <span class=\"badge bg-primary\">{{ user.role }}</span>
            <div class=\"mt-3\">
                <a href=\"{{ path('app_profile_edit') }}\" class=\"btn btn-primary btn-sm\">
                    <i class=\"bi bi-pencil me-1\"></i>Modifier le profil
                </a>
            </div>
        </div>
    </div>
    <div class=\"col-md-8\">
        <div class=\"card p-4\">
            <h5 class=\"fw-bold mb-3\"><i class=\"bi bi-info-circle me-2\" style=\"color:#6C63FF;\"></i>Informations</h5>
            {% if profile %}
            <div class=\"row g-3\">
                <div class=\"col-sm-6\">
                    <div class=\"text-muted small\">Prénom</div>
                    <div class=\"fw-semibold\">{{ profile.firstName ?: '—' }}</div>
                </div>
                <div class=\"col-sm-6\">
                    <div class=\"text-muted small\">Nom</div>
                    <div class=\"fw-semibold\">{{ profile.lastName ?: '—' }}</div>
                </div>
                <div class=\"col-sm-6\">
                    <div class=\"text-muted small\">Téléphone</div>
                    <div class=\"fw-semibold\">{{ profile.phone ?: '—' }}</div>
                </div>
                <div class=\"col-sm-6\">
                    <div class=\"text-muted small\">Type de personnalité</div>
                    <div class=\"fw-semibold\">
                        {% if profile.personalityType %}
                            <span class=\"badge bg-info text-dark\">{{ profile.personalityType }}</span>
                        {% else %}—{% endif %}
                    </div>
                </div>
                {% if profile.bio %}
                <div class=\"col-12\">
                    <div class=\"text-muted small\">Biographie</div>
                    <div>{{ profile.bio }}</div>
                </div>
                {% endif %}
                <div class=\"col-sm-6\">
                    <div class=\"text-muted small\">Membre depuis</div>
                    <div class=\"fw-semibold\">{{ user.createdAt ? user.createdAt|date('d/m/Y') : '—' }}</div>
                </div>
            </div>
            {% else %}
                <p class=\"text-muted\">Aucun profil créé. <a href=\"{{ path('app_profile_edit') }}\">Complétez votre profil</a>.</p>
            {% endif %}
        </div>
    </div>
</div>
{% endblock %}
", "profile/show.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/profile/show.html.twig");
    }
}
