module.exports = function(grunt) {

    // 1. All configuration goes here
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        concat: {
            // 2. Configuration for concatinating files goes here.
            dist: {
                src: [
                    //'bower_components/jquery/jquery.js', // REMOVE for production
                    'assets/scripts/main.js'  // This specific file
                ],
                dest: 'assets/scripts/production.js',
            }
        },
        uglify: {
            build: {
                src: 'assets/scripts/production.js',
                dest: 'assets/scripts/production.js'
            }
        },
        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: 'assets/img/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'assets/img/'
                }]
            }
        },
        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'assets/scss/global.scss': 'assets/scss/partials/*.scss',
                    'assets/css/global.css': 'assets/scss/global.scss'
                }
            }
        },
        autoprefixer: {
            options: {
                browsers: ['last 2 versions']
            },
            single_file: {
                 src: 'assets/css/styles.css',
               },
        },
        jshint: {
            options: {
                reporter: require('jshint-stylish')
            },
            target: ['assets/scripts/main.js']
        },
        modernizr: {

            // [REQUIRED] Path to the build you're using for development.
            "devFile" : "assets/scripts/vendor/modernizr.js",

            // [REQUIRED] Path to save out the built file.
            "outputFile" : "assets/scripts/vendor/modernizr.js",

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
            "files" : [ 'assets/scripts/production.js', 'assets/css/global.css' ],

            // When parseFiles = true, matchCommunityTests = true will attempt to
            // match user-contributed tests.
            "matchCommunityTests" : false,

            // Have custom Modernizr tests? Add paths to their location here.
            "customTests" : []
        },
        watch: {
            options: {
                livereload: true,
            },
            scripts: {
                files: ['assets/scripts/*.js'],
                tasks: ['concat', 'jshint', 'uglify'],
                options: {
                    spawn: false,
                },
            },
            css: {
                files: ['assets/scss/partials/*.scss'],
                tasks: ['sass', 'autoprefixer'],
                options: {
                    spawn: false,
                }
            }
        }

    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks("grunt-modernizr");

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['concat', 'uglify', 'imagemin', 'sass', 'jshint', 'autoprefixer', 'modernizr']);
    grunt.registerTask('auto', ['watch']);
};