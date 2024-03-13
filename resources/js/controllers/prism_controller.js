import { Controller } from '@hotwired/stimulus';
import Prism from 'prismjs';
import 'prismjs/plugins/line-numbers/prism-line-numbers.js';
import 'prismjs/plugins/line-numbers/prism-line-numbers.css';

export default class extends Controller {
    static targets = ['editable', 'output'];

    /**
     *
     */
    connect() {
        Prism.manual = false;

        [...this.element.querySelectorAll('pre code')].forEach((el) => {
            if (el.getAttribute('class') === null) {
                el.setAttribute('class', 'language-php');
            }

            Prism.highlightElement(el);
        });
    }

    paste() {
        const text = this.editableTarget.innerText;
        let code = Prism.highlight(text, Prism.languages.php, 'php');

        this.changeContent(
            this.editableTarget,
            '<code data-prism-target="code" id="yaml" class="language-php">' + code + '</code>'
        );
        this.outputTarget.value = text;
        // this.codeTarget.innerHTML = '<code data-prism-target="code" id="yaml" class="language-php">'+code+'</code>';
    }

    /**
     *
     * @param event
     */
    keydownPaste(event) {
        if (event.key === 'Enter') {
            setTimeout(() => {
                const position = this.getCursorPosition(this.editableTarget);
                this.setCursorPosition(this.editableTarget, position + 1);
            }, 10);
        }
    }

    // Изменяем содержимое элемента и сохраняем позицию курсора
    changeContent(element, newContent) {
        const position = this.getCursorPosition(element);
        element.innerHTML = newContent;
        this.setCursorPosition(element, position);
    }

    getCursorPosition(element) {
        let position = 0;
        const selection = window.getSelection();

        if (selection.rangeCount > 0) {
            let range = selection.getRangeAt(0);
            const preRange = document.createRange();
            preRange.selectNodeContents(element);
            preRange.setEnd(range.startContainer, range.startOffset);
            position = preRange.toString().length;
            preRange.detach();
        }

        return position;
    }

    setCursorPosition(element, position) {
        const selection = window.getSelection();

        element.focus(); // Установка фокуса на элемент для активации курсора

        const range = document.createRange();
        range.selectNodeContents(element);

        const textNodes = this.getTextNodesIn(element);
        let found = false;

        for (let i = 0; i < textNodes.length; i++) {
            const textNode = textNodes[i];
            const textLength = textNode.textContent.length;

            if (position <= textLength) {
                range.setStart(textNode, position);
                found = true;
                break;
            } else {
                position -= textLength;
            }
        }

        if (!found && element.firstChild) {
            range.setStartAfter(element.lastChild);
        }

        range.collapse(true);

        selection.removeAllRanges();
        selection.addRange(range);
    }

    // Вспомогательная функция для получения всех текстовых узлов внутри элемента
    getTextNodesIn(element) {
        const textNodes = [];

        function getTextNodes(node) {
            if (node.nodeType === Node.TEXT_NODE) {
                textNodes.push(node);
            } else {
                for (const childNode of node.childNodes) {
                    getTextNodes(childNode);
                }
            }
        }

        getTextNodes(element);

        return textNodes;
    }
}
