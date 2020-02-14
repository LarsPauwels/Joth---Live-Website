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
  src("./theme/Joth/src/sass/*.scss")
    .pipe(sass({ outputStyle: "compressed" }).on("error", sass.logError))
    .pipe(dest("./theme/Joth/assets/css/"));
  done();
}

/*
 * Minify all html and php files.
 */

// function minifyHtml(done) {
//   src(["./src/*.html", "./src/*.php"])
//     .pipe(
//       htmlmin({
//         collapseWhitespace: true,
//         ignoreCustomFragments: [/<%[\s\S]*?%>/, /<\?[=|php]?[\s\S]*?\?>/]
//       })
//     )
//     .pipe(dest("./dist"));
//   done();
// }

/*
 * Compress all jpeg, png and svg files.
 */

function compressImages(done) {
  src("./theme/Joth/src/images/*")
    .pipe(imagemin({ progressive: true }))
    .pipe(dest("./theme/Joth/assets/images/"));
  done();
}

/**
 * Minify all js files.
 */

function minifyJs(done) {
  src("./theme/Joth/src/js/*.js")
    .pipe(babel({ presets: ["@babel/env"] }))
    .pipe(uglify())
    .pipe(dest("./theme/Joth/assets/js/"));
  done();
}

watch("./theme/Joth/src/sass/**/*.scss", sass2css);
//watch("./theme/Joth/src/*.html", minifyHtml);
//watch("./theme/Joth/src/*.php", minifyHtml);
watch("./theme/Joth/src/images/*", compressImages);
watch("./theme/Joth/src/js/*", minifyJs);

module.exports.default = parallel(
  sass2css,
  //minifyHtml,
  compressImages,
  minifyJs
);
