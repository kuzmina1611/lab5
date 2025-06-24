<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Beauty - Салон красоты в Москве</title>
    <link rel="stylesheet" href="masters.css">
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

    <main>
        <section class="masters-section">
            <div class="container">
                <h1 class="masters-title">Мастера</h1>
                <div class="masters-grid">
                    <div class="master-card-transparent">
                        <div class="master-image-wrapper">
                            <img src="img/20.jpg" alt="Анна Агашкова" class="master-image-blurred">
                            <div class="master-info-transparent">
                                <h2 class="master-name-transparent">Анна Агашкова</h2>
                                <p class="master-specialty-transparent">Косметолог-эстетист</p>
                            </div>
                        </div>
                        <div class="master-button-wrapper">
                            <a href="#" class="master-more-transparent">Подробнее</a>
                        </div>
                    </div>
                    <div class="master-card-transparent">
                        <div class="master-image-wrapper">
                            <img src="img/21.png" alt="Анастасия Кривоносова" class="master-image-blurred">
                            <div class="master-info-transparent">
                                <h2 class="master-name-transparent">Анастасия Кривоносова</h2>
                                <p class="master-specialty-transparent">Косметолог</p>
                            </div>
                        </div>
                        <div class="master-button-wrapper">
                            <a href="#" class="master-more-transparent">Подробнее</a>
                        </div>
                    </div>

                    <div class="master-card-transparent">
                        <div class="master-image-wrapper">
                            <img src="img/22.jpg" alt="Екатерина Иванова" class="master-image-blurred">
                            <div class="master-info-transparent">
                                <h2 class="master-name-transparent">Екатерина Иванова</h2>
                                <p class="master-specialty-transparent">Арт-nail</p>
                            </div>
                        </div>
                        <div class="master-button-wrapper">
                            <a href="#" class="master-more-transparent">Подробнее</a>
                        </div>
                    </div>

                    <div class="master-card-transparent">
                        <div class="master-image-wrapper">
                            <img src="img/23.jpg" alt="Марина Белова" class="master-image-blurred">
                            <div class="master-info-transparent">
                                <h2 class="master-name-transparent">Марина Белова</h2>
                                <p class="master-specialty-transparent">Арт-nail</p>
                            </div>
                        </div>
                        <div class="master-button-wrapper">
                            <a href="#" class="master-more-transparent">Подробнее</a>
                        </div>
                    </div>

                    <div class="master-card-transparent">
                        <div class="master-image-wrapper">
                            <img src="img/24.jpg" alt="Кристина Калайджан" class="master-image-blurred">
                            <div class="master-info-transparent">
                                <h2 class="master-name-transparent">Кристина Калайджан</h2>
                                <p class="master-specialty-transparent">Парикмахер-стилист</p>
                            </div>
                        </div>
                        <div class="master-button-wrapper">
                            <a href="#" class="master-more-transparent">Подробнее</a>
                        </div>
                    </div>

                    <div class="master-card-transparent">
                        <div class="master-image-wrapper">
                            <img src="img/25.jpg" alt="Ирина Сидорова" class="master-image-blurred">
                            <div class="master-info-transparent">
                                <h2 class="master-name-transparent">Мария Кузнецова</h2>
                                <p class="master-specialty-transparent">Парикмахер-стилист</p>
                            </div>
                        </div>
                        <div class="master-button-wrapper">
                            <a href="#" class="master-more-transparent">Подробнее</a>
                        </div>
                    </div>

                    <div class="master-card-transparent">
                        <div class="master-image-wrapper">
                            <img src="img/26.jpg" alt="Валерия Панкратова" class="master-image-blurred">
                            <div class="master-info-transparent">
                                <h2 class="master-name-transparent">Валерия Панкратова</h2>
                                <p class="master-specialty-transparent">Массажист</p>
                            </div>
                        </div>
                        <div class="master-button-wrapper">
                            <a href="#" class="master-more-transparent">Подробнее</a>
                        </div>
                    </div>

                    <div class="master-card-transparent">
                        <div class="master-image-wrapper">
                            <img src="img/27.jpg" alt="Татьяна Николаева" class="master-image-blurred">
                            <div class="master-info-transparent">
                                <h2 class="master-name-transparent">Инна Ершова</h2>
                                <p class="master-specialty-transparent">Массажист</p>
                            </div>
                        </div>
                        <div class="master-button-wrapper">
                            <a href="#" class="master-more-transparent">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div id="anna-modal" class="master-modal">
            <div class="master-modal-content">
                <h2>Анна Агашкова Владимировна</h2>
                <p class="master-position">Врач-косметолог, эстетист</p>
                <p class="master-experience">Стаж работы: <span class="highlight">6 лет</span></p>
                <p class="master-skills">Специализируется на инъекционных методиках:<br>
                    биоревитализация, ботокс, плазмотерапия PRP, экспресс-уход для лица, уход для лица по типу кожи,
                    индивидуальный ритуал, сияние молодости.</p>
            </div>
        </div>

        <div id="anastasia-modal" class="master-modal">
            <div class="master-modal-content">
                <h2>Настя Кривоносова Викторовна</h2>
                <p class="master-position">Врач-косметолог </p>
                <p class="master-experience">Стаж работы: <span class="highlight">5 лет</span></p>
                <p class="master-skills">Специализируется на инъекционных методиках и,<br>
                    аппаратной косметологии: биоревитализация,<br>
                    ботокс, плазмотерапия PRP, шлифовка кожи, RF-лифтинг.</p>
            </div>
        </div>

        <div id="ekaterina-modal" class="master-modal">
            <div class="master-modal-content">
                <h2>Екатерина Иванова Алексеевна </h2>
                <p class="master-position">Арт-nail</p>
                <p class="master-experience">Стаж работы: <span class="highlight">2 лет</span></p>
                <p class="master-skills">Специализируется на комплекс маникюр и комплекс педикюр: маникюр+гель лак,
                    пилочный маникюр+гель лак, маникюр+«недельный лак», пилочный маникюр.</p>
            </div>
        </div>

        <div id="marina-modal" class="master-modal">
            <div class="master-modal-content">
                <h2>Марина Белова Сергеевна </h2>
                <p class="master-position">Арт-nail</p>
                <p class="master-experience">Стаж работы: <span class="highlight">6 года</span></p>
                <p class="master-skills">Специализируется на Nail десерт и маникюр без покрытия: SPA EMI, CHRISTINA
                    FITGERALD, CHRISTINA FITGERALD, холодный парафин, маникюр без покрытия, пилочный маникюр без
                    покрытия, Baby-маникюр, холодный парафин.</p>
            </div>
        </div>

        <div id="kristina-modal" class="master-modal">
            <div class="master-modal-content">
                <h2>Кристина Калайджан Павловна</h2>
                <p class="master-position">Парикмахер-стилист</p>
                <p class="master-experience">Стаж работы: <span class="highlight">4 лет</span></p>
                <p class="master-skills">Специализируется на стрижки и укладки и блондирование: детский стиль,
                    экспресс-укладка, укладка дневная, укладка коктейльная, вечерняя прическа, коррекция челки,
                    блондирование 1 / до 50гр, блондирование 2 / 51-100гр, блондирование 3 / 101 - 150гр, камуфляж
                    седины.</p>
            </div>
        </div>

        <div id="maria-modal" class="master-modal">
            <div class="master-modal-content">
                <h2>Мария Кузнецова Дмитриевна</h2>
                <p class="master-position">Парикмахер-стилист</p>
                <p class="master-experience">Стаж работы: <span class="highlight">3 лет</span></p>
                <p class="master-skills">Специализируется на окрашивания и мелирование: окрашивание 1/ до 75гр,
                    окрашивание 2/ до 120 гр, окрашивание 3/ до 180 г, камуфляж седины, мелирование 2/ до 100
                    гр,камуфляж седины, мелирование 1/ до 50 гр, мелирование 3/ до 150 гр.</p>
            </div>
        </div>

        <div id="valeria-modal" class="master-modal">
            <div class="master-modal-content">
                <h2>Валерия Панкратова Яновна </h2>
                <p class="master-position">Массажист</p>
                <p class="master-experience">Стаж работы: <span class="highlight">3 лет</span></p>
                <p class="master-experience">Специализируется на СПА-ритуалы: СПА "Морская релаксация", аромотерапия с
                    горячими камнями
                    СПА для ног "Нежность", комплекс "Королевский уход".</p>
            </div>
        </div>

        <div id="inna-modal" class="master-modal">
            <div class="master-modal-content">
                <h2>Инна Ершова Тимофеевна  </h2>
                <p class="master-position">Массажист</p>
                <p class="master-experience">Стаж работы: <span class="highlight">5 лет</span></p>
                <p class="master-skills">Специализируется на массаж: классический массаж тела, антицеллюлитный массаж,
                    лимфодренажный массаж, тайский массаж, массаж спины.</p>
            </div>
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
    <script src="masters.js"></script>
    <script src="authorization.js"></script>
</body>

</html>