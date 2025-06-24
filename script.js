document.addEventListener('DOMContentLoaded', function() {
    const reviews = [
        {
            name: "Алиса",
            text: "Была на стрижке и покраске у Кристины, все отлично. Всем довольна и кстати еще и быстрее получилось, чем я ожидала."
        },
        {
            name: "Юля",
            text: "Анастасия — настоящий профессионал своего дела! Очень внимательная и знает, как подчеркнуть естественную красоту."
        },
        {
            name: "Анастасия",
            text: "Очень красивый интерьер в салоне! Делала окрашивание у Марии — все очень понравилось."
        },
        {
            name: "Алиса",
            text: "Постоянно хожу к Екатерине на ногти— большой профессионал своего дела, покрытие держится идеально."
        },
        {
            name: "Катя",
            text: "Пришла уже второй раз, очень понравилась атмосфера и обслуживание. Уютно и комфортно!)"
        },
        {
            name: "Мария",
            text: "Мастера - волшебницы! Делала прическу на новогодний корпоратив, такой красоты, что сотворили девочки, я не видела!"
        }
    ];

    const track = document.querySelector('.reviews-track');
    const prevBtn = document.querySelector('.reviews-arrow-prev');
    const nextBtn = document.querySelector('.reviews-arrow-next');
    

    reviews.forEach(review => {
        const reviewBlock = document.createElement('div');
        reviewBlock.className = 'review-block';
        reviewBlock.innerHTML = `
            <div class="review-name">${review.name}</div>
            <div class="review-text">${review.text}</div>
        `;
        track.appendChild(reviewBlock);
    });


    let currentPosition = 0;
    const reviewBlocks = document.querySelectorAll('.review-block');
    const blockWidth = reviewBlocks[0].offsetWidth;
    const gap = 30;
    const trackWidth = (blockWidth + gap) * reviews.length - gap;

    track.style.width = `${trackWidth}px`;

    function updateButtons() {
        prevBtn.disabled = currentPosition >= 0;
        nextBtn.disabled = currentPosition <= -(trackWidth - track.parentElement.offsetWidth);
    }

    function scrollToPosition(position) {
        currentPosition = position;
        track.style.transform = `translateX(${currentPosition}px)`;
        updateButtons();
    }

    prevBtn.addEventListener('click', () => {
        const scrollAmount = blockWidth + gap;
        const newPosition = Math.min(currentPosition + scrollAmount, 0);
        scrollToPosition(newPosition);
    });

    nextBtn.addEventListener('click', () => {
        const scrollAmount = blockWidth + gap;
        const maxScroll = -(trackWidth - track.parentElement.offsetWidth);
        const newPosition = Math.max(currentPosition - scrollAmount, maxScroll);
        scrollToPosition(newPosition);
    });


    window.addEventListener('resize', () => {
        const maxScroll = -(trackWidth - track.parentElement.offsetWidth);
        if (currentPosition < maxScroll) {
            scrollToPosition(maxScroll);
        } else {
            updateButtons();
        }
    });

    updateButtons();
});



document.addEventListener('DOMContentLoaded', function() {

    const bookingBtn = document.getElementById('bookingBtn');
    const modal = document.getElementById('bookingModal');
    const closeBtn = document.querySelector('.close');
    

    bookingBtn.addEventListener('click', function() {
        modal.style.display = 'flex';
    });
    

    closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });
    
 
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
    

});document.addEventListener('DOMContentLoaded', function() {
    const masters = [
        "Анна Агашкова",
        "Анастасия Кривоносова",
        "Екатерина Иванова",
        "Марина Белова",
        "Кристина Калайджан",
        "Мария Кузнецова",
        "Валерия Панкратова",
        "Инна Ершова"
    ];

    
    const masterSelect = document.getElementById('masterSelect');
    masters.forEach(master => {
        const option = document.createElement('option');
        option.value = master;
        option.textContent = master;
        masterSelect.appendChild(option);
    });

    
    const servicesData = {
        "Парикмахерские услуги": {
            "Стрижки и укладки": [
                "Детский стиль",
                "Экспресс-укладка",
                "Укладка дневная",
                "Укладка коктейльная",
                "Вечерняя прическа",
                "Коррекция челки"
            ],
            "Блондирование": [
                "Блондирование 1 / до 50гр",
                "Блондирование 2 / 51-100гр",
                "Блондирование 3 / 101 - 150гр",
                "Камуфляж седины"
            ],
            "Окрашивания": [
                "Окрашивание 1/ до 75гр",
                "Окрашивание 2/ до 120 гр",
                "Окрашивание 3/ до 180 г",
                "Камуфляж седины"
            ],
            "Мелирование": [
                "Мелирование 1/ до 50 гр",
                "Мелирование 2/ до 100 гр",
                "Мелирование 3/ до 150 гр",
                "Камуфляж седины"
            ]
        },
        "Ногтевой сервис": {
            "Nail десерт": [
                "SPA EMI",
                "CHRISTINA FITGERALD",
                "Холодный парафин"
            ],
            "Маникюр без покрытия": [
                "Маникюр без покрытия",
                "Пилочный маникюр без покрытия",
                "Baby-маникюр",
                "Холодный парафин"
            ],
            "Комплекс маникюр": [
                "Маникюр: гель лак",
                "Пилочный маникюр: гель лак",
                "Маникюр: «недельный лак»",
                "Пилочный маникюр",
                "Комплекс наращивание ногтей"
            ],
            "Комплекс педикюр": [
                "Аппаратный педикюр: гель лак",
                "SMART педикюр: гель лак",
                "Педикюр Golden: гель лак"
            ]
        },
        "Косметология": {
            "Эксперт уход": [
                "Экспресс-уход для лица",
                "Уход для лица по типу кожи",
                "Индивидуальный ритуал",
                "Сияние молодости"
            ],
            "Инъекционные методики": [
                "Биоревитализация",
                "Ботокс",
                "Плазмотерапия PRP"
            ],
            "Аппаратная косметология": [
                "Шлифовка кожи",
                "RF-лифтинг",
                "Ультразвуковая чистка"
            ]
        },
        "Массаж и СПА": {
            "Массаж": [
                "Классический массаж тела (60 мин)",
                "Антицеллюлитный массаж (90 мин)",
                "Лимфодренажный массаж (60 мин)",
                "Тайский массаж (75 мин)",
                "Массаж спины (30 мин)"
            ],
            "СПА-ритуалы": [
                "СПА «Морская релаксация» (120 мин)",
                "Обертывание «Детокс» (60 мин)",
                "Аромотерапия с горячими камнями",
                "СПА для ног «Нежность» (45 мин)",
                "Комплекс «Королевский уход» (90 мин)"
            ]
        }
    };

    
    const serviceTypeSelect = document.getElementById('serviceType');
    const serviceCategorySelect = document.getElementById('serviceCategory');
    const specificServiceSelect = document.getElementById('specificService');

  
    serviceTypeSelect.addEventListener('change', function() {
    
        serviceCategorySelect.innerHTML = '<option value="" disabled selected>Выберите тип услуги</option>';
        specificServiceSelect.innerHTML = '<option value="" disabled selected>Выберите конкретную услугу</option>';
        specificServiceSelect.disabled = true;
        
      
        if (this.value) {
            const categories = Object.keys(servicesData[this.value]);
            categories.forEach(category => {
                const option = document.createElement('option');
                option.value = category;
                option.textContent = category;
                serviceCategorySelect.appendChild(option);
            });
            
           
            serviceCategorySelect.disabled = false;
        } else {
            
            serviceCategorySelect.disabled = true;
        }
    });

   
    serviceCategorySelect.addEventListener('change', function() {
       
        specificServiceSelect.innerHTML = '<option value="" disabled selected>Выберите конкретную услугу</option>';
        
       
        if (this.value && serviceTypeSelect.value) {
            const services = servicesData[serviceTypeSelect.value][this.value];
            services.forEach(service => {
                const option = document.createElement('option');
                option.value = service;
                option.textContent = service;
                specificServiceSelect.appendChild(option);
            });
            
          
            specificServiceSelect.disabled = false;
        } else {
            specificServiceSelect.disabled = true;
        }
    });

    
    const bookingBtn = document.getElementById('bookingBtn');
    const modal = document.getElementById('bookingModal');
    const closeBtn = document.querySelector('.close');

 
    bookingBtn.addEventListener('click', function() {
        modal.style.display = 'flex';
    });


    closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });
    
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});


