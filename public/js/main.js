$(document).ready(function() {
    // Ініціалізація анімацій AOS
    AOS.init({
        once: true,
        duration: 1000
    });

    // Функція заповнення замовлення (робимо її глобальною)
    window.fillOrder = function(name) {
        $('#messageField').val("Цікавить: " + name);
        // Плавний скрол до форми
        const contactSection = document.getElementById('contact');
        if (contactSection) {
            contactSection.scrollIntoView({ behavior: 'smooth' });
        }
        $('input[name="name"]').focus();
    };

    // Обробка форми
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();
        let $btn = $(this).find('button');
        
        $btn.prop('disabled', true).text('ВІДПРАВКА...');

        $.ajax({
            url: '/contact-us',
            method: 'POST',
            data: $(this).serialize(),
            success: function() {
                alert('Дякуємо! Ваша заявка в роботі.');
                $('#contactForm')[0].reset();
                $btn.prop('disabled', false).text('ВІДПРАВИТИ ЗАПИТ');
            },
            error: function() {
                alert('Сталася помилка. Спробуйте ще раз.');
                $btn.prop('disabled', false).text('ВІДПРАВИТИ ЗАПИТ');
            }
        });
    });
});

