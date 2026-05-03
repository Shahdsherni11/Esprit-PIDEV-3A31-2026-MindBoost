<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_wdt/styles' => [[['_route' => '_wdt_stylesheet', '_controller' => 'web_profiler.controller.profiler::toolbarStylesheetAction'], null, null, null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin/ai/tests' => [[['_route' => 'admin_ai_tests', '_controller' => 'App\\Controller\\AdminAiController::index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/ai/tests/generate' => [[['_route' => 'admin_ai_tests_generate', '_controller' => 'App\\Controller\\AdminAiController::generate'], null, ['POST' => 0], null, false, false, null]],
        '/admin/results-history' => [[['_route' => 'admin_results_history', '_controller' => 'App\\Controller\\AdminInsightsController::results'], null, ['GET' => 0], null, false, false, null]],
        '/admin/analytics-dashboard' => [[['_route' => 'admin_analytics_dashboard', '_controller' => 'App\\Controller\\AdminInsightsController::analytics'], null, ['GET' => 0], null, false, false, null]],
        '/admin/statistics' => [[['_route' => 'admin_statistics_dashboard', '_controller' => 'App\\Controller\\AdminStatisticsController::index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/statistics/reminder/send' => [[['_route' => 'admin_statistics_send_reminder', '_controller' => 'App\\Controller\\AdminStatisticsController::sendReminder'], null, ['POST' => 0], null, false, false, null]],
        '/admin/achievements' => [[['_route' => 'back_achievement_index', '_controller' => 'App\\Controller\\BackOffice\\AchievementController::index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/achievements/new' => [[['_route' => 'back_achievement_new', '_controller' => 'App\\Controller\\BackOffice\\AchievementController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin' => [[['_route' => 'back_dashboard', '_controller' => 'App\\Controller\\BackOffice\\DashboardController::index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/posts' => [[['_route' => 'back_post_index', '_controller' => 'App\\Controller\\BackOffice\\PostController::index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/posts/new' => [[['_route' => 'back_post_new', '_controller' => 'App\\Controller\\BackOffice\\PostController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/saves' => [[['_route' => 'back_saves_index', '_controller' => 'App\\Controller\\BackOffice\\SavesController::index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/saves/new' => [[['_route' => 'back_saves_new', '_controller' => 'App\\Controller\\BackOffice\\SavesController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/sous-taches' => [[['_route' => 'back_sous_tache_index', '_controller' => 'App\\Controller\\BackOffice\\SousTacheController::index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/taches' => [[['_route' => 'back_tache_focus_index', '_controller' => 'App\\Controller\\BackOffice\\TacheFocusController::index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/dashboard' => [[['_route' => 'dashboard', '_controller' => 'App\\Controller\\DashboardController::index'], null, ['GET' => 0], null, false, false, null]],
        '/achievements' => [[['_route' => 'front_achievement_index', '_controller' => 'App\\Controller\\FrontOffice\\AchievementController::index'], null, ['GET' => 0], null, false, false, null]],
        '/' => [[['_route' => 'front_home', '_controller' => 'App\\Controller\\FrontOffice\\HomeController::index'], null, null, null, false, false, null]],
        '/posts' => [[['_route' => 'front_post_index', '_controller' => 'App\\Controller\\FrontOffice\\PostController::index'], null, ['GET' => 0], null, false, false, null]],
        '/posts/new' => [[['_route' => 'front_post_new', '_controller' => 'App\\Controller\\FrontOffice\\PostController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/saves' => [[['_route' => 'front_saves_index', '_controller' => 'App\\Controller\\FrontOffice\\SavesController::index'], null, ['GET' => 0], null, false, false, null]],
        '/user' => [[['_route' => 'front_user_home', '_controller' => 'App\\Controller\\FrontTestController::userHome'], null, ['GET' => 0], null, false, false, null]],
        '/user/emotion-journal/analyze' => [[['_route' => 'front_emotion_journal_analyze', '_controller' => 'App\\Controller\\FrontTestController::analyzeEmotionJournal'], null, ['POST' => 0], null, false, false, null]],
        '/user/general-test' => [[['_route' => 'front_general_test', '_controller' => 'App\\Controller\\FrontTestController::generalTest'], null, ['GET' => 0], null, false, false, null]],
        '/user/general-test/submit' => [[['_route' => 'front_general_test_submit', '_controller' => 'App\\Controller\\FrontTestController::submitGeneralTest'], null, ['POST' => 0], null, false, false, null]],
        '/tests/general/create' => [[['_route' => 'general_test_create', '_controller' => 'App\\Controller\\GeneralTestController::create'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/tests/general' => [[['_route' => 'general_test_index', '_controller' => 'App\\Controller\\GeneralTestController::index'], null, ['GET' => 0], null, false, false, null]],
        '/tache' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/profile' => [[['_route' => 'app_profile_show', '_controller' => 'App\\Controller\\ProfileController::show'], null, null, null, false, false, null]],
        '/profile/edit' => [[['_route' => 'app_profile_edit', '_controller' => 'App\\Controller\\ProfileController::edit'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\SecurityController::register'], null, null, null, false, false, null]],
        '/dashboard' => [[['_route' => 'app_dashboard', '_controller' => 'App\\Controller\\SecurityController::dashboard'], null, null, null, false, false, null]],
        '/session/set' => [[['_route' => 'session_set', '_controller' => 'App\\Controller\\SessionController::set'], null, ['GET' => 0], null, false, false, null]],
        '/sous/tache' => [[['_route' => 'app_sous_tache_index', '_controller' => 'App\\Controller\\SousTacheController::index'], null, ['GET' => 0], null, true, false, null]],
        '/sous/tache/new' => [[['_route' => 'app_sous_tache_new', '_controller' => 'App\\Controller\\SousTacheController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/tests/specific/create' => [[['_route' => 'specific_test_create', '_controller' => 'App\\Controller\\SpecificTestController::create'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/tests/specific' => [[['_route' => 'specific_test_index', '_controller' => 'App\\Controller\\SpecificTestController::index'], null, ['GET' => 0], null, false, false, null]],
        '/statistiques' => [[['_route' => 'app_statistiques', '_controller' => 'App\\Controller\\StatistiqueController::index'], null, null, null, false, false, null]],
        '/statistiques/pdf' => [[['_route' => 'app_statistiques_pdf', '_controller' => 'App\\Controller\\StatistiqueController::exportPdf'], null, null, null, false, false, null]],
        '/tache/focus' => [[['_route' => 'app_tache_focus_index', '_controller' => 'App\\Controller\\TacheFocusController::index'], null, ['GET' => 0], null, true, false, null]],
        '/tache/focus/new' => [[['_route' => 'app_tache_focus_new', '_controller' => 'App\\Controller\\TacheFocusController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/users' => [[['_route' => 'app_admin_user_list', '_controller' => 'App\\Controller\\UserAdminController::userList'], null, null, null, false, false, null]],
        '/admin/users/new' => [[['_route' => 'app_admin_user_new', '_controller' => 'App\\Controller\\UserAdminController::userNew'], null, null, null, false, false, null]],
        '/admin/users/profiles' => [[['_route' => 'app_admin_profile_list', '_controller' => 'App\\Controller\\UserAdminController::profileList'], null, null, null, false, false, null]],
        '/user/ai/chat' => [[['_route' => 'user_ai_chat', '_controller' => 'App\\Controller\\UserAiChatController::chat'], null, ['GET' => 0], null, false, false, null]],
        '/user/ai/chat/message' => [[['_route' => 'user_ai_chat_message', '_controller' => 'App\\Controller\\UserAiChatController::send'], null, ['POST' => 0], null, false, false, null]],
        '/user/history/pdf' => [[['_route' => 'user_history_pdf', '_controller' => 'App\\Controller\\UserPdfController::exportHistoryPdf'], null, ['GET' => 0], null, false, false, null]],
        '/user/statistics/pdf' => [[['_route' => 'user_statistics_pdf', '_controller' => 'App\\Controller\\UserPdfController::exportStatisticsPdf'], null, ['GET' => 0], null, false, false, null]],
        '/user/history' => [[['_route' => 'user_test_history', '_controller' => 'App\\Controller\\UserProgressController::history'], null, ['GET' => 0], null, false, false, null]],
        '/user/evolution' => [[['_route' => 'user_test_evolution', '_controller' => 'App\\Controller\\UserProgressController::evolution'], null, ['GET' => 0], null, false, false, null]],
        '/user/statistics' => [[['_route' => 'user_statistics_dashboard', '_controller' => 'App\\Controller\\UserStatisticsController::index'], null, ['GET' => 0], null, false, false, null]],
        '/user/statistics/send-email' => [[['_route' => 'user_statistics_send_email', '_controller' => 'App\\Controller\\UserStatisticsController::sendStatisticsEmail'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/admin/(?'
                    .'|achievements/([^/]++)/(?'
                        .'|edit(*:241)'
                        .'|delete(*:255)'
                    .')'
                    .'|posts/([^/]++)/(?'
                        .'|comments/([^/]++)/(?'
                            .'|edit(*:307)'
                            .'|delete(*:321)'
                        .')'
                        .'|edit(*:334)'
                        .'|stats(*:347)'
                        .'|delete(*:361)'
                    .')'
                    .'|saves/([^/]++)/(?'
                        .'|edit(*:392)'
                        .'|delete(*:406)'
                    .')'
                    .'|users/(?'
                        .'|([^/]++)/(?'
                            .'|edit(*:440)'
                            .'|delete(*:454)'
                        .')'
                        .'|profiles/([^/]++)/(?'
                            .'|edit(*:488)'
                            .'|delete(*:502)'
                        .')'
                        .'|([^/]++)(*:519)'
                    .')'
                .')'
                .'|/posts/(?'
                    .'|([^/]++)/comments/(?'
                        .'|new(*:563)'
                        .'|([^/]++)/react(*:585)'
                    .')'
                    .'|(\\d+)(*:599)'
                    .'|([^/]++)/(?'
                        .'|react(*:624)'
                        .'|summarize(*:641)'
                        .'|translate(*:658)'
                        .'|edit(*:670)'
                        .'|delete(*:684)'
                    .')'
                .')'
                .'|/s(?'
                    .'|aves/post/(\\d+)(*:714)'
                    .'|ous/tache/([^/]++)(?'
                        .'|(*:743)'
                        .'|/edit(*:756)'
                        .'|(*:764)'
                    .')'
                .')'
                .'|/user/(?'
                    .'|general\\-test/result/([^/]++)(*:812)'
                    .'|specific\\-test/([^/]++)(?'
                        .'|(*:846)'
                        .'|/submit(*:861)'
                    .')'
                .')'
                .'|/t(?'
                    .'|ests/(?'
                        .'|general/([^/]++)(?'
                            .'|/(?'
                                .'|edit(*:911)'
                                .'|delete(*:925)'
                            .')'
                            .'|(*:934)'
                        .')'
                        .'|specific/([^/]++)(?'
                            .'|/(?'
                                .'|edit(*:971)'
                                .'|delete(*:985)'
                            .')'
                            .'|(*:994)'
                        .')'
                    .')'
                    .'|ache/focus/([^/]++)(?'
                        .'|(*:1026)'
                        .'|/(?'
                            .'|ia(?'
                                .'|(*:1044)'
                                .'|\\-advice(*:1061)'
                            .')'
                            .'|music(*:1076)'
                            .'|holidays(*:1093)'
                            .'|books(*:1107)'
                            .'|edit(*:1120)'
                        .')'
                        .'|(*:1130)'
                    .')'
                .')'
                .'|/lifecycle/(?'
                    .'|general/([^/]++)/(?'
                        .'|archive(*:1182)'
                        .'|duplicate(*:1200)'
                    .')'
                    .'|specific/([^/]++)/(?'
                        .'|archive(*:1238)'
                        .'|duplicate(*:1256)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        241 => [[['_route' => 'back_achievement_edit', '_controller' => 'App\\Controller\\BackOffice\\AchievementController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        255 => [[['_route' => 'back_achievement_delete', '_controller' => 'App\\Controller\\BackOffice\\AchievementController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        307 => [[['_route' => 'back_comment_edit', '_controller' => 'App\\Controller\\BackOffice\\CommentController::edit'], ['postId', 'id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        321 => [[['_route' => 'back_comment_delete', '_controller' => 'App\\Controller\\BackOffice\\CommentController::delete'], ['postId', 'id'], ['POST' => 0], null, false, false, null]],
        334 => [[['_route' => 'back_post_edit', '_controller' => 'App\\Controller\\BackOffice\\PostController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        347 => [[['_route' => 'back_post_stats', '_controller' => 'App\\Controller\\BackOffice\\PostController::stats'], ['id'], ['GET' => 0], null, false, false, null]],
        361 => [[['_route' => 'back_post_delete', '_controller' => 'App\\Controller\\BackOffice\\PostController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        392 => [[['_route' => 'back_saves_edit', '_controller' => 'App\\Controller\\BackOffice\\SavesController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        406 => [[['_route' => 'back_saves_delete', '_controller' => 'App\\Controller\\BackOffice\\SavesController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        440 => [[['_route' => 'app_admin_user_edit', '_controller' => 'App\\Controller\\UserAdminController::userEdit'], ['id'], null, null, false, false, null]],
        454 => [[['_route' => 'app_admin_user_delete', '_controller' => 'App\\Controller\\UserAdminController::userDelete'], ['id'], ['POST' => 0], null, false, false, null]],
        488 => [[['_route' => 'app_admin_profile_edit', '_controller' => 'App\\Controller\\UserAdminController::profileEdit'], ['id'], null, null, false, false, null]],
        502 => [[['_route' => 'app_admin_profile_delete', '_controller' => 'App\\Controller\\UserAdminController::profileDelete'], ['id'], ['POST' => 0], null, false, false, null]],
        519 => [[['_route' => 'app_admin_user_show', '_controller' => 'App\\Controller\\UserAdminController::userShow'], ['id'], null, null, false, true, null]],
        563 => [[['_route' => 'front_comment_new', '_controller' => 'App\\Controller\\FrontOffice\\CommentController::new'], ['postId'], ['POST' => 0], null, false, false, null]],
        585 => [[['_route' => 'front_comment_react', '_controller' => 'App\\Controller\\FrontOffice\\CommentController::react'], ['postId', 'id'], ['POST' => 0], null, false, false, null]],
        599 => [[['_route' => 'front_post_show', '_controller' => 'App\\Controller\\FrontOffice\\PostController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        624 => [[['_route' => 'front_post_react', '_controller' => 'App\\Controller\\FrontOffice\\PostController::react'], ['id'], ['POST' => 0], null, false, false, null]],
        641 => [[['_route' => 'front_post_summarize', '_controller' => 'App\\Controller\\FrontOffice\\PostController::summarize'], ['id'], ['POST' => 0], null, false, false, null]],
        658 => [[['_route' => 'front_post_translate', '_controller' => 'App\\Controller\\FrontOffice\\PostController::translate'], ['id'], ['POST' => 0], null, false, false, null]],
        670 => [[['_route' => 'front_post_edit', '_controller' => 'App\\Controller\\FrontOffice\\PostController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        684 => [[['_route' => 'front_post_delete', '_controller' => 'App\\Controller\\FrontOffice\\PostController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        714 => [[['_route' => 'front_saves_save', '_controller' => 'App\\Controller\\FrontOffice\\SavesController::save'], ['postId'], ['POST' => 0], null, false, true, null]],
        743 => [[['_route' => 'app_sous_tache_show', '_controller' => 'App\\Controller\\SousTacheController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        756 => [[['_route' => 'app_sous_tache_edit', '_controller' => 'App\\Controller\\SousTacheController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        764 => [[['_route' => 'app_sous_tache_delete', '_controller' => 'App\\Controller\\SousTacheController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        812 => [[['_route' => 'front_general_result', '_controller' => 'App\\Controller\\FrontTestController::generalResult'], ['scoreId'], ['GET' => 0], null, false, true, null]],
        846 => [[['_route' => 'front_specific_test', '_controller' => 'App\\Controller\\FrontTestController::specificTest'], ['category'], ['GET' => 0], null, false, true, null]],
        861 => [[['_route' => 'front_specific_test_submit', '_controller' => 'App\\Controller\\FrontTestController::submitSpecificTest'], ['id'], ['POST' => 0], null, false, false, null]],
        911 => [[['_route' => 'general_test_edit', '_controller' => 'App\\Controller\\GeneralTestController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        925 => [[['_route' => 'general_test_delete', '_controller' => 'App\\Controller\\GeneralTestController::delete'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        934 => [[['_route' => 'general_test_show', '_controller' => 'App\\Controller\\GeneralTestController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        971 => [[['_route' => 'specific_test_edit', '_controller' => 'App\\Controller\\SpecificTestController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        985 => [[['_route' => 'specific_test_delete', '_controller' => 'App\\Controller\\SpecificTestController::delete'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        994 => [[['_route' => 'specific_test_show', '_controller' => 'App\\Controller\\SpecificTestController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1026 => [[['_route' => 'app_tache_focus_show', '_controller' => 'App\\Controller\\TacheFocusController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1044 => [[['_route' => 'app_tache_focus_ai', '_controller' => 'App\\Controller\\TacheFocusController::generateAiSuggestions'], ['id'], ['POST' => 0], null, false, false, null]],
        1061 => [[['_route' => 'app_tache_focus_ai_advice', '_controller' => 'App\\Controller\\TacheFocusController::generateAiAdvice'], ['id'], ['POST' => 0], null, false, false, null]],
        1076 => [[['_route' => 'app_tache_focus_music', '_controller' => 'App\\Controller\\TacheFocusController::recommendMusic'], ['id'], ['POST' => 0], null, false, false, null]],
        1093 => [[['_route' => 'app_tache_focus_holidays', '_controller' => 'App\\Controller\\TacheFocusController::showHolidays'], ['id'], ['POST' => 0], null, false, false, null]],
        1107 => [[['_route' => 'app_tache_focus_books', '_controller' => 'App\\Controller\\TacheFocusController::recommendBooks'], ['id'], ['POST' => 0], null, false, false, null]],
        1120 => [[['_route' => 'app_tache_focus_edit', '_controller' => 'App\\Controller\\TacheFocusController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1130 => [[['_route' => 'app_tache_focus_delete', '_controller' => 'App\\Controller\\TacheFocusController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        1182 => [[['_route' => 'lifecycle_general_archive', '_controller' => 'App\\Controller\\TestLifecycleController::archiveGeneral'], ['id'], null, null, false, false, null]],
        1200 => [[['_route' => 'lifecycle_general_duplicate', '_controller' => 'App\\Controller\\TestLifecycleController::duplicateGeneral'], ['id'], null, null, false, false, null]],
        1238 => [[['_route' => 'lifecycle_specific_archive', '_controller' => 'App\\Controller\\TestLifecycleController::archiveSpecific'], ['id'], null, null, false, false, null]],
        1256 => [
            [['_route' => 'lifecycle_specific_duplicate', '_controller' => 'App\\Controller\\TestLifecycleController::duplicateSpecific'], ['id'], null, null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
