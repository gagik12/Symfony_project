module.exports = function(grunt) {
    grunt.initConfig({
        watch: {
            options: {
                livereload: true
            },
            scripts: {
                files: ['web/ts/*.ts'],
                tasks: ['ts']
            }
        },

        copy: {
            systemjs: {
                files: [
                    {
                        expand: true,
                        cwd: 'node_modules/systemjs/dist/',
                        src: '*.js',
                        dest: 'web/js/vendor/systemJs/'
                    }
                ]
            }
        },

        ts: {
            default: {
                tsconfig: true,
                src: ['web/ts/*.ts'],
                out: 'web/js/script.js'
            }
        }
    });

    grunt.loadNpmTasks('grunt-ts');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['copy', 'ts', 'watch']);

};