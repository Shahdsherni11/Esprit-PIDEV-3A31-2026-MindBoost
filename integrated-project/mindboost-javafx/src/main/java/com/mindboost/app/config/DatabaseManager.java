package com.mindboost.app.config;

import jakarta.persistence.EntityManager;
import jakarta.persistence.EntityManagerFactory;
import jakarta.persistence.Persistence;
import org.flywaydb.core.Flyway;

import java.util.HashMap;
import java.util.Map;

public class DatabaseManager {
    private final EntityManagerFactory entityManagerFactory;

    public DatabaseManager(AppConfig config) {
        String url = config.get("db.url", "jdbc:mysql://localhost:3306/mindboost?serverTimezone=UTC");
        String user = config.get("db.user", "root");
        String password = config.get("db.password", "");

        Flyway flyway = Flyway.configure()
            .dataSource(url, user, password)
            .baselineOnMigrate(config.getBoolean("flyway.baseline", true))
            .validateOnMigrate(true)
            .load();
        flyway.migrate();

        Map<String, Object> overrides = new HashMap<>();
        overrides.put("jakarta.persistence.jdbc.url", url);
        overrides.put("jakarta.persistence.jdbc.user", user);
        overrides.put("jakarta.persistence.jdbc.password", password);
        overrides.put("jakarta.persistence.jdbc.driver", "com.mysql.cj.jdbc.Driver");
        overrides.put("hibernate.hbm2ddl.auto", "validate");
        overrides.put("hibernate.show_sql", "false");
        overrides.put("hibernate.format_sql", "true");
        overrides.put("hibernate.jdbc.time_zone", "UTC");

        this.entityManagerFactory = Persistence.createEntityManagerFactory("mindboostPU", overrides);
    }

    public EntityManager createEntityManager() {
        return entityManagerFactory.createEntityManager();
    }

    public void close() {
        entityManagerFactory.close();
    }
}
