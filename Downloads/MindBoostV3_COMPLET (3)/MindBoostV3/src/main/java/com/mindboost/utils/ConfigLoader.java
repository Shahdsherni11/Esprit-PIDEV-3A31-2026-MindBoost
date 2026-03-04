package com.mindboost.utils;

import com.mindboost.services.BrevoEmailService;
import com.mindboost.services.OpenRouterService;

import java.io.IOException;
import java.io.InputStream;
import java.util.Properties;

/**
 * Charge la configuration depuis config.properties
 * Permet de configurer les clés API sans recompiler
 */
public class ConfigLoader {

    private static Properties props;

    public static void load() {
        props = new Properties();
        try {
            InputStream is = ConfigLoader.class.getResourceAsStream("/config.properties");
            if (is != null) {
                props.load(is);
                // Injecte les clés dans les services
                String openrouterKey = get("OPENROUTER_API_KEY");
                String brevoKey      = get("BREVO_API_KEY");

                if (openrouterKey != null && !openrouterKey.equals("YOUR_KEY_HERE")) {
                    OpenRouterService.setApiKey(openrouterKey);
                    System.out.println("✅ Clé OpenRouter chargée");
                } else {
                    System.out.println("⚠️ Clé OpenRouter non configurée (mode demo)");
                }

                if (brevoKey != null && !brevoKey.equals("YOUR_KEY_HERE")) {
                    BrevoEmailService.setApiKey(brevoKey);
                    System.out.println("✅ Clé Brevo chargée");
                } else {
                    System.out.println("⚠️ Clé Brevo non configurée");
                }
            }
        } catch (IOException e) {
            System.err.println("⚠️ config.properties non trouvé: " + e.getMessage());
        }
    }

    public static String get(String key) {
        if (props == null) return null;
        // Priorité: variable d'environnement > config.properties
        String envVal = System.getenv(key);
        return envVal != null ? envVal : props.getProperty(key);
    }
}
