"use:strict"
const gulp = require("gulp")
const sass = require("gulp-sass")

const webpack = require("webpack")
const webpackStream = require("webpack-stream")
const webpackConfig = require("./webpack.config")

gulp.task("sass", ()=>{
  return gulp.src("./libs/styles/*.scss")
    .pipe(sass())
    .pipe(gulp.dest("./"))
})

gulp.task("webpack", ()=>{
  return webpackStream(webpackConfig, webpack)
    .pipe(gulp.dest("./"))
})

gulp.task("build",gulp.parallel("sass", "webpack"))