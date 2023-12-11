import {Controller} from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['preferred'];

    connect() {
        // Устанавливаем начальное значение темы
        const preferredTheme = this.getTheme();
        this.setTheme(preferredTheme);

        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => this.toggleTheme());
    }

    // Функция для смены темы
    toggleTheme() {
        let theme = this.preferredTargets.find((element) => element.checked)?.value;

        if (theme === undefined) {
            return;
        }

        this.setTheme(theme);
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
    setTheme(theme) {
        localStorage.setItem('theme', theme);

        document.documentElement.setAttribute('data-bs-theme', this.getTheme());

        this.preferredTargets.find((element) => element.value === theme)?.setAttribute('checked', true);
    }

    // Получение предпочитаемой темы
    getPreferredTheme() {
        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }
}
