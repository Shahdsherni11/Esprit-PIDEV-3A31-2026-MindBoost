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

/* admin/user_list.html.twig */
class __TwigTemplate_a3030038557266ed150941a91fab896c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/user_list.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/user_list.html.twig"));

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

        yield "Utilisateurs — Admin";
        
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

        yield "Gestion des Utilisateurs";
        
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
    <h4 class=\"fw-bold mb-0\"><i class=\"bi bi-people me-2\" style=\"color:#6C63FF;\"></i>Utilisateurs (";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 7, $this->source); })()), "html", null, true);
        yield ")</h4>
    <a href=\"";
        // line 8
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_user_new");
        yield "\" class=\"btn btn-primary btn-sm\">
        <i class=\"bi bi-person-plus me-1\"></i>Nouvel Utilisateur
    </a>
</div>

<div class=\"card mb-3 p-3\">
    <form method=\"get\" class=\"d-flex gap-2 flex-wrap\">
        <input type=\"text\" name=\"q\" value=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["keyword"]) || array_key_exists("keyword", $context) ? $context["keyword"] : (function () { throw new RuntimeError('Variable "keyword" does not exist.', 15, $this->source); })()), "html", null, true);
        yield "\" class=\"form-control form-control-sm\" placeholder=\"Rechercher email / nom...\" style=\"max-width:250px;\">
        <select name=\"role\" class=\"form-select form-select-sm\" style=\"max-width:160px;\">
            <option value=\"\">Tous les rôles</option>
            <option value=\"user\" ";
        // line 18
        yield ((((isset($context["role"]) || array_key_exists("role", $context) ? $context["role"] : (function () { throw new RuntimeError('Variable "role" does not exist.', 18, $this->source); })()) == "user")) ? ("selected") : (""));
        yield ">Utilisateur</option>
            <option value=\"psychologist\" ";
        // line 19
        yield ((((isset($context["role"]) || array_key_exists("role", $context) ? $context["role"] : (function () { throw new RuntimeError('Variable "role" does not exist.', 19, $this->source); })()) == "psychologist")) ? ("selected") : (""));
        yield ">Psychologue</option>
            <option value=\"admin\" ";
        // line 20
        yield ((((isset($context["role"]) || array_key_exists("role", $context) ? $context["role"] : (function () { throw new RuntimeError('Variable "role" does not exist.', 20, $this->source); })()) == "admin")) ? ("selected") : (""));
        yield ">Admin</option>
        </select>
        <button type=\"submit\" class=\"btn btn-secondary btn-sm\"><i class=\"bi bi-search me-1\"></i>Filtrer</button>
        <a href=\"";
        // line 23
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_user_list");
        yield "\" class=\"btn btn-outline-secondary btn-sm\">Réinitialiser</a>
    </form>
</div>

<div class=\"row g-3\">
    ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 28, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
            // line 29
            yield "    <div class=\"col-md-6 col-xl-4\">
        <div class=\"card h-100\">
            <div class=\"card-body\">
                <div class=\"d-flex align-items-center gap-3 mb-3\">
                    <div class=\"rounded-circle d-flex align-items-center justify-content-center fw-bold\"
                         style=\"width:44px;height:44px;background:linear-gradient(135deg,#6C63FF,#5A52D5);color:#fff;font-size:1.1rem;flex-shrink:0;\">
                        ";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["u"], "displayName", [], "any", false, false, false, 35), 0, 1)), "html", null, true);
            yield "
                    </div>
                    <div>
                        <div class=\"fw-bold\" style=\"color:#E8E8F0;\">";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "displayName", [], "any", false, false, false, 38), "html", null, true);
            yield "</div>
                        <div class=\"small\" style=\"color:#9B9BB0;\">";
            // line 39
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "email", [], "any", false, false, false, 39), "html", null, true);
            yield "</div>
                    </div>
                </div>
                <div class=\"d-flex gap-2 flex-wrap mb-3\">
                    <span class=\"badge bg-";
            // line 43
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["u"], "role", [], "any", false, false, false, 43) == "admin")) ? ("danger") : ((((CoreExtension::getAttribute($this->env, $this->source, $context["u"], "role", [], "any", false, false, false, 43) == "psychologist")) ? ("warning text-dark") : ("secondary"))));
            yield "\">
                        ";
            // line 44
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "role", [], "any", false, false, false, 44), "html", null, true);
            yield "
                    </span>
                    ";
            // line 46
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["u"], "isVerified", [], "any", false, false, false, 46)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 47
                yield "                        <span class=\"badge bg-success\"><i class=\"bi bi-check-circle me-1\"></i>Vérifié</span>
                    ";
            } else {
                // line 49
                yield "                        <span class=\"badge bg-secondary\"><i class=\"bi bi-x-circle me-1\"></i>Non vérifié</span>
                    ";
            }
            // line 51
            yield "                    ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["u"], "createdAt", [], "any", false, false, false, 51)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 52
                yield "                    <span class=\"badge\" style=\"background:rgba(255,255,255,0.08);color:#9B9BB0;\"><i class=\"bi bi-calendar3 me-1\"></i>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "createdAt", [], "any", false, false, false, 52), "d/m/Y"), "html", null, true);
                yield "</span>
                    ";
            }
            // line 54
            yield "                </div>
                <div class=\"d-flex gap-2\">
                    <a href=\"";
            // line 56
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_user_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["u"], "id", [], "any", false, false, false, 56)]), "html", null, true);
            yield "\" class=\"btn btn-outline-primary btn-sm\" title=\"Voir\"><i class=\"bi bi-eye\"></i></a>
                    <a href=\"";
            // line 57
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_user_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["u"], "id", [], "any", false, false, false, 57)]), "html", null, true);
            yield "\" class=\"btn btn-outline-warning btn-sm\" title=\"Modifier\"><i class=\"bi bi-pencil\"></i></a>
                    <form method=\"post\" action=\"";
            // line 58
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_user_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["u"], "id", [], "any", false, false, false, 58)]), "html", null, true);
            yield "\" class=\"d-inline\" onsubmit=\"return confirm('Supprimer cet utilisateur ?');\">
                        <input type=\"hidden\" name=\"_token\" value=\"";
            // line 59
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete_user_" . CoreExtension::getAttribute($this->env, $this->source, $context["u"], "id", [], "any", false, false, false, 59))), "html", null, true);
            yield "\">
                        <button type=\"submit\" class=\"btn btn-outline-danger btn-sm\" title=\"Supprimer\"><i class=\"bi bi-trash\"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    ";
            $context['_iterated'] = true;
        }
        // line 66
        if (!$context['_iterated']) {
            // line 67
            yield "    <div class=\"col-12 text-center text-muted py-4\">Aucun utilisateur trouvé.</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['u'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        yield "</div>
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
        return "admin/user_list.html.twig";
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
        return array (  264 => 69,  257 => 67,  255 => 66,  243 => 59,  239 => 58,  235 => 57,  231 => 56,  227 => 54,  221 => 52,  218 => 51,  214 => 49,  210 => 47,  208 => 46,  203 => 44,  199 => 43,  192 => 39,  188 => 38,  182 => 35,  174 => 29,  169 => 28,  161 => 23,  155 => 20,  151 => 19,  147 => 18,  141 => 15,  131 => 8,  127 => 7,  124 => 6,  111 => 5,  88 => 3,  65 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}
{% block title %}Utilisateurs — Admin{% endblock %}
{% block page_title %}Gestion des Utilisateurs{% endblock %}

{% block body %}
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <h4 class=\"fw-bold mb-0\"><i class=\"bi bi-people me-2\" style=\"color:#6C63FF;\"></i>Utilisateurs ({{ total }})</h4>
    <a href=\"{{ path('app_admin_user_new') }}\" class=\"btn btn-primary btn-sm\">
        <i class=\"bi bi-person-plus me-1\"></i>Nouvel Utilisateur
    </a>
</div>

<div class=\"card mb-3 p-3\">
    <form method=\"get\" class=\"d-flex gap-2 flex-wrap\">
        <input type=\"text\" name=\"q\" value=\"{{ keyword }}\" class=\"form-control form-control-sm\" placeholder=\"Rechercher email / nom...\" style=\"max-width:250px;\">
        <select name=\"role\" class=\"form-select form-select-sm\" style=\"max-width:160px;\">
            <option value=\"\">Tous les rôles</option>
            <option value=\"user\" {{ role == 'user' ? 'selected' : '' }}>Utilisateur</option>
            <option value=\"psychologist\" {{ role == 'psychologist' ? 'selected' : '' }}>Psychologue</option>
            <option value=\"admin\" {{ role == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>
        <button type=\"submit\" class=\"btn btn-secondary btn-sm\"><i class=\"bi bi-search me-1\"></i>Filtrer</button>
        <a href=\"{{ path('app_admin_user_list') }}\" class=\"btn btn-outline-secondary btn-sm\">Réinitialiser</a>
    </form>
</div>

<div class=\"row g-3\">
    {% for u in users %}
    <div class=\"col-md-6 col-xl-4\">
        <div class=\"card h-100\">
            <div class=\"card-body\">
                <div class=\"d-flex align-items-center gap-3 mb-3\">
                    <div class=\"rounded-circle d-flex align-items-center justify-content-center fw-bold\"
                         style=\"width:44px;height:44px;background:linear-gradient(135deg,#6C63FF,#5A52D5);color:#fff;font-size:1.1rem;flex-shrink:0;\">
                        {{ u.displayName|slice(0,1)|upper }}
                    </div>
                    <div>
                        <div class=\"fw-bold\" style=\"color:#E8E8F0;\">{{ u.displayName }}</div>
                        <div class=\"small\" style=\"color:#9B9BB0;\">{{ u.email }}</div>
                    </div>
                </div>
                <div class=\"d-flex gap-2 flex-wrap mb-3\">
                    <span class=\"badge bg-{{ u.role == 'admin' ? 'danger' : (u.role == 'psychologist' ? 'warning text-dark' : 'secondary') }}\">
                        {{ u.role }}
                    </span>
                    {% if u.isVerified %}
                        <span class=\"badge bg-success\"><i class=\"bi bi-check-circle me-1\"></i>Vérifié</span>
                    {% else %}
                        <span class=\"badge bg-secondary\"><i class=\"bi bi-x-circle me-1\"></i>Non vérifié</span>
                    {% endif %}
                    {% if u.createdAt %}
                    <span class=\"badge\" style=\"background:rgba(255,255,255,0.08);color:#9B9BB0;\"><i class=\"bi bi-calendar3 me-1\"></i>{{ u.createdAt|date('d/m/Y') }}</span>
                    {% endif %}
                </div>
                <div class=\"d-flex gap-2\">
                    <a href=\"{{ path('app_admin_user_show', {id: u.id}) }}\" class=\"btn btn-outline-primary btn-sm\" title=\"Voir\"><i class=\"bi bi-eye\"></i></a>
                    <a href=\"{{ path('app_admin_user_edit', {id: u.id}) }}\" class=\"btn btn-outline-warning btn-sm\" title=\"Modifier\"><i class=\"bi bi-pencil\"></i></a>
                    <form method=\"post\" action=\"{{ path('app_admin_user_delete', {id: u.id}) }}\" class=\"d-inline\" onsubmit=\"return confirm('Supprimer cet utilisateur ?');\">
                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete_user_' ~ u.id) }}\">
                        <button type=\"submit\" class=\"btn btn-outline-danger btn-sm\" title=\"Supprimer\"><i class=\"bi bi-trash\"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {% else %}
    <div class=\"col-12 text-center text-muted py-4\">Aucun utilisateur trouvé.</div>
    {% endfor %}
</div>
{% endblock %}
", "admin/user_list.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/admin/user_list.html.twig");
    }
}
