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

/* front/saves/index.html.twig */
class __TwigTemplate_3a2ef7279fac838853cbeae966bd8686 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/saves/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/saves/index.html.twig"));

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

        yield "Saved Posts — MindBoost";
        
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
    <h2 class=\"fw-bold mb-0\"><i class=\"bi bi-bookmark me-2 text-info\"></i>Saved Posts</h2>
</div>

";
        // line 10
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["saves"]) || array_key_exists("saves", $context) ? $context["saves"] : (function () { throw new RuntimeError('Variable "saves" does not exist.', 10, $this->source); })()))) {
            // line 11
            yield "<div class=\"text-center py-5 text-muted\">
    <i class=\"bi bi-bookmark display-4\"></i>
    <p class=\"mt-2\">No saved posts. <a href=\"";
            // line 13
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_post_index");
            yield "\">Browse posts</a> to read some!</p>
</div>
";
        } else {
            // line 16
            yield "<div class=\"row g-3\">
    ";
            // line 17
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["saves"]) || array_key_exists("saves", $context) ? $context["saves"] : (function () { throw new RuntimeError('Variable "saves" does not exist.', 17, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["save"]) {
                // line 18
                yield "    <div class=\"col-md-6\">
        <div class=\"card\">
            <div class=\"card-body\">
                <div class=\"d-flex justify-content-between align-items-start\">
                    <div>
                        <div class=\"fw-bold mb-1\">
                            <a href=\"";
                // line 24
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_post_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["save"], "postId", [], "any", false, false, false, 24)]), "html", null, true);
                yield "\" class=\"text-decoration-none\" style=\"color:#9A8CFF;\">
                                <i class=\"bi bi-file-post me-1\"></i>Post #";
                // line 25
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["save"], "postId", [], "any", false, false, false, 25), "html", null, true);
                yield "
                            </a>
                        </div>
                        <small class=\"text-muted\">User #";
                // line 28
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["save"], "userId", [], "any", false, false, false, 28), "html", null, true);
                yield "</small>
                        ";
                // line 29
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["save"], "description", [], "any", false, false, false, 29)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 30
                    yield "                        <p class=\"mt-2 mb-0 text-muted small\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["save"], "description", [], "any", false, false, false, 30), "html", null, true);
                    yield "</p>
                        ";
                }
                // line 32
                yield "                    </div>
                </div>
            </div>
        </div>
    </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['save'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            yield "</div>
";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "front/saves/index.html.twig";
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
        return array (  166 => 38,  155 => 32,  149 => 30,  147 => 29,  143 => 28,  137 => 25,  133 => 24,  125 => 18,  121 => 17,  118 => 16,  112 => 13,  108 => 11,  106 => 10,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'front/base.html.twig' %}

{% block title %}Saved Posts — MindBoost{% endblock %}

{% block body %}
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <h2 class=\"fw-bold mb-0\"><i class=\"bi bi-bookmark me-2 text-info\"></i>Saved Posts</h2>
</div>

{% if saves is empty %}
<div class=\"text-center py-5 text-muted\">
    <i class=\"bi bi-bookmark display-4\"></i>
    <p class=\"mt-2\">No saved posts. <a href=\"{{ path('front_post_index') }}\">Browse posts</a> to read some!</p>
</div>
{% else %}
<div class=\"row g-3\">
    {% for save in saves %}
    <div class=\"col-md-6\">
        <div class=\"card\">
            <div class=\"card-body\">
                <div class=\"d-flex justify-content-between align-items-start\">
                    <div>
                        <div class=\"fw-bold mb-1\">
                            <a href=\"{{ path('front_post_show', {id: save.postId}) }}\" class=\"text-decoration-none\" style=\"color:#9A8CFF;\">
                                <i class=\"bi bi-file-post me-1\"></i>Post #{{ save.postId }}
                            </a>
                        </div>
                        <small class=\"text-muted\">User #{{ save.userId }}</small>
                        {% if save.description %}
                        <p class=\"mt-2 mb-0 text-muted small\">{{ save.description }}</p>
                        {% endif %}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {% endfor %}
</div>
{% endif %}
{% endblock %}
", "front/saves/index.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/front/saves/index.html.twig");
    }
}
