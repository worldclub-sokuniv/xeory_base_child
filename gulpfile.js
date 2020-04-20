const { src, dest, watch } = require("gulp")
const sass = require("gulp-sass")
const concat = require("gulp-concat")

const styles_root_path = "styles"

const compileSass = () => {
  src(styles_root_path+"/**/*.scss")
  .pipe(
    concat("style-sass.scss")
  )
  .pipe(
    sass({outputStyle: "expanded"})
  )
  .pipe(dest("./"))
}

// watch options for docker
const watchSassFiles = () => {
  watch(styles_root_path+"/**/*.scss", {interval: 1000, usePolling: true})
  .on("change", compileSass)
}

exports.default = watchSassFiles