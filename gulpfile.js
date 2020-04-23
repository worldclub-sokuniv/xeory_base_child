const { src, dest, watch } = require("gulp")
const sass = require("gulp-sass")
const rename = require("gulp-rename")

const styles_root_path = "styles"

const compileSass = () => {
  src(styles_root_path+"/main.scss")
  .pipe(
    sass({outputStyle: "expanded"})
  )
  .pipe(rename("style-sass.css"))
  .pipe(dest("./"))
}

// watch options for docker
const watchSassFiles = () => {
  watch(styles_root_path+"/**/*.scss", {interval: 1000, usePolling: true})
  .on("change", compileSass)
}

exports.default = watchSassFiles