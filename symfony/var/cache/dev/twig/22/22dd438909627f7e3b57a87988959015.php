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

/* sous_tache/index.html.twig */
class __TwigTemplate_999372a363e7443efe6ceb899ebd43d5 extends Template
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
            'extra_css' => [$this, 'block_extra_css'],
            'content' => [$this, 'block_content'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sous_tache/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sous_tache/index.html.twig"));

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

        yield "Mes Sous-Tâches";
        
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

        yield "Mes Sous-Tâches";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

    .dur-pill {
        font-size: .75rem;
        color: #7E8DB1;
    }

    .time-pill {
        font-size: .75rem;
        color: #7E8DB1;
        font-style: italic;
    }

    .action-group { display: flex; gap: .4rem; flex-shrink: 0; }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 95
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

        // line 96
        yield "
";
        // line 98
        yield "<div class=\"row g-3 mb-4\">
    <div class=\"col-6\">
        <div class=\"card text-center p-3\">
            <div style=\"font-size:1.8rem;font-weight:900;color:var(--primary,#2563eb);\">";
        // line 101
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalSousTaches"]) || array_key_exists("totalSousTaches", $context) ? $context["totalSousTaches"] : (function () { throw new RuntimeError('Variable "totalSousTaches" does not exist.', 101, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"text-muted small fw-bold mt-1\">Total sous-tâches</div>
        </div>
    </div>
    <div class=\"col-6\">
        <div class=\"card text-center p-3\">
            <div style=\"font-size:1.8rem;font-weight:900;color:#29CC7A;\">";
        // line 107
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nbTerminees"]) || array_key_exists("nbTerminees", $context) ? $context["nbTerminees"] : (function () { throw new RuntimeError('Variable "nbTerminees" does not exist.', 107, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"text-muted small fw-bold mt-1\">Terminées</div>
        </div>
    </div>
</div>

<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <span class=\"text-muted\">";
        // line 114
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["sous_taches"]) || array_key_exists("sous_taches", $context) ? $context["sous_taches"] : (function () { throw new RuntimeError('Variable "sous_taches" does not exist.', 114, $this->source); })())), "html", null, true);
        yield " sous-tâche(s)</span>
    <a href=\"";
        // line 115
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sous_tache_new");
        yield "\" class=\"btn btn-primary btn-sm\">
        <i class=\"bi bi-plus-lg me-1\"></i>Ajouter
    </a>
</div>

<div class=\"card mb-4 p-3\">
    <form method=\"GET\" action=\"";
        // line 121
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sous_tache_index");
        yield "\" class=\"d-flex gap-2 flex-wrap align-items-end\">
        <input type=\"text\" name=\"search\" value=\"";
        // line 122
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 122, $this->source); })()), "html", null, true);
        yield "\" placeholder=\"Rechercher...\" class=\"form-control form-control-sm\" style=\"width:200px;\">
        <select name=\"etat\" class=\"form-select form-select-sm\" style=\"width:160px;\">
            <option value=\"\">Tous les états</option>
            <option value=\"Terminée\"      ";
        // line 125
        yield ((((isset($context["etat"]) || array_key_exists("etat", $context) ? $context["etat"] : (function () { throw new RuntimeError('Variable "etat" does not exist.', 125, $this->source); })()) == "Terminée")) ? ("selected") : (""));
        yield ">Terminée</option>
            <option value=\"En cours\"      ";
        // line 126
        yield ((((isset($context["etat"]) || array_key_exists("etat", $context) ? $context["etat"] : (function () { throw new RuntimeError('Variable "etat" does not exist.', 126, $this->source); })()) == "En cours")) ? ("selected") : (""));
        yield ">En cours</option>
            <option value=\"Non commencée\" ";
        // line 127
        yield ((((isset($context["etat"]) || array_key_exists("etat", $context) ? $context["etat"] : (function () { throw new RuntimeError('Variable "etat" does not exist.', 127, $this->source); })()) == "Non commencée")) ? ("selected") : (""));
        yield ">Non commencée</option>
            <option value=\"À faire\"       ";
        // line 128
        yield ((((isset($context["etat"]) || array_key_exists("etat", $context) ? $context["etat"] : (function () { throw new RuntimeError('Variable "etat" does not exist.', 128, $this->source); })()) == "À faire")) ? ("selected") : (""));
        yield ">À faire</option>
        </select>
        <select name=\"tache_id\" class=\"form-select form-select-sm\" style=\"width:190px;\">
            <option value=\"\">Toutes les tâches</option>
            ";
        // line 132
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["taches"]) || array_key_exists("taches", $context) ? $context["taches"] : (function () { throw new RuntimeError('Variable "taches" does not exist.', 132, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tache"]) {
            // line 133
            yield "                <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "id", [], "any", false, false, false, 133), "html", null, true);
            yield "\" ";
            yield ((((isset($context["tache_id"]) || array_key_exists("tache_id", $context) ? $context["tache_id"] : (function () { throw new RuntimeError('Variable "tache_id" does not exist.', 133, $this->source); })()) == CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "id", [], "any", false, false, false, 133))) ? ("selected") : (""));
            yield ">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tache"], "titre", [], "any", false, false, false, 133), "html", null, true);
            yield "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['tache'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 135
        yield "        </select>
        <button type=\"submit\" class=\"btn btn-primary btn-sm\"><i class=\"bi bi-search me-1\"></i>Filtrer</button>
        <a href=\"";
        // line 137
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sous_tache_index");
        yield "\" class=\"btn btn-outline-secondary btn-sm\">Réinitialiser</a>
    </form>
</div>

";
        // line 141
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["sous_taches"]) || array_key_exists("sous_taches", $context) ? $context["sous_taches"] : (function () { throw new RuntimeError('Variable "sous_taches" does not exist.', 141, $this->source); })())) == 0)) {
            // line 142
            yield "<div class=\"card p-5 text-center text-muted\">
    <i class=\"bi bi-inbox display-4\"></i>
    <p class=\"mt-2\">Aucune sous-tâche trouvée.</p>
</div>
";
        } else {
            // line 147
            yield "<div class=\"card\">
    <div class=\"card-body p-0\">
        ";
            // line 149
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["sous_taches"]) || array_key_exists("sous_taches", $context) ? $context["sous_taches"] : (function () { throw new RuntimeError('Variable "sous_taches" does not exist.', 149, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["sous_tache"]) {
                // line 150
                yield "            <div class=\"sous-tache-list-item\">
                <div class=\"sous-tache-icon\">
                    <i class=\"bi bi-list-check\"></i>
                </div>

                <div class=\"flex-grow-1 min-width-0\">
                    <div class=\"sous-tache-desc\">
                        ";
                // line 157
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "description", [], "any", false, false, false, 157), 0, 70), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "description", [], "any", false, false, false, 157)) > 70)) {
                    yield "…";
                }
                // line 158
                yield "                    </div>
                    <div class=\"sous-tache-meta\">
                        ";
                // line 160
                if (((CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "etat", [], "any", false, false, false, 160) == "Terminée") || (CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "etat", [], "any", false, false, false, 160) == "Terminee"))) {
                    // line 161
                    yield "                            <span class=\"status-pill status-done\"><i class=\"bi bi-check-circle-fill\"></i>Terminée</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 162
$context["sous_tache"], "etat", [], "any", false, false, false, 162) == "En cours")) {
                    // line 163
                    yield "                            <span class=\"status-pill status-ongoing\"><i class=\"bi bi-circle-fill\" style=\"font-size:.5rem;\"></i>En cours</span>
                        ";
                } elseif (((CoreExtension::getAttribute($this->env, $this->source,                 // line 164
$context["sous_tache"], "etat", [], "any", false, false, false, 164) == "À faire") || (CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "etat", [], "any", false, false, false, 164) == "A faire"))) {
                    // line 165
                    yield "                            <span class=\"status-pill status-todo\"><i class=\"bi bi-diamond-fill\" style=\"font-size:.5rem;\"></i>À faire</span>
                        ";
                } else {
                    // line 167
                    yield "                            <span class=\"status-pill status-pending\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "etat", [], "any", false, false, false, 167), "html", null, true);
                    yield "</span>
                        ";
                }
                // line 169
                yield "                        ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "tacheFocus", [], "any", false, false, false, 169)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 170
                    yield "                            <span class=\"parent-pill\">
                                <i class=\"bi bi-link-45deg\"></i>";
                    // line 171
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "tacheFocus", [], "any", false, false, false, 171), "titre", [], "any", false, false, false, 171), 0, 40), "html", null, true);
                    yield "
                            </span>
                        ";
                }
                // line 174
                yield "                        <span class=\"prio-pill\"><i class=\"bi bi-flag me-1\"></i>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "priorite", [], "any", false, false, false, 174), "html", null, true);
                yield "</span>
                        <span class=\"dur-pill\"><i class=\"bi bi-hourglass-split me-1\"></i>";
                // line 175
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "dureeRecommandee", [], "any", false, false, false, 175), "html", null, true);
                yield " min</span>
                        ";
                // line 176
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "heureDebut", [], "any", false, false, false, 176)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 177
                    yield "                            <span class=\"time-pill\"><i class=\"bi bi-clock me-1\"></i>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "heureDebut", [], "any", false, false, false, 177), "H:i"), "html", null, true);
                    yield " → ";
                    yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "heureFin", [], "any", false, false, false, 177)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "heureFin", [], "any", false, false, false, 177), "H:i"), "html", null, true)) : ("?"));
                    yield "</span>
                        ";
                }
                // line 179
                yield "                    </div>
                </div>

                <div class=\"action-group\">
                    <a href=\"";
                // line 183
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sous_tache_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "id", [], "any", false, false, false, 183)]), "html", null, true);
                yield "\"
                       class=\"btn btn-xs btn-outline-info\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Voir\">
                        <i class=\"bi bi-eye\"></i>
                    </a>
                    <a href=\"";
                // line 188
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sous_tache_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "id", [], "any", false, false, false, 188)]), "html", null, true);
                yield "\"
                       class=\"btn btn-xs btn-outline-secondary\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Modifier\">
                        <i class=\"bi bi-pencil\"></i>
                    </a>
                    <form method=\"post\" action=\"";
                // line 193
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sous_tache_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "id", [], "any", false, false, false, 193)]), "html", null, true);
                yield "\"
                          onsubmit=\"return confirm('Supprimer cette sous-tâche ?')\">
                        <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
                        <input type=\"hidden\" name=\"_token\" value=\"";
                // line 196
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["sous_tache"], "id", [], "any", false, false, false, 196))), "html", null, true);
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
            // line 205
            yield "    </div>
</div>
";
        }
        // line 208
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
        return "sous_tache/index.html.twig";
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
        return array (  469 => 208,  464 => 205,  449 => 196,  443 => 193,  435 => 188,  427 => 183,  421 => 179,  413 => 177,  411 => 176,  407 => 175,  402 => 174,  396 => 171,  393 => 170,  390 => 169,  384 => 167,  380 => 165,  378 => 164,  375 => 163,  373 => 162,  370 => 161,  368 => 160,  364 => 158,  359 => 157,  350 => 150,  346 => 149,  342 => 147,  335 => 142,  333 => 141,  326 => 137,  322 => 135,  309 => 133,  305 => 132,  298 => 128,  294 => 127,  290 => 126,  286 => 125,  280 => 122,  276 => 121,  267 => 115,  263 => 114,  253 => 107,  244 => 101,  239 => 98,  236 => 96,  223 => 95,  125 => 6,  112 => 5,  89 => 3,  66 => 2,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'front/base.html.twig' %}
{% block title %}Mes Sous-Tâches{% endblock %}
{% block page_title %}Mes Sous-Tâches{% endblock %}

{% block extra_css %}
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

    .dur-pill {
        font-size: .75rem;
        color: #7E8DB1;
    }

    .time-pill {
        font-size: .75rem;
        color: #7E8DB1;
        font-style: italic;
    }

    .action-group { display: flex; gap: .4rem; flex-shrink: 0; }
</style>
{% endblock %}

{% block content %}

{# ── Counters ── #}
<div class=\"row g-3 mb-4\">
    <div class=\"col-6\">
        <div class=\"card text-center p-3\">
            <div style=\"font-size:1.8rem;font-weight:900;color:var(--primary,#2563eb);\">{{ totalSousTaches }}</div>
            <div class=\"text-muted small fw-bold mt-1\">Total sous-tâches</div>
        </div>
    </div>
    <div class=\"col-6\">
        <div class=\"card text-center p-3\">
            <div style=\"font-size:1.8rem;font-weight:900;color:#29CC7A;\">{{ nbTerminees }}</div>
            <div class=\"text-muted small fw-bold mt-1\">Terminées</div>
        </div>
    </div>
</div>

<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <span class=\"text-muted\">{{ sous_taches|length }} sous-tâche(s)</span>
    <a href=\"{{ path('app_sous_tache_new') }}\" class=\"btn btn-primary btn-sm\">
        <i class=\"bi bi-plus-lg me-1\"></i>Ajouter
    </a>
</div>

<div class=\"card mb-4 p-3\">
    <form method=\"GET\" action=\"{{ path('app_sous_tache_index') }}\" class=\"d-flex gap-2 flex-wrap align-items-end\">
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
        <a href=\"{{ path('app_sous_tache_index') }}\" class=\"btn btn-outline-secondary btn-sm\">Réinitialiser</a>
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
                    <a href=\"{{ path('app_sous_tache_show', {id: sous_tache.id}) }}\"
                       class=\"btn btn-xs btn-outline-info\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Voir\">
                        <i class=\"bi bi-eye\"></i>
                    </a>
                    <a href=\"{{ path('app_sous_tache_edit', {id: sous_tache.id}) }}\"
                       class=\"btn btn-xs btn-outline-secondary\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Modifier\">
                        <i class=\"bi bi-pencil\"></i>
                    </a>
                    <form method=\"post\" action=\"{{ path('app_sous_tache_delete', {id: sous_tache.id}) }}\"
                          onsubmit=\"return confirm('Supprimer cette sous-tâche ?')\">
                        <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
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
", "sous_tache/index.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/sous_tache/index.html.twig");
    }
}
