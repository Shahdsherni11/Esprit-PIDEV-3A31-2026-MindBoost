package com.mindboost.app.service;

import java.util.List;

public class ProfanityService {
    private final List<String> badWords = List.of(
        "fuck", "shit", "ass", "bitch", "damn", "crap",
        "merde", "putain", "connard", "salope", "con", "idiot",
        "bastard", "whore", "piss", "cock", "dick", "pussy"
    );

    public boolean isProfane(String text) {
        if (text == null) {
            return false;
        }
        String lower = text.toLowerCase();
        return badWords.stream().anyMatch(lower::contains);
    }

    public String censor(String text) {
        if (text == null) {
            return null;
        }
        String output = text;
        for (String word : badWords) {
            String mask = "*".repeat(word.length());
            output = output.replaceAll("(?i)" + java.util.regex.Pattern.quote(word), mask);
        }
        return output;
    }
}
