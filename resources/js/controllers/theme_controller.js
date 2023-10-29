import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
    static targets = ["toggleButton"];

    connect() {
        // Устанавливаем начальное значение темы
        const preferredTheme = this.getPreferredTheme();
        this.setTheme(preferredTheme);
    }

    // Функция для смены темы
    toggleTheme() {
        const currentTheme = this.getTheme();

        // Проверяем текущую тему и меняем на противоположную
        if (currentTheme === "light") {
            this.setTheme("dark");
        } else {
            this.setTheme("light");
        }
    }

    // Получение текущей темы из localStorage
    getTheme() {
        const theme = localStorage.getItem("theme");
        return theme ? theme : this.getPreferredTheme();
    }

    // Установка темы и сохранение в localStorage
    setTheme(theme) {
        document.documentElement.setAttribute("data-bs-theme", theme);
        localStorage.setItem("theme", theme);
    }

    // Получение предпочитаемой темы
    getPreferredTheme() {
        const storedTheme = localStorage.getItem("theme");
        if (storedTheme) {
            return storedTheme;
        }

        return window.matchMedia("(prefers-color-scheme: dark)").matches
            ? "dark"
            : "light";
    }
}
