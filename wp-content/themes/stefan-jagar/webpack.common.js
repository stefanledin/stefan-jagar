const path = require('path');

module.exports = {
    entry: './assets/js/src/app.js',
    output: {
        path: path.resolve(__dirname, 'assets/js/dist'),
        filename: '[name].bundle.js',
        chunkFilename: '[name].bundle.js'
    },
    module: {
        rules: [{
            test: /\.m?js$/,
            exclude: /(node_modules|bower_components)/,
            use: {
                loader: 'babel-loader',
                options: {
                    presets: ['@babel/preset-env']
                }
            }
        }]
    }
};