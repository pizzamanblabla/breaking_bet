var webpack = require('webpack');
var ExtractTextPlugin = require("extract-text-webpack-plugin");

module.exports = {
    context: __dirname,
    entry:  {
        app: ['./app/main.ts', './css/main.scss'],
    },
    output: {
        path:     '../public',
        filename: 'bundle-[name].js',
        sourceMapFilename: 'bundle-[name].js.map',
    },
    module: {
        loaders: [
            {
                test: /\.ts$/,
                loader: 'awesome-typescript-loader',
                include: __dirname,
            },
            {
                test: /\.scss$/,
                loader: ExtractTextPlugin.extract('style', 'raw!sass'),
                include: [__dirname + '/css', __dirname + '/app'],
            }
        ],
    },
    plugins: [
        new ExtractTextPlugin("styles.css")
    ],
    resolve: {
        extensions: ['', '.ts'],
    },
};