module org.example {
    requires javafx.controls;
    requires javafx.fxml;
    requires java.sql;
    requires java.net.http;

    opens org.example to javafx.fxml;
    opens org.example.view to javafx.fxml;
    opens org.example.model to javafx.base;
    opens org.example.Service to javafx.fxml;
    opens org.example.controller to javafx.fxml;

    exports org.example;
    exports org.example.controller;
    exports org.example.model;
    exports org.example.view;
    exports org.example.Service;
}