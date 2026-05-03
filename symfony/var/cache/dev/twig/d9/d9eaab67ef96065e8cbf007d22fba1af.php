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

/* back/sous_tache/index.html.twig */
class __TwigTemplate_2a6ccb39921e37ef7cc07d898c683456 extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
            'content' => [$this, 'block_content'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/sous_tache/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/sous_tache/index.html.twig"));

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

        yield "Sous-Tâches — Admin";
        
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

        yield "Sous-Tâches";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "<style>
    .sous-tache-list-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 1.25rem;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        transition: background .2s;
    }
    .sous-tache-list-item:last-child { border-bottom: none; }
    .sous-tache-list-item:hover { background: rgba(255,255,255,0.03); }

    .sous-tache-icon {
        width: 42px;
        height: 42px;
        border-radius: 13px;
        background: linear-gradient(135deg, #00D1C7, #19B5FE);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        color: white;
        flex-shrink: 0;
    }

    .sous-tache-desc {
        font-weight: 700;
        font-size: .95rem;
        color: var(--text-main, #F4F7FC);
    }

    .sous-tache-meta {
        display: flex;
        align-items: center;
        gap: .45rem;
        flex-wrap: wrap;
        margin-top: .3rem;
    }

    .status-pill {
        display: inline-flex;
        align-items: center;
        gap: .25rem;
        border-radius: 999px;
        padding: .2rem .6rem;
        font-size: .75rem;
        font-weight: 700;
    }
    .status-done    { background: rgba(41,204,122,0.18); color: #29CC7A; }
    .status-ongoing { background: rgba(47,107,255,0.18); color: #4D83FF; }
    .status-todo    { background: rgba(247,184,75,0.18);  color: #F7B84B; }
    .status-pending { background: rgba(255,255,255,0.08); color: #AAB6D3; }

    .parent-pill {
        display: inline-flex;
        align-items: center;
        gap: .25rem;
        font-size: .75rem;
        font-weight: 700;
        background: rgba(108,99,255,0.15);
        color: #9A8CFF;
        border-radius: 999px;
        padding: .2rem .55rem;
    }

    .prio-pill {
        background: rgba(255,255,255,0.07);
        color: #AAB6D3;
        border-radius: 999px;
        padding: .2rem .55rem;
        font-size: .75rem;
        font-weight: 700;
    }

    .dur-pill { font-size: .75rem; color: #7E8DB1; }
    .time-pill { font-size: .75rem; color: #7E8DB1; font-style: italic; }

    .action-group { display: flex; gap: .4rem; flex-shrink: 0; }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 87
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

        // line 88
        yield "
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <span class=\"text-muted\">";
        // line 90
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["sous_taches"]) || array_key_exists("sous_taches", $context) ? $context["sous_taches"] : (function () { throw new RuntimeError('Variable "sous_taches" does not exist.', 90, $this->source); })())), "html", null, true);
        yield " sous-tâche(s)</span>
</div>

<div class=\"card mb-4 p-3\">
    <form method=\"GET\" action=\"";
        // line 94
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_sous_tache_index");
        yield "\" class=\"d-flex gap-2 flex-wrap align-items-end\">
        <input type=\"text\" name=\"search\" value=\"";
        // line 95
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 95, $this->source); })()), "html", null, true);
        yield "\" placeholder=\"Rechercher...\" class=\"form-control form-control-sm\" style=\"width:200px;\">
        <select name=\"etat\" class=\"form-select form-select-sm\" style=\"width:160px;\">
            <option value=\"\">Tous les états</option>
            <option value=\"Terminée\"      ";
        // line 98
        yield ((((isset($context["etat"]) || array_key_exists("etat", $context) ? $context["etat"] : (function () { throw new RuntimeError('Variable "etat" does not exist.', 98, $this->source); })()) == "Terminée")) ? ("selected") : (""));
        yield ">Terminée</option>
            <option value=\"En cours\"      ";
        // line 99
        yield ((((isset($context["etat"]) || array_key_exists("etat", $context) ? $context["etat"] : (function () { throw new RuntimeError('Variable "etat" does not exist.', 99, $this->source); })()) == "En cours")) ? ("selected") : (""));
        yield ">En cours</option>
            <option value=\"Non commencée\" ";
        // line 100
        yield ((((isset($context["etat"]) || array_key_exists("etat", $context) ? $context["etat"] : (function () { throw new RuntimeError('Variable "etat" does not exist.', 100, $this->source); })()) == "Non commencée")) ? ("selected") : (""));
        yield ">Non commencée</option>
            <option value=\"À faire\"       ";
        // line 101
        yield ((((isset($context["etat"]) || array_key_exists("etat", $context) ? $context["etat"] : (function () { throw new RuntimeError('Variable "etat" does not exist.', 101, $this->source); })()) == "À faire")) ? ("selected") : (""));
        yield ">À faire</option>
        </select>
        <select name=\"tache_id\" class=\"form-select form-select-sm\" style=\"width:190px;\">
            <option value=\"\">Toutes les tâches</option>
            ";
        // line 105
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["taches"]) || array_key_exists("taches", $context) ? $context["taches"] : (function () { throw new RuntimeError('Variable "taches" does not exist.', 105, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tache"]) {
            // line 106
            yield "                <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "id", [], "any", false, false, false, 106), "html", null, true);
            yield "\" ";
            yield ((((isset($context["tache_id"]) || array_key_exists("tache_id", $context) ? $context["tache_id"] : (function () { throw new RuntimeError('Variable "tache_id" does not exist.', 106, $this->source); })()) == CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "id", [], "any", false, false, false, 106))) ? ("selected") : (""));
            yield ">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "titre", [], "any", false, false, false, 106), "html", null, true);
            yield "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['tache'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 108
        yield "        </select>
        <button type=\"submit\" class=\"btn btn-primary btn-sm\"><i class=\"bi bi-search me-1\"></i>Filtrer</button>
        <a href=\"";
        // line 110
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_sous_tache_index");
        yield "\" class=\"btn btn-outline-secondary btn-sm\">Réinitialiser</a>
    </form>
</div>

";
        // line 114
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["sous_taches"]) || array_key_exists("sous_taches", $context) ? $context["sous_taches"] : (function () { throw new RuntimeError('Variable "sous_taches" does not exist.', 114, $this->source); })())) == 0)) {
            // line 115
            yield "<div class=\"card p-5 text-center text-muted\">
    <i class=\"bi bi-inbox display-4\"></i>
    <p class=\"mt-2\">Aucune sous-tâche trouvée.</p>
</div>
";
        } else {
            // line 120
            yield "<div class=\"card\">
    <div class=\"card-body p-0\">
        ";
            // line 122
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["sous_taches"]) || array_key_exists("sous_taches", $context) ? $context["sous_taches"] : (function () { throw new RuntimeError('Variable "sous_taches" does not exist.', 122, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["sous_tache"]) {
                // line 123
                yield "            <div class=\"sous-tache-list-item\">
                <div class=\"sous-tache-icon\">
                    <i class=\"bi bi-list-check\"></i>
                </div>

                <div class=\"flex-grow-1 min-width-0\">
                    <div class=\"sous-tache-desc\">
                        ";
                // line 130
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "description", [], "any", false, false, false, 130), 0, 70), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "description", [], "any", false, false, false, 130)) > 70)) {
                    yield "…";
                }
                // line 131
                yield "                    </div>
                    <div class=\"sous-tache-meta\">
                        ";
                // line 133
                if (((CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "etat", [], "any", false, false, false, 133) == "Terminée") || (CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "etat", [], "any", false, false, false, 133) == "Terminee"))) {
                    // line 134
                    yield "                            <span class=\"status-pill status-done\"><i class=\"bi bi-check-circle-fill\"></i>Terminée</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 135
$context["sous_tache"], "etat", [], "any", false, false, false, 135) == "En cours")) {
                    // line 136
                    yield "                            <span class=\"status-pill status-ongoing\"><i class=\"bi bi-circle-fill\" style=\"font-size:.5rem;\"></i>En cours</span>
                        ";
                } elseif (((CoreExtension::getAttribute($this->env, $this->source,                 // line 137
$context["sous_tache"], "etat", [], "any", false, false, false, 137) == "À faire") || (CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "etat", [], "any", false, false, false, 137) == "A faire"))) {
                    // line 138
                    yield "                            <span class=\"status-pill status-todo\"><i class=\"bi bi-diamond-fill\" style=\"font-size:.5rem;\"></i>À faire</span>
                        ";
                } else {
                    // line 140
                    yield "                            <span class=\"status-pill status-pending\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "etat", [], "any", false, false, false, 140), "html", null, true);
                    yield "</span>
                        ";
                }
                // line 142
                yield "                        ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "tacheFocus", [], "any", false, false, false, 142)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 143
                    yield "                            <span class=\"parent-pill\">
                                <i class=\"bi bi-link-45deg\"></i>";
                    // line 144
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "tacheFocus", [], "any", false, false, false, 144), "titre", [], "any", false, false, false, 144), 0, 40), "html", null, true);
                    yield "
                            </span>
                        ";
                }
                // line 147
                yield "                        <span class=\"prio-pill\"><i class=\"bi bi-flag me-1\"></i>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "priorite", [], "any", false, false, false, 147), "html", null, true);
                yield "</span>
                        <span class=\"dur-pill\"><i class=\"bi bi-hourglass-split me-1\"></i>";
                // line 148
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "dureeRecommandee", [], "any", false, false, false, 148), "html", null, true);
                yield " min</span>
                        ";
                // line 149
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "heureDebut", [], "any", false, false, false, 149)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 150
                    yield "                            <span class=\"time-pill\"><i class=\"bi bi-clock me-1\"></i>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "heureDebut", [], "any", false, false, false, 150), "H:i"), "html", null, true);
                    yield " → ";
                    yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "heureFin", [], "any", false, false, false, 150)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "heureFin", [], "any", false, false, false, 150), "H:i"), "html", null, true)) : ("?"));
                    yield "</span>
                        ";
                }
                // line 152
                yield "                    </div>
                </div>

                <div class=\"action-group\">
                    <a href=\"";
                // line 156
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sous_tache_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "id", [], "any", false, false, false, 156)]), "html", null, true);
                yield "\"
                       class=\"btn btn-xs btn-outline-secondary\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Modifier\">
                        <i class=\"bi bi-pencil\"></i>
                    </a>
                    <form method=\"post\" action=\"";
                // line 161
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sous_tache_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "id", [], "any", false, false, false, 161)]), "html", null, true);
                yield "\"
                          onsubmit=\"return confirm('Supprimer cette sous-tâche ?')\">
                        <input type=\"hidden\" name=\"_token\" value=\"";
                // line 163
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "id", [], "any", false, false, false, 163))), "html", null, true);
                yield "\">
                        <button class=\"btn btn-xs btn-outline-danger\"
                                style=\"font-size:.75rem;padding:3px 9px;\" title=\"Supprimer\">
                            <i class=\"bi bi-trash\"></i>
                        </button>
                    </form>
                </div>
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['sous_tache'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 172
            yield "    </div>
</div>
";
        }
        // line 175
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
        return "back/sous_tache/index.html.twig";
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
        return array (  423 => 175,  418 => 172,  403 => 163,  398 => 161,  390 => 156,  384 => 152,  376 => 150,  374 => 149,  370 => 148,  365 => 147,  359 => 144,  356 => 143,  353 => 142,  347 => 140,  343 => 138,  341 => 137,  338 => 136,  336 => 135,  333 => 134,  331 => 133,  327 => 131,  322 => 130,  313 => 123,  309 => 122,  305 => 120,  298 => 115,  296 => 114,  289 => 110,  285 => 108,  272 => 106,  268 => 105,  261 => 101,  257 => 100,  253 => 99,  249 => 98,  243 => 95,  239 => 94,  232 => 90,  228 => 88,  215 => 87,  125 => 6,  112 => 5,  89 => 3,  66 => 2,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}
{% block title %}Sous-Tâches — Admin{% endblock %}
{% block page_title %}Sous-Tâches{% endblock %}

{% block stylesheets %}
<style>
    .sous-tache-list-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 1.25rem;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        transition: background .2s;
    }
    .sous-tache-list-item:last-child { border-bottom: none; }
    .sous-tache-list-item:hover { background: rgba(255,255,255,0.03); }

    .sous-tache-icon {
        width: 42px;
        height: 42px;
        border-radius: 13px;
        background: linear-gradient(135deg, #00D1C7, #19B5FE);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        color: white;
        flex-shrink: 0;
    }

    .sous-tache-desc {
        font-weight: 700;
        font-size: .95rem;
        color: var(--text-main, #F4F7FC);
    }

    .sous-tache-meta {
        display: flex;
        align-items: center;
        gap: .45rem;
        flex-wrap: wrap;
        margin-top: .3rem;
    }

    .status-pill {
        display: inline-flex;
        align-items: center;
        gap: .25rem;
        border-radius: 999px;
        padding: .2rem .6rem;
        font-size: .75rem;
        font-weight: 700;
    }
    .status-done    { background: rgba(41,204,122,0.18); color: #29CC7A; }
    .status-ongoing { background: rgba(47,107,255,0.18); color: #4D83FF; }
    .status-todo    { background: rgba(247,184,75,0.18);  color: #F7B84B; }
    .status-pending { background: rgba(255,255,255,0.08); color: #AAB6D3; }

    .parent-pill {
        display: inline-flex;
        align-items: center;
        gap: .25rem;
        font-size: .75rem;
        font-weight: 700;
        background: rgba(108,99,255,0.15);
        color: #9A8CFF;
        border-radius: 999px;
        padding: .2rem .55rem;
    }

    .prio-pill {
        background: rgba(255,255,255,0.07);
        color: #AAB6D3;
        border-radius: 999px;
        padding: .2rem .55rem;
        font-size: .75rem;
        font-weight: 700;
    }

    .dur-pill { font-size: .75rem; color: #7E8DB1; }
    .time-pill { font-size: .75rem; color: #7E8DB1; font-style: italic; }

    .action-group { display: flex; gap: .4rem; flex-shrink: 0; }
</style>
{% endblock %}

{% block content %}

<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <span class=\"text-muted\">{{ sous_taches|length }} sous-tâche(s)</span>
</div>

<div class=\"card mb-4 p-3\">
    <form method=\"GET\" action=\"{{ path('back_sous_tache_index') }}\" class=\"d-flex gap-2 flex-wrap align-items-end\">
        <input type=\"text\" name=\"search\" value=\"{{ search }}\" placeholder=\"Rechercher...\" class=\"form-control form-control-sm\" style=\"width:200px;\">
        <select name=\"etat\" class=\"form-select form-select-sm\" style=\"width:160px;\">
            <option value=\"\">Tous les états</option>
            <option value=\"Terminée\"      {{ etat == 'Terminée'      ? 'selected' : '' }}>Terminée</option>
            <option value=\"En cours\"      {{ etat == 'En cours'      ? 'selected' : '' }}>En cours</option>
            <option value=\"Non commencée\" {{ etat == 'Non commencée' ? 'selected' : '' }}>Non commencée</option>
            <option value=\"À faire\"       {{ etat == 'À faire'       ? 'selected' : '' }}>À faire</option>
        </select>
        <select name=\"tache_id\" class=\"form-select form-select-sm\" style=\"width:190px;\">
            <option value=\"\">Toutes les tâches</option>
            {% for tache in taches %}
                <option value=\"{{ tache.id }}\" {{ tache_id == tache.id ? 'selected' : '' }}>{{ tache.titre }}</option>
            {% endfor %}
        </select>
        <button type=\"submit\" class=\"btn btn-primary btn-sm\"><i class=\"bi bi-search me-1\"></i>Filtrer</button>
        <a href=\"{{ path('back_sous_tache_index') }}\" class=\"btn btn-outline-secondary btn-sm\">Réinitialiser</a>
    </form>
</div>

{% if sous_taches|length == 0 %}
<div class=\"card p-5 text-center text-muted\">
    <i class=\"bi bi-inbox display-4\"></i>
    <p class=\"mt-2\">Aucune sous-tâche trouvée.</p>
</div>
{% else %}
<div class=\"card\">
    <div class=\"card-body p-0\">
        {% for sous_tache in sous_taches %}
            <div class=\"sous-tache-list-item\">
                <div class=\"sous-tache-icon\">
                    <i class=\"bi bi-list-check\"></i>
                </div>

                <div class=\"flex-grow-1 min-width-0\">
                    <div class=\"sous-tache-desc\">
                        {{ sous_tache.description|slice(0,70) }}{% if sous_tache.description|length > 70 %}…{% endif %}
                    </div>
                    <div class=\"sous-tache-meta\">
                        {% if sous_tache.etat == 'Terminée' or sous_tache.etat == 'Terminee' %}
                            <span class=\"status-pill status-done\"><i class=\"bi bi-check-circle-fill\"></i>Terminée</span>
                        {% elseif sous_tache.etat == 'En cours' %}
                            <span class=\"status-pill status-ongoing\"><i class=\"bi bi-circle-fill\" style=\"font-size:.5rem;\"></i>En cours</span>
                        {% elseif sous_tache.etat == 'À faire' or sous_tache.etat == 'A faire' %}
                            <span class=\"status-pill status-todo\"><i class=\"bi bi-diamond-fill\" style=\"font-size:.5rem;\"></i>À faire</span>
                        {% else %}
                            <span class=\"status-pill status-pending\">{{ sous_tache.etat }}</span>
                        {% endif %}
                        {% if sous_tache.tacheFocus %}
                            <span class=\"parent-pill\">
                                <i class=\"bi bi-link-45deg\"></i>{{ sous_tache.tacheFocus.titre|slice(0,40) }}
                            </span>
                        {% endif %}
                        <span class=\"prio-pill\"><i class=\"bi bi-flag me-1\"></i>{{ sous_tache.priorite }}</span>
                        <span class=\"dur-pill\"><i class=\"bi bi-hourglass-split me-1\"></i>{{ sous_tache.dureeRecommandee }} min</span>
                        {% if sous_tache.heureDebut %}
                            <span class=\"time-pill\"><i class=\"bi bi-clock me-1\"></i>{{ sous_tache.heureDebut|date('H:i') }} → {{ sous_tache.heureFin ? sous_tache.heureFin|date('H:i') : '?' }}</span>
                        {% endif %}
                    </div>
                </div>

                <div class=\"action-group\">
                    <a href=\"{{ path('app_sous_tache_edit', {id: sous_tache.id}) }}\"
                       class=\"btn btn-xs btn-outline-secondary\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Modifier\">
                        <i class=\"bi bi-pencil\"></i>
                    </a>
                    <form method=\"post\" action=\"{{ path('app_sous_tache_delete', {id: sous_tache.id}) }}\"
                          onsubmit=\"return confirm('Supprimer cette sous-tâche ?')\">
                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ sous_tache.id) }}\">
                        <button class=\"btn btn-xs btn-outline-danger\"
                                style=\"font-size:.75rem;padding:3px 9px;\" title=\"Supprimer\">
                            <i class=\"bi bi-trash\"></i>
                        </button>
                    </form>
                </div>
            </div>
        {% endfor %}
    </div>
</div>
{% endif %}

{% endblock %}
", "back/sous_tache/index.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/back/sous_tache/index.html.twig");
    }
}
