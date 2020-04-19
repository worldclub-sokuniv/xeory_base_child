const { src, dest, watch } = require("gulp")
const sass = require("gulp-sass")
const concat = require("gulp-concat")

const compileSass = () => {
  src("styles/*.scss")
  .pipe(
    concat("style-sass.scss")
  )
  .pipe(
    sass({outputStyle: "expanded"})
  )
  .pipe(dest("./"))
}

const watchSassFiles = () => watch("styles/*.scss", {interval: 1000, usePolling: true}, compileSass)

exports.default = watchSassFiles