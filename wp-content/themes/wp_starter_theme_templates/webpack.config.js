const fs = require("fs");
const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const RemoveEmptyScriptsPlugin = require("webpack-remove-empty-scripts");
const SassLintPlugin = require("sass-lint-webpack");
const ESLintPlugin = require("eslint-webpack-plugin");

const getDirectories = (srcPath) => fs.readdirSync(srcPath).filter((file) => fs.statSync(path.join(srcPath, file)).isDirectory());

const subDirectories = getDirectories("templates");

const templateEntries = {};

subDirectories.forEach((dir) => {
  if (fs.existsSync(`./templates/${dir}/${dir}.scss`)) {
    templateEntries[`${dir}`] = [`./templates/${dir}/${dir}.scss`];
  }
});

module.exports = (env, argv) => {
  const cssLoaders = [
    MiniCssExtractPlugin.loader,
    "css-loader",
    "postcss-loader",
    "sass-loader",
    {
      loader: "sass-resources-loader",
      options: {
        resources: [path.resolve(__dirname, "./src/scss/global.scss")],
      },
    },
  ];

  if (argv.mode === "development") {
    cssLoaders.splice(2, 1);
  }

  return {
    entry: {
      ...templateEntries,
      main: ["./src/ts/main.ts"],
      index: ["./src/scss/index.scss"],
      archive: ["./src/scss/archive.scss"],
      page: ["./src/scss/page.scss"],
      single: ["./src/scss/single.scss"],
      search: ["./src/scss/search.scss"],
      404: ["./src/scss/404.scss"],
    },
    output: {
      filename: "[name].js",
      path: path.resolve(__dirname, "public"),
    },
    module: {
      rules: [
        {
          test: /\.scss/,
          use: cssLoaders,
        },
        {
          test: /\.tsx?$/,
          use: "ts-loader",
          exclude: /node_modules/,
        },
        { test: /\.(glsl|vs|fs)$/, loader: "ts-shader-loader" },
      ],
    },
    resolve: {
      extensions: [".wasm", ".ts", ".tsx", ".mjs", ".cjs", ".js", ".json"],
    },
    // stats: {
    //   warnings: false,
    // },
    plugins: [
      new RemoveEmptyScriptsPlugin(),
      new MiniCssExtractPlugin(),
      new SassLintPlugin({
        ignorePlugins: ["extract-text-webpack-plugin"],
      }),
      new ESLintPlugin(),
    ],
  };
};
