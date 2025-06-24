<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Парикмахерские услуги - Nova Beauty</title>
    <link rel="stylesheet" href="services1.css">
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

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
                <div class="password-field-wrapper">
                    <div class="password-input-container">
                        <input class="reg-form__input password-input" type="password" name="password" id="regPassword" placeholder="Пароль" required maxlength="20" />
                        <span class="password-toggle" onclick="togglePasswordVisibility('regPassword', this)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 12s3-5.5 10-5.5S22 12 22 12"></path>
                                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                            </svg>
                        </span>
                    </div>
                    <span class="password-error" id="regPasswordError"></span>
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
                <div class="password-field-wrapper">
                    <div class="password-input-container">
                        <input class="reg-form__input password-input" type="password" name="password" id="loginPassword" placeholder="Пароль" required maxlength="20" />
                        <span class="password-toggle" onclick="togglePasswordVisibility('loginPassword', this)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 12s3-5.5 10-5.5S22 12 22 12"></path>
                                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                            </svg>
                        </span>
                    </div>
                    <span class="password-error" id="loginPasswordError"></span>
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

            <form class="booking-form" action="booking.php" method="POST">
                <input type="text" name="client_name" placeholder="Имя..." required>

                <div class="select-wrapper">
                    <select id="serviceType" name="service_type" required>
                        <option value="" disabled selected>Выберите услугу</option>
                        <option value="Ногтевой сервис">Ногтевой сервис</option>
                        <option value="Парикмахерские услуги">Парикмахерские услуги</option>
                        <option value="Косметология">Косметология</option>
                        <option value="Массаж и СПА">Массаж и СПА</option>
                    </select>
                </div>

                <div class="select-wrapper">
                    <select id="serviceCategory" name="service_category" required disabled>
                        <option value="" disabled selected>Выберите тип услуги</option>
                    </select>
                </div>

                <div class="select-wrapper">
                    <select id="specificService" name="specific_service" required disabled>
                        <option value="" disabled selected>Выберите конкретную услугу</option>
                    </select>
                </div>

                <div class="select-wrapper">
                    <select id="masterSelect" name="master" required>
                        <option value="" disabled selected>Выберите мастера</option>
                    </select>
                </div>

                <div style="display: flex; gap: 15px;">
                    <input type="text" name="booking_date" placeholder="30-05-2025" style="flex: 1;"
                        onfocus="(this.type='date')" onblur="(this.type='text')" required>
                    <div class="select-wrapper" style="flex: 1;">
                        <select name="booking_time" required>
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

    <main class="main">
        <div class="container">
            <section class="services">
                <h1 class="services__title">Парикмахерские услуги</h1>
                <h2 class="services__subtitle">Прайс-лист</h2>

                <div class="tables-container">
                    <div class="tables-row">
                        <div class="price-block haircuts-block">
                            <table class="price-table haircuts-table">
                                <thead>
                                    <tr>
                                        <th>Стрижки и укладки</th>
                                        <th>Стоимость</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Детский стиль</td>
                                        <td>2700/3500 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Экспресс-укладка</td>
                                        <td>2500/2900 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Укладка дневная</td>
                                        <td>2800/3500 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Укладка коктейльная</td>
                                        <td>4900/5300 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Вечерняя прическа</td>
                                        <td>5500/6500 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Коррекция челки</td>
                                        <td>1100/1400 ₽</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="price-block blonding-block">
                            <table class="price-table blonding-table">
                                <thead>
                                    <tr>
                                        <th>Блондирование</th>
                                        <th>Стоимость</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Блондирование 1 / до 50гр</td>
                                        <td>4300/4700 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Блондирование 2 / 51-100гр</td>
                                        <td>5100/5700 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Блондирование 3 / 101 - 150гр</td>
                                        <td>6400/7600 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Камуфляж седины</td>
                                        <td>3800/3800 ₽</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tables-row">
                        <div class="price-block coloring-block">
                            <table class="price-table coloring-table">
                                <thead>
                                    <tr>
                                        <th>Окрашивания</th>
                                        <th>Стоимость</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Окрашивание 1/ до 75гр</td>
                                        <td>7900/8800 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Окрашивание 2/ до 120 гр</td>
                                        <td>9900/11000 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Окрашивание 3/ до 180 г</td>
                                        <td>11800/14400 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Камуфляж седины</td>
                                        <td>3800/3800 ₽</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="price-block highlighting-block">
                            <table class="price-table highlighting-table">
                                <thead>
                                    <tr>
                                        <th>Мелирование</th>
                                        <th>Стоимость</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Мелирование 1/ до 50 гр</td>
                                        <td>9100/10000 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Мелирование 2/ до 100 гр</td>
                                        <td>11000/12200 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Мелирование 3/ до 150 гр</td>
                                        <td>13100/15900 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Камуфляж седины</td>
                                        <td>3800/3800 ₽</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
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
    </main>

    <script src="script.js"></script>
    <script src="authorization.js"></script>
</body>

</html>