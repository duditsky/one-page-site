
window.fillOrder = function(name) {
    const messageField = document.getElementById('messageField');
    const contactSection = document.getElementById('contact');
    
    if (messageField) {
        messageField.value = "Цікавить: " + name;
    }
    
    if (contactSection) {
        contactSection.scrollIntoView({ behavior: 'smooth' });
      
        setTimeout(() => {
            const nameInput = document.querySelector('input[name="name"]');
            if (nameInput) nameInput.focus();
        }, 800);
    }
};

$(document).ready(function() {
  
    AOS.init({
        once: true,
        duration: 800,
        easing: 'ease-out-quad',
        startEvent: 'DOMContentLoaded' 
    });


    $('#contactForm').on('submit', function(e) {
        e.preventDefault();
        const $form = $(this);
        const $btn = $form.find('button');
        
        $btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i> ВІДПРАВКА...');

        $.ajax({
            url: '/contact-us',
            method: 'POST',
            data: $form.serialize(),
            success: function() {
                alert('Дякуємо! Ваша заявка в роботі.');
                $form[0].reset();
            },
            error: function() {
                alert('Сталася помилка. Спробуйте ще раз або зателефонуйте нам.');
            },
            complete: function() {
                $btn.prop('disabled', false).text('ВІДПРАВИТИ ЗАПИТ');
            }
        });
    });
});