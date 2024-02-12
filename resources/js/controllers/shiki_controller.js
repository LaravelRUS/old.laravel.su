import {Controller} from '@hotwired/stimulus';
import {
    codeToHtml,
    getHighlighter
} from 'shiki/bundle/web'

import {
    transformerNotationDiff,
    transformerNotationHighlight,
    transformerNotationFocus,
    transformerRemoveLineBreak,
    // ...
} from '@shikijs/transformers';

export default class extends Controller {


    /**
     *
     */
    async connect() {

        const highlighter = await getHighlighter({
            langs: ['html', 'css', 'js', "vue", "php", "yaml", "json", "bash", "shell", "markdown", "blade"],
            themes: ['github-dark'],
        });

        [...this.element.querySelectorAll('pre code')].forEach(async (el) => {
            let lang = el.classList.toString().trim().replace('language-', '') || 'php';

            let code = await codeToHtml(el.innerText, {
                lang: lang,
                theme: 'github-dark',
                transformers: [
                    transformerNotationDiff(),
                    transformerNotationHighlight(),
                    transformerNotationFocus(),
                    transformerRemoveLineBreak(),
                    // ...
                ],
            })

            el.parentElement.outerHTML = code.replace('shiki', 'shiki language-'+lang);
        });
    }


}
