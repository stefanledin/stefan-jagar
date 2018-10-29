import moment from 'moment';

export default class Counter {
    constructor() {
        this.el = document.querySelector('span.js-time-elapsed');
        this.startTime = moment(this.el.getAttribute('data-starttime'));

        setInterval(this.counter.bind(this), 1000);
    }

    counter() {
        let prefix;
        let diff = moment.duration(this.startTime.diff(moment()));
        diff = moment.duration(moment().diff(this.startTime))._data;
        let html = this.diffAsHTML(diff);
        this.el.innerHTML = html;
    }

    diffAsHTML(diff) {
        let html = diff.hours + ':' + diff.minutes + ':';
        // Lägg till en nolla om sekunder är mindre än 10.
        // 9 => 09 osv...
        if (diff.seconds < 10) {
            html += '0';
        }
        html += diff.seconds;
        return html;
    }
}