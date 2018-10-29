const merge = require('webpack-merge');
const common = require('./webpack.common.js');

module.exports = merge(common, {
    mode: 'production',
    output: {
        publicPath: '/jagar/wp-content/themes/stefan-jagar/assets/js/dist/'
    }
});