import { bindEvent } from '@/utils/BindEvents';

import initClabe from '@/utils/Clabe';
import initCollapse from '@/utils/Collapse';
import initCountable from '@/utils/Countable';
import initDatePicker from '@/utils/DatePicker';
import initTogglePassword from '@/utils/TogglePassword';
import initValidator from '@/utils/Validator';
import initZipcode from '@/utils/Zipcode';

initCollapse('a[data-toggle="collapse"]', 'fa-chevron-up', 'fa-chevron-down');

initCountable('input[name="username"]');
initCountable('input[name="job"]');
initCountable('textarea[name="bio"]');
initCountable('textarea[name="certifications"]');
initCountable('input[name="education[school_name]"]');
initCountable('input[name="education[degree]"]');
initCountable('input[name="profession[company_name]"]');
initCountable('input[name="profession[job]"]');
initDatePicker('input[name="birthdate"]', 'YYYY-MM-DD');
initDatePicker('input[name="education[start_date]"]', 'YYYY-MM-DD');
initDatePicker('input[name="education[end_date]"]', 'YYYY-MM-DD');
initDatePicker('input[name="profession[start_date]"]', 'YYYY-MM-DD');
initDatePicker('input[name="profession[end_date]"]', 'YYYY-MM-DD');

initTogglePassword('#toggle-password', [
    '#password',
    '#password-confirmation'
]);

initCountable('#user-clabe');
initClabe('#user-clabe', '#user-bank', '#user-account');

initCountable('#user-tax-zipcode');
initZipcode('#user-tax-zipcode', '#user-tax-settlements', '#user-tax-municipality', '#user-tax-state');

bindEvent('click', '[data-script="toggleWeekdayInput"]', (event, current_target) => {
    document.querySelector(`[name="recurrent[${current_target.value}][hour]"]`).disabled = !current_target.checked;
    document.querySelector(`[name="recurrent[${current_target.value}][duration]"]`).disabled = !current_target.checked;
});

initValidator('form#form-profile', {
    name: {
        required: true,
        rangelength: [1, 255]
    },
    last_name: {
        required: true,
        rangelength: [1, 255]
    },
    state: {
        required: true
    },
    birthdate: {
        required: true,
        date: true
    },
    gender: {
        required: true,
        maxlength: 1
    }
});

initValidator('form#form-password', {
    password: {
        required: true,
        rangelength: [8, 100]
    },
    password_confirmation: {
        required: true,
        rangelength: [8, 100],
        equalTo: 'input#password'
    }
});

initValidator('form#form-personal', {
    username: {
        required: true,
        rangelength: [3, 50],
        whitespaces: true,
        alpha_dash: true
    },
    job: {
        required: true,
        rangelength: [1, 100]
    },
    bio: {
        required: true,
        rangelength: [10, 1000]
    },
    facebook: {
        url: true
    },
    twitter: {
        url: true
    },
    instagram: {
        url: true
    },
    youtube: {
        url: true
    },
    video: {
        required: true,
        url: true
    },
    'education[start_date]': {
        required: true,
        date: true
    },
    'education[end_date]': {
        required: true,
        date: true
    },
    'education[school_name]': {
        required: true,
        rangelength: [1,50]
    },
    'education[degree]': {
        required: true,
        rangelength: [1,50]
    },
    'profession[start_date]': {
        required: true,
        date: true
    },
    'profession[end_date]': {
        required: true,
        date: true
    },
    'profession[company_name]': {
        required: true,
        rangelength: [1,50]
    },
    'profession[job]': {
        required: true,
        rangelength: [1,50]
    },
    certifications: {
        required: true,
        rangelength: [10, 300]
    }
});

initValidator('form#form-payment', {
    clabe: {
        required: true,
        digits: true,
        rangelength: [18,18],
        clabe: true
    },
    tax_name: {
        required: true
    },
    tax_number: {
        required: true,
        rangelength: [12,13],
        whitespaces: true
    },
    tax_address: {
        required: true
    },
    tax_address_number: {
        required: true,
        digits: true,
        whitespaces: true,
    },
    tax_zipcode: {
        required: true,
        rangelength: [5, 5],
        digits: true,
        whitespaces: true,
    },
    tax_settlement: {
        required: true,
        digits: true,
        selected: true,
        whitespaces: true,
    },
});
