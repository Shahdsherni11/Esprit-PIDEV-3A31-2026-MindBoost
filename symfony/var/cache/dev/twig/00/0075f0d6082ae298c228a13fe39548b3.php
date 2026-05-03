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

/* specific_test/create_specific.html.twig */
class __TwigTemplate_017fa9894f114a8f7c65c84d53b3e95f extends Template
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
        return "back/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "specific_test/create_specific.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "specific_test/create_specific.html.twig"));

        $this->parent = $this->load("back/base.html.twig", 1);
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

        yield "Créer Test Spécifique - MindBoost";
        
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
        yield "<div class=\"page-heading\">
    <h1><i class=\"fas fa-circle-plus me-2\"></i>Créer un Test Spécifique</h1>
    <p>Créez un test spécifique lié à un test général parent.</p>
</div>

<div class=\"card\">
    <div class=\"card-body\">
        <form method=\"POST\" id=\"testForm\">
            <div class=\"section-header mb-4\">
                <h3><i class=\"fas fa-circle-info me-2\"></i>Informations du Test</h3>
                <hr class=\"border-secondary opacity-25\">
            </div>

            <div class=\"row\">
                <div class=\"col-md-6\">
                    <div class=\"form-group mb-3\">
                        <label for=\"general_test_id\" class=\"form-label\">
                            <i class=\"fas fa-book\"></i> Test Général Parent *
                        </label>
                        <select id=\"general_test_id\" name=\"general_test_id\" class=\"form-select\" required>
                            <option value=\"\">-- Sélectionner un test général --</option>
                            ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["generalTests"]) || array_key_exists("generalTests", $context) ? $context["generalTests"] : (function () { throw new RuntimeError('Variable "generalTests" does not exist.', 27, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["generalTest"]) {
            // line 28
            yield "                                <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["generalTest"], "id", [], "any", false, false, false, 28), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["generalTest"], "title", [], "any", false, false, false, 28), "html", null, true);
            yield "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['generalTest'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        yield "                        </select>
                        <small class=\"form-text\">Le test spécifique doit appartenir à un test général.</small>
                    </div>
                </div>

                <div class=\"col-md-6\">
                    <div class=\"form-group mb-3\">
                        <label for=\"category\" class=\"form-label\">
                            <i class=\"fas fa-folder\"></i> Catégorie *
                        </label>
                        <select id=\"category\" name=\"category\" class=\"form-select\" required>
                            <option value=\"\">-- Sélectionner une catégorie --</option>
                            <option value=\"Anxiete\">Anxiete</option>
                            <option value=\"Stress\">Stress</option>
                            <option value=\"Depression\">Depression</option>
                            <option value=\"Trouble du Sommeil\">Trouble du Sommeil</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class=\"row\">
                <div class=\"col-md-8\">
                    <div class=\"form-group mb-3\">
                        <label for=\"title\" class=\"form-label\">
                            <i class=\"fas fa-heading\"></i> Titre du Test *
                        </label>
                        <input type=\"text\" id=\"title\" name=\"title\" class=\"form-control\"
                               placeholder=\"Ex: Test approfondi - Anxiete\"
                               required minlength=\"3\" maxlength=\"255\">
                        <small class=\"form-text\">Le titre ne doit pas être uniquement des nombres.</small>
                    </div>
                </div>

                <div class=\"col-md-4\">
                    <div class=\"form-group mb-3\">
                        <label for=\"created_by\" class=\"form-label\">
                            <i class=\"fas fa-user\"></i> ID Créateur
                        </label>
                        <input type=\"number\" id=\"created_by\" name=\"created_by\" class=\"form-control\"
                               value=\"1\" readonly>
                    </div>
                </div>
            </div>

            <div class=\"form-group mb-4\">
                <label for=\"description\" class=\"form-label\">
                    <i class=\"fas fa-align-left\"></i> Description
                </label>
                <textarea id=\"description\" name=\"description\" class=\"form-control\"
                          rows=\"4\" placeholder=\"Décrivez votre test spécifique...\"></textarea>
            </div>

            <div class=\"section-header mb-4\">
                <div class=\"d-flex justify-content-between align-items-center\">
                    <h3><i class=\"fas fa-question me-2\"></i>Questions du Test</h3>
                    <button type=\"button\" class=\"btn btn-success\" id=\"addQuestionBtn\">
                        <i class=\"fas fa-plus\"></i> Ajouter une Question
                    </button>
                </div>
                <hr class=\"border-secondary opacity-25\">
            </div>

            <div id=\"questionsContainer\"></div>

            <div class=\"row mt-4\">
                <div class=\"col-md-6\">
                    <button type=\"submit\" class=\"btn btn-success w-100\">
                        <i class=\"fas fa-save\"></i> Créer le Test
                    </button>
                </div>
                <div class=\"col-md-6\">
                    <a href=\"";
        // line 102
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("specific_test_index");
        yield "\" class=\"btn btn-secondary w-100\">
                        <i class=\"fas fa-times\"></i> Annuler
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
let questionCount = 0;

document.getElementById('addQuestionBtn').addEventListener('click', function() {
    questionCount++;
    addQuestion(questionCount);
});

function addQuestion(index) {
    const container = document.getElementById('questionsContainer');

    const questionCard = document.createElement('div');
    questionCard.className = 'question-card';
    questionCard.id = 'question-' + index;

    questionCard.innerHTML = `
        <div class=\"row mb-3\">
            <div class=\"col-md-10\">
                <label class=\"form-label\">
                    <i class=\"fas fa-heading\"></i> Question #\${index} *
                </label>
                <textarea name=\"questions[\${index}][text]\" class=\"form-control question-text\"
                          placeholder=\"Entrez votre question...\"
                          rows=\"2\" required minlength=\"5\"></textarea>
                <small class=\"form-text\">Min 5 caractères</small>
            </div>
            <div class=\"col-md-2\">
                <label class=\"form-label\">Ordre *</label>
                <input type=\"number\" name=\"questions[\${index}][order]\" class=\"form-control\"
                       value=\"\${index}\" min=\"1\" required>
            </div>
        </div>

        <div class=\"mb-3\">
            <label class=\"form-label d-flex justify-content-between align-items-center\">
                <span><i class=\"fas fa-list\"></i> Réponses</span>
                <button type=\"button\" class=\"btn btn-success btn-sm\" onclick=\"addAnswer(\${index})\">
                    <i class=\"fas fa-plus\"></i> Ajouter Réponse
                </button>
            </label>
            <div id=\"answers-\${index}\" class=\"answers-container\">
                \${['Réponse 1', 'Réponse 2', 'Réponse 3'].map((placeholder, i) => `
                    <div class=\"answer-card\">
                        <div class=\"row align-items-center\">
                            <div class=\"col-md-7\">
                                <input type=\"text\" name=\"questions[\${index}][answers][\${i}][text]\"
                                       class=\"form-control form-control-sm answer-text\"
                                       placeholder=\"\${placeholder}\">
                            </div>
                            <div class=\"col-md-3\">
                                <input type=\"number\" name=\"questions[\${index}][answers][\${i}][score]\"
                                       class=\"form-control form-control-sm\"
                                       placeholder=\"Score\" value=\"0\" min=\"0\">
                            </div>
                            <div class=\"col-md-2\">
                                <button type=\"button\" class=\"btn btn-danger btn-sm\"
                                        onclick=\"removeAnswer(this)\">
                                    <i class=\"fas fa-trash\"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `).join('')}
            </div>
        </div>

        <div class=\"text-end mb-3\">
            <button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"removeQuestion(\${index})\">
                <i class=\"fas fa-trash\"></i> Supprimer cette Question
            </button>
        </div>
    `;

    container.appendChild(questionCard);
}

function addAnswer(questionIndex) {
    const container = document.getElementById('answers-' + questionIndex);
    const answerCount = container.children.length;

    const answerCard = document.createElement('div');
    answerCard.className = 'answer-card';

    answerCard.innerHTML = `
        <div class=\"row align-items-center\">
            <div class=\"col-md-7\">
                <input type=\"text\" name=\"questions[\${questionIndex}][answers][\${answerCount}][text]\"
                       class=\"form-control form-control-sm answer-text\"
                       placeholder=\"Texte de la réponse\">
            </div>
            <div class=\"col-md-3\">
                <input type=\"number\" name=\"questions[\${questionIndex}][answers][\${answerCount}][score]\"
                       class=\"form-control form-control-sm\"
                       placeholder=\"Score\" value=\"0\" min=\"0\">
            </div>
            <div class=\"col-md-2\">
                <button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"removeAnswer(this)\">
                    <i class=\"fas fa-trash\"></i>
                </button>
            </div>
        </div>
    `;

    container.appendChild(answerCard);
}

function removeQuestion(index) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette question ?')) {
        document.getElementById('question-' + index).remove();
    }
}

function removeAnswer(button) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette réponse ?')) {
        button.closest('.answer-card').remove();
    }
}

window.addEventListener('load', function() {
    addQuestion(1);
});

document.getElementById('testForm').addEventListener('submit', function(e) {
    const generalTestId = document.getElementById('general_test_id').value;
    const category = document.getElementById('category').value;
    const title = document.getElementById('title').value.trim();
    const questions = document.querySelectorAll('.question-card');

    if (!generalTestId) {
        e.preventDefault();
        alert('Veuillez sélectionner un test général parent.');
        return;
    }

    if (!category) {
        e.preventDefault();
        alert('Veuillez sélectionner une catégorie.');
        return;
    }

    if (title.length < 3) {
        e.preventDefault();
        alert('Le titre doit contenir au moins 3 caractères.');
        return;
    }

    if (/^\\d+\$/.test(title)) {
        e.preventDefault();
        alert('Le titre ne doit pas être uniquement des nombres.');
        return;
    }

    if (questions.length === 0) {
        e.preventDefault();
        alert('Veuillez ajouter au moins une question.');
        return;
    }

    let hasValidQuestion = false;

    for (const question of questions) {
        const qText = question.querySelector('.question-text')?.value.trim() || '';
        const answers = question.querySelectorAll('.answer-text');

        if (qText !== '') {
            hasValidQuestion = true;
        }

        let answerCount = 0;
        answers.forEach(answer => {
            if (answer.value.trim() !== '') {
                answerCount++;
            }
        });

        if (qText !== '' && answerCount === 0) {
            e.preventDefault();
            alert('Chaque question doit avoir au moins une réponse.');
            return;
        }
    }

    if (!hasValidQuestion) {
        e.preventDefault();
        alert('Veuillez saisir au moins une vraie question.');
    }
});
</script>
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
        return "specific_test/create_specific.html.twig";
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
        return array (  212 => 102,  138 => 30,  127 => 28,  123 => 27,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}Créer Test Spécifique - MindBoost{% endblock %}

{% block content %}
<div class=\"page-heading\">
    <h1><i class=\"fas fa-circle-plus me-2\"></i>Créer un Test Spécifique</h1>
    <p>Créez un test spécifique lié à un test général parent.</p>
</div>

<div class=\"card\">
    <div class=\"card-body\">
        <form method=\"POST\" id=\"testForm\">
            <div class=\"section-header mb-4\">
                <h3><i class=\"fas fa-circle-info me-2\"></i>Informations du Test</h3>
                <hr class=\"border-secondary opacity-25\">
            </div>

            <div class=\"row\">
                <div class=\"col-md-6\">
                    <div class=\"form-group mb-3\">
                        <label for=\"general_test_id\" class=\"form-label\">
                            <i class=\"fas fa-book\"></i> Test Général Parent *
                        </label>
                        <select id=\"general_test_id\" name=\"general_test_id\" class=\"form-select\" required>
                            <option value=\"\">-- Sélectionner un test général --</option>
                            {% for generalTest in generalTests %}
                                <option value=\"{{ generalTest.id }}\">{{ generalTest.title }}</option>
                            {% endfor %}
                        </select>
                        <small class=\"form-text\">Le test spécifique doit appartenir à un test général.</small>
                    </div>
                </div>

                <div class=\"col-md-6\">
                    <div class=\"form-group mb-3\">
                        <label for=\"category\" class=\"form-label\">
                            <i class=\"fas fa-folder\"></i> Catégorie *
                        </label>
                        <select id=\"category\" name=\"category\" class=\"form-select\" required>
                            <option value=\"\">-- Sélectionner une catégorie --</option>
                            <option value=\"Anxiete\">Anxiete</option>
                            <option value=\"Stress\">Stress</option>
                            <option value=\"Depression\">Depression</option>
                            <option value=\"Trouble du Sommeil\">Trouble du Sommeil</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class=\"row\">
                <div class=\"col-md-8\">
                    <div class=\"form-group mb-3\">
                        <label for=\"title\" class=\"form-label\">
                            <i class=\"fas fa-heading\"></i> Titre du Test *
                        </label>
                        <input type=\"text\" id=\"title\" name=\"title\" class=\"form-control\"
                               placeholder=\"Ex: Test approfondi - Anxiete\"
                               required minlength=\"3\" maxlength=\"255\">
                        <small class=\"form-text\">Le titre ne doit pas être uniquement des nombres.</small>
                    </div>
                </div>

                <div class=\"col-md-4\">
                    <div class=\"form-group mb-3\">
                        <label for=\"created_by\" class=\"form-label\">
                            <i class=\"fas fa-user\"></i> ID Créateur
                        </label>
                        <input type=\"number\" id=\"created_by\" name=\"created_by\" class=\"form-control\"
                               value=\"1\" readonly>
                    </div>
                </div>
            </div>

            <div class=\"form-group mb-4\">
                <label for=\"description\" class=\"form-label\">
                    <i class=\"fas fa-align-left\"></i> Description
                </label>
                <textarea id=\"description\" name=\"description\" class=\"form-control\"
                          rows=\"4\" placeholder=\"Décrivez votre test spécifique...\"></textarea>
            </div>

            <div class=\"section-header mb-4\">
                <div class=\"d-flex justify-content-between align-items-center\">
                    <h3><i class=\"fas fa-question me-2\"></i>Questions du Test</h3>
                    <button type=\"button\" class=\"btn btn-success\" id=\"addQuestionBtn\">
                        <i class=\"fas fa-plus\"></i> Ajouter une Question
                    </button>
                </div>
                <hr class=\"border-secondary opacity-25\">
            </div>

            <div id=\"questionsContainer\"></div>

            <div class=\"row mt-4\">
                <div class=\"col-md-6\">
                    <button type=\"submit\" class=\"btn btn-success w-100\">
                        <i class=\"fas fa-save\"></i> Créer le Test
                    </button>
                </div>
                <div class=\"col-md-6\">
                    <a href=\"{{ path('specific_test_index') }}\" class=\"btn btn-secondary w-100\">
                        <i class=\"fas fa-times\"></i> Annuler
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
let questionCount = 0;

document.getElementById('addQuestionBtn').addEventListener('click', function() {
    questionCount++;
    addQuestion(questionCount);
});

function addQuestion(index) {
    const container = document.getElementById('questionsContainer');

    const questionCard = document.createElement('div');
    questionCard.className = 'question-card';
    questionCard.id = 'question-' + index;

    questionCard.innerHTML = `
        <div class=\"row mb-3\">
            <div class=\"col-md-10\">
                <label class=\"form-label\">
                    <i class=\"fas fa-heading\"></i> Question #\${index} *
                </label>
                <textarea name=\"questions[\${index}][text]\" class=\"form-control question-text\"
                          placeholder=\"Entrez votre question...\"
                          rows=\"2\" required minlength=\"5\"></textarea>
                <small class=\"form-text\">Min 5 caractères</small>
            </div>
            <div class=\"col-md-2\">
                <label class=\"form-label\">Ordre *</label>
                <input type=\"number\" name=\"questions[\${index}][order]\" class=\"form-control\"
                       value=\"\${index}\" min=\"1\" required>
            </div>
        </div>

        <div class=\"mb-3\">
            <label class=\"form-label d-flex justify-content-between align-items-center\">
                <span><i class=\"fas fa-list\"></i> Réponses</span>
                <button type=\"button\" class=\"btn btn-success btn-sm\" onclick=\"addAnswer(\${index})\">
                    <i class=\"fas fa-plus\"></i> Ajouter Réponse
                </button>
            </label>
            <div id=\"answers-\${index}\" class=\"answers-container\">
                \${['Réponse 1', 'Réponse 2', 'Réponse 3'].map((placeholder, i) => `
                    <div class=\"answer-card\">
                        <div class=\"row align-items-center\">
                            <div class=\"col-md-7\">
                                <input type=\"text\" name=\"questions[\${index}][answers][\${i}][text]\"
                                       class=\"form-control form-control-sm answer-text\"
                                       placeholder=\"\${placeholder}\">
                            </div>
                            <div class=\"col-md-3\">
                                <input type=\"number\" name=\"questions[\${index}][answers][\${i}][score]\"
                                       class=\"form-control form-control-sm\"
                                       placeholder=\"Score\" value=\"0\" min=\"0\">
                            </div>
                            <div class=\"col-md-2\">
                                <button type=\"button\" class=\"btn btn-danger btn-sm\"
                                        onclick=\"removeAnswer(this)\">
                                    <i class=\"fas fa-trash\"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `).join('')}
            </div>
        </div>

        <div class=\"text-end mb-3\">
            <button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"removeQuestion(\${index})\">
                <i class=\"fas fa-trash\"></i> Supprimer cette Question
            </button>
        </div>
    `;

    container.appendChild(questionCard);
}

function addAnswer(questionIndex) {
    const container = document.getElementById('answers-' + questionIndex);
    const answerCount = container.children.length;

    const answerCard = document.createElement('div');
    answerCard.className = 'answer-card';

    answerCard.innerHTML = `
        <div class=\"row align-items-center\">
            <div class=\"col-md-7\">
                <input type=\"text\" name=\"questions[\${questionIndex}][answers][\${answerCount}][text]\"
                       class=\"form-control form-control-sm answer-text\"
                       placeholder=\"Texte de la réponse\">
            </div>
            <div class=\"col-md-3\">
                <input type=\"number\" name=\"questions[\${questionIndex}][answers][\${answerCount}][score]\"
                       class=\"form-control form-control-sm\"
                       placeholder=\"Score\" value=\"0\" min=\"0\">
            </div>
            <div class=\"col-md-2\">
                <button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"removeAnswer(this)\">
                    <i class=\"fas fa-trash\"></i>
                </button>
            </div>
        </div>
    `;

    container.appendChild(answerCard);
}

function removeQuestion(index) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette question ?')) {
        document.getElementById('question-' + index).remove();
    }
}

function removeAnswer(button) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette réponse ?')) {
        button.closest('.answer-card').remove();
    }
}

window.addEventListener('load', function() {
    addQuestion(1);
});

document.getElementById('testForm').addEventListener('submit', function(e) {
    const generalTestId = document.getElementById('general_test_id').value;
    const category = document.getElementById('category').value;
    const title = document.getElementById('title').value.trim();
    const questions = document.querySelectorAll('.question-card');

    if (!generalTestId) {
        e.preventDefault();
        alert('Veuillez sélectionner un test général parent.');
        return;
    }

    if (!category) {
        e.preventDefault();
        alert('Veuillez sélectionner une catégorie.');
        return;
    }

    if (title.length < 3) {
        e.preventDefault();
        alert('Le titre doit contenir au moins 3 caractères.');
        return;
    }

    if (/^\\d+\$/.test(title)) {
        e.preventDefault();
        alert('Le titre ne doit pas être uniquement des nombres.');
        return;
    }

    if (questions.length === 0) {
        e.preventDefault();
        alert('Veuillez ajouter au moins une question.');
        return;
    }

    let hasValidQuestion = false;

    for (const question of questions) {
        const qText = question.querySelector('.question-text')?.value.trim() || '';
        const answers = question.querySelectorAll('.answer-text');

        if (qText !== '') {
            hasValidQuestion = true;
        }

        let answerCount = 0;
        answers.forEach(answer => {
            if (answer.value.trim() !== '') {
                answerCount++;
            }
        });

        if (qText !== '' && answerCount === 0) {
            e.preventDefault();
            alert('Chaque question doit avoir au moins une réponse.');
            return;
        }
    }

    if (!hasValidQuestion) {
        e.preventDefault();
        alert('Veuillez saisir au moins une vraie question.');
    }
});
</script>
{% endblock %}", "specific_test/create_specific.html.twig", "/home/runner/work/Esprit-PIDEV-3A31-2026-MindBoost/Esprit-PIDEV-3A31-2026-MindBoost/symfony/templates/specific_test/create_specific.html.twig");
    }
}
