/*!
Mailchimp Ajax Submit
jQuery Plugin
Author: Siddharth Doshi

Use:
===
$('#form_id').ajaxchimp(options);

- Form should have one <input> element with attribute 'type=email'
- Form should have one label element with attribute 'for=email_input_id' (used to display error/success message)
- All options are optional.

Options:
=======
options = {
    language: 'en',
    callback: callbackFunction,
    url: 'http://blahblah.us1.list-manage.com/subscribe/post?u=5afsdhfuhdsiufdba6f8802&id=4djhfdsh99f'
}

Notes:
=====
To get the mailchimp JSONP url (undocumented), change 'post?' to 'post-json?' and add '&c=?' to the end.
For e.g. 'http://blahblah.us1.list-manage.com/subscribe/post-json?u=5afsdhfuhdsiufdba6f8802&id=4djhfdsh99f&c=?',
*/

(function ($) {
    'use strict';

    $.ajaxChimp = {
        responses: {
            'We have sent you a confirmation email'                                             : 0,
            'Please enter a value'                                                              : 1,
            'An email address must contain a single @'                                          : 2,
            'The domain portion of the email address is invalid (the portion after the @: )'    : 3,
            'The username portion of the email address is invalid (the portion before the @: )' : 4,
            'This email address looks fake or invalid. Please enter a real email address'       : 5
        },
        translations: {
            'en': null
        },
        init: function (selector, options) {
            $(selector).ajaxChimp(options);
        }
    };

    $.fn.ajaxChimp = function (options) {
        $(this).each(function(i, elem) {
            var form = $(elem);
            var email = form.find('input[type=email]');
            var label = form.find('label[for=' + email.attr('id') + ']');
            var acepto;

            var settings = $.extend({
                'url': form.attr('action'),
                'language': 'en',
                'acepto' : false
            }, options);

            var url = settings.url.replace('/post?', '/post-json?').concat('&c=?');

            form.attr('novalidate', 'true');
            email.attr('name', 'EMAIL');

            form.submit(function () {
                acepto = form.find('input[name=acepto]');
                var msg;
                function successCallback(resp) {
                    if (resp.result === 'success') {
                        msg = 'We have sent you a confirmation email';
                        label.removeClass('error').addClass('valid');
                        email.removeClass('error').addClass('valid');
                    } else {
                        email.removeClass('valid').addClass('error');
                        label.removeClass('valid').addClass('error');
                        var index = -1;
                        try {
                            var parts = resp.msg.split(' - ', 2);
                            if (parts[1] === undefined) {
                                msg = resp.msg;
                            } else {
                                var i = parseInt(parts[0], 10);
                                if (i.toString() === parts[0]) {
                                    index = parts[0];
                                    msg = parts[1];
                                } else {
                                    index = -1;
                                    msg = resp.msg;
                                }
                            }
                        }
                        catch (e) {
                            index = -1;
                            msg = resp.msg;
                        }
                    }

                    // Translate and display message
                    if (
                        settings.language !== 'en'
                        && $.ajaxChimp.responses[msg] !== undefined
                        && $.ajaxChimp.translations
                        && $.ajaxChimp.translations[settings.language]
                        && $.ajaxChimp.translations[settings.language][$.ajaxChimp.responses[msg]]
                    ) {
                        msg = $.ajaxChimp.translations[settings.language][$.ajaxChimp.responses[msg]];
                    }
                    label.html(msg);

                    label.show(2000);
                    if (settings.callback) {
                        settings.callback(resp);
                    }
                }

                var data = {};
                var dataArray = form.serializeArray();
                $.each(dataArray, function (index, item) {
                    data[item.name] = item.value;
                });
                                
                if(!acepto.prop('checked') && settings.acepto){
                  label.html('Debe aceptar la política de privacidad / 请您接受隐私政策').show(2000);
                  return false;
                }

                $.ajax({
                    url: url,
                    data: data,
                    success: successCallback,
                    dataType: 'jsonp',
                    error: function (resp, text) {
                        console.log('mailchimp ajax submit error: ' + text);
                    }
                });

                // Translate and display submit message
                var submitMsg = 'Submitting...';
                if(
                    settings.language !== 'en'
                    && $.ajaxChimp.translations
                    && $.ajaxChimp.translations[settings.language]
                    && $.ajaxChimp.translations[settings.language]['submit']
                ) {
                    submitMsg = $.ajaxChimp.translations[settings.language]['submit'];
                }
                label.html(submitMsg).show(2000);

                return false;
            });
        });
        return this;
    };
    
    $.ajaxChimp.translations = {
        // Translation via https://github.com/lifeisfoo
        'it': {
            'submit': 'Registrazione in corso...',
            0: 'Ti abbiamo inviato una mail di conferma',
            1: 'Per favore inserisci una mail',
            2: 'Un indirizzo valido contiene una sola @',
            3: 'Il dominio della tua mail non è valido (la porzione dopo la @: )',
            4: 'Il nome della mail non è valido (la porzione prima della @: )',
            5: 'L\'indirizzo email sembra finto o non valido: per favore inseriscine uno reale'
        },
        // Translation via https://github.com/Cube42
        'de': {
            'submit': 'Senden...',
            0: 'Wir haben Ihnen eine Bestätigungs-E-Mail geschickt',
            1: 'Bitte geben Sie Ihre E-Mail-Adresse ein',
            2: 'Eine E-Mail-Adresse muss ein @ enthalten',
            3: 'Der Domain-Teil der E-Mail-Adresse ist ungültig (der Teil nach dem @)',
            4: 'Der Benutzername der E-Mail-Adresse ist ungültig (der Teil vor dem @)',
            5: 'Diese E-Mail-Adresse scheint gefälscht oder ungültig zu sein. Bitte geben Sie eine echte E-Mail-Adresse an!'
        },
        // Translation via https://github.com/designorant
        'pl': {
            'submit': 'Wysyłanie...',
            0: 'Email z potwierdzeniem został wysłany',
            1: 'Proszę podać adres email',
            2: 'Adres email musi zawierać jeden znak @',
            3: 'Część adresu z domeną jest niepoprawna (część po znaku @: )',
            4: 'Część adresu z użytkownikiem jest niepoprawna (część przed znakiem @: )',
            5: 'Ten adres wygląda na nieprawdziwy lub niepoprawny. Proszę podać prawdziwy adres email.'
        },
        // The translations below are from google translate, and may not be accurate.
        // Pull requests with translations for other languages as well as corrections are welcome.
        'es': {
            'submit': 'Enviado... / 发送...',
            0: 'Te hemos enviado un email de confirmación',
            1: 'Por favor, introduzca un e-mail / 请输入您的电子邮件',
            2: 'Una dirección de correo electrónico debe contener una sola @',
            3: 'La parte de dominio de la dirección de correo electrónico no es válida (la parte después de la @:)',
            4: 'La parte de usuario de la dirección de correo electrónico no es válida (la parte antes de la @:)',
            5: 'Esta dirección de correo electrónico se ve falso o no válido. Por favor, introduce una dirección de correo electrónico real'
        },
        'fr': {
            'submit': 'Enregistrement en cours...',
            0: 'Nous vous avons envoyé un e-mail de confirmation',
            1: 'S\'il vous plaît entrer une valeur',
            2: 'Une adresse e-mail doit contenir un seul @',
            3: 'La partie domaine de l\'adresse e-mail n\'est pas valide (la partie après le @:)',
            4: 'La partie nom d\'utilisateur de l\'adresse email n\'est pas valide (la partie avant le signe @:)',
            5: 'Cette adresse e-mail semble faux ou non valides. S\'il vous plaît entrer une adresse email valide'
        }
    };
})(jQuery);