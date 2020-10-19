# WordPress theme Frontend

This project uses [Foundation for Sites 6](http://foundation.zurb.com/sites). It includes a Sass compiler and some gulp tasks.

## Installation

To use this template, your computer needs:

- [NodeJS](https://nodejs.org/en/) (0.12 or greater)
- [Git](https://git-scm.com/)
- [Gulp](https://gulpjs.com/)

This template can be installed with the Foundation CLI, or downloaded and set up manually.

### Manual Setup

First, install gulp

```bash
npm install -g gulp
```

In your command line, install the needed dependencies:

```bash
npm install
```

### Commands

#### Watch
```bash
gulp watch
```
Start watching the sass files and trigger the sass compiler if there's changes (it automatically copy the `style.css` file to the `assets/css/` theme folder)

#### Build CSS dependencies
```bash
gulp build-css
```

Build a compressed css file with all the specified dependencies in `js.styles` in `gulpfile.js` (line 38)

#### Build JS dependencies
```bash
gulp build-js
```

Build a compressed js file with all the specified dependencies in `js.fileList` in `gulpfile.js` (line 21)

#### Image minification
```bash
gulp imgmin
```
Run a minification process to the images placed in `assets/img/`. you can change this path by editing `gulpfile.js`
