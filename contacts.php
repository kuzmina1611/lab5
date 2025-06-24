<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Beauty - Контакты</title>
    <link rel="stylesheet" href="contacts.css">
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://api-maps.yandex.ru/2.1/?apikey=fdec1ce4-21f2-4edc-a32c-18bef32fbbb2&lang=ru_RU"></script>
</head>
<body>
    <div class="auth-modal-reg" id="authModal">
        <div class="auth-modal-reg__content">
            <span class="auth-modal-reg__close" onclick="closeAuthModal()">&times;</span>
            <div class="auth-modal-reg__title" id="authTitle">Регистрация</div>

            <!-- Форма регистрации -->
            <form class="reg-form" id="registerForm" action="auth.php" method="POST" onsubmit="return validateRegisterForm()">
                <div class="form-group">
                    <input class="reg-form__input" type="text" name="name" placeholder="Имя" required />
                </div>
                <div class="form-group">
                    <input class="reg-form__input" type="email" name="email" placeholder="Email" required />
                </div>
                <div class="form-group">
                    <div class="password-input-wrapper">
                        <input class="reg-form__input" type="password" name="password" id="regPassword" placeholder="Пароль" required maxlength="20" />
                        <span class="password-error" id="regPasswordError"></span>
                        <span class="password-toggle" onclick="togglePasswordVisibility('regPassword', this)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 12s3-5.5 10-5.5S22 12 22 12"></path>
                                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="reg-form__btns">
                    <button type="submit" name="register" class="reg-form__submit">Регистрация</button>
                    <button type="button" class="reg-form__switch" onclick="switchToLogin()">Войти</button>
                </div>
            </form>

            <!-- Форма входа -->
            <form class="reg-form" id="loginForm" action="auth.php" method="POST" style="display: none;" onsubmit="return validateLoginForm()">
                <div class="form-group">
                    <input class="reg-form__input" type="email" name="email" placeholder="Email" required />
                </div>
                <div class="form-group">
                    <div class="password-input-wrapper">
                        <input class="reg-form__input" type="password" name="password" id="loginPassword" placeholder="Пароль" required maxlength="20" />
                        <span class="password-error" id="loginPasswordError"></span>
                        <span class="password-toggle" onclick="togglePasswordVisibility('loginPassword', this)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 12s3-5.5 10-5.5S22 12 22 12"></path>
                                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="reg-form__btns">
                    <button type="submit" name="login" class="reg-form__submit">Войти</button>
                    <button type="button" class="reg-form__switch" onclick="switchToRegister()">Регистрация</button>
                </div>
            </form>
        </div>
    </div>
    
    <button id="bookingBtn" class="floating-btn">Онлайн-запись</button>

    <div id="bookingModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 class="modal-title">Онлайн - запись в салон красоты "Nova Beauty"</h2>

            <form class="booking-form">
                <input type="text" placeholder="Имя..." required>

                <div class="select-wrapper">
                    <select id="serviceType" required>
                        <option value="" disabled selected>Выберите услугу</option>
                        <option value="Ногтевой сервис">Ногтевой сервис</option>
                        <option value="Парикмахерские услуги">Парикмахерские услуги</option>
                        <option value="Косметология">Косметология</option>
                        <option value="Массаж и СПА">Массаж и СПА</option>
                    </select>
                </div>

                <div class="select-wrapper">
                    <select id="serviceCategory" required disabled>
                        <option value="" disabled selected>Выберите тип услуги</option>
                    </select>
                </div>

                <div class="select-wrapper">
                    <select id="specificService" required disabled>
                        <option value="" disabled selected>Выберите конкретную услугу</option>
                    </select>
                </div>

                <div class="select-wrapper">
                    <select id="masterSelect" required>
                        <option value="" disabled selected>Выберите мастера</option>
                    </select>
                </div>

                <div style="display: flex; gap: 15px;">
                    <input type="text" placeholder="30-05-2025" style="flex: 1;" onfocus="(this.type='date')"
                        onblur="(this.type='text')">
                    <div class="select-wrapper" style="flex: 1;">
                        <select required>
                            <option value="" disabled selected>Выберите время</option>
                        </select>
                    </div>
                </div>

                <div class="divider"></div>

                <button type="submit" class="submit-btn">Записаться</button>
            </form>
        </div>
    </div>

    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="logo" onclick="window.location.href='index.php'">
                    <img src="img/13.jpg" alt="Nova Beauty" class="logo__img">
                    <span class="logo__text">Nova Beauty</span>
                </div>
                <nav class="nav">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="index.php#services" class="nav__link">Услуги</a></li>
                        <li class="nav__item"><a href="index.php#promotions" class="nav__link">Акции</a></li>
                        <li class="nav__item"><a href="masters.php" class="nav__link">Мастера</a></li>
                        <li class="nav__item"><a href="contacts.php" class="nav__link">Контакты</a></li>
                        <li class="nav__item"><a href="index.php#about" class="nav__link">О салоне</a></li>
                        <li class="nav__item">
                            <a href="#" class="nav__link" onclick="openAuthModal(); return false;">Личный кабинет</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main class="main-content">
        <section class="contacts-section">
            <div class="container">
                <h1 class="section-title">Контакты</h1>

                <div class="contacts-wrapper">
                    <div class="contacts-info">
                        <h2 class="address-title">Адрес</h2>
                        <p class="address-text">м. Электрозаводская,<br>ул. Большая Почтовая, 32, К2</p>

                        <h2 class="contacts-subtitle">Контакты</h2>
                        <p class="phone">+7 926 322 85 73</p>
                        <p class="hours">с 10:00 до 21:00, ежедневно</p>
                        <p class="contact-email">nova.beauty@gmail.com</p>

                        <h2 class="schedulees">График работы</h2>
                        <p class="work">Понедельник - Суббота 9:00-21:00</p>
                        <p class="sunday">Воскресенье 9:00-20:00</p>
                    </div>

                    <div id="yandexMap" class="contacts-map"></div>
                </div>
            </div>
        </section>
        <section class="feedback-section">
            <div class="container">
                <div class="feedback-wrapper">
                    <h2 class="feedback-title">Обратная связь</h2>

                    <form class="feedback-form" action="feedback.php" method="POST">
                        <div class="form-group">
                            <label class="form-label">Ваше имя:</label>
                            <input type="text" name="name" class="form-input" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Email:</label>
                            <input type="email" name="email" class="form-input" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Сообщение:</label>
                            <textarea name="message" class="form-textarea" required></textarea>
                        </div>

                        <button type="submit" class="feedback-submit">Отправить</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer__content">
                <div class="footer__left">
                    <p class="contacts-title">Контакты</p>
                    <p class="contact-link">Связаться</p>
                    <p class="contact-phone">+ 7 926 322 85 73</p>
                    <p class="contact-hours">с 10:00 до 22:00, ежедневно</p>

                    <div class="schedule-block">
                        <p class="schedule-title">График работы</p>
                        <p class="work-days">Понедельник - Суббота 9:00-21:00</p>
                        <p class="sunday-hours">Воскресенье 9:00-20:00</p>
                    </div>
                </div>

                <div class="footer__right">
                    <div class="footer-logo">
                        <img src="img/15.jpg" alt="Nova Beauty" class="footer-logo__img">
                        <span class="footer-logo__text">Nova Beauty</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="contacts.js"></script>
    <script src="script.js"></script>
    <script src="authorization.js"></script>
</body>
</html>