import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['preferred'];
    initialize() {
        // Устанавливаем начальное значение темы
        this.setThemeBody(this.getThemeValue());
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => this.toggleTheme());
    }

    // Функция для смены темы
    toggleTheme() {
        let theme = this.preferredTargets.find((element) => element.checked)?.value;

        if (theme === undefined) {
            return;
        }

        this.setThemeStorage(theme);
        this.setThemeBody(theme);
    }

    // Получение текущей темы из localStorage
    getThemeValue() {
        const theme = localStorage.getItem('theme');

        if (theme === null) {
            return 'auto';
        }

        return theme;
    }

    // Получение текущей темы из localStorage
    getTheme(theme) {
        if (['dark', 'light'].includes(theme)) {
            return theme;
        }

        return this.getPreferredTheme();
    }

    // Установка темы и сохранение в localStorage
    setThemeStorage(theme) {
        localStorage.setItem('theme', theme);
    }

    setThemeBody(theme) {
        document.documentElement.setAttribute('data-bs-theme', this.getTheme(theme));
        this.preferredTargets.find((element) => element.value === theme)?.setAttribute('checked', true);
    }

    // Получение предпочитаемой темы
    getPreferredTheme() {
        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }
}
