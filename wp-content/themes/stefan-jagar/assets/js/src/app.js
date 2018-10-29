import lazysizes from 'lazysizes';
import {
    load
} from 'webfontloader';

if ('serviceWorker' in navigator) {
    window.addEventListener('load', function (event) {
        navigator.serviceWorker.register(window.location.origin+window.location.pathname+'service-worker.js');
    });
}

load({
    google: {
        families: ['Aladin']
    }
});

const liveCounter = document.querySelector('span.js-time-elapsed');
if (liveCounter) {
    import( /* webpackChunkName: "Counter" */ './Counter').then(Counter => {
        new Counter.default();
    });
}