/**
 * Created by Dung on 1/2/2018.
 */
module.exports = function (grunt) {
    //project configurations
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        uglify: {
            options: {
                mangle: false
            },
            target: {
                files: {
                    // 'assets/js/tcdb/main.min.js': ['assets/js/tcdb/BOT.js', 'assets/js/tcdb/buttonEvent.js',
                    //     'assets/js/tcdb/CreateLytrinhLayer.js', 'assets/js/tcdb/CreHTML.js',
                    //     'assets/js/tcdb/geo_utils.js', 'assets/js/tcdb/html2canvas.js'
                    // ],
                    'assets/js/tcdb/submain.min.js' : [ 'assets/js/tcdb/marker.js',
                        'assets/js/tcdb/route.js', 'assets/js/tcdb/Search.js',
                        'assets/js/tcdb/SourceBridge.js', 'assets/js/tcdb/toolBar.js', 'assets/js/tcdb/TouchEvt.js']
                }
            }
        },
        cssmin: {
            target: {
                files: [{
                    expand: true,
                    cwd: 'assets/css/tcdb/',
                    src: 'style.css',
                    dest: 'assets/css/tcdb/',
                    ext: '.min.css'
                }]
            }
        }
    });
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
};