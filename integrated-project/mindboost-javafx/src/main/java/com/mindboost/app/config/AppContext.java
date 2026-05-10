package com.mindboost.app.config;

import com.mindboost.app.service.*;

public class AppContext {
    private final AppConfig config;
    private final DatabaseManager databaseManager;
    private final SessionService sessionService;

    private final AuthService authService;
    private final UserService userService;
    private final ProfileService profileService;
    private final AchievementService achievementService;
    private final PostService postService;
    private final CommentService commentService;
    private final SavesService savesService;
    private final TaskService taskService;
    private final SousTacheService sousTacheService;
    private final GeneralTestService generalTestService;
    private final SpecificTestService specificTestService;
    private final TestLifecycleService testLifecycleService;
    private final FrontTestService frontTestService;
    private final UserProgressService userProgressService;
    private final UserStatisticsService userStatisticsService;
    private final AdminStatisticsService adminStatisticsService;
    private final AdminInsightsService adminInsightsService;
    private final AiCoachService aiCoachService;
    private final AdminAiService adminAiService;
    private final PdfService pdfService;
    private final MailService mailService;
    private final SentimentService sentimentService;
    private final ProfanityService profanityService;
    private final MotivationalService motivationalService;
    private final FocusService focusService;

    public AppContext() {
        this.config = new AppConfig();
        this.databaseManager = new DatabaseManager(config);
        this.sessionService = new SessionService();

        this.profanityService = new ProfanityService();
        this.sentimentService = new SentimentService(config);
        this.mailService = new MailService(config);
        this.pdfService = new PdfService();
        this.motivationalService = new MotivationalService(config);
        this.focusService = new FocusService(config);

        this.userService = new UserService(databaseManager);
        this.profileService = new ProfileService(databaseManager);
        this.achievementService = new AchievementService(databaseManager);
        this.postService = new PostService(databaseManager, profanityService);
        this.commentService = new CommentService(databaseManager, profanityService);
        this.savesService = new SavesService(databaseManager);
        this.taskService = new TaskService(databaseManager, focusService);
        this.sousTacheService = new SousTacheService(databaseManager, focusService);
        this.generalTestService = new GeneralTestService(databaseManager);
        this.specificTestService = new SpecificTestService(databaseManager);
        this.testLifecycleService = new TestLifecycleService(databaseManager);
        this.frontTestService = new FrontTestService();
        this.userProgressService = new UserProgressService(databaseManager);
        this.userStatisticsService = new UserStatisticsService(databaseManager);
        this.adminStatisticsService = new AdminStatisticsService(databaseManager);
        this.adminInsightsService = new AdminInsightsService(databaseManager);
        this.aiCoachService = new AiCoachService(config);
        this.adminAiService = new AdminAiService(config, databaseManager, generalTestService, specificTestService);
        this.authService = new AuthService(databaseManager, sessionService);
    }

    public AppConfig getConfig() {
        return config;
    }

    public DatabaseManager getDatabaseManager() {
        return databaseManager;
    }

    public SessionService getSessionService() {
        return sessionService;
    }

    public AuthService getAuthService() {
        return authService;
    }

    public UserService getUserService() {
        return userService;
    }

    public ProfileService getProfileService() {
        return profileService;
    }

    public AchievementService getAchievementService() {
        return achievementService;
    }

    public PostService getPostService() {
        return postService;
    }

    public CommentService getCommentService() {
        return commentService;
    }

    public SavesService getSavesService() {
        return savesService;
    }

    public TaskService getTaskService() {
        return taskService;
    }

    public SousTacheService getSousTacheService() {
        return sousTacheService;
    }

    public GeneralTestService getGeneralTestService() {
        return generalTestService;
    }

    public SpecificTestService getSpecificTestService() {
        return specificTestService;
    }

    public TestLifecycleService getTestLifecycleService() {
        return testLifecycleService;
    }

    public FrontTestService getFrontTestService() {
        return frontTestService;
    }

    public UserProgressService getUserProgressService() {
        return userProgressService;
    }

    public UserStatisticsService getUserStatisticsService() {
        return userStatisticsService;
    }

    public AdminStatisticsService getAdminStatisticsService() {
        return adminStatisticsService;
    }

    public AdminInsightsService getAdminInsightsService() {
        return adminInsightsService;
    }

    public AiCoachService getAiCoachService() {
        return aiCoachService;
    }

    public AdminAiService getAdminAiService() {
        return adminAiService;
    }

    public PdfService getPdfService() {
        return pdfService;
    }

    public MailService getMailService() {
        return mailService;
    }

    public SentimentService getSentimentService() {
        return sentimentService;
    }

    public ProfanityService getProfanityService() {
        return profanityService;
    }

    public MotivationalService getMotivationalService() {
        return motivationalService;
    }

    public FocusService getFocusService() {
        return focusService;
    }

    public void shutdown() {
        databaseManager.close();
    }
}
