const webpack = require('webpack');
const MinifyPlugin = require("babel-minify-webpack-plugin");


let usedPlugins = [
  new MinifyPlugin({
    "removeConsole": true
  }, {})
];
if (process.env.DEPLOY !== "1") {
  usedPlugins = [];
  console.log('making js as Dev mode...');
}else{
  console.log('making js as Deploy mode...');
}

module.exports = {
  entry: './src/js/app.js',
  output: {
    path: `${__dirname}/wordpress/wp-content/themes/internet-yami-ichi/assets/js/`,
    filename: 'app.js'
  },
  plugins: usedPlugins
};


