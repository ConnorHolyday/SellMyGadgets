module.exports = function(grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: 'assets/img/',
                    src: ['*.{png,jpg,gif}', '**/*.{png,jpg,gif}']
                }]
            }
        },


        sass: {
            styles: {
                options: {
                    style: 'expanded',
                    sourcemap: true
                },
                files: {
                    'assets/css/styles.css': 'assets/scss/styles.scss'
                }
            }
        },
        autoprefixer: {
            options: {
                browsers: ['last 2 versions', 'ie 8', 'ie 9']
            },
            single_file: {
                src: 'assets/css/styles.css'
            },
        },
        cmq: {
            options: {
                log: false
            },
            styles: {
                files: {
                    'assets/css/styles.css' : 'assets/css/styles.css'
                }
            }
        },
        csslint: {
            options: {
                import: false,
                csslintrc: '.csslintrc'
            },
            lint: {
                src: ['assets/css/styles.css']
            }
        },
        concat: {
            css: {
                src: [
                    'assets/css/styles.css'
                ],
                dest: 'assets/css/styles.css',
            }
        },
        cssmin: {
            minify: {
                files: {
                    'assets/css/styles.min.css' : 'assets/css/styles.css'
                }
            }
        },


        jshint: {
            options: {
                reporter: require('jshint-stylish')
            },
            target: ['assets/js/main.js']
        },
        uglify: {
            build: {
                src: 'assets/js/main.js',
                dest: 'assets/js/main.min.js'
            }
        },
        modernizr: {

            // [REQUIRED] Path to the build you're using for development.
            "devFile" : "assets/js/libs/modernizr.js",

            // [REQUIRED] Path to save out the built file.
            "outputFile" : "assets/js/libs/modernizr.js",

            // Based on default settings on http://modernizr.com/download/
            "extra" : {
                "shiv" : true,
                "printshiv" : false,
                "load" : true,
                "mq" : false,
                "cssclasses" : true
            },

            // Based on default settings on http://modernizr.com/download/
            "extensibility" : {
                "addtest" : false,
                "prefixed" : false,
                "teststyles" : false,
                "testprops" : false,
                "testallprops" : false,
                "hasevents" : false,
                "prefixes" : false,
                "domprefixes" : false
            },

            // By default, source is uglified before saving
            "uglify" : true,

            // Define any tests you want to implicitly include.
            "tests" : [],

            // By default, this task will crawl your project for references to Modernizr tests.
            // Set to false to disable.
            "parseFiles" : true,

            // When parseFiles = true, this task will crawl all *.js, *.css, *.scss files, except files that are in node_modules/.
            // You can override this by defining a "files" array below.
            "files" : [ 'assets/js/main.js', 'assets/css/styles.css' ],

            // When parseFiles = true, matchCommunityTests = true will attempt to
            // match user-contributed tests.
            "matchCommunityTests" : false,

            // Have custom Modernizr tests? Add paths to their location here.
            "customTests" : []
        },


        watch: {
            livereload: {
                files: ['*.html', '*.php', 'components/*.php', 'assets/js/**/*.{js,json}', 'assets/css/*.css', 'assets/img/**/*.{png,jpg,jpeg,gif,webp,svg}', 'assets/img/*.{png,jpg,jpeg,gif,webp,svg}'],
                options: {
                    spawn: false,
                    livereload: true,
                },
            },
            images: {
                files: ['assets/img/*.{png,jpg,gif}', 'assets/img/**/*.{png,jpg,gif}'],
                tasks: ['newer:imagemin'],
                options: {
                    spawn: false,
                    livereload: true,
                },
            },
            scripts: {
                files: ['assets/js/*.js'],
                tasks: ['modernizr', 'newer:jshint', 'uglify'],
                options: {
                    spawn: false,
                    livereload: true,
                },
            },
            css: {
                files: ['assets/scss/*.scss', 'assets/scss/**/*.scss'],
                tasks: ['modernizr', 'sass:styles', 'newer:autoprefixer', 'cmq', 'csslint', 'concat:css', 'cssmin'],
                options: {
                    spawn: false,
                    livereload: true,
                }
            }
        }

    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-csslint');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks("grunt-modernizr");
    grunt.loadNpmTasks("grunt-newer");
    grunt.loadNpmTasks('grunt-combine-media-queries');

    grunt.registerTask('default', ['imagemin', 'modernizr', 'jshint', 'uglify', 'sass', 'autoprefixer', 'cmq', 'csslint', 'concat:css', 'cssmin']);
    grunt.registerTask('styles', ['sass', 'autoprefixer', 'cmq', 'csslint', 'concat:css', 'cssmin']);
    grunt.registerTask('scripts', ['modernizr', 'uglify', 'jshint']);
    grunt.registerTask('auto', ['watch']);
};