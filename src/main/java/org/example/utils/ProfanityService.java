package org.example.utils;

import com.modernmt.text.profanity.ProfanityFilter;

public final class ProfanityService {
    private static final ProfanityFilter FILTER = new ProfanityFilter();

    private ProfanityService() {}

    public static boolean isProfane(String text) {
        if (text == null || text.isBlank()) return false;
        return FILTER.test("fr", text) || FILTER.test("en", text);
    }
}
