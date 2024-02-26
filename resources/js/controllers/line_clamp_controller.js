import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['content'];

    connect() {
        this.applyLineClamp();
        window.addEventListener('resize', this.applyLineClamp.bind(this));
    }

    disconnect() {
        window.removeEventListener('resize', this.applyLineClamp.bind(this));
    }

    /**
     * Применяет стилевое ограничение по числу строк для контента
     */
    applyLineClamp() {
        // Определяем элемент контента для применения ограничения
        const contentEl = this.hasContentTarget ? this.contentTarget : this.element;

        // Пока высота содержимого больше, чем высота контейнера и число дочерних элементов больше 3
        while (contentEl.scrollHeight > contentEl.offsetHeight && contentEl.childElementCount > 3) {
            if (contentEl.lastElementChild.length > 3) {
                contentEl.lastElementChild.textContent = contentEl.lastElementChild.textContent.replace(
                    /\W*\s(\S)*$/,
                    '...'
                );
            } else {
                contentEl.lastElementChild.remove();
            }
        }
    }
}
