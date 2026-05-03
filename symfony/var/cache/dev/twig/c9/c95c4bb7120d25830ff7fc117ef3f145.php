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

/* admin/profile_list.html.twig */
class __TwigTemplate_6b6def7eb0f341b4d1ac7f1987fd8770 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/profile_list.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/profile_list.html.twig"));

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

        yield "Profils — Admin";
        
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

        yield "Gestion des Profils";
        
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
    <h4 class=\"fw-bold mb-0\"><i class=\"bi bi-person-badge me-2\" style=\"color:#4ECDC4;\"></i>Profils (";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 7, $this->source); })()), "html", null, true);
        yield ")</h4>
</div>

<div class=\"card mb-3 p-3\">
    <form method=\"get\" class=\"d-flex gap-2 flex-wrap\">
        <input type=\"text\" name=\"q\" value=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["keyword"]) || array_key_exists("keyword", $context) ? $context["keyword"] : (function () { throw new RuntimeError('Variable "keyword" does not exist.', 12, $this->source); })()), "html", null, true);
        yield "\" class=\"form-control form-control-sm\" placeholder=\"Rechercher...\" style=\"max-width:250px;\">
        <select name=\"type\" class=\"form-select form-select-sm\" style=\"max-width:180px;\">
            <option value=\"\">Tous les types</option>
            ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["personalityTypes"]) || array_key_exists("personalityTypes", $context) ? $context["personalityTypes"] : (function () { throw new RuntimeError('Variable "personalityTypes" does not exist.', 15, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["pt"]) {
            // line 16
            yield "                <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["pt"], "html", null, true);
            yield "\" ";
            yield ((((isset($context["selectedType"]) || array_key_exists("selectedType", $context) ? $context["selectedType"] : (function () { throw new RuntimeError('Variable "selectedType" does not exist.', 16, $this->source); })()) == $context["pt"])) ? ("selected") : (""));
            yield ">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["pt"], "html", null, true);
            yield "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['pt'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        yield "        </select>
        <button type=\"submit\" class=\"btn btn-secondary btn-sm\"><i class=\"bi bi-search me-1\"></i>Filtrer</button>
        <a href=\"";
        // line 20
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_profile_list");
        yield "\" class=\"btn btn-outline-secondary btn-sm\">Réinitialiser</a>
    </form>
</div>

<div class=\"row g-3\">
    ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["profiles"]) || array_key_exists("profiles", $context) ? $context["profiles"] : (function () { throw new RuntimeError('Variable "profiles" does not exist.', 25, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 26
            yield "    <div class=\"col-md-6 col-xl-4\">
        <div class=\"card h-100\">
            <div class=\"card-body\">
                <div class=\"d-flex align-items-center gap-3 mb-3\">
                    <div class=\"rounded-circle d-flex align-items-center justify-content-center fw-bold\"
                         style=\"width:44px;height:44px;background:linear-gradient(135deg,#4ECDC4,#2ECC71);color:#fff;font-size:1.1rem;flex-shrink:0;\">
                        ";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["p"], "fullName", [], "any", false, false, false, 32), 0, 1)), "html", null, true);
            yield "
                    </div>
                    <div>
                        <div class=\"fw-bold\" style=\"color:#E8E8F0;\">";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["p"], "fullName", [], "any", false, false, false, 35), "html", null, true);
            yield "</div>
                        <div class=\"small\" style=\"color:#9B9BB0;\">";
            // line 36
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["p"], "user", [], "any", false, false, false, 36)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["p"], "user", [], "any", false, false, false, 36), "email", [], "any", false, false, false, 36), "html", null, true)) : ("—"));
            yield "</div>
                    </div>
                </div>
                <div class=\"d-flex gap-2 flex-wrap mb-3\">
                    ";
            // line 40
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["p"], "personalityType", [], "any", false, false, false, 40)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 41
                yield "                        <span class=\"badge bg-info text-dark\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["p"], "personalityType", [], "any", false, false, false, 41), "html", null, true);
                yield "</span>
                    ";
            }
            // line 43
            yield "                    ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["p"], "phone", [], "any", false, false, false, 43)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 44
                yield "                        <span class=\"badge\" style=\"background:rgba(255,255,255,0.08);color:#9B9BB0;\"><i class=\"bi bi-telephone me-1\"></i>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["p"], "phone", [], "any", false, false, false, 44), "html", null, true);
                yield "</span>
                    ";
            }
            // line 46
            yield "                </div>
                <div class=\"d-flex gap-2\">
                    <a href=\"";
            // line 48
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_profile_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["p"], "id", [], "any", false, false, false, 48)]), "html", null, true);
            yield "\" class=\"btn btn-outline-warning btn-sm\"><i class=\"bi bi-pencil\"></i></a>
                    <form method=\"post\" action=\"";
            // line 49
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_profile_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["p"], "id", [], "any", false, false, false, 49)]), "html", null, true);
            yield "\" class=\"d-inline\" onsubmit=\"return confirm('Supprimer ce profil ?');\">
                        <input type=\"hidden\" name=\"_token\" value=\"";
            // line 50
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete_profile_" . CoreExtension::getAttribute($this->env, $this->source, $context["p"], "id", [], "any", false, false, false, 50))), "html", null, true);
            yield "\">
                        <button type=\"submit\" class=\"btn btn-outline-danger btn-sm\"><i class=\"bi bi-trash\"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    ";
            $context['_iterated'] = true;
        }
        // line 57
        if (!$context['_iterated']) {
            // line 58
            yield "    <div class=\"col-12 text-center text-muted py-4\">Aucun profil trouvé.</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['p'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
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
        return "admin/profile_list.html.twig";
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
        return array (  250 => 60,  243 => 58,  241 => 57,  229 => 50,  225 => 49,  221 => 48,  217 => 46,  211 => 44,  208 => 43,  202 => 41,  200 => 40,  193 => 36,  189 => 35,  183 => 32,  175 => 26,  170 => 25,  162 => 20,  158 => 18,  145 => 16,  141 => 15,  135 => 12,  127 => 7,  124 => 6,  111 => 5,  88 => 3,  65 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}
{% block title %}Profils — Admin{% endblock %}
{% block page_title %}Gestion des Profils{% endblock %}

{% block body %}
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <h4 class=\"fw-bold mb-0\"><i class=\"bi bi-person-badge me-2\" style=\"color:#4ECDC4;\"></i>Profils ({{ total }})</h4>
</div>

<div class=\"card mb-3 p-3\">
    <form method=\"get\" class=\"d-flex gap-2 flex-wrap\">
        <input type=\"text\" name=\"q\" value=\"{{ keyword }}\" class=\"form-control form-control-sm\" placeholder=\"Rechercher...\" style=\"max-width:250px;\">
        <select name=\"type\" class=\"form-select form-select-sm\" style=\"max-width:180px;\">
            <option value=\"\">Tous les types</option>
            {% for pt in personalityTypes %}
                <option value=\"{{ pt }}\" {{ selectedType == pt ? 'selected' : '' }}>{{ pt }}</option>
            {% endfor %}
        </select>
        <button type=\"submit\" class=\"btn btn-secondary btn-sm\"><i class=\"bi bi-search me-1\"></i>Filtrer</button>
        <a href=\"{{ path('app_admin_profile_list') }}\" class=\"btn btn-outline-secondary btn-sm\">Réinitialiser</a>
    </form>
</div>

<div class=\"row g-3\">
    {% for p in profiles %}
    <div class=\"col-md-6 col-xl-4\">
        <div class=\"card h-100\">
            <div class=\"card-body\">
                <div class=\"d-flex align-items-center gap-3 mb-3\">
                    <div class=\"rounded-circle d-flex align-items-center justify-content-center fw-bold\"
                         style=\"width:44px;height:44px;background:linear-gradient(135deg,#4ECDC4,#2ECC71);color:#fff;font-size:1.1rem;flex-shrink:0;\">
                        {{ p.fullName|slice(0,1)|upper }}
                    </div>
                    <div>
                        <div class=\"fw-bold\" style=\"color:#E8E8F0;\">{{ p.fullName }}</div>
                        <div class=\"small\" style=\"color:#9B9BB0;\">{{ p.user ? p.user.email : '—' }}</div>
                    </div>
                </div>
                <div class=\"d-flex gap-2 flex-wrap mb-3\">
                    {% if p.personalityType %}
                        <span class=\"badge bg-info text-dark\">{{ p.personalityType }}</span>
                    {% endif %}
                    {% if p.phone %}
                        <span class=\"badge\" style=\"background:rgba(255,255,255,0.08);color:#9B9BB0;\"><i class=\"bi bi-telephone me-1\"></i>{{ p.phone }}</span>
                    {% endif %}
                </div>
                <div class=\"d-flex gap-2\">
                    <a href=\"{{ path('app_admin_profile_edit', {id: p.id}) }}\" class=\"btn btn-outline-warning btn-sm\"><i class=\"bi bi-pencil\"></i></a>
                    <form method=\"post\" action=\"{{ path('app_admin_profile_delete', {id: p.id}) }}\" class=\"d-inline\" onsubmit=\"return confirm('Supprimer ce profil ?');\">
                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete_profile_' ~ p.id) }}\">
                        <button type=\"submit\" class=\"btn btn-outline-danger btn-sm\"><i class=\"bi bi-trash\"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {% else %}
    <div class=\"col-12 text-center text-muted py-4\">Aucun profil trouvé.</div>
    {% endfor %}
</div>
{% endblock %}
", "admin/profile_list.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/admin/profile_list.html.twig");
    }
}
