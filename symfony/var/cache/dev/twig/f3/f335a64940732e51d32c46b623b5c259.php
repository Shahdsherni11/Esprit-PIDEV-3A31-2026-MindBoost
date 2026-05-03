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

/* tache_focus/index.html.twig */
class __TwigTemplate_b624086f997648fdd51f03e988b1b15b extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "tache_focus/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "tache_focus/index.html.twig"));

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

        yield "Mes Tâches Focus";
        
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

        yield "Mes Tâches Focus";
        
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
    .tache-list-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 1.25rem;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        transition: background .2s;
    }
    .tache-list-item:last-child { border-bottom: none; }
    .tache-list-item:hover { background: rgba(255,255,255,0.03); }

    .tache-icon {
        width: 42px;
        height: 42px;
        border-radius: 13px;
        background: linear-gradient(135deg, #6C63FF, #4D83FF);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        color: white;
        flex-shrink: 0;
    }

    .tache-title {
        font-weight: 700;
        font-size: .95rem;
        color: var(--text-main, #F4F7FC);
    }

    .tache-meta {
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
    .status-pending { background: rgba(255,255,255,0.08); color: #AAB6D3; }

    .diff-pill {
        background: rgba(255,255,255,0.07);
        color: #AAB6D3;
        border-radius: 999px;
        padding: .2rem .55rem;
        font-size: .75rem;
        font-weight: 700;
    }

    .score-pill {
        border-radius: 999px;
        padding: .2rem .55rem;
        font-size: .75rem;
        font-weight: 700;
    }
    .score-good { background: rgba(41,204,122,0.18); color: #29CC7A; }
    .score-mid  { background: rgba(247,184,75,0.18);  color: #F7B84B; }
    .score-low  { background: rgba(255,90,116,0.18);  color: #FF5A74; }

    .time-pill {
        font-size: .75rem;
        color: #7E8DB1;
        font-style: italic;
    }

    .obj-text {
        font-size: .78rem;
        color: #7E8DB1;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 280px;
    }

    .action-group { display: flex; gap: .4rem; flex-shrink: 0; }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 96
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

        // line 97
        yield "
";
        // line 98
        if (array_key_exists("citation", $context)) {
            // line 99
            yield "<div class=\"mb-4\" style=\"background:rgba(108,99,255,0.12);border-left:3px solid #6C63FF;color:#E8E8F0;border-radius:0 12px 12px 0;padding:.75rem 1rem;\">
    <p style=\"font-style:italic;margin:0;\">💬 \"";
            // line 100
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["citation"]) || array_key_exists("citation", $context) ? $context["citation"] : (function () { throw new RuntimeError('Variable "citation" does not exist.', 100, $this->source); })()), "q", [], "any", false, false, false, 100), "html", null, true);
            yield "\"</p>
    <p style=\"font-weight:700;margin:5px 0 0;color:#9A8CFF;\">— ";
            // line 101
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["citation"]) || array_key_exists("citation", $context) ? $context["citation"] : (function () { throw new RuntimeError('Variable "citation" does not exist.', 101, $this->source); })()), "a", [], "any", false, false, false, 101), "html", null, true);
            yield "</p>
</div>
";
        }
        // line 104
        yield "
";
        // line 106
        yield "<div class=\"row g-3 mb-4\">
    <div class=\"col-4\">
        <div class=\"card text-center p-3\">
            <div style=\"font-size:1.8rem;font-weight:900;color:var(--primary,#2563eb);\">";
        // line 109
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalTaches"]) || array_key_exists("totalTaches", $context) ? $context["totalTaches"] : (function () { throw new RuntimeError('Variable "totalTaches" does not exist.', 109, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"text-muted small fw-bold mt-1\">Total tâches</div>
        </div>
    </div>
    <div class=\"col-4\">
        <div class=\"card text-center p-3\">
            <div style=\"font-size:1.8rem;font-weight:900;color:#29CC7A;\">";
        // line 115
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nbTerminees"]) || array_key_exists("nbTerminees", $context) ? $context["nbTerminees"] : (function () { throw new RuntimeError('Variable "nbTerminees" does not exist.', 115, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"text-muted small fw-bold mt-1\">Terminées</div>
        </div>
    </div>
    <div class=\"col-4\">
        <div class=\"card text-center p-3\">
            <div style=\"font-size:1.8rem;font-weight:900;color:#F7B84B;\">";
        // line 121
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["scoreMoyen"]) || array_key_exists("scoreMoyen", $context) ? $context["scoreMoyen"] : (function () { throw new RuntimeError('Variable "scoreMoyen" does not exist.', 121, $this->source); })()), "html", null, true);
        yield "%</div>
            <div class=\"text-muted small fw-bold mt-1\">Score moyen</div>
        </div>
    </div>
</div>

<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <span class=\"text-muted\">";
        // line 128
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tache_foci"]) || array_key_exists("tache_foci", $context) ? $context["tache_foci"] : (function () { throw new RuntimeError('Variable "tache_foci" does not exist.', 128, $this->source); })()), "getTotalItemCount", [], "any", false, false, false, 128), "html", null, true);
        yield " tâche(s) au total</span>
    <a href=\"";
        // line 129
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tache_focus_new");
        yield "\" class=\"btn btn-primary btn-sm\">
        <i class=\"bi bi-plus-lg me-1\"></i>Nouvelle Tâche
    </a>
</div>

<div class=\"card mb-4 p-3\">
    <form method=\"GET\" action=\"";
        // line 135
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tache_focus_index");
        yield "\" class=\"d-flex gap-2 flex-wrap align-items-end\">
        <input type=\"text\" name=\"search\" value=\"";
        // line 136
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 136, $this->source); })()), "html", null, true);
        yield "\" placeholder=\"Rechercher...\" class=\"form-control form-control-sm\" style=\"width:200px;\">
        <select name=\"statut\" class=\"form-select form-select-sm\" style=\"width:160px;\">
            <option value=\"\">Tous les statuts</option>
            <option value=\"En cours\"      ";
        // line 139
        yield ((((isset($context["statut"]) || array_key_exists("statut", $context) ? $context["statut"] : (function () { throw new RuntimeError('Variable "statut" does not exist.', 139, $this->source); })()) == "En cours")) ? ("selected") : (""));
        yield ">En cours</option>
            <option value=\"Non commencée\" ";
        // line 140
        yield ((((isset($context["statut"]) || array_key_exists("statut", $context) ? $context["statut"] : (function () { throw new RuntimeError('Variable "statut" does not exist.', 140, $this->source); })()) == "Non commencée")) ? ("selected") : (""));
        yield ">Non commencée</option>
            <option value=\"Terminée\"      ";
        // line 141
        yield ((((isset($context["statut"]) || array_key_exists("statut", $context) ? $context["statut"] : (function () { throw new RuntimeError('Variable "statut" does not exist.', 141, $this->source); })()) == "Terminée")) ? ("selected") : (""));
        yield ">Terminée</option>
        </select>
        <select name=\"tri\" class=\"form-select form-select-sm\" style=\"width:160px;\">
            <option value=\"id\"              ";
        // line 144
        yield ((((isset($context["tri"]) || array_key_exists("tri", $context) ? $context["tri"] : (function () { throw new RuntimeError('Variable "tri" does not exist.', 144, $this->source); })()) == "id")) ? ("selected") : (""));
        yield ">Trier par ID</option>
            <option value=\"titre\"           ";
        // line 145
        yield ((((isset($context["tri"]) || array_key_exists("tri", $context) ? $context["tri"] : (function () { throw new RuntimeError('Variable "tri" does not exist.', 145, $this->source); })()) == "titre")) ? ("selected") : (""));
        yield ">Titre</option>
            <option value=\"niveauDifficulte\"";
        // line 146
        yield ((((isset($context["tri"]) || array_key_exists("tri", $context) ? $context["tri"] : (function () { throw new RuntimeError('Variable "tri" does not exist.', 146, $this->source); })()) == "niveauDifficulte")) ? ("selected") : (""));
        yield ">Difficulté</option>
            <option value=\"scoreProductivite\"";
        // line 147
        yield ((((isset($context["tri"]) || array_key_exists("tri", $context) ? $context["tri"] : (function () { throw new RuntimeError('Variable "tri" does not exist.', 147, $this->source); })()) == "scoreProductivite")) ? ("selected") : (""));
        yield ">Score</option>
        </select>
        <select name=\"ordre\" class=\"form-select form-select-sm\" style=\"width:130px;\">
            <option value=\"ASC\"  ";
        // line 150
        yield ((((isset($context["ordre"]) || array_key_exists("ordre", $context) ? $context["ordre"] : (function () { throw new RuntimeError('Variable "ordre" does not exist.', 150, $this->source); })()) == "ASC")) ? ("selected") : (""));
        yield ">↑ Croissant</option>
            <option value=\"DESC\" ";
        // line 151
        yield ((((isset($context["ordre"]) || array_key_exists("ordre", $context) ? $context["ordre"] : (function () { throw new RuntimeError('Variable "ordre" does not exist.', 151, $this->source); })()) == "DESC")) ? ("selected") : (""));
        yield ">↓ Décroissant</option>
        </select>
        <button type=\"submit\" class=\"btn btn-primary btn-sm\"><i class=\"bi bi-search me-1\"></i>Filtrer</button>
        <a href=\"";
        // line 154
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tache_focus_index");
        yield "\" class=\"btn btn-outline-secondary btn-sm\">Réinitialiser</a>
    </form>
</div>

";
        // line 158
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["tache_foci"]) || array_key_exists("tache_foci", $context) ? $context["tache_foci"] : (function () { throw new RuntimeError('Variable "tache_foci" does not exist.', 158, $this->source); })())) == 0)) {
            // line 159
            yield "<div class=\"card p-5 text-center text-muted\">
    <i class=\"bi bi-inbox display-4\"></i>
    <p class=\"mt-2\">Aucune tâche trouvée.</p>
</div>
";
        } else {
            // line 164
            yield "<div class=\"card\">
    <div class=\"card-body p-0\">
        ";
            // line 166
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["tache_foci"]) || array_key_exists("tache_foci", $context) ? $context["tache_foci"] : (function () { throw new RuntimeError('Variable "tache_foci" does not exist.', 166, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["tache_focu"]) {
                // line 167
                yield "            <div class=\"tache-list-item\">
                <div class=\"tache-icon\">
                    <i class=\"bi bi-check2-square\"></i>
                </div>

                <div class=\"flex-grow-1 min-width-0\">
                    <div class=\"tache-title\">";
                // line 173
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "titre", [], "any", false, false, false, 173), "html", null, true);
                yield "</div>
                    <div class=\"tache-meta\">
                        ";
                // line 175
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "statut", [], "any", false, false, false, 175) == "Terminée")) {
                    // line 176
                    yield "                            <span class=\"status-pill status-done\"><i class=\"bi bi-check-circle-fill\"></i>Terminée</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 177
$context["tache_focu"], "statut", [], "any", false, false, false, 177) == "En cours")) {
                    // line 178
                    yield "                            <span class=\"status-pill status-ongoing\"><i class=\"bi bi-circle-fill\" style=\"font-size:.5rem;\"></i>En cours</span>
                        ";
                } else {
                    // line 180
                    yield "                            <span class=\"status-pill status-pending\"><i class=\"bi bi-circle\"></i>Non commencée</span>
                        ";
                }
                // line 182
                yield "                        <span class=\"diff-pill\">Niv. ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "niveauDifficulte", [], "any", false, false, false, 182), "html", null, true);
                yield "</span>
                        <span class=\"score-pill ";
                // line 183
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "scoreProductivite", [], "any", false, false, false, 183) >= 75)) {
                    yield "score-good";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "scoreProductivite", [], "any", false, false, false, 183) >= 50)) {
                    yield "score-mid";
                } else {
                    yield "score-low";
                }
                yield "\">
                            <i class=\"bi bi-speedometer2 me-1\"></i>";
                // line 184
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "scoreProductivite", [], "any", false, false, false, 184), "html", null, true);
                yield "%
                        </span>
                        ";
                // line 186
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "heureDebut", [], "any", false, false, false, 186)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 187
                    yield "                            <span class=\"time-pill\"><i class=\"bi bi-clock me-1\"></i>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "heureDebut", [], "any", false, false, false, 187), "H:i"), "html", null, true);
                    yield " → ";
                    yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "heureFin", [], "any", false, false, false, 187)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "heureFin", [], "any", false, false, false, 187), "H:i"), "html", null, true)) : ("?"));
                    yield "</span>
                        ";
                }
                // line 189
                yield "                        ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "objectifPrincipal", [], "any", false, false, false, 189)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 190
                    yield "                            <span class=\"obj-text\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "objectifPrincipal", [], "any", false, false, false, 190), 0, 60), "html", null, true);
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "objectifPrincipal", [], "any", false, false, false, 190)) > 60)) {
                        yield "…";
                    }
                    yield "</span>
                        ";
                }
                // line 192
                yield "                    </div>
                </div>

                <div class=\"action-group\">
                    <a href=\"";
                // line 196
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tache_focus_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "id", [], "any", false, false, false, 196)]), "html", null, true);
                yield "\"
                       class=\"btn btn-xs btn-outline-info\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Voir\">
                        <i class=\"bi bi-eye\"></i>
                    </a>
                    <a href=\"";
                // line 201
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tache_focus_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "id", [], "any", false, false, false, 201)]), "html", null, true);
                yield "\"
                       class=\"btn btn-xs btn-outline-secondary\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Modifier\">
                        <i class=\"bi bi-pencil\"></i>
                    </a>
                    <form method=\"post\" action=\"";
                // line 206
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tache_focus_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "id", [], "any", false, false, false, 206)]), "html", null, true);
                yield "\"
                          onsubmit=\"return confirm('Supprimer cette tâche ?')\">
                        <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
                        <input type=\"hidden\" name=\"_token\" value=\"";
                // line 209
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "id", [], "any", false, false, false, 209))), "html", null, true);
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
            unset($context['_seq'], $context['_key'], $context['tache_focu'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 218
            yield "    </div>
</div>
";
        }
        // line 221
        yield "
<div class=\"mt-4 d-flex justify-content-center\">
    ";
        // line 223
        yield $this->env->getRuntime('Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationRuntime')->render($this->env, (isset($context["tache_foci"]) || array_key_exists("tache_foci", $context) ? $context["tache_foci"] : (function () { throw new RuntimeError('Variable "tache_foci" does not exist.', 223, $this->source); })()));
        yield "
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
        return "tache_focus/index.html.twig";
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
        return array (  502 => 223,  498 => 221,  493 => 218,  478 => 209,  472 => 206,  464 => 201,  456 => 196,  450 => 192,  441 => 190,  438 => 189,  430 => 187,  428 => 186,  423 => 184,  413 => 183,  408 => 182,  404 => 180,  400 => 178,  398 => 177,  395 => 176,  393 => 175,  388 => 173,  380 => 167,  376 => 166,  372 => 164,  365 => 159,  363 => 158,  356 => 154,  350 => 151,  346 => 150,  340 => 147,  336 => 146,  332 => 145,  328 => 144,  322 => 141,  318 => 140,  314 => 139,  308 => 136,  304 => 135,  295 => 129,  291 => 128,  281 => 121,  272 => 115,  263 => 109,  258 => 106,  255 => 104,  249 => 101,  245 => 100,  242 => 99,  240 => 98,  237 => 97,  224 => 96,  125 => 6,  112 => 5,  89 => 3,  66 => 2,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'front/base.html.twig' %}
{% block title %}Mes Tâches Focus{% endblock %}
{% block page_title %}Mes Tâches Focus{% endblock %}

{% block extra_css %}
<style>
    .tache-list-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 1.25rem;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        transition: background .2s;
    }
    .tache-list-item:last-child { border-bottom: none; }
    .tache-list-item:hover { background: rgba(255,255,255,0.03); }

    .tache-icon {
        width: 42px;
        height: 42px;
        border-radius: 13px;
        background: linear-gradient(135deg, #6C63FF, #4D83FF);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        color: white;
        flex-shrink: 0;
    }

    .tache-title {
        font-weight: 700;
        font-size: .95rem;
        color: var(--text-main, #F4F7FC);
    }

    .tache-meta {
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
    .status-pending { background: rgba(255,255,255,0.08); color: #AAB6D3; }

    .diff-pill {
        background: rgba(255,255,255,0.07);
        color: #AAB6D3;
        border-radius: 999px;
        padding: .2rem .55rem;
        font-size: .75rem;
        font-weight: 700;
    }

    .score-pill {
        border-radius: 999px;
        padding: .2rem .55rem;
        font-size: .75rem;
        font-weight: 700;
    }
    .score-good { background: rgba(41,204,122,0.18); color: #29CC7A; }
    .score-mid  { background: rgba(247,184,75,0.18);  color: #F7B84B; }
    .score-low  { background: rgba(255,90,116,0.18);  color: #FF5A74; }

    .time-pill {
        font-size: .75rem;
        color: #7E8DB1;
        font-style: italic;
    }

    .obj-text {
        font-size: .78rem;
        color: #7E8DB1;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 280px;
    }

    .action-group { display: flex; gap: .4rem; flex-shrink: 0; }
</style>
{% endblock %}

{% block content %}

{% if citation is defined %}
<div class=\"mb-4\" style=\"background:rgba(108,99,255,0.12);border-left:3px solid #6C63FF;color:#E8E8F0;border-radius:0 12px 12px 0;padding:.75rem 1rem;\">
    <p style=\"font-style:italic;margin:0;\">💬 \"{{ citation.q }}\"</p>
    <p style=\"font-weight:700;margin:5px 0 0;color:#9A8CFF;\">— {{ citation.a }}</p>
</div>
{% endif %}

{# ── Counters ── #}
<div class=\"row g-3 mb-4\">
    <div class=\"col-4\">
        <div class=\"card text-center p-3\">
            <div style=\"font-size:1.8rem;font-weight:900;color:var(--primary,#2563eb);\">{{ totalTaches }}</div>
            <div class=\"text-muted small fw-bold mt-1\">Total tâches</div>
        </div>
    </div>
    <div class=\"col-4\">
        <div class=\"card text-center p-3\">
            <div style=\"font-size:1.8rem;font-weight:900;color:#29CC7A;\">{{ nbTerminees }}</div>
            <div class=\"text-muted small fw-bold mt-1\">Terminées</div>
        </div>
    </div>
    <div class=\"col-4\">
        <div class=\"card text-center p-3\">
            <div style=\"font-size:1.8rem;font-weight:900;color:#F7B84B;\">{{ scoreMoyen }}%</div>
            <div class=\"text-muted small fw-bold mt-1\">Score moyen</div>
        </div>
    </div>
</div>

<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <span class=\"text-muted\">{{ tache_foci.getTotalItemCount }} tâche(s) au total</span>
    <a href=\"{{ path('app_tache_focus_new') }}\" class=\"btn btn-primary btn-sm\">
        <i class=\"bi bi-plus-lg me-1\"></i>Nouvelle Tâche
    </a>
</div>

<div class=\"card mb-4 p-3\">
    <form method=\"GET\" action=\"{{ path('app_tache_focus_index') }}\" class=\"d-flex gap-2 flex-wrap align-items-end\">
        <input type=\"text\" name=\"search\" value=\"{{ search }}\" placeholder=\"Rechercher...\" class=\"form-control form-control-sm\" style=\"width:200px;\">
        <select name=\"statut\" class=\"form-select form-select-sm\" style=\"width:160px;\">
            <option value=\"\">Tous les statuts</option>
            <option value=\"En cours\"      {{ statut == 'En cours'      ? 'selected' : '' }}>En cours</option>
            <option value=\"Non commencée\" {{ statut == 'Non commencée' ? 'selected' : '' }}>Non commencée</option>
            <option value=\"Terminée\"      {{ statut == 'Terminée'      ? 'selected' : '' }}>Terminée</option>
        </select>
        <select name=\"tri\" class=\"form-select form-select-sm\" style=\"width:160px;\">
            <option value=\"id\"              {{ tri == 'id'              ? 'selected' : '' }}>Trier par ID</option>
            <option value=\"titre\"           {{ tri == 'titre'           ? 'selected' : '' }}>Titre</option>
            <option value=\"niveauDifficulte\"{{ tri == 'niveauDifficulte'? 'selected' : '' }}>Difficulté</option>
            <option value=\"scoreProductivite\"{{ tri == 'scoreProductivite'? 'selected' : '' }}>Score</option>
        </select>
        <select name=\"ordre\" class=\"form-select form-select-sm\" style=\"width:130px;\">
            <option value=\"ASC\"  {{ ordre == 'ASC'  ? 'selected' : '' }}>↑ Croissant</option>
            <option value=\"DESC\" {{ ordre == 'DESC' ? 'selected' : '' }}>↓ Décroissant</option>
        </select>
        <button type=\"submit\" class=\"btn btn-primary btn-sm\"><i class=\"bi bi-search me-1\"></i>Filtrer</button>
        <a href=\"{{ path('app_tache_focus_index') }}\" class=\"btn btn-outline-secondary btn-sm\">Réinitialiser</a>
    </form>
</div>

{% if tache_foci|length == 0 %}
<div class=\"card p-5 text-center text-muted\">
    <i class=\"bi bi-inbox display-4\"></i>
    <p class=\"mt-2\">Aucune tâche trouvée.</p>
</div>
{% else %}
<div class=\"card\">
    <div class=\"card-body p-0\">
        {% for tache_focu in tache_foci %}
            <div class=\"tache-list-item\">
                <div class=\"tache-icon\">
                    <i class=\"bi bi-check2-square\"></i>
                </div>

                <div class=\"flex-grow-1 min-width-0\">
                    <div class=\"tache-title\">{{ tache_focu.titre }}</div>
                    <div class=\"tache-meta\">
                        {% if tache_focu.statut == 'Terminée' %}
                            <span class=\"status-pill status-done\"><i class=\"bi bi-check-circle-fill\"></i>Terminée</span>
                        {% elseif tache_focu.statut == 'En cours' %}
                            <span class=\"status-pill status-ongoing\"><i class=\"bi bi-circle-fill\" style=\"font-size:.5rem;\"></i>En cours</span>
                        {% else %}
                            <span class=\"status-pill status-pending\"><i class=\"bi bi-circle\"></i>Non commencée</span>
                        {% endif %}
                        <span class=\"diff-pill\">Niv. {{ tache_focu.niveauDifficulte }}</span>
                        <span class=\"score-pill {% if tache_focu.scoreProductivite >= 75 %}score-good{% elseif tache_focu.scoreProductivite >= 50 %}score-mid{% else %}score-low{% endif %}\">
                            <i class=\"bi bi-speedometer2 me-1\"></i>{{ tache_focu.scoreProductivite }}%
                        </span>
                        {% if tache_focu.heureDebut %}
                            <span class=\"time-pill\"><i class=\"bi bi-clock me-1\"></i>{{ tache_focu.heureDebut|date('H:i') }} → {{ tache_focu.heureFin ? tache_focu.heureFin|date('H:i') : '?' }}</span>
                        {% endif %}
                        {% if tache_focu.objectifPrincipal %}
                            <span class=\"obj-text\">{{ tache_focu.objectifPrincipal|slice(0,60) }}{% if tache_focu.objectifPrincipal|length > 60 %}…{% endif %}</span>
                        {% endif %}
                    </div>
                </div>

                <div class=\"action-group\">
                    <a href=\"{{ path('app_tache_focus_show', {id: tache_focu.id}) }}\"
                       class=\"btn btn-xs btn-outline-info\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Voir\">
                        <i class=\"bi bi-eye\"></i>
                    </a>
                    <a href=\"{{ path('app_tache_focus_edit', {id: tache_focu.id}) }}\"
                       class=\"btn btn-xs btn-outline-secondary\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Modifier\">
                        <i class=\"bi bi-pencil\"></i>
                    </a>
                    <form method=\"post\" action=\"{{ path('app_tache_focus_delete', {id: tache_focu.id}) }}\"
                          onsubmit=\"return confirm('Supprimer cette tâche ?')\">
                        <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ tache_focu.id) }}\">
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

<div class=\"mt-4 d-flex justify-content-center\">
    {{ knp_pagination_render(tache_foci) }}
</div>

{% endblock %}
", "tache_focus/index.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/tache_focus/index.html.twig");
    }
}
