export default {
    _data: window.localization,

    get(string) {
        return this._data.hasOwnProperty(string) ? this._data[string] : string;
    }
};
