export default class MessageBag {
    /**
     * MessageBag constructor.
     *
     * @param  {Object}  messages
     */
    constructor(messages = {}) {
        this.messages = messages;
    }

    /**
     * Get the message for a given field (if any).
     *
     * @param  {string}  field
     * @return {string|void}
     */
    get(field) {
        if (this.messages[field]) {
            return this.messages[field][0];
        }
    }

    /**
     * Determine if the message bag has a message for the given field.
     *
     * @param  {string}  field
     * @return {string}
     */
    has(field) {
        return this.messages.hasOwnProperty(field);
    }

    /**
     * Clear the messages for a given field.
     *
     * @param  {string}  field
     * @return {void}
     */
    clear(field) {
        delete this.messages[field];

        return this;
    }

    /**
     * Determines if the message bag is empty.
     *
     * @return {Boolean}
     */
    isEmpty() {
        return Object.keys(this.messages).length === 0;
    }

    /**
     * Get first message.
     *
     * @return {string}
     */
    first() {
        if (!this.isEmpty()) {
            var key = Object.keys(this.messages)[0];
            return this.get(key);
        }

        return '';
    }
}
