import * as Turbo from '@hotwired/turbo';
import { Application } from '@hotwired/stimulus';
import { registerControllers } from 'stimulus-vite-helpers';
import TextareaAutogrow from 'stimulus-textarea-autogrow';
import 'bootstrap';

window.Turbo = Turbo;

const application = (window.application = Application.start());
const controllers = import.meta.glob('./**/*_controller.js', { eager: true });

registerControllers(application, controllers);

application.register('textarea-autogrow', TextareaAutogrow);

import './initializers/service-worker';
import './initializers/yandex-metrika.js';
