import initClabe from '@/utils/Clabe';
import initCountable from '@/utils/Countable';
import initDatePicker from '@/utils/DatePicker';
import initValidator from '@/utils/Validator';
import initZipcode from '@/utils/Zipcode';

initCountable('input[name=username]');
initCountable('input[name=job]');
initCountable('input[name=specialization]');
initCountable('textarea[name=bio]');
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

initCountable('#user-clabe');
initClabe('#user-clabe', '#user-bank', '#user-account');

initCountable('#user-tax-zipcode');
initZipcode('#user-tax-zipcode', '#user-tax-settlements', '#user-tax-municipality', '#user-tax-state');

initValidator('form#form-general', {
    name: {
        required: true,
        rangelength: [1, 255]
    },
    last_name: {
        required: true,
        rangelength: [1, 255]
    },
    email: {
        required: true,
        email: true
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

initValidator('form#form-profile', {
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
        rangelength: [1, 50]
    },
    'education[degree]': {
        required: true,
        rangelength: [1, 50]
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
        rangelength: [1, 50]
    },
    'profession[job]': {
        required: true,
        rangelength: [1, 50]
    },
    certifications: {
        required: true,
        rangelength: [10, 300]
    },
    specialization: {
        required: true,
        rangelength: [1, 100]
    }
});

initValidator('form#form-banking', {
    clabe: {
        required: true,
        digits: true,
        rangelength: [18, 18],
        clabe: true
    },
    tax_name: {
        required: true
    },
    tax_number: {
        required: true,
        rangelength: [12, 13],
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
