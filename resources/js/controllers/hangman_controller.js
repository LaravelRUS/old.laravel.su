import {Controller} from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["word", "attempts", "hangmanInput", "audioWrong", "audioLose", "audioWin", "hearts", "image", "log"];

    connect() {
        this.wordList = [
            "Миграция",
            "Контроллер",
            "Модель",
            "Представление",
            "Авторизация",
            "Кеширование",
            "Фасад",
            "Артизан",
            "Компонент",
            "Запрос",
            "Ответ",
            "Фильтр",
            "Валидация",
            "Шаблон",
            "Сессия",
            "Маршрутизация",
            "Консоль",
            "Макет",
            "Директива",
            "Фабрика",
            "Исключение",
            "Блейд",
            "Провайдер",
            "Контейнер",
            "Стратегия",
            "Генератор",
            "Фасад",
            "Очередь",
            "Таск",
            "Сборка",
            "Конфигурация",
            "Маршрут",
            "Композер",
            "Трейт",
            "Метод",
            "Кэш",
            "Автозагрузка",
            "Локализация",
            "Стратегия",
            "Пакет",
            "Расширение",
            "Функциональность",
            "Тестирование",
            "Оператор",
            "Архитектура",
            "Сервис",
            "Контейнер",
            "Структура",
            "Сортировка",
            "Подключение",
            "Наследование",
            "Обновление",
            "Бэкап",
            "Компиляция",
            "Шифрование",
            "Декодирование",
            "Заголовок",
            "Индексация",
            "Клиент",
            "Сервер",
        ];

        this.badList = [
            "Зачем вы пытаетесь? Ваша преданность WordPress выдает вас!",
            "Если не угадаете снова, Yii все останется вашим повелителем",
            "Не унывайте - угадайте слово и избавьтесь от зависимости от VSCode.",
            "Не угадаешь снова, и ты будешь писать на PHP в Notepad",
            "Пишешь JavaScript в блокноте и всё же попробуешь снова?",
            "Какого это загружать файлы через FTP в 2024 году? Попробуйте снова!",
            "Думаю вы с Битриксом на одной волне. Не стоит пытаться снова.",
            "Ну как так? А на вид ты такой умный. Попробуйте снова!",
        ];

        this.secretWord = "";
        this.guesses = [];
        this.maxAttempts = 4;
        this.attemptsLeft = this.maxAttempts;
        this.hiddenWord = "";
        this.gameOver = false;

        this.startGame();
    }

    selectRandomWord() {
        const randomIndex = Math.floor(Math.random() * this.wordList.length);
        this.secretWord = this.wordList[randomIndex].toLowerCase();
        this.hiddenWord = "_".repeat(this.secretWord.length);
        this.updateDisplay();
    }

    checkLetter(letter) {
        if (this.secretWord.includes(letter)) {
            for (let i = 0; i < this.secretWord.length; i++) {
                if (this.secretWord[i] === letter) {
                    this.hiddenWord = this.hiddenWord.substring(0, i) + letter + this.hiddenWord.substring(i + 1);
                }
            }
            if (!this.hiddenWord.includes("_")) {
                this.gameOver = true;
                this.logTarget.textContent = "Поздравляем! Вы выиграли!";
                this.audioWinTarget.play();
                console.log("Поздравляем! Вы выиграли!");
            }
        } else {
            this.attemptsLeft--;
            if (this.attemptsLeft === 0) {
                this.gameOver = true;
                this.audioLoseTarget.play();

                let motivate = this.badList[Math.floor(Math.random() * this.badList.length)];
                this.logTarget.innerHTML = "Игра окончена. Загаданное слово: «<span class='text-primary'>" + this.secretWord + "</span>» " + "<span class='d-block text-balance'>" + motivate + "</span>";
                console.log("Игра окончена. Загаданное слово: " + this.secretWord);
            } else {
                console.log("Неверная буква. Осталось попыток: " + this.attemptsLeft);
                this.wordTarget.classList.add("animate-shake");
                this.audioWrongTarget.play();
                setTimeout(()=> {
                    this.wordTarget.classList.remove("animate-shake");
                }, 550)
            }
        }
        this.updateDisplay();
    }

    updateDisplay() {
        this.wordTarget.textContent = this.hiddenWord;
        this.attemptsTarget.textContent = "Осталось попыток: " + this.attemptsLeft;

        if (this.gameOver === true && this.attemptsLeft > 0) {
            this.updateImage("win")
        } else if (this.attemptsLeft > 0) {
            this.updateImage(this.attemptsLeft)
        } else {
            this.updateImage("lose")
        }

        Array.prototype.slice.call(this.heartsTarget.querySelectorAll('svg'))
            .reverse()
            .forEach((heart, index) => {
                if (index + 1 > this.attemptsLeft) {
                    heart.classList.add("opacity-25");
                } else {
                    heart.classList.remove("opacity-25");
                }
            });
    }

    startGame() {
        this.gameOver = false;
        this.selectRandomWord();
        this.attemptsLeft = this.maxAttempts;
        this.updateImage(this.maxAttempts)
        this.hangmanInputTarget.disabled = false;

        this.heartsTarget.querySelectorAll('svg')
            .forEach((heart, index) => {
                heart.classList.remove("opacity-25");
            });

        this.logTarget.textContent = "";
        console.log("Добро пожаловать в игру!");
        //console.log("Загаданное слово: " + this.secretWord);
    }

    guess(event) {
        event.preventDefault();

        if (this.gameOver) {
            this.hangmanInputTarget.value = "";
            this.hangmanInputTarget.disabled = true;
            //this.logTarget.textContent = "Игра окончена. Начните новую игру.";
            console.log("Игра окончена. Начните новую игру.");
            return;
        }

        this.logTarget.textContent = "";
        const letter = event.target.value.toLowerCase();

        console.log("Введена буква: "+letter);

        if (!this.guesses.includes(letter)) {
            this.guesses.push(letter);
            this.checkLetter(letter);
        } else {
            this.logTarget.textContent = "Вы уже вводили эту букву. Попробуйте другую.";
            console.log("Вы уже вводили эту букву. Попробуйте другую.");
        }

        this.hangmanInputTarget.value = "";
    }


    updateImage(status){
       this.imageTarget.querySelectorAll('img')
            .forEach((image) => {
                if (image.dataset.status == status) {
                    image.classList.remove("d-none");
                } else {
                    image.classList.add("d-none");
                }
            });
    }
}
