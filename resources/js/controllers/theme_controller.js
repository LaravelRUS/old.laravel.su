import {Controller} from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['preferred'];

    initialize() {
        // Устанавливаем начальное значение темы
        const preferredTheme = this.getPreferredTheme();
        this.setThemeBody(preferredTheme);
    }

    // Функция для смены темы
    toggleTheme() {
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => this.toggleTheme());

        let theme = this.preferredTargets.find((element) => element.checked)?.value;

        if (theme === undefined) {
            return;
        }

        this.setThemeStorage(theme);
        this.setThemeBody(theme);
    }

    // Получение текущей темы из localStorage
    getTheme() {
        const theme = localStorage.getItem('theme');

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
        document.documentElement.setAttribute('data-bs-theme', this.getTheme());
        this.preferredTargets.find((element) => element.value === theme)?.setAttribute('checked', true);
    }

    // Получение предпочитаемой темы
    getPreferredTheme() {
        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }
}
