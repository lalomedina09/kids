/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/*
 |--------------------------------------------------------------------------
 | Custom Components
 |--------------------------------------------------------------------------
 |
 | Here we'll set up the custom components, plugins, and section specific
 | javascript files that are going to be needed to run our application
 | this is a nice place to require all sorts of custom jQuery code.
 |
 */

window.locale = document.documentElement.lang;

import Lang from '@/utils/Lang';
window.Lang = Lang;
window.__ = (string) => Lang.get(string);

import initActiveUrlHash from '@/utils/ActiveUrlHash';
initActiveUrlHash();

import initAnalytics from '@/utils/Analytics';
initAnalytics();

import initAnimations from '@/utils/Animate';
initAnimations();

import initButtonForm from '@/utils/ButtonForm';
initButtonForm();

import initFullModal from '@/utils/FullModal';
initFullModal();

require('./custom/alerts');
require('./custom/carousel');
require('./custom/html');
require('./custom/inputs');
require('./custom/media');
require('./custom/share');
require('./custom/svg');
require('./custom/videos');
