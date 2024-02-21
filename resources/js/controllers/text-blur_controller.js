import { Controller } from '@hotwired/stimulus'

export default class extends Controller {
    connect() {
        let spoiler =  this.element;

        spoiler.addEventListener( 'click', (event)=> {
            spoiler.classList.remove('text-blur');
        })

         /*this.element.querySelectorAll('.text-blur')
            .forEach( (item) => {
                item.addEventListener( 'click', (event)=> {

                    item.classList.remove('text-blur');
                })
        });*/
    }
}
