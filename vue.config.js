module.exports = {
    lintOnSave: false,
    productionSourceMap: false,
    publicPath: process.env.NODE_ENV === 'production'
        ? '/wp-content/plugins/clock/dist/'
        : 'http://localhost:8080/',
    outputDir: 'dist',
    configureWebpack: {
        devServer: {
            contentBase: '/wp-content/plugins/clock/dist/',
            allowedHosts: ['lesterlambac.test'],
            headers: {
                'Access-Control-Allow-Origin': '*'
            },
        },
        externals: {
            jquery: 'jQuery'
        },
        output: {
            filename: 'js/app.js',
            chunkFilename: 'js/chunk-vendors.js',
        },
    },
    css: {
        extract: {
            filename: 'css/app.css',
            chunkFilename: 'css/chunk-vendors.css'
        }
    },
  };