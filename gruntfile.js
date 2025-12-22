module.exports = function (grunt) {
  const sass = require('sass');

  require('load-grunt-tasks')(grunt);

  grunt.initConfig({

    pkg: this.file.readJSON('package.json'),

    sass: {
      options: {
        implementation: sass,
        sourceMap: true
      },
      dist: {
        files: [{
          expand: true,
          cwd: 'scss',
          src: ['main.scss'],
          dest: 'css',
          ext: '.css'
        },
        {
          expand: true,
          cwd: 'scss',
          src: ['weatherForecast.scss'],
          dest: 'components/weather',
          ext: '.css'
        }
      ]
      }

    },
        watch: {
      sass: {
        files: ['scss/**/**.scss'],
        tasks: ['sass']
      },
    }

  });

  grunt.registerTask('default', ['watch']);
};