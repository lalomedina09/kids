const jwt_token = document.querySelector('meta[name="jwt-token"]');
const csrf_token = document.querySelector('meta[name="csrf-token"]');

export const _HOST = window.location.protocol + '//' + window.location.hostname + (window.location.port ? ':' + window.location.port : '') + '/';
export const _TOKEN = (jwt_token) ? jwt_token.content : null;
export const _CSRF = (csrf_token) ? csrf_token.content : null;
