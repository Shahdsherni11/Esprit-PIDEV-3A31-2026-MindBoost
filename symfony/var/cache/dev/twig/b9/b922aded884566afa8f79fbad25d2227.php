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

/* tache_focus/nex.html.twig */
class __TwigTemplate_75cd5b48dfbc360c149a08c4d333b81d extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "tache_focus/nex.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "tache_focus/nex.html.twig"));

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

        yield "Detail Tache Focus";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "    <div class=\"d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4\">
        <div>
            <h1 class=\"page-title mb-2\">";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tache_focu"]) || array_key_exists("tache_focu", $context) ? $context["tache_focu"] : (function () { throw new RuntimeError('Variable "tache_focu" does not exist.', 8, $this->source); })()), "titre", [], "any", false, false, false, 8), "html", null, true);
        yield "</h1>
            <p class=\"page-subtitle mb-0\">Vue detaillee, aide IA et outils de focus</p>
        </div>
        <div class=\"d-flex gap-2 flex-wrap\">
            <a href=\"";
        // line 12
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tache_focus_index");
        yield "\" class=\"btn btn-secondary\">Retour liste</a>
            <a href=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tache_focus_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["tache_focu"]) || array_key_exists("tache_focu", $context) ? $context["tache_focu"] : (function () { throw new RuntimeError('Variable "tache_focu" does not exist.', 13, $this->source); })()), "id", [], "any", false, false, false, 13)]), "html", null, true);
        yield "\" class=\"btn btn-warning\">Modifier</a>
        </div>
    </div>

    <div class=\"card mb-4\">
        <div class=\"card-header\">
            <strong>Resume de la tache</strong>
        </div>
        <div class=\"card-body\">
            <div class=\"row g-3\">
                <div class=\"col-md-6\">
                    <div class=\"p-3 rounded\" style=\"background: #f0f5ff; border: 1px solid #dbe7ff;\">
                        <div style=\"color: #6c7b95; font-size: 13px; font-weight: 600; margin-bottom: .25rem;\">Objectif</div>
                        <div style=\"color: #17253a; font-weight: 600;\">";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tache_focu"]) || array_key_exists("tache_focu", $context) ? $context["tache_focu"] : (function () { throw new RuntimeError('Variable "tache_focu" does not exist.', 26, $this->source); })()), "objectifPrincipal", [], "any", false, false, false, 26), "html", null, true);
        yield "</div>
                    </div>
                </div>
                <div class=\"col-md-3\">
                    <div class=\"p-3 rounded text-center\" style=\"background: #ede8ff; border: 1px solid #c9c0f5;\">
                        <div style=\"color: #6c7b95; font-size: 13px; font-weight: 600; margin-bottom: .25rem;\">Difficulté</div>
                        <div style=\"color: #4c3fb5; font-size: 24px; font-weight: 700;\">";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tache_focu"]) || array_key_exists("tache_focu", $context) ? $context["tache_focu"] : (function () { throw new RuntimeError('Variable "tache_focu" does not exist.', 32, $this->source); })()), "niveauDifficulte", [], "any", false, false, false, 32), "html", null, true);
        yield "</div>
                    </div>
                </div>
                <div class=\"col-md-3\">
                    <div class=\"p-3 rounded text-center\" style=\"background: #e0faf8; border: 1px solid #9ee6e0;\">
                        <div style=\"color: #6c7b95; font-size: 13px; font-weight: 600; margin-bottom: .25rem;\">Score</div>
                        <div style=\"color: #0e7c77; font-size: 24px; font-weight: 700;\">";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tache_focu"]) || array_key_exists("tache_focu", $context) ? $context["tache_focu"] : (function () { throw new RuntimeError('Variable "tache_focu" does not exist.', 38, $this->source); })()), "scoreProductivite", [], "any", false, false, false, 38), "html", null, true);
        yield "%</div>
                    </div>
                </div>
                <div class=\"col-md-4\">
                    <div class=\"p-3 rounded\" style=\"background: #f0f5ff; border: 1px solid #dbe7ff;\">
                        <div style=\"color: #6c7b95; font-size: 13px; font-weight: 600; margin-bottom: .25rem;\">Statut</div>
                        <div style=\"color: #17253a; font-weight: 600;\">";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tache_focu"]) || array_key_exists("tache_focu", $context) ? $context["tache_focu"] : (function () { throw new RuntimeError('Variable "tache_focu" does not exist.', 44, $this->source); })()), "statut", [], "any", false, false, false, 44), "html", null, true);
        yield "</div>
                    </div>
                </div>
                <div class=\"col-md-4\">
                    <div class=\"p-3 rounded\" style=\"background: #f0f5ff; border: 1px solid #dbe7ff;\">
                        <div style=\"color: #6c7b95; font-size: 13px; font-weight: 600; margin-bottom: .25rem;\">Heure début</div>
                        <div style=\"color: #17253a; font-weight: 600;\">";
        // line 50
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["tache_focu"]) || array_key_exists("tache_focu", $context) ? $context["tache_focu"] : (function () { throw new RuntimeError('Variable "tache_focu" does not exist.', 50, $this->source); })()), "heureDebut", [], "any", false, false, false, 50)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tache_focu"]) || array_key_exists("tache_focu", $context) ? $context["tache_focu"] : (function () { throw new RuntimeError('Variable "tache_focu" does not exist.', 50, $this->source); })()), "heureDebut", [], "any", false, false, false, 50), "H:i"), "html", null, true)) : ("-"));
        yield "</div>
                    </div>
                </div>
                <div class=\"col-md-4\">
                    <div class=\"p-3 rounded\" style=\"background: #f0f5ff; border: 1px solid #dbe7ff;\">
                        <div style=\"color: #6c7b95; font-size: 13px; font-weight: 600; margin-bottom: .25rem;\">Heure fin</div>
                        <div style=\"color: #17253a; font-weight: 600;\">";
        // line 56
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["tache_focu"]) || array_key_exists("tache_focu", $context) ? $context["tache_focu"] : (function () { throw new RuntimeError('Variable "tache_focu" does not exist.', 56, $this->source); })()), "heureFin", [], "any", false, false, false, 56)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tache_focu"]) || array_key_exists("tache_focu", $context) ? $context["tache_focu"] : (function () { throw new RuntimeError('Variable "tache_focu" does not exist.', 56, $this->source); })()), "heureFin", [], "any", false, false, false, 56), "H:i"), "html", null, true)) : ("-"));
        yield "</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"card mb-4\">
        <div class=\"card-header\">
            <strong>Actions intelligentes</strong>
        </div>
        <div class=\"card-body\">
            <div class=\"d-flex flex-wrap gap-2\">
                <form method=\"post\" action=\"";
        // line 69
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tache_focus_ai", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["tache_focu"]) || array_key_exists("tache_focu", $context) ? $context["tache_focu"] : (function () { throw new RuntimeError('Variable "tache_focu" does not exist.', 69, $this->source); })()), "id", [], "any", false, false, false, 69)]), "html", null, true);
        yield "\">
                    <input type=\"hidden\" name=\"_token\" value=\"";
        // line 70
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("ai" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["tache_focu"]) || array_key_exists("tache_focu", $context) ? $context["tache_focu"] : (function () { throw new RuntimeError('Variable "tache_focu" does not exist.', 70, $this->source); })()), "id", [], "any", false, false, false, 70))), "html", null, true);
        yield "\">
                    <button type=\"submit\" class=\"btn btn-success\">Sous-taches IA</button>
                </form>

                <form method=\"post\" action=\"";
        // line 74
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tache_focus_ai_advice", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["tache_focu"]) || array_key_exists("tache_focu", $context) ? $context["tache_focu"] : (function () { throw new RuntimeError('Variable "tache_focu" does not exist.', 74, $this->source); })()), "id", [], "any", false, false, false, 74)]), "html", null, true);
        yield "\">
                    <input type=\"hidden\" name=\"_token\" value=\"";
        // line 75
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("ai_advice" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["tache_focu"]) || array_key_exists("tache_focu", $context) ? $context["tache_focu"] : (function () { throw new RuntimeError('Variable "tache_focu" does not exist.', 75, $this->source); })()), "id", [], "any", false, false, false, 75))), "html", null, true);
        yield "\">
                    <button type=\"submit\" class=\"btn btn-primary\">Priorite + duree IA</button>
                </form>

                <form method=\"post\" action=\"";
        // line 79
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tache_focus_music", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["tache_focu"]) || array_key_exists("tache_focu", $context) ? $context["tache_focu"] : (function () { throw new RuntimeError('Variable "tache_focu" does not exist.', 79, $this->source); })()), "id", [], "any", false, false, false, 79)]), "html", null, true);
        yield "\">
                    <input type=\"hidden\" name=\"_token\" value=\"";
        // line 80
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("music" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["tache_focu"]) || array_key_exists("tache_focu", $context) ? $context["tache_focu"] : (function () { throw new RuntimeError('Variable "tache_focu" does not exist.', 80, $this->source); })()), "id", [], "any", false, false, false, 80))), "html", null, true);
        yield "\">
                    <button type=\"submit\" class=\"btn btn-info\">Musique focus</button>
                </form>

                <form method=\"post\" action=\"";
        // line 84
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tache_focus_holidays", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["tache_focu"]) || array_key_exists("tache_focu", $context) ? $context["tache_focu"] : (function () { throw new RuntimeError('Variable "tache_focu" does not exist.', 84, $this->source); })()), "id", [], "any", false, false, false, 84)]), "html", null, true);
        yield "\">
                    <input type=\"hidden\" name=\"_token\" value=\"";
        // line 85
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("holidays" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["tache_focu"]) || array_key_exists("tache_focu", $context) ? $context["tache_focu"] : (function () { throw new RuntimeError('Variable "tache_focu" does not exist.', 85, $this->source); })()), "id", [], "any", false, false, false, 85))), "html", null, true);
        yield "\">
                    <button type=\"submit\" class=\"btn btn-dark\">Jours feries</button>
                </form>

                <form method=\"post\" action=\"";
        // line 89
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tache_focus_books", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["tache_focu"]) || array_key_exists("tache_focu", $context) ? $context["tache_focu"] : (function () { throw new RuntimeError('Variable "tache_focu" does not exist.', 89, $this->source); })()), "id", [], "any", false, false, false, 89)]), "html", null, true);
        yield "\">
                    <input type=\"hidden\" name=\"_token\" value=\"";
        // line 90
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("books" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["tache_focu"]) || array_key_exists("tache_focu", $context) ? $context["tache_focu"] : (function () { throw new RuntimeError('Variable "tache_focu" does not exist.', 90, $this->source); })()), "id", [], "any", false, false, false, 90))), "html", null, true);
        yield "\">
                    <button type=\"submit\" class=\"btn btn-secondary\">Livres focus</button>
                </form>
            </div>
        </div>
    </div>

    <div class=\"row g-4\">
        ";
        // line 98
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["ai_suggestions"]) || array_key_exists("ai_suggestions", $context) ? $context["ai_suggestions"] : (function () { throw new RuntimeError('Variable "ai_suggestions" does not exist.', 98, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 99
            yield "            <div class=\"col-lg-6\">
                <div class=\"card h-100\">
                    <div class=\"card-header\"><strong>Suggestions IA</strong></div>
                    <div class=\"card-body\">
                        <ol class=\"mb-0\">
                            ";
            // line 104
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["ai_suggestions"]) || array_key_exists("ai_suggestions", $context) ? $context["ai_suggestions"] : (function () { throw new RuntimeError('Variable "ai_suggestions" does not exist.', 104, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["suggestion"]) {
                // line 105
                yield "                                <li>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["suggestion"], "html", null, true);
                yield "</li>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['suggestion'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 107
            yield "                        </ol>
                    </div>
                </div>
            </div>
        ";
        }
        // line 112
        yield "
        ";
        // line 113
        if ((($tmp = (isset($context["ai_advice"]) || array_key_exists("ai_advice", $context) ? $context["ai_advice"] : (function () { throw new RuntimeError('Variable "ai_advice" does not exist.', 113, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 114
            yield "            <div class=\"col-lg-6\">
                <div class=\"card h-100\">
                    <div class=\"card-header\"><strong>Analyse IA</strong></div>
                    <div class=\"card-body\">
                        <p><strong>Priorite conseillee :</strong> ";
            // line 118
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ai_advice"]) || array_key_exists("ai_advice", $context) ? $context["ai_advice"] : (function () { throw new RuntimeError('Variable "ai_advice" does not exist.', 118, $this->source); })()), "priorite", [], "any", false, false, false, 118), "html", null, true);
            yield "/5</p>
                        <p><strong>Duree recommandee :</strong> ";
            // line 119
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ai_advice"]) || array_key_exists("ai_advice", $context) ? $context["ai_advice"] : (function () { throw new RuntimeError('Variable "ai_advice" does not exist.', 119, $this->source); })()), "duree_minutes", [], "any", false, false, false, 119), "html", null, true);
            yield " minutes</p>
                        <p class=\"mb-0\"><strong>Conseil :</strong> ";
            // line 120
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ai_advice"]) || array_key_exists("ai_advice", $context) ? $context["ai_advice"] : (function () { throw new RuntimeError('Variable "ai_advice" does not exist.', 120, $this->source); })()), "conseil", [], "any", false, false, false, 120), "html", null, true);
            yield "</p>
                    </div>
                </div>
            </div>
        ";
        }
        // line 125
        yield "
        ";
        // line 126
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["focus_music"]) || array_key_exists("focus_music", $context) ? $context["focus_music"] : (function () { throw new RuntimeError('Variable "focus_music" does not exist.', 126, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 127
            yield "            <div class=\"col-lg-6\">
                <div class=\"card h-100\">
                    <div class=\"card-header\"><strong>Musique focus</strong></div>
                    <div class=\"card-body\">
                        <ul class=\"mb-0\">
                            ";
            // line 132
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["focus_music"]) || array_key_exists("focus_music", $context) ? $context["focus_music"] : (function () { throw new RuntimeError('Variable "focus_music" does not exist.', 132, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["track"]) {
                // line 133
                yield "                                <li>
                                    ";
                // line 134
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["track"], "title", [], "any", false, false, false, 134), "html", null, true);
                yield " - ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["track"], "artist", [], "any", false, false, false, 134), "html", null, true);
                yield "
                                    ";
                // line 135
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["track"], "link", [], "any", false, false, false, 135)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 136
                    yield "                                        <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["track"], "link", [], "any", false, false, false, 136), "html", null, true);
                    yield "\" target=\"_blank\">Ecouter</a>
                                    ";
                }
                // line 138
                yield "                                </li>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['track'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 140
            yield "                        </ul>
                    </div>
                </div>
            </div>
        ";
        }
        // line 145
        yield "
        ";
        // line 146
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["holidays"]) || array_key_exists("holidays", $context) ? $context["holidays"] : (function () { throw new RuntimeError('Variable "holidays" does not exist.', 146, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 147
            yield "            <div class=\"col-lg-6\">
                <div class=\"card h-100\">
                    <div class=\"card-header\"><strong>Jours feries a venir</strong></div>
                    <div class=\"card-body\">
                        <ul class=\"mb-0\">
                            ";
            // line 152
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["holidays"]) || array_key_exists("holidays", $context) ? $context["holidays"] : (function () { throw new RuntimeError('Variable "holidays" does not exist.', 152, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["holiday"]) {
                // line 153
                yield "                                <li>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["holiday"], "date", [], "any", false, false, false, 153), "html", null, true);
                yield " - ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["holiday"], "name", [], "any", false, false, false, 153), "html", null, true);
                yield "</li>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['holiday'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 155
            yield "                        </ul>
                    </div>
                </div>
            </div>
        ";
        }
        // line 160
        yield "
        ";
        // line 161
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["focus_books"]) || array_key_exists("focus_books", $context) ? $context["focus_books"] : (function () { throw new RuntimeError('Variable "focus_books" does not exist.', 161, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 162
            yield "            <div class=\"col-lg-6\">
                <div class=\"card h-100\">
                    <div class=\"card-header\"><strong>Livres recommandes</strong></div>
                    <div class=\"card-body\">
                        <ul class=\"mb-0\">
                            ";
            // line 167
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["focus_books"]) || array_key_exists("focus_books", $context) ? $context["focus_books"] : (function () { throw new RuntimeError('Variable "focus_books" does not exist.', 167, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["book"]) {
                // line 168
                yield "                                <li>
                                    ";
                // line 169
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["book"], "title", [], "any", false, false, false, 169), "html", null, true);
                yield " - ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["book"], "author", [], "any", false, false, false, 169), "html", null, true);
                yield "
                                    ";
                // line 170
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["book"], "year", [], "any", false, false, false, 170)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 171
                    yield "                                        (";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["book"], "year", [], "any", false, false, false, 171), "html", null, true);
                    yield ")
                                    ";
                }
                // line 173
                yield "                                </li>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['book'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 175
            yield "                        </ul>
                    </div>
                </div>
            </div>
        ";
        }
        // line 180
        yield "    </div>

    <div class=\"mt-4\">
        ";
        // line 183
        yield Twig\Extension\CoreExtension::include($this->env, $context, "tache_focus/_delete_form.html.twig");
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
        return "tache_focus/nex.html.twig";
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
        return array (  440 => 183,  435 => 180,  428 => 175,  421 => 173,  415 => 171,  413 => 170,  407 => 169,  404 => 168,  400 => 167,  393 => 162,  391 => 161,  388 => 160,  381 => 155,  370 => 153,  366 => 152,  359 => 147,  357 => 146,  354 => 145,  347 => 140,  340 => 138,  334 => 136,  332 => 135,  326 => 134,  323 => 133,  319 => 132,  312 => 127,  310 => 126,  307 => 125,  299 => 120,  295 => 119,  291 => 118,  285 => 114,  283 => 113,  280 => 112,  273 => 107,  264 => 105,  260 => 104,  253 => 99,  251 => 98,  240 => 90,  236 => 89,  229 => 85,  225 => 84,  218 => 80,  214 => 79,  207 => 75,  203 => 74,  196 => 70,  192 => 69,  176 => 56,  167 => 50,  158 => 44,  149 => 38,  140 => 32,  131 => 26,  115 => 13,  111 => 12,  104 => 8,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'front/base.html.twig' %}

{% block title %}Detail Tache Focus{% endblock %}

{% block content %}
    <div class=\"d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4\">
        <div>
            <h1 class=\"page-title mb-2\">{{ tache_focu.titre }}</h1>
            <p class=\"page-subtitle mb-0\">Vue detaillee, aide IA et outils de focus</p>
        </div>
        <div class=\"d-flex gap-2 flex-wrap\">
            <a href=\"{{ path('app_tache_focus_index') }}\" class=\"btn btn-secondary\">Retour liste</a>
            <a href=\"{{ path('app_tache_focus_edit', {'id': tache_focu.id}) }}\" class=\"btn btn-warning\">Modifier</a>
        </div>
    </div>

    <div class=\"card mb-4\">
        <div class=\"card-header\">
            <strong>Resume de la tache</strong>
        </div>
        <div class=\"card-body\">
            <div class=\"row g-3\">
                <div class=\"col-md-6\">
                    <div class=\"p-3 rounded\" style=\"background: #f0f5ff; border: 1px solid #dbe7ff;\">
                        <div style=\"color: #6c7b95; font-size: 13px; font-weight: 600; margin-bottom: .25rem;\">Objectif</div>
                        <div style=\"color: #17253a; font-weight: 600;\">{{ tache_focu.objectifPrincipal }}</div>
                    </div>
                </div>
                <div class=\"col-md-3\">
                    <div class=\"p-3 rounded text-center\" style=\"background: #ede8ff; border: 1px solid #c9c0f5;\">
                        <div style=\"color: #6c7b95; font-size: 13px; font-weight: 600; margin-bottom: .25rem;\">Difficulté</div>
                        <div style=\"color: #4c3fb5; font-size: 24px; font-weight: 700;\">{{ tache_focu.niveauDifficulte }}</div>
                    </div>
                </div>
                <div class=\"col-md-3\">
                    <div class=\"p-3 rounded text-center\" style=\"background: #e0faf8; border: 1px solid #9ee6e0;\">
                        <div style=\"color: #6c7b95; font-size: 13px; font-weight: 600; margin-bottom: .25rem;\">Score</div>
                        <div style=\"color: #0e7c77; font-size: 24px; font-weight: 700;\">{{ tache_focu.scoreProductivite }}%</div>
                    </div>
                </div>
                <div class=\"col-md-4\">
                    <div class=\"p-3 rounded\" style=\"background: #f0f5ff; border: 1px solid #dbe7ff;\">
                        <div style=\"color: #6c7b95; font-size: 13px; font-weight: 600; margin-bottom: .25rem;\">Statut</div>
                        <div style=\"color: #17253a; font-weight: 600;\">{{ tache_focu.statut }}</div>
                    </div>
                </div>
                <div class=\"col-md-4\">
                    <div class=\"p-3 rounded\" style=\"background: #f0f5ff; border: 1px solid #dbe7ff;\">
                        <div style=\"color: #6c7b95; font-size: 13px; font-weight: 600; margin-bottom: .25rem;\">Heure début</div>
                        <div style=\"color: #17253a; font-weight: 600;\">{{ tache_focu.heureDebut ? tache_focu.heureDebut|date('H:i') : '-' }}</div>
                    </div>
                </div>
                <div class=\"col-md-4\">
                    <div class=\"p-3 rounded\" style=\"background: #f0f5ff; border: 1px solid #dbe7ff;\">
                        <div style=\"color: #6c7b95; font-size: 13px; font-weight: 600; margin-bottom: .25rem;\">Heure fin</div>
                        <div style=\"color: #17253a; font-weight: 600;\">{{ tache_focu.heureFin ? tache_focu.heureFin|date('H:i') : '-' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"card mb-4\">
        <div class=\"card-header\">
            <strong>Actions intelligentes</strong>
        </div>
        <div class=\"card-body\">
            <div class=\"d-flex flex-wrap gap-2\">
                <form method=\"post\" action=\"{{ path('app_tache_focus_ai', {'id': tache_focu.id}) }}\">
                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('ai' ~ tache_focu.id) }}\">
                    <button type=\"submit\" class=\"btn btn-success\">Sous-taches IA</button>
                </form>

                <form method=\"post\" action=\"{{ path('app_tache_focus_ai_advice', {'id': tache_focu.id}) }}\">
                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('ai_advice' ~ tache_focu.id) }}\">
                    <button type=\"submit\" class=\"btn btn-primary\">Priorite + duree IA</button>
                </form>

                <form method=\"post\" action=\"{{ path('app_tache_focus_music', {'id': tache_focu.id}) }}\">
                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('music' ~ tache_focu.id) }}\">
                    <button type=\"submit\" class=\"btn btn-info\">Musique focus</button>
                </form>

                <form method=\"post\" action=\"{{ path('app_tache_focus_holidays', {'id': tache_focu.id}) }}\">
                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('holidays' ~ tache_focu.id) }}\">
                    <button type=\"submit\" class=\"btn btn-dark\">Jours feries</button>
                </form>

                <form method=\"post\" action=\"{{ path('app_tache_focus_books', {'id': tache_focu.id}) }}\">
                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('books' ~ tache_focu.id) }}\">
                    <button type=\"submit\" class=\"btn btn-secondary\">Livres focus</button>
                </form>
            </div>
        </div>
    </div>

    <div class=\"row g-4\">
        {% if ai_suggestions is not empty %}
            <div class=\"col-lg-6\">
                <div class=\"card h-100\">
                    <div class=\"card-header\"><strong>Suggestions IA</strong></div>
                    <div class=\"card-body\">
                        <ol class=\"mb-0\">
                            {% for suggestion in ai_suggestions %}
                                <li>{{ suggestion }}</li>
                            {% endfor %}
                        </ol>
                    </div>
                </div>
            </div>
        {% endif %}

        {% if ai_advice %}
            <div class=\"col-lg-6\">
                <div class=\"card h-100\">
                    <div class=\"card-header\"><strong>Analyse IA</strong></div>
                    <div class=\"card-body\">
                        <p><strong>Priorite conseillee :</strong> {{ ai_advice.priorite }}/5</p>
                        <p><strong>Duree recommandee :</strong> {{ ai_advice.duree_minutes }} minutes</p>
                        <p class=\"mb-0\"><strong>Conseil :</strong> {{ ai_advice.conseil }}</p>
                    </div>
                </div>
            </div>
        {% endif %}

        {% if focus_music is not empty %}
            <div class=\"col-lg-6\">
                <div class=\"card h-100\">
                    <div class=\"card-header\"><strong>Musique focus</strong></div>
                    <div class=\"card-body\">
                        <ul class=\"mb-0\">
                            {% for track in focus_music %}
                                <li>
                                    {{ track.title }} - {{ track.artist }}
                                    {% if track.link %}
                                        <a href=\"{{ track.link }}\" target=\"_blank\">Ecouter</a>
                                    {% endif %}
                                </li>
                            {% endfor %}
                        </ul>
                    </div>
                </div>
            </div>
        {% endif %}

        {% if holidays is not empty %}
            <div class=\"col-lg-6\">
                <div class=\"card h-100\">
                    <div class=\"card-header\"><strong>Jours feries a venir</strong></div>
                    <div class=\"card-body\">
                        <ul class=\"mb-0\">
                            {% for holiday in holidays %}
                                <li>{{ holiday.date }} - {{ holiday.name }}</li>
                            {% endfor %}
                        </ul>
                    </div>
                </div>
            </div>
        {% endif %}

        {% if focus_books is not empty %}
            <div class=\"col-lg-6\">
                <div class=\"card h-100\">
                    <div class=\"card-header\"><strong>Livres recommandes</strong></div>
                    <div class=\"card-body\">
                        <ul class=\"mb-0\">
                            {% for book in focus_books %}
                                <li>
                                    {{ book.title }} - {{ book.author }}
                                    {% if book.year %}
                                        ({{ book.year }})
                                    {% endif %}
                                </li>
                            {% endfor %}
                        </ul>
                    </div>
                </div>
            </div>
        {% endif %}
    </div>

    <div class=\"mt-4\">
        {{ include('tache_focus/_delete_form.html.twig') }}
    </div>
{% endblock %}
", "tache_focus/nex.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/tache_focus/nex.html.twig");
    }
}
