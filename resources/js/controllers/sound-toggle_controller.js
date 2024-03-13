import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['muteButton', 'unmuteButton'];

    connect() {
        this.toggleButtons();
    }

    toggle() {
        this.toggleButtons();

        const audios = document.querySelectorAll('audio');
        audios.forEach((audio) => {
            audio.muted = !audio.muted;
        });
    }

    toggleButtons() {
        this.muteButtonTarget.classList.toggle('d-none', this.isMuted);
        this.unmuteButtonTarget.classList.toggle('d-none', !this.isMuted);
    }

    get isMuted() {
        const firstAudio = document.querySelector('audio');
        return firstAudio && firstAudio.muted;
    }
}
