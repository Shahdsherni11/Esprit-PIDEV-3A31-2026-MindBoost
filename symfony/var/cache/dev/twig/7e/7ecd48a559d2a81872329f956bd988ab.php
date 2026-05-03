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

/* back/tache_focus/index.html.twig */
class __TwigTemplate_d18b258103e48f2eb8afd603817865d4 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/tache_focus/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/tache_focus/index.html.twig"));

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

        yield "Tâches Focus — Admin";
        
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

        yield "Tâches Focus";
        
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
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <span class=\"text-muted\">";
        // line 99
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tache_foci"]) || array_key_exists("tache_foci", $context) ? $context["tache_foci"] : (function () { throw new RuntimeError('Variable "tache_foci" does not exist.', 99, $this->source); })()), "getTotalItemCount", [], "any", false, false, false, 99), "html", null, true);
        yield " tâche(s) au total</span>
</div>

<div class=\"card mb-4 p-3\">
    <form method=\"GET\" action=\"";
        // line 103
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_tache_focus_index");
        yield "\" class=\"d-flex gap-2 flex-wrap align-items-end\">
        <input type=\"text\" name=\"search\" value=\"";
        // line 104
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 104, $this->source); })()), "html", null, true);
        yield "\" placeholder=\"Rechercher...\" class=\"form-control form-control-sm\" style=\"width:200px;\">
        <select name=\"statut\" class=\"form-select form-select-sm\" style=\"width:160px;\">
            <option value=\"\">Tous les statuts</option>
            <option value=\"En cours\"      ";
        // line 107
        yield ((((isset($context["statut"]) || array_key_exists("statut", $context) ? $context["statut"] : (function () { throw new RuntimeError('Variable "statut" does not exist.', 107, $this->source); })()) == "En cours")) ? ("selected") : (""));
        yield ">En cours</option>
            <option value=\"Non commencée\" ";
        // line 108
        yield ((((isset($context["statut"]) || array_key_exists("statut", $context) ? $context["statut"] : (function () { throw new RuntimeError('Variable "statut" does not exist.', 108, $this->source); })()) == "Non commencée")) ? ("selected") : (""));
        yield ">Non commencée</option>
            <option value=\"Terminée\"      ";
        // line 109
        yield ((((isset($context["statut"]) || array_key_exists("statut", $context) ? $context["statut"] : (function () { throw new RuntimeError('Variable "statut" does not exist.', 109, $this->source); })()) == "Terminée")) ? ("selected") : (""));
        yield ">Terminée</option>
        </select>
        <select name=\"tri\" class=\"form-select form-select-sm\" style=\"width:160px;\">
            <option value=\"id\"               ";
        // line 112
        yield ((((isset($context["tri"]) || array_key_exists("tri", $context) ? $context["tri"] : (function () { throw new RuntimeError('Variable "tri" does not exist.', 112, $this->source); })()) == "id")) ? ("selected") : (""));
        yield ">Trier par ID</option>
            <option value=\"titre\"            ";
        // line 113
        yield ((((isset($context["tri"]) || array_key_exists("tri", $context) ? $context["tri"] : (function () { throw new RuntimeError('Variable "tri" does not exist.', 113, $this->source); })()) == "titre")) ? ("selected") : (""));
        yield ">Titre</option>
            <option value=\"niveauDifficulte\" ";
        // line 114
        yield ((((isset($context["tri"]) || array_key_exists("tri", $context) ? $context["tri"] : (function () { throw new RuntimeError('Variable "tri" does not exist.', 114, $this->source); })()) == "niveauDifficulte")) ? ("selected") : (""));
        yield ">Difficulté</option>
            <option value=\"scoreProductivite\"";
        // line 115
        yield ((((isset($context["tri"]) || array_key_exists("tri", $context) ? $context["tri"] : (function () { throw new RuntimeError('Variable "tri" does not exist.', 115, $this->source); })()) == "scoreProductivite")) ? ("selected") : (""));
        yield ">Score</option>
        </select>
        <select name=\"ordre\" class=\"form-select form-select-sm\" style=\"width:130px;\">
            <option value=\"ASC\"  ";
        // line 118
        yield ((((isset($context["ordre"]) || array_key_exists("ordre", $context) ? $context["ordre"] : (function () { throw new RuntimeError('Variable "ordre" does not exist.', 118, $this->source); })()) == "ASC")) ? ("selected") : (""));
        yield ">↑ Croissant</option>
            <option value=\"DESC\" ";
        // line 119
        yield ((((isset($context["ordre"]) || array_key_exists("ordre", $context) ? $context["ordre"] : (function () { throw new RuntimeError('Variable "ordre" does not exist.', 119, $this->source); })()) == "DESC")) ? ("selected") : (""));
        yield ">↓ Décroissant</option>
        </select>
        <button type=\"submit\" class=\"btn btn-primary btn-sm\"><i class=\"bi bi-search me-1\"></i>Filtrer</button>
        <a href=\"";
        // line 122
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("back_tache_focus_index");
        yield "\" class=\"btn btn-outline-secondary btn-sm\">Réinitialiser</a>
    </form>
</div>

";
        // line 126
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["tache_foci"]) || array_key_exists("tache_foci", $context) ? $context["tache_foci"] : (function () { throw new RuntimeError('Variable "tache_foci" does not exist.', 126, $this->source); })())) == 0)) {
            // line 127
            yield "<div class=\"card p-5 text-center text-muted\">
    <i class=\"bi bi-inbox display-4\"></i>
    <p class=\"mt-2\">Aucune tâche trouvée.</p>
</div>
";
        } else {
            // line 132
            yield "<div class=\"card\">
    <div class=\"card-body p-0\">
        ";
            // line 134
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["tache_foci"]) || array_key_exists("tache_foci", $context) ? $context["tache_foci"] : (function () { throw new RuntimeError('Variable "tache_foci" does not exist.', 134, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["tache_focu"]) {
                // line 135
                yield "            <div class=\"tache-list-item\">
                <div class=\"tache-icon\">
                    <i class=\"bi bi-check2-square\"></i>
                </div>

                <div class=\"flex-grow-1 min-width-0\">
                    <div class=\"tache-title\">";
                // line 141
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "titre", [], "any", false, false, false, 141), "html", null, true);
                yield "</div>
                    <div class=\"tache-meta\">
                        ";
                // line 143
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "statut", [], "any", false, false, false, 143) == "Terminée")) {
                    // line 144
                    yield "                            <span class=\"status-pill status-done\"><i class=\"bi bi-check-circle-fill\"></i>Terminée</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 145
$context["tache_focu"], "statut", [], "any", false, false, false, 145) == "En cours")) {
                    // line 146
                    yield "                            <span class=\"status-pill status-ongoing\"><i class=\"bi bi-circle-fill\" style=\"font-size:.5rem;\"></i>En cours</span>
                        ";
                } else {
                    // line 148
                    yield "                            <span class=\"status-pill status-pending\"><i class=\"bi bi-circle\"></i>Non commencée</span>
                        ";
                }
                // line 150
                yield "                        <span class=\"diff-pill\">Niv. ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "niveauDifficulte", [], "any", false, false, false, 150), "html", null, true);
                yield "</span>
                        <span class=\"score-pill ";
                // line 151
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "scoreProductivite", [], "any", false, false, false, 151) >= 75)) {
                    yield "score-good";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "scoreProductivite", [], "any", false, false, false, 151) >= 50)) {
                    yield "score-mid";
                } else {
                    yield "score-low";
                }
                yield "\">
                            <i class=\"bi bi-speedometer2 me-1\"></i>";
                // line 152
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "scoreProductivite", [], "any", false, false, false, 152), "html", null, true);
                yield "%
                        </span>
                        ";
                // line 154
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "heureDebut", [], "any", false, false, false, 154)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 155
                    yield "                            <span class=\"time-pill\"><i class=\"bi bi-clock me-1\"></i>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "heureDebut", [], "any", false, false, false, 155), "H:i"), "html", null, true);
                    yield " → ";
                    yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "heureFin", [], "any", false, false, false, 155)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "heureFin", [], "any", false, false, false, 155), "H:i"), "html", null, true)) : ("?"));
                    yield "</span>
                        ";
                }
                // line 157
                yield "                        ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "objectifPrincipal", [], "any", false, false, false, 157)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 158
                    yield "                            <span class=\"obj-text\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "objectifPrincipal", [], "any", false, false, false, 158), 0, 60), "html", null, true);
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "objectifPrincipal", [], "any", false, false, false, 158)) > 60)) {
                        yield "…";
                    }
                    yield "</span>
                        ";
                }
                // line 160
                yield "                    </div>
                </div>

                <div class=\"action-group\">
                    <a href=\"";
                // line 164
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tache_focus_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "id", [], "any", false, false, false, 164)]), "html", null, true);
                yield "\"
                       class=\"btn btn-xs btn-outline-secondary\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Modifier\">
                        <i class=\"bi bi-pencil\"></i>
                    </a>
                    <form method=\"post\" action=\"";
                // line 169
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tache_focus_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "id", [], "any", false, false, false, 169)]), "html", null, true);
                yield "\"
                          onsubmit=\"return confirm('Supprimer cette tâche ?')\">
                        <input type=\"hidden\" name=\"_token\" value=\"";
                // line 171
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["tache_focu"], "id", [], "any", false, false, false, 171))), "html", null, true);
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
            // line 180
            yield "    </div>
</div>
";
        }
        // line 183
        yield "
<div class=\"mt-4 d-flex justify-content-center\">
    ";
        // line 185
        yield $this->env->getRuntime('Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationRuntime')->render($this->env, (isset($context["tache_foci"]) || array_key_exists("tache_foci", $context) ? $context["tache_foci"] : (function () { throw new RuntimeError('Variable "tache_foci" does not exist.', 185, $this->source); })()));
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
        return "back/tache_focus/index.html.twig";
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
        return array (  437 => 185,  433 => 183,  428 => 180,  413 => 171,  408 => 169,  400 => 164,  394 => 160,  385 => 158,  382 => 157,  374 => 155,  372 => 154,  367 => 152,  357 => 151,  352 => 150,  348 => 148,  344 => 146,  342 => 145,  339 => 144,  337 => 143,  332 => 141,  324 => 135,  320 => 134,  316 => 132,  309 => 127,  307 => 126,  300 => 122,  294 => 119,  290 => 118,  284 => 115,  280 => 114,  276 => 113,  272 => 112,  266 => 109,  262 => 108,  258 => 107,  252 => 104,  248 => 103,  241 => 99,  237 => 97,  224 => 96,  125 => 6,  112 => 5,  89 => 3,  66 => 2,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}
{% block title %}Tâches Focus — Admin{% endblock %}
{% block page_title %}Tâches Focus{% endblock %}

{% block stylesheets %}
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

<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <span class=\"text-muted\">{{ tache_foci.getTotalItemCount }} tâche(s) au total</span>
</div>

<div class=\"card mb-4 p-3\">
    <form method=\"GET\" action=\"{{ path('back_tache_focus_index') }}\" class=\"d-flex gap-2 flex-wrap align-items-end\">
        <input type=\"text\" name=\"search\" value=\"{{ search }}\" placeholder=\"Rechercher...\" class=\"form-control form-control-sm\" style=\"width:200px;\">
        <select name=\"statut\" class=\"form-select form-select-sm\" style=\"width:160px;\">
            <option value=\"\">Tous les statuts</option>
            <option value=\"En cours\"      {{ statut == 'En cours'      ? 'selected' : '' }}>En cours</option>
            <option value=\"Non commencée\" {{ statut == 'Non commencée' ? 'selected' : '' }}>Non commencée</option>
            <option value=\"Terminée\"      {{ statut == 'Terminée'      ? 'selected' : '' }}>Terminée</option>
        </select>
        <select name=\"tri\" class=\"form-select form-select-sm\" style=\"width:160px;\">
            <option value=\"id\"               {{ tri == 'id'               ? 'selected' : '' }}>Trier par ID</option>
            <option value=\"titre\"            {{ tri == 'titre'            ? 'selected' : '' }}>Titre</option>
            <option value=\"niveauDifficulte\" {{ tri == 'niveauDifficulte' ? 'selected' : '' }}>Difficulté</option>
            <option value=\"scoreProductivite\"{{ tri == 'scoreProductivite'? 'selected' : '' }}>Score</option>
        </select>
        <select name=\"ordre\" class=\"form-select form-select-sm\" style=\"width:130px;\">
            <option value=\"ASC\"  {{ ordre == 'ASC'  ? 'selected' : '' }}>↑ Croissant</option>
            <option value=\"DESC\" {{ ordre == 'DESC' ? 'selected' : '' }}>↓ Décroissant</option>
        </select>
        <button type=\"submit\" class=\"btn btn-primary btn-sm\"><i class=\"bi bi-search me-1\"></i>Filtrer</button>
        <a href=\"{{ path('back_tache_focus_index') }}\" class=\"btn btn-outline-secondary btn-sm\">Réinitialiser</a>
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
                    <a href=\"{{ path('app_tache_focus_edit', {id: tache_focu.id}) }}\"
                       class=\"btn btn-xs btn-outline-secondary\"
                       style=\"font-size:.75rem;padding:3px 9px;\" title=\"Modifier\">
                        <i class=\"bi bi-pencil\"></i>
                    </a>
                    <form method=\"post\" action=\"{{ path('app_tache_focus_delete', {id: tache_focu.id}) }}\"
                          onsubmit=\"return confirm('Supprimer cette tâche ?')\">
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
", "back/tache_focus/index.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/back/tache_focus/index.html.twig");
    }
}
