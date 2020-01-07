const { src, dest, series, watch, parallel, gulp } = require('gulp'),
    sourcemaps = require('gulp-sourcemaps'),
    sass = require('gulp-sass'),
    prefix = require('gulp-autoprefixer'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    browserSync = require('browser-sync').create();


// function main_styles() {
//     console.log("Main Styles Starting");
//     return src(['assets/sass/base/*.scss','assets/sass/components/*.scss'])
//         .pipe(concat('main.scss'))
//         .pipe(sourcemaps.init())
//         .pipe(sass({ outputStyle: 'compressed' }))
//         .pipe(prefix('last 2 version'))
//         .pipe(concat('main.min.css'))
//         .pipe(sourcemaps.write('.'))
//         .pipe(dest('assets/css/'))
//         .pipe(browserSync.stream());
// }
function home_style() {
    console.log("Home Styles Starting");
    return src(['assets/sass/base/*.scss','assets/sass/components/*.scss','assets/sass/pages/_home.scss'])
        .pipe(concat('home.scss'))
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: 'compressed' }))
        .pipe(prefix('last 2 version'))
        .pipe(concat('home.min.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('assets/css/'))
        .pipe(browserSync.stream());

}

function contact_us_style() {
    console.log("Contactus Styles Starting");
    return src(['assets/sass/base/*.scss','assets/sass/components/*.scss','assets/sass/pages/_contactus.scss'])
        .pipe(concat('contactus.scss'))
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: 'compressed' }))
        .pipe(prefix('last 2 version'))
        .pipe(concat('contactus.min.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('assets/css/'))
        .pipe(browserSync.stream());
}

function our_story_style() {
    console.log("Ourstory Styles Starting");
    return src(['assets/sass/base/*.scss','assets/sass/components/*.scss','assets/sass/pages/_ourstory.scss'])
        .pipe(concat('ourstory.scss'))
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: 'compressed' }))
        .pipe(prefix('last 2 version'))
        .pipe(concat('ourstory.min.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('assets/css/'))
        .pipe(browserSync.stream());
}

function store_style() {
    console.log("Store Styles Starting");
    return src(['assets/sass/base/*.scss','assets/sass/components/*.scss','assets/sass/pages/_store.scss'])
        .pipe(concat('store.scss'))
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: 'compressed' }))
        .pipe(prefix('last 2 version'))
        .pipe(concat('store.min.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('assets/css/'))
        .pipe(browserSync.stream());
}
function blogs_style() {
    console.log("Blogs Styles Starting");
    return src(['assets/sass/base/*.scss','assets/sass/components/*.scss','assets/sass/pages/_blogs.scss'])
        .pipe(concat('blogs.scss'))
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: 'compressed' }))
        .pipe(prefix('last 2 version'))
        .pipe(concat('blogs.min.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('assets/css/'))
        .pipe(browserSync.stream());
}
function cases_style() {
    console.log("Cases Styles Starting");
    return src(['assets/sass/base/*.scss','assets/sass/components/*.scss','assets/sass/pages/_casestudies.scss'])
        .pipe(concat('cases.scss'))
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: 'compressed' }))
        .pipe(prefix('last 2 version'))
        .pipe(concat('cases.min.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('assets/css/'))
        .pipe(browserSync.stream());
}
function blog_style() {
    console.log("Blog Styles Starting");
    return src(['assets/sass/base/*.scss','assets/sass/components/*.scss','assets/sass/pages/_blog.scss'])
        .pipe(concat('blog.scss'))
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: 'compressed' }))
        .pipe(prefix('last 2 version'))
        .pipe(concat('blog.min.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('assets/css/'))
        .pipe(browserSync.stream());
}

function product_style() {
    console.log("Product Styles Starting");
    return src(['assets/sass/base/*.scss','assets/sass/components/*.scss','assets/sass/pages/_product.scss'])
        .pipe(concat('product.scss'))
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: 'compressed' }))
        .pipe(prefix('last 2 version'))
        .pipe(concat('product.min.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('assets/css/'))
        .pipe(browserSync.stream());
}


function case_style() {
    console.log("Product Styles Starting");
    return src(['assets/sass/base/*.scss','assets/sass/components/*.scss','assets/sass/pages/_casestudy.scss'])
        .pipe(concat('case.scss'))
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: 'compressed' }))
        .pipe(prefix('last 2 version'))
        .pipe(concat('case.min.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('assets/css/'))
        .pipe(browserSync.stream());
}

function account_style() {
    console.log("account Styles Starting");
    return src(['assets/sass/base/*.scss','assets/sass/components/*.scss','assets/sass/pages/_account.scss'])
        .pipe(concat('account.scss'))
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: 'compressed' }))
        .pipe(prefix('last 2 version'))
        .pipe(concat('account.min.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('assets/css/'))
        .pipe(browserSync.stream());
}
function cart_style() {
    console.log("cart Styles Starting");
    return src(['assets/sass/base/*.scss','assets/sass/components/*.scss','assets/sass/pages/_cart.scss'])
        .pipe(concat('cart.scss'))
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: 'compressed' }))
        .pipe(prefix('last 2 version'))
        .pipe(concat('cart.min.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('assets/css/'))
        .pipe(browserSync.stream());
}

function styles() {
    home_style();
    contact_us_style();
    our_story_style();
    store_style();
    blogs_style();
    cases_style();
    blog_style();
    product_style();
    case_style();
    account_style();
    cart_style();
}

function scripts() {
    console.log('scripts Task works Fine!!');
    return src('assets/js/components/*.js')
        .pipe(concat('main.min.js'))
        .pipe(uglify())
        .pipe(dest('assets/js'));
}

function watching() {
    styles();
    scripts();
    browserSync.init({
        serve: {
            baseDir: './'
        }
    });
    watch(['assets/sass/**/*.scss','!assets/sass/_main.scss'], function(cd) {
        styles();
        cd();
    });
    watch('assets/js/components/*.js', function(cd) {
        scripts();
        browserSync.reload();
        cd();
    });
    watch('./*.html', function(cd) {
        browserSync.reload();
        cd();
    });
}

exports.styles = styles;
exports.scripts = scripts;
exports.default = watching;