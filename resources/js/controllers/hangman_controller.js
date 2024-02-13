import {Controller} from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["word", "attempts", "hangmanInput"];

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
        this.secretWord = "";
        this.guesses = [];
        this.maxAttempts = 6;
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
                console.log("Поздравляем! Вы выиграли!");
            }
        } else {
            this.attemptsLeft--;
            if (this.attemptsLeft === 0) {
                this.gameOver = true;
                console.log("Игра окончена. Загаданное слово: " + this.secretWord);
            } else {
                console.log("Неверная буква. Осталось попыток: " + this.attemptsLeft);
                this.wordTarget.classList.add("animate-shake");
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
    }

    startGame() {
        this.gameOver = false;
        this.selectRandomWord();
        console.log("Добро пожаловать в игру 'Колица'!");
    }

    guess(event) {
        event.preventDefault();

        if (this.gameOver) {
            console.log("Игра окончена. Начните новую игру.");
            return;
        }

        const letter = event.target.value.toLowerCase();

        console.log("Введена буква: "+letter);

        if (!this.guesses.includes(letter)) {
            this.guesses.push(letter);
            this.checkLetter(letter);
        } else {
            console.log("Вы уже вводили эту букву. Попробуйте другую.");
        }

        this.hangmanInputTarget.value = "";
    }
}
