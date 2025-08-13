const path = require('path');
const glob = require('glob');
const fs = require('fs');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const RemoveEmptyScriptsPlugin = require('webpack-remove-empty-scripts');
const DependencyExtractionWebpackPlugin = require('@wordpress/dependency-extraction-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const ImageMinimizerPlugin = require('image-minimizer-webpack-plugin');

// Define paths
const blocksDir = path.resolve(__dirname);
const themeRoot = path.resolve(__dirname, '../');
const outputDir = path.resolve(themeRoot, 'assets/build/blocks');

// Discover block entries
const entries = {};
const copyPatterns = [];

glob.sync(`${blocksDir}/*/index.js`).forEach((entryFile) => {
	const blockDir = path.dirname(entryFile);
	const blockName = path.basename(blockDir);

	entries[`${blockName}/index`] = entryFile;

	// style.scss
	const stylePath = path.join(blockDir, 'style.scss');
	if (fs.existsSync(stylePath)) {
		entries[`${blockName}/style`] = stylePath;
	}

	// view-style.scss
	const viewStylePath = path.join(blockDir, 'view-style.scss');
	if (fs.existsSync(viewStylePath)) {
		entries[`${blockName}/view-style`] = viewStylePath;
	}

	// editor.scss
	const editorPath = path.join(blockDir, 'editor.scss');
	if (fs.existsSync(editorPath)) {
		entries[`${blockName}/editor`] = editorPath;
	}

	// view.js if declared in block.json
	const blockJsonPath = path.join(blockDir, 'block.json');
	if (fs.existsSync(blockJsonPath)) {
		// Copy block.json
		copyPatterns.push({
			from: blockJsonPath,
			to: path.join(outputDir, blockName, 'block.json'),
		});

		// Copy markup.php if it exists
		const markupPath = path.join(blockDir, 'markup.php');
		if (fs.existsSync(markupPath)) {
			copyPatterns.push({
				from: markupPath,
				to: path.join(outputDir, blockName, 'markup.php'),
			});
		}

		try {
			const blockJson = JSON.parse(fs.readFileSync(blockJsonPath, 'utf8'));
			if (blockJson.viewScript && blockJson.viewScript.endsWith('view.js')) {
				const viewPath = path.join(blockDir, 'view.js');
				if (fs.existsSync(viewPath)) {
					entries[`${blockName}/view`] = viewPath;
				}
			}
		} catch (err) {
			console.warn(`⚠️ Could not parse block.json for ${blockName}: ${err.message}`);
		}
}

});

module.exports = {
	mode: 'production',
	entry: entries,
	output: {
		path: outputDir,
		filename: '[name].js',
		clean: false,
	},
	plugins: [
		new RemoveEmptyScriptsPlugin(),
		new MiniCssExtractPlugin({
			filename: '[name].css',
		}),
		new DependencyExtractionWebpackPlugin({
			outputFormat: 'php',
		}),
		new CopyWebpackPlugin({ patterns: copyPatterns }),
		new ImageMinimizerPlugin({
		  minimizer: {
		    implementation: ImageMinimizerPlugin.imageminMinify,
		    options: {
		      plugins: [
		        ['gifsicle', { interlaced: true, optimizationLevel: 3 }],
		        ['mozjpeg', { quality: 75 }],
		        ['pngquant', { quality: [0.75, 0.9], speed: 4 }],
		        [
		          'svgo',
		          {
		            plugins: [
		              {
		                name: 'preset-default',
		                params: {
		                  overrides: {
		                    cleanupIDs: false,
		                    removeViewBox: false,
		                  },
		                },
		              },
		            ],
		          },
		        ],
		      ],
		    },
		  },
		})
	],
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: /node_modules/,
				use: 'babel-loader',
			},
			{
				test: /\.s?css$/,
				use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader'],
			},
			{
			  test: /\.(png|jpe?g|gif|svg|webp)$/i,
			  type: 'asset/resource',
			  generator: {
			    filename: (pathData) => {
			      const match = pathData.filename.match(/blocks[\\/](.+?)[\\/]images[\\/]/);
			      const blockName = match ? match[1] : 'common';
			      // return `blocks/${blockName}/images/[name][ext]`;
						return `${blockName}/images/[name][ext]`;
			    },
			  },
			}
		],
	},
	resolve: {
		extensions: ['.js'],
	},
};
