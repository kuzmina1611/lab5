document.addEventListener('DOMContentLoaded', function() {
    const moreButtons = document.querySelectorAll('.master-more-transparent');
    
    moreButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const masterName = this.closest('.master-card-transparent').querySelector('.master-name-transparent').textContent.trim();
            let modalId = '';
            
            switch(masterName) {
                case 'Анна Агашкова':
                    modalId = 'anna-modal';
                    break;
                case 'Анастасия Кривоносова':
                    modalId = 'anastasia-modal';
                    break;
                case 'Екатерина Иванова':
                    modalId = 'ekaterina-modal';
                    break;
                case 'Марина Белова':
                    modalId = 'marina-modal';
                    break;
                case 'Кристина Калайджан':
                    modalId = 'kristina-modal';
                    break;
                case 'Мария Кузнецова':
                    modalId = 'maria-modal';
                    break;
                case 'Валерия Панкратова':
                    modalId = 'valeria-modal';
                    break;
                case 'Инна Ершова':
                    modalId = 'inna-modal';
                    break;
            }
            
            if (modalId) {
                document.getElementById(modalId).style.display = 'flex';
                document.body.style.overflow = 'hidden'; 
            }
        });
    });
    

    const modals = document.querySelectorAll('.master-modal');
    modals.forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.style.display = 'none';
                document.body.style.overflow = ''; 
            }
        });
    });
    
    const modalContents = document.querySelectorAll('.master-modal-content');
    modalContents.forEach(content => {
        const closeBtn = document.createElement('span');
        closeBtn.innerHTML = '&times;';
        closeBtn.style.position = 'absolute';
        closeBtn.style.top = '15px';
        closeBtn.style.right = '15px';
        closeBtn.style.fontSize = '24px';
        closeBtn.style.cursor = 'pointer';
        closeBtn.style.color = '#888';
        closeBtn.addEventListener('mouseover', () => closeBtn.style.color = '#000');
        closeBtn.addEventListener('mouseout', () => closeBtn.style.color = '#888');
        closeBtn.addEventListener('click', function() {
            this.closest('.master-modal').style.display = 'none';
            document.body.style.overflow = '';
        });
        content.prepend(closeBtn);
    });
});