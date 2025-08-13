const webpack = require('webpack');
const config = require('./webpack.config');

webpack(config, (err, stats) => {
	if (err || stats.hasErrors()) {
		console.error('❌ Failed to build blocks');
		console.error(stats.toString({ colors: true }));
		process.exit(1);
	} else {
		console.log('✅ Built blocks successfully');
		console.log(stats.toString({ colors: true, chunks: false }));
	}
});
