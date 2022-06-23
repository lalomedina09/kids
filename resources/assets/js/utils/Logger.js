const now = () => (window.performance.now() / 1000).toFixed(3);

const Logger = {
    log: (message) => {
        console.log(message);
        //console.trace();
    },

    info: (message) => {
        console.info('[' + now() + '] INFO : ' + message);
        //console.trace();
    },


    warning: (message) => {
        console.warn('[' + now() + '] WARNING :');
        console.warn(message);
        //console.trace();
    },

    error: (message) => {
        console.error('[' + now() + '] ERROR :');
        console.error(message);
        //console.trace();
    },

    debug: (message, params) => {
        console.debug('[' + now() + '] DEBUG : ' + message);
        console.debug(params);
        //console.trace();
    }
};

export default Logger;
