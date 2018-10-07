const path = require('path');

module.exports = {
    entry: './assets/js/src/app.js',
    output: {
        path: path.resolve(__dirname, 'assets/js/dist'),
        filename: 'bundle.js'
    }
};