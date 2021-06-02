$(document).ready(function(){
    var checker = []
    var sizeArray = []

    var validateDataForForm1 = {
        'firstName': function () {
            let firstNameInfo = $('.firstName')
            let firstNameEl = $('#firstName')
            let errorText

            if (firstNameEl.val() === '') {
                validateDataForForm1.errors = true
                errorText = 'The field must not be empty'
                stateValidate(firstNameInfo, firstNameEl, errorText, validateDataForForm1.errors)
                return true
            } else if (firstNameEl.val().length >= 50) {
                validateDataForForm1.errors = true
                errorText = 'Length must not exceed 50 characters'
                stateValidate(firstNameInfo, firstNameEl, errorText, validateDataForForm1.errors)
                return true
            } else {
                validateDataForForm1.errors = false
                stateValidate(firstNameInfo, firstNameEl, errorText, validateDataForForm1.errors)
                return false
            }
        },
        'lastName': function () {
            let lastNameInfo = $('.lastName')
            let lastNameEl = $('#lastName')
            let errorText

            if (lastNameEl.val() === '') {
                validateDataForForm1.errors = true
                errorText = 'The field must not be empty'
                stateValidate(lastNameInfo, lastNameEl, errorText, validateDataForForm1.errors)
                return true
            } else if (lastNameEl.val().length >= 50) {
                validateDataForForm1.errors = true
                errorText = 'Length must not exceed 50 characters'
                stateValidate(lastNameInfo, lastNameEl, errorText, validateDataForForm1.errors)
                return true
            } else {
                validateDataForForm1.errors = false
                stateValidate(lastNameInfo, lastNameEl, errorText, validateDataForForm1.errors)
                return false
            }
        },
        'birthdate': function () {
            let birthdateInfo = $('.birthdate')
            let birthdateEl = $('#birthdate')
            let errorText
            let currDate = (new Date()).toISOString().split('T')[0]

            if (birthdateEl.val() === '') {
                validateDataForForm1.errors = true
                errorText = 'The field must not be empty'
                stateValidate(birthdateInfo, birthdateEl, errorText, validateDataForForm1.errors)
                return true
            } else if (birthdateEl.val() >= currDate) {
                validateDataForForm1.errors = true
                errorText = 'Date greater than current'
                stateValidate(birthdateInfo, birthdateEl, errorText, validateDataForForm1.errors)
                return true
            }
            else {
                validateDataForForm1.errors = false
                stateValidate(birthdateInfo, birthdateEl, errorText, validateDataForForm1.errors)
                return false
            }
        },
        'reportSubject': function () {
            let reportSubjectInfo = $('.reportSubject')
            let reportSubjectEl = $('#reportSubject')
            let errorText

            if (reportSubjectEl.val() === '') {
                validateDataForForm1.errors = true
                errorText = 'The field must not be empty'
                stateValidate(reportSubjectInfo, reportSubjectEl, errorText, validateDataForForm1.errors)
                return true
            } else if (reportSubjectEl.val().length > 100) {
                validateDataForForm1.errors = true
                errorText = 'Length must not exceed 100 characters'
                stateValidate(reportSubjectInfo, reportSubjectEl, errorText, validateDataForForm1.errors)
                return true
            }
            else {
                validateDataForForm1.errors = false
                stateValidate(reportSubjectInfo, reportSubjectEl, errorText, validateDataForForm1.errors)
                return false
            }
        },
        'country': function () {
            let countryInfo = $('.country')
            let countryEl = $('#country')
            let errorText

            if (countryEl.val() === 'country') {
                validateDataForForm1.errors = true
                errorText = 'Choose your country'
                stateValidate(countryInfo, countryEl, errorText, validateDataForForm1.errors)
                return true
            } else {
                validateDataForForm1.errors = false
                stateValidate(countryInfo, countryEl, errorText, validateDataForForm1.errors)
                return false
            }
        },
        'email': function () {

            let emailInfo = $('.email')
            let emailEl = $('#email')
            let patt = /^.+@.+[.].{2,}$/i
            let errorText
            var check

            $.ajax({
                type: 'post',
                url: 'checkEmail',
                data: {'email': emailEl.val()},
                success: function (data) {
                    check = JSON.parse(data)
                },
                error: function (er) {
                    console.log(er)
                },
                async: false
            })


            if (emailEl.val() === '') {
                validateDataForForm1.errors = true
                errorText = 'The field must not be empty'
                stateValidate(emailInfo, emailEl, errorText, validateDataForForm1.errors)
                return true
            } else if (! patt.test(emailEl.val())) {
                validateDataForForm1.errors = true
                errorText = 'Incorrect entered email'
                stateValidate(emailInfo, emailEl, errorText, validateDataForForm1.errors)
                return true
            } else if (check.exists === true){
                validateDataForForm1.errors = true
                errorText = 'This email was registered'
                stateValidate(emailInfo, emailEl, errorText, validateDataForForm1.errors)
                return true
            } else {
                validateDataForForm1.errors = false
                stateValidate(emailInfo, emailEl, errorText, validateDataForForm1.errors)
                return false
            }
        },
        'phone': function () {
            let phoneInfo = $('.phone')
            let phoneEl = $('#phone')
            let errorText

            if (phoneEl.val() === '') {
                validateDataForForm1.errors = true
                errorText = 'The field must not be empty'
                stateValidate(phoneInfo, phoneEl, errorText, validateDataForForm1.errors)
                return true
            } else if (phoneEl.val().replace('_', '').length != 17) {
                validateDataForForm1.errors = true
                errorText = 'Enter full phone number'
                stateValidate(phoneInfo, phoneEl, errorText, validateDataForForm1.errors)
                return true
            } else {
                validateDataForForm1.errors = false
                stateValidate(phoneInfo, phoneEl, errorText, validateDataForForm1.errors)
                return false
            }

        },
        'submit': function (check) {
            if(!check) {
                    $.ajax({
                        type: 'POST',
                        url: '/',
                        processData: false,
                        contentType: false,
                        data: new FormData($('.firstForm')[0]),
                        success: function (data) {
                            console.log(data)
                            $('.firstForm').hide()
                            $('.secondForm').show()
                        },
                        error: function (er) {
                            console.log(er)
                        },
                        // async: false
                    })
            }
        }
    }

    var validateDataForForm2 = {
        'company': function () {
            let companyInfo = $('.company')
            let companyEl = $('#company')
            let errorText

            if (companyEl.val().length > 50) {
                validateDataForForm2.errors = true
                errorText = 'Length must not exceed 50 characters'
                stateValidate(companyInfo, companyEl, errorText, validateDataForForm2.errors)
                return true
            } else {
                validateDataForForm2.errors = false
                stateValidate(companyInfo, companyEl, errorText, validateDataForForm2.errors)
                return false
            }
        },
        'position': function () {
            let positionInfo = $('.position')
            let positionEl = $('#position')
            let errorText

            if (positionEl.val().length > 50) {
                validateDataForForm2.errors = true
                errorText = 'Length must not exceed 50 characters'
                stateValidate(positionInfo, positionEl, errorText, validateDataForForm2.errors)
                return true
            } else {
                validateDataForForm2.errors = false
                stateValidate(positionInfo, positionEl, errorText, validateDataForForm2.errors)
                return false
            }
        },
        'aboutMe': function () {
            let aboutMeInfo = $('.aboutMe')
            let aboutMeEl = $('#aboutMe')
            let errorText

            if (aboutMeEl.val().length > 500) {
                validateDataForForm2.errors = true
                errorText = 'Length must not exceed 500 characters'
                stateValidate(aboutMeInfo, aboutMeEl, errorText, validateDataForForm2.errors)
                return true
            } else {
                validateDataForForm2.errors = false
                stateValidate(aboutMeInfo, aboutMeEl, errorText, validateDataForForm2.errors)
                return false
            }
        },
        'photo': function (size) {
            let photoInfo = $('.photo')
            let photoEl = $('#photo')
            let errorText
            let ext = photoEl.val().split('.').pop().toLowerCase();

            sizeArray.unshift(size)
            var ok = sizeArray.filter(n => n)
            console.log(ok[0])

            if (photoEl.val() === '') {
                stateValidate(photoInfo, photoEl, errorText, validateDataForForm2.errors)
            } else if ($.inArray(ext, ['png','jpg','jpeg']) == -1) {
                validateDataForForm2.errors = true
                errorText = 'The photo format should be png, jpg and jpeg'
                stateValidate(photoInfo, photoEl, errorText, validateDataForForm2.errors)
                return true
            } else if (photoEl.val().length > 100) {
                validateDataForForm2.errors = true
                errorText = 'Photo name must not exceed 100 characters'
                stateValidate(photoInfo, photoEl, errorText, validateDataForForm2.errors)
                return true
            }
            else if (ok[0] > 2000000) {
                validateDataForForm2.errors = true
                errorText = 'The photo should be not more then 2 mb'
                stateValidate(photoInfo, photoEl, errorText, validateDataForForm2.errors)
                return true
            }
            else {
                validateDataForForm2.errors = false
                stateValidate(photoInfo, photoEl, errorText, validateDataForForm2.errors)
                return false
            }

        },
        'submit': function (check) {
            if(!check) {
                var formData = new FormData($('.secondForm')[0])
                formData.append('idUser', $.cookie('idUser'))
                $.ajax({
                    type: 'POST',
                    url: 'insertformtwo',
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (data) {
                        $('.secondForm').hide()
                        $('.thirdForm').show()
                        $.cookie('step', 'first')
                        console.log(data)
                    },
                    error: function (er) {
                        console.log(er)
                    }
                })
            }
        }
    }

    if($.cookie('step') === 'second') {
        $('.secondForm').show()
        $('.thirdForm').hide()
        $('.firstForm').hide()
    } else {
        $('.secondForm').hide()
        $('.thirdForm').hide()
        $('.firstForm').show()
    }

    $('#phone').inputmask('+9 (999) 999-9999');

    function stateValidate(info, elem, errorText='', errorBool) {
        if (errorBool === true) {
            info.removeClass('correct').addClass('error').html(errorText).show()
            elem.removeClass('normal').addClass('wrong')
        } else {
            info.removeClass('error').addClass('correct').html('').show()
            elem.removeClass('wrong').addClass('normal')
        }
    }

    $('#birthdate').datepicker({
        format: 'YYYY-MM-DD'
    })

    $('#firstName, #lastName').on('keypress', function (e) {
        var char = /["a-zA-Z ]/;
        var val = String.fromCharCode(e.which);
        var test = char.test(val);

        if(!test) return false
    })

    $('#first-btn').click(function () {
        checker = []
        checker.push(validateDataForForm1.email())
        checker.push(validateDataForForm1.reportSubject())
        checker.push(validateDataForForm1.phone())
        checker.push(validateDataForForm1.firstName())
        checker.push(validateDataForForm1.lastName())
        checker.push(validateDataForForm1.birthdate())
        checker.push(validateDataForForm1.country())
        validateDataForForm1.submit(checker.includes(true))
    });

    $('#second-btn').click( function () {
        checker = []
        checker.push(validateDataForForm2.photo())
        checker.push(validateDataForForm2.company())
        checker.push(validateDataForForm2.position())
        checker.push(validateDataForForm2.aboutMe())
        validateDataForForm2.submit(checker.includes(true))
    })

    $('#firstName').change(validateDataForForm1.firstName)
    $('#lastName').change(validateDataForForm1.lastName)
    $('#birthdate').change(validateDataForForm1.birthdate)
    $('#reportSubject').change(validateDataForForm1.reportSubject)
    $('#country').change(validateDataForForm1.country)
    $('#email').change(validateDataForForm1.email)
    $('#phone').change(validateDataForForm1.phone)
    $('#company').change(validateDataForForm2.company)
    $('#position').change(validateDataForForm2.position)
    $('#aboutMe').change(validateDataForForm2.aboutMe)
    $('#photo').on('change', function () {
        let size = this.files[0].size
        validateDataForForm2.photo(size)
    })
});