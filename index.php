<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Beauty - Салон красоты в Москве</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
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
                        <div class="select-wrapper" style="flex: 1;">
                            <select id="timeSelect" required>
                                <option value="" disabled selected>Выберите время</option>
                            </select>
                        </div>
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
                <div class="logo">
                    <img src="img/13.jpg" alt="Nova Beauty" class="logo__img">
                    <span class="logo__text">Nova Beauty</span>
                </div>
                <nav class="nav">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="#services" class="nav__link">Услуги</a></li>
                        <li class="nav__item"><a href="#promotions" class="nav__link">Акции</a></li>
                        <li class="nav__item"><a href="masters.php" class="nav__link">Мастера</a></li>
                        <li class="nav__item"><a href="contacts.php" class="nav__link">Контакты</a></li>
                        <li class="nav__item"><a href="#about" class="nav__link">О салоне</a></li>
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
            <div class="img-mesenge-style">
                <div class="hero__content">
                    <h1 class="hero__title">Салон красоты<br>в самом сердце<br>Москвы</h1>
                </div>
                <div class="img-style">
                    <img src="img/1.jpg" alt="Салон красоты" class="hero__image">
                </div>
            </div>
        </div>


        <section class="white-block" id="services">
            <div class="container">
                <div class="services-section">
                    <h2 class="services-title">УСЛУГИ</h2>
                    <div class="services-grid">
                        <div class="service-item">
                            <a href="services1.php" class="service-image-link">
                                <img src="img/2.jpg" alt="Парикмахерские услуги" class="service-image">
                            </a>
                            <a href="services1.php" class="service-text-link">
                                <h3 class="service-name">Парикмахерские услуги</h3>
                            </a>
                        </div>

                        <div class="service-item">
                            <a href="services2.php" class="service-image-link">
                                <img src="img/3.jpg" alt="Ногтевой сервис" class="service-image">
                            </a>
                            <a href="services2.php" class="service-text-link">
                                <h3 class="service-name">Ногтевой сервис</h3>
                            </a>
                        </div>

                        <div class="service-item">
                            <a href="services3.php" class="service-image-link">
                                <img src="img/4.jpg" alt="Косметология" class="service-image">
                            </a>
                            <a href="services3.php" class="service-text-link">
                                <h3 class="service-name">Косметология</h3>
                            </a>
                        </div>

                        <div class="service-item">
                            <a href="services4.php" class="service-image-link">
                                <img src="img/5.jpg" alt="Массаж и СПА" class="service-image">
                            </a>
                            <a href="services4.php" class="service-text-link">
                                <h3 class="service-name">Массаж и СПА</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="promotions-section" id="promotions">
            <div class="container">
                <h2 class="promotions-title">АКЦИИ</h2>
                <div class="promotions-grid">
                    <div class="promotion-item">
                        <img src="img/6.jpg" alt="Скидка 15%" class="promotion-image">
                        <div class="promotion-text-container text-bottom-left">
                            <p class="promotion-date">в ваш 1-й визит</p>
                            <p class="promotion-discount">Скидка 15%</p>
                        </div>
                    </div>

                    <div class="promotion-item">
                        <img src="img/7.jpg" alt="Weekend здоровых волос" class="promotion-image">
                        <div class="promotion-text-container text-left-three-lines">
                            <p class="promotion-weekend-date">14-15 июня</p>
                            <p class="promotion-weekend-title">WEEKEND<br>ЗДОРОВЫХ ВОЛОС</p>
                            <p class="promotion-weekend-description">Коктейли для волос,кожи и<br> настроения</p>
                        </div>
                    </div>

                    <div class="promotion-item">
                        <img src="img/8.jpg" alt="Образ для выпускниц" class="promotion-image">
                        <div class="promotion-text-container text-top-left">
                            <p class="promotion-graduation-date">15 по 28 июня</p>
                            <p class="promotion-graduation-text">Профессиональный<br>образ для выпускниц</p>
                        </div>
                    </div>

                    <div class="promotion-item">
                        <img src="img/9.jpg" alt="День бренда L'Oreal" class="promotion-image">
                        <div class="promotion-text-container text-bottom-left">
                            <p class="promotion-brand-day">26 июня</p>
                            <p class="promotion-brand-name">День бренда L'Oreal</p>
                        </div>
                    </div>
                </div>

                <div class="promotions-button-container">
                    <a href="stocks.php" class="promotions-button">Посмотреть все акции</a>
                </div>
            </div>
        </section>

        <section class="reviews-section">
            <div class="container">
                <h2 class="reviews-title">Отзывы клиентов</h2>
                <div class="reviews-container">
                    <div class="reviews-scroller">
                        <div class="reviews-track">
                        </div>
                    </div>
                    <button class="reviews-arrow reviews-arrow-prev">‹</button>
                    <button class="reviews-arrow reviews-arrow-next">›</button>
                </div>
            </div>
        </section>

        <section class="about-section" id="about">
            <div class="container">
                <div class="about-header">
                    <div class="title-line"></div>
                    <h2 class="about-title">О САЛОНЕ</h2>
                </div>
                <div class="about-content">
                    <div class="about-text">
                        <p>Сегодня большинство людей хотят выглядеть стильно и ухоженно,<br>
                            ведь внешность является важнейшей составляющей успеха.<br>
                            Побалуйте себя действительно качественными процедурами по уходу<br>
                            за волосами, лицом и телом, ногтями в салоне красоты «Nova<br>
                            Beauty». У нас нравится даже самым требовательным клиентам</p>
                    </div>
                    <div class="about-image">
                        <img src="img/10.jpg" alt="Фото салона">
                    </div>
                </div>
            </div>
        </section>

        <section class="licenses-section">
            <div class="container">
                <h2 class="section-title">Лицензии</h2>
                <div class="licenses-images">
                    <img src="img/11.jpg" alt="Лицензия 1">
                    <img src="img/12.jpg" alt="Лицензия 2">
                </div>
            </div>
        </section>

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