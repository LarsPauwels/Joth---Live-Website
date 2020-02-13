const { src, dest, watch, parallel } = require("gulp");
const sass = require("gulp-sass");
const htmlmin = require("gulp-htmlmin");
const imagemin = require("gulp-imagemin");
const uglify = require("gulp-uglify-es").default;
const babel = require("gulp-babel");

/*
 * Add compressor from sass to css files
 * Sass is not browser supported.
 */

function sass2css(done) {
  src("./src/sass/style.scss")
    .pipe(sass({ outputStyle: "compressed" }).on("error", sass.logError))
    .pipe(dest("./dist/css/"));
  done();
}

/*
 * Minify all html and php files.
 */

function minifyHtml(done) {
  src(["./src/*.html", "./src/*.php"])
    .pipe(
      htmlmin({
        collapseWhitespace: true,
        ignoreCustomFragments: [/<%[\s\S]*?%>/, /<\?[=|php]?[\s\S]*?\?>/]
      })
    )
    .pipe(dest("./dist"));
  done();
}

/*
 * Compress all jpeg, png and svg files.
 */

function compressImages(done) {
  src("src/assets/*")
    .pipe(imagemin({ progressive: true }))
    .pipe(dest("./dist/assets/"));
  done();
}

/**
 * Minify all js files.
 */

function minifyJs(done) {
  src("src/js/app.js")
    .pipe(babel({ presets: ["@babel/env"] }))
    .pipe(uglify())
    .pipe(dest("./dist/js/"));
  done();
}

watch("./src/sass/**/*.scss", sass2css);
watch("./src/*.html", minifyHtml);
watch("./src/*.php", minifyHtml);
watch("./src/assets/*", compressImages);
watch("./src/js/*", minifyJs);

module.exports.default = parallel(
  sass2css,
  minifyHtml,
  compressImages,
  minifyJs
);
